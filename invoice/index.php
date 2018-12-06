<?php 
	session_start();
	include("connectDB.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Hoá đơn Momcare</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<link rel="icon" type="image/png" href="favicon.ico">
	<script type="text/javascript">

	</script> 
</head>
<body onload="">
<?php
//$_GET['KEY'] == 'ahihi'
if (1==1) { ?>
	<header>
		<span id="dateField" class="head" align="center" style="font-size: 11px; margin-left: 310px"></span>
		<script type="text/javascript">
			d = new Date();
			mth = parseInt(d.getMonth()) + 1;
			document.getElementById("dateField").innerHTML= d.getDate() + "-" + mth + "-" + d.getFullYear();
		</script>
	</header>
	<article>
		<div id="sidebar">
			<div>
				<div align="center" style="margin-top: 20px; font-size: 20px; font-weight: 700">THÊM SẢN PHẨM</div>
				<div>
					<form action="" method="POST">
						<div align="center" style="margin-top: 10px">
							<script type="text/javascript">
								function printMe()
								{
									document.getElementById('footer').style.display = "block";
									document.getElementById('sidebar').style.display = 'none';
									document.getElementById('sidesidebar').style.display = 'none';
									if(document.getElementById('nameKH').value.length == 0)
										document.getElementById('nameKH').value = "Khách lẻ";
									if(document.getElementById('telKH').value.length == 0)
										document.getElementById('telKH').value = " ";
									if(document.getElementById('addrKH').value.length == 0)
										document.getElementById('addrKH').value = " ";
									//window.print();
									document.getElementById('sidesidebar').style.display = 'block';
								}
								function hideSB()
								{
									document.getElementById('sidebar').style.display = "none";
									document.getElementById('sidesidebar').style.display = "block";
									document.getElementById('footer').style.display = "block";
								}
							</script>
							<input type="button" value="Ẩn menu" onclick="hideSB()" style="width: 100px; height: 35px; background-color: red; color: white; border: 0; margin: 5px; font-size: 13px">
							<input type="button" value="In hoá đơn" onclick="printMe()" style="width: 120px; height: 35px; background-color: lightblue;border: 0; margin: 5px; font-size: 13px">
							<input type="submit" value="Thêm sản phẩm đã chọn" style="width: 170px; height: 35px; background-color: lightgreen;border: 0; margin: 5px; font-size: 13px">
						</div>
						
					<table border="1" align="center" cellspacing="0" cellpadding="0" style="border: 1px solid lightgrey; margin-bottom: 20px; background-color: white">
						<tr>
							<td width="300px" class="row" colspan="2">Sản phẩm</td>
							<td width="70px" class="row">Chọn</td>						
							</td>
						</tr>
					</table>
					</form>
					<div align="center">
						@duc1607 - 2018
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript">
			function showSB()
			{
				document.getElementById('sidebar').style.display = "block";
				document.getElementById('sidesidebar').style.display = "none";
				document.getElementById('footer').style.display = "none";
			}
		</script>
		<div id="sidesidebar" onclick="showSB()"></div>
		<div class="page">
			<div class="logo"> 
				<img src="Logo.png" width="320px">
			</div>
			<div class="title" style="height: 70px">
				<span id="title1">CẢM ƠN QUÝ KHÁCH ĐÃ TIN TƯỞNG THẢO MỘC MOMCARE</span>
				<span id="title2">PHIẾU GIAO HÀNG</span>
				<br>
			</div>
			<form>
				<div class="info">
					<table>
						<tr>
							<td width="360px">
								<span style="font-size: 13px">Khách hàng:</span>
								<input type="text" placeholder="duc1607" style="border-style: none; font-size: 13px; font-weight: 700; margin-left: 5px; width: 200px" name="nameKH" id="nameKH" value="<?php if(isset($_SESSION["nameKH"])) echo $_SESSION["nameKH"] ?>">
							</td>
							<td>
								<span style="font-size: 13px">Số điện thoại:</span>
								<input type="text" placeholder="0975928214" style="border-style: none; font-size: 13px; font-weight: 700; margin-left: 5px" name="telKH" id="telKH" value="<?php if(isset($_SESSION["telKH"])) echo $_SESSION["telKH"] ?>">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<span style="font-size: 13px">Địa chỉ:</span>
								<input type="text" size="50" placeholder="15/97 Thái Thịnh. Đống Đa. Hà Nội. Việt Nam" style="border-style: none; font-size: 13px; font-weight: 500; width: 620px" name="addrKH" id="addrKH" value="<?php if(isset($_SESSION["addrKH"])) echo $_SESSION["addrKH"] ?>">
							</td>
						</tr>
					</table>
				</div>
				<div class="main">
					<table class="billTable" border="1px" cellspacing="0" cellpadding="0">
						<tr>
							<td width="50px" class="row">STT</td>
							<td width="300px" class="row">Tên sản phẩm</td>
							<td width="100px" class="row">ĐVT</td>
							<td width="200px" class="row">Đơn giá</td>
							<td width="70px" class="row">SL</td>
							<td width="200px" class="row">Thành tiền</td>
						</tr>
						<?php 
							$result = mysqli_query($con, "select * from sanpham");
							$stt = 1;
							while ($SP = mysqli_fetch_array($result)) {
								?>
								<tr class="row">
									<td>
										<span style="font-size: 13px"><?php echo $stt++; ?></span>
									</td>
									<td>
										<span style="font-size: 13px"><?php echo $SP["tenSP"] ?></span>
									</td>
									<td>
										<span style="font-size: 13px"><?php echo $SP["dvt"] ?></span>
									</td>
									<td>
										<input type="tel" name="" value="<?php echo $SP["gia"] ?>" style="border: 0; width: 80px; height: 20px; font-size: 13px; text-align: center;">
									</td>
									<td>
										<input type="tel" name="SL[]" value="1" style="border: 0; width: 38px; height: 20px; font-size: 13px; text-align: center;">
									</td>
									<td>
										<input type="tel" name="" value="<?php echo $SP["gia"] ?>" style="border: 0; width: 80px; height: 20px; font-size: 13px; text-align: center;">
									</td>
								</tr>
								<?
							}
						?>
						<tr>
							<td colspan="4" class="finalRow">Cộng</td>
							<td class="finalRow"> 
								<span id="cong" style="border-style: none; font-size: 20px; font-weight: 700; text-align: center;"></span>
							</td>
							<td class="finalRow">
								<span id="thanhTien" name="thanhTien" style="border-style: none; font-size: 20px; font-weight: 700; text-align: center;"></span>
							</td>
						</tr>
						<tr>
							<td colspan="5" class="finalRow" id="saleText">Giảm giá (% / VND)</td>
							<td class="finalRow">
								<input type="text" id="sale" name="sale" size="8" value="0" style="border-style: none; font-size: 13px; font-weight: 700; text-align: center; background-color: lightgrey">
							</td>
						</tr>
						<tr>
							<td colspan="5" class="finalRow">Thành tiền</td>
							<td class="finalRow">
								<span id="paid" name="paid" style="border-style: none; font-size: 20px; font-weight: 700; text-align: center;"></span>
							</td>
						</tr>
					</table>
					<div style="margin: 5px;">
						<span style="font-size: 13px">Ghi chú:</span>
						<input type="text" name="" style="border: 0; width: 590px; height: 20px; font-size: 13px">
					</div>
					<div style="width: 100%">
						<div align="center" style="width: 50%; float: left;"><b>Bên giao</b></div>
						<div align="center" style="width: 50%; float: left;"><b>Bên nhận</b></div>
					</div>
				</div>
				<div id="printbar">
					<script type="text/javascript">
						function test()
						{
							document.getElementById('footer').style.display = "block";
							document.getElementById('sidebar').style.display = 'none';
							document.getElementById('sidesidebar').style.display = 'none';
							document.getElementById('printbar').style.display = 'none';
							if(document.getElementById('nameKH').value.length == 0)
								document.getElementById('nameKH').value = "Khách lẻ";
							if(document.getElementById('telKH').value.length == 0)
								document.getElementById('telKH').value = " ";
							if(document.getElementById('addrKH').value.length == 0)
								document.getElementById('addrKH').value = " ";
							document.getElementById('submitbtn').type= 'submit';
							window.print();
							document.getElementById('sidesidebar').style.display = 'block';
							document.getElementById('printbar').style.display = 'block';
						}
					</script>
					<input type="button" onclick="test()" id="submitbtn" value=" " style="width: 100%; height: 100vh; background-color: transparent; border: 0">
				</div>
			</form>	
		</div>
	</article>
	<footer>
		<div class="foot" align="center" id="footer">
			<p><b>CÔNG TY TNHH ĐÔNG DƯỢC THÁI BÌNH</b></p>
			<p>Địa chỉ: 15/97 Thái Thịnh. Đống Đa. Hà Nội. Việt Nam</p>
			<p>Hotline: 098 125 6611</p>
			<p>Website: momcarevn.com – <strong>dongduocthaibinh.com</strong> - thaomocmomcare.com</p>
		</div>
	</footer>
<?php
}
else header("location:not_found.html");
?>
</body>
</html>