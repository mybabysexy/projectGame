<?php 
	if (isset($_GET['codeNSX']) && isset($_GET['nameNSX'])) {
		$id = $_GET['codeNSX'];
		$name = $_GET['nameNSX'];
		echo "change id = $id as name = $name ";

		include 'connectDB.php';
		$sql = "UPDATE nsx SET tenNSX='$name' WHERE maNSX = $id";
		mysqli_query($con, $sql);
		mysqli_close($con);
		header("location: nsx_theloai.php");
	}
?>