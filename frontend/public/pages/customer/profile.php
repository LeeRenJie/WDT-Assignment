<?php
include("../../../../backend/conn.php");
if(!isset($_SESSION)) {
  session_start();
}
$userid = $_SESSION['user_id']; //get user id
$result = mysqli_query($con, "SELECT * FROM user WHERE user_id = $userid");
$userdata = mysqli_fetch_assoc($result);
$validation_query = "SELECT * FROM user WHERE privilege = 'user' ";
$validation_query_run = mysqli_query($con, $validation_query);

if (isset($_POST['saveInfoBtn'])) {
  //get file
  $userProPic = $_FILES['profilePic']['tmp_name'];
  //get user's newly typed username
  $check_username = strtolower($_POST['username']);
  $_SESSION['username'] = $check_username;
  //check either got image or not
  if ($_FILES['profilePic']['size'] > 0){
    //get image type
    $imageFileType = strtolower(pathinfo($userProPic,PATHINFO_EXTENSION)); //(Newbedev, 2021)
    //encode image into base64
    $base64_Img = base64_encode(file_get_contents($userProPic));
    //set image content with type and base64
    $image = 'data:image/'.$imageFileType.';base64,'.$base64_Img;
    $sql = "UPDATE user SET
    user_username = LOWER('$_POST[username]'),
    user_name = '$_POST[name]',
    user_image = '$image',
    user_email = '$_POST[email]',
    user_address = '$_POST[address]',
    user_phone_number = '$_POST[phoneNumber]'
    WHERE user_id=$_POST[id];";
  }
  else {
  $sql = "UPDATE user SET
  user_username = LOWER('$_POST[username]'),
  user_name = '$_POST[name]',
  user_email = '$_POST[email]',
  user_address = '$_POST[address]',
  user_phone_number = '$_POST[phoneNumber]'
  WHERE user_id=$_POST[id];";
  }

  foreach($validation_query_run as $row)
  {
    //check if username is already taken
    if($row['user_username'] == $check_username)
    {
      echo("<script>alert('This username is used!')</script>");
      echo("<script>window.location = 'profile.php'</script>");
    }
    else{
      if (mysqli_query($con,$sql)){
        echo'<script>alert("Your Details Have Been Updated Successfully!");</script>';
        echo("<script>window.location = 'home.php'</script>");
      }
    }
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
    <link href="../../../src/stylesheets/profile.css" rel="stylesheet" >
    <title>Profile Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <form method="post" ENCTYPE="multipart/form-data">
      <!--get user id-->
      <input type = "hidden" name = "id" value ="<?php echo $userdata['user_id']?>">
      <div class="container-fluid cont px-5 modify">
        <div class = "col-15 background-white py-5">
          <div class = "row box-container">
            <h2><strong><?php echo $userdata["user_name"]?></strong> Profile</h2>
          </div>
          <div class="row justify-content-center ml-2">
            <div class="col-9">
              <!--change username-->
              <div class="form-group row">
                <label for="username" class="col-sm-2 col-form-label">Username :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="username" name="username" value="<?php echo $userdata['user_username']?>" required="required">
                </div>
              </div>
              <!--change name-->
              <div class="form-group row">
                <label for="name" class="col-sm-2 col-form-label">Name :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="name" name="name" value="<?php echo $userdata['user_name']?>" required="required">
                </div>
              </div>
              <!--change email-->
              <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label">Email :</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="email" name="email" value="<?php echo $userdata['user_email']?>" required="required">
                </div>
              </div>
              <!--change phone number-->
              <div class="form-group row">
                <label for="number" class="col-sm-2 col-form-label">Phone Number :</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="number" name="phoneNumber" value="<?php echo $userdata['user_phone_number']?>" pattern="+60[0-9]{2}-[0-9]{3}-[0-9]{4}" required="required">
                </div>
              </div>
              <!--change address-->
              <div class="form-group row">
                <label for="address" class="col-sm-2 col-form-label">Address :</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="address" name="address" value="<?php echo $userdata['user_address']?>" required="required">
                </div>
              </div>
              <!--Display user password with ** only-->
              <fieldset disabled>
                <div class="form-group row">
                  <label for="password" class="col-sm-2 col-form-label">Password :</label>
                  <div class="col-sm-10">
                    <input type="password" class="form-control-plaintext" id="password" name="password" value="<?php echo $userdata['user_password']?>">
                  </div>
                </div>
              </fieldset>
              <!--Submit button-->
              <div class="row btnCon">
                <input class="btn-sub mr-2" id="button" type="submit" value="Save" name="saveInfoBtn">
              </div>
            </div>
            <!--Profile Picture-->
            <div class="col-3 justify-content-center pl-5">
              <div class="profile-container">
                <image class="imge" id="img" name="img" src=<?php echo ($userdata['user_image'])?> alt="Profile Pic" />
              </div>
                <input id="imageUpload" type="file" name="profilePic" onchange="preimg()" capture>
            </div>
          </div>
        </div>
      </div>
    </form>
    <?php include '../shared/footer.php';?>
    <!--js function-->
    <script>
    //this script use to preview image before upload
    // (Nkron, 2014)
    function preimg() {
      document.getElementById('img').src="<?php echo $userdata['user_image']?>";
      var picture = new FileReader();
      if (picture) {
        picture.onload = function()
          {
        var imgpreview = document.getElementById('img');
        imgpreview.src = picture.result;
        }
        picture.readAsDataURL(event.target.files[0]);
      }
    }

    //this script disable button when the modify unchange
    // (Flexiple, n.d.)
    let change = document.querySelector(".modify");
    let disBut = document.getElementById('button');
    disBut.disabled = true;
    change.addEventListener("change", disField);
    function disField() {
      if(document.querySelector(".modify").value === "") {
        disBut.disabled = true;
      } else {
        disBut.disabled = false;
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