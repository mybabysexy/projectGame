<?php 
	session_start();
	include '../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách hóa đơn</title>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	<?php 
    		if (isset($_GET['err'])) {
    			$err = $_GET['err'];
    			if ($err == 1) {
    				?>
    					alert("Lỗi!!! Đã hết tài khoản cho thuê");
    				<?php
    			}
    		}
    	?>
    </script>
    <script type="text/javascript">
		setInterval(function ajax() {
			if (window.XMLHttpRequest) {
				// code for IE7+, Firefox, Chrome, Opera, Safari
				xmlhttp=new XMLHttpRequest();
			} else {  // code for IE6, IE5
				xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange=function() {
				if (this.readyState==4 && this.status==200) {
					document.getElementById("livesearch").innerHTML=this.responseText;
				}
			}
			xmlhttp.open("GET","refreshAcc.php",true);
			xmlhttp.send();
		},500);
	</script>

</head>
<body>
	<div class="container">
		<a href="home.php" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">Danh sách hóa đơn</a>
		<a href="listgame.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">List game</a>
		<a href="nhasanxuat.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Nhà sản xuất</a>
		<a href="theloai.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Thể loại</a>
		<a href="taikhoan.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Users</a>
		<a href="taikhoanthue.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Thuê</a>
		<?php 
			if($_SESSION['quyenAD'])
			{
				?>
				<a href="taikhoanAD" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Admins</a>
				<?
			}
		?>
		
		<form class="form-group form-inline" style="margin-top: 50px">
			<table cellpadding="20px" cellspacing="0">
				<tr>
					<td width="170px">
						Ma HD: <input type="text" name="maHD" class="form-control" style="width: 100px;" value="<?php if(isset($_GET['maHD'])) echo  $_GET['maHD']; ?>">
					</td>
					<td width="280px">
						Ten KH: <input type="text" name="tenKH" class="form-control" style="" value="<?php if(isset($_GET['tenKH'])) echo  $_GET['tenKH']; ?>">
					</td>
					<td width="290px">
						Ngay dat hang: <input type="date" class="form-control" name="date">
					</td>
					<td width="220px">
						Tinh trang:
						<select class="form-control" name="tinhTrang">
							<option value="999" selected <?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 999) echo "selected" ?>>Tat ca</option>
							<option value="0" <?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 0) echo "selected" ?> >
								Chưa duyệt
							</option>
							<option value="1"<?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 1) echo "selected" ?>>
								Đã duyệt
							</option>
							<option value="2"<?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 2) echo "selected" ?>>
								Đã hủy
							</option>
							<option value="3"<?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 3) echo "selected" ?>>
								Thuê xong
							</option>
						</select>
					</td>
					<td>
						<input type="submit" class="btn btn-primary" value="Tim kiem" name="">
					</td>
				</tr>
			</table>
		</form>
		<table class="table">
			<tr>
				<th width="60px">Mã HD</th>
				<th width="100px">Ngày đặt hàng</th>
				<th width="150px">Tên KH</th>
				<th width="100px">SĐT</th>
				<th width="160px">Email</th>
				<th width="60px">Thuê/mua</th>
				<!-- <th width="110px">Hạn SD còn</th> -->
				<th width="90px">Tổng tiền</th>
				<th width="80px">Tình Trạng</th>
				<th width="80px"></th>
			</tr>
			<?php 
				$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK order by ngaydathang desc";
				if (isset($_GET['tinhTrang'])) {
					if($_GET['tinhTrang'] != 999)
					{
						$tinhTrang = $_GET['tinhTrang'];
						$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tinhTrang = $tinhTrang order by maDonHang";
					}
				}
				if (!empty($_GET['maHD'])) {
					if($_GET['maHD'] > 0)
					{
						$maHD = $_GET['maHD'];
						$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where maDonHang = $maHD order by maDonHang";
					}
				}
				if (!empty($_GET['tenKH'])) {
					if($_GET['tenKH'] >= 0)
					{
						$tenKH = $_GET['tenKH'];
						$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tenKH like '%$tenKH%' order by maDonHang";
					}
				}
				$result = mysqli_query($con, $sql);
				while($DH = mysqli_fetch_array($result))
				{
					?>
					<form action="editTinhTrang.php">
						<tr class="
							<?php
								if($DH["tinhTrang"] == 0) echo "danger";
								if($DH["tinhTrang"] == 1 && $DH["loaiGiaoDich"] == 1) echo "info";
								if($DH["tinhTrang"] == 2) echo "warning";
							?>
						">
							<td>
								<?php echo $DH["maDonHang"] ?>
								<input type="text" name="maDonHang" style="display: none" value="<?php echo $DH["maDonHang"] ?>">
							</td>
							<td>
								<?php echo $DH["ngaydathang"] ?>
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
								<?php if( $DH["loaiGiaoDich"] == 0) echo "Mua"; else echo "Thuê <br> <strong>".$DH['rentTime']. "</strong> tiếng"?>
								<input type="text" name="loaiGiaoDich" value="<?php echo $DH["loaiGiaoDich"] ?>" style="display: none">
							</td>
							<td>
								<?php echo $DH["tongTien"] ?>
							</td>
							<td>
								<select class="form-control" style="width: 110px" <?php if($DH["tinhTrang"] == 2) echo "disabled"; ?> name="tinhTrang" onchange="$('#smbtn<?php echo $DH["maDonHang"] ?>').click();">
									<option value="0" <?php if($DH["tinhTrang"] == 0) echo "selected"; ?>>
										Chưa duyệt
									</option>
									<option value="1" <?php if($DH["tinhTrang"] == 1) echo "selected"; ?>>
										<?php if($DH["loaiGiaoDich"] == 0) echo "Đã duyệt"; else echo "Đang thuê"; ?>
									</option>
									<option value="2" <?php if($DH["tinhTrang"] == 2) echo "selected"; ?>>
										Đã hủy
									</option>
									<?php 
										if( $DH["loaiGiaoDich"] == 1)
										{
											?>
												<option value="3"<?php if($DH["tinhTrang"] == 3) echo "selected" ?>>
													Thuê xong
												</option>
											<?php
										}
									?>
								</select>
							</td>
							<td  style="vertical-align: middle;">
								<script type="text/javascript">
									function go<?php echo $DH["maDonHang"] ?>()
									{
										window.open('details.php?id=<?php echo $DH["maDonHang"] ?>', 'example', 'width=800,height=400');
									}
								</script>
								<input type="button" class="btn btn-primary" value="Chi tiet"  onclick="go<?php echo $DH["maDonHang"] ?>()">
								<input type="submit" id="smbtn<?php echo $DH["maDonHang"] ?>" style="display: none">
							</td>
						</tr>
					</form>
					<?php
				}
			?>
		</table>
		<h2>Tài khoản gần hết hạn</h2>
		<p><i>- tự động cập nhật tài khoản còn thời gian chơi < 15 phút</i></p>
		<div>
			<table id="livesearch" class="table">
				
			</table>
		</div>
		<p align="center">
			Admin: <?php echo $_SESSION['nameAD']; ?> - <?php echo $_SESSION['quyenAD']? "Super Admin":"Admin" ?>
		</p>
		<a href="dangxuat.php" class="btn btn-primary btn-lg" style="display: block;">
			Logout
		</a>
		<?php mysqli_close($con); ?>
	</div>
</body>
</html>