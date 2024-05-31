<?php

require_once __DIR__ . '/../config.php';

$productHandler = new ProductHandler();

if($_SERVER['REQUEST_METHOD'] !== 'GET') {
    return;
}

if (array_key_exists('category', $_GET)) {
    $productHandler->DisplayProductsByCategory();
} else if (array_key_exists('search', $_GET)) {
    $productHandler->SearchProduct();
} else {
    $productHandler->DisplayAllProducts();
}