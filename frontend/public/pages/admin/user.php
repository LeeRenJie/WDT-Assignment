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
    <div class="parentbox">
      <div style="width:50%; float: left">
        <form method="post">
          Search
          <input type="text" style="width: 250px; padding: 8px; margin: 3px 0 11px 0; display: inline-block; font-size:12pt;" name="search_key">
          <button class="button" name="searchBtn" type="submit">Submit</button>
        </form>
      </div>
    </div>

    <?php
    include("../../../../backend/conn.php");
    $search_key = "";

    if(isset($_POST['searchBtn'])){
      $search_key = $_POST['search_key'];
    }

    $result=mysqli_query($con,"SELECT * FROM customer WHERE customer_name LIKE '%$search_key%' ORDER BY customer_name");
    ?>
    <table id="customer" class="text-center">
      <tr>
        <th><input id="checkbox" type="checkbox"></th>
        <th>Username</th>
        <th>Phone Number</th>
        <th>Email</th>
        <th>Address</th>
        <th>Actions</th>
      </tr>
    <?php
      while($row=mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>";
        echo "<input id='' type='checkbox'>";
        echo "</td>";
        echo "<td>";
        echo $row['customer_username'];
        echo "</td>";
        echo "<td>";
        echo "<a href=\"mailto:".$row['customer_email']."\">".$row['customer_email']."</a> "; // Hyperlink
        echo "</td>";
        echo "<td>";
        echo $row['customer_address'];
        echo "</td>";
        echo "<td>";
        echo $row['customer_phone_number'];
        echo "</td>";
        echo "<td>";
        echo '<div class="dropdown textcenter">';
        echo '<button class="btn btn-secondary dropdown-toggle buttons" type="button" id="quantity_dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        echo "Actions";
        echo "</button>";
        echo '<div class="dropdown-menu text-center" aria-labelledby="quantity_dropdown">';
        echo '<input type="button" class="dropdown-item" value="Order History" href="../customer/history.php"></input>';
        echo "<input type='button' class='dropdown-item' value='Edit' href=\"user-edit.php?id=";
        echo $row['customer_id'];
        echo "\"></input>";
        echo "<input type='button' class='dropdown-item' value='Delete' href=\"user-del.php?id="; //hyperlink to delete.php page with ‘id’ parameter
        echo $row['customer_id'];
        echo "\" onClick=\"return confirm('Delete "; //JavaScript to confirm the deletion of the record
        echo $row['customer_name'];
        echo " details?');\"></input></div></td></tr>";
        echo"</div>";
        echo"</div>";
        }
        mysqli_close($con);//to close the database connection
      ?>
      </table>
    <?php include '../shared/footer.php';?>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>