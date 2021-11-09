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
    <div class="container-fluid size">
      <div class="row px-5 pb-4">
        <form method="post" class="col-10">
          <input class="form-control w-25 d-inline" type="text" name="search_key" placeholder="Search Product..">
          <button class="btn btn-success" name="searchBtn" type="submit">Search</button>
        </form>
        <div class="col-2 text-end">
          <a class="btn btn-success" href="product-new.php">Add Product</a>
        </div>
      </div>

      <?php
      if ($_SESSION['privilege'] == "user") {
        echo("<script>alert('Username already exists!')</script>");
        header("Location: ../../../customer/home.php");
      };
      include("../../../../backend/conn.php");
      $search_key = "";

      if(isset($_POST['searchBtn'])){
        $search_key = $_POST['search_key'];
      }

      $result=mysqli_query($con,
      "SELECT pd.*, cat.product_category as product_category, pet.product_pet as product_pet
      FROM product pd JOIN category cat ON pd.category_id = cat.category_id
      JOIN pet ON pd.pet_id = pet.pet_id
      WHERE product_name LIKE '%$search_key%'
      or product_category LIKE '%$search_key%' or product_pet LIKE '%$search_key%'
      ORDER BY product_id, product_name, product_category, product_pet");
      ?>
      <div class="pb-5 px-5">
        <table id="product" class="text-center">
          <tr>
            <th>ID</th>
            <th>Product</th>
            <th>Name</th>
            <th>Category</th>
            <th>Pet</th>
            <th>Price</th>
            <th>Actions</th>
          </tr>
          <?php
            while($row=mysqli_fetch_array($result)){
              echo "<tr>";
                echo "<td>";
                echo $row['product_id'];
                echo "</td>";
                echo "<td>";
                  echo '<img src="../../images/';
                    echo $row['product_image'];
                  echo'" alt="product image" class="img">';
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
                  echo '<div class="dropdown textcenter">';
                  echo '<button class="btn btn-secondary dropdown-toggle buttons" type="button" id="quantity_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                    echo "Actions";
                  echo "</button>";
                  echo '<div class="dropdown-menu text-center" aria-labelledby="quantity_dropdown">';
                      echo "<a class='dropdown-item' href=\"product-edit.php?id=";
                        echo $row['product_id'];
                      echo "\">Edit</a>";
                      echo "<a class='dropdown-item' href=\"delete-product.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                      echo $row['product_id'];
                      echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                      echo $row['product_name'];
                      echo " details?')";
                    echo "\">Delete</a>";
                  echo "</div>";
                echo "</div>";
                echo"</td>";
              echo"</tr>";
            }
            mysqli_close($con);//to close the database connection
          ?>
        </table>
      </div>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>