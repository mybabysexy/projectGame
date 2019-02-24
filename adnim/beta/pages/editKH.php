<?php
	if(isset($_POST['maTK']) && isset($_POST['tenKH']) && isset($_POST['sdt']) && isset($_POST['email']))
	{
		include 'connectDB.php';
		$id = $_POST['maTK'];
		$name = $_POST['tenKH'];
		$sdt = $_POST['sdt'];
		$email = $_POST['email'];
		mysqli_set_charset($con, 'utf8');
		mysqli_query($con, " update tkuser set tenKH='$name', sdt='$sdt', email='$email' where maTK = $id");
		mysqli_close($con);
		header("location: taikhoan.php");
	}
?>