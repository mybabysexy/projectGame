<!-- Sidebar Menu -->
<ul class="sidebar-menu" data-widget="tree">
<li class="header">CÔNG CỤ</li>

<li class="<?php if(isset($trang_chu)) echo "active" ?>">
	<a href="./">
		<i class="fa fa-home"></i> <span>Trang chủ</span>
	</a>
</li>

<li class="<?php if(isset($danh_sach_hoa_don)) echo "active" ?>">
	<a href="listbill.php">
		<i class="fa fa-money"></i> <span>Danh sách hoá đơn</span>
	</a>
</li>
<li class="<?php if(isset($danh_sach_game)) echo "active" ?>">
	<a href="listgame.php">
		<i class="fa fa-gamepad"></i> <span>Danh sách game</span>
	</a>
</li>
<li class="<?php if(isset($nha_san_xuat) || isset($the_loai)) echo "active" ?>">
	<a href="nsx_theloai.php">
		<i class="fa fa-industry"></i> <span>Nhà sản xuất & Thể loại</span>
	</a>
</li>

<li class="header">TÀI KHOẢN</li>
<li class="<?php if(isset($tai_khoan_thue)) echo "active" ?>">
	<a href="taikhoanthue.php">
		<i class="fa fa-user-circle"></i> <span>Tài khoản cho thuê</span>
	</a>
</li>
<li class="<?php if(isset($danh_sach_khach_hang)) echo "active" ?>">
	<a href="taikhoan.php">
		<i class="fa fa-odnoklassniki"></i> <span>Danh sách khách hàng</span>
	</a>
</li>

<?php 
	if ($_SESSION['quyenAD']) {
		?>
			<li class="<?php if(isset($danh_sach_nhan_vien)) echo "active" ?>">
				<a href="taikhoanAD/">
					<i class="fa fa-black-tie"></i> <span>Danh sách nhân viên</span>
				</a>
			</li>
		<?php
	}
?>
</ul>