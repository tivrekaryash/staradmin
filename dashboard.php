<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
  // User is not logged in, redirect to the login page
  header("Location: index.php");
  exit();
}

// The user is logged in, display the authorized page content
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
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="js/select.dataTables.min.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <style>
    .main-panel .card-body .card-buttons{
      transition: 0.2s ease-in-out;
    }
    .main-panel .card-body .card-buttons:hover{
      color: black;
      background-color: white;
      transform: scale(0.9);
      transition: 0.2s ease-in-out;
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
            <div class="col-md-6 col-lg-5 grid-margin stretch-card">
              <div class="card bg-dark card-rounded">
                <div class="card-body p-3">
                  <h4 class="card-title card-title-dash text-white mb-4">Contact Details</h4>
                  <p class="card-description text-white mb-4">Update Your Contact Details So Your Guests Can Easily Reach You.</p>
                  <a href="contactsection.php" class="btn btn-light btn-md card-buttons">Edit Contact Details</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 grid-margin stretch-card">
              <div class="card bg-dark card-rounded">
                <div class="card-body p-3">
                  <h4 class="card-title card-title-dash text-white mb-4">About Info & Room Rates</h4>
                  <p class="card-description text-white mb-4">Update Your Basic Info & Room Rates to Keep Your Guests Informed.</p>
                  <a href="roomsection.php" class="btn btn-light btn-md card-buttons">Edit Room Rates</a>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-lg-5 grid-margin stretch-card">
              <div class="card bg-dark card-rounded">
                <div class="card-body p-3">
                  <h4 class="card-title card-title-dash text-white mb-4">Image Uploader</h4>
                  <p class="card-description text-white mb-4">Update Your Site Images Here</p>
                  <a href="imageuploader.php" class="btn btn-light btn-md card-buttons">Click Here</a>
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
  <script src="vendors/chart.js/Chart.min.js"></script>
  <script src="vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
  <script src="vendors/progressbar.js/progressbar.min.js"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="js/off-canvas.js"></script>
  <script src="js/hoverable-collapse.js"></script>
  <script src="js/template.js"></script>
  <script src="js/settings.js"></script>
  <script src="js/todolist.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="js/jquery.cookie.js" type="text/javascript"></script>
  <script src="js/dashboard.js"></script>
  <script src="js/Chart.roundedBarCharts.js"></script>
  <!-- End custom js for this page-->
</body>

</html>
