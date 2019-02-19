<?php 
	session_start();
	include '../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm game</title>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

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
</head>
<body>
	<div class="container">
		<a href="home.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Danh sách hóa đơn</a>
		<a href="listgame.php" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">List game</a>
		<a href="nhasanxuat.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Nhà sản xuất</a>
		<a href="theloai.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Thể loại</a>
		<a href="taikhoan.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Users</a>
		<a href="taikhoanthue.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Thuê</a>
		<?php 
			if($_SESSION['quyenAD'])
			{
				?>
				<a href="taikhoanAD" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Admins</a>
				<?
			}
		?>

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
	
		<p align="center" style="margin-top: 40px">
			Admin: <?php echo $_SESSION['nameAD']; ?> - <?php echo $_SESSION['quyenAD']? "Super Admin":"Admin" ?>
		</p>
		<a href="dangxuat.php" class="btn btn-primary btn-lg" style="display: block;">
			Logout
		</a>
	</div>
</body>
</html>