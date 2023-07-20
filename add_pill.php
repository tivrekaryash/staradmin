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

if (isset($_POST['pillText'])) {
  $pillText = $_POST['pillText'];

  // Insert the new pill into the database
  $sql = "INSERT INTO pills (text) VALUES (?)";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param('s', $pillText);
  $stmt->execute();
  $insertedId = $stmt->insert_id; // Get the inserted pill ID
  $stmt->close();

  echo $insertedId; // Return the inserted pill ID as the response
}
?>
