<?php 
	session_start();
	if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['nameKH']) && isset($_POST['email']) && isset($_POST['sdt']))
	{
		include '../connectDB.php';
		$name = $_POST['nameKH'];
		$sdt = $_POST['sdt'];
		$email = $_POST['email'];
		$user = $_POST['username'];
		$pass = $_POST['password'];
		mysqli_set_charset($con, 'utf8');
		mysqli_query($con, " insert into tkuser(tenKH,sdt,email,tenTK,matKhau) values ('$name','$sdt','$email','$user','$pass') ");
		$result = mysqli_query($con, "select * from tkuser where (tenTK = '$user' or email = '$user' or sdt = '$user' ) and matKhau = '$pass'");
		$_SESSION['nameKH'] = mysqli_fetch_array($result)['tenKH'];
		$_SESSION['idKH'] = mysqli_fetch_array($result)['maKH'];
		mysqli_close($con);
		header("location: ../");
	}
?>