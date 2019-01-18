<?php
if (isset($_POST['id'])) 
{

    $target_dir = "../img/";
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

            $maSP = $_POST['id'];

            include '../connectDB.php';
            $sql = "update sanpham set maAnh = '$link' where maSP = $maSP";
            echo $sql;

            mysqli_query($con, $sql);

            ?>
                <script type="text/javascript">
                    window.close();
                </script>
            <?php
            mysqli_close($con);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    ?>
    
    <?
}
else
{
    header("location: index.php");
}
?>