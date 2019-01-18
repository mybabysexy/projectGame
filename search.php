<?php
	include 'connectDB.php';
	mysqli_set_charset($con,'utf8');
	if(isset($_GET['q']))
	{
		$response="";
		$q = $_GET['q'];
		$sql = "select maSP,tenSP,gia,NSX,theloai.theLoai as theLoai,maAnh from (select maSP,tenSP,gia,maAnh,maTheLoai,nsx.tenNSX as NSX from sanpham inner join nsx on nsx.maNSX=sanpham.maNSX)a inner join theloai on theloai.maTheLoai=a.maTheLoai WHERE tenSP like '%$q%' limit 0,3";
		$result = mysqli_query($con, $sql);
		while ($SP = mysqli_fetch_array($result)) {
			$maSP = $SP['maSP'];
			$response = $response. 
			"<div style='width: 100%; height: 100px'>".
				"<a href='../sanpham/?id=".$maSP."'>".
					"<img src='../".$SP["maAnh"]."' style='height: 80px; margin: 10px'>".
					"<h3 style='display: inline; margin: 0'>".$SP['tenSP']."</h3>".
				"</a><br>".
			"</div>";
		}
	}
	else
		$response = "";
	echo $response;
?>