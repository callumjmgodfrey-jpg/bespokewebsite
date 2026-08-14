<?php
  $page_title = 'Order Confirmed — Callum Godfrey';
  $page_desc = '';
  $og_image = 'media/portrait_hero.jpg';
  require_once __DIR__ . '/includes/head.php';
?>
<body>

<?php require_once __DIR__ . '/includes/nav.php'; ?>

<section class="confirmation-hero">
  <div class="confirmation-check reveal">
    <span class="check-mark">
      <svg viewBox="0 0 12 12"><polyline points="2,6 5,9 10,3"/></svg>
    </span>
    Order confirmed
  </div>
  <h1 class="confirmation-title reveal reveal-d1">They're<br>being made.</h1>
</section>

<div class="confirmation-body">
  <div>
    <p class="confirmation-lead reveal">
      Payment received — your order is confirmed and I'll get started shortly.<br><br>
      <em>Everything is cut and sewn by hand. I'll be in touch via email with updates as your jeans take shape.</em>
    </p>
    <a href="index.php" class="back-link reveal reveal-d1">Back to the site</a>
  </div>

  <div class="next-steps">
    <span class="next-steps-label reveal">What happens next</span>
    <ol class="steps-list">
      <li class="step reveal">
        <span class="step-num">01</span>
        <div class="step-text">
          <strong>I receive your order</strong>
          Your details land in my workshop — size, measurements, shipping address. I'll review everything personally.
        </div>
      </li>
      <li class="step reveal">
        <span class="step-num">02</span>
        <div class="step-text">
          <strong>I'll email you</strong>
          Expect a message from me within a day or two to confirm your order and let you know when I'll start cutting.
        </div>
      </li>
      <li class="step reveal">
        <span class="step-num">03</span>
        <div class="step-text">
          <strong>I make your jeans</strong>
          Pattern, cut, and sewn by hand — typically 2 to 4 weeks from when I start.
        </div>
      </li>
      <li class="step reveal">
        <span class="step-num">04</span>
        <div class="step-text">
          <strong>Shipped to you</strong>
          I'll send tracking once they're on their way. Repairs are free for life — you just cover return shipping.
        </div>
      </li>
    </ol>
  </div>
</div>

<div class="rule"></div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>


</body>
</html>
