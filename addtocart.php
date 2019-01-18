<?php 	
	session_start();
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		if (isset($_SESSION['cartItem'][$id])) {			
			if(isset($_GET['sl']))
			{
				if(is_numeric($_GET['sl']))
				{
					$_SESSION['cartItem'][$id] += $_GET['sl'];
				}
			}
			else
			{
				$_SESSION['cartItem'][$id] += 1;
			}
		}
		else
		{
			if(isset($_GET['sl']))
			{
				if(is_numeric($_GET['sl']))
				{
					$_SESSION['cartItem'][$id] = $_GET['sl'];
				}
			}
			else
			{
				$_SESSION['cartItem'][$id] = 1;
			}
		}
		// echo count($_SESSION['cartItem']);
		// $_SESSION['cartItem'][$id] = $id;

		$sumSL = 0;
		foreach ($_SESSION['cartItem'] as $key => $value) {
			$sumSL += $value;
		}

		if (isset($_GET['fwd']))
		{
			header("location: cart/");
		}
		else if (isset($_GET['stay']))
		{
			header("location: sanpham/?id=$id");
		}
		else
		{
			echo "Giỏ hàng <span class='label label-success'>".$sumSL."</span>";
		}

	}
	else
	{
		header("location: ../");
	}	
?>