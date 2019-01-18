<?php 
	if (isset($_GET['nameNSX'])) {
		$name = $_GET['nameNSX'];
		echo "add: $name ";

		include '../connectDB.php';
		$sql = "insert into nsx(tenNSX) values ('$name')";
		mysqli_query($con, $sql);
		mysqli_close($con);
		header("location: nhasanxuat.php");
	}
?>