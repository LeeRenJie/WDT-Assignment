<?php
include("../../../../backend/conn.php");
$id = intval($_GET['id']); //get int value of the variable
$result = mysqli_query($con, "
  SELECT pd.*, cat.product_category as product_category, pet.product_pet as product_pet
  FROM product AS pd JOIN category AS cat ON pd.category_id = cat.category_id
  JOIN pet ON pd.pet_id = pet.pet_id
  WHERE pd.product_id = $id
");
$row = mysqli_fetch_assoc($result);
//get image store in images folder
$file_path = "../../images/";
$prodImg = $file_path . basename($row["product_image"]);
if (isset($_POST['editProductBtn'])){
	$target_file = $file_path . basename($_FILES['productPic']['name']);
	if (move_uploaded_file($_FILES["productPic"]["tmp_name"], $target_file))
	{
		$file_name= basename($_FILES["productPic"]["name"]);
	}
  else{
    $file_name = basename($row["product_image"]);
  };

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
  };

  $pet = $_POST['pet'];
  $pet == "Cat" ? $pet=1 : $pet=2;

  $sql = "UPDATE product SET
  pet_id = '$pet',
  product_name = '$_POST[name]',
  product_image = '$file_name',
  product_desc = '$_POST[desc]',
  category_id = '$category',
  product_price = '$_POST[price]',
  product_stock = '$_POST[stock]'
  WHERE product_id = $_POST[id];";

  if (mysqli_query($con,$sql)) {
    mysqli_close($con);
    echo'<script>alert("Product Details Had Changed Successfully!");</script>';
    echo("<script>window.location = 'product.php'</script>");
  }
  else {
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/product-new.css" rel="stylesheet" >
    <title>Edit Product</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <form method="post" ENCTYPE="multipart/form-data">
    <input type = "hidden" name = "id" value = "<?php echo $row['product_id'] ?>">
    <div class= "container-fluid bimg">
      <div class = "col-15 bwhite">
        <div class = "row justify-content-center">
          <!--profile-->
          <div class= "col-2 mt-4 ml-2">
            <div class = "imagecontainer">
              <image class="imge" id="img" name="img" src="<?php echo $prodImg?>" alt="Profile Pic" />
            </div>
            <div class = "opcon">
              <input id="imageUpload" type="file" name="productPic" onchange="preimg()" capture>
            </div>
          </div>
          <!--label-->
          <div class = "col-2 opcon ml-5 pl-5">
            <div class="form-group row">
              <label for="name" class="col-form-label">Product Name :</label>
            </div>
            <div class="form-group row">
              <label for="price" class = "col-form-label">Price :</label>
            </div>
            <div class="form-group row">
              <label for="stock" class = "col-form-label">Stock :</label>
            </div>
            <div class="form-group row">
              <label for="pet" class = "col-form-label">Pet :</label>
            </div>
            <div class="form-group row">
              <label for="category" class = "col-form-label">Category :</label>
            </div>
            <div class="form-group row">
              <label for="desc" class = "col-form-label">Item description :</label>
            </div>
          </div>
          <!--input-->
          <div class = "col-7 opcon">
            <div class="col-sm-10 form-group row">
              <input type="text" maxlength="50" class="form-control" name="name" value="<?php echo $row['product_name']?>" required="required">
            </div>
            <div class="col-sm-10 form-group row">
              <input type="number" class="form-control" name="price" id="price" value="<?php echo $row['product_price']?>" required="required">
            </div>
            <div class="col-sm-10 form-group row">
              <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $row['product_stock']?>" required="required">
            </div>
            <div class="col-sm-10 form-group row">
              <select name="pet" required="required" class= "form-control form-control-md">
                <option value="">Choose Pet Type</option>
                <option
                <?php
                if ($row["product_pet"]=="Cat"){
                  echo 'selected="selected"';
                  $pet = 1;
                }
                ?>
                value="Cat">Cat</option>
                <option
                <?php
                if ($row["product_pet"]=="Dog"){
                  echo 'selected="selected"';
                  $pet = 2;
                }
                ?>
                value="Dog">Dog</option>
              </select>
            </div>
            <div class="col-sm-10 form-group row">
              <select name="category" required="required" class= "form-control form-control-md">
                <option value="">Choose Category</option>
                <option
                <?php
                if ($row["product_category"]=="Food"){
                  echo 'selected="selected"';
                  $category = 1;
                }
                ?>
                value="Food">Food</option>
                <option
                <?php
                if ($row["product_category"]=="Toys"){
                  echo 'selected="selected"';
                  $category = 2;
                }
                ?>
                value="Toys">Toys</option>
                <option
                <?php
                if ($row["product_category"]=="Healthcare"){
                  echo 'selected="selected"';
                  $category = 3;
                }
                ?>
                value="Healthcare">Healthcare</option>
                <option
                <?php
                if ($row["product_category"]=="Gears"){
                  echo 'selected="selected"';
                  $category = 4;
                }
                ?>
                value="Gears">Gears</option>
              </select>
            </div>
            <div class="col-sm-10 form-group row">
              <textarea type="textarea" rows="3" column="3" maxlength="200" class="form-control" name="desc"
              required="required"><?php echo $row['product_desc'] ?></textarea>
            </div>
            <div class="tleft">
              <!--button-->
              <input class="btn-sub mr-2" type="submit" value="Confirm" name="editProductBtn">
              <?php
              echo "<a class='btn-sub' href=\"delete-product.php?id=";
                  echo $id;
                  echo "\" onClick=\"return confirm('Delete ";
                  echo $row['product_name'];
                  echo " details?')";
                echo "\">Delete</a>";
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    </form>
    <?php include '../shared/footer.php';?>
    <!--js to preview image-->
    <script>
    // (Nkron, 2014)
    function preimg() {
      document.getElementById('img').src="<?php echo $prodImg?>";
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
    <?php
      mysqli_close($con);
    ?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>