<!-- <!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Image Retrieval</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<h1>Dynamic Image Retrieval</h1>
<div id="imageContainer">
    <?php //include 'get_images.php'; ?>
</div>
</body>
</html> -->


<!-- EXAMPLE WITH BUTTON -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Image Retrieval</title>
<link rel="stylesheet" href="../style.css">
</head>
<body>
<h1>Dynamic Image Retrieval</h1>
<form method="get" action="">
    <label for="searchTerm">Search Term:</label>
    <input type="text" id="searchTerm" name="searchTerm">
    <button type="submit">Retrieve Images</button>
</form>

<div id="imageContainer">
    <?php 
    // Check if both the button is clicked and searchTerm is set
    if (isset($_GET['searchTerm'])) {
        // PHP code to retrieve images
        include 'get_images.php';
    }
    ?>
</div>
</body>
</html>