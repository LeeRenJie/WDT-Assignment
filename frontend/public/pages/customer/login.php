<!doctype html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <title>Customer Login</title>
            <!-- link css and bootstrap -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link href="../../../src/stylesheets/login.css" rel="stylesheet">
        </head>
        <body class="text-center">
        <div class="container-fluid">
        <div class="header">
            <div class="header-inner"><?php include '../shared/navbar.php';?></div>       
        </div>
        <div class="content">         
                <form class="form-login">
                <h1 class="h3 mb-3 font-weight-normal">Log in to Exclusive Pet Store</h1>
                <label for="inputEmail" class="sr-only">Email or Username</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Email or Username" required autofocus>
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <br>
                <button class="btn btn-md btn-primary btn-block" type="submit">Log in</button>
                <br>
                <a href = "signup.html">Don't have an account? Sign up here</a>
                <p>Admin Press <a href = "../admin/login.html">here</a></p>
                </form> 
        </div>
        <div class="footer">
            <div class="footer-inner"><?php include '../shared/footer.php';?></div>
        </div>
        </div>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        </body>
    </html>
    