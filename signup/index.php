<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
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
		.input {height: 30px; font-size: 20px}
		.err {width: 200px; color: red; font-weight: bold}

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
			var check = 0;
			var regUser=/^[a-zA-Z0-9_]+$/;
			var regMatKhau=/^[a-zA-Z0-9]+$/;
			var regEmail=/^[a-zA-Z]*[a-zA-Z0-9_.]+@[A-Za-z0-9]+\.?[a-zA-Z]+\.[A-Za-z]{2,3}$/;	
			var regSoDienThoai=/^[0-9+]+$/;

			if(document.getElementById("username").value.length == 0)
			{
				document.getElementById("errUsername").innerHTML = "Hãy điền tên đăng nhập";
			}
			else if(document.getElementById("username").value.length >=8 && document.getElementById("username").value.length <= 16)
			{
				var kqUser = regUser.test(document.getElementById("username").value);
				if(kqUser)
				{
					document.getElementById("errUsername").innerHTML = "";	
					check++;	
				}
				else
				{
					document.getElementById("errUsername").innerHTML="Không đúng định dạng";	
				}
			}
			else
			{
				document.getElementById("errUsername").innerHTML="username phải từ 8 đến 16 kí tự";		
			}

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

			if(document.getElementById("email").value.length == 0)
			{
				document.getElementById("errEmail").innerHTML = "Hãy điền email";
			}
			else
			{
				var kqEmail=regEmail.test(document.getElementById("email").value);
				if(kqEmail)
				{
					document.getElementById("errEmail").innerHTML = "";
					check++;		
				}
				else
				{
					document.getElementById("errEmail").innerHTML ="Không đúng định dạng";	
				}
			}

			if(document.getElementById("sdt").value.length == 0)
			{
				document.getElementById("errSDT").innerHTML = "Hãy điền số điện thoại";
			}
			else
			{
				var kqDienThoai=regSoDienThoai.test(document.getElementById("sdt").value);
				if(kqDienThoai)
				{
					document.getElementById("errSDT").innerHTML = "";
					check++;	
				}else
				{
					document.getElementById("errSDT").innerHTML.innerHTML="Không đúng định dạng";	
				}
			}
			
			if(check == 5) document.getElementById("loginButton").type= 'submit';
		}
	</script>
</head>
<body>
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
						<a href="./signup" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng ký</a>
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
		<div id="body">
			<div>
				<div align="center">
					<h1 id="header">- Đăng ký tài khoản -</h1>
				</div>
				<form action="../signup/dangky.php" method="POST">
					<div align="center">
						<table cellspacing="0" cellpadding="10px">
							<tr>
								<td width="150px">Tên đăng nhập</td>
								<td><input type="text" id="username" name="username" class="input" onblur="login()"></td>
								<td class="err"><span id="errUsername"></span></td>
							</tr>
							<tr>
								<td width="150px">Mật khẩu</td>
								<td><input type="password" id="password" name="password" class="input" onblur="login()"></td>
								<td class="err"><span id="errPassword"></span></td>
							</tr>
							<tr>
								<td width="150px">Nhập lại mật khẩu</td>
								<td><input type="password" id="repassword" name="repassword" class="input" onblur="login()"></td>
								<td class="err"><span id="errRepassword"></span></td>
							</tr>
							<tr>
								<td width="150px">Họ và tên</td>
								<td><input type="text" id="nameKH" name="nameKH" class="input" onblur="login()"></td>
								<td class="err"><span id="err"></span></td>
							</tr>
							<tr>
								<td width="150px">Email</td>
								<td><input type="text" id="email" name="email" class="input" onblur="login()"></td>
								<td class="err"><span id="errEmail"></span></td>
							</tr>
							<tr>
								<td width="150px">Số điện thoại</td>
								<td><input type="tel" id="sdt" name="sdt" class="input" onblur="login()"></td>
								<td class="err"><span id="errSDT"></span></td>
							</tr>
							<th colspan="3">
								<input type="button" id="loginButton" onclick="login()" value="Đăng ký" style="width: 120px; height: 50px; background-color: blue; font-size: 18px; color: white; border: 0; cursor: pointer">
							</th>
						</table>
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