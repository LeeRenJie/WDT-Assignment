<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/product-management.css" rel="stylesheet" >
    <title>Product Management Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid">
      <div class="container row">
        <div class="col-10">
          <form method="post">
            <input class="search" type="text" name="search_key" placeholder="Search Product">
            <button class="button" name="searchBtn" type="submit">Search</button>
          </form>
        </div>
        <div class="col-2">
          <a class="button" href="product-new.php">Add Product</a>
        </div>
      </div>

    </div>

    <?php
    include("../../../../backend/conn.php");
    $search_key = "";

    if(isset($_POST['searchBtn'])){
      $search_key = $_POST['search_key'];
    }

    $result=mysqli_query($con,"SELECT * FROM product WHERE product_name LIKE '%$search_key%' or product_category LIKE '%$search_key%' or product_pet LIKE '%$search_key%' ORDER BY product_name, product_category, product_pet");
    ?>

    <table id="product" class="text-center">
      <tr>
        <th>ID</th>
        <th>Product</th>
        <th>Name</th>
        <th>Category</th>
        <th>Pet</th>
        <th>Price</th>
        <th>Stock</th>
        <th>Actions</th>
      </tr>
    <?php
      while($row=mysqli_fetch_array($result)){
        echo "<tr>";
          echo "<td>";
          echo $row['product_id'];
          echo "</td>";
          echo "<td>";
            echo $row['product_image'];
          echo "</td>";
          echo "<td>";
          echo $row['product_name'];
        echo "</td>";
          echo "<td>";
            echo $row['product_category'];
          echo "</td>";
          echo "<td>";
            echo $row['product_pet'];
          echo "</td>";
          echo "<td>";
            echo $row['product_price'];
          echo "</td>";
          echo "<td>";
            echo $row['product_stock'];
          echo "</td>";
          echo "<td>";
            echo "<a class='dropdown-item' href=\"product-edit.php?id=";
              echo $row['product_id'];
            echo "\">Edit</a>";
          echo"</td>";
        echo"</tr>";
        }
        mysqli_close($con);//to close the database connection
      ?>
      </table>
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>