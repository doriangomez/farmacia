<?php

declare(strict_types=1);

namespace App\Models;

use App\Core\Database;
use PDOException;

final class InventoryModel
{
    public function criticalStock(): array
    {
        $db = Database::connection();

        try {
            return $db->query(
                'SELECT codigo, nombre, stock_actual, stock_minimo
                 FROM productos
                 WHERE stock_actual <= stock_minimo
                 ORDER BY stock_actual ASC'
            )->fetchAll();
        } catch (PDOException) {
            return [];
        }
    }

    public function expiringSoon(int $days = 60): array
    {
        $db = Database::connection();

        try {
            $stmt = $db->prepare(
                'SELECT p.nombre, l.lote_codigo, l.fecha_vencimiento, l.cantidad_disponible
                 FROM lotes l
                 INNER JOIN productos p ON p.id = l.producto_id
                 WHERE l.fecha_vencimiento BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL :dias DAY)
                 ORDER BY l.fecha_vencimiento ASC'
            );
            $stmt->bindValue(':dias', $days, \PDO::PARAM_INT);
            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException) {
            return [];
        }
    }
}
