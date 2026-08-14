<?php
  $page_title = '001 — Wide Bootcut — Callum Godfrey';
  $page_desc = 'Apply for a bespoke pair of jeans. Callum Godfrey makes hand-cut, hand-sewn selvedge denim in Wellington, New Zealand.';
  $og_image = 'media/portrait_hero.jpg';
  require_once __DIR__ . '/includes/head.php';
?>
<body>

<!-- NAV -->
<?php require_once __DIR__ . '/includes/nav.php'; ?>

<div class="product-layout">

  <!-- LEFT: GALLERY -->
  <div class="gallery">
    <div class="gallery-main" id="gallery-main">
      <img id="gallery-main-img" src="media/product_indigo_cuff.jpeg" alt="001 — 14oz Japanese Selvedge Wide Bootcut, selvedge cuff detail">
    </div>
    <div class="gallery-thumbs">
      <div class="gallery-thumb active" onclick="setMedia(this,'img','media/product_indigo_cuff.jpeg')">
        <img src="media/product_indigo_cuff.jpeg" alt="Raw indigo — selvedge cuff">
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'img','media/product_indigo_front_2.jpeg')">
        <img src="media/product_indigo_front_2.jpeg" alt="Raw indigo — front">
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'img','media/product_indigo_front.jpeg')">
        <img src="media/product_indigo_front.jpeg" alt="Raw indigo — unwashed front">
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'img','media/product_ecru_front.jpeg')">
        <img src="media/product_ecru_front.jpeg" alt="Ecru — front">
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'img','media/product_ecru_back.jpeg')">
        <img src="media/product_ecru_back.jpeg" alt="Ecru — back">
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'img','media/DSCF5057.jpg')">
        <img src="media/DSCF5057.jpg" alt="Wearing the jeans">
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'video','media/e440244e05594853a0d76e995698ab57.mov')">
        <video src="media/e440244e05594853a0d76e995698ab57.mov" muted preload="metadata"></video>
        <div class="gallery-thumb-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'video','media/52033124d1234de2b5a76d4e38687cde.mov')">
        <video src="media/52033124d1234de2b5a76d4e38687cde.mov" muted preload="metadata"></video>
        <div class="gallery-thumb-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'video','media/be6deb4603634d15901532b85076077d.mov')">
        <video src="media/be6deb4603634d15901532b85076077d.mov" muted preload="metadata"></video>
        <div class="gallery-thumb-play"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg></div>
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'img','media/bts_sewing_2.png')">
        <img src="media/bts_sewing_2.png" alt="Sewing by hand">
      </div>
      <div class="gallery-thumb" onclick="setMedia(this,'img','media/bts_pattern_2.png')">
        <img src="media/bts_pattern_2.png" alt="Pattern making">
      </div>
    </div>
  </div>

  <!-- RIGHT: PRODUCT PANEL -->
  <div class="product-panel">

    <!-- Language switcher removed -->

    <!-- Product header -->
    <span class="product-eyebrow" id="l-eyebrow">001 — Wide Bootcut</span>
    <h1 class="product-name" id="l-product-name">14oz Japanese<br>Selvedge</h1>

    <div class="product-price-row">
      <span class="product-price" id="price-standard">NZD $500</span>
      <span class="product-price-mtm" id="l-price-mtm-note">/ <span id="price-mtm">NZD $550</span> made to measure</span>
    </div>

    <!-- Currency -->
    <div class="currency-row">
      <span class="currency-label" id="l-currency">Prices in</span>
      <button type="button" class="currency-pill active" onclick="setCurrency(this,'USD')">USD</button>
      <button type="button" class="currency-pill" onclick="setCurrency(this,'NZD')">NZD</button>
      <button type="button" class="currency-pill" onclick="setCurrency(this,'AUD')">AUD</button>
      <button type="button" class="currency-pill" onclick="setCurrency(this,'EUR')">EUR</button>
      <button type="button" class="currency-pill" onclick="setCurrency(this,'GBP')">GBP</button>
      <button type="button" class="currency-pill" onclick="setCurrency(this,'JPY')">JPY</button>
      <button type="button" class="currency-pill" onclick="setCurrency(this,'KRW')">KRW</button>
    </div>

    <p class="product-desc" id="l-desc">Hand-cut and sewn to order from raw Japanese 14oz indigo selvedge. One style, one fabric. Each pair is built individually — no stock, no shortcuts.</p>

    <div class="spec-chips">
      <span class="spec-chip">14oz selvedge</span>
      <span class="spec-chip">Indigo</span>
      <span class="spec-chip" id="l-spec-lead">2–8 weeks</span>
    </div>

    <!-- Batch closed state -->
    <div class="form-closed" id="formClosed">
      <h2 class="form-closed-title">Batch 001 is full.</h2>
      <p class="form-closed-body" id="l-closed-body">All commission slots for Batch 001 have been filled. Drop your email below and you'll be first to know when Batch 002 opens.</p>
      <div class="form-closed-signup">
        <input class="form-closed-input" type="email" placeholder="your@email.com" id="closedEmail" />
        <button class="form-closed-btn" onclick="submitWaitlist()" id="l-closed-btn">Join waitlist</button>
      </div>
      <p class="form-closed-msg" id="closedMsg"></p>
    </div>

    <div id="main-form-wrap">

      <div class="form-divider"></div>

      <form id="orderForm" autocomplete="off" novalidate>
        <input type="hidden" id="currency" name="currency" value="USD">
        <div class="hp-field" aria-hidden="true">
          <label for="_hp">Leave this empty</label>
          <input type="text" id="_hp" name="_hp" tabindex="-1" autocomplete="off">
        </div>

        <!-- SIZING -->
        <span class="form-section-label" id="l-sizing-label">Sizing</span>
        <div class="sizing-options">
          <div class="sizing-option" id="opt-standard" onclick="selectSizing('Standard sizes')">
            <input type="radio" name="sizingType" value="Standard sizes">
            <p class="sizing-option-title" id="l-opt-standard">Standard sizing</p>
            <p class="sizing-option-price" id="price-opt-standard">NZD $500</p>
          </div>
          <div class="sizing-option" id="opt-mtm" onclick="selectSizing('Made to measure')">
            <input type="radio" name="sizingType" value="Made to measure">
            <p class="sizing-option-title" id="l-opt-mtm">Made to measure</p>
            <p class="sizing-option-price" id="price-opt-mtm">NZD $550</p>
          </div>
        </div>
        <p class="field-error" id="err-sizing"></p>

        <!-- Standard size pickers -->
        <div class="size-subsection" id="standard-size-section">
          <span class="size-sub-label" id="l-waist-size">Waist</span>
          <div class="size-btn-grid" id="waist-btn-grid">
            <button type="button" class="size-btn" onclick="selectWaist(this,'W28')">W28</button>
            <button type="button" class="size-btn" onclick="selectWaist(this,'W30')">W30</button>
            <button type="button" class="size-btn" onclick="selectWaist(this,'W32')">W32</button>
            <button type="button" class="size-btn" onclick="selectWaist(this,'W34')">W34</button>
            <button type="button" class="size-btn" onclick="selectWaist(this,'W36')">W36</button>
          </div>
          <p class="field-error" id="err-size"></p>
          <div style="margin-top:20px;">
            <span class="size-sub-label" id="l-inseam-size">Inseam</span>
            <div class="size-btn-grid" id="inseam-btn-grid">
              <button type="button" class="size-btn" onclick="selectInseamStd(this,'L30')">L30</button>
              <button type="button" class="size-btn" onclick="selectInseamStd(this,'L32')">L32</button>
              <button type="button" class="size-btn" onclick="selectInseamStd(this,'L34')">L34</button>
            </div>
            <p class="field-error" id="err-inseam-std"></p>
          </div>
        </div>

        <!-- MTM measurements -->
        <div class="size-subsection" id="measurements-section">
          <p class="size-sub-label" id="l-measurements-title">Your measurements</p>
          <div class="measurements-grid">
            <div class="form-group">
              <label for="naturalWaist"><span id="l-waist">Natural waist</span> <span class="required">*</span></label>
              <input type="number" id="naturalWaist" name="naturalWaist" min="50" max="150" step="0.5" placeholder="cm">
              <p class="field-error" id="err-waist"></p>
            </div>
            <div class="form-group">
              <label for="highHip"><span id="l-hip">High hip</span> <span class="required">*</span></label>
              <input type="number" id="highHip" name="highHip" min="60" max="160" step="0.5" placeholder="cm">
              <p class="field-error" id="err-hip"></p>
            </div>
            <div class="form-group">
              <label for="inseam"><span id="l-inseam">Inseam</span> <span class="required">*</span></label>
              <input type="number" id="inseam" name="inseam" min="50" max="120" step="0.5" placeholder="cm">
              <p class="field-error" id="err-inseam"></p>
            </div>
          </div>
          <p class="measure-hint" id="l-measure-hint">All in cm. If you're not sure how to measure, please double-check before submitting — I can't offer remakes for incorrect numbers.</p>
        </div>

        <div class="form-divider"></div>

        <!-- SHIPPING -->
        <span class="form-section-label" id="l-shipping-label">Shipping</span>
        <div class="ship-grid">
          <div class="ship-tile" data-region="nz" onclick="selectShipRegion(this,'nz')">
            <span class="ship-tile-label" id="l-ship-nz">New Zealand</span>
            <span class="ship-tile-price">~NZD $20</span>
          </div>
          <div class="ship-tile" data-region="au" onclick="selectShipRegion(this,'au')">
            <span class="ship-tile-label" id="l-ship-au">Australia</span>
            <span class="ship-tile-price">~NZD $40</span>
          </div>
          <div class="ship-tile" data-region="jpkr" onclick="selectShipRegion(this,'jpkr')">
            <span class="ship-tile-label" id="l-ship-jpkr">Japan / Korea</span>
            <span class="ship-tile-price">~NZD $60</span>
          </div>
          <div class="ship-tile" data-region="namerica" onclick="selectShipRegion(this,'namerica')">
            <span class="ship-tile-label" id="l-ship-namerica">USA / Canada</span>
            <span class="ship-tile-price">~NZD $70</span>
          </div>
          <div class="ship-tile" data-region="ukeu" onclick="selectShipRegion(this,'ukeu')">
            <span class="ship-tile-label" id="l-ship-ukeu">UK / Europe</span>
            <span class="ship-tile-price">~NZD $75</span>
          </div>
          <div class="ship-tile" data-region="row" onclick="selectShipRegion(this,'row')">
            <span class="ship-tile-label" id="l-ship-row">Rest of world</span>
            <span class="ship-tile-price">~NZD $85</span>
          </div>
        </div>
        <div class="ship-total-row" id="ship-total-wrap">
          <span class="ship-total-label" id="l-ship-total">Estimated total</span>
          <span class="ship-total-value" id="ship-total"></span>
        </div>
        <p class="ship-note-text" id="l-ship-note">Shipped tracked via DHL Express. Estimates only — exact shipping is invoiced with your final balance. Import duties, if any, are the buyer's responsibility.</p>
        <p class="field-error" id="err-shipping"></p>

        <div class="form-divider"></div>

        <!-- YOUR DETAILS -->
        <span class="form-section-label" id="l-details-label">Your details</span>
        <div class="form-group">
          <label for="clientName"><span id="l-name">Name</span> <span class="required">*</span></label>
          <input type="text" id="clientName" name="clientName" autocomplete="name">
          <p class="field-error" id="err-name"></p>
        </div>
        <div class="form-group">
          <label for="email"><span id="l-email">Email</span> <span class="required">*</span></label>
          <input type="email" id="email" name="email" autocomplete="email">
          <p class="field-error" id="err-email"></p>
        </div>

        <div class="form-divider"></div>

        <!-- T&CS -->
        <label class="form-section-label" id="l-tcs-label">Terms &amp; conditions <span class="required">*</span></label>
        <div class="tcs-toggle" onclick="toggleTcs()" id="tcs-toggle" role="button" aria-expanded="false">
          <span class="tcs-toggle-label" id="l-tcs-toggle">Read before you submit</span>
          <span class="tcs-arrow" id="tcs-arrow">▼</span>
        </div>
        <div class="tcs-body" id="tcs-body">
          <div class="tcs-scroll" id="tcs-scroll" onscroll="checkTcsScroll()">
            <div id="tcs-content"></div>
          </div>
          <p class="tcs-read-note" id="l-tcs-read-note" style="display:none;"></p>
          <div class="tcs-footer">
            <input type="checkbox" id="tcsAccepted" name="tcsAccepted" disabled onchange="updateSubmitState()">
            <label for="tcsAccepted" id="l-tcs-checkbox">I've read and agree to the terms &amp; conditions</label>
          </div>
        </div>
        <p class="field-error" id="err-tcs"></p>

        <!-- SUBMIT -->
        <button type="submit" class="submit-btn" id="submitBtn">
          <span id="l-submit">Apply for 001 — NZD $<span id="btn-total">500</span></span>
        </button>
        <p class="submit-note" id="l-submit-note">You'll be taken to Stripe's secure checkout. Card, Apple Pay, and Google Pay accepted.</p>

        <div class="form-message" id="form-success"></div>
        <div class="form-message error-msg" id="form-error"></div>

      </form>
    </div><!-- /main-form-wrap -->

  </div><!-- /product-panel -->
</div><!-- /product-layout -->

<div class="rule"></div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>


<script>
// ── Translations ──
const translations = {
  en: {
    eyebrow: '001 — Wide Bootcut',
    productName: '14oz Japanese Selvedge',
    desc: 'Hand-cut and sewn to order from raw Japanese 14oz indigo selvedge. One style, one fabric. Each pair is built individually — no stock, no shortcuts.',
    priceMtmNote: '/ {mtm} made to measure',
    currency: 'Prices in',
    specLead: '2–8 weeks',
    sizingLabel: 'Sizing',
    optStandard: 'Standard sizing', optMtm: 'Made to measure',
    measurementsTitle: 'Your measurements', waist: 'Natural waist', hip: 'High hip', inseam: 'Inseam',
    measureHint: 'All in cm. If you\'re not sure how to measure, please double-check before submitting — I can\'t offer remakes for incorrect numbers.',
    waistSize: 'Waist', inseamSize: 'Inseam',
    shippingLabel: 'Shipping',
    shipNZ: 'New Zealand', shipAU: 'Australia', shipJPKR: 'Japan / Korea', shipNA: 'USA / Canada', shipUKEU: 'UK / Europe', shipROW: 'Rest of world',
    shipTotal: 'Estimated total',
    shipNote: "Shipped tracked via DHL Express. Estimates only — exact shipping is invoiced with your final balance. Import duties, if any, are the buyer's responsibility.",
    detailsLabel: 'Your details',
    name: 'Name', email: 'Email',
    tcsLabel: 'Terms & conditions', tcsToggle: 'Read before you submit',
    tcsReadNote: 'Scroll to read all terms before accepting.',
    tcsCheckbox: 'I\'ve read and agree to the terms & conditions',
    submit: 'Submit application', submitting: 'Sending…',
    submitNote: 'Submitting this form does not charge you. This is an application for a commission slot.',
    successMsg: "✓ Application received — I'll be in touch via email soon.",
    errorMsg: 'Something went wrong — try again or email me directly.',
    errRequired: 'This field is required.',
    errEmail: 'Please enter a valid email address.',
    errTcs: 'You\'ll need to read and accept the T&Cs before submitting.',
    closedBody: 'All commission slots for Batch 001 have been filled. Drop your email below and you\'ll be first to know when Batch 002 opens.',
    closedBtn: 'Join waitlist',
    tcs: `<p><strong>Payment &amp; Final Sales</strong><br>Payment is taken in full at the time of order. Because each pair is cut and sewn specifically to your order, all sales are final once payment is made. No refunds are offered after this point.</p>
<p><strong>Measurement Accuracy</strong><br>You are strictly responsible for the measurements and size selections you provide. If you select a standard size or provide made-to-measure numbers that are incorrect, a refund or free remake cannot be offered. Please consult the sizing guide before ordering.</p>
<p><strong>The Nature of Raw Denim</strong><br>You acknowledge that this garment is made from raw, unsanforized Japanese 14oz indigo denim. Expect 3–5% shrinkage in length on the first wash — this is normal and intentional. Indigo dye will transfer onto lighter surfaces (crocking) during initial wear. Cold wash only, hang dry. Full care instructions are available at callumgodfrey.com/care.php.</p>
<p><strong>Lead Times</strong><br>Everything is made by a single maker. Estimated lead times of 2–8 weeks from the start of your order are estimates, not guarantees. I'll be in touch personally once I begin work on your pair.</p>
<p><strong>Shipping &amp; Delivery</strong><br>Shipping costs are included in your order total. All orders are sent via tracked courier. Import duties or taxes levied by your country are your responsibility.</p>
<p><strong>Lifetime Repairs</strong><br>Free repairs for life — you cover return shipping both ways. See callumgodfrey.com/repairs.php for details.</p>`
  },
  ja: {
    eyebrow: '001 — ワイドブーツカット',
    productName: '14ozジャパニーズセルビッジ',
    desc: '生の日本製14ozインディゴセルビッジから、オーダーごとに手裁断・手縫製。一スタイル、一生地。在庫なし。',
    priceMtmNote: '/ {mtm} メイドトゥメジャー',
    currency: '通貨',
    specLead: '2〜8週間',
    sizingLabel: 'サイズ選択',
    optStandard: 'スタンダードサイズ', optMtm: 'メイドトゥメジャー',
    measurementsTitle: '採寸データ', waist: 'ウエスト', hip: 'ハイヒップ', inseam: '股下',
    measureHint: '単位はcmでご入力ください。不明な場合はご提出前にご確認ください。',
    waistSize: 'ウエスト幅', inseamSize: '股下レングス',
    shippingLabel: '配送地域',
    shipNZ: 'ニュージーランド', shipAU: 'オーストラリア', shipJPKR: '日本・韓国', shipNA: 'アメリカ・カナダ', shipUKEU: 'イギリス・ヨーロッパ', shipROW: 'その他の地域',
    shipTotal: '合計（概算）',
    shipNote: 'DHLエクスプレスの追跡付き配送。表示は概算です。正確な送料は最終請求書に含まれます。輸入関税が発生する場合は購入者のご負担となります。',
    detailsLabel: 'お客様情報',
    name: 'お名前', email: 'メールアドレス',
    tcsLabel: '利用規約', tcsToggle: '利用規約を読む',
    tcsReadNote: '承諾前にすべての規約をお読みください。',
    tcsCheckbox: '利用規約を読み、同意します',
    submit: '注文する', submitting: '送信中…',
    submitNote: 'このフォームの送信は課金されません。',
    successMsg: '✓ ご注文を承りました。近日中にメールにてご連絡いたします。',
    errorMsg: 'エラーが発生しました。再度お試しいただくか、直接ご連絡ください。',
    errRequired: 'この項目は必須です。', errEmail: '有効なメールアドレスを入力してください。',
    errTcs: '利用規約をお読みの上、同意してください。',
    closedBody: 'バッチ001の全スロットが埋まりました。メールアドレスをご登録いただくと、バッチ002のオープン時に最初にお知らせします。',
    closedBtn: 'ウェイトリストに登録',
    tcs: `<p><strong>お支払いと最終販売</strong><br>お支払いはご注文時に全額いただきます。各ペアはお客様のご注文に合わせて裁断・縫製されるため、お支払い後の返金はお受けできません。</p>
<p><strong>採寸の正確性</strong><br>お客様が提供するサイズ・採寸データについては、お客様が完全に責任を負うものとします。誤りがあった場合、返金・再製作はお受けできません。ご注文前にサイズガイドをご確認ください。</p>
<p><strong>生デニムの特性について</strong><br>本製品は未洗いの日本製14ozインディゴデニムから製造されています。初回洗濯で丈が3〜5%縮むことがあります（パターンに考慮済み）。インディゴ染料は明るい表面に色移りすることがあります。冷水洗いのみ、吊り干しにしてください。</p>
<p><strong>リードタイム</strong><br>推定リードタイム（2〜8週間）はあくまでも目安であり、保証ではありません。制作開始時に直接ご連絡いたします。</p>
<p><strong>配送について</strong><br>送料はご注文総額に含まれています。追跡付き配送でお届けします。輸入関税が発生する場合はお客様のご負担となります。</p>
<p><strong>生涯修理保証</strong><br>修理は無料で承ります（返送料はお客様負担）。詳細はcallumgodfrey.com/repairs.phpをご覧ください。</p>`
  },
  ko: {
    eyebrow: '001 — 와이드 부츠컷',
    productName: '14온스 재패니즈 셀비지',
    desc: '원단 일본제 14온스 인디고 셀비지로 주문 제작됩니다. 하나의 스타일, 하나의 원단. 재고 없음.',
    priceMtmNote: '/ {mtm} 맞춤 제작',
    currency: '통화',
    specLead: '2–8주',
    sizingLabel: '사이즈',
    optStandard: '표준 사이즈', optMtm: '맞춤 제작',
    measurementsTitle: '측정 데이터', waist: '자연 허리', hip: '하이 힙', inseam: '안쪽 솔기',
    measureHint: '모든 측정값은 cm 단위로 입력하세요.',
    waistSize: '허리', inseamSize: '안쪽 솔기 길이',
    shippingLabel: '배송 지역',
    shipNZ: '뉴질랜드', shipAU: '호주', shipJPKR: '일본 / 한국', shipNA: '미국 / 캐나다', shipUKEU: '영국 / 유럽', shipROW: '기타 지역',
    shipTotal: '예상 총액',
    shipNote: 'DHL 익스프레스 추적 배송. 표시 금액은 예상치이며 정확한 배송비는 최종 청구서에 포함됩니다.',
    detailsLabel: '고객 정보',
    name: '이름', email: '이메일 주소',
    tcsLabel: '이용약관', tcsToggle: '이용약관 읽기',
    tcsReadNote: '동의하기 전에 모든 약관을 읽어주세요.',
    tcsCheckbox: '이용약관을 읽고 동의합니다',
    submit: '주문하기', submitting: '제출 중…',
    submitNote: '이 양식을 제출해도 결제가 이루어지지 않습니다.',
    successMsg: '✓ 주문이 접수되었습니다. 곧 이메일로 연락드리겠습니다.',
    errorMsg: '오류가 발생했습니다. 다시 시도하거나 직접 문의해 주세요.',
    errRequired: '이 항목은 필수입니다.', errEmail: '유효한 이메일 주소를 입력하세요.',
    errTcs: '이용약관을 읽고 동의해 주세요.',
    closedBody: '배치 001의 모든 슬롯이 찼습니다. 배치 002가 열리면 가장 먼저 알려드리겠습니다.',
    closedBtn: '대기자 명단 등록',
    tcs: `<p><strong>결제 및 최종 판매</strong><br>결제는 주문 시 전액 이루어집니다. 각 청바지는 고객님의 주문에 맞게 재단·봉제되므로 결제 후에는 환불이 불가합니다.</p>
<p><strong>측정 정확도</strong><br>제공하신 사이즈 및 측정값에 대해 고객님이 전적으로 책임을 지십니다. 잘못된 정보로 인한 환불 또는 무료 재제작은 불가합니다. 주문 전 사이즈 가이드를 확인하세요.</p>
<p><strong>로우 데님의 특성</strong><br>미세탁(생) 일본제 14oz 인디고 데님으로 제작됩니다. 첫 세탁 시 길이가 3~5% 수축될 수 있습니다(패턴에 반영됨). 인디고 염료는 밝은 표면에 이염될 수 있습니다. 냉수 세탁만 가능하며, 걸어서 건조하세요.</p>
<p><strong>리드 타임</strong><br>예상 제작 기간(2~8주)은 추정치이며 보장이 아닙니다. 제작 시작 시 직접 연락드립니다.</p>
<p><strong>배송</strong><br>배송비는 주문 총액에 포함되어 있습니다. 추적 가능한 택배로 발송됩니다. 수입 관세는 고객 부담입니다.</p>
<p><strong>평생 수선 보증</strong><br>수선은 무료입니다(반송료 고객 부담). 자세한 내용은 callumgodfrey.com/repairs.php을 확인하세요.</p>`
  },
  fr: {
    eyebrow: '001 — Wide Bootcut',
    productName: 'Selvedge Japanese 14oz',
    desc: 'Coupé et cousu à la main sur commande, en denim indigo brut japonais 14oz. Un style, un tissu. Pas de stock, pas de compromis.',
    priceMtmNote: '/ {mtm} sur mesure',
    currency: 'Devise',
    specLead: '2–8 semaines',
    sizingLabel: 'Taille',
    optStandard: 'Taille standard', optMtm: 'Sur mesure',
    measurementsTitle: 'Vos mesures', waist: 'Tour de taille', hip: 'Tour de hanche haute', inseam: 'Entrejambe',
    measureHint: 'Toutes les mesures en cm. Consultez le guide si vous n\'êtes pas sûr.',
    waistSize: 'Tour de taille', inseamSize: 'Longueur de jambe',
    shippingLabel: 'Expédition',
    shipNZ: 'Nouvelle-Zélande', shipAU: 'Australie', shipJPKR: 'Japon / Corée', shipNA: 'USA / Canada', shipUKEU: 'Royaume-Uni / Europe', shipROW: 'Reste du monde',
    shipTotal: 'Total estimé',
    shipNote: "Expédition suivie via DHL Express. Estimations uniquement — les frais exacts sont facturés avec votre solde final.",
    detailsLabel: 'Vos coordonnées',
    name: 'Nom complet', email: 'Adresse e-mail',
    tcsLabel: 'Conditions générales', tcsToggle: 'Lire avant de soumettre',
    tcsReadNote: 'Faites défiler pour lire toutes les conditions avant d\'accepter.',
    tcsCheckbox: 'J\'ai lu et j\'accepte les conditions générales',
    submit: 'Soumettre', submitting: 'Envoi en cours…',
    submitNote: 'La soumission de ce formulaire ne génère aucun paiement.',
    successMsg: '✓ Votre commande a été reçue. Nous vous contacterons par e-mail sous peu.',
    errorMsg: 'Une erreur s\'est produite. Veuillez réessayer ou nous contacter directement.',
    errRequired: 'Ce champ est obligatoire.', errEmail: 'Veuillez saisir une adresse e-mail valide.',
    errTcs: 'Veuillez lire et accepter les conditions générales.',
    closedBody: 'Tous les créneaux du Lot 001 sont réservés. Laissez votre e-mail pour être prévenu à l\'ouverture du Lot 002.',
    closedBtn: 'Rejoindre la liste d\'attente',
    tcs: `<p><strong>Paiement et ventes définitives</strong><br>Le paiement est encaissé en totalité au moment de la commande. Chaque paire étant coupée et cousue spécifiquement pour vous, toutes les ventes sont définitives après paiement.</p>
<p><strong>Précision des mesures</strong><br>Vous êtes entièrement responsable des tailles et mesures fournies. En cas d'erreur, aucun remboursement ni remake gratuit ne pourra être proposé. Consultez le guide des tailles avant de commander.</p>
<p><strong>Nature du denim brut</strong><br>Ce jean est fabriqué en denim japonais 14oz brut non sanforisé. Attendez-vous à un rétrécissement de 3 à 5 % en longueur au premier lavage (pris en compte dans le patron). La teinture indigo peut déteindre sur les surfaces claires. Lavage à froid uniquement, séchage suspendu.</p>
<p><strong>Délais</strong><br>Les délais estimés (2 à 8 semaines) sont indicatifs et non garantis. Je vous contacterai personnellement au début de la fabrication.</p>
<p><strong>Livraison</strong><br>Les frais de livraison sont inclus dans le total de la commande. Expédition avec suivi. Les droits de douane éventuels sont à votre charge.</p>
<p><strong>Réparations à vie</strong><br>Les réparations sont gratuites à vie (frais de retour à votre charge). Voir callumgodfrey.com/repairs.php pour plus d'informations.</p>`
  },
  de: {
    eyebrow: '001 — Wide Bootcut',
    productName: '14oz Japanese Selvedge',
    desc: 'Von Hand zugeschnitten und genäht aus rohem japanischem 14oz Indigo-Selvedge. Ein Stil, ein Stoff. Kein Lager, keine Abkürzungen.',
    priceMtmNote: '/ {mtm} maßgefertigt',
    currency: 'Währung',
    specLead: '2–8 Wochen',
    sizingLabel: 'Größe',
    optStandard: 'Standardgröße', optMtm: 'Maßgefertigt',
    measurementsTitle: 'Ihre Maße', waist: 'Natürliche Taille', hip: 'Hohe Hüfte', inseam: 'Innenbeinlänge',
    measureHint: 'Alle Maße in cm. Nutzen Sie die Maßanleitung bei Unsicherheiten.',
    waistSize: 'Bundweite', inseamSize: 'Innenbeinlänge',
    shippingLabel: 'Versand',
    shipNZ: 'Neuseeland', shipAU: 'Australien', shipJPKR: 'Japan / Korea', shipNA: 'USA / Kanada', shipUKEU: 'UK / Europa', shipROW: 'Rest der Welt',
    shipTotal: 'Geschätzte Gesamtsumme',
    shipNote: 'Versand mit Sendungsverfolgung via DHL Express. Nur Schätzwerte — die genauen Versandkosten werden mit der Endrechnung berechnet.',
    detailsLabel: 'Ihre Angaben',
    name: 'Vollständiger Name', email: 'E-Mail-Adresse',
    tcsLabel: 'Allgemeine Geschäftsbedingungen', tcsToggle: 'AGB lesen',
    tcsReadNote: 'Bitte scrollen Sie, um alle Bedingungen vor der Annahme zu lesen.',
    tcsCheckbox: 'Ich habe die AGB gelesen und stimme ihnen zu',
    submit: 'Bestellung aufgeben', submitting: 'Wird gesendet…',
    submitNote: 'Das Absenden dieses Formulars ist mit keiner Zahlung verbunden.',
    successMsg: '✓ Ihre Bestellung wurde erhalten. Wir melden uns in Kürze per E-Mail.',
    errorMsg: 'Ein Fehler ist aufgetreten. Bitte versuchen Sie es erneut oder kontaktieren Sie uns direkt.',
    errRequired: 'Dieses Feld ist erforderlich.', errEmail: 'Bitte geben Sie eine gültige E-Mail-Adresse ein.',
    errTcs: 'Bitte lesen und akzeptieren Sie die AGB.',
    closedBody: 'Alle Slots für Batch 001 sind vergeben. Hinterlassen Sie Ihre E-Mail, um als Erster über Batch 002 informiert zu werden.',
    closedBtn: 'Warteliste beitreten',
    tcs: `<p><strong>Zahlung und endgültige Verkäufe</strong><br>Die Zahlung erfolgt vollständig zum Zeitpunkt der Bestellung. Da jedes Paar speziell für Ihre Bestellung zugeschnitten und genäht wird, sind alle Verkäufe nach Zahlungseingang endgültig.</p>
<p><strong>Maßgenauigkeit</strong><br>Sie sind vollständig verantwortlich für die von Ihnen angegebenen Größen und Maße. Bei falschen Angaben können keine Rückerstattung oder kostenlose Neuanfertigung angeboten werden. Bitte lesen Sie den Größenratgeber vor der Bestellung.</p>
<p><strong>Eigenschaften von Rohdenim</strong><br>Diese Jeans wird aus rohem, nicht sanforisiertem japanischen 14oz-Denim hergestellt. Beim ersten Waschen ist mit 3–5 % Einlaufen in der Länge zu rechnen (im Schnitt berücksichtigt). Indigofarbe kann auf helle Oberflächen abfärben. Nur Kalt­wäsche, hängend trocknen.</p>
<p><strong>Lieferzeiten</strong><br>Geschätzte Lieferzeiten (2–8 Wochen) sind Schätzungen, keine Garantien. Ich werde mich persönlich melden, sobald ich mit der Arbeit beginne.</p>
<p><strong>Versand</strong><br>Die Versandkosten sind im Bestellbetrag enthalten. Versand mit Sendungsverfolgung. Einfuhrzölle gehen zu Ihren Lasten.</p>
<p><strong>Lebenslange Reparaturen</strong><br>Reparaturen sind lebenslang kostenlos (Rücksendekosten gehen zu Ihren Lasten). Weitere Informationen unter callumgodfrey.com/repairs.php.</p>`
  }
};

// ── State ──
let currentLang = 'en';
let selectedWaist = null;
let selectedInseamStd = null;
let currentRates = {};
let currentCurrency = 'USD';
const basePricesNZD = { standard: 500, mtm: 550 };
const shippingRatesNZD = { nz: 20, au: 40, jpkr: 60, namerica: 70, ukeu: 75, row: 85 };
let selectedShipRegion = null;
const currencySymbols = { NZD: 'NZD $', AUD: 'AUD $', USD: 'USD $', EUR: '€', GBP: '£', JPY: '¥', KRW: '₩' };
let selectedSizing = null;
let selectedColour = 'Indigo — 14oz Japanese selvedge';
let tcsRead = false;
let tcsOpen = false;
const langLabels = { en: 'EN', ja: '日本語', ko: '한국어', fr: 'FR', de: 'DE' };

// ── Gallery ──
function setMedia(thumb, type, src) {
  const main = document.getElementById('gallery-main');
  main.innerHTML = type === 'video'
    ? `<video src="${src}" controls autoplay loop playsinline style="max-width:100%;max-height:100%;width:auto;height:auto;display:block;outline:none;"></video>`
    : `<img id="gallery-main-img" src="${src}" alt="" style="max-width:100%;max-height:100%;width:auto;height:auto;display:block;object-fit:contain;">`;
  document.querySelectorAll('.gallery-thumb').forEach(t => t.classList.remove('active'));
  thumb.classList.add('active');
}

// ── Currency ──
async function fetchRates(currency) {
  try {
    const res = await fetch('https://api.frankfurter.app/latest?from=NZD&to=USD,AUD,EUR,GBP,JPY,KRW');
    if (res.ok) {
      const data = await res.json();
      currentRates = { NZD:1, USD:data.rates.USD, AUD:data.rates.AUD, EUR:data.rates.EUR, GBP:data.rates.GBP, JPY:data.rates.JPY, KRW:data.rates.KRW };
    }
  } catch(e) {
    currentRates = { NZD:1, USD:0.61, AUD:0.94, EUR:0.56, GBP:0.48, JPY:90, KRW:800 };
  }
  updatePrices(currency);
}

function fmtNZD(nzd, currency) {
  const rate = currentRates[currency] || 1;
  const sym = currencySymbols[currency] || 'NZD $';
  const v = Math.round(nzd * rate);
  return sym + ((currency === 'JPY' || currency === 'KRW') ? v.toLocaleString() : v);
}

function updatePrices(currency) {
  currentCurrency = currency;
  const std = fmtNZD(basePricesNZD.standard, currency);
  const mtm = fmtNZD(basePricesNZD.mtm, currency);
  document.getElementById('price-standard').textContent = std;
  document.getElementById('price-mtm').textContent = mtm;
  document.getElementById('price-opt-standard').textContent = std;
  document.getElementById('price-opt-mtm').textContent = mtm;
  updateShippingDisplay();
}

function setCurrency(btn, currency) {
  document.querySelectorAll('.currency-pill').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  const hiddenInput = document.getElementById('currency');
  if (hiddenInput) hiddenInput.value = currency;
  fetchRates(currency);
}

function updateShippingDisplay() {
  document.querySelectorAll('.ship-tile').forEach(tile => {
    const region = tile.dataset.region;
    const priceEl = tile.querySelector('.ship-tile-price');
    if (priceEl) priceEl.textContent = '~' + fmtNZD(shippingRatesNZD[region], currentCurrency);
  });
  const totalEl = document.getElementById('ship-total');
  const totalWrap = document.getElementById('ship-total-wrap');
  if (selectedShipRegion && selectedSizing && totalEl && totalWrap) {
    const base = selectedSizing === 'Made to measure' ? basePricesNZD.mtm : basePricesNZD.standard;
    totalEl.textContent = '~' + fmtNZD(base + shippingRatesNZD[selectedShipRegion], currentCurrency);
    totalWrap.classList.add('visible');
  } else if (totalWrap) {
    totalWrap.classList.remove('visible');
  }
}

function selectShipRegion(el, region) {
  selectedShipRegion = region;
  document.querySelectorAll('.ship-tile').forEach(o => o.classList.remove('selected'));
  el.classList.add('selected');
  clearError('err-shipping');
  updateShippingDisplay();
  updateBtnTotal();
}

// ── Sizing ──
function selectSizing(type) {
  selectedSizing = type;
  document.getElementById('opt-standard').classList.toggle('selected', type === 'Standard sizes');
  document.getElementById('opt-mtm').classList.toggle('selected', type === 'Made to measure');
  document.getElementById('measurements-section').classList.toggle('visible', type === 'Made to measure');
  document.getElementById('standard-size-section').classList.toggle('visible', type === 'Standard sizes');
  clearError('err-sizing');
  updateShippingDisplay();
  updateBtnTotal();
}

function selectWaist(btn, value) {
  selectedWaist = value;
  document.querySelectorAll('#waist-btn-grid .size-btn').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');
  clearError('err-size');
}

function selectInseamStd(btn, value) {
  selectedInseamStd = value;
  document.querySelectorAll('#inseam-btn-grid .size-btn').forEach(b => b.classList.remove('selected'));
  btn.classList.add('selected');
  clearError('err-inseam-std');
}

// ── Language ──
function setLang(lang) {
  currentLang = lang;
  const t = translations[lang];
  document.documentElement.lang = lang;
  document.querySelectorAll('.lang-btn').forEach(btn => {
    btn.classList.toggle('active', btn.textContent === langLabels[lang]);
  });
  const set = (id, val) => { const el = document.getElementById(id); if (el && val !== undefined) el.textContent = val; };
  set('l-eyebrow', t.eyebrow);
  set('l-product-name', t.productName);
  set('l-desc', t.desc);
  set('l-currency', t.currency);
  set('l-spec-lead', t.specLead);
  set('l-sizing-label', t.sizingLabel);
  set('l-opt-standard', t.optStandard);
  set('l-opt-mtm', t.optMtm);
  set('l-measurements-title', t.measurementsTitle);
  set('l-waist', t.waist);
  set('l-hip', t.hip);
  set('l-inseam', t.inseam);
  set('l-measure-hint', t.measureHint);
  set('l-waist-size', t.waistSize);
  set('l-inseam-size', t.inseamSize);
  set('l-shipping-label', t.shippingLabel);
  set('l-ship-nz', t.shipNZ);
  set('l-ship-au', t.shipAU);
  set('l-ship-jpkr', t.shipJPKR);
  set('l-ship-namerica', t.shipNA);
  set('l-ship-ukeu', t.shipUKEU);
  set('l-ship-row', t.shipROW);
  set('l-ship-total', t.shipTotal);
  set('l-ship-note', t.shipNote);
  set('l-details-label', t.detailsLabel);
  set('l-name', t.name);
  set('l-email', t.email);
  const tcsLabelEl = document.getElementById('l-tcs-label');
  if (tcsLabelEl) tcsLabelEl.innerHTML = t.tcsLabel + ' <span class="required">*</span>';
  set('l-tcs-toggle', t.tcsToggle);
  set('l-tcs-checkbox', t.tcsCheckbox);
  set('l-submit', t.submit);
  set('l-submit-note', t.submitNote);
  set('l-closed-body', t.closedBody);
  set('l-closed-btn', t.closedBtn);
  document.getElementById('tcs-content').innerHTML = t.tcs;
  const readNote = document.getElementById('l-tcs-read-note');
  if (readNote) {
    readNote.textContent = t.tcsReadNote;
    if (!tcsRead) readNote.style.display = tcsOpen ? 'block' : 'none';
  }
  updatePrices(currentCurrency);
}

// ── T&Cs ──
function toggleTcs() {
  tcsOpen = !tcsOpen;
  document.getElementById('tcs-body').classList.toggle('open', tcsOpen);
  document.getElementById('tcs-arrow').classList.toggle('open', tcsOpen);
  document.getElementById('tcs-toggle').setAttribute('aria-expanded', tcsOpen);
  if (tcsOpen) {
    document.getElementById('tcs-content').innerHTML = translations[currentLang].tcs;
    document.getElementById('l-tcs-read-note').textContent = translations[currentLang].tcsReadNote;
    if (!tcsRead) {
      document.getElementById('l-tcs-read-note').style.display = 'block';
      setTimeout(checkTcsScroll, 50);
    }
  }
}

function checkTcsScroll() {
  if (tcsRead) return;
  const scroll = document.getElementById('tcs-scroll');
  if (scroll.scrollTop + scroll.clientHeight >= scroll.scrollHeight - 10) {
    tcsRead = true;
    document.getElementById('tcsAccepted').disabled = false;
    document.getElementById('l-tcs-read-note').style.display = 'none';
  }
}

function updateSubmitState() {}

// ── Errors ──
function clearError(id) { const el = document.getElementById(id); if (el) el.classList.remove('visible'); }
function showError(id, msg) { const el = document.getElementById(id); if (el) { el.textContent = msg; el.classList.add('visible'); } }

// ── Validation ──
function validateForm() {
  const t = translations[currentLang];
  let valid = true;

  const name = document.getElementById('clientName').value.trim();
  if (!name) { showError('err-name', t.errRequired); valid = false; } else clearError('err-name');

  const email = document.getElementById('email').value.trim();
  if (!email) { showError('err-email', t.errRequired); valid = false; }
  else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) { showError('err-email', t.errEmail); valid = false; }
  else clearError('err-email');

  if (!selectedSizing) { showError('err-sizing', t.errRequired); valid = false; } else clearError('err-sizing');

  if (selectedSizing === 'Standard sizes') {
    if (!selectedWaist) { showError('err-size', t.errRequired); valid = false; } else clearError('err-size');
    if (!selectedInseamStd) { showError('err-inseam-std', t.errRequired); valid = false; } else clearError('err-inseam-std');
  }

  if (selectedSizing === 'Made to measure') {
    ['naturalWaist','highHip','inseam'].forEach((id, i) => {
      const errIds = ['err-waist','err-hip','err-inseam'];
      const val = document.getElementById(id).value.trim();
      if (!val) { showError(errIds[i], t.errRequired); valid = false; } else clearError(errIds[i]);
    });
  }

  if (!selectedShipRegion) { showError('err-shipping', t.errRequired); valid = false; } else clearError('err-shipping');

  if (!document.getElementById('tcsAccepted').checked) { showError('err-tcs', t.errTcs); valid = false; } else clearError('err-tcs');

  return valid;
}

// ── Submit ──
document.getElementById('orderForm').addEventListener('submit', async function(e) {
  e.preventDefault();
  const t = translations[currentLang];
  document.getElementById('form-success').style.display = 'none';
  document.getElementById('form-error').style.display = 'none';
  if (!validateForm()) return;

  const btn = document.getElementById('submitBtn');
  btn.disabled = true;
  document.getElementById('l-submit').textContent = t.submitting;

  const payload = {
    clientName: document.getElementById('clientName').value.trim(),
    email: document.getElementById('email').value.trim(),
    currencyPreference: document.getElementById('currency').value,
    sizingType: selectedSizing,
    colour: selectedColour,
    shippingRegion: selectedShipRegion,
    shippingLabel: document.getElementById('l-ship-' + selectedShipRegion).textContent,
    shippingEstimateNZD: shippingRatesNZD[selectedShipRegion],
    _hp: document.getElementById('_hp') ? document.getElementById('_hp').value : '',
  };

  if (selectedSizing === 'Made to measure') {
    payload.naturalWaist = document.getElementById('naturalWaist').value;
    payload.highHip = document.getElementById('highHip').value;
    payload.inseam = document.getElementById('inseam').value;
  } else {
    payload.size = selectedWaist + ' ' + selectedInseamStd;
  }

  try {
    const res = await fetch('/.netlify/functions/create-checkout', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload),
    });
    if (res.ok) {
      const data = await res.json();
      window.location.href = data.url;
    } else {
      throw new Error('Non-200');
    }
  } catch {
    document.getElementById('form-error').textContent = t.errorMsg;
    document.getElementById('form-error').style.display = 'block';
    btn.disabled = false;
    document.getElementById('l-submit').innerHTML = 'Pay now — NZD $<span id="btn-total">' + getBtnTotal() + '</span>';
  }
});

// ── Batch limit ──
const MAX_SUBMISSIONS = 4;
async function checkSubmissionLimit() {
  try {
    const res = await fetch('/.netlify/functions/submission-count');
    if (!res.ok) return;
    const data = await res.json();
    if (data.count >= MAX_SUBMISSIONS) showFormClosed();
  } catch(e) {}
}

function showFormClosed() {
  document.getElementById('formClosed').classList.add('visible');
  document.getElementById('main-form-wrap').style.display = 'none';
}

// ── Waitlist ──
const KLAVIYO_KEY_ORDER = 'YOUR_KLAVIYO_PUBLIC_KEY';
const KLAVIYO_LIST_ORDER = 'YOUR_KLAVIYO_LIST_ID';
async function submitWaitlist() {
  const email = document.getElementById('closedEmail').value.trim();
  const msg = document.getElementById('closedMsg');
  if (!email) return;
  msg.textContent = '...';
  try {
    const res = await fetch(`https://a.klaviyo.com/client/subscriptions/?company_id=${KLAVIYO_KEY_ORDER}`, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'revision': '2023-02-22' },
      body: JSON.stringify({ data: { type: 'subscription', attributes: { list_id: KLAVIYO_LIST_ORDER, email } } })
    });
    if (res.ok || res.status === 202) {
      msg.textContent = "You're on the list — I'll be in touch when Batch 002 opens.";
      msg.className = 'form-closed-msg success';
      document.getElementById('closedEmail').value = '';
    } else { throw new Error(); }
  } catch {
    msg.textContent = 'Something went wrong — try again or email me directly.';
  }
}

// ── Button total ──
const SHIP_NZD = { nz: 20, au: 40, jpkr: 60, namerica: 70, ukeu: 75, row: 85 };
function getBtnTotal() {
  const base = selectedSizing === 'Made to measure' ? 550 : 500;
  const ship = selectedShipRegion ? (SHIP_NZD[selectedShipRegion] || 0) : 0;
  return base + ship;
}
function updateBtnTotal() {
  const el = document.getElementById('btn-total');
  if (el) el.textContent = getBtnTotal();
}

// ── Init ──
fetchRates('USD');
checkSubmissionLimit();
</script>
</body>
</html>
