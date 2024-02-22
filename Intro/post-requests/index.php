<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload Form</title>
</head>
<body>
    <h2>Upload Your Image</h2>
    <form action="process_upload.php" method="POST" enctype="multipart/form-data">
        <label for="image">Select Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>
        <label for="image_name">Image Name:</label><br>
        <input type="text" id="image_name" name="image_name" required><br><br>
        <input type="submit" value="Upload">
    </form>
</body>
</html>
