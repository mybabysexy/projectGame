<?php
	session_start();
	if (!isset($_GET['req'])) {
		header("location: ../cart");
	}
	include '../connectDB.php';
	$sumSL = 0;
	$sumPrice = 0;
	foreach ($_SESSION['cartItem'] as $key => $value) {
		if (isset($key) && isset($_GET[$key])) {
			$_SESSION['cartItem'][$key] = $_GET[$key];
		}
	}
	foreach ($_SESSION['cartItem'] as $key => $value) {
		$sql = "Select * from sanpham where maSP = $key";
		$back = mysqli_query($con, $sql);
		$SP = mysqli_fetch_array($back);
		if (isset($key)) {
			$sumSL += $value;
			$sumPrice += $SP['gia']*$value;
		}
	}
	echo "<td colspan='2' align='center' style='vertical-align: middle;font-weight: bold'>
			Tong
		</td>
		<td align='center' style='vertical-align: middle;font-weight: bold'>
			<span id='sumSL'>$sumSL</span>
			
		</td>
		<td align='center' style='vertical-align: middle;font-weight: bold'>
			<span id='sumPrice' name='sumPrice'>$sumPrice</span>
			
			</script>
		</td>
		<td></td>";
?>