<div class="card-body">
                                    <h2>Main Image</h2>
                                    <p class="subheading">Browse and Update Main Image</p>
                                    <?php
                                    $imageFolder = 'imageuploads/'; // Replace with the actual path to your image folder
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

                                <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
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






                                var imageFolder = 'imageuploads/';

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
      success: function(response) {
        if (response !== 'error') {
          // Close the modal
          $('#updateModal').modal('hide');

          // Update the image in the div
          $('.main-image').attr('src', imageFolder + response);

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










<?php
$imageFolder = 'imageuploads/'; // Replace with the actual path to your image folder

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

    // Generate a unique filename for the new image
    $extension = pathinfo($newPhoto['name'], PATHINFO_EXTENSION);
    $mainImageName = 'main_image.' . $extension; // Rename the image to "main_image"
    $imagePath = $imageFolder . $mainImageName;

    // Delete the old photo if it exists
    $oldPhoto = glob($imageFolder . 'main_image*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    if (!empty($oldPhoto)) {
        unlink($oldPhoto[0]);
    }

    if (move_uploaded_file($newPhoto['tmp_name'], $imagePath)) {
        // Update the image file name in the database
        $sql = "UPDATE images SET filename = '$mainImageName' WHERE id = 1";
        if ($conn->query($sql) === true) {
            // Return the new image name to the JavaScript code
            echo $mainImageName;
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





<!-- just trying -->
<script>

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