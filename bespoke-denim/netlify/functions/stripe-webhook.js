const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

const NOTION_API_KEY = process.env.NOTION_API_KEY;
const NOTION_DATABASE_ID = 'fe5ed4d07a264f2596a4bda414b56afe';

exports.handler = async function(event) {
  if (event.httpMethod !== 'POST') {
    return { statusCode: 405, body: 'Method not allowed' };
  }

  // Verify Stripe webhook signature
  const sig = event.headers['stripe-signature'];
  const webhookSecret = process.env.STRIPE_WEBHOOK_SECRET;

  let stripeEvent;
  try {
    stripeEvent = stripe.webhooks.constructEvent(event.body, sig, webhookSecret);
  } catch (err) {
    console.error('Webhook signature verification failed:', err.message);
    return { statusCode: 400, body: `Webhook error: ${err.message}` };
  }

  // Only handle completed checkout sessions
  if (stripeEvent.type !== 'checkout.session.completed') {
    return { statusCode: 200, body: 'Event ignored' };
  }

  const session = stripeEvent.data.object;
  const meta = session.metadata || {};
  const amountNZD = (session.amount_total || 0) / 100;
  const orderDate = new Date(session.created * 1000).toISOString().split('T')[0];
  const customerName = meta.clientName || session.customer_details?.name || 'Unknown';
  const sizingType = meta.sizingType || 'Standard sizing';

  // Build Notion properties — only include measurement fields for MTM orders
  const properties = {
    Order: {
      title: [{ text: { content: `${customerName} — ${orderDate}` } }],
    },
    Status: { select: { name: 'New' } },
    'Customer Name': { rich_text: [{ text: { content: customerName } }] },
    Email: { email: session.customer_email || '' },
    'Amount Paid': { number: amountNZD },
    'Sizing Type': { select: { name: sizingType } },
    'Shipping Region': {
      rich_text: [{ text: { content: meta.shippingLabel || meta.shippingRegion || '' } }],
    },
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
      body: JSON.stringify({
        parent: { database_id: NOTION_DATABASE_ID },
        properties,
      }),
    });

    if (!res.ok) {
      const body = await res.text();
      console.error('Notion API error:', body);
      return { statusCode: 500, body: 'Failed to create Notion entry' };
    }
  } catch (err) {
    console.error('Notion fetch error:', err.message);
    return { statusCode: 500, body: 'Notion fetch failed' };
  }

  return { statusCode: 200, body: 'OK' };
};
