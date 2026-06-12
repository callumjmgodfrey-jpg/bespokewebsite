const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

// TEST PRICES — revert to real prices before going live
const BASE_PRICES_NZD = { standard: 1, mtm: 1 };
const SHIPPING_NZD = { nz: 1, au: 1, jpkr: 1, namerica: 1, ukeu: 1, row: 1 };

const SHIPPING_LABELS = {
  nz: 'New Zealand', au: 'Australia', jpkr: 'Japan / Korea',
  namerica: 'USA / Canada', ukeu: 'UK / Europe', row: 'Rest of world'
};

function sanitise(val, max = 200) {
  if (!val) return '';
  return String(val).replace(/<[^>]*>/g, '').trim().slice(0, max);
}

exports.handler = async function(event) {
  if (event.httpMethod !== 'POST') {
    return { statusCode: 405, body: 'Method not allowed' };
  }

  let body;
  try {
    body = JSON.parse(event.body);
  } catch {
    return { statusCode: 400, body: 'Invalid JSON' };
  }

  // Honeypot check
  if (body._hp) {
    return { statusCode: 200, body: JSON.stringify({ url: '/confirmation.html' }) };
  }

  const sizingType = sanitise(body.sizingType);
  const shippingRegion = sanitise(body.shippingRegion);
  const clientName = sanitise(body.clientName);
  const email = sanitise(body.email);

  if (!sizingType || !shippingRegion || !clientName || !email) {
    return { statusCode: 400, body: 'Missing required fields' };
  }

  const baseNZD = sizingType === 'Made to measure' ? BASE_PRICES_NZD.mtm : BASE_PRICES_NZD.standard;
  const shipNZD = SHIPPING_NZD[shippingRegion] ?? 85;
  const totalCents = (baseNZD + shipNZD) * 100;

  // Build order description line items
  const productName = '001 — 14oz Japanese Selvedge Wide Bootcut';
  const sizeDescription = sizingType === 'Made to measure'
    ? `MTM — waist ${sanitise(body.naturalWaist)}cm, hip ${sanitise(body.highHip)}cm, inseam ${sanitise(body.inseam)}cm`
    : `${sanitise(body.size)}`;

  const siteUrl = process.env.URL || 'https://callumgodfrey.com';

  let session;
  try {
    session = await stripe.checkout.sessions.create({
      payment_method_types: ['card'],
      mode: 'payment',
      customer_email: email,
      line_items: [
        {
          price_data: {
            currency: 'nzd',
            unit_amount: baseNZD * 100,
            product_data: {
              name: productName,
              description: `${sizingType} — ${sizeDescription}`,
            },
          },
          quantity: 1,
        },
        {
          price_data: {
            currency: 'nzd',
            unit_amount: shipNZD * 100,
            product_data: {
              name: `Shipping — ${SHIPPING_LABELS[shippingRegion] || shippingRegion}`,
            },
          },
          quantity: 1,
        },
      ],
      metadata: {
        clientName,
        sizingType,
        size: sanitise(body.size),
        naturalWaist: sanitise(body.naturalWaist),
        highHip: sanitise(body.highHip),
        inseam: sanitise(body.inseam),
        colour: sanitise(body.colour),
        shippingRegion,
        shippingLabel: SHIPPING_LABELS[shippingRegion] || shippingRegion,
      },
      success_url: `${siteUrl}/confirmation.html?session_id={CHECKOUT_SESSION_ID}`,
      cancel_url: `${siteUrl}/order.html`,
    });
  } catch (err) {
    console.error('Stripe error:', err.message);
    return { statusCode: 500, body: 'Failed to create checkout session' };
  }

  return {
    statusCode: 200,
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ url: session.url }),
  };
};
