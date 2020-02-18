-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 30, 2018 lúc 03:33 PM
-- Phiên bản máy phục vụ: 10.1.32-MariaDB
-- Phiên bản PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlynhadat`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thongtinquanly`
--

CREATE TABLE `thongtinquanly` (
  `idCN` int(11) NOT NULL,
  `Dc_thuadat` text NOT NULL,
  `Dientich` varchar(50) NOT NULL,
  `ChuHT` varchar(50) NOT NULL,
  `LoaiNha` varchar(50) NOT NULL,
  `Md_sudung` text NOT NULL,
  `Gia_tien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `thongtinquanly`
--

INSERT INTO `thongtinquanly` (`idCN`, `Dc_thuadat`, `Dientich`, `ChuHT`, `LoaiNha`, `Md_sudung`, `Gia_tien`) VALUES
(1, '12A tô kí', '200m2', 'Hoàng Mậu Sơn', 'nhà cấp A', 'để ở nha', 15000),
(6, '11 nguyen anh thu', '1000m2', 'Nguyen dinh hoang', 'q', 'ơ', 100000),
(7, '11A tô kí', '12', 'âzi', 'd', 'o', 10000),
(8, '11 tô kí', '1000m2', 'Nguyen dinh hoang', 'd', '1', 10000),
(9, '20 hdfgyufdsgth', '12', 'abc', 'ku', 'cc', 212332),
(10, '9 to ky', '12g', 'âzi', 'q', '1', 2147483647);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `thongtinquanly`
--
ALTER TABLE `thongtinquanly`
  ADD PRIMARY KEY (`idCN`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `thongtinquanly`
--
ALTER TABLE `thongtinquanly`
  MODIFY `idCN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
