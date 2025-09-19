// /assets/js/password.js
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('.show-hide').forEach(function (btn) {
    const span = btn.querySelector('span');
    if (span) {
      // Mantén el span vacío; el tema pone el texto via CSS ::after
      span.textContent = '';
      span.classList.add('show'); // estado inicial: "show"
    }
    btn.style.display = 'block';
    btn.style.cursor = 'pointer';
  });
});

document.addEventListener('click', function (e) {
  const btn = e.target.closest('.show-hide');
  if (!btn) return;

  const wrap = btn.closest('.form-input');
  if (!wrap) return;

  const input = wrap.querySelector('input[type="password"], input[type="text"]');
  if (!input) return;

  const span = btn.querySelector('span');

  if (input.type === 'password') {
    input.type = 'text';
    if (span) span.classList.remove('show'); // CSS mostrará "hide"
  } else {
    input.type = 'password';
    if (span) span.classList.add('show'); // CSS mostrará "show"
  }
});

document.addEventListener('submit', function (e) {
  e.target.querySelectorAll('.form-input input[type="text"]').forEach(function (inp) {
    inp.type = 'password';
  });
  e.target.querySelectorAll('.show-hide span').forEach(function (span) {
    // vuelve a estado "show"
    span.classList.add('show');
    span.textContent = '';
  });
});
