<?php
if(!isset($_SESSION)) {
  session_start();
}

include("../../../../backend/conn.php");
$user_id = $_SESSION['user_id'];

$sql =  (
  "SELECT pd.product_image AS product_img, pd.product_name AS product_name, pd.product_price AS product_price, ct.product_quantity_added AS product_quantity_added, ct.cart_id AS cart_id
  FROM shopping_cart AS ct JOIN product AS pd ON ct.product_id = pd.product_id
  WHERE ct.user_id = '$user_id' AND ct.checkout = '0'
  ORDER BY ct.cart_id ASC"
);
$result = mysqli_query($con, $sql);
$number_row = mysqli_num_rows($result);

if (isset($_POST['checkout'])) {
  if(!empty($_POST['check_list']))
  {
    foreach($_POST['check_list'] as $check) {
      $update_sql="UPDATE shopping_cart SET checkout='1' WHERE cart_id='$check'";

      if (!mysqli_query($con, $update_sql)){
        die('Error: ' . mysqli_error($con));
      }
      else {
        echo("<script>alert('Item Successfully Checked Out')</script>");
        echo("<script>window.location = 'checkout.php'</script>");
      }
      mysqli_close($con);
    }
  }
  else
  {
    echo("<script>alert('Please select at least one item')</script>");
    echo("<script>window.location = 'cart.php'</script>");
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/cart.css">
    <title>Cart Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid whole_page">
      <div class="row py-3 text-center">
        <div class="col-10"></div>
        <div class="col-2">
          <a href="checkout.php" class="btn btn-primary position-relative">
            <i class="fas fa-wallet pr-1"></i>
            To Pay
            <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
              <?php
                $checkout = ("SELECT * FROM shopping_cart WHERE checkout = '1' AND user_id = '$user_id'");
                $checkout_result = mysqli_query($con, $checkout);
                $number_row_checkout = mysqli_num_rows($checkout_result);
                echo $number_row_checkout
              ?>
              <span class="visually-hidden">checked out items</span>
            </span>
          </a>
        </div>
      </div>
      <?php
        if ($number_row == 0)
        {
          echo '<div class="empty text-center pb-5">';
            echo '<div class="card-body">';
              echo '<h5 class="card-title">Your cart is empty!</h5>';
              echo '<p class="card-text">Head over to our shop and add some items to your cart!</p>';
              echo '<a href="product.php" class="btn btn-lg btn-primary"><i class="fas fa-shopping-bag pr-2"></i>Shop</a>';
            echo '</div>';
          echo '</div>';
        }
        else
        {
          echo '<div class="row header_row pt-2">';

            echo '<div class="col-4">';
              echo '<div class="row">';
                echo '<div class="col-1">';
                  echo "<input type='checkbox' id='checkall'>";
                echo '</div>';

                echo '<div class="col-11">';
                  echo '<p class="header text_design text-center header_text">Product</p>';
                echo '</div>';
              echo '</div>';
            echo '</div>';

            echo '<div class="col-2">';
              echo '<p class="text_design header_text text-center">Unit Price</p>';
            echo '</div>';

            echo '<div class="col-2">';
              echo '<p class="text_design header_text text-center">Amount</p>';
            echo '</div>';

            echo '<div class="col-2">';
              echo '<p class="text_design header_text text-center">Item Subtotal</p>';
            echo '</div>';

            echo '<div class="col-2">';
              echo '<p class="text_design header_text text-center">Actions</p>';
            echo '</div>';

          echo '</div>';
          echo '<form method="post">';
            while($row=mysqli_fetch_array($result)){
              echo '<div class="row first_row">';

              echo '<div class="col-4">';
                echo '<div class="row">';
                  echo '<div class="col-1">';
                    echo"<input type='checkbox' class='checkbox' name='check_list[]' value='{$row['cart_id']}'>";
                  echo '</div>';

                  echo '<div class="col-6">';
                    echo "<img src='../../images/{$row['product_img']}' class='pdImg my-2'>";
                  echo '</div>';

                  echo '<div class="col-5">';
                    echo '<p class="product_label text_design text-center text_margin"><label for="product_image">';
                        echo $row['product_name'];
                    echo '</label> </p>';
                  echo '</div>';
                echo '</div>';
              echo '</div>';

                echo '<div class="col-2">';
                  echo '<p class="productPrice text_margin text_design text-center">RM ';
                    echo $row['product_price'];
                  echo'</p>';
                echo'</div>';

                echo'<div class="col-2 text-center">';
                  echo'<p class="text_margin text_design">';
                    echo $row['product_quantity_added'];
                  echo'</p>';
                echo'</div>';

                echo '<div class="col-2">';
                  echo'<p class="text_margin text_design text-center">RM ';
                    echo $row['product_price']*$row['product_quantity_added'];
                  echo '</p>';
                echo '</div>';

                echo '<div class="col-2 text-center">';
                  echo "<a class='btn btn-danger buttons' href=\"delete-cart.php?id=";
                    echo $row['cart_id'];
                    echo "\" onClick=\"return confirm('Remove ";
                    echo $row['product_name'];
                    echo " from cart?')";
                    echo "\">Remove";
                  echo "</a>";
                echo '</div>';
              echo '</div>';
            }
            echo '<div class="row footer_row">';
              echo '<div class="col-8"></div>';
              echo '<div class="col-2">';
                echo '<p class="text_margin text_design text-center">';
                  // TOTAL HERE
                echo'</p>';
              echo '</div>';
              echo '<div class="col-2 text-center">';
                echo '<button type="submit" name="checkout" class="btn btn-success buttons"> Checkout </button>';
              echo '</div>';
            echo '</div>';
          echo '</form>';
        }
      ?>
    </div>
  <?php include '../shared/footer.php';?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <script type='text/javascript'>
  // (Singh, 2021) - This script is used to check or uncheck all checkboxes in the cart page.
    $(document).ready(function(){
      // Check or Uncheck All checkboxes
      $("#checkall").change(function(){
        let checked = $(this).is(':checked');
        if(checked){
          $(".checkbox").each(function(){
            $(this).prop("checked",true);
          });
        }else{
          $(".checkbox").each(function(){
            $(this).prop("checked",false);
          });
        }
      });

      // Changing state of CheckAll checkbox
      $(".checkbox").click(function(){

        if($(".checkbox").length == $(".checkbox:checked").length) {
          $("#checkall").prop("checked", true);
        } else {
          $("#checkall").prop("checked", false);
        }

      });
    });
  </script>
</body>
</html>