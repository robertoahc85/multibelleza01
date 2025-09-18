<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="Admiro admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Admiro admin template, best javascript admin, dashboard template, bootstrap admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">

    <title><?= htmlspecialchars($title ?? 'Codex', ENT_QUOTES, 'UTF-8') ?></title>

    <?php $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/'); ?>

    <!-- Favicon -->
    <link rel="icon" href="<?= $BASE_URL ?>/assets/images/favicon.png" type="image/png">
    <link rel="shortcut icon" href="<?= $BASE_URL ?>/assets/images/favicon.png" type="image/png">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:opsz,wght@6..12,200..1000&display=swap" rel="stylesheet">

    <!-- Vendors CSS -->
    <!-- Ajusta los nombres/rutas según tus archivos reales dentro de public/assets/css -->
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/vendors/flag-icon.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/iconly-icon.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/bulk-style.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/themify.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/fontawesome.min.css">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/vendors/weather-icons/weather-icons.min.css">

    <!-- App theme -->
    <link id="color" rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/color-1.css" media="screen">
    <link rel="stylesheet" href="<?= $BASE_URL ?>/assets/css/style.css">
  </head>

  <body>
    <header>
      <nav>
        <a href="<?= $BASE_URL ?>/">Home</a> |
        <a href="<?= $BASE_URL ?>/dashboard">Dashboard</a> |
        <a href="<?= $BASE_URL ?>/admin">Admin</a> |
        <?php if (!empty($_SESSION['user'])): ?>
          <?= htmlspecialchars($_SESSION['user']['name']) ?>
          (<?= htmlspecialchars($_SESSION['user']['role']) ?>) |
          <a href="<?= $BASE_URL ?>/logout">Salir</a>
        <?php else: ?>
          <a href="<?= $BASE_URL ?>/login">Login</a> |
          <a href="<?= $BASE_URL ?>/register">Registro</a>
        <?php endif; ?>
      </nav>
    </header>

    <hr>

    <main>
      <?= $content ?? '' ?>
    </main>

    <!-- JS Vendors (orden correcto) -->
    <script src="<?= $BASE_URL ?>/assets/js/vendors/jquery/jquery.min.js"></script>
    <script src="<?= $BASE_URL ?>/assets/js/vendors/bootstrap/dist/js/popper.min.js"></script>
    <script src="<?= $BASE_URL ?>/assets/js/vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <!-- FontAwesome (si usas el runtime JS) -->
    <script src="<?= $BASE_URL ?>/assets/js/vendors/font-awesome/fontawesome.min.js"></script>

    <!-- Utilidades -->
    <script src="<?= $BASE_URL ?>/assets/js/password.js"></script>
    <script src="<?= $BASE_URL ?>/assets/js/script.js"></script>
  </body>
</html>
