-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 09, 2022 lúc 05:43 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`) VALUES
(1, 'admin', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart_detail`
--

CREATE TABLE `tbl_cart_detail` (
  `id_cart_detail` int(11) NOT NULL,
  `code_cart` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart_detail`
--

INSERT INTO `tbl_cart_detail` (`id_cart_detail`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(40, '6693', 40, 1),
(41, '6693', 39, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_khachhang` int(11) NOT NULL,
  `hovaten` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `taikhoan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sodienthoai` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `chucvu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_khachhang`, `hovaten`, `taikhoan`, `matkhau`, `sodienthoai`, `email`, `diachi`, `chucvu`) VALUES
(1, 'Nguyễn Minh Tâm', 'maki', 'c4ca4238a0b923820dcc509a6f75849b', 569029353, 'mikuohandsome@gmail.com', '																																																																																																																																										13/C																																																																																																																			', 1),
(3, 'Pham Anh Vinh', 'vinh', 'c4ca4238a0b923820dcc509a6f75849b', 1, 'chanhchanh145@gmail.com', 'sdasdad', 0),
(4, 'bùi Quang Đức', 'duc', 'c4ca4238a0b923820dcc509a6f75849b', 372373042, 'bqd122002@gmail.com', '204 trần duy hưng', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int(11) NOT NULL,
  `tendanhmuc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thutu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(14, 'nam', 1),
(15, 'nữ', 2),
(16, 'trẻ em', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `id_cart` int(11) NOT NULL,
  `id_khachhang` int(11) NOT NULL,
  `code_cart` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cart_status` int(11) NOT NULL,
  `cart_payment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_payment`) VALUES
(38, 4, '6693', 1, 'Tiền Mặt');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int(11) NOT NULL,
  `tensanpham` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `masanpham` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `giasanpham` float NOT NULL,
  `soluong` int(11) NOT NULL,
  `hinhanh` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tomtat` tinytext COLLATE utf8mb4_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_danhmuc` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masanpham`, `giasanpham`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `id_danhmuc`, `trangthai`) VALUES
(17, 'áo hoodie adlv', '001', 399000, 100, 'tải xuống (3).jpeg', '', 'áo đủ mẫu đủ size', 7, 1),
(18, 'áo hoodie adidas', '002', 299000, 100, 'images (1).jpeg', '', '', 7, 1),
(19, 'áo hoodie champion', '003', 599000, 100, 'tải xuống.jpeg', '', '', 7, 1),
(20, 'áo hoodie nike', '004', 499000, 100, 'tải xuống (1).jpeg', '', '', 7, 1),
(21, 'áo hoodie essentials', '005', 199000, 100, 'tải xuống (2).jpeg', '', '', 7, 1),
(22, 'áo sweater nike', '006', 249000, 100, 'images.jpeg', '', '', 7, 1),
(23, 'áo sweater adlv', '007', 549000, 100, 'swt adlv.jpg', '', '', 7, 1),
(24, 'áo sweater champion', '008', 349000, 100, 'swt champion.jpg', '', '', 7, 1),
(25, 'áo sweater adidas', '009', 290000, 100, 'swt add.jpg', '', '', 7, 1),
(26, 'áo sweater essentials', '010', 999000, 0, 'swt es.jpg', '', '', 7, 1),
(28, 'áo nỉ ngắn champion', '002', 349000, 100, 'quan ni.jpg', '', '', 11, 1),
(29, 'áo hoodie champion', '003', 299000, 100, 'hoodie.jpeg', '', '', 10, 1),
(30, 'ÁO THUN COTTON BIG KIDS, LOGO SCRIPT', '004', 599000, 100, 'te em 2.webp', '', '', 12, 1),
(31, 'TRANG TRÌNH BÀY IPO DÀNH CHO TRẺ MỚI BIẾT ĐI, NGHỆ THUẬT VẼ ĐEN', '005', 459000, 100, 'dep.webp', '', '', 12, 1),
(32, 'áo gió champion', '006', 399000, 100, 'ao gio.jpg', '', '', 10, 1),
(33, 'DI SẢN TEE, CƠ SỞ THỰC VẬT', '007', 699000, 100, 'ao5.webp', '', '', 11, 1),
(34, 'GÓI QUẦN SỊP BOXER NAM PERFORMANCE, HÚT ẨM, CHỐNG MÙI, POLYESTER SPANDEX, BỘ 3 GÓI, MÀU ĐEN', '008', 749000, 100, 'quan sip.webp', '', '', 11, 1),
(35, 'ROGUE, LÚA MÌ/KẸO CAO SU CỦA NAM GIỚI', '009', 3499000, 100, 'giay.webp', '', '', 11, 1),
(36, 'MŨ LEN SỌC POM WELLS CHO NAM', '010', 4999000, 100, 'mu.webp', '', '', 11, 1),
(37, 'ÁO HOODIE DỆT NGƯỢC NAM, MIỆNG C', '011', 999000, 100, 'ao4.webp', '', '', 11, 1),
(38, 'REVERSE WEAVE JOGGER, BLAZE DAZE, 30.5', '012', 2499000, 100, 'REVERSE WEAVE JOGGER, BLAZE DAZE, 30.5.webp', '', '', 11, 1),
(39, 'REVERSE WEAVE HOODIE, BLAZE DAZE', '013', 599000, 100, 'REVERSE WEAVE HOODIE, BLAZE DAZE.webp', '', '', 11, 1),
(40, 'PUFFER VEST', '014', 49900, 190, 'PUFFER VEST.webp', '', '', 11, 1),
(41, 'REVERSE WEAVE, WAKE-UP HOOD', '015', 690000, 100, 'REVERSE WEAVE, WAKE-UP HOOD.webp', '', '', 11, 1),
(42, 'TRANG TRÌNH BÀY IPO DÀNH CHO TRẺ MỚI BIẾT ĐI, NGHỆ THUẬT VẼ ĐEN', '019', 100000, 2147483647, 'HIGH PILE FLEECE HALF-ZIP SWEATSHIRT, ARCH CHAMPION BLOCK LETTERING.webp', '', '', 11, 1),
(71, 'AOP PUFFER JACKET', '022', 699000, 100, 'z3947111920845_976784047a8fbd073e9bce84c2fe34a9.jpg', '', '', 14, 1),
(72, 'COZY HIGH PILE ANORAK', '1', 599000, 100, 'z3947111847143_374aec28a64626e1e857d443bb94c8b3.jpg', '', '', 14, 1),
(73, 'CORDUROY HIGH PILE FLEECE FULL-ZIP JACKET, SCRIPT', '60', 899000, 100, 'z3947111881717_016677b574dd38581039808ffb32c1a9.jpg', '', '', 14, 1),
(74, 'COZY HIGH PILE VEST', '016', 599000, 100, 'z3947111838230_178625a559130fd1b0ff26b2461c49a2.jpg', '', '', 14, 1),
(75, 'SLIDE SHOES', '123', 566000, 100, 'z3947111960825_0e0face424a8f6a6ae6e0560ae4c4afc.jpg', '', '', 16, 1),
(76, 'SLIDE MONOGRAM CHAMPION', '566000', 588000, 100, 'z3947112034776_c16f5fd1e8727d8e67e96bbb87ab91e1.jpg', '', '', 16, 1),
(77, 'SHOES CHAMPION', '56', 555000, 100, 'z3947112159957_e67233bb477d0ae139efe69768c0d47e.jpg', '', '', 15, 1),
(78, 'HOODIE CHAMPION', '1', 566000, 100, 'z3947112356190_a249cfc8a4954f245335ad77b3b495cc.jpg', '', '', 14, 1),
(79, 'HOODIE CHAMPIOM MOUTH c', '79', 499000, 100, 'z3947112071870_884624cf5d9943cdacdc89ed56174dee.jpg', '', '', 16, 1),
(80, 'SWEATER CHAMPION FOR KID', '90', 899000, 100, 'z3947112039578_b0fb30807ab8f895b10fb732c19f0971.jpg', '', '', 16, 1),
(81, 'SHOES HIGH CHAMPION', '52', 199000, 100, 'z3947112289979_9cde2c7f6053eefc36f6aaa5103348cd.jpg', '', '', 15, 1),
(82, 'CAMO AMMO CARGO OLIVE', '77', 3999000, 100, 'z3947112268535_afa9288d4e804c23172b9fb9ae187e51.jpg', '', '', 15, 1),
(83, 'BIG GIRLS’ FRENCH TERRY CREW, CLASSIC SCRIPT', '11', 999000, 100, 'z3947112065237_1da65332c805c0067831b72aa17e20aa.jpg', '', '', 16, 1),
(84, 'CHAMPION SCRIPT', '40', 990000, 100, 'z3947112024670_eff1f7160d54eb737adf9de68f578ba3.jpg', '', '', 16, 1),
(85, 'HAT CHAMPION', '19', 999000, 1000, 'z3947112090019_d20a28685942b1c28978c1cb388577c7.jpg', '', '', 16, 1),
(86, 'VASIRTY CHAMPION FOR GIRL', '123', 990000, 100, 'z3947112188356_affeab38a11cdf5239cdff5b3803b37d.jpg', '', '', 15, 1),
(87, 'PADDED HOODED JACKET', '10000', 999000, 100, 'z3947112209440_9ed1f284747357b3799a7960850eff4d.jpg', '', '', 15, 1),
(88, 'PADDED HOODED JACKET WHITE', '59999', 5999000, 100, 'z3947112143058_bce9947a09ae0f277904ade3ae4d47f5.jpg', '', '', 15, 1),
(89, 'HAT CHAMPION LOGO C', '155', 999000, 100, 'z3947112114905_1cbc7a6c484f088510c218503784ade3.jpg', '', '', 14, 1),
(90, 'HAT CHAMPION LOGO C 002', '8000', 990000, 100, 'z3947112136932_bf7ee8fb2b5f82af370db3588dbdce50.jpg', '', '', 14, 1),
(91, 'SWEATER CHAMPION FOR GIRL', '999', 999000, 100, 'z3947112232514_b67076a9a5fb925a418b3f65558ef446.jpg', '', '', 15, 1),
(92, 'VARSITY CHAMPION FOR MEN', '4666', 999000, 100, '1.jpg', '', '', 14, 1),
(93, 'JACKET CHAMPION FOR MEN', '1999', 5999000, 100, 'z3947112003350_3c4618dafcac217f784ba833657ab0a9.jpg', '', '', 14, 1),
(94, 'HOODIE CHAMPION LOGO C FOR MEN', '9999', 499000, 100, 'z3947112328269_73200add99dde37aa16432df6d9269e7.jpg', '', '', 14, 1),
(95, 'STADIUM WINDBREAKER', '4444', 999000, 100, 'z3947639313747_bc6f4b56e1ce695cbe335e1ca9decda3.jpg', '', '', 16, 1),
(96, 'CITY SPORT FLOUNCE SKORT', '5555', 299000, 100, 'z3947642750533_1a8d6ca25ff9f44f3df3beb2704a2eda.jpg', '', '', 15, 1),
(97, 'CITY SPORT SKORT BLACK', '1999', 399000, 100, 'z3947644711209_d5a6dda042812b728c60dcf011546c60.jpg', '', '', 15, 1),
(98, 'ANIKE SOCKS', '99999', 199000, 100, 'z3947647600713_259ec84a6f3c2c5bd1448d2c156023d9.jpg', '', '', 14, 1),
(99, 'CREW WITH MEMORY CÚHION', '899', 29900, 100, 'z3947650509190_5dfac1af5f5551e9a1cee2cca24fb005.jpg', '', '', 14, 1),
(100, 'THE AUTHENTIC STRAPPY SPORTS BRA', '99999', 299000, 100, 'z3947651705207_063f613ba89f3cc7b11c805c2ab85c70.jpg', '', '', 15, 1),
(101, 'THE AUTHENTIC SPORTS BRA', '199', 1990000, 100, 'z3947653613596_2823ee5ba98e057c86d73ff10984b180.jpg', '', '', 15, 1),
(102, 'THE AUTHENTIC SPORTS BRA  CHAMPION LOGO', '888', 888000, 100, 'z3947655782995_2b7fe74e8184e14fca6e89cd58ba8301.jpg', '', '', 15, 1),
(103, 'SOFT TOUCH FLARE', '1997', 100000, 233, 'z3947660664441_8eda4775f0814b6bcd119401d0d05488.jpg', '', '', 15, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `adress` varchar(250) NOT NULL,
  `note` varchar(250) NOT NULL,
  `id_dangky` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `adress`, `note`, `id_dangky`) VALUES
(1, '', '', '', '', 3),
(2, '', '', '', '', 3),
(3, 'nguyễn Minh Tâm', '05658421', '23/C', '', 1),
(4, 'Pham Anh Vinh', '', '', '', 3),
(5, 'Pham Anh Vinh', '', '', '', 3);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Chỉ mục cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  ADD PRIMARY KEY (`id_cart_detail`);

--
-- Chỉ mục cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_khachhang`);

--
-- Chỉ mục cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`id_cart`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Chỉ mục cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_cart_detail`
--
ALTER TABLE `tbl_cart_detail`
  MODIFY `id_cart_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_khachhang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT cho bảng `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
