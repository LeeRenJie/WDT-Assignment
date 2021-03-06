<?php
  // start the session
  if(!isset($_SESSION)) {
    session_start();
  }

  // include the database connection
  include("../../../../backend/conn.php");
  // Get the logged in customer ID
  $user_id = $_SESSION['user_id'];
  // Get the id from url when admin or owner view customer history
  $admin_user_id = intval($_SERVER['QUERY_STRING']);

  // Get customer's order history
  $sql =  (
    "SELECT od.*, pd.product_image AS product_img, pd.product_name AS product_name, pd.product_price AS product_price,
    ct.product_quantity_added AS amount
    FROM customer_order AS od
    JOIN shopping_cart AS ct ON od.cart_id = ct.cart_id
    JOIN product AS pd ON ct.product_id = pd.product_id
    WHERE (ct.user_id = '$user_id' OR ct.user_id = '$admin_user_id') AND ct.checkout = '1' AND ct.paid = '1'
    ORDER BY od.order_id DESC"
  );
  // Execute the query
  $result = mysqli_query($con, $sql);
  // Get number of row of result from the query
  $number_row = mysqli_num_rows($result);
?>

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
    <!-- Include Navigation Bar -->
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid whole_page">
      <?php
        // If the customer has no order history
        if ($number_row == 0)
        {
          // Admin view
          if ($_SESSION['privilege'] != "user"){
            echo '<div class="text-center padding">';
              echo '<div class="card-body">';
                echo '<h5 class="card-title">This customer has no purchase history!</h5>';
                echo '<p class="card-text">Head back to view other users</p>';
                echo '<a href="../admin/user.php" class="btn btn-lg btn-primary">Back</a>';
              echo '</div>';
            echo '</div>';
          }
          // Customer view
          else{
            echo '<div class="text-center padding">';
              echo '<div class="card-body">';
                echo '<h5 class="card-title">You have no purchase history!</h5>';
                echo '<p class="card-text">Head over to our shop and buy some items today!</p>';
                echo '<a href="product.php" class="btn btn-lg btn-primary"><i class="fas fa-shopping-bag pr-2"></i>Shop</a>';
              echo '</div>';
            echo '</div>';
          }
        }
        // If there is order history
        else
        {
          echo'<div class="row mb-1 bgcolor py-4">';
            echo'<div class="col-4">';
              echo'<p class="header text_design header_text text-center">Products Ordered</p>';
            echo'</div>';
            echo' <div class="col-2">';
              echo'<p class="text_design header_text text-center">Amount</p>';
            echo'</div>';
            echo'<div class="col-2">';
              echo'<p class="text_design header_text text-center">Total Price</p>';
            echo'</div>';
            echo'<div class="col-2">';
              echo'<p class="text_design header_text text-center">Order Date</p>';
            echo'</div>';
            echo'<div class="col-2">';
              echo'<p class="text_design header_text text-center">Status of delivery</p>';
            echo'</div>';
          echo'</div>';
          // Loop through the result and display the order history
          while($row=mysqli_fetch_array($result)){
            echo'<div class="row first_row py-3 bgcolor">';

              echo'<div class="col-2 .col-md-4 justify-content-center">';
                echo "<img src='../../images/{$row['product_img']}'  alt='...' class='pdImg mr-3 p-2'>";
              echo'</div>';

              echo'<div class="col-2 .col-md-4 justify-content-center">';
                echo'<p class="product_label text_design text-center text_margin"><label for="product_image">';
                  echo $row['product_name'];
                echo '</label> </p>';
              echo'</div>';

              echo'<div class="col-2 .col-md-4 text-center">';
                echo'<p class="text_margin text_design text-center">';
                  echo $row['amount'];
                echo'</p>';
              echo'</div>';

              echo'<div class="col-2 .col-md-4">';
                echo'<p class="text_margin text_design text-center"> RM';
                  echo $row['product_price'] * $row['amount'];
                echo'</p>';
              echo'</div>';


              echo'<div class="col-2 .col-md-4">';
              echo'<p class="text_margin text_design text-center">';
                echo $row['order_date'];
              echo'</p>';
            echo'</div>';

            echo'<div class="col-2 .col-md-4">';
            echo'<p class="text_margin text_design text-center">';
              echo $row['status_of_delivery'];
            echo'</p>';
          echo'</div>';
            echo'</div>';
          }
        }
      ?>
    </div>
    <!-- Include Footer -->
    <?php include '../shared/footer.php';?>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <!-- Execute history.js  -->
    <script src="history.js"></script>
  </body>
</html>