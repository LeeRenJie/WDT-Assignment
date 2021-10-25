<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/product.css">
    <title>item Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <?php include("../../../../backend/conn.php");?>
    <div class="container-fluid p-5 bg-color">
      <div class="row justify-content-center ml-2">
          <div class="col-6">
            <?php
            include("../../../../backend/conn.php");
            $product_id = intval ($_GET['product_id']); //get int value of the variable
            $output = mysqli_query($con, "SELECT * FROM product WHERE product_id = $product_id");
            while($row = mysqli_fetch_array($output))
            mysqli_close($con);

            ?>
          </div>
          <div class="col-6">

          </div>
      </div>
    </div>

    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>