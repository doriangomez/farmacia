<?php

declare(strict_types=1);

namespace App\Core;

final class Router
{
    /** @var array<string, callable> */
    private array $routes = [];

    public function get(string $path, callable $handler): void
    {
        $this->routes['GET:' . $this->normalizePath($path)] = $handler;
    }

    public function dispatch(string $method, string $uri, string $basePath = ''): void
    {
        $path = parse_url($uri, PHP_URL_PATH) ?: '/';
        $basePath = $this->normalizeBasePath($basePath);

        if ($basePath !== '' && str_starts_with($path, $basePath)) {
            $path = substr($path, strlen($basePath));
            $path = $path === '' ? '/' : $path;
        }

        $key = strtoupper($method) . ':' . $this->normalizePath($path);

        if (!isset($this->routes[$key])) {
            http_response_code(404);
            echo 'Ruta no encontrada';
            return;
        }

        ($this->routes[$key])();
    }

    private function normalizePath(string $path): string
    {
        if ($path === '/' || $path === '') {
            return '/';
        }

        return '/' . trim($path, '/');
    }

    private function normalizeBasePath(string $basePath): string
    {
        if ($basePath === '' || $basePath === '/' || $basePath === '.') {
            return '';
        }

        return '/' . trim($basePath, '/');
    }
}
