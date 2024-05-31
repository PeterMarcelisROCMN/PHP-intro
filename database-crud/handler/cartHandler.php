<?php
session_start();

class cartHandler
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

    public function addToCart($productId)
    {
        // Assume you have a function to get product details by ID
        $product = Product::getProductById($this->db, $productId);

        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$productId])) {
            // Increment the quantity
            $_SESSION['cart'][$productId]['quantity']++;
        } else {
            // Add the product with quantity 1
            $_SESSION['cart'][$productId] = array("product" => $product, "quantity" => 1);
        }

        $this->displayCart();
    }

    public function displayCart()
    {
        // print_r($_SESSION['cart']);
        if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $item) {
                // Debugging: Print each item
                // echo '<pre>';
                // var_dump($item);
                // echo '</pre>';
                // var_dump($item);

                
                $product = $item['product'];
                $quantity = $item['quantity'];
                $cost = $product->getPrijs() * $quantity;
                // print_r($product);
                // print_r($quantity);
                echo '<div class="cart-item">';
                echo '<div class="cart-item-title">';
                echo '<h3>' . $product->getNaam() . '</h3>';
                echo '<img src="assets/images/' . $product->getAfbeelding() . '" </img>';
                echo '</div>';
                echo '<p>Aantal: ' . $quantity . '</p>';
                echo '<p>totaalprijs: €' . $cost . '</p>';
                echo '</div>';
            }
        } else {
            echo '<p>Je winkelwagen is leeg.</p>';
        }
    }
}
