# Bespoke Denim — Order Page Setup

## What's in this folder

```
bespoke-denim/
├── index.html                        ← The order page
├── netlify.toml                      ← Netlify config
├── netlify/
│   └── functions/
│       └── submit-order.js           ← Backend that sends to Notion
└── SETUP.md                          ← This file
```

---

## Step 1 — Get your Notion API key

1. Go to https://www.notion.so/my-integrations
2. Click "New integration"
3. Name it "Bespoke Denim Orders", click Submit
4. Copy the "Internal Integration Token" — this is your NOTION_API_KEY

Then connect it to your database:
1. Open your Order Tracking database in Notion
2. Click the ··· menu (top right) → "Add connections"
3. Search for "Bespoke Denim Orders" and connect it

---

## Step 2 — Get your Notion Database ID

Your Order Tracking database URL looks like:
  https://www.notion.so/abc123def456...

The Database ID is the long string of characters after notion.so/ — copy it.
It looks like: ad2c986783de449ab2756ab70f615b6c

---

## Step 3 — Deploy to Netlify

1. Go to https://netlify.com and sign up free
2. Click "Add new site" → "Deploy manually"
3. Drag and drop this entire `bespoke-denim` FOLDER onto the deploy zone
4. Wait ~10 seconds for it to go live

---

## Step 4 — Add your secret keys in Netlify

1. In Netlify, go to your site → Site configuration → Environment variables
2. Add two variables:

   Key: NOTION_API_KEY
   Value: (paste your integration token from Step 1)

   Key: NOTION_DATABASE_ID
   Value: (paste your database ID from Step 2)

3. Go to Deploys → "Trigger deploy" → "Deploy site"

---

## Done!

Your page is live. Every form submission goes straight into your
Notion Order Tracking database as a new entry in "Inbox / Review" stage.

The page supports: English, Japanese, Korean, French, German.
