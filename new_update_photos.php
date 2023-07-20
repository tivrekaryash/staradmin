<?php
// $newImageFolder = 'imageuploads/rooms/'; // Replace with the actual path to your new image folder

// if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['newPhotos'])) {
//     $newPhotos = $_FILES['newPhotos'];

//     for ($i = 0; $i < count($newPhotos['name']); $i++) {
//         $newPhotoName = basename($newPhotos['name'][$i]);
//         $newPhotoPath = $newImageFolder . $newPhotoName;

//         if (move_uploaded_file($newPhotos['tmp_name'][$i], $newPhotoPath)) {
//             // Success
//         } else {
//             echo 'error';
//             exit;
//         }
//     }

//     echo 'success';
// } else {
//     echo 'error';
// }

?>

<?php
$newImageFolder = 'imageuploads/rooms/'; // Replace with the actual path to your new image folder

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['newPhotos'])) {
    $newPhotos = $_FILES['newPhotos'];

    if (empty($newPhotos['name'][0])) {
        // Test Case 2: No images selected
        $response = array('status' => 'error', 'message' => 'Please select at least one image to upload.');
    } else {
        $successCount = 0;

        for ($i = 0; $i < count($newPhotos['name']); $i++) {
            $newPhotoName = basename($newPhotos['name'][$i]);
            $newPhotoPath = $newImageFolder . $newPhotoName;

            if (in_array(strtolower(pathinfo($newPhotoName, PATHINFO_EXTENSION)), array('jpg', 'jpeg', 'png', 'gif'))) {
                if (move_uploaded_file($newPhotos['tmp_name'][$i], $newPhotoPath)) {
                    $successCount++;
                }
            }
        }

        if ($successCount > 0) {
            // Test Case 1: Success with at least one image uploaded
            $response = array('status' => 'success', 'message' => 'Successfully uploaded ' . $successCount . ' image(s).');
        } else {
            // Test Case 3: No valid images uploaded
            $response = array('status' => 'error', 'message' => 'Please upload valid image files (JPG, JPEG, PNG, GIF).');
        }
    }
} else {
    // Test Case 2 (in case the request is not a POST request or 'newPhotos' field is missing)
    $response = array('status' => 'error', 'message' => 'Please select at least one image to upload.');
}

echo json_encode($response);
?>
