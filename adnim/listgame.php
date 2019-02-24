<?php 
	session_start();
	include '../connectDB.php';
	if(!isset($_SESSION['idAD'])) header("location: index.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Danh sách game</title>
	<meta charset="utf-8">

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script type="text/javascript">
    	$(function(){
    		$('#addGame').hover(function(){
    			$(this).attr('src','addGame4.png');
    		}, function(){
    			$(this).attr('src','addGame1.png');
    		})
    	})
    </script>

</head>
<body>
	<div class="container">
		<a href="home.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Danh sách hóa đơn</a>
		<a href="listgame.php" style="font-size: 36px; color: black; margin-right: 10px; text-decoration: none;">List game</a>
		<a href="nhasanxuat.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Nhà sản xuất</a>
		<a href="theloai.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">Thể loại</a>
		<a href="taikhoan.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Users</a>
		<a href="taikhoanthue.php" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Thuê</a>
		<?php 
			if($_SESSION['quyenAD'])
			{
				?>
				<a href="taikhoanAD" style="font-size: 26px; color: darkviolet; margin-right: 10px; text-decoration: none;">TK Admins</a>
				<?
			}
		?>
		
		<form class="form-group form-inline" style="margin-top: 50px">
			<table cellpadding="20px" cellspacing="0">
				<tr>
					<td width="170px">
						Ma SP: <input type="text" name="maSP" class="form-control" style="width: 100px;" value="<?php if(isset($_GET['maSP'])) echo  $_GET['maSP']; ?>">
					</td>
					<td width="280px">
						Ten game: <input type="text" name="tenGame" class="form-control" style="" value="<?php if(isset($_GET['tenGame'])) echo  $_GET['tenGame']; ?>">
					</td>
					<td>
						<input type="submit" class="btn btn-primary" value="Tim kiem" name="">
					</td>
				</tr>
			</table>
		</form>

<?php 
	if($_SESSION['quyenAD'])
	{
		?>
		<div class="container">
			<?php
				$demRow = 0;
				$sp1dong = 3;
				$sp1page = 5;
				$left = -10;

				$sqlSoSP = mysqli_query($con, "select * from sanpham");
				$demPage = ceil(mysqli_num_rows($sqlSoSP)/$sp1page);

				$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit 0,$sp1page";
				
				if(isset($_GET['page']))
				{
					$start = ($_GET['page']-1) * $sp1page;
					if($_GET['page'] == 1) $start = 0;
					$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai limit $start,$sp1page";
				}

				if (isset($_GET['maSP'])) {
					if($_GET['maSP'] > 0)
					{
						$maSP = $_GET['maSP'];
						$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where maSP = $maSP";
					}
				}

				if (!empty($_GET['tenGame'])) {
					if($_GET['tenGame'] >= 0)
					{
						$tenGame = $_GET['tenGame'];
						$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where tenSP like '%$tenGame%'";
					}
				}

				$result = mysqli_query($con, $sql);

				while($sp = mysqli_fetch_array($result)) 
				{ 
					?>
					<form method="" action="editgame.php">
						<div style="height: 380px;margin-bottom: 10px; padding: 0" class="col-lg-4 col-md-6 col-sm-6">
							<div style="width: 370px; height: 208px;position: relative;">
								<img src="<?php echo "../".$sp["maAnh"]; ?>" style="width: 370px">
							</div>
							<script type="text/javascript">
								function editpic<?php echo $sp["maSP"] ?>()
								{
									window.open("editpic.php?id=<?php echo $sp["maSP"] ?>", "edit pic", "width=400,height=400");
								}
							</script>
							<button type="button" style="width: 50px; height: 50px; opacity: 0.5; border-radius: 50%; top: 10px; right: 20px; position: absolute;" onclick="editpic<?php echo $sp["maSP"] ?>()">
								<span class="glyphicon glyphicon-pencil"></span>
							</button>
							
							<div style="width: 370px; height: 172px; background-color: #E6E6E6; position: absolute; text-align: center;">
								<p class="spName" style="font-size: 18px; margin: 8px; font-weight: bold">
									<input type="text" name="maSP" value="<?php echo $sp["maSP"] ?>" readonly class="form-control" style="width: 45px; text-align: center; display: none;">
									<input type="text" name="tenSP" value="<?php echo $sp["tenSP"] ?>" class="form-control" style="text-align: center;">
								</p>
								<p style="margin: 5px 0px; font-size: 16px">
									Thể loại:
									<select class="form-control" name="theLoai" style="width: 120px; display: inline-block;">
										<?php 
											$sql3 = "select * from theloai";
											$result3 = mysqli_query($con, $sql3);
											while ($tl = mysqli_fetch_array($result3)) {
												?>
													<option 
														value="<?php echo $tl['maTheLoai'] ?>"
														<?php if($sp["theLoai"] == $tl['theLoai']) echo "selected"; ?> 
													>
														<?php echo $tl['theLoai']; ?>
													</option>
												<?php
											}
										?>
									</select>
									- Từ:
									<select class="form-control" name="NSX" style="width: 120px; display: inline-block;">
										<?php 
											$sql2 = "select * from nsx";
											$result2 = mysqli_query($con, $sql2);
											while ($nsx = mysqli_fetch_array($result2)) {
												?>
													<option 
														value="<?php echo $nsx['maNSX'] ?>"
														<?php if($sp['NSX'] == $nsx['tenNSX']) echo "selected"; ?> 
													>
														<?php echo $nsx['tenNSX']; ?>
													</option>
												<?php
											}
										?>
									</select>
								</p>
								<p style="margin: 5px 0px">
									Giá: <input type="text" name="gia" value="<?php echo $sp["gia"] ?>" class="form-control" style="width: 80px; display: inline-block;">
									Số lượng: <input type="text" name="soLuong" value="<?php echo $sp["soLuong"] ?>" class="form-control" style="width: 50px; display: inline-block;">
								</p>
								<div style="margin: 8px">
									<script type="text/javascript">
										function edit<?php echo $sp["maSP"] ?>()
										{
											window.open('chinhsuagame.php?id=<?php echo $sp["maSP"] ?>', 'example', 'width=800,height=400');
										}
									</script>
									<a href="chinhsuagame.php?id=<?php echo $sp["maSP"] ?>" target="_blank" class="btn btn-default" style="margin-left: 5px; width: 135px">
										<span class="glyphicon glyphicon-pencil"></span> Sửa nâng cao
									</a>
									<button type="submit" class="btn btn-success" style="margin-left: 5px; width: 120px">
										<span class="glyphicon glyphicon-pencil"></span> Sửa
									</button>
								</div>
							</div>
						</div>
					</form>
					<?php
				}
			?>
			<!-- add SP -->
			<form method="" action="addgame.php"> 
				<div style="width: 380px;height: 380px;margin-bottom: 10px; padding: 0; display: flex;align-items: center;justify-content: center;" class="col-lg-4 col-md-6 col-sm-6">
					<a href="addgame.php">
						<img src="addGame1.png" id="addGame" width="320px">
					</a>
				</div>
			</form>
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
					  <a class="page-link" id="apgNext" href="?page=<?php echo $currentPage+1 ?>">></a>
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
		<?php
	}
	else
	{
		?>
		<table class="table table-hover">
			<tr>
				<th width="60px">Ma SP</th>
				<th width="100px">Nha san xuat</th>
				<th width="100px">The loai</th>
				<th width="200px">Ten SP</th>
				<th width="100px">Gia</th>
				<th width="60px">SL</th>
				<th width="90px">Anh</th>
			</tr>
			<?php 
				$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai";
				if (isset($_GET['tinhTrang'])) {
					if($_GET['tinhTrang'] != 999)
					{
						$tinhTrang = $_GET['tinhTrang'];
						$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai";
					}
				}
				if (isset($_GET['maSP'])) {
					if($_GET['maSP'] > 0)
					{
						$maSP = $_GET['maSP'];
						$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where maSP = $maSP";
					}
				}
				if (isset($_GET['tenGame'])) {
					if($_GET['tenGame'] >= 0)
					{
						$tenGame = $_GET['tenGame'];
						$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh,soLuong,moTa from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX,sanpham.moTa,sanpham.soLuong from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai where tenSP like '%$tenGame%'";
					}
				}
				$result = mysqli_query($con, $sql);
				while($DH = mysqli_fetch_array($result))
				{
					?>
					<form class="form-group" method="" action="editgame.php">
					<tr>
						<td>
							<?php 
								echo $DH["maSP"];
							?>
						</td>
						<td>
							<?php 
								echo $DH["NSX"];
							?>
						</td>
						<td>
							<?php 
								echo $DH["theLoai"];
							?>
						</td>
						<td>
							<?php 
								echo $DH["tenSP"];
							?>
						</td>
						<td>
							<?php 
								echo $DH["gia"];
							?>
						</td>
						<td>
							<?php 
								$DH["soLuong"];
							?>
						</td>
						<td>
							<?php 
								echo $DH["maAnh"];
							?>
						</td>
						
					</tr>
					</form>
					<?php
				}
			?>
		</table>
		<?
	}
?>
	<p align="center">
			Admin: <?php echo $_SESSION['nameAD']; ?> - <?php echo $_SESSION['quyenAD']? "Super Admin":"Admin" ?>
		</p>
		<a href="dangxuat.php" class="btn btn-primary btn-lg" style="display: block;">
			Logout
		</a>
		<?php mysqli_close($con); ?>
	</div>
</body>
</html>