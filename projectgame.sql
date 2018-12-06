-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2018 at 12:21 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectgame`
--

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maDonHang` int(11) NOT NULL,
  `ngaydathang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `maTK` int(11) NOT NULL,
  `maSP` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `tongTien` int(11) DEFAULT NULL,
  `tinhTrang` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maDonHang`, `ngaydathang`, `maTK`, `maSP`, `gia`, `soluong`, `tongTien`, `tinhTrang`) VALUES
(1, '2018-11-28 03:44:03', 1, 5, 290000, 1, 290000, 1),
(2, '2018-11-28 04:11:16', 1, 1, 120000, 1, 120000, 1),
(3, '2018-11-28 04:24:25', 1, 2, 155000, 1, 155000, 1),
(4, '2018-11-28 04:26:13', 1, 2, 155000, 1, 155000, 1),
(5, '2018-11-28 04:26:35', 1, 3, 190000, 1, 190000, 1),
(6, '2018-11-28 04:41:50', 1, 2, 155000, 1, 155000, 1),
(7, '2018-11-28 04:49:51', 1, 2, 155000, 1, 155000, 1),
(8, '2018-11-28 04:54:16', 1, 2, 155000, 1, 155000, 1),
(9, '2018-11-28 04:54:26', 1, 2, 155000, 1, 155000, 1),
(10, '2018-11-28 04:56:06', 1, 7, 320000, 1, 320000, 1),
(11, '2018-11-28 04:56:34', 1, 11, 399000, 1, 399000, 1),
(12, '2018-11-28 04:56:41', 1, 11, 399000, 1, 399000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nsx`
--

CREATE TABLE `nsx` (
  `maNSX` int(11) NOT NULL,
  `tenNSX` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nsx`
--

INSERT INTO `nsx` (`maNSX`, `tenNSX`) VALUES
(1, 'Ubisoft'),
(2, 'Rockstar'),
(3, 'Treyarch'),
(4, 'Square Enix'),
(5, 'Red Barrels'),
(6, 'Valve'),
(7, 'Endnight Games Ltd'),
(8, 'Namco Bandai');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `maNSX` int(11) DEFAULT NULL,
  `maTheLoai` int(11) DEFAULT NULL,
  `tenSP` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soLuong` int(11) DEFAULT NULL,
  `maAnh` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `moTa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `maNSX`, `maTheLoai`, `tenSP`, `gia`, `soLuong`, `maAnh`, `moTa`) VALUES
(1, 1, 4, 'Assassin\'s Creed Origins', 120000, 100, 'img/assasin.webp', ''),
(2, 1, 1, 'Farcry Priminal', 155000, 100, 'img/farcry.webp', ''),
(3, 1, 2, 'Watchdogs 2', 190000, 100, 'img/watchdog2.jpg', ''),
(4, 2, 4, 'Grand Theft Auto V', 540000, 100, 'img/gtav.jpg', ''),
(5, 3, 3, 'Call Of Duty Black Ops 3', 290000, 100, 'img/cod3.webp', ''),
(6, 3, 3, 'Call Of Duty Black Ops 2', 250000, 100, 'img/cod2.webp', ''),
(7, 4, 2, 'Just Cause 3', 320000, 100, 'img/jc3.webp', ''),
(8, 5, 7, 'Outlast 2', 399000, 100, 'img/outlast 2.webp', ''),
(9, 6, 3, 'Left 4 Dead 2', 24000, 100, 'img/l4d2.jpg', ''),
(10, 6, 5, 'The Forest', 699000, 100, 'img/forest.webp', ''),
(11, 7, 8, 'Naruto Shippuden Ultimate Ninja Storm ', 399000, 100, 'img/shippuden.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `theloai`
--

CREATE TABLE `theloai` (
  `maTheLoai` int(11) NOT NULL,
  `theLoai` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `theloai`
--

INSERT INTO `theloai` (`maTheLoai`, `theLoai`) VALUES
(1, 'Hành động'),
(2, 'Phiêu lưu'),
(3, 'FPS'),
(4, 'Thế giới mở'),
(5, 'Sinh tồn'),
(6, 'Chiến thuật'),
(7, 'Kinh dị'),
(8, 'Đối kháng');

-- --------------------------------------------------------

--
-- Table structure for table `tkadmin`
--

CREATE TABLE `tkadmin` (
  `maTK` int(11) NOT NULL,
  `tenTK` varchar(200) DEFAULT NULL,
  `matKhau` varchar(200) DEFAULT NULL,
  `sdt` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `maQuyen` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tkuser`
--

CREATE TABLE `tkuser` (
  `maTK` int(11) NOT NULL,
  `tenKH` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `sdt` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `tenTK` varchar(200) DEFAULT NULL,
  `matKhau` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkuser`
--

INSERT INTO `tkuser` (`maTK`, `tenKH`, `sdt`, `email`, `tenTK`, `matKhau`) VALUES
(1, 'Duc Minh', '975928214', '3dogize@gmail.com', 'mybabysexy', 'Cuccutvang123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `maSP` (`maSP`),
  ADD KEY `gia` (`gia`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `nsx`
--
ALTER TABLE `nsx`
  ADD PRIMARY KEY (`maNSX`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `maNSX` (`maNSX`),
  ADD KEY `maTheLoai` (`maTheLoai`),
  ADD KEY `maSP` (`maSP`),
  ADD KEY `gia` (`gia`);

--
-- Indexes for table `theloai`
--
ALTER TABLE `theloai`
  ADD PRIMARY KEY (`maTheLoai`);

--
-- Indexes for table `tkadmin`
--
ALTER TABLE `tkadmin`
  ADD PRIMARY KEY (`maTK`);

--
-- Indexes for table `tkuser`
--
ALTER TABLE `tkuser`
  ADD PRIMARY KEY (`maTK`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `nsx`
--
ALTER TABLE `nsx`
  MODIFY `maNSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `maTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tkadmin`
--
ALTER TABLE `tkadmin`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tkuser`
--
ALTER TABLE `tkuser`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`),
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`maTK`) REFERENCES `tkuser` (`maTK`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maNSX`) REFERENCES `nsx` (`maNSX`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`maTheLoai`) REFERENCES `theloai` (`maTheLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
