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
	// Get user id from url
	$id = intval($_GET['id']);
	// Delete user from database
	$action = "DELETE FROM user WHERE user_id=$id";
  // Show alert if user is deleted successfully and redirect to user list page
	if (mysqli_query($con,$action)) {
		echo'<script>alert("User Had been deleted !");</script>';
		echo("<script>window.location = 'user.php'</script>");
	}
	// Display Error
	else {
		die('Error: ' . mysqli_error($con));
	}
	//close database connection
	mysqli_close($con);
?>