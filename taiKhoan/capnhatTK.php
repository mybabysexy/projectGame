<?php 
	session_start();
	if(isset($_POST['nameKH']) && isset($_POST['email']) && isset($_POST['sdt']))
	{
		include '../connectDB.php';
		$name = $_POST['nameKH'];
		$sdt = $_POST['sdt'];
		$email = $_POST['email'];
		$id = $_SESSION['idKH'];
		mysqli_set_charset($con, 'utf8');
		if(mysqli_query($con, " update tkuser set tenKH = '$name',sdt = '$sdt',email = '$email' where maTK = $id "))
		{
			$_SESSION['nameKH'] = $name;
			header("location: ../taiKhoan?c=2");
		}
		else header("location: ../taiKhoan?c=0");
		mysqli_close($con);
	}
?>