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

		$pass = password_hash($pass, PASSWORD_DEFAULT);

		mysqli_set_charset($con, 'utf8');
		$sql = " insert into tkuser(tenKH,sdt,email,tenTK,matKhau) values ('$name','$sdt','$email','$user','$pass') ";
		echo $sql;
		if(mysqli_query($con, $sql))
		{
			$result = mysqli_query($con, "select * from tkuser where (tenTK = '$user' or email = '$user' or sdt = '$user' )");

			while ($USER = mysqli_fetch_array($result)) {
				$_SESSION['nameKH'] = $USER['tenKH'];
				$_SESSION['idKH'] = $USER['maTK'];
			}
			mysqli_close($con);
			header("location: ../");
		}
		else
		{
			header("location: ../signup/?c=0");
		}

		
	}
?>