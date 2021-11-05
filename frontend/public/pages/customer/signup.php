<?php
if (isset($_POST['signupBtn'])) {
  include("../../../../backend/conn.php");
  $defaultPic = "../../images/default.jpg";
  $imageFileType = strtolower(pathinfo($defaultPic,PATHINFO_EXTENSION));
	$defaultImg = base64_encode(file_get_contents($defaultPic));
  $image = 'data:image/'.$imageFileType.';base64,'.$defaultImg;
  $privilege = 'user';
  $validation_query = "SELECT * FROM user";
  $validation_query_run = mysqli_query($con, $validation_query);


  # form validation for signup
  $check_username = strtolower($_POST['username']);
  $check_number = $_POST['phoneNumber'];
  $num_length = strlen($check_number);
  $check_mail = $_POST['email'];
  $mail_pattern = "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^"; 


  #form validation for mail to prevent same email address to register twice
  if(mysqli_num_rows($validation_query_run) > 0)
  {
    foreach($validation_query_run as $row)
    {
      if($row['user_email'] == $check_mail)
      {
        $toast_message = '<div class="alert alert-success">Email already exists</div>';
        /*
        echo'<div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">';
          echo"<div class=\"d-flex\">";
            echo"<div class=\"toast-body\">";
              echo"Hello, world! This is a toast message.";
            echo"</div>";
            echo"<button type=\"button\" class=\"btn-close me-2 m-auto\" data-bs-dismiss=\"toast\" aria-label=\"Close\"></button>";
          echo'</div>';
        echo'</div>';
        */
      }
      else if($row['user_username'] == $check_username)
      {
        echo("<script>alert('Username already exists!')</script>");
      }
    }
  }
  
  #form validation for phone number and email
  else if(!preg_match("/^[0-9]*$/", $check_number)){
    echo("<script>alert('Only numeric value is allowed for phone number!')</script>");
  }

  #form validation for input length
  else if($num_length < 12 OR $num_length > 12){
    echo("<script>alert('Phone number must have 12 digits!!')</script>");
  }

  else{
    $username = strtolower($_POST['username']);
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $name = $_POST['name'];
    $phonenumber = $_POST['phoneNumber'];
    $address = $_POST['address'];


    $sql = "INSERT INTO user (user_password, user_username, user_name, user_image, user_email, user_address, user_phone_number, privilege) VALUES ('$password', '$username', '$name', '$image', '$email', '$address', '$phonenumber', '$privilege')";
    $result = mysqli_query($con, $sql);

    if($result){
      echo("<script>alert('Your Registration is Successfully!')</script>");
      echo("<script>window.location = '../shared/login.php'</script>");
    }
    else{
      echo("<script>alert('Error! pls try again')</script>");
    }
  }
  mysqli_close($con);
  
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">
    <!-- Bootstrap core CSS -->
    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="../../../src/stylesheets/signup.css" rel="stylesheet">
    <title>Sign up</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid">
      <div class="toast toast-visible mt-5">
          Sample toast message
      </div>
      <form class="form-signup text-center my-4" action="signup.php" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 font-weight-normal">Sign Up to Exclusive Pet Mart</h1>
        <!-- username -->
        <label for="signupUsername" class="sr-only">Username</label>
        <input type="text" id="signupUsername" name="username" class="form-control mb-1" placeholder="Username" required="required" autofocus>
        <!-- name -->
        <label for="signupName" class="sr-only">Name</label>
        <input type="text" id="signupName" name="name" class="form-control mb-1" placeholder="Name" required="required" autofocus>
        <!-- email -->
        <label for="signupEmail" class="sr-only">Email address</label>
        <input type="email" id="signupEmail" name="email" class="form-control mb-1" placeholder="Email address" required="required" autofocus>
        <!-- password -->
        <label for="signupPassword" class="sr-only">Password</label>
        <input type="password" id="signupPassword" name="password" class="form-control mb-1" placeholder="Password" required="required" minlength="5">
        <!-- address -->
        <label for="signupAddress" class="sr-only">Address</label>
        <input type="text" id="signupAddress" name="address" class="form-control mb-1" placeholder="Address" required="required" autofocus>
        <!-- phone number -->
        <label for="signupPhonenumber" class="sr-only">Phone Number</label>
        <input type="tel" id="signupPhonenumber" name="phoneNumber" class="form-control" placeholder="Phone Number" required="required" autofocus>
        <!-- signup button -->
        <button class="signup-btn mt-3" name="signupBtn" type="submit">Sign up</button>
        <p class="mt-2 mb-3 text-muted">Already have an account? Log in <a href="../shared/login.php">here</a></p>
      </form>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
