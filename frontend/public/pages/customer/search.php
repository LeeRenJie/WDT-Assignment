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
  <div class="container-fluid">
    <div class= "container">
      <i class="fas fa-search"></i>
      <!--not yet include action to which page-->
      <form action="" method="post">
        <input type="text" placeholder="Search.." name="search">
        <button type="submit">Search</button>
      </form>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-2">
          <ul>
            <li>
              <input id="c1" type="checkbox">
              <label for="c1">Cat</label>
            </li>
            <li>
              <input id="c2" type="checkbox">
              <label for="c2">Dog</label>
            </li>
          </ul>
        </div>
        <div class="col-2">
          <ul>
            <li>
              <input id="c3" type="checkbox">
              <label for="c3">Toys</label>
            </li>
            <li>
              <input id="c4" type="checkbox">
              <label for="c4">Food</label>
            </li>
            <li>
              <input id="c5" type="checkbox">
              <label for="c5">Healthcare</label>
            </li>
            <li>
              <input id="c6" type="checkbox">
              <label for="c6">Gears</label>
            </li>
          </ul>
        </div>
        <div class="col-2">
          <ul>
              <li>
                <input id="c7" type="checkbox">
                <label for="c7">Least Expensive</label>
              </li>
              <li>
                <input id="c8" type="checkbox">
                <label for="c8">Most Expensive</label>
              </li>
            </ul>
        </div>
        <div class="col-1">
          <ul>
            <li>
              <lable for="minprice">Min </lable>
              <input type="number" id="minprice" name="minprice" min="0" max="100" placeholder="RM">
            </li>
          </ul>
        </div>
        <div class="col-1">
          <hr class=hori>
        </div>
        <div class="col-1">
          <ul>
            <li>
              <lable for="maxprice">Max </lable>
              <input type="number" id="maxprice" name="maxprice" min="1" max="101" placeholder="RM">
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <?php include '../shared/footer.php';?>
  <script src="search.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</script>
</body>
</html>