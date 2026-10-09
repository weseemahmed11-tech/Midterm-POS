<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\ProductModel;
use App\Models\SaleModel;
use App\Models\UserModel;

class Pages extends BaseController
{
    public function index(): string
    {
        $productModel = new ProductModel();
        $products = $productModel->where('archived_at', null)->orderBy('name')->findAll();

        return view('partials/header', ['title' => 'Home'])
            . view('pages/home', [
                'stats' => [
                    'products' => $productModel->where('archived_at', null)->countAllResults(),
                    'customers' => (new CustomerModel())->countAll(),
                    'staff' => (new UserModel())->countAll(),
                    'sales' => (new SaleModel())->countAll(),
                ],
                'products' => array_slice($products, 0, 6),
            ])
            . view('partials/footer');
    }

    public function about(): string
    {
        return view('partials/header', ['title' => 'About'])
            . view('pages/about')
            . view('partials/footer');
    }
}
