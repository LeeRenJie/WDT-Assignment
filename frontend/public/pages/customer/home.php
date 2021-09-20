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
  <div class="container-fluid">
    <div class="row one img_one">
      <p>Exclusive Pet Mart
      </p>
    </div>
    <div class="row one img_two">
      <div class="col col-2">
        <p>Cats</p>
        <input type="button" value="View">
      </div>
      <div class="col-10">
        2 of 2
      </div>
    </div>
    <div class="row one img_three">
      <div class="col-10">
        1 of 2
      </div>
      <div class="col col-lg-2">
      <p>Dogs</p>
      <input type="button" value="View">
      </div>
    </div>
    <div class="row row-cols-3 one img_four">
      <div class="col">Column</div>
      <div class="col"> <img src="../../images/food.jpg" alt=""> <br> Food</div>
      <div class="col"> <img src="../../images/toys.jpg" alt=""> <br> Toys</div>
      <div class="col"></div>
      <div class="col"> <img src="../../images/healthcare.jpg" alt=""> <br> Healthcare</div>
      <div class="col"> <img src="../../images/gear.jfif" alt=""> <br> Gear</div>
    </div>
  </div>
  <?php include '../shared/footer.php';?>
</script>
</body>
</html>