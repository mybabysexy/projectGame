<?php 
	session_start();
	if(isset($_SESSION['idKH']))
	{
		$maKH = $_SESSION['idKH'];
		include '../connectDB.php';

		$result = mysqli_query($con,"select * from hoadon order by maDonHang");
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

		$rentTime = $_GET['rentTime'];
		$rentMoney = $rentTime * 3000;

		echo " - ";
		echo $rentTime;
		echo " - ";
		echo $rentMoney;

		$sql = "insert into hoadon(maDonHang,maTK,tongTien,tinhTrang,loaiGiaoDich) values($nextCode,$maKH, $rentMoney, 0, 1)";
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
				$sql = "insert into hoadonchitiet(maDonHang,maSP,gia,soluong) values($nextCode,$maSP, $rentMoney, $sl)";
				mysqli_query($con, $sql);
			}
		}

		$sql = "select ngaydathang from hoadon where maDonHang = $nextCode";
		$result = mysqli_query($con, $sql);
		while ($date = mysqli_fetch_array($result)) {
			$lastDate = $date['ngaydathang'];
		}

		$sql = "update hoadon set hanSuDung = (select addtime('$lastDate', '$rentTime:0:0')) where maDonHang = $nextCode" ;
		mysqli_query($con, $sql);

		unset($_SESSION['cartItem']);
		mysqli_close($con);
		header("location: done.php");
	}
?>