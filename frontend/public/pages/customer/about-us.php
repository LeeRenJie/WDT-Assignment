<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link rel="stylesheet" href="../../../src/stylesheets/about-us.css">
  <title>About Us Page</title>
</head>
<body>
  <?php include '../shared/navbar.php';?>
  <div class="about-container">
    <div class="container-fluid">
      <div class="container pt-4">
        <div class="row">
          <div class="col-6">
            <h1 class="mb-4">About Exclusive Pet Mart</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse suscipit, ligula et pharetra bibendum, orci diam condimentum nisl, at convallis massa neque ac neque. Proin vel ullamcorper lorem. Nullam feugiat consectetur nisl, quis rhoncus nibh dignissim non. Proin scelerisque augue pulvinar venenatis fringilla. Aenean posuere consequat rutrum. Maecenas placerat eros rutrum hendrerit auctor. Fusce quam ex, ornare et ex vitae, semper commodo nulla.</p>
          </div>
          <div class="col-6">
            <img class="rounded float-right mr-4" src="../../images/logo-png.png" alt="" style="width:250px;height:250px;z-index:1;">
          </div>
        </div>
      </div>
    </div>

    <svg class="wave" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#DEBA9D" fill-opacity="1" d="M0,192L80,197.3C160,203,320,213,480,192C640,171,800,117,960,85.3C1120,53,1280,43,1360,37.3L1440,32L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>

    <!--mission, vision and values-->
    <section id="mission-container">
      <div class="container-fluid coloured-section text-center ">
        <div class="row">
          <div class="col-lg-4 box">
            <i class="fas fa-check-circle icon fa-4x"></i>
            <h3 class="box-title">Mission</h3>
            <p>So easy to use, even your dog could do it.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="fas fa-eye icon fa-4x"></i>
            <h3 class="box-title">Vision</h3>
            <p>We have all the dogs, the greatest dogs.</p>
          </div>

          <div class="col-lg-4 box">
            <i class="fas fa-heart icon fa-4x"></i>
            <h3 class="box-title">Values</h3>
            <p>Find the love of your dog's life or your money back.</p>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!--Testimonials-->


  <?php include '../shared/footer.php';?>
</body>
</html>