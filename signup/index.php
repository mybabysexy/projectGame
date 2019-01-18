<?php session_start();
include '../template.php';
?>
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
								    <strong>Oops!</strong> Tên tài khoản / SDT hoặc email đã được sử dụng
								</div>
							<?php
						}
				}
				?>
			</div>
		</div>

		<div align="center">
			<h1 id="header" style="margin: 50px">- Đăng ký tài khoản -</h1>
		</div>
		<form action="../signup/dangky.php" method="POST" class="form-group">
			<div align="center">
				<table cellspacing="0" cellpadding="10px">
					<tr style="height: 60px; vertical-align: top">
						<td width="150px">
							<label>Tên đăng nhập</label>
						</td>
						<td>
							<input type="text" id="username" name="username" class="form-control" onblur="signup()">
							<span class="err" id="errUsername"></span>
						</td>
					</tr>
					<tr style="height: 60px; vertical-align: top">
						<td width="150px">
							<label>Mật khẩu</label>
						</td>
						<td>
							<input type="password" id="password" name="password" class="form-control" onblur="signup()">
							<span class="err" id="errPassword"></span>
						</td>
					</tr>
					<tr style="height: 60px; vertical-align: top">
						<td width="150px">
							<label>Nhập lại mật khẩu</label>
						</td>
						<td>
							<input type="password" id="repassword" name="repassword" class="form-control" onblur="signup()">
							<span class="err" id="errRepassword"></span>
						</td>
					</tr>
					<tr style="height: 60px; vertical-align: top">
						<td width="150px">
							<label>Họ và tên</label>
						</td>
						<td>
							<input type="text" id="nameKH" name="nameKH" class="form-control" onblur="signup()">
							<span class="err" id="errnameKH"></span>
						</td>
					</tr>
					<tr style="height: 60px; vertical-align: top">
						<td width="150px">
							<label>Email</label>
						</td>
						<td>
							<input type="text" id="email" name="email" class="form-control" onblur="signup()">
							<span class="err" id="errEmail"></span>
						</td>
					</tr>
					<tr style="height: 60px; vertical-align: top">
						<td width="150px">
							<label>Số điện thoại</label>
						</td>
						<td>
							<input type="tel" id="sdt" name="sdt" class="form-control" onblur="signup()">
							<span class="err" id="errSDT"></span>
						</td>
					</tr>
					<tr>
						<td colspan="2" align="center">
							<input type="button" id="loginButton" onclick="signup()" value="Đăng ký" class="btn btn-lg btn-primary" style="margin-bottom: 50px">
						</td>
					</tr>
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