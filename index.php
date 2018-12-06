<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhóm 7 - Game Store</title>
	<link rel="icon" type="image/png" href="favicon.ico">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

	<style type="text/css">
		body {margin: 0; padding: 0; font-family: sans-serif;}
		#head {height: 150px}
		#topbar {display: flex; align-items: center; height: 30%; background-color: cyan;}
		#menu {height: 70%; display: flex; align-items: center; background-color: darkviolet}
		#banner {height: 600px; background-color: red}
		#listGame {display: grid; align-items: center; justify-content: center}
		#searchBar {height: 105px; width: 100% ; background-color: white; position: absolute; top: 45px; display: none; align-items: center;}
		#searchButton {position: absolute; right: 50px; border: 3px solid white; color: white; border-radius: 25px; background-color: transparent; width: 120px; height: 50px; z-index: 1; font-size: 20px; cursor: pointer;}
		#cartButton {position: absolute; right: 200px; border: 3px solid white; color: white; border-radius: 25px; background-color: transparent; width: 120px; height: 50px; font-size: 20px; cursor: pointer; z-index: 0}

		.spName {font-size: 18px; margin: 8px; font-weight: bold}
		.spPrice {font-size: 20px; font-weight: bolder; color: brown}
		.btnDetails {width: 95px; height: 35px; font-size: 15px; border: 0; background-color: green; border-radius: 8px; color: white; margin: 0px 2px; cursor: pointer;}
		.btnAddToCart {width: 150px; height: 35px; font-size: 15px; border: 0; background-color: red; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer; position: relative;}
		.btnBuyNow {width: 90px; height: 35px; font-size: 15px; border: 0; background-color: orange; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer;}
		.pageButton {width: 35px; height: 35px; background-color: lightgreen; border: none; font-size: 20px; margin: 2px}

		#footer {height: 70px; width: 100%; background-color: darkviolet; margin-top: 20px; display: flex; align-items: center; justify-content: center; color: white}

		::-webkit-scrollbar {
		width: 5px;
		height: 10px;
		}

		::-webkit-scrollbar-track {
		border: none;
		background-color: black;
		}

		::-webkit-scrollbar-thumb {
		background: gray;  
		}

		::-webkit-scrollbar-thumb:hover {
		background: #88ba1c;  
		}
	</style>
	<script type="text/javascript">
		searchBarState = 0;
		function showSearchBar()
		{
			if(searchBarState == 1)
			{
				document.getElementById('searchBar').style.display="none";
				document.getElementById('searchButton').style.border="3px solid white";
				document.getElementById('searchButton').style.color="white";
				document.getElementById('searchButton').value="Tìm kiếm";
				searchBarState = 0;
			}
			else {
				document.getElementById('searchBar').style.display="flex";
				document.getElementById('searchButton').style.border="3px solid red";
				document.getElementById('searchButton').style.color="red";
				document.getElementById('searchButton').value="Đóng lại";
				searchBarState+=1;
			}
		}
	</script>
</head>
<body>
	<?php
		include 'connectDB.php';
		mysqli_set_charset($con,'utf8');
		if(isset($_SESSION['cartItem']));
		else
			$_SESSION['cartItem'] = array();
		$row = 0;
	?>
	<div id="main">
		<div id="head">
			<div id="topbar">
				<div style="width: 70%; height: 100%; display: flex; align-items: center;">
					<p style="margin: 0px 30px; float: left;">Chào mừng các bạn tới với trang chúng tôi - Thuê game - Bán game</p>
				</div>
				<?php
					if(isset($_SESSION['nameKH']))
					{
						?>
						<div style="width: 30%; height: 100%; background-color: transparent; display: flex; align-items: center">
							<p style="margin: 0">Xin chào: <a href="/taiKhoan" style="text-decoration: none; color: blue; font-weight: bold"><?php echo $_SESSION['nameKH']?></a></p>
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9F3434; border-radius: 25px; margin-left: 20px">
								<a href="logout.php" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng xuất</a>
							</button>
						</div>
						<?php
					}
					else
					{
						?>
						<div style="width: 30%; height: 100%; background-color: transparent; display: flex; align-items: center">
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9825FA; border-radius: 25px; margin-left: 50px">
								<a href="signin" style="text-decoration: none; color: #9825FA; font-weight: bold">Đăng nhập</a>
							</button>
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9F3434; border-radius: 25px; margin-left: 20px">
								<a href="signup" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng ký</a>
							</button>
						</div>
						<?php
					}
				?>
			</div>
			<div id="menu">
				<a href="../" style="text-decoration: none; margin: 0px 70px; font-size: 50px; color: white"><img src="logo.png" width="100px"></a>
				<input type="button" id="searchButton" onclick="showSearchBar()" value="Tìm kiếm">
				<script type="text/javascript">
					function gotoCart()
					{
						window.location.href="cart/"
					}
				</script>
				<input type="button" id="cartButton" onclick="gotoCart()" value="Giỏ hàng">
			</div>
		</div>
		<div id="searchBar">
			<form>
				<input type="text" name="q" placeholder="NHẬP ÍT NHẤT 3 KÍ TỰ" style="background-color: transparent; border: none; border-bottom: 2px solid black; height: 50px; font-size: 40px; margin-left: 50px">
			</form>
		</div>
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
										<a href="sanpham/index.php?id=<?php echo $sp['maSP'] ?>"><img src="<?php echo $sp["maAnh"]; ?>" style="width: 370px"></a>
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