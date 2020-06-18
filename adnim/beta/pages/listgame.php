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
  	Danh sách game
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

	<script type="text/javascript">
    	$(function(){
    		$('#addGame').hover(function(){
    			$(this).attr('src','addGame4.png');
    		}, function(){
    			$(this).attr('src','addGame1.png');
    		})
    	})
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
	  	// $danh_sach_hoa_don = true;
	  	$danh_sach_game = true;
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
		Danh sách game
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
						<div class="col-md-5">
							<label>Mã SP:</label>
							<input type="text" name="maSP" class="form-control" style="width: 100%;" value="<?php if(isset($_GET['maSP'])) echo  $_GET['maSP']; ?>">
						</div>
						<div class="col-md-5">
							<label>Tên game:</label>
							<input type="text" name="tenGame" class="form-control" style="width: 100%;" value="<?php if(isset($_GET['tenGame'])) echo  $_GET['tenGame']; ?>">
						</div>
						<div class="col-md-2">
							<input type="submit" class="btn btn-primary btn-lg btn-block" value="Tìm kiếm" style="margin-top: 6px" name="">
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-body">
					<?php
						$demRow = 0;
						$sp1dong = 3;
						$sp1page = 7;
						$left = -10;

						$sqlSoSP = mysqli_query($con, "select * from sanpham");
						$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);

						$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit 0,$sp1page";
						
						if(isset($_GET['page']))
						{
							$start = ($_GET['page']-1) * $sp1page;
							if($_GET['page'] == 1) $start = 0;
							$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit $start,$sp1page";
						}

						if (isset($_GET['maSP'])) {
							if($_GET['maSP'] > 0)
							{
								$maSP = $_GET['maSP'];
								$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where maSP = $maSP";
							}
						}

						if (!empty($_GET['tenGame'])) {
							if($_GET['tenGame'] >= 0)
							{
								$tenGame = $_GET['tenGame'];
								$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where tenSP like '%$tenGame%'";
							}
						}

						$result = mysqli_query($con, $sql);

						while($sp = mysqli_fetch_array($result)) 
						{ 
							?>
							<form method="" action="editgame.php">
								<div style="height: 380px;margin-bottom: 10px; padding: 0" class="col-lg-3 col-md-6 col-sm-6">
									<div style="width: 370px; height: 208px;position: relative;">
										<img src="<?php echo "../"."../".$sp["maAnh"]; ?>" style="width: 370px">
									</div>
									<script type="text/javascript">
										function editpic<?php echo $sp["maSP"] ?>()
										{
											window.open("editpic.php?id=<?php echo $sp["maSP"] ?>", "edit pic", "width=400,height=400");
										}
									</script>
									<button type="button" style="width: 50px; height: 50px; opacity: 0.5; border-radius: 50%; top: 10px; left: 10px; position: absolute;" onclick="editpic<?php echo $sp["maSP"] ?>()">
										<span class="glyphicon glyphicon-pencil"></span>
									</button>
									
									<div style="width: 370px; height: 172px; background-color: #E6E6E6; position: absolute; text-align: center;">
										<p class="spName" style="font-size: 18px; margin: 8px; font-weight: bold">
											<input type="text" name="maSP" value="<?php echo $sp["maSP"] ?>" readonly class="form-control" style="width: 45px; text-align: center; display: none;">
											<input type="text" name="tenSP" value="<?php echo $sp["tenSP"] ?>" class="form-control" style="text-align: center;">
										</p>
										<p style="margin: 5px 0px; font-size: 16px">
											Thể loại:
											<select class="form-control" name="theLoai" style="width: 120px; display: inline-block;">
												<?php 
													$sql3 = "select * from theloai";
													$result3 = mysqli_query($con, $sql3);
													while ($tl = mysqli_fetch_array($result3)) {
														?>
															<option 
																value="<?php echo $tl['maTheLoai'] ?>"
																<?php if($sp["theLoai"] == $tl['theLoai']) echo "selected"; ?> 
															>
																<?php echo $tl['theLoai']; ?>
															</option>
														<?php
													}
												?>
											</select>
											- Từ:
											<select class="form-control" name="NSX" style="width: 120px; display: inline-block;">
												<?php 
													$sql2 = "select * from nsx";
													$result2 = mysqli_query($con, $sql2);
													while ($nsx = mysqli_fetch_array($result2)) {
														?>
															<option 
																value="<?php echo $nsx['maNSX'] ?>"
																<?php if($sp['NSX'] == $nsx['tenNSX']) echo "selected"; ?> 
															>
																<?php echo $nsx['tenNSX']; ?>
															</option>
														<?php
													}
												?>
											</select>
										</p>
										<p style="margin: 5px 0px">
											Giá: <input type="text" name="gia" value="<?php echo $sp["gia"] ?>" class="form-control" style="width: 80px; display: inline-block;">
											Số lượng: <input type="text" name="soLuong" value="<?php echo $sp["soLuong"] ?>" class="form-control" style="width: 50px; display: inline-block;">
										</p>
										<div style="margin: 8px">
											<script type="text/javascript">
												function edit<?php echo $sp["maSP"] ?>()
												{
													window.open('chinhsuagame.php?id=<?php echo $sp["maSP"] ?>', 'example', 'width=800,height=400');
												}
											</script>
											<a href="chinhsuagame.php?id=<?php echo $sp["maSP"] ?>" target="_blank" class="btn btn-default" style="margin-left: 5px; width: 135px">
												<span class="glyphicon glyphicon-pencil"></span> Sửa nâng cao
											</a>
											<button type="submit" class="btn btn-success" style="margin-left: 5px; width: 120px">
												<span class="glyphicon glyphicon-pencil"></span> Sửa
											</button>
										</div>
									</div>
								</div>
							</form>
							<?php
						}
					?>
					<form method="" action="addgame.php"> 
						<div style="width: 380px;height: 380px;margin-bottom: 10px; padding: 0; display: flex;align-items: center;justify-content: center;" class="col-lg-4 col-md-6 col-sm-6">
							<a href="addgame.php">
								<img src="addGame1.png" id="addGame" width="320px">
							</a>
						</div>
					</form>
				</div>
			</div>
		</div>
		<div class="col-md-12">
			<div style="display: flex; justify-content: center;align-items: center; margin: 10px">
			<nav aria-label="...">
				<ul class="pagination pagination-lg">
					<li class="page-item" id="pgPrev">
					  <a class="page-link" id="apgPrev" href="?page=<?php echo $_GET['page']-1 ?>" tabindex="-1"><</a>
					</li>
						<?php
							for ($i=1; $i <= $demPage; $i++) { 
						    	?>
							    <li class="page-item" id="pg<?php echo $i ?>">
							    	<a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
							    </li>
							    <?php
						    }
						    if (isset($_GET['page'])) {
						    	$currentPage = $_GET['page'];
								?>
									<script type="text/javascript">
										document.getElementById('pg<?php echo $currentPage ?>').className = "page-item active";
									</script>
								<?php
							}
							else $currentPage = 1;
							?>
									<script type="text/javascript">
										document.getElementById('pg<?php echo $currentPage ?>').className = "page-item active";
									</script>
							<?php
						?>
					<li class="page-item" id="pgNext">
					  <a class="page-link" id="apgNext" href="?page=<?php echo $currentPage+1 ?>">></a>
					</li>
				</ul>
			</nav>
		</div>

		<?php 
			if (isset($currentPage)) {
				if($currentPage == $demPage || $demPage == 1)
				{
					?>
						<script type="text/javascript">
							document.getElementById('pgNext').className = "page-item disabled";
							$('#apgNext').attr("href","");
						</script>
					<?php
				}
				if($currentPage == 1)
				{
					?>
						<script type="text/javascript">
							document.getElementById('pgPrev').className = "page-item disabled";
							$('#apgPrev').attr("href","");
						</script>
					<?php
				}
			}
		?>
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