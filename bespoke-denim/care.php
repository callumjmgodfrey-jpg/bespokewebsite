<?php
  $page_title = 'Care Instructions — Callum Godfrey';
  $page_desc = 'How to care for your raw selvedge denim jeans by Callum Godfrey — washing, drying, fading, and best practice.';
  $og_image = 'media/portrait_hero.jpg';
  require_once __DIR__ . '/includes/head.php';
?>
<body>

<!-- NAV -->
<?php require_once __DIR__ . '/includes/nav.php'; ?>

<!-- PAGE HEADER -->
<section class="page-header">
  <span class="page-header-eyebrow reveal" id="l-eyebrow">Raw Selvedge Denim</span>
  <h1 class="page-header-title reveal reveal-d1" id="l-title">Care<br>Instructions</h1>
</section>

<!-- INTRO -->
<section class="care-intro">
  <p class="care-intro-text reveal" id="l-intro">Your jeans are made from raw, unsanforized Japanese selvedge denim. This means they have not been pre-washed and will shrink slightly on their first wash. This has been accounted for in your pattern.</p>
</section>

<div class="rule"></div>

<!-- CARE ITEMS -->
<div class="care-items">

  <div class="care-item reveal">
    <span class="care-item-label" id="l-label-firstwash">First wash</span>
    <p class="care-item-body" id="l-body-firstwash">Expect <em>3–5% shrinkage in length.</em> This is normal and intentional.</p>
  </div>

  <div class="care-item reveal">
    <span class="care-item-label" id="l-label-washing">Washing</span>
    <p class="care-item-body" id="l-body-washing">Cold wash only, inside out, gentle cycle. <em>Never hot water.</em></p>
  </div>

  <div class="care-item reveal">
    <span class="care-item-label" id="l-label-drying">Drying</span>
    <p class="care-item-body" id="l-body-drying">Hang dry only. <em>Never tumble dry.</em></p>
  </div>

  <div class="care-item reveal">
    <span class="care-item-label" id="l-label-bestpractice">Best practice</span>
    <p class="care-item-body" id="l-body-bestpractice">Wash as infrequently as possible. Spot clean where you can. Freezing your jeans overnight kills bacteria and odour without affecting the fabric or fade.</p>
  </div>

  <div class="care-item reveal">
    <span class="care-item-label" id="l-label-fading">Fading</span>
    <p class="care-item-body" id="l-body-fading">Raw denim will fade and crease uniquely to the way you wear them. <em>This is the whole point</em> — wear them hard and they'll become yours.</p>
  </div>

</div>

<!-- FOOTER -->
<?php require_once __DIR__ . '/includes/footer.php'; ?>


<script>
const careCopy = {
  en: {
    btn: 'EN',
    navMaking: 'Making', navWaitlist: 'Waitlist', navApply: 'Apply',
    eyebrow: 'Raw Selvedge Denim',
    title: 'Care<br>Instructions',
    intro: 'Your jeans are made from raw, unsanforized Japanese selvedge denim. This means they have not been pre-washed and will shrink slightly on their first wash. This has been accounted for in your pattern.',
    labelFirstwash: 'First wash',
    bodyFirstwash: 'Expect <em>3–5% shrinkage in length.</em> This is normal and intentional.',
    labelWashing: 'Washing',
    bodyWashing: 'Cold wash only, inside out, gentle cycle. <em>Never hot water.</em>',
    labelDrying: 'Drying',
    bodyDrying: 'Hang dry only. <em>Never tumble dry.</em>',
    labelBestpractice: 'Best practice',
    bodyBestpractice: 'Wash as infrequently as possible. Spot clean where you can. Freezing your jeans overnight kills bacteria and odour without affecting the fabric or fade.',
    labelFading: 'Fading',
    bodyFading: 'Raw denim will fade and crease uniquely to the way you wear them. <em>This is the whole point</em> — wear them hard and they\'ll become yours.',
    footerNote: 'Made by hand in Wellington, NZ'
  },
  ja: {
    btn: '日本語',
    navMaking: 'メイキング', navWaitlist: '順番待ち', navApply: '注文',
    eyebrow: 'ローセルビッジデニム',
    title: 'お手入れ<br>方法',
    intro: 'お使いのジーンズは、未洗いの生地（未サンフォライズ加工）の日本製セルビッジデニムで作られています。初回洗濯時にわずかに縮みますが、パターンにはそれが考慮されています。',
    labelFirstwash: '初回洗濯',
    bodyFirstwash: '<em>丈が3〜5%縮む</em>ことが予想されます。これは正常で、想定内のことです。',
    labelWashing: '洗い方',
    bodyWashing: '裏返して冷水で手洗いか弱水流洗いのみ。<em>熱湯は絶対に使用しないでください。</em>',
    labelDrying: '乾燥',
    bodyDrying: '必ず陰干し。<em>乾燥機の使用は厳禁です。</em>',
    labelBestpractice: 'ベストプラクティス',
    bodyBestpractice: 'なるべく洗濯回数を減らしてください。汚れは部分洗いで対処できます。一晩冷凍すると、生地や色落ちに影響を与えずに細菌と臭いを除去できます。',
    labelFading: 'フェード（色落ち）',
    bodyFading: 'ローデニムは着用の仕方によって独自の色落ちやクセが生まれます。<em>これがセルビッジデニムの醍醐味</em> — 思い切り履き込んで、自分だけの一本に育ててください。',
    footerNote: 'ニュージーランド・ウェリントンで手作り'
  },
  ko: {
    btn: '한국어',
    navMaking: '메이킹', navWaitlist: '대기자 명단', navApply: '주문',
    eyebrow: '로우 셀비지 데님',
    title: '세탁 및 관리<br>방법',
    intro: '이 청바지는 워싱 처리를 하지 않은 일본제 로우 셀비지 데님으로 제작됩니다. 첫 세탁 시 약간 수축되지만, 이는 패턴 제작 단계에서 이미 반영되어 있습니다.',
    labelFirstwash: '첫 세탁',
    bodyFirstwash: '<em>길이가 3~5% 수축</em>됩니다. 이는 정상적이며 의도된 현상입니다.',
    labelWashing: '세탁 방법',
    bodyWashing: '뒤집어서 찬물 약세탁만 가능합니다. <em>뜨거운 물은 절대 사용하지 마세요.</em>',
    labelDrying: '건조',
    bodyDrying: '반드시 자연 건조하세요. <em>건조기 사용 금지.</em>',
    labelBestpractice: '관리 팁',
    bodyBestpractice: '가능한 한 세탁 횟수를 줄이세요. 오염 부위는 부분 세탁으로 해결하세요. 하룻밤 냉동하면 원단과 색상에 영향을 주지 않고 세균과 냄새를 제거할 수 있습니다.',
    labelFading: '페이딩',
    bodyFading: '로우 데님은 착용 습관에 따라 독특한 색 빠짐과 주름이 생깁니다. <em>이것이 바로 핵심</em> — 열심히 입을수록 나만의 청바지가 됩니다.',
    footerNote: '뉴질랜드 웰링턴에서 수제 제작'
  },
  fr: {
    btn: 'FR',
    navMaking: 'Fabrication', navWaitlist: 'Liste d\'attente', navApply: 'Commander',
    eyebrow: 'Denim Selvedge Brut',
    title: 'Instructions<br>d\'entretien',
    intro: 'Votre jean est confectionné en denim japonais selvedge brut, non sanforisé. Cela signifie qu\'il n\'a pas été pré-lavé et rétrécira légèrement au premier lavage. Cela a été pris en compte dans le patron.',
    labelFirstwash: 'Premier lavage',
    bodyFirstwash: 'Attendez-vous à <em>3 à 5 % de rétrécissement en longueur.</em> C\'est normal et intentionnel.',
    labelWashing: 'Lavage',
    bodyWashing: 'Lavage à froid uniquement, à l\'envers, cycle délicat. <em>Jamais d\'eau chaude.</em>',
    labelDrying: 'Séchage',
    bodyDrying: 'Séchage à plat ou suspendu uniquement. <em>Ne jamais mettre en sèche-linge.</em>',
    labelBestpractice: 'Bonnes pratiques',
    bodyBestpractice: 'Lavez le moins souvent possible. Nettoyez les taches localement. Congeler votre jean une nuit élimine les bactéries et les odeurs sans altérer le tissu ni les délavages.',
    labelFading: 'Délavage',
    bodyFading: 'Le denim brut se délave et se marque de façon unique selon la manière dont vous le portez. <em>C\'est tout l\'intérêt</em> — portez-le intensément et il deviendra vraiment le vôtre.',
    footerNote: 'Fabriqué à la main à Wellington, Nouvelle-Zélande'
  },
  de: {
    btn: 'DE',
    navMaking: 'Making-of', navWaitlist: 'Warteliste', navApply: 'Bestellen',
    eyebrow: 'Roher Selvedge-Denim',
    title: 'Pflege-<br>hinweise',
    intro: 'Ihre Jeans ist aus rohem, nicht sanforisiertem japanischen Selvedge-Denim gefertigt. Das bedeutet, sie wurde nicht vorgewaschen und wird beim ersten Waschen leicht einlaufen. Dies wurde im Schnitt bereits berücksichtigt.',
    labelFirstwash: 'Erstes Waschen',
    bodyFirstwash: 'Erwarten Sie <em>3–5 % Einlaufen in der Länge.</em> Das ist normal und beabsichtigt.',
    labelWashing: 'Waschen',
    bodyWashing: 'Nur Kaltwaschgang, auf links gedreht, Schonwaschgang. <em>Niemals heißes Wasser.</em>',
    labelDrying: 'Trocknen',
    bodyDrying: 'Nur an der Luft trocknen. <em>Niemals im Trockner.</em>',
    labelBestpractice: 'Empfehlungen',
    bodyBestpractice: 'Waschen Sie so selten wie möglich. Reinigen Sie Flecken punktuell. Über Nacht einfrieren tötet Bakterien und Gerüche ab, ohne den Stoff oder das Fading zu beeinträchtigen.',
    labelFading: 'Fading',
    bodyFading: 'Rohdenim verblasst und wirft Falten, die einzigartig für Ihre Trageweise sind. <em>Das ist der Sinn der Sache</em> — tragen Sie sie hart und sie werden wirklich Ihre.',
    footerNote: 'Handgefertigt in Wellington, Neuseeland'
  }
};

function toggleLangMenu() {
  document.getElementById('langMenu').classList.toggle('open');
}

document.addEventListener('click', e => {
  const wrap = document.querySelector('.lang-dropdown-wrap');
  if (wrap && !wrap.contains(e.target)) document.getElementById('langMenu').classList.remove('open');
});

function applyLang(lang) {
  const c = careCopy[lang];
  document.getElementById('langMenu').classList.remove('open');
  document.getElementById('langBtn').textContent = c.btn;
  document.querySelectorAll('.lang-dropdown-menu button').forEach(b => {
    b.classList.toggle('active', b.getAttribute('onclick') === `applyLang('${lang}')`);
  });
  const t = (id, val) => { const el = document.getElementById(id); if (el) el.textContent = val; };
  const h = (id, val) => { const el = document.getElementById(id); if (el) el.innerHTML = val; };
  t('nav-making', c.navMaking);
  t('nav-waitlist', c.navWaitlist);
  t('nav-apply', c.navApply);
  t('l-eyebrow', c.eyebrow);
  h('l-title', c.title);
  t('l-intro', c.intro);
  t('l-label-firstwash', c.labelFirstwash);
  h('l-body-firstwash', c.bodyFirstwash);
  t('l-label-washing', c.labelWashing);
  h('l-body-washing', c.bodyWashing);
  t('l-label-drying', c.labelDrying);
  h('l-body-drying', c.bodyDrying);
  t('l-label-bestpractice', c.labelBestpractice);
  t('l-body-bestpractice', c.bodyBestpractice);
  t('l-label-fading', c.labelFading);
  h('l-body-fading', c.bodyFading);
  t('l-footer-note', c.footerNote);
  document.documentElement.lang = lang;
  localStorage.setItem('lang', lang);
}

applyLang(localStorage.getItem('lang') || 'en');
</script>
</body>
</html>
