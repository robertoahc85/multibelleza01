<?php
declare(strict_types=1);

namespace Codex\Core;

final class Router
{
    private array $routes = [
        'GET'  => [],
        'POST' => [],
        'PUT'  => [],
        'PATCH'=> [],
        'DELETE'=> []
    ];

    public function get(string $path, array $handler): void  { $this->routes['GET'][$this->n($path)] = $handler; }
    public function post(string $path, array $handler): void { $this->routes['POST'][$this->n($path)] = $handler; }

    public function dispatch(string $method, string $path): void
    {
        $path = $this->n($path);
        $handler = $this->routes[$method][$path] ?? null;

        if (!$handler) {
            http_response_code(404);
            echo "404 Not Found: {$method} {$path}";
            return;
        }

        [$class, $action] = $handler;

        if (!class_exists($class)) {
            http_response_code(500);
            echo "Handler class not found: {$class}";
            return;
        }
        if (!method_exists($class, $action)) {
            http_response_code(500);
            echo "Handler method not found: {$class}::{$action}";
            return;
        }

        (new $class())->{$action}();
    }

    private function n(string $path): string
    {
        $path = rtrim($path, '/');
        return $path === '' ? '/' : $path;
    }
}
