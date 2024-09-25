<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form method="get" action="">
    <label for="category">Search Term:</label>
    <input type="text" id="category" name="category">
    <button type="submit">Retrieve Images</button>
</form>

<div id="imageContainer">
    <?php 
    // Check if both the button is clicked and searchTerm is set
    if (isset($_GET['category'])) {
        // PHP code to retrieve images
        include 'controller/productController.php';
    }
    // } else {
    //     include 'controller/productController.php';
    // }
    ?>
    
</body>
</html>