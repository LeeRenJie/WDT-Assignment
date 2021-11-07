<?php
if(!isset($_SESSION)) {
  session_start();
};

if ($_SESSION['privilege'] == "user") {
  echo("<script>alert('Username already exists!')</script>");
  header("Location: ../../../customer/home.php");
};
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="../../../src/stylesheets/user.css" rel="stylesheet" >
    <title>User Management Page</title>
  </head>
  <body>
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid">
      <div class="container mt-4">
        <div style="width:50%; float: left">
          <form method="post">
            Search
            <input type="text" style="width: 200px; padding: 8px; margin: 3px 0 11px 0; display: inline-block; font-size:12pt;" name="search_key">
            <button class="btn btn-md btn-secondary" name="searchBtn" type="submit">Search</button>
          </form>
        </div>
      </div>

      <?php
      include("../../../../backend/conn.php");
      $search_key = "";

      if(isset($_POST['searchBtn'])){
        $search_key = $_POST['search_key'];
      }

      $result=mysqli_query($con,"SELECT * FROM user WHERE privilege='user' and (user_name LIKE '%$search_key%' or user_username LIKE '%$search_key%') ORDER BY user_id, user_name, user_username");
      $owner_result=mysqli_query($con,"SELECT * FROM user WHERE NOT privilege='owner' and (user_name LIKE '%$search_key%' or user_username LIKE '%$search_key%') ORDER BY user_id, user_name, user_username");
      ?>
      <div class="container mb-5">
        <table id="customer" class="text-center">
          <tr>
            <th class="text-center"><input id="checkbox" type="checkbox"></th>
            <th class="text-center">Username</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            <th class="text-center">Phone Number</th>
            <th class="text-center">Privilege</th>
            <th class="text-center">Actions</th>
          </tr>
          <?php
            while($row=mysqli_fetch_array($_SESSION['privilege'] == "owner" ? $owner_result : $result)){
              echo "<tr>";
                echo "<td>";
                  echo "<input id='' type='checkbox'>";
                echo "</td>";
                echo "<td>";
                  echo $row['user_username'];
                echo "</td>";
                echo "<td>";
                echo $row['user_name'];
              echo "</td>";
                echo "<td>";
                  echo "<a href=\"mailto:".$row['user_email']."\">".$row['user_email']."</a> "; // Hyperlink
                echo "</td>";
                echo "<td>";
                  echo $row['user_address'];
                echo "</td>";
                echo "<td>";
                  echo $row['user_phone_number'];
                echo "</td>";
                echo "<td>";
                  echo $row['privilege'];
              echo "</td>";
                echo "<td>";
                  echo '<div class="dropdown textcenter">';
                    echo '<button class="btn btn-secondary dropdown-toggle buttons" type="button" id="quantity_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                      echo "Actions";
                    echo "</button>";
                    echo '<div class="dropdown-menu text-center" aria-labelledby="quantity_dropdown">';
                      if ($row['privilege'] == "user"){
                      echo '<a class="dropdown-item" href="../customer/history.php">Order History</a>';
                      }
                      if ($_SESSION['privilege'] == "owner"){
                      echo "<a class='dropdown-item' href=\"user-del.php?id="; //hyperlink to delete.php page with ‘id’ parameter
                        echo $row['user_id'];
                        echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
                        echo $row['user_name'];
                        echo " details?')";
                      echo "\">Delete</a>";
                      }
                    echo "</div>";
                  echo "</div>";
                echo"</td>";
              echo"</tr>";
            }
            mysqli_close($con);//to close the database connection
          ?>
        </table>
      </div>
    </div>
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>