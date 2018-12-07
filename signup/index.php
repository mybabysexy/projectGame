<?php session_start(); 
include '../template.php';
?>
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
								<td><input type="text" id="username" name="username" class="input" onblur="signup()"></td>
								<td class="err"><span id="errUsername"></span></td>
							</tr>
							<tr>
								<td width="150px">Mật khẩu</td>
								<td><input type="password" id="password" name="password" class="input" onblur="signup()"></td>
								<td class="err"><span id="errPassword"></span></td>
							</tr>
							<tr>
								<td width="150px">Nhập lại mật khẩu</td>
								<td><input type="password" id="repassword" name="repassword" class="input" onblur="signup()"></td>
								<td class="err"><span id="errRepassword"></span></td>
							</tr>
							<tr>
								<td width="150px">Họ và tên</td>
								<td><input type="text" id="nameKH" name="nameKH" class="input" onblur="signup()"></td>
								<td class="err"><span id="err"></span></td>
							</tr>
							<tr>
								<td width="150px">Email</td>
								<td><input type="text" id="email" name="email" class="input" onblur="signup()"></td>
								<td class="err"><span id="errEmail"></span></td>
							</tr>
							<tr>
								<td width="150px">Số điện thoại</td>
								<td><input type="tel" id="sdt" name="sdt" class="input" onblur="signup()"></td>
								<td class="err"><span id="errSDT"></span></td>
							</tr>
							<th colspan="3">
								<input type="button" id="loginButton" onclick="signup()" value="Đăng ký" style="width: 120px; height: 50px; background-color: blue; font-size: 18px; color: white; border: 0; cursor: pointer">
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