<?php

class ProductController
{
    public function __construct()
    {
        try {
            $db = DBController::connectDB();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if (array_key_exists('category', $_GET)) {
            // Retrieve products by category
            $category = !empty($_GET['category']) ? $_GET['category'] : null;
            $products = Product::getProductByCategory($db, $category);
            $productView = new ProductView($products);
            $productView->generateView();
        } else if (array_key_exists('search', $_GET)) {
            // Retrieve products by search term
            $searchTerm = !empty($_GET['search']) ? $_GET['search'] : null;
            $products = Product::searchProducts($db, $searchTerm);
            $productView = new ProductView($products);
            $productView->generateView();
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                Product::addNewProduct($db, $_POST['naam'], $_POST['beschrijving'], $_POST['afbeelding'], $_POST['prijs']);
            } else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // Retrieve all products
                $products = Product::getAllProducts($db);
                $productView = new ProductView($products);
                $productView->generateView();
            }
        }
    }
}
