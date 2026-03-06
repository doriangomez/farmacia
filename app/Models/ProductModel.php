<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDOException;

final class ProductModel
{
    public function all(int $limit = 30): array
    {
        $db = Database::connection();

        try {
            $stmt = $db->prepare(
                'SELECT p.codigo, p.nombre, p.principio_activo, c.nombre AS categoria, p.precio_venta, p.stock_actual, p.stock_minimo
                 FROM productos p
                 LEFT JOIN categorias c ON c.id = p.categoria_id
                 ORDER BY p.nombre ASC
                 LIMIT :limite'
            );
            $stmt->bindValue(':limite', $limit, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException) {
            return [];
        }
    }
}
