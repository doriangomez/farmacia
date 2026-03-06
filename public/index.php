<?php

declare(strict_types=1);

use App\Controllers\DashboardController;
use App\Controllers\InventoryController;
use App\Controllers\ProductController;
use App\Core\Router;

spl_autoload_register(static function (string $class): void {
    $prefix = 'App\\';
    if (!str_starts_with($class, $prefix)) {
        return;
    }

    $relativeClass = substr($class, strlen($prefix));
    $path = __DIR__ . '/../app/' . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($path)) {
        require $path;
    }
});

$router = new Router();
$router->get('/', static fn () => (new DashboardController())->index());
$router->get('/productos', static fn () => (new ProductController())->index());
$router->get('/inventario', static fn () => (new InventoryController())->index());

$basePath = dirname($_SERVER['SCRIPT_NAME'] ?? '');
$basePath = $basePath === '.' ? '' : str_replace('\\', '/', $basePath);

$router->dispatch(
    $_SERVER['REQUEST_METHOD'] ?? 'GET',
    $_SERVER['REQUEST_URI'] ?? '/',
    $basePath
);
