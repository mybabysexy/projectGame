<?php
	session_start();

	function addDot($strNum) {
        $len = strlen($strNum);
        $chia000 = 3;
        $ketqua = "";
        while ($len - $chia000 >= 0)
        {
            $cutString = substr($strNum, $len - $chia000 , 3);
            $ketqua = ','.$cutString.$ketqua;
            $chia000+= 3;
        }
        $cutString = substr($strNum, 0 , 3 - ($chia000 - $len) );
        $ketqua = $cutString.$ketqua;
        if(substr($ketqua,0,1)==','){
            $ketqua=substr($ketqua,1,$len+2);   
        }
        return $ketqua;
	}

	
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

	$sumPrice2 = addDot($sumPrice);

	echo "<td colspan='2' align='center' style='vertical-align: middle;font-weight: bold'>
			Tong
		</td>
		<td align='center' style='vertical-align: middle;font-weight: bold'>
			<span id='sumSL'>$sumSL</span>
			
		</td>
		<td align='center' style='vertical-align: middle;font-weight: bold'>
			<span id='sumPrice' name='sumPrice'>$sumPrice2</span>
			
			</script>
		</td>
		<td></td>";
?>