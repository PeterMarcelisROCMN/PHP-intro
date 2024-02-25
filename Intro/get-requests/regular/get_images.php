<?php
// Path to the images folder
$imagesPath = '../images/';

// Get search term from GET request
 $searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

// Get all image filenames from the images folder that contain the search term
$imageFiles = glob($imagesPath . '*' . $searchTerm . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Loop through each image filename and generate HTML content
foreach ($imageFiles as $imageFile) {
    // Get the image filename without the path
    $imageName = basename($imageFile);
    // Generate HTML for the image and output it directly
    echo '<img src="' . $imagesPath . $imageName . '" alt="' . $imageName . '">';
}
?>