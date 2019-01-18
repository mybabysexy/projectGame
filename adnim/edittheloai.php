<?php 
	if (isset($_GET['codetheloai']) && isset($_GET['nametheloai'])) {
		$id = $_GET['codetheloai'];
		$name = $_GET['nametheloai'];
		echo "change id = $id as name = $name ";

		include '../connectDB.php';
		$sql = "UPDATE theloai SET theLoai='$name' WHERE maTheLoai = $id";
		mysqli_query($con, $sql);
		mysqli_close($con);
		header("location: theloai.php");
	}
?>