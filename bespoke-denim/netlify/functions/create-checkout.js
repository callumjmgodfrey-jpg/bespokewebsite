const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

// Product catalog — source of truth for backend pricing
const PRODUCT_CATALOG = {
  '001-indigo': {
    name: '001 Wide Bootcut — Raw Indigo',
    type: 'jeans',
    basePricesNZD: { standard: 500, mtm: 550 },
  },
  '001-ecru': {
    name: '001 Wide Bootcut — Ecru',
    type: 'jeans',
    basePricesNZD: { standard: 500, mtm: 550 },
  },
  'canvas-tote': {
    name: 'Canvas Tote — Natural',
    type: 'accessory',
    basePricesNZD: { fixed: 120 },
  },
};

// Fallback for legacy requests without productId
const DEFAULT_PRODUCT = PRODUCT_CATALOG['001-indigo'];

const SHIPPING_NZD = { nz: 20, au: 40, jpkr: 60, namerica: 70, ukeu: 75, row: 85 };

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

  const productId = sanitise(body.productId);
  const product = PRODUCT_CATALOG[productId] || DEFAULT_PRODUCT;

  const sizingType = sanitise(body.sizingType);
  const shippingRegion = sanitise(body.shippingRegion);
  const shippingLabel = sanitise(body.shippingLabel) || SHIPPING_LABELS[shippingRegion] || shippingRegion;
  const clientName = sanitise(body.clientName);
  const email = sanitise(body.email);

  const isAccessory = product.type === 'accessory';

  // For jeans, sizingType is required; for accessories it's not
  if ((!isAccessory && !sizingType) || !shippingRegion || !clientName || !email) {
    return { statusCode: 400, body: 'Missing required fields' };
  }

  let baseNZD;
  if (isAccessory) {
    baseNZD = product.basePricesNZD.fixed;
  } else {
    baseNZD = sizingType === 'Made to measure'
      ? product.basePricesNZD.mtm
      : product.basePricesNZD.standard;
  }

  const shipNZD = SHIPPING_NZD[shippingRegion] ?? SHIPPING_NZD.row;

  const productName = product.name;
  const sizeDescription = isAccessory
    ? 'One size'
    : sizingType === 'Made to measure'
      ? `MTM — waist ${sanitise(body.naturalWaist)}cm, hip ${sanitise(body.highHip)}cm, inseam ${sanitise(body.inseam)}cm`
      : `${sanitise(body.size)}`;

  const siteUrl = process.env.URL || 'https://callumgodfrey.com';

  let session;
  try {
    session = await stripe.checkout.sessions.create({
      payment_method_types: ['card'],
      mode: 'payment',
      customer_email: email,
      shipping_address_collection: {
        allowed_countries: ['NZ', 'AU', 'JP', 'KR', 'US', 'CA', 'GB', 'FR', 'DE', 'IT', 'ES', 'NL', 'SE', 'NO', 'DK', 'CH', 'AT', 'BE', 'PT', 'PL', 'CZ', 'HU', 'RO', 'SG', 'HK', 'TW', 'CN', 'IN', 'BR', 'MX', 'ZA', 'AE', 'SA', 'IL', 'TR', 'TH', 'MY', 'ID', 'PH', 'VN'],
      },
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
              name: `Shipping — ${shippingLabel}`,
            },
          },
          quantity: 1,
        },
      ],
      metadata: {
        productId: productId || '001-indigo',
        clientName,
        sizingType: sizingType || 'N/A',
        size: sanitise(body.size),
        naturalWaist: sanitise(body.naturalWaist),
        highHip: sanitise(body.highHip),
        inseam: sanitise(body.inseam),
        colour: sanitise(body.colour),
        shippingRegion,
        shippingLabel,
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
