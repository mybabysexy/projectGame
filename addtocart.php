<?php 	
	session_start();
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		if (isset($_SESSION['cartItem'][$id])) {
			$_SESSION['cartItem'][$id] += 1;
		}
		else
			$_SESSION['cartItem'][$id] = 1;
		echo count($_SESSION['cartItem']);
		// $_SESSION['cartItem'][$id] = $id;
	}

	header("location: ../");

?>