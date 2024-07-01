-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 01, 2024 at 03:46 PM
-- Server version: 5.7.24
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Category_ID` int(5) NOT NULL COMMENT 'รหัสหมวดหมู่',
  `Category_Name` varchar(100) NOT NULL COMMENT 'ชื่อหมวดหมู่'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Category_ID`, `Category_Name`) VALUES
(1, 'ของใช้'),
(3, 'ของใช้ส่วนตัว');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Product_ID` int(5) NOT NULL COMMENT 'รหัสสินค้า',
  `Product_Name` varchar(500) NOT NULL COMMENT 'ชื่อสินค้า',
  `Product_Price` int(6) NOT NULL COMMENT 'ราคาสินค้า',
  `Product_Qty` int(6) NOT NULL COMMENT 'จำนวนสินค้า',
  `Product_Category` int(5) NOT NULL COMMENT 'หมวดหมู่สินค้า'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`Product_ID`, `Product_Name`, `Product_Price`, `Product_Qty`, `Product_Category`) VALUES
(2, 'อาสนะ', 350, 107, 1),
(3, 'หิ้งพระ', 690, 109, 1),
(4, 'ตาลปัตร', 690, 10, 1),
(5, 'โต๊ะหมู่บูชา', 2999, 62, 1),
(6, 'โกศใส่กระดูก', 980, 95, 1),
(7, 'ที่กรวดน้ำ', 550, 84, 1),
(9, 'บาตร', 1659, 68, 1),
(10, 'เทส', 350, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `Sales_ID` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `Date` datetime NOT NULL COMMENT 'วันที่ทำรายการ',
  `Action_Type` varchar(20) NOT NULL COMMENT 'ตัดสต๊อก | เพิ่มสต๊อก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`Sales_ID`, `Date`, `Action_Type`) VALUES
(1, '2023-10-09 23:49:42', 'ตัดสต๊อก'),
(2, '2023-10-09 23:50:20', 'เพิ่มสต๊อก'),
(3, '2023-10-09 23:50:46', 'เพิ่มสต๊อก'),
(4, '2023-10-09 23:51:07', 'ตัดสต๊อก'),
(5, '2023-10-10 14:47:45', 'ตัดสต๊อก'),
(6, '2023-10-10 14:48:06', 'ตัดสต๊อก'),
(7, '2023-10-10 14:48:31', 'เพิ่มสต๊อก'),
(8, '2023-10-10 14:49:00', 'ตัดสต๊อก'),
(9, '2024-03-06 15:37:16', 'เพิ่มสต๊อก'),
(10, '2024-07-01 15:42:13', 'เพิ่มสต๊อก'),
(11, '2024-07-01 15:42:27', 'ตัดสต๊อก'),
(12, '2024-07-01 15:44:09', 'ตัดสต๊อก'),
(13, '2024-07-01 15:44:31', 'ตัดสต๊อก');

-- --------------------------------------------------------

--
-- Table structure for table `sales_product`
--

CREATE TABLE `sales_product` (
  `Sales_ID` int(5) NOT NULL COMMENT 'รหัสรายการสินค้า',
  `Pro_ID` int(5) NOT NULL COMMENT 'รหัสสินค้า',
  `Username` varchar(100) NOT NULL COMMENT 'ชื่อผู้ใช้',
  `Product_Qty` int(8) NOT NULL COMMENT 'จำนวนสินค้าที่เพิ่มหรือตัดสต๊อก'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sales_product`
--

INSERT INTO `sales_product` (`Sales_ID`, `Pro_ID`, `Username`, `Product_Qty`) VALUES
(1, 2, 'admin', 2),
(1, 3, 'admin', 4),
(2, 4, 'admin', 27),
(2, 5, 'admin', 9),
(2, 6, 'admin', 7),
(3, 7, 'admin', 5),
(3, 9, 'admin', 2),
(4, 2, 'admin', 1),
(4, 3, 'admin', 1),
(4, 4, 'admin', 1),
(4, 5, 'admin', 1),
(4, 6, 'admin', 1),
(4, 7, 'admin', 1),
(4, 9, 'admin', 1),
(5, 2, 'admin', 1),
(6, 2, 'admin', 10),
(7, 2, 'admin', 10),
(8, 4, 'admin', 59),
(9, 4, 'admin', 10),
(10, 2, 'admin', 5),
(11, 2, 'admin', 6),
(12, 10, 'admin', 14),
(13, 10, 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `user_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `user_type`) VALUES
('admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `Product_Category` (`Product_Category`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`Sales_ID`);

--
-- Indexes for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD PRIMARY KEY (`Sales_ID`,`Pro_ID`,`Username`),
  ADD KEY `Product_ID` (`Pro_ID`),
  ADD KEY `username` (`Username`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Category_ID` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสหมวดหมู่', AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Product_ID` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสสินค้า', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `Sales_ID` int(5) NOT NULL AUTO_INCREMENT COMMENT 'รหัสรายการสินค้า', AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`Product_Category`) REFERENCES `category` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sales_product`
--
ALTER TABLE `sales_product`
  ADD CONSTRAINT `sales_product_ibfk_1` FOREIGN KEY (`Pro_ID`) REFERENCES `product` (`Product_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_product_ibfk_2` FOREIGN KEY (`Username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `sales_product_ibfk_3` FOREIGN KEY (`Sales_ID`) REFERENCES `sales` (`Sales_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
