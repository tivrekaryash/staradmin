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

    <link rel="shortcut icon" href="images/favicon.png" />

    <style>
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
                                <div class="card-body aboutuploader">
                                    <h2>About Us Image</h2>
                                    <p class="subheading">Browse and Update About Us Image</p>
                                    <?php

                                    $secondImageFolder = 'imageuploads/second/'; // Replace with the actual path to your second image folder
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
        var secondImageFolder = 'imageuploads/second/';
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        var secondImageFolder = 'imageuploads/second/';
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

</body>

</html>