<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Customer Login</title>
    <!-- link css and bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/login.css" rel="stylesheet">
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid text-center">
      <div class="p-3 mb-2">
        <div class="row">
          <div class="col-md">
            <form class="form-login">
              <h1 class="h3 mb-4 font-weight-normal">Log in to Exclusive Pet Mart</h1>
              <label for="inputEmail" class="sr-only">Email or Username</label>
              <input type="text" id="inputEmail" class="form-control mb-1" placeholder="Email or Username" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <button class="btn-login mt-2" type="submit">Log in</button>
              <p class="mt-2 text-muted">Don't have an account? Sign up <a href = "signup.php">here</a></p>
              <p class="text-muted">Admin Press <a href = "../admin/login.php">here</a></p>
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
