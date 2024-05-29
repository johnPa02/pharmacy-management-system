-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 25, 2024 lúc 10:45 AM
-- Phiên bản máy phục vụ: 8.0.32
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `pharmacy_management_system`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chi_tiet_hoa_don`
--

CREATE TABLE `chi_tiet_hoa_don` (
  `id` int NOT NULL,
  `maHDB` int NOT NULL,
  `maThuoc` int NOT NULL,
  `soLuong` int NOT NULL,
  `giaTien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `chi_tiet_hoa_don`
--

INSERT INTO `chi_tiet_hoa_don` (`id`, `maHDB`, `maThuoc`, `soLuong`, `giaTien`) VALUES
(1, 8, 1, 1, '200000'),
(2, 9, 1, 2, '200000'),
(3, 9, 5, 1, '75000'),
(4, 10, 1, 2, '200000'),
(5, 10, 9, 1, '980000'),
(6, 10, 5, 10, '75000'),
(7, 11, 1, 3, '200000'),
(8, 11, 8, 1, '500000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoa_don_ban_thuoc`
--

CREATE TABLE `hoa_don_ban_thuoc` (
  `maHDB` int NOT NULL,
  `ngayLap` date NOT NULL,
  `tongGia` decimal(10,0) NOT NULL,
  `maNV` int NOT NULL,
  `maKH` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoa_don_ban_thuoc`
--

INSERT INTO `hoa_don_ban_thuoc` (`maHDB`, `ngayLap`, `tongGia`, `maNV`, `maKH`) VALUES
(8, '2024-05-13', '200000', 46, 35),
(9, '2024-05-14', '475000', 46, 36),
(10, '2024-05-14', '2130000', 46, 35),
(11, '2024-05-14', '1100000', 46, 35);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `maKH` int NOT NULL,
  `hoTen` varchar(100) NOT NULL,
  `gioiTinh` varchar(10) NOT NULL,
  `ngaySinh` date NOT NULL,
  `diaChi` varchar(255) NOT NULL,
  `ngayMuaHang` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`maKH`, `hoTen`, `gioiTinh`, `ngaySinh`, `diaChi`, `ngayMuaHang`) VALUES
(35, 'Khách 01', 'Nam', '2024-05-11', 'Sài Gòn', NULL),
(36, 'Khách 02', 'Nam', '2024-05-11', 'Hồ Chí Minh', NULL),
(37, 'Khách 03', 'Nữ', '2024-05-01', 'Hà Nội', NULL),
(38, 'Khách 04', 'Khác', '2024-05-11', '19 Nguyễn Hữu Thọ', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nhan_vien`
--

CREATE TABLE `nhan_vien` (
  `maNV` int NOT NULL,
  `hoTen` varchar(100) NOT NULL,
  `gioiTinh` varchar(10) NOT NULL,
  `ngaySinh` date NOT NULL,
  `diaChi` varchar(100) NOT NULL,
  `luong` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nhan_vien`
--

INSERT INTO `nhan_vien` (`maNV`, `hoTen`, `gioiTinh`, `ngaySinh`, `diaChi`, `luong`) VALUES
(46, 'Dược Sĩ 01', 'Nam', '2024-05-12', '20 Nguyễn Hữu Thọ', '8000000'),
(47, 'Dược Sĩ 02', 'Nữ', '2024-05-12', 'Hồ Chí Minh', '5000000'),
(49, 'Dược Sĩ 03', 'Nam', '2024-05-02', '84 Nguyễn Thị Thập', '9000000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nha_cung_cap`
--

CREATE TABLE `nha_cung_cap` (
  `maNCC` int NOT NULL,
  `tenNCC` varchar(100) NOT NULL,
  `soDienThoai` varchar(15) NOT NULL,
  `diaChi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nha_cung_cap`
--

INSERT INTO `nha_cung_cap` (`maNCC`, `tenNCC`, `soDienThoai`, `diaChi`) VALUES
(1, 'Nhà Cung Cấp 01', '0101010101', 'Pháp'),
(3, 'Nhà Cung Cấp 02', '0202020202', 'Hà Nội'),
(4, 'Nhà Cung Cấp 03', '03030303003', 'Huế'),
(5, 'Nhà Cung Cấp 04', '0404040404', 'Italia');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `email` varchar(255) NOT NULL,
  `matKhau` varchar(255) NOT NULL,
  `xacThucDangNhap` tinyint(1) DEFAULT NULL,
  `ID` int NOT NULL,
  `vaiTro` varchar(10) NOT NULL DEFAULT 'khach'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`email`, `matKhau`, `xacThucDangNhap`, `ID`, `vaiTro`) VALUES
('admin@gmail.com', '$2y$10$cLHWO0ZG0cAHUSKNZH3UYOjQ/YkYNX/6ckoMUYdudbKRve7KWDvMm', NULL, 5, 'admin'),
('khach01@gmail.com', '$2y$10$0rJ72exkecXtSOMAT/QouuI029J8nPC4p/oB/Xf6T2W.VqFkbyN8G', NULL, 35, 'khach'),
('khach02@gmail.com', '$2y$10$EeqgNwYmM1qR6TQs.Ef3R.yjYdKo6dzo.V3DGVbgKi7APm36TeA4K', NULL, 36, 'khach'),
('khach03@gmail.com', '$2y$10$mlkAmSOLPCjibT6ZMJ.VFOX8/I5c7NLPxxRJg1Hx0gY4ead7cRVm6', NULL, 37, 'khach'),
('khach04@gmail.com', '$2y$10$mviAf3v8zsI4Be1IzrbfPegkxV6VLJVZ28RCsKaZE1NHxqI6v5Bze', NULL, 38, 'khach'),
('duocsi01@gmail.com', '$2y$10$i0BUTuty4mG4dGz22cHPuOKQ4osjCKkG1XHDdXq6NswaCBhuWLwCa', NULL, 46, 'Dược sĩ'),
('duocsi02@gmail.com', '$2y$10$F720DNT6JgsKYxPj6SXFuuxlMhhXH6YTCnT7EPsX/RyK/lCglVUmG', NULL, 47, 'Dược sĩ'),
('duocsi03@gmail.com', '$2y$10$xUy2e7nSngHLvEVsE8dH9uDY1fW4qS4iwRGzSgoKgKu7TDJDmB2la', NULL, 49, 'Dược sĩ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuoc`
--

CREATE TABLE `thuoc` (
  `maThuoc` int NOT NULL,
  `tenThuoc` varchar(100) NOT NULL,
  `loai` varchar(100) NOT NULL,
  `giaBan` decimal(10,0) NOT NULL,
  `giaNhap` decimal(10,0) NOT NULL,
  `hanSuDung` date NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `maNCC` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thuoc`
--

INSERT INTO `thuoc` (`maThuoc`, `tenThuoc`, `loai`, `giaBan`, `giaNhap`, `hanSuDung`, `image`, `maNCC`) VALUES
(1, 'Bioderma', 'Dung dịch', '200000', '200000', '2024-05-05', 'http://localhost:8083/images/product_01.png', 1),
(3, 'Chanca Piedra', 'Dung dịch', '500000', '380000', '2024-05-01', 'http://localhost:8083/images/product_02.png', 1),
(5, 'Panadol Extra', 'Viên nén', '75000', '50000', '2024-05-12', 'http://localhost:8083/images/panadol.jpg', 1),
(7, 'Umcka Cool Care', 'Dung dịch', '900000', '650000', '2024-05-26', 'http://localhost:8083/images/product_03.png', 5),
(8, 'Cetyl Pure', 'Viên nén', '500000', '300000', '2024-05-31', 'http://localhost:8083/images/product_04.png', 4),
(9, 'CLA Core', 'Viên nén', '980000', '720000', '2024-06-09', 'http://localhost:8083/images/product_05.png', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD PRIMARY KEY (`id`),
  ADD KEY `maHD` (`maHDB`),
  ADD KEY `maThuoc` (`maThuoc`);

--
-- Chỉ mục cho bảng `hoa_don_ban_thuoc`
--
ALTER TABLE `hoa_don_ban_thuoc`
  ADD PRIMARY KEY (`maHDB`),
  ADD KEY `maKH` (`maKH`),
  ADD KEY `maNV` (`maNV`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`maKH`);

--
-- Chỉ mục cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD PRIMARY KEY (`maNV`);

--
-- Chỉ mục cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  ADD PRIMARY KEY (`maNCC`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ID`);

--
-- Chỉ mục cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD PRIMARY KEY (`maThuoc`),
  ADD KEY `maNCC` (`maNCC`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `hoa_don_ban_thuoc`
--
ALTER TABLE `hoa_don_ban_thuoc`
  MODIFY `maHDB` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  MODIFY `maNV` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `nha_cung_cap`
--
ALTER TABLE `nha_cung_cap`
  MODIFY `maNCC` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  MODIFY `maThuoc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chi_tiet_hoa_don`
--
ALTER TABLE `chi_tiet_hoa_don`
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_1` FOREIGN KEY (`maHDB`) REFERENCES `hoa_don_ban_thuoc` (`maHDB`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `chi_tiet_hoa_don_ibfk_2` FOREIGN KEY (`maThuoc`) REFERENCES `thuoc` (`maThuoc`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `hoa_don_ban_thuoc`
--
ALTER TABLE `hoa_don_ban_thuoc`
  ADD CONSTRAINT `hoa_don_ban_thuoc_ibfk_1` FOREIGN KEY (`maKH`) REFERENCES `khach_hang` (`maKH`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `hoa_don_ban_thuoc_ibfk_2` FOREIGN KEY (`maNV`) REFERENCES `nhan_vien` (`maNV`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD CONSTRAINT `khach_hang_ibfk_1` FOREIGN KEY (`maKH`) REFERENCES `tai_khoan` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `nhan_vien`
--
ALTER TABLE `nhan_vien`
  ADD CONSTRAINT `nhan_vien_ibfk_1` FOREIGN KEY (`maNV`) REFERENCES `tai_khoan` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `thuoc`
--
ALTER TABLE `thuoc`
  ADD CONSTRAINT `thuoc_ibfk_1` FOREIGN KEY (`maNCC`) REFERENCES `nha_cung_cap` (`maNCC`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
