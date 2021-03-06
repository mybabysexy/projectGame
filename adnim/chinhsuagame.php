<?php 
	session_start();
	include '../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: index.php");
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
</head>
<body>
	<div class="container">
		<a href="home.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Danh sach hoa don</a>
		<a href="listgame.php" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">List game</a>
		<a href="nhasanxuat.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Nha san xuat</a>
		<a href="theloai.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">The loai</a>
		<a href="taikhoan.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Tai khoan</a>
		<?php 
			if($_SESSION['quyenAD'])
			{
				?>
				<a href="taikhoanAD" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Admins</a>
				<?
			}
		?>

		<?php 
			$maSP = $_GET['id'];
			$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,soLuong,maAnh,moTa,cauHinh from (select maSP,tenSP,gia,maAnh,maTheLoai,soLuong,nsx.tenNSX as NSX,moTa,cauHinh from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where maSP = $maSP";
			$result = mysqli_query($con, $sql);
			while ($sp = mysqli_fetch_array($result)) {
				?>
					<form method="post" action="editgameadvanced.php">
						<input type="text" name="maSP" value="<?php echo $sp['maSP'] ?>" style="display: none">
						<center>
							<a href="../sanpham/?id=<?php echo $sp['maSP'] ?>" target="_blank"><h3>-- <?php echo $sp['tenSP'] ?> --</h3></a>
						</center>
						<h3>THÔNG TIN GAME</h3>
						<textarea name="moTa" class="mytextarea">
							<?php echo $sp['moTa'] ?>
						</textarea>

						<h3>CẤU HÌNH</h3>
						<textarea name="cauHinh" class="mytextarea">
							<?php echo $sp['cauHinh'] ?>
						</textarea>
						<br>
						<input type="submit" class="btn btn-success btn-lg btn-block" value="Chỉnh sửa">
					</form>
				<?php
			}
		?>
	
		<p align="center" style="margin-top: 40px">
			Admin: <?php echo $_SESSION['nameAD']; ?> - <?php echo $_SESSION['quyenAD']? "Super Admin":"Admin" ?>
		</p>
		<a href="dangxuat.php" class="btn btn-primary btn-lg" style="display: block;">
			Logout
		</a>
	</div>
</body>
</html>