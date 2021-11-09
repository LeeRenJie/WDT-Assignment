<?php
	if(!isset($_SESSION)) {
		session_start();
	};

	if ($_SESSION['privilege'] == "user") {
		header("Location: ../customer/home.php");
	};

	include("../../../../backend/conn.php");
	$product_id = intval($_GET['id']);
	$result = mysqli_query($con,"DELETE FROM product WHERE product_id=$product_id");
	if ($result) {
		echo'<script>alert("Product Has been deleted !");</script>';
		echo("<script>window.location = 'product.php'</script>");
	}
	else {
		die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);//close database connection
?>