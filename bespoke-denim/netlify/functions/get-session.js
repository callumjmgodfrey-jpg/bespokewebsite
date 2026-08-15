const stripe = require('stripe')(process.env.STRIPE_SECRET_KEY);

exports.handler = async function(event) {
  if (event.httpMethod !== 'GET') {
    return { statusCode: 405, body: 'Method not allowed' };
  }

  const sessionId = event.queryStringParameters && event.queryStringParameters.session_id;
  if (!sessionId || !sessionId.startsWith('cs_')) {
    return { statusCode: 400, body: 'Invalid session_id' };
  }

  try {
    const session = await stripe.checkout.sessions.retrieve(sessionId);

    if (session.payment_status !== 'paid') {
      return { statusCode: 400, body: 'Session not paid' };
    }

    const m = session.metadata || {};

    return {
      statusCode: 200,
      headers: {
        'Content-Type': 'application/json',
        'Cache-Control': 'private, max-age=86400',
      },
      body: JSON.stringify({
        customerName: m.clientName || '',
        sizingType: m.sizingType || '',
        size: m.size || '',
        naturalWaist: m.naturalWaist || '',
        highHip: m.highHip || '',
        inseam: m.inseam || '',
        colour: m.colour || '',
        shippingLabel: m.shippingLabel || '',
        amountTotal: session.amount_total,
        currency: session.currency,
      }),
    };
  } catch (err) {
    console.error('get-session error:', err.message);
    return { statusCode: 500, body: 'Failed to retrieve session' };
  }
};
