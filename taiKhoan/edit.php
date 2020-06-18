<?php session_start(); 
include '../template.php';
?>
		<div id="body">
			<div>
				<div align="center">
					<h1 id="header" style="margin: 50px">- Thông tin tài khoản -</h1>
					<div style="width: 400px">
						<?php 
							$idKH = $_SESSION['idKH'];
							$result = mysqli_query($con, "select * from tkuser where maTK = '$idKH'");
							while ($USER = mysqli_fetch_array($result)) {
								?>
								<form class="form-group" action="capnhatTK.php" method="POST">
									<table class="table">
										<tr>
											<td width="200px">Name</td>
											<td width="300px">
												<input type="text" name="nameKH" class="form-control" value="<?php echo $_SESSION['nameKH']?>">	
											</td>
										</tr>
										<tr>
											<td width="200px">SDT</td>
											<td width="300px">
												<input type="text" name="sdt" class="form-control" value="<?php echo $USER['sdt']?>">	
											</td>
										</tr>
										<tr>
											<td width="200px">Email</td>
											<td>
												<input type="text" name="email" class="form-control" value="<?php echo $USER['email']?>">
											</td>
										</tr>
									</table>
									<a href="../taiKhoan" class="btn btn-lg btn-danger">Hủy</a>
									<input type="submit" class="btn btn-lg btn-success" value="Hoàn tất">
								</form>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			@ 2020 - Bản quyền của ACC GAMING
		</div>
	</div>
	<?php mysqli_close($con) ?>
</body>
</html>