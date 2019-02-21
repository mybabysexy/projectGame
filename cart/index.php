<?php session_start();
include '../template.php';
?>
<div id="body" onload="checkCart()">
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
								<input type="tel" id="SL<?php echo $i;?>" name="<?php echo $SP['maSP'] ?>" onkeyup="price<?php echo $i;?>()" style="text-align: center; width: 50px" value="<?php echo $value;?>" class="form-control">
								<input type="text" style="display: none;" id="SLT<?php echo $i;?>" value="<?php echo $SP['soLuong'];?>">
							</td>
							<td align="center" id="gia<?php echo $i;?>" style="vertical-align: middle;">
								<?php echo addDot($SP['gia']*$value);?>
								</td>
							<td align="center" style="vertical-align: middle;"><a href="../delSP.php?id=<?php echo $SP['maSP'] ?>" class="btn btn-danger">DELETE</a></td>
							<script type="text/javascript">
								$(function(){
									$('#SL<?php echo $i;?>').blur(function(){
										if($('#SL<?php echo $i;?>').val().length == 0 || $('#SL<?php echo $i;?>').val() <= 0)
										{
											$('#SL<?php echo $i;?>').val(1);
											price<?php echo $i;?>();
										}
										else if($('#SL<?php echo $i;?>').val() > 5)
										{
											alert("Chỉ được phép đặt 5 game thôi bạn!");
											$('#SL<?php echo $i;?>').val(5);
											price<?php echo $i;?>();
										}
									})
								})
							function price<?php echo $i;?>()
							{
								var maSP = <?php echo $SP['maSP'] ?>;
								var gia = <?php echo $SP['gia'] ?>;
								document.getElementById("sumTR").innerHTML = "";
								var sl = parseInt(document.getElementById("SL<?php echo $i;?>").value);
								document.getElementById("gia<?php echo $i;?>").innerHTML = sl * gia;

								if (isNaN(sl)) { 
									document.getElementById("SL<?php echo $i;?>").value = '1';
									var sl = parseInt(document.getElementById("SL<?php echo $i;?>").value);
									document.getElementById("gia<?php echo $i;?>").innerHTML = sl * gia;
									price<?php echo $i;?>();
								}
								if (window.XMLHttpRequest) {
									// code for IE7+, Firefox, Chrome, Opera, Safari
									xmlhttp=new XMLHttpRequest();
								}
								else
								{  // code for IE6, IE5
									xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
								}
								xmlhttp.onreadystatechange=function() {
									if (this.readyState==4 && this.status==200) {

										document.getElementById("sumTR").innerHTML=this.responseText;
									}
								}
								xmlhttp.open("GET","updateCart.php?"+maSP+"="+sl+"&req");
								xmlhttp.send();
							}
							</script>
						</tr>
						<?php
							$sumSL += $value;
							$sumPrice += $SP['gia']*$value;
						}
						?>
						<tr id="sumTR">
							<td colspan='2' align='center' style='vertical-align: middle;font-weight: bold'>
								Tổng
							</td>
							<td align='center' style='vertical-align: middle;font-weight: bold'>
								<span id='sumSL'></span>
								<script type='text/javascript'>
								var sl = <?php echo $sumSL ?>;
								document.getElementById('sumSL').innerHTML = sl;
								</script>
							</td>
							<td align='center' style='vertical-align: middle;font-weight: bold'>
								<span id='sumPrice' name='sumPrice'></span>
								<script type='text/javascript'>
								var pr = <?php echo $sumPrice ?>;
								document.getElementById('sumPrice').innerHTML = pr;
								</script>
							</td>
							<td></td>
						</tr>
					</table>
					<input type="submit" id="submitBtn" style="display: none" class="btn btn-lg btn-primary" value="Cập nhật">
					<script type="text/javascript">
						function buy()
						{
							<?php
								if(isset($_SESSION['nameKH']))
								{
									?>
										//if(confirm("Chắc chắn chứ?")) window.location.href = "../thanhtoan/";
										$(function(){
											var checkCart = 0;
											for(var i = 1;;i++)
											{
												if ($('#SL'+i).val() == undefined) {
													console.log(i+" Err");
													break;
												}
												else if($('#SL'+i).val().length == 0)
												{
													$('#SL'+i).val(1);
												}
												else if($('#SL'+i).val() > $('#SLT'+i).val())
												{
													$('#SL'+i).val($('#SLT'+i).val());
													console.log(i+" Fixed");
													checkCart = 1;
												}
												console.log(i+" Next");
											}
											$('#submitBtn').click();

											if (checkCart == 0) {
												if(confirm("Chắc chắn chứ?")) window.location.href = "../thanhtoan/";
											}
										})
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
<?php 
    function addDot($strNum) {
        $len = strlen($strNum);
        $chia000 = 3;
        $ketqua = "";
        while ($len - $chia000 >= 0)
        {
            $cutString = substr($strNum, $len - $chia000 , 3);
            $ketqua = ','.$cutString.$ketqua;
            $chia000+= 3;
        }
        $cutString = substr($strNum, 0 , 3 - ($chia000 - $len) );
        $ketqua = $cutString.$ketqua;
        if(substr($ketqua,0,1)==','){
            $ketqua=substr($ketqua,1,$len+2);   
        }
        return $ketqua;
	}
?>
<div id="footer" style="position: fixed;bottom: 0">
	Lương Minh Đức - Vũ Văn Toàn
</div>
</div>
<script type="text/javascript">
	$(function(){
		var click = 0;
		for(var i = 1;;i++)
		{
			if ($('#SL'+i).val() == undefined) {
				console.log(i+" Err");
				break;
			}
			else if($('#SL'+i).val().length == 0 || parseInt($('#SL'+i).val()) <= 0 )
			{
				$('#SL'+i).val(1);
			}
			else if(parseInt($('#SL'+i).val()) > parseInt($('#SLT'+i).val()))
			{
				$('#SL'+i).val(5);
				console.log(i+" Fixed");
				click = 1;
			}
			console.log(i+" Next");
		}
		console.log("Out");
		if(click != 0) $('#submitBtn').click();
	})
</script>
</body>
</html>