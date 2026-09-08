<?php $title = 'Consultas'; $page = 'consultas.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<!-- HEADER -->
<div style="background:#C00000;padding:128px 64px 48px;">
  <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:8px;color:rgba(255,255,255,0.6);">Atención al cliente</p>
  <h1 style="font-size:52px;font-weight:800;color:#fff;">Consultas</h1>
</div>

<div style="display:grid;grid-template-columns:1fr 320px;gap:32px;padding:32px 64px 80px;">

  <!-- Form (visual only) -->
  <div style="padding:32px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;">
    <h3 style="font-size:18px;font-weight:800;margin-bottom:24px;color:#fff;">Formulario de consulta</h3>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-bottom:16px;">
      <?php foreach ([['Nombre completo','Tu nombre'],['Email','correo@ejemplo.com'],['Teléfono','+54 9 11 0000-0000'],['Patente (opcional)','AB123CD']] as [$l,$ph]): ?>
      <div>
        <label style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:6px;color:#9CA3AF;"><?= $l ?></label>
        <input placeholder="<?= $ph ?>" style="width:100%;padding:10px 16px;border-radius:6px;background:#111;color:#9CA3AF;border:1px solid #2A2A2A;font-size:14px;outline:none;" readonly>
      </div>
      <?php endforeach; ?>
    </div>
    <div style="margin-bottom:16px;">
      <label style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:6px;color:#9CA3AF;">Tipo de consulta</label>
      <select style="width:100%;padding:10px 16px;border-radius:6px;background:#111;color:#9CA3AF;border:1px solid #2A2A2A;font-size:14px;outline:none;" disabled>
        <option>Presupuesto de servicio</option><option>Consulta técnica</option><option>Garantía</option>
      </select>
    </div>
    <div style="margin-bottom:24px;">
      <label style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.1em;display:block;margin-bottom:6px;color:#9CA3AF;">Mensaje</label>
      <textarea rows="5" placeholder="Describí tu consulta..." style="width:100%;padding:12px 16px;border-radius:6px;background:#111;color:#9CA3AF;border:1px solid #2A2A2A;font-size:14px;outline:none;resize:none;" readonly></textarea>
    </div>
    <div style="padding:14px;border-radius:6px;background:#C00000;text-align:center;font-size:14px;font-weight:700;color:#fff;">
      Enviar consulta →
    </div>
  </div>

  <!-- Sidebar info -->
  <div style="display:flex;flex-direction:column;gap:16px;">
    <div style="padding:24px;border-radius:8px;background:#C00000;text-align:center;">
      <div style="display:flex;justify-content:center;margin-bottom:16px;">
        <img src="src/imports/TORVEN_LOGO.png" alt="Torven" style="height:60px;width:auto;object-fit:contain;">
      </div>
      <h4 style="font-size:15px;font-weight:800;margin-bottom:12px;color:#fff;">Contacto directo</h4>
      <p style="font-size:20px;font-weight:800;color:#fff;">+54 11 4567-8900</p>
      <p style="font-size:12px;margin:4px 0 16px;color:rgba(255,255,255,0.6);">Lun–Vie 7:30–18:00h</p>
      <div style="display:flex;gap:8px;">
        <a href="https://wa.me/5491145678900" target="_blank" style="flex:1;display:flex;align-items:center;justify-content:center;gap:6px;padding:10px;border-radius:6px;background:#25D366;color:#fff;font-size:13px;font-weight:700;text-decoration:none;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          WhatsApp
        </a>
        <a href="https://instagram.com/torven.taller" target="_blank" style="flex:1;display:flex;align-items:center;justify-content:center;gap:6px;padding:10px;border-radius:6px;background:linear-gradient(135deg,#e6683c,#cc2366);color:#fff;font-size:13px;font-weight:700;text-decoration:none;">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
          Instagram
        </a>
      </div>
    </div>

    <?php
    $info = [
      ['📋','Presupuestos','Sin compromiso, precios finales sin sorpresas.'],
      ['✅','Garantía 6 meses','Todos nuestros servicios tienen garantía escrita.'],
      ['⚡','Respuesta en 24hs','Todas las consultas reciben respuesta rápida.'],
    ];
    foreach ($info as [$i,$t,$d]):
    ?>
    <div style="display:flex;gap:16px;padding:20px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;">
      <span style="font-size:22px;"><?= $i ?></span>
      <div>
        <p style="font-size:14px;font-weight:700;color:#fff;"><?= $t ?></p>
        <p style="font-size:12px;margin-top:4px;color:#9CA3AF;"><?= $d ?></p>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<?php include '_footer.php'; ?>
</body>
</html>
