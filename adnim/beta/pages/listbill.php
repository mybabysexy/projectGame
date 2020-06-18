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
  <title>Danh sách hóa đơn</title>

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
	  	$danh_sach_hoa_don = true;
	  	// $danh_sach_game = true;
	  	// $nha_san_xuat = true;
	  	// $the_loai = true;
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
					<h3 class="box-title">Tìm kiếm</h3>
				</div>
				<div class="box-body">
					<form class="form-group form-inline">
						<div class="col-md-3">
							<label>Mã HD:</label>
							<input type="text" name="maHD" class="form-control" style="width: 100%" value="<?php if(isset($_GET['maHD'])) echo  $_GET['maHD']; ?>">
						</div>
						<div class="col-md-3">
							<label>Tên KH:</label>
							<input type="text" name="tenKH" class="form-control" style="width: 100%" value="<?php if(isset($_GET['tenKH'])) echo  $_GET['tenKH']; ?>">
						</div>
						<div class="col-md-3">
							<label>Ngày đặt hàng:</label>
							<input type="date" class="form-control" name="date" style="width: 100%">
						</div>
						<div class="col-md-3">
							<label>Tình trạng:</label>							
							<select class="form-control" style="width: 100%" name="tinhTrang">
								<option value="999" selected <?php if(isset($_GET['tinhTrang'])) if($_GET['tinhTrang'] == 999) echo "selected" ?>>Tất cả</option>
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
						</div>
						<div class="col-md-12">
							<input type="submit" class="btn btn-success btn-lg btn-block mgt-10" value="Tìm kiếm" name="">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="box box-danger">
				<div class="box-header with-border">
					<h3 class="box-title">Đơn mua</h3>
				</div>
				<div class="box-body">
					<table class="table">
						<tr>
							<th>Mã HD</th>
							<th>Ngày đặt hàng</th>
							<th>Tên KH</th>
							<th>Thuê/mua</th>
							<th>Tổng tiền</th>
							<th>Tình Trạng</th>
							<th></th>
						</tr>
						<?php 
							$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where loaiGiaoDich = 0 order by ngaydathang desc";
							if (isset($_GET['tinhTrang'])) {
								if($_GET['tinhTrang'] != 999)
								{
									$tinhTrang = $_GET['tinhTrang'];
									$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tinhTrang = $tinhTrang and loaiGiaoDich = 0 order by maDonHang";
								}
							}
							if (!empty($_GET['maHD'])) {
								if($_GET['maHD'] > 0)
								{
									$maHD = $_GET['maHD'];
									$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where maDonHang = $maHD and loaiGiaoDich = 0 order by maDonHang";
								}
							}
							if (!empty($_GET['tenKH'])) {
								if($_GET['tenKH'] >= 0)
								{
									$tenKH = $_GET['tenKH'];
									$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tenKH like '%$tenKH%' and loaiGiaoDich = 0 order by maDonHang";
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
											<br>
											<?php echo $DH["sdt"] ?>
											<br>
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
											<select class="form-control" style="width: 110px" <?php if($DH["tinhTrang"] != 0) echo "disabled"; ?> name="tinhTrang" onchange="$('#smbtn<?php echo $DH["maDonHang"] ?>').click();">
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
											<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal" style="width: 100px" onclick="ajax(<?php echo $DH["maDonHang"] ?>)">
												Chi tiết
											</button>
											<input type="submit" id="smbtn<?php echo $DH["maDonHang"] ?>" style="display: none">
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
			<div class="box box-warning">
				<div class="box-header with-border">
					<h3 class="box-title">Đơn thuê</h3>
				</div>
				<div class="box-body">
					<table class="table">
						<tr>
							<th>Mã HD</th>
							<th>Ngày đặt hàng</th>
							<th>Tên KH</th>
							<th>Thuê/mua</th>
							<th>Tổng tiền</th>
							<th>Tình Trạng</th>
							<th></th>
						</tr>
						<?php 
							$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where loaiGiaoDich = 1 order by ngaydathang desc";
							if (isset($_GET['tinhTrang'])) {
								if($_GET['tinhTrang'] != 999)
								{
									$tinhTrang = $_GET['tinhTrang'];
									$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tinhTrang = $tinhTrang and loaiGiaoDich = 1 order by maDonHang";
								}
							}
							if (!empty($_GET['maHD'])) {
								if($_GET['maHD'] > 0)
								{
									$maHD = $_GET['maHD'];
									$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where maDonHang = $maHD and loaiGiaoDich = 1 order by maDonHang";
								}
							}
							if (!empty($_GET['tenKH'])) {
								if($_GET['tenKH'] >= 0)
								{
									$tenKH = $_GET['tenKH'];
									$sql = "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,hanSuDung, loaiGiaoDich, tkuser.tenKH, tkuser.sdt, tkuser.email, tkuser.maTK,hour(timediff(hanSuDung, ngaydathang)) as rentTime,(timediff(hanSuDung, CURRENT_TIMESTAMP())) as timeLeft FROM `hoadon` INNER JOIN tkuser on tkuser.maTK = hoadon.maTK where tenKH like '%$tenKH%' and loaiGiaoDich = 1 order by maDonHang";
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
											<br>
											<?php echo $DH["sdt"] ?>
											<br>
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
											<select class="form-control" style="width: 110px" <?php if($DH["tinhTrang"] != 0) echo "disabled"; ?> name="tinhTrang" onchange="$('#smbtn<?php echo $DH["maDonHang"] ?>').click();">
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
											<button type="button" class="btn btn-lg btn-primary" data-toggle="modal" data-target="#myModal" style="width: 100px" onclick="ajax(<?php echo $DH["maDonHang"] ?>)">
												Chi tiết
											</button>
											<input type="submit" id="smbtn<?php echo $DH["maDonHang"] ?>" style="display: none">
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
	</section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="modal-title" id="myModalLabel">Chi tiết hoá đơn</h4>
				</div>
				<div class="modal-body" id="modal-body">
					
				</div>
			</div>
		</div>
	</div>

  <!-- Main Footer -->
  <footer class="main-footer">
	<!-- Default to the left -->
	<strong>@ 2020 - Bản quyền của ACC GAMING</strong>
  </footer>  
</div>
<!-- ./wrapper -->

<script type="text/javascript">
	function clearModal()
	{
		$('#modal-body').html('');
	}

	function ajax(str) {
		clearModal();
		if (window.XMLHttpRequest) {
			// code for IE7+, Firefox, Chrome, Opera, Safari
			xmlhttp=new XMLHttpRequest();
		} else {  // code for IE6, IE5
			xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		}
		xmlhttp.onreadystatechange=function() {
			if (this.readyState==4 && this.status==200) {
				document.getElementById("modal-body").innerHTML=this.responseText;
			}
		}
		xmlhttp.open("GET","details.php?id="+str,true);
		xmlhttp.send();
	}
</script>

<?php mysqli_close($con); ?>

<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
</body>
</html>