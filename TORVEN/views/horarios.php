<?php $title = 'Horarios'; $page = 'horarios.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<?php
$days = [
  'Lun' => [['07:30',true],['08:00',false],['08:30',true],['09:00',true],['09:30',false],['10:00',true],['10:30',true],['11:00',false],['11:30',true],['14:00',false],['14:30',true],['15:00',true],['15:30',true],['16:00',false],['16:30',true],['17:00',true]],
  'Mar' => [['07:30',false],['08:00',true],['08:30',true],['09:00',false],['09:30',true],['10:00',true],['10:30',false],['11:00',true],['11:30',true],['14:00',true],['14:30',false],['15:00',true],['15:30',true],['16:00',true],['16:30',false],['17:00',true]],
  'Mié' => [['07:30',true],['08:00',true],['08:30',false],['09:00',true],['09:30',true],['10:00',false],['10:30',true],['11:00',true],['11:30',false],['14:00',true],['14:30',true],['15:00',false],['15:30',true],['16:00',true],['16:30',true],['17:00',false]],
  'Jue' => [['07:30',true],['08:00',false],['08:30',true],['09:00',true],['09:30',true],['10:00',false],['10:30',false],['11:00',true],['11:30',true],['14:00',true],['14:30',false],['15:00',true],['15:30',false],['16:00',true],['16:30',true],['17:00',false]],
  'Vie' => [['07:30',false],['08:00',true],['08:30',true],['09:00',false],['09:30',true],['10:00',true],['10:30',true],['11:00',true],['11:30',false],['14:00',true],['14:30',true],['15:00',false],['15:30',true],['16:00',false],['16:30',true],['17:00',true]],
  'Sáb' => [['08:00',true],['08:30',true],['09:00',false],['09:30',true],['10:00',true],['10:30',false],['11:00',true],['11:30',true],['12:00',false],['12:30',true]],
];
$activeDay = 'Lun';
$activeSlots = $days[$activeDay];
$freeCount = count(array_filter($activeSlots, fn($s) => $s[1]));
?>

<!-- HEADER -->
<div style="background:#C00000;padding:128px 64px 48px;">
  <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:8px;color:rgba(255,255,255,0.6);">Semana del 8–13 Sep 2026</p>
  <h1 style="font-size:52px;font-weight:800;color:#fff;">Horarios disponibles</h1>
  <p style="font-size:17px;margin-top:12px;color:rgba(255,255,255,0.75);"><?= $freeCount ?> turnos libres este día</p>
</div>

<!-- CONTENT -->
<div style="display:grid;grid-template-columns:1fr 340px;gap:32px;padding:32px 64px 80px;">

  <!-- Slots panel -->
  <div>
    <!-- Day tabs -->
    <div style="display:flex;gap:8px;margin-bottom:20px;">
      <?php foreach ($days as $day => $slots): ?>
      <?php $free = count(array_filter($slots, fn($s) => $s[1])); ?>
      <div style="flex:1;padding:12px 8px;border-radius:6px;background:<?= $day===$activeDay?'#C00000':'#1A1A1A' ?>;border:1px solid <?= $day===$activeDay?'#C00000':'#2A2A2A' ?>;text-align:center;cursor:default;">
        <p style="font-size:14px;font-weight:700;color:#fff;"><?= $day ?></p>
        <p style="font-size:10px;margin-top:2px;color:rgba(255,255,255,0.6);"><?= $free ?> libres</p>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Slots grid -->
    <div style="display:grid;grid-template-columns:repeat(4,1fr);gap:10px;">
      <?php foreach ($activeSlots as [$t,$ok]): ?>
      <div style="padding:14px 8px;border-radius:6px;text-align:center;background:<?= $ok?'#1A1A1A':'#222' ?>;border:1px solid #2A2A2A;opacity:<?= $ok?1:0.4 ?>;">
        <p style="font-size:14px;font-weight:700;color:<?= $ok?'#fff':'#4B5563' ?>;"><?= $t ?>h</p>
        <?php if (!$ok): ?>
        <p style="font-size:10px;color:#4B5563;">Ocupado</p>
        <?php endif; ?>
      </div>
      <?php endforeach; ?>
    </div>

    <!-- Legend -->
    <div style="display:flex;gap:24px;margin-top:16px;">
      <div style="display:flex;align-items:center;gap:8px;">
        <div style="width:16px;height:16px;border-radius:4px;background:#1A1A1A;border:1px solid #2A2A2A;"></div>
        <span style="font-size:12px;color:#9CA3AF;">Disponible</span>
      </div>
      <div style="display:flex;align-items:center;gap:8px;">
        <div style="width:16px;height:16px;border-radius:4px;background:#C00000;"></div>
        <span style="font-size:12px;color:#9CA3AF;">Seleccionado</span>
      </div>
      <div style="display:flex;align-items:center;gap:8px;">
        <div style="width:16px;height:16px;border-radius:4px;background:#222;opacity:0.4;"></div>
        <span style="font-size:12px;color:#9CA3AF;">Ocupado</span>
      </div>
    </div>
  </div>

  <!-- Booking form (visual only) -->
  <div style="padding:24px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;height:fit-content;">
    <h3 style="font-size:16px;font-weight:800;margin-bottom:16px;color:#fff;">Reservar turno</h3>
    <div style="padding:12px;border-radius:6px;background:#222;border:1px solid #2A2A2A;margin-bottom:16px;">
      <p style="font-size:11px;color:#9CA3AF;">Horario seleccionado</p>
      <p style="font-weight:700;color:#fff;">Seleccioná un horario</p>
    </div>
    <?php foreach ([['Nombre completo','Tu nombre'],['Teléfono','+54 9 11 0000-0000'],['Vehículo','Marca · Modelo · Año']] as [$l,$ph]): ?>
    <div style="margin-bottom:12px;">
      <label style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:6px;color:#9CA3AF;"><?= $l ?></label>
      <input placeholder="<?= $ph ?>" style="width:100%;padding:10px 16px;border-radius:6px;background:#111;color:#9CA3AF;border:1px solid #2A2A2A;font-size:14px;outline:none;" readonly>
    </div>
    <?php endforeach; ?>
    <div style="margin-bottom:16px;">
      <label style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:6px;color:#9CA3AF;">Servicio</label>
      <select style="width:100%;padding:10px 16px;border-radius:6px;background:#111;color:#9CA3AF;border:1px solid #2A2A2A;font-size:14px;outline:none;" disabled>
        <option>Seleccionar servicio</option>
        <option>Servicio mayor</option>
        <option>Cambio de aceite</option>
        <option>Frenos</option>
      </select>
    </div>
    <div style="padding:12px;border-radius:6px;background:#333;text-align:center;font-size:14px;font-weight:700;color:#4B5563;">
      Seleccioná un horario
    </div>
    <p style="font-size:12px;text-align:center;margin-top:12px;color:#9CA3AF;">O llamanos: <strong style="color:#fff;">+54 11 4567-8900</strong></p>
  </div>
</div>

<?php include '_footer.php'; ?>
</body>
</html>
