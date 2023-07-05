<?php
include('db_config.php');

// Query to retrieve about us details from the database
$sql = "SELECT * FROM about_us";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Create an array with the about us details
  $aboutUsDetails = array(
    'heading1' => $row['heading'],
    'subheading1' => $row['subheading'],
    'paragraph1' => $row['paragraph'],
    'roomname1' => $row['roomname'],
    'roomrate1' => $row['roomrate']
  );

  // Return the about us details as JSON response
  header('Content-Type: application/json');
  echo json_encode($aboutUsDetails);
} else {
  echo "No about us details found";
}

$conn->close();
?>
