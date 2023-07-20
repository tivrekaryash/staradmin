<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // User is not logged in, redirect to the login page
    header("Location: index.php");
    exit();
}

// The user is logged in, display the authorized page content

// Include the database connection details
require_once 'db_config.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Control Panel</title>

    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/feather/feather.css">
    <link rel="stylesheet" href="vendors/mdi/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/typicons/typicons.css">
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">

    <!-- endinject -->

    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->

    <!-- inject:css -->
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <!-- endinject -->
    <!-- Remix Icons CDN Link -->
    <script src="https://cdn.jsdelivr.net/npm/@iconify/iconify@latest/dist/iconify.min.js"></script>
    

    <link rel="shortcut icon" href="images/favicon.png" />

    <style>
        /* CSS for containing the image */
        .card-body.herouploader {
            max-width: 500px;
            /* Adjust the value as needed */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* CSS for reducing the image size */
        .herouploader .main-image {
            max-width: 100%;
            height: auto;
        }

        /* CSS for the image preview in the modal */
        .herouploadermodal .modal-body {
            text-align: left;
        }

        .herouploadermodal .modal-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        /* CSS for the success message */
        .herouploader .success-message {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            display: none;
            margin-bottom: 10px;
        }

        .herouploader .warning-text {

            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 4px;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
            color: #6c757d;
        }

        .herouploader .warning-text i {
            margin-right: 5px;
            color: #ffc107;
        }

        .herouploader .warning-text span:first-child {
            font-weight: 600;
            margin-right: 5px;
        }

        .herouploader .warning-text span:last-child {
            flex-grow: 1;
        }

        .herouploader h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .herouploader .subheading {
            font-size: 16px;
            margin-bottom: 20px;
            color: #777;
        }







        /* CSS for containing the image */
        .card-body.aboutuploader {
            max-width: 500px;
            /* Adjust the value as needed */
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        /* CSS for reducing the image size */
        .aboutuploader .second-image {
            max-width: 100%;
            height: auto;
        }

        /* CSS for the image preview in the modal */
        .aboutuploadermodal .modal-body {
            text-align: left;
        }

        .aboutuploadermodal .modal-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        /* CSS for the success message */
        .aboutuploader .success-message {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            display: none;
            margin-bottom: 10px;
        }

        .aboutuploader .warning-text {

            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 4px;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
            color: #6c757d;
        }

        .aboutuploader .warning-text i {
            margin-right: 5px;
            color: #ffc107;
        }

        .aboutuploader .warning-text span:first-child {
            font-weight: 600;
            margin-right: 5px;
        }

        .aboutuploader .warning-text span:last-child {
            flex-grow: 1;
        }

        .aboutuploader h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .aboutuploader .subheading {
            font-size: 16px;
            margin-bottom: 20px;
            color: #777;
        }





        .card-body.roomuploader {
            max-width: 100%;
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .roomuploader .warning-text {
            margin-top: 10px;
        }

        .roomuploadermodal .modal-body {
            text-align: left;
        }

        .roomuploadermodal .modal-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .roomuploader .new-image-container {
            position: relative;
            display: inline-block;
            margin-bottom: 10px;
        }

        .roomuploader .new-gallery-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 5px;
        }

        .roomuploader .new-delete-btn {
            position: absolute;
            top: 5px;
            right: 5px;
            padding: 5px 10px;
            background-color: red;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .roomuploader h2 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .roomuploader .subheading {
            font-size: 16px;
            margin-bottom: 20px;
            color: #777;
        }

        .roomuploader .new-image-gallery {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .roomuploader .new-image-container {
            flex-basis: calc(50% - 10px);
            margin-right: 10px;
            margin-bottom: 10px;
        }

        .roomuploader .success-message {
            background-color: #28a745;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            display: none;
            margin-bottom: 10px;
        }

        .roomuploader .warning-text {
            background-color: #fff3cd;
            border: 1px solid #ffc107;
            border-radius: 4px;
            padding: 10px;
            margin-top: 10px;
            font-size: 14px;
            color: #6c757d;
        }

        .roomuploader .warning-text i {
            margin-right: 5px;
            color: #ffc107;
        }

        .roomuploader .warning-text span:first-child {
            font-weight: 600;
            margin-right: 5px;
        }

        .roomuploader .warning-text span:last-child {
            flex-grow: 1;
        }

        .roomuploadermodal .modal-body {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .roomuploadermodal .modal-body .new-modal-image {
            max-width: 100%;
            max-height: 200px;
            margin: 10px;
        }

        @media (max-width: 767px) {
            .roomuploader .new-image-container {
                flex-basis: calc(50% - 10px);
                margin-right: 10px;
                margin-bottom: 10px;
            }
        }

        @media (min-width: 768px) {
            .roomuploader .new-image-container {
                flex-basis: calc(25% - 10px);
                margin-right: 10px;
                margin-bottom: 10px;
            }
        }

/* CSS for the text and icons inside the modal-body */
#resetConfirmationModal .modal-body {
    text-align: center;
}

#resetConfirmationModal .icon-container {
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: #f8d7da;
    border-radius: 50%;
    width: 80px;
    height: 80px;
    margin: 0 auto 20px;
}

#resetConfirmationModal .mdi {
    font-size: 36px;
    color: #721c24;
}

#resetConfirmationModal .confirmation-text {
    font-size: 18px;
    margin-bottom: 20px;
}





        
    </style>
</head>

<body>
    <div class="container-scroller">

        <!-- Include the navigation code -->
        <?php include 'partials/_navbar.php'; ?>

        <div class="container-fluid page-body-wrapper">

            <!-- Include the sidebar code -->
            <?php include 'partials/_sidebar.php'; ?>

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                            <div class="card-body">
                                <!-- Reset Images Button -->
<button type="button" class="btn btn-primary mt-3" id="resetImagesBtn">Reset Images</button>

                            </div>
                                
                                <div class="card-body herouploader">
                                    <h2>Main Image</h2>
                                    <p class="subheading">Browse and Update Main Image</p>
                                    <?php
                                    $imageFolder = 'imageuploads/main/'; // Replace with the actual path to your image folder
                                    $image = glob($imageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                                    if (!empty($image)) {
                                        $imageName = basename($image[0]);
                                        echo '<div class="success-message" id="successMessage" style="display: none;">Image successfully updated.</div>';
                                        echo '<img class="main-image" src="' . $imageFolder . $imageName . '" alt="Current Image">';
                                    } else {
                                        echo 'No image found.';
                                    }
                                    ?>
                                    <div class="warning-text">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>IMPORTANT:</span><br><br>
                                        <span>Before Making Any Changes, Please Note That This Image Directly Affects the Main Page on the Live Website. Any Modifications Should Be Executed With Utmost Care and Thoughtfulness.</span>
                                    </div>

                                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#updateModal">Update Photo</button>
                                </div>

                                <div class="modal fade herouploadermodal" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateModalLabel">Update Photo</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateForm" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control" id="newPhoto" name="newPhoto" accept="image/*" required>
                                                    </div>
                                                    <div id="imagePreview"></div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="updatePhotoBtn">Update Photo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>



                                <div class="card-body aboutuploader">
                                    <h2>About Us Image</h2>
                                    <p class="subheading">Browse and Update About Us Image</p>
                                    <?php

                                    $secondImageFolder = 'imageuploads/aboutus/'; // Replace with the actual path to your second image folder
                                    $secondImage = glob($secondImageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
                                    if (!empty($secondImage)) {
                                        $secondImageName = basename($secondImage[0]);
                                        echo '<div class="success-message" id="secondSuccessMessage" style="display: none;">Second image successfully updated.</div>';
                                        echo '<img class=" second-image" src="' . $secondImageFolder . $secondImageName . '" alt="Second Image">';
                                    } else {
                                        echo 'No second image found.';
                                    }

                                    ?>
                                    <div class="warning-text">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>IMPORTANT:</span><br><br>
                                        <span>Before Making Any Changes, Please Note That This Second Image Directly Affects the Main Page on the Live Website. Any Modifications Should Be Executed With Utmost Care and Thoughtfulness.</span>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#updateSecondModal">Update Second Photo</button>
                                </div>

                                <div class="modal fade aboutuploadermodal" id="updateSecondModal" tabindex="-1" aria-labelledby="updateSecondModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="updateSecondModalLabel">Update Second Photo</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="updateSecondForm" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control" id="newSecondPhoto" name="newSecondPhoto" accept="image/*" required>
                                                    </div>
                                                    <div id="secondImagePreview"></div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="updateSecondPhotoBtn">Update Second Photo</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-body roomuploader">
                                    <h2>Room Images</h2>
                                    <p class="subheading">Browse and update room images</p>
                                    <?php
                                    $newImageFolder = 'imageuploads/rooms/'; // Replace with the actual path to your new image folder
                                    $newImages = glob($newImageFolder . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

                                    if (!empty($newImages)) {
                                        echo '<div class="new-image-gallery">';
                                        foreach ($newImages as $newImage) {
                                            $newImageName = basename($newImage);
                                            echo '<div class="new-image-container">';
                                            echo '<img class="main-image new-gallery-image" src="' . $newImage . '" alt="New Gallery Image">';
                                            echo '<button class=" new-delete-btn" data-image="' . $newImageName . '">Delete</button>';
                                            echo '</div>';
                                        }
                                        echo '</div>';
                                    } else {
                                        echo 'No new images found.';
                                    }
                                    ?>

                                    <div class="warning-text">
                                        <i class="fas fa-exclamation-circle"></i>
                                        <span>IMPORTANT:</span><br><br>
                                        <span>Before Making Any Changes, Please Note That This Image Directly Affects the Main Page on the Live Website. Any Modifications Should Be Executed With Utmost Care and Thoughtfulness.</span>
                                    </div>
                                    <button type="button" class="btn btn-primary mt-3 mb-3" data-bs-toggle="modal" data-bs-target="#newUpdateModal">Update New Photos</button>
                                </div>

                                <div class="modal fade roomuploadermodal" id="newUpdateModal" tabindex="-1" aria-labelledby="newUpdateModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="newUpdateModalLabel">Update New Photos</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form id="newUpdateForm" enctype="multipart/form-data">
                                                    <div class="mb-3">
                                                        <input type="file" class="form-control" id="newPhotos" name="newPhotos[]" multiple accept="image/*" required>
                                                    </div>
                                                    <div id="newImagePreview"></div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-primary" id="newUpdatePhotosBtn">Update New Photos</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirmation Modal -->
                                <div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Image Deletion</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Are you sure you want to delete this image? This action cannot be undone.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Yes, Delete</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Confirmation Modal -->
<div class="modal fade" id="resetConfirmationModal" tabindex="-1" aria-labelledby="resetConfirmationModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="resetConfirmationModalLabel">Confirm Image Reset</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="icon-container">
                    <span class="mdi mdi-alert-circle-outline"></span>
                </div>
                <p class="confirmation-text">Are you sure you want to reset all images to the backup versions?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger" id="resetConfirmationBtn">Okay, Reset</button>
            </div>
        </div>
    </div>
</div>





                            </div>
                        </div>
                    </div>
                </div>
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright ©
                            2021. All rights reserved.</span>
                    </div>
                </footer>
                <!-- partial -->
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/hoverable-collapse.js"></script>
    <script src="js/template.js"></script>
    <script src="js/settings.js"></script>
    <script src="js/todolist.js"></script>

    <!-- Add this code before the <script> tag -->
    <script>
        var imageFolder = 'imageuploads/main'; // Replace with the actual path to your image folder
    </script>
    <script>
        var secondImageFolder = 'imageuploads/aboutus/';
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        var imageFolder = 'imageuploads/main/';

        $(document).ready(function() {
            // Handle click event of update photo button
            $('#updatePhotoBtn').click(function() {
                var formData = new FormData($('#updateForm')[0]);
                $.ajax({
                    url: 'update_photo.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false, // Disable caching

                    success: function(response) {
                        if (response !== 'error') {
                            // Close the modal
                            $('#updateModal').modal('hide');

                            // Update the image in the div with a cache-busting query parameter
                            var cacheBuster = new Date().getTime(); // Generate a unique timestamp
                            $('.main-image').attr('src', imageFolder + response + '?cb=' + cacheBuster);

                            // Show success message
                            $('#successMessage').fadeIn().delay(2000).fadeOut();
                        } else {
                            alert('Failed to update photo.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while updating photo.');
                    }
                });
            });

            // Preview the selected image in the modal
            $('#newPhoto').change(function() {
                var input = $(this)[0];
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#imagePreview').html('<img class="modal-image" src="' + e.target.result + '">');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>


    <script>
        var secondImageFolder = 'imageuploads/aboutus/';
        $(document).ready(function() {
            // Handle click event of update second photo button
            $('#updateSecondPhotoBtn').click(function() {
                var formData = new FormData($('#updateSecondForm')[0]);
                $.ajax({
                    url: 'update_second_photo.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false, // Disable caching

                    success: function(secondresponse) {
                        if (secondresponse !== 'error') {
                            // Close the modal
                            $('#updateSecondModal').modal('hide');

                            // Update the image in the div
                            // var secondImageSrc = $('#newSecondPhoto').val().split('\\').pop();
                            var SecondcacheBuster = new Date().getTime(); // Generate a unique timestamp
                            $('.second-image').attr('src', secondImageFolder + secondresponse + '?cb=' + SecondcacheBuster);

                            // Show success message
                            $('#secondSuccessMessage').fadeIn().delay(2000).fadeOut();
                        } else {
                            alert('Failed to update second photo.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while updating second photo.');
                    }
                });
            });

            // Preview the selected second image in the modal
            $('#newSecondPhoto').change(function() {
                var input = $(this)[0];
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#secondImagePreview').html('<img class="modal-image" src="' + e.target.result + '">');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
    </script>

    <script>
        var newImageFolder = 'imageuploads/rooms/';

        $(document).ready(function() {
            // // Handle click event of update new photos button
            // $('#newUpdatePhotosBtn').click(function() {
            //     var newFormData = new FormData($('#newUpdateForm')[0]);
            //     $.ajax({
            //         url: 'new_update_photos.php',
            //         type: 'POST',
            //         data: newFormData,
            //         processData: false,
            //         contentType: false,
            //         success: function(response) {
            //             if (response === 'success') {
            //                 // Close the modal
            //                 $('#newUpdateModal').modal('hide');

            //                 // Reload the page to update the displayed new images
            //                 location.reload();
            //             } else {
            //                 alert('Failed to update new photos.');
            //             }
            //         },
            //         error: function() {
            //             alert('An error occurred while updating new photos.');
            //         }
            //     });
            // });

            // Handle click event of update new photos button
            $('#newUpdatePhotosBtn').click(function() {
                var newFormData = new FormData($('#newUpdateForm')[0]);
                $.ajax({
                    url: 'new_update_photos.php',
                    type: 'POST',
                    data: newFormData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        try {
                            var parsedResponse = JSON.parse(response);
                            if (parsedResponse.status === 'success') {
                                // Close the modal
                                $('#newUpdateModal').modal('hide');

                                // Reload the page to update the displayed new images
                                location.reload();
                            } else if (parsedResponse.status === 'error') {
                                // Show the infographic message with the error message
                                var messageHtml = '<div class="infographic-error"><img src="images/warning.png" alt="Error" style="max-width: 100%; max-height: 100px; margin-bottom: 10px;"><p style="font-size:16px; color:#ff0000; font-weight:bold; text-align:center;">' + parsedResponse.message + '</p></div>';
                                $('#newImagePreview').html(messageHtml);
                            } else {
                                // Handle other unexpected responses if needed
                                alert('An unexpected response was received.');
                            }
                        } catch (e) {
                            // Handle JSON parsing error
                            alert('An error occurred while processing the response.');
                        }
                    },
                    error: function() {
                        // Handle AJAX error
                        alert('An error occurred while updating new photos.');
                    }
                });
            });

            // Preview the selected new images in the modal
            $('#newPhotos').change(function() {
                var newInput = $(this)[0];
                if (newInput.files && newInput.files.length > 0) {
                    var newPreviewContainer = $('#newImagePreview');
                    newPreviewContainer.empty();

                    for (var i = 0; i < newInput.files.length; i++) {
                        var newReader = new FileReader();
                        newReader.onload = function(e) {
                            var newImageSrc = e.target.result;
                            var newImageElement = '<img class="new-modal-image" src="' + newImageSrc + '">';
                            newPreviewContainer.append(newImageElement);
                        };
                        newReader.readAsDataURL(newInput.files[i]);
                    }
                }
            });

            // // Handle click event of delete button for new images
            // $(document).on('click', '.new-delete-btn', function() {
            //     var newImageToDelete = $(this).data('image');
            //     deleteNewImage(newImageToDelete);
            // });

            // Handle click event of delete button for new images
            $(document).on('click', '.new-delete-btn', function() {
                var newImageToDelete = $(this).data('image');
                showConfirmationModal(newImageToDelete);
            });

            // Function to show the confirmation modal
            function showConfirmationModal(imageToDelete) {
                $('#confirmDeleteModal').modal('show');

                // Attach an event handler to the confirm delete button inside the modal
                $('#confirmDeleteBtn').off('click').on('click', function() {
                    // User confirmed to delete, proceed with AJAX call
                    deleteNewImage(imageToDelete);
                });
            }

            // Function to delete a new image
            function deleteNewImage(newImageName) {
                $.ajax({
                    url: 'delete_new_image.php',
                    type: 'POST',
                    data: {
                        image: newImageName
                    },
                    success: function(response) {
                        if (response === 'success') {
                            // Remove the deleted new image from the gallery
                            $('.new-gallery-image[src="' + newImageFolder + newImageName + '"]').parent().remove();

                            // Close the confirmation modal after successful deletion
                            $('#confirmDeleteModal').modal('hide');
                        } else {
                            alert('Failed to delete the new image.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while deleting the new image.');
                    }
                });
            }



            // Handle click event of the "Reset Images" button
$('#resetImagesBtn').click(function() {
  showResetConfirmationModal();
});

// Function to show the confirmation modal for reset
function showResetConfirmationModal() {
  $('#resetConfirmationModal').modal('show');

  // Attach an event handler to the reset button inside the modal
  $('#resetConfirmationBtn').off('click').on('click', function() {
    // User confirmed to reset images, proceed with the reset operation
    resetImages();
  });
}

// Function to reset images
function resetImages() {
  // Make AJAX call to the server-side script to perform the reset operation
  $.ajax({
    url: 'reset_images.php',
    type: 'POST',
    success: function(response) {
      if (response === 'success') {
        // Successfully reset images, show a success message or perform any additional tasks
        alert('Images have been successfully reset.');
      } else {
        alert('Failed to reset images.');
      }
    },
    error: function() {
      alert('An error occurred while resetting images.');
    }
  });

  // Close the confirmation modal after initiating the reset operation
  $('#resetConfirmationModal').modal('hide');
}

        });
    </script>

</body>

</html>