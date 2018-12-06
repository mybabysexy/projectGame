<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhóm 7 - Game Store</title>
	<link rel="icon" type="image/png" href="favicon.ico">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style type="text/css">
		body {margin: 0; padding: 0; font-family: sans-serif;}
		#head {height: 150px}
		#topbar {display: flex; align-items: center; height: 30%; background-color: cyan;}
		#menu {height: 70%; display: flex; align-items: center; background-color: darkviolet}
		#banner {height: 600px; background-color: red}
		#listGame {display: grid; align-items: center; justify-content: center}
		#searchBar {height: 105px; width: 100% ; background-color: white; position: absolute; top: 45px; display: none; align-items: center;}
		#searchButton {position: absolute; right: 50px; border: 3px solid white; color: white; border-radius: 25px; background-color: transparent; width: 120px; height: 50px; z-index: 1; font-size: 20px; cursor: pointer;}
		#cartButton {position: absolute; right: 200px; border: 3px solid white; color: white; border-radius: 25px; background-color: transparent; width: 120px; height: 50px; font-size: 20px; cursor: pointer; z-index: 0}

		.spName {font-size: 20px; margin: 8px; font-weight: bold}
		.spPrice {font-size: 20px; font-weight: bolder; color: brown}
		.btnDetails {width: 95px; height: 35px; font-size: 15px; border: 0; background-color: green; border-radius: 8px; color: white; margin: 0px 2px; cursor: pointer;}
		.btnAddToCart {width: 150px; height: 35px; font-size: 15px; border: 0; background-color: red; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer; position: relative;}
		.btnBuyNow {width: 90px; height: 35px; font-size: 15px; border: 0; background-color: orange; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer;}

		#footer {width: 100%; height: 70px; background-color: darkviolet; margin-top: 20px; display: flex; align-items: center; justify-content: center; color: white; bottom: 0; position: fixed;}

		::-webkit-scrollbar {
		width: 5px;
		height: 10px;
		}

		::-webkit-scrollbar-track {
		border: none;
		background-color: black;
		}

		::-webkit-scrollbar-thumb {
		background: gray;  
		}

		::-webkit-scrollbar-thumb:hover {
		background: #88ba1c;  
		}
	</style>
	<script type="text/javascript">
		searchBarState = 0;
		function showSearchBar()
		{
			if(searchBarState == 1)
			{
				document.getElementById('searchBar').style.display="none";
				document.getElementById('searchButton').style.border="3px solid white";
				document.getElementById('searchButton').style.color="white";
				document.getElementById('searchButton').value="Tìm kiếm";
				searchBarState = 0;
			}
			else {
				document.getElementById('searchBar').style.display="flex";
				document.getElementById('searchButton').style.border="3px solid red";
				document.getElementById('searchButton').style.color="red";
				document.getElementById('searchButton').value="Đóng lại";
				document.getElementById('cartBar').style.display="none";
				searchBarState+=1;
			}
		}
		setTimeout(function(){document.getElementById('notifyTK').style.opacity = 0;}, 3000);
		setTimeout(function(){document.getElementById('notifyTK').style.display = 'none';}, 4000);
	</script>
</head>
<body>
	<?php
		session_start();
		include '../connectDB.php';
		if(isset($_SESSION['idKH'])) {}
		else header("location: ../signin");
		mysqli_set_charset($con,'utf8');
		if(isset($_SESSION['cartItem']));
		else
			$_SESSION['cartItem'] = array();
		$row = 0;
	?>
	<div id="main">
		<div id="head">
			<div id="topbar">
				<div style="width: 70%; height: 100%; display: flex; align-items: center;">
					<p style="margin: 0px 30px; float: left;">Chào mừng các bạn tới với trang chúng tôi - Thuê game - Bán game</p>
				</div>
				<?php
					if(isset($_SESSION['nameKH']))
					{
						?>
						<div style="width: 30%; height: 100%; background-color: transparent; display: flex; align-items: center">
							<p style="margin: 0">Xin chào: <a href="/taiKhoan" style="text-decoration: none; color: blue; font-weight: bold"><?php echo $_SESSION['nameKH']?></a></p>
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9F3434; border-radius: 25px; margin-left: 20px">
								<a href="../logout.php" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng xuất</a>
							</button>
						</div>
						<?php
					}
					else
					{
						?>
						<div style="width: 30%; height: 100%; background-color: transparent; display: flex; align-items: center">
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9825FA; border-radius: 25px; margin-left: 50px">
								<a href="signin" style="text-decoration: none; color: #9825FA; font-weight: bold">Đăng nhập</a>
							</button>
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9F3434; border-radius: 25px; margin-left: 20px">
								<a href="signup" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng ký</a>
							</button>
						</div>
						<?php
					}
				?>
			</div>
			<div id="menu">
				<a href="../" style="text-decoration: none; margin: 0px 70px; font-size: 50px; color: white"><img src="../logo.png" width="100px"></a>
				<input type="button" id="searchButton" onclick="showSearchBar()" value="Tìm kiếm">
				<script type="text/javascript">
					function gotoCart()
					{
						window.location.href="../cart"
					}
				</script>
				<input type="button" id="cartButton" onclick="gotoCart()" value="Giỏ hàng">
			</div>
		</div>
		<div id="searchBar">
			<form action="./">
				<input type="text" name="q" placeholder="NHẬP ÍT NHẤT 3 KÍ TỰ" style="background-color: transparent; border: none; border-bottom: 2px solid black; height: 50px; font-size: 40px; margin-left: 50px">
			</form>
		</div>
		<div id="body">
			<div>
				<div align="center">
					<div id="notifyTK" style="opacity: 1; transition: 0.5s opacity">
						<?php 
							if(isset($_GET['c'])) {
								if($_GET['c'] == 0)
								{
									?>
										<div class="alert alert-danger">
										    <strong>Oops!</strong> Đã có lỗi xảy ra hãy kiểm tra lại dữ liệu nhập vào
										</div>
									<?
								}
								if($_GET['c'] == 1)
								{
									?>
										<div class="alert alert-info">
										    <strong>Thành công!</strong> Mật khẩuđã được thay đổi
										</div>
									<?
								}
								if($_GET['c'] == 2)
								{
									?>
										<div class="alert alert-info">
										    <strong>Thành công!</strong> Thông tin đã được thay đổi
										</div>
									<?
								}
						}
						?>
					</div>
					<h1 id="header" style="margin: 50px">- Thông tin tài khoản -</h1>
					<div style="width: 400px">
						<?php 
							$idKH = $_SESSION['idKH'];
							$result = mysqli_query($con, "select * from tkuser where maTK = '$idKH'");
							while ($USER = mysqli_fetch_array($result)) {
								?>
								<table class="table">
									<tr>
										<td width="200px">Name</td>
										<td width="300px"><?php echo $_SESSION['nameKH']?></td>
									</tr>
									<tr>
										<td width="200px">Account</td>
										<td width="300px"><?php echo $USER['tenTK']?></td>
									</tr>
									<tr>
										<td width="200px">SDT</td>
										<td width="300px"><?php echo $USER['sdt']?></td>
									</tr>
									<tr>
										<td width="200px">Email</td>
										<td width="300px"><?php echo $USER['email']?></td>
									</tr>
								</table>
								<?php
							}
						?>
					</div>
					<a href="edit.php" class="btn btn-lg btn-success">Chỉnh sửa</a>
					<a href="changePassword.php" class="btn btn-lg btn-warning">Đổi mật khẩu</a>
					<a href="#" class="btn btn-lg btn-info">Lịch sử giao dịch</a>
				</div>
			</div>
		</div>
		<div id="footer">
			Lương Minh Đức - Vũ Văn Toàn
		</div>
	</div>
	<?php mysqli_close($con) ?>
</body>
</html>