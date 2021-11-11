<?php
  // start the session
  if(!isset($_SESSION)) {
    session_start();
  };

  // Restrict customer to access this page
  if ($_SESSION['privilege'] == "user") {
    header("Location: ../customer/home.php");
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
    <!-- Include Navigation Bar -->
    <?php include '../shared/navbar.php';?>
    <div class="container-fluid size">
      <!-- Search Function -->
      <form method="post" class="px-5 pb-4">
        <input type="text" class="form-control w-25 d-inline"name="search_key" placeholder="Search user..">
        <button class="btn btn-success" name="searchBtn" type="submit">Search</button>
      </form>
      <?php
        // Connect to database
        include("../../../../backend/conn.php");
        $search_key = "";
        if(isset($_POST['searchBtn'])){
          $search_key = $_POST['search_key'];
        }
        // Query for users based on privilege
        $result=mysqli_query($con,"SELECT * FROM user WHERE privilege='user' and
        (user_name LIKE '%$search_key%' or user_username LIKE '%$search_key%') ORDER BY user_id, user_name, user_username");
        $owner_result=mysqli_query($con,"SELECT * FROM user WHERE NOT privilege='owner' and
        (user_name LIKE '%$search_key%' or user_username LIKE '%$search_key%') ORDER BY user_id, user_name, user_username");
      ?>
      <div class="px-5 pb-5">
        <!-- Table  -->
        <table id="customer" class="text-center">
          <!-- Table Header -->
          <tr>
            <th class="text-center">Username</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Address</th>
            <th class="text-center">Phone Number</th>
            <th class="text-center">Privilege</th>
            <th class="text-center">Actions</th>
          </tr>
          <?php
            // Display different user details row by row based on logged in user privilege
            while($row=mysqli_fetch_array($_SESSION['privilege'] == "owner" ? $owner_result : $result)){
              echo "<tr>";
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
                  // Dropdown menu for actions
                  echo '<div class="dropdown textcenter">';
                    echo '<button class="btn btn-secondary dropdown-toggle buttons" type="button" id="quantity_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
                      echo "Actions";
                    echo "</button>";
                    echo '<div class="dropdown-menu text-center" aria-labelledby="quantity_dropdown">';
                      // Check if result row is a user
                      if ($row['privilege'] == "user"){
                        echo '<a class="dropdown-item" href="../customer/history.php?';
                          echo $row['user_id'];
                        echo'">Order History</a>';
                      }
                      // Check if owner is logged in
                      if ($_SESSION['privilege'] == "owner"){
                        // Delete button
                        echo "<a class='dropdown-item' href=\"user-del.php?id=";
                          echo $row['user_id'];
                          echo "\" onClick=\"return confirm('Delete ";
                          echo $row['user_name'];
                          echo " details?')";
                        echo "\">Delete</a>";
                      }
                    echo "</div>";
                  echo "</div>";
                echo"</td>";
              echo"</tr>";
            }
            //Close database connection
            mysqli_close($con);
          ?>
        </table>
      </div>
    </div>
    <!-- Include Footer -->
    <?php include '../shared/footer.php';?>
    <!-- Jquery and Bootstrap CDN link for JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>