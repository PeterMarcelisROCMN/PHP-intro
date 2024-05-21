<?php

class ProductException extends Exception
{
}

class Product
{
    private $id;
    private $naam;
    private $beschrijving;
    private $afbeelding;
    private $prijs;

    public function __construct($id, $naam, $beschrijving = null, $afbeelding = null, $prijs)
    {
        $this->setId($id);
        $this->setNaam($naam);
        $this->setBeschrijving($beschrijving);
        $this->setAfbeelding($afbeelding);
        $this->setPrijs($prijs);
    }

    // Getters and Setters for all properties
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getNaam()
    {
        return $this->naam;
    }

    public function setNaam($naam)
    {
        $this->naam = $naam;
    }

    public function getBeschrijving()
    {
        return $this->beschrijving;
    }

    public function setBeschrijving($beschrijving)
    {
        $this->beschrijving = $beschrijving;
    }

    public function getAfbeelding()
    {
        return $this->afbeelding;
    }

    public function setAfbeelding($afbeelding)
    {
        $this->afbeelding = $afbeelding;
    }

    public function getPrijs()
    {
        return $this->prijs;
    }

    public function setPrijs($prijs)
    {
        if(!is_numeric($prijs) || $prijs < 0) {
            throw new ProductException('Prijs moet een positief getal zijn.');
        } else {
            $this->prijs = $prijs;
        }
    }

    public function returnProductasArray()
    {
        $product = [];
        $product['id'] = $this->id;
        $product['naam'] = $this->naam;
        $product['beschrijving'] = $this->beschrijving;
        $product['afbeelding'] = $this->afbeelding;
        $product['prijs'] = $this->prijs;

        return $product;
    }

    public static function getAllProducts($db)
    {

        try {
            $query = $db->prepare('SELECT id, naam, beschrijving, afbeelding, prijs FROM producten');
            $query->execute();
            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            $products = [];

            foreach ($results as $row) {
                $products[] = new Product($row['id'], $row['naam'], $row['beschrijving'], $row['afbeelding'], $row['prijs']);
            }

            return $products;
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (ProductException $e) {
            echo $e->getMessage();
        }
    }

    // get product by category
    public static function getProductByCategory($db, $category)
    {
        try {
            $query = $db->prepare('SELECT id, naam, beschrijving, afbeelding, prijs FROM producten WHERE categorie = :categorieNaam');
            $query->bindParam(':categorieNaam', $category);
            $query->execute();

            $results = $query->fetchAll(PDO::FETCH_ASSOC);

            $products = [];

            foreach ($results as $row) {
                $products[] = new Product($row['id'], $row['naam'], $row['beschrijving'], $row['afbeelding'], $row['prijs']);
            }

            return $products;
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (ProductException $e) {
            echo $e->getMessage();
        }
    }

    public static function addNewProduct($db, $naam, $beschrijving, $afbeelding, $prijs)
    {
        try {
            // probeer een nieuw product aan te maken. Als dit niet lukt, geef een foutmelding.
            $newProduct = new Product(null, $naam, $beschrijving, $afbeelding, $prijs);

            $naam = $newProduct->getNaam();
            $beschrijving = $newProduct->getBeschrijving();
            $afbeelding = $newProduct->getAfbeelding();
            $prijs = $newProduct->getPrijs();

            $query = $db->prepare('INSERT INTO producten (naam, beschrijving, afbeelding, prijs) VALUES (:naam, :beschrijving, :afbeelding, :prijs)');
            $query->bindParam(':naam', $naam);
            $query->bindParam(':beschrijving', $beschrijving);
            $query->bindParam(':afbeelding', $afbeelding);
            $query->bindParam(':prijs', $prijs);
            $query->execute();

            $productId = $db->lastInsertId();

            $rowCount = $query->rowCount();

            if ($rowCount === 0) {
                throw new ProductException('Er is iets misgegaan bij het toevoegen van het product.');
            }

            // return the newly added product
            $query = $db->prepare('SELECT id, naam, beschrijving, afbeelding, prijs FROM producten WHERE id = :id');
            $query->bindParam(':id', $productId);
            $query->execute();

            $rowCount = $query->rowCount();

            if ($rowCount === 0) {
                throw new ProductException('Er is iets misgegaan bij het ophalen van het product.');
            }

            echo 'gelukt om product toe te voegen';
        } catch (PDOException $e) {
            echo $e->getMessage();
        } catch (ProductException $e) {
            echo $e->getMessage();
        }
    }
}