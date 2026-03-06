<?php

declare(strict_types=1);

namespace App\Core;

final class View
{
    public static function render(string $view, array $data = []): void
    {
        $viewPath = __DIR__ . '/../Views/' . $view . '.php';

        if (!file_exists($viewPath)) {
            http_response_code(404);
            exit('Vista no encontrada');
        }

        extract($data, EXTR_SKIP);
        require __DIR__ . '/../Views/layouts/main.php';
    }
}
