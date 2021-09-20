<!doctype html>
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
      <form class="form-signin text-center my-4">
        <h1 class="h3 mb-3 font-weight-normal">Sign Up to Exclusive Pet Mart</h1>
        <label for="inputEmail" class="sr-only">Username</label>
        <input type="text" id="inputEmail" class="form-control mb-1" placeholder="Username" required autofocus>
        <label for="inputEmail" class="sr-only">Name</label>
        <input type="text" id="inputEmail" class="form-control mb-1" placeholder="Name" required autofocus>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control mb-1" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control mb-1" placeholder="Password" required>
        <label for="inputEmail" class="sr-only">Address</label>
        <input type="text" id="inputEmail" class="form-control mb-1" placeholder="Address" required autofocus>
        <label for="inputEmail" class="sr-only">Phone Number</label>
        <input type="number" id="inputEmail" class="form-control" placeholder="Phone Number" required autofocus>

        <button class="btn btn-primary btn-md mt-3" type="submit">Sign up</button>
        <p class="mt-2 mb-3 text-muted">Already have an account? Log in <a href="login.php">here</a></p>
        <p class="text-muted">Admin Press <a href="admin/login.php">Here</a></p>
      </form>
    </div>
    <?php include '../shared/footer.php';?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>
