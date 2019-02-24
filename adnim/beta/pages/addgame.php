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
  	Thêm game
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

	<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=dgfdx1ujzrfllakgnjzonio86rugbr7rjfbpkzo9vqp6bt0v"></script>

    <script>
		tinymce.init({
	    selector: '.mytextarea',
	    plugins: 'image code',
	    
	    // without images_upload_url set, Upload tab won't show up
	    images_upload_url: 'tinyupload.php',
	    
	    // override default upload handler to simulate successful upload
	    images_upload_handler: function (blobInfo, success, failure) {
	        var xhr, formData;
	      
	        xhr = new XMLHttpRequest();
	        xhr.withCredentials = false;
	        xhr.open('POST', 'upload.php');
	      
	        xhr.onload = function() {
	            var json;
	        
	            if (xhr.status != 200) {
	                failure('HTTP Error: ' + xhr.status);
	                return;
	            }
	        
	            json = JSON.parse(xhr.responseText);
	        
	            if (!json || typeof json.location != 'string') {
	                failure('Invalid JSON: ' + xhr.responseText);
	                return;
	            }
	        
	            success(json.location);
	        };
	      
	        formData = new FormData();
	        formData.append('file', blobInfo.blob(), blobInfo.filename());
	      
	        xhr.send(formData);
	    },
	});
	</script>

	<script type="text/javascript">
		function PreviewImage() {
	        var a = document.getElementById("fileToUpload");
			if (a.files.length == 0) {
				alert("choose");
				return;
			}
			//if (document.getElementById("uploadFile").type == "submit") {return;}
			var fileType = a.files[0].type;
			var fileSize = a.files[0].size;
			if (fileType == "image/png" || fileType == "image/jpg" || fileType == "image/jpeg" || fileType == "image/webp") 
			{
				if (fileSize <= 2000000)
				{
					var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);
			        oFReader.onload = function (oFREvent) {
			            document.getElementById("uploadPreview").src = oFREvent.target.result;
			        };
				}
				else
				{
					alert("file size");
					document.getElementById("addGameBtn").type = "button";
					window.location.reload();
				}
			}
			else
			{
				alert("Sai định dạng file ảnh!!!");
				document.getElementById("addGameBtn").type = "button";
				window.location.reload();
			}
	    };
	    function validate()
	    {
	    	var dem = 0;
	    	var a = document.getElementById("fileToUpload");
			if (a.files.length == 0) {
				alert("Bạn chưa chọn ảnh để upload!!!");
			}
			else
			{
				dem++;
			}

			if (document.getElementById('tenGame').value.length == 0) {
				document.getElementById('tenGame').style="border: 2px solid red; height: 50px; font-size: 20pt; font-weight: bold; text-align: center; margin-top: 20px";
			}
			else
			{
				document.getElementById('tenGame').style="height: 50px; font-size: 20pt; font-weight: bold; text-align: center; margin-top: 20px; border: 1px solid #ccc";
				dem++;
			}

			if (document.getElementById('gia').value.length == 0) {
				document.getElementById('gia').style="border: 2px solid red; height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px";
			}
			else
			{
				document.getElementById('gia').style="height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px; border: 1px solid #ccc";
				dem++;
			}

			if (document.getElementById('soLuong').value.length == 0) {
				document.getElementById('soLuong').style="border: 2px solid red; height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px";
			}
			else
			{
				document.getElementById('soLuong').style="height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px; border: 1px solid #ccc";
				dem++;
			}

			if (dem == 4) {
				document.getElementById("addGameBtn").type = "submit";
			}
	    }
	</script>

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
		Thêm game
	  </h1>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">

	  <!--------------------------
		| Your Page Content Here |
		-------------------------->
		<div class="col-md-12">
			<div class="box box-success">
				<div class="box-body">
					<form method="POST" action="themGame.php" enctype="multipart/form-data">
						<center class="col-lg-12">
							<input type="text" id="tenGame" name="tenGame" class="form-control" style="height: 50px; font-size: 20pt; font-weight: bold; text-align: center; margin-top: 20px" placeholder="..Tên game..">
						</center>
						

						<div class="col-md-2">
							<input type="text" id="gia" name="gia" class="form-control" style="height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px" placeholder="...">
							<label>Giá sản phẩm</label>
						</div>
						<div class="col-md-1">
							<input type="text" id="soLuong" name="soLuong" class="form-control" style="height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px" placeholder="...">
							<label>Số lượng</label>
						</div>
						<div class="col-md-3">
							<select name="tenTheLoai" class="form-control" style="height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px">
								<?php 
									$sql = "select * from theloai";
									$result = mysqli_query($con, $sql);
									while ($tl = mysqli_fetch_array($result)) {
										?>
											<option value="<?php echo $tl['maTheLoai'] ?>">
												<?php echo $tl['theLoai']; ?>
											</option>
										<?php
									}
								?>
							</select>
							<label>Thể loại game</label>
						</div>
						<div class="col-md-3">
							<select name="tenNSX" class="form-control" style="height: 45px; font-size: 13pt; font-weight: bold; text-align: center; margin-top: 20px">
								<?php 
									$sql2 = "select * from nsx";
									$result2 = mysqli_query($con, $sql2);
									while ($nsx = mysqli_fetch_array($result2)) {
										?>
											<option value="<?php echo $nsx['maNSX'] ?>">
												<?php echo $nsx['tenNSX']; ?>
											</option>
										<?php
									}
								?>
							</select>
							<label>Nhà sản xuất</label>
						</div>

						<div class="col-md-3">
							<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="font-size: 13pt;text-align: center; margin-top: 20px; width: 100%">
								<span class="glyphicon glyphicon-cloud-upload"></span>
							</button>
							<label>Thêm ảnh sản phẩm</label>
						</div>

						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<h4 class="modal-title" id="myModalLabel">Lịch sử giao dịch</h4>
									</div>
									<div class="modal-body">
										<div>
										    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" onchange="PreviewImage()">
								    	</div>
								    	<div style="margin-top: 20px">
								    		<h4 style="text-align: left;">Preview:</h4>
								    		<img id="uploadPreview" style="width: 100%">
								    	</div>
									</div>
									<div class="modal-footer">
										<button type="button" id="closeModal" class="btn btn-success" data-dismiss="modal">Xong</button>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-12">
							<h3>THÔNG TIN GAME</h3>
							<textarea name="moTa" class="mytextarea">
							
							</textarea>
						</div>
						
						<div class="col-lg-12">
							<h3>CẤU HÌNH</h3>
							<textarea name="cauHinh" class="mytextarea">
								
							</textarea>
						</div>

						<div class="col-lg-12" style="margin: 20px 0">
							<input type="button" id="addGameBtn" class="btn btn-success btn-lg btn-block" value="Thêm game" onclick="validate()">
						</div>
					</form>
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