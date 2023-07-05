<?php
include('db_config.php');

// Query to retrieve about us details from the database
$sql = "SELECT * FROM contact_details";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();

  // Create an array with the about us details
  $aboutUsDetails = array(
    'CallingNumber' => $row['calling_number'],
    'WhatsappNumber' => $row['whatsapp_number'],
    'EmailAddress' => $row['email_address'],
    'FacebookProfile' => $row['facebook_profile'],
    'InstagramProfile' => $row['instagram_profile'],
    'AddressText' => $row['address_text'],
    'GooglemapsLink' => $row['google_maps_link'],
    'MapsiframeCode' => $row['maps_iframe_code']
  );

  // Return the about us details as JSON response
  header('Content-Type: application/json');
  echo json_encode($aboutUsDetails);
} else {
  echo "No about us details found";
}

$conn->close();
?>
