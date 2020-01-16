-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 30, 2019 lúc 01:24 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `exam`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `capcho`
--

DROP TABLE IF EXISTS `capcho`;
CREATE TABLE IF NOT EXISTS `capcho` (
  `MaChungChi` int(11) NOT NULL,
  `MaHocVien` int(11) NOT NULL,
  `NgayCap` date NOT NULL,
  `SoCap` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiemThucHanh` int(11) NOT NULL,
  `DiemLyThuyet` int(11) NOT NULL,
  PRIMARY KEY (`MaChungChi`,`MaHocVien`),
  KEY `macc`(`MaChungChi`),
  KEY `mahv` (`MaHocVien`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocvien`
--

DROP TABLE IF EXISTS `hocvien`;
CREATE TABLE IF NOT EXISTS `hocvien` (
  `MaHocVien` int(11) NOT NULL AUTO_INCREMENT,
  `Ho` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `QueQuan` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `NgaySinh` date NOT NULL,
  `NoiSinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHocVien`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocvien`
--

INSERT INTO `hocvien` (`MaHocVien`, `Ho`, `Ten`, `QueQuan`, `NgaySinh`, `NoiSinh`) VALUES
(1, 'Nguyễn', 'Dũng', 'Huế', '2019-12-01', 'Huê'),
(2, 'Trần', 'Huy', 'VN', '2019-12-18', 'VN');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaichungchi`
--

DROP TABLE IF EXISTS `loaichungchi`;
CREATE TABLE IF NOT EXISTS `loaichungchi` (
  `MaChungChi` int(11) NOT NULL AUTO_INCREMENT,
  `TenChungChi` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaChungChi`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaichungchi`
--

INSERT INTO `loaichungchi` (`MaChungChi`, `TenChungChi`) VALUES
(1, 'Chứng chỉ tin học'),
(2, 'Chứng chỉ toán học');

ALTER TABLE `capcho`
  ADD CONSTRAINT `frcc` FOREIGN KEY (`MaChungChi`) REFERENCES `LoaiChungChi` (`MaChungChi`) ON DELETE NO ACTION ON UPDATE CASCADE;

ALTER TABLE `capcho`
  ADD CONSTRAINT `frhv` FOREIGN KEY (`MaHocVien`) REFERENCES `HocVien` (`MaHocVien`) ON DELETE NO ACTION ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
