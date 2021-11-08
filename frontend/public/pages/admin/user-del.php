<?php
	include("../../../../backend/conn.php");
	$id = intval($_GET['id']); //get id in int
	$action = "DELETE FROM user WHERE user_id=$id";
	if (mysqli_query($con,$action)) {
		mysqli_close($con);//close database connection
		echo'<script>alert("User Had been deleted !");</script>';
		echo("<script>window.location = 'user.php'</script>");
	}
	else {
		echo'<script>alert("Failed to delete due to the user had purchase record !");</script>';
		echo("<script>window.location = 'user.php'</script>");
	}
?>