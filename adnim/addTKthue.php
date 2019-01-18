<?php 
	session_start();
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		include '../connectDB.php';
		$password = $_POST['password'];
		$user = $_POST['username'];
		mysqli_set_charset($con, 'utf8');
		mysqli_query($con, " insert into tkthue(tenTK,matKhau) values ('$user','$password') ");
		mysqli_close($con);
		header("location: taikhoanthue.php");
	}
?>