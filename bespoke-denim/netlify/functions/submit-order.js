const MAX_SUBMISSIONS = 4;
const NOTION_API_KEY = process.env.NOTION_API_KEY;
const NOTION_DATABASE_ID = process.env.NOTION_DATABASE_ID;
const NETLIFY_SITE_ID = process.env.SITE_ID;
const NETLIFY_TOKEN = process.env.NETLIFY_API_TOKEN;
const COUNT_VAR = 'SUBMISSION_COUNT';

// ── Sanitise: strip HTML tags, trim, enforce max length ──
function sanitise(val, maxLen = 200) {
  if (val === null || val === undefined) return '';
  return String(val).replace(/<[^>]*>/g, '').trim().slice(0, maxLen);
}

function isValidEmail(email) {
  return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) && email.length <= 254;
}

// ── Submission count helpers ──
async function getCount() {
  if (!NETLIFY_SITE_ID || !NETLIFY_TOKEN) return 0;
  try {
    const res = await fetch(
      `https://api.netlify.com/api/v1/sites/${NETLIFY_SITE_ID}/env/${COUNT_VAR}`,
      { headers: { Authorization: `Bearer ${NETLIFY_TOKEN}` } }
    );
    if (!res.ok) return 0;
    const data = await res.json();
    return parseInt(data?.values?.[0]?.value || '0', 10);
  } catch { return 0; }
}

async function incrementCount() {
  if (!NETLIFY_SITE_ID || !NETLIFY_TOKEN) return;
  const current = await getCount();
  const next = current + 1;
  try {
    const res = await fetch(
      `https://api.netlify.com/api/v1/sites/${NETLIFY_SITE_ID}/env`,
      {
        method: 'POST',
        headers: { Authorization: `Bearer ${NETLIFY_TOKEN}`, 'Content-Type': 'application/json' },
        body: JSON.stringify([{ key: COUNT_VAR, scopes: ['functions'], values: [{ context: 'all', value: String(next) }] }]),
      }
    );
    if (res.status === 422) {
      await fetch(
        `https://api.netlify.com/api/v1/sites/${NETLIFY_SITE_ID}/env/${COUNT_VAR}`,
        {
          method: 'PUT',
          headers: { Authorization: `Bearer ${NETLIFY_TOKEN}`, 'Content-Type': 'application/json' },
          body: JSON.stringify({ key: COUNT_VAR, scopes: ['functions'], values: [{ context: 'all', value: String(next) }] }),
        }
      );
    }
  } catch(e) { console.error('incrementCount error:', e); }
}

exports.handler = async function(event) {
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Allow-Origin': '*',
    'Access-Control-Allow-Headers': 'Content-Type',
  };

  if (event.httpMethod === 'OPTIONS') {
    return { statusCode: 200, headers, body: '' };
  }

  if (event.httpMethod !== 'POST') {
    return { statusCode: 405, headers, body: JSON.stringify({ error: 'Method not allowed' }) };
  }

  // ── Server-side submission cap check ──
  const count = await getCount();
  if (count >= MAX_SUBMISSIONS) {
    return { statusCode: 409, headers, body: JSON.stringify({ error: 'Batch full', full: true }) };
  }

  // ── Parse body ──
  let data;
  try {
    data = JSON.parse(event.body);
  } catch {
    return { statusCode: 400, headers, body: JSON.stringify({ error: 'Invalid request body' }) };
  }

  // ── Honeypot check ──
  if (data._hp && data._hp !== '') {
    // Bot filled the honeypot — silently reject but return 200 to confuse bots
    return { statusCode: 200, headers, body: JSON.stringify({ success: true }) };
  }

  // ── Sanitise and validate all inputs ──
  const clientName = sanitise(data.clientName, 100);
  const email = sanitise(data.email, 254);
  const sizingType = sanitise(data.sizingType, 50);
  const colour = sanitise(data.colour, 100);
  const shippingRegion = sanitise(data.shippingRegion, 100);
  const currencyPreference = sanitise(data.currencyPreference, 10);
  const targetDispatch = sanitise(data.targetDispatch, 100);

  // MTM measurements
  const naturalWaist = sanitise(data.naturalWaist, 20);
  const highHip = sanitise(data.highHip, 20);
  const inseam = sanitise(data.inseam, 20);

  // Standard size
  const size = sanitise(data.size, 20);

  // Required field validation
  if (!clientName) return { statusCode: 400, headers, body: JSON.stringify({ error: 'Name is required' }) };
  if (!isValidEmail(email)) return { statusCode: 400, headers, body: JSON.stringify({ error: 'Valid email is required' }) };
  if (!['Standard sizes', 'Made to measure'].includes(sizingType)) return { statusCode: 400, headers, body: JSON.stringify({ error: 'Invalid sizing type' }) };

  // ── Write to Notion ──
  if (!NOTION_API_KEY || !NOTION_DATABASE_ID) {
    console.error('Missing Notion env vars');
    return { statusCode: 500, headers, body: JSON.stringify({ error: 'Server configuration error' }) };
  }

  const notionProperties = {
    "Name": { title: [{ text: { content: clientName } }] },
    "Email": { email: email },
    "Sizing Type": { select: { name: sizingType } },
    "Stage": { status: { name: "Inbox / Review" } },
    ...(colour ? { "Colour": { select: { name: colour } } } : {}),
    ...(shippingRegion ? { "Shipping Region": { select: { name: shippingRegion } } } : {}),
    ...(currencyPreference ? { "Currency Preference": { select: { name: currencyPreference } } } : {}),
    ...(targetDispatch ? { "Target Dispatch": { rich_text: [{ text: { content: targetDispatch } }] } } : {}),
    ...(sizingType === 'Made to measure' && naturalWaist ? {
      "Natural Waist": { rich_text: [{ text: { content: naturalWaist } }] },
      "High Hip": { rich_text: [{ text: { content: highHip } }] },
      "Inseam": { rich_text: [{ text: { content: inseam } }] },
    } : {}),
    ...(sizingType === 'Standard sizes' && size ? {
      "Size": { rich_text: [{ text: { content: size } }] },
    } : {}),
  };

  try {
    const notionRes = await fetch('https://api.notion.com/v1/pages', {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${NOTION_API_KEY}`,
        'Content-Type': 'application/json',
        'Notion-Version': '2022-06-28',
      },
      body: JSON.stringify({ parent: { database_id: NOTION_DATABASE_ID }, properties: notionProperties }),
    });

    if (!notionRes.ok) {
      const err = await notionRes.text();
      console.error('Notion error:', err);
      return { statusCode: 500, headers, body: JSON.stringify({ error: 'Failed to save order' }) };
    }
  } catch(e) {
    console.error('Notion fetch error:', e);
    return { statusCode: 500, headers, body: JSON.stringify({ error: 'Failed to save order' }) };
  }

  // ── Increment server-side count ──
  await incrementCount();

  return { statusCode: 200, headers, body: JSON.stringify({ success: true }) };
};
