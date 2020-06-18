<?php 
	session_start();
	include '../template.php';
?>
	<script type="text/javascript">
		$(function() {
			var $progressBar = $(".progress-bar");
			i = 4;

			$progressBar.animate({
			  width: "100%"
			}, {
				duration: 5000,
				step: function( now, fx ) {
				}
			});

			if ($progressBar.width() == "768") {
				window.location.href ="../taiKhoan/";
			}
			
		})
		setInterval(function(){
			$('strong').text(i--);
		},1000)
		
		setTimeout(function(){window.location.href ="../taiKhoan/"},5000);
	</script>

	<h1 id="header" style="margin: 50px; text-align: center;">
		- Thành công -
	</h1>

	<div align="center">
		<h3>Hệ thống đã nhận được yêu cầu và đang chờ quản trị viên xét duyệt</h2>
		<br><br><br>
		<p>Đang về trang tài khoản trong vòng <strong>5</strong> giây</p>
		<div class="progress" style="width: 60%">
			<div class="progress-bar progress-bar-success" id="progBar" role="progressbar" style="-webkit-transition: none !important;transition: none !important;"></div>
		</div>
		<a href="../" class="btn btn-success btn-lg">Về trang chủ</a>
	</div>
	<div id="footer" style="position: fixed;bottom: 0">
		@ 2020 - Bản quyền của ACC GAMING
	</div>
</body>
</html>