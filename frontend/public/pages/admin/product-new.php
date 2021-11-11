<?php
if(!isset($_SESSION)) {
  session_start();
};

if ($_SESSION['privilege'] == "user") {
  header("Location: ../customer/home.php");
};

if (isset($_POST['addProductBtn'])) {
  include("../../../../backend/conn.php");
  $file_path = "../../images/";
  $target_file = $file_path . basename($_FILES['productPic']['name']);
  $check_number = $_POST['price'];
  $category = $_POST['category'];
  switch ($category) {
    case 'Toys':
      $category = 1;
      break;
    case 'Food':
      $category = 2;
      break;
    case 'Healthcare':
      $category = 3;
      break;
    case 'Gears':
      $category = 4;
      break;
  }

  $pet = $_POST['pet'];
  $pet == "Cat" ? $pet=1 : $pet=2;

  if (move_uploaded_file($_FILES["productPic"]["tmp_name"], $target_file)) {
    //To get file name
    $file_name= basename($_FILES["productPic"]["name"]);
    //To store the file name & file title into the database

    if(!preg_match("/^[0-9]*$/", $check_number)){
      echo("<script>alert('Only numeric value is allowed for Price!')</script>");
    }
    else{
      $sql="INSERT INTO product (product_image, product_desc, product_name, category_id, pet_id, product_price)
      VALUES ('$file_name','$_POST[desc]','$_POST[name]','$category','$pet','$_POST[price]')";
      if (!mysqli_query($con,$sql)){
        die('Error: ' . mysqli_error($con));
      }
      else{
        echo("<script>alert('Product Successfully Added!')</script>");
        echo("<script>window.location = 'product.php'</script>");
      }
    }
    mysqli_close($con);
  }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/product-new.css" rel="stylesheet" >
    <title>Register Product</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class= "container-fluid opcon bimg">
      <form action="product-new.php" method="post" ENCTYPE="multipart/form-data">
        <div class = "bwhite py-5">
          <div class = "row justify-content-center">
            <!--profile-->
            <div class= "col-2 profile mt-4 ml-2"> <!--profile for js-->
              <div class = "imagecontainer" id = "imageContainer">
                <image class="imge" id="img" name="img" src="../../images/default.jpg" alt="Profile Pic" />
              </div>
              <div class = "opcon">
                <input id="imageUpload" type="file" name="productPic" onchange="preimg()" required="" capture>
              </div>
            </div>
            <!--label-->
            <div class = "col-2 icon opcon ml-5 pl-5"> <!--icon for js-->
              <div class="form-group row">
                <label for="name" class="col-form-label">Product Name :</label>
              </div>
              <div class="form-group row">
                <label for="price" class="col-form-label">Price :</label>
              </div>
              <div class="form-group row">
                <label for="pet" class="col-form-label">Pet :</label>
              </div>
              <div class="form-group row">
                <label for="category" class="col-form-label">Category :</label>
              </div>
              <div class="form-group row">
                <label for="desc" class="col-form-label">Product description :</label>
              </div>
            </div>
            <!--input-->
            <div class="col-7 tcon opcon"> <!--tcon for js-->
              <div class="col-sm-10 form-group row">
                <input type="text" maxlength="50" class="form-control" name="name" placeholder="Enter Product Name.." required="required">
              </div>
              <div class="col-sm-10 form-group row">
                <input type="int" class="form-control" name="price" placeholder="Enter Product Price.. (RM)" required="required">
              </div>
              <div class="col-sm-10 form-group row">
                <select name="pet" required="required" name="pet" class="form-control form-control-md">
                  <option value="">Choose Pet Type</option>
                  <option value="Cat">Cat</option>
                  <option value="Dog">Dog</option>
                </select>
              </div>
              <div class="col-sm-10 form-group row">
                <select name="category" required="required" name="category" class="form-control form-control-md">
                  <option value="">Choose Category</option>
                  <option value="Food">Food</option>
                  <option value="Toys">Toys</option>
                  <option value="Healthcare">Healthcare</option>
                  <option value="Gears">Gears</option>
                </select>
              </div>
              <div class="col-sm-10 form-group row">
                <textarea type="textarea" rows="4" maxlength="60" class="form-control" name="desc" placeholder="Enter Product Description.." required="required"></textarea>
              </div>
              <div class="tleft">
                <input class="btn-sub mr-2" type="submit" name="addProductBtn" value="Add">
                <input class="btn-sub" type="reset" value="Reset">
              </div>
            </div>
          </div>
        </div>
      </form>
    </div>
    <?php include '../shared/footer.php';?>
    <!--js to resize-->
    <script src="product-edit.js"></script>
    <!--js to preview image-->
    <script>
    // (Nkron, 2014)
    function preimg() {
      document.getElementById('img').src="../../images/default.jpg";
      var picture = new FileReader();
      if (picture){
        picture.onload = function()
        {
            var imgpreview = document.getElementById('img');
            imgpreview.src = picture.result;
          }
        picture.readAsDataURL(event.target.files[0]);
      }
    }
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>