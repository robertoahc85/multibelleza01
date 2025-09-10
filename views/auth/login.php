<div class="card">
  <h1>Iniciar sesión</h1>
  <?php if (!empty($error)): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <form method="post" action="/login">
    <div class="row">
      <label style="width:120px">Email</label>
      <input type="email" name="email" required>
    </div>
    <div class="row">
      <label style="width:120px">Contraseña</label>
      <input type="password" name="password" required>
    </div>
    <div style="margin-top:12px;">
      <button type="submit">Entrar</button>
    </div>
  </form>
</div>
