<div class="card">
  <h1><?= htmlspecialchars($title ?? 'Home', ENT_QUOTES, 'UTF-8') ?></h1>
  <p><?= htmlspecialchars($message ?? '', ENT_QUOTES, 'UTF-8') ?></p>
</div>
