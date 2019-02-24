<?php 
	if ( isset($_POST['moTa']) && isset($_POST['cauHinh']) && isset($_POST['maSP']) ) {

		$maSP = $_POST['maSP'];
		$moTa = $_POST['moTa'];
		$cauHinh = $_POST['cauHinh'];
		
		include '../connectDB.php';
		$sql = "update sanpham set moTa = '$moTa', cauHinh = '$cauHinh' where maSP = $maSP";

		//echo $sql;
		mysqli_query($con, $sql);
		mysqli_close($con);
		header("location: listgame.php");
	}
	else
	{
		header("location: index.php");
	}
?>