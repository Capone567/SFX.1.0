<!-- ============================================================
     VISTA: REGISTRO DE SERVICIO — Solo contenido (sin head/nav/footer)
     Las funciones JS (confirmarServicio, limpiarForm, etc.) están
     en js/script.js como funciones globales.
     ============================================================ -->

<div style="min-height:100vh;background:#111;padding:100px 64px 80px;">

  <!-- Header -->
  <div style="display:flex;align-items:flex-start;justify-content:space-between;padding-bottom:32px;border-bottom:1px solid #2A2A2A;margin-bottom:40px;">
    <div>
      <div style="display:inline-flex;align-items:center;gap:8px;padding:5px 12px;border-radius:4px;background:rgba(192,0,0,0.12);border:1px solid rgba(192,0,0,0.3);margin-bottom:14px;">
        <div style="width:6px;height:6px;border-radius:50%;background:#C00000;"></div>
        <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.18em;color:#C00000;">Panel interno</span>
      </div>
      <h1 style="font-size:38px;font-weight:800;color:#fff;line-height:1;margin-bottom:8px;">Registro de servicio</h1>
      <p style="font-size:14px;color:#6B7280;">Completá los datos del vehículo y el trabajo realizado para registrar el servicio.</p>
    </div>
    <div style="display:flex;align-items:center;gap:10px;padding:10px 18px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;">
      <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#9CA3AF" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
      <div>
        <p style="font-size:12px;font-weight:700;color:#fff;">Admin</p>
        <p style="font-size:11px;color:#4B5563;">Torven Taller</p>
      </div>
    </div>
  </div>

  <!-- Grid -->
  <div style="display:grid;grid-template-columns:1fr 300px;gap:28px;align-items:start;">

    <!-- Formulario -->
    <form id="form-servicio" onsubmit="confirmarServicio(event)" style="display:flex;flex-direction:column;gap:20px;">

      <!-- Datos del vehículo -->
      <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;overflow:hidden;">
        <div style="padding:18px 28px;border-bottom:1px solid #2A2A2A;display:flex;align-items:center;gap:10px;">
          <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#C00000" stroke-width="2"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M7 12h10M7 9h2M15 9h2"/></svg>
          <h2 style="font-size:13px;font-weight:800;color:#fff;text-transform:uppercase;letter-spacing:0.08em;">Datos del vehículo</h2>
        </div>
        <div style="padding:28px;display:grid;grid-template-columns:1fr 1fr;gap:20px;">

          <!-- Patente -->
          <div style="display:flex;flex-direction:column;gap:7px;">
            <label for="patente" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Patente <span style="color:#C00000;">*</span>
            </label>
            <div style="position:relative;">
              <input
                id="patente"
                name="patente"
                type="text"
                maxlength="10"
                placeholder="Ej. AB 123 CD"
                required
                style="width:100%;padding:11px 42px 11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:15px;font-weight:700;letter-spacing:0.15em;text-transform:uppercase;outline:none;transition:border-color 0.18s;box-sizing:border-box;"
                onfocus="this.style.borderColor='#C00000'"
                onblur="this.style.borderColor='#2A2A2A';this.value=this.value.toUpperCase()"
              >
              <div style="position:absolute;right:13px;top:50%;transform:translateY(-50%);pointer-events:none;">
                <svg width="16" height="16" fill="none" viewBox="0 0 24 24" stroke="#4B5563" stroke-width="1.8"><rect x="2" y="6" width="20" height="12" rx="2"/><path d="M7 12h10M7 9h2M15 9h2"/></svg>
              </div>
            </div>
          </div>

          <!-- Modelo -->
          <div style="display:flex;flex-direction:column;gap:7px;">
            <label for="modelo" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Modelo del vehículo <span style="color:#C00000;">*</span>
            </label>
            <input
              id="modelo"
              name="modelo"
              type="text"
              placeholder="Ej. Toyota Corolla 2024"
              required
              style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;font-weight:600;outline:none;transition:border-color 0.18s;box-sizing:border-box;"
              onfocus="this.style.borderColor='#C00000'"
              onblur="this.style.borderColor='#2A2A2A'"
            >
          </div>

        </div>
      </div>

      <!-- Datos del cliente -->
      <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;overflow:hidden;">
        <div style="padding:18px 28px;border-bottom:1px solid #2A2A2A;display:flex;align-items:center;gap:10px;">
          <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#C00000" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
          <h2 style="font-size:13px;font-weight:800;color:#fff;text-transform:uppercase;letter-spacing:0.08em;">Datos del cliente</h2>
        </div>
        <div style="padding:28px;display:grid;grid-template-columns:1fr 1fr;gap:20px;">

          <!-- Nombre -->
          <div style="display:flex;flex-direction:column;gap:7px;">
            <label for="nombre" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Nombre del cliente <span style="color:#C00000;">*</span>
            </label>
            <input
              id="nombre"
              name="nombre"
              type="text"
              placeholder="Ej. Martina López"
              required
              style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;font-weight:600;outline:none;transition:border-color 0.18s;box-sizing:border-box;"
              onfocus="this.style.borderColor='#C00000'"
              onblur="this.style.borderColor='#2A2A2A'"
            >
          </div>

          <!-- Teléfono -->
          <div style="display:flex;flex-direction:column;gap:7px;">
            <label for="telefono" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Teléfono <span style="color:#C00000;">*</span>
            </label>
            <input
              id="telefono"
              name="telefono"
              type="tel"
              placeholder="+54 11 0000-0000"
              required
              style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;font-weight:600;outline:none;transition:border-color 0.18s;box-sizing:border-box;"
              onfocus="this.style.borderColor='#C00000'"
              onblur="this.style.borderColor='#2A2A2A'"
            >
          </div>

          <!-- Email -->
          <div style="display:flex;flex-direction:column;gap:7px;grid-column:1/-1;">
            <label for="email" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Email del cliente
            </label>
            <input
              id="email"
              name="email"
              type="email"
              placeholder="cliente@email.com"
              style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;font-weight:600;outline:none;transition:border-color 0.18s;box-sizing:border-box;"
              onfocus="this.style.borderColor='#C00000'"
              onblur="this.style.borderColor='#2A2A2A'"
            >
          </div>

        </div>
      </div>

      <!-- Trabajo realizado -->
      <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;overflow:hidden;">
        <div style="padding:18px 28px;border-bottom:1px solid #2A2A2A;display:flex;align-items:center;gap:10px;">
          <svg width="15" height="15" fill="none" viewBox="0 0 24 24" stroke="#C00000" stroke-width="2"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg>
          <h2 style="font-size:13px;font-weight:800;color:#fff;text-transform:uppercase;letter-spacing:0.08em;">Trabajo realizado</h2>
        </div>
        <div style="padding:28px;display:flex;flex-direction:column;gap:20px;">

          <!-- Tipo de servicio -->
          <div style="display:flex;flex-direction:column;gap:7px;">
            <label for="tipo_servicio" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Tipo de servicio <span style="color:#C00000;">*</span>
            </label>
            <select
              id="tipo_servicio"
              name="tipo_servicio"
              required
              style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;font-weight:600;outline:none;transition:border-color 0.18s;appearance:none;cursor:pointer;"
              onfocus="this.style.borderColor='#C00000'"
              onblur="this.style.borderColor='#2A2A2A'"
            >
              <option value="" disabled selected style="color:#4B5563;">Seleccioná el tipo de servicio</option>
              <option value="aceite">Cambio de aceite y filtros</option>
              <option value="frenos">Frenos y pastillas</option>
              <option value="suspension">Suspensión y alineación</option>
              <option value="ecu">Diagnóstico ECU / electricidad</option>
              <option value="mayor">Servicio mayor completo</option>
              <option value="transmision">Transmisión y caja</option>
              <option value="climatizacion">Climatización</option>
              <option value="carroceria">Carrocería y pintura</option>
              <option value="otro">Otro</option>
            </select>
          </div>

          <!-- Descripción detallada -->
          <div style="display:flex;flex-direction:column;gap:7px;">
            <label for="trabajo" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Descripción del trabajo <span style="color:#C00000;">*</span>
            </label>
            <textarea
              id="trabajo"
              name="trabajo"
              rows="5"
              placeholder="Describí en detalle el trabajo realizado, repuestos utilizados, observaciones técnicas, etc."
              required
              style="width:100%;padding:12px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;line-height:1.6;resize:vertical;outline:none;transition:border-color 0.18s;font-family:inherit;box-sizing:border-box;"
              onfocus="this.style.borderColor='#C00000'"
              onblur="this.style.borderColor='#2A2A2A'"
            ></textarea>
          </div>

          <!-- Fecha del servicio -->
          <div style="display:flex;flex-direction:column;gap:7px;">
            <label for="fecha" style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.12em;color:#6B7280;">
              Fecha del servicio <span style="color:#C00000;">*</span>
            </label>
            <div style="position:relative;">
              <input
                id="fecha"
                name="fecha"
                type="date"
                required
                style="width:100%;padding:11px 14px;background:#111;border:1px solid #2A2A2A;border-radius:7px;color:#fff;font-size:14px;font-weight:600;outline:none;transition:border-color 0.18s;box-sizing:border-box;color-scheme:dark;"
                onfocus="this.style.borderColor='#C00000'"
                onblur="this.style.borderColor='#2A2A2A'"
              >
            </div>
          </div>

        </div>
      </div>

      <!-- Botones -->
      <div style="display:flex;gap:12px;align-items:center;">
        <button
          type="submit"
          style="flex:1;padding:15px;background:#C00000;color:#fff;font-size:15px;font-weight:700;border:none;border-radius:8px;cursor:pointer;letter-spacing:0.03em;transition:background 0.18s;display:flex;align-items:center;justify-content:center;gap:10px;"
          onmouseover="this.style.background='#A00000'"
          onmouseout="this.style.background='#C00000'"
        >
          <svg width="17" height="17" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
          Confirmar registro
        </button>
        <button
          type="reset"
          onclick="limpiarForm()"
          style="padding:15px 28px;background:transparent;color:#9CA3AF;font-size:14px;font-weight:600;border:1px solid #2A2A2A;border-radius:8px;cursor:pointer;transition:border-color 0.18s,color 0.18s;"
          onmouseover="this.style.borderColor='#4B5563';this.style.color='#fff'"
          onmouseout="this.style.borderColor='#2A2A2A';this.style.color='#9CA3AF'"
        >Limpiar</button>
      </div>

    </form>

    <!-- Panel lateral -->
    <div style="display:flex;flex-direction:column;gap:16px;position:sticky;top:88px;">

      <!-- Vista previa -->
      <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;padding:24px;">
        <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#6B7280;margin-bottom:16px;">Vista previa</p>
        <div style="display:flex;flex-direction:column;gap:12px;">
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#4B5563;">Patente</span>
            <span id="prev-patente" style="font-size:13px;font-weight:700;color:#fff;letter-spacing:0.12em;">—</span>
          </div>
          <div style="height:1px;background:#222;"></div>
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#4B5563;">Modelo</span>
            <span id="prev-modelo" style="font-size:13px;font-weight:600;color:#9CA3AF;text-align:right;max-width:160px;">—</span>
          </div>
          <div style="height:1px;background:#222;"></div>
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#4B5563;">Cliente</span>
            <span id="prev-nombre" style="font-size:13px;font-weight:600;color:#9CA3AF;text-align:right;max-width:160px;">—</span>
          </div>
          <div style="height:1px;background:#222;"></div>
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#4B5563;">Servicio</span>
            <span id="prev-servicio" style="font-size:13px;font-weight:600;color:#9CA3AF;text-align:right;max-width:160px;">—</span>
          </div>
          <div style="height:1px;background:#222;"></div>
          <div style="display:flex;justify-content:space-between;align-items:center;">
            <span style="font-size:12px;color:#4B5563;">Fecha</span>
            <span id="prev-fecha" style="font-size:13px;font-weight:600;color:#9CA3AF;">—</span>
          </div>
        </div>
      </div>

      <!-- Accesos rápidos -->
      <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;padding:24px;">
        <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;color:#6B7280;margin-bottom:14px;">Accesos rápidos</p>
        <div style="display:flex;flex-direction:column;gap:8px;">
          <a href="#horarios" style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:6px;background:#111;border:1px solid #2A2A2A;text-decoration:none;color:#D1D5DB;font-size:13px;font-weight:600;transition:border-color 0.18s;"
            onmouseover="this.style.borderColor='#4B5563'"
            onmouseout="this.style.borderColor='#2A2A2A'">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#C00000" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2"/><path d="M16 2v4M8 2v4M3 10h18"/></svg>
            Ver horarios
          </a>
          <a href="#consultas" style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:6px;background:#111;border:1px solid #2A2A2A;text-decoration:none;color:#D1D5DB;font-size:13px;font-weight:600;transition:border-color 0.18s;"
            onmouseover="this.style.borderColor='#4B5563'"
            onmouseout="this.style.borderColor='#2A2A2A'">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#C00000" stroke-width="2"><path d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            Consultas
          </a>
          <a href="#profile" style="display:flex;align-items:center;gap:10px;padding:10px 12px;border-radius:6px;background:#111;border:1px solid #2A2A2A;text-decoration:none;color:#D1D5DB;font-size:13px;font-weight:600;transition:border-color 0.18s;"
            onmouseover="this.style.borderColor='#4B5563'"
            onmouseout="this.style.borderColor='#2A2A2A'">
            <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#C00000" stroke-width="2"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
            Mi perfil
          </a>
        </div>
      </div>

      <!-- Info campos obligatorios -->
      <div style="padding:14px 16px;border-radius:8px;background:#0D0D0D;border:1px solid #1E1E1E;display:flex;gap:10px;align-items:flex-start;">
        <svg width="14" height="14" fill="none" viewBox="0 0 24 24" stroke="#4B5563" stroke-width="2" style="flex-shrink:0;margin-top:1px;"><circle cx="12" cy="12" r="10"/><path d="M12 8v4m0 4h.01"/></svg>
        <p style="font-size:12px;color:#4B5563;line-height:1.55;">Los campos marcados con <span style="color:#C00000;font-weight:700;">*</span> son obligatorios para confirmar el registro.</p>
      </div>

    </div>
  </div>

</div>

<!-- Modal de confirmación -->
<div id="modal-ok" style="display:none;position:fixed;inset:0;z-index:300;align-items:center;justify-content:center;background:rgba(0,0,0,0.78);backdrop-filter:blur(5px);">
  <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:14px;padding:44px 40px;max-width:460px;width:90%;text-align:center;animation:fadeUp 0.22s ease;">

    <!-- Check -->
    <div style="width:64px;height:64px;border-radius:50%;background:rgba(22,163,74,0.12);border:1px solid rgba(22,163,74,0.3);display:flex;align-items:center;justify-content:center;margin:0 auto 20px;">
      <svg width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="#16A34A" stroke-width="2.2"><path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
    </div>

    <h3 style="font-size:22px;font-weight:800;color:#fff;margin-bottom:10px;">Servicio registrado</h3>
    <p style="font-size:14px;color:#9CA3AF;line-height:1.6;margin-bottom:8px;">El servicio fue registrado exitosamente.</p>

    <!-- Resumen en el modal -->
    <div style="background:#111;border:1px solid #2A2A2A;border-radius:8px;padding:16px;margin:20px 0;text-align:left;">
      <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
        <span style="font-size:12px;color:#4B5563;">Patente</span>
        <span id="modal-patente" style="font-size:13px;font-weight:700;color:#fff;letter-spacing:0.1em;"></span>
      </div>
      <div style="display:flex;justify-content:space-between;margin-bottom:8px;">
        <span style="font-size:12px;color:#4B5563;">Cliente</span>
        <span id="modal-nombre" style="font-size:13px;font-weight:600;color:#9CA3AF;"></span>
      </div>
      <div style="display:flex;justify-content:space-between;">
        <span style="font-size:12px;color:#4B5563;">Fecha</span>
        <span id="modal-fecha" style="font-size:13px;font-weight:600;color:#9CA3AF;"></span>
      </div>
    </div>

    <div style="display:flex;gap:12px;">
      <button
        onclick="nuevoRegistro()"
        style="flex:1;padding:13px;background:#C00000;color:#fff;font-size:14px;font-weight:700;border:none;border-radius:7px;cursor:pointer;transition:background 0.18s;"
        onmouseover="this.style.background='#A00000'"
        onmouseout="this.style.background='#C00000'"
      >Nuevo registro</button>
      <button
        onclick="cerrarModal()"
        style="padding:13px 22px;background:transparent;color:#9CA3AF;font-size:14px;font-weight:600;border:1px solid #2A2A2A;border-radius:7px;cursor:pointer;transition:border-color 0.18s;"
        onmouseover="this.style.borderColor='#4B5563';this.style.color='#fff'"
        onmouseout="this.style.borderColor='#2A2A2A';this.style.color='#9CA3AF'"
      >Cerrar</button>
    </div>
  </div>
</div>