<?php
	session_start();
	unset($_SESSION['nameKH']);
	unset($_SESSION['idKH']);
	header("location: ../");
?>