<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>

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

		.spName {font-size: 20px; margin: 8px; font-weight: bold}
		.spPrice {font-size: 20px; font-weight: bolder; color: brown}
		.btnDetails {width: 95px; height: 35px; font-size: 15px; border: 0; background-color: green; border-radius: 8px; color: white; margin: 0px 2px; cursor: pointer;}
		.btnAddToCart {width: 150px; height: 35px; font-size: 15px; border: 0; background-color: red; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer;}
		.btnBuyNow {width: 90px; height: 35px; font-size: 15px; border: 0; background-color: orange; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer;}

		#footer {height: 70px; background-color: darkviolet; margin-top: 20px; display: flex; align-items: center; justify-content: center; color: white}

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
				searchBarState+=1;
			}
		}

		function login()
		{
			if(document.getElementById("name").value.length != 0 && document.getElementById("pass").value.length != 0)
				document.getElementById("loginButton").type= 'submit';
			else if(document.getElementById("name").value.length == 0 && document.getElementById("pass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập và mật khấu"
			else if(document.getElementById("pass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền mật khấu"
			else document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập";
		}
	</script>
</head>
<body>
	<?php 
		session_start();
		if(isset($_SESSION['nameKH'])) header("location: index.php");
	?>
	<div id="main">
		<div id="head">
			<div id="topbar">
				<div style="width: 70%; height: 100%; display: flex; align-items: center;">
					<p style="margin: 0px 30px; float: left;">Chào mừng các bạn tới với trang chúng tôi - Thuê game - Bán game</p>
				</div>
				<div style="width: 30%; height: 100%; background-color: transparent; display: flex; align-items: center">
					<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9825FA; border-radius: 25px; margin-left: 50px">
						<a href="../signin" style="text-decoration: none; color: #9825FA; font-weight: bold">Đăng nhập</a>
					</button>
					<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9F3434; border-radius: 25px; margin-left: 20px">
						<a href="../signup" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng ký</a>
					</button>
				</div>
			</div>
			<div id="menu">
				<a href="../" style="text-decoration: none; margin: 0px 70px; font-size: 50px; color: white"><img src="../logo.png" width="100px"></a>
				<input type="button" id="searchButton" onclick="showSearchBar()" value="Tìm kiếm">
			</div>
		</div>
		<div id="searchBar">
			<form action="../index.php">
				<input type="text" name="q" placeholder="NHẬP ÍT NHẤT 3 KÍ TỰ" style="background-color: transparent; border: none; border-bottom: 2px solid black; height: 50px; font-size: 40px; margin-left: 50px">
			</form>
		</div>
		<div id="body" class="container">
			<div>
				<div align="center" style="margin: 50px">
					<h1 id="header">- Đăng nhập -</h1>
				</div>
				<form action="../signin/dangnhap.php" method="POST" class="form-group">
					<div align="center">
					
						<div class="form-group" style="margin: 10px;">
							<input type="text" id="name" name="username" class="form-control" style="width: 250px" placeholder="username" required>
						</div>
						<div class="form-group"style="margin: 10px;">
							<input type="password" id="pass" name="password" class="form-control" style="width: 250px" placeholder="password" required>
						</div>
						<div align="center" style="margin: 10px; margin-top: 20px">
							<span id="errLogin" style="color: red"></span>
						</div>
						<?php 
							if(isset($_GET['err']))
								if($_GET['err'] == 1) {
									?>
										<script type="text/javascript">
											document.getElementById("errLogin").innerHTML = "Sai tên đăng nhập hoặc mật khấu";
										</script>
									<?php
								}
							?>
						<div align="center" style="margin: 10px; margin-top: 20px; margin-bottom: 50px;">
							<input type="button" id="loginButton" onclick="login()" value="Đăng nhập" class="btn btn-primary btn-lg">
							<a href="../signup" class="btn btn-lg btn-success">Đăng ký</a>
						</div>

					</div>
				</form>
			</div>
		</div>
		<div id="footer">
			Lương Minh Đức - Vũ Văn Toàn
		</div>
	</div>
</body>
</html>