<?php
phpinfo();
$host = "localhost";
$dbUsername = "PHPSCRIPT";
$dbPassword = "1234";
$dbname = "portfolio";

$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];

$conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  echo "Connected successfully";
  
$sql = "INSERT Into users (firstName, lastName, email, telephone) values
( '$firstName','$lastName','$email','$telephone' )";
mysqli_query($conn, $sql);

?>