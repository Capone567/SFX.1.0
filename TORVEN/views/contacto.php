<?php $title = 'Contacto'; $page = 'contacto.php'; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<!-- HEADER -->
<div style="background:#C00000;padding:128px 64px 48px;">
  <p style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;margin-bottom:8px;color:rgba(255,255,255,0.6);">Encontranos</p>
  <h1 style="font-size:52px;font-weight:800;color:#fff;">Contacto</h1>
  <p style="font-size:17px;margin-top:8px;color:rgba(255,255,255,0.75);">Av. Díaz Vélez 4130, CABA</p>
</div>

<!-- MAP + INFO -->
<div style="display:grid;grid-template-columns:1fr 320px;gap:32px;padding:32px 64px 0;">

  <!-- Map placeholder -->
  <div style="position:relative;border-radius:8px;overflow:hidden;height:360px;border:1px solid #2A2A2A;background:#222;">
    <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=1000&h=600&fit=crop&auto=format" alt="taller" style="width:100%;height:100%;object-fit:cover;opacity:0.35;">
    <div style="position:absolute;inset:0;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:12px;">
      <div style="width:48px;height:48px;border-radius:50%;background:#C00000;display:flex;align-items:center;justify-content:center;font-size:20px;">📍</div>
      <p style="font-size:15px;font-weight:700;color:#fff;">Av. Díaz Vélez 4130, CABA</p>
    </div>
  </div>

  <!-- Contact cards -->
  <div style="display:flex;flex-direction:column;gap:12px;">
    <div style="display:flex;justify-content:center;padding:16px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;">
      <img src="../imports/TORVEN_LOGO.png" alt="Torven" style="height:72px;width:auto;object-fit:contain;">
    </div>
    <?php
    $contacts = [['📍 Dirección','Av. Díaz Vélez 4130, CABA'],['📞 Teléfono','+54 11 4567-8900'],['✉️ Email','turnos@torven.com.ar']];
    foreach ($contacts as [$l,$v]):
    ?>
    <div style="padding:20px;border-radius:8px;background:#1A1A1A;border:1px solid #2A2A2A;">
      <p style="font-size:12px;color:#9CA3AF;"><?= $l ?></p>
      <p style="font-weight:700;margin-top:2px;color:#fff;"><?= $v ?></p>
    </div>
    <?php endforeach; ?>
    <div style="display:flex;gap:12px;">
      <a href="https://wa.me/5491145678900" target="_blank" style="flex:1;display:flex;align-items:center;justify-content:center;gap:8px;padding:12px;border-radius:6px;background:#25D366;color:#fff;font-size:13px;font-weight:700;text-decoration:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
        WhatsApp
      </a>
      <a href="https://instagram.com/torven.taller" target="_blank" style="flex:1;display:flex;align-items:center;justify-content:center;gap:8px;padding:12px;border-radius:6px;background:linear-gradient(135deg,#f09433,#e6683c,#cc2366);color:#fff;font-size:13px;font-weight:700;text-decoration:none;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
        Instagram
      </a>
    </div>
  </div>
</div>

<!-- HOURS TABLE -->
<div style="margin:32px 64px 0;border-radius:8px;overflow:hidden;border:1px solid #2A2A2A;">
  <div style="padding:20px 24px;background:#C00000;">
    <h3 style="font-weight:800;color:#fff;">Horarios de atención</h3>
  </div>
  <div style="display:grid;grid-template-columns:repeat(7,1fr);background:#1A1A1A;">
    <?php
    $hours = [['Lunes','07:30–18:00'],['Martes','07:30–18:00'],['Miércoles','07:30–18:00'],['Jueves','07:30–18:00'],['Viernes','07:30–17:00'],['Sábado','08:00–13:00'],['Domingo','Cerrado']];
    foreach ($hours as [$d,$h]):
    $closed = $h === 'Cerrado';
    ?>
    <div style="padding:20px 16px;text-align:center;border-right:1px solid #2A2A2A;">
      <p style="font-size:11px;font-weight:700;color:#9CA3AF;"><?= $d ?></p>
      <p style="font-size:13px;font-weight:700;margin-top:4px;color:<?= $closed?'#4B5563':'#fff' ?>;"><?= $h ?></p>
      <?php if (!$closed): ?>
      <div style="width:6px;height:6px;border-radius:50%;background:#16A34A;margin:8px auto 0;"></div>
      <?php endif; ?>
    </div>
    <?php endforeach; ?>
  </div>
</div>

<div style="padding-bottom:64px;"></div>

<?php include '_footer.php'; ?>
</body>
</html>
