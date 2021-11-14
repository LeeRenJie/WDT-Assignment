<?php
//Start session
session_start();
//Connection to database
include("../../../../backend/conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from Form
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

  //Try to find is the user is exist or not
	$sql="SELECT * FROM user WHERE user_username='$username' and user_password='$password'";
  //If user exist
	if ($result=mysqli_query($con,$sql))  {
	  // Return the number of rows in result set
    $rownum=mysqli_num_rows($result);
	}

  //Store user data into variable
	while($row=mysqli_fetch_array($result)){
		$id = $row['user_id'];
    $privilege = $row['privilege'];
    $name = $row['user_name'];
    $email = $row['user_email'];
    $address = $row['user_address'];
    $phone = $row['user_phone_number'];
	}

  //Store user data into session
	if($rownum==1)  {
		$_SESSION['username']=$username;
		$_SESSION['user_id']=$id;
    $_SESSION['privilege']=$privilege;
    $_SESSION['name']=$name;
    $_SESSION['email']=$email;
    $_SESSION['address']=$address;
    $_SESSION['phone']=$phone;
    echo("<script>alert('Welcome Back User $name')</script>");
		echo("<script>window.location = '../customer/home.php'</script>");
	}
  //If user not exist
	else  {
		echo "<script>alert('Your Login Details are invalid. Please try again');</script>";
	}
  //Close connection of database
	mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login Page</title>
    <!-- link css and bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/login.css" rel="stylesheet">
  </head>
  <body>
    <!-- Include Navigation Bar -->
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid text-center size justify-content-center">
      <div class="px-3 padding-top">
        <div class="row">
          <div class="col-md">
            <form class="form-login" method="post">
              <h1 class="h3 mb-4 font-weight-normal py-2">Log in to Exclusive Pet Mart</h1>
              <input type="text" id="username" name="username" class="form-control mb-1"
              placeholder="Enter your username..." required autofocus>
              <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password..." required>
              <button class="btn-login mt-2" type="submit" name="loginBtn">Log in</button>
              <p class="mt-2 text-muted">Don't have an account? Sign up <a href = "../customer/signup.php">here</a></p>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Include Footer -->
    <?php include '../shared/footer.php';?>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
