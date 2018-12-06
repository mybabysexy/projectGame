<?php 
	session_start();
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		include '../connectDB.php';
		$user = $_POST['username'];
		$pass = $_POST['password'];
		mysqli_set_charset($con, 'utf8');
		$result = mysqli_query($con, "select * from tkuser where (tenTK = '$user' or email = '$user' or sdt = '$user' ) and matKhau = '$pass'");
		$row = mysqli_num_rows($result);
		if($row == 0) {
			header("location: ../signin/index.php?err=1");
			mysqli_close($con);
		}
		else
		{
			while ($USER = mysqli_fetch_array($result)) {
				$_SESSION['nameKH'] = $USER['tenKH'];
				$_SESSION['idKH'] = $USER['maTK'];
			}
			header("location: ../");
			mysqli_close($con);
		}
	}
	// else header("location: index.php");
?>