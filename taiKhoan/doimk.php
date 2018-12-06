<?php 
	session_start();
	if(isset($_POST['password']))
	{
		include '../connectDB.php';
		$pass = $_POST['password'];
		$id = $_SESSION['idKH'];
		mysqli_set_charset($con, 'utf8');
		if(mysqli_query($con, " update tkuser set matKhau = '$pass' where maTK = $id "))
		{
			header("location: ../taiKhoan?c=1");
		}
		else header("location: ../taiKhoan?c=0");
		mysqli_close($con);
	}
?>