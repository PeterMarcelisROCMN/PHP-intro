<?php

// controllers are plural while models are singular
class Products {
    public function index(){
        require 'src/models/product.php';

        $model = new Product();

        $products = $model->getData();

        require 'views/product_index.php';
    }

    public function show(){
        require 'views/product_show.php';
    }
}