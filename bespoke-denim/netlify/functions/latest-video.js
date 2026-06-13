exports.handler = async function () {
  const CHANNEL_ID = 'UCTJanJMfMBmhsGjJoLSqaYA'; // callumgodfreymusic

  try {
    const rssUrl = `https://www.youtube.com/feeds/videos.xml?channel_id=${CHANNEL_ID}`;
    const res = await fetch(rssUrl);
    if (!res.ok) throw new Error('RSS fetch failed');
    const xml = await res.text();

    // Pull the first video ID from the RSS feed
    const match = xml.match(/<yt:videoId>([^<]+)<\/yt:videoId>/);
    if (!match) throw new Error('No video ID found');

    const videoId = match[1];

    return {
      statusCode: 200,
      headers: {
        'Content-Type': 'application/json',
        'Cache-Control': 'public, max-age=3600', // Cache for 1 hour
      },
      body: JSON.stringify({ videoId }),
    };
  } catch (err) {
    return {
      statusCode: 500,
      body: JSON.stringify({ error: err.message }),
    };
  }
};
