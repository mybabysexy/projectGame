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
		#main {transform: translate(0, 50%);}

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
		if(isset($_SESSION['nameAD'])) header("location: home.php");
	?>
	<div id="main">
		<div id="body" class="container">
			<div>
				<div align="center" style="margin: 50px">
					<h1 id="header">- Đăng nhập -</h1>
				</div>
				<form action="dangnhap.php" method="POST" class="form-group">
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
						<div align="center" style="margin: 10px; margin-top: 20px;">
							<input type="button" id="loginButton" onclick="login()" value="Đăng nhập" class="btn btn-primary btn-lg">
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>