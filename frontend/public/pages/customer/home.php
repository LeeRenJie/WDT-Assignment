<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/home.css" rel="stylesheet" >
    <title>Home Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div>
      <div class="text-center py-5 dark-bg-container">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum, metus sit amet facilisis porta, sem eros eleifend mauris, volutpat porttitor orci orci in felis.</p>
      </div>
      <div class="row light-bg-container">
        <div class="col-4 ml-5 py-5">
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum, metus sit amet facilisis porta, sem eros eleifend mauris, volutpat porttitor orci orci in felis.</p>
          <a class="btn btn-1" href="">Button</a>
        </div>
      </div>
      <div class="row dark-bg-container">
        <div class="invisible col-7">
        </div>
        <div class="col-4 ml-5 py-5">
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dictum, metus sit amet facilisis porta, sem eros eleifend mauris, volutpat porttitor orci orci in felis.</p>
          <a class="btn btn-2" href="">Button</a>
        </div>
      </div>
      <div class="light-bg-container text-center">
        <h2 class="py-5"><u>Categories</u></h2>
        <div class="row">
          <div class="col mb-5 img-container">
            <a href="home-product.php?2">
              <img src="../../images/food.jpg" class="img" alt="Food Picture">
              <div class="caption">Food</div>
            </a>
          </div>
          <div class="col mb-5 img-container">
            <a href="home-product.php?1">
              <img src="../../images/toys.jpg" class="img" alt="Toys Picture">
              <div class="caption">Toys</div>
            </a>
          </div>
        </div>
        <div class="row">
          <div class="col mb-5 img-container">
            <a href="home-product.php?3">
              <img src="../../images/healthcare.jpg" class="img" alt="">
              <div class="caption">Healthcare</div>
            </a>
          </div>
          <div class="col mb-5 img-container">
            <a href="home-product.php?4">
              <img src="../../images/gear.jpg" class="img" alt="">
              <div class="caption">Gear</div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>