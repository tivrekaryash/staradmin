<?php
$secondImageFolder = 'imageuploads/second/'; // Replace with the actual path to your second image folder

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

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['newSecondPhoto'])) {
    $newSecondPhoto = $_FILES['newSecondPhoto'];
 
    // Generate a unique filename for the new image
    $extension = pathinfo($newSecondPhoto['name'], PATHINFO_EXTENSION);
    $secondImageName = 'second_image.' . $extension; // Rename the image to "second_image"
    $secondImagePath = $secondImageFolder . $secondImageName;

    // Delete the old second photo if it exists
    $oldSecondPhoto = glob($secondImageFolder . 'second_image*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    if (!empty($oldSecondPhoto)) {
        unlink($oldSecondPhoto[0]);
    }

    if (move_uploaded_file($newSecondPhoto['tmp_name'], $secondImagePath)) {
        // Update the image file name in the database
        $sql = "UPDATE images SET second_image_filename = '$secondImageName' WHERE id = 1";
        if ($conn->query($sql) === true) {
            // Return the new image name to the JavaScript code
            echo $secondImageName;
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
