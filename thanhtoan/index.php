<?php session_start();
include '../template.php';
?>
<div id="body">
	<div>
		<div align="center">
			<h1 id="header" style="margin: 50px">- Thanh toán -</h1>
			<form id="form">
				<table cellspacing="0" class="table" align="center" style="width: 600px">
					<tr>
						<td width="50px" align="center">STT</td>
						<td width="300px" align="center">Tên sản phẩm</td>
						<td width="100px" align="center">SL</td>
						<td width="100px" align="center">Giá</td>
					</tr>
					<?php
						$i = 0;
						$sumSL = 0;
						$sumPrice = 0;
						foreach ($_SESSION['cartItem'] as $key => $value) {
							$back = mysqli_query($con, "Select * from sanpham where maSP = $key");
							$SP = mysqli_fetch_array($back);
					?>
					<tr>
						<td align="center" style="vertical-align: middle;"><?php echo ++$i ?></td>
						<td align="center" style="vertical-align: middle;"><?php echo $SP['tenSP'];?></td>
						<td align="center" style="vertical-align: middle;">
							<span name="<?php echo $SP['maSP'] ?>" style="text-align: center;"><?php echo $value;?></span>
						</td>
						<td align="center" id="gia<?php echo $i;?>" style="vertical-align: middle;"><?php echo $SP['gia']*$value;?></td>
					</tr>
					<?php
						$sumSL += $value;
						$sumPrice += $SP['gia']*$value;
					}
					?>
					<tr>
						<td colspan="2" align="center" style="vertical-align: middle; font-weight: bold">
							Tong
						</td>
						<td align="center" style="vertical-align: middle;font-weight: bold">
							<span id="sumSL"></span>
							<script type="text/javascript">
							var sl = <?php echo $sumSL ?>;
							document.getElementById("sumSL").innerHTML = sl;
							</script>
						</td>
						<td align="center" style="vertical-align: middle;font-weight: bold">
							<span id="sumPrice" name="sumPrice"></span>
							<script type="text/javascript">
							var pr = <?php echo $sumPrice ?>;
							document.getElementById("sumPrice").innerHTML = pr;
							</script>
						</td>
					</tr>
				</table>

			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
				<div class="modal-dialog" role="document">
					
					<div class="modal-content">
						<div class="modal-header">
							<h4 class="modal-title" id="myModalLabel">Thuê game</h4>
						</div>
						<div class="modal-body">
							<table class="table" style="width: 100%;">
								<tr>
									<td align="center" style="width: 50%">
										<select class="form-control" style="width: 150px" id="timeRent" name="rentTime">
											<option value="1">1 giờ</option>
											<option value="2">2 giờ</option>
											<option value="3">3 giờ</option>
											<option value="4">4 giờ</option>
											<option value="5">5 giờ</option>
											<option value="6">6 giờ</option>
											<option value="12">12 giờ</option>
											<option value="24">1 ngày</option>
											<option value="36">1.5 ngày</option>
											<option value="48">2 ngày</option>
											<option value="72">3 ngày</option>
											<option value="2376">1 tuần</option>
										</select>
									</td>
									<td align="center" style="width: 50%">
										<label>Giá: </label>
										<span id="priceRent">3000</span>d/ tài khoản
										<script type="text/javascript">
											$(function() {
												$('#timeRent').change(function() {
													if ($('#timeRent').val() < 4) {
														var giaRent = 
														<?php
															$result = mysqli_query($con,"select * from giaThue where loaiGia = 1 order by loaiGia");
															$giaRent = mysqli_fetch_array($result);
															echo $giaRent['gia'];
														?>;
													}
													else if ($('#timeRent').val() < 12) {
														var giaRent = 
														<?php
															$result = mysqli_query($con,"select * from giaThue where loaiGia = 2 order by loaiGia");
															$giaRent = mysqli_fetch_array($result);
															echo $giaRent['gia'];
														?>;
													}
													else if ($('#timeRent').val() < 48) {
														var giaRent = 
														<?php
															$result = mysqli_query($con,"select * from giaThue where loaiGia = 3 order by loaiGia");
															$giaRent = mysqli_fetch_array($result);
															echo $giaRent['gia'];
														?>;
													}
													else{
														var giaRent = 
														<?php
															$result = mysqli_query($con,"select * from giaThue where loaiGia = 4 order by loaiGia");
															$giaRent = mysqli_fetch_array($result);
															echo $giaRent['gia'];
														?>;
													}
													var price = $('#timeRent').val() * giaRent;
													$('#priceRent').text(price);
												});
											})
										</script>
									</td>
								</tr>
								
							</table>
							
						</div>
						<div class="modal-footer">
							<input type="submit" formaction="rent.php" class="btn btn-primary" name="" value="Thuê game">
							<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>

			<a href="../cart/" class="btn btn-info btn-lg">Trở về</a>

			<button type="button" class="btn btn-warning btn-lg" data-toggle="modal" data-target="#myModal">
				Thuê game
			</button>

			<script type="text/javascript">
				function buy()
				{
					$(function() {
						if (confirm("Sure?")) {
							$("#submit").attr("type","submit");
						}
					})
				}
			</script>

			<input type="button" id="submit" formaction="buy.php" class="btn btn-lg btn-success" value="Mua game" onclick="buy()">
			</form>
		</div>
	</div>
</div>
<div id="footer">
	Lương Minh Đức - Vũ Văn Toàn
</div>
</div>
</body>
</html>