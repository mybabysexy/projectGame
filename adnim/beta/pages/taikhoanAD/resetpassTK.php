<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo $id;
		include '../connectDB.php';
		mysqli_query($con, "update tkadmin set matKhau = 'xxxxx' where maTK = $id");
		mysqli_close($con);
		header("location: ./");
	}
?>