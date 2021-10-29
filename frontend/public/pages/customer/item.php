<?php
  if(!isset($_SESSION)) {
  session_start();
  }

  include("../../../../backend/conn.php");
  $product_id = intval($_GET['id']); //get int value of the variable
  $result = mysqli_query($con, "SELECT * FROM product WHERE product_id = $product_id");
  $row = mysqli_fetch_assoc($result);

  $user_id = $_SESSION['user_id'];
  if (isset($_POST['addCartBtn'])) {
    include("../../../../backend/conn.php");

    $sql="INSERT INTO shopping_cart (user_id, product_id, product_quantity_added) VALUES ('$user_id', '$product_id','$_POST[quantity]')";

    if (!mysqli_query($con,$sql)){
      die('Error: ' . mysqli_error($con));
    }
    else {
      echo("<script>alert('Item Successfully Added To Cart')</script>");
    }

    mysqli_close($con);
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/item.css">
    <title>item Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid bg-color pb-5">
      <div class="row">
        <div class="col-md-6 p-5">
          <div class="imgContainer">
            <img src="../../images/<?php echo $row['product_image'];?>" alt="product image" class="img-fluid">
          </div>
        </div>
        <div class="col-md-6">
          <div class="container">
            <h1 class="text-capitalize itemName"><?php echo $row['product_name'];?></h1>
            <span class="stock mr-2 text-muted"><?php echo $row['product_stock'];?> left</span>
            <span class="badge badgeColor text-white text-capitalize"><?php echo $row['product_category'];?></span>
            <span class="badge badgeColor text-white"><?php echo $row['product_pet'];?></span>
            <h1 class="price pt-2">RM <?php echo $row['product_price'];?></h1>
            <p class="lead py-4 desc"><?php echo $row['product_desc'];?></p>
            <form method="post">
              <div>
                <span class="quantityTitle text-muted row pl-3 pb-2">Quantity:</span>
                <div class="quantity buttons_added">
                  <input type="button" value="-" class="minus">
                  <input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text qty text" size="1">
                  <input type="button" value="+" class="plus">
                </div>
              </div>
              <div class="my-4">
                <div class="text-muted ship py-2"><i class="fas fa-truck pr-2"></i>Free Malaysia shipping and a risk-free quality gurantee</div>
                <button type="submit" name="addCartBtn" class="btn-lg btn-block btn btn-success">
                  <i class="fas fa-shopping-cart pr-2"></i>
                  Add to Cart
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script>
      function quantity() {
        jQuery("div.quantity:not(.buttons_added), td.quantity:not(.buttons_added)").each(function(a, b) {
            var c = jQuery(b);
            c.addClass("buttons_added"),
            c.children().first().before('<input type="button" value="-" class="minus" />'),
            c.children().last().after('<input type="button" value="+" class="plus" />')
        });
      };

      String.prototype.getDecimals || (String.prototype.getDecimals = function() {
        var a = this,
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
      }),
      jQuery(document).ready(function() {
        quantity()
      }),
      jQuery(document).on("click", ".plus, .minus", function() {
        var a = jQuery(this).closest(".quantity").find(".qty"),
        // parses string and return a floating point number.
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0),
        "" !== c && "NaN" !== c || (c = ""),
        "" !== d && "NaN" !== d || (d = 0),
        "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1),
        jQuery(this).is(".plus") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())),
        a.trigger("change")
      });
    </script>
  </body>
</html>