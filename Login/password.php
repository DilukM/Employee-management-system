
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
  </head>
  <body>
    <div class="container">
    <aside>
        <div class="toggle">
          <div class="close" id="close-btn">
            <span class="material-icons-sharp"> close </span>
          </div>
        </div>
        <div class="sidebar">
          <a href="../Login/password.php" class="active">
            <span class="material-icons-sharp"> password </span>
            <h3>New Password</h3>
          </a>
          <a href="../Login/logout.php">
            <span class="material-icons-sharp"> logout </span>
            <h3>Logout</h3>
          </a>
          
        </div>
      </aside>
      <main>
        <div class="recent-orders red">
          <center><h1>Set a New Password</h1></center>
        </div>
        <div class="recent-orders top-table">
          <div class="d-flex justify-content-center">
            <form method="POST" action="password1.php" onsubmit="return validateForm()">
              <div class="mb-3">  
                <label for="new_password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="new_password" name="new_password" required>
              </div>
              <br>
              <div class="mb-3">  
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" required>
              </div>
              <br>
              <center><input type="submit" value="Change Password" class="btn btn-primary"></center>
            </form>
          </div>
        </div>
      </main>
    </div>

    <script>
      function validateForm() {
        var newPassword = document.getElementById("new_password").value;
        var confirmNewPassword = document.getElementById("confirm_password").value;

        if (newPassword !== confirmNewPassword) {
          alert("Passwords do not match. Please make sure both passwords are the same.");
          return false;
        }

        return true;
      }
    </script>
  </body>
</html>
