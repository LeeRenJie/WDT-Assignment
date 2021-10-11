<?php
	include("../../../../backend/conn.php");
	//$_GET[‘id’] — Get the integer value from id parameter in URL.
	//intval() will returns the integer value of a variable
	$id = intval($_GET['id']);
	$result = mysqli_query($con,"DELETE FROM customer WHERE customer_id=$id");
	mysqli_close($con); //close database connection
	header('Location: user.php'); //redirect the page to user.php page
?>