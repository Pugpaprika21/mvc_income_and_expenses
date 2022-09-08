-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 08, 2022 at 04:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc_income_and_expenses`
--

-- --------------------------------------------------------

--
-- Table structure for table `expenses_tb`
--

CREATE TABLE `expenses_tb` (
  `expenses_id` int(11) NOT NULL COMMENT 'ลำดับ',
  `date_expenses` varchar(100) NOT NULL COMMENT 'วันที่จ่าย',
  `list_expenses` varchar(200) NOT NULL COMMENT 'รายการ',
  `price_expenses` varchar(200) NOT NULL COMMENT 'ราคา',
  `qty_expenses` varchar(200) NOT NULL COMMENT 'จำนวน',
  `pay_expenses` varchar(100) NOT NULL COMMENT 'จ่าย',
  `sum_expenses` varchar(150) NOT NULL COMMENT 'รวม',
  `change_expenses` varchar(200) NOT NULL COMMENT 'เงินทอน',
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expenses_tb`
--

INSERT INTO `expenses_tb` (`expenses_id`, `date_expenses`, `list_expenses`, `price_expenses`, `qty_expenses`, `pay_expenses`, `sum_expenses`, `change_expenses`, `id`) VALUES
(1, '2022-09-03', 'นมไวตามื้ลค์ ', '10', '1', '100', '10', '90', 5),
(2, '2022-09-03', 'น้ำเปล่าขวดใหญ่', '16', '2', '100', '32', '68', 5),
(3, '2022-09-03', 'ถั่วปากอ้า ', '5', '1', '100', '5', '95', 5),
(5, '2022-09-08', 'ผัดกระเพรา', '39', '1', '100', '39', '61', 5);

-- --------------------------------------------------------

--
-- Table structure for table `revenue_tb`
--

CREATE TABLE `revenue_tb` (
  `revenue_id` int(11) NOT NULL COMMENT 'ลำดับ',
  `revenue_date` date NOT NULL COMMENT 'วันที่รับ',
  `revenue_detail` varchar(100) NOT NULL COMMENT 'รายละเอียดรายรับ',
  `revenue_amountOfMoney` varchar(100) NOT NULL COMMENT 'จำนวนเงินที่ได้',
  `revenue_vat` varchar(100) NOT NULL COMMENT 'หักภาษี',
  `revenue_balance` varchar(100) NOT NULL COMMENT 'คงเหลือ',
  `id` int(11) NOT NULL COMMENT 'รหัสผู้ใช้'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `revenue_tb`
--

INSERT INTO `revenue_tb` (`revenue_id`, `revenue_date`, `revenue_detail`, `revenue_amountOfMoney`, `revenue_vat`, `revenue_balance`, `id`) VALUES
(4, '2022-09-02', 'ขายกับข้าว ', '5000', '3', '4850', 5),
(5, '2022-09-02', 'ขายกับข้าว', '5000', '7', '4650', 5),
(6, '2022-09-06', 'ขายโปรเเกรมเเละทำมาหากิน', '50000', '2', '49000', 5),
(12, '2022-09-08', 'เงือนเดือน', '25000', '7', '23250', 5),
(13, '2022-09-08', 'ขายน้ำปั่น ', '5000', '2', '4900', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user_tb`
--

CREATE TABLE `user_tb` (
  `id` int(11) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `gmail` varchar(30) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `image` varchar(200) NOT NULL,
  `datetime` datetime NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tb`
--

INSERT INTO `user_tb` (`id`, `username`, `password`, `gmail`, `phone`, `image`, `datetime`, `role`) VALUES
(5, '6012231021', '6012231021', 'satit@gmail.com', '0961078531', '1661659385975.jpg', '2022-08-28 06:03:05', 'on'),
(6, 'rqer', 'qerqe', 'pug@gmail.com', '0777777777', '1661660322334.jpg', '2022-08-28 06:18:42', 'on'),
(7, 'rqer', 'fd', 'satit@gmail.com', '0777777777', '1661660350173.jpg', '2022-08-28 06:19:10', 'on');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `expenses_tb`
--
ALTER TABLE `expenses_tb`
  ADD PRIMARY KEY (`expenses_id`);

--
-- Indexes for table `revenue_tb`
--
ALTER TABLE `revenue_tb`
  ADD PRIMARY KEY (`revenue_id`);

--
-- Indexes for table `user_tb`
--
ALTER TABLE `user_tb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `expenses_tb`
--
ALTER TABLE `expenses_tb`
  MODIFY `expenses_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `revenue_tb`
--
ALTER TABLE `revenue_tb`
  MODIFY `revenue_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ลำดับ', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_tb`
--
ALTER TABLE `user_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
