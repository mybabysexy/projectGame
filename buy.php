<?php 
	session_start();
	if(isset($_GET['id']) && isset($_SESSION['idKH']))
	{
		$id = $_GET['id'];
		$maKH = $_SESSION['idKH'];
		include 'connectDB.php';
		mysqli_set_charset($con,'utf8');

		$result = mysqli_query($con,"select maDonHang from hoadon");
		$row = mysqli_num_rows($result);
		while($lastCode = mysqli_fetch_array($result))
		{
			$nextCode = $lastCode["maDonHang"];
		}
		echo ++$nextCode;

		$result = mysqli_query($con, "select * from sanpham where maSP=$id");
		while($sp = mysqli_fetch_array($result))
		{
			$maSP = $sp['maSP'];
			$gia = $sp['gia'];
			// $sql = "insert into hoadon(maTK,maSP,gia,soluong,tongTien,tinhTrang) values($maKH, $maSP, $gia,1,$gia, 1)";
			$sql = "insert into hoadon(maDonHang,maTK,tongTien,tinhTrang) values($nextCode,$maKH, $gia, 1)";
			mysqli_query($con, $sql);
			$sql = "insert into hoadonchitiet(maDonHang,maSP,gia,soluong) values($nextCode,$maSP, $gia, 1)";
			mysqli_query($con, $sql);
			header("location: ../checkout/done.php");
		}
		mysqli_close($con);
	}
?>