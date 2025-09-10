<?php
declare(strict_types=1);

namespace Codex\Core;

final class View
{
    public static function render(string $view, array $data = [], string $layout = 'layouts/main'): void
    {
        $viewFile   = __DIR__ . '/../../views/' . $view . '.php';
        $layoutFile = __DIR__ . '/../../views/' . $layout . '.php';

        if (!is_file($viewFile)) {
            http_response_code(500);
            echo "View not found: {$view}";
            return;
        }

        extract($data, EXTR_OVERWRITE);
        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        if (is_file($layoutFile)) {
            require $layoutFile;
        } else {
            echo $content;
        }
    }
}
