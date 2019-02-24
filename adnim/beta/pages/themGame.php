<?php 
	if ( isset($_POST['tenGame']) && isset($_POST['gia']) && isset($_POST['tenTheLoai']) && isset($_POST['soLuong']) && isset($_POST['tenNSX']) && isset($_POST['moTa']) && isset($_POST['cauHinh'])) {
		$tenGame = $_POST['tenGame'];
		$gia = $_POST['gia'];
		$tenTheLoai = $_POST['tenTheLoai'];
		$tenNSX = $_POST['tenNSX'];
		$moTa = $_POST['moTa'];
		$tenGame = $_POST['tenGame'];
		$cauHinh = $_POST['cauHinh'];
		$soLuong = $_POST['soLuong'];

		include 'connectDB.php';

		$target_dir = "../../../img/";
	    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	    $uploadOk = 1;

	    // Check if $uploadOk is set to 0 by an error
	    if ($uploadOk == 0) {
	        echo "Sorry, your file was not uploaded.";
	    // if everything is ok, try to upload file
	    }
	    else 
	    {
	        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
	            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded to ";
	            $link = $target_dir.$_FILES["fileToUpload"]["name"];
	            echo $link."<br>";
	        } else {
	        	header('location: addgame.php');
	            die("Sorry, there was an error uploading your file.");
	        }
	    }

		$sql = "INSERT INTO sanpham(maNSX, maTheLoai, tenSP, gia, soLuong, maAnh, moTa, cauHinh) VALUES($tenNSX,$tenTheLoai,'$tenGame','$gia','$soLuong','$link','$moTa','$cauHinh')";

		echo $sql;

		if (mysqli_query($con, $sql)) {
			echo "done query";
		}
		mysqli_close($con);
	    ?>
	    <script type="text/javascript">
	    	window.location.href="listgame.php";
	    </script>
	    <?php
	}
	else
	{
		header('location: listgame.php');
	}
?>