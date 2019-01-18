<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo $id;
		include '../../connectDB.php';
		mysqli_query($con, "update tkadmin set maQuyen = 0 where maTK = $id");
		mysqli_close($con);
		header("location: ./");
	}
?>