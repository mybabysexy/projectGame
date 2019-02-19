<?php session_start(); 
include 'template.php';
?>
	<div id="banner" align="center">
			<!-- <img src="banner.png" height="600px" width="1915px"> -->
			<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="height: 300px">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				<li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-example-generic" data-slide-to="1"></li>
				</ol>
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox" style="height: 300px">
					<div class="item active">
						<img src="banner2.png"  style="height: 300px">
					</div>
					<div class="item">
						<img src="banner.png"  style="height: 300px">
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
				<div align="center" style="margin: 5px">
					<form class="form-group">
						<?php 
							$demRow = 0;
							$sp1dong = 3;
							$sp1page = 6;
							$left = -10;

							$sqlSoSP = mysqli_query($con, "select * from sanpham");
							$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);

							$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,soLuong,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,soLuong,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit 0,$sp1page";

							if(isset($_GET['page']))
							{
								$page = $_GET['page'];
								if ($page > $demPage) {
									?>
									<script type="text/javascript">
										window.location.href="../?page=<?php echo $demPage ?>"
									</script>
									<?php
								}
								else if ($page < 1) {
									?>
									<script type="text/javascript">
										window.location.href="../?page=1"
									</script>
									<?php
								}
								else
								{
									$start = ($_GET['page']-1) * $sp1page;
									if($_GET['page'] == 1) $start = 0;
									$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,soLuong,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,soLuong,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit $start,$sp1page";
								}
							}

							if(isset($_GET['theLoai']))
							{
								// $sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit $start,$sp1page";
							}

							if(isset($_GET['priceRange']))
							{
								$priceRange = $_GET['priceRange'];
								if($priceRange == '-1')
								{
									
								}
								if($priceRange == '100')
								{
									$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where gia < 100000";
								}
								if($priceRange == '200')
								{
									$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where gia >= 100000 and gia < 200000";
								}
								if($priceRange == '500')
								{
									$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where gia >= 200000 and gia < 500000";
								}
								if($priceRange == '1000')
								{
									$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where gia >= 500000";
								}
								$sqlSoSP = mysqli_query($con, $sql);
								$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);
							}

							if( !empty($_GET['startPrice']) && !empty($_GET['endPrice']) )
							{
								if(empty($_GET['startPrice'])) {
									$startPrice = 0;
									$endPrice = $_GET['endPrice'];
								}
								else if(empty($_GET['endPrice'])) {
									$endPrice = 99999999999;
									$startPrice = $_GET['startPrice'];
								}
								else
								{
									$startPrice = $_GET['startPrice'];
									$endPrice = $_GET['endPrice'];
								}
								$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where gia >= $startPrice and gia <= $endPrice";
								$sqlSoSP = mysqli_query($con, $sql);
								$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);
							}

							if(isset($_GET['q']))
							{
								$q = $_GET['q'];
								$demPage = 1;
								$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong from (select maSP,tenSP,gia,maAnh,maTheLoai,soLuong,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai WHERE tenSP like '%$q%'";
								?>
								<script type="text/javascript">
									document.getElementById('banner').style.display="none";
									document.getElementById('header').innerHTML="- Kết quả tìm kiếm -";
								</script>
								<?php
							}
						?>
						<!-- <table class="table" style="width: 800px">
							<tr>
								<td width="410px">
									<script type="text/javascript">
										function priceRangee()
										{
											if(document.getElementById('priceRange').selectedIndex == 5)
											{
												alert('change');
											}
											else
											{
												document.getElementById('startPrice').value = '';
												document.getElementById('endPrice').value = '';
											}
											document.getElementById('priceSM').click();
										}
										function changeToCustom()
										{
											document.getElementById('priceRange').options[5].selected = "selected";
										}
									</script>
									Gia
									<select class="form-control" id="priceRange" name="priceRange" onchange="priceRangee()" style="width: 180px; display: inline-block">
										<option value="-1">All</option>
										<option value="100" <?php if( isset($_GET['priceRange']) ) if( $_GET['priceRange'] == 100 ) echo "selected"; ?> >Under 100.000d</option>
										<option value="200" <?php if( isset($_GET['priceRange']) ) if( $_GET['priceRange'] == 200 ) echo "selected"; ?>>100.000d ~ 200.000d</option>
										<option value="500" <?php if( isset($_GET['priceRange']) ) if( $_GET['priceRange'] == 500 ) echo "selected"; ?>>200.000d ~ 500.000d</option>
										<option value="1000" <?php if( isset($_GET['priceRange']) ) if( $_GET['priceRange'] == 1000 ) echo "selected"; ?>>>500.000d</option>
										<option value="0" <?php if( !empty($_GET['startPrice']) || !empty($_GET['endPrice']) ) echo "selected"; ?>>Custom</option>
									</select>
									<input type="text" name="startPrice" id="startPrice" style="width: 80px; display: inline-block" class="form-control" placeholder="0" value="<?php if(!empty($_GET['startPrice'])) echo $_GET['startPrice']; ?>" onkeyup="changeToCustom()">
									~
									<input type="text" name="endPrice" id="endPrice" style="width: 80px; display: inline-block" class="form-control" placeholder="0"  value="<?php if(!empty($_GET['endPrice'])) echo $_GET['endPrice']; ?>" onkeyup="changeToCustom()">
								</td>
								<td>
									The loai
									<select class="form-control" name="theLoai" style="width: 120px; display: inline-block">
										<?php 
											$resultt = mysqli_query($con, "select * from theloai");
											while ($tl = mysqli_fetch_array($resultt)) {
												?>
													<option value="<?php echo $tl["maTheLoai"]; ?>">
														<?php echo $tl['theLoai']; ?>
													</option>
												<?php
											}
										?>
									</select>
								</td>
								<td style="width: 100px">
									<input type="submit" id="priceSM" class="btn btn-primary" value="Loc ket qua" ">
								</td>
							</tr>
						</table> -->
					</form>
				</div>
				<div id="listGame">
					<div style="margin: 5px;" class="container">
					<?php
						//echo $sql;
						$result = mysqli_query($con, $sql);

						while($sp = mysqli_fetch_array($result)) { 
							?>
								<div style="width: 370px; height: 363px; margin: 5px" class="col-lg-4 col-md-6 col-sm-6">
									<div style="width: 370px; height: 208px;">
										<a href="sanpham/?id=<?php echo $sp['maSP'] ?>">
											<img src="<?php echo $sp["maAnh"]; ?>" style="width: 370px">
										</a>
									</div>
									<div style="width: 370px; height: 155px; background-color: #E6E6E6; position: absolute; text-align: center;">
										<p class="spName">
											<a href="sanpham/?id=<?php echo $sp['maSP'] ?>" style="text-decoration: none;"><?php echo $sp["tenSP"] ?></a>
										</p>
										<p style="margin: 5px 0px; font-size: 16px">
											Thể loại: <?php echo $sp["theLoai"] ?> - Từ: <?php echo $sp["NSX"] ?>
										</p>
										<p style="margin: 5px 0px">Giá:
											<span class="spPrice">
												<?php if($sp["soLuong"] != 0) echo $sp["gia"]; else echo "Hết hàng" ?>
											</span>
										</p>
										<div style="margin: 8px">
											<script type="text/javascript">
												function add<?php echo $sp['maSP'] ?>tocart()
												{
													alert("Thêm thành công");

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
													xmlhttp.open("GET","addtocart.php?id="+<?php echo $sp['maSP'] ?>);
													xmlhttp.send();
												}
												function go<?php echo $sp['maSP'] ?>()
												{
													window.location.href="addtocart.php?id=<?php echo $sp['maSP'] ?>&fwd";
												}
											</script>
											<?php 
												if($sp["soLuong"] != 0)
												{
													?>
														
														<input type="button" class="btn btn-primary" value="Thêm vào giỏ hàng" onclick="add<?php echo $sp['maSP'] ?>tocart()">
														<input type="button" class="btn btn-warning" value="Mua Ngay" onclick="go<?php echo $sp['maSP'] ?>()">
													<?php
												}
												else
												{
													?>
														
														<input type="button" class="btn btn-primary disabled" value="Thêm vào giỏ hàng">
														<input type="button" class="btn btn-warning disabled" value="Mua Ngay">
													<?
												}
											?>
											
										</div>
									</div>
								</div>
							<?php
							}
						?>
					</div>
				</div>
				<div style="display: flex; justify-content: center;align-items: center; margin: 10px">
					<nav aria-label="...">
						<ul class="pagination pagination-lg">
							<li class="page-item" id="pgPrev">
							  <a class="page-link" id="apgPrev" href="?page=<?php echo $_GET['page']-1 ?>" tabindex="-1"><</a>
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
							  <a class="page-link" id="apgNext href="?page=<?php echo $currentPage+1 ?>">></a>
							</li>
						</ul>
					</nav>
				</div>		
		<?php 
			if (isset($currentPage)) {
				if($currentPage == $demPage || $demPage == 1)
				{
					?>
						<script type="text/javascript">
							document.getElementById('pgNext').className = "page-item disabled";
							$('#apgNext').attr("href","");
						</script>
					<?php
				}
				if($currentPage == 1)
				{
					?>
						<script type="text/javascript">
							document.getElementById('pgPrev').className = "page-item disabled";
							$('#apgPrev').attr("href","");
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