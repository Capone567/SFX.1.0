<?php $page = $page ?? ''; ?>
<nav style="position:fixed;top:0;left:0;right:0;z-index:50;display:flex;align-items:center;justify-content:space-between;padding:0 40px;height:64px;background:rgba(17,17,17,0.97);border-bottom:1px solid #2A2A2A;">
  <a href="index.php"><img src="src/imports/TORVEN_LOGO.png" alt="Torven" style="height:38px;width:auto;object-fit:contain;"></a>

  <div style="display:flex;align-items:center;gap:4px;">
    <?php
    $links = [
      ['index.php',    'Inicio'],
      ['modelos.php',  'Modelos'],
      ['novedades.php','Novedades'],
      ['resenas.php',  'Reseñas'],
      ['horarios.php', 'Horarios'],
      ['consultas.php','Consultas'],
      ['contacto.php', 'Contacto'],
      ['nostoros.php', 'Nostros'],
    ];
    foreach ($links as [$href, $label]):
      $active = ($page === $href);
    ?>
    <a href="<?= $href ?>" style="padding:8px 14px;border-radius:6px;font-size:14px;font-weight:600;text-decoration:none;color:<?= $active ? '#fff' : '#9CA3AF' ?>;background:<?= $active ? '#C00000' : 'transparent' ?>;"><?= $label ?></a>
    <?php endforeach; ?>
  </div>

  <div style="display:flex;align-items:center;gap:10px;">
    <a href="registro.php" style="padding:8px 20px;border-radius:6px;background:transparent;color:#9CA3AF;font-size:13px;font-weight:600;text-decoration:none;border:1px solid #242424;">Registrarse</a>
    <a href="login.php" style="padding:8px 20px;border-radius:6px;background:#C00000;color:#fff;font-size:13px;font-weight:700;text-decoration:none;">Iniciar sesión</a>
  </div>
</nav>

