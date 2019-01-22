<?php
	$response = "<tr><th align='center'>Không có tài khoản nào :) F5 lại trang để thấy thay đổi</th></tr>";
	$timeLeft = "";
	require_once('../connectDB.php');
	$sql = "select * from (SELECT `maDonHang`, `ngaydathang`,hanSuDung,tinhTrang, tkuser.tenKH, CURRENT_TIMESTAMP as now,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK order by ngaydathang asc)a where a.tinhTrang = 1";
	$result = mysqli_query($con, $sql);
	while ($DH = mysqli_fetch_array($result)) {
		$now = strtotime($DH['now']);
		$hanSuDung = strtotime($DH['hanSuDung']);
		$diff = $hanSuDung - $now;
		$maDonHang = $DH['maDonHang'];
		if ($diff < 900 && $diff > 0) { //900=15p
			$response = "<tr>
				<th>
					Mã DH
				</th>
				<th>
					Ngày đặt
				</th>
				<th>
					HSD
				</th>
				<th>
					Tên KH
				</th>
				<th>
					Thời gian còn lại
				</th>
			</tr>";
			$response .= "
				<tr>
					<td>
						".$maDonHang."
					</td>
					<td>
						".$DH['ngaydathang']."
					</td>
					<td>
						".$DH['hanSuDung']."
					</td>
					<td>
						".$DH['tenKH']."
					</td>
					<td>
						".$DH['timeLeft']."
					</td>
				</tr>
			";
		}
		else if($diff == 0)
		{
			$sql = "update tkthue set tkThue = null, maHD = 0 where maHD = $maDonHang";
			mysqli_query($con, $sql);
			$sql = "update hoadon set tinhTrang = 3 where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
			$sql = "update hoadonchitietthue set tinhTrang = 2 where maDonHang = $maDonHang";
			mysqli_query($con, $sql);
		}
	}
	
	echo $response;
?>