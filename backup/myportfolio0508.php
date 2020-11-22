<?php
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$email = $_POST['email'];
$telephone = $_POST['telephone'];
$jobDetails = $_POST['jobDetails'];

if (!empty($firstName) || !empty($lastName)  || !empty($email) || !empty($jobDetails) || !empty($telephone)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "myportfolio0508";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT email From jobregistration Where email = ? Limit 1";
     $INSERT = "INSERT Into jobregistration (firstName, lastName, email, telephone, jobDetails) values( ?, ?, ?, ?, ?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("sssis", $firstName, $lastName, $email, $telephone,$jobDetails );
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already registered using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All fields are required";
 die();
}
?>