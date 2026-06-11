// Tracks submission count using Netlify environment variables via the Netlify API
// No external dependencies required

const NETLIFY_SITE_ID = process.env.SITE_ID;
const NETLIFY_TOKEN = process.env.NETLIFY_API_TOKEN;
const COUNT_VAR = 'SUBMISSION_COUNT';

async function getCount() {
  if (!NETLIFY_SITE_ID || !NETLIFY_TOKEN) return 0;
  try {
    const res = await fetch(
      `https://api.netlify.com/api/v1/sites/${NETLIFY_SITE_ID}/env/${COUNT_VAR}`,
      { headers: { Authorization: `Bearer ${NETLIFY_TOKEN}` } }
    );
    if (!res.ok) return 0;
    const data = await res.json();
    const val = data?.values?.[0]?.value;
    return parseInt(val || '0', 10);
  } catch { return 0; }
}

async function setCount(count) {
  if (!NETLIFY_SITE_ID || !NETLIFY_TOKEN) return;
  try {
    const res = await fetch(
      `https://api.netlify.com/api/v1/sites/${NETLIFY_SITE_ID}/env`,
      {
        method: 'POST',
        headers: {
          Authorization: `Bearer ${NETLIFY_TOKEN}`,
          'Content-Type': 'application/json',
        },
        body: JSON.stringify([{
          key: COUNT_VAR,
          scopes: ['functions'],
          values: [{ context: 'all', value: String(count) }],
        }]),
      }
    );
    if (res.status === 422) {
      await fetch(
        `https://api.netlify.com/api/v1/sites/${NETLIFY_SITE_ID}/env/${COUNT_VAR}`,
        {
          method: 'PUT',
          headers: {
            Authorization: `Bearer ${NETLIFY_TOKEN}`,
            'Content-Type': 'application/json',
          },
          body: JSON.stringify({
            key: COUNT_VAR,
            scopes: ['functions'],
            values: [{ context: 'all', value: String(count) }],
          }),
        }
      );
    }
  } catch(e) { console.error('setCount error:', e); }
}

exports.handler = async function(event) {
  const headers = {
    'Content-Type': 'application/json',
    'Access-Control-Allow-Origin': '*',
  };

  try {
    if (event.httpMethod === 'POST') {
      const current = await getCount();
      const newCount = current + 1;
      await setCount(newCount);
      return { statusCode: 200, headers, body: JSON.stringify({ count: newCount }) };
    } else {
      const count = await getCount();
      return { statusCode: 200, headers, body: JSON.stringify({ count }) };
    }
  } catch(err) {
    return { statusCode: 200, headers, body: JSON.stringify({ count: 0 }) };
  }
};
