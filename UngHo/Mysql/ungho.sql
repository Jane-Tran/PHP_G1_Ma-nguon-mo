-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 28, 2019 lúc 01:53 AM
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
-- Cơ sở dữ liệu: `ungho`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_dot_nhan_ung_ho`
--

DROP TABLE IF EXISTS `chi_tiet_dot_nhan_ung_ho`;
CREATE TABLE IF NOT EXISTS `chi_tiet_dot_nhan_ung_ho` (
  `MaDotNhanUngHo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HinhThucNhanUngHo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongNhanUngHo` bigint(20) NOT NULL,
  `DonViTinh` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaDotNhanUngHo`,`HinhThucNhanUngHo`),
  KEY `madotnhanungho` (`MaDotNhanUngHo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_dot_nhan_ung_ho`
--

INSERT INTO `chi_tiet_dot_nhan_ung_ho` (`MaDotNhanUngHo`, `HinhThucNhanUngHo`, `SoLuongNhanUngHo`, `DonViTinh`) VALUES
('DNUH001', 'Tien mat', 15000000, 'VND'),
('DNUH002', 'Thung mi tom', 55, 'Thung'),
('DNUH003', 'Bo ao quan', 4, 'Bo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_dot_ung_ho`
--

DROP TABLE IF EXISTS `chi_tiet_dot_ung_ho`;
CREATE TABLE IF NOT EXISTS `chi_tiet_dot_ung_ho` (
  `MaDotUngHo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HinhThucUngHo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuongUngHo` bigint(20) NOT NULL,
  `DonViTinh` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaDotUngHo`,`HinhThucUngHo`),
  KEY `madotungho` (`MaDotUngHo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_dot_ung_ho`
--

INSERT INTO `chi_tiet_dot_ung_ho` (`MaDotUngHo`, `HinhThucUngHo`, `SoLuongUngHo`, `DonViTinh`) VALUES
('DUH001', 'Tien mat', 50000, 'USD'),
('DUH002', 'Thung mi tom', 10, 'Thung'),
('DUH003', 'Bo ao quan', 50, 'Bo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `don_vi_ung_ho`
--

DROP TABLE IF EXISTS `don_vi_ung_ho`;
CREATE TABLE IF NOT EXISTS `don_vi_ung_ho` (
  `MaDVUH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenNguoiDaiDien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiNguoiDaiDien` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoaiLienLac` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoCMNDNguoiDaiDien` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoTaiKhoanNganHang` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `TenNganHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `ChiNhanhNganHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `TenChuTKNganHang` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaDVUH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `don_vi_ung_ho`
--

INSERT INTO `don_vi_ung_ho` (`MaDVUH`, `HoTenNguoiDaiDien`, `DiaChiNguoiDaiDien`, `SoDienThoaiLienLac`, `SoCMNDNguoiDaiDien`, `SoTaiKhoanNganHang`, `TenNganHang`, `ChiNhanhNganHang`, `TenChuTKNganHang`) VALUES
('DV001', 'Nguyen Van A1', 'Quang Nam', '0945887545', '200145777', '578457544', 'Vietcombank', 'Tam Ky', 'Nguyen Van A1'),
('DV002', 'Nguyen Van A2', 'Hue', '09458887546', '200145778', '5784575445', 'TienphongBank', 'Hue', 'Nguyen Van A2'),
('DV003', 'Nguyen Van A3', 'Da Nang', '09458887547', '200145779', '45745746', 'Vietinbank', 'Da Nang ', 'Nguyen Van A3');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dot_nhan_ung_ho`
--

DROP TABLE IF EXISTS `dot_nhan_ung_ho`;
CREATE TABLE IF NOT EXISTS `dot_nhan_ung_ho` (
  `MaDotNhanUngHo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaHoDan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NgayNhanUngHo` date NOT NULL,
  PRIMARY KEY (`MaDotNhanUngHo`),
  KEY `mahd` (`MaHoDan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dot_nhan_ung_ho`
--

INSERT INTO `dot_nhan_ung_ho` (`MaDotNhanUngHo`, `MaHoDan`, `NgayNhanUngHo`) VALUES
('DNUH001', 'HD001', '2017-01-23'),
('DNUH002', 'HD002', '2017-01-24'),
('DNUH003', 'HD003', '2017-01-25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dot_ung_ho`
--

DROP TABLE IF EXISTS `dot_ung_ho`;
CREATE TABLE IF NOT EXISTS `dot_ung_ho` (
  `MaDotUngHo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `MaDVUH` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `NgayUngHo` date NOT NULL,
  PRIMARY KEY (`MaDotUngHo`),
  KEY `maduh` (`MaDVUH`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dot_ung_ho`
--

INSERT INTO `dot_ung_ho` (`MaDotUngHo`, `MaDVUH`, `NgayUngHo`) VALUES
('DUH001', 'DV001', '2017-01-21'),
('DUH002', 'DV002', '2017-01-22'),
('DUH003', 'DV003', '2017-01-23');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ho_dan`
--

DROP TABLE IF EXISTS `ho_dan`;
CREATE TABLE IF NOT EXISTS `ho_dan` (
  `MaHoDan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `HoTenChuHo` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `To` int(11) NOT NULL,
  `KhoiHoacThon` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `DiaChiNha` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `SoNhanKhau` int(11) NOT NULL,
  `DienGiaDinh` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `LaHoNgheo` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`MaHoDan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ho_dan`
--

INSERT INTO `ho_dan` (`MaHoDan`, `HoTenChuHo`, `To`, `KhoiHoacThon`, `SoDienThoai`, `DiaChiNha`, `SoNhanKhau`, `DienGiaDinh`, `LaHoNgheo`) VALUES
('HD001', 'Nguyen Van B1', 12, 'Tam Thanh', '0945887548', '23 Tran Van On', 5, 'Thuong binh', 'Dung'),
('HD002', 'Nguyen Van B2', 13, 'Vinh Loc', '09458887549', '45 Nguyen Cong Tru', 2, 'Cong chuc ', 'Sai'),
('HD003', 'Nguyen Van B3', 14, 'Van Don', '0945887550', '77 Tran Phu', 10, 'Nong Dan', 'Dung');

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_dot_nhan_ung_ho`
--
ALTER TABLE `chi_tiet_dot_nhan_ung_ho`
  ADD CONSTRAINT `frchitietnhan` FOREIGN KEY (`MaDotNhanUngHo`) REFERENCES `dot_nhan_ung_ho` (`MaDotNhanUngHo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `chi_tiet_dot_ung_ho`
--
ALTER TABLE `chi_tiet_dot_ung_ho`
  ADD CONSTRAINT `frchitietungho` FOREIGN KEY (`MaDotUngHo`) REFERENCES `dot_ung_ho` (`MaDotUngHo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dot_nhan_ung_ho`
--
ALTER TABLE `dot_nhan_ung_ho`
  ADD CONSTRAINT `frnhanungho` FOREIGN KEY (`MaHoDan`) REFERENCES `ho_dan` (`MaHoDan`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `dot_ung_ho`
--
ALTER TABLE `dot_ung_ho`
  ADD CONSTRAINT `frdotungho` FOREIGN KEY (`MaDVUH`) REFERENCES `don_vi_ung_ho` (`MaDVUH`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
