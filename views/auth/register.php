<div class="card">
  <h1>Registro</h1>
  <?php if (!empty($error)): ?><div class="error"><?= htmlspecialchars($error) ?></div><?php endif; ?>
  <form method="post" action="/register">
    <div class="row">
      <label style="width:120px">Nombre</label>
      <input type="text" name="name" required>
    </div>
    <div class="row">
      <label style="width:120px">Email</label>
      <input type="email" name="email" required>
    </div>
    <div class="row">
      <label style="width:120px">Contraseña</label>
      <input type="password" name="password" required>
    </div>
    <div class="row">
      <label style="width:120px">Repite contraseña</label>
      <input type="password" name="password2" required>
    </div>
    <div style="margin-top:12px;">
      <button type="submit">Crear cuenta</button>
    </div>
  </form>
</div>
