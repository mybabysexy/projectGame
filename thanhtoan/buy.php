<?php 
	session_start();
	if(isset($_SESSION['idKH']))
	{
		$maKH = $_SESSION['idKH'];
		include '../connectDB.php';

		$result = mysqli_query($con,"select maDonHang from hoadon ORDER by maDonHang");
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

		$sql = "insert into hoadon(maDonHang,maTK,tongTien,tinhTrang) values($nextCode,$maKH, $sumPrice, 0)";
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
				$slton = $sp['soLuong'] - $sl;
				$sql = "update sanpham set soLuong = $slton where maSP = $maSP";
				mysqli_query($con, $sql);
			}
		}
		unset($_SESSION['cartItem']);
		header("location: done.php");
		mysqli_close($con);
	}
?>