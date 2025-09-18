<!doctype html>
<html lang="es">
<?php
  // BASE_URL dinámico para assets/enlaces aunque la app viva en subcarpeta
  $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
  $loggedIn = !empty($_SESSION['user']);
  // Si el controlador/vista envía 'hideMenu' (p.ej. viewGuest), respétalo
  $hideMenu = !empty($hideMenu);
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Admiro admin es flexible, potente y moderno.">
  <meta name="keywords" content="admin template, dashboard, bootstrap 5">
  <meta name="author" content="pixelstrap">

  <title><?= htmlspecialchars($title ?? 'Codex', ENT_QUOTES, 'UTF-8') ?></title>

  <!-- Favicon -->
  <link rel="icon" href="<?= $BASE_URL ?>/assets/images/favicon.png" type="image/png">
  <link rel="shortcut icon" href="<?= $BASE_URL ?>/assets/images/favicon.png" type="image/png">

  <!-- Google font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@200;400;600;700;900&display=swap" rel="stylesheet">

  <!-- Vendors CSS (ajusta nombres si tus archivos reales difieren) -->
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/vendors/flag-icon.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/iconly-icon.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/bulk-style.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/themify.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/fontawesome.min.css">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/vendors/weather-icons/weather-icons.min.css">

  <!-- App CSS -->
  <link id="color" rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/color-1.css" media="screen">
  <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/style.css">
</head>

<body>

<?php if ($loggedIn && !$hideMenu): ?>
  <header>
    <nav>
      <a href="<?= $BASE_URL ?>/">Home</a> |
      <a href="<?= $BASE_URL ?>/dashboard">Dashboard</a> |
      <a href="<?= $BASE_URL ?>/admin">Admin</a> |
      <?= htmlspecialchars($_SESSION['user']['name']) ?> (<?= htmlspecialchars($_SESSION['user']['role']) ?>) |
      <a href="<?= $BASE_URL ?>/logout">Salir</a>
    </nav>
  </header>
  <hr>
<?php endif; ?>

<main>
  <?= $content ?? '' ?>
</main>

<!-- JS -->
<script src="<?= $BASE_URL ?>/assets/js/vendors/jquery/jquery.min.js"></script>

<!-- Usa EITHER bootstrap.bundle (incluye Popper) OR separa popper + bootstrap; aquí va bundle -->
<script src="<?= $BASE_URL ?>/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>

<!-- FontAwesome runtime si lo utilizas -->
<script src="<?= $BASE_URL ?>/assets/js/vendors/font-awesome/fontawesome.min.js"></script>

<!-- Utilidades -->
<script src="<?= $BASE_URL ?>/assets/js/password.js"></script>
<script src="<?= $BASE_URL ?>/assets/js/script.js"></script>
</body>
</html>
