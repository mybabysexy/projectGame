<?php session_start(); 
include 'template.php';
?>
	<div id="banner" align="center">
			<!-- <img src="banner.png" height="600px" width="1915px"> -->
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 600px">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				<li data-target="#carousel-example-generic" data-slide-to="2"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox" style="height: 600px">
					<div class="item active">
						<img src="banner.png"  style="height: 600px">
					</div>
					<div class="item">
						<img src="banner.png"  style="height: 600px">
					</div>
				</div>

				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>
		</div>
		<div id="body">
			<div>
				<div align="center">
					<h1 id="header">- Tất cả game -</h1>
				</div>
				<div id="listGame">
					<div style="margin: 5px;" class="container">
					<?php
						$demRow = 0;
						$sp1dong = 3;
						$sp1page = 6;
						$left = -10;

						$sqlSoSP = mysqli_query($con, "select * from sanpham");
						$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);

						$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit 0,$sp1page";

						if(isset($_GET['page']))
						{
							$start = ($_GET['page']-1) * $sp1page;
							if($_GET['page'] == 1) $start = 0;
							$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit $start,$sp1page";
						}

						if(isset($_GET['q']))
						{
							$q = $_GET['q'];
							$demPage = 1;
							$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai WHERE tenSP like '%$q%'";
							?>
							<script type="text/javascript">
								document.getElementById('banner').style.display="none";
								document.getElementById('header').innerHTML="- Kết quả tìm kiếm -";
							</script>
							<?php
						}

						$result = mysqli_query($con, $sql);

						while($sp = mysqli_fetch_array($result)) { 
							?>
								<div style="width: 370px; height: 363px; margin: 5px" class="col-lg-4 col-md-6 col-sm-6">
									<div style="width: 370px; height: 208px;">
										<a href="sanpham/index.php?id=<?php echo $sp['maSP'] ?>">
											<img src="<?php echo $sp["maAnh"]; ?>" style="width: 370px">
										</a>
									</div>
									<div style="width: 370px; height: 155px; background-color: #E6E6E6; position: absolute; text-align: center;">
										<p class="spName">
											<a href="#" style="text-decoration: none;"><?php echo $sp["tenSP"] ?></a>
										</p>
										<p style="margin: 5px 0px; font-size: 16px">
											Thể loại: <?php echo $sp["theLoai"] ?> - Từ: <?php echo $sp["NSX"] ?>
										</p>
										<p style="margin: 5px 0px">Giá: <span class="spPrice"><?php echo $sp["gia"] ?></span></p>
										<div style="margin: 8px">
											<script type="text/javascript">
												function add<?php echo $sp['maSP'] ?>tocart()
												{
													window.location.href="addtocart.php?id=<?php echo $sp['maSP'] ?>";
													alert("Thêm thành công");
												}
												function buy<?php echo $sp['maSP'] ?>()
												{
													<?php
													if(isset($_SESSION['nameKH']))
													{
														?>
															// if(confirm("Chắc chắn chứ?")) window.location.href="buy.php?id=<?php echo $sp['maSP'] ?>";
															if(confirm("Chắc chắn chứ?")) window.location.href="./checkout/?id=<?php echo $sp['maSP'] ?>";
														<?php
													}
													else
													{
														?>
															alert("Hãy đăng nhập để sử dụng chức năng này");
														<?php
													}
													?>
												}
											</script>
											<input type="button" class="btn btn-success" value="Thuê game">
											<input type="button" class="btn btn-primary" value="Thêm vào giỏ hàng" onclick="add<?php echo $sp['maSP'] ?>tocart()">
											<input type="button" class="btn btn-warning" value="Mua Ngay" onclick="buy<?php echo $sp['maSP'] ?>()">
										</div>
									</div>
								</div>
							<?php
							}
						?>
					</div>
				<div style="display: flex; justify-content: center;align-items: center; margin: 10px">
					<nav aria-label="...">
						<ul class="pagination pagination-lg">
							<li class="page-item" id="pgPrev">
							  <a class="page-link" href="?page=<?php echo $_GET['page']-1 ?>" tabindex="-1"><</a>
							</li>
								<?php
									for ($i=1; $i <= $demPage; $i++) { 
								    	?>
									    <li class="page-item" id="pg<?php echo $i ?>">
									    	<a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a>
									    </li>
									    <?php
								    }
								    if (isset($_GET['page'])) {
								    	$currentPage = $_GET['page'];
										?>
											<script type="text/javascript">
												document.getElementById('pg<?php echo $currentPage ?>').className = "page-item active";
											</script>
										<?php
									}
									else $currentPage = 1;
									?>
											<script type="text/javascript">
												document.getElementById('pg<?php echo $currentPage ?>').className = "page-item active";
											</script>
									<?php
								?>
							<li class="page-item" id="pgNext">
							  <a class="page-link" href="?page=<?php echo $currentPage+1 ?>">></a>
							</li>
						</ul>
					</nav>
				</div>		
		<?php 
			if (isset($currentPage)) {
				if($currentPage == 3)
				{
					?>
						<script type="text/javascript">
							document.getElementById('pgNext').className = "page-item disabled";
						</script>
					<?php
				}
				if($currentPage == 1)
				{
					?>
						<script type="text/javascript">
							document.getElementById('pgPrev').className = "page-item disabled";
						</script>
					<?php
				}
			}
		?>
	</div>
		</div>
		<div id="footer" class="col-lg-12">
			Lương Minh Đức - Vũ Văn Toàn
		</div>
		<?php mysqli_close($con); ?>
	</div>
</body>
</html>