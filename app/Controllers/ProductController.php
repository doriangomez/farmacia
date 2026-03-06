<?php

declare(strict_types=1);

namespace App\Controllers;

use App\Core\Controller;
use App\Models\ProductModel;

final class ProductController extends Controller
{
    public function index(): void
    {
        $model = new ProductModel();
        $products = $model->all();

        $this->view('products/index', ['products' => $products]);
    }
}
