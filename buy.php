<?php 
	session_start();
	if(isset($_SESSION['idKH']))
	{
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

		$sumPrice = 0;
		foreach ($_SESSION['cartItem'] as $key => $value) {
			$back = mysqli_query($con, "Select * from sanpham where maSP = $key");
			$SP = mysqli_fetch_array($back);
			$sumPrice += $SP['gia']*$value;
		}
		echo " - ";
		echo $sumPrice;

		$sql = "insert into hoadon(maDonHang,maTK,tongTien,tinhTrang) values($nextCode,$maKH, $sumPrice, 1)";
		mysqli_query($con, $sql);
		
		foreach ($_SESSION['cartItem'] as $key => $value) 
		{
			$id = $key;
			$sl = $value;
			$result = mysqli_query($con, "select * from sanpham where maSP=$id");
			while($sp = mysqli_fetch_array($result))
			{
				$maSP = $sp['maSP'];
				$gia = $sp['gia'];
				$sql = "insert into hoadonchitiet(maDonHang,maSP,gia,soluong) values($nextCode,$maSP, $gia, $sl)";
				mysqli_query($con, $sql);
			}
		}
		header("location: ../checkout/done.php");
		mysqli_close($con);
	}
?>