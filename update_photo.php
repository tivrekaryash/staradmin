<?php
$imageFolder = 'imageuploads/main/'; // Replace with the actual path to your image folder

// Database configuration
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'satvacottagelive';

// Establish database connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['newPhoto'])) {
    $newPhoto = $_FILES['newPhoto'];

    // Generate a unique filename for the new image
    $extension = pathinfo($newPhoto['name'], PATHINFO_EXTENSION);
    $mainImageName = 'main_image.' . $extension; // Rename the image to "main_image"
    $imagePath = $imageFolder . $mainImageName;

    // Delete the old photo if it exists
    $oldPhoto = glob($imageFolder . 'main_image*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    if (!empty($oldPhoto)) {
        unlink($oldPhoto[0]);
    }

    if (move_uploaded_file($newPhoto['tmp_name'], $imagePath)) {
        // Update the image file name in the database
        $sql = "UPDATE images SET filename = '$mainImageName' WHERE id = 1";
        if ($conn->query($sql) === true) {
            // Return the new image name to the JavaScript code
            echo $mainImageName;
        } else {
            echo 'error';
        }
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}

// Close the database connection
$conn->close();
?>