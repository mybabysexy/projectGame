<?php 
	if (isset($_GET['nameTheLoai'])) {
		$name = $_GET['nameTheLoai'];
		echo "add: $name ";

		include '../connectDB.php';
		$sql = "insert into theloai(theLoai) values ('$name')";
		mysqli_query($con, $sql);
		mysqli_close($con);
		header("location: theloai.php");
	}
?>