<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
  // User is not logged in, redirect to the login page
  header("Location: dashboard.php");
  exit();
}

// Function to securely hash the password
function hashPassword($password) {
  // You can use a stronger hashing algorithm like bcrypt or Argon2
  return password_hash($password, PASSWORD_DEFAULT);
}

// Function to verify the password
function verifyPassword($password, $hashedPassword) {
  return password_verify($password, $hashedPassword);
}

// Include the database connection details
require_once 'db_config.php';

// Initialize error message and success message variables
$errorMsg = "";
$successMsg = "";

// Check if the login form is submitted
if (isset($_POST['login'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  // Validate the inputs
  if (empty($username) || empty($password)) {
    // Username or password is empty
    $errorMsg = "Username and password are required";
  } else {
    // Prepare and execute the SQL statement
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    // Check if the user exists
    if ($stmt->num_rows == 1) {
      $stmt->bind_result($hashedPassword);
      $stmt->fetch();

      // Verify the password
      if (verifyPassword($password, $hashedPassword)) {
        // Password is correct, set session variables
        $_SESSION['username'] = $username;

        // Set the success message
        $successMsg = "Login successful! Redirecting to the authorized page...";

        // Delay the redirection for 2 seconds
        header("Refresh: 2; URL=dashboard.php");
      } else {
        // Password is incorrect
        $errorMsg = "Invalid username or password";
      }
    } else {
      // User does not exist
      $errorMsg = "Invalid username or password";
    }

    $stmt->close();
  }
}

$conn->close();
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
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="images/favicon.png" />

  <style>
    .text-primary {
      color: #1f3bb3;
      font-weight: bold;
    }

    .text-primary.no-underline {
      text-decoration: none;
    }
  </style>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">

            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="images/logo.svg" alt="logo">
              </div>
              <h4>Hello! let's get started</h4>
              <h6 class="fw-light">Sign in to continue.</h6>

              <form class="pt-3" method="POST">
                <!-- Add the error message here -->
                <?php if (!empty($errorMsg)) { ?>
                  <div class="alert alert-danger"><?php echo $errorMsg; ?></div>
                <?php } ?>

                <!-- Add the success message here -->
                <?php if (!empty($successMsg)) { ?>
                  <div class="alert alert-success"><?php echo $successMsg; ?></div>
                <?php } ?>

                <div class="form-group">
                  <input type="email" class="form-control form-control-lg" name="username" placeholder="Username" required>
                </div>
                <div class="form-group">
                  <div class="input-group">
                    <input type="password" class="form-control form-control-lg" name="password" id="exampleInputPassword1" placeholder="Password" required>
                    <span class="input-group-addon">
                      <i class="fa fa-eye-slash" aria-hidden="true" id="togglePassword"></i>
                    </span>
                  </div>
                </div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                </div>
              </form>


              <div class="mt-4 text-center">
                Developed By <a href="https://cosmicwebapp.com/" class="text-primary no-underline">Cosmic Solutions</a>
              </div>
            </div>

          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
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
  <!-- endinject -->
</body>

</html>
