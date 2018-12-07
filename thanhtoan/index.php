<?php session_start(); 
include '../template.php';
?>
		<div id="body">
			<div>
				<div align="center">
					<h1 id="header">- Thanh toán -</h1>
					<?php
						if(isset($_GET['id']) && isset($_SESSION['idKH']))
						{
							$id = $_GET['id'];
							$maKH = $_SESSION['idKH'];
							include '../connectDB.php';
							mysqli_set_charset($con,'utf8');
							$result = mysqli_query($con, "select * from sanpham where maSP=$id");
							$sp = mysqli_fetch_array($result);
							$maSP = $sp['maSP'];
							$gia = $sp['gia'];
							$tenSP = $sp['tenSP'];
							?>
								Tên KH: <?php echo $_SESSION['nameKH']?>
								<br>
								Game: <?php echo $tenSP; ?>
								<br>
								Giá: <?php echo $gia ?>
								<br>
							<?php
								//mysqli_query($con,"insert into hoadon(maTK,maSP,gia,soluong,tongTien,tinhTrang) values($maKH, $maSP, $gia,1,$gia, 1)");
								//header("location: ../project");
							mysqli_close($con);
						}
					?>
					<script type="text/javascript">
						function go()
						{
							window.location.href="../buyNOW.php?id=<?php echo $sp['maSP'] ?>";
						}
					</script>
					<input type="button" name="" class="btn btn-lg btn-success" value="Thanh toán" onclick="go()">
				</div>
			</div>
		</div>
		<div id="footer">
			Lương Minh Đức - Vũ Văn Toàn
		</div>
	</div>
</body>
</html>