<?php
declare(strict_types=1);

namespace Codex\Core;

abstract class Controller
{
    protected function view(string $view, array $data = [], string $layout = 'layouts/main'): void
    {
        View::render($view, $data, $layout);
    }

    protected function requireAuth(): void
    {
        if (empty($_SESSION['user'])) {
            header('Location: /login'); exit;
        }
    }

    protected function requireRole(string $role): void
    {
        $this->requireAuth();
        if (($_SESSION['user']['role'] ?? 'user') !== $role) {
            http_response_code(403);
            echo "403 Prohibido"; exit;
        }
    }
}
