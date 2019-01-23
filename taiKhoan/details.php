<!DOCTYPE html>
<html>
<head>
	<title>Chi tiet</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	window.onunload = refreshParent;
	    function refreshParent() {
	        window.opener.location.reload();
	    }
    </script>
</head>
<body>
	<table class="table">
		<tr>
			<th>Ten SP</th>
			<th>SL</th>
			<th>Gia</th>
			<th>Tong</th>
			<th>Key</th>
		</tr>
		<?php 
			if (isset($_GET['id'])) {
				$id = $_GET['id'];
				$sl = 0;
				$slTK = 0;
				$price = 0;
				include '../connectDB.php';
				$sql = "select sanpham.tenSP, hoadonchitietthue.soluong, hoadonchitietthue.gia from hoadonchitietthue INNER JOIN sanpham on sanpham.maSP = hoadonchitietthue.maSP where maDonHang = $id";
				$result = mysqli_query($con, $sql);
				if(mysqli_num_rows($result) == 0)
				{
					$sql = "select sanpham.tenSP, hoadonchitiet.soluong, hoadonchitiet.gia,hoadonchitiet.keyGame from hoadonchitiet INNER JOIN sanpham on sanpham.maSP = hoadonchitiet.maSP where maDonHang = $id";
					$result = mysqli_query($con, $sql);
				}
				while ($HD = mysqli_fetch_array($result)) {
					$keyGame = "";
					?>
						<tr>
							<td>
								<?php echo $HD['tenSP'] ?>
							</td>
							<td>
								<?php echo $HD['soluong']; $sl+=$HD['soluong']; if($HD['soluong'] > $slTK) $slTK = $HD['soluong']; ?>
							</td>
							<td>
								<?php echo $HD['gia'] ?>
							</td>
							<td>
								<?php echo $HD['gia']*$HD['soluong']; $price+=$HD['gia']*$HD['soluong']; ?>
							</td>
							<td>
								<?php if(isset($HD['keyGame'])) $keyGame = $HD['keyGame'] ?>
								<span id="keyGame"></span>
							</td>
						</tr>
					<?php
				}

				//header("location: index.php");
			}
			else
			{
				header("location: index.php");
			}
		?>
		<tr>
			<th>Tong</th>
			<th>
				<?php echo $sl ?>
			</th>
			<th colspan="3">
				<center>
					<?php echo $price ?>
				</center>
			</th>
		</tr>
		<tr>
			<td colspan="5">
				<?php 
					$sql = "select * from hoadon where maDonHang = $id";
					$result = mysqli_query($con, $sql);
					while ($stt = mysqli_fetch_array($result)) {
						$maTK = $stt['maTK'];
						if ($stt['tinhTrang'] == 0) {
							?>
								<script type="text/javascript">
									function cancel()
									{
										if (confirm("Bạn chắc chứ?")) {
											window.location.href = "huyDH.php?id=<?php echo $id ?>";
										}
									}
								</script>
								<input type="button" onclick="cancel()" value="Hủy đơn hàng" class="btn btn-block btn-danger">
							<?php
						}
						if ($stt['loaiGiaoDich'] == 0 && $stt['tinhTrang'] == 1) {
							?>
							<script type="text/javascript">
								$(function(){
									$("#keyGame").text('<?php echo $keyGame; ?>');
								})
							</script>
							<?php
						}
						if ($stt['loaiGiaoDich'] == 1 && $stt['tinhTrang'] == 1) {
							$dangThue = true;
							$daThue = false;
						}
						else if ($stt['loaiGiaoDich'] == 1 && $stt['tinhTrang'] == 3) {
							$daThue = true;
							$dangThue = false;
						}
						else {
							$dangThue = false;
							$daThue = false;
						}
					}
				?>
			</td>
		</tr>
		<?php 
			if($dangThue)
			{
				$sql3 = "select * from tkthue where tkThue = $maTK and maHD = $id";
				//echo $sql3;
				$result3 = mysqli_query($con, $sql3);
				while ($rentedAcc = mysqli_fetch_array($result3)) {
					?>
						<tr>
							<td colspan="2">
								<strong>Tài khoản đang gán: </strong>
								<span>
									<?php echo $rentedAcc['tenTK'] ?>
								</span>
							</td>
							<td colspan="2">
								<strong>Mật khẩu: </strong>
								<span>
									<?php echo $rentedAcc['matKhau'] ?>
								</span>
							</td>
						</tr>
					<?php
				}
			}
			if($daThue)
			{
				$listTKthue = "";
				$comma = 0;

				$sql3 = "select * from hoadonchitietthue where maDonHang = $id";
				//echo $sql4;
				$result3 = mysqli_query($con, $sql3);
				while ($rentedAcc = mysqli_fetch_array($result3)) {
					if ($comma == 0) {
						$listTKthue = $listTKthue.$rentedAcc['maTKthue'];
						$comma = 1;
					}
					else {
						$listTKthue .= ",".$rentedAcc['maTKthue'];
					}
				}

				//echo $listTKthue;
				$listTK = explode(',',$listTKthue);
				// print_r($listTK);

				$listTKthue = "";
				$comma = 0;

				foreach ($listTK as $key => $maTKthue) {
					$sql4 = "select * from tkthue where maTK=$maTKthue";
					// echo $sql4."<br>";
					$result4 = mysqli_query($con, $sql4);
					while ($rentedAcc = mysqli_fetch_array($result4)) {
						if ($comma == 0) {
							$listTKthue = $listTKthue.$rentedAcc['tenTK'];
							$comma = 1;
						}
						else {
							$listTKthue .= ", ".$rentedAcc['tenTK'];
						}
					}
				}
				?>
					<tr>
						<td colspan="4">
							<strong>Tài khoản đã gán: </strong>
							<span>
								<?php echo $listTKthue ?>
							</span>
						</td>
					</tr>
				<?php
			}
		?>
		<tr>
			<td colspan="5">
				<input type="button" class="btn btn-warning btn-block" value="Đóng cửa sổ" onclick="window.close()" >
			</td>
		</tr>
	</table>
	<?php mysqli_close($con); ?>
	
</body>
</html>