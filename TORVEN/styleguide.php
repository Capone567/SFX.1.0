<?php $title = 'Guía de estilos'; ?>
<?php if (session_status() === PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Guía de estilos — Torven Taller</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
<style>
  *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
  body { font-family: 'Manrope', sans-serif; background: #111111; color: #fff; }
  a { text-decoration: none; color: inherit; }
  ::-webkit-scrollbar { width: 8px; }
  ::-webkit-scrollbar-track { background: #111; }
  ::-webkit-scrollbar-thumb { background: #2A2A2A; border-radius: 4px; }

  .sg-nav {
    position: sticky; top: 0; z-index: 50;
    display: flex; align-items: center; gap: 28px;
    padding: 0 48px; height: 72px;
    background: rgba(17,17,17,.85);
    backdrop-filter: blur(14px); -webkit-backdrop-filter: blur(14px);
    border-bottom: 1px solid #2A2A2A;
  }
  .sg-nav img { height: 44px; width: auto; }
  .sg-nav h1 { font-size: 17px; font-weight: 800; letter-spacing: .02em; }
  .sg-nav h1 span { color: #9CA3AF; font-weight: 600; margin-left: 8px; }
  .sg-nav-links { display: flex; gap: 4px; margin-left: auto; }
  .sg-nav-links a { padding: 8px 12px; font-size: 13px; font-weight: 600; color: #9CA3AF; border-radius: 8px; transition: all .2s; }
  .sg-nav-links a:hover { color: #fff; background: #1A1A1A; }

  .sg-wrap { max-width: 1100px; margin: 0 auto; padding: 56px 24px 96px; }

  .sg-hero { border-bottom: 1px solid #2A2A2A; padding-bottom: 40px; margin-bottom: 48px; }
  .sg-hero p.kicker { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .2em; color: #C00000; margin-bottom: 12px; }
  .sg-hero h2 { font-size: 44px; font-weight: 800; line-height: 1.1; }
  .sg-hero p.desc { font-size: 16px; color: #9CA3AF; max-width: 620px; margin-top: 14px; line-height: 1.6; }

  .sg-section { margin-bottom: 64px; scroll-margin-top: 90px; }
  .sg-section > h3 {
    display: flex; align-items: center; gap: 14px;
    font-size: 24px; font-weight: 800; margin-bottom: 28px;
  }
  .sg-section > h3::before {
    content: ""; width: 6px; height: 26px; border-radius: 3px;
    background: linear-gradient(180deg, #E53535, #C00000);
  }
  .sg-note { font-size: 13px; color: #9CA3AF; margin: 8px 0 24px; line-height: 1.6; }

  .sg-grid { display: grid; gap: 20px; }
  .sg-grid.cols-2 { grid-template-columns: repeat(2, 1fr); }
  .sg-grid.cols-3 { grid-template-columns: repeat(3, 1fr); }
  .sg-grid.cols-4 { grid-template-columns: repeat(4, 1fr); }
  .sg-grid.cols-5 { grid-template-columns: repeat(5, 1fr); }

  .sg-swatch { border-radius: 10px; overflow: hidden; background: #161616; border: 1px solid #2A2A2A; }
  .sg-swatch .color { height: 72px; }
  .sg-swatch .meta { padding: 12px 14px; }
  .sg-swatch .meta p.name { font-size: 13px; font-weight: 700; }
  .sg-swatch .meta p.hex {
    font-size: 12px; color: #9CA3AF; margin-top: 2px; cursor: pointer;
    font-family: Consolas, "Courier New", monospace;
  }
  .sg-swatch .meta p.hex:hover { color: #fff; }

  .type-row { display: flex; align-items: baseline; gap: 28px; padding: 18px 0; border-bottom: 1px solid #1F1F1F; }
  .type-row .t-label { width: 90px; flex-shrink: 0; font-size: 12px; color: #9CA3AF; font-weight: 600; }
  .type-row .t-sample { font-weight: 800; line-height: 1.15; }
  .type-row .t-meta { margin-left: auto; font-size: 12px; color: #4B5563; text-align: right; }

  .btn-row, .demo-row { display: flex; flex-wrap: wrap; align-items: center; gap: 16px; padding: 28px; border-radius: 12px; background: #161616; border: 1px solid #2A2A2A; }
  .d-block { flex-direction: column; align-items: flex-start; }

  .btn {
    position: relative; overflow: hidden; display: inline-flex; align-items: center; justify-content: center;
    padding: 12px 26px; border-radius: 12px; font-size: 14px; font-weight: 800; letter-spacing: .02em;
    transition: transform .2s ease, box-shadow .3s ease, background .3s ease, border-color .3s ease, color .3s ease;
  }
  .btn-primary {
    color: #fff;
    background: linear-gradient(135deg, #E53535, #B00000);
    box-shadow: 0 4px 18px rgba(192,0,0,.4);
    animation: btnGlow 2.6s ease-in-out infinite;
  }
  .btn-primary::after {
    content: ""; position: absolute; top: 0; left: -150%; width: 60%; height: 100%;
    background: linear-gradient(120deg, transparent, rgba(255,255,255,.28), transparent);
    transform: skewX(-20deg); transition: left .5s ease;
  }
  .btn-primary:hover { background: linear-gradient(135deg, #ff4747, #C00000); transform: translateY(-2px); animation-play-state: paused; }
  .btn-primary:hover::after { left: 150%; }
  @keyframes btnGlow { 0%, 100% { box-shadow: 0 4px 18px rgba(192,0,0,.4); } 50% { box-shadow: 0 4px 28px rgba(192,0,0,.7); } }

  .btn-ghost { color: #E5E7EB; border: 1px solid rgba(255,255,255,.22); background: rgba(255,255,255,.04); }
  .btn-ghost:hover { color: #fff; border-color: #C00000; background: rgba(192,0,0,.12); transform: translateY(-2px); }

  .btn-solid {
    padding: 13px; border-radius: 6px; color: #fff; background: #C00000;
    font-size: 15px; font-weight: 700; border: none; width: 100%;
  }
  .btn-solid:hover { background: #A00000; }

  .btn-inactive { pointer-events: none; opacity: .45; }

  .card-demo {
    width: 260px; border-radius: 8px; overflow: hidden; background: #1A1A1A; border: 1px solid #2A2A2A;
  }
  .card-demo .img { height: 130px; display: flex; align-items: center; justify-content: center; font-size: 40px; }
  .card-demo .body { padding: 18px; }
  .card-demo .brand { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .15em; color: #C00000; }
  .card-demo h4 { font-size: 18px; font-weight: 800; margin: 4px 0 12px; }
  .card-demo .cta { display: block; padding: 10px; border-radius: 6px; background: #C00000; color: #fff; font-size: 13px; font-weight: 700; text-align: center; }

  .chip { font-size: 11px; padding: 3px 8px; border-radius: 4px; background: rgba(192,0,0,.12); color: #9CA3AF; border: 1px solid #2A2A2A; }
  .chip.cat { position: absolute; bottom: 12px; left: 16px; background: #C00000; color: #fff; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; padding: 4px 8px; }
  .badge { display: inline-block; font-size: 11px; font-weight: 700; padding: 4px 8px; border-radius: 4px; background: rgba(0,0,0,.6); color: #fff; }
  .badge-green { background: rgba(22,163,74,.15); color: #16A34A; border: 1px solid rgba(22,163,74,.4); }

  .input-demo { display: flex; flex-direction: column; gap: 6px; width: 100%; }
  .input-demo label { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .1em; color: #9CA3AF; }
  .input-demo input, .input-demo select {
    width: 100%; padding: 11px 14px; background: #111; border: 1px solid #2A2A2A;
    border-radius: 6px; color: #fff; font-size: 14px; outline: none; transition: border-color .2s;
  }
  .input-demo input:focus, .input-demo select:focus { border-color: #C00000; }
  .input-demo input::placeholder { color: #4B5563; }

  .section-banner { background: #C00000; padding: 44px 48px; border-radius: 12px; }
  .section-banner p.kicker { font-size: 11px; font-weight: 700; text-transform: uppercase; letter-spacing: .2em; color: rgba(255,255,255,.6); margin-bottom: 6px; }
  .section-banner h4 { font-size: 30px; font-weight: 800; }

  .nav-demo {
    position: relative; max-width: 900px; margin: 0 auto;
    display: flex; align-items: center; gap: 18px; padding: 0 28px; height: 84px;
    background: #1A1A1A; border: 1px solid rgba(255,255,255,.1); border-radius: 22px;
    box-shadow: 0 8px 40px rgba(0,0,0,.55);
  }
  .nav-demo img { height: 54px; width: auto; }
  .nav-demo .links { display: flex; gap: 4px; }
  .nav-demo .links a { font-size: 13px; font-weight: 600; color: #9CA3AF; padding: 8px 12px; border-radius: 8px; }
  .nav-demo .links a:hover { color: #fff; }
  .nav-demo .links a.active { color: #fff; background: linear-gradient(135deg, #C00000, #8f0a0a); }
  .nav-demo .spacer { margin-left: auto; }

  .tok-table { width: 100%; border-collapse: collapse; font-size: 13px; }
  .tok-table th {
    text-align: left; padding: 12px 14px; font-size: 11px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .1em; color: #9CA3AF;
    border-bottom: 1px solid #2A2A2A; background: #161616;
  }
  .tok-table td { padding: 12px 14px; border-bottom: 1px solid #1F1F1F; vertical-align: top; }
  .tok-table td code { font-family: Consolas, "Courier New", monospace; font-size: 12px; color: #E53535; }

  .usage { display: grid; grid-template-columns: 1fr 1fr; gap: 16px; }
  .usage .do, .usage .dont { padding: 18px 20px; border-radius: 10px; }
  .usage .do { background: rgba(22,163,74,.08); border: 1px solid rgba(22,163,74,.35); }
  .usage .dont { background: rgba(220,38,38,.08); border: 1px solid rgba(220,38,38,.35); }
  .usage h5 { font-size: 13px; font-weight: 800; text-transform: uppercase; letter-spacing: .1em; margin-bottom: 10px; }
  .usage .do h5 { color: #16A34A; }
  .usage .dont h5 { color: #EF4444; }
  .usage p { font-size: 13px; color: #D1D5DB; line-height: 1.55; }
  .usage p + p { margin-top: 8px; }

  @media (max-width: 820px) {
    .sg-grid.cols-2, .sg-grid.cols-3, .sg-grid.cols-4, .sg-grid.cols-5 { grid-template-columns: repeat(2, 1fr); }
    .usage { grid-template-columns: 1fr; }
    .sg-nav-links { display: none; }
  }
</style>
</head>
<body>

<nav class="sg-nav">
  <img src="imports/TORVEN_LOGO.png" alt="Torven">
  <h1>Guía de estilos<span>TALLER TORVEN</span></h1>
  <div class="sg-nav-links">
    <a href="#marca">Marca</a>
    <a href="#color">Color</a>
    <a href="#tipografia">Tipografía</a>
    <a href="#botones">Botones</a>
    <a href="#componentes">Componentes</a>
    <a href="#layout">Layout</a>
  </div>
</nav>

<div class="sg-wrap">

  <div class="sg-hero">
    <p class="kicker">Design System · v1.0</p>
    <h2>Guía de estilos del sitio<br>Taller Torven</h2>
    <p class="desc">
      Documentación del sistema de diseño usado en las páginas de <code>TALLER TORVEN</code>:
      paleta, tipografía, componentes y reglas de uso. Hacé clic sobre cualquier código
      hexadecimal para copiarlo.
    </p>
  </div>

  <section class="sg-section" id="marca">
    <h3>Marca</h3>
    <div class="demo-row" style="gap:40px;">
      <img src="imports/TORVEN_LOGO.png" alt="Logo Torven" style="height:72px;width:auto;">
      <div>
        <p style="font-size:14px;font-weight:700;">Logo principal</p>
        <p style="font-size:13px;color:#9CA3AF;margin-top:4px;">
          Archivo: <code style="color:#E53535;">imports/TORVEN_LOGO.png</code><br>
          Altura típica: <strong>48–64 px</strong> (branding) · hasta <strong>72 px</strong> (pie de página)
        </p>
      </div>
    </div>
    <p class="sg-note" style="margin-top:16px;">
      Nombre: <strong>TORVEN</strong> / Torven. Identidad tipográfica: Manrope 800 en mayúsculas.
      Sobre fondo rojo (#C00000) usar la versión con trazo blanco del logo; nunca sobre degradados de otro color.
    </p>
  </section>

  <section class="sg-section" id="color">
    <h3>Paleta de color</h3>
    <p class="sg-note">El rojo es el color de marca: se reserva para acciones, estados activos y encabezados destacados. Nunca usarlo en texto de lectura continua.</p>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin-bottom:12px;">Primario y derivados</p>
    <div class="sg-grid cols-5">
      <div class="sg-swatch"><div class="color" style="background:#E53535;"></div><div class="meta"><p class="name">Rojo brillante</p><p class="hex" onclick="copyHex(this)">#E53535</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#C00000;"></div><div class="meta"><p class="name">Rojo marca</p><p class="hex" onclick="copyHex(this)">#C00000</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#B00000;"></div><div class="meta"><p class="name">Rojo oscuro</p><p class="hex" onclick="copyHex(this)">#B00000</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#8f0a0a;"></div><div class="meta"><p class="name">Rojo profundo</p><p class="hex" onclick="copyHex(this)">#8f0a0a</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#600000;"></div><div class="meta"><p class="name">Rojo pie</p><p class="hex" onclick="copyHex(this)">#600000</p></div></div>
    </div>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:28px 0 12px;">Fondos y superficies</p>
    <div class="sg-grid cols-4">
      <div class="sg-swatch"><div class="color" style="background:#111111;"></div><div class="meta"><p class="name">Fondo página</p><p class="hex" onclick="copyHex(this)">#111111</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#161616;"></div><div class="meta"><p class="name">Fondo demo</p><p class="hex" onclick="copyHex(this)">#161616</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#1A1A1A;"></div><div class="meta"><p class="name">Tarjetas</p><p class="hex" onclick="copyHex(this)">#1A1A1A</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#222222;"></div><div class="meta"><p class="name">Deshabilitado</p><p class="hex" onclick="copyHex(this)">#222222</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#2A2A2A;"></div><div class="meta"><p class="name">Bordes</p><p class="hex" onclick="copyHex(this)">#2A2A2A</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#333333;"></div><div class="meta"><p class="name">Resalte</p><p class="hex" onclick="copyHex(this)">#333333</p></div></div>
    </div>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:28px 0 12px;">Texto</p>
    <div class="sg-grid cols-5">
      <div class="sg-swatch"><div class="color" style="background:#FFFFFF;"></div><div class="meta"><p class="name">Blanco</p><p class="hex" onclick="copyHex(this)">#FFFFFF</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#E5E7EB;"></div><div class="meta"><p class="name">Texto claro</p><p class="hex" onclick="copyHex(this)">#E5E7EB</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#D1D5DB;"></div><div class="meta"><p class="name">Labels</p><p class="hex" onclick="copyHex(this)">#D1D5DB</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#9CA3AF;"></div><div class="meta"><p class="name">Texto suave</p><p class="hex" onclick="copyHex(this)">#9CA3AF</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#4B5563;"></div><div class="meta"><p class="name">Texto tenue</p><p class="hex" onclick="copyHex(this)">#4B5563</p></div></div>
    </div>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:28px 0 12px;">Semánticos y redes</p>
    <div class="sg-grid cols-4">
      <div class="sg-swatch"><div class="color" style="background:#16A34A;"></div><div class="meta"><p class="name">Éxito</p><p class="hex" onclick="copyHex(this)">#16A34A</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#25D366;"></div><div class="meta"><p class="name">WhatsApp</p><p class="hex" onclick="copyHex(this)">#25D366</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:linear-gradient(135deg,#f09433,#e6683c,#cc2366);"></div><div class="meta"><p class="name">Instagram</p><p class="hex" onclick="copyHex(this)">#f09433→#cc2366</p></div></div>
      <div class="sg-swatch"><div class="color" style="background:#ef4444;"></div><div class="meta"><p class="name">Error</p><p class="hex" onclick="copyHex(this)">#EF4444</p></div></div>
    </div>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:28px 0 12px;">Reglas de contraste</p>
    <table class="tok-table">
      <tr><th>Uso</th><th>Fondo</th><th>Texto</th></tr>
      <tr><td>Superficies sobre fondo oscuro</td><td><code>#1A1A1A</code></td><td><code>#FFFFFF / #9CA3AF</code></td></tr>
      <tr><td>Acciones / enlaces destacados</td><td>—</td><td><code>#C00000</code></td></tr>
      <tr><td>Banner de sección</td><td><code>#C00000</code></td><td><code>#FFFFFF</code> + <code>rgba(255,255,255,.6)</code></td></tr>
      <tr><td>Placeholders / tips</td><td>—</td><td><code>#4B5563</code></td></tr>
    </table>
  </section>

  <section class="sg-section" id="tipografia">
    <h3>Tipografía</h3>
    <p class="sg-note">Fuente del sistema: <strong>Manrope</strong> (Google Fonts). Weights usados: 300–800. Cargar con el enlace de <code>_head.php</code>.</p>

    <div class="type-row"><div class="t-label">Display / H1</div><div class="t-sample" style="font-size:52px;">Modelos que atendemos</div><div class="t-meta">52px · 800 · 1.05</div></div>
    <div class="type-row"><div class="t-label">Título sección</div><div class="t-sample" style="font-size:30px;">Horarios disponibles</div><div class="t-meta">30px · 800</div></div>
    <div class="type-row"><div class="t-label">Card title</div><div class="t-sample" style="font-size:20px;">Golf GTI 2023</div><div class="t-meta">20px · 800</div></div>
    <div class="type-row"><div class="t-label">Form title</div><div class="t-sample" style="font-size:18px;">Formulario de consulta</div><div class="t-meta">18px · 800</div></div>
    <div class="type-row"><div class="t-label">Body</div><div class="t-sample" style="font-size:14px;font-weight:500;color:#D1D5DB;">Accedé a tu cuenta para gestionar tus turnos.</div><div class="t-meta">14px · 400–600 · #9CA3AF</div></div>
    <div class="type-row"><div class="t-label">Label</div><div class="t-sample" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.15em;color:#9CA3AF;">Correo electrónico</div><div class="t-meta">11px · 700 · mayúsculas · tracking .1–.2em</div></div>
    <div class="type-row"><div class="t-label">Kicker</div><div class="t-sample" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:.2em;color:#C00000;">Catálogo / Contacto</div><div class="t-meta">11px · 700 · mayúsculas · tracking .2em</div></div>
  </section>

  <section class="sg-section" id="botones">
    <h3>Botones</h3>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin-bottom:10px;">Primario — navegación (con brillo y glow)</p>
    <div class="btn-row">
      <a href="#botones" class="btn btn-primary">Hover me</a>
      <a href="#botones" class="btn btn-primary btn-inactive">Bienvenido</a>
      <span class="btn btn-primary btn-inactive" style="pointer-events:none;opacity:.9;"><a href="#botones" style="color:inherit;">Hola, Usuario</a></span>
    </div>
    <p class="sg-note">
      CSS: <code>.nav-btn.primary</code> → gradiente <code>135deg #E53535 → #B00000</code>, borde redondeado 12px,
      sombra animada (<code>btnGlow</code>) y barrido de brillo con <code>::after</code>. Hover: gradiente más claro, elevación -2px.
    </p>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:24px 0 10px;">Fantasma / Ghost</p>
    <div class="btn-row">
      <a href="#botones" class="btn btn-ghost">Registrarse</a>
    </div>
    <p class="sg-note">CSS: <code>.nav-btn.ghost</code> → borde <code>rgba(255,255,255,.22)</code>, fondo <code>rgba(255,255,255,.04)</code>. Hover: borde y fondo rojo translúcido.</p>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:24px 0 10px;">Sólido — formularios (ancho completo)</p>
    <div class="btn-row d-block" style="max-width:440px;">
      <button class="btn btn-solid" type="button">Iniciar sesión</button>
    </div>
    <p class="sg-note">Usado en los envíos de login/registro. Fondo <code>#C00000</code> → hover <code>#A00000</code>, radio 6px.</p>
  </section>

  <section class="sg-section" id="componentes">
    <h3>Componentes</h3>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin-bottom:12px;">Navegación — píldora flotante</p>
    <div class="nav-demo">
      <img src="imports/TORVEN_LOGO.png" alt="Torven">
      <div class="links">
        <a href="#componentes" class="active">Inicio</a>
        <a href="#componentes">Modelos</a>
        <a href="#componentes">Reseñas</a>
        <a href="#componentes">Contacto</a>
      </div>
      <span class="spacer"></span>
      <a href="#componentes" style="display:inline-flex;align-items:center;justify-content:center;padding:11px 22px;border-radius:12px;border:1px solid rgba(255,255,255,.22);color:#E5E7EB;font-size:13px;font-weight:800;">Registrarse</a>
      <a href="#componentes" style="display:inline-flex;align-items:center;justify-content:center;padding:11px 22px;border-radius:12px;background:linear-gradient(135deg,#E53535,#B00000);color:#fff;font-size:13px;font-weight:800;box-shadow:0 4px 18px rgba(192,0,0,.4);">Iniciar sesión</a>
    </div>
    <p class="sg-note">
      Fija arriba (top 14px), centrada, radio 22px, altura 92px, <code>backdrop-filter: blur(18px)</code>,
      fondo <code>rgba(17,17,17,.7)</code>. Al iniciar sesión se reemplazan los botones por <em>"👋 Hola, nombre"</em> + "Cerrar sesión".
    </p>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:24px 0 12px;">Tarjeta de catálogo</p>
    <div class="demo-row">
      <div class="card-demo">
        <div class="img" style="background:linear-gradient(135deg,#2A2A2A,#111111);">🚗</div>
        <div class="body">
          <p class="brand">Toyota</p>
          <h4>Corolla 2024</h4>
          <div style="display:flex;flex-wrap:wrap;gap:6px;margin-bottom:14px;">
            <span class="chip">Servicio mayor</span>
            <span class="chip">Frenos</span>
            <span class="chip">Aceite</span>
          </div>
          <a href="#componentes" class="cta">Reservar para este modelo →</a>
        </div>
      </div>
      <div>
        <p style="font-size:13px;color:#9CA3AF;line-height:1.65;max-width:380px;">
          Fondo <code>#1A1A1A</code>, borde <code>#2A2A2A</code>, radio 8px.
          Imagen 16:9 con overlay superior y <strong>chip de categoría</strong> (rojo, mayúsculas).
          Contador "atendidos" como badge arriba a la derecha. CTA sólido rojo a ancho completo.
        </p>
      </div>
    </div>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:24px 0 12px;">Chips y badges</p>
    <div class="btn-row" style="gap:10px;">
      <span class="chip">Servicio mayor</span>
      <span class="chip">Cambio de aceite</span>
      <span class="badge">312 atendidos</span>
      <span class="badge badge-green">● Disponible hoy</span>
      <span class="badge" style="background:rgba(0,0,0,.5);border:1px solid #2A2A2A;">Sedán</span>
    </div>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:24px 0 12px;">Campos de formulario</p>
    <div class="btn-row d-block" style="max-width:440px;">
      <div class="input-demo">
        <label for="sg-email">Correo electrónico</label>
        <input id="sg-email" type="email" placeholder="tu@email.com">
      </div>
      <div class="input-demo">
        <label for="sg-pass">Contraseña</label>
        <input id="sg-pass" type="text" placeholder="••••••••">
      </div>
      <div class="input-demo">
        <label for="sg-sel">Servicio</label>
        <select id="sg-sel"><option>Servicio mayor</option><option>Cambio de aceite</option><option>Frenos</option></select>
      </div>
    </div>
    <p class="sg-note">
      Fondo <code>#111111</code>, borde <code>#2A2A2A</code>, radio 6px. Foco: borde <code>#C00000</code>.
      Label siempre en mayúsculas de 11px. Los campos "solo vista" usan <code>readonly</code> / <code>disabled</code>.
    </p>

    <p style="font-size:13px;font-weight:700;color:#D1D5DB;margin:24px 0 12px;">Banner de sección (encabezado rojo)</p>
    <div class="section-banner">
      <p class="kicker">Horarios disponibles</p>
      <h4>Semana del 8–13 Sep</h4>
    </div>
    <p class="sg-note" style="margin-top:12px;">
      En las páginas usa padding de <code>128px 64px</code> (deja espacio para el nav flotante) y textos en blanco.
    </p>
  </section>

  <section class="sg-section" id="layout">
    <h3>Layout y espaciado</h3>
    <table class="tok-table">
      <tr><th>Token</th><th>Valor</th><th>Uso</th></tr>
      <tr><td><code>--pad-x</code></td><td>64px</td><td>Margen horizontal de secciones en desktop</td></tr>
      <tr><td><code>--gap-card</code></td><td>24px</td><td>Separación en grids de tarjetas</td></tr>
      <tr><td><code>--r-sm</code></td><td>6px</td><td>Inputs, chips, CTAs de formulario</td></tr>
      <tr><td><code>--r-md</code></td><td>8px</td><td>Tarjetas, paneles, botones de tarjeta</td></tr>
      <tr><td><code>--r-lg</code></td><td>12px</td><td>Botones del nav</td></tr>
      <tr><td><code>--r-xl</code></td><td>22px</td><td>Nav píldora</td></tr>
      <tr><td><code>--grid-cards</code></td><td>repeat(3, 1fr)</td><td>Grid de catálogo (modelos)</td></tr>
      <tr><td><code>--grid-split</code></td><td>1fr 320px / 340px</td><td>Layout contenido + sidebar (horarios, consultas)</td></tr>
      <tr><td><code>--nav-h</code></td><td>92px</td><td>Altura del nav flotante</td></tr>
    </table>

    <div class="usage">
      <div class="do">
        <h5>Buenas prácticas</h5>
        <p>Usar el rojo solo para acciones, estados activos y destacar secciones.</p>
        <p>Escala tipográfica de 800 en títulos y 400–600 en cuerpo.</p>
        <p>Tarjetas siempre sobre <code>#1A1A1A</code> con borde <code>#2A2A2A</code>.</p>
      </div>
      <div class="dont">
        <h5>Evitar</h5>
        <p>Rojo en bloques de texto largo; reservarlo para énfasis.</p>
        <p>Agregar colores nuevos sin documentarlos acá.</p>
        <p>Nuevos pesos de fuente fuera de Manrope.</p>
      </div>
    </div>
  </section>

</div>

<script>
  function copyHex(el) {
    var h = el.textContent.trim().replace('→', ' a ');
    var tmp = document.createElement('textarea');
    tmp.value = h; document.body.appendChild(tmp);
    tmp.select();
    try { document.execCommand('copy'); } catch (e) {}
    document.body.removeChild(tmp);
    var antes = el.textContent;
    el.textContent = '¡Copiado! ' + antes.split(' ')[0];
    setTimeout(function () { el.textContent = antes; }, 1200);
  }
</script>
</body>
</html>