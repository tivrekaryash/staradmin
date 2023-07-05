<?php
include ('db_config.php');

// Get the updated about us details from the POST data
$heading2 = $_POST['heading'];
$subheading2 = $_POST['subheading'];
$paragraph2 = $_POST['paragraph'];
$roomname2 = $_POST['roomname'];
$roomrate2 = $_POST['roomrate'];

// Update the about us details in the database
$sql = "UPDATE about_us SET 
  heading = '$heading2',
  subheading = '$subheading2',
  paragraph = '$paragraph2',
  roomname = '$roomname2',
  roomrate = '$roomrate2'";

if ($conn->query($sql) === TRUE) {
  echo "About us information updated successfully";
} else {
  echo "Error updating about us information: " . $conn->error;
}

$conn->close();
?>
