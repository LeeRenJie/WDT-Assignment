<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="../../../src/stylesheets/edit-profile.css" rel="stylesheet" >
  <title>Edit-Profile Page</title>
</head>
<body>
  <?php include '../shared/navbar.php';?>
  <div class="container-fluid px-5">
    <div>
        <h2>XXX's Profile</h2>
    </div>
    <div class="row">
        <div class="col-9">
          <form action="">
            <fieldset disabled>
            <div class="form-group row">
                <label for="changeusername" class="col-sm-2 col-form-label">Username</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control-plaintext" id="changeusername" value="xxxxxx">
                </div>
            </div>
            </fieldset>
            <div class="form-group row">
                <label for="changename" class="col-sm-2 col-form-label">Name</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="changename" value="Lee Ren Jie" placeholder="Muhammad Ali Ming" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="changeemail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-10">
                  <input type="email" class="form-control" id="changeemail" value="leerenjie@gmail.com" placeholder="abc@gmail.com" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="changenumber" class="col-sm-2 col-form-label">Phone Number</label>
                <div class="col-sm-10">
                  <input type="tel" class="form-control" id="changenumber" value="+60156632798" placeholder="+60" pattern="+60[0-9]{2}-[0-9]{3}-[0-9]{4}" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="changeaddress" class="col-sm-2 col-form-label">Address</label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="changeaddress" value="151, Taman Merah Bunga, Jalan Jadi Happy, 58200 Kuala Lumpur" required>
                </div>
            </div>
            <fieldset disabled>
            <div class="form-group row">
                <label for="changepass" class="col-sm-2 col-form-label">Password</label>
                <div class="col-sm-10">
                  <input type="password" class="form-control-plaintext" id="changepass" value="abc">
                </div>
            </div>
            </fieldset>
            <button type="submit" class="btn btn-primary button1">Save</button>
          </form>
        </div>
        <div class="col-3">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
            <div id="profile-container">
                <image id="profileImage" src="http://lorempixel.com/100/100" alt="Profile Pic" />
            </div>  
                <input id="imageUpload" type="file" 
                name="profile_photo" placeholder="Photo" required="" capture>          
        </div>
    </div>
  </div>
  <?php include '../shared/footer.php';?>
</script>
</body>
</html>