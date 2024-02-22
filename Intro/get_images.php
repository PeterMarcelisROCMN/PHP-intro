<?php
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
?>


