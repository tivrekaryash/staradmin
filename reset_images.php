<?php
// Function to recursively delete a directory and its contents
function deleteDirectory($dirPath) {
    if (is_dir($dirPath)) {
        $objects = scandir($dirPath);
        foreach ($objects as $object) {
            if ($object != "." && $object != "..") {
                if (is_dir($dirPath . DIRECTORY_SEPARATOR . $object)) {
                    deleteDirectory($dirPath . DIRECTORY_SEPARATOR . $object);
                } else {
                    unlink($dirPath . DIRECTORY_SEPARATOR . $object);
                }
            }
        }
        rmdir($dirPath);
    }
}

// Source and destination folders
$backupFolder = 'backupfolder/';
$currentImageUploadFolder = 'imageuploads/';

// Subfolders within backup folder
$backupSubfolders = ['mainimage', 'aboutusimage', 'roomimages'];

// Subfolders within current image upload folder
$currentSubfolders = ['main', 'aboutus', 'rooms'];

// Loop through each subfolder and reset images
foreach ($backupSubfolders as $index => $backupSubfolder) {
    $currentSubfolder = $currentSubfolders[$index];
    $backupPath = $backupFolder . $backupSubfolder;
    $currentPath = $currentImageUploadFolder . $currentSubfolder;

    // Delete current images from the current image upload folder
    deleteDirectory($currentPath);

    // Recreate the current image upload folder if it was deleted
    mkdir($currentPath);

    // Copy images from the backup folder to the current image upload folder
    $backupImages = glob($backupPath . '/*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    foreach ($backupImages as $backupImage) {
        $imageFileName = basename($backupImage);
        copy($backupImage, $currentPath . '/' . $imageFileName);
    }
}

echo 'success';
?>
