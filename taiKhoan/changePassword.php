<?php session_start(); 
include '../template.php';
?>
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
									<input type="button" class="btn btn-lg btn-success" id="loginButton" value="Hoàn tất" onclick="changePass()">
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