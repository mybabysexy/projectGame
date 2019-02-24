<?php
	session_start();
	unset($_SESSION['nameAD']);
	unset($_SESSION['idAD']);
	unset($_SESSION['quyenAD']);
	header("location: ../");
?>