<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Nhóm 7 - Game Store</title>
	<link rel="icon" type="image/png" href="favicon.ico">
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

		.spName {font-size: 20px; margin: 8px; font-weight: bold}
		.spPrice {font-size: 20px; font-weight: bolder; color: brown}
		.btnDetails {width: 95px; height: 35px; font-size: 15px; border: 0; background-color: green; border-radius: 8px; color: white; margin: 0px 2px; cursor: pointer;}
		.btnAddToCart {width: 150px; height: 35px; font-size: 15px; border: 0; background-color: red; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer; position: relative;}
		.btnBuyNow {width: 90px; height: 35px; font-size: 15px; border: 0; background-color: orange; border-radius: 8px; color: black; margin: 0px 2px; cursor: pointer;}

		#footer {width: 100%; height: 70px; background-color: darkviolet; margin-top: 20px; display: flex; align-items: center; justify-content: center; color: white; bottom: 0; position: fixed;}

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
				document.getElementById('cartBar').style.display="none";
				searchBarState+=1;
			}
		}
		cartState = 0;
		function showCart()
		{
			if(cartState == 1)
			{
				document.getElementById('cartBar').style.display="none";
				cartState = 0;
			}
			else {
				document.getElementById('cartBar').style.display="flex";
				cartState+=1;
			}
		}
		function decreaseCart()
		{
			
		}
		function increaseCart()
		{
			
		}
	</script>
</head>
<body>
	<?php
		session_start();
		include '../connectDB.php';
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
							<p style="margin: 0">Xin chào: <a href="#" style="text-decoration: none; color: blue; font-weight: bold"><?php echo $_SESSION['nameKH']?></a></p>
							<button style="border: 0; background-color: transparent; width: 110px; height: 35px; cursor: pointer; border: 3px solid #9F3434; border-radius: 25px; margin-left: 20px">
								<a href="../logout.php" style="text-decoration: none; color: #9F3434; font-weight: bold">Đăng xuất</a>
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
				<a href="../" style="text-decoration: none; margin: 0px 70px; font-size: 50px; color: white">Team 07</a>
				<input type="button" id="searchButton" onclick="showSearchBar()" value="Tìm kiếm">
				<script type="text/javascript">
					function gotoCart()
					{
						window.location.href="../cart"
					}
				</script>
				<input type="button" id="cartButton" onclick="gotoCart()" value="Giỏ hàng">
				<!-- <input type="button" id="cartButton" onclick="showCart()" value="Giỏ hàng"> -->
				<div id="cartBar" style="width: 510px; height: 200px; background-color: white; position: absolute; right: 200px; top: 120px; display: none; align-items: center;">
					<div style="width: 100%">
						<?php 
							if(isset($_SESSION['cartItem']))
							{
								?>
								<table cellspacing="0" cellpadding="5px" border="1">
									<tr>
										<td width="50px" align="center">STT</td>
										<td width="200px" align="center">Tên sản phẩm</td>
										<td width="110px" align="center">SL</td>
										<td width="100px" align="center">Giá</td>
										<td width="50px" align="center">Xoá</td>
									</tr>
									<?php
										$i = 1;
										foreach ($_SESSION['cartItem'] as $key => $value) {
											$back = mysqli_query($con, "Select * from sanpham where maSP = $key");
											$SP = mysqli_fetch_array($back);
											if($value == 0) continue;
											?>
												<tr>
													<td align="center"><?php echo $i++ ?></td>
													<td align="center"><?php echo $SP['tenSP'];?></td>
													<td align="center">
														<input type="text" id="SL<?php echo $i;?>" style="text-align: center;" size="1" value="<?php echo $value;?>">
													</td>
													<td align="center"><?php echo $SP['gia']*$value;?></td>
													<td><a href="delSP.php?id=<?php echo $SP['maSP'] ?>">DEL</a></td>
												</tr>
											<?php
											}
									?>
								</table>
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
		</div>
		<div id="searchBar">
			<form>
				<input type="text" name="q" placeholder="NHẬP ÍT NHẤT 3 KÍ TỰ" style="background-color: transparent; border: none; border-bottom: 2px solid black; height: 50px; font-size: 40px; margin-left: 50px">
			</form>
		</div>
		<div id="body">
			<div>
				<div align="center">
					<h1 id="header">- Thanh toán -</h1>
					<p style="font-size: 50px; color: lightgreen">THÀNH CÔNG</p>
					<script type="text/javascript">
						function go()
						{
							window.location.href="../";
						}
					</script>
					<input type="button" name="" style="width: 200px; height: 70px; font-size: 30px" value="Trang chủ" onclick="go()">
				</div>
			</div>
		</div>
		<div id="footer">
			Lương Minh Đức - Vũ Văn Toàn
		</div>
	</div>
</body>
</html>