<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/new-product.css" rel="stylesheet" >
    <title>Register Product</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class= "container-fluid opcon bimg">
      <div class = "col-15 bwhite">
        <div class = "row justify-content-center">
          <!--profile-->
          <div class= "col-2 profile mt-4 ml-2"> <!--profile for js-->
            <div class = "imagecontainer">
              <image class="imge" src="../../images/img_three.jpg" alt="Profile Pic" />
            </div>
            <div class = "opcon">
              <input id="imageUpload" type="file" name="profile_photo" placeholder="Photo" required="" capture>
            </div>
          </div>
          <!--label-->
          <div class = "col-2 icon opcon ml-5 pl-5"> <!--icon for js-->
            <div class="form-group row">
                <label for="itemname" class = "col-form-label">Item description :</label>
            </div>
            <div class="form-group row">
              <label for="quantity" class = "col-form-label">Quantity :</label>
            </div>
            <div class="form-group row">
              <label for="pet" class = "col-form-label">Pet :</label>
            </div>
            <div class="form-group row">
              <label for="category" class = "col-form-label">Category :</label>
            </div>
            <div class="form-group row">
              <label for="price" class = "col-form-label">Price :</label>
            </div>
          </div>
          <!--input-->
          <div class = "col-7 tcon opcon"> <!--tcon for js-->
            <div class="col-sm-10 form-group row">
                <input type="text" maxlength="60" class="form-control" id="itemname" placeholder="Enter Product Description.." required>
            </div>
            <div class="col-sm-10 form-group row">
              <input type="value" class="form-control" id="quantity" placeholder="Enter Product Quantity.." required="required">
            </div>
            <div class="col-sm-10 form-group row">
              <select name="pet" required="required" class= "form-control form-control-md">
              <option value="">Choose Pet Type</option>
              <option value="Cat">Cat</option>
              <option value="Dog">Dog</option>
              </select>
            </div>
            <div class="col-sm-10 form-group row">
              <select name="category" required="required" class= "form-control form-control-md">
              <option value="">Choose Category</option>
              <option value="food">Food</option>
              <option value="toy">Toy</option>
              <option value="healthcare">Healthcare</option>
              <option value="gear">Gear</option>
              </select>
            </div>
            <div class="col-sm-10 form-group row">
              <input type="value" class="form-control" id="price" placeholder="Enter Product Price.." required="required">
            </div>
            <div class="tleft">
              <!--button-->
              <input class="btn-sub mr-2" type="submit" value="Add">
              <!--This is for delete. but the type not sure-->
              <input class="btn-sub" type="submit" value="Reset">
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="edit.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>

