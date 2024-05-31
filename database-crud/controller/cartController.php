<?php

require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productId = $_POST['id'];
    
    $cartController = new cartHandler();
    $cartController->addToCart($productId);
}else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cartController = new cartHandler();
    $cartController->displayCart();
}