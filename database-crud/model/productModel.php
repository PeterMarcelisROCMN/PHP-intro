<?php

class ProductException extends Exception {}

class Product {
    private $id;
    private $naam;
    private $beschrijving;
    private $afbeelding;
    private $prijs;

    public function __construct($id, $naam, $beschrijving = null, $afbeelding = null, $prijs) {
        $this->id = $id;
        $this->naam = $naam;
        $this->beschrijving = $beschrijving;
        $this->afbeelding = $afbeelding;
        $this->prijs = $prijs;
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
}