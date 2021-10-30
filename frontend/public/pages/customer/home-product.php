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
    <?php include("../../../../backend/conn.php")?>

    <div class="container-fluid bg-color" id="search">
      <form action="" method="post">
      <div class="row">
        <div class="col-2">
          <button class="btn btn-outline-dark mt-4 mb-4 ml-4 float-right" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">Filter</button>
        </div>
        <div class="col-10">
          <p class="d-none">Empty</p>
        </div>
      </div>
      <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
        <div class="offcanvas-header">
          <div class= "container">
          <!--<form action="" method="post"> -->
            <i class="fas fa-search"></i>
            <input type="text" placeholder="Search Product" name="search_key">
            <button type="submit" name="searchBtn">Search</button>
          <!--</form>-->
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
            <div class="row shadow p-3 mb-5 bg-body rounded">
              <ul>
                <li>
                  <h4>
                    Category
                  </h4>
                </li>
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
                <input type="number" id="maxprice" name="high_price" min="1" max="101" value="<?php if(isset($_POST['high_price'])){echo $_POST['high_price']; } else{echo "100";}?>" class="rounded form-control">
              </div>
            </div>  
          </div>
        </div>
      </div>


        <div class="container ">   
          <div class="col-15 whiteBg">
            <div class="row row-cols-4 justify-content-center mt-2 pt-4">
            <?php
              $category_check = '' ; 
              #echo 'hi' . $_SERVER['QUERY_STRING'];
              $category_check = $_SERVER['QUERY_STRING'];
      
      
              $categories = "SELECT * FROM product WHERE category_id IN ($category_check)";
              $categories_run = mysqli_query($con, $categories);
              if(mysqli_num_rows($categories_run) > 0)
              {
                foreach($categories_run as $prod_items) :
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
            ?>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="search.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>