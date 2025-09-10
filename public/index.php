<?php
declare(strict_types=1);

error_reporting(E_ALL);
ini_set('display_errors', '1');
session_start();

// === AUTOLOADER SIMPLE SIN COMPOSER ===
spl_autoload_register(function (string $class) {
    $prefix  = 'Codex\\';                 // <— nuestro namespace base
    $baseDir = __DIR__ . '/../src/';      // <— raíz del código

    // si la clase no empieza con Codex\, no hacemos nada
    if (strncmp($class, $prefix, strlen($prefix)) !== 0) return;

    // convierte Codex\Controllers\HomeController -> Controllers/HomeController.php
    $relative = substr($class, strlen($prefix));
    $file = $baseDir . str_replace('\\', '/', $relative) . '.php';

    if (is_file($file)) {
        require $file;
    }
});

// DB
require_once __DIR__ . '/../config/db.php';

use Codex\Core\Router;
use Codex\Controllers\HomeController;
use Codex\Controllers\AuthController;
use Codex\Controllers\UserController;
use Codex\Controllers\DashboardController;
use Codex\Controllers\AdminController;

$router = new Router();

$router->get('/', [HomeController::class, 'index']);
$router->get('/login', [AuthController::class, 'showLogin']);
$router->post('/login', [AuthController::class, 'login']);
$router->get('/register', [AuthController::class, 'showRegister']);
$router->post('/register', [AuthController::class, 'register']);
$router->get('/logout', [AuthController::class, 'logout']);
$router->get('/dashboard', [DashboardController::class, 'index']);
$router->get('/admin', [AdminController::class, 'index']);
$router->get('/users', [UserController::class, 'index']);

$router->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
