<?php 
	if (isset($_GET['tinhTrang']) && isset($_GET['maDonHang']) ) {
		include 'connectDB.php';

		$maDonHang = $_GET['maDonHang'];
		$tinhTrang = $_GET['tinhTrang'];
		$loaiGiaoDich = $_GET['loaiGiaoDich'];

		$listTKthue = "";

		if($tinhTrang == 1) //verifed
		{
			if ($loaiGiaoDich == 0) //mua
			{
				$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
				mysqli_query($con, $sql);
				mysqli_close($con);
				header('location: listbill.php');
			}
			if ($loaiGiaoDich == 1) //thue
			{
				$slTK = 0;

				// dem so tai khoan can thue
				$sql = "select sanpham.tenSP, hoadonchitietthue.soluong, hoadonchitietthue.gia from hoadonchitietthue INNER JOIN sanpham on sanpham.maSP = hoadonchitietthue.maSP where maDonHang = $maDonHang ";
				$result = mysqli_query($con, $sql);
				while ($HD = mysqli_fetch_array($result)) {
					// if($HD['soluong'] > $slTK) $slTK = $HD['soluong'];
					$slTK += $HD['soluong'];
				}
				echo "Tong TK: ".$slTK."<br>";

				// lay ma tai khoan KH
				$sql = "select * from hoadon where maDonHang = $maDonHang";
				$result = mysqli_query($con, $sql);
				while ($HD = mysqli_fetch_array($result)) {
					$maTKuser = $HD['maTK'];
				}

				// tim tai khoan thue dang free
				$sql = "SELECT * FROM tkthue WHERE tkThue is null";
				$result = mysqli_query($con, $sql);
				$slTKton = mysqli_num_rows($result);
				echo "TK ton: ".$slTKton."<br>";

				if($slTKton >= $slTK)
				{
					echo "Cho phep thue <br>";

					$comma = 0;
					$demSLadded = 0;
					$start = 0;
					$stt = 0;
					$sttgetonce = 0;

					$sql = "SELECT * FROM tkthue WHERE tkThue is null order by maTK limit 0,$slTK";
					$result = mysqli_query($con, $sql);
					while ($tk = mysqli_fetch_array($result)) {
						$maTKton = $tk['maTK'];
						echo "<br>";
						$sql2 = "update tkthue set tkThue = $maTKuser, maHD = $maDonHang where maTK = $maTKton";
						echo $sql2;
						
						mysqli_query($con, $sql2);
						$demSLadded++;

						
						// luu danh sach TK thue vao string
						if ($comma == 0) {
							$listTKthue = $listTKthue.$maTKton;
							$comma = 1;
						}
						else {
							$listTKthue .= ",".$maTKton;
						}

						echo "<br>";
						$sql3 = "SELECT * FROM hoadonchitietthue WHERE maDonHang = $maDonHang limit $start,1";
						echo $sql3;
						echo "<br>";
						$result3 = mysqli_query($con, $sql3);
						while ($tkthue = mysqli_fetch_array($result3)) {
							if ($sttgetonce == 0) {
								$stt = $tkthue['STT'];
								$sttgetonce = 1;
								echo "sttget = $stt";
							}
							if ($demSLadded == $tkthue['soluong']) {
								//them list TK vao db
								echo "--";
								$sql4 = "update hoadonchitietthue set maTKthue = '$listTKthue' where maDonHang = $maDonHang and STT = $stt";
								echo $sql4;
								echo "<br>";
								if(mysqli_query($con, $sql4)) echo "ok";
								$listTKthue="";
								$comma = 0;
								$demSLadded = 0;
								$start++;
								$stt++;
							}
							else
							{
								break;
							}
						}
					}
					echo "<br>";
					$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
					mysqli_query($con, $sql);

					//sua tinhTrang trong hoadonchitietthue, 0 = chua duyet, 1 = dang gan, 2 = done
					$sql = "update hoadonchitietthue set tinhTrang = 1 where maDonHang = $maDonHang";
					mysqli_query($con, $sql);

					header('location: listbill.php');
				}
				else
				{
					echo "Khong cho phep thue <br>";

					mysqli_close($con);
					header('location: listbill.php?err=1');
				}
			}
			
		}
		else if ($tinhTrang == 3) { //thue xong
			$sql = "update tkthue set tkThue = null, maHD = 0 where maHD = $maDonHang";
			mysqli_query($con, $sql);
			$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
			$sql = "update hoadonchitietthue set tinhTrang = 2 where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
			header('location: listbill.php');
		}
		else
		{
			$sql = "update hoadon set tinhTrang = $tinhTrang where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
			$sql = "update hoadonchitietthue set tinhTrang = 0 where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
			header('location: listbill.php');
		}
	}
	else
	{
		header('location: index.php');
	}
?>