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



    $oldPassword = $_POST['old_password'];
    $newPassword = $_POST['new_password'];

    if ($oldPassword == $old_pass) {

        // Update the password in the database for the user with $Eid
        $updateSql = "UPDATE employee SET password = '$newPassword' WHERE Eid = '$Eid'";
        mysqli_query($conn,$updateSql);

        echo'<div id="notification" style="display: none;">
        <center>Password changed successfully</center>
      </div>';
        
    } else {
      echo'<script>alert("Password validation failed")</script>';
      header('location:change_password.php');
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script>
  // Function to display the notification and redirect after 2 seconds
  function displayNotificationAndRedirect() {
    // Display the notification
    var notification = document.getElementById("notification");
    notification.style.display = "block";

    // Redirect to the desired page after 2 seconds
    setTimeout(function() {
      window.location.href = 'account.php'; // Replace 'account.php' with the page you want to redirect to
    }, 2000); // 2000 milliseconds (2 seconds)
  }

  // Call the function when the page loads (you can call it after successful password change)
  window.onload = displayNotificationAndRedirect;
</script>
</body>
</html>