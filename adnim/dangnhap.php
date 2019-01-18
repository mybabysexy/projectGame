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
				$name = $USER['tenTK'];
				echo $name;
				$id = $USER['maTK'];
				echo $id;
				$maQuyen = $USER['maQuyen'];
				echo $maQuyen;
				$stat = $USER['trangthai'];
				echo $stat;
			}
			if($stat)
			{
				$_SESSION['nameAD'] = $name;
				$_SESSION['idAD'] = $id;
				$_SESSION['quyenAD'] = $maQuyen;
				mysqli_close($con);
				header("location: home.php");
			}
			else
			{
				mysqli_close($con);
				header("location: index.php?err=2");
			}
		}
	}
	// else header("location: index.php");
?>