<?php $title = 'Inicio'; $page = 'index.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>


<style>
  /* ---- Reveal al hacer scroll ---- */
  .reveal { opacity: 0; transform: translateY(32px); transition: opacity .7s ease, transform .7s cubic-bezier(.22,1,.36,1); }
  .reveal.in { opacity: 1; transform: none; }
  .reveal[data-delay="1"] { transition-delay: .1s; }
  .reveal[data-delay="2"] { transition-delay: .2s; }
  .reveal[data-delay="3"] { transition-delay: .3s; }
  .reveal[data-delay="4"] { transition-delay: .4s; }
  .reveal[data-delay="5"] { transition-delay: .5s; }

  /* ---- Barra de progreso de scroll ---- */
  .scroll-progress { position: fixed; top: 0; left: 0; height: 3px; width: 0; z-index: 60; background: linear-gradient(90deg,#8f0a0a,#E53535,#ff6b6b); box-shadow: 0 0 8px rgba(229,53,53,.8); }

  /* ---- HERO ---- */
  .hero { position: relative; height: 100vh; display: flex; flex-direction: column; justify-content: flex-end; overflow: hidden; }
  .hero-bg { position: absolute; inset: 0; width: 100%; height: 100%; object-fit: cover; filter: brightness(0.4); animation: kenburns 20s ease-in-out infinite alternate; }
  @keyframes kenburns { from { transform: scale(1); } to { transform: scale(1.14); } }
  .hero-gradient { position: absolute; inset: 0; background: linear-gradient(to top, rgba(96,0,0,.85) 0%, rgba(17,17,17,.35) 45%, rgba(0,0,0,.35) 100%); }
  .hero-gradient::after { content: ""; position: absolute; inset: 0; background: linear-gradient(115deg, transparent 30%, rgba(229,53,53,.12) 60%, transparent 90%); animation: glint 8s ease-in-out infinite; }
  @keyframes glint { 0%, 100% { opacity: 0; } 50% { opacity: 1; } }

  .hero-particle { position: absolute; border-radius: 50%; background: radial-gradient(circle, rgba(229,53,53,.7), transparent 70%); animation: floaty 9s ease-in-out infinite; pointer-events: none; }
  @keyframes floaty { 0%,100% { transform: translateY(0) translateX(0) scale(1); opacity: .3; } 50% { transform: translateY(-46px) translateX(18px) scale(1.2); opacity: .7; } }

  .hero-watermark { position: absolute; inset: 0; display: flex; align-items: center; justify-content: center; pointer-events: none; }
  .hero-watermark img { width: 300px; opacity: 0.06; animation: watermarkPulse 7s ease-in-out infinite; }
  @keyframes watermarkPulse { 0%,100% { transform: scale(1); opacity: .05; } 50% { transform: scale(1.06); opacity: .09; } }

  .fade-up { opacity: 0; animation: fadeUp .8s cubic-bezier(.22,1,.36,1) forwards; }
  .fade-up[d="1"] { animation-delay: .1s; }
  .fade-up[d="2"] { animation-delay: .25s; }
  .fade-up[d="3"] { animation-delay: .4s; }
  .fade-up[d="4"] { animation-delay: .55s; }
  @keyframes fadeUp { from { opacity: 0; transform: translateY(28px); } to { opacity: 1; transform: none; } }

  .hero-content { position: relative; z-index: 10; padding: 0 64px 80px; }
  .hero-tag { display: inline-block; font-size: 12px; font-weight: 700; text-transform: uppercase; letter-spacing: .2em; margin-bottom: 12px; color: #E53535; background: rgba(229,53,53,.12); border: 1px solid rgba(229,53,53,.35); padding: 6px 14px; border-radius: 999px; }
  .hero-title { font-size: 76px; font-weight: 800; line-height: 1; letter-spacing: -2px; margin-bottom: 14px; color: #fff; text-shadow: 0 4px 30px rgba(0,0,0,.4); }
  .hero-sub { font-size: 18px; margin-bottom: 34px; color: rgba(255,255,255,.75); min-height: 28px; }
  .cursor { display: inline-block; width: 2px; height: 1.05em; background: #E53535; margin-left: 4px; vertical-align: -2px; animation: blink 1s steps(1) infinite; }
  @keyframes blink { 50% { opacity: 0; } }

  .btn-red { display: inline-block; padding: 15px 34px; border-radius: 10px; background: linear-gradient(135deg,#E53535,#B00000); color: #fff; font-size: 14px; font-weight: 800; box-shadow: 0 6px 22px rgba(192,0,0,.45); transition: transform .25s ease, box-shadow .3s ease; animation: ctaPulse 2.8s ease-in-out infinite; }
  .btn-red:hover { transform: translateY(-3px) scale(1.03); box-shadow: 0 12px 32px rgba(192,0,0,.6); }
  @keyframes ctaPulse { 0%,100% { box-shadow: 0 6px 22px rgba(192,0,0,.45); } 50% { box-shadow: 0 6px 34px rgba(192,0,0,.75); } }
  .btn-glass { display: inline-block; padding: 15px 34px; border-radius: 10px; background: rgba(255,255,255,.1); color: #fff; font-size: 14px; font-weight: 700; border: 1px solid rgba(255,255,255,.35); backdrop-filter: blur(6px); transition: transform .25s ease, background .3s ease, border-color .3s ease; }
  .btn-glass:hover { transform: translateY(-3px); background: rgba(255,255,255,.18); border-color: rgba(255,255,255,.6); }

  .hero-dots { position: absolute; bottom: 32px; right: 64px; display: flex; gap: 12px; z-index: 10; }
  .hero-dot { width: 32px; height: 8px; border-radius: 4px; background: rgba(255,255,255,.4); transition: background .3s ease, width .3s ease; }
  .hero-dot.on { background: #E53535; width: 44px; box-shadow: 0 0 14px rgba(229,53,53,.8); animation: dotPulse 2s ease-in-out infinite; }
  @keyframes dotPulse { 0%,100% { box-shadow: 0 0 8px rgba(229,53,53,.6); } 50% { box-shadow: 0 0 20px rgba(229,53,53,1); } }

  /* ---- Ticker ---- */
  .ticker { overflow: hidden; white-space: nowrap; background: linear-gradient(90deg,#600000,#C00000); border-top: 1px solid rgba(255,255,255,.06); }
  .ticker-track { display: inline-block; animation: ticker 22s linear infinite; }
  .ticker:hover .ticker-track { animation-play-state: paused; }
  @keyframes ticker { from { transform: translateX(0); } to { transform: translateX(-50%); } }
  .ticker-item { display: inline-block; padding: 14px 28px; font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: .08em; color: rgba(255,255,255,.85); }
  .ticker-item::after { content: "•"; margin-left: 56px; color: rgba(255,255,255,.35); }

  /* ---- Stats ---- */
  .stat-cell { padding: 36px 40px; text-align: center; border-right: 1px solid rgba(0,0,0,.2); }
  .stat-num { font-size: 44px; font-weight: 800; color: #fff; text-shadow: 0 4px 20px rgba(0,0,0,.3); }
  .stat-label { font-size: 13px; margin-top: 6px; color: rgba(255,255,255,.75); letter-spacing: .03em; }

  /* ---- Services ---- */
  .service-card { padding: 26px; border-radius: 12px; background: #1A1A1A; border: 1px solid #2A2A2A; position: relative; overflow: hidden; transition: transform .35s ease, box-shadow .35s ease, border-color .35s ease; }
  .service-card::before { content: ""; position: absolute; top: 0; left: 0; right: 0; height: 2px; background: linear-gradient(90deg, transparent, var(--accent), transparent); opacity: 0; transition: opacity .3s ease; }
  .service-card:hover { transform: translateY(-8px); border-color: rgba(229,53,53,.45); box-shadow: 0 22px 46px rgba(0,0,0,.55), 0 0 30px rgba(192,0,0,.12); }
  .service-card:hover::before { opacity: 1; }
  .s-icon { display: inline-block; font-size: 34px; margin-bottom: 16px; transition: transform .35s ease; }
  .service-card:hover .s-icon { transform: scale(1.18) rotate(-8deg); }
  .s-bar { margin-top: 18px; width: 36px; height: 3px; border-radius: 3px; transition: width .4s ease; }
  .service-card:hover .s-bar { width: 84px; }

  /* ---- CTA ---- */
  .cta-glow { display: inline-block; position: relative; padding: 18px 44px; border-radius: 12px; background: linear-gradient(135deg,#E53535,#8f0a0a); color: #fff; font-size: 15px; font-weight: 800; letter-spacing: .02em; transition: transform .25s ease; animation: ctaPulse 2.4s ease-in-out infinite; }
  .cta-glow:hover { transform: translateY(-3px) scale(1.04); }
</style>

<div class="scroll-progress" id="progressBar"></div>

<!-- HERO -->
<section class="hero">
  <img class="hero-bg" src="https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=1400&h=900&fit=crop&auto=format" alt="Toyota Corolla">
  <div class="hero-gradient"></div>

  <span class="hero-particle" style="width:340px;height:340px;top:-60px;left:-80px;animation-delay:0s;"></span>
  <span class="hero-particle" style="width:220px;height:220px;top:30%;right:-40px;animation-delay:1.5s;"></span>
  <span class="hero-particle" style="width:180px;height:180px;bottom:20%;left:15%;animation-delay:3s;"></span>
  <span class="hero-particle" style="width:260px;height:260px;top:52%;left:45%;animation-delay:4.5s;opacity:.25;"></span>

  <div class="hero-watermark"><img src="../imports/TORVEN_LOGO.png" alt=""></div>

  <div class="hero-content">
    <p class="hero-tag fade-up" d="1">Toyota</p>
    <h1 class="hero-title fade-up" d="2">Corolla 2024</h1>
    <p class="hero-sub fade-up" d="3"><span id="typed"></span><span class="cursor"></span></p>
    <div class="fade-up" d="4" style="display:flex;gap:16px;">
      <a href="horarios.php" class="btn-red">Reservar turno</a>
      <a href="modelos.php" class="btn-glass">Ver modelos →</a>
    </div>
  </div>

  <div class="hero-dots">
    <div class="hero-dot on"></div>
    <div class="hero-dot"></div>
    <div class="hero-dot"></div>
  </div>
</section>

<!-- TICKER -->
<div class="ticker">
  <div class="ticker-track">
    <span class="ticker-item">Servicio completo ⚙️</span><span class="ticker-item">Frenos y suspensión 🔩</span><span class="ticker-item">Electricidad y ECU ⚡</span><span class="ticker-item">Carrocería y pintura 🎨</span><span class="ticker-item">Climatización ❄️</span><span class="ticker-item">Transmisión y caja 🔧</span>
    <span class="ticker-item">Servicio completo ⚙️</span><span class="ticker-item">Frenos y suspensión 🔩</span><span class="ticker-item">Electricidad y ECU ⚡</span><span class="ticker-item">Carrocería y pintura 🎨</span><span class="ticker-item">Climatización ❄️</span><span class="ticker-item">Transmisión y caja 🔧</span>
  </div>
</div>

<!-- STATS -->
<section style="background:#C00000;">
  <div style="display:grid;grid-template-columns:repeat(4,1fr);border-top:1px solid rgba(0,0,0,0.2);">
    <?php
    $stats = [['18','+','Años de experiencia'],['12400','k','Vehículos atendidos'],['4.9','★','Valoración promedio'],['98','%','Clientes satisfechos']];
    foreach ($stats as [$n,$suf,$l]): ?>
    <div class="stat-cell reveal" data-delay="1">
      <p class="stat-num"><span class="val" data-target="<?= $n ?>">0</span><span><?= $suf == 'k' ? 'K' : $suf ?></span></p>
      <p class="stat-label"><?= $l ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- SERVICES -->
<section style="background:#111;padding:90px 64px;">
  <p class="reveal" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:12px;color:#E53535;">Nuestros servicios</p>
  <h2 class="reveal" data-delay="1" style="font-size:42px;font-weight:800;margin-bottom:52px;color:#fff;">Todo lo que tu vehículo necesita</h2>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:18px;">
    <?php
    $services = [
      ['⚙️','Servicio Completo','Cambio de aceite, filtros, correas y revisión general del motor.','#C00000'],
      ['🔩','Frenos y Suspensión','Pastillas, discos, amortiguadores y alineación de precisión.','#CA8A04'],
      ['⚡','Electricidad y ECU','Diagnóstico computarizado, sensores, batería y arneses.','#16A34A'],
      ['🎨','Carrocería y Pintura','Reparación de abolladuras, pintura poliuretano y pulido.','#C00000'],
      ['❄️','Climatización','Carga de gas, limpieza de filtros y reparación de compresor.','#CA8A04'],
      ['🔧','Transmisión y Caja','Caja manual y automática, diferencial y cardán.','#16A34A'],
    ];
    foreach ($services as [$icon,$title,$desc,$color]): ?>
    <div class="service-card reveal" data-delay="1" style="--accent:<?= $color ?>;">
      <div class="s-icon"><?= $icon ?></div>
      <h3 style="font-size:17px;font-weight:700;margin-bottom:8px;color:#fff;"><?= $title ?></h3>
      <p style="font-size:13px;line-height:1.6;color:#9CA3AF;"><?= $desc ?></p>
      <div class="s-bar" style="background:<?= $color ?>;"></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- REVIEW TEASER -->
<section style="background:linear-gradient(120deg,#C00000,#8f0a0a);padding:70px 64px;display:flex;align-items:center;gap:64px;">
  <div class="reveal" style="flex:1;">
    <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:12px;color:rgba(255,255,255,0.6);">Lo que dicen nuestros clientes</p>
    <blockquote style="font-size:28px;font-weight:700;line-height:1.4;margin-bottom:24px;color:#fff;">"El mejor taller que visité. Diagnóstico preciso, precios justos y entrega puntual."</blockquote>
    <p style="font-weight:600;color:rgba(255,255,255,0.85);">Martina López · Toyota RAV4 2022</p>
    <a href="resenas.php" class="btn-glass reveal" data-delay="1" style="display:inline-block;margin-top:26px;">Ver todas las reseñas →</a>
  </div>
  <div class="reveal" data-delay="1" style="width:340px;height:220px;border-radius:14px;overflow:hidden;flex-shrink:0;box-shadow:0 24px 60px rgba(0,0,0,.4);">
    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop&auto=format" alt="taller" style="width:100%;height:100%;object-fit:cover;opacity:0.7;filter:saturate(1.1);">
  </div>
</section>

<!-- CTA -->
<section style="background:#111;padding:90px 64px;display:flex;align-items:center;justify-content:space-between;">
  <div class="reveal">
    <h2 style="font-size:42px;font-weight:800;color:#fff;">¿Listo para agendar?</h2>
    <p style="font-size:18px;margin-top:10px;color:#9CA3AF;">Seleccioná fecha y hora en minutos. Sin esperas innecesarias.</p>
  </div>
  <a href="horarios.php" class="cta-glow reveal" data-delay="1">Reservar turno →</a>
</section>

<script>
(function () {
  /* Reveal al hacer scroll */
  var revealEls = document.querySelectorAll('.reveal');
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) {
      if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); }
    });
  }, { threshold: 0.15 });
  revealEls.forEach(function (el) { io.observe(el); });

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
        if (p < 1) requestAnimationFrame(tick);
      }
      requestAnimationFrame(tick);
      numIO.unobserve(el);
    });
  }, { threshold: 0.4 });
  document.querySelectorAll('.stat-num .val').forEach(function (el) { numIO.observe(el); });

  /* Barra de progreso de scroll */
  var bar = document.getElementById('progressBar');
  function prog() {
    var h = document.documentElement;
    var max = h.scrollHeight - h.clientHeight;
    bar.style.width = (max ? (h.scrollTop || document.body.scrollTop) / max * 100 : 0) + '%';
  }
  window.addEventListener('scroll', prog, { passive: true });
  prog();

  /* Typewriter del hero */
  var phrases = ['Servicio mayor · Frenos · Cambio aceite', 'Diagnóstico computarizado · ECU', 'Carrocería y pintura premium'];
  var el = document.getElementById('typed');
  var pi = 0, ci = 0, del = false;
  (function step() {
    var word = phrases[pi];
    el.textContent = word.slice(0, ci);
    if (!del && ci < word.length) { ci++; setTimeout(step, 70); }
    else if (!del) { del = true; setTimeout(step, 2200); }
    else if (ci > 0) { ci--; setTimeout(step, 30); }
    else { del = false; pi = (pi + 1) % phrases.length; setTimeout(step, 350); }
  })();
})();
</script>

<?php include '_footer.php'; ?>
</body>
</html>