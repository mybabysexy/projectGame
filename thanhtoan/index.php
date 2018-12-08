<?php session_start();
include '../template.php';
?>
<div id="body">
	<div>
		<div align="center">
			<h1 id="header" style="margin: 50px">- Thanh toán -</h1>
			<form action="../buy.php">
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
			<input type="submit" class="btn btn-lg btn-success" value="Thanh toán">
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