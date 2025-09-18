<?php
declare(strict_types=1);

namespace Codex\Core;

abstract class Controller
{
    /**
     * Renderiza una vista con opción de ocultar el menú.
     * - $hideMenu=false por defecto (vista “privada” con menú si hay sesión)
     */
    protected function view(string $view, array $data = [], string $layout = 'layouts/main', bool $hideMenu = false): void
    {
        $data['hideMenu'] = $hideMenu;
        // También exponemos BASE_URL si lo quieres en las vistas:
        $data['BASE_URL'] = $this->baseUrl();
        View::render($view, $data, $layout);
    }

    /**
     * Atajo para vistas públicas (login, register, forgot, etc.) sin menú.
     */
    protected function viewGuest(string $view, array $data = [], string $layout = 'layouts/main'): void
    {
        $data['hideMenu'] = true;
        $data['BASE_URL'] = $this->baseUrl();
        View::render($view, $data, $layout);
    }

    /**
     * JSON helper
     */
    protected function json(mixed $data, int $status = 200): void
    {
        http_response_code($status);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
    }

    /**
     * Auth/roles
     */
    protected function requireAuth(): void
    {
        if (empty($_SESSION['user'])) {
            $this->redirect('/login');
        }
    }

    protected function requireRole(string $role): void
    {
        $this->requireAuth();
        if (($_SESSION['user']['role'] ?? 'user') !== $role) {
            http_response_code(403);
            echo "403 Prohibido";
            exit;
        }
    }

    /**
     * Navegación
     */
    protected function redirect(string $path): void
    {
        // Con baseUrl para soportar subcarpetas
        $target = $this->baseUrl() . $path;
        header('Location: ' . $target);
        exit;
    }

    protected function baseUrl(): string
    {
        return rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/');
    }
}
