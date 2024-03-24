<!-- index.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Message Filter</title>
</head>
<body>

<h2>Message Filter</h2>

<!-- Filter form -->
<form action="" method="GET">
    <label for="author">Filter by Author:</label>
    <input type="text" name="author" id="author">
    <button type="submit">Filter</button>
</form>

<hr>

<!-- Display messages -->
<div id="messages">
    <?php include 'controllers/messageController.php'; ?>
</div>

</body>
</html>
