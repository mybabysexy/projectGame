<?php 
	session_start();
	if(isset($_POST['username']) && isset($_POST['password']))
	{
		include '../connectDB.php';
		$user = $_POST['username'];
		$pass = $_POST['password'];
		mysqli_set_charset($con, 'utf8');
		$sql = "select * from tkuser where (tenTK = '$user' or email = '$user' or sdt = '$user' )";
		// $result = mysqli_query($con, "select * from tkuser where (tenTK = '$user' or email = '$user' or sdt = '$user' ) and matKhau = '$pass'");
		$result = mysqli_query($con, $sql);
		echo $sql;
		$row = mysqli_num_rows($result);
		if($row == 0) {
			mysqli_close($con);
			header("location: ../signin/index.php?err=1");			
		}
		else
		{
			while ($USER = mysqli_fetch_array($result)) {
				$dbPass = $USER['matKhau'];
				if(password_verify($pass, $dbPass))
				{
					$name = $USER['tenKH'];
					$id = $USER['maTK'];
					$stat = $USER['trangthai'];
				}
				else
				{
					mysqli_close($con);
					echo "sai pass";
					header("location: ../signin/index.php?err=1");
				}
			}
			if($stat)
			{
				$_SESSION['nameKH'] = $name;
				$_SESSION['idKH'] = $id;
				mysqli_close($con);
				header("location: ../");
			}
			else
			{
				mysqli_close($con);
				header("location: ../signin/index.php?err=2");
			}
		}
	}
	// else header("location: index.php");
?>