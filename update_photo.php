<?php
$imageFolder = 'imageuploads/'; // Replace with the actual path to your image folder
$mainImageName = 'main_image'; // New name for the uploaded image

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
    $extension = pathinfo($newPhoto['name'], PATHINFO_EXTENSION);
    $imagePath = $imageFolder . $mainImageName . '.' . $extension;

    // Delete the old photo if it exists
    $oldPhoto = glob($imageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    if (!empty($oldPhoto)) {
        unlink($oldPhoto[0]);
    }

    if (move_uploaded_file($newPhoto['tmp_name'], $imagePath)) {
        // Update the image file name in the database
        $sql = "UPDATE images SET filename = '$mainImageName.$extension' WHERE id = 1";
        if ($conn->query($sql) === true) {
            echo 'success';
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
