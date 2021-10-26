<?php
include("../../../../backend/conn.php");

$sql = "UPDATE product SET
product_pet = '$_POST[pet]',
product_name = '$_POST[name]',
product_image = '$file_name',
product_desc = '$_POST[desc]',
product_category = '$_POST[category]',
product_price = '$_POST[price]',
product_stock = '$_POST[stock]'

WHERE product_id=$_POST[id];";

if (mysqli_query($con,$sql)) {
    mysqli_close($con);
    header('Location: product.php');
}

//profile_photo,name,price,stock,pet,category,desc
?>
