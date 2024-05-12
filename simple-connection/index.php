<?php

require_once __DIR__ . '/config.php';

// aanmaken van een PDO instantie (database connectie)
try {
$DBConnection = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=utf8', DB_USER, DB_PASS);
$DBConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$DBConnection->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}

$stmt = $DBConnection->prepare('SELECT id, naam, beschrijving, prijs FROM producten');
$stmt->execute();

$producten = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($producten as $product) {
    echo $product['naam'] . '<br>';
}
