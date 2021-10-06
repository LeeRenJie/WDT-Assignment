<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/checkout.css" rel="stylesheet" >
    <title>checkout Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid">
      <div class="row order_date">
        <div>
          <h5>Order Date:</h5>
        </div>
      </div>
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
            <h5>Quantity</h5>
          </div>
          <div class="row quantity">
            <p>2</p>
          </div>
          <div class="row quantity last-row">
            <p>1 </p>
          </div>
          <div class="row final">
            <p>3 </p>
          </div>
        </div>
        <div class="col">
          <div class="row headerrow">
            <h5>Total Price</h5>
          </div>
          <div class="row total_price">
            <p>RM 152</p>
          </div>
          <div class="row total_price last-row">
            <p>RM 167</p>
          </div>
          <div class="row final">
            <p>Sub Total:</p>
          </div>
        </div>
        <div class="col">
          <div class="row headerrow">
            <h5>State of Delivery</h5>
          </div>
          <div class="row status">
            <p>Yes</p>
          </div>
          <div class="row status last-row">
            <p>No</p>
          </div>
          <div class="row final">
            <p>RM 319</p>
          </div>
          <div class="row final">
            <button type="button" class="btn btn-outline-secondary buttons btn-lg">
              comfirm
            </button>
          </div>
        </div>
      </div>
    </div>
    <?php include '../shared/footer.php';?>
  </script>
  </body>
</html>