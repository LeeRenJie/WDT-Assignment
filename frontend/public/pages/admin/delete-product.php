<?php
  // start the session
	if(!isset($_SESSION)) {
		session_start();
	};

	// Restrict customer to access this page
	if ($_SESSION['privilege'] == "user") {
		header("Location: ../customer/home.php");
	};

	// Connect to database
	include("../../../../backend/conn.php");
	// Get product id from url
	$product_id = intval($_GET['id']);
	// Delete product from database
	$result = mysqli_query($con,"DELETE FROM product WHERE product_id=$product_id");
	// Show alert if product is deleted successfully and redirect to product list page
	if ($result) {
		echo'<script>alert("Product Has been deleted !");</script>';
		echo("<script>window.location = 'product.php'</script>");
	}
	// Display Error
	else {
		die('Error: ' . mysqli_error($con));
	}
	//close database connection
	mysqli_close($con);
?>