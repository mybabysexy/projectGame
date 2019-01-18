<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript">

	    function PreviewImage() {
	        

	        var a = document.getElementById("fileToUpload");
			if (a.files.length == 0) {
				alert("choose");
				return;
			}
			//if (document.getElementById("uploadFile").type == "submit") {return;}
			var fileType = a.files[0].type;
			var fileSize = a.files[0].size;
			if (fileType == "image/png" || fileType == "image/jpg" || fileType == "image/jpeg" || fileType == "image/webp") 
			{
				if (fileSize <= 2000000)
				{
					document.getElementById("uploadFile").type = "submit";
					var oFReader = new FileReader();
			        oFReader.readAsDataURL(document.getElementById("fileToUpload").files[0]);
			        oFReader.onload = function (oFREvent) {
			            document.getElementById("uploadPreview").src = oFREvent.target.result;
			        };
				}
				else
				{
					alert("file size");
					document.getElementById("uploadFile").type = "button";
					window.location.reload();
				}
			}
			else
			{
				alert("wrong");
				document.getElementById("uploadFile").type = "button";
				window.location.reload();
			}
	    };
	    window.onunload = refreshParent;
	    function refreshParent() {
	        window.opener.location.reload();
	    }
	</script>
</head>
<body>
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<center>
			<div>
				<input type="text" name="id" value="<?php echo $_GET['id']; ?>" style="display: none">
			    <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" onchange="PreviewImage()">
			    <input type="button" value="Upload Image" name="submit" id="uploadFile" class="form-control"">
	    	</div>
	    	<div style="margin-top: 20px">
	    		<h4 style="text-align: left;">Preview:</h4>
	    		<img id="uploadPreview" style="width: 380px">
	    	</div>
		</center>
	</form>
</body>
</html>