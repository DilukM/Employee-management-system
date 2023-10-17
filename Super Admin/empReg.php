<?php

session_start();

  
  // If the session is not active, redirect to the login page
  if (!isset($_SESSION['Eid'])) {
    header("Location: ../Login/login-form.html"); // Change "login.php" to the actual login page URL
    exit; // Ensure no further code execution
}

  $servername = "localhost";
  $username = "root";
  $password = "";
  $database = "Project";

  $conn = mysqli_connect($servername,$username,$password,$database);

  // Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

  $eid=$_POST["eid"];
  $tele=$_POST["tele"];
  $name=$_POST["name"];
  $email=$_POST["email"];
  $des=$_POST["des"];
  $userT=$_POST["userT"];

  $sql= "INSERT INTO employee VALUES('$eid','$tele','$name','$email','$des','123','$userT')";


  if (mysqli_query($conn, $sql)) {
    $message = "Form submitted successfully!";
    // Redirect back to the emp.html page with the message as a query parameter
    header("Location: emp.php?message=" . urlencode($message));
    exit;

  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }


mysqli_close($conn);
?>