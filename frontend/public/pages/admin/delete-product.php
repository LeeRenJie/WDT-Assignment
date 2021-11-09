<?php
	if(!isset($_SESSION)) {
		session_start();
	};

	if ($_SESSION['privilege'] == "user") {
		header("Location: ../customer/home.php");
	};

	include("../../../../backend/conn.php");
	//$_GET[‘id’] — Get the integer value from id parameter in URL.
	//intval() will returns the integer value of a variable
	$product_id = intval($_GET['id']);
	echo $product_id;
	$result = mysqli_query($con,"DELETE FROM product WHERE product_id=$product_id");
	mysqli_close($con); //close database connection
	header('Location: product.php');
?>