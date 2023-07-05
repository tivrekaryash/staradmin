<?php
$newImageFolder = 'new_image_uploads/'; // Replace with the actual path to your new image folder

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['newPhotos'])) {
    $newPhotos = $_FILES['newPhotos'];

    for ($i = 0; $i < count($newPhotos['name']); $i++) {
        $newPhotoName = basename($newPhotos['name'][$i]);
        $newPhotoPath = $newImageFolder . $newPhotoName;

        if (move_uploaded_file($newPhotos['tmp_name'][$i], $newPhotoPath)) {
            // Success
        } else {
            echo 'error';
            exit;
        }
    }

    echo 'success';
} else {
    echo 'error';
}

?>