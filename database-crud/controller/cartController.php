<?php

require_once __DIR__ . '/../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $productId = $_POST['id'];
    
    $cartController = new cartHandler();

    switch ($action) {
        case 'add':
            $cartController->addToCart($productId);
            break;
        case 'remove':
            $cartController->removeFromCart($productId);
            break;
        case 'update':
            $direction = $_POST['direction'];
            $cartController->updateCart($productId, $direction);
            break;
        default:
            echo "Invalid action.";
    }
} else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $cartController = new cartHandler();
    $cartController->displayCart();
}