<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>
		<?php 
			if(isset($_GET['page']))
			{
				echo "ACC Gaming - Trang ".$_GET['page'];
			}
			else
			{
				echo "ACC Gaming";
			}
		?>
	</title>
	<link rel="icon" type="image/png" href="favicon.ico">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- <script src="https://github.com/livereload/livereload-js/raw/master/dist/livereload.js?host=localhost"></script> -->

	<style type="text/css">
		body {margin: 0; padding: 0; font-family: sans-serif;}
		#head {height: 150px}
		#topbar {display: flex; align-items: center; height: 30%; background-color: cyan;}
		#menu {height: 70%; display: flex; align-items: center; background-color: darkviolet}
		#banner {height: 300px; background-color: red}
		#listGame {display: grid; align-items: center; justify-content: center}
		#searchBar {height: 105px; width: 100% ; background-color: white; position: absolute; top: 45px; display: none; align-items: center;}
		#searchButton {position: absolute; right: 50px; border: 3px solid white; color: white; border-radius: 25px; background-color: transparent; width: 120px; height: 50px; z-index: 1; font-size: 20px; cursor: pointer;}
		#livesearch {width: 511px ; background-color: white; position: absolute; top: 150px; align-items: center; z-index: 1;margin-left: 50px}
		#cartButton {position: absolute; right: 200px; border: 3px solid white; color: white; border-radius: 25px; background-color: transparent; padding: 0 20px; height: 50px; font-size: 20px; cursor: pointer; z-index: 0}

		#cartWidget {position: fixed; width: 50px; height: 80px; right: 0; top: 50vh; background-color: red; z-index: 1; display: none;}

		.spName {font-size: 18px; margin: 8px; font-weight: bold}
		.spPrice {font-size: 20px; font-weight: bolder; color: brown}
		.btnDetails {width: 95px; height: 35px; font-size: 15px; border: 0; background-color: green; border-radius: 8px; color: white; margin: 0px 2px; cursor: pointer;}
		.btnAddToCart {width: 150px; height: 35px; font-size: 15px; border: 0; background-color: red; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer; position: relative;}
		.btnBuyNow {width: 90px; height: 35px; font-size: 15px; border: 0; background-color: orange; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer;}
		.pageButton {width: 35px; height: 35px; background-color: lightgreen; border: none; font-size: 20px; margin: 2px}

		.err {font-size: 13px; color: red; font-weight: bold;}

		#footer {height: 70px; width: 100%; background-color: darkviolet; margin-top: 20px; display: flex; align-items: center; justify-content: center; color: white}

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
	<script>
		searchBarState = 0;
		function showSearchBar()
		{
			if(searchBarState == 1)
			{
				document.getElementById('searchBar').style.display="none";
				document.getElementById('livesearch').style.display="none";
				document.getElementById('searchButton').style.border="3px solid white";
				document.getElementById('searchButton').style.color="white";
				document.getElementById('searchButton').value="Tìm kiếm";
				searchBarState = 0;
			}
			else {
				document.getElementById('searchBar').style.display="flex";
				document.getElementById('livesearch').style.display="block";
				document.getElementById('searchButton').style.border="3px solid red";
				document.getElementById('searchButton').style.color="red";
				document.getElementById('searchButton').value="Đóng lại";
				searchBarState+=1;
			}
		}
		function signup()
		{
			var check = 0;
			var regUser=/^[a-zA-Z0-9_]+$/;
			var regMatKhau=/^[a-zA-Z0-9]+$/;
			var regEmail=/^[a-zA-Z]*[a-zA-Z0-9_.]+@[A-Za-z0-9]+\.?[a-zA-Z]+\.[A-Za-z]{2,3}$/;	
			var regSoDienThoai=/^[0-9+]+$/;

			if(document.getElementById("username").value.length == 0)
			{
				document.getElementById("errUsername").innerHTML = "Hãy điền tên đăng nhập";
				document.getElementById("username").style.border = "2px solid red";
			}
			else if(document.getElementById("username").value.length >=8 && document.getElementById("username").value.length <= 16)
			{
				var kqUser = regUser.test(document.getElementById("username").value);
				if(kqUser)
				{
					document.getElementById("errUsername").innerHTML = "";
					document.getElementById("username").style.border = "1px solid #ccc";
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
				document.getElementById("password").style.border = "2px solid red";
			}
			else if(document.getElementById("password").value.length >= 8)
			{
				var kqMatKhau=regMatKhau.test(document.getElementById("password").value);
				if(kqMatKhau)
				{
					document.getElementById("errPassword").innerHTML="";
					document.getElementById("password").style.border = "1px solid #ccc";
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
				document.getElementById("repassword").style.border = "2px solid red";
			}
			else if(document.getElementById("repassword").value != document.getElementById("password").value)
			{
				document.getElementById("errRepassword").innerHTML = "Mật khấu không khớp";
			}
			else
			{
				document.getElementById("errRepassword").innerHTML = "";
				document.getElementById("repassword").style.border = "1px solid #ccc";
				check++;
			}

			if(document.getElementById("nameKH").value.length == 0)
			{
				document.getElementById("errnameKH").innerHTML = "Hãy điền tên của bạn";
				document.getElementById("nameKH").style.border = "2px solid red";
			}
			else{
				document.getElementById("errnameKH").innerHTML = "";
				document.getElementById("nameKH").style.border = "1px solid #ccc";
			}

			if(document.getElementById("email").value.length == 0)
			{
				document.getElementById("errEmail").innerHTML = "Hãy điền email";
				document.getElementById("email").style.border = "2px solid red";
			}
			else
			{
				var kqEmail=regEmail.test(document.getElementById("email").value);
				if(kqEmail)
				{
					document.getElementById("errEmail").innerHTML = "";
					document.getElementById("email").style.border = "1px solid #ccc";
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
				document.getElementById("sdt").style.border = "2px solid red";
			}
			else
			{
				var kqDienThoai=regSoDienThoai.test(document.getElementById("sdt").value);
				if(kqDienThoai)
				{
					document.getElementById("errSDT").innerHTML = "";
					document.getElementById("sdt").style.border = "1px solid #ccc";
					check++;	
				}else
				{
					document.getElementById("errSDT").innerHTML.innerHTML="Không đúng định dạng";	
				}
			}
			
			if(check == 5) document.getElementById("loginButton").type= 'submit';
		}
		function login()
		{
			if(document.getElementById("name").value.length != 0 && document.getElementById("pass").value.length != 0)
				document.getElementById("loginButton").type= 'submit';
			else if(document.getElementById("name").value.length == 0 && document.getElementById("pass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập và mật khấu"
			else if(document.getElementById("pass").value.length == 0) document.getElementById("errLogin").innerHTML = "Hãy điền mật khấu"
			else document.getElementById("errLogin").innerHTML = "Hãy điền tên đăng nhập";
		}
		function changePass()
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
		include 'connectDB.php';
		mysqli_set_charset($con,'utf8');
		if(isset($_SESSION['cartItem']))
		{
			$sumSL = 0;
			$sumPrice = 0;
			foreach ($_SESSION['cartItem'] as $key => $value) {
				$sumSL += $value;
			}
		}
		else
			$_SESSION['cartItem'] = array();
		$row = 0;
	?>
	<div id="main">
		<div id="cartWidget">
			
		</div>
		<div id="head">
			<div id="topbar">
				<div style="width: 70%; height: 100%; display: flex; align-items: center;">
					<p style="margin: 0px 30px; float: left;">Chào mừng các bạn tới với ACC GAMING</p>
				</div>
				<?php
					if(isset($_SESSION['nameKH']))
					{
						?>
						<div style="width: 30%; height: 100%; background-color: transparent; display: flex; align-items: center">
							<p style="margin: 0">Xin chào: <a href="../taiKhoan" style="text-decoration: none; color: blue; font-weight: bold"><?php echo $_SESSION['nameKH']?></a></p>
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
								<a href="../signin/" style="text-decoration: none; color: #9825FA; font-weight: bold">Đăng nhập</a>
							</button>
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9F3434; border-radius: 25px; margin-left: 20px">
								<a href="../signup/" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng ký</a>
							</button>
						</div>
						<?php
					}
				?>
			</div>
			<div id="menu">
				<a href="../" style="text-decoration: none; margin: 0px 70px; font-size: 50px; color: white">
					<img src="../logo.png" width="100px">
				</a>
				<input type="button" id="searchButton" onclick="showSearchBar()" value="Tìm kiếm">
				
				<!-- <input type="button" id="cartButton" onclick="gotoCart()" value=""> -->
				<button type="button" id="cartButton" onclick="gotoCart()">
					
				</button>
				<script type="text/javascript">
					function gotoCart()
					{
						window.location.href="../cart/";
					}
					$(function(){
						var gh = "Giỏ hàng" + "<?php if($sumSL > 0) echo " <span class='label label-success'>".$sumSL."</span>" ?>";
						$("#cartButton").html(gh);
					})
				</script>
			</div>
		</div>
		<div id="searchBar">
			<script>
				function showResult(str) {
					if (str.length == 0) { 
						document.getElementById("livesearch").innerHTML="";
						return;
					}
					if (window.XMLHttpRequest) {
						// code for IE7+, Firefox, Chrome, Opera, Safari
						xmlhttp=new XMLHttpRequest();
					} else {  // code for IE6, IE5
						xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
					xmlhttp.onreadystatechange=function() {
						if (this.readyState==4 && this.status==200) {
							document.getElementById("livesearch").innerHTML=this.responseText;
						}
					}
					xmlhttp.open("GET","../search.php?q="+str,true);
					xmlhttp.send();
				}
			</script>
			<form action="../">
				<input type="text" name="q" onkeyup="showResult(this.value)" placeholder="NHẬP ÍT NHẤT 3 KÍ TỰ" style="background-color: transparent; border: none; border-bottom: 2px solid black; height: 50px; font-size: 40px; margin-left: 50px">
			</form>
		</div>
		<div id="livesearch"></div>