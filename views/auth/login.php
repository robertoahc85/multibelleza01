<!-- tap on top starts-->
<div class="tap-top"><i class="iconly-Arrow-Up icli"></i></div>
<!-- tap on tap ends-->

<!-- loader-->
<div class="loader-wrapper">
  <div class="loader"><span></span><span></span><span></span><span></span><span></span></div>
</div>

<!-- login page start-->
<div class="container-fluid p-0">
  <div class="row m-0">
    <div class="col-12 p-0">    
      <div class="login-card login-dark"> <!-- 1920 x 927 -->
        <div>
          <!-- <div><a class="logo" href="index.html"><img class="img-fluid for-light m-auto" src="../assets/images/logo/avyna-logo-light.png" alt="looginpage"><img class="img-fluid for-dark" src="../assets/images/logo/avyna-logo-light.png" alt="logo"></a></div> -->
          <div class="login-main"> 
            
            <form class="theme-form" method="post" action="/login">
              <h2 class="text-center">Iniciar sesión</h2>
              <p class="text-center">Introduce tu email y contraseña para acceder</p>
              
              <?php if (!empty($error)): ?>
                <div class="error text-center text-danger mb-3">
                  <?= htmlspecialchars($error) ?>
                </div>
              <?php endif; ?>

              <div class="form-group">
                <label class="col-form-label">Dirección Email</label>
                <input class="form-control" type="email" name="email" required placeholder="TuCorreo@gmail.com">
              </div>

              <div class="form-group">
                <label class="col-form-label">Contraseña</label>
                <div class="form-input position-relative">
                  <input class="form-control" type="password" name="password" required placeholder="*********">
                  <div class="show-hide"><span class="show"></span></div>
                </div>
              </div>

              <div class="form-group mb-0 checkbox-checked">
                <div class="form-check checkbox-solid-info">
                  <input class="form-check-input" id="solid6" type="checkbox">
                  <label class="form-check-label" for="solid6">Recordar contraseña</label>
                </div>
                <a class="link" href="forget-password.html">¿Olvidaste tu contraseña?</a>
                <div class="text-end mt-3">
                  <button class="btn btn-primary btn-block w-100" type="submit">Entrar</button>
                </div>
              </div>

              <div class="login-social-title">
                <h6>O inicia sesión con</h6>
              </div>
              <div class="form-group">
                <ul class="login-social">
                  <li><a href="https://www.linkedin.com" target="_blank"><i class="icon-linkedin"></i></a></li>
                  <li><a href="https://twitter.com" target="_blank"><i class="icon-twitter"></i></a></li>
                  <li><a href="https://www.facebook.com" target="_blank"><i class="icon-facebook"></i></a></li>
                  <li><a href="https://www.instagram.com" target="_blank"><i class="icon-instagram"></i></a></li>
                </ul>
              </div>

              <p class="mt-4 mb-0 text-center">
                ¿Aún no tienes una cuenta?
                <a class="ms-2" href="sign-up.html">Crear cuenta</a>
              </p>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
