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
        if(empty($this->products)) {
            echo '<h2>Geen producten gevonden</h2>';
        } else {

            foreach ($this->products as $product) {
                echo '<div class="product">';
                echo '<h2>' . $product->getNaam() . '</h2>';
                echo '<p>' . $product->getBeschrijving() . '</p>';
                echo '<img src="assets/images/' . $product->getAfbeelding() . '" alt="' . $product->getNaam() . '" style="max-width: 100px;">';
                echo '<p>Prijs: €' . $product->getPrijs() . '</p>';
                echo '<button class="add-to-cart" data-id="' . $product->getId() . '">Toevoegen aan winkelwagen</button>';
                echo '</div>';
            }
        }
        echo '</div>';
    }
}
