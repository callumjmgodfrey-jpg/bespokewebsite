// Page transition overlay — use existing element if present, else create one
let overlay = document.getElementById('page-overlay');
if (!overlay) {
  overlay = document.createElement('div');
  overlay.id = 'page-overlay';
  document.body.appendChild(overlay);
}

// Fade out as soon as possible
function revealPage() {
  requestAnimationFrame(() => requestAnimationFrame(() => overlay.classList.add('loaded')));
}
if (document.readyState === 'loading') {
  document.addEventListener('DOMContentLoaded', revealPage);
} else {
  revealPage();
}

document.addEventListener('click', e => {
  const link = e.target.closest('a[href]');
  if (!link) return;
  const href = link.getAttribute('href');
  if (!href || href.startsWith('#') || href.startsWith('http') || href.startsWith('mailto') || link.target === '_blank') return;
  e.preventDefault();
  overlay.classList.remove('loaded');
  setTimeout(() => { window.location.href = href; }, 500);
});

// Scroll reveals
const revealObserver = new IntersectionObserver((entries) => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      entry.target.classList.add('visible');
      revealObserver.unobserve(entry.target);
    }
  });
}, { threshold: 0.08, rootMargin: '0px 0px -48px 0px' });

document.querySelectorAll('.reveal, .reveal-fade').forEach(el => revealObserver.observe(el));
