/* ============================================================
   TORVEN · SCRIPT ÚNICO CONSOLIDADO (SPA)
   - Router SPA: carga cada vista via fetch e inyecta en #content
   - Inicializadores por página (home, reseñas, perfil, registro-QR)
   - Funciones globales de formularios y modales
   ============================================================ */

/* ------------------------------------------------------------
   MAPA DE VISTAS Y TÍTULOS
   Cada hash (#modelos, #resenas...) apunta a su archivo PHP.
   ------------------------------------------------------------ */
var VIEWS = {
  index:      'views/index.php',
  modelos:    'views/modelos.php',
  resenas:    'views/resenas.php',
  horarios:   'views/horarios.php',
  consultas:  'views/consultas.php',
  contacto:   'views/contacto.php',
  nosotros:   'views/nosotros.php',
  login:      'views/login.php',
  registro:   'views/registro.php',
  profile:    'views/profile.php',
  'registro-QR': 'views/registro-QR.php'
};

var TITLES = {
  index: 'Inicio — Torven Taller',
  modelos: 'Modelos — Torven Taller',
  resenas: 'Reseñas — Torven Taller',
  horarios: 'Horarios — Torven Taller',
  consultas: 'Consultas — Torven Taller',
  contacto: 'Contacto — Torven Taller',
  nosotros: 'Sobre Nosotros — Torven Taller',
  login: 'Iniciar sesión — Torven Taller',
  registro: 'Registrarse — Torven Taller',
  profile: 'Mi Perfil — Torven Taller',
  'registro-QR': 'Registro de Servicio — Torven Taller'
};

/* ------------------------------------------------------------
   LIMPIEZA DE ANIMACIONES AL CAMBIAR DE PÁGINA
   Evita que timers/RAF de la página anterior sigan corriendo.
   ------------------------------------------------------------ */
var pendingHandles = [];
function track(handle) {
  if (handle !== null && handle !== undefined) pendingHandles.push(handle);
  return handle;
}
function cleanupPage() {
  pendingHandles.forEach(function (h) {
    cancelAnimationFrame(h);
    clearTimeout(h);
    clearInterval(h);
  });
  pendingHandles = [];
}

/* ------------------------------------------------------------
   BARRA DE PROGRESO DE SCROLL (global, vive en el shell)
   ------------------------------------------------------------ */
(function () {
  var bar = document.getElementById('progressBar');
  if (!bar) return;
  function prog() {
    var h = document.documentElement;
    var max = h.scrollHeight - h.clientHeight;
    bar.style.width = (max ? (h.scrollTop || document.body.scrollTop) / max * 100 : 0) + '%';
  }
  window.addEventListener('scroll', prog, { passive: true });
  prog();
})();

/* ------------------------------------------------------------
   ROUTER SPA
   Lee el hash, hace fetch de la vista y la inyecta en #content.
   ------------------------------------------------------------ */
function getPageFromHash() {
  var h = (window.location.hash || '').replace('#', '').split('?')[0];
  if (!h || h === 'inicio') return 'index';
  return VIEWS[h] ? h : 'index';
}

function setActiveNav(page) {
  document.querySelectorAll('.nav-link').forEach(function (link) {
    if (link.getAttribute('data-page') === page || (page === 'index' && !link.getAttribute('data-page'))) {
      link.classList.add('active');
    } else {
      link.classList.remove('active');
    }
  });
}

function initPage(page) {
  switch (page) {
    case 'index': initIndex(); break;
    case 'resenas': initResenas(); break;
    case 'profile': initProfile(); break;
    case 'registro-QR': initRegistroQR(); break;
  }
}

function render(html, page) {
  document.getElementById('content').innerHTML = html;
  document.title = TITLES[page] || 'Torven Taller';
  setActiveNav(page);
  initPage(page);
  window.scrollTo(0, 0);
}

function loadPage(page) {
  cleanupPage();
  var url = VIEWS[page];
  if (!url) { url = 'views/error_404.php'; }
  fetch(url)
    .then(function (res) {
      if (!res.ok) throw new Error('HTTP ' + res.status);
      return res.text();
    })
    .then(function (html) {
      if (!html.trim()) throw new Error('empty response');
      render(html, page);
    })
    .catch(function () {
      fetch('views/error_404.php')
        .then(function (r) { return r.text(); })
        .then(function (html) { render(html, '404'); });
    });
}

/* Navegación inicial + cambios de hash */
document.addEventListener('DOMContentLoaded', function () {
  loadPage(getPageFromHash());
});
window.addEventListener('hashchange', function () {
  loadPage(getPageFromHash());
});

/* ------------------------------------------------------------
   REVEAL AL HACER SCROLL (compartido: home, reseñas)
   ------------------------------------------------------------ */
var revealIO = new IntersectionObserver(function (entries) {
  entries.forEach(function (e) {
    if (e.isIntersecting) { e.target.classList.add('in'); revealIO.unobserve(e.target); }
  });
}, { threshold: 0.15 });

function initReveal() {
  document.querySelectorAll('#content .reveal:not(.in)').forEach(function (el) {
    revealIO.observe(el);
  });
}

/* ------------------------------------------------------------
   PÁGINA HOME (index.php)
   Typewriter del hero + contadores de estadísticas + reveal
   ------------------------------------------------------------ */
function initIndex() {
  initReveal();

  /* Contadores de estadísticas */
  var numIO = new IntersectionObserver(function (entries) {
    entries.forEach(function (en) {
      if (!en.isIntersecting) return;
      var el = en.target;
      var target = parseFloat(el.dataset.target);
      var dec = target % 1 !== 0;
      var start = null;
      function tick(now) {
        if (!start) start = now;
        var p = Math.min((now - start) / 1800, 1);
        var eased = 1 - Math.pow(1 - p, 3);
        var val = target * eased;
        el.textContent = dec ? val.toFixed(1).replace('.', ',') : Math.floor(val).toLocaleString('es-AR');
        if (p < 1) track(requestAnimationFrame(tick));
      }
      track(requestAnimationFrame(tick));
      numIO.unobserve(el);
    });
  }, { threshold: 0.4 });
  document.querySelectorAll('#content .stat-num .val').forEach(function (el) { numIO.observe(el); });

  /* Typewriter del hero */
  var typedEl = document.getElementById('typed');
  if (!typedEl) return;
  var phrases = ['Servicio mayor · Frenos · Cambio aceite', 'Diagnóstico computarizado · ECU', 'Carrocería y pintura premium'];
  var pi = 0, ci = 0, del = false;
  (function step() {
    var word = phrases[pi];
    typedEl.textContent = word.slice(0, ci);
    if (!del && ci < word.length) { ci++; track(setTimeout(step, 70)); }
    else if (!del) { del = true; track(setTimeout(step, 2200)); }
    else if (ci > 0) { ci--; track(setTimeout(step, 30)); }
    else { del = false; pi = (pi + 1) % phrases.length; track(setTimeout(step, 350)); }
  })();
}

/* ------------------------------------------------------------
   PÁGINA RESEÑAS (resenas.php)
   Contador 4.9, barras de rating, highlights, tilt 3D,
   spotlight, parallax de estrellas y carrusel.
   ------------------------------------------------------------ */
function initResenas() {
  initReveal();

  /* Contador 4.9 del header */
  var sc = document.querySelector('#content .score-num');
  if (sc) {
    var tgt = parseFloat(sc.dataset.target); var t0 = null;
    function tick(now) {
      if (!t0) t0 = now;
      var p = Math.min((now - t0) / 2000, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      sc.textContent = (tgt * eased).toFixed(1).replace('.', ',');
      if (p < 1) track(requestAnimationFrame(tick));
    }
    track(requestAnimationFrame(tick));
  }

  /* Barras de rating (se activan al renderizar) */
  requestAnimationFrame(function () {
    document.querySelectorAll('#content .bar-row').forEach(function (r) { r.classList.add('on'); });
  });

  /* Barras + porcentajes de highlights */
  var hlIO = new IntersectionObserver(function (es) {
    es.forEach(function (e) {
      if (!e.isIntersecting) return;
      e.target.classList.add('on');
      var num = e.target.querySelector('.pct-num');
      var ptarget = parseInt(num.dataset.target, 10);
      var t1 = null;
      (function tick(now) {
        if (!t1) t1 = now;
        var p = Math.min((now - t1) / 1500, 1);
        var eased = 1 - Math.pow(1 - p, 3);
        num.textContent = Math.round(ptarget * eased);
        if (p < 1) track(requestAnimationFrame(tick));
      })();
      hlIO.unobserve(e.target);
    });
  }, { threshold: 0.4 });
  document.querySelectorAll('#content .hl-card').forEach(function (el) { hlIO.observe(el); });

  /* ---- Interacción del header con el mouse (tilt 3D + parallax) ---- */
  var header = document.getElementById('revHeader');
  var card = document.getElementById('scoreCard');
  var spot = document.getElementById('spot');
  var layers = document.querySelectorAll('#content .hstar3d');
  var sx = 0, sy = 0, tx = 0, ty = 0;
  var curRX = 0, curRY = 0, tgtRX = 0, tgtRY = 0;
  var MAX_X = 7, MAX_Y = 9;

  function clamp(v, min, max) { return Math.min(Math.max(v, min), max); }

  function onMove(e) {
    var r = header.getBoundingClientRect();
    var nx = (e.clientX - r.left) / r.width * 2 - 1;
    var ny = (e.clientY - r.top) / r.height * 2 - 1;
    var cr = card.getBoundingClientRect();
    var cx = (e.clientX - cr.left) / cr.width * 2 - 1;
    var cy = (e.clientY - cr.top) / cr.height * 2 - 1;
    tgtRX = clamp(-cy * 9, -MAX_X, MAX_X);
    tgtRY = clamp(cx * 12, -MAX_Y, MAX_Y);
    card.style.setProperty('--mx', (cx * 50 + 50) + '%');
    card.style.setProperty('--my', (cy * 50 + 50) + '%');
    layers.forEach(function (l) {
      var d = parseFloat(l.getAttribute('data-depth')) || 20;
      l.style.transform = 'translate(' + (nx * d) + 'px,' + (ny * d) + 'px)';
    });
    tx = e.clientX - r.left; ty = e.clientY - r.top;
  }
  function onLeave() {
    tgtRX = 0; tgtRY = 0; tx = 0; ty = 0;
    layers.forEach(function (l) { l.style.transform = 'translate(0,0)'; });
  }
  if (header && card && spot) {
    header.addEventListener('mousemove', onMove);
    header.addEventListener('mouseleave', onLeave);
    (function loop() {
      curRX += (tgtRX - curRX) * 0.12;
      curRY += (tgtRY - curRY) * 0.12;
      sx += (tx - sx) * 0.09; sy += (ty - sy) * 0.09;
      card.style.transform = 'perspective(950px) rotateX(' + curRX.toFixed(2) + 'deg) rotateY(' + curRY.toFixed(2) + 'deg) translateY(-3px)';
      spot.style.transform = 'translate(' + (sx - 280) + 'px,' + (sy - 280) + 'px)';
      track(requestAnimationFrame(loop));
    })();
  }

  /* ---- Carrusel ---- */
  var trackEl = document.getElementById('track');
  var slides = trackEl ? trackEl.children : [];
  var n = slides.length, i = 0;
  var dotsBox = document.getElementById('dots');
  var dots = [];
  var timer = null;

  if (n > 0) {
    for (var k = 0; k < n; k++) {
      (function (k) {
        var d = document.createElement('button');
        d.className = 'carr-dot' + (k === 0 ? ' on' : '');
        d.addEventListener('click', function () { go(k); reset(); });
        dotsBox.appendChild(d); dots.push(d);
      })(k);
    }
  }

  function go(idx) {
    i = (idx + n) % n;
    trackEl.style.transform = 'translateX(-' + (i * 100) + '%)';
    for (var k = 0; k < n; k++) {
      slides[k].className = 'carousel-slide' + (k === i ? ' active' : '');
      dots[k] && (dots[k].className = 'carr-dot' + (k === i ? ' on' : ''));
    }
  }
  function next() { go(i + 1); }
  function prev() { go(i - 1); }
  function autoplay() { if (timer) clearInterval(timer); track(timer = setInterval(next, 6000)); }
  function reset() { clearInterval(timer); autoplay(); }

  var prevBtn = document.querySelector('#content .carr-prev');
  var nextBtn = document.querySelector('#content .carr-next');
  if (prevBtn) prevBtn.addEventListener('click', function () { prev(); reset(); });
  if (nextBtn) nextBtn.addEventListener('click', function () { next(); reset(); });

  var box = document.getElementById('carrBox');
  if (box) {
    box.addEventListener('mouseenter', function () { clearInterval(timer); });
    box.addEventListener('mouseleave', autoplay);
    var x0 = null;
    box.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; clearInterval(timer); }, { passive: true });
    box.addEventListener('touchend', function (e) {
      if (x0 === null) return;
      var dx = e.changedTouches[0].clientX - x0;
      if (Math.abs(dx) > 40) { dx < 0 ? next() : prev(); reset(); }
      x0 = null;
    }, { passive: true });
    autoplay();
  }
}

/* ------------------------------------------------------------
   PÁGINA PERFIL (profile.php)
   ============================================================ */
function initProfile() {
  /* sin bindings extra: los handlers se llaman desde atributos HTML
     profGuardar / profCancelar / abrirModal / cerrarModal /
     validarEliminar / confirmarEliminar (definidos abajo) */
}

/* ---- Formulario: guardar ---- */
function profGuardar(e) {
  e.preventDefault();
  var nom = document.getElementById('prof-nombre');
  var toast = document.getElementById('prof-toast');
  if (toast) {
    toast.style.display = 'block';
    setTimeout(function () { toast.style.display = 'none'; }, 2500);
  }
  if (nom) {
    var v = nom.value.trim();
    var header = document.getElementById('prof-header-nombre');
    var avatar = document.getElementById('prof-avatar');
    if (header) header.textContent = v;
    if (avatar) avatar.textContent = (v.charAt(0) || 'M').toUpperCase();
  }
}

/* ---- Formulario: cancelar (restaura demo) ---- */
function profCancelar() {
  var vals = {
    'prof-nombre': 'Martina López',
    'prof-telefono': '+54 11 4567-8900',
    'prof-patente': 'AB 123 CD',
    'prof-email': 'martina@email.com'
  };
  Object.keys(vals).forEach(function (id) {
    var f = document.getElementById(id);
    if (f) f.value = vals[id];
  });
  document.getElementById('prof-header-nombre').textContent = 'Martina López';
  document.getElementById('prof-header-email').textContent = 'martina@email.com';
  document.getElementById('prof-avatar').textContent = 'M';
  document.getElementById('sidebar-patente') && (document.getElementById('sidebar-patente').textContent = 'AB 123 CD');
}

/* ---- Modal de eliminación ---- */
function abrirModal() {
  var m = document.getElementById('modal-delete');
  if (m) m.style.display = 'flex';
}
function cerrarModal() {
  var del = document.getElementById('modal-delete');
  var ok = document.getElementById('modal-ok');
  if (del) del.style.display = 'none';
  if (ok) ok.style.display = 'none';
}
function validarEliminar(val) {
  var btn = document.getElementById('btn-delete-confirm');
  if (!btn) return;
  var ok = val === 'ELIMINAR';
  btn.disabled = !ok;
  btn.style.background = ok ? '#C00000' : '#3A1010';
  btn.style.color = ok ? '#fff' : '#6B7280';
  btn.style.cursor = ok ? 'pointer' : 'not-allowed';
}
function confirmarEliminar() {
  cerrarModal();
  var inp = document.getElementById('delete-confirm-input');
  if (inp) inp.value = '';
  var btn = document.getElementById('btn-delete-confirm');
  if (btn) {
    btn.disabled = true;
    btn.style.background = '#3A1010';
    btn.style.color = '#6B7280';
    btn.style.cursor = 'not-allowed';
  }
}

/* ------------------------------------------------------------
   PÁGINA REGISTRO-QR (registro-QR.php)
   Vista previa en vivo + modal de confirmación + limpiar
   ------------------------------------------------------------ */
function initRegistroQR() {
  var map = {
    'patente': 'prev-patente',
    'modelo': 'prev-modelo',
    'nombre': 'prev-nombre',
    'tipo_servicio': 'prev-servicio',
    'fecha': 'prev-fecha'
  };
  Object.keys(map).forEach(function (id) {
    var input = document.getElementById(id);
    var target = document.getElementById(map[id]);
    if (!input || !target) return;
    function update() {
      var val = input.value;
      if (id === 'tipo_servicio') {
        var sel = input.options[input.selectedIndex];
        val = sel ? sel.textContent : '';
      }
      target.textContent = val || '—';
    }
    input.addEventListener('input', update);
    input.addEventListener('change', update);
    update();
  });
}

/* ---- Formulario: confirmar registro (abre modal con resumen) ---- */
function confirmarServicio(e) {
  e.preventDefault();
  if (!document.getElementById('form-servicio').checkValidity()) {
    document.getElementById('form-servicio').reportValidity();
    return;
  }
  function val(id) {
    var el = document.getElementById(id);
    return el ? el.value : '';
  }
  document.getElementById('modal-patente').textContent = val('patente');
  document.getElementById('modal-nombre').textContent = val('nombre');
  document.getElementById('modal-fecha').textContent = val('fecha');
  document.getElementById('modal-ok').style.display = 'flex';
}

/* ---- Formulario: limpiar ---- */
function limpiarForm() {
  var f = document.getElementById('form-servicio');
  if (f) f.reset();
  document.getElementById('prev-patente').textContent = '—';
  document.getElementById('prev-modelo').textContent = '—';
  document.getElementById('prev-nombre').textContent = '—';
  document.getElementById('prev-servicio').textContent = '—';
  document.getElementById('prev-fecha').textContent = '—';
}

/* ---- Formulario: nuevo registro (reinicia tras confirmar) ---- */
function nuevoRegistro() {
  var m = document.getElementById('modal-ok');
  if (m) m.style.display = 'none';
  limpiarForm();
}