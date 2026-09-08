<?php $title = 'Novedades'; $page = 'novedades.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<!-- HEADER -->
<div style="background:#C00000;padding:128px 64px 64px;">
  <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:8px;color:rgba(255,255,255,0.6);">Blog</p>
  <h1 style="font-size:52px;font-weight:800;color:#fff;">Novedades del taller</h1>
</div>

<!-- ARTICLES -->
<div style="padding:40px 64px 80px;">

  <!-- Top 2 featured -->
  <div style="display:grid;grid-template-columns:1fr 1fr;gap:24px;margin-bottom:24px;">
    <?php
    $featured = [
      ['5 Sep 2026','Equipamiento','#16A34A','Incorporamos escáner OBD-III de última generación','El nuevo escáner Autel MaxiSys Ultra permite diagnósticos en tiempo real con cobertura total para vehículos 2010–2026, incluyendo híbridos y eléctricos.','https://images.unsplash.com/photo-1530124566582-a618bc2615dc?w=800&h=500&fit=crop&auto=format','3 min'],
      ['28 Ago 2026','Certificación','#CA8A04','Torven obtiene certificación oficial Toyota Service Excellence','Tras una auditoría técnica de 6 meses, nuestro equipo alcanza el estándar más alto reconocido por Toyota para talleres independientes.','https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=800&h=500&fit=crop&auto=format','5 min'],
    ];
    foreach ($featured as [$date,$tag,$tagColor,$title2,$excerpt,$img,$read]):
    ?>
    <article style="border-radius:8px;overflow:hidden;background:#1A1A1A;border:1px solid #2A2A2A;">
      <div style="position:relative;height:260px;overflow:hidden;">
        <img src="<?= $img ?>" alt="<?= $title2 ?>" style="width:100%;height:100%;object-fit:cover;filter:brightness(0.7);">
        <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.7) 0%,transparent 50%);"></div>
        <span style="position:absolute;top:16px;left:16px;padding:4px 12px;border-radius:4px;font-size:11px;font-weight:700;background:<?= $tagColor ?>;color:#fff;"><?= $tag ?></span>
      </div>
      <div style="padding:24px;">
        <p style="font-size:11px;margin-bottom:8px;color:#9CA3AF;"><?= $date ?> · <?= $read ?> lectura</p>
        <h2 style="font-size:19px;font-weight:800;line-height:1.3;margin-bottom:8px;color:#fff;"><?= $title2 ?></h2>
        <p style="font-size:13px;line-height:1.6;color:#9CA3AF;"><?= $excerpt ?></p>
        <span style="display:inline-block;margin-top:16px;font-size:13px;font-weight:700;color:#C00000;">Leer más →</span>
      </div>
    </article>
    <?php endforeach; ?>
  </div>

  <!-- List items -->
  <?php
  $items = [
    ['15 Ago 2026','Promoción','#C00000','Revisión gratuita de frenos — todo septiembre','Durante todo septiembre ofrecemos revisión gratuita del sistema de frenos para cualquier vehículo. Sin costo, sin sorpresas.','https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=800&h=500&fit=crop&auto=format','2 min'],
    ['2 Ago 2026','Tecnología','#CA8A04','Calibración ADAS para cámaras y radares','Incorporamos la estación Bosch DAS 3000 para sistemas avanzados de asistencia al conductor en vehículos modernos.','https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=800&h=500&fit=crop&auto=format','4 min'],
  ];
  foreach ($items as [$date,$tag,$tagColor,$title2,$excerpt,$img,$read]):
  ?>
  <article style="display:flex;gap:20px;padding:20px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;margin-bottom:12px;">
    <div style="width:160px;height:112px;border-radius:6px;overflow:hidden;flex-shrink:0;">
      <img src="<?= $img ?>" alt="<?= $title2 ?>" style="width:100%;height:100%;object-fit:cover;">
    </div>
    <div style="flex:1;">
      <div style="display:flex;align-items:center;gap:8px;margin-bottom:8px;">
        <span style="padding:2px 10px;border-radius:4px;font-size:11px;font-weight:700;background:<?= $tagColor ?>;color:#fff;"><?= $tag ?></span>
        <span style="font-size:11px;color:#9CA3AF;"><?= $date ?> · <?= $read ?> lectura</span>
      </div>
      <h3 style="font-size:17px;font-weight:700;margin-bottom:4px;color:#fff;"><?= $title2 ?></h3>
      <p style="font-size:13px;color:#9CA3AF;"><?= $excerpt ?></p>
    </div>
  </article>
  <?php endforeach; ?>

</div>

<?php include '_footer.php'; ?>
</body>
</html>
