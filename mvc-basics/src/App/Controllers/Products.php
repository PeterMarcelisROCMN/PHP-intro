<?php

namespace App\Controllers;

use App\Models\Product;

// controllers are plural while models are singular
class Products {
    public function index(){

        $model = new Product;

        $products = $model->getData();

        require 'views/product_index.php';
    }

    public function show(){
        require 'views/product_show.php';
    }
}