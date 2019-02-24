<?php 
	session_start();
	include '../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Nhà sản xuất</title>
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
		<a href="nhasanxuat.php" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">Nhà sản xuất</a>
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
		
		<form class="form-group form-inline">
			<table cellpadding="20px" cellspacing="0">
				<tr>
					<td width="200px">
						Ma NSX: <input type="text" name="maNSX" class="form-control" style="width: 100px;" value="<?php if(isset($_GET['maNSX'])) echo  $_GET['maNSX']; ?>">
					</td>
					<td width="300px">
						Ten NSX: <input type="text" name="tenNSX" class="form-control" style="" value="<?php if(isset($_GET['tenNSX'])) echo  $_GET['tenNSX']; ?>">
					</td>
					<td>
						<input type="submit" class="btn btn-primary" value="Tim kiem" name="">
					</td>
				</tr>
			</table>
		</form>
		<table class="table table-hover">
			<tr>
				<th width="60px">Ma NSX</th>
				<th width="200px">Ten NSX</th>
				<th width="150px"></th>
			</tr>
			<?php
				$sql = "SELECT * from nsx order by maNSX";
				if (isset($_GET['maNSX'])) {
					if($_GET['maNSX'] > 0)
					{
						$maNSX = $_GET['maNSX'];
						$sql = "SELECT * from nsx where maNSX = $maNSX order by maNSX";
					}
				}
				if (isset($_GET['tenNSX'])) {
					if($_GET['tenNSX'] >= 0)
					{
						$tenNSX = $_GET['tenNSX'];
						$sql = "SELECT * from nsx where tenNSX like '%$tenNSX%' order by maNSX";
					}
				}
				$result = mysqli_query($con, $sql);
				while($DH = mysqli_fetch_array($result))
				{
					?>
					<form action="editnsx.php">
					<tr>
						<td>
							<?php 
								if($_SESSION['quyenAD'])
								{
									?>
										<input type="text" class="form-control" readonly name="codeNSX" value="<?php echo $DH["maNSX"] ?>" style="width: 70px; background-color: transparent; border: none;">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["maNSX"] ?></span>
									<?php
								}
							?>
						</td>
						<td>
							<?php 
								if($_SESSION['quyenAD'])
								{
									?>
										<input type="text" class="form-control" name="nameNSX" value="<?php echo $DH["tenNSX"] ?>">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["tenNSX"] ?></span>
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
											function delNSX<?php echo $DH["maNSX"]; ?>()
											{
												if(confirm("Delete forever?"))
													window.location.href="delnsx.php?id=<?php echo $DH["maNSX"]; ?>";
											}
										</script>
										<button type="button" class="btn btn-danger onclick="delNSX<?php echo $DH["maNSX"]; ?>()" style="margin-left: 10px; width: 120px">
											<span class="glyphicon glyphicon-remove-sign"></span> Xoa
										</button>
									</td>
								<?php
							}
							else
							{
								?>
									<td></td>
								<?php
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
					<form action="addnsx.php">
						<tr>
							<td></td>
							<td>
								<input type="text" class="form-control" name="nameNSX" placeholder="Ten NSX">
							</td>
							<td style="vertical-align: middle; text-align: center;">
								<button type="submit" class="btn btn-success" style="margin-left: 10px; width: 250px">
									<span class="glyphicon glyphicon-plus-sign"></span> Them NSX
								</button>
							</td>
						</tr>
					</form>
					<?php
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