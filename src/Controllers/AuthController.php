<?php
declare(strict_types=1);

namespace Codex\Controllers;

use Codex\Core\Controller;
use Codex\Models\User;

final class AuthController extends Controller
{
    /** Página de login (oculta menú) */
    public function showLogin(): void
    {
        $this->viewGuest('auth/login', [
            'title' => 'Iniciar sesión',
        ]);
    }

    /** POST /login */
    public function login(): void
    {
        $email = trim($_POST['email'] ?? '');
        $pass  = trim($_POST['password'] ?? '');

        if ($email === '' || $pass === '') {
            $this->viewGuest('auth/login', [
                'title' => 'Iniciar sesión',
                'error' => 'Completa todos los campos.',
                'old'   => ['email' => $email],
            ]);
            return;
        }

        $user = User::findByEmail($email);
        if (!$user || !password_verify($pass, $user['password_hash'])) {
            $this->viewGuest('auth/login', [
                'title' => 'Iniciar sesión',
                'error' => 'Credenciales inválidas.',
                'old'   => ['email' => $email],
            ]);
            return;
        }

        // Login OK
        $_SESSION['user'] = [
            'id'    => (int)$user['id'],
            'name'  => $user['name'],
            'email' => $user['email'],
            'role'  => $user['role'],
        ];

        // Si marcó "Recordar sesión", puedes setear una cookie aquí (opcional)
        // if (!empty($_POST['remember'])) { ... }

        $this->redirect('/dashboard');
    }

    /** Página de registro (oculta menú) */
    public function showRegister(): void
    {
        $this->viewGuest('auth/register', [
            'title' => 'Registro',
        ]);
    }

    /** POST /register */
    public function register(): void
    {
        $name  = trim($_POST['name'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $pass  = trim($_POST['password'] ?? '');
        $pass2 = trim($_POST['password2'] ?? '');

        if ($name === '' || $email === '' || $pass === '' || $pass2 === '') {
            $this->viewGuest('auth/register', [
                'title' => 'Registro',
                'error' => 'Completa todos los campos.',
                'old'   => compact('name','email'),
            ]);
            return;
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->viewGuest('auth/register', [
                'title' => 'Registro',
                'error' => 'Email inválido.',
                'old'   => compact('name','email'),
            ]);
            return;
        }
        if ($pass !== $pass2) {
            $this->viewGuest('auth/register', [
                'title' => 'Registro',
                'error' => 'Las contraseñas no coinciden.',
                'old'   => compact('name','email'),
            ]);
            return;
        }
        if (User::findByEmail($email)) {
            $this->viewGuest('auth/register', [
                'title' => 'Registro',
                'error' => 'El email ya está registrado.',
                'old'   => compact('name','email'),
            ]);
            return;
        }

        $id = User::create($name, $email, $pass, 'user'); // asume que hace hash internamente
        $_SESSION['user'] = ['id'=>$id,'name'=>$name,'email'=>$email,'role'=>'user'];

        $this->redirect('/dashboard');
    }

    /** GET /logout */
    public function logout(): void
    {
        $_SESSION = [];
        if (ini_get('session.use_cookies')) {
            $p = session_get_cookie_params();
            setcookie(session_name(), '', time()-42000, $p['path'], $p['domain'], $p['secure'], $p['httponly']);
        }
        session_destroy();
        $this->redirect('/login');
    }
}
