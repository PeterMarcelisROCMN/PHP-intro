<?php

class ProductException extends Exception {}

class Product {
    private $id;
    private $naam;
    private $beschrijving;
    private $afbeelding;
    private $prijs;

    public function __construct($id, $naam, $beschrijving = null, $afbeelding = null, $prijs) {
        $this->setId($id);
        $this->setNaam($naam);
        $this->setBeschrijving($beschrijving);
        $this->setAfbeelding($afbeelding);
        $this->setPrijs($prijs);
    }

    // Getters and Setters for all properties

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getNaam() {
        return $this->naam;
    }

    public function setNaam($naam) {
        $this->naam = $naam;
    }

    public function getBeschrijving() {
        return $this->beschrijving;
    }

    public function setBeschrijving($beschrijving) {
        $this->beschrijving = $beschrijving;
    }

    public function getAfbeelding() {
        return $this->afbeelding;
    }

    public function setAfbeelding($afbeelding) {
        $this->afbeelding = $afbeelding;
    }

    public function getPrijs() {
        return $this->prijs;
    }

    public function setPrijs($prijs) {
        $this->prijs = $prijs;
    }

    public function returnProductasArray() {

        $product = [];
        $product['id'] = $this->id;
        $product['naam'] = $this->naam;
        $product['beschrijving'] = $this->beschrijving;
        $product['afbeelding'] = $this->afbeelding;
        $product['prijs'] = $this->prijs;

        return $product;
    }

    public static function getAllProducts($db) {
        $query = $db->prepare('SELECT id, naam, beschrijving, afbeelding, prijs FROM producten');
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_ASSOC);
        
        $products = [];
        
        foreach ($results as $row) {
            $products[] = new Product($row['id'], $row['naam'], $row['beschrijving'], $row['afbeelding'], $row['prijs']);
        }

        return $products;
    }

    // get product by category
    public static function getProductByCategory($db, $category) {
        $query = $db->prepare('SELECT p.id, p.naam, p.beschrijving, p.afbeelding, p.prijs
        FROM producten p
        INNER JOIN producten_categories pc ON p.id = pc.productid
        INNER JOIN categories c ON pc.categorieid = c.id
        WHERE c.naam = :categorieNaam');

        $query->bindParam(':categorieNaam', $category);
        $query->execute();

        $results = $query->fetchAll(PDO::FETCH_ASSOC);

        $products = [];

        foreach ($results as $row) {
            $products[] = new Product($row['id'], $row['naam'], $row['beschrijving'], $row['afbeelding'], $row['prijs']);
        }

        return $products;
    }
}