<?php $title = 'Inicio'; $page = 'index.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<!-- HERO -->
<section style="position:relative;height:100vh;display:flex;flex-direction:column;justify-content:flex-end;overflow:hidden;">
  <img src="https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=1400&h=900&fit=crop&auto=format" alt="Toyota Corolla" style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;filter:brightness(0.38);">
  <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(96,0,0,0.8) 0%,transparent 55%);"></div>
  <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;">
    <img src="src/imports/TORVEN_LOGO.png" alt="" style="width:260px;opacity:0.07;">
  </div>
  <div style="position:relative;z-index:10;padding:0 64px 80px;">
    <p style="font-size:12px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:8px;color:#E53535;">Toyota</p>
    <h1 style="font-size:72px;font-weight:800;line-height:1;letter-spacing:-2px;margin-bottom:12px;color:#fff;">Corolla 2024</h1>
    <p style="font-size:18px;margin-bottom:32px;color:rgba(255,255,255,0.7);">Servicio mayor · Frenos · Cambio aceite</p>
    <div style="display:flex;gap:16px;">
      <a href="horarios.php" style="padding:14px 32px;border-radius:6px;background:#C00000;color:#fff;font-size:14px;font-weight:700;">Reservar turno</a>
      <a href="modelos.php"  style="padding:14px 32px;border-radius:6px;background:rgba(255,255,255,0.12);color:#fff;font-size:14px;font-weight:700;border:1px solid rgba(255,255,255,0.3);">Ver modelos →</a>
    </div>
  </div>
  <div style="position:absolute;bottom:32px;right:64px;display:flex;gap:12px;z-index:10;">
    <div style="width:32px;height:8px;border-radius:4px;background:#C00000;"></div>
    <div style="width:8px;height:8px;border-radius:4px;background:rgba(255,255,255,0.4);"></div>
    <div style="width:8px;height:8px;border-radius:4px;background:rgba(255,255,255,0.4);"></div>
  </div>
</section>

<!-- STATS -->
<section style="background:#C00000;">
  <div style="display:grid;grid-template-columns:repeat(4,1fr);border-top:1px solid rgba(0,0,0,0.2);">
    <?php
    $stats = [['18+','Años de experiencia'],['12.400','Vehículos atendidos'],['4.9★','Valoración promedio'],['98%','Clientes satisfechos']];
    foreach ($stats as [$v,$l]):
    ?>
    <div style="padding:32px 40px;text-align:center;border-right:1px solid rgba(0,0,0,0.2);">
      <p style="font-size:40px;font-weight:800;color:#fff;"><?= $v ?></p>
      <p style="font-size:13px;margin-top:4px;color:rgba(255,255,255,0.75);"><?= $l ?></p>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- SERVICES -->
<section style="background:#111;padding:80px 64px;">
  <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:12px;color:#C00000;">Nuestros servicios</p>
  <h2 style="font-size:40px;font-weight:800;margin-bottom:48px;color:#fff;">Todo lo que tu vehículo necesita</h2>
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:16px;">
    <?php
    $services = [
      ['⚙️','Servicio Completo','Cambio de aceite, filtros, correas y revisión general del motor.','#C00000'],
      ['🔩','Frenos y Suspensión','Pastillas, discos, amortiguadores y alineación de precisión.','#CA8A04'],
      ['⚡','Electricidad y ECU','Diagnóstico computarizado, sensores, batería y arneses.','#16A34A'],
      ['🎨','Carrocería y Pintura','Reparación de abolladuras, pintura poliuretano y pulido.','#C00000'],
      ['❄️','Climatización','Carga de gas, limpieza de filtros y reparación de compresor.','#CA8A04'],
      ['🔧','Transmisión y Caja','Caja manual y automática, diferencial y cardán.','#16A34A'],
    ];
    foreach ($services as [$icon,$title,$desc,$color]):
    ?>
    <div style="padding:24px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;">
      <div style="font-size:32px;margin-bottom:16px;"><?= $icon ?></div>
      <h3 style="font-size:17px;font-weight:700;margin-bottom:8px;color:#fff;"><?= $title ?></h3>
      <p style="font-size:13px;line-height:1.6;color:#9CA3AF;"><?= $desc ?></p>
      <div style="margin-top:16px;width:32px;height:2px;border-radius:2px;background:<?= $color ?>;"></div>
    </div>
    <?php endforeach; ?>
  </div>
</section>

<!-- REVIEW TEASER -->
<section style="background:#C00000;padding:64px;display:flex;align-items:center;gap:64px;">
  <div style="flex:1;">
    <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:12px;color:rgba(255,255,255,0.6);">Lo que dicen nuestros clientes</p>
    <blockquote style="font-size:28px;font-weight:700;line-height:1.4;margin-bottom:24px;color:#fff;">"El mejor taller que visité. Diagnóstico preciso, precios justos y entrega puntual."</blockquote>
    <p style="font-weight:600;color:rgba(255,255,255,0.85);">Martina López · Toyota RAV4 2022</p>
    <a href="resenas.php" style="display:inline-block;margin-top:24px;padding:10px 24px;border-radius:6px;background:#fff;color:#C00000;font-size:14px;font-weight:700;">Ver todas las reseñas →</a>
  </div>
  <div style="width:320px;height:208px;border-radius:8px;overflow:hidden;flex-shrink:0;">
    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&h=400&fit=crop&auto=format" alt="taller" style="width:100%;height:100%;object-fit:cover;opacity:0.6;">
  </div>
</section>

<!-- CTA -->
<section style="background:#111;padding:80px 64px;display:flex;align-items:center;justify-content:space-between;">
  <div>
    <h2 style="font-size:40px;font-weight:800;color:#fff;">¿Listo para agendar?</h2>
    <p style="font-size:18px;margin-top:8px;color:#9CA3AF;">Seleccioná fecha y hora en minutos. Sin esperas innecesarias.</p>
  </div>
  <a href="horarios.php" style="padding:16px 40px;border-radius:6px;background:#C00000;color:#fff;font-size:15px;font-weight:700;flex-shrink:0;">Reservar turno →</a>
</section>

<?php include '_footer.php'; ?>
</body>
</html>