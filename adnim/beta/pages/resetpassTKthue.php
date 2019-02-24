<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo $id;
		include '../connectDB.php';
		mysqli_query($con, "update tkthue set matKhau = '12345' where maTK = $id");
		mysqli_close($con);
		header("location: taikhoanthue.php");
	}
?>