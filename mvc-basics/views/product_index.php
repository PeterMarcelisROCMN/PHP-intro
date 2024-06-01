<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php foreach($products as $product): ?>
    <h1><?php echo $product['naam']; ?></h1>
    <p><?php echo $product['beschrijving']; ?></p>
    <p><?php echo $product['prijs']; ?></p>
<?php endforeach; ?>
</body>
</html>