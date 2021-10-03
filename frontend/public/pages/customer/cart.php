<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="../../../src/stylesheets/cart.css" rel="stylesheet" >
  <title>Cart Page</title>
</head>
<body>
  <?php include '../shared/navbar.php';?>
  <div class="container-fluid px-5">
    <div class="row">
      <div class="col-5">
        <div class="row headerrow">
          <h5>Product</h5>
        </div>
        <div class="row products">
          <input type="checkbox" class="checkboxs" name="DogFood200g"> <img src="../../images/food.jpg" alt="..." class="img-thumbnail"> <p class="productlabel"><label for="DogFood200g">Dog Food 200g</label> </p>
        </div>
        <div class="row products last-row">
          <input type="checkbox" class="checkboxs" name="DogToyssmall"> <img src="..." alt="..." class="img-thumbnail"> <p class="productlabel"><label for="DogToyssmall">Dog Toys small </label></p>
        </div>
      </div>
      <div class="col">
        <div class="row headerrow">
          <h5>Unit Price</h5>
        </div>
        <div class="row units">
          <p>RM 50</p>
        </div>
        <div class="row units last-row">
          <p>RM 133</p>
        </div>
      </div>
      <div class="col">
        <div class="row headerrow">
          <h5> Quantity </h5>
        </div>
        <div class="row quantity">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            1
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button">Add</button>
            <button class="dropdown-item" type="button">Deduct</button>
          </div>
        </div>
        </div>
        <div class="row quantity last-row">
        <div class="dropdown">
          <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            1
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenu2">
            <button class="dropdown-item" type="button">Add</button>
            <button class="dropdown-item" type="button">Deduct</button>
          </div>
        </div>
        </div>
      </div>
      <div class="col">
        <div class="row headerrow">
          <h5>Total price</h5>
        </div>
        <div class="row prices">
          <p>RM 100</p>
        </div>
        <div class="row prices last-row">
          <p>RM 133 </p>
        </div>
        <div class="row final">
          <p>RM 233 </p>
        </div>
      </div>
      <div class="col">
        <div class="row headerrow">
          <h5>Actions</h5>
        </div>
        <div class="row actions">
          <button type="button" class="btn btn-outline-dark buttons">Remove</button>
        </div>
        <div class="row actions last-row">
          <button type="button" class="btn btn-outline-dark buttons">Remove</button>
        </div>
        <div class="row final">
          <a href="checkout.php" type="button" class="btn btn-outline-dark buttons">Checkout</a>
        </div>
      </div>
    </div>
  </div>
  <?php include '../shared/footer.php';?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="cart.js"></script>
</body>
</html>