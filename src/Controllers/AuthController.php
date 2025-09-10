<?php
declare(strict_types=1);

namespace Codex\Controllers;

use Codex\Core\Controller;
use Codex\Models\User;

final class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('auth/login', ['title' => 'Iniciar sesión']);
    }

    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $pass  = trim($_POST['password'] ?? '');

        if ($email === '' || $pass === '') {
            $this->view('auth/login', ['title'=>'Iniciar sesión','error'=>'Completa todos los campos.']);
            return;
        }

        $user = User::findByEmail($email);
        if (!$user || !password_verify($pass, $user['password_hash'])) {
            $this->view('auth/login', ['title'=>'Iniciar sesión','error'=>'Credenciales inválidas.']);
            return;
        }

        $_SESSION['user'] = [
            'id'    => (int)$user['id'],
            'name'  => $user['name'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ];
        header('Location: /dashboard');
        exit;
    }

    public function showRegister(): void
    {
        $this->view('auth/register', ['title' => 'Registro']);
    }

    public function register(): void
    {
        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass  = trim($_POST['password'] ?? '');
        $pass2 = trim($_POST['password2'] ?? '');

        if ($name === '' || $email === '' || $pass === '' || $pass2 === '') {
            $this->view('auth/register', ['title'=>'Registro','error'=>'Completa todos los campos.']);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->view('auth/register', ['title'=>'Registro','error'=>'Email inválido.']);
            return;
        }
        if ($pass !== $pass2) {
            $this->view('auth/register', ['title'=>'Registro','error'=>'Las contraseñas no coinciden.']);
            return;
        }
        if (User::findByEmail($email)) {
            $this->view('auth/register', ['title'=>'Registro','error'=>'El email ya está registrado.']);
            return;
        }

        $id = User::create($name, $email, $pass, 'user');
        $_SESSION['user'] = ['id'=>$id,'name'=>$name,'email'=>$email,'role'=>'user'];
        header('Location: /dashboard'); exit;
    }

    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time()-42000, $p['path'],$p['domain'],$p['secure'],$p['httponly']);
        }
        session_destroy();
        header('Location: /login'); exit;
    }
}
