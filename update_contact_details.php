<?php
include ('db_config.php');

// Get the updated about us details from the POST data
$calling_number_Post = $_POST['calling_number'];
$whatsapp_number_Post = $_POST['whatsapp_number'];
$email_Post = $_POST['email'];
$facebook_Post = $_POST['facebook'];
$instagram_Post = $_POST['instagram'];
$address_Post = $_POST['address'];
$location_link_Post = $_POST['location_link'];
$map_iframe_Post = $_POST['map_iframe'];

// Update the about us details in the database
$sql = "UPDATE contact_details SET 
  calling_number = '$calling_number_Post',
  whatsapp_number = '$whatsapp_number_Post',
  email_address = '$email_Post',
  facebook_profile = '$facebook_Post',
  instagram_profile = '$instagram_Post',
  address_text = '$address_Post',
  google_maps_link = '$location_link_Post',
  maps_iframe_code = '$map_iframe_Post'";

if ($conn->query($sql) === TRUE) {
  echo "About us information updated successfully";
} else {
  echo "Error updating about us information: " . $conn->error;
}

$conn->close();
?>
