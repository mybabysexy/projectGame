<?php 
	session_start();
	include '../connectDB.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<a href="../logout.php" class="btn btn-primary btn-lg">Logout</a>
		<h1>Danh sach hoa don</h1>
		<form class="form-group form-inline">
			<table cellpadding="20px" cellspacing="0">
				<tr>
					<td width="170px">
						Ma HD: <input type="text" name="maHD" class="form-control" style="width: 100px;">
					</td>
					<td width="280px">
						Ten KH: <input type="text" name="tenKH" class="form-control" style="">
					</td>
					<td width="290px">
						Ngay dat hang: <input type="date" class="form-control" name="date">
					</td>
					<td width="220px">
						Tinh trang:
						<select class="form-control" name="tinhTrang">
							<option value="999" selected <?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 999) echo "selected" ?>>Tat ca</option>
							<option value="0" <?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 0) echo "selected" ?> >
							Canceled
							</option>
							<option value="1"<?php if(isset($_GET['tinhTrang'])) if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 1) echo "selected" ?>>
							Success
							</option>
							<option value="2"<?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 2) echo "selected" ?>>
							???
							</option>
						</select>
					</td>
					<td>
						<input type="submit" class="btn btn-primary" value="Tim kiem" name="">
					</td>
				</tr>
			</table>
		</form>
		<table class="table table-hover">
			<tr>
				<th width="60px">Ma HD</th>
				<th width="100px">Ngay dat hang</th>
				<th width="60px">Ma KH</th>
				<th width="150px">Ten KH</th>
				<th width="100px">So dien thoai</th>
				<th width="160px">Email</th>
				<th width="90px">Tong tien</th>
				<th width="80px">Tinh Trang</th>
			</tr>
			<?php 
				$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK";
				if (isset($_GET['tinhTrang'])) {
					if($_GET['tinhTrang'] != 999)
					{
						$tinhTrang = $_GET['tinhTrang'];
						$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tinhTrang = $tinhTrang";
					}
				}
				if (isset($_GET['maHD'])) {
					if($_GET['maHD'] > 0)
					{
						$maHD = $_GET['maHD'];
						$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where maDonHang = $maHD";
					}
				}
				if (isset($_GET['tenKH'])) {
					if($_GET['tenKH'] > 0)
					{
						$tenKH = $_GET['tenKH'];
						$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tenKH like '%$tenKH%'";
					}
				}
				$result = mysqli_query($con, $sql);
				while($DH = mysqli_fetch_array($result))
				{
					?>
					<tr>
						<td>
							<?php echo $DH["maDonHang"] ?>
						</td>
						<td>
							<?php echo $DH["ngaydathang"] ?>
						</td>
						<td>
							<?php echo $DH["maTK"] ?>
						</td>
						<td>
							<?php echo $DH["tenKH"] ?>
						</td>
						<td>
							<?php echo $DH["sdt"] ?>
						</td>
						<td>
							<?php echo $DH["email"] ?>
						</td>
						<td>
							<?php echo $DH["tongTien"] ?>
						</td>
						<td>
							<?php echo $DH["tinhTrang"]? "Success":"Canceled" ?>
						</td>
					</tr>
					<?php
				}
			?>
		</table>
	</div>
</body>
</html>