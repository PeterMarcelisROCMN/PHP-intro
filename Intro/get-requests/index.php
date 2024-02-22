<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dynamic Image Retrieval</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Dynamic Image Retrieval</h1>
<label for="searchTerm">Search Term:</label>
<input type="text" id="searchTerm" name="searchTerm">
<button id="retrieveImages">Retrieve Images</button>
<div id="imageContainer"></div>

<script>
$(document).ready(function() {
  $('#retrieveImages').click(function() {
    var searchTerm = $('#searchTerm').val();
    $.ajax({
      url: 'get_images.php',
      type: 'GET',
      data: { searchTerm: searchTerm },
      dataType: 'html',
      success: function(response) {
        $('#imageContainer').html(response);
      },
      error: function(xhr, status, error) {
        console.error('Error retrieving images:', error);
      }
    });
  });
});
</script>

</body>
</html>
