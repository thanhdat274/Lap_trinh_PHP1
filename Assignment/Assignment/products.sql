-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2021 lúc 01:06 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignment`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name_products` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `hot_sale` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_old` decimal(11,0) NOT NULL,
  `creatat` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian thêm sản phẩm',
  `updateted` timestamp NOT NULL DEFAULT current_timestamp() COMMENT 'thời gian sửa sản phẩm'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name_products`, `images`, `price`, `hot_sale`, `price_old`, `creatat`, `updateted`) VALUES
(74, 'more11', 'Screenshot (100).png', '10000033', '12', '11111', '2021-07-31 11:03:10', '2021-07-31 11:03:10'),
(75, 'more444', 'Screenshot (101).png', '3', '12', '11111', '2021-07-31 11:03:19', '2021-07-31 11:03:19'),
(76, 'more', 'Screenshot (108).png', '10000033', '1', '11111', '2021-07-31 11:03:34', '2021-07-31 11:03:34'),
(77, 'more11', 'Screenshot (107).png', '9999999999', '1', '11111', '2021-07-31 11:03:50', '2021-07-31 11:03:50');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
