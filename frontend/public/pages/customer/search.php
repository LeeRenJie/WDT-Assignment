<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/search.css" rel="stylesheet">
    <title>Search Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid bg-color" id="search">
      <form action="" method="post">
        <div class= "container pt-4">
          <!--<form action="" method="post"> -->
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search Product" name="search_key">
            <button type="submit" name="searchBtn">Search</button>
          <!--</form>-->
        </div>
        <?php
        include("../../../../backend/conn.php");
        ?>
        <div class="container pt-3 pb-5">
          <div class="row row-cols-4 justify-content-center">
            <div class="col">
              <ul>
                <?php
                  $pet_query = "SELECT * FROM pet";
                  $pet_query_run = mysqli_query($con, $pet_query);
  
                  if(mysqli_num_rows($pet_query_run) > 0)
                  {
                    foreach($pet_query_run as $pet_list)
                    {
                      $checked =[];
                      if(isset($_POST['pet_value[]']))
                      {
                        $checked = $_POST['pet_value[]'];
                      }
                      ?>
                        <li>
                          <input id="c1" type="checkbox" name="pet_value[]" value="<?=  $pet_list['pet_id']; ?>" 
                            <?php if(in_array($pet_list['pet_id'], $checked)){echo "checked";} ?>
                          >
                          <?php echo"<label for='c1'>" . $pet_list['product_pet'] . "</label>"; ?>
                        </li>
                      <?php
                    }
                  }
                  else
                  {
                    echo"No Products";
                  }
                ?> 
              </ul>
            </div>
            <div class="col">
              <ul>
                <?php
                  $category_query = "SELECT * FROM category";
                  $category_query_run = mysqli_query($con, $category_query);
  
                  if(mysqli_num_rows($category_query_run) > 0)
                  {
                    foreach($category_query_run as $category_list)
                    {
                      $checked =[];
                      if(isset($_POST['category_value[]']))
                      {
                        $checked = $_POST['category_value[]'];
                      }
                      ?>
                        <li>
                          <input id="c1" type="checkbox" name="category_value[]" value="<?=  $category_list['category_id']; ?>" 
                            <?php if(in_array($category_list['category_id'], $checked)){echo "checked";} ?>
                          >
                          <?php echo"<label for='c1'>" . $category_list['product_category'] . "</label>"; ?>
                        </li>
                      <?php
                    }
                  }
                  else
                  {
                    echo"No Products";
                  }
                ?> 
              </ul>
            </div>
            <div class="col-2">
              <ul>
                <li>
                  <input id="c7" type="checkbox" name="least_expensive" value="ASC">
                  <label for="c7">Least Expensive</label>
                </li>
                <li>
                  <input id="c8" type="checkbox" name="most_expensive" value="DESC">
                  <label for="c8">Most Expensive</label>
                </li>
              </ul>
            </div>
            <div class="col-1 minprice">
              <lable for="minprice">Min </lable>
              <input type="number" id="minprice" name="low_price" min="0" max="100"  value="<?php if(isset($_POST['low_price'])){echo $_POST['low_price']; } else{echo "0";}?>" class="form-control">
            </div>
            <div class="col-1 dash-div">
              <hr class=dash></hr>
            </div>
            <div class="col-1 maxprice">
              <lable for="maxprice">Max </lable>
              <input type="number" id="maxprice" name="high_price" min="1" max="101" value="<?php if(isset($_POST['high_price'])){echo $_POST['high_price']; } else{echo "100";}?>" class="form-control">
            </div>  
          </div>
          <div class="row row-cols-4 justify-content-center ml-2 mt-2">
            <?php
              if(isset($_POST['pet_value']))
              {
                $product_check = [] ;
                $product_check = $_POST['pet_value'];
                foreach($product_check as $row_product)
                {
                  //echo $row_product;
                  $products = "SELECT * FROM product WHERE pet_id IN ($row_product)";
                  $products_run = mysqli_query($con, $products);
                  if(mysqli_num_rows($products_run) > 0)
                  {
                    foreach($products_run as $prod_items) :
                      ?>
                        <div class="col">
                          <a href="">
                            <img src='../../images/<?=$prod_items['product_image']?>' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>
                            <p class="text_design mx-auto text-center">
                            <!--label tag for UI purpose-->
                              <label><?= $prod_items['product_name'] ?></label>
                            </p>
                          </a>
                          <!--Price-->
                          <p class="text-center text-muted mt-n2">
                            RM<?=$prod_items['product_price']?>
                          </p>
                        </div>
                      <?php
                    endforeach;
                  }
                  else
                  {
                    echo"No Products";
                  }
                }
              }
              elseif  (isset($_POST['least_expensive']))
              {
                $product_check = [] ;
                $product_check = $_POST['least_expensive'];
                
                $products = "SELECT * FROM product ORDER BY product_price ASC";
                $products_run = mysqli_query($con, $products);
                if(mysqli_num_rows($products_run) > 0)
                {
                  foreach($products_run as $prod_items) :
                    ?>
                      <div class="col">
                        <a href="">
                          <img src='../../images/<?=$prod_items['product_image']?>' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>
                          <p class="text_design mx-auto text-center">
                            <label><?= $prod_items['product_name'] ?></label>
                          </p>
                        </a>
                        <p class="text-center text-muted mt-n2">
                          RM<?=$prod_items['product_price']?>
                        </p>
                      </div>
                    <?php
                  endforeach;
                }
                else
                {
                  echo"No Products";
                }
              }
              elseif  (isset($_POST['most_expensive']))
              {
                $products = "SELECT * FROM product ORDER BY product_price DESC";
                $products_run = mysqli_query($con, $products);
                if(mysqli_num_rows($products_run) > 0)
                {
                  foreach($products_run as $prod_items) :
                    ?>
                      <div class="col">
                        <a href="">
                          <img src='../../images/<?=$prod_items['product_image']?>' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>
                          <p class="text_design mx-auto text-center">
                          <!--label tag for UI purpose-->
                            <label><?= $prod_items['product_name'] ?></label>
                          </p>
                        </a>
                        <!--Price-->
                        <p class="text-center text-muted mt-n2">
                          RM<?=$prod_items['product_price']?>
                        </p>
                      </div>
                    <?php
                  endforeach;
                }
                else
                {
                  echo"No Products";
                }
              
              }
              elseif (isset($_POST['category_value'])) {
                $category_check = [] ;
                $category_check = $_POST['category_value'];
                foreach($category_check as $row_category)
                {
                  //echo $row_product;
                  $categories = "SELECT * FROM product WHERE category_id IN ($row_category)";
                  $categories_run = mysqli_query($con, $categories);
                  if(mysqli_num_rows($categories_run) > 0)
                  {
                    foreach($categories_run as $prod_items) :
                      ?>
                        <div class="col">
                          <a href="">
                            <img src='../../images/<?=$prod_items['product_image']?>' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>
                            <p class="text_design mx-auto text-center">
                            <!--label tag for UI purpose-->
                              <label><?= $prod_items['product_name'] ?></label>
                            </p>
                          </a>
                          <!--Price-->
                          <p class="text-center text-muted mt-n2">
                            RM<?=$prod_items['product_price']?>
                          </p>
                        </div>
                      <?php
                    endforeach;
                  }
                  else
                  {
                    echo"No Products";
                  }
                }
              }
              elseif (isset($_POST['searchBtn'])) 
              {
                if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                {
                  $low_price = $_POST['low_price'];
                  $high_price = $_POST['high_price'];
        

             
                  $query = "SELECT * FROM product WHERE product_price BETWEEN $low_price AND $high_price";
                
                  $query_run = mysqli_query($con, $query);
    
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $prod_items)
                    {
                      ?>
                        <div class="col">
                          <a href="">
                            <img src='../../images/<?=$prod_items['product_image']?>' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>
                            <p class="text_design mx-auto text-center">
                            <!--label tag for UI purpose-->
                              <label><?= $prod_items['product_name'] ?></label>
                            </p>
                          </a>
                          <!--Price-->
                          <p class="text-center text-muted mt-n2">
                            RM<?=$prod_items['product_price']?>
                          </p>
                        </div>
                      <?php
                    }
                  }
                  else
                  {
                    echo"No Products";
                  }
                }
                else
                {
                  $search_key = "";
                  $search_key = $_POST['search_key'];
                  $query_search = "SELECT * FROM product WHERE product_name LIKE '%$search_key%'";
                  echo "<script>alert('".$query_search."')</script>";
                  $result=mysqli_query($con,$query_search);
                  while($row=mysqli_fetch_array($result))
                  {
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
                        echo "RM" . $row['product_price'];
                      echo "</p>";
                    echo "</div>";
                  }
                }
              }
              /*
              elseif(isset($_POST['low_price']) OR isset($_POST['high_price']))
              {
                $low_price = $_POST['low_price'];
                $high_price = $_POST['high_price'];
      
                echo var_dump($low_price);
                echo $_POST['high_price'];
           
                $query = "SELECT * FROM product WHERE product_price BETWEEN $low_price AND $high_price";
                echo "<script>alert('".$query."')</script>";
              
                $query_run = mysqli_query($con, $query);
  
                if(mysqli_num_rows($query_run) > 0)
                {
                  foreach($query_run as $items)
                  {
                    ?>
                      <div class="col">
                        <a href="">
                          <img src='../../images/<?=$prod_items['product_image']?>' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>
                          <p class="text_design mx-auto text-center">
                          <!--label tag for UI purpose-->
                            <label><?= $prod_items['product_name'] ?></label>
                          </p>
                        </a>
                        <!--Price-->
                        <p class="text-center text-muted mt-n2">
                          RM<?=$prod_items['product_price']?>
                        </p>
                      </div>
                    <?php
                  }
                }
                else
                {
                  echo"No Products";
                }
              }
              */
              else
              {
                $products = "SELECT * FROM product";
                $products_run = mysqli_query($con, $products);
                if(mysqli_num_rows($products_run) > 0)
                {
                  foreach($products_run as $prod_items) :
                    ?>
                      <div class="col">
                        <a href="">
                          <img src='../../images/<?=$prod_items['product_image']?>' class='img-thumbnail mr-3 ml-2 mb-2 mt-2 rounded mx-auto d-block'>
                          <p class="text_design mx-auto text-center">
                          <!--label tag for UI purpose-->
                            <label><?= $prod_items['product_name'] ?></label>
                          </p>
                        </a>
                        <!--Price-->
                        <p class="text-center text-muted mt-n2">
                          RM<?=$prod_items['product_price']?>
                        </p>
                      </div>
                    <?php
                  endforeach;
                }
                else
                {
                  echo"No Products";
                }
              }
              mysqli_close($con);
            ?>
          </div>
        </div>
      </form>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="search.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>