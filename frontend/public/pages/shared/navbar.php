<?php
if(!isset($_SESSION)) {
  session_start();
}
include("../../../../backend/conn.php");
if (isset($_POST['pswBtn'])) {
  $userid = $_SESSION['user_id']; //get user id
  $result = mysqli_query($con, "SELECT * FROM user WHERE user_id = $userid");
  $row = mysqli_fetch_assoc($result);
  if($row['user_password'] == $_POST['currentpsw']) {
    if($_POST['newpsw'] == $_POST['confirmpsw']){
      $sql = "UPDATE user SET user_password = '$_POST[newpsw]' WHERE user_id = $userid";
      if (mysqli_query($con,$sql)) {
        echo'<script>alert("Your Password Had Changed Successfully!");</script>';
      }
      else {
      die('Error: ' . mysqli_error($con));
      }
      mysqli_close($con);
      }
    else {
      echo'<script>alert("New Password not match with confirm password.");</script>';
    }
  }
  else{
    echo'<script>alert("Current password not match.");</script>';
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!--BootStrap/css stylesheets-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/nav.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  </head>
  <!-- Nav Bar -->
  <body>
    <section id="navbar">
      <div class="container-fluid nav-color">
        <nav class="navbar maxHeight navbar-expand-lg navbar-light nav-color text-center px-5">
          <a class="navbar-brand" href="../customer/home.php">
            <img src="../../images/transparent-logo-svg.svg" alt="logo" class="logo">
          </a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ml-auto ">
              <?php
                if(!isset($_SESSION['username']) OR (isset($_SESSION['username']) && $_SESSION['privilege'] == "user")) {
                    echo'<li class="nav-item">';
                      echo'<a class="nav-link" href="../customer/product.php">';
                        echo'<i class="fas fa-shopping-bag"></i> Shop';
                      echo'</a>';
                    echo'</li>';
                }

                if(isset($_SESSION['username']) && $_SESSION['privilege'] == "user") {
                  echo('
                    <li class="nav-item">
                      <a class="nav-link" href="../customer/cart.php">
                      <i class="fas fa-shopping-cart"></i> Cart
                      </a>
                    </li>'
                  );
                }
              ?>
              <?php
                if(!isset($_SESSION['username'])) {
                  echo(
                  '<li class="nav-item">
                    <a class="nav-link login-btn" href="../shared/login.php">Login</a>
                  </li>');
                }
              ?>
              <?php
                if(isset($_SESSION['username'])) {
                  echo('
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-user mr-1"></i>'
                  );
                  if($_SESSION['privilege'] == "admin") {
                    echo "Admin ";
                  }elseif ($_SESSION['privilege'] == "owner"){
                    echo "Owner ";
                  }
                  echo($_SESSION['username']);
                  echo('</a>
                  <div class="dropdown-menu mr-2" aria-labelledby="navbarDropdownMenuLink">'
                  );
                  if($_SESSION['privilege'] != "user"){
                    echo('
                    <a class="dropdown-item" href="../admin/user.php">Manage Users</a>
                    <a class="dropdown-item" href="../admin/product.php">Manage Products</a>
                    <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Password</a>
                    <a class="dropdown-item" href="../../../../backend/logout.php">Logout</a>'
                    );
                  }
                  else{
                      echo "<a class='dropdown-item' href=\"profile.php\">Profile</a>";
                      echo('
                      <a class="dropdown-item" href="" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Edit Password</a>
                      <a class="dropdown-item" href="../customer/history.php">Purchase History</a>
                      <a class="dropdown-item" href="../../../../backend/logout.php">Logout</a>'
                    );
                  }
                }
                echo('</div>
                </li>');
              ?>
            </ul>
          </div>
        </nav>
        <!-- // Password edit window -->
        <form  method="post">
          <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pswWindow" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <p class="modal-title" id="pswWindow">Edit Password</p>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <input type="password" class="form-control mb-2" name="currentpsw" placeholder="Current Password">
                  <input type="password" class="form-control mb-2" name="newpsw" placeholder="New Password">
                  <input type="password" class="form-control mb-2" name="confirmpsw" placeholder="Confirm New Password">
                </div>
                <div class="modal-footer">
                  <input type="submit" name="pswBtn" class="btn btn-primary" value="Confirm"></input>
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </section>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>