<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../src/stylesheets/product.css">
    <title>Product Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div style="width:50%; float: left" class="ml-3">
        <form method="post">
          Search
          <input type="text" style="width: 250px; padding: 8px; margin: 3px 0 11px 0; display: inline-block; font-size:12pt;" name="search_key">
          <button class="button" name="searchBtn" type="submit">Submit</button>
        </form>
      </div>
    </div>

    <?php 
    //connect to phpmyadmin sql server with username="root" password="" and database name="pet_mart"
    // Check database connection
    include("../../../../backend/conn.php");
    $search_key = "";

    if(isset($_POST['searchBtn'])){
      $search_key = $_POST['search_key'];
    }
    
    $result=mysqli_query($con,"SELECT * FROM product WHERE product_name LIKE '%$search_key%' ");
    ?>

    <div class="container-fluid p-5 bg-color">
      <div class = "col-15">
        <?php
        $fetch = "SELECT product_image, product_name FROM product";
        $sql = mysqli_query($con, $fetch);
        $number_row = mysqli_num_rows($sql);
        echo "<div class = \"ml-4 mb-4\">";
        echo "<h5 class='float-left'>";
          echo $number_row; 
        echo " products</h5>";
        echo "</div>";
        echo "<div class=\"container-fluid p-5 bg-color\">";
        echo "<div class = \"col-15\">";
        echo "<div class=\"row row-cols-4 justify-content-center ml-2 mt-2\">";
        while($row=mysqli_fetch_array($result)){
          echo "<div class=\"col\">";
            echo "<a href=\"\">";
              $imgURL = "data:image/jpg;base64,".base64_encode($row['product_image']);  
              echo "<img src='../../images/{$row['product_image']}' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>";
              echo "<p class=\"text_design mx-auto text-center\">"; 
                echo "<!--label tag for UI purpose-->";
                echo "<label>".$row['product_name']."</label>";
              echo "</p>";
            echo "</a>";
            echo "<!--Price-->";
            echo "<p class=\"text-center text-muted mt-n2\">";
              echo $row['product_price'];
            echo "</p>";
          echo "</div>";
          }
          /*
                echo "<div class=\"col-3\">";
                  echo "<a href=\"\">"; 
                    echo "<img src='../../images/{$row['product_image']}' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>";
                    echo "<p class=\"text_design mx-auto text-center\">";
                      echo "<!--label tag for UI purpose-->";
                      echo "<label>".$row['product_name']."</label>";
                    echo "</p>";
                  echo "</a>";
                  echo "<!--Price-->";
                  echo "<div class=\"row justify-content-center\">";
                    echo "<!--Price before discount-->";
                    echo "<p class=\"text-center text-muted mt-n2\">";
                      echo $row['product_price'];
                    echo "</p>";
                  echo "</div>";
                echo "</div>";
                echo "<div class=\"col-3\">";
                  echo "<a href=\"\"> ";
                    echo "<img src='../../images/{$row['product_image']}' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>";
                    echo "<p class=\"text_design mx-auto text-center\">";
                      echo "<!--label tag for UI purpose-->";
                      echo "<label>".$row['product_name']."</label>";
                    echo "</p>";
                  echo "</a>";
                  echo "<!--Price-->";
                  echo "<div class=\"row justify-content-center\">";
                    echo "<!--Price before discount-->";
                    echo "<p class=\"text-center text-muted mt-n2\">";
                      echo $row['product_price'];
                    echo "</p>";
                  echo "</div>";
                echo "</div>";
                echo "<div class=\"col-3\">";
                  echo "<a href=\"\"> ";
                    echo "<img src='../../images/{$row['product_image']}' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>";
                    echo "<p class=\"text_design mx-auto text-center\">";
                      echo "<!--label tag for UI purpose-->";
                      echo "<label>".$row['product_name']."</label>";
                    echo "</p>";
                  echo "</a>";
                  echo "<!--Price-->";
                  echo "<div class=\"row justify-content-center\">";
                    echo "<!--Price before discount-->";
                    echo "<p class=\"text-center text-muted mt-n2\">";
                      echo $row['product_price'];
                    echo "</p>";
                  echo "</div>";
                echo "</div>";
              echo "</div>";
        */
        ?>    
      </div>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>