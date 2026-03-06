<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\InventoryModel;

final class InventoryController extends Controller
{
    public function index(): void
    {
        $model = new InventoryModel();

        $this->view('inventory/index', [
            'criticalStock' => $model->criticalStock(),
            'expiringSoon' => $model->expiringSoon(),
        ]);
    }
}
