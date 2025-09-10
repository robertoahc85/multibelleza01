<div class="card">
  <h1>Dashboard</h1>
  <p>Hola, <?= htmlspecialchars($user['name'] ?? '') ?>. Tu rol es <strong><?= htmlspecialchars($user['role'] ?? '') ?></strong>.</p>
  <ul>
    <li>Área de usuario general.</li>
    <li><a href="/admin">Panel admin</a> (solo si eres admin).</li>
  </ul>
</div>
