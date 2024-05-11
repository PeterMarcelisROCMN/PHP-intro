<?php

class Read {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProducts() {
        $query = $this->db->prepare('SELECT naam, beschrijving, afbeelding, prijs FROM product');
        $query->execute();
        return $query->fetchAll();
    }

    // get product by category
    public function getProductByCategory($category) {
        $query = $this->db->prepare('SELECT p.id, p.naam, p.beschrijving, p.afbeelding, p.prijs
        FROM producten p
        INNER JOIN producten_categories pc ON p.id = pc.productid
        INNER JOIN categories c ON pc.categorieid = c.id
        WHERE c.naam = ":categorieNaam"');

        $query->bindParam(':categorieNaam', $category);
        $query->execute();
        return $query->fetchAll();
    }
}