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
<html>
<head>
  <title>Authorized Page</title>
</head>
<body>
  <h1>Welcome, <?php echo $_SESSION['username']; ?>!</h1>
  <p>This is an authorized page.</p>
  <!-- Add your authorized page content here -->
</body>
</html>
