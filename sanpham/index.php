<?php 
	session_start();
	include '../template.php';
?>
	<div class="container">
		<?php 
			$maSP = $_GET['id'];
			$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,soLuong,maAnh,moTa,cauHinh from (select maSP,tenSP,gia,maAnh,maTheLoai,soLuong,nsx.tenNSX as NSX,moTa,cauHinh from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where maSP = $maSP";
			$result = mysqli_query($con, $sql);
			while ($sp = mysqli_fetch_array($result)) {
				?>
					<center>
						<div style="margin-top: 20px">
							<script type="text/javascript">
								function add<?php echo $sp['maSP'] ?>tocart()
								{
									//alert("Thêm thành công");
									var sl = parseInt(document.getElementById("sl").value);
									if (isNaN(sl)) { 
										document.getElementById("sl").value = '1';
									}
									if (window.XMLHttpRequest) {
										// code for IE7+, Firefox, Chrome, Opera, Safari
										xmlhttp=new XMLHttpRequest();
									}
									else {
										// code for IE6, IE5
										xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
									}
									xmlhttp.onreadystatechange=function() {
										if (this.readyState==4 && this.status==200) {
											document.getElementById("cartButton").innerHTML=this.responseText;
										}
									}
									xmlhttp.open("GET","../addtocart.php?id="+<?php echo $sp['maSP'] ?>+"&sl="+sl);
									xmlhttp.send();
								}
								function go<?php echo $sp['maSP'] ?>()
								{
									window.location.href="../addtocart.php?id=<?php echo $sp['maSP'] ?>&fwd";
								}
								$(function(){
									$('#sl').blur(function(){
										if($('#sl').val().length == 0)
										{
											$('#sl').val(1);
										}
										else if($('#sl').val() > parseInt($('#soLuong').text()))
										{
											alert("Chỉ còn "+ parseInt($('#soLuong').text()) +" mã game thôi bạn!");
											$('#sl').val(parseInt($('#soLuong').text()));
											$('#cartBtn').attr("onclick","");
											add<?php echo $sp['maSP'] ?>tocart();
										}										
									})
								})
							</script>
							<div class="col-md-6">
								<img src="<?php echo $sp["maAnh"]; ?>" style="width: 420px">							
							</div>
							<div class="col-md-6">
								<h1 style="margin: 20px">
									<?php echo $sp['tenSP']; ?>
								</h1>
								<h4 style="margin-bottom: 12px">
									Thể loại: <?php echo $sp["theLoai"] ?> - Từ: <?php echo $sp["NSX"] ?>
								</h4>
								<h4>
									Giá: <span class="spPrice"> <?php if($sp["soLuong"] != 0) echo $sp["gia"]; else echo "Hết hàng" ?> </span>
								</h4>
									Số lượng: <input type="text" id="sl" style="width: 50px; text-align: center; display: inline-block; margin-bottom: 10px" class="form-control" value="1">
									 - Còn: <span id="soLuong"><strong><?php echo $sp['soLuong'] ?></strong></span> mã trong kho
								<br>
								<?php 
									if($sp["soLuong"] != 0)
									{
										?>
											<input type="button" class="btn btn-success" value="Thuê ngay" onclick="go<?php echo $sp['maSP'] ?>()">
											<input type="button" id="cartBtn" class="btn btn-primary" value="Thêm vào giỏ hàng" onclick="add<?php echo $sp['maSP'] ?>tocart()">
											<input type="button" class="btn btn-warning" value="Mua Ngay" onclick="go<?php echo $sp['maSP'] ?>()">
										<?php
									}
									else
									{
										?>
											<input type="button" class="btn btn-success disabled" value="Thuê ngay">
											<input type="button" class="btn btn-primary disabled" value="Thêm vào giỏ hàng">
											<input type="button" class="btn btn-warning disabled" value="Mua Ngay">
										<?
									}
								?>
							</div>
						</div>

						<div class="col-md-12" style="margin: 40px 0 10px 0; background-color: hotpink; height: 50px; padding: 10px; font-weight: bold; color: white; font-size: 16pt">
							<center>
								THÔNG TIN GAME
							</center>
						</div>

						<div class="col-md-12" style="text-align: justify; font-size: 13pt">
							<?php echo $sp['moTa']; ?>
						</div>

						<div class="col-md-12" style="margin: 40px 0 10px 0; background-color: hotpink; height: 50px; padding: 10px; font-weight: bold; color: white; font-size: 16pt">
							<center>
								CẤU HÌNH
							</center>
						</div>

						<div class="col-md-12" style="text-align: justify; font-size: 13pt">
							<?php echo $sp['cauHinh']; ?>
						</div>
					</center>
				<?php
			}
		?>		
	</div>
	<div id="footer" class="col-lg-12">
			Lương Minh Đức - Vũ Văn Toàn
	</div>
</body>
</html>