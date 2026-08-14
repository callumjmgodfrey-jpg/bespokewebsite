<?php
  $page_title = 'Sizing Guide — Callum Godfrey';
  $page_desc = 'How sizing works for bespoke selvedge denim by Callum Godfrey. Standard sizes and made-to-measure explained.';
  $og_image = 'media/portrait_hero.jpg';
  require_once __DIR__ . '/includes/head.php';
?>
<body>

<?php require_once __DIR__ . '/includes/nav.php'; ?>

<section class="page-header">
  <span class="page-header-eyebrow reveal" id="l-eyebrow">001 — Wide Bootcut</span>
  <h1 class="page-header-title reveal reveal-d1" id="l-title">Sizing<br>Guide</h1>
</section>

<section class="sizing-intro">
  <p class="sizing-intro-text reveal" id="l-intro">Sizes are cut to exact measurements. A W32 is made for a 32 inch natural waist — not 32 with ease, not approximately 32. If you're between sizes, size up.</p>
</section>

<div class="rule"></div>

<div class="sizing-items">

  <div class="sizing-item reveal">
    <span class="sizing-item-label" id="l-label-standard">Standard sizing</span>
    <p class="sizing-item-body" id="l-body-standard">Select your waist and inseam from the available sizes. <em>Sizes are exact</em> — if your natural waist measures 33 inches, order W34. When in doubt, size up.</p>
  </div>

  <div class="sizing-item reveal">
    <span class="sizing-item-label" id="l-label-mtm">Made to measure</span>
    <p class="sizing-item-body" id="l-body-mtm">Provide your natural waist, high hip, and inseam in centimetres. These are cut exactly to your numbers. <em>Measure twice.</em> If you're unsure how to measure, see the guide below.</p>
  </div>

  <div class="sizing-item reveal">
    <span class="sizing-item-label" id="l-label-shrinkage">Shrinkage</span>
    <p class="sizing-item-body" id="l-body-shrinkage">These jeans are made from raw, unsanforized denim. <em>Expect 3–5% shrinkage in length on first wash.</em> This is accounted for in the pattern — your finished inseam after washing will match what you ordered.</p>
  </div>

  <div class="sizing-item reveal">
    <span class="sizing-item-label" id="l-label-waist">How to measure — waist</span>
    <p class="sizing-item-body" id="l-body-waist">Measure around your natural waist — the narrowest part of your torso, usually an inch or two above your belly button. Keep the tape snug but not tight. <em>This is not your trouser waist size.</em></p>
  </div>

  <div class="sizing-item reveal">
    <span class="sizing-item-label" id="l-label-hiphigh">How to measure — high hip</span>
    <p class="sizing-item-body" id="l-body-hiphigh">Measure around your hips approximately 3–4 inches below your natural waist — above the fullest part of the hip. <em>Made-to-measure only.</em></p>
  </div>

  <div class="sizing-item reveal">
    <span class="sizing-item-label" id="l-label-inseam">How to measure — inseam</span>
    <p class="sizing-item-body" id="l-body-inseam">Measure from your crotch to the floor in bare feet, or use a well-fitting pair of trousers and measure the inside leg seam from crotch to hem. <em>Standard sizes available in L30, L32, L34.</em></p>
  </div>

</div>

<div class="size-table-wrap">
  <span class="size-table-label" id="l-table-label">Standard waist sizes</span>
  <table class="size-table">
    <thead>
      <tr>
        <th id="l-th-size">Size</th>
        <th id="l-th-waist">Natural waist (inches)</th>
        <th id="l-th-waistcm">Natural waist (cm)</th>
        <th id="l-th-note">If you measure</th>
      </tr>
    </thead>
    <tbody>
      <tr><td>W28</td><td>28"</td><td>71 cm</td><td id="l-td-28">27–28"</td></tr>
      <tr><td>W30</td><td>30"</td><td>76 cm</td><td id="l-td-30">29–30"</td></tr>
      <tr><td>W32</td><td>32"</td><td>81 cm</td><td id="l-td-32">31–32"</td></tr>
      <tr><td>W34</td><td>34"</td><td>86 cm</td><td id="l-td-34">33–34"</td></tr>
      <tr><td>W36</td><td>36"</td><td>91 cm</td><td id="l-td-36">35–36"</td></tr>
    </tbody>
  </table>
</div>

<section class="cta-band">
  <p class="cta-band-text" id="l-cta-text">Not sure which size?<br>Order made to measure.</p>
  <a href="order.php" class="cta-band-link" id="l-cta-link">Order now →</a>
</section>

<div class="rule"></div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>


<script>
const translations = {
  en: {
    eyebrow: '001 — Wide Bootcut',
    title: 'Sizing\nGuide',
    intro: 'Sizes are cut to exact measurements. A W32 is made for a 32 inch natural waist — not 32 with ease, not approximately 32. If you\'re between sizes, size up.',
    navMaking: 'Making', navWaitlist: 'Waitlist', navOrder: 'Order',
    labelStandard: 'Standard sizing', bodyStandard: 'Select your waist and inseam from the available sizes. Sizes are exact — if your natural waist measures 33 inches, order W34. When in doubt, size up.',
    labelMtm: 'Made to measure', bodyMtm: 'Provide your natural waist, high hip, and inseam in centimetres. These are cut exactly to your numbers. Measure twice. If you\'re unsure how to measure, see the guide below.',
    labelShrinkage: 'Shrinkage', bodyShrinkage: 'These jeans are made from raw, unsanforized denim. Expect 3–5% shrinkage in length on first wash. This is accounted for in the pattern — your finished inseam after washing will match what you ordered.',
    labelWaist: 'How to measure — waist', bodyWaist: 'Measure around your natural waist — the narrowest part of your torso, usually an inch or two above your belly button. Keep the tape snug but not tight. This is not your trouser waist size.',
    labelHiphigh: 'How to measure — high hip', bodyHiphigh: 'Measure around your hips approximately 3–4 inches below your natural waist — above the fullest part of the hip. Made-to-measure only.',
    labelInseam: 'How to measure — inseam', bodyInseam: 'Measure from your crotch to the floor in bare feet, or use a well-fitting pair of trousers and measure the inside leg seam from crotch to hem. Standard sizes available in L30, L32, L34.',
    tableLabel: 'Standard waist sizes',
    thSize: 'Size', thWaist: 'Natural waist (inches)', thWaistcm: 'Natural waist (cm)', thNote: 'If you measure',
    td28: '27–28"', td30: '29–30"', td32: '31–32"', td34: '33–34"', td36: '35–36"',
    ctaText: 'Not sure which size?\nOrder made to measure.', ctaLink: 'Order now →',
    footerNote: 'Made by hand in Wellington, NZ',
  },
  ja: {
    eyebrow: '001 — ワイドブーツカット',
    title: 'サイズ\nガイド',
    intro: 'サイズは実寸に合わせて裁断されます。W32はウエスト32インチの方のためのサイズです。ゆとりを含んでいません。サイズ間で迷ったら、大きい方をお選びください。',
    navMaking: 'メイキング', navWaitlist: '順番待ち', navOrder: '注文',
    labelStandard: 'スタンダードサイズ', bodyStandard: 'ウエストと股下をお選びください。サイズは実寸です。ウエストが33インチならW34をご注文ください。迷ったら大きい方を。',
    labelMtm: 'メイドトゥメジャー', bodyMtm: 'ナチュラルウエスト、ハイヒップ、股下をcmでご入力ください。数字通りに裁断されます。二度測定してください。',
    labelShrinkage: '縮み', bodyShrinkage: '未洗い（生）デニムで製作されています。初洗いで丈が3〜5%縮むことが予想されます。これはパターンに考慮済みです。',
    labelWaist: '測り方 — ウエスト', bodyWaist: 'お腹の一番細い部分（へそから指2本上あたり）を水平に測ってください。きつくならないよう密着させて測ります。ズボンのウエストサイズとは異なります。',
    labelHiphigh: '測り方 — ハイヒップ', bodyHiphigh: 'ナチュラルウエストから約8〜10cm下、ヒップの最も広い部分より上を水平に測ってください。メイドトゥメジャーのみ。',
    labelInseam: '測り方 — 股下', bodyInseam: '股から足の床まで素足で測るか、フィットしているズボンの内股縫い目を股からすそまで測ってください。スタンダードサイズはL30、L32、L34。',
    tableLabel: 'スタンダードウエストサイズ表',
    thSize: 'サイズ', thWaist: 'ナチュラルウエスト（インチ）', thWaistcm: 'ナチュラルウエスト（cm）', thNote: '実測値の目安',
    td28: '27〜28"', td30: '29〜30"', td32: '31〜32"', td34: '33〜34"', td36: '35〜36"',
    ctaText: 'サイズに迷ったら\nメイドトゥメジャーで。', ctaLink: '注文する →',
    footerNote: 'ニュージーランド・ウェリントンで手作り',
  },
  ko: {
    eyebrow: '001 — 와이드 부츠컷',
    title: '사이즈\n가이드',
    intro: '사이즈는 실제 치수에 맞게 재단됩니다. W32는 32인치 허리를 위한 사이즈입니다. 여유분이 없습니다. 사이즈 사이라면 큰 사이즈를 선택하세요.',
    navMaking: '메이킹', navWaitlist: '대기자', navOrder: '주문',
    labelStandard: '스탠다드 사이즈', bodyStandard: '허리와 인심을 선택하세요. 사이즈는 정확합니다. 허리가 33인치라면 W34를 주문하세요. 망설여지면 큰 사이즈를.',
    labelMtm: '맞춤 제작', bodyMtm: '내추럴 웨이스트, 하이 힙, 인심을 cm로 입력하세요. 정확한 치수대로 재단됩니다. 두 번 측정하세요.',
    labelShrinkage: '수축', bodyShrinkage: '이 청바지는 미세탁(생) 데님으로 만들어집니다. 첫 세탁 시 길이가 3~5% 수축될 수 있습니다. 패턴에 이미 반영되어 있습니다.',
    labelWaist: '측정 방법 — 허리', bodyWaist: '배꼽 위 1~2인치, 허리에서 가장 가는 부분을 수평으로 측정하세요. 너무 조이지 않게 밀착시켜 측정합니다. 바지 허리 사이즈와 다릅니다.',
    labelHiphigh: '측정 방법 — 하이 힙', bodyHiphigh: '내추럴 웨이스트에서 약 8~10cm 아래, 엉덩이의 가장 넓은 부분보다 위를 수평으로 측정하세요. 맞춤 제작 전용.',
    labelInseam: '측정 방법 — 인심', bodyInseam: '맨발로 서서 사타구니에서 바닥까지 측정하거나, 잘 맞는 바지의 안솔기를 사타구니에서 밑단까지 측정하세요. 스탠다드 사이즈: L30, L32, L34.',
    tableLabel: '스탠다드 허리 사이즈 표',
    thSize: '사이즈', thWaist: '내추럴 웨이스트 (인치)', thWaistcm: '내추럴 웨이스트 (cm)', thNote: '실측 기준',
    td28: '27~28"', td30: '29~30"', td32: '31~32"', td34: '33~34"', td36: '35~36"',
    ctaText: '사이즈가 확실하지 않으신가요?\n맞춤 제작으로 주문하세요.', ctaLink: '지금 주문 →',
    footerNote: '뉴질랜드 웰링턴에서 수제 제작',
  },
  fr: {
    eyebrow: '001 — Bootcut Large',
    title: 'Guide des\ntailles',
    intro: 'Les tailles sont coupées aux mesures exactes. Un W32 est conçu pour un tour de taille naturel de 32 pouces — sans aisance, sans approximation. En cas de doute entre deux tailles, prenez la grande.',
    navMaking: 'Fabrication', navWaitlist: 'Liste d\'attente', navOrder: 'Commander',
    labelStandard: 'Taille standard', bodyStandard: 'Choisissez votre tour de taille et l\'entrejambe parmi les tailles disponibles. Les tailles sont exactes — si vous mesurez 33 pouces de tour de taille, commandez un W34. En cas de doute, prenez la taille au-dessus.',
    labelMtm: 'Sur mesure', bodyMtm: 'Fournissez votre tour de taille naturel, le haut des hanches et l\'entrejambe en centimètres. Ces mesures sont coupées exactement. Mesurez deux fois.',
    labelShrinkage: 'Rétrécissement', bodyShrinkage: 'Ce jean est fabriqué en denim brut non sanforisé. Attendez-vous à un rétrécissement de 3 à 5% en longueur au premier lavage. Cela est pris en compte dans le patron.',
    labelWaist: 'Comment mesurer — taille', bodyWaist: 'Mesurez autour de votre taille naturelle — la partie la plus étroite de votre torse, généralement un ou deux centimètres au-dessus du nombril. Gardez le mètre ajusté sans serrer. Ce n\'est pas votre taille de pantalon.',
    labelHiphigh: 'Comment mesurer — haut des hanches', bodyHiphigh: 'Mesurez environ 8 à 10 cm sous votre taille naturelle, au-dessus de la partie la plus large des hanches. Sur mesure uniquement.',
    labelInseam: 'Comment mesurer — entrejambe', bodyInseam: 'Mesurez de l\'entrejambe jusqu\'au sol pieds nus, ou utilisez un pantalon bien ajusté et mesurez la couture intérieure de l\'entrejambe à l\'ourlet. Tailles standard disponibles en L30, L32, L34.',
    tableLabel: 'Tableau des tailles de taille standard',
    thSize: 'Taille', thWaist: 'Tour de taille naturel (pouces)', thWaistcm: 'Tour de taille naturel (cm)', thNote: 'Si vous mesurez',
    td28: '27–28"', td30: '29–30"', td32: '31–32"', td34: '33–34"', td36: '35–36"',
    ctaText: 'Pas sûr de votre taille ?\nCommanderez sur mesure.', ctaLink: 'Commander →',
    footerNote: 'Fabriqué à la main à Wellington, Nouvelle-Zélande',
  },
  de: {
    eyebrow: '001 — Wide Bootcut',
    title: 'Größen-\nratgeber',
    intro: 'Die Größen werden auf exakte Maße zugeschnitten. Ein W32 ist für einen natürlichen Taillenumfang von 32 Zoll — ohne Zugabe, ohne Annäherung. Im Zweifel eine Größe größer wählen.',
    navMaking: 'Making-of', navWaitlist: 'Warteliste', navOrder: 'Bestellen',
    labelStandard: 'Standardgröße', bodyStandard: 'Wählen Sie Ihre Taille und Innenbeinlänge aus den verfügbaren Größen. Größen sind exakt — wenn Ihre natürliche Taille 33 Zoll misst, bestellen Sie W34. Im Zweifel größer wählen.',
    labelMtm: 'Maßanfertigung', bodyMtm: 'Geben Sie Ihre natürliche Taille, hohe Hüfte und Innenbeinlänge in Zentimetern an. Diese werden exakt nach Ihren Maßen zugeschnitten. Zweimal messen.',
    labelShrinkage: 'Einlaufen', bodyShrinkage: 'Diese Jeans wird aus rohem, nicht sanforisiertem Denim hergestellt. Beim ersten Waschen ist mit 3–5% Einlaufen in der Länge zu rechnen. Dies ist im Schnitt berücksichtigt.',
    labelWaist: 'Messen — Taille', bodyWaist: 'Messen Sie um Ihre natürliche Taille — die schmalste Stelle des Oberkörpers, in der Regel ein bis zwei Fingerbreit über dem Bauchnabel. Das Maßband anlegen ohne zu straffen. Dies ist nicht Ihre Hosengröße.',
    labelHiphigh: 'Messen — hohe Hüfte', bodyHiphigh: 'Messen Sie etwa 8–10 cm unter der natürlichen Taille, oberhalb der breitesten Stelle der Hüfte. Nur für Maßanfertigung.',
    labelInseam: 'Messen — Innenbeinlänge', bodyInseam: 'Messen Sie barfuß vom Schritt bis zum Boden, oder nehmen Sie eine gut sitzende Hose und messen Sie die Innennaht vom Schritt bis zum Saum. Standardgrößen: L30, L32, L34.',
    tableLabel: 'Standardgrößentabelle',
    thSize: 'Größe', thWaist: 'Natürliche Taille (Zoll)', thWaistcm: 'Natürliche Taille (cm)', thNote: 'Wenn Sie messen',
    td28: '27–28"', td30: '29–30"', td32: '31–32"', td34: '33–34"', td36: '35–36"',
    ctaText: 'Unsicher bei der Größe?\nAls Maßanfertigung bestellen.', ctaLink: 'Jetzt bestellen →',
    footerNote: 'Handgefertigt in Wellington, Neuseeland',
  },
};

let currentLang = localStorage.getItem('lang') || 'en';

function applyLang(lang) {
  currentLang = lang;
  localStorage.setItem('lang', lang);
  const t = translations[lang];
  document.getElementById('langBtn').textContent = { en: 'EN', ja: '日本語', ko: '한국어', fr: 'FR', de: 'DE' }[lang];
  document.getElementById('langMenu').querySelectorAll('button').forEach(b => b.classList.remove('active'));
  document.getElementById('l-eyebrow').textContent = t.eyebrow;
  document.getElementById('l-title').textContent = t.title;
  document.getElementById('l-intro').textContent = t.intro;
  document.getElementById('nav-making').textContent = t.navMaking;
  document.getElementById('nav-waitlist').textContent = t.navWaitlist;
  document.getElementById('nav-order').textContent = t.navOrder;
  document.getElementById('l-label-standard').textContent = t.labelStandard;
  document.getElementById('l-body-standard').textContent = t.bodyStandard;
  document.getElementById('l-label-mtm').textContent = t.labelMtm;
  document.getElementById('l-body-mtm').textContent = t.bodyMtm;
  document.getElementById('l-label-shrinkage').textContent = t.labelShrinkage;
  document.getElementById('l-body-shrinkage').textContent = t.bodyShrinkage;
  document.getElementById('l-label-waist').textContent = t.labelWaist;
  document.getElementById('l-body-waist').textContent = t.bodyWaist;
  document.getElementById('l-label-hiphigh').textContent = t.labelHiphigh;
  document.getElementById('l-body-hiphigh').textContent = t.bodyHiphigh;
  document.getElementById('l-label-inseam').textContent = t.labelInseam;
  document.getElementById('l-body-inseam').textContent = t.bodyInseam;
  document.getElementById('l-table-label').textContent = t.tableLabel;
  document.getElementById('l-th-size').textContent = t.thSize;
  document.getElementById('l-th-waist').textContent = t.thWaist;
  document.getElementById('l-th-waistcm').textContent = t.thWaistcm;
  document.getElementById('l-th-note').textContent = t.thNote;
  document.getElementById('l-td-28').textContent = t.td28;
  document.getElementById('l-td-30').textContent = t.td30;
  document.getElementById('l-td-32').textContent = t.td32;
  document.getElementById('l-td-34').textContent = t.td34;
  document.getElementById('l-td-36').textContent = t.td36;
  document.getElementById('l-cta-text').innerHTML = t.ctaText.replace('\n', '<br>');
  document.getElementById('l-cta-link').textContent = t.ctaLink;
  document.getElementById('l-footer-note').textContent = t.footerNote;
  document.getElementById('langMenu').classList.remove('open');
}

function toggleLangMenu() {
  document.getElementById('langMenu').classList.toggle('open');
}
document.addEventListener('click', e => {
  if (!e.target.closest('.lang-dropdown-wrap')) {
    document.getElementById('langMenu').classList.remove('open');
  }
});

applyLang(currentLang);
</script>
</body>
</html>
