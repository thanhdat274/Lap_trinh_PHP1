-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 19, 2020 lúc 10:27 AM
-- Phiên bản máy phục vụ: 10.4.13-MariaDB
-- Phiên bản PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `maHD` int(11) NOT NULL,
  `tongTien` int(11) NOT NULL,
  `ngayMua` date NOT NULL,
  `ghichu` varchar(50) NOT NULL,
  `tinhTrang` int(11) NOT NULL,
  `maKH` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`maHD`, `tongTien`, `ngayMua`, `ghichu`, `tinhTrang`, `maKH`) VALUES
(4, 36390000, '2020-08-11', 'Giao nhanh nha shop ', 1, 7),
(5, 36390000, '2020-08-11', 'Giao nhanh nha shop', 0, 9),
(7, 48820000, '2020-08-11', 'Giao nhanh lên ', 1, 11),
(8, 36360000, '2020-08-12', 'Giao hàng nhanh lên ', 1, 9),
(10, 47250000, '2020-08-15', 'ádsadasd', 0, 9),
(12, 42800000, '2020-08-16', 'Giao hàng nhanh nha', 0, 9),
(13, 34790000, '2020-08-19', 'Giao hành nhanh shop ơi ', 1, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadonchitiet`
--

CREATE TABLE `hoadonchitiet` (
  `maHD` int(11) NOT NULL,
  `maSP` int(11) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `hoadonchitiet`
--

INSERT INTO `hoadonchitiet` (`maHD`, `maSP`, `soLuong`, `donGia`) VALUES
(4, 35, 1, 23900000),
(4, 25, 1, 12490000),
(5, 25, 1, 12490000),
(5, 35, 1, 23900000),
(6, 29, 2, 12460000),
(6, 28, 1, 9870000),
(7, 29, 2, 12460000),
(7, 35, 1, 23900000),
(8, 29, 1, 12460000),
(8, 35, 1, 23900000),
(0, 29, 1, 12460000),
(10, 29, 3, 12460000),
(10, 28, 1, 9870000),
(11, 29, 4, 12460000),
(11, 28, 1, 9870000),
(12, 30, 1, 18900000),
(12, 35, 1, 23900000),
(13, 29, 2, 12460000),
(13, 28, 1, 9870000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `maKH` int(11) NOT NULL,
  `tenKH` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `soDT` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`maKH`, `tenKH`, `username`, `password`, `soDT`, `email`, `diaChi`, `role`) VALUES
(7, 'Phong', 'admin', '123456', '0909009009', 'phong@gmail.com', 'Huế', 1),
(9, 'Như', 'user', '123456', '0808008008', 'nhu@gmail.com', 'Huế', 0),
(11, 'Phúc', 'phuc1', '123456', '0366405769', 'phuc@gmail.com', 'Thanh Phước - Huế', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanloai`
--

CREATE TABLE `phanloai` (
  `maPhanLoai` varchar(20) NOT NULL,
  `tenPhanLoai` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `phanloai`
--

INSERT INTO `phanloai` (`maPhanLoai`, `tenPhanLoai`) VALUES
('AP', 'Apple'),
('DH', 'Đồng hồ'),
('DT', 'Điện thoại'),
('KM', 'Khuyến mãi'),
('MCGR', 'Máy cũ giá rẻ'),
('MT', 'Máy tính'),
('PK', 'Phụ kiện'),
('ST', 'Sim & Thẻ'),
('TG', 'Trả góp 0%'),
('TL', 'Tablet');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `maSP` int(11) NOT NULL,
  `tenSP` varchar(50) NOT NULL,
  `hinhAnh` varchar(20) NOT NULL,
  `soLuong` int(11) NOT NULL,
  `donGia` int(11) NOT NULL,
  `maPhanLoai` varchar(20) NOT NULL,
  `moTa` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`maSP`, `tenSP`, `hinhAnh`, `soLuong`, `donGia`, `maPhanLoai`, `moTa`) VALUES
(24, 'Sam Sung Galaxy A70', 'SSGLSA70.jpg', 100, 7490000, 'DT', '    Điện thoại thông minh SamSung '),
(25, 'Sam Sung Galaxy S20', 'SSGLS20.jpg', 100, 12490000, 'DT', '    Điện thoại thông minh SamSung           '),
(26, 'SamSung Galaxy S20+', 'SSGLS20+.jpg', 3, 12900000, 'DT', 'Siêu phẩm SamSung xuất hiện'),
(27, 'Sam Sung Galaxy S21s', 'SSGLS21S.jpg', 100, 11900000, 'DT', 'Điện thoại thông minh SamSung'),
(28, 'SamSung Galaxy A50S', 'SSGLSA50S.jpg', 100, 9870000, 'DT', 'Điện thoại thông minh SamSung'),
(29, 'SamSung Galaxy Note10', 'SSGLSNote10.jpg', 12, 12460000, 'DT', 'Điện thoại thông minh Samsung'),
(30, 'Lenovo L340', 'LeNVL340.jpg', 100, 18900000, 'MT', 'Siêu phẩm Laptop Lenovo'),
(31, 'Lenovo S145', 'LeNVS145.jpg', 100, 11200000, 'MT', 'Siêu phẩm Laptop Lenovo'),
(32, 'Lenovo S340', 'LeNVS340.jpg', 100, 16900000, 'MT', 'Siêu phẩm Laptop Lenovo'),
(33, 'Lenovo E490', 'LeNVE490.jpg', 100, 15400000, 'MT', 'Siêu phẩm Laptop Lenovo'),
(34, 'Lenovo C340', 'LeNVC340.jpg', 100, 17990000, 'MT', 'Siêu phẩm Laptop Lenovo'),
(35, 'Lenovo Y530', 'LeNVY530.jpg', 100, 23900000, 'MT', 'Siêu phẩm Laptop Lenovo');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`maHD`),
  ADD KEY `maKH` (`maKH`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `phanloai`
--
ALTER TABLE `phanloai`
  ADD PRIMARY KEY (`maPhanLoai`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`maSP`),
  ADD KEY `maPhanLoai` (`maPhanLoai`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `maHD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `maKH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `maSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`maKH`) REFERENCES `khachhang` (`maKH`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`maPhanLoai`) REFERENCES `phanloai` (`maPhanLoai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
