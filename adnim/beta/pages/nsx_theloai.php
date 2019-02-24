<?php 
	session_start();
	include 'connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: ../");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
  	Nhà sản xuất - Thể loại
  </title>

  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
  
  <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
  
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

 	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<script src="../bower_components/moment/min/moment.min.js"></script>
	<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
	<link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">

	<link rel="stylesheet" href="duc.css">

  <!-- Google Font -->
  <link rel="stylesheet"
		href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

	

  <script>document.write('<script src="http://' + (location.host || 'localhost').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>
</head>

<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

	<!-- Logo -->
	<a href="index2.html" class="logo">
	  <!-- mini logo for sidebar mini 50x50 pixels -->
	  <!-- <span class="logo-mini"><b>Momcare</b></span> -->
	  <img src="../momcare.png" style="width: 50px" class="logo-mini">
	  <!-- logo for regular state and mobile devices -->
	  <span class="logo-lg"><b>Đức Toàn Gaming</b></span>
	</a>

	<!-- Header Navbar -->
	<nav class="navbar navbar-static-top" role="navigation">
	  <!-- Sidebar toggle button-->
	  <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
		<span class="sr-only">Toggle navigation</span>
	  </a>
	  <!-- Navbar Right Menu -->
	  <div class="navbar-custom-menu">
		<ul class="nav navbar-nav">
		  <!-- User Account Menu -->
		  <li class="dropdown user user-menu">
			<!-- Menu Toggle Button -->
			<a href="#" class="dropdown-toggle" data-toggle="dropdown">
			  <!-- The user image in the navbar-->
			  <img src="../dist/img/avatar.png" class="user-image" alt="User Image">
			  <!-- hidden-xs hides the username on small devices so only the image appears. -->
			  <span class="hidden-xs"><?php echo $_SESSION['nameAD']; ?></span>
			</a>
			<ul class="dropdown-menu">
			  <!-- The user image in the menu -->
			  <li class="user-header">
				<img src="../dist/img/avatar.png" class="img-circle" alt="User Image">

				<p>
				  <strong><?php echo $_SESSION['nameAD']; ?></strong>
				  <small><?php echo $_SESSION['quyenAD']? "Boss":"Nhân viên" ?></small>
				</p>
			  </li>
			  <!-- Menu Footer-->
			  <li class="user-footer">
			  	<div class="pull-left">
				 	<a href="doimatkhau.php" class="btn btn-warning btn-flat">Đổi mật khẩu</a>
				</div>
				<div class="pull-right">
				 	<a href="dangxuat.php" class="btn btn-danger btn-flat">Đăng xuất</a>
				</div>
			  </li>
			</ul>
		  </li>
		</ul>
	  </div>
	</nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

	<!-- sidebar: style can be found in sidebar.less -->
	<section class="sidebar">

	  <!-- Sidebar user panel (optional) -->
	  <div class="user-panel">
		<div class="pull-left image">
		  <img src="../dist/img/avatar.png" class="img-circle" alt="User Image">
		</div>
		<div class="pull-left info">
		  <p><?php echo $_SESSION['nameAD']; ?></p>
		  <!-- Status -->
		  <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
		</div>
	  </div>

	  <?php
	  	// $trang_chu = true;
	  	// $danh_sach_hoa_don = true;
	  	// $danh_sach_game = true;
	  	$nha_san_xuat = true;
	  	$the_loai = true;
	  	// $tai_khoan_thue = true;
	  	// $danh_sach_khach_hang = true;
	  	// $danh_sach_nhan_vien = true;

	  	include 'sidemenu.php';
	  ?>

	</section>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
		Danh sách nhà sản xuất và thể loại
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

	  <!--------------------------
		| Your Page Content Here |
		-------------------------->
		<div class="col-md-6">
			<div class="box box-warning">
				<div class="box-header with-border">
					<h3 class="box-title">Nhà sản xuất</h3>
				</div>
				<div class="box-body">
					<form class="form-group form-inline">
						<div class="col-md-3">
							<label>Ma NSX:</label>
							<input type="text" name="maNSX" class="form-control" style="width: 100%;" value="<?php if(isset($_GET['maNSX'])) echo  $_GET['maNSX']; ?>">
						</div>
						<div class="col-md-5">
							<label>Ten NSX:</label>
							<input type="text" name="tenNSX" class="form-control" style="width: 100%;" value="<?php if(isset($_GET['tenNSX'])) echo  $_GET['tenNSX']; ?>">
						</div>
						<div class="col-md-4" align="center">
							<input type="submit" class="btn btn-success mgt-10" value="Tim kiem" name="">
						</div>
					</form>
					<table class="table table-hover">
						<tr>
							<th>Ma NSX</th>
							<th>Ten NSX</th>
							<th></th>
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
									<td width="200px">
										<?php 
											if($_SESSION['quyenAD'])
											{
												?>
													<input type="text" class="form-control" style="width: 100%;" name="nameNSX" value="<?php echo $DH["tenNSX"] ?>">
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
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Thể loại</h3>
				</div>
				<div class="box-body">
					<form class="form-group form-inline">
						<div class="col-md-3">
							<label>Ma TL: </label>
							<input type="text" name="maTheLoai" class="form-control" style="width: 100%;" value="<?php if(isset($_GET['maTheLoai'])) echo  $_GET['maTheLoai']; ?>">
						</div>
						<div class="col-md-5">
							<label>Ten The Loai: </label>
							<input type="text" name="tenTheLoai" class="form-control" style="width: 100%;" value="<?php if(isset($_GET['tenTheLoai'])) echo  $_GET['tenTheLoai']; ?>">
						</div>
						<div class="col-md-4" align="center">
							<input type="submit" class="btn btn-success mgt-10" value="Tim kiem" name="">
						</div>
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
				</div>
			</div>
		</div>
	</section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
	<!-- Default to the left -->
	<strong>Bản quyền thuộc về Lương Minh Đức - Vũ Văn Toàn - 2019</strong>
  </footer>  
</div>
<!-- ./wrapper -->



<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>