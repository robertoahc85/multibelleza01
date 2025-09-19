<?php
// views/dashboard/index.php
// Asegúrate que llegas aquí autenticado (requireAuth en el controlador)
@session_start();

/** Helpers */
function e(string $v): string { return htmlspecialchars($v, ENT_QUOTES, 'UTF-8'); }

// Resuelve una base robusta para assets y rutas relativas a la app
$base = $_SERVER['BASE_URI'] ?? dirname($_SERVER['SCRIPT_NAME'] ?? '/');
$base = rtrim($base, '/');
if ($base === '.' || $base === '\\' || $base === '') { $base = ''; } // fallback

function u(string $path) {
  global $base;
  $path = '/'.ltrim($path, '/');
  return ($base ? $base : '').$path;
}

$userName = e($_SESSION['user']['name'] ?? 'Usuario Actual');
$userRole = e($_SESSION['user']['role'] ?? 'Admin');

// Si quieres forzar login:
// if (empty($_SESSION['user'])) { header('Location: '.u('login')); exit; }
?>
<div class="page-wrapper compact-wrapper" id="pageWrapper">
  <header class="page-header row">
    <div class="logo-wrapper d-flex align-items-center col-auto"
         style="background-color:#ffffff; box-shadow:0 2px 6px rgba(0,0,0,0.1); padding:8px; border-radius:8px;">
      <a href="<?= u('dashboard') ?>">
        <img class="light-logo img-fluid" src="<?= u('assets/images/logo/multibellezalogo.png') ?>"
             alt="MultiBelleza" style="max-width:180px; height:80px;">
        <img class="dark-logo img-fluid" src="<?= u('assets/images/logo/multibellezalogo.png') ?>" alt="logo">
      </a>
      <a class="close-btn toggle-sidebar" href="javascript:void(0)" aria-label="Alternar menú lateral">
        <svg class="svg-color"><use href="<?= u('assets/svg/iconly-sprite.svg#Category') ?>"></use></svg>
      </a>
    </div>

    <div class="page-main-header col">
      <div class="header-left">
        <div class="form-group-header d-lg-block d-none">
          <div class="Typeahead Typeahead--twitterUsers">
            <div class="u-posRelative d-flex align-items-center">
              <input class="demo-input py-0 Typeahead-input form-control-plaintext w-100" type="text"
                     placeholder="Escribe para buscar..." name="q" title="">
              <i class="search-bg iconly-Search icli"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="nav-right">
        <ul class="header-right align-items-center mb-0">

          <!-- Botón de logout visible (GET). Si usas CSRF, cambia por form POST de abajo -->
          <!-- <li class="d-none d-md-inline-flex">
            <a class="d-inline-flex align-items-center text-danger" href="<?= u('logout') ?>">
              <svg class="svg-color" aria-hidden="true"><use href="<?= u('assets/svg/iconly-sprite.svg#Login') ?>"></use></svg>
              <span class="ms-2">Cerrar sesión</span>
            </a>
          </li> -->

          <!-- Menú de usuario (Bootstrap dropdown-compatible) -->
          <li class="nav-item dropdown">
            <a class="nav-link d-flex align-items-center gap-2 dropdown-toggle"
               href="#" id="userMenu" role="button"
               data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false" aria-haspopup="true">
              <img src="<?= u('assets/images/profile.png') ?>" alt="user"
                   style="width:36px;height:36px;border-radius:50%;">
              <span class="text-start d-none d-sm-inline">
                <strong><?= $userName ?></strong><br>
                <small class="text-muted"><?= $userRole ?></small>
              </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
              <li>
                <a class="dropdown-item d-flex align-items-center" href="<?= u('users') ?>">
                  <svg class="me-2 svg-color" style="width:18px;height:18px;">
                    <use href="<?= u('assets/svg/iconly-sprite.svg#Profile') ?>"></use>
                  </svg>
                  Cuenta
                </a>
              </li>
              <li><hr class="dropdown-divider"></li>

              <!-- Opción A: GET simple -->
              <li>
                <a class="dropdown-item d-flex align-items-center text-danger" href="<?= u('logout') ?>">
                  <svg class="me-2 svg-color" style="width:18px;height:18px;">
                    <use href="<?= u('assets/svg/iconly-sprite.svg#Login') ?>"></use>
                  </svg>
                  Cerrar sesión
                </a>
              </li>

              <?php /* 
              // Opción B: POST con CSRF (recomendado)
              <li>
                <form method="post" action="<?= u('logout') ?>" class="px-3">
                  <input type="hidden" name="csrf_token" value="<?= e($_SESSION['csrf'] ?? '') ?>">
                  <button type="submit" class="dropdown-item d-flex align-items-center text-danger">
                    <svg class="me-2 svg-color" style="width:18px;height:18px;">
                      <use href="<?= u('assets/svg/iconly-sprite.svg#Login') ?>"></use>
                    </svg>
                    Cerrar sesión
                  </button>
                </form>
              </li>
              */ ?>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </header>

  <div class="page-body-wrapper">
    <!-- Sidebar -->
    <aside class="page-sidebar">
      <div class="main-sidebar" id="main-sidebar">
        <ul class="sidebar-menu" id="simple-bar">

          <li class="sidebar-main-title">
            <div><h5 class="f-w-700 sidebar-title pt-3">Administración del Sitio</h5></div>
          </li>

          <li class="sidebar-list">
            <a class="sidebar-link" href="javascript:void(0)">
              <svg class="stroke-icon"><use href="<?= u('assets/svg/iconly-sprite.svg#web') ?>"></use></svg>
              <h6>Autenticación y Autorización</h6><i class="iconly-Arrow-Right-2 icli"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="<?= u('admin') ?>">Grupos</a></li>
              <li><a href="<?= u('users') ?>">Usuarios</a></li>
            </ul>
          </li>

          <li class="sidebar-list">
            <a class="sidebar-link" href="javascript:void(0)">
              <svg class="stroke-icon"><use href="<?= u('assets/svg/iconly-sprite.svg#Tags') ?>"></use></svg>
              <h6>Marcas</h6><i class="iconly-Arrow-Right-2 icli"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="#" data-page="pages/marcas.html">Marcas</a></li>
              <li><a href="#" data-page="pages/agregar_marca.html">Agregar Marca</a></li>
            </ul>
          </li>

          <li class="sidebar-list">
            <a class="sidebar-link" href="javascript:void(0)">
              <svg class="stroke-icon"><use href="<?= u('assets/svg/iconly-sprite.svg#Category') ?>"></use></svg>
              <h6>Categorías</h6><i class="iconly-Arrow-Right-2 icli"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="#" data-page="pages/categorias.html">Categorías</a></li>
            </ul>
          </li>

          <!-- Más items... -->
        </ul>
      </div>
    </aside>
    <!-- /Sidebar -->

    <!-- Contenido -->
    <main id="content-area" class="p-4">
      <h2 class="mb-3">Bienvenido, <?= $userName ?></h2>
      <p class="text-muted">Selecciona una opción del menú para empezar.</p>

      <div class="row g-3">
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Resumen</h5>
              <p class="mb-0 text-muted">KPI / gráficas / últimos movimientos…</p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100">
            <div class="card-body">
              <h5 class="card-title">Actividad reciente</h5>
              <p class="mb-0 text-muted">Notificaciones o timeline.</p>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- /Contenido -->

    <footer class="footer">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-6"><p class="mb-0">© <?= date('Y') ?> MultiBelleza</p></div>
          <div class="col-md-6">
            <p class="float-end mb-0">Hecho con
              <svg class="svg-color footer-icon">
                <use href="<?= u('assets/svg/iconly-sprite.svg#heart') ?>"></use>
              </svg>
            </p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>

<!-- JS del dashboard -->
<script src="<?= u('assets/js/sidebar.js') ?>"></script>
<script src<?= '="'.u('assets/js/scrollbar/simplebar.js').'"' ?>></script>
<script src="<?= u('assets/js/scrollbar/custom.js') ?>"></script>
<script src="<?= u('assets/js/slick/slick.min.js') ?>"></script>
<script src="<?= u('assets/js/slick/slick.js') ?>"></script>
<script src="<?= u('assets/js/fetch-pages.js') ?>"></script>
