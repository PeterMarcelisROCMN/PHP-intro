<?php

require_once 'dbController.php';
require_once __DIR__ . '/../model/productModel.php';
require_once __DIR__ . '/../model/Response.php';
require_once __DIR__ . '/../view/productView.php';


// maak een DB connectie aan
try{
    $db = DB::connectDB();
} catch (PDOException $e) {
    echo $e->getMessage();
}

if(array_key_exists('category', $_GET) && !empty($_GET['category'])) {
    // haal producten op die bij een categorie horen

    try {
        $category = $_GET['category'];
        $query = $db->prepare('SELECT p.id, p.naam, p.beschrijving, p.afbeelding, p.prijs
        FROM producten p
        INNER JOIN producten_categories pc ON p.id = pc.productid
        INNER JOIN categories c ON pc.categorieid = c.id
        WHERE c.naam = :categorieNaam');
    
        $query->bindParam(':categorieNaam', $category);
        $query->execute();

        $rowCount = $query->rowCount();
        $productArray = array();
        $returnData = array();



        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $product = new Product($row['id'], $row['naam'], $row['beschrijving'], $row['afbeelding'], $row['prijs']);
            $productArray[] = $product->returnProductasArray();
        }

        $returnData['rowCount'] = $rowCount;
        $returnData['data'] = $productArray;

        $response = new Response();
        $response->setSuccess(true);
        $response->setHttpStatusCode(200);
        $response->addMessage('Producten opgehaald');
        $response->setData($returnData);

        $productView = new ProductView($response);
        $productView->generateView();

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
    catch (ProductException $e) {
        echo $e->getMessage();
    }

} else {
    // haal alle producten op
    $query = $db->prepare('SELECT id, naam, beschrijving, afbeelding, prijs FROM producten');
    $query->execute();

    // standaard fetch all en echo naar json
    // $products = $query->fetchAll();
    // echo json_encode($products);

    $rowCount = $query->rowCount();
    $productArray = array();

    // maak een array van producten en echo naar json
    while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
        $product = new Product($row['id'], $row['naam'], $row['beschrijving'], $row['afbeelding'], $row['prijs']);
        $productArray[] = $product->returnProductasArray();
    }

    echo json_encode($productArray);
}