<?php $BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/'); ?>
<?php $hideMenu = true; // fuerza ocultar menú desde la vista por si acaso ?>

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

      <form class="theme-form" method="post" action="<?= $BASE_URL ?>/login" novalidate>
        <h2 class="text-center">Iniciar sesión</h2>
        <p class="text-center">Introduce tu email y contraseña para acceder</p>

        <?php if (!empty($error)): ?>
          <div class="error text-center text-danger mb-3" role="alert" aria-live="assertive">
            <?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?>
          </div>
        <?php endif; ?>

        <div class="form-group">
          <label class="col-form-label" for="email">Dirección Email</label>
          <input id="email" class="form-control" type="email" name="email" required
                 placeholder="tucorreo@gmail.com" autocomplete="email"
                 value="<?= htmlspecialchars($_POST['email'] ?? '', ENT_QUOTES, 'UTF-8') ?>">
        </div>

        <div class="form-group">
          <label class="col-form-label" for="password">Contraseña</label>
          <div class="form-input position-relative">
            <input id="password" class="form-control" type="password" name="password" required
                   placeholder="*********" autocomplete="current-password">
            <div class="show-hide" aria-hidden="true"><span class="show"></span></div>
          </div>
          <small class="form-text text-muted">No compartas tu contraseña.</small>
        </div>

        <div class="form-group mb-0 checkbox-checked d-flex align-items-center justify-content-between">
          <div class="form-check checkbox-solid-info">
            <input class="form-check-input" id="remember" type="checkbox" name="remember" <?= !empty($_POST['remember']) ? 'checked' : '' ?>>
            <label class="form-check-label" for="remember">Recordar sesión</label>
          </div>
          <a class="link" href="<?= $BASE_URL ?>/forget-password">¿Olvidaste tu contraseña?</a>
        </div>

        <div class="text-end mt-3">
          <button class="btn btn-primary btn-block w-100" type="submit">Entrar</button>
        </div>

        <!-- <div class="login-social-title mt-4"><h6>O inicia sesión con</h6></div>
        <div class="form-group">
          <ul class="login-social">
            <li><a href="https://www.linkedin.com" target="_blank" rel="noopener"><i class="icon-linkedin"></i><span class="sr-only">LinkedIn</span></a></li>
            <li><a href="https://twitter.com" target="_blank" rel="noopener"><i class="icon-twitter"></i><span class="sr-only">Twitter/X</span></a></li>
            <li><a href="https://www.facebook.com" target="_blank" rel="noopener"><i class="icon-facebook"></i><span class="sr-only">Facebook</span></a></li>
            <li><a href="https://www.instagram.com" target="_blank" rel="noopener"><i class="icon-instagram"></i><span class="sr-only">Instagram</span></a></li>
          </ul>
        </div> -->

        <p class="mt-4 mb-0 text-center">
          ¿Aún no tienes una cuenta?
          <a class="ms-2" href="<?= $BASE_URL ?>/register">Crear cuenta</a>
        </p>
      </form>

    </div>
  </div>
</div>
