# Callum Godfrey — Bespoke Denim website

Static site for bespoke selvedge jeans, hosted on Netlify with Stripe checkout.

## Layout

```
netlify.toml                 Netlify config (publish folder, functions, security headers)
package.json                 Function dependencies (stripe)
bespoke-denim/               The published site
  index.html                 Home + catalog
  order.html                 Product page and checkout form (catalog lives in the CATALOG array)
  about / process / sizing / care / repairs / faq / confirmation .html
  media/                     Images and video
  netlify/functions/
    create-checkout.js       Creates a Stripe Checkout session (server-side prices live here)
    stripe-webhook.js        On payment: adds the order to Notion and emails customer + owner via Brevo
    get-session.js           Loads order details for the confirmation page
    latest-video.js          Returns the newest YouTube video for the home page
    submission-count.js      Counter stored as a Netlify env var (not currently used by any page)
```

## Order flow

1. Customer fills in `order.html` and is sent to Stripe Checkout (`create-checkout`).
2. Stripe calls `stripe-webhook` on `checkout.session.completed`, which creates a page in the
   Notion order database and sends confirmation emails through Brevo.
3. Stripe redirects to `confirmation.html`, which shows the order using `get-session`.

Prices are set in two places and must match: `CATALOG` in `order.html` (display) and
`PRODUCT_CATALOG` in `create-checkout.js` (what is actually charged).

## Deploying

The repo is deployed by Netlify from the repository root; `netlify.toml` publishes `bespoke-denim/`.

Environment variables (Netlify → Site configuration → Environment variables):

| Variable | Used for |
|---|---|
| `STRIPE_SECRET_KEY` | Creating and reading checkout sessions |
| `STRIPE_WEBHOOK_SECRET` | Verifying Stripe webhook calls |
| `NOTION_API_KEY` | Writing orders to Notion |
| `NOTION_DATABASE_ID` | The Notion order database |
| `BREVO_API_KEY` | Sending order emails |
| `NETLIFY_API_TOKEN` | `submission-count` only |

In Stripe, add a webhook endpoint pointing at
`https://<your-site>/.netlify/functions/stripe-webhook` for the `checkout.session.completed` event.

In Notion, share the order database with your integration (··· → Add connections).

The site supports English, Japanese, Korean, French and German.
