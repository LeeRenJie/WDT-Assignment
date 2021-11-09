<?php
	include("../../../../backend/conn.php");
	$id = intval($_GET['id']);
	$result = mysqli_query($con,"DELETE FROM shopping_cart WHERE cart_id=$id");
	mysqli_close($con);
	header('Location: checkout.php');
?>