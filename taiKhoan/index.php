<?php session_start(); 
include '../template.php';
?>
<script type="text/javascript">
		setTimeout(function(){document.getElementById('notifyTK').style.opacity = 0;}, 3000);
		setTimeout(function(){document.getElementById('notifyTK').style.display = 'none';}, 4000);
</script>
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