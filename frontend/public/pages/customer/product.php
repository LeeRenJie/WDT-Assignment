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
    <!-- Include Navigation Bar -->
    <?php include '../shared/navbar.php';?>
    <?php include("../../../../backend/conn.php")?>

    <div class="container-fluid bg-color" id="search">
      <form action="" method="post">
      <!--(Mark Otto, 2021) -->
      <div class="row">
        <div class="col-2">
          <button class="btn btn-outline-dark mt-4 mb-4 ml-4 float-right btn-lg" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling"><h5>Filter</h5></button>
        </div>
        <div class="col-10">
          <p class="d-none">Empty</p>
        </div>
      </div>
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <div class= "container">
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search Product" name="search_key">
            <button type="submit" name="searchBtn" class="btn btn-secondary">Search</button>
          </div>
          <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <div class="col">
            <div class="row shadow p-3 mb-5 bg-body rounded">
              <ul>
                <li>
                  <h4>Pets </h4>
                </li>
                <?php
                // Get all type of pets (cat/dog) from database
                  $pet_query = "SELECT * FROM pet";
                  $pet_query_run = mysqli_query($con, $pet_query);

                  if(mysqli_num_rows($pet_query_run) > 0)
                  { 
                    // iterate and display all type of pets (cat/dog)
                    foreach($pet_query_run as $pet_list)
                    {
                      //validate if the checkboxes are checked/functioning
                      $checked =[];
                      if(isset($_POST['pet_value[]']))
                      {
                        $checked = $_POST['pet_value[]'];
                      }
                      ?>
                        <li>
                          <!-- Check if the value of the pet is in the array of checked values -->
                          <input id="c1" type="checkbox" name="pet_value[]" value="<?=  $pet_list['pet_id']; ?>"
                            <?php if(in_array($pet_list['pet_id'], $checked)){echo "checked";} ?>
                          >
                          <!-- Display the type of pet (cat/dog) as label for checkbox -->
                          <?php echo"<label for='c1'>" . $pet_list['product_pet'] . "</label>"; ?>
                        </li>
                      <?php
                    }
                  }
                ?>
              </ul>
            </div>
            <div class="row shadow p-3 mb-5 bg-body rounded">
              <ul>
                <li>
                  <h4>
                    Category
                  </h4>
                </li>
                <?php
                  // Get all category from database
                  $category_query = "SELECT * FROM category";
                  $category_query_run = mysqli_query($con, $category_query);

                  if(mysqli_num_rows($category_query_run) > 0)
                  {
                    // iterate and display all category
                    foreach($category_query_run as $category_list)
                    {
                      //validate if the checkboxes are checked/functioning
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
                          <!-- Display the category as label for checkbox -->
                          <?php echo"<label for='c1'>" . $category_list['product_category'] . "</label>"; ?>
                        </li>
                      <?php
                    }
                  }
                ?>
              </ul>
            </div>
            <div class="row shadow p-3 mb-5 bg-body rounded">
              <ul>
                <li>
                  <h4>
                    Price
                  </h4>
                </li>
                <li>
                  <input id="c7" type="checkbox" name="least_expensive" value="ASC">
                  <label for="c7">Least Expensive</label>
                </li>
                <li>
                  <input id="c8" type="checkbox" name="most_expensive" value="DESC">
                  <label for="c8">Most Expensive</label>
                </li>
              </ul>
              <div class ="col-6">
                <lable for="minprice">Min </lable>
                <input type="number" id="minprice" name="low_price" min="0" max="100"  value="<?php if(isset($_POST['low_price'])){echo $_POST['low_price']; } else{echo "0";}?>" class="rounded form-control">
              </div>
              <div class ="col-6">
                <lable for="maxprice">Max </lable>
                <input type="number" id="maxprice" name="high_price" min="1" max="500" value="<?php if(isset($_POST['high_price'])){echo $_POST['high_price']; } else{echo "500";}?>" class="rounded form-control">
              </div>
            </div>
          </div>
        </div>
      </div>


        <div class="container pb-5">
          <div class="col-15 whiteBg">
            <div class="row row-cols-4 justify-content-center mt-2 pt-4">

            <?php
              # when user click the search button (regardless of checkboxes)
              if (isset($_POST['searchBtn']))
              {
                // get the value of the search key
                $search_key = "";
                $search_key = $_POST['search_key'];



                if(isset($_POST['pet_value']))
                {
                  // get the value of the pet checkboxes
                  $product_check = [] ;
                  $product_check = $_POST['pet_value'];

                  if (isset($_POST['category_value']))
                  {
                    // get the value of the category checkboxes
                    $category_check = [] ;
                    $category_check = $_POST['category_value'];




                    if  (isset($_POST['least_expensive']))
                    {
                      # IF user clicked everything + (least expensive checkbox)
                      if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                      {
                        $low_price = $_POST['low_price'];
                        $high_price = $_POST['high_price'];


                        //loop through all the products to find the products that match the search key
                        foreach($product_check as $row_product)
                        {
                          foreach($category_check as $row_category)
                          {
                            $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND category_id IN ($row_category) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%' ORDER BY product_price ASC";

                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                              foreach($query_run as $prod_items)
                              {
                                // Run SQL query and Display the product image, name, price, and link to product page
                                ?>
                                  <div class="col">
                                    <a href="item.php?<?=$prod_items['product_id']?>">
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
                          }
                        }
                      }

                      # if user clicked everything (least expensive checkbox) except price range
                      else
                      {
                        //loop through all the products to find the products that match the search key
                        foreach($product_check as $row_product)
                        {
                          foreach($category_check as $row_category)
                          {
                            $products = "SELECT * FROM product WHERE category_id IN ($row_category) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%' ORDER BY product_price ASC";
                            $products_run = mysqli_query($con, $products);
                            if(mysqli_num_rows($products_run) > 0)
                            {
                              foreach($products_run as $prod_items) :
                                // Run SQL query and Display the product image, name, price, and link to product page
                                ?>
                                  <div class="col">
                                    <a href="item.php?<?=$prod_items['product_id']?>">
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
                          }
                        }
                      }
                    }

                    elseif (isset($_POST['most_expensive']))
                    {
                      # IF user clicked everything (most expensive checkbox)
                      if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                      {
                        //get the values of the price range
                        $low_price = $_POST['low_price'];
                        $high_price = $_POST['high_price'];

                        //loop through all the products to find the products that match the search key
                        foreach($product_check as $row_product)
                        {
                          foreach($category_check as $row_category)
                          {
                            $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND category_id IN ($row_category) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%' ORDER BY product_price DESC";

                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                              foreach($query_run as $prod_items)
                              {
                                // Run SQL query and Display the product image, name, price, and link to product page
                                ?>
                                  <div class="col">
                                    <a href="item.php?<?=$prod_items['product_id']?>">
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
                          }
                        }
                      }

                      # if user clicked everything (most expensive checkbox) except price range
                      else
                      {
                        //loop through all the products to find the products that match the search key
                        foreach($product_check as $row_product)
                        {
                          foreach($category_check as $row_category)
                          {
                            //SQL query to get the products that match the search key
                            $products = "SELECT * FROM product WHERE category_id IN ($row_category) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%' ORDER BY product_price DESC";
                            $products_run = mysqli_query($con, $products);
                            if(mysqli_num_rows($products_run) > 0)
                            {
                              foreach($products_run as $prod_items) :
                                //  Run SQL query and Display the product image, name, price, and link to product page
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
                          }
                        }
                      }
                    }

                    # If user only checked cat,dog + category checkboxes then search
                    else
                    {
                      //loop through all the products to find the products that match the search key
                      foreach($category_check as $row_category)
                      {
                        foreach($product_check as $row_product)
                        {
                          //SQL query to get the products that match the search key
                          $categories = "SELECT * FROM product WHERE category_id IN ($row_category) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%'";
                          $categories_run = mysqli_query($con, $categories);
                          if(mysqli_num_rows($categories_run) > 0)
                          {
                            foreach($categories_run as $prod_items) :
                              // Run SQL query and Display the product image, name, price, and link to product page
                              ?>
                                <div class="col">
                                  <a href="item.php?<?=$prod_items['product_id']?>">
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
                        }
                      }
                    }

                  }

                  # if user select any pet type + least expensive
                  elseif  (isset($_POST['least_expensive']))
                  {
                    if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                    {
                      //get the values of the price range
                      $low_price = $_POST['low_price'];
                      $high_price = $_POST['high_price'];

                      //loop through all the products to find the products that match the search key
                      foreach($product_check as $row_product)
                      {
                        $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%' ORDER BY product_price ASC";

                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                          foreach($query_run as $prod_items)
                          {
                            // Run SQL query and Display the product image, name, price, and link to product page
                            ?>
                              <div class="col">
                                <a href="item.php?<?=$prod_items['product_id']?>">
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
                      }
                    }
                  }

                  # if user select any pet type + most expensive
                  elseif (isset($_POST['most_expensive']))
                  {
                    if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                    {
                      //get the values of the price range
                      $low_price = $_POST['low_price'];
                      $high_price = $_POST['high_price'];

                      foreach($product_check as $row_product)
                      {
                        //SQL query to get the products that match the search key
                        $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%' ORDER BY product_price DESC";
  
                        $query_run = mysqli_query($con, $query);
  
                        if(mysqli_num_rows($query_run) > 0)
                        {
                          foreach($query_run as $prod_items)
                          {
                            // Run SQL query and Display the product image, name, price, and link to product page
                            ?>
                              <div class="col">
                                <a href="item.php?<?=$prod_items['product_id']?>">
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
                      }
                    }
                  }

                  # if user select any pet type + price range
                  elseif(isset($_POST['low_price']) OR isset($_POST['high_price']))
                  {
                    //get the values of the price range
                    $low_price = $_POST['low_price'];
                    $high_price = $_POST['high_price'];

                    foreach($product_check as $row_product)
                    {
                      //SQL query to get the products that match the search key
                      $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND pet_id IN ($row_product) AND product_name LIKE '%$search_key%'";

                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0)
                      {
                        foreach($query_run as $prod_items)
                        {
                          // Run SQL query and Display the product image, name, price, and link to product page
                          ?>
                            <div class="col">
                              <a href="item.php?<?=$prod_items['product_id']?>">
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
                    }
                  }

                  #only checked cat or dog then search
                  else
                  {
                    //loop through all the products to find the products that match the search key
                    foreach($product_check as $row_product)
                    {
                      //SQL query to get the products that match the search key
                      $products = "SELECT * FROM product WHERE pet_id IN ($row_product) AND product_name LIKE '%$search_key%'";
                      $products_run = mysqli_query($con, $products);

                      if(mysqli_num_rows($products_run) > 0)
                      {
                        foreach($products_run as $prod_items) :
                          // Run SQL query and Display the product image, name, price, and link to product page
                          ?>
                            <div class="col">
                              <a href="item.php?<?=$prod_items['product_id']?>">
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
                    }
                  }
                }

                # If user (no check cat,dog checkbox)
                elseif (isset($_POST['category_value']))
                {
                  //get the value of the category
                  $category_check = [] ;
                  $category_check = $_POST['category_value'];


                  if  (isset($_POST['least_expensive']))
                  {

                    #if user check everything except cat or dog(least expensive)
                    if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                    {
                      //get the values of the price range
                      $low_price = $_POST['low_price'];
                      $high_price = $_POST['high_price'];

                      //loop through all the products to find the products that match the search key
                      foreach($category_check as $row_category)
                      {
                        $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND category_id IN ($row_category) AND product_name LIKE '%$search_key%' ORDER BY product_price ASC";

                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                          foreach($query_run as $prod_items)
                          {
                            // Run SQL query and Display the product image, name, price, and link to product page
                            ?>
                              <div class="col">
                                <a href="item.php?<?=$prod_items['product_id']?>">
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
                      }
                    }
                    # If user checked category checkboxes + least_expensive checkbox (no check cat,dog, price range checkbox)
                    else
                    {

                      //loop through all the products to find the products that match the search key
                      foreach($category_check as $row_category)
                      {
                        //SQL query to get the products that match the search key
                        $query = "SELECT * FROM product WHERE category_id IN ($row_category) AND product_name LIKE '%$search_key%' ORDER BY product_price ASC";

                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                          foreach($query_run as $prod_items)
                          {
                            // Run SQL query and Display the product image, name, price, and link to product page
                            ?>
                              <div class="col">
                                <a href="item.php?<?=$prod_items['product_id']?>">
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
                      }
                    }
                  }

                  elseif (isset($_POST['most_expensive']))
                  {

                    #if user check everything except cat or dog (most expensive)
                    if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                    {
                      //get the values of the price range
                      $low_price = $_POST['low_price'];
                      $high_price = $_POST['high_price'];
                      //loop through all the products to find the products that match the search key
                      foreach($category_check as $row_category)
                      {
                        $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND category_id IN ($row_category) AND product_name LIKE '%$search_key%' ORDER BY product_price DESC";
                        $query_run = mysqli_query($con, $query);
                        if(mysqli_num_rows($query_run) > 0)
                        {
                          foreach($query_run as $prod_items)
                          {
                            // Run SQL query and Display the product image, name, price, and link to product page
                            ?>
                              <div class="col">
                                <a href="item.php?<?=$prod_items['product_id']?>">
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
                      }
                    }

                    # If user checked category checkboxes + most expensive checkbox (no check cat,dog, price range checkbox)
                    else
                    {

                      //loop through all the products to find the products that match the search key
                      foreach($category_check as $row_category)
                      {
                        //SQL query to get the products that match the search key
                        $query = "SELECT * FROM product WHERE category_id IN ($row_category) AND product_name LIKE '%$search_key%' ORDER BY product_price DESC";

                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                          foreach($query_run as $prod_items)
                          {
                            // Run SQL query and Display the product image, name, price, and link to product page
                            ?>
                              <div class="col">
                                <a href="item.php?<?=$prod_items['product_id']?>">
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
                      }
                    }
                  }

                  #category + price range only
                  elseif (isset($_POST['low_price']) OR isset($_POST['high_price']))
                  {
                    //get the values of the price range
                    $low_price = $_POST['low_price'];
                    $high_price = $_POST['high_price'];

                    //loop through all the products to find the products that match the search key
                    foreach($category_check as $row_category)
                    {
                      //SQL query to get the products that match the search key
                      $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND category_id IN ($row_category) AND product_name LIKE '%$search_key%'";

                      $query_run = mysqli_query($con, $query);

                      if(mysqli_num_rows($query_run) > 0)
                      {
                        foreach($query_run as $prod_items)
                        {
                          // Run SQL query and Display the product image, name, price, and link to product page
                          ?>
                            <div class="col">
                              <a href="item.php?<?=$prod_items['product_id']?>">
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
                    }

                  }

                  # Only checked category checkboxes
                  else
                  {
                    //get category checkboxes values
                    $category_check = [] ;
                    $category_check = $_POST['category_value'];

                    //loop through all the products to find the products that match the search key
                    foreach($category_check as $row_category)
                    {
                      //SQL query to find the products that match the search key
                      $categories = "SELECT * FROM product WHERE category_id IN ($row_category)";
                      $categories_run = mysqli_query($con, $categories);
                      if(mysqli_num_rows($categories_run) > 0)
                      {
                        foreach($categories_run as $prod_items) :
                          // Run SQL query and Display the product image, name, price, and link to product page
                          ?>
                            <div class="col">
                              <a href="item.php?<?=$prod_items['product_id']?>">
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
                    }
                  }
                }


                elseif  (isset($_POST['least_expensive']))
                {
                  # least expensive + price range
                  if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                  {
                    //get the values of the price range
                    $low_price = $_POST['low_price'];
                    $high_price = $_POST['high_price'];

                    //SQL query to find the products that match the search key
                    $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND product_name LIKE '%$search_key%' ORDER BY product_price ASC";

                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                      foreach($query_run as $prod_items)
                      {
                        // Run SQL query and Display the product image, name, price, and link to product page
                        ?>
                          <div class="col">
                            <a href="item.php?<?=$prod_items['product_id']?>">
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
                  }


                  # If user only check least expensive checkboxes (no check cat,dog and category checkbox)
                  else
                  {
                    //SQL query to find the products that match the search key
                    $products = "SELECT * FROM product ORDER BY product_price ASC";
                    $products_run = mysqli_query($con, $products);
                    if(mysqli_num_rows($products_run) > 0)
                    {
                      foreach($products_run as $prod_items) :
                        // Run SQL query and Display the product image, name, price, and link to product page
                        ?>
                          <div class="col">
                            <a href="item.php?<?=$prod_items['product_id']?>">
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
                  }
                }

                # If user only check most expensive checkboxes
                elseif (isset($_POST['most_expensive']))
                {
                  # most expensive + price range
                  if(isset($_POST['low_price']) OR isset($_POST['high_price']))
                  {
                    //take the price range from the user
                    $low_price = $_POST['low_price'];
                    $high_price = $_POST['high_price'];

                    //SQL query to find the products that match the search key
                    $query = "SELECT * FROM product WHERE (product_price BETWEEN $low_price AND $high_price) AND product_name LIKE '%$search_key%' ORDER BY product_price DESC";

                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                      foreach($query_run as $prod_items)
                      {
                        // Run SQL query and Display the product image, name, price, and link to product page
                        ?>
                          <div class="col">
                            <a href="item.php?<?=$prod_items['product_id']?>">
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
                  }

                  # If user only check most expensive checkboxes
                  else
                  {
                    //SQL query to find the products that match the search key
                    $products = "SELECT * FROM product ORDER BY product_price DESC";
                    $products_run = mysqli_query($con, $products);
                    if(mysqli_num_rows($products_run) > 0)
                    {
                      foreach($products_run as $prod_items) :
                        // Run SQL query and Display the product image, name, price, and link to product page
                        ?>
                          <div class="col">
                            <a href="item.php?<?=$prod_items['product_id']?>">
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
                  }
                }

                # if user only select price range checkboxes
                else
                {
                  //take the price range from the user
                  $low_price = $_POST['low_price'];
                  $high_price = $_POST['high_price'];
                  //loop through all the products to find the products that match the search key
                  $query = "SELECT * FROM product WHERE product_price BETWEEN $low_price AND $high_price";
                  $query_run = mysqli_query($con, $query);
                  if(mysqli_num_rows($query_run) > 0)
                  {
                    foreach($query_run as $prod_items)
                    {
                      // Run SQL query and Display the product image, name, price, and link to product page
                      ?>
                        <div class="col">
                          <a href="item.php?<?=$prod_items['product_id']?>">
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
                    }
                  }
                }
              }
              # Static, when user haven't click the search button (Display all products)
              else
              {
                //SQL query to get all product data from database
                $products = "SELECT * FROM product";
                $products_run = mysqli_query($con, $products);
                if(mysqli_num_rows($products_run) > 0)
                {

                  $number_row = mysqli_num_rows($products_run);
                  ?>

                  <?php
                  foreach($products_run as $prod_items) :
                    // Run SQL query and Display the product image, name, price, and link to product page
                    ?>
                      <div class="col">
                        <a href="item.php?<?=$prod_items['product_id']?>">
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
              }
            ?>
            </div>
          </div>
        </div>
      </form>
    </div>
    <!-- Include Footer -->
    <?php include '../shared/footer.php';?>
    <!-- Execute search.js -->
    <script src="search.js"></script>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>