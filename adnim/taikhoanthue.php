<?php 
	session_start();
	include '../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Tài khoản thuê</title>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
	<div class="container">
		<!-- <h1 style="margin-bottom: 50px">Danh sach hoa don</h1> -->
		<a href="home.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Danh sách hóa đơn</a>
		<a href="listgame.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">List game</a>
		<a href="nhasanxuat.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Nhà sản xuất</a>
		<a href="theloai.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Thể loại</a>
		<a href="taikhoan.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Users</a>
		<a href="taikhoanthue.php" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">TK Thuê</a>
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
					<td width="210px">
						Ma TK: <input type="text" name="maTK" class="form-control" style="width: 100px;" value="<?php if(isset($_GET['maTK'])) echo  $_GET['maTK']; ?>">
					</td>
					<td width="310px">
						Ten TK: <input type="text" name="tenKH" class="form-control" style="" value="<?php if(isset($_GET['tenKH'])) echo  $_GET['tenKH']; ?>">
					</td>
					<td>
						<input type="submit" class="btn btn-primary" value="Tim kiem" name="">
					</td>
				</tr>
			</table>
		</form>
		<table class="table table-hover">
			<tr>
				<th>Ma TK</th>
				<th>username</th>
				<th>TK đang thuê</th>
				<th>Mã HĐ</th>
				<th style="text-align: center">Đổi MK</th>
				<th></th>
			</tr>
			<?php
				$sql = "SELECT * from tkthue order by maTK";
				if(!empty($_GET['maTK']))
					{
						$maTK = $_GET['maTK'];
						$sql = "SELECT * from tkthue where maTK = $maTK order by maTK";
					}
				if(!empty($_GET['tenTK']))
					{
						$tenTK = $_GET['tenTK'];
						$sql = "SELECT * from tkthue where tenTK like '%$tenTK%' order by maTK";
					}
				$result = mysqli_query($con, $sql);
				while($DH = mysqli_fetch_array($result))
				{
					?>
					<form action="editKH.php" method="POST">
					<tr>
						<td>
							<span><?php echo $DH["maTK"] ?></span>
						</td>
						<td>
							<span><?php echo $DH["tenTK"] ?></span>
						</td>
						<td>
							<a href="taikhoan.php?maTK=<?php echo $DH["tkThue"] ?>">
								<?php 
									$tk = $DH["tkThue"];
									$sql2 = "select * from tkuser where maTK = $tk";
									$result2 = mysqli_query($con, $sql2);
									if($tk != null) {
										echo mysqli_fetch_array($result2)['tenTK'];
									}
								?>
							</a>
						</td>
						<td>
							<a href="home.php?maHD=<?php echo $DH["maHD"] ?>"><?php if($DH["maHD"] != 0) echo $DH["maHD"] ?></a>
						</td>
						<td style="vertical-align: top; text-align: center;">
							<script type="text/javascript">
								function resetPass<?php echo $DH["maTK"]; ?>()
								{
									if(confirm("Reset password?"))
										window.location.href="resetpassTKthue.php?id=<?php echo $DH["maTK"]; ?>";
								}
							</script>
							<button type="button" class="btn btn-danger" onclick="resetPass<?php echo $DH["maTK"]; ?>()" style="width: 70px;">
								Reset
							</button>
						</td>

						<td>
							<script type="text/javascript">
								function resetTK<?php echo $DH["maTK"]; ?>()
								{
									if(confirm("Free tài khoản có cùng mã hóa đơn = <?php echo $DH["maHD"] ?>?"))
										window.location.href="resetTKthue.php?id=<?php echo $DH["maHD"]; ?>";
								}
							</script>
							<?php 
								if($tk != null)
								{
									?>
										<button type="button" class="btn btn-primary" onclick="resetTK<?php echo $DH["maTK"]; ?>()" style="width: 220px;">
											Free tài khoản cùng hóa đơn
										</button>
									<?
								}
							?>
						</td>
					</tr>
					</form>
					<?php
				}
			?>
			<?php 
				if($_SESSION['quyenAD'])
				{
					?>
					<form action="addTKthue.php" method="POST">
						<tr>
							<td></td>
							<td>
								<input type="text" class="form-control" name="username" style="width: 150px" placeholder="username">
							</td>
							<td>
								
							</td>
							<td>
								
							</td>
							<td>
								<input type="text" class="form-control" name="password" style="width: 150px" placeholder="password">
							</td>

							<td colspan="3" style="vertical-align: middle; text-align: center;">
								<button type="submit" class="btn btn-success" style="margin-left: 10px; width: 250px">
									<span class="glyphicon glyphicon-plus-sign"></span> Them tai khoan
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