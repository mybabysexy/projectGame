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
  	Tài khoản thuê
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
	  	// $nha_san_xuat = true;
	  	// $the_loai = true;
	  	$tai_khoan_thue = true;
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
		Danh sách tài khoản thuê
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

	  <!--------------------------
		| Your Page Content Here |
		-------------------------->
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title">Ahihi</h3>
				</div>
				<div class="box-body">
					<form class="form-group form-inline">
						<div class="col-md-4">
							<label>Ma TK:</label>
							<input type="text" name="maTK" class="form-control" style="width: 100px;" value="<?php if(isset($_GET['maTK'])) echo  $_GET['maTK']; ?>">
						</div>
						<div class="col-md-4">
							<label>Ten TK: </label>
							<input type="text" name="tenKH" class="form-control" style="" value="<?php if(isset($_GET['tenKH'])) echo  $_GET['tenKH']; ?>">
						</div>
						<div class="col-md-4">
							<input type="submit" class="btn btn-success btn-block" value="Tìm kiếm" name="">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-body">
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
	<strong>@ 2020 - Bản quyền của ACC GAMING</strong>
  </footer>  
</div>
<!-- ./wrapper -->



<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>