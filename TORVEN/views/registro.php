<?php $title = 'Registrarse'; $page = 'registro.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<main style="min-height:100vh;display:flex;align-items:center;justify-content:center;padding:100px 24px 64px;background:#111;position:relative;overflow:hidden;">

  <!-- Fondo decorativo -->
  <div style="position:absolute;inset:0;background:radial-gradient(ellipse 60% 60% at 50% 40%,rgba(192,0,0,0.12) 0%,transparent 70%);pointer-events:none;"></div>
  <div style="position:absolute;top:0;left:0;right:0;height:1px;background:linear-gradient(to right,transparent,#C00000,transparent);opacity:0.5;"></div>

  <div style="width:100%;max-width:480px;position:relative;z-index:1;">

    <!-- Logo -->
    <div style="text-align:center;margin-bottom:40px;">
      <a href="index.php">
        <img src="src/imports/TORVEN_LOGO.png" alt="Torven" style="height:48px;width:auto;object-fit:contain;margin:0 auto;">
      </a>
    </div>

    <!-- Card -->
    <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;padding:40px;">

      <div style="margin-bottom:32px;">
        <h1 style="font-size:26px;font-weight:800;color:#fff;margin-bottom:6px;">Crear cuenta</h1>
        <p style="font-size:14px;color:#9CA3AF;">Registrate para reservar turnos y hacer seguimiento de tu vehículo.</p>
      </div>

      <form action="#" method="POST" style="display:flex;flex-direction:column;gap:20px;">

        <!-- Nombre completo -->
        <div style="display:flex;flex-direction:column;gap:6px;">
          <label for="nombre" style="font-size:13px;font-weight:600;color:#D1D5DB;">Nombre completo</label>
          <input
            type="text"
            id="nombre"
            name="nombre"
            placeholder="Ej. Martina López"
            required
            style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:6px;color:#fff;font-size:14px;outline:none;transition:border-color 0.2s;"
            onfocus="this.style.borderColor='#C00000'"
            onblur="this.style.borderColor='#2A2A2A'"
          >
        </div>

        <!-- Teléfono -->
        <div style="display:flex;flex-direction:column;gap:6px;">
          <label for="telefono" style="font-size:13px;font-weight:600;color:#D1D5DB;">Teléfono</label>
          <input
            type="tel"
            id="telefono"
            name="telefono"
            placeholder="Ej. +54 11 4567-8900"
            required
            style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:6px;color:#fff;font-size:14px;outline:none;transition:border-color 0.2s;"
            onfocus="this.style.borderColor='#C00000'"
            onblur="this.style.borderColor='#2A2A2A'"
          >
        </div>

        <!-- Email -->
        <div style="display:flex;flex-direction:column;gap:6px;">
          <label for="email" style="font-size:13px;font-weight:600;color:#D1D5DB;">Correo electrónico</label>
          <input
            type="email"
            id="email"
            name="email"
            placeholder="tu@email.com"
            required
            style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:6px;color:#fff;font-size:14px;outline:none;transition:border-color 0.2s;"
            onfocus="this.style.borderColor='#C00000'"
            onblur="this.style.borderColor='#2A2A2A'"
          >
        </div>

        <!-- Contraseña -->
        <div style="display:flex;flex-direction:column;gap:6px;">
          <label for="password" style="font-size:13px;font-weight:600;color:#D1D5DB;">Contraseña</label>
          <input
            type="password"
            id="password"
            name="password"
            placeholder="Mínimo 8 caracteres"
            required
            minlength="8"
            style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:6px;color:#fff;font-size:14px;outline:none;transition:border-color 0.2s;"
            onfocus="this.style.borderColor='#C00000'"
            onblur="this.style.borderColor='#2A2A2A'"
          >
          <p style="font-size:12px;color:#4B5563;margin-top:2px;">Usá al menos 8 caracteres, incluí números o símbolos.</p>
        </div>

        <!-- Acento decorativo -->
        <div style="height:1px;background:#2A2A2A;margin:4px 0;"></div>

        <!-- Submit -->
        <button
          type="submit"
          style="width:100%;padding:13px;background:#C00000;color:#fff;font-size:15px;font-weight:700;border:none;border-radius:6px;cursor:pointer;transition:background 0.2s;"
          onmouseover="this.style.background='#A00000'"
          onmouseout="this.style.background='#C00000'"
        >
          Crear cuenta
        </button>

      </form>

      <!-- Divider -->
      <div style="display:flex;align-items:center;gap:12px;margin:28px 0;">
        <div style="flex:1;height:1px;background:#2A2A2A;"></div>
        <span style="font-size:12px;color:#4B5563;font-weight:600;">O</span>
        <div style="flex:1;height:1px;background:#2A2A2A;"></div>
      </div>

      <!-- Link a login -->
      <p style="text-align:center;font-size:14px;color:#9CA3AF;">
        ¿Ya tenés cuenta?
        <a href="login.php" style="color:#C00000;font-weight:700;margin-left:4px;">Iniciar sesión</a>
      </p>

    </div>

    <!-- Texto pie -->
    <p style="text-align:center;margin-top:24px;font-size:12px;color:#4B5563;">
      Al registrarte aceptás nuestros <a href="#" style="color:#6B7280;text-decoration:underline;">Términos de uso</a> y <a href="#" style="color:#6B7280;text-decoration:underline;">Política de privacidad</a>.
    </p>

  </div>
</main>

<?php include '_footer.php'; ?>
</body>
</html>