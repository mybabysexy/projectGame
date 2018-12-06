<?php 
	session_start();
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		// $_SESSION['cartItem'][$id] = 0;
		unset($_SESSION['cartItem'][$id]);
	}
	header("location: ../cart");
?>