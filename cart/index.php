<?php session_start();
include '../template.php';
?>
<div id="body">
	<div>
		<div align="center">
			<h1 id="header" style="margin: 50px">- Giỏ hàng -</h1>
			<?php
			if(count($_SESSION['cartItem']) > 0)
			{
			?>
			<form action="updateCart.php">
				<div style="width: 50%">
					<table cellspacing="0" class="table" align="center">
						<tr>
							<td width="50px" align="center">STT</td>
							<td width="200px" align="center">Tên sản phẩm</td>
							<td width="110px" align="center">SL</td>
							<td width="100px" align="center">Giá</td>
							<td width="50px" align="center">Xoá</td>
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
								<input type="tel" id="SL<?php echo $i;?>" name="<?php echo $SP['maSP'] ?>" onkeyup="price<?php echo $i;?>()" style="text-align: center;" size="1" value="<?php echo $value;?>">
							</td>
							<td align="center" id="gia<?php echo $i;?>" style="vertical-align: middle;"><?php echo $SP['gia']*$value;?></td>
							<td align="center" style="vertical-align: middle;"><a href="../delSP.php?id=<?php echo $SP['maSP'] ?>" class="btn btn-danger">DELETE</a></td>
							<script type="text/javascript">
							function price<?php echo $i;?>()
							{
							var gia = <?php echo $SP['gia'] ?>;
							document.getElementById("gia<?php echo $i;?>").innerHTML = parseInt(document.getElementById("SL<?php echo $i;?>").value) * gia;
							}
							</script>
						</tr>
						<?php
							$sumSL += $value;
							$sumPrice += $SP['gia']*$value;
						}
						?>
						<tr>
							<td colspan="2" align="center" style="vertical-align: middle;font-weight: bold">
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
							<td></td>
						</tr>
					</table>
					<input type="submit" class="btn btn-lg btn-primary" value="Cập nhật">
					<script type="text/javascript">
						function buy()
						{
					<?php
					if(isset($_SESSION['nameKH']))
					{
					?>
					if(confirm("Chắc chắn chứ?")) window.location.href = "../thanhtoan/";
					<?php
					}
					else
					{
					?>
					alert("Hiện tại hệ thống chưa hỗ trợ thanh toán vãng lai, hãy đăng nhập để sử dụng chức năng này");
					<?php
					}
					?>
					}
					</script>
					<input type="button" class="btn btn-lg btn-success" value="Xác nhận" onclick="buy()" id="thanhtoanbtn">
				</div>
			</form>
			<?php
			}
			else
			{
			?>
			<span style="font-size: 20px">Chưa có sản phẩm</span>
			<?php
			}
			?>
		</div>
	</div>
</div>
<div id="footer">
	Lương Minh Đức - Vũ Văn Toàn
</div>
</div>
</body>
</html>