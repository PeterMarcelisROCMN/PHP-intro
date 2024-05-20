<?php

class ProductController
{
    // maak een DB connectie aan

    public function __construct()
    {
        try {
            $db = DBController::connectDB();
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

        if (array_key_exists('category', $_GET) && !empty($_GET['category'])) {
            // haal producten op die bij een categorie horen

            try {
                $products = Product::getProductByCategory($db, $_GET['category']);
                $productView = new ProductView($products);
                $productView->generateView();
            } catch (PDOException $e) {
                echo $e->getMessage();
            } catch (ProductException $e) {
                echo $e->getMessage();
            }
        } else {
            // haal alle producten op
            try {
                $products = Product::getAllProducts($db);
                $productView = new ProductView($products);
                $productView->generateView();
            } catch (PDOException $e) {
                echo $e->getMessage();
            } catch (ProductException $e) {
                echo $e->getMessage();
            }
        }
    }
}
