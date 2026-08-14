<?php
  $page_title = 'How I Design — Callum Godfrey';
  $page_desc = 'Every pair starts in CLO3D. How Callum Godfrey designs bespoke jeans digitally before cutting a single thread of Japanese selvedge denim.';
  $og_image = 'media/product_indigo_cuff.jpeg';
  require_once __DIR__ . '/includes/head.php';
?>
<body>

<div id="page-overlay"></div>

<?php require_once __DIR__ . '/includes/nav.php'; ?>

<section class="page-header">
  <span class="page-header-eyebrow reveal">The process</span>
  <h1 class="page-header-title reveal reveal-d1">how i design<br>before i cut<em>.</em></h1>
  <p class="page-header-sub reveal reveal-d2">Every pair starts as a digital pattern in CLO3D. I can see how it fits, how it drapes, how it moves — before a single thread of selvedge denim is touched.</p>
</section>

<section class="intro">
  <div>
    <h2 class="intro-heading reveal">Most people work from<br>a block and guess.<br><em>I don't guess.</em></h2>
  </div>
  <div class="intro-body">
    <p class="reveal">The traditional way to make trousers is to start from a basic block — a flat pattern adapted from a standard size — and then fit and adjust on a real person, cutting fabric, pinning, re-cutting. It works. But every mistake costs fabric, and fabric is the most expensive part of the whole process.</p>
    <p class="reveal reveal-d1">CLO3D is 3D garment simulation software. It was built for the fashion industry — brands like Levi's and Acne use it for development. I use it at the start of every commission to build, fit and refine the pattern digitally before anything is cut.</p>
    <p class="reveal reveal-d2">The result is that by the time I pick up scissors, <strong>I already know the pair fits</strong>. Not approximately — precisely.</p>
  </div>
</section>

<!-- 3D MODEL — scroll-driven rotation coming soon -->
<div class="model-section reveal">
  <div class="model-placeholder">
    <span class="model-placeholder-label">CLO3D — 001 Wide Bootcut</span>
    <span class="model-placeholder-note">3D model coming soon</span>
    <span class="model-placeholder-sub">Scroll to rotate the virtual garment — see the drape, the fit, the selvedge ID from every angle.</span>
  </div>
  <p class="model-caption">Virtual fit preview — CLO3D simulation, raw Japanese 14oz selvedge</p>
</div>

<section class="process">
  <p class="process-heading reveal">Step by step</p>

  <div class="process-steps">

    <div class="process-step reveal">
      <span class="process-step-num">01</span>
      <h3 class="process-step-title">The brief.<br><em>Your measurements, your fit.</em></h3>
      <p class="process-step-body">When you order, you tell me your measurements and which sizing option you want — standard or made to measure. For MTM, I build the pattern from your body. Natural waist, high hip, inseam: three numbers that determine everything. No averaging, no grading up or down from a closest size.</p>
    </div>

    <div class="process-step reveal">
      <span class="process-step-num">02</span>
      <h3 class="process-step-title">Digital pattern<br><em>drafting in CLO3D.</em></h3>
      <p class="process-step-body">I draft the pattern directly in CLO3D — waistband, yoke, front and back panels, fly facing, pockets. Every seam is drawn as a vector shape. The software stitches the 2D panels together in real time and simulates how the fabric would hang on a virtual body, accounting for the weight and stretch of the actual denim I'm using. <strong>14oz selvedge behaves differently to regular cotton</strong> — CLO3D knows that.</p>
    </div>

    <div class="process-step reveal">
      <span class="process-step-num">03</span>
      <h3 class="process-step-title">Virtual fitting.<br><em>Adjust before cutting.</em></h3>
      <p class="process-step-body">I can see the seat, the thigh, the break at the ankle — all before I've touched the fabric. If the high hip is pulling or the inseam is landing wrong, I correct it in the pattern. This is the part that would normally require a muslin toile, a fitting, and another round of cuts. I do it in software instead. <strong>No wasted denim. No guessing.</strong></p>
    </div>

    <div class="process-step reveal">
      <span class="process-step-num">04</span>
      <h3 class="process-step-title">From screen<br><em>to selvedge.</em></h3>
      <p class="process-step-body">Once the pattern is locked, I export the pieces and print them full-scale. Then I lay them on the fabric — selvedge edge aligned, grain line straight — and cut by hand. No laser cutter, no die press. A rotary blade, a ruler and a cutting mat. Slow, deliberate, one piece at a time.</p>
    </div>

    <div class="process-step reveal">
      <span class="process-step-num">05</span>
      <h3 class="process-step-title">Hand sewn.<br><em>Start to finish.</em></h3>
      <p class="process-step-body">Every seam is sewn on a single-needle industrial machine. Flat-felled inseam, chain-stitched outseam, bar-tacked stress points. The button fly is set by hand. The selvedge ID runs along the outseam at the hem — you can see it when you roll the cuff. That's the mark. <strong>Three to five weeks from order to your door.</strong></p>
    </div>

  </div>
</section>

<div class="specs-strip reveal">
  <div class="spec-item">
    <p class="spec-label">Software</p>
    <p class="spec-value">CLO3D</p>
  </div>
  <div class="spec-item" style="padding-left:40px">
    <p class="spec-label">Fabric</p>
    <p class="spec-value">Japanese 14oz selvedge</p>
  </div>
  <div class="spec-item" style="padding-left:40px">
    <p class="spec-label">Construction</p>
    <p class="spec-value">Hand cut, hand sewn</p>
  </div>
  <div class="spec-item">
    <p class="spec-label">Output</p>
    <p class="spec-value">Four pairs a month</p>
  </div>
</div>

<div class="photo-split">
  <img src="media/product_indigo_cuff.jpeg" alt="Selvedge cuff detail" class="reveal" loading="lazy">
  <img src="media/product_ecru_front.jpeg" alt="Ecru colourway" class="reveal reveal-d1" loading="lazy">
</div>

<section class="cta-section">
  <h2 class="cta-heading reveal">Ready to order<br>your pair<em>?</em></h2>
  <a href="order.php" class="cta-link reveal reveal-d1">Start your order →</a>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>


</body>
</html>
