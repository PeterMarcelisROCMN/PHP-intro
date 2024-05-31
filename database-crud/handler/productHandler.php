<?php

require_once __DIR__ . '/../model/Product.php';

class ProductHandler
{
    private $db;
    public function __construct()
    {
        try {
            $this->db = DBController::connectDB();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function DisplayAllProducts()
    {
        // Retrieve all products
        $products = Product::getAllProducts($this->db);
        // var_dump($products);
        $productView = new ProductView($products);
        // var_dump($products);
        $productView->generateView();
    }

    public function SearchProduct()
    {
        // Retrieve products by search term
        $searchTerm = !empty($_GET['search']) ? $_GET['search'] : null;
        $products = Product::searchProducts($this->db, $searchTerm);
        $productView = new ProductView($products);
        $productView->generateView();
    }

    public function DisplayProductsByCategory()
    {
        // Retrieve products by category
        $category = !empty($_GET['category']) ? $_GET['category'] : null;
        $products = Product::getProductByCategory($this->db, $category);
        $productView = new ProductView($products);
        $productView->generateView();
    }
}