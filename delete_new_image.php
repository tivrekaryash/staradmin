<?php 
$newImageFolder = 'new_image_uploads/'; // Replace with the actual path to your new image folder

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['image'])) {
    $newImageToDelete = $_POST['image'];
    $newImagePath = $newImageFolder . $newImageToDelete;

    if (file_exists($newImagePath)) {
        if (unlink($newImagePath)) {
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

?>