<?php
$secondImageFolder = 'imageuploads/second/'; // Replace with the actual path to your second image folder

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['newSecondPhoto'])) {
    $newSecondPhoto = $_FILES['newSecondPhoto'];
    $secondImagePath = $secondImageFolder . basename($newSecondPhoto['name']);

    // Delete the old second photo if it exists
    $oldSecondPhoto = glob($secondImageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    if (!empty($oldSecondPhoto)) {
        unlink($oldSecondPhoto[0]);
    }

    if (move_uploaded_file($newSecondPhoto['tmp_name'], $secondImagePath)) {
        echo 'success';
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
?>
