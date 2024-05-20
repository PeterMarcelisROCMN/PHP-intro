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
            // haal producten op die bij een categorie horen
            $category = !empty($_GET['category']) ? $_GET['category'] : null;
                $products = Product::getProductByCategory($db, $category);
                $productView = new ProductView($products);
                $productView->generateView();
        } else {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                Product::addNewProduct($db, $_POST['naam'], $_POST['beschrijving'], $_POST['afbeelding'], $_POST['prijs']);
            } else if ($_SERVER['REQUEST_METHOD'] === 'GET'){
                // haal alle producten op
                $products = Product::getAllProducts($db);
                $productView = new ProductView($products);
                $productView->generateView();
            }
        }
    }
}