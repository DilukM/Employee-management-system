
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
          <a href="home.php" >
            <span class="material-icons-sharp"> home </span>
            <h3>Home</h3>
          </a>
          <a href="account.php">
            <span class="material-icons-sharp"> person </span>
            <h3>Account</h3>
          </a>
          <a href="../Login/logout.php">
            <span class="material-icons-sharp"> logout </span>
            <h3>Logout</h3>
          </a>
          
        </div>
      </aside>
  <main>
    <div class="recent-orders red">
      <center><h1>Update password</h1></center>
    </div>
    <div class="recent-orders top-table">
      <div class="d-flex justify-content-center">
    <form method="POST" action="change_password1.php">
      <div class="mb-3">  
      <label for="old_password" class="form-label">Old Password</label>
      <input type="password" class="form-control" name="old_password" required>
      </div><br>
      <div class="mb-3">  
      <label for="new_password" class="form-label">New Password</label>
      <input type="password" class="form-control" name="new_password" required>
      </div><br>
      <center><input type="submit" value="Change Password" class="btn btn-primary"></center>
    </form>
    </div>
    </div>
</main>
</div>

  </body>
</html>
