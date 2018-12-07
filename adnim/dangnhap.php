<?php 
	session_start();
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		include '../connectDB.php';
		$user = $_POST['username'];
		$pass = $_POST['password'];
		mysqli_set_charset($con, 'utf8');
		$result = mysqli_query($con, "select * from tkadmin where (tenTK = '$user' or email = '$user' or sdt = '$user' ) and matKhau = '$pass'");
		$row = mysqli_num_rows($result);
		if($row == 0) {
			header("location: ../adnim/index.php?err=1");
			mysqli_close($con);
		}
		else
		{
			while ($USER = mysqli_fetch_array($result)) {
				$_SESSION['nameAD'] = $USER['tenTK'];
				echo $_SESSION['nameAD'];
				$_SESSION['idAD'] = $USER['maTK'];
				echo $_SESSION['idAD'];
			}
			header("location: home.php");
			mysqli_close($con);
		}
	}
	// else header("location: index.php");
?>