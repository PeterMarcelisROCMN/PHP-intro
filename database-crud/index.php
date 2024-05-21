<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="assets/css/styles.css">
    <title>Product Delivery Service</title>
</head>

<body>
    <div class="header">
        <div class="categories">
            <a href="?category=hapjes" class="category">Hapjes</a>
            <a href="?category=drankjes" class="category">Drankjes</a>
        </div>
        <div class="search-container">
            <form action="" method="GET">
                <input type="text" name="search" placeholder="Zoeken..." class="search-bar">
                <input type="submit" class="search-button" value="Zoeken">
            </form>
        </div>
    </div>
    <div id="imageContainer">
        <?php
        $productController = new ProductController();
        ?>
    </div>
</body>

</html>
