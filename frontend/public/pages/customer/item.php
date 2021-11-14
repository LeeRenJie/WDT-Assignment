<?php
  // start the session
  if(!isset($_SESSION)) {
  session_start();
  }
  // Check if user logged in
  include("../../../../backend/session.php");
  // include the database connection
  include("../../../../backend/conn.php");
  //get product id from url
  $product_id = intval($_SERVER['QUERY_STRING']);
  // get the individual product details
  $result = mysqli_query($con,
    "SELECT pd.*, cat.product_category as product_category, pet.product_pet as product_pet
    FROM product AS pd JOIN category AS cat ON pd.category_id = cat.category_id
    JOIN pet ON pd.pet_id = pet.pet_id
    WHERE pd.product_id = $product_id");
  // get result row
  $row = mysqli_fetch_assoc($result);
  // Get the logged in user ID
  $user_id = $_SESSION['user_id'];
  // Insert the product into the cart
  if (isset($_POST['addCartBtn'])) {
    $sql="INSERT INTO shopping_cart (user_id, product_id, product_quantity_added)
    VALUES ('$user_id', '$product_id','$_POST[quantity]')";
    // Display error if query unsuccessful
    if (!mysqli_query($con,$sql)){
      die('Error: ' . mysqli_error($con));
    }
    // Display success message and redirect to cart page
    else {
      echo("<script>alert('Product Successfully Added To Cart')</script>");
      echo("<script>window.location = 'cart.php'</script>");
    }
    // Close the connection
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
    <!-- Include Navigation Bar -->
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid bg-color pb-5">
      <div class="row">
        <div class="col-md-5 py-5 pl-5">
          <div class="imgContainer">
            <img src="../../images/<?php echo $row['product_image'];?>" alt="product image" class="img-fluid">
          </div>
        </div>
        <div class="col-md-7">
          <div class="container">
            <h1 class="text-capitalize itemName"><?php echo $row['product_name'];?></h1>
            <span class="badge badgeColor text-white text-capitalize"><?php echo $row['product_category'];?></span>
            <span class="badge badgeColor text-white"><?php echo $row['product_pet'];?></span>
            <h1 class="price pt-2">RM <?php echo $row['product_price'];?></h1>
            <p class="lead py-4 desc"><?php echo $row['product_desc'];?></p>
            <?php
              // Check if user is customer
              if($_SESSION['privilege'] == "user") {
              echo '<form method="post">';
                echo '<div>';
                  echo '<span class="quantityTitle text-muted row pl-3 pb-2">Quantity:</span>';
                  echo '<div class="quantity buttons_added">';
                    echo '<input type="button" value="-" class="deduct">';
                    echo '<input type="number" step="1" min="1" name="quantity" value="1" title="Qty" class="input-text quantity text" size="1">';
                    echo '<input type="button" value="+" class="add">';
                  echo '</div>';
                echo '</div>';
                echo '<div class="my-4">';
                  echo '<div class="text-muted ship py-2"><i class="fas fa-truck pr-2"></i>Free Malaysia shipping and a risk-free quality gurantee</div>';
                  echo '<button type="submit" name="addCartBtn" class="btn-lg btn-block btn btn-success">';
                    echo '<i class="fas fa-shopping-cart pr-2"></i>';
                    echo 'Add to Cart';
                  echo '</button>';
                echo '</div>';
              echo '</form>';
              }
            ?>
          </div>
        </div>
      </div>
    </div>
    <!-- Include Footer -->
    <?php include '../shared/footer.php';?>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- (Product archives: Simple products separate plus and minus quantity buttons – Coded Commerce, LLC, 2021) -->
    <script>
      String.prototype.getDecimals || (String.prototype.getDecimals = function() {
        var a = this,
        // Check if input matches the pattern
        b = ("" + a).match(/(?:\.(\d+))?(?:[eE]([+-]?\d+))?$/);
        return b ? Math.max(0, (b[1] ? b[1].length : 0) - (b[2] ? +b[2] : 0)) : 0
      }),
      // Execute when customer clicks on add and deduct buttons
      jQuery(document).on("click", ".add, .deduct", function() {
        // Get the quantity input
        var a = jQuery(this).closest(".quantity").find(".quantity"),
        // parses string and return a floating point number.
        b = parseFloat(a.val()),
        c = parseFloat(a.attr("max")),
        d = parseFloat(a.attr("min")),
        e = a.attr("step");
        b && "" !== b && "NaN" !== b || (b = 0),
        "" !== c && "NaN" !== c || (c = ""),
        "" !== d && "NaN" !== d || (d = 0),
        "any" !== e && "" !== e && void 0 !== e && "NaN" !== parseFloat(e) || (e = 1),
        // Change the value of the quantity input
        jQuery(this).is(".add") ? c && b >= c ? a.val(c) : a.val((b + parseFloat(e)).toFixed(e.getDecimals())) : d && b <= d ? a.val(d) : b > 0 && a.val((b - parseFloat(e)).toFixed(e.getDecimals())),
        a.trigger("change")
      });
    </script>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  </body>
</html>