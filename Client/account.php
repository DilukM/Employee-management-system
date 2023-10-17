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

$conn = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
      rel="stylesheet"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="style.css" />
    <title>Project</title>

    <style>

tr td .editButton {
  margin-left: 15px;
  border: 1px solid rgba(132, 139, 200, 0.38);
  color:rgba(132, 139, 200, 0.38);
}

tr td .editButton:hover{
  color:rgba(1, 4, 93, 0.88);
}
    </style>

  </head>

  <body>

    <div class="container">
      <!-- Sidebar Section -->
      <aside>
        <div class="toggle">
          <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
          </div>
        </div>
        <div class="sidebar">
          <a href="home.php" >
            <span class="material-icons-sharp"> home </span>
            <h3>Home</h3>
          </a>
          <a href="account.php" class="active">
            <span class="material-icons-sharp"> person </span>
            <h3>Account</h3>
          </a>
          <a href="../Login/logout.php">
            <span class="material-icons-sharp"> logout </span>
            <h3>Logout</h3>
          </a>
          
        </div>
      </aside>
      <!-- End of Sidebar Section -->

      <!-- Main Content -->
      <main>
        <div class="recent-orders red">
          <center><h1>Home</h1></center>
          </div>

        <div class="recent-orders top-table">
          <div class="d-flex justify-content-center">
          <table class="table ds-remove">
                  
                    <tbody id="activity-table-body" class="mx-auto">
                    <?php
                      $Eid=$_SESSION['Eid'];
                      $sql="SELECT * FROM employee WHERE Eid='$Eid'";
                      $result = mysqli_query($conn, $sql);
                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              echo "<tr><td> Name</td><td>" . $row["Name"] . "</td></tr>";
                              echo "<tr><td> Email</td><td>" . $row["email"] . "</td></tr>";
                              echo "<tr><td>Telephone </td><td>" . $row["telephone"] . "</td></tr>";
                              echo '
                              <tr>
                              <td>Password</td>
                              <td>
                                  <input type="password" id="password-input" value="
                              ' . $row["password"] . '" disabled>';
                              echo '<button id="show-password-button" class="btn editButton">
                              <span class="material-icons-sharp" id="password-visibility-icon">visibility</span>
                          </button>

                                  <button id="change-password-button" class="btn editButton"><span class="material-icons-sharp">  edit </span></button>
                              </td>
                          </tr>';   
                          }
                      } else {
                          echo "<tr><td colspan='5'>No Assignments found</td></tr>";
                      }
                      ?>
                    </tbody>
                </table>
          </div>
        </div>
      </main>
      
      <!-- End of Main Content -->
      <div class="right-section">
        <div class="nav">
          <button id="menu-btn">
            <span class="material-icons-sharp"> menu </span>
          </button>
        </div>
        <!-- End of Nav -->
    </div>

    <script>
      // Function to get the value of a query parameter by name
      function getQueryParam(name) {
        const urlParams = new URLSearchParams(window.location.search);
        return urlParams.get(name);
      }

      // Get the message query parameter
      const message = getQueryParam("message");

      // Display the alert if a message is present
      if (message) {
        alert(message);
      }
    </script>
    <script src="index.js"></script>
    <script>
  document.getElementById('change-password-button').addEventListener('click', function() {
    window.location.href = 'change_password.php';
  });
</script>
<script>
    // Function to toggle password visibility
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password-input');
        const passwordVisibilityIcon = document.getElementById('password-visibility-icon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            passwordVisibilityIcon.textContent = 'visibility_off';
        } else {
            passwordInput.type = 'password';
            passwordInput.maxlength = '6';
            passwordVisibilityIcon.textContent = 'visibility';
        }
    }

    // Attach the click event to the show password button
    document.getElementById('show-password-button').addEventListener('click', togglePasswordVisibility);
</script>

    <?php mysqli_close($conn);?>
  </body>
</html>
