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
?>