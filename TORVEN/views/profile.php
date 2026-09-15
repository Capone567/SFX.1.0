<?php $title = 'Mi Perfil'; $page = 'perfil'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<main style="min-height:100vh;background:#111;padding:100px 64px 80px;">

  <!-- ── Header ── -->
  <div style="display:flex;align-items:center;gap:24px;padding-bottom:36px;border-bottom:1px solid #2A2A2A;margin-bottom:40px;">

    <!-- Avatar -->
    <div id="prof-avatar" style="width:80px;height:80px;border-radius:50%;background:#C00000;display:flex;align-items:center;justify-content:center;font-size:32px;font-weight:800;color:#fff;flex-shrink:0;box-shadow:0 0 0 4px rgba(192,0,0,0.2);">M</div>

    <div>
      <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;color:#C00000;margin-bottom:4px;">Mi cuenta</p>
      <h1 id="prof-header-nombre" style="font-size:34px;font-weight:800;color:#fff;line-height:1;">Martina López</h1>
      <p id="prof-header-email" style="font-size:14px;color:#6B7280;margin-top:4px;">martina@email.com</p>
    </div>

    <div style="margin-left:auto;display:flex;align-items:center;gap:8px;padding:8px 16px;border-radius:6px;background:#1A1A1A;border:1px solid #2A2A2A;">
      <div style="width:8px;height:8px;border-radius:50%;background:#16A34A;"></div>
      <span style="font-size:12px;font-weight:700;color:#16A34A;">Cuenta activa</span>
    </div>
  </div>

  <!-- ── Grid principal ── -->
  <div style="display:grid;grid-template-columns:1fr 300px;gap:28px;align-items:start;">

    <!-- ── Formulario ── -->
    <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;padding:40px;">
      <h2 style="font-size:17px;font-weight:800;color:#fff;margin-bottom:30px;">Información personal</h2>

      <form id="prof-form" onsubmit="profGuardar(event)" style="display:flex;flex-direction:column;gap:24px;">

        <!-- Nombre y Apellido -->
        <div style="display:flex;flex-direction:column;gap:7px;">
          <label for="prof-nombre" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">Nombre y Apellido</label>
          <input
            id="prof-nombre"
            type="text"
            value="Martina López"
            placeholder="Ej. Martina López"
            required
            style="width:100%;padding:12px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:15px;font-weight:600;outline:none;transition:border-color 0.18s;"
            onfocus="this.style.borderColor='#C00000'"
            onblur="this.style.borderColor='#2A2A2A'"
          >
        </div>

        <!-- Teléfono -->
        <div style="display:flex;flex-direction:column;gap:7px;">
          <label for="prof-telefono" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">Teléfono</label>
          <input
            id="prof-telefono"
            type="tel"
            value="+54 11 4567-8900"
            placeholder="+54 11 0000-0000"
            required
            style="width:100%;padding:12px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:15px;font-weight:600;outline:none;transition:border-color 0.18s;"
            onfocus="this.style.borderColor='#C00000'"
            onblur="this.style.borderColor='#2A2A2A'"
          >
        </div>

        <!-- Matrícula -->
        <div style="display:flex;flex-direction:column;gap:7px;">
          <label for="prof-patente" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">Matrícula del vehículo</label>
          <div style="position:relative;">
            <input
              id="prof-patente"
              type="text"
              value="AB 123 CD"
              maxlength="10"
              placeholder="Ej. AB 123 CD"
              style="width:100%;padding:12px 46px 12px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:15px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;outline:none;transition:border-color 0.18s;"
              onfocus="this.style.borderColor='#C00000'"
              onblur="this.style.borderColor='#2A2A2A';this.value=this.value.toUpperCase()"
            >
            <div style="position:absolute;right:13px;top:50%;transform:translateY(-50%);pointer-events:none;">
              <svg width="18" height="18" fill="none" viewBox="0 0 24 24" stroke="#4B5563" stroke-width="1.8">
                <rect x="2" y="6" width="20" height="12" rx="2"/>
                <path d="M7 12h10M7 9h2M15 9h2"/>
              </svg>
            </div>
          </div>
          <p style="font-size:11px;color:#4B5563;margin-top:1px;">Identificá tu auto para agilizar la reserva de turnos.</p>
        </div>

        <!-- Correo electrónico -->
        <div style="display:flex;flex-direction:column;gap:7px;">
          <label for="prof-email" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">Correo electrónico</label>
          <input
            id="prof-email"
            type="email"
            value="martina@email.com"
            placeholder="tu@email.com"
            required
            style="width:100%;padding:12px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:15px;font-weight:600;outline:none;transition:border-color 0.18s;"
            onfocus="this.style.borderColor='#C00000'"
            onblur="this.style.borderColor='#2A2A2A'"
          >
          <p style="font-size:11px;color:#4B5563;margin-top:1px;">Si cambiás el correo deberás verificar el nuevo antes de iniciar sesión.</p>
        </div>

        <!-- Fecha de Registro — solo lectura -->
        <div style="display:flex;flex-direction:column;gap:7px;">
          <label style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">Fecha de registro</label>
          <div style="display:flex;align-items:center;gap:10px;padding:12px 14px;background:#0D0D0D;border:1px solid #1E1E1E;border-radius:7px;">
            <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4B5563" stroke-width="1.8" style="flex-shrink:0;">
              <rect x="3" y="4" width="18" height="18" rx="2"/>
              <path d="M16 2v4M8 2v4M3 10h18"/>
            </svg>
            <span style="font-size:14px;font-weight:600;color:#6B7280;">12 de enero, 2025</span>
            <span style="margin-left:auto;font-size:10px;font-weight:700;padding:3px 9px;border-radius:4px;background:#1A1A1A;color:#4B5563;letter-spacing:0.06em;">SOLO LECTURA</span>
          </div>
        </div>

        <!-- Divisor -->
        <div style="height:1px;background:#2A2A2A;"></div>

        <!-- Botones -->
        <div style="display:flex;gap:12px;">
          <button
            type="submit"
            style="flex:1;padding:13px;background:#C00000;color:#fff;font-size:14px;font-weight:700;border:none;border-radius:7px;cursor:pointer;transition:background 0.18s;"
            onmouseover="this.style.background='#A00000'"
            onmouseout="this.style.background='#C00000'"
          >Guardar cambios</button>
          <button
            type="button"
            onclick="profCancelar()"
            style="padding:13px 24px;background:transparent;color:#9CA3AF;font-size:14px;font-weight:600;border:1px solid #2A2A2A;border-radius:7px;cursor:pointer;transition:border-color 0.18s,color 0.18s;"
            onmouseover="this.style.borderColor='#4B5563';this.style.color='#fff'"
            onmouseout="this.style.borderColor='#2A2A2A';this.style.color='#9CA3AF'"
          >Cancelar</button>
        </div>

        <!-- Toast -->
        <div id="prof-toast" style="display:none;padding:13px 16px;border-radius:7px;background:#16A34A;color:#fff;font-size:13px;font-weight:700;text-align:center;">
          ✓ Cambios guardados correctamente
        </div>

      </form>
    </div>

    <!-- ── Panel lateral ── -->
    <div style="display:flex;flex-direction:column;gap:16px;">

      <!-- Resumen -->
      <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;padding:24px;">
        <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#6B7280;margin-bottom:16px;">Resumen</p>
        <div style="display:flex;flex-direction:column;gap:14px;">
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#6B7280;">Miembro desde</span>
            <span style="font-size:13px;font-weight:700;color:#fff;">Ene 2025</span>
          </div>
          <div style="height:1px;background:#222;"></div>
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#6B7280;">Turnos totales</span>
            <span style="font-size:13px;font-weight:700;color:#fff;">7</span>
          </div>
          <div style="height:1px;background:#222;"></div>
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#6B7280;">Matrícula</span>
            <span id="sidebar-patente" style="font-size:13px;font-weight:700;color:#fff;letter-spacing:0.1em;">AB 123 CD</span>
          </div>
        </div>
      </div>

      <!-- Último turno -->
      <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;padding:24px;">
        <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#6B7280;margin-bottom:14px;">Último turno</p>
        <div style="padding:14px;border-radius:8px;background:#111;border:1px solid #2A2A2A;">
          <p style="font-size:12px;color:#C00000;font-weight:700;margin-bottom:4px;">Servicio mayor</p>
          <p style="font-size:14px;font-weight:700;color:#fff;">Toyota RAV4 · AB 123 CD</p>
          <p style="font-size:12px;color:#9CA3AF;margin-top:4px;">Lun 8 Sep 2026 · 09:00h</p>
        </div>
        <a href="index.php#horarios" style="display:block;margin-top:12px;padding:10px;border-radius:6px;background:transparent;border:1px solid #2A2A2A;color:#9CA3AF;font-size:13px;font-weight:600;text-align:center;text-decoration:none;"
          onmouseover="this.style.borderColor='#4B5563';this.style.color='#fff'"
          onmouseout="this.style.borderColor='#2A2A2A';this.style.color='#9CA3AF'"
        >Reservar nuevo turno →</a>
      </div>

      <!-- Zona de peligro -->
      <div style="background:#1A1A1A;border:1px solid #3A1010;border-radius:12px;padding:24px;">
        <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#7F1D1D;margin-bottom:8px;">Zona de peligro</p>
        <p style="font-size:13px;color:#6B7280;line-height:1.55;margin-bottom:16px;">Eliminar tu cuenta es <strong style="color:#9CA3AF;">permanente e irreversible.</strong> Todos tus datos y turnos serán borrados.</p>
        <button
          onclick="abrirModal()"
          style="width:100%;padding:11px;background:transparent;color:#C00000;font-size:13px;font-weight:700;border:1px solid #3A1010;border-radius:7px;cursor:pointer;transition:background 0.18s,border-color 0.18s;"
          onmouseover="this.style.background='rgba(192,0,0,0.1)';this.style.borderColor='#C00000'"
          onmouseout="this.style.background='transparent';this.style.borderColor='#3A1010'"
        >Eliminar mi cuenta</button>
      </div>

    </div>
  </div>
</main>

<!-- ══ Modal confirmar eliminación ══ -->
<div id="modal-delete" style="display:none;position:fixed;inset:0;z-index:300;align-items:center;justify-content:center;background:rgba(0,0,0,0.78);backdrop-filter:blur(5px);">
  <div style="background:#1A1A1A;border:1px solid #3A1010;border-radius:14px;padding:44px 40px;max-width:440px;width:90%;position:relative;animation:fadeUp 0.2s ease;">

    <!-- Ícono alerta -->
    <div style="width:56px;height:56px;border-radius:50%;background:rgba(192,0,0,0.12);border:1px solid #3A1010;display:flex;align-items:center;justify-content:center;margin-bottom:20px;">
      <svg width="24" height="24" fill="none" viewBox="0 0 24 24" stroke="#C00000" stroke-width="2">
        <path d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z"/>
      </svg>
    </div>

    <h3 style="font-size:22px;font-weight:800;color:#fff;margin-bottom:10px;">¿Eliminar tu cuenta?</h3>
    <p style="font-size:14px;color:#9CA3AF;line-height:1.65;margin-bottom:24px;">
      Esta acción no se puede deshacer. Todos tus datos personales, historial de turnos y vehículos registrados serán eliminados de forma permanente.
    </p>

    <p style="font-size:13px;color:#6B7280;margin-bottom:8px;">Escribí <strong style="color:#fff;letter-spacing:0.06em;">ELIMINAR</strong> para confirmar:</p>
    <input
      id="delete-confirm-input"
      type="text"
      placeholder="ELIMINAR"
      autocomplete="off"
      style="width:100%;padding:12px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;font-weight:700;letter-spacing:0.1em;text-transform:uppercase;outline:none;margin-bottom:20px;transition:border-color 0.18s;"
      onfocus="this.style.borderColor='#C00000'"
      onblur="this.style.borderColor='#2A2A2A'"
      oninput="validarEliminar(this.value)"
    >

    <div style="display:flex;gap:12px;">
      <button
        id="btn-delete-confirm"
        disabled
        onclick="confirmarEliminar()"
        style="flex:1;padding:13px;background:#3A1010;color:#6B7280;font-size:14px;font-weight:700;border:none;border-radius:7px;cursor:not-allowed;transition:background 0.18s,color 0.18s;"
      >Eliminar cuenta</button>
      <button
        onclick="cerrarModal()"
        style="padding:13px 24px;background:transparent;color:#9CA3AF;font-size:14px;font-weight:600;border:1px solid #2A2A2A;border-radius:7px;cursor:pointer;transition:border-color 0.18s,color 0.18s;"
        onmouseover="this.style.borderColor='#4B5563';this.style.color='#fff'"
        onmouseout="this.style.borderColor='#2A2A2A';this.style.color='#9CA3AF'"
      >Cancelar</button>
    </div>
  </div>
</div>

<style>
@keyframes fadeUp {
  from { opacity:0; transform:translateY(16px); }
  to   { opacity:1; transform:translateY(0); }
}
</style>

