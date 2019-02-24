<?php 
	if ( isset($_GET['id']) ) {
		include '../connectDB.php';

		$id = $_GET['id'];

		$sql = "update hoadon set tinhTrang = 2 where maDonHang = $id and tinhTrang != 1";
		mysqli_query($con, $sql);

		mysqli_close($con);
		?>
		<script type="text/javascript">
			window.close();
		</script>
		<?php
	}
	else
	{
		header('location: index.php');
	}
?>