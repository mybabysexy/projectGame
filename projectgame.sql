-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 20, 2019 at 10:28 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

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
-- Table structure for table `giaThue`
--

CREATE TABLE `giaThue` (
  `loaiGia` int(11) NOT NULL,
  `gia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `giaThue`
--

INSERT INTO `giaThue` (`loaiGia`, `gia`) VALUES
(1, 3000),
(2, 2500),
(3, 2000),
(4, 1500);

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE `hoadon` (
  `maDonHang` int(11) NOT NULL,
  `ngaydathang` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `maTK` int(11) NOT NULL,
  `tongTien` int(11) DEFAULT NULL,
  `tinhTrang` tinyint(4) DEFAULT NULL,
  `loaiGiaoDich` tinyint(4) NOT NULL,
  `hanSuDung` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`maDonHang`, `ngaydathang`, `maTK`, `tongTien`, `tinhTrang`, `loaiGiaoDich`, `hanSuDung`) VALUES
(1, '2019-01-21 13:27:27', 3, 18000, 3, 1, '2019-01-21 14:27:27'),
(2, '2019-01-22 04:49:36', 3, 24000, 3, 1, '2019-01-22 06:15:36'),
(3, '2019-01-22 04:50:49', 3, 18000, 3, 1, '2019-01-22 07:50:49'),
(4, '2019-01-22 05:15:20', 3, 0, 2, 1, '2019-01-22 09:15:20'),
(5, '2019-01-22 05:16:38', 3, 20000, 3, 1, '2019-01-22 09:16:38'),
(6, '2019-01-22 12:06:54', 3, 6000, 3, 1, '2019-01-22 12:13:35'),
(7, '2019-01-22 12:06:46', 3, 3000, 3, 1, '2019-01-22 12:17:00'),
(8, '2019-01-22 12:17:59', 3, 190000, 1, 0, NULL),
(9, '2019-01-22 12:28:19', 3, 1320000, 2, 0, NULL),
(10, '2019-01-23 01:26:32', 3, 3000, 3, 1, '2019-01-23 02:26:32'),
(11, '2019-01-23 01:29:55', 3, 290000, 1, 0, NULL),
(12, '2019-01-23 02:31:48', 3, 798000, 1, 0, NULL),
(13, '2019-01-23 03:47:22', 3, 9000, 1, 1, '2019-01-23 04:47:22'),
(14, '2019-01-23 03:48:11', 3, 2097000, 1, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `maDonHang` int(11) DEFAULT NULL,
  `maSP` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `keyGame` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`maDonHang`, `maSP`, `gia`, `soluong`, `keyGame`) VALUES
(8, 3, 190000, 1, NULL),
(9, 1, 120000, 11, NULL),
(11, 5, 290000, 1, '8XLQX-GEDYU-124OS'),
(12, 8, 399000, 2, 'OZFWS-SLFHS-RYX9B'),
(14, 10, 699000, 3, 'CTIWV-CGDIN-WXGSN,CXVYT-2N1OV-VI1UQ,JIFCQ-FZLYS-URCEZ');

-- --------------------------------------------------------

--
-- Table structure for table `hoadonchitietthue`
--

CREATE TABLE `hoadonchitietthue` (
  `STT` int(11) NOT NULL,
  `maDonHang` int(11) DEFAULT NULL,
  `maSP` int(11) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `tinhTrang` tinyint(4) DEFAULT '0',
  `maTKthue` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hoadonchitietthue`
--

INSERT INTO `hoadonchitietthue` (`STT`, `maDonHang`, `maSP`, `gia`, `soluong`, `tinhTrang`, `maTKthue`) VALUES
(1, 1, 1, 3000, 3, 2, '5,6,7'),
(2, 1, 2, 3000, 2, 2, '8,9'),
(3, 1, 3, 3000, 1, 2, '10'),
(4, 2, 7, 6000, 1, 2, '1'),
(5, 2, 8, 6000, 1, 2, '2'),
(6, 2, 9, 6000, 1, 2, '3'),
(7, 2, 10, 6000, 1, 2, '4'),
(8, 3, 6, 9000, 2, 2, '1,2'),
(9, 4, 1, 0, 1, 0, NULL),
(10, 5, 2, 10000, 2, 2, '1,2'),
(11, 6, 2, 3000, 2, 2, '2,3'),
(12, 7, 5, 3000, 1, 2, '1'),
(13, 10, 1, 3000, 1, 2, '1'),
(14, 13, 2, 3000, 2, 1, '1,2'),
(15, 13, 11, 3000, 1, 1, '3');

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
(8, 'Namco Bandai'),
(9, 'Electronic Arts'),
(10, 'Konami'),
(11, 'Rebellion');

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
  `moTa` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `cauHinh` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `maNSX`, `maTheLoai`, `tenSP`, `gia`, `soLuong`, `maAnh`, `moTa`, `cauHinh`) VALUES
(1, 1, 4, 'Assassin Creed Origins', 120000, 88, '../img/assasin.webp', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Rốt cuộc sau h&agrave;ng th&aacute;ng trời khiến người chơi phải đo&aacute;n gi&agrave; đo&aacute;n non với những tin đồn đủ kiểu, s&aacute;ng nay theo giờ Việt Nam (27-10-2017), tại buổi họp b&aacute;o ch&iacute;nh thức trước thềm E3 2017 của Microsoft, d&ograve;ng game&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/Games-Series/assassins-creed-series--48\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed</span></a>đ&atilde; ch&iacute;nh thức trở lại với phi&ecirc;n bản mới. Đ&oacute; ch&iacute;nh l&agrave;&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Đ&uacute;ng như c&aacute;c đồn đo&aacute;n,&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>&nbsp;sẽ c&oacute; bối cảnh diễn ra tại Ai Cập cổ, nơi c&aacute;c Pharaoh vẫn nắm quyền trị v&igrave; đất nước của c&aacute;c Kim tự th&aacute;p. Cụ thể hơn, c&aacute;c sự kiện của&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>&nbsp;v&agrave;o thời kỳ Đế quốc La M&atilde; đ&atilde; đặt ch&acirc;n đến Ai Cập v&agrave; đang t&igrave;m c&aacute;ch dần dần khống chế đất nước n&agrave;y.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Nh&acirc;n vật ch&iacute;nh của game l&agrave; Bayek &ndash; chiến binh l&atilde;o luyện được xem như một trong &ldquo;l&aacute; chắn&rdquo; bảo hộ của Ai Cập v&agrave; ch&iacute;nh l&agrave; người đ&atilde; mở đường s&aacute;ng lập hội S&aacute;t Thủ &ndash;&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/f1/Games/assassin-s-creed-2-brotherhood-2010-44\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Brotherhood</span></a>&nbsp;&ndash; về sau n&agrave;y.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">B&ecirc;n cạnh thế giới mở rộng lớn, đa dạng mang &ldquo;thương hiệu&rdquo; Ubisoft trải d&agrave;i từ những dải sa mạc kh&ocirc; cằn đến những ốc đảo xanh tươi, từ những con s&oacute;ng bạc của Địa Trung Hải bao lao đến những kim tự th&aacute;p sừng sững tr&ecirc;n cao nguy&ecirc;n Giza thần th&aacute;nh,&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>&nbsp;c&ograve;n hứa hẹn mang đến sự cải tiến mạnh mẽ trong lối chơi của m&igrave;nh, đề cao sự tự do v&agrave; khả năng triển khai c&aacute;c kế hoạch của người chơi cũng như cơ chế chiến đấu được l&agrave;m mới một c&aacute;ch ph&ugrave; hợp với bước tiến của&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/Games-Series/assassins-creed-series--48\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed</span></a>&nbsp;trong phi&ecirc;n bản mới nhất n&agrave;y.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">D&ograve;ng game&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/Games-Series/assassins-creed-series--48\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed</span></a>&nbsp;lu&ocirc;n được biết đến như một phương ph&aacute;p&hellip; học tập lịch sử sinh động v&agrave; hết sức l&yacute; tưởng đối với những ai y&ecirc;u th&iacute;ch t&igrave;m hiểu những thời kỳ m&agrave; thương hiệu n&agrave;y đ&atilde; gh&eacute; thăm nhưng lại kh&ocirc;ng muốn gắn đ&ocirc;i mắt m&igrave;nh v&agrave;o những trang s&aacute;ch đơn điệu. V&agrave; với&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>, Ubisoft sẽ ph&aacute;t huy &ldquo;truyền thống&rdquo; n&agrave;y của&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/Games-Series/assassins-creed-series--48\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed</span></a>&nbsp;mạnh mẽ hơn bao giờ hết.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><br style=\"box-sizing: border-box;\" />Mới đ&acirc;y, h&atilde;ng game Ph&aacute;p đ&atilde; c&ocirc;ng bố chế độ chơi Discovery Tour (t&ecirc;n đầy đủ: Discovery Tour by Assassin&rsquo;s Creed: Ancient Egypt) của&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>. Đến với phi&ecirc;n bản&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/Games-Series/assassins-creed-series--48\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed</span></a>&nbsp;mới nhất v&agrave;o đầu năm sau th&ocirc;ng qua một bản cập nhật nội dung miễn ph&iacute;, Discovery Tour l&agrave; phần chơi thi&ecirc;n ho&agrave;n to&agrave;n về yếu tố gi&aacute;o dục kết hợp giải tr&iacute;, tập trung cung cấp cho người chơi c&aacute;c th&ocirc;ng tin về lịch sử, địa l&yacute;, văn h&oacute;a,&hellip; của đất nước Ai Cập thời cổ đại khi cho ph&eacute;p bạn thoải m&aacute;i &ldquo;du lịch&rdquo; trong thế giới của&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>&nbsp;như một lữ kh&aacute;ch thay v&igrave; một chiến binh.<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />Phỏng theo ch&iacute;nh sử, thế giới của&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Assassin&rsquo;s Creed Origins</span>&nbsp;l&agrave; nơi c&aacute;c thế lực ch&iacute;nh trị v&agrave; qu&acirc;n sự trong lẫn ngo&agrave;i Ai Cập, đặc biệt l&agrave; đế quốc La M&atilde; h&ugrave;ng mạnh, tranh gi&agrave;nh ảnh hưởng quyết liệt trong thời kỳ trị v&igrave; của Nữ Ho&agrave;ng Cleopatra &ndash; vị Pharaoh cuối c&ugrave;ng của Ai Cập. Giữa ho&agrave;n cảnh lịch sử phức tạp đ&oacute;, nh&acirc;n vật ch&iacute;nh Bayek sẽ đ&oacute;ng một vai tr&ograve; quan trọng ảnh hưởng kh&ocirc;ng nhỏ đến c&aacute;n c&acirc;n quyền lực ở đất nước của c&aacute;c Kim Tự Th&aacute;p cũng như c&oacute; ảnh hưởng s&acirc;u sắc đến sự h&igrave;nh th&agrave;nh tổ chức Assassin.</p>', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">MINIMUM:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7 SP1, Windows 8.1, Windows 10 (64-bit versions only)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Intel Core i5-2400s @ 2.5 GHz or AMD FX-6350 @ 3.9 GHz or equivalent</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 6 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: NVIDIA GeForce GTX 660 or AMD R9 270 (2048 MB VRAM with Shader Model 5.0 or better)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">DirectX: Version 11</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Storage: 42 GB available space</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Additional Notes: Video Preset: Lowest (720p)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">RECOMMENDED:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7 SP1, Windows 8.1, Windows 10 (64-bit versions only)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Intel Core i7- 3770 @ 3.5 GHz or AMD FX-8350 @ 4.0 GHz</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 8 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: NVIDIA GeForce GTX 760 or AMD R9 280X (3GB VRAM with Shader Model 5.0 or better)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Storage: 42 GB available space</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Additional Notes: Video Preset: High (1080p)</span></p>'),
(2, 1, 1, 'Farcry Priminal', 155000, 19, '../img/farcry.webp', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Far Cry Primal - Far Cry</span>&nbsp;thường đặt bạn ở r&igrave;a của thế giới được biết đến, trong một bi&ecirc;n giới xinh đẹp, v&ocirc; luật v&agrave; man rợ. The Stone Age, trong một c&aacute;ch, bi&ecirc;n giới đầu ti&ecirc;n cho lo&agrave;i người; đ&oacute; l&agrave; thời gian khi con người đặt một c&acirc;y gậy xuống đất v&agrave; tuy&ecirc;n bố mặt đất cho ri&ecirc;ng m&igrave;nh, thời gian khi ch&uacute;ng ta bắt đầu leo l&ecirc;n c&aacute;c chuỗi thức ăn. Điều đ&oacute; đến với c&aacute;c cuộc xung đột, kh&ocirc;ng chỉ chống lại những con người kh&aacute;c của lo&agrave;i người, m&agrave; c&ograve;n chống lại thi&ecirc;n nhi&ecirc;n.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Seri Far Cry vẫn chứng tỏ sức mạnh của sự s&aacute;ng tạo của m&igrave;nh khi giới thiệu&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Far Cry Primal</span>. Bắt đầu từ thi&ecirc;n đường nhiệt đới với biển xanh c&aacute;t trắng trong Far Cry v&agrave; Far Cry 3, trải qua những đồng cỏ nắng ch&aacute;y của ch&acirc;u Phi trongFar Cry 2, rồi l&ecirc;n v&ugrave;ng n&uacute;i tuyết của d&atilde;y Himalaya trong Far Cry 4, b&acirc;y giờ Ubisoft lại đưa c&aacute;c bạn đi v&agrave;o cuộc đấu tranh ban đầu cho sự sống c&ograve;n của nh&acirc;n loại với gameplay sandbox thế giới mở, những con th&uacute; to lớn, m&ocirc;i trường ngoạn mục, v&agrave; những cuộc gặp gỡ kh&ocirc;ng thể đo&aacute;n trước trong Far Cry Primal.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Ch&agrave;o mừng bạn đến thời kỳ đồ đ&aacute;, một thời kỳ m&agrave; nguy hiểm l&agrave; ở khắp nơi v&agrave; cuộc phi&ecirc;u lưu v&ocirc; hạn, nơi m&agrave; những con voi mam&uacute;t khổng lồ v&agrave; hổ hổ răng kiếm cai trị tr&aacute;i đất, v&agrave; con người chỉ l&agrave; động vật ở dưới c&ugrave;ng của chuỗi thức ăn. L&agrave; người sống s&oacute;t cuối c&ugrave;ng của nh&oacute;m, c&aacute;c bạn sẽ t&igrave;m hiểu để x&acirc;y một kho vũ kh&iacute; chết người, chống lại những kẻ săn mồi hung dữ v&agrave; c&aacute;c bộ lạc th&ugrave; địch, chứng minh con người l&agrave; động vật th&ocirc;ng minh hơn tất cả c&aacute;c lo&agrave;i, cứu nh&acirc;n loại v&agrave; chinh phục thế giới n&agrave;y.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff;\">T&iacute;nh năng</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Far Cry Primal l&agrave; Far Cry đầu ti&ecirc;n kh&ocirc;ng c&oacute; s&uacute;ng</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Far Cry Primal được thiết lập trong năm 10.000 BC, trong thời kỳ đồ đ&aacute;, nơi m&agrave; con người bắt đầu sử dụng đ&aacute; để tạo ra c&aacute;c c&ocirc;ng cụ cho cuộc sống h&agrave;ng ng&agrave;y của họ. Đ&oacute; l&agrave; thời gian m&agrave; con người phải đối mặt với nhiều th&aacute;ch thức để tồn tại, kh&ocirc;ng chỉ những th&aacute;ch thức của thi&ecirc;n nhi&ecirc;n khắc nghiệt m&agrave; cả xung đột với những bộ lạc kh&aacute;c nhau. C&aacute;c bạn sẽ v&agrave;o vai một thợ săn t&ecirc;n l&agrave; Takkar, người đang bị mắc kẹt trong Oros, một thung lũng bao phủ bởi băng gi&aacute;, kh&ocirc;ng c&oacute; vũ kh&iacute; v&agrave; t&agrave;i nguy&ecirc;n v&agrave; l&agrave; người sống s&oacute;t duy nhất của nh&oacute;m săn bắn ban đầu của m&igrave;nh.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Oros l&agrave; một thế giới mở đầy động vật hoang d&atilde; như voi ma m&uacute;t v&agrave; hổ răng kiếm. Do game được thiết lập trong thời cổ đại, c&aacute;c cơ chế gameplay truyền thống như l&aacute;i xe hay bắn s&uacute;ng đặc trưng của seri đ&atilde; được gỡ bỏ, v&agrave; c&aacute;c bạn chỉ c&oacute; thể tiếp cận với vũ kh&iacute; cận chiến như gi&aacute;o, r&igrave;u, b&uacute;a, cung t&ecirc;n... C&aacute;c bạn cũng kh&ocirc;ng thể mua vũ kh&iacute;, m&agrave; phải tạo ra ch&uacute;ng bằng c&aacute;ch sử dụng vật liệu lượm lặt được như gỗ v&agrave; đ&aacute;. Khi c&aacute;c bạn tiến bộ trong game, ta c&oacute; thể chế ra c&aacute;c vũ kh&iacute; nguy hiểm hơn. C&aacute;c bạn cũng phải săn t&igrave;m thức ăn v&agrave; học hỏi để tạo ra lửa. B&ecirc;n cạnh việc phải đối mặt với kẻ th&ugrave; tự nhi&ecirc;n, c&aacute;c bạn cũng sẽ c&oacute; cơ hội để trở th&agrave;nh t&ugrave; trưởng của một bộ lạc, v&agrave; dẫn dắt bộ lạc ph&aacute;t triển. Với t&iacute;nh năng n&agrave;y, c&aacute;c bạn c&oacute; nhiệm vụ quản l&yacute; v&agrave; bảo vệ c&aacute;c th&agrave;nh vi&ecirc;n bộ lạc. Far Cry Primal cũng c&oacute; t&iacute;nh năng chu kỳ ng&agrave;y-đ&ecirc;m, m&agrave; sẽ ảnh hưởng đến gameplay của tr&ograve; chơi. V&agrave;o ban đ&ecirc;m, một số kẻ th&ugrave; trở n&ecirc;n hung hăng hơn v&agrave; nguy hiểm. C&aacute;c bạn c&oacute; thể sử dụng lửa như một c&ocirc;ng cụ để bảo vệ hoặc đi săn v&agrave;o ban đ&ecirc;m.</p>', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">MINIMUM:&nbsp;</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7, Windows 8.1, Windows 10 (64-bit versions only)<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Processor: Intel Core i3-550 | AMD Phenom II X4 955 or equivalent<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Memory: 4 GB RAM<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Graphics: NVIDIA GeForce GTX 460 (1GB VRAM) | AMD Radeon HD 5770 (1GB VRAM) or equivalent<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Storage: 20 GB available space<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" /><br style=\"box-sizing: border-box;\" /></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 20px; color: #0000ff;\">RECOMMENDED:&nbsp;</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7, Windows 8.1, Windows 10 (64-bit versions only)<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Processor: Intel Core i7-2600K | AMD FX-8350 or equivalent<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Memory: 8 GB RAM<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Graphics: NVIDIA GeForce GTX 780 | AMD Radeon R9 280X or equivalent<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Storage: 20 GB available space</span></p>'),
(3, 1, 2, 'Watchdogs 2', 190000, 2, '../img/watchdog2.jpg', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Watch Dogs 2 (Watch_Dogs 2)</span>&nbsp;l&agrave; game h&agrave;nh động, phi&ecirc;u lưu, l&eacute;n l&uacute;t (stealth), thế giới mở. C&aacute;c bạn trong vai Marcus, một hacker trẻ tuổi v&agrave; t&agrave;i năng c&ugrave;ng với nh&oacute;m của m&igrave;nh thực hiện vụ hack lớn nhất trong lịch sử; Hạ gục ctOS 2.0, một hệ thống gi&aacute;m s&aacute;t c&aacute;c c&ocirc;ng d&acirc;n trong th&agrave;nh phố</p>', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">MINIMUM:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7 SP1, Windows 8.1, Windows 10 (64bit versions only)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Intel Core i5 2400s @ 2.5 GHz, AMD FX 6120 @ 3.5 GHz or better</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 6 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: NVIDIA GeForce GTX 660 with 2 GB VRAM or AMD Radeon HD 7870, with 2 GB VRAM or better - See supported List*</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Network: Broadband Internet connection</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Storage: 50 GB available space</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Sound Card: DirectX compatible using the latest drivers</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Additional Notes: Periphericals: Microsoft Xbox One Controller, DUALSHOCK&reg; 4 Controller, Windows-compatible keyboard, mouse, optional controller / Multiplayer: 256 kbps or faster broadband connection / Note: This product supports 64-bit operating systems only. Laptop versions of these cards may work, but are not officially supported. For the most up-to-date requirement listings, please visit the FAQ on our support website at support.ubi.com. High speed internet access and a valid Ubisoft account are required to activate the game after installation, to authenticate your system and continue gameplay after any re-activation, access online features, play online or unlock exclusive content.</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">RECOMMENDED:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7 SP1, Windows 8.1, Windows 10 (64bit versions only)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Intel Core i5 3470 @ 3.2 GHz, AMD FX 8120 @ 3.9 GHz</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 8 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: NVIDIA GeForce GTX 780 | AMD Radeon R9 290, with 3GB VRAM or better - See supported List*</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Network: Broadband Internet connection</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Storage: 50 GB available space</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Sound Card: DirectX-compatible using the latest drivers</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Additional Notes: SUPPORTED VIDEO CARDS AT TIME OF RELEASE: &bull; NVIDIA&reg; GeForce&reg; GTX600 Series: GTX660 or better / GeForce&reg; GTX700 Series: GTX760 or better / GeForce&reg; GTX900 Series: GTX950 or better / GeForce&reg; GTX1000 Series: GTX1060 or better. &bull; AMD Radeon&trade; HD 7000 series: Radeon&trade; HD7870 or better / Radeon&trade; 200 series: Radeon R9 270 or better / Radeon&trade; 300/Fury X series: Radeon&trade; R9 370 or better / Radeon 400 series: Radeon RX460 or better.</span></p>'),
(4, 2, 4, 'Grand Theft Auto V', 390000, 3, '../img/gtav.jpg', '<p><span style=\"box-sizing: border-box; font-weight: bold; font-family: Roboto, sans-serif; font-size: 16px;\">Grand Theft Auto V</span><span style=\"font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;(hay GTA V, GTA 5) l&agrave; một game phi&ecirc;u lưu h&agrave;nh động thế giới mở ph&aacute;t triển v&agrave; xuất bản bởi Rockstar Games . GTA V sẽ được thiết lập trong th&agrave;nh phố hư cấu Los Santos ở bang San Andreas v&agrave; c&aacute;c khu vực xung quanh của n&oacute;, dựa tr&ecirc;n Los Angeles v&agrave; Nam California.</span></p>', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">MINIMUM:&nbsp;</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><br style=\"box-sizing: border-box;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 8.1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1, Windows Vista 64 Bit Service Pack 2* (*NVIDIA video card recommended if running Vista OS)<br style=\"box-sizing: border-box;\" />Processor: Intel Core 2 Quad CPU Q6600 @ 2.40GHz (4 CPUs) / AMD Phenom 9850 Quad-Core Processor (4 CPUs) @ 2.5GHz<br style=\"box-sizing: border-box;\" />Memory: 4 GB RAM<br style=\"box-sizing: border-box;\" />Graphics: NVIDIA 9800 GT 1GB / AMD HD 4870 1GB (DX 10, 10.1, 11)<br style=\"box-sizing: border-box;\" />Hard Drive: 65 GB available space<br style=\"box-sizing: border-box;\" />Sound Card: 100% DirectX 10 compatible&nbsp;</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; font-size: 20px; color: #0000ff;\">RECOMMENDED:&nbsp;</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><br style=\"box-sizing: border-box;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 8.1 64 Bit, Windows 8 64 Bit, Windows 7 64 Bit Service Pack 1<br style=\"box-sizing: border-box;\" />Processor: Intel Core i5 3470 @ 3.2GHz (4 CPUs) / AMD X8 FX-8350 @ 4GHz (8 CPUs)<br style=\"box-sizing: border-box;\" />Memory: 8 GB RAM<br style=\"box-sizing: border-box;\" />Graphics: NVIDIA GTX 660 2GB / AMD HD 7870 2GB<br style=\"box-sizing: border-box;\" />Hard Drive: 65 GB available space<br style=\"box-sizing: border-box;\" />Sound Card: 100% DirectX 10 compatible</span></p>'),
(5, 3, 3, 'Call Of Duty Black Ops 3', 290000, 99, '../img/cod3.webp', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Call of Duty Black Ops III</span>&nbsp;(Call of Duty Black Ops 3, Call of Duty 2015, Call of Duty 12) l&agrave; game bắn s&uacute;ng g&oacute;c nh&igrave;n thứ nhất, l&agrave; phi&ecirc;n bản thứ 12 trong seri Call of Duty. Game đưa người chơi v&agrave;o chiến trường mạnh mẽ của tương lai, nơi m&agrave; c&ocirc;ng nghệ sinh học đ&atilde; cho ph&eacute;p tạo ra những người l&iacute;nh c&ocirc;ng nghệ cao, những qu&acirc;n nh&acirc;n nửa người nửa robot với những khả năng vượt trội.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Lịch sử đ&atilde; chứng minh, từ khi con người c&ograve;n lấy đ&aacute; n&eacute;m nhau, rồi chiến đấu bằng cung t&ecirc;n gươm gi&aacute;o...cho đến ng&agrave;y nay, lu&ocirc;n c&oacute; một ai đ&oacute; muốn thống trị nh&acirc;n loại (hay &iacute;t nhất cũng l&agrave; một phần nh&acirc;n loại). V&agrave; Call of Duty Black Ops III cũng giới thiệu một c&acirc;u truyện như vậy. C&aacute;c bạn sẽ theo ch&acirc;n một đội Black Ops trong một hoạt động cứu hộ khi họ kh&aacute;m ph&aacute; ra một &acirc;m mưu đe dọa tất cả thế giới. C&aacute;c bạn được k&ecirc;u gọi để điều tra sự biến mất của một nh&oacute;m CIA tại Singapore. Trong qu&aacute; tr&igrave;nh thực thi nhiệm vụ, họ đ&atilde; mất li&ecirc;n lạc với trung t&acirc;m trong một vụ r&ograve; rỉ th&ocirc;ng tin t&igrave;nh b&aacute;o qu&acirc;n sự lớn nhất trong lịch sử. \"Bạn phải t&igrave;m ra sự thật\", &nbsp;\"Th&agrave;nh vi&ecirc;n trong nh&oacute;m của ta đang mất t&iacute;ch, v&agrave; th&ocirc;ng tin đang đưa ch&uacute;ng ta đến Cairo.\" Ch&agrave;o mừng bạn đến với năm 2065 trong Call of Duty Black Ops III.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">- Trong Campaign mode, c&aacute;c bạn phải đi du lịch qua một loạy c&aacute;c điểm n&oacute;ng của một cuộc Chiến tranh Lạnh mới để t&igrave;m những đồng đội bị mất t&iacute;ch của bạn. C&aacute;c bạn c&oacute; thể chơi Campaign một m&igrave;nh (Solo) hoặc hợp t&aacute;c với bạn b&egrave; (cooperatively).</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">- Multiplayer sẽ mang đến cho c&aacute;c bạn một di chuyển mới, cho ph&eacute;p c&aacute;c bạni di chuyển &ecirc;m &aacute;i, th&ocirc;ng qua m&ocirc;i trường với sự kh&eacute;o l&eacute;o, sử dụng kiểm so&aacute;t lực đẩy nhảy, trượt, ...Black Ops III multiplayer cũng giới thiệu đến c&aacute;c bạn hệ thống ph&aacute;t triển nh&acirc;n vật mới, cho ph&eacute;p c&aacute;c bạn n&acirc;ng cao khả năng l&agrave;m chủ vũ kh&iacute; v&agrave; khả năng thiện chiến của m&igrave;nh th&ocirc;ng qua một hệ thống tiến triển v&agrave; mở kh&oacute;a dựa tr&ecirc;n c&aacute;c thử th&aacute;ch.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">- Kh&ocirc;ng c&oacute; phi&ecirc;n bản Call of Duty n&agrave;o của Treyarch m&agrave; kh&ocirc;ng c&oacute; chế độ Zombies. \"Shadows of Evil\" c&oacute; cốt truyện ri&ecirc;ng biệt của n&oacute;, thiết lập trong năm 1940 tại Th&agrave;nh phố Morg hư cấu, nơi bốn nh&acirc;n vật (femme fatale, magician, detective, boxer) gặp nhau trong một bộ phim lấy cảm hứng từ c&aacute;c c&acirc;u chuyện kinh dị.</p>', '<p><span style=\"box-sizing: border-box; font-weight: bold; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">OS: Windows 7 64-Bit / Windows 8 64-Bit / Windows 8.1 64-Bit<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Processor: Intel&reg; Core&trade; i3-530 @ 2.93 GHz / AMD Phenom&trade; II X4 810 @ 2.60 GHz<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Memory: 6 GB RAM<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Graphics: NVIDIA&reg; GeForce&reg; GTX 470 @ 1GB / ATI&reg; Radeon&trade; HD 6970 @ 1GB<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />DirectX: Version 11<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Network: Broadband Internet connection<br style=\"box-sizing: border-box; padding: 0px; margin: 0px;\" />Sound Card: DirectX Compatible</span></p>'),
(6, 3, 3, 'Call Of Duty Black Ops 2', 250000, 100, '../img/cod2.webp', NULL, ''),
(7, 4, 2, 'Just Cause 3', 320000, 100, '../img/jc3.webp', NULL, ''),
(8, 5, 7, 'Outlast 2', 399000, 98, '../img/outlast 2.webp', NULL, ''),
(9, 6, 3, 'Left 4 Dead 2', 24000, 100, '../img/l4d2.jpg', NULL, ''),
(10, 6, 5, 'The Forest', 699000, 97, '../img/forest.webp', NULL, ''),
(11, 7, 8, 'Naruto Shippuden Ultimate Ninja Storm ', 399000, 100, '../img/shippuden.jpg', '', ''),
(12, 6, 4, 'Farm Together', 50000, 10, '../img/farmtogether.webp', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Farm Together</span>&nbsp;l&agrave; game n&ocirc;ng trại tr&ecirc;n nền đồ họa 3D do Milkstone Studios ph&aacute;t h&agrave;nh. mang đến cho người chơi cuộc sống b&igrave;nh dị, mộc mạc nơi đồng qu&ecirc; v&agrave; những trải nghiệm phong ph&uacute; trong x&acirc;y dựng v&agrave; quản l&yacute; trang trại của ch&iacute;nh m&igrave;nh.<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />Gameplay của&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Farm Together</span>&nbsp;giống như những game n&ocirc;ng trại kh&aacute;c, người chơi tự tay x&acirc;y dựng v&agrave; ph&aacute;t triển trang trại của m&igrave;nh hoặc hợp t&aacute;c với bạn b&egrave; từ một khoảng đất nhỏ, bắt đầu gieo trồng c&aacute;c lo&agrave;i c&acirc;y, tưới nước v&agrave; chăm s&oacute;c cho c&acirc;y trồng, chăn nu&ocirc;i gia s&uacute;c gia cầm v&agrave; cho ch&uacute;ng ăn; sau đ&oacute; thu hoạch v&agrave; b&aacute;n n&ocirc;ng sản. Sau một thời gian nhất định bạn sẽ trở th&agrave;nh chủ trang trại rộng lớn với sản phẩm phong ph&uacute;.<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" />D&agrave;nh cho c&aacute;c hệ điều h&agrave;nh di động, c&aacute;c bạn c&oacute; thể trải nghiệm tựa game N&ocirc;ng trại vui vẻ để trở th&agrave;nh người n&ocirc;ng d&acirc;n thực thụ, tận hưởng những niềm vui chốn th&ocirc;n qu&ecirc; d&acirc;n d&atilde;, game N&ocirc;ng trại vui vẻ c&oacute; đồ họa s&aacute;ng l&aacute;ng đẹp đẽ, &acirc;m thanh vui nhộn sinh động, h&igrave;nh ảnh ngộ nghĩnh đ&aacute;ng y&ecirc;u thu h&uacute;t người chơi.<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">Farm Together</span>&nbsp;cung cấp nhiều item t&ugrave;y chọn để bạn x&acirc;y dựng v&agrave; thiết kế n&ocirc;ng trại theo &yacute; muốn, từ h&agrave;ng r&agrave;o, lối đi, nh&agrave; cửa cho đến c&aacute;c đồ trang tr&iacute; kh&aacute;c. Một điểm th&uacute; vị kh&ocirc;ng thể kh&ocirc;ng nhắc đến trong game l&agrave; hệ thống nh&acirc;n vật dễ thương, cho ph&eacute;p t&ugrave;y chỉnh avatar, trang phục v&agrave; phương tiện.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: justify;\">Hiện tại&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">Farm Together</span>&nbsp;vẫn đang ở giai đoạn ph&aacute;t triển (Early Access) tr&ecirc;n&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://store.steampowered.com/about/\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">steam</span></a>, thường xuy&ecirc;n bổ sung c&aacute;c t&iacute;nh năng - vật phẩm v.v.. th&ocirc;ng qua c&aacute;c bản cập nhật (update).</p>', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">MINIMUM:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows Vista or newer</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Dual Core processor</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 2 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: DirectX 10 capable hardware</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">DirectX: Version 11</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">RECOMMENDED:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7 or newer</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Quad core processor</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 6 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: GeForce 960 or better</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">DirectX: Version 11</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Network: Broadband Internet connection</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Additional Notes: 64bit OS recommended</span></p>'),
(13, 9, 4, 'The Sims 4', 215000, 10, '../img/thesims4.webp', '<p><span style=\"box-sizing: border-box; font-weight: bold; font-family: Roboto, sans-serif; font-size: 16px;\">The Sims 4</span><span style=\"font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;l&agrave; một tr&ograve; chơi m&ocirc; phỏng cuộc sống. Đ&acirc;y l&agrave; phần thứ tư trong seri&nbsp;</span><a style=\"box-sizing: border-box; color: #1abc9c; font-family: Roboto, sans-serif; font-size: 16px; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/Games-Series/the-sims-series-96\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">The Sims</span></a><span style=\"font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;của Electronic Arts. Game tập trung v&agrave;o việc cải thiện Create-A-Sim nhằm c&aacute; nh&acirc;n ho&aacute; Sims v&agrave; lối chơi dựa tr&ecirc;n cảm x&uacute;c. Sims cũng sẽ c&oacute; thể l&agrave;m nhiều nhiệm vụ c&ugrave;ng một l&uacute;c, chẳng hạn vừa n&oacute;i chuyện vừa đi dạo c&ugrave;ng một l&uacute;c.</span></p>', '<div class=\"canhgiua visible-lg\" style=\"box-sizing: border-box; display: block !important; text-align: center; color: #000000; font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; background-color: #f2f2f3; text-decoration-style: initial; text-decoration-color: initial;\">&nbsp;</div>\r\n<div class=\"entry-content\" style=\"box-sizing: border-box; position: relative; color: #000000; font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; background: #444444; margin-top: 10px; margin-bottom: 10px;\">&nbsp;</div>\r\n<div class=\"panel panel-default\" style=\"box-sizing: border-box; margin-bottom: 10px; background-color: #ffffff; border: 1px solid #dddddd; border-radius: 4px; box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 1px; color: #000000; font-family: Roboto, sans-serif; font-size: 16px; font-style: normal; font-variant-ligatures: normal; font-variant-caps: normal; font-weight: 400; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-stroke-width: 0px; text-decoration-style: initial; text-decoration-color: initial; margin-top: 10px;\">\r\n<div id=\"cauhinhdiv\" style=\"box-sizing: border-box; padding: 10px;\">\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">Minimum</span></strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">&nbsp;</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">CPU: Intel Core 2 Duo E4300 or AMD Athlon 64 X2 4000+ (2.0 GHz Dual Core required if using integrated graphics)</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">CPU SPEED: Info</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">RAM: 2 GB</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows XP</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">VIDEO CARD: NVIDIA GeForce 6600 or ATI Radeon X1300 or Intel GMA X4500</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">SOUND CARD: Yes</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">FREE DISK SPACE: 30 GB</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">&nbsp;</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">Recommended</span></strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">&nbsp;</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">CPU: Intel Core i5-750 or AMD Athlon X4</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">CPU SPEED: Info</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">RAM: 4 GB</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">OS: 64 Bit Windows 7,8, or 8.1</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">VIDEO CARD: NVIDIA GeForce GTX 650 or better</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">SOUND CARD: Yes</strong></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; text-align: center;\"><strong style=\"box-sizing: border-box; font-weight: bold;\">FREE DISK SPACE: 30 GB</strong></p>\r\n</div>\r\n</div>');
INSERT INTO `sanpham` (`maSP`, `maNSX`, `maTheLoai`, `tenSP`, `gia`, `soLuong`, `maAnh`, `moTa`, `cauHinh`) VALUES
(17, 10, 2, 'PES 2018', 1250000, 5, '../img/pes.webp', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Chỉ sau v&agrave;i giờ ra mắt bản demo (ng&agrave;y 31-8-2017), tựa game b&oacute;ng đ&aacute; n&agrave;y đ&atilde; nhận được nhiều sự quan t&acirc;m của cộng đồng game thủ Việt Nam. Những đ&aacute;nh gi&aacute; đều tập trung v&agrave;o lối chơi, thứ được cho l&agrave; thay đổi nhiều nhất trong phi&ecirc;n bản 2018 n&agrave;y.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Tung ra thị trường sản phẩm d&agrave;nh cho hệ m&aacute;y console, v&agrave;i ng&agrave;y sau cơn b&atilde;o&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">PES 2018</span>&nbsp;(<span style=\"box-sizing: border-box; font-weight: bold;\">Pro Evolution Soccer 2018</span>) ch&iacute;nh thức đổ bộ l&ecirc;n hệ PC (14/9) th&ocirc;ng qua Steam. Chất lượng đồ họa tốt, gameplay xuất sắc&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">PES 2018</span>&nbsp;tuyệt vời đ&uacute;ng như những g&igrave; Konami đ&atilde; giới thiệu.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Trải nghiệm đầu ti&ecirc;n với PES tr&ecirc;n nền tảng PC l&agrave; chất lượng h&igrave;nh ảnh v&agrave; hiệu ứng vật l&yacute; ngang h&agrave;ng với phi&ecirc;n bản PS4 v&agrave; Xbox One. Từng chi tiết nhỏ nhất đều mang một bước lột x&aacute;c ho&agrave;n to&agrave;n mới so với&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/f1/Games/pes-2017-2016-2418\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">PES 2017</span></a>, khu vực kh&aacute;n đ&agrave;i cho đến s&acirc;n cỏ đều được thể hiện v&ocirc; c&ugrave;ng sống động v&agrave; bừng s&aacute;ng trước mắt người chơi.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">H&igrave;nh d&aacute;ng cầu thủ được đặc tả ch&acirc;n thực hơn, kh&ocirc;ng c&ograve;n kho&aacute;c l&ecirc;n m&igrave;nh những gam m&agrave;u bệch tr&ecirc;n nền cỏ thiếu sức sống như trước. Mức độ c&aacute; nh&acirc;n h&oacute;a, yếu tố l&agrave;m nổi bật c&aacute; t&iacute;nh của c&aacute;c danh thủ cũng sẽ tiếp tục được chăm ch&uacute;t, bộc lộ qua c&aacute;ch chạy, r&ecirc; dắt, dứt điểm hay thậm ch&iacute; cả ăn vạ, chặt ch&eacute;m đối thủ. Sức h&uacute;t của d&ograve;ng&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/Games-Series/pes-series-70\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">series PES</span></a>&nbsp;đang ng&agrave;y một lớn v&agrave; Konami đ&atilde; l&agrave; một đối trọng thực sự với c&aacute;c sản phẩm của EA.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Sở hữu đồ họa v&agrave; gameplay giống đến hơn 90% v&agrave; kh&ocirc;ng thể thấy được sự kh&aacute;c nhau về h&igrave;nh ảnh khiến cho c&aacute;c fan PES PC rạo rực.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Nếu so s&aacute;nh với phi&ecirc;n bản&nbsp;<a style=\"box-sizing: border-box; background-color: transparent; color: #1abc9c; text-decoration-line: none !important;\" href=\"https://linkneverdie.com/f1/Games/pes-2017-2016-2418\" target=\"_blank\" rel=\"noopener\"><span style=\"box-sizing: border-box; font-weight: bold;\">PES 2017</span></a>&nbsp;th&igrave; cấu h&igrave;nh của game cũng đ&atilde; nặng hơn rất nhiều khi y&ecirc;u cầu tối thiểu 8GB RAM, vi xử l&yacute; Intel Core i5-3450 3.1 GHz hoặc tương đương c&ugrave;ng 30GB ổ cứng trống. Bạn đọc c&oacute; thể tham khảo cấu h&igrave;nh của game dưới đ&acirc;y.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">Với việc gần như tương đương hệ PS4/Xbox One, thậm ch&iacute; hỗ trợ cả 4K v&agrave; tỉ lệ 21:9 khiến cho cấu h&igrave;nh tối thiểu của&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">PES 2018</span>&nbsp;PC kh&aacute; cao, chắc chắn Konami sẽ mang lại những trải nghiệm mới nhất cho c&aacute;c fan PES tr&ecirc;n nền tảng n&agrave;y.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-size: 20px;\">***Đ&aacute;nh gi&aacute; nhanh về&nbsp;<span style=\"box-sizing: border-box; font-weight: bold;\">PES 2018</span>:</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><br style=\"box-sizing: border-box;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">Nhịp độ trận đấu / R&ecirc; b&oacute;ng / Chuyền b&oacute;ng</span><br style=\"box-sizing: border-box;\" />- Chậm hơn một ch&uacute;t so với Pes 2017, khả năng sẽ c&oacute; nhiều bạn chơi phong tr&agrave;o th&iacute;ch để Speed +1 hoặc +2 hơn<br style=\"box-sizing: border-box;\" />- B&oacute;ng nặng hơn, cầu thủ cũng hơi chậm hơn nhưng b&ugrave; lại c&oacute; động t&aacute;c tự che b&oacute;ng. Khả năng phi&ecirc;n bản n&agrave;y xử l&yacute; nhỏ được n&acirc;ng th&ecirc;m tầm mới.<br style=\"box-sizing: border-box;\" />- Chuyền b&oacute;ng quay lưng bị chuội hơn. Bấm X full lực th&igrave; b&oacute;ng bay vống l&ecirc;n kh&aacute; giống thật.<br style=\"box-sizing: border-box;\" />- Double Touch s&aacute;t ch&acirc;n với hầu hết c&aacute;c cầu thủ, trừ Neymar c&oacute; DT tốc độ nhanh hơn.<br style=\"box-sizing: border-box;\" />- Tranh chấp b&oacute;ng bổng chọn vị tr&iacute; chuẩn vẫn c&oacute; thể đ&aacute;nh đầu m&agrave; kh&ocirc;ng ảnh hưởng qu&aacute; nhiều từ thể h&igrave;nh.<br style=\"box-sizing: border-box;\" />- C&oacute; điểm hơi kh&oacute; chịu l&agrave; nh&igrave;n b&oacute;ng lăn rất chậm nhưng cầu thủ gần như kh&ocirc;ng đuổi được với những pha chọc khe chuẩn x&aacute;c.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><br style=\"box-sizing: border-box;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">Ph&ograve;ng thủ</span><br style=\"box-sizing: border-box;\" />- H&agrave;ng thủ giữ Vu&ocirc;ng kh&ocirc;ng linh hoạt, m&aacute;y tắc b&oacute;ng cũng kh&ocirc;ng th&ocirc;ng minh. Khả năng thủ Zonal giữ vị tr&iacute; l&ecirc;n ng&ocirc;i nhưng cũng phải chờ Full mới r&otilde; được<br style=\"box-sizing: border-box;\" />- Hậu vệ cao to thể hiện r&otilde; r&agrave;ng hơn hẳn với độ chắc chắn<br style=\"box-sizing: border-box;\" />- Hậu vệ c&aacute;nh kh&ocirc;ng cần qu&aacute; cao như Marcelo, Alba thể hiện được r&otilde; sức mạnh tốc độ v&agrave; c&oacute; lợi thế ri&ecirc;ng biệt<br style=\"box-sizing: border-box;\" />- Khả năng đ&aacute; được 2 SB 2 CB trong phi&ecirc;n bản n&agrave;y<br style=\"box-sizing: border-box;\" />- Defensive Instruction c&oacute; th&ecirc;m Wingback, kh&ocirc;ng sợ kho&eacute;t ra c&aacute;nh nữa<br style=\"box-sizing: border-box;\" />- Thủ Tacadada dễ hơn rất nhiều<br style=\"box-sizing: border-box;\" />- Thủ m&ocirc;n đấm b&oacute;ng th&ocirc;ng minh hơn, hạn chế hẳn những pha đ&aacute; bồi g&acirc;y ức chế<br style=\"box-sizing: border-box;\" />- Tốc độ l&agrave; một vấn đề với h&agrave;ng ph&ograve;ng thủ. Chỉ cần đối phương skill hoặc lắc người nhẹ l&agrave; gần như kh&ocirc;ng c&oacute; cơ hội bắt với những cầu thủ Top Speed cao</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><br style=\"box-sizing: border-box;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">Tấn c&ocirc;ng</span><br style=\"box-sizing: border-box;\" />- S&uacute;t Advance/ Basic dường như kh&ocirc;ng c&oacute; qu&aacute; nhiều kh&aacute;c biệt. Đặc biệt những g&oacute;c lốp, s&uacute;t phũ 0 độ đ&atilde; gần như kh&ocirc;ng c&ograve;n. Nếu s&uacute;t vẫn giữ chạy nhanh hoặc tư thế kh&ocirc;ng đẹp khả năng ghi b&agrave;n cực kỳ thấp.<br style=\"box-sizing: border-box;\" />- G&oacute;c cứa bug Advanced vẫn c&ograve;n.<br style=\"box-sizing: border-box;\" />- Đường b&oacute;ng khi s&uacute;t cao lực kh&ocirc;ng phũ ph&agrave;ng như Pes 2017, n&acirc;ng cao t&iacute;nh ch&acirc;n thật<br style=\"box-sizing: border-box;\" />- Tạt c&aacute;nh kh&oacute; khăn hơn nhưng tỉ lệ ghi b&agrave;n vẫn cao nếu đối phương thủ sai<br style=\"box-sizing: border-box;\" />- S&uacute;t 1 chạm cực kỳ c&oacute; lợi v&agrave; dễ ghi b&agrave;n, đặc biệt l&agrave; s&uacute;t từ tuyến 2<br style=\"box-sizing: border-box;\" />- Vu&ocirc;ng Cancel + Vu&ocirc;ng X quay trở lại kh&aacute; lợi hại<br style=\"box-sizing: border-box;\" />- Phối nhỏ nhanh cần chỉ số cao chứ kh&ocirc;ng bừa được nữa<br style=\"box-sizing: border-box;\" />- B&oacute;ng n&agrave;y khả năng phải điều tiết nhiều mới dẫn đến cơ hội, đ&aacute; nhanh đ&ograve;i hỏi kĩ năng cao<br style=\"box-sizing: border-box;\" /><br style=\"box-sizing: border-box;\" /><span style=\"box-sizing: border-box; font-weight: bold;\">Một số yếu tố kh&aacute;c</span><br style=\"box-sizing: border-box;\" />- Giao diện đẹp, tinh tế.<br style=\"box-sizing: border-box;\" />- Phần setting trước trận đ&atilde; đầy đủ hơn.<br style=\"box-sizing: border-box;\" />- S&acirc;n đẹp, mặt cầu thủ thể hiện chi tiết.<br style=\"box-sizing: border-box;\" />- Vẫn sơ s&agrave;i ở ngoại cảnh như s&acirc;n b&oacute;ng, trọng t&agrave;i, HLV nếu so với Fifa.<br style=\"box-sizing: border-box;\" />- AI cực kỳ th&ocirc;ng minh v&agrave; kh&oacute; bị đ&aacute;nh bại. Đ&aacute; m&aacute;y ở mức Superstar c&oacute; lẽ sẽ thử th&aacute;ch hơn so với c&aacute;c phi&ecirc;n bản trước.</p>', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">MINIMUM:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7 64 bit (32 bit NOT supported)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Intel Core i5-3230M @ 2.60GHz or equivalent AMD processor and above</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 4 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: 256 MB DX 9 Compliant videocard with pixel shader 3,0</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">DirectX: Version 9.0c</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Storage: 2 GB available space</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Sound Card: DirectX 9 Compatible Audio</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Additional Notes: Minimum Resolution: 1024 x 768</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\"><span style=\"box-sizing: border-box; color: #0000ff; font-size: 20px;\">RECOMMENDED:</span></span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">OS: Windows 7,8,10 - 64 bit (32 bit NOT supported)</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Processor: Intel i5 3.2 GHz or equivalent AMD processor and above</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Memory: 8 GB RAM</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Graphics: 512 MB DX 9 Compliant videocard with pixel shader 3,0</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">DirectX: Version 9.0c</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Storage: 2 GB available space</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Sound Card: DirectX 9 Compatible Audio</span></p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Additional Notes: Minimum Resolution: 1024 x 768</span></p>'),
(18, 11, 3, 'SNIPER ELITE 3: AFRIKA', 555500, 2, '../img/sniper3.webp', '<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Sniper Elite III Afrika</span>&nbsp;l&agrave; phần thứ ba của seri game bắn tỉa được ph&aacute;t triển bởi Rebellion v&agrave; ph&aacute;t h&agrave;nh bởi 505 Games. Tr&ograve; chơi sẽ diễn ra ở Bắc Phi trong Thế chiến II. Sniper Elite III được thiết lập v&agrave;i năm trước c&aacute;c sự kiện của Sniper Elite V2, khi Office of Strategic Services gửi điệp vi&ecirc;n Karl Fairburne đến Bắc Phi để t&igrave;m hiểu một vũ kh&iacute; b&iacute; mật của Đức Quốc x&atilde;.</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\">&nbsp;</p>\r\n<p style=\"box-sizing: border-box; margin: 0px; font-family: Roboto, sans-serif; font-size: 16px;\"><span style=\"box-sizing: border-box; font-weight: bold;\">Sniper Elite III Afrika</span>&nbsp;l&agrave; phần thứ ba của seri game bắn tỉa được ph&aacute;t triển bởi Rebellion. Tr&ograve; chơi sẽ diễn ra ở Bắc Phi trong Thế chiến II. Sĩ quan OSS Mỹ - Karl Fairburne, đ&atilde; trở lại trong h&agrave;nh động! Anh vẫn l&agrave; hoạt động trong l&ograve;ng kẻ th&ugrave; trong chiến tranh thế giới II. Tuy nhi&ecirc;n, thời gian n&agrave;y, anh đang ở s&acirc;u trong địa h&igrave;nh kỳ lạ v&agrave; chết người của Bắc Phi, nơi anh sẽ sử dụng ống ngắm bắn tỉa cho kỹ năng chụp h&igrave;nh sắc n&eacute;t để thu thập th&ocirc;ng tin về những chiếc xe tăng Tiger đ&aacute;ng sợ của qu&acirc;n Đức. Nhiệm vụ t&igrave;nh b&aacute;o &nbsp;n&agrave;y nhanh ch&oacute;ng biến th&agrave;nh một cuộc săn t&igrave;m một mối đe dọa mới - một c&ocirc;ng nghệ của Đức c&oacute; thể đ&egrave; bẹp Đồng Minh một c&aacute;ch nhanh ch&oacute;ng.<br style=\"box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 18px;\" /><br style=\"box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 18px;\" />H&agrave;nh động một lần nữa được đặt trong thực tế của chiến tranh thế giới II. Tuy nhi&ecirc;n, lần n&agrave;y v&agrave; c&aacute;c bạn sẽ kh&ocirc;ng hoạt động ở ch&acirc;u &Acirc;u v&agrave; thay v&agrave;o đ&oacute; l&agrave; tham gia chiến dịch trong khu vực của ch&acirc;u Phi. Một lần nữa, c&aacute;c bạn sẽ v&agrave;o vai Karl Fishburne, một tay thiện xạ l&agrave;m việc cho c&aacute;c chỉ huy qu&acirc;n sự Mỹ. Vẫn như c&aacute;c phi&ecirc;n bản trước, c&aacute;c bạn sẽ phải l&eacute;n l&uacute;t tiến đến mục ti&ecirc;u của bạn th&ocirc;ng qua c&aacute;c hẻm n&uacute;i xoắn, ốc đảo tươi tốt, th&agrave;nh phố cổ xưa trong c&aacute;i n&oacute;ng chết người của sa mạc để ph&aacute; hoại một chương tr&igrave;nh si&ecirc;u vũ kh&iacute; của Đức Quốc x&atilde; m&agrave; nếu th&agrave;nh c&ocirc;ng n&oacute; c&oacute; thể kết th&uacute;c cuộc chiến với sự thất bại của phe Đồng Minh.</p>', '<p><span style=\"box-sizing: border-box; font-weight: bold; font-family: Roboto, sans-serif; font-size: 16px; text-align: center;\">OS: &nbsp;Windows Vista (Service Pack 2) or Windows&reg; 7 (Service Pack 1) or Windows&reg; 8 or Windows 8.1. ( Windows&reg; XP is NOT supported ).<br style=\"box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 18px; text-align: start;\" />Processor: Dual-core CPU with SSE3 (Intel&reg; Pentium&reg; D 3GHz / AMD Athlon&trade; 64 X2 4200) or better<br style=\"box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 18px; text-align: start;\" />Memory: 2 GB RAM<br style=\"box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 18px; text-align: start;\" />Graphics: Microsoft&reg; DirectX&reg; 10.0 compatible graphics card with 256 MB of memory (NVIDIA&reg; GeForce&reg; 8800 series / ATI Radeon&trade; HD 3870) or better<br style=\"box-sizing: border-box; font-family: Arial, Helvetica, sans-serif; font-size: 14px; line-height: 18px; text-align: start;\" />Hard Drive: 18 GB available space</span></p>');

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
(8, 'Đối kháng'),
(9, '21+');

-- --------------------------------------------------------

--
-- Table structure for table `tkadmin`
--

CREATE TABLE `tkadmin` (
  `maTK` int(11) NOT NULL,
  `tenAD` varchar(200) NOT NULL,
  `tenTK` varchar(200) DEFAULT NULL,
  `matKhau` varchar(200) DEFAULT NULL,
  `sdt` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `maQuyen` int(11) DEFAULT '0',
  `trangthai` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkadmin`
--

INSERT INTO `tkadmin` (`maTK`, `tenAD`, `tenTK`, `matKhau`, `sdt`, `email`, `maQuyen`, `trangthai`) VALUES
(1, 'cuccut', 'cuccut', 'cuccut', '123', '', 1, 1),
(2, 'cucshit', 'cucshit', 'cucshit', '456', '', 0, 1),
(4, 'newadmin', 'newadmin', 'xxxxx', '789', '', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tkthue`
--

CREATE TABLE `tkthue` (
  `maTK` int(11) NOT NULL,
  `tenTK` varchar(200) DEFAULT NULL,
  `matKhau` varchar(200) DEFAULT NULL,
  `tkThue` int(11) DEFAULT NULL,
  `maHD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkthue`
--

INSERT INTO `tkthue` (`maTK`, `tenTK`, `matKhau`, `tkThue`, `maHD`) VALUES
(1, 'taikhoan001', '1', 3, 13),
(2, 'taikhoan002', '1', 3, 13),
(3, 'taikhoan003', '1', 3, 13),
(4, 'taikhoan004', '1', NULL, 0),
(5, 'taikhoan005', '1', NULL, 0),
(6, 'taikhoan006', '1', NULL, 0),
(7, 'taikhoan007', '1', NULL, 0),
(8, 'taikhoan008', '1', NULL, 0),
(9, 'taikhoan009', '1', NULL, 0),
(10, 'taikhoan010', '1', NULL, 0);

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
  `matKhau` varchar(200) DEFAULT NULL,
  `trangthai` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tkuser`
--

INSERT INTO `tkuser` (`maTK`, `tenKH`, `sdt`, `email`, `tenTK`, `matKhau`, `trangthai`) VALUES
(1, 'Minh Đức', '975928214', '3dogize@gmail.com', 'mybabysexy', '$2y$10$V7Cqru5/Q8wAaHfpDWJ.hO0TTdw4nOb/SuzQ7JwSf6//gDa0aRo1O', 1),
(2, 'Mạnh Toàn', '12345', 'toan@toan.com', 'toan', '$2y$10$K4J.NU52Zw2Dd4i4wPo6wuirWHXi13XwBCHqWzaMR1MJjD3JXjJcu', 1),
(3, 'Sơn Đặng', '123', 'son@son.com', 'sondang', '$2y$10$mupQyVYkiPqXsihTzHnMsuEoaLRrj9U2T8P62Png5vKf9pjeK0cpi', 1),
(10, 'testtesttesttest', '000', 'testtesttesttest@testtest.com', 'testtesttesttest', 'testtest', 1),
(11, 'testtest', '111', 'testtest@test.com', 'testtest', '$2y$10$A/uP/NUx6MvrqF0hCfAVOeasUlqcXpmmm6qNQGH2eHoTqIV6Dj5d.', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `giaThue`
--
ALTER TABLE `giaThue`
  ADD PRIMARY KEY (`loaiGia`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maDonHang`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD KEY `maDonHang` (`maDonHang`),
  ADD KEY `maSP` (`maSP`),
  ADD KEY `gia` (`gia`);

--
-- Indexes for table `hoadonchitietthue`
--
ALTER TABLE `hoadonchitietthue`
  ADD PRIMARY KEY (`STT`),
  ADD KEY `maSP` (`maSP`),
  ADD KEY `maDonHang` (`maDonHang`),
  ADD KEY `tinhTrang` (`tinhTrang`);

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
-- Indexes for table `tkthue`
--
ALTER TABLE `tkthue`
  ADD PRIMARY KEY (`maTK`),
  ADD KEY `tkThue` (`tkThue`),
  ADD KEY `maTK` (`maTK`);

--
-- Indexes for table `tkuser`
--
ALTER TABLE `tkuser`
  ADD PRIMARY KEY (`maTK`),
  ADD UNIQUE KEY `tenTK` (`tenTK`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `sdt` (`sdt`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `giaThue`
--
ALTER TABLE `giaThue`
  MODIFY `loaiGia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hoadonchitietthue`
--
ALTER TABLE `hoadonchitietthue`
  MODIFY `STT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `nsx`
--
ALTER TABLE `nsx`
  MODIFY `maNSX` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `theloai`
--
ALTER TABLE `theloai`
  MODIFY `maTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tkadmin`
--
ALTER TABLE `tkadmin`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tkthue`
--
ALTER TABLE `tkthue`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tkuser`
--
ALTER TABLE `tkuser`
  MODIFY `maTK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_2` FOREIGN KEY (`maTK`) REFERENCES `tkuser` (`maTK`);

--
-- Constraints for table `hoadonchitiet`
--
ALTER TABLE `hoadonchitiet`
  ADD CONSTRAINT `hoadonchitiet_ibfk_1` FOREIGN KEY (`maDonHang`) REFERENCES `hoadon` (`maDonHang`),
  ADD CONSTRAINT `hoadonchitiet_ibfk_2` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`);

--
-- Constraints for table `hoadonchitietthue`
--
ALTER TABLE `hoadonchitietthue`
  ADD CONSTRAINT `hoadonchitietthue_ibfk_1` FOREIGN KEY (`maSP`) REFERENCES `sanpham` (`maSP`),
  ADD CONSTRAINT `hoadonchitietthue_ibfk_2` FOREIGN KEY (`maDonHang`) REFERENCES `hoadon` (`maDonHang`);

--
-- Constraints for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maNSX`) REFERENCES `nsx` (`maNSX`),
  ADD CONSTRAINT `sanpham_ibfk_2` FOREIGN KEY (`maTheLoai`) REFERENCES `theloai` (`maTheLoai`);

--
-- Constraints for table `tkthue`
--
ALTER TABLE `tkthue`
  ADD CONSTRAINT `tkthue_ibfk_1` FOREIGN KEY (`tkThue`) REFERENCES `tkuser` (`maTK`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
