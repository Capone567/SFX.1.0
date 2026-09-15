<?php $title = '404 — Página no encontrada'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<main style="position:relative;min-height:100vh;display:flex;align-items:center;justify-content:center;overflow:hidden;background:#111;">

  <!-- Foto de fondo igual que el hero -->
  <img
    src="src/imports/imagen_de_3_chabones_mecanicos_y_un_taller_re_buenisimo_corte_aura.jpg"
    alt=""
    aria-hidden="true"
    style="position:absolute;inset:0;width:100%;height:100%;object-fit:cover;object-position:center 30%;filter:brightness(0.18) saturate(0.7);"
  >

  <!-- Capa base oscura -->
  <div style="position:absolute;inset:0;background:rgba(8,3,3,0.55);"></div>

  <!-- Gradiente radial rojo desde el centro -->
  <div style="position:absolute;inset:0;background:radial-gradient(ellipse 70% 60% at 50% 55%, rgba(140,0,0,0.35) 0%, transparent 70%);"></div>

  <!-- Línea roja izquierda (igual que el hero) -->
  <div style="position:absolute;top:0;bottom:0;left:0;width:4px;background:linear-gradient(to bottom,transparent,#C00000 30%,#C00000 70%,transparent);"></div>

  <!-- Logo watermark -->
  <div style="position:absolute;inset:0;display:flex;align-items:center;justify-content:center;pointer-events:none;">
    <img src="src/imports/TORVEN_LOGO.png" alt="" style="width:520px;opacity:0.04;filter:grayscale(1);">
  </div>

  <!-- Contenido centrado -->
  <div style="position:relative;z-index:10;text-align:center;padding:40px 24px;max-width:640px;">

    <!-- Número 404 -->
    <div style="position:relative;display:inline-block;margin-bottom:8px;">
      <p style="font-size:180px;font-weight:800;line-height:1;letter-spacing:-8px;color:rgba(255,255,255,0.04);user-select:none;position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);white-space:nowrap;">404</p>
      <p style="font-size:120px;font-weight:800;line-height:1;letter-spacing:-6px;color:#C00000;position:relative;">404</p>
    </div>

    <!-- Línea separadora -->
    <div style="display:flex;align-items:center;justify-content:center;gap:16px;margin:4px 0 28px;">
      <div style="flex:1;max-width:80px;height:1px;background:rgba(192,0,0,0.4);"></div>
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="#C00000" stroke-width="2.5">
        <circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/>
      </svg>
      <div style="flex:1;max-width:80px;height:1px;background:rgba(192,0,0,0.4);"></div>
    </div>

    <h1 style="font-size:32px;font-weight:800;color:#fff;margin-bottom:14px;letter-spacing:-0.5px;">
      Página no encontrada
    </h1>
    <p style="font-size:16px;color:rgba(255,255,255,0.5);line-height:1.65;margin-bottom:40px;">
      El turno que buscás no existe o fue removido.<br>
      Revisá la dirección o volvé al inicio.
    </p>

    <!-- Botones -->
    <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap;">
      <a
        href="index.php"
        style="padding:14px 36px;border-radius:6px;background:#C00000;color:#fff;font-size:14px;font-weight:700;text-decoration:none;letter-spacing:0.03em;transition:background 0.18s;"
        onmouseover="this.style.background='#A00000'"
        onmouseout="this.style.background='#C00000'"
      >Volver al inicio</a>
      <a
        href="index.php#horarios"
        onclick="if(window.showPage){showPage('horarios')};return window.showPage?false:true;"
        style="padding:14px 32px;border-radius:6px;background:rgba(255,255,255,0.07);color:#fff;font-size:14px;font-weight:700;text-decoration:none;border:1px solid rgba(255,255,255,0.18);backdrop-filter:blur(4px);transition:background 0.18s;"
        onmouseover="this.style.background='rgba(255,255,255,0.13)'"
        onmouseout="this.style.background='rgba(255,255,255,0.07)'"
      >Reservar turno →</a>
    </div>

    <!-- Info de contacto rápido -->
    <div style="display:flex;align-items:center;justify-content:center;gap:8px;margin-top:48px;">
      <div style="width:1px;height:28px;background:rgba(192,0,0,0.5);"></div>
      <p style="font-size:12px;color:rgba(255,255,255,0.28);line-height:1.5;">
        ¿Necesitás ayuda?&nbsp;
        <a href="tel:+541145678900" style="color:rgba(255,255,255,0.5);text-decoration:none;font-weight:600;">+54 11 4567-8900</a>
        &nbsp;·&nbsp;
        <a href="mailto:turnos@torven.com.ar" style="color:rgba(255,255,255,0.5);text-decoration:none;font-weight:600;">turnos@torven.com.ar</a>
      </p>
      <div style="width:1px;height:28px;background:rgba(192,0,0,0.5);"></div>
    </div>

  </div>

  <!-- Código de error — esquina inferior derecha -->
  <div style="position:absolute;bottom:36px;right:72px;z-index:10;display:flex;align-items:center;gap:10px;">
    <div style="width:1px;height:32px;background:rgba(192,0,0,0.5);"></div>
    <p style="font-size:11px;color:rgba(255,255,255,0.2);line-height:1.4;text-align:right;">
      Error HTTP 404<br>
      <span style="color:rgba(255,255,255,0.1);">Torven Taller · CABA</span>
    </p>
  </div>

</main>

<?php include '_footer.php'; ?>
</body>
</html>