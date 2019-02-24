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
  <title>Tài khoản</title>

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
	  	// $tai_khoan_thue = true;
	  	$danh_sach_khach_hang = true;
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
		Welcome back!
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
							<th>Ten KH</th>
							<th>Username</th>
							<th>Doi MK</th>
							<th>Trang thai</th>
							<th></th>
						</tr>
						<?php
							$sql = "SELECT * from tkuser order by maTK";
							if(!empty($_GET['maTK']))
								{
									$maTK = $_GET['maTK'];
									$sql = "SELECT * from tkuser where maTK = $maTK order by maTK";
								}
							if(!empty($_GET['tenKH']))
								{
									$tenKH = $_GET['tenKH'];
									$sql = "SELECT * from tkuser where tenKH like '%$tenKH%' order by maTK";
								}
							$result = mysqli_query($con, $sql);
							while($DH = mysqli_fetch_array($result))
							{
								?>
								<form action="editKH.php" method="POST">
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
													<input type="text" class="form-control" name="tenKH" value="<?php echo $DH["tenKH"] ?>" style="width: 150px">
												<?php
											}
											else
											{
												?>
													<span><?php echo $DH["tenKH"] ?></span>
												<?php
											}
											if($_SESSION['quyenAD'])
											{
												?>
													<input type="text" class="form-control" name="sdt" value="<?php echo $DH["sdt"] ?>" style="width: 110px; ">
												<?php
											}
											else
											{
												?>
													<br><span><?php echo $DH["sdt"] ?></span>
												<?php
											}
											if($_SESSION['quyenAD'])
											{
												?>
													<input type="text" class="form-control mgb-10 mgr-10" name="email" value="<?php echo $DH["email"] ?>" style="width: 200px">
												<?php
											}
											else
											{
												?>
													<br><span><?php echo $DH["email"] ?></span>
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
											if(true)
											{
												if($DH["trangthai"])
												{
													?>
														<i class="fa fa-circle text-success"></i> Active
														<br>
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
														<i class="fa fa-circle text-danger"></i> Banned
														<br>
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
													<?
												}
											}
											else
											{
												?>
													<span><?php echo $DH["trangthai"] ?></span>
												<?php
											}
										?>
									</td>

									<?php 
										if($_SESSION['quyenAD'])
										{
											?>
											<td style="vertical-align: middle; text-align: center;">
												<button type="submit" class="btn btn-primary mgr-10" style="width: 120px">
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
					</table>
				</div>
			</div>
		</div>
		<?php 
			if($_SESSION['quyenAD'])
			{
				?>
					<div class="col-md-12">
						<div class="box box-danger">
							<div class="box-header with-border">
								<h3 class="box-title">Thêm tài khoản</h3>
							</div>
							<div class="box-body">
								<div>
									<table class="table">
										<form action="addTK.php" method="POST">
											<tr>
												<td>
													<input type="text" class="form-control" name="tenKH" style="width: 150px" placeholder="Ten KH">
												</td>
												<td>
													<input type="text" class="form-control" name="sdt" style="width: 110px; " placeholder="SDT">
												</td>
												<td>
													<input type="text" class="form-control" name="email" value="<?php echo $DH["email"] ?>" style="width: 200px" placeholder="email">
												</td>
												<td>
													<input type="text" class="form-control" name="tenTK" value="<?php echo $DH["tenTK"] ?>" style="width: 150px" placeholder="username">
												</td>

												<td colspan="3" style="vertical-align: middle; text-align: center;">
													<button type="submit" class="btn btn-success" style="margin-left: 10px; width: 200px">
														<span class="glyphicon glyphicon-plus-sign"></span> Them tai khoan
													</button>
												</td>
											</tr>
										</form>
									</table>
								</div>
							</div>
						</div>
					</div>
				<?
			}
		?>
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