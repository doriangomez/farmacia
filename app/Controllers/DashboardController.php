<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\DashboardModel;

final class DashboardController extends Controller
{
    public function index(): void
    {
        $model = new DashboardModel();

        $this->view('dashboard/index', [
            'metrics' => $model->metrics(),
            'sales7Days' => $model->salesLast7Days(),
            'topProducts' => $model->topProducts(),
            'salesByCategory' => $model->salesByCategory(),
        ]);
    }
}
