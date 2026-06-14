const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

const NOTION_API_KEY = process.env.NOTION_API_KEY;
const NOTION_DATABASE_ID = 'fe5ed4d07a264f2596a4bda414b56afe';
const RESEND_API_KEY = process.env.RESEND_API_KEY;

exports.handler = async function(event) {
  if (event.httpMethod !== 'POST') {
    return { statusCode: 405, body: 'Method not allowed' };
  }

  const sig = event.headers['stripe-signature'];
  const webhookSecret = process.env.STRIPE_WEBHOOK_SECRET;

  let stripeEvent;
  try {
    stripeEvent = stripe.webhooks.constructEvent(event.body, sig, webhookSecret);
  } catch (err) {
    console.error('Webhook signature verification failed:', err.message);
    return { statusCode: 400, body: `Webhook error: ${err.message}` };
  }

  if (stripeEvent.type !== 'checkout.session.completed') {
    return { statusCode: 200, body: 'Event ignored' };
  }

  const sessionRaw = stripeEvent.data.object;
  const session = await stripe.checkout.sessions.retrieve(sessionRaw.id, {
    expand: ['shipping_details'],
  });
  const meta = session.metadata || {};
  const amountNZD = (session.amount_total || 0) / 100;
  const orderDate = new Date(session.created * 1000).toISOString().split('T')[0];
  const customerName = meta.clientName || session.customer_details?.name || 'Unknown';
  const customerEmail = session.customer_email || '';
  const sizingType = meta.sizingType || 'Standard sizes';
  const shippingLabel = meta.shippingLabel || meta.shippingRegion || '';
  const addr = session.shipping_details?.address || {};
  const shippingAddress = [
    addr.line1, addr.line2, addr.city, addr.state, addr.postal_code, addr.country
  ].filter(Boolean).join(', ');

  // ── Notion ──────────────────────────────────────────────────────────────
  const properties = {
    Order: { title: [{ text: { content: `${customerName} — ${orderDate}` } }] },
    Status: { select: { name: 'New' } },
    'Customer Name': { rich_text: [{ text: { content: customerName } }] },
    Email: { email: customerEmail },
    'Amount Paid': { number: amountNZD },
    'Sizing Type': { select: { name: sizingType } },
    'Shipping Region': { rich_text: [{ text: { content: shippingLabel } }] },
    'Shipping Address': { rich_text: [{ text: { content: shippingAddress } }] },
    'Stripe Session ID': { rich_text: [{ text: { content: session.id } }] },
    'Order Date': { date: { start: orderDate } },
  };

  if (sizingType !== 'Made to measure' && meta.size) {
    properties['Size'] = { rich_text: [{ text: { content: meta.size } }] };
  }
  if (sizingType === 'Made to measure') {
    if (meta.naturalWaist) properties['Natural Waist (cm)'] = { number: parseFloat(meta.naturalWaist) };
    if (meta.highHip)      properties['High Hip (cm)']      = { number: parseFloat(meta.highHip) };
    if (meta.inseam)       properties['Inseam (cm)']        = { number: parseFloat(meta.inseam) };
  }

  try {
    const res = await fetch('https://api.notion.com/v1/pages', {
      method: 'POST',
      headers: {
        Authorization: `Bearer ${NOTION_API_KEY}`,
        'Content-Type': 'application/json',
        'Notion-Version': '2022-06-28',
      },
      body: JSON.stringify({ parent: { database_id: NOTION_DATABASE_ID }, properties }),
    });
    if (!res.ok) {
      const body = await res.text();
      console.error('Notion API error:', body);
    }
  } catch (err) {
    console.error('Notion fetch error:', err.message);
  }

  // ── Customer receipt email ───────────────────────────────────────────────
  if (customerEmail && RESEND_API_KEY) {
    const orderDetails = sizingType === 'Made to measure'
      ? `
        <tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Sizing</td><td style="padding:8px 0;font-size:13px;">Made to measure</td></tr>
        ${meta.naturalWaist ? `<tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Natural waist</td><td style="padding:8px 0;font-size:13px;">${meta.naturalWaist} cm</td></tr>` : ''}
        ${meta.highHip ? `<tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">High hip</td><td style="padding:8px 0;font-size:13px;">${meta.highHip} cm</td></tr>` : ''}
        ${meta.inseam ? `<tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Inseam</td><td style="padding:8px 0;font-size:13px;">${meta.inseam} cm</td></tr>` : ''}
      `
      : `
        <tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Sizing</td><td style="padding:8px 0;font-size:13px;">Standard sizing</td></tr>
        ${meta.size ? `<tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Size</td><td style="padding:8px 0;font-size:13px;">${meta.size}</td></tr>` : ''}
      `;

    const html = `
<!DOCTYPE html>
<html>
<head><meta charset="UTF-8"><meta name="viewport" content="width=device-width,initial-scale=1"></head>
<body style="margin:0;padding:0;background:#fafaf8;font-family:-apple-system,'Helvetica Neue',Arial,sans-serif;">
  <table width="100%" cellpadding="0" cellspacing="0" style="background:#fafaf8;padding:48px 24px;">
    <tr><td align="center">
      <table width="100%" cellpadding="0" cellspacing="0" style="max-width:560px;">

        <!-- Header -->
        <tr>
          <td style="padding-bottom:48px;">
            <p style="margin:0;font-family:'Times New Roman',serif;font-size:15px;letter-spacing:0.12em;color:#141412;">Callum Godfrey</p>
          </td>
        </tr>

        <!-- Hero -->
        <tr>
          <td style="border-top:0.5px solid #d4d3ce;padding-top:48px;padding-bottom:48px;">
            <p style="margin:0 0 16px;font-size:11px;letter-spacing:0.2em;text-transform:uppercase;color:#8a8a84;">Order confirmed</p>
            <h1 style="margin:0;font-family:'Times New Roman',serif;font-size:48px;font-weight:400;line-height:1;color:#141412;">They're<br>being made.</h1>
          </td>
        </tr>

        <!-- Greeting -->
        <tr>
          <td style="padding-bottom:40px;">
            <p style="margin:0;font-family:'Times New Roman',serif;font-size:18px;line-height:1.8;color:#141412;">
              Hi ${customerName},<br><br>
              Payment received — your order is confirmed. This is your receipt. Everything is cut and sewn by hand, so I'll be in touch once I'm ready to start on your pair.
            </p>
          </td>
        </tr>

        <!-- Order summary -->
        <tr>
          <td style="padding-bottom:40px;">
            <p style="margin:0 0 20px;font-size:9px;letter-spacing:0.25em;text-transform:uppercase;color:#8a8a84;">Order summary</p>
            <table width="100%" cellpadding="0" cellspacing="0" style="border-top:0.5px solid #d4d3ce;">
              <tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Product</td><td style="padding:8px 0;font-size:13px;">001 — 14oz Japanese Selvedge Wide Bootcut</td></tr>
              ${orderDetails}
              <tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Shipping to</td><td style="padding:8px 0;font-size:13px;">${shippingLabel}</td></tr>
              ${shippingAddress ? `<tr><td style="padding:8px 0;color:#8a8a84;font-size:13px;">Delivery address</td><td style="padding:8px 0;font-size:13px;">${shippingAddress}</td></tr>` : ''}
              <tr style="border-top:0.5px solid #d4d3ce;"><td style="padding:12px 0;font-size:13px;color:#141412;">Total paid</td><td style="padding:12px 0;font-size:13px;font-weight:500;color:#141412;">NZD $${amountNZD.toFixed(2)}</td></tr>
            </table>
          </td>
        </tr>

        <!-- Next steps -->
        <tr>
          <td style="padding-bottom:48px;">
            <p style="margin:0 0 20px;font-size:9px;letter-spacing:0.25em;text-transform:uppercase;color:#8a8a84;">What happens next</p>
            <table width="100%" cellpadding="0" cellspacing="0">
              <tr style="border-top:0.5px solid #d4d3ce;">
                <td style="padding:20px 0;vertical-align:top;width:32px;font-family:'Times New Roman',serif;font-size:13px;color:#d4d3ce;">01</td>
                <td style="padding:20px 0;font-size:13px;line-height:1.7;color:#8a8a84;"><strong style="display:block;color:#141412;font-weight:400;margin-bottom:4px;">I review your order</strong>I'll check all the details and confirm everything looks right.</td>
              </tr>
              <tr style="border-top:0.5px solid #d4d3ce;">
                <td style="padding:20px 0;vertical-align:top;width:32px;font-family:'Times New Roman',serif;font-size:13px;color:#d4d3ce;">02</td>
                <td style="padding:20px 0;font-size:13px;line-height:1.7;color:#8a8a84;"><strong style="display:block;color:#141412;font-weight:400;margin-bottom:4px;">I'll be in touch</strong>Expect a message from me within a day or two once I'm ready to start cutting.</td>
              </tr>
              <tr style="border-top:0.5px solid #d4d3ce;">
                <td style="padding:20px 0;vertical-align:top;width:32px;font-family:'Times New Roman',serif;font-size:13px;color:#d4d3ce;">03</td>
                <td style="padding:20px 0;font-size:13px;line-height:1.7;color:#8a8a84;"><strong style="display:block;color:#141412;font-weight:400;margin-bottom:4px;">I make your jeans</strong>Pattern, cut, and sewn by hand — typically 2 to 4 weeks from when I start.</td>
              </tr>
              <tr style="border-top:0.5px solid #d4d3ce;border-bottom:0.5px solid #d4d3ce;">
                <td style="padding:20px 0;vertical-align:top;width:32px;font-family:'Times New Roman',serif;font-size:13px;color:#d4d3ce;">04</td>
                <td style="padding:20px 0;font-size:13px;line-height:1.7;color:#8a8a84;"><strong style="display:block;color:#141412;font-weight:400;margin-bottom:4px;">Shipped to you</strong>I'll send tracking once they're on their way. Repairs are free for life — you just cover return shipping.</td>
              </tr>
            </table>
          </td>
        </tr>

        <!-- Footer -->
        <tr>
          <td style="border-top:0.5px solid #d4d3ce;padding-top:32px;">
            <p style="margin:0 0 8px;font-size:12px;color:#8a8a84;line-height:1.6;">Any questions? Reply to this email or reach me at <a href="mailto:callumgodfrey@callumgodfrey.com" style="color:#141412;">callumgodfrey@callumgodfrey.com</a></p>
            <p style="margin:0;font-size:11px;color:#d4d3ce;letter-spacing:0.1em;text-transform:uppercase;">Made by hand in Wellington, New Zealand</p>
          </td>
        </tr>

      </table>
    </td></tr>
  </table>
</body>
</html>`;

    try {
      const emailRes = await fetch('https://api.resend.com/emails', {
        method: 'POST',
        headers: {
          Authorization: `Bearer ${RESEND_API_KEY}`,
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          from: 'Callum Godfrey <callumgodfrey@callumgodfrey.com>',
          to: customerEmail,
          subject: 'Your order is confirmed — 001 Wide Bootcut',
          html,
        }),
      });
      if (!emailRes.ok) {
        const body = await emailRes.text();
        console.error('Resend error:', body);
      }
    } catch (err) {
      console.error('Resend fetch error:', err.message);
    }

    // ── Notify Callum ────────────────────────────────────────────────────────
    const notifyDetails = sizingType === 'Made to measure'
      ? `Made to measure — waist ${meta.naturalWaist}cm, hip ${meta.highHip}cm, inseam ${meta.inseam}cm`
      : `Standard sizes — ${meta.size || 'not specified'}`;

    const notifyHtml = `
<table style="font-family:-apple-system,'Helvetica Neue',Arial,sans-serif;font-size:14px;line-height:1.8;color:#141412;max-width:480px;">
  <tr><td style="padding-bottom:24px;font-size:20px;font-family:'Times New Roman',serif;">New order — CG</td></tr>
  <tr><td><strong>Name:</strong> ${customerName}</td></tr>
  <tr><td><strong>Email:</strong> ${customerEmail}</td></tr>
  <tr><td><strong>Sizing:</strong> ${notifyDetails}</td></tr>
  <tr><td><strong>Ships to:</strong> ${shippingLabel}</td></tr>
  ${shippingAddress ? `<tr><td><strong>Address:</strong> ${shippingAddress}</td></tr>` : ''}
  <tr><td><strong>Amount:</strong> NZD $${amountNZD.toFixed(2)}</td></tr>
  <tr><td><strong>Date:</strong> ${orderDate}</td></tr>
  <tr><td><strong>Stripe session:</strong> ${session.id}</td></tr>
</table>`;

    try {
      await fetch('https://api.resend.com/emails', {
        method: 'POST',
        headers: {
          Authorization: `Bearer ${RESEND_API_KEY}`,
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          from: 'Bespoke Orders <callumgodfrey@callumgodfrey.com>',
          to: 'callumgodfrey@callumgodfrey.com',
          subject: `New order — ${customerName} — NZD $${amountNZD.toFixed(2)}`,
          html: notifyHtml,
        }),
      });
    } catch (err) {
      console.error('Notify email error:', err.message);
    }
  }

  return { statusCode: 200, body: 'OK' };
};
