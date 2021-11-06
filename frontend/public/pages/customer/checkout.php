<?php
if(!isset($_SESSION)) {
  session_start();
}

include("../../../../backend/conn.php");
$user_id = $_SESSION['user_id'];
$sql =  (
  "SELECT pd.product_image AS product_img, pd.product_name AS product_name, pd.product_price AS product_price,
  ct.product_quantity_added AS amount, ct.cart_id AS cart_id, u.user_name AS cus_name,
  u.user_address AS cus_address, u.user_phone_number AS cus_phone
  FROM shopping_cart AS ct
  JOIN product AS pd ON ct.product_id = pd.product_id
  JOIN user AS u ON ct.user_id = u.user_id
  WHERE ct.user_id = '$user_id' AND ct.checkout = '1'
  ORDER BY ct.cart_id ASC"
);
$result = mysqli_query($con, $sql);
$user_result = mysqli_query($con, $sql);
$number_row = mysqli_num_rows($result);
$user_row = mysqli_fetch_assoc($user_result);

// SQL for calculating total of all products
$total_sql = (
  "SELECT SUM(pd.product_price * ct.product_quantity_added) AS total
  FROM shopping_cart AS ct
  JOIN product AS pd ON ct.product_id = pd.product_id
  JOIN user AS u ON ct.user_id = u.user_id
  WHERE ct.user_id = '$user_id' AND ct.checkout = '1'"
);
$total_result = mysqli_query($con, $total_sql);
$total_row = mysqli_fetch_assoc($total_result);

// SQL for address change
if (isset($_POST['addressBtn'])) {
  $address_result = mysqli_query($con, "SELECT * FROM user WHERE user_id = $user_id");
  $address_row = mysqli_fetch_assoc($address_result);
  $address_sql = "UPDATE user SET user_address = '$_POST[address]' WHERE user_id = $user_id";
  if (mysqli_query($con,$address_sql))
  {
    echo'<script>alert("Your address has been updated.");</script>';
  }
  else
  {
  die('Error: ' . mysqli_error($con));
  }
};

// SQL to update customer order from cart
if (isset($_POST['paymentBtn'])) {
  $date = date("Y-m-d");
  $order_status = 'Preparing your order';
  $query = "INSERT IGNORE INTO customer_order (cart_id, order_date, status_of_delivery)
  SELECT sc.cart_id, '$date', '$order_status'
  FROM shopping_cart AS sc
  WHERE sc.checkout = 1 AND user_id = $user_id";

  $run_query = mysqli_query($con, $query);
  if (mysqli_query($con,$run_query))
  {
    echo(
      '<script>
        var myModal = new bootstrap.Modal(document.getElementById("payment"), {
          keyboard: false,
          backdrop: "static",
          show: true
        });
        $(document).ready(function(e){
          e.preventDefault();
          setTimeout(function() {
            $(\'#loading\').hide();
            $(\'#completed\').show();
            setTimeout(function(){
              window.location = \'history.php\'},4000);
            },3000);
            return false"
        });
      </script>'
    );
  }
  else
  {
  die('Error: ' . mysqli_error($con));
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/checkout.css">
    <title>Checkout Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid whole_page">
      <?php
        if ($number_row == 0)
        {
          echo '<div class="empty text-center py-5">';
            echo '<div class="card-body">';
              echo '<h5 class="card-title">You have no items to pay!</h5>';
              echo '<p class="card-text">Head over to our shop and add some items to your cart!</p>';
              echo '<a href="product.php" class="btn btn-lg btn-primary"><i class="fas fa-shopping-bag pr-2"></i>Shop</a>';
            echo '</div>';
          echo '</div>';
        }
        else
        {
        echo '<form method="post" class="m-0">';
          echo'<div class="row py-3 header_row align-items-center">';

            echo'<div class="col-1">';
              echo'<p class="text-center col-form-label">Name :</p>';
            echo'</div>';

            echo'<div class="col-2">';
              echo'<p class="text-start font-weight-bold text-capitalize col-form-label">';
                echo $user_row['cus_name'];
                echo " ({$user_row['cus_phone']})";
              echo'</p>';
            echo'</div>';

            echo'<div class="col-2">';
              echo'<p class="text-center col-form-label" for="address">Delivery Address :</p>';
            echo'</div>';

            echo '<div class="col-4">';
              echo'<input id="address" type="text" class="form-control" name="address" value="';
              echo$user_row['cus_address'];
              echo'"</input>';
            echo '</div>';


            echo'<div class="col-2">';
              echo'<button type="submit" name="addressBtn" class="btn btn-success">Save</button>';
            echo'</div>';

          echo'</div>';
        echo'</form>';

        echo'<div class="row header_row">';
          echo'<div class="col-4 .col-md-4">';
            echo'<p class="header text_design header_text text-center pl-3">Products Ordered</p>';
          echo'</div>';
          echo'<div class="col-2 .col-md-4">';
            echo'<p class="text_design header_text text-center">Unit Price</p>';
          echo'</div>';
          echo'<div class="col-2 .col-md-4">';
            echo'<p class="text_design header_text text-center">Amount</p>';
          echo'</div>';
          echo'<div class="col-2 .col-md-4">';
            echo'<p class="text_design header_text text-center">Total Price</p>';
          echo'</div>';
          echo'<div class="col-2 .col-md-4">';
            echo'<p class="text_design header_text text-center">Actions</p>';
          echo'</div>';
        echo'</div>';
        while($row=mysqli_fetch_array($result)){
          echo'<div class="row first_row">';
            echo'<div class="col-2 .col-md-4 justify-content-center">';
              echo "<img src='../../images/{$row['product_img']}'  alt='...' class='pdImg mr-3 p-2'>";
            echo'</div>';

            echo'<div class="col-2 .col-md-4 justify-content-center">';
            echo'<p class="product_label text_design text-center text_margin"><label for="product_image">';
                echo $row['product_name'];
              echo '</label> </p>';
            echo'</div>';

            echo'<div class="col-2 .col-md-4">';
              echo'<p class="text_margin text_design text-center">';
                echo $row['product_price'];
              echo'</p>';
            echo'</div>';

            echo'<div class="col-2 .col-md-4 text-center">';
              echo'<p class="text_margin text_design text-center">';
                echo $row['amount'];
              echo'</p>';
            echo'</div>';

            echo'<div class="col-2 .col-md-4">';
              echo'<p class="text_margin text_design text-center">';
                echo $row['product_price'] * $row['amount'];
              echo'</p>';
            echo'</div>';

            echo '<div class="col-2 .col-md-4 text-center">';
            echo "<a class='btn btn-danger buttons' href=\"delete-cart.php?id=";
              echo $row['cart_id'];
              echo "\" onClick=\"return confirm('Remove ";
              echo $row['product_name'];
              echo " from cart?')";
              echo "\">Remove";
            echo "</a>";
          echo '</div>';
          echo'</div>';
        }
        echo'<form method="post">';
          echo'<div class="row footer_row">';
            echo'<div class="col-8 .col-md-4 pt-5">';
              echo'<div class="row text_margin text_design">';
                echo'<label for="credit_card_num" class="col-sm-4">Credit Card Number :</label>';
                echo'<div class="col-sm-8 input-group">';
                  echo'<input type="text" class="form-control w-50"
                  id="credit_card_num" placeholder="Credit Card Number"
                  maxlength="16" aria-label="Credit Card Number" required>';

                  echo'<input type="text" class="form-control w-25"
                  id="monthyear" placeholder="MM/YY"
                  maxlength="5" aria-label="month and year" required>';

                  echo'<input type="text" class="form-control w-25"
                  id="cvc" placeholder="CVC"
                  maxlength="3" aria-label="cvc" required>';
                echo'</div>';
              echo'</div>';
            echo'</div>';
            echo'<div class="col-2 .col-md-4">';
              echo'<p class="text_margin text_design text-center">Subtotal :</p>';
            echo'</div>';
            echo'<div class="col-2 .col-md-4 text-center">';
              echo'<p class="text_margin text_design text-center">';
                echo "RM {$total_row['total']}";
              echo'</p>';
            echo'</div>';
          echo'</div>';

          echo'<div class="row footer_row">';
            echo'<div class="col-10 .col-md-4"></div>';
            echo'<div class="col-2 .col-md-4 text-center">';
            echo'<button type="submit" name="paymentBtn" class="btn btn-success buttons">';
              echo'Place Order';
            echo'</button>';
            echo'</div>';
          echo'</div>';
        echo'</form>';
        }
      ?>
      <!-- Bootstrap modal -->
      <div class="modal fade" id="payment" tabindex="-1" aria-labelledby="paymentLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="paymentLabel">Payment</h5>
            </div>
            <div class="modal-body text-center">
              <div class="spinner-border my-5 text-success" role="status" id="loading">
                <span class="visually-hidden">Loading...</span>
              </div>
              <div class="" id="completed" style="display:none;">
                <i class="fas fa-check-circle text-success fa-5x my-3"></i>
                <p>Payment Completed</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php include '../shared/footer.php';?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>