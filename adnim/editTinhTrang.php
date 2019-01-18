<?php 
	if (isset($_GET['tinhTrang']) && isset($_GET['maDonHang']) ) {
		include '../connectDB.php';

		$maDonHang = $_GET['maDonHang'];
		$tinhTrang = $_GET['tinhTrang'];
		$loaiGiaoDich = $_GET['loaiGiaoDich'];

		if($tinhTrang == 1) //verifed
		{
			if ($loaiGiaoDich == 0) //mua
			{
				$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
				mysqli_query($con, $sql);
				mysqli_close($con);
				header('location: home.php');
			}
			if ($loaiGiaoDich == 1) //thue
			{
				$slTK = 0;

				$sql = "select sanpham.tenSP, hoadonchitiet.soluong, hoadonchitiet.gia from hoadonchitiet INNER JOIN sanpham on sanpham.maSP = hoadonchitiet.maSP where maDonHang = $maDonHang ";
				$result = mysqli_query($con, $sql);
				while ($HD = mysqli_fetch_array($result)) {
					if($HD['soluong'] > $slTK) $slTK = $HD['soluong'];
				}
				echo "Tong TK: ".$slTK."<br>";

				$sql = "select * from hoadon where maDonHang = $maDonHang";
				$result = mysqli_query($con, $sql);
				while ($HD = mysqli_fetch_array($result)) {
					$maTKuser = $HD['maTK'];
				}

				$sql = "SELECT * FROM tkthue WHERE tkThue is null";
				$result = mysqli_query($con, $sql);
				$slTKton = mysqli_num_rows($result);
				echo "TK ton: ".$slTKton."<br>";

				if($slTKton >= $slTK)
				{
					echo "Cho phep thue <br>";
					$sql = "SELECT * FROM tkthue WHERE tkThue is null order by maTK limit 0,$slTK";
					$result = mysqli_query($con, $sql);
					while ($tk = mysqli_fetch_array($result)) {
						$maTKton = $tk['maTK'];
						$sql2 = "update tkthue set tkThue = $maTKuser, maHD = $maDonHang where maTK = $maTKton";
						echo $sql2;
						mysqli_query($con, $sql2);
					}
					$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
					mysqli_query($con, $sql);
					mysqli_close($con);
					header('location: home.php');
				}
				else
				{
					echo "Khong cho phep thue <br>";

					mysqli_close($con);
					header('location: home.php?err=1');
				}
			}
			
		}
		else if ($tinhTrang == 3) {
			$sql = "update tkthue set tkThue = null, maHD = 0 where maHD = $maDonHang";
			mysqli_query($con, $sql);
			$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
			header('location: home.php');
		}
		else
		{
			$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
			header('location: home.php');
		}
	}
	else
	{
		header('location: index.php');
	}
?>