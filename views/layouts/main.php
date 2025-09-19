<!doctype html>
<html lang="es">
<?php
  // BASE_URL dinámico para assets/enlaces aunque la app viva en subcarpeta
  $BASE_URL  = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
  // Si alguna vista (login/register) necesita ocultar elementos extra, puede pasar $hideMenu
  $hideMenu  = !empty($hideMenu);
  $titleSafe = htmlspecialchars($title ?? 'Codex', ENT_QUOTES, 'UTF-8');
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Admiro admin es flexible, potente y moderno.">
  <meta name="keywords" content="admin template, dashboard, bootstrap 5">
  <meta name="author" content="pixelstrap">
  <title><?= $titleSafe ?></title>

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
  <!-- IMPORTANTE: sin header/nav aquí para no duplicar con el template del dashboard -->
  <main>
    <?= $content ?? '' ?>
  </main>

  <!-- JS globales -->
  <script src="<?= $BASE_URL ?>/assets/js/vendors/jquery/jquery.min.js"></script>
  <script src="<?= $BASE_URL ?>/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js" defer></script>
  <script src="<?= $BASE_URL ?>/assets/js/vendors/font-awesome/fontawesome.min.js"></script>
  <script src="<?= $BASE_URL ?>/assets/js/password.js"></script>
  <script src="<?= $BASE_URL ?>/assets/js/script.js"></script>
</body>
</html>
