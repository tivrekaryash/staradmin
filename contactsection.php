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
    #success-message {
      display: none;
      position: fixed;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      border: 2px solid green;
      padding: 20px;
      z-index: 9999;
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
                  <section class="button-section">
                    <a href="dashboard.php" class="btn btn-primary btn-pill">Back to Homepage</a><br><br>
                  </section>
                  <br>
                  <div id="success-message" style="display: none;">Information updated successfully</div>
                  <!-- The contact details update section -->
                  <div id="contact-details">
                    <!-- Display current contact details here -->
                  </div>

                  <form id="contact-details-form">
                    <div class="form-group">
                      <label for="calling_number"><i class="fas fa-phone"></i> Calling Number:</label>
                      <input type="text" class="form-control form-control-lg" id="calling_number" name="calling_number" placeholder="Enter calling number">
                      <small class="form-text text-muted">Enter the calling number</small>
                    </div>

                    <div class="form-group">
                      <label for="whatsapp_number"><i class="fab fa-whatsapp"></i> WhatsApp Number:</label>
                      <input type="text" class="form-control form-control-lg" id="whatsapp_number" name="whatsapp_number" placeholder="Enter WhatsApp number">
                      <small class="form-text text-muted">Enter the WhatsApp number</small>
                    </div>

                    <div class="form-group">
                      <label for="email"><i class="fas fa-envelope"></i> Email Address:</label>
                      <input type="email" class="form-control form-control-lg" id="email" name="email" placeholder="Enter email address">
                      <small class="form-text text-muted">Enter the email address</small>
                    </div>

                    <div class="form-group">
                      <label for="facebook"><i class="fab fa-facebook"></i> Facebook Profile:</label>
                      <input type="text" class="form-control form-control-lg" id="facebook" name="facebook" placeholder="Enter Facebook profile link">
                      <small class="form-text text-muted">Enter the Facebook profile link</small>
                    </div>

                    <div class="form-group">
                      <label for="instagram"><i class="fab fa-instagram"></i> Instagram Profile:</label>
                      <input type="text" class="form-control form-control-lg" id="instagram" name="instagram" placeholder="Enter Instagram profile link">
                      <small class="form-text text-muted">Enter the Instagram profile link</small>
                    </div>

                    <div class="form-group">
                      <label for="address"><i class="fas fa-map-marker-alt"></i> Address:</label>
                      <input type="text" class="form-control form-control-lg" id="address" name="address" placeholder="Enter address">
                      <small class="form-text text-muted">Enter the address</small>
                    </div>

                    <div class="form-group">
                      <label for="location_link"><i class="fas fa-map-marker-alt"></i> Location Link:</label>
                      <input type="text" class="form-control form-control-lg" id="location_link" name="location_link" placeholder="Enter location link">
                      <small class="form-text text-muted">Enter the location link</small>
                    </div>

                    <div class="form-group">
                      <label for="map_iframe"><i class="fas fa-map-marker-alt"></i> Map Iframe:</label>
                      <textarea class="form-control form-control-lg" id="map_iframe" name="map_iframe" rows="6" placeholder="Enter map iframe" style="height:250px"></textarea>
                      <small class="form-text text-muted">Enter the map iframe code for your contact us section</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Update Contact Us Information</button>

                  </form>

                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- content-wrapper ends -->

        <?php include 'partials/_footer.php'; ?>

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
    $(document).ready(function() {
      // Function to fetch and display current about us details
      function loadAboutUsDetails() {
        $.ajax({
          url: 'get_contact_details.php', // Path to your server-side script that retrieves the data
          type: 'GET',
          dataType: 'json',
          success: function(data) {
            $('#calling_number').val(data.CallingNumber);
            $('#whatsapp_number').val(data.WhatsappNumber);
            $('#email').val(data.EmailAddress);
            $('#facebook').val(data.FacebookProfile);
            $('#instagram').val(data.InstagramProfile);
            $('#address').val(data.AddressText);
            $('#location_link').val(data.GooglemapsLink);
            $('#map_iframe').val(data.MapsiframeCode);
          },
          error: function(xhr, status, error) {
            console.log(error); // Handle error gracefully
          }
        });
      }

      // Load about us details on page load
      loadAboutUsDetails();

      // Function to update about us details
      $('#contact-details-form').submit(function(event) {
        event.preventDefault(); // Prevent form submission

        $.ajax({
          url: 'update_contact_details.php', // Path to your server-side script that updates the data
          type: 'POST',
          data: $(this).serialize(),
          success: function() {
            loadAboutUsDetails(); // Reload about us details after update
            $('#success-message').fadeIn().delay(3000).fadeOut(); // Show the success message and fade out after 3 seconds
          },
          error: function(xhr, status, error) {
            console.log(error); // Handle error gracefully
          }
        });
      });
    });
  </script>

</body>

</html>