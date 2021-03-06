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
    <!-- Include Navigation Bar -->
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid">
      <section id="about">
        <div class="row px-5 py-3 graback about-container">
          <div class="col-6 title">
            <h1 class="mt-4 mb-4">About Exclusive Pet Mart</h1>
            <p class="mt-4 text-justify desc">In our online pet supply store, Exclusive Pet Mart (EPM), we sell all kinds of necessities for pets including dogs and cats such as toys, treats, food, bed, and anything else related to the pet's health and wellness.  We ensure our customers' pets could get the best nutrition and best gear from our store to improve their quality of life.</p>
          </div>
          <div class="col-6">
            <img class="rounded float-right header-img mr-5" src="../../images/cat&dog.svg" alt="cat and dog picture">
          </div>
        </div>
      </section>

      <section id="missions">
        <div class="row light-coloured-section text-center mission-container">
          <div class="col-lg-4 box">
            <i class="fas fa-check-circle icon fa-4x"></i>
            <h3 class="box-title">Mission</h3>
            <p>Fulfill the needs of every pet parent for their furry child around the globe.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="fas fa-eye icon fa-4x"></i>
            <h3 class="box-title">Vision</h3>
            <p>A world where all pets can remain happy, healthy, and receive the best quality of products in their entire life.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="fas fa-heart icon fa-4x"></i>
            <h3 class="box-title">Values</h3>
            <p>All products are safe for furry kids.</p>
          </div>
        </div>
      </section>

      <div class="row dark-coloured-section text-center">
        <h2 class="py-5"><u>Categories</u></h2>
        <div class="row">
          <div class="col mb-5 img-container">
            <a href="home-product.php?2">
              <img src="../../images/food.jpg" class="img img-thumbnail" alt="Food Picture">
              <div class="caption">Food</div>
            </a>
          </div>

          <div class="col mb-5 img-container">
            <a href="home-product.php?1">
              <img src="../../images/toys.jpg" class="img img-thumbnail" alt="Toys Picture">
              <div class="caption">Toys</div>
            </a>
          </div>
        </div>

        <div class="row">
          <div class="col mb-5 img-container">
            <a href="home-product.php?3">
              <img src="../../images/healthcare.jpg" class="img img-thumbnail" alt="Healthcare Picture">
              <div class="caption">Healthcare</div>
            </a>
          </div>
          <div class="col mb-5 img-container">
            <a href="home-product.php?4">
              <img src="../../images/gear.jpg" class="img img-thumbnail" alt="Gear Picture">
              <div class="caption">Gear</div>
            </a>
          </div>
        </div>
      </div>
    </div>
    <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#F5E8C7" fill-opacity="1" d="M0,192L80,197.3C160,203,320,213,480,192C640,171,800,117,960,85.3C1120,53,1280,43,1360,37.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    <!-- Include Footer -->
    <?php include '../shared/footer.php';?>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>