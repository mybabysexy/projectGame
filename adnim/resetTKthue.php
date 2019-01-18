<?php 
	if (isset($_GET['id'])) {
		include '../connectDB.php';

		$maHD = $_GET['id'];

		$sql = "update tkthue set tkThue = null, maHD = 0 where maHD = $maHD";
		mysqli_query($con, $sql);
		echo $sql."<br>";
		$sql = "update hoadon set tinhTrang = 3 where maDonHang = $maHD";
		mysqli_query($con, $sql);
		echo $sql."<br>";

		mysqli_close($con);
		?>
		<script type="text/javascript">
			window.close();
		</script>
		<?
		header('location: taikhoanthue.php');
	}
	else
	{
		header('location: index.php');
	}
?>