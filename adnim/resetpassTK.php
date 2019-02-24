<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo $id;
		include '../connectDB.php';
		$pass = password_hash('12345',PASSWORD_DEFAULT);
		mysqli_query($con, "update tkuser set matKhau = '$pass' where maTK = $id");
		mysqli_close($con);
		header("location: taikhoan.php");
	}
?>