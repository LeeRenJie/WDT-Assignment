<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/history.css">
    <title>History Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid whole_page">
      <!--row-->
      <div class="row mb-1 bgcolor">
        <div class="col-4">
          <p class="header text_design header_text pl-3">Products Ordered</p>
        </div>
        <div class="col-2">
          <p class="text_design header_text text-center">Unit Price</p>
        </div>
        <div class="col-2">
          <p class="text_design header_text text-center">Amount</p>
        </div>
        <div class="col-2">
          <p class="text_design header_text text-center">Total Price</p>
        </div>
        <div class="col-2">
          <p class="text_design header_text text-center">Status of delivery</p>
        </div>
      </div>
      <!--row-->
      <div class="row mb-1">
        <div class="col-4 text-center">
          <p class="float-left text-secondary font-weight-bold pt-3 pl-4">Order Date:</p>
        </div>
        <div class="col-2 text-center pt-3">
          <p class="">10 March 2021</p>
        </div>
      </div>
      <div class="row first_row mb-1 bgcolor">
        <div class="col-4">
          <img src="../../images/food.jpg" alt="..." class="img-thumbnail mr-3 p-2">
          <div class="mt-5 pt-3 label_text">
            <p class="product_label text_design"><label for="DogFood200g">Dog Food 200g</label> </p>
          </div>
        </div>
        <div class="col-2">
          <p class="text_margin text_design text-center">RM50</p>
        </div>
        <div class="col-2 text-center">
          <p class="text_margin text_design text-center">3</p>
        </div>
        <div class="col-2">
          <p class="text_margin text_design text-center">RM150</p>
        </div>
        <div class="col-2 text-center">
          <p class="text_margin text_design text-center">Completed</p>
        </div>
      </div>
      <!--row-->
      <div class="row bgcolor">
        <div class="col-6">
          <!--emptied column for design purpose-->
          <p class="text_margin text_design empty_box">test</p>
        </div>
        <div class="col-2">
          <p class="text_margin text_design text-center">Subtotal :</p>
        </div>
        <div class="col-2">
          <p class="text_margin text_design text-center">RM150</p>
        </div>
        <div class="col-2 text-center">
          <!--Button to buy again-->
          <button type="button" class="btn btn-outline-success buttons">Buy Again</button>
        </div>
      </div>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="history.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>