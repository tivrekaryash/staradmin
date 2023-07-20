<?php
$host = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'satvacottagelive';

// Attempt to connect to the database
$conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['pillId'])) {
  $pillId = $_POST['pillId'];

  // Delete the pill from the database
  $sql = "DELETE FROM pills WHERE id = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('i', $pillId);
  $stmt->execute();
  $stmt->close();
}
?>
