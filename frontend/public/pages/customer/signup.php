<?php
 if (isset($_POST['signupBtn'])) {
	include("../../../../backend/conn.php");

	$sql="INSERT INTO customer (customer_password, customer_username, customer_name, customer_email, customer_address, customer_phone_number) VALUES ('$_POST[password]',LOWER('$_POST[username]'),'$_POST[name]',LOWER('$_POST[email]'),'$_POST[address]','$_POST[phoneNumber]')";

	if (!mysqli_query($con,$sql)){
		die('Error: ' . mysqli_error($con));
	}
	else {
		echo '<div class="alert alert-success" role="alert">Account Successfully Created!</div>
    <script>
		  window.location.href= "home.php";
		</script>';
	}

	mysqli_close($con);
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Signup</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="../../../src/stylesheets/signup.css" rel="stylesheet">
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid">
      <form class="form-signup text-center my-4" action="signup.php" method="post">
        <h1 class="h3 mb-3 font-weight-normal">Sign Up to Exclusive Pet Mart</h1>

        <label for="signupUsername" class="sr-only">Username</label>
        <input type="text" id="signupUsername" name="username" class="form-control mb-1" placeholder="Username" required="required" autofocus>

        <label for="signupName" class="sr-only">Name</label>
        <input type="text" id="signupName" name="name" class="form-control mb-1" placeholder="Name" required="required" autofocus>

        <label for="signupEmail" class="sr-only">Email address</label>
        <input type="email" id="signupEmail" name="email" class="form-control mb-1" placeholder="Email address" required="required" autofocus>

        <label for="signupPassword" class="sr-only">Password</label>
        <input type="password" id="signupPassword" name="password" class="form-control mb-1" placeholder="Password" required="required">

        <label for="signupAddress" class="sr-only">Address</label>
        <input type="text" id="signupAddress" name="address" class="form-control mb-1" placeholder="Address" required="required" autofocus>

        <label for="signupPhonenumber" class="sr-only">Phone Number</label>
        <input type="tel" id="signupPhonenumber" name="phoneNumber" class="form-control" placeholder="Phone Number" required="required" autofocus>

        <button class="signup-btn mt-3" name="signupBtn" type="submit">Sign up</button>
        <p class="mt-2 mb-3 text-muted">Already have an account? Log in <a href="login.php">here</a></p>
        <p class="text-muted">For admin click <a href="../admin/login.php">here</a></p>
      </form>
    </div>
    <?php include '../shared/footer.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
