<?php

class ProductView
{
    private $products;


    public function __construct($products)
    {
        $this->products = $products;
    }

    public function generateView()
    {

        echo '<div class="product-container">';
        foreach ($this->products as $product) {
            // Generate HTML markup for each product
            echo '<div class="product">';
            echo '<h2>' . $product->getNaam() . '</h2>';
            echo '<p>' . $product->getBeschrijving() . '</p>';
            echo '<img src="assets/images/' . $product->getAfbeelding() . '" alt="' . $product->getNaam() . '" style="max-width: 100px;">';
            echo '<p>Prijs: €' . $product->getPrijs(). '</p>';
            echo '</div>';
        }
        echo '</div>'; // Close product-container div

    }
}
