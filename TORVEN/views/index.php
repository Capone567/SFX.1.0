<!-- ============================================================
     VISTA: HOME — Solo contenido (sin head/nav/footer)
     El JS y CSS están centralizados en js/script.js y css/index.css
     ============================================================ -->

<!-- HERO -->
<section class="hero">
  <img class="hero-bg" src="https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=1400&h=900&fit=crop&auto=format" alt="Toyota Corolla">
  <div class="hero-gradient"></div>

  <span class="hero-particle" style="width:340px;height:340px;top:-60px;left:-80px;animation-delay:0s;"></span>
  <span class="hero-particle" style="width:220px;height:220px;top:30%;right:-40px;animation-delay:1.5s;"></span>
  <span class="hero-particle" style="width:180px;height:180px;bottom:20%;left:15%;animation-delay:3s;"></span>
  <span class="hero-particle" style="width:260px;height:260px;top:52%;left:45%;animation-delay:4.5s;opacity:.25;"></span>

  <div class="hero-watermark"><img src="imports/TORVEN_LOGO.png" alt=""></div>

  <div class="hero-content">
    <p class="hero-tag fade-up" d="1">Toyota</p>
    <h1 class="hero-title fade-up" d="2">Corolla 2024</h1>
    <p class="hero-sub fade-up" d="3"><span id="typed"></span><span class="cursor"></span></p>
    <div class="fade-up" d="4" style="display:flex;gap:16px;">
      <a href="#horarios" class="btn-red">Reservar turno</a>
      <a href="#modelos" class="btn-glass">Ver modelos →</a>
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
    <a href="#resenas" class="btn-glass reveal" data-delay="1" style="display:inline-block;margin-top:26px;">Ver todas las reseñas →</a>
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
  <a href="#horarios" class="cta-glow reveal" data-delay="1">Reservar turno →</a>
</section>