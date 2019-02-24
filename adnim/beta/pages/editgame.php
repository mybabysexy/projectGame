<?php 
	if ( isset($_GET['maSP']) && isset($_GET['NSX']) &&isset($_GET['theLoai']) &&isset($_GET['tenSP']) &&isset($_GET['gia']) &&isset($_GET['soLuong'])  ) {

		$maSP = $_GET['maSP'];
		$NSX = $_GET['NSX'];
		$theLoai = $_GET['theLoai'];
		$tenSP = $_GET['tenSP'];
		$gia = $_GET['gia'];
		$soLuong = $_GET['soLuong'];
		
		include 'connectDB.php';
		$sql = "update sanpham set maNSX = $NSX, maTheLoai = $theLoai, tenSP = '$tenSP', gia = '$gia', soLuong = $soLuong where maSP = $maSP";

		echo $sql;
		mysqli_query($con, $sql);
		mysqli_close($con);
		header("location: listgame.php");
	}
	else
	{
		header("location: ../index.php");
	}
?>