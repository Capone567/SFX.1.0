<?php $page = $page ?? ''; $logueado = $_SESSION['usuario'] ?? null; ?>

<nav class="nav">
  <a href="index.php" class="nav-logo">
    <img src="../imports/TORVEN_LOGO.png" alt="Torven">
  </a>

  <div class="nav-links">
    <?php
    $links = [
      ['index.php',    'Inicio'],
      ['modelos.php',  'Modelos'],
      ['resenas.php',  'Reseñas'],
      ['horarios.php', 'Horarios'],
      ['consultas.php','Consultas'],
      ['contacto.php', 'Contacto'],
      ['nosotros.php', 'Nosotros'],
    ];
    foreach ($links as [$href, $label]):
      $active = ($page === $href);
    ?>
    <a href="<?= $href ?>" class="nav-link<?= $active ? ' active' : '' ?>"><?= $label ?></a>
    <?php endforeach; ?>
  </div>

  <div class="nav-actions">
    <?php if ($logueado): ?>
    <span class="nav-btn ghost" style="padding:12px 20px;">👋 Hola, <?= htmlspecialchars($logueado) ?></span>
    <a href="../config/logout.php" class="nav-btn primary">Cerrar sesión</a>
    <?php else: ?>
    <a href="registro.php" class="nav-btn ghost">Registrarse</a>
    <a href="login.php" class="nav-btn primary">Iniciar sesión</a>
    <?php endif; ?>
  </div>
</nav>

<style>
  .nav {
    position: fixed; top: 14px; left: 0; right: 0; z-index: 50;
    margin: 0 auto;
    max-width: min(1280px, calc(100% - 32px));
    display: flex; align-items: center; justify-content: space-between; gap: 24px;
    padding: 0 36px; height: 92px;
    background: rgba(17,17,17,0.7);
    -webkit-backdrop-filter: blur(18px); backdrop-filter: blur(18px);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 22px;
    box-shadow: 0 8px 40px rgba(0,0,0,0.55);
    animation: navDrop .6s cubic-bezier(.22,1,.36,1) both;
  }
  @keyframes navDrop {
    from { transform: translateY(-100%); opacity: 0; }
    to   { transform: translateY(0);       opacity: 1; }
  }

  .nav-logo {
    padding: 6px; border-radius: 12px;
    transition: transform .25s ease, background .25s ease;
  }
  .nav-logo img {
    height: 64px; width: auto; object-fit: contain; display: block;
    filter: drop-shadow(0 0 0 rgba(192,0,0,0));
    transition: transform .3s ease, filter .3s ease;
  }
  .nav-logo:hover { background: rgba(255,255,255,0.04); }
  .nav-logo:hover img {
    transform: scale(1.05);
    filter: drop-shadow(0 0 16px rgba(192,0,0,0.65));
  }

  .nav-links { display: flex; align-items: center; gap: 4px; }
  .nav-link {
    position: relative; padding: 9px 14px; border-radius: 8px;
    font-size: 14px; font-weight: 600; text-decoration: none; color: #9CA3AF;
    transition: color .2s ease, background .2s ease, box-shadow .2s ease;
  }
  .nav-link::after {
    content: ""; position: absolute; left: 50%; bottom: 3px;
    width: 0; height: 2px; border-radius: 2px; background: #C00000;
    transform: translateX(-50%); transition: width .25s ease;
  }
  .nav-link:hover { color: #fff; }
  .nav-link:hover::after { width: 50%; }
  .nav-link.active {
    color: #fff;
    background: linear-gradient(135deg, #C00000, #8f0a0a);
    box-shadow: 0 4px 16px rgba(192,0,0,0.35);
  }
  .nav-link.active::after { display: none; }

  .nav-actions { display: flex; align-items: center; gap: 12px; }
  .nav-btn {
    position: relative; overflow: hidden;
    padding: 12px 26px; border-radius: 12px;
    font-size: 14px; font-weight: 800; letter-spacing: .02em; text-decoration: none;
    transition: transform .2s ease, box-shadow .3s ease, background .3s ease, border-color .3s ease, color .3s ease;
  }
  .nav-btn.ghost { color: #E5E7EB; border: 1px solid rgba(255,255,255,0.22); background: rgba(255,255,255,0.04); }
  .nav-btn.ghost:hover { color: #fff; border-color: #C00000; background: rgba(192,0,0,0.12); transform: translateY(-2px); box-shadow: 0 6px 20px rgba(0,0,0,0.35); }
  .nav-btn.primary {
    color: #fff;
    background: linear-gradient(135deg, #E53535, #B00000);
    box-shadow: 0 4px 18px rgba(192,0,0,0.4);
    animation: btnGlow 2.6s ease-in-out infinite;
  }
  .nav-btn.primary::after {
    content: ""; position: absolute; top: 0; left: -150%; width: 60%; height: 100%;
    background: linear-gradient(120deg, transparent, rgba(255,255,255,0.28), transparent);
    transform: skewX(-20deg);
    transition: left .5s ease;
  }
  .nav-btn.primary:hover { background: linear-gradient(135deg, #ff4747, #C00000); transform: translateY(-2px); animation-play-state: paused; }
  .nav-btn.primary:hover::after { left: 150%; }
  @keyframes btnGlow {
    0%, 100% { box-shadow: 0 4px 18px rgba(192,0,0,0.4); }
    50%      { box-shadow: 0 4px 28px rgba(192,0,0,0.7); }
  }
</style>