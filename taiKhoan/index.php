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
									<?php
								}
								if($_GET['c'] == 1)
								{
									?>
										<div class="alert alert-info">
										    <strong>Thành công!</strong> Mật khẩu đã được thay đổi
										</div>
									<?php
								}
								if($_GET['c'] == 2)
								{
									?>
										<div class="alert alert-info">
										    <strong>Thành công!</strong> Thông tin đã được thay đổi
										</div>
									<?php
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
					<!-- <a href="#" class="btn btn-lg btn-info">Lịch sử giao dịch</a> -->
						<!-- Button trigger modal -->
						<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">
						Lịch sử giao dịch
						</button>
				</div>
			</div>
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h4 class="modal-title" id="myModalLabel">Lịch sử giao dịch</h4>
							</div>
							<div class="modal-body">
								<table class="table">
									<tr>
										<th width="60px">Ma HD</th>
										<th width="100px">Ngay dat hang</th>
										<th width="90px">Tong tien</th>
										<th width="80px">Tinh Trang</th>
										<th width="70px"></th>
									</tr>
									<?php 
										$result = mysqli_query($con, "SELECT `maDonHang`, `ngaydathang`, `tongTien`, `tinhTrang`,loaiGiaoDich FROM `hoadon` where maTK = $idKH");
										while($DH = mysqli_fetch_array($result))
										{
											?>
											<script type="text/javascript">
												function go<?php echo $DH["maDonHang"] ?>()
												{

													window.open('details.php?id=<?php echo $DH["maDonHang"] ?>', 'example', 'width=800,height=400');
												}
											</script>
											<tr>
												<td  style="vertical-align: middle;">
													<?php echo $DH["maDonHang"] ?>
												</td>
												<td  style="vertical-align: middle;">
													<?php echo $DH["ngaydathang"] ?>
												</td>
												<td  style="vertical-align: middle;">
													<?php echo $DH["tongTien"] ?>
												</td>
												<td  style="vertical-align: middle;">
													<?php
														if($DH["tinhTrang"] == 0) echo "Chưa duyệt";
														else if($DH["tinhTrang"] == 1 && $DH["loaiGiaoDich"] == 0) echo "<b>Đã duyệt</b>";
														else if($DH["tinhTrang"] == 1 && $DH["loaiGiaoDich"] == 1) echo "<b><i>Đang thuê</i></b>";
														else if($DH["tinhTrang"] == 2) echo "Đã hủy";
														else if($DH["tinhTrang"] == 3) echo "Thuê xong"?>
												</td>
												<td  style="vertical-align: middle;">
													<input type="button" class="btn btn-primary" value="Chi tiet" onclick="go<?php echo $DH["maDonHang"] ?>()">
												</td>
											</tr>
											<?php
										}
									?>
								</table>
							</div>
							<div class="modal-footer">
								<button type="button" id="closeModal" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>
		</div>
		<div id="footer" style="position: fixed;bottom: 0">
			@ 2020 - Bản quyền của ACC GAMING
		</div>
	</div>
	<?php mysqli_close($con) ?>
</body>
</html>