<?php
session_start();
include("../../../../backend/conn.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
	// username and password sent from Form
	$username=mysqli_real_escape_string($con,$_POST['username']);
	$password=mysqli_real_escape_string($con,$_POST['password']);

	$sql="SELECT * FROM user WHERE user_username='$username' and user_password='$password'";
	if ($result=mysqli_query($con,$sql))  {
	  // Return the number of rows in result set
    $rownum=mysqli_num_rows($result);
	}

	while($row=mysqli_fetch_array($result)){
		$id = $row['user_id'];
    $privilege = $row['privilege'];
    $name = $row['user_name'];
    $email = $row['user_email'];
    $address = $row['user_address'];
    $phone = $row['user_phone_number'];
	}

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
	else  {
		echo "<script>alert('Your Login Details are invalid. Please try again');</script>";
	}
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
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid text-center size">
      <div class="px-3 pt-5">
        <div class="row">
          <div class="col-md">
            <form class="form-login" method="post">
              <h1 class="h3 mb-4 font-weight-normal">Log in to Exclusive Pet Mart</h1>
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
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
