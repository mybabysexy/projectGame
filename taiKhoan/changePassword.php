<?php session_start(); ?>
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
		function login()
		{
			var check = 0;
			var regMatKhau=/^[a-zA-Z0-9]+$/;

			if(document.getElementById("password").value.length == 0)
			{
				document.getElementById("errPassword").innerHTML = "Hãy điền mật khấu";
			}
			else if(document.getElementById("password").value.length >= 8)
			{
				var kqMatKhau=regMatKhau.test(document.getElementById("password").value);
				if(kqMatKhau)
				{
					document.getElementById("errPassword").innerHTML="";
					check++;		
				}
				else
				{
					document.getElementById("errPassword").innerHTML="Không đúng định dạng";		
				}
			}
			else document.getElementById("errPassword").innerHTML="Mật khẩu phải lớn hơn 8 kí tự";

			if(document.getElementById("repassword").value.length == 0)
			{
				document.getElementById("errRepassword").innerHTML = "Hãy nhập lại mật khấu";
			}
			else if(document.getElementById("repassword").value != document.getElementById("password").value)
			{
				document.getElementById("errRepassword").innerHTML = "Mật khấu không khớp";
			}
			else
			{
				document.getElementById("errRepassword").innerHTML = "";
				check++;
			}
			if(check == 2) document.getElementById("loginButton").type= 'submit';
		}
	</script>
</head>
<body>
	<?php
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
					<h1 id="header" style="margin: 50px">- Đổi mật khẩu -</h1>
					<div style="width: 400px">
						<?php 
							$idKH = $_SESSION['idKH'];
							$result = mysqli_query($con, "select * from tkuser where maTK = '$idKH'");
							while ($USER = mysqli_fetch_array($result)) {
								?>
								<form class="form-group" action="doimk.php" method="post">
									<table class="table">
										<tr>
											<td width="200px">Mật khẩu mới</td>
											<td>
												<input type="password" id="password" name="password" class="form-control">
												<span id="errPassword"></span>
											</td>
										</tr>
										<tr>
											<td width="200px">Nhập lại mật khẩu</td>
											<td>
												<input type="password" id="repassword" class="form-control">
												<span id="errRepassword"></span>
											</td>
										</tr>
									</table>
									<a href="../taiKhoan" class="btn btn-lg btn-danger">Hủy</a>
									<input type="button" class="btn btn-lg btn-success" id="loginButton" value="Hoàn tất" onclick="login()">
								</form>
								<?php
							}
						?>
					</div>
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