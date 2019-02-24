<?php 
	session_start();
	include '../../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: ../index.php");
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
		<!-- <h1 style="margin-bottom: 50px">Danh sach hoa don</h1> -->
		<a href="../home.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Danh sách hóa đơn</a>
		<a href="listgame.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">List game</a>
		<a href="../nhasanxuat.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Nhà sản xuất</a>
		<a href="../theloai.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Thể loại</a>
		<a href="../taikhoan.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Users</a>
		<a href="../taikhoanthue.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Thuê</a>
		<?php 
			if($_SESSION['quyenAD'])
			{
				?>
				<a href="./" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">TK Admins</a>
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
						Ten TK: <input type="text" name="tenTheLoai" class="form-control" style="" value="<?php if(isset($_GET['tenTheLoai'])) echo  $_GET['tenTheLoai']; ?>">
					</td>
					<td>
						<input type="submit" class="btn btn-primary" value="Tim kiem" name="">
					</td>
				</tr>
			</table>
		</form>
		<table class="table table-hover">
			<tr>
				<th>ID</th>
				<th>Admin's Name</th>
				<th>SDT</th>
				<th>email</th>
				<th>Username</th>
				<th>Doi MK</th>
				<th>Privilege</th>
				<th>Status</th>
				<th></th>
			</tr>
			<?php
				$sql = "SELECT * from tkadmin order by maTK";
				if (isset($_GET['maTK'])) {
					if(!empty($_GET['maTK']))
					{
						$maTK = $_GET['maTK'];
						$sql = "SELECT * from tkadmin where maTK = $maTK order by maTK";
					}
				}
				if (isset($_GET['tenAD'])) {
					if(!empty($_GET['tenAD']))
					{
						$tenAD = $_GET['tenAD'];
						$sql = "SELECT * from tkadmin where tenAD like '%$tenAD%' order by maTK";
					}
				}
				$result = mysqli_query($con, $sql);
				while($DH = mysqli_fetch_array($result))
				{
					?>
					<form action="editAD.php" method="POST">
					<tr>
						<td>
							<?php 
								if($_SESSION['quyenAD'])
								{
									?>
										<input type="text" class="form-control" readonly name="maTK" value="<?php echo $DH["maTK"] ?>" style="width: 50px; background-color: transparent; border: none; text-align: center;">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["maTK"] ?></span>
									<?php
								}
							?>
						</td>
						<td>
							<?php 
								if($_SESSION['quyenAD'])
								{
									?>
										<input type="text" class="form-control" name="tenKH" value="<?php echo $DH["tenAD"] ?>" style="width: 150px">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["tenAD"] ?></span>
									<?php
								}
							?>
						</td>
						<td>
							<?php 
								if($_SESSION['quyenAD'])
								{
									?>
										<input type="text" class="form-control" name="sdt" value="<?php echo $DH["sdt"] ?>" style="width: 110px; ">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["sdt"] ?></span>
									<?php
								}
							?>
						</td>
						<td>
							<?php 
								if($_SESSION['quyenAD'])
								{
									?>
										<input type="text" class="form-control" name="email" value="<?php echo $DH["email"] ?>" style="width: 200px">
									<?php
								}
								else
								{
									?>
										<span><?php echo $DH["email"] ?></span>
									<?php
								}
							?>
						</td>
						<td>
							<span><?php echo $DH["tenTK"] ?></span>
						</td>
						<?php 
							if(true)
							{
								?>
								<td style="vertical-align: top; text-align: center;">
									<script type="text/javascript">
										function resetPass<?php echo $DH["maTK"]; ?>()
										{
											if(confirm("Reset password?"))
												window.location.href="resetpassTK.php?id=<?php echo $DH["maTK"]; ?>";
										}
									</script>
									<button type="button" class="btn btn-danger" onclick="resetPass<?php echo $DH["maTK"]; ?>()" style="width: 70px; margin: 5px">
										Reset
									</button>
								<?
							}
							else
							{
								?>
									<td></td>
								<?
							}
						?>
						<td>
							<?php 
								if($_SESSION['idAD'] != $DH["maTK"])
								{
									if($DH["maQuyen"])
									{
										?>
											<button type="button" class="btn btn-success"style="width: 110px; margin: 5px" disabled>
												Super Admin
											</button>
											<script type="text/javascript">
												function adm<?php echo $DH["maTK"]; ?>()
												{
													if(confirm("Make this person Admin?"))
														window.location.href="admTK.php?id=<?php echo $DH["maTK"]; ?>";
												}
											</script>
											<button type="button" class="btn btn-info" onclick="adm<?php echo $DH["maTK"]; ?>()" style="width: 110px; margin: 5px">
												Make Admin
											</button>
										<?
									}
									else
									{
										?>
											<script type="text/javascript">
												function sadm<?php echo $DH["maTK"]; ?>()
												{
													if(confirm("Make this person Super Admin?"))
														window.location.href="sadmTK.php?id=<?php echo $DH["maTK"]; ?>";
												}
											</script>
											<button type="button" class="btn btn-success" onclick="sadm<?php echo $DH["maTK"]; ?>()" style="width: 110px; margin: 5px">
												Make SA
											</button>
											<button type="button" class="btn btn-info" style="width: 110px; margin: 5px" disabled>
												Admin
											</button>
										<?
									}
								}
								else
								{
									?>
										<span></span>
									<?php
								}
							?>
						</td>
						<td>
							<?php 
								if($_SESSION['idAD'] != $DH["maTK"])
								{
									if($DH["trangthai"])
									{
										?>
											<button type="button" class="btn btn-success"style="width: 80px; margin: 5px" disabled>
												Actived
											</button>
											<script type="text/javascript">
												function ban<?php echo $DH["maTK"]; ?>()
												{
													if(confirm("Ban this account?"))
														window.location.href="banTK.php?id=<?php echo $DH["maTK"]; ?>";
												}
											</script>
											<button type="button" class="btn btn-warning" onclick="ban<?php echo $DH["maTK"]; ?>()" style="width: 80px; margin: 5px">
												Ban
											</button>
										<?
									}
									else
									{
										?>
											<script type="text/javascript">
												function active<?php echo $DH["maTK"]; ?>()
												{
													if(confirm("Active this account?"))
														window.location.href="actTK.php?id=<?php echo $DH["maTK"]; ?>";
												}
											</script>
											<button type="button" class="btn btn-success" onclick="active<?php echo $DH["maTK"]; ?>()" style="width: 80px; margin: 5px">
												Activate
											</button>
											<button type="button" class="btn btn-danger" style="width: 80px; margin: 5px" disabled>
												Banned
											</button>
										<?
									}
								}
								else
								{
									?>
										<span></span>
									<?php
								}
							?>
						</td>

						<?php 
							if($_SESSION['quyenAD'] && $_SESSION['idAD'] != $DH["maTK"])
							{
								?>
								<td style="vertical-align: middle; text-align: center;">
									<button type="submit" class="btn btn-primary" style="margin: 5px; margin-left: 10px; width: 120px">
										<span class="glyphicon glyphicon-pencil"></span>
										 Edit
									</button>
									<!-- <script type="text/javascript">
										function delTK<?php echo $DH["maTK"]; ?>()
										{
											if(confirm("Delete forever?"))
												window.location.href="delTK.php?id=<?php echo $DH["maTK"]; ?>";
										}
									</script>
									<button type="button" class="btn btn-danger" onclick="delTK<?php echo $DH["maTK"]; ?>()" style="margin: 5px; margin-left: 10px; width: 120px">
										<span class="glyphicon glyphicon-trash"></span> Delete
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
					<form action="addTK.php" method="POST">
						<tr>
							<td></td>
							<td>
								<input type="text" class="form-control" name="tenKH" style="width: 150px" placeholder="Ten Admin">
							</td>
							<td>
								<input type="text" class="form-control" name="sdt" style="width: 110px; " placeholder="SDT">
							</td>
							<td>
								<input type="text" class="form-control" name="email" value="<?php echo $DH["email"] ?>" style="width: 200px" placeholder="email">
							</td>
							<td>
								<input type="text" class="form-control" name="tenTK" value="<?php echo $DH["tenTK"] ?>" style="width: 110px" placeholder="username">
							</td>

							<td colspan="4" style="vertical-align: middle; text-align: center;">
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
		<a href="../dangxuat.php" class="btn btn-primary btn-lg" style="display: block;">
			Logout
		</a>
		<?php mysqli_close($con); ?>
	</div>
</body>
</html>