<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/about-us.css">
    <title>About Us Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid">
      <section id="about">
        <div class="row px-5 py-3 dark-coloured-section about-container">
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
      <section id="testimonials">

      </section>
    </div>
    <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#F5E8C7" fill-opacity="1" d="M0,192L80,197.3C160,203,320,213,480,192C640,171,800,117,960,85.3C1120,53,1280,43,1360,37.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>
    <?php include '../shared/footer.php';?>
    <script src="about-us.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>