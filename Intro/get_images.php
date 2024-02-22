<?php
/*
// Generate static images HTML content
$imagesHtml = '<img src="/images/pancake1.jpg" alt="Image 1">';
$imagesHtml .= '<img src="images/pancake2.jpg" alt="Image 2">';
$imagesHtml .= '<img src="images/pancake3.jpg" alt="Image 3">';
$imagesHtml .= '<img src="images/pancake2.jpg" alt="Image 2">';
$imagesHtml .= '<img src="images/pancake3.jpg" alt="Image 3">';
$imagesHtml .= '<img src="images/pancake1.jpg" alt="Image 2">';
$imagesHtml .= '<img src="images/pancake3.jpg" alt="Image 3">';
$imagesHtml .= '<img src="images/pancake2.jpg" alt="Image 2">';
$imagesHtml .= '<img src="images/pancake1.jpg" alt="Image 3">';
// Send the HTML content back to the client
echo $imagesHtml;
*/

// Path to the images folder
$imagesPath = 'images/';

// Get search term from GET request
$searchTerm = isset($_GET['searchTerm']) ? $_GET['searchTerm'] : '';

// Get all image filenames from the images folder that contain the search term
$imageFiles = glob($imagesPath . '*' . $searchTerm . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Initialize the HTML content
$imagesHtml = '';

// Loop through each image filename and generate HTML content
foreach ($imageFiles as $imageFile) {
    // Get the image filename without the path
    $imageName = basename($imageFile);
    // Generate HTML for the image
    $imagesHtml .= '<img src="' . $imagesPath . $imageName . '" alt="' . $imageName . '">';
}

// Send the HTML content back to the client
echo $imagesHtml;