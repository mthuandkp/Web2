-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 07, 2021 lúc 05:59 PM
-- Phiên bản máy phục vụ: 5.7.35-0ubuntu0.18.04.1
-- Phiên bản PHP: 7.2.34-23+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `market`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `CategoryID` int(10) NOT NULL,
  `Name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Description` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`CategoryID`, `Name`, `Description`) VALUES
(1, 'Fruit', 'The kind that can use be eaten without cooking'),
(2, 'Green Vegetables', 'The kind used to make salads or soups'),
(3, 'Spices', 'The kind used to enhance the taste of food');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `CustomerID` int(10) NOT NULL,
  `Password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Fullname` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `Address` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `City` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`CustomerID`, `Password`, `Fullname`, `Address`, `City`) VALUES
(1, '123456', 'Phạm Nguyễn Minh Thuận ', '211/11A Gò Xoài,Bình Hưng Hòa A,Bình Tân', 'TP Hồ Chí Minh'),
(2, '123123', 'Mai Thúy Vy', 'Thành phố Dĩ An', 'Bình Dương'),
(3, 'thuy123', 'Nguyễn Thị Thanh Thúy ', 'Bến Lức', 'Long An'),
(4, '123456', 'Hello', '1211/11', 'HCM'),
(5, '1234566', 'Nguyễn Thị Thanh Thúy', 'Bến Lức', 'Long An'),
(6, '1234', 'Phạm Nguyễn Minh Thuận', 'Ấp 1 xã Thạnh Trị huyện Bình Đại', 'Bến Tre'),
(7, '123123', 'Nguyễn Thị Thanh Thúy', 'Bến Lức', 'Long An'),
(8, 'mthuan', 'Phạm Nguyễn Minh Thuận', 'Ấp Bình Thạnh 1,xã Thạnh Trị,huyện Bình Đại', 'Bến Tre');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `VegetableID` int(10) NOT NULL,
  `Quantity` tinyint(4) NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`OrderID`, `VegetableID`, `Quantity`, `Price`) VALUES
(1, 1, 1, 245000),
(1, 2, 1, 35000),
(1, 3, 1, 55000),
(2, 1, 2, 450000),
(3, 1, 3, 245000),
(3, 2, 3, 35000),
(3, 3, 2, 55000),
(4, 1, 1, 245000),
(4, 2, 2, 35000),
(4, 3, 1, 55000),
(5, 1, 2, 245000),
(5, 2, 1, 35000),
(5, 3, 1, 55000),
(6, 1, 1, 245000),
(6, 2, 2, 35000),
(7, 1, 2, 245000),
(7, 2, 3, 35000),
(7, 3, 2, 55000),
(8, 1, 1, 245000),
(8, 2, 2, 35000),
(8, 3, 3, 55000),
(9, 1, 1, 245000),
(9, 4, 1, 28000),
(9, 7, 1, 35000),
(10, 1, 1, 245000),
(10, 2, 2, 35000),
(10, 4, 1, 28000),
(10, 14, 1, 74000),
(11, 2, 1, 35000),
(11, 4, 1, 28000),
(11, 5, 1, 6000),
(12, 1, 1, 245000),
(12, 2, 1, 35000),
(12, 3, 1, 55000),
(12, 4, 1, 28000),
(12, 6, 1, 130000),
(13, 1, 2, 245000),
(13, 2, 1, 35000),
(13, 3, 1, 55000),
(14, 2, 1, 35000),
(14, 3, 1, 55000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `OrderID` int(10) UNSIGNED NOT NULL,
  `CustomerID` int(10) NOT NULL,
  `Date` date NOT NULL,
  `Total` float NOT NULL,
  `Note` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`OrderID`, `CustomerID`, `Date`, `Total`, `Note`) VALUES
(1, 2, '2021-08-10', 335000, 'Khách hàng mua hàng'),
(2, 1, '2021-08-06', 490000, 'Khách hàng mua hàng'),
(3, 1, '2021-08-27', 1615000, 'KhaÌch mua haÌ€ng'),
(4, 1, '2021-08-27', 495000, 'KhaÌch mua haÌ€ng'),
(5, 1, '2021-08-27', 1440000, 'KhaÌch mua haÌ€ng'),
(6, 1, '2021-08-28', 350000, 'Khách mua hàng'),
(7, 1, '2021-08-28', 705000, 'Khách mua hàng'),
(8, 1, '2021-08-28', 480000, 'Khách mua hàng'),
(9, 1, '2021-09-04', 308000, 'Khách mua hàng'),
(10, 3, '2021-09-04', 2397000, 'Khách mua hàng'),
(11, 6, '2021-09-06', 69000, 'Khách mua hàng'),
(12, 1, '2021-09-06', 493000, 'Ghi chu mua hang'),
(13, 1, '2021-09-07', 580000, 'Khách mua hàng'),
(14, 1, '2021-09-07', 90000, 'Khách mua hàng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `vegetable`
--

CREATE TABLE `vegetable` (
  `VegetableID` int(10) NOT NULL,
  `CategoryID` int(10) NOT NULL,
  `VegetableName` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `Unit` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `Amount` int(10) NOT NULL,
  `Image` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `vegetable`
--

INSERT INTO `vegetable` (`VegetableID`, `CategoryID`, `VegetableName`, `Unit`, `Amount`, `Image`, `Price`) VALUES
(1, 1, 'Táo Mỹ', 'kg', 8, 'taomy.jpg', 245000),
(2, 2, 'Cải Thảo ', 'Bó', 60, 'cai-thao.jpg', 35000),
(3, 3, 'Đậu Hà Lan', 'Túi', 190, 'dauhalan.jpg', 55000),
(4, 2, 'Củ cải đỏ', 'kg', 99, '6000198686686.jpg', 28000),
(5, 1, 'Dưa Hấu', 'kg', 50, 'duahau.jpg', 6000),
(6, 1, 'Lê Việt Nam', 'kg', 155, 'quale.jpg', 130000),
(7, 2, 'Rau Xà Lách', 'bó', 99, 'rauxalach.jpg', 35000),
(8, 2, 'Rau Má', 'túi', 200, 'rauma.jpg', 44000),
(9, 2, 'Rau Muống', 'bó', 250, 'raumuong.png', 12000),
(10, 3, 'Đậu Phộng', 'túi', 500, 'dauphong.jpg', 20000),
(11, 3, 'Đậu Nành', 'kg', 74, 'daunanh.jpg', 75000),
(14, 1, 'Mận Hà Nội', 'kg', 123, '2021-09-04manhanoi.jpg', 74000),
(15, 2, 'Củ Cải Trắng', 'kg', 100, '2021-09-07cu-cai-trang.jpg', 5000),
(16, 2, 'Cải Bẹ Xanh', 'bó', 80, '2021-09-07caibexanh.jpg', 50000);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`OrderID`,`VegetableID`),
  ADD KEY `OrderID` (`OrderID`),
  ADD KEY `VegetableID` (`VegetableID`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`OrderID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Chỉ mục cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD PRIMARY KEY (`VegetableID`),
  ADD KEY `CatagoryID` (`CategoryID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD CONSTRAINT `orderdetail_ibfk_1` FOREIGN KEY (`OrderID`) REFERENCES `orders` (`OrderID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `orderdetail_ibfk_2` FOREIGN KEY (`VegetableID`) REFERENCES `vegetable` (`VegetableID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customers` (`CustomerID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `vegetable`
--
ALTER TABLE `vegetable`
  ADD CONSTRAINT `vegetable_ibfk_1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;