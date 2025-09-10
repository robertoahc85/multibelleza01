<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title><?= htmlspecialchars($title ?? 'Codex', ENT_QUOTES, 'UTF-8') ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<header>
  <nav>
    <a href="/">Home</a> |
    <a href="/dashboard">Dashboard</a> |
    <a href="/admin">Admin</a> |
    <?php if (!empty($_SESSION['user'])): ?>
      <?= htmlspecialchars($_SESSION['user']['name']) ?> (<?= htmlspecialchars($_SESSION['user']['role']) ?>) |
      <a href="/logout">Salir</a>
    <?php else: ?>
      <a href="/login">Login</a> |
      <a href="/register">Registro</a>
    <?php endif; ?>
  </nav>
</header>
<hr>
<main>
  <?= $content ?? '' ?>
</main>
</body>
</html>
