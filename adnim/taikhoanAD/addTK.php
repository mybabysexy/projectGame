<?php 
	session_start();
	if(isset($_POST['tenTK']) && isset($_POST['tenKH']) && isset($_POST['email']) && isset($_POST['sdt']))
	{
		include '../../connectDB.php';
		$name = $_POST['tenKH'];
		$sdt = $_POST['sdt'];
		$email = $_POST['email'];
		$user = $_POST['tenTK'];
		mysqli_set_charset($con, 'utf8');
		mysqli_query($con, " insert into tkadmin(tenAD,sdt,email,tenTK,matKhau) values ('$name','$sdt','$email','$user','xxxxx') ");
		mysqli_close($con);
		header("location: ./");
	}
?>