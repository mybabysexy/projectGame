<?php
	session_start();
	foreach ($_SESSION['cartItem'] as $key => $value) {
		if (isset($key)) {
			// echo $key;
			// echo "-";
			// echo $_GET[$key];
			// echo "/";
			$_SESSION['cartItem'][$key] = $_GET[$key];
		}
	}
	header("location: ../cart");
?>