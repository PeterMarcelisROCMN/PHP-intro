<?php

namespace App\Models;

use PDO;

class Product {
    public function getData() : array {
        $dsn = 'mysql:host=localhost;dbname=productendb;charset=utf8';
        $pdo = new PDO($dsn, 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

        $stmt = $pdo->query('SELECT * FROM producten');
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
}