<?php $title = 'Reseñas'; $page = 'resenas.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<!-- HEADER -->
<div style="background:#C00000;padding:128px 64px 64px;">
  <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:8px;color:rgba(255,255,255,0.6);">Opiniones verificadas</p>
  <h1 style="font-size:52px;font-weight:800;color:#fff;">Reseñas</h1>
  <div style="display:flex;align-items:center;gap:80px;margin-top:24px;">
    <div>
      <p style="font-size:64px;font-weight:800;color:#fff;line-height:1;">4.9</p>
      <p style="font-size:22px;color:#CA8A04;margin:4px 0;">★★★★★</p>
      <p style="font-size:14px;color:rgba(255,255,255,0.7);">Basado en 847 reseñas</p>
    </div>
    <div style="display:flex;flex-direction:column;gap:6px;">
      <?php
      $bars = [[5,92],[4,6],[3,1],[2,1],[1,0]];
      foreach ($bars as [$r,$pct]):
      ?>
      <div style="display:flex;align-items:center;gap:12px;">
        <span style="font-size:12px;width:16px;color:rgba(255,255,255,0.7);"><?= $r ?>★</span>
        <div style="width:192px;height:6px;border-radius:3px;background:rgba(255,255,255,0.2);">
          <div style="width:<?= $pct ?>%;height:100%;border-radius:3px;background:#fff;"></div>
        </div>
        <span style="font-size:12px;color:rgba(255,255,255,0.6);"><?= $pct ?>%</span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<!-- REVIEWS GRID -->
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;padding:40px 64px;">
  <?php
  $reviews = [
    ['Martina López','Toyota RAV4 2022',5,'"El mejor taller que visité. Diagnóstico preciso, precios justos y entrega puntual. Mi RAV4 quedó como nueva."','2 Sep 2026','https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=80&h=80&fit=crop&auto=format'],
    ['Carlos Ibáñez','VW Golf GTI 2023',5,'"Increíble trabajo en la suspensión del Golf. Notás la diferencia desde el primer kilómetro."','28 Ago 2026','https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=80&h=80&fit=crop&auto=format'],
    ['Ana Rodríguez','Honda CR-V 2024',4,'"Muy buen servicio. El asesor explicó todo con detalle y el trabajo estuvo listo antes de lo prometido."','20 Ago 2026','https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=80&h=80&fit=crop&auto=format'],
    ['Roberto Díaz','Ford Ranger 2024',5,'"Servicios para 4x4 de altísima calidad. Detectaron un problema que otros talleres habían pasado por alto."','15 Ago 2026','https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=80&h=80&fit=crop&auto=format'],
    ['Valeria Suárez','Chevrolet Cruze 2023',5,'"Traje mi Cruze por un ruido extraño. Lo identificaron en 20 minutos y lo repararon el mismo día."','8 Ago 2026','https://images.unsplash.com/photo-1580489944761-15a19d654956?w=80&h=80&fit=crop&auto=format'],
    ['Diego Ferreyra','Nissan Frontier 2023',4,'"Buen trabajo en la caja de cambios. Tienen conocimiento real del modelo. El presupuesto fue exacto."','30 Jul 2026','https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=80&h=80&fit=crop&auto=format'],
  ];
  foreach ($reviews as [$name,$car,$rating,$text,$date,$avatar]):
  ?>
  <div style="padding:24px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;">
    <div style="display:flex;align-items:center;gap:12px;margin-bottom:16px;">
      <img src="<?= $avatar ?>" alt="<?= $name ?>" style="width:44px;height:44px;border-radius:50%;object-fit:cover;">
      <div>
        <p style="font-size:14px;font-weight:700;color:#fff;"><?= $name ?></p>
        <p style="font-size:12px;color:#9CA3AF;"><?= $car ?></p>
      </div>
    </div>
    <p style="font-size:18px;color:#CA8A04;"><?= str_repeat('★',$rating) ?><?= str_repeat('☆',5-$rating) ?></p>
    <p style="font-size:13px;line-height:1.6;margin-top:12px;color:#9CA3AF;"><?= $text ?></p>
    <p style="font-size:11px;margin-top:16px;color:#4B5563;"><?= $date ?></p>
  </div>
  <?php endforeach; ?>
</div>

<!-- CTA -->
<div style="background:#C00000;padding:56px 64px;display:flex;align-items:center;justify-content:space-between;margin-bottom:0;">
  <div>
    <h3 style="font-size:24px;font-weight:800;color:#fff;">¿Ya visitaste el taller?</h3>
    <p style="margin-top:4px;color:rgba(255,255,255,0.75);">Compartí tu experiencia.</p>
  </div>
  <span style="padding:14px 32px;border-radius:6px;background:#fff;color:#C00000;font-size:14px;font-weight:700;">Escribir reseña →</span>
</div>

<?php include '_footer.php'; ?>
</body>
</html>
