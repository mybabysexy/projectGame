<?php session_start(); 
include '../template.php';
?>
		<?php 
			if(isset($_SESSION['nameKH'])) header("location: index.php");
		?>
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