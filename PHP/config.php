<?php
date_default_timezone_set('Asia/Kolkata');
$url = 'http://localhost/internship-2'; // Change server url

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "internship";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>