<?php $title = 'Sobre Nosotros'; $page = ''; ?>
<?php include '_head.php'; ?>
<?php include '_nav.php'; ?>

<main style="min-height:100vh;background:#111;padding:100px 72px 80px;">

  <!-- ── Header ── -->
  <div style="padding-bottom:40px;border-bottom:1px solid #2A2A2A;margin-bottom:64px;">
    <div style="display:inline-flex;align-items:center;gap:8px;padding:5px 13px;border-radius:4px;background:rgba(192,0,0,0.12);border:1px solid rgba(192,0,0,0.3);margin-bottom:16px;">
      <div style="width:6px;height:6px;border-radius:50%;background:#C00000;"></div>
      <span style="font-size:11px;font-weight:700;text-transform:uppercase;letter-spacing:0.2em;color:#C00000;">Equipo SFX</span>
    </div>
    <h1 style="font-size:52px;font-weight:800;color:#fff;letter-spacing:-2px;line-height:1;margin-bottom:14px;">
      Sobre nosotros
    </h1>
    <p style="font-size:16px;color:#6B7280;max-width:480px;line-height:1.65;">
      Somos el equipo detrás de Torven. Cada uno con su especialidad, todos con el mismo objetivo.
    </p>
  </div>

  <!-- ── Grid del equipo ── -->
  <div style="display:grid;grid-template-columns:repeat(3,1fr);gap:20px;">
    <?php
    $equipo = [
      [
        'Kenichi Pino',
        'Frontend Developer',
        '#C00000',
        'KP',
        'Desarrollo de interfaces de usuario, componentes y experiencia visual del producto.',
      ],
      [
        'Santiago Fabbiano',
        'Frontend Developer',
        '#C00000',
        'SF',
        'Maquetado, estilos y lógica del lado del cliente. Colaboración estrecha en el diseño.',
      ],
      [
        'Gianluca Tartaglia',
        'Backend Developer',
        '#CA8A04',
        'GT',
        'Arquitectura del servidor, APIs y lógica de negocio. Asegura que todo funcione por detrás.',
      ],
      [
        'Luis Borges',
        'Base de datos',
        '#16A34A',
        'LB',
        'Diseño y administración de la base de datos. Modelado, consultas y rendimiento.',
      ],
      [
        'Thiago Capone',
        'Scrum Master',
        '#3B82F6',
        'TC',
        'Gestión del equipo bajo metodología ágil. Coordina sprints, elimina bloqueos y mantiene el ritmo.',
      ],
      [
        'Sr. Pantalones de Popo',
        'Consultor Estratégico',
        '#9CA3AF',
        'SP',
        'Visión de alto nivel. Aparece en los momentos clave y desaparece antes de que lleguen los problemas.',
      ],
    ];

    $acentos = [
      '#C00000' => 'rgba(192,0,0,0.12)',
      '#CA8A04' => 'rgba(202,138,4,0.12)',
      '#16A34A' => 'rgba(22,163,74,0.12)',
      '#3B82F6' => 'rgba(59,130,246,0.12)',
      '#9CA3AF' => 'rgba(156,163,175,0.12)',
    ];

    foreach ($equipo as [$nombre, $rol, $color, $initials, $desc]):
      $bgAccent = $acentos[$color] ?? 'rgba(192,0,0,0.12)';
    ?>
    <div style="background:#1A1A1A;border:1px solid #2A2A2A;border-radius:12px;overflow:hidden;display:flex;flex-direction:column;">

      <!-- Placeholder de foto -->
      <div style="position:relative;height:220px;background:#161616;display:flex;flex-direction:column;align-items:center;justify-content:center;gap:14px;border-bottom:1px solid #2A2A2A;">

        <!-- Inicial / avatar -->
        <div style="width:72px;height:72px;border-radius:50%;background:<?= $bgAccent ?>;border:2px solid <?= $color ?>;display:flex;align-items:center;justify-content:center;font-size:26px;font-weight:800;color:<?= $color ?>;">
          <?= $initials ?>
        </div>

        <!-- Texto placeholder -->
        <div style="display:flex;align-items:center;gap:7px;">
          <svg width="13" height="13" fill="none" viewBox="0 0 24 24" stroke="#2A2A2A" stroke-width="2">
            <rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><path d="M21 15l-5-5L5 21"/>
          </svg>
          <span style="font-size:11px;color:#2A2A2A;font-weight:600;letter-spacing:0.08em;">Foto pendiente</span>
        </div>

        <!-- Barra de color superior -->
        <div style="position:absolute;top:0;left:0;right:0;height:3px;background:<?= $color ?>;"></div>
      </div>

      <!-- Info -->
      <div style="padding:24px;flex:1;display:flex;flex-direction:column;gap:10px;">

        <!-- Rol badge -->
        <span style="display:inline-block;width:fit-content;font-size:11px;font-weight:700;padding:3px 10px;border-radius:4px;background:<?= $bgAccent ?>;color:<?= $color ?>;letter-spacing:0.06em;">
          <?= $rol ?>
        </span>

        <h3 style="font-size:20px;font-weight:800;color:#fff;letter-spacing:-0.3px;"><?= $nombre ?></h3>

        <p style="font-size:13px;color:#6B7280;line-height:1.65;flex:1;"><?= $desc ?></p>

      </div>
    </div>
    <?php endforeach; ?>
  </div>

</main>

<?php include '_footer.php'; ?>
</body>
</html>
