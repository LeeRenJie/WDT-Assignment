<?php
	if(!isset($_SESSION)) {
		session_start();
	};

	if ($_SESSION['privilege'] == "user") {
		header("Location: ../customer/home.php");
	};

	include("../../../../backend/conn.php");
	$id = intval($_GET['id']); //get id in int
	$action = "DELETE FROM user WHERE user_id=$id";
	if (mysqli_query($con,$action)) {
		echo'<script>alert("User Had been deleted !");</script>';
		echo("<script>window.location = 'user.php'</script>");
	}
	else {
		die('Error: ' . mysqli_error($con));
	}
	mysqli_close($con);//close database connection
?>