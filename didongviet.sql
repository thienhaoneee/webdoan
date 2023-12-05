-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 05, 2023 lúc 12:22 PM
-- Phiên bản máy phục vụ: 8.0.31
-- Phiên bản PHP: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `didongviet`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `brand_id` int NOT NULL,
  `brand_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `brand_img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`, `brand_img`) VALUES
(1, 'Apple', 'brand/iphone.webp'),
(2, 'Samsung', 'brand/samsung.webp'),
(3, 'Vertu', 'brand/vertu.webp'),
(4, 'Oppo', 'brand/oppo.webp'),
(5, 'Xiaomi', 'brand/xiaomi.webp'),
(6, 'Realme', 'brand/realme.webp'),
(7, 'Honor', 'brand/honor.webp'),
(8, 'Vivo', 'brand/vivo.webp'),
(9, 'Nokia', 'brand/nokia.webp');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_hd`
--

DROP TABLE IF EXISTS `chitiet_hd`;
CREATE TABLE IF NOT EXISTS `chitiet_hd` (
  `mahd` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `soluong` int DEFAULT NULL,
  `thanhtien` int DEFAULT NULL,
  `tinhtrang` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `fk_chitiet_hd_mahd` (`mahd`),
  KEY `fk_chitiet_hd_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_hd`
--

INSERT INTO `chitiet_hd` (`mahd`, `product_id`, `soluong`, `thanhtien`, `tinhtrang`) VALUES
(1, 6, 2, 53580000, 'false'),
(1, 10, 1, 25990000, 'false'),
(2, 5, 1, 25690000, 'false'),
(3, 10, 3, 77970000, 'false'),
(4, 9, 1, 28790000, 'false'),
(4, 12, 1, 26290000, 'false'),
(5, 5, 1, 25690000, 'false'),
(6, 14, 1, 23590000, 'false'),
(7, 11, 1, 26990000, 'false'),
(7, 6, 1, 26790000, 'false'),
(8, 14, 1, 23590000, 'false'),
(9, 14, 1, 23590000, 'false'),
(10, 8, 1, 25690000, 'false'),
(12, 14, 1, 23590000, 'false'),
(13, 15, 1, 25990000, 'false'),
(14, 8, 1, 25690000, 'false'),
(15, 16, 1, 23790000, 'false'),
(16, 10, 1, 25990000, 'false'),
(17, 76, 2, 82980000, 'false'),
(18, 14, 1, 23590000, 'false'),
(19, 76, 1, 45590000, 'false'),
(20, 74, 1, 27890000, 'false'),
(21, 75, 1, 35990000, 'false'),
(21, 15, 1, 25990000, 'false');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiet_sanpham`
--

DROP TABLE IF EXISTS `chitiet_sanpham`;
CREATE TABLE IF NOT EXISTS `chitiet_sanpham` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `masp` int NOT NULL,
  `rom_id` int DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `quanlity` int DEFAULT NULL,
  `price` int DEFAULT NULL,
  `sale_price` int DEFAULT NULL,
  `type_id` int DEFAULT NULL,
  `image_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mota_sp` text COLLATE utf8mb4_unicode_ci,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`product_id`),
  KEY `fk_ctsanpham_rom_id` (`rom_id`),
  KEY `fk_ctsanpham_color_id` (`color_id`),
  KEY `fk_ctsanpham_type_id` (`type_id`),
  KEY `fk_ctsanpham_imagesp_id` (`image_id`),
  KEY `fk_ctsanpham_masp` (`masp`)
) ENGINE=InnoDB AUTO_INCREMENT=84 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiet_sanpham`
--

INSERT INTO `chitiet_sanpham` (`product_id`, `masp`, `rom_id`, `color_id`, `quanlity`, `price`, `sale_price`, `type_id`, `image_id`, `mota_sp`, `updated_at`, `created_at`) VALUES
(5, 1, 3, 1, 18, 33990000, 25690000, 3, NULL, NULL, '2023-09-23 13:17:49', '2023-09-23 13:17:50'),
(6, 1, 4, 1, 17, 37990000, 26790000, 3, NULL, NULL, NULL, '2023-09-23 13:21:31'),
(7, 1, 5, 1, 20, 39990000, 35190000, 3, NULL, NULL, NULL, '2023-09-23 13:27:33'),
(8, 1, 3, 2, 18, 33990000, 25690000, 3, NULL, NULL, NULL, '2023-09-23 13:27:33'),
(9, 1, 4, 2, 19, 39990000, 28790000, 3, NULL, NULL, NULL, '2023-09-23 13:27:33'),
(10, 1, 3, 3, 15, 33990000, 25990000, 3, NULL, NULL, NULL, '2023-09-23 13:34:14'),
(11, 1, 4, 3, 19, 39990000, 26990000, 3, NULL, NULL, NULL, '2023-09-23 13:34:14'),
(12, 1, 3, 4, 19, 33990000, 26290000, 3, NULL, NULL, NULL, '2023-09-23 13:34:14'),
(13, 1, 4, 4, 20, 37990000, 29290000, 3, NULL, NULL, NULL, '2023-09-23 13:34:14'),
(14, 2, 3, 1, 15, 30990000, 23590000, 3, NULL, NULL, NULL, '2023-09-23 13:39:06'),
(15, 2, 4, 1, 18, 33990000, 25990000, 3, NULL, NULL, NULL, '2023-09-23 13:39:06'),
(16, 2, 3, 2, 19, 30990000, 23790000, 3, NULL, NULL, NULL, '2023-09-23 13:39:06'),
(17, 2, 3, 4, 20, 30990000, 24190000, 3, NULL, NULL, NULL, '2023-09-23 13:39:06'),
(73, 30, 4, 3, 20, 38990000, 33390000, 3, NULL, 'iPhone 15 Pro Max', '2023-11-15 07:52:19', '2023-11-15 07:52:19'),
(74, 30, 3, 3, 19, 29990000, 27890000, 3, NULL, 'Phone 15 Pro Max', '2023-11-15 08:00:52', '2023-11-15 07:55:16'),
(75, 30, 5, 3, 9, 38990000, 35990000, 3, NULL, 'iPhone 15 Pro Max', '2023-11-15 08:02:22', '2023-11-15 08:02:22'),
(76, 30, 6, 3, 17, 50990000, 45590000, 3, NULL, 'iPhone 15 Pro Max', '2023-11-15 08:55:51', '2023-11-15 08:03:03'),
(77, 29, 2, 2, 20, 10990000, 7490000, 1, NULL, 'Oppo', '2023-11-15 08:28:07', '2023-11-15 08:28:07'),
(78, 31, 5, 9, 20, 36990000, 25990000, 1, NULL, ' Samsung Galaxy S23 Ultra 5G', '2023-11-15 08:44:44', '2023-11-15 08:44:44'),
(79, 31, 4, 9, 20, 31990000, 22990000, 1, NULL, 'Samsung Galaxy S23 Ultra 5G ', '2023-11-15 08:45:23', '2023-11-15 08:45:23'),
(80, 31, 3, 5, 20, 31990000, 22990000, 1, NULL, 'Samsung Galaxy S23 Ultra 5G', '2023-11-18 08:00:02', '2023-11-15 08:46:14'),
(81, 31, 4, 1, 20, 31990000, 0, 1, NULL, 'Samsung Galaxy S23 Ultra 5G', '2023-11-15 08:47:23', '2023-11-15 08:47:02'),
(83, 31, 1, 4, 12, 19999, 0, 1, NULL, 'kkk', '2023-11-24 08:28:46', '2023-11-24 08:21:05');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `color_id` int NOT NULL,
  `color_name` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`color_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `color`
--

INSERT INTO `color` (`color_id`, `color_name`) VALUES
(1, 'Màu tím'),
(2, 'Màu vàng'),
(3, 'Màu xám'),
(4, 'Màu bạc'),
(5, 'Màu đen'),
(6, 'Màu trắng'),
(7, 'Màu Xanh dương'),
(8, 'Màu đỏ'),
(9, 'Màu xanh'),
(10, 'Titan đen');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

DROP TABLE IF EXISTS `comment`;
CREATE TABLE IF NOT EXISTS `comment` (
  `cmt_id` int NOT NULL AUTO_INCREMENT,
  `makh` int NOT NULL,
  `product_id` int NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `parent_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`cmt_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`cmt_id`, `makh`, `product_id`, `content`, `parent_id`, `created_at`, `updated_at`) VALUES
(33, 3, 16, 'hehe', 0, '2023-11-14 19:29:29', '2023-11-14 19:29:29'),
(34, 3, 16, 'k', 0, '2023-11-14 19:30:26', '2023-11-14 19:30:26'),
(35, 3, 16, 'Hàng tốt', 0, '2023-11-14 19:37:49', '2023-11-14 19:37:49'),
(36, 3, 16, 'Sịn', 0, '2023-11-14 19:38:40', '2023-11-14 19:38:40'),
(37, 3, 16, 'noo', 0, '2023-11-14 19:40:40', '2023-11-14 19:40:40'),
(38, 3, 16, 'yes', 0, '2023-11-14 19:42:35', '2023-11-14 19:42:35'),
(40, 3, 5, 'Gần Thủ Đức còn hàng không shop ?', 0, '2023-11-15 11:49:42', '2023-11-15 11:49:42'),
(48, 3, 12, 'tung', 0, '2023-11-15 12:03:46', '2023-11-15 12:03:46'),
(49, 3, 12, 'kkk', 12, '2023-11-15 12:03:51', '2023-11-15 12:03:51'),
(50, 3, 12, '444', 12, '2023-11-15 12:04:06', '2023-11-15 12:04:06'),
(51, 3, 12, 'kkk', 48, '2023-11-15 12:06:57', '2023-11-15 12:06:57'),
(52, 3, 12, 'kkk', 0, '2023-11-15 12:08:21', '2023-11-15 12:08:21'),
(53, 3, 12, 'hehe', 0, '2023-11-15 12:08:42', '2023-11-15 12:08:42'),
(54, 3, 12, 'êm', 12, '2023-11-15 12:08:46', '2023-11-15 12:08:46'),
(55, 5, 8, 'Sản phẩm tốt', 0, '2023-11-15 12:11:22', '2023-11-15 12:11:22'),
(56, 5, 12, 'oke', 53, '2023-11-15 12:11:33', '2023-11-15 12:11:33'),
(57, 5, 8, 'oke bạn', 55, '2023-11-15 12:11:55', '2023-11-15 12:11:55'),
(60, 5, 5, 'Điện thoại xịn quá', 0, '2023-11-15 13:58:37', '2023-11-15 13:58:37'),
(61, 5, 76, 'Sản phẩm tốt', 0, '2023-11-15 15:17:35', '2023-11-15 15:17:35'),
(62, 5, 76, '10 điểm', 76, '2023-11-15 15:17:42', '2023-11-15 15:17:42'),
(63, 5, 76, 'Điện thoại tốt', 0, '2023-11-15 15:56:10', '2023-11-15 15:56:10'),
(64, 5, 76, 'Mới mua hôm qua 3 cái', 61, '2023-11-15 15:56:19', '2023-11-15 15:56:19'),
(65, 5, 76, 'sản phẩm', 0, '2023-11-16 10:41:01', '2023-11-16 10:41:01'),
(66, 5, 76, 'kkk', 76, '2023-11-16 10:41:07', '2023-11-16 10:41:07'),
(67, 5, 76, '222', 76, '2023-11-16 10:41:23', '2023-11-16 10:41:23'),
(68, 5, 76, '123', 61, '2023-11-16 10:41:40', '2023-11-16 10:41:40'),
(69, 5, 9, '123', 0, '2023-11-16 10:54:04', '2023-11-16 10:54:04'),
(70, 5, 9, '333', 9, '2023-11-16 10:54:10', '2023-11-16 10:54:10'),
(71, 5, 75, '123', 0, '2023-11-24 14:32:44', '2023-11-24 14:32:44'),
(72, 5, 75, '123', 75, '2023-11-24 14:32:51', '2023-11-24 14:32:51'),
(73, 5, 75, '222', 0, '2023-11-24 14:33:26', '2023-11-24 14:33:26'),
(74, 5, 75, '2323', 71, '2023-11-24 14:35:39', '2023-11-24 14:35:39'),
(75, 5, 75, 'kkk', 0, '2023-11-24 14:36:40', '2023-11-24 14:36:40'),
(76, 5, 75, '232333', 75, '2023-11-24 14:36:46', '2023-11-24 14:36:46'),
(77, 5, 75, '111', 75, '2023-11-24 14:37:35', '2023-11-24 14:37:35'),
(78, 5, 17, 'qoqo', 0, '2023-11-24 14:38:13', '2023-11-24 14:38:13'),
(79, 5, 17, '999', 17, '2023-11-24 14:38:19', '2023-11-24 14:38:19'),
(80, 5, 17, '233', 0, '2023-11-24 14:40:21', '2023-11-24 14:40:21'),
(85, 5, 74, '333', 0, '2023-11-24 14:57:56', '2023-11-24 14:57:56'),
(86, 5, 74, '332', 85, '2023-11-24 14:58:02', '2023-11-24 14:58:02'),
(87, 5, 73, '222', 0, '2023-11-24 14:58:22', '2023-11-24 14:58:22'),
(88, 5, 73, '21', 87, '2023-11-24 14:58:28', '2023-11-24 14:58:28'),
(89, 5, 73, 'oke\n', 87, '2023-11-24 14:58:59', '2023-11-24 14:58:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaodien`
--

DROP TABLE IF EXISTS `giaodien`;
CREATE TABLE IF NOT EXISTS `giaodien` (
  `idgiaodien` int NOT NULL AUTO_INCREMENT,
  `loaigiaodien` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hinhanh` varchar(254) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ngaythem` datetime DEFAULT NULL,
  PRIMARY KEY (`idgiaodien`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

DROP TABLE IF EXISTS `hoadon`;
CREATE TABLE IF NOT EXISTS `hoadon` (
  `hoadon_id` int NOT NULL AUTO_INCREMENT,
  `khachhang_id` int NOT NULL,
  `ngayhd` date DEFAULT NULL,
  `tongtien` int DEFAULT NULL,
  PRIMARY KEY (`hoadon_id`),
  KEY `fk_hoadon_khachhang_id` (`khachhang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`hoadon_id`, `khachhang_id`, `ngayhd`, `tongtien`) VALUES
(1, 3, '2023-11-13', 79570000),
(2, 3, '2023-11-13', 25690000),
(3, 3, '2023-11-14', 77970000),
(4, 3, '2023-11-14', 55080000),
(5, 3, '2023-11-14', 25690000),
(6, 3, '2023-11-14', 23590000),
(7, 3, '2023-11-14', 53780000),
(8, 3, '2023-11-14', 23590000),
(9, 3, '2023-11-14', 23590000),
(10, 3, '2022-11-14', 25690000),
(12, 3, '2023-11-14', 23590000),
(13, 3, '2023-11-14', 25990000),
(14, 3, '2023-11-15', 25690000),
(15, 5, '2023-11-15', 23790000),
(16, 5, '2023-11-15', 25990000),
(17, 5, '2023-11-15', 82980000),
(18, 5, '2023-11-15', 23590000),
(19, 5, '2023-11-15', 45590000),
(20, 5, '2023-11-16', 27890000),
(21, 5, '2023-11-16', 61980000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

DROP TABLE IF EXISTS `khachhang`;
CREATE TABLE IF NOT EXISTS `khachhang` (
  `khachhang_id` int NOT NULL AUTO_INCREMENT,
  `khachhang_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`khachhang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`khachhang_id`, `khachhang_name`, `email`, `password`, `diachi`, `phone`, `token`, `updated_at`, `created_at`) VALUES
(3, 'Nguyễn Quốc An', 'an_tuoitre@gmail.com', '0b3095df3dc9aa00bfc6fc80fbd043fb', 'tp hồ chí minh', '012345678', NULL, '2023-11-05 14:07:01', '2023-11-05 14:07:01'),
(4, 'Nhữ Quốc Tuấn', 'quoctuan3939@gmail.com', '0b3095df3dc9aa00bfc6fc80fbd043fb', 'tp hồ chí minh', '0123456789', NULL, '2023-11-05 14:10:47', '2023-11-05 14:10:47'),
(5, 'Nguyễn Thanh Tùng', 'thanhtungnguyen9911@gmail.com', '0b3095df3dc9aa00bfc6fc80fbd043fb', '58/27 Thạch Lam, Phú Thạnh,quậ', '0702906699', NULL, '2023-11-15 05:10:49', '2023-11-15 05:10:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `model`
--

DROP TABLE IF EXISTS `model`;
CREATE TABLE IF NOT EXISTS `model` (
  `model_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `model_name` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`model_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `model`
--

INSERT INTO `model` (`model_id`, `brand_id`, `model_name`, `model_link`) VALUES
(1, 1, 'iPhone 11 Series', NULL),
(2, 1, 'iPhone 12 Series', NULL),
(3, 1, 'iPhone 13 Series', NULL),
(4, 1, 'iPhone 14 Series', NULL),
(5, 2, 'S23 Series', NULL),
(6, 2, 'S22 Series', NULL),
(7, 2, 'S21 Series', NULL),
(8, 5, 'Xiaomi Redmi Note 12 Series', NULL),
(9, 5, 'Xiaomi Redmi Note 11 Series', NULL),
(10, 5, 'Xiaomi 13 Series', NULL),
(11, 5, 'Xiaomi 12 Series', NULL),
(12, 5, 'Xiaomi Redmi Note 13 Series', NULL),
(13, 3, 'Signature', NULL),
(14, 3, 'iVertu', NULL),
(15, 3, 'Aster P', NULL),
(16, 3, 'Metavertu', NULL),
(17, 4, 'OPPO A Series', NULL),
(18, 4, 'OPPO Reno Series', NULL),
(19, 4, 'OPPO Find X Series', NULL),
(20, 4, 'OPPO Reno10 Series', NULL),
(21, 4, 'OPPO Find N Series', NULL),
(22, 6, 'realme 11 Series', NULL),
(23, 6, 'Realme C Series', NULL),
(24, 6, 'Realme 5 Series', NULL),
(25, 6, 'Realme 6 Series', NULL),
(26, 7, 'Honor X series', NULL),
(27, 8, 'Vivo X series', NULL),
(28, 9, 'Nokia X series', NULL),
(29, 1, 'iPhone 15 Series', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhanvien`
--

DROP TABLE IF EXISTS `nhanvien`;
CREATE TABLE IF NOT EXISTS `nhanvien` (
  `admin_id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_pass` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_phone` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhanvien`
--

INSERT INTO `nhanvien` (`admin_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_phone`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', '123456', '0702906699', '2023-11-07 22:21:05', '2023-11-07 22:21:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phone_image`
--

DROP TABLE IF EXISTS `phone_image`;
CREATE TABLE IF NOT EXISTS `phone_image` (
  `image_id` int NOT NULL AUTO_INCREMENT,
  `masp` int NOT NULL DEFAULT '0',
  `color_id` int NOT NULL DEFAULT '0',
  `image_url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_image` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`image_id`),
  KEY `fk_sanpham_image_masp` (`masp`),
  KEY `fk_sanpham_image_color_id` (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phone_image`
--

INSERT INTO `phone_image` (`image_id`, `masp`, `color_id`, `image_url`, `main_image`) VALUES
(6, 1, 1, 'iphone/14promax-tim/iphone-14pm-p1.webp', 'true'),
(7, 1, 1, 'iphone/14promax-tim/iphone-14pm-p2.webp', ''),
(8, 1, 1, 'iphone/14promax-tim/iphone-14pm-p3.webp', ''),
(9, 1, 1, 'iphone/14promax-tim/iphone-14pm-p4.webp', ''),
(10, 1, 2, 'iphone/14promax-vang/iphone-14pm-p1.webp', 'true'),
(11, 1, 2, 'iphone/14promax-vang/iphone-14pm-p2.webp', ''),
(12, 1, 2, 'iphone/14promax-vang/iphone-14pm-p3.webp', ''),
(13, 1, 2, 'iphone/14promax-vang/iphone-14pm-p4.webp', ''),
(14, 1, 2, 'iphone/14promax-vang/iphone-14pm-p5.webp', ''),
(15, 1, 2, 'iphone/14promax-vang/iphone-14pm-p6.webp', ''),
(16, 1, 1, 'iphone/14promax-tim/iphone-14pm-p5.webp', ''),
(17, 1, 1, 'iphone/14promax-tim/iphone-14pm-p6.webp', ''),
(18, 1, 1, 'iphone/14promax-tim/iphone-14pm-p7.webp', ''),
(19, 1, 1, 'iphone/14promax-tim/iphone-14pm-p8.webp', ''),
(20, 1, 1, 'iphone/14promax-tim/iphone-14pm-p9.webp', ''),
(21, 1, 2, 'iphone/14promax-vang/iphone-14pm-p8.webp', ''),
(22, 1, 2, 'iphone/14promax-vang/iphone-14pm-p9.webp', ''),
(23, 1, 3, 'iphone/14promax-xam/iphone-14pm-p1.webp', 'true'),
(36, 2, 1, 'iphone/14promax-tim/iphone-14pm-p1.webp', 'true'),
(37, 2, 2, 'iphone/14promax-vang/iphone-14pm-p1.webp', 'true'),
(38, 2, 4, 'iphone/14pro-trang/iphone-14pro-p1.webp', 'true'),
(39, 2, 4, 'iphone/14pro-trang/iphone-14pro-p2.webp', ''),
(40, 2, 4, 'iphone/14pro-trang/iphone-14pro-p3.webp', ''),
(41, 2, 4, 'iphone/14pro-trang/iphone-14pro-p4.webp', ''),
(42, 2, 4, 'iphone/14pro-trang/iphone-14pro-p5.webp', ''),
(43, 2, 4, 'iphone/14pro-trang/iphone-14pro-p6.webp', ''),
(44, 2, 4, 'iphone/14pro-trang/iphone-14pro-p7.webp', ''),
(45, 2, 4, 'iphone/14pro-trang/iphone-14pro-p8.webp', ''),
(46, 2, 4, 'iphone/14pro-trang/iphone-14pro-p9.webp', ''),
(47, 1, 4, 'iphone/14promax-bac/iphone-14pm-p1.webp', 'true'),
(48, 1, 4, 'iphone/14promax-bac/iphone-14pm-p2.webp', ''),
(49, 1, 4, 'iphone/14promax-bac/iphone-14pm-p3.webp', ''),
(50, 1, 4, 'iphone/14promax-bac/iphone-14pm-p4.webp', ''),
(51, 1, 4, 'iphone/14promax-bac/iphone-14pm-p5.webp', ''),
(52, 1, 4, 'iphone/14promax-bac/iphone-14pm-p6.webp', ''),
(53, 1, 4, 'iphone/14promax-bac/iphone-14pm-p7.webp', ''),
(54, 1, 4, 'iphone/14promax-bac/iphone-14pm-p8.webp', ''),
(55, 1, 4, 'iphone/14promax-bac/iphone-14pm-p9.webp', ''),
(71, 30, 3, 'apple/iphone-15-series/iphone-15promax-xam.webp', 'true'),
(72, 29, 2, 'oppo/oppo-find-x-series/oppo-reno8t-5g.webp', 'true'),
(73, 31, 9, 'samsung/s23-series/galaxy-s23-ultra-xanh.webp', 'true'),
(74, 31, 5, 'samsung/s23-series/galaxy-s23-ultra-den.webp', 'true'),
(75, 31, 1, 'samsung/s23-series/galaxy-s23-ultra-tim.webp', 'true'),
(77, 31, 4, 'samsung/s22-series/oppo-reno8t-5g.webp', 'true');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phone_type`
--

DROP TABLE IF EXISTS `phone_type`;
CREATE TABLE IF NOT EXISTS `phone_type` (
  `type_id` int NOT NULL,
  `type_name` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phone_type`
--

INSERT INTO `phone_type` (`type_id`, `type_name`) VALUES
(1, 'Chính hãng'),
(2, 'Likenew'),
(3, 'Chính hãng (VN/A)');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rom`
--

DROP TABLE IF EXISTS `rom`;
CREATE TABLE IF NOT EXISTS `rom` (
  `rom_id` int NOT NULL,
  `rom_name` char(5) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`rom_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `rom`
--

INSERT INTO `rom` (`rom_id`, `rom_name`) VALUES
(1, '32gb'),
(2, '64gb'),
(3, '128gb'),
(4, '256gb'),
(5, '512gb'),
(6, '1tb');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE IF NOT EXISTS `sanpham` (
  `masp` int NOT NULL AUTO_INCREMENT,
  `tensp` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_id` int NOT NULL,
  `brand_id` int NOT NULL,
  PRIMARY KEY (`masp`),
  KEY `fk_sanpham_brand_id` (`brand_id`),
  KEY `fk_sanpham_model_id2` (`model_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`masp`, `tensp`, `model_id`, `brand_id`) VALUES
(1, 'iPhone 14 Pro Max', 4, 1),
(2, 'iPhone 14 Pro', 4, 1),
(3, 'iPhone 14 Plus', 4, 1),
(4, 'iPhone 14', 4, 1),
(29, 'OPPO Reno8 T 5G 128GB Chính Hãng', 18, 4),
(30, 'iPhone 15 Pro Max', 29, 1),
(31, 'Samsung Galaxy S23 Ultra 5G', 6, 2),
(32, 'Samsung Galaxy S23 5G ', 5, 2);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiet_hd`
--
ALTER TABLE `chitiet_hd`
  ADD CONSTRAINT `fk_chitiet_hd_mahd` FOREIGN KEY (`mahd`) REFERENCES `hoadon` (`hoadon_id`),
  ADD CONSTRAINT `fk_chitiet_hd_product_id` FOREIGN KEY (`product_id`) REFERENCES `chitiet_sanpham` (`product_id`);

--
-- Các ràng buộc cho bảng `chitiet_sanpham`
--
ALTER TABLE `chitiet_sanpham`
  ADD CONSTRAINT `fk_ctsanpham_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  ADD CONSTRAINT `fk_ctsanpham_masp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`),
  ADD CONSTRAINT `fk_ctsanpham_rom_id` FOREIGN KEY (`rom_id`) REFERENCES `rom` (`rom_id`),
  ADD CONSTRAINT `fk_ctsanpham_type_id` FOREIGN KEY (`type_id`) REFERENCES `phone_type` (`type_id`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `fk_hoadon_khachhang_id` FOREIGN KEY (`khachhang_id`) REFERENCES `khachhang` (`khachhang_id`);

--
-- Các ràng buộc cho bảng `phone_image`
--
ALTER TABLE `phone_image`
  ADD CONSTRAINT `fk_sanpham_image_color_id` FOREIGN KEY (`color_id`) REFERENCES `color` (`color_id`),
  ADD CONSTRAINT `fk_sanpham_image_masp` FOREIGN KEY (`masp`) REFERENCES `sanpham` (`masp`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_sanpham_brand_id` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`brand_id`),
  ADD CONSTRAINT `fk_sanpham_model_id2` FOREIGN KEY (`model_id`) REFERENCES `model` (`model_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
