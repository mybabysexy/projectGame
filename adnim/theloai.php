<?php 
	session_start();
	include '../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thể loại</title>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<a href="home.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Danh sách hóa đơn</a>
		<a href="listgame.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">List game</a>
		<a href="nhasanxuat.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Nhà sản xuất</a>
		<a href="theloai.php" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">Thể loại</a>
		<a href="taikhoan.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Users</a>
		<a href="taikhoanthue.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Thuê</a>
		<?php 
			if($_SESSION['quyenAD']) //1 SA, 2 Admin
			{
				?>
				<a href="taikhoanAD" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Admins</a>
				<?
			}
		?>
		
		<form class="form-group form-inline" style="margin-top: 50px">
			<table cellpadding="20px" cellspacing="0">
				<tr>
					<td width="210px">
						Ma The Loai: <input type="text" name="maTheLoai" class="form-control" style="width: 100px;" value="<?php if(isset($_GET['maTheLoai'])) echo  $_GET['maTheLoai']; ?>">
					</td>
					<td width="310px">
						Ten The Loai: <input type="text" name="tenTheLoai" class="form-control" style="" value="<?php if(isset($_GET['tenTheLoai'])) echo  $_GET['tenTheLoai']; ?>">
					</td>
					<td>
						<input type="submit" class="btn btn-primary" value="Tim kiem" name="">
					</td>
				</tr>
			</table>
		</form>
		<table class="table table-hover">
			<tr>
				<th width="60px">Ma the loai</th>
				<th width="200px">Ten the loai</th>
				<th width="150px"></th>
			</tr>
			<?php
				$sql = "SELECT * from theloai order by maTheLoai";
				if (isset($_GET['maTheLoai'])) {
					if(!empty($_GET['maTheLoai']))
					{
						$maTheLoai = $_GET['maTheLoai'];
						$sql = "SELECT * from theloai where maTheLoai = $maTheLoai order by maTheLoai";
					}
				}
				if (isset($_GET['tenTheLoai'])) {
					if(!empty($_GET['tenTheLoai']))
					{
						$theLoai = $_GET['tenTheLoai'];
						$sql = "SELECT * from theloai where theLoai like '%$theLoai%' order by maTheLoai";
					}
				}
				$result = mysqli_query($con, $sql);
				while($DH = mysqli_fetch_array($result))
				{
					?>
					<form action="edittheloai.php">
					<tr>
						<td>
							<?php 
								if($_SESSION['quyenAD'])
								{
									?>
										<input type="text" class="form-control" readonly name="codetheloai" value="<?php echo $DH["maTheLoai"] ?>" style="width: 70px; background-color: transparent; border: none;">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["maTheLoai"] ?></span>
									<?php
								}
							?>
						</td>
						<td>
							<?php 
								if($_SESSION['quyenAD']) //1 la SA, 0 AD; 1: true
								{
									?>
										<input type="text" class="form-control" name="nametheloai" value="<?php echo $DH["theLoai"] ?>">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["theLoai"] ?></span>
									<?php
								}
							?>
						</td>
						<?php 
							if($_SESSION['quyenAD'])
							{
								?>
								<td style="vertical-align: middle; text-align: center;">
									<button type="submit" class="btn btn-primary" style="margin-left: 10px; width: 120px">
										<span class="glyphicon glyphicon-ok-sign"></span> Chinh sua
									</button>
									<script type="text/javascript">
										function deltheloai<?php echo $DH["maTheLoai"]; ?>()
										{
											if(confirm("Delete forever?"))
												window.location.href="deltheloai.php?id=<?php echo $DH["maTheLoai"]; ?>";
										}
									</script>
									<!-- <button type="button" class="btn btn-danger" onclick="deltheloai<?php echo $DH["maTheLoai"]; ?>()" style="margin-left: 10px; width: 120px">
										<span class="glyphicon glyphicon-remove-sign"></span> Xoa
									</button> -->
								</td>
								<?
							}
							else
							{
								?>
									<td></td>
								<?
							}
						?>
					</tr>
					</form>
					<?php
				}
			?>
			<?php 
				if($_SESSION['quyenAD'])
				{
					?>
					<form action="addtheloai.php">
						<tr>
							<td></td>
							<td>
								<input type="text" class="form-control" name="nameTheLoai" placeholder="Ten the loai">
							</td>
							<td style="vertical-align: middle; text-align: center;">
								<button type="submit" class="btn btn-success" style="margin-left: 10px; width: 250px">
									<span class="glyphicon glyphicon-plus-sign"></span> Them the loai
								</button>
							</td>
						</tr>
					</form>
					<?
				}
			?>
			
		</table>
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