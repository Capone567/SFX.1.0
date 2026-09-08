<?php $title = 'Modelos'; $page = 'modelos.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<!-- HEADER -->
<div style="background:#C00000;padding:128px 64px 64px;">
  <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:8px;color:rgba(255,255,255,0.6);">Catálogo</p>
  <h1 style="font-size:52px;font-weight:800;color:#fff;">Modelos que atendemos</h1>
  <p style="font-size:17px;margin-top:12px;color:rgba(255,255,255,0.75);">Especialistas certificados en las principales marcas</p>
</div>

<!-- FILTER TABS (visual only) -->
<div style="padding:24px 64px;border-bottom:1px solid #2A2A2A;display:flex;gap:12px;">
  <?php
  $cats = ['Todos','Sedán','SUV','Hatchback','Pick-up'];
  foreach ($cats as $i => $c):
  ?>
  <span style="padding:8px 20px;border-radius:6px;font-size:14px;font-weight:600;background:<?= $i===0?'#C00000':'#1A1A1A' ?>;color:<?= $i===0?'#fff':'#9CA3AF' ?>;border:1px solid <?= $i===0?'#C00000':'#2A2A2A' ?>;"><?= $c ?></span>
  <?php endforeach; ?>
</div>

<!-- GRID -->
<div style="display:grid;grid-template-columns:repeat(3,1fr);gap:24px;padding:40px 64px 80px;">
  <?php
  $cars = [
    ['Toyota','Corolla 2024','Sedán','https://images.unsplash.com/photo-1621007947382-bb3c3994e3fb?w=700&h=420&fit=crop&auto=format',['Servicio mayor','Frenos','Aceite'],234],
    ['Volkswagen','Golf GTI 2023','Hatchback','https://images.unsplash.com/photo-1502877338535-766e1452684a?w=700&h=420&fit=crop&auto=format',['ECU','Suspensión','Alineación'],187],
    ['Ford','Ranger 2024','Pick-up 4x4','https://images.unsplash.com/photo-1519641471654-76ce0107ad1b?w=700&h=420&fit=crop&auto=format',['Transmisión 4x4','Motor','Diferencial'],312],
    ['Chevrolet','Cruze 2023','Sedán','https://images.unsplash.com/photo-1583121274602-3e2820c69888?w=700&h=420&fit=crop&auto=format',['Servicio completo','Frenos','Climatización'],156],
    ['Honda','CR-V 2024','SUV','https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?w=700&h=420&fit=crop&auto=format',['Aceite','Correas','Alineación'],201],
    ['Nissan','Frontier 2023','Pick-up','https://images.unsplash.com/photo-1609521263047-f8f205293f24?w=700&h=420&fit=crop&auto=format',['Motor diésel','Caja','Frenos'],143],
  ];
  foreach ($cars as [$brand,$model,$cat,$img,$services,$count]):
  ?>
  <div style="border-radius:8px;overflow:hidden;background:#1A1A1A;border:1px solid #2A2A2A;">
    <div style="position:relative;height:220px;overflow:hidden;">
      <img src="<?= $img ?>" alt="<?= $model ?>" style="width:100%;height:100%;object-fit:cover;">
      <div style="position:absolute;inset:0;background:linear-gradient(to top,rgba(0,0,0,0.6) 0%,transparent 60%);"></div>
      <span style="position:absolute;bottom:12px;left:16px;font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;padding:4px 8px;border-radius:4px;background:#C00000;color:#fff;"><?= $cat ?></span>
      <span style="position:absolute;top:12px;right:12px;font-size:11px;font-weight:700;padding:4px 8px;border-radius:4px;background:rgba(0,0,0,0.6);color:#fff;"><?= $count ?> atendidos</span>
    </div>
    <div style="padding:20px;">
      <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.15em;margin-bottom:4px;color:#C00000;"><?= $brand ?></p>
      <h3 style="font-size:20px;font-weight:800;margin-bottom:12px;color:#fff;"><?= $model ?></h3>
      <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:16px;">
        <?php foreach ($services as $s): ?>
        <span style="font-size:11px;padding:3px 8px;border-radius:4px;background:rgba(192,0,0,0.12);color:#9CA3AF;border:1px solid #2A2A2A;"><?= $s ?></span>
        <?php endforeach; ?>
      </div>
      <a href="horarios.php" style="display:block;width:100%;padding:10px;border-radius:6px;background:#C00000;color:#fff;font-size:13px;font-weight:700;text-align:center;">Reservar para este modelo →</a>
    </div>
  </div>
  <?php endforeach; ?>
</div>

<?php include '_footer.php'; ?>
</body>
</html>
