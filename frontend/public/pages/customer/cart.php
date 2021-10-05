<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/cart.css">
    <title>About Us Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid whole_page">
      <div class="row header_row">
        <div class="col-4 .col-md-4">
          <input type="checkbox" class="select_all" name="select_all"> <p class="header text_deco header_text">Product</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_deco header_text">Unit Price</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_deco header_text">Quantity</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_deco header_text">Total price</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_deco header_text">Actions</p>
        </div>
      </div>
      <div class="row first_row">
        <div class="col-4 .col-md-4">
          <input type="checkbox" class="checkboxs" name="DogFood200g"> <img src="../../images/food.jpg" alt="..." class="img-thumbnail"> <p class="productlabel text_deco text_margin"><label for="DogFood200g">Dog Food 200g</label> </p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_deco">RM50</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_deco">3</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_deco">RM150</p>
        </div>
        <div class="col-2 .col-md-4">
          <button type="button" class="btn btn-outline-dark buttons">Remove</button>
        </div>
      </div>
      <div class="row last_row">
        <div class="col-4 .col-md-4">
          <p class="text_margin text_deco empty_box">test</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_deco empty_box">test</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_deco empty_box">test</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_deco">RM150</p>
        </div>
        <div class="col-2 .col-md-4">
          <button type="button" class="btn btn-outline-dark buttons">Checkout</button>
        </div>
      </div>
    </div>
  <?php include '../shared/footer.php';?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="cart.js"></script>
</body>
</html>