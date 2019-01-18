<?php 
	if (isset($_GET['id'])) {
		$id = $_GET['id'];
		echo "del id = $id";

		include '../connectDB.php';
		$sql = "delete from nsx WHERE maNSX = $id";
		mysqli_query($con, $sql);
		mysqli_close($con);
		header("location: nhasanxuat.php");
	}
?>