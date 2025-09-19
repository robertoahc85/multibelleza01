<?php
// views/dashboard/index.php
// Asegúrate que llegas aquí autenticado (requireAuth en el controlador)
$BASE_URL = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
$userName = htmlspecialchars($_SESSION['user']['name'] ?? 'Usuario Actual', ENT_QUOTES, 'UTF-8');
$userRole = htmlspecialchars($_SESSION['user']['role'] ?? 'Admin', ENT_QUOTES, 'UTF-8');
?>
<div class="page-wrapper compact-wrapper" id="pageWrapper">
  <header class="page-header row">
    <div class="logo-wrapper d-flex align-items-center col-auto"
         style="background-color:#ffffff; box-shadow:0 2px 6px rgba(0,0,0,0.1); padding:8px; border-radius:8px;">
      <a href="<?= $BASE_URL ?>/dashboard">
        <img class="light-logo img-fluid" src="<?= $BASE_URL ?>/assets/images/logo/multibellezalogo.png"
             alt="MultiBelleza" style="max-width:180px; height:80px;">
        <img class="dark-logo img-fluid" src="<?= $BASE_URL ?>/assets/images/logo/multibellezalogo.png" alt="logo">
      </a>
      <a class="close-btn toggle-sidebar" href="javascript:void(0)">
        <svg class="svg-color"><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#Category"></use></svg>
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
        <ul class="header-right">
          <li class="search d-lg-none d-flex">
            <a href="javascript:void(0)">
              <svg><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#Search"></use></svg>
            </a>
          </li>
          <li> <a class="dark-mode" href="javascript:void(0)">
              <svg><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#moondark"></use></svg>
            </a>
          </li>
          <li class="profile-nav custom-dropdown">
            <div class="user-wrap">
              <div class="user-img"><img src="<?= $BASE_URL ?>/assets/images/profile.png" alt="user"></div>
              <div class="user-content">
                <h6><?= $userName ?></h6>
                <p class="mb-0"><?= $userRole ?><i class="fa-solid fa-chevron-down ms-1"></i></p>
              </div>
            </div>
            <div class="custom-menu overflow-hidden">
              <ul class="profile-body">
                <li class="d-flex">
                  <svg class="svg-color"><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#Profile"></use></svg>
                  <a class="ms-2" href="<?= $BASE_URL ?>/users">Cuenta</a>
                </li>
                <li class="d-flex">
                  <svg class="svg-color"><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#Login"></use></svg>
                  <a class="ms-2" href="<?= $BASE_URL ?>/logout">Cerrar sesión</a>
                </li>
              </ul>
            </div>
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
              <svg class="stroke-icon"><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#web"></use></svg>
              <h6>Autenticación y Autorización</h6><i class="iconly-Arrow-Right-2 icli"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="<?= $BASE_URL ?>/admin">Grupos</a></li>
              <li><a href="<?= $BASE_URL ?>/users">Usuarios</a></li>
            </ul>
          </li>

          <li class="sidebar-list">
            <a class="sidebar-link" href="javascript:void(0)">
              <svg class="stroke-icon"><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#Tags"></use></svg>
              <h6>Marcas</h6><i class="iconly-Arrow-Right-2 icli"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="#" data-page="pages/marcas.html">Marcas</a></li>
              <li><a href="#" data-page="pages/agregar_marca.html">Agregar Marca</a></li>
            </ul>
          </li>

          <li class="sidebar-list">
            <a class="sidebar-link" href="javascript:void(0)">
              <svg class="stroke-icon"><use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#Category"></use></svg>
              <h6>Categorías</h6><i class="iconly-Arrow-Right-2 icli"></i>
            </a>
            <ul class="sidebar-submenu">
              <li><a href="#" data-page="pages/categorias.html">Categorías</a></li>
            </ul>
          </li>

          <!-- Añade más items igual que en tu HTML de referencia -->

        </ul>
      </div>
    </aside>
    <!-- /Sidebar -->

    <!-- Contenido -->
    <main id="content-area" class="p-4">
      <h2 class="mb-3">Bienvenido, <?= $userName ?></h2>
      <p class="text-muted">Selecciona una opción del menú para empezar.</p>

      <!-- Aquí puedes añadir cards/widgets del dashboard -->
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
                <use href="<?= $BASE_URL ?>/assets/svg/iconly-sprite.svg#heart"></use>
              </svg>
            </p>
          </div>
        </div>
      </div>
    </footer>
  </div>
</div>

<!-- JS específicos del dashboard (usa BASE_URL, no ../) -->
<script src="<?= $BASE_URL ?>/assets/js/sidebar.js"></script>
<script src="<?= $BASE_URL ?>/assets/js/scrollbar/simplebar.js"></script>
<script src="<?= $BASE_URL ?>/assets/js/scrollbar/custom.js"></script>
<script src="<?= $BASE_URL ?>/assets/js/slick/slick.min.js"></script>
<script src="<?= $BASE_URL ?>/assets/js/slick/slick.js"></script>
<script src="<?= $BASE_URL ?>/assets/js/fetch-pages.js"></script>
