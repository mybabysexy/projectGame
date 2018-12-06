<?php 
	session_start();
	if(isset($_GET['id']) && isset($_SESSION['idKH']))
	{
		$id = $_GET['id'];
		$maKH = $_SESSION['idKH'];
		include 'connectDB.php';
		mysqli_set_charset($con,'utf8');
		$result = mysqli_query($con, "select * from sanpham where maSP=$id");
		while($sp = mysqli_fetch_array($result))
		{
			$maSP = $sp['maSP'];
			$gia = $sp['gia'];
			mysqli_query($con,"insert into hoadon(maTK,maSP,gia,soluong,tongTien,tinhTrang) values($maKH, $maSP, $gia,1,$gia, 1)");
			header("location: ../checkout/done.php");
		}
		mysqli_close($con);
	}
?>