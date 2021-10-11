<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/checkout.css">
    <title>Checkout Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid whole_page">
      <div class="row header_row pt-2">
        <div class="col-4 .col-md-4">
          <p class="text-center pt-3">Name :</p>
          <br>
          <p class="text-center ">Delivery Address :</p>
        </div>
        <div class="col-4 col-md-4">
          <p class="text-center font-weight-bold pt-3">Lee Ren Jie 0123456789</p>
          <br>
          <p class="text-center font-weight-light">65,Jalan Halo, Bye bye, bla bla bla, 58200</p>
        </div>
        <div class="col-4 .col-md-4 text-center mt-2">
          <button type="button" class="btn btn-outline-dark buttons">Change</button>
        </div>
      </div>
      <div class="row header_row">
        <div class="col-4 .col-md-4">
          <p class="header text_design header_text pl-3">Products Ordered</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_design header_text text-center">Unit Price</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_design header_text text-center">Amount</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_design header_text text-center">Total Price</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_design header_text text-center">Status of delivery</p>
        </div>
      </div>
      <div class="row first_row">
        <div class="col-4 .col-md-4">
          <img src="../../images/food.jpg" alt="..." class="img-thumbnail mr-3 p-2"> <p class="product_label text_design text_margin"><label for="DogFood200g">Dog Food 200g</label> </p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_design text-center">RM50</p>
        </div>
        <div class="col-2 .col-md-4 text-center">
          <p class="text_margin text_design text-center">3</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_design text-center">RM150</p>
        </div>
        <div class="col-2 .col-md-4 text-center">
          <p class="text_margin text_design text-center">Completed</p>
        </div>
      </div>
      <div class="row footer_row">
        <div class="col-6 .col-md-4">
          <div class="form-group row text_margin text_design">
            <label for="credit_card_num" class="col-sm-4 col-form-label">Credit Card Number :</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" id="credit_card_num" value="5468135649758" required>
            </div>
          </div>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_design text-center">3</p>
        </div>
        <div class="col-2 .col-md-4">
          <p class="text_margin text_design text-center">Subtotal :</p>
        </div>
        <div class="col-2 .col-md-4 text-center">
          <p class="text_margin text_design text-center">RM150</p>
        </div>
      </div>
      <div class="row footer_row">
        <div class="col-5 .col-md-4">
          <p class="text_margin text_design empty_box">test</p>
        </div>
        <div class="col-5 .col-md-4">
          <p class="text_margin text_design empty_box">test</p>
        </div>
        <div class="col-2 .col-md-4 text-center">
          <a type="button" class="btn btn-outline-dark buttons" href="history.php">Comfirm</a>
        </div>
      </div>
    </div>
  <?php include '../shared/footer.php';?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script src="checkout.js"></script>
</body>
</html>