<?php $title = 'Reseñas'; $page = 'resenas.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<style>
  .reveal { opacity: 0; transform: translateY(30px); transition: opacity .7s ease, transform .7s cubic-bezier(.22,1,.36,1); }
  .reveal.in { opacity: 1; transform: none; }
  .reveal[data-delay="1"] { transition-delay: .12s; }
  .reveal[data-delay="2"] { transition-delay: .24s; }
  .reveal[data-delay="3"] { transition-delay: .36s; }

  /* ---- Header ---- */
  .rev-header { position: relative; overflow: hidden; background: linear-gradient(150deg,#7a0000,#C00000 45%,#8f0a0a); padding: 150px 32px 80px; text-align: center; }
  .rev-header::before { content: ""; position: absolute; inset: 0; background: radial-gradient(ellipse 60% 60% at 50% 0%, rgba(255,255,255,.1), transparent 65%); animation: hGlow 7s ease-in-out infinite alternate; pointer-events: none; }
  @keyframes hGlow { from { transform: translateY(-20px); opacity: .5; } to { transform: translateY(20px); opacity: 1; } }

  .spot { position: absolute; width: 560px; height: 560px; border-radius: 50%; top: 0; left: 0; pointer-events: none; background: radial-gradient(circle, rgba(255,255,255,.14), rgba(255,255,255,.05) 40%, transparent 72%); filter: blur(36px); will-change: transform; }

  .glowblob { position: absolute; left: 50%; top: 56%; transform: translate(-50%,-50%); width: 560px; height: 560px; border-radius: 50%; pointer-events: none; background: radial-gradient(circle, rgba(234,179,8,.22), rgba(192,0,0,.14) 45%, transparent 72%); filter: blur(28px); animation: blobPulse 4.5s ease-in-out infinite; }
  @keyframes blobPulse { 0%,100% { opacity: .5; transform: translate(-50%,-50%) scale(1); } 50% { opacity: 1; transform: translate(-50%,-50%) scale(1.12); } }

  .hstar3d { position: absolute; will-change: transform; pointer-events: none; }
  .g-star { display: block; color: #FBBF24; text-shadow: 0 0 18px rgba(251,191,36,.85); animation: starFloat 6s ease-in-out infinite; }
  @keyframes starFloat { 0%,100% { transform: translateY(0) rotate(0deg) scale(1); opacity: .35; } 50% { transform: translateY(-30px) rotate(20deg) scale(1.3); opacity: .8; } }
  .hdot { position: absolute; border-radius: 50%; background: radial-gradient(circle, rgba(255,255,255,.55), transparent 70%); animation: hDotFloat 8s ease-in-out infinite; pointer-events: none; }
  @keyframes hDotFloat { 0%,100% { transform: translateY(0); opacity: .3; } 50% { transform: translateY(-40px); opacity: .7; } }

  .badge-verify { display: inline-block; font-size: 12px; font-weight: 800; text-transform: uppercase; letter-spacing: .18em; color: #CA8A04; background: rgba(202,138,4,.14); border: 1px solid rgba(202,138,4,.45); padding: 8px 18px; border-radius: 999px; margin-bottom: 16px; }
  .badge-verify svg { vertical-align: -2px; margin-right: 6px; }
  .rev-title { font-size: 56px; font-weight: 800; color: #fff; letter-spacing: -1px; text-shadow: 0 6px 30px rgba(0,0,0,.35); }
  .rev-head-sub { font-size: 17px; color: rgba(255,255,255,.85); margin-top: 12px; font-weight: 500; }

  /* ---- Score card interactivo ---- */
  .score-card {
    position: relative; width: 380px; margin: 50px auto 0; padding: 46px 36px 34px;
    border-radius: 28px; text-align: center;
    background: linear-gradient(165deg, rgba(30,30,30,.92), rgba(14,14,14,.96));
    border: 1px solid rgba(255,255,255,.1);
    box-shadow: 0 34px 90px rgba(0,0,0,.5), inset 0 1px 0 rgba(255,255,255,.09);
    transform-style: preserve-3d; will-change: transform;
  }
  .score-card::before { content: ""; position: absolute; inset: 0; border-radius: inherit; pointer-events: none; background: radial-gradient(circle at var(--mx,50%) var(--my,20%), rgba(251,191,36,.3), transparent 62%); }
  .score-card::after { content: ""; position: absolute; top: 0; left: -130%; width: 60%; height: 100%; pointer-events: none; background: linear-gradient(120deg, transparent, rgba(255,255,255,.12), transparent); transform: skewX(-18deg); animation: cardShine 5s ease-in-out infinite; }
  @keyframes cardShine { 0%, 55% { left: -130%; } 100% { left: 170%; } }
  .score-num { position: relative; transform: translateZ(32px); display: inline-block; font-size: 96px; font-weight: 800; line-height: 1; background: linear-gradient(180deg,#ffe08a,#eab308 55%,#b45309); -webkit-background-clip: text; background-clip: text; color: transparent; filter: drop-shadow(0 10px 30px rgba(234,179,8,.4)); }
  .score-stars { position: relative; font-size: 26px; color: #FBBF24; letter-spacing: 6px; margin: 12px 0 22px; animation: starShimmer 2.4s ease-in-out infinite; }
  @keyframes starShimmer { 0%,100% { text-shadow: 0 0 10px rgba(251,191,36,.55); } 50% { text-shadow: 0 0 28px rgba(251,191,36,1); } }
  .score-foot { position: relative; display: flex; align-items: center; justify-content: center; gap: 14px; transform: translateZ(24px); }
  .mini-av { display: flex; }
  .mini-av img { width: 30px; height: 30px; border-radius: 50%; border: 2px solid #191919; margin-left: -9px; object-fit: cover; }
  .mini-av img:first-child { margin-left: 0; }
  .score-meta { font-size: 12px; color: #fff; font-weight: 700; }
  .score-meta2 { font-size: 11px; color: #9CA3AF; margin-top: 2px; }

  .bars-wrap { width: 340px; margin: 40px auto 0; text-align: left; display: flex; flex-direction: column; gap: 7px; }
  .bar-row .bar { transition: width 1.4s cubic-bezier(.22,1,.36,1); }
  .bar-row:not(.on) .bar { width: 0 !important; }

  /* ---- Banda clientes verificados ---- */
  .verified { background: #111; padding: 84px 64px 0; text-align: center; }
  .sec-label { font-size: 11px; font-weight: 800; text-transform: uppercase; letter-spacing: .2em; color: #E53535; margin-bottom: 14px; }
  .sec-title { font-size: 38px; font-weight: 800; color: #fff; max-width: 640px; margin: 0 auto; line-height: 1.2; }
  .sec-title em { color: #E53535; font-style: normal; }
  .sec-sub { font-size: 15px; color: #9CA3AF; max-width: 520px; margin: 14px auto 34px; }

  .avatar-row { display: flex; justify-content: center; }
  .avatar-item { position: relative; width: 64px; height: 64px; margin-left: -14px; border-radius: 50%; border: 3px solid #1A1A1A; box-shadow: 0 6px 20px rgba(0,0,0,.4); transition: transform .25s ease; }
  .avatar-item:first-child { margin-left: 0; }
  .avatar-item:hover { transform: translateY(-6px) scale(1.06); z-index: 2; }
  .avatar-item img { width: 100%; height: 100%; border-radius: 50%; object-fit: cover; }
  .avatar-check { position: absolute; bottom: -4px; right: -4px; width: 22px; height: 22px; border-radius: 50%; background: #22C55E; color: #fff; font-size: 13px; font-weight: 800; display: flex; align-items: center; justify-content: center; border: 2px solid #111; animation: checkPop .6s cubic-bezier(.34,1.56,.64,1) both; }
  @keyframes checkPop { from { transform: scale(0); } to { transform: scale(1); } }
  .ver-tag { display: inline-block; margin-top: 26px; padding: 10px 22px; border-radius: 999px; border: 1px solid rgba(34,197,94,.4); background: rgba(34,197,94,.08); color: #86EFAC; font-size: 13px; font-weight: 700; }

  /* ---- Highlights ---- */
  .highlights { background: #111; padding: 64px 64px 90px; }
  .hl-card { padding: 28px; border-radius: 14px; background: #1A1A1A; border: 1px solid #2A2A2A; transition: transform .35s ease, border-color .35s ease, box-shadow .35s ease; }
  .hl-card:hover { transform: translateY(-8px); border-color: rgba(229,53,53,.45); box-shadow: 0 22px 46px rgba(0,0,0,.5), 0 0 26px rgba(192,0,0,.1); }
  .hl-icon { font-size: 34px; margin-bottom: 14px; display: inline-block; transition: transform .35s ease; }
  .hl-card:hover .hl-icon { transform: scale(1.2) rotate(-8deg); }
  .hl-pct { font-size: 40px; font-weight: 800; color: #E53535; }
  .hl-bar { height: 6px; border-radius: 3px; background: #2A2A2A; overflow: hidden; margin-top: 16px; }
  .hl-bar i { display: block; height: 100%; border-radius: 3px; background: linear-gradient(90deg,#C00000,#E53535); box-shadow: 0 0 12px rgba(229,53,53,.6); transition: width 1.4s cubic-bezier(.22,1,.36,1); }
  .hl-card:not(.on) .hl-bar i { width: 0 !important; }

  /* ---- Carousel ---- */
  .carousel-wrap { position: relative; max-width: 780px; margin: 0 auto; }
  .carousel-viewport { overflow: hidden; border-radius: 20px; }
  .carousel-track { display: flex; transition: transform .6s cubic-bezier(.22,1,.36,1); }
  .carousel-slide { flex: 0 0 100%; }
  .card {
    position: relative; margin: 0 auto; padding: 48px 56px 40px;
    background: linear-gradient(160deg, #1A1A1A, #161616);
    border: 1px solid #2A2A2A; border-radius: 20px; text-align: center;
    overflow: hidden;
    opacity: 0; transform: scale(.94);
  }
  .card::before { content: ""; position: absolute; top: -120px; left: 50%; transform: translateX(-50%); width: 420px; height: 420px; background: radial-gradient(circle, rgba(192,0,0,.22), transparent 70%); pointer-events: none; animation: cardGlow 6s ease-in-out infinite alternate; }
  @keyframes cardGlow { from { opacity: .7; } to { opacity: 1; } }
  .carousel-slide.active .card { animation: cardIn .55s cubic-bezier(.22,1,.36,1) forwards; }
  @keyframes cardIn { from { opacity: 0; transform: scale(.94); } to { opacity: 1; transform: none; } }

  .quote-mark { font-size: 96px; font-weight: 800; line-height: 1; color: #C00000; height: 60px; opacity: .9; }
  .stars { font-size: 26px; color: #CA8A04; letter-spacing: 4px; margin-bottom: 22px; text-shadow: 0 0 22px rgba(202,138,4,.55); }
  .card-text { font-size: 20px; line-height: 1.65; color: #E5E7EB; max-width: 560px; margin: 0 auto 28px; font-weight: 500; }
  .card-foot { display: flex; align-items: center; justify-content: center; gap: 14px; }
  .avatar { width: 52px; height: 52px; border-radius: 50%; object-fit: cover; border: 2px solid #C00000; box-shadow: 0 0 0 4px rgba(192,0,0,.18); }
  .card-name { font-size: 15px; font-weight: 800; color: #fff; text-align: left; }
  .card-car { font-size: 12px; color: #9CA3AF; text-align: left; margin-top: 2px; }
  .card-date { margin-left: 12px; font-size: 11px; color: #4B5563; padding: 5px 10px; border: 1px solid #2A2A2A; border-radius: 999px; }

  .carr-nav {
    position: absolute; top: 50%; transform: translateY(-50%); z-index: 5;
    width: 46px; height: 46px; border-radius: 50%; border: 1px solid rgba(255,255,255,.2);
    background: rgba(17,17,17,.7); color: #fff; font-size: 22px; cursor: pointer;
    backdrop-filter: blur(8px);
    transition: transform .2s ease, background .25s ease, border-color .25s ease, box-shadow .25s ease;
  }
  .carr-nav:hover { background: #C00000; border-color: #C00000; transform: translateY(-50%) scale(1.12); box-shadow: 0 8px 24px rgba(192,0,0,.5); }
  .carr-prev { left: -70px; }
  .carr-next { right: -70px; }

  .carr-dots { display: flex; justify-content: center; gap: 10px; margin-top: 26px; }
  .carr-dot { width: 10px; height: 10px; border-radius: 999px; border: none; background: #333; cursor: pointer; padding: 0; transition: width .3s ease, background .3s ease, box-shadow .3s ease; }
  .carr-dot.on { width: 30px; background: #C00000; box-shadow: 0 0 12px rgba(192,0,0,.7); }

  .btn-white { display: inline-block; padding: 15px 34px; border-radius: 12px; background: linear-gradient(135deg,#fff,#e5e7eb); color: #B00000; font-size: 14px; font-weight: 800; transition: transform .25s ease, box-shadow .3s ease, animation; animation: ctaGlow 2.6s ease-in-out infinite; }
  .btn-white:hover { transform: translateY(-3px); box-shadow: 0 12px 30px rgba(0,0,0,.35); }
  @keyframes ctaGlow { 0%,100% { box-shadow: 0 0 0 0 rgba(255,255,255,.35); } 50% { box-shadow: 0 0 0 14px rgba(255,255,255,0); } }
</style>

<!-- HEADER -->
<div class="rev-header" id="revHeader">
  <div class="spot" id="spot"></div>
  <div class="glowblob"></div>

  <span class="hstar3d" data-depth="26" style="top:120px;left:10%;"><span class="g-star" style="font-size:34px;">★</span></span>
  <span class="hstar3d" data-depth="48" style="top:200px;right:14%;"><span class="g-star" style="font-size:22px;animation-delay:1.2s;">★</span></span>
  <span class="hstar3d" data-depth="38" style="top:90px;right:32%;"><span class="g-star" style="font-size:18px;animation-delay:2.4s;">★</span></span>
  <span class="hstar3d" data-depth="60" style="bottom:130px;left:22%;"><span class="g-star" style="font-size:26px;animation-delay:3.2s;">★</span></span>
  <span class="hstar3d" data-depth="20" style="bottom:170px;right:7%;"><span class="g-star" style="font-size:36px;animation-delay:4s;">★</span></span>
  <span class="hdot" style="width:16px;height:16px;top:220px;left:38%;animation-delay:.6s;"></span>
  <span class="hdot" style="width:10px;height:10px;bottom:190px;right:30%;animation-delay:1.8s;"></span>

  <p class="badge-verify reveal in">
    <svg width="14" height="14" viewBox="0 0 24 24" fill="#22C55E"><path d="M12 2l2.4 2.4 3.4-.5.5 3.4L21 10l-1.7 3 1.7 3-2.7 2.7-.5 3.4-3.4-.5L12 24l-2.4-2.4-3.4.5-.5-3.4L3 16l1.7-3L3 10l2.7-2.7.5-3.4 3.4.5L12 2zm-1.2 14.5l6-6-1.4-1.4-4.6 4.6-2.2-2.2-1.4 1.4 3.6 3.6z"/></svg>
    Opiniones verificadas
  </p>
  <h1 class="rev-title reveal in">Reseñas</h1>
  <p class="rev-head-sub reveal in">La voz de nuestros clientes, después de confiar su vehículo a Torven.</p>

  <div class="score-card reveal in" id="scoreCard">
    <p class="score-num" data-target="4.9">0.0</p>
    <p class="score-stars">★★★★★</p>
    <div class="score-foot">
      <div class="mini-av">
        <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=64&h=64&fit=crop&auto=format" alt="">
        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=64&h=64&fit=crop&auto=format" alt="">
        <img src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=64&h=64&fit=crop&auto=format" alt="">
      </div>
      <div>
        <p class="score-meta">847 reseñas verificadas</p>
        <p class="score-meta2">98% recomienda el taller</p>
      </div>
    </div>
  </div>

  <div class="bars-wrap reveal in">
    <?php
    $bars = [[5,92],[4,6],[3,1],[2,1],[1,0]];
    foreach ($bars as [$rv,$pct]): ?>
    <div class="bar-row" style="display:flex;align-items:center;gap:12px;">
      <span style="font-size:12px;width:16px;color:rgba(255,255,255,0.7);"><?= $rv ?>★</span>
      <div style="flex:1;height:6px;border-radius:3px;background:rgba(255,255,255,0.2);overflow:hidden;">
        <div class="bar" style="width:<?= $pct ?>%;height:100%;border-radius:3px;background:linear-gradient(90deg,#CA8A04,#FBBF24);box-shadow:0 0 8px rgba(202,138,4,.5);"></div>
      </div>
      <span style="font-size:12px;width:34px;color:rgba(255,255,255,0.6);text-align:right;"><?= $pct ?>%</span>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<!-- BANDA CLIENTES VERIFICADOS -->
<section class="verified">
  <p class="sec-label reveal">Clientes reales · Reseñas verificadas</p>
  <h2 class="sec-title reveal" data-delay="1">Nuestros clientes <em>verificaron</em> nuestro servicio</h2>
  <p class="sec-sub reveal" data-delay="2">Cada opinión proviene de una persona que atendimos personalmente en el taller. Sin filtros, sin inventos.</p>

  <div class="avatar-row reveal" data-delay="2">
    <?php
    $avatars = [
      'https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=96&h=96&fit=crop&auto=format',
      'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=96&h=96&fit=crop&auto=format',
      'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=96&h=96&fit=crop&auto=format',
      'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=96&h=96&fit=crop&auto=format',
      'https://images.unsplash.com/photo-1580489944761-15a19d654956?w=96&h=96&fit=crop&auto=format',
      'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=96&h=96&fit=crop&auto=format',
    ];
    foreach ($avatars as $av): ?>
    <div class="avatar-item">
      <img src="<?= $av ?>" alt="Cliente verificado">
      <span class="avatar-check">✓</span>
    </div>
    <?php endforeach; ?>
  </div>

  <p class="ver-tag reveal" data-delay="3">✔ +800 clientes verificados este año · 98% volvería a recomendar el taller</p>
  <div style="height:70px;"></div>
</section>

<!-- LO QUE MÁS DESTACAN -->
<section class="highlights">
  <p class="sec-label reveal" style="text-align:center;">En sus propias palabras</p>
  <h3 class="reveal" data-delay="1" style="font-size:34px;font-weight:800;color:#fff;margin-bottom:44px;text-align:center;">Lo que más valoran nuestros clientes</h3>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
    <?php
    $highlights = [
      ['⚡','Puntualidad','Cumplen los plazos prometidos','92','Entregaron mi auto a la hora justa.'],
      ['🛠️','Diagnóstico preciso','Encuentran la falla a la primera','88','Identificaron en minutos lo que otros no vieron.'],
      ['💸','Precios justos','Presupuestos exactos y claros','85','El presupuesto se respetó al pie de la letra.'],
    ];
    foreach ($highlights as [$icon,$t,$d,$p,$q]): ?>
    <div class="hl-card reveal" data-delay="1">
      <span class="hl-icon"><?= $icon ?></span>
      <h4 style="font-size:17px;font-weight:800;color:#fff;"><?= $t ?></h4>
      <p style="font-size:13px;color:#9CA3AF;margin-top:6px;"><?= $d ?></p>
      <p class="hl-pct"><span class="pct-num" data-target="<?= $p ?>">0</span>%</p>
      <p style="font-size:12px;color:#6B7280;font-style:italic;margin-top:6px;">“<?= $q ?>”</p>
      <div class="hl-bar"><i style="width:<?= $p ?>%"></i></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- CAROUSEL -->
<section style="background:#161616;padding:70px 64px 90px;">
  <p class="sec-label reveal" style="text-align:center;">Testimonios</p>
  <h3 class="reveal" data-delay="1" style="font-size:34px;font-weight:800;color:#fff;margin-bottom:44px;text-align:center;">Historias de clientes verificados</h3>

  <div class="carousel-wrap reveal">
    <button class="carr-nav carr-prev" aria-label="Anterior">‹</button>
    <div class="carousel-viewport" id="carrBox">
      <div class="carousel-track" id="track">
        <?php
        $reviews = [
          ['Martina López','Toyota RAV4 2022',5,'"El mejor taller que visité. Diagnóstico preciso, precios justos y entrega puntual. Mi RAV4 quedó como nueva."','2 Sep 2026','https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&fit=crop&auto=format'],
          ['Carlos Ibáñez','VW Golf GTI 2023',5,'"Increíble trabajo en la suspensión del Golf. Notás la diferencia desde el primer kilómetro."','28 Ago 2026','https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&auto=format'],
          ['Ana Rodríguez','Honda CR-V 2024',4,'"Muy buen servicio. El asesor explicó todo con detalle y el trabajo estuvo listo antes de lo prometido."','20 Ago 2026','https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80&h=80&fit=crop&auto=format'],
          ['Roberto Díaz','Ford Ranger 2024',5,'"Servicios para 4x4 de altísima calidad. Detectaron un problema que otros talleres habían pasado por alto."','15 Ago 2026','https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=80&h=80&fit=crop&auto=format'],
          ['Valeria Suárez','Chevrolet Cruze 2023',5,'"Traje mi Cruze por un ruido extraño. Lo identificaron en 20 minutos y lo repararon el mismo día."','8 Ago 2026','https://images.unsplash.com/photo-1580489944761-15a19d654956?w=80&h=80&fit=crop&auto=format'],
          ['Diego Ferreyra','Nissan Frontier 2023',4,'"Buen trabajo en la caja de cambios. Tienen conocimiento real del modelo. El presupuesto fue exacto."','30 Jul 2026','https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&auto=format'],
        ];
        foreach ($reviews as $i => [$name,$car,$rating,$text,$date,$avatar]): ?>
        <div class="carousel-slide<?= $i === 0 ? ' active' : '' ?>">
          <div class="card">
            <div class="quote-mark">“</div>
            <div class="stars"><?= str_repeat('★',$rating) ?><?= str_repeat('☆',5-$rating) ?></div>
            <p class="card-text"><?= $text ?></p>
            <div class="card-foot">
              <img class="avatar" src="<?= $avatar ?>" alt="<?= $name ?>">
              <div>
                <p class="card-name"><?= $name ?></p>
                <p class="card-car"><?= $car ?></p>
              </div>
              <span class="card-date"><?= $date ?></span>
            </div>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
    <button class="carr-nav carr-next" aria-label="Siguiente">›</button>
  </div>
  <div class="carr-dots reveal" id="dots"></div>
</section>

<!-- CTA -->
<section style="background:linear-gradient(120deg,#C00000,#8f0a0a);padding:60px 64px;display:flex;align-items:center;justify-content:space-between;">
  <div class="reveal">
    <h3 style="font-size:26px;font-weight:800;color:#fff;">¿Ya visitaste el taller?</h3>
    <p style="margin-top:6px;color:rgba(255,255,255,0.75);">Compartí tu experiencia y ayudá a otros conductores.</p>
  </div>
  <a href="#" class="btn-white reveal" data-delay="1">Escribir reseña →</a>
</section>

<script>
(function () {
  /* Reveal */
  var io = new IntersectionObserver(function (es) {
    es.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('in'); io.unobserve(e.target); } });
  }, { threshold: 0.15 });
  document.querySelectorAll('.reveal').forEach(function (el) { io.observe(el); });

  /* Barra de progreso de scroll */
  var bar = document.createElement('div');
  bar.style.cssText = 'position:fixed;top:0;left:0;height:3px;width:0;z-index:60;background:linear-gradient(90deg,#8f0a0a,#E53535,#ff6b6b);box-shadow:0 0 8px rgba(229,53,53,.8);';
  document.body.appendChild(bar);
  function prog() {
    var h = document.documentElement;
    var max = h.scrollHeight - h.clientHeight;
    bar.style.width = (max ? (h.scrollTop || document.body.scrollTop) / max * 100 : 0) + '%';
  }
  window.addEventListener('scroll', prog, { passive: true });
  prog();

  /* Contador 4.9 del header */
  var sc = document.querySelector('.score-num');
  if (sc) {
    var tgt = parseFloat(sc.dataset.target); var t0 = null;
    function tick(now) {
      if (!t0) t0 = now;
      var p = Math.min((now - t0) / 2000, 1);
      var eased = 1 - Math.pow(1 - p, 3);
      sc.textContent = (tgt * eased).toFixed(1).replace('.', ',');
      if (p < 1) requestAnimationFrame(tick);
    }
    requestAnimationFrame(tick);
  }

  /* Barras de rating */
  requestAnimationFrame(function () {
    document.querySelectorAll('.bar-row').forEach(function (r) { r.classList.add('on'); });
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
        if (p < 1) requestAnimationFrame(tick);
      })();
      hlIO.unobserve(e.target);
    });
  }, { threshold: 0.4 });
  document.querySelectorAll('.hl-card').forEach(function (el) { hlIO.observe(el); });

  /* ---- Interacción del header con el mouse ---- */
  var header = document.getElementById('revHeader');
  var card = document.getElementById('scoreCard');
  var spot = document.getElementById('spot');
  var layers = document.querySelectorAll('.hstar3d');
  var sx = 0, sy = 0, tx = 0, ty = 0;
  var curRX = 0, curRY = 0, tgtRX = 0, tgtRY = 0;
  var MAX_X = 7, MAX_Y = 9;

  function clamp(v, min, max) { return Math.min(Math.max(v, min), max); }

  header.addEventListener('mousemove', function (e) {
    var r = header.getBoundingClientRect();
    var nx = (e.clientX - r.left) / r.width * 2 - 1;   /* -1 .. 1 */
    var ny = (e.clientY - r.top) / r.height * 2 - 1;

    /* Tilt 3D de la tarjeta (limitado) + spotlight */
    var cr = card.getBoundingClientRect();
    var cx = (e.clientX - cr.left) / cr.width * 2 - 1;
    var cy = (e.clientY - cr.top) / cr.height * 2 - 1;
    tgtRX = clamp(-cy * 9, -MAX_X, MAX_X);
    tgtRY = clamp(cx * 12, -MAX_Y, MAX_Y);
    card.style.setProperty('--mx', (cx * 50 + 50) + '%');
    card.style.setProperty('--my', (cy * 50 + 50) + '%');

    /* Parallax de estrellas */
    layers.forEach(function (l) {
      var d = parseFloat(l.getAttribute('data-depth')) || 20;
      l.style.transform = 'translate(' + (nx * d) + 'px,' + (ny * d) + 'px)';
    });

    /* Spotlight que sigue al mouse */
    tx = e.clientX - r.left; ty = e.clientY - r.top;
  });

  header.addEventListener('mouseleave', function () {
    tgtRX = 0; tgtRY = 0;
    tx = 0; ty = 0;
    layers.forEach(function (l) { l.style.transform = 'translate(0,0)'; });
  });

  (function loop() {
    curRX += (tgtRX - curRX) * 0.12;
    curRY += (tgtRY - curRY) * 0.12;
    sx += (tx - sx) * 0.09; sy += (ty - sy) * 0.09;
    card.style.transform = 'perspective(950px) rotateX(' + curRX.toFixed(2) + 'deg) rotateY(' + curRY.toFixed(2) + 'deg) translateY(-3px)';
    spot.style.transform = 'translate(' + (sx - 280) + 'px,' + (sy - 280) + 'px)';
    requestAnimationFrame(loop);
  })();

  /* Carrusel */
  var track = document.getElementById('track');
  var slides = track.children;
  var n = slides.length, i = 0;
  var dotsBox = document.getElementById('dots');
  var dots = [];
  for (var k = 0; k < n; k++) {
    (function (k) {
      var d = document.createElement('button');
      d.className = 'carr-dot' + (k === 0 ? ' on' : '');
      d.addEventListener('click', function () { go(k); reset(); });
      dotsBox.appendChild(d); dots.push(d);
    })(k);
  }

  function go(idx) {
    i = (idx + n) % n;
    track.style.transform = 'translateX(-' + (i * 100) + '%)';
    for (var k = 0; k < n; k++) {
      slides[k].className = 'carousel-slide' + (k === i ? ' active' : '');
      dots[k].className = 'carr-dot' + (k === i ? ' on' : '');
    }
  }

  function next() { go(i + 1); }
  function prev() { go(i - 1); }
  function autoplay() { timer = setInterval(next, 6000); }
  function reset() { clearInterval(timer); autoplay(); }
  var timer; autoplay();

  document.querySelector('.carr-prev').addEventListener('click', function () { prev(); reset(); });
  document.querySelector('.carr-next').addEventListener('click', function () { next(); reset(); });

  var box = document.getElementById('carrBox');
  box.addEventListener('mouseenter', function () { clearInterval(timer); });
  box.addEventListener('mouseleave', autoplay);

  /* Swipe táctil */
  var x0 = null;
  box.addEventListener('touchstart', function (e) { x0 = e.touches[0].clientX; clearInterval(timer); }, { passive: true });
  box.addEventListener('touchend', function (e) {
    if (x0 === null) return;
    var dx = e.changedTouches[0].clientX - x0;
    if (Math.abs(dx) > 40) { dx < 0 ? next() : prev(); reset(); }
    x0 = null;
  }, { passive: true });
})();
</script>

<?php include '_footer.php'; ?>
</body>
</html>