<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo $id;
		include '../connectDB.php';
		mysqli_query($con, "delete from tkadmin where maTK = $id");
		mysqli_close($con);
		header("location: ./");
	}
?>