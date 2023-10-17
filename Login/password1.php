<?php
session_start();

if (!isset($_SESSION['Eid'])) {
    header("Location: ../Login/login-form.html");
    exit;
}

$Eid = $_SESSION['Eid'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "Project";

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql="SELECT password FROM employee WHERE Eid='$Eid'";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$old_pass=$row['password'];



    $newPassword = $_POST['new_password'];



        // Update the password in the database for the user with $Eid
        $updateSql = "UPDATE employee SET password = '$newPassword' WHERE Eid = '$Eid'";
        mysqli_query($conn,$updateSql);

        echo'<div id="notification" style="display: none;">
        <center>Password changed successfully</center>
      </div>';
        


?>
