<!-- ============================================================
     VISTA: RESEÑAS — Solo contenido (sin head/nav/footer)
     El JS/CSS están en js/script.js y css/index.css
     ============================================================ -->

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