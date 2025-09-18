<?php $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/'); ?>
<?php $hideMenu = true; // oculta menú aquí también ?>

<div class="auth-wrapper min-vh-100 d-flex align-items-center justify-content-center py-5" style="background: #ffc0d5;">
  <div class="login-card login-dark w-100" style="max-width:520px;">
    <div class="login-main">

      <!-- Logo centrado -->
      <div class="text-center mb-4">
        <a href="<?= $BASE_URL ?>/" class="logo d-inline-block">
          <img
            src="<?= $BASE_URL ?>/assets/images/logo/multibellezalogo.png"
            alt="MultiBelleza"
            class="img-fluid"
            style="max-height:90px;">
        </a>
      </div>

      <form class="theme-form" method="post" action="<?= $BASE_URL ?>/register" novalidate>
        <h2 class="text-center">Registro</h2>
        <p class="text-center">Completa los datos para crear tu cuenta</p>

        <?php if (!empty($error)): ?>
          <div class="error text-center text-danger mb-3" role="alert">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
          </div>
        <?php endif; ?>

        <div class="form-group">
          <label class="col-form-label" for="name">Nombre</label>
          <input id="name" class="form-control" type="text" name="name" required
                 placeholder="Tu nombre completo"
                 value="<?= htmlspecialchars($old['name'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
          <label class="col-form-label" for="email">Email</label>
          <input id="email" class="form-control" type="email" name="email" required
                 placeholder="tucorreo@gmail.com"
                 value="<?= htmlspecialchars($old['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
          <label class="col-form-label" for="password">Contraseña</label>
          <div class="form-input position-relative">
            <input id="password" class="form-control" type="password" name="password" required
                   placeholder="*********" autocomplete="new-password">
            <div class="show-hide" aria-hidden="true"><span class="show"></span></div>
          </div>
        </div>

        <div class="form-group">
          <label class="col-form-label" for="password2">Repite contraseña</label>
          <div class="form-input position-relative">
            <input id="password2" class="form-control" type="password" name="password2" required
                   placeholder="*********" autocomplete="new-password">
            <div class="show-hide" aria-hidden="true"><span class="show"></span></div>
          </div>
        </div>

        <div class="text-end mt-3">
          <button class="btn btn-primary btn-block w-100" type="submit">Crear cuenta</button>
        </div>

        <p class="mt-4 mb-0 text-center">
          ¿Ya tienes una cuenta?
          <a class="ms-2" href="<?= $BASE_URL ?>/login">Inicia sesión</a>
        </p>
      </form>

    </div>
  </div>
</div>
