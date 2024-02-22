<?php
// Maximum file size threshold for compression (in KB)
$max_file_size = 1024; // 1 MB

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"]) && isset($_POST["image_name"])) {
    $file = $_FILES["image"];
    $image_name = $_POST["image_name"];

    // Check for errors
    if ($file["error"] > 0) {
        $error_message = "Error uploading file: " . $file["error"];
    } else {
        // Validate file type (ensure it's an image)
        $allowed_types = array("image/jpeg", "image/png", "image/gif");
        if (!in_array($file["type"], $allowed_types)) {
            $error_message = "Only JPEG, PNG, and GIF files are allowed.";
        } else {
            // Check file size
            $file_size_kb = $file["size"] / 1024; // Convert to KB
            if ($file_size_kb > $max_file_size) {
                // Compress image if file size exceeds the threshold
                compressImage($file["tmp_name"]);
            }

            // Generate timestamp suffix for image name
            $timestamp = time();
            // Get file extension
            $file_extension = pathinfo($file["name"], PATHINFO_EXTENSION);
            // Construct new filename with timestamp suffix
            $new_filename = $image_name . '_' . $timestamp . '.' . $file_extension;

            // Move uploaded file to a designated location with the new filename
            $upload_dir = "uploads/";
            $target_file = $upload_dir . $new_filename;
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                echo "<h2>Upload Successful!</h2>";
                echo "<img src='$target_file' alt='Uploaded Image'><br><br>";
                echo "File name: $new_filename<br>";
                echo "File type: " . $file["type"] . "<br>";
                echo "File size: " . ($file["size"] / 1024) . " KB<br>";
            } else {
                $error_message = "Error moving file to destination.";
            }
        }
    }
} else {
    // If the script is accessed directly without a POST request or if no image is uploaded
    $error_message = "Please select an image and provide a name.";
}

// Output error message if applicable
if (isset($error_message)) {
    echo "<h2>Error: $error_message</h2>";
}

// Function to compress the image
function compressImage($sourcePath) {
    // Load image from file
    $image = imagecreatefromstring(file_get_contents($sourcePath));
    
    // Compress image
    imagejpeg($image, $sourcePath, 50); // Adjust quality as needed (0-100)
    
    // Free up memory
    imagedestroy($image);
}
?>
