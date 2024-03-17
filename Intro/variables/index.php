<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formhandler.php" method="post" enctype="multipart/form-data">
        <label for="name">Name</label>
        <input type="text" placeholder="type name here" name="name" >
        <br>
        <input type="file" name="uploadedFile">
        <br><br>
        <input type="submit" value="submit" name="submit">
    </form>
</body>
</html>