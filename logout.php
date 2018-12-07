<?php
	session_start();
	unset($_SESSION['nameKH']);
	unset($_SESSION['idKH']);
	unset($_SESSION['nameAD']);
	unset($_SESSION['idAD']);
	header("location: ../");
?>