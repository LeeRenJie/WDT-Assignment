<?php
	// Connect to database
	include("../../../../backend/conn.php");
	// Get cart id from url
	$id = intval($_GET['id']);
	// Delete cart
	$result = mysqli_query($con,"DELETE FROM shopping_cart WHERE cart_id=$id");
	// Close connection
	mysqli_close($con);
	// Redirect to checkout page
	header('Location: checkout.php');
?>