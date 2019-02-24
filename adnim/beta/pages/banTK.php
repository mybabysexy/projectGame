<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo $id;
		include 'connectDB.php';
		mysqli_query($con, "update tkuser set trangthai = 0 where maTK = $id");
		mysqli_close($con);
		header("location: taikhoan.php");
	}
?>