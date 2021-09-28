<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="../../../src/stylesheets/new-product.css" rel="stylesheet" >
  <title>Edit Product</title>
</head>
<body>
  <?php include '../shared/navbar.php';?>
    <div class= "container-fluid">
        <br>
        <div class = "row">
            <div class= "col-3 mx-auto">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
                <div id="profile-container">
                    <image id="profileImage" src="http://lorempixel.com/100/100" alt="Profile Pic" />
                </div>  
                    <input id="imageUpload" type="file" 
                    name="profile_photo" placeholder="Photo" required="" capture>          
            </div>
            <!--Input-->
            <div class = "col-8">
                <div class="form-group row">
                    <label for="itemname" class="col-sm-2 col-form-label">Item description :</label>
                    <div class="col-sm-7">
                        <input type="text" maxlength="60" class="form-control" id="itemname" placeholder="Enter Product Description.." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="quantity" class="col-sm-2 col-form-label">Quantity :</label>
                    <div class="col-sm-7">
                        <input type="value" class="form-control" id="quantity" placeholder="Enter Product Quantity.." required="required">
                    </div>
                </div>
                <!--select border cannot black-->
                <div class="form-group row">
                    <label for="pet" class="col-sm-2 col-form-label">Pet :</label>
                    <div class="col-sm-7">
                        <select name="pet" required="required" class= "form-control form-control-md">
                        <option value="">Choose Pet Type</option>
                        <option value="Cat">Cat</option>
                        <option value="Dog">Dog</option>
                        </select>
                    </div>
                </div>
                <!--select border cannot black-->
                <div class="form-group row">
                    <label for="category" class="col-sm-2 col-form-label">Category :</label>
                    <div class="col-sm-7">
                        <select name="category" required="required" class= "form-control form-control-md">
                        <option value="">Choose Category</option>
                        <option value="food">Food</option>
                        <option value="toy">Toy</option>
                        <option value="healthcare">Healthcare</option>
                        <option value="gear">Gear</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="price" class="col-sm-2 col-form-label">Price :</label>
                    <div class="col-sm-7">
                        <input type="value" class="form-control" id="price" placeholder="Enter Product Price.." required="required">
                    </div>
                </div>
                <!--button-->
                <input class="btn btn-primary" type="submit" value="Confirm">
                <!--This is for delete. but the type not sure-->
                <input class="btn btn-primary" type="submit" value="Delete">
            </div>
        </div>
        <br>
    </div>
  <?php include '../shared/footer.php';?>
</body>
</html>