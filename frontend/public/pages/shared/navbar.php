<?php
if(!isset($_SESSION)) {
  session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!--BootStrap/css stylesheets-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/nav.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
  </head>
  <!-- Nav Bar -->
  <body>
    <section id="navbar">
      <div class="container-fluid nav-color">
        <div class = "container">
          <nav class="navbar navbar-expand-lg navbar-light nav-color text-center">
            <a class="navbar-brand" href="../customer/home.php">
              <img src="../../images/transparent-logo-svg.svg" alt="logo" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
              <ul class="navbar-nav ml-auto ">
                <li class="nav-item">
                  <a class="nav-link" href="../customer/product.php">
                    <i class="fas fa-shopping-bag"></i> Shop
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="../customer/search.php">
                    <i class="fas fa-search"></i> Search
                  </a>
                </li>
                <?php
                  if(isset($_SESSION['username']) && !$_SESSION['admin']) {
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
                    echo('<li class="nav-item">
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
                    if($_SESSION['admin']) {
                      echo("Admin {$_SESSION['username']}");
                    }else{
                      echo($_SESSION['username']);
                    }
                    echo('</a>
                    <div class="dropdown-menu mr-2" aria-labelledby="navbarDropdownMenuLink">'
                    );
                    if($_SESSION['admin']){
                      echo('
                      <a class="dropdown-item" href="../admin/user.php">Manage Users</a>
                      <a class="dropdown-item" href="../admin/product.php">Manage Products</a>
                      <a class="dropdown-item" href="#" onclick="togglepopup()">Edit Password</a>
                      <a class="dropdown-item" href="../../../../backend/logout.php">Logout</a>'
                      );
                    }
                    else{
                        echo "<a class='dropdown-item' href=\"profile.php?id=";
                        echo $_SESSION['user_id'];
                        echo "\">Profile</a>";
                        echo('
                        <a class="dropdown-item" href="#" onclick="togglepopup()">Edit Password</a>
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

          <div class = "full-screen hidden" id="popform">
            <form action="#" class="form-container">
              <div class = "row">
                <div class ="col-10">
                  <div class = "form-group row justify-content-center py-4">
                    <h2 class="pl-5"><u>Edit Password</u></h2>
                  </div>
                </div>
                <div class ="col-1">
                  <div class = "form-group row">
                    <a class="symbol pt-4 pl-2" onclick="closeForm()">
                      <i class="fas fa-times"></i>
                    </a>
                  </div>
                  <div class ="col-1"></div>
                </div>
              </div>
              <div class = "row">
                <div class ="col-5 pr-5">
                  <div class = "form-group row justify-content-end">
                    <label for ="curpsw">Current Password :</label>
                  </div>
                  <div class = "form-group row justify-content-end">
                    <label for ="newpsw">New Password :</label>
                  </div>
                  <div class = "form-group row justify-content-end">
                    <label for ="confirmpsw">Confirm Password :</label>
                  </div>
                </div>
                <div class ="col-6">
                  <div class = "form-group row pb-1">
                    <input class="pswInput" type="text" name="currentpsw" placeholder = "Enter Current password.." name="curpsw" required autofocus>
                  </div>
                  <div class = "form-group row pb-1">
                    <input class="pswInput" type="password" name="newpsw" placeholder = "Enter New password.." name="newpsw" required autofocus>
                  </div>
                  <div class = "form-group row">
                    <input class="pswInput" type="password" name="confirmpsw" placeholder = "Enter your new password again.." name="confirmpsw" required autofocus>
                  </div>
                </div>
              </div>
              <div class = "form-group row">
                <div class ="col-9">
                </div>
                <div class ="col-3 justify-content-center">
                  <input class="btn-sub" name="pswBtn" type="submit" value="Confirm">
                </div>
              </div>
            </form>
          </div>

        </div>
      </div>
    </section>
    <script>
    function togglepopup() {
      document.getElementById("popform").style.display = "block";
    }
    function closeForm() {
      document.getElementById("popform").style.display = "none";
    }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  </body>
</html>