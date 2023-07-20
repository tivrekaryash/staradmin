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




        /* css for pill shape */
        .pill-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 10px;
            background-color: #f0f0f0;
        }

        .pill {
            display: flex;
            align-items: center;
            padding: 5px 10px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 20px;
        }

        .pill-text {
            margin-right: 5px;
        }

        .pill-close {
            cursor: pointer;
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
                            <div class="container mt-5">
    <div class="pill-container" id="pillContainer">
        <?php
        // Retrieve pill data from the database and generate existing pills
        $sql = "SELECT * FROM pills";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="pill"><span class="pill-text">' . $row['text'] . '</span><span class="pill-close" data-id="' . $row['id'] . '">×</span></div>';
            }
        }
        ?>
    </div>
    <div class="input-group mt-3">
        <input type="text" class="form-control" id="pillInput" placeholder="Enter pill text">
        <div class="input-group-append">
            <button class="btn btn-primary" id="addPillBtn">+</button>
        </div>
    </div>
</div>
                            </div>
                    </div>
                        <div class="col-lg-12 grid-margin stretch-card">
                            
                            <div class="card">

                            <div class="container mt-5">
    <div class="pill-container" id="pillContainer">
        <?php
        // Retrieve pill data from the database and generate existing pills
        $sql = "SELECT * FROM pills";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<div class="pill"><span class="pill-text">' . $row['text'] . '</span><span class="pill-close" data-id="' . $row['id'] . '">×</span></div>';
            }
        }
        ?>
    </div>
    <div class="input-group mt-3">
        <input type="text" class="form-control" id="pillInput" placeholder="Enter pill text">
        <div class="input-group-append">
            <button class="btn btn-primary" id="addPillBtn">+</button>
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
        var newImageFolder = 'imageuploads/rooms/';

        $(document).ready(function() {
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
                        if (response === 'success') {
                            // Close the modal
                            $('#newUpdateModal').modal('hide');

                            // Reload the page to update the displayed new images
                            location.reload();
                        } else {
                            alert('Failed to update new photos.');
                        }
                    },
                    error: function() {
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

            // Handle click event of delete button for new images
            $(document).on('click', '.new-delete-btn', function() {
                var newImageToDelete = $(this).data('image');
                deleteNewImage(newImageToDelete);
            });

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
                        } else {
                            alert('Failed to delete the new image.');
                        }
                    },
                    error: function() {
                        alert('An error occurred while deleting the new image.');
                    }
                });
            }
        });
    </script>

    <script>
       // Remove pill on close button click
    $(document).on('click', '.pill-close', function() {
        var pillId = $(this).data('id');
        $(this).parent().remove();

        // Send AJAX request to delete pill from the database
        $.ajax({
            url: 'delete_pill.php',
            method: 'POST',
            data: {
                pillId: pillId
            },
            success: function(response) {
                console.log(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });

    // Add new pill on button click
    $('#addPillBtn').click(function() {
        var pillText = $('#pillInput').val();

        // Send AJAX request to add pill to the database
        $.ajax({
            url: 'add_pill.php',
            method: 'POST',
            data: {
                pillText: pillText
            },
            success: function(response) {
                console.log(response);

                // Generate new pill and append it to the pill container
                var newPill = '<div class="pill"><span class="pill-text">' + pillText + '</span><span class="pill-close" data-id="' + response + '">×</span></div>';
                $('#pillContainer').append(newPill);

                // Clear input text box
                $('#pillInput').val('');
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
    </script>

</body>

</html>