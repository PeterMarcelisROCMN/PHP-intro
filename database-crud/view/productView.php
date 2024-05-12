<?php

class ProductView
{


    private $response;


    public function __construct($response)
    {
        $this->response = $response;
    }

    public function generateView()
    {
        if ($this->response->getSuccess() === false) {
            echo 'ophalen van data is niet geslaagd';
            exit();
        }

        $productArray = $this->response->getData();

        if ($productArray['rowCount'] === 0) {
            echo 'Geen producten gevonden';
            exit();
        }

        echo '<div class="product-container">';
        foreach ($productArray['data'] as $productData) {
            // Generate HTML markup for each product
            echo '<div class="product">';
            echo '<h2>' . $productData['naam'] . '</h2>';
            echo '<p>' . $productData['beschrijving'] . '</p>';
            echo '<img src="assets/images/' . $productData['afbeelding'] . '" alt="' . $productData['naam'] . '" style="max-width: 100px;">';
            echo '<p>Prijs: €' . $productData['prijs'] . '</p>';
            echo '</div>';
        }
        echo '</div>'; // Close product-container div

    }
}
