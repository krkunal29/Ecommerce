-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 20, 2019 at 02:23 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignrolesmaster`
--

CREATE TABLE `assignrolesmaster` (
  `assignId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `roleId` int(11) NOT NULL,
  `Cadd` enum('0','1') DEFAULT NULL,
  `Cedit` enum('0','1') DEFAULT NULL,
  `Cremove` enum('0','1') DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(150) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`categoryId`, `category`, `createdAt`, `updatedAt`) VALUES
(1, 'Fruit', '2019-12-02 00:23:53', '2019-12-07 16:40:51'),
(2, 'Farmer', '2019-11-27 20:22:54', '2019-12-07 16:41:00'),
(3, 'Village', '2019-12-05 23:02:53', '2019-12-07 16:41:13');

-- --------------------------------------------------------

--
-- Table structure for table `blogmaster`
--

CREATE TABLE `blogmaster` (
  `blogId` int(11) NOT NULL,
  `blogTitle` varchar(255) DEFAULT NULL,
  `blogContent` text,
  `categoryId` int(11) DEFAULT NULL,
  `blogStatus` enum('0','1') DEFAULT NULL,
  `blogUrl` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogmaster`
--

INSERT INTO `blogmaster` (`blogId`, `blogTitle`, `blogContent`, `categoryId`, `blogStatus`, `blogUrl`, `createdAt`, `updatedAt`) VALUES
(1, '30 days of winter styles.', 'PHP,Web Designing,Web Technologies,Web Designer Web Developers,PHP developer,php programmer,php mysql,HTML,css,javascript,jscript', 1, '0', 'https://assets.myntassets.com/h_1440,q_100,w_1080/v1/assets/images/productimage/2019/9/9/038cf4e6-34ba-4fa7-ae3d-3356192c9e0c1568048285665-1.jpg', '2019-12-02 00:34:51', '2019-12-07 16:39:52'),
(2, 'Paper Technology', 'ww', 3, '0', 'ww', '2019-12-07 20:50:13', '2019-12-07 20:52:37'),
(3, 'Paper Technology', 'Paper technology new', 2, '1', 'www.google.com', '2019-12-07 20:53:31', '2019-12-07 21:25:56'),
(4, 'movie ticket', 'ww', 2, '1', 'www.google.com', '2019-12-07 20:56:38', '2019-12-07 21:25:31'),
(7, 'cricket bat', 'Paper technology new', 3, '0', 'www.gwwoogle.com', '2019-12-07 22:42:23', '2019-12-07 22:42:23'),
(10, 'Event Patang', 'hello 123', 1, '0', 'www.google.com', '2019-12-20 18:33:16', '2019-12-20 18:34:16'),
(11, 'Event 23', 'hello', 2, '0', 'www.google.com', '2019-12-20 18:46:38', '2019-12-20 18:46:38'),
(12, 'dd', 'ee', 3, '0', 'ee', '2019-12-20 18:47:18', '2019-12-20 18:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(150) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`categoryId`, `category`, `createdAt`, `updatedAt`) VALUES
(1, 'hello2433', '2019-11-23 00:15:31', '2019-12-13 22:43:00'),
(2, 'Cakesww', '2019-11-23 00:15:42', '2019-12-05 23:31:26'),
(5, 'navy2', '2019-12-08 01:39:39', '2019-12-08 01:39:44');

-- --------------------------------------------------------

--
-- Table structure for table `farmer_details`
--

CREATE TABLE `farmer_details` (
  `userId` int(11) NOT NULL,
  `tehsil` varchar(255) DEFAULT NULL,
  `hectre` float DEFAULT NULL,
  `water` enum('0','1') DEFAULT NULL,
  `peek` varchar(255) DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer_details`
--

INSERT INTO `farmer_details` (`userId`, `tehsil`, `hectre`, `water`, `peek`, `createdAt`, `updatedAt`) VALUES
(8, 'kunal', 1.25, '', 'kapse', '2019-12-16 15:03:50', '2019-12-16 15:03:50'),
(10, 'dhule', 9, '1', 'farmar', '2019-12-16 15:09:34', '2019-12-16 15:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `logmaster`
--

CREATE TABLE `logmaster` (
  `logId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `userAction` text,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `commentId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `commentText` text,
  `commentStatus` enum('0','1') DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `productId` int(11) NOT NULL,
  `TaxId` int(11) DEFAULT NULL,
  `salePrice` double(10,2) DEFAULT NULL,
  `displayPrice` double(10,2) DEFAULT NULL,
  `Quantity` float DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`productId`, `TaxId`, `salePrice`, `displayPrice`, `Quantity`, `createdAt`, `updatedAt`) VALUES
(1, 2, 15.20, 20.50, 20, '2019-12-07 20:53:14', '2019-12-20 18:32:11'),
(2, 2, 15.20, 20.45, 22, '2019-12-07 20:53:14', '2019-12-20 18:32:11'),
(3, 2, 15.20, 12.00, 20, '2019-12-07 20:56:19', '2019-12-20 18:32:11'),
(5, 2, 15.20, 20.00, 20, '2019-12-07 20:58:05', '2019-12-20 18:32:11'),
(7, 2, 16.00, 18.50, 15, '2019-12-07 20:59:39', '2019-12-20 18:32:11'),
(8, 2, 12.50, 20.00, 40, '2019-12-07 22:38:00', '2019-12-20 18:32:11'),
(10, 2, 10.32, 22.00, 20, '2019-12-07 23:22:49', '2019-12-20 18:32:11'),
(11, 2, 100.00, 122.00, 12, '2019-12-09 01:51:48', '2019-12-20 18:32:11'),
(12, 2, 250.00, 222.00, 22, '2019-12-20 15:54:55', '2019-12-20 18:32:11'),
(13, 2, 22.00, 33.00, 22, '2019-12-20 15:56:43', '2019-12-20 18:32:11'),
(14, 2, 1000.00, 1200.00, 10, '2019-12-20 17:07:44', '2019-12-20 18:32:11'),
(15, 2, 200.00, 75.00, 88, '2019-12-20 17:11:48', '2019-12-20 18:32:11'),
(17, 2, 200.00, 75.00, 88, '2019-12-20 17:13:58', '2019-12-20 18:32:11'),
(18, 2, 200.00, 75.00, 88, '2019-12-20 17:14:43', '2019-12-20 17:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `product_master`
--

CREATE TABLE `product_master` (
  `productId` int(11) NOT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `SKU` varchar(255) DEFAULT NULL,
  `HSN` varchar(255) DEFAULT NULL,
  `unitId` int(11) DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `subcategoryId` int(2) DEFAULT NULL,
  `description` text,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`productId`, `productName`, `SKU`, `HSN`, `unitId`, `categoryId`, `subcategoryId`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 'Thumsup', 'NULL', 'RAY125', 1, 1, NULL, 'Not Good as expected', '2019-12-07 20:53:14', '2019-12-08 00:20:48'),
(2, 'Sprite', '1245', '123459', 10, 2, NULL, 'coca-cola product', '2019-12-07 20:56:19', '2019-12-10 12:44:23'),
(3, 'Thumsup', '12', NULL, 1, 1, NULL, NULL, '2019-12-01 15:49:51', '2019-12-01 15:49:51'),
(5, 'Limka', 'S1234', '123456', 1, 1, NULL, 'coca-cola product', '2019-12-07 20:58:05', '2019-12-07 23:19:04'),
(7, 'Kinely', 'S1234', '123459', 1, 1, NULL, 'coca-cola product', '2019-12-07 20:59:39', '2019-12-07 23:15:40'),
(8, 'Fanta', 'cocafanta', '123lk9', 1, 1, NULL, 'coca cola product', '2019-12-07 22:38:00', '2019-12-08 00:31:56'),
(10, 'Appy Fizz', '', '123456', 1, 1, NULL, 'Fizz product', '2019-12-07 23:22:49', '2019-12-07 23:25:05'),
(11, 'ww', '22', '223332', 10, 1, NULL, '22w2', '2019-12-09 01:51:48', '2019-12-09 01:55:34'),
(12, 'Limka', '22', '222562', 2, 1, 6, 'ok', '2019-12-20 15:54:55', '2019-12-20 16:27:11'),
(13, 'Funta', '22', '123456', 10, 1, 18, 'ok', '2019-12-20 15:56:43', '2019-12-20 16:27:40'),
(14, 'cake biscuit', '12345', '123456', 10, 2, 17, 'ok', '2019-12-20 17:07:43', '2019-12-20 17:07:43'),
(15, 'cake biscuit23', '1245', '223332', 10, 1, 18, 'ok', '2019-12-20 17:11:48', '2019-12-20 17:19:52'),
(16, 'cake biscuit2', '1245', '223332', 10, 1, 18, 'ok', '2019-12-20 17:12:41', '2019-12-20 17:12:41'),
(17, 'cake biscuit2', '1245', '223332', 10, 1, 18, 'ok', '2019-12-20 17:13:58', '2019-12-20 17:13:58'),
(18, 'cake biscuit2', '1245', '223332', 10, 1, 18, 'ok', '2019-12-20 17:14:43', '2019-12-20 17:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `rolemaster`
--

CREATE TABLE `rolemaster` (
  `roleId` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rolemaster`
--

INSERT INTO `rolemaster` (`roleId`, `role`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', '2019-11-19 00:12:21', '2019-11-19 00:12:21'),
(2, 'User', '2019-11-19 00:12:21', '2019-11-19 00:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `subcategorymaster`
--

CREATE TABLE `subcategorymaster` (
  `subcategoryId` int(11) NOT NULL,
  `subcategoryName` varchar(255) NOT NULL,
  `categoryId` int(10) NOT NULL,
  `createAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategorymaster`
--

INSERT INTO `subcategorymaster` (`subcategoryId`, `subcategoryName`, `categoryId`, `createAt`, `updatedAt`) VALUES
(1, 'hello123456', 5, '2019-12-13 16:27:46', '2019-12-13 17:19:17'),
(6, 'gg', 1, '2019-12-13 16:28:56', '0000-00-00 00:00:00'),
(7, 'vgff', 2, '2019-12-13 16:29:11', '0000-00-00 00:00:00'),
(9, 'ww', 1, '2019-12-13 16:46:55', '2019-12-13 16:50:26'),
(10, 'dwerw', 2, '2019-12-13 16:49:25', '2019-12-13 16:50:21'),
(11, 'ee', 2, '2019-12-13 16:50:37', '0000-00-00 00:00:00'),
(12, 'ww', 2, '2019-12-13 16:51:09', '0000-00-00 00:00:00'),
(13, 'ee44', 2, '2019-12-13 16:52:59', '0000-00-00 00:00:00'),
(17, 'www', 2, '2019-12-13 16:55:14', '0000-00-00 00:00:00'),
(18, 'ee23', 1, '2019-12-13 17:14:46', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `taxmaster`
--

CREATE TABLE `taxmaster` (
  `TaxId` int(11) NOT NULL,
  `Taxname` varchar(100) NOT NULL,
  `Tax` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxmaster`
--

INSERT INTO `taxmaster` (`TaxId`, `Taxname`, `Tax`, `createdAt`, `updatedAt`) VALUES
(1, 'swach bharat', 29, '2019-11-19 21:08:29', '2019-12-08 14:36:32'),
(2, 'CGST', 12, '2019-11-19 21:08:29', '2019-12-08 13:54:01'),
(3, 'SGST', 18, '2019-11-22 23:52:02', '2019-12-08 13:54:06'),
(5, 'LIC', 17, '2019-11-22 23:56:08', '2019-12-08 13:53:46'),
(14, 'GST', 26, '2019-12-08 01:38:22', '2019-12-08 13:53:41'),
(15, 'hello', 31, '2019-12-08 14:00:34', '2019-12-08 14:00:34'),
(16, 'tax kk ', 25, '2019-12-08 14:01:07', '2019-12-08 14:01:07'),
(17, 'ss', 15, '2019-12-08 14:02:51', '2019-12-08 14:29:52'),
(18, 'hello11', 22, '2019-12-08 14:03:40', '2019-12-08 14:03:40');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `tDetailId` int(11) NOT NULL,
  `transaction_id` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `taxId` int(11) DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `rate` float DEFAULT NULL,
  `t_description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_details`
--

INSERT INTO `transaction_details` (`tDetailId`, `transaction_id`, `productId`, `taxId`, `Quantity`, `rate`, `t_description`) VALUES
(1, 1, 1, 3, 7, 82, 'RAY125'),
(2, 1, 2, 2, 1, 15.2, '123459'),
(3, 2, 7, 5, 1, 16, '123459'),
(4, 2, 1, 3, 7, 82, 'RAY125'),
(5, 2, 2, 2, 1, 15.2, '123459'),
(6, 3, 3, 2, 4, 15.2, ''),
(7, 3, 2, 3, 1, 15.2, '123459'),
(8, 4, 2, 3, 8, 15.2, '123459'),
(9, 4, 3, 2, 4, 15.2, ''),
(10, 5, 5, 3, 1, 50, '123456'),
(11, 5, 3, 2, 1, 50, ''),
(12, 6, 1, 1, 1, 50, 'RAY125'),
(13, 6, 2, 2, 1, 15.2, '123459'),
(14, 7, 1, 1, 1, 50, 'RAY125');

-- --------------------------------------------------------

--
-- Table structure for table `transaction_master`
--

CREATE TABLE `transaction_master` (
  `transactionId` int(11) NOT NULL,
  `t_type` enum('Invoice','purchase') DEFAULT NULL,
  `userId` int(11) DEFAULT NULL,
  `invDate` date DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `totalcost` int(12) NOT NULL,
  `remark` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_master`
--

INSERT INTO `transaction_master` (`transactionId`, `t_type`, `userId`, `invDate`, `discount`, `totalcost`, `remark`, `createdAt`, `updatedAt`) VALUES
(1, 'Invoice', 1, '2019-12-09', 1, 0, 'kunal kapse', '2019-12-10 18:23:09', '2019-12-10 18:23:09'),
(2, 'Invoice', 3, '2019-12-09', 1, 0, 'kunal kapse', '2019-12-10 18:23:36', '2019-12-10 18:23:36'),
(3, 'Invoice', 2, '2019-12-09', 1, 0, 'ok', '2019-12-18 16:26:15', '2019-12-18 16:26:15'),
(4, 'Invoice', 2, '2019-12-09', 1, 0, 'ok', '2019-12-18 16:27:03', '2019-12-18 16:27:03'),
(5, 'Invoice', 5, '2019-12-09', 1, 0, 'vikas invoice', '2019-12-18 16:29:14', '2019-12-18 16:29:14'),
(6, 'Invoice', 5, '2019-12-09', 1, 0, '', '2019-12-18 16:36:23', '2019-12-18 16:36:23'),
(7, 'Invoice', 5, '2019-12-09', 1, 0, '', '2019-12-18 16:37:58', '2019-12-18 16:37:58');

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

CREATE TABLE `unit_master` (
  `unitId` int(11) NOT NULL,
  `unit` varchar(100) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`unitId`, `unit`, `createdAt`, `updatedAt`) VALUES
(2, '30ml', '2019-12-05 19:54:34', '2019-12-05 20:07:30'),
(10, '40ml', '2019-12-05 20:42:36', '2019-12-08 00:55:10'),
(12, '4ml', '2019-12-08 01:39:05', '2019-12-08 01:39:22');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `userId` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `contactAddress` text,
  `pincode` varchar(100) DEFAULT NULL,
  `profileUrl` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userId`, `fname`, `mname`, `lname`, `contactAddress`, `pincode`, `profileUrl`, `createdAt`, `updatedAt`) VALUES
(1, 'kunal', 'ravindra', 'kapse', 'dhule ', '411005', NULL, '2019-12-09 23:04:15', '2019-12-09 23:04:15'),
(2, 'kunal', 'ravindra', 'kapse', 'Pune', '411005', NULL, '2019-12-09 23:05:58', '2019-12-09 23:05:58'),
(3, 'pranav', 'ravindra ', 'kapse', 'Pune india', '411005', NULL, '2019-12-09 23:07:53', '2019-12-09 23:07:53'),
(4, 'pranav', 'ee', 'kapse', 'ee', '411005', NULL, '2019-12-09 23:09:10', '2019-12-09 23:09:10'),
(5, 'vikas ', '', 'pawar', 'Pune India', '411005', NULL, '2019-12-09 23:12:34', '2019-12-09 23:12:34'),
(6, 'sanket', 'pawar', 'vikas', 'Pune', '478596', NULL, '2019-12-09 23:17:00', '2019-12-10 00:56:27'),
(7, 'vedant', 'surendra', 'kapse', 'Pune 411005', '411252', NULL, '2019-12-16 15:02:44', '2019-12-16 15:02:44'),
(8, 'chiken', 'k', 'k', 'kk', '411005', NULL, '2019-12-16 15:03:50', '2019-12-16 15:03:50'),
(10, 'kk', 'rm', 'pqr', 'Pune', '411005', NULL, '2019-12-16 15:09:34', '2019-12-16 15:52:30');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `userId` int(11) NOT NULL,
  `roleId` int(11) DEFAULT NULL,
  `emailId` varchar(100) DEFAULT NULL,
  `contactNumber` varchar(100) DEFAULT NULL,
  `upassword` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`userId`, `roleId`, `emailId`, `contactNumber`, `upassword`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'kk@gmail.com', '9766695099', '12345', '2019-12-09 23:04:15', '2019-12-16 13:23:13'),
(2, 2, 'kk1@gmail.com', '9766695099', '456', '2019-12-09 23:05:58', '2019-12-16 13:23:21'),
(3, 2, 'vk@gmail.com', '7474859652', '456789', '2019-12-09 23:07:53', '2019-12-09 23:07:53'),
(4, 2, 'vk1@gmail.com', '9766695099', 'ee', '2019-12-09 23:09:10', '2019-12-16 13:23:29'),
(5, 2, 'w@gmail.com', '7485965236', '12345', '2019-12-09 23:12:34', '2019-12-16 13:23:46'),
(6, 2, 'vqk@gmail.com', '7858521252', '123456', '2019-12-09 23:17:00', '2019-12-16 13:23:41'),
(7, 1, 'svk@gmail.com', '7485965236', '12345', '2019-12-16 15:02:44', '2019-12-16 15:02:44'),
(8, 2, 'sk@gmail.com', '7485858585', '12345', '2019-12-16 15:03:49', '2019-12-16 15:03:49'),
(10, 2, 'kk23@gmail.com', '7485965236', '12345', '2019-12-16 15:09:34', '2019-12-16 15:09:34');

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

CREATE TABLE `user_posts` (
  `postId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postContent` text,
  `postUrl` text,
  `postStatus` enum('0','1') DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `roleId` int(11) NOT NULL,
  `roleTable` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_master`
--

CREATE TABLE `wallet_master` (
  `userId` int(11) NOT NULL,
  `wallet_amount` float DEFAULT NULL,
  `refer_userId` int(11) DEFAULT NULL,
  `wallet_status` enum('0','1') DEFAULT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `wallet_transaction`
--

CREATE TABLE `wallet_transaction` (
  `tid` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `t_type` enum('C','D') DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `t_desc` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignrolesmaster`
--
ALTER TABLE `assignrolesmaster`
  ADD PRIMARY KEY (`assignId`),
  ADD KEY `roleId` (`roleId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `blogcategory`
--
ALTER TABLE `blogcategory`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `blogmaster`
--
ALTER TABLE `blogmaster`
  ADD PRIMARY KEY (`blogId`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `farmer_details`
--
ALTER TABLE `farmer_details`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `logmaster`
--
ALTER TABLE `logmaster`
  ADD PRIMARY KEY (`logId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD PRIMARY KEY (`commentId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `product_master`
--
ALTER TABLE `product_master`
  ADD PRIMARY KEY (`productId`),
  ADD KEY `product_master_ibfk_1` (`categoryId`),
  ADD KEY `product_master_ibfk_2` (`unitId`);

--
-- Indexes for table `rolemaster`
--
ALTER TABLE `rolemaster`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `subcategorymaster`
--
ALTER TABLE `subcategorymaster`
  ADD PRIMARY KEY (`subcategoryId`),
  ADD KEY `subcategorymaster_ibfk_1` (`categoryId`);

--
-- Indexes for table `taxmaster`
--
ALTER TABLE `taxmaster`
  ADD PRIMARY KEY (`TaxId`),
  ADD UNIQUE KEY `Tax` (`Tax`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`tDetailId`),
  ADD KEY `transaction_details_ibfk_1` (`productId`),
  ADD KEY `transaction_details_ibfk_2` (`transaction_id`);

--
-- Indexes for table `transaction_master`
--
ALTER TABLE `transaction_master`
  ADD PRIMARY KEY (`transactionId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `unit_master`
--
ALTER TABLE `unit_master`
  ADD PRIMARY KEY (`unitId`),
  ADD UNIQUE KEY `unit` (`unit`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`userId`),
  ADD UNIQUE KEY `emailId` (`emailId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignrolesmaster`
--
ALTER TABLE `assignrolesmaster`
  MODIFY `assignId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blogcategory`
--
ALTER TABLE `blogcategory`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blogmaster`
--
ALTER TABLE `blogmaster`
  MODIFY `blogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `rolemaster`
--
ALTER TABLE `rolemaster`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subcategorymaster`
--
ALTER TABLE `subcategorymaster`
  MODIFY `subcategoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `taxmaster`
--
ALTER TABLE `taxmaster`
  MODIFY `TaxId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `tDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaction_master`
--
ALTER TABLE `transaction_master`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `unit_master`
--
ALTER TABLE `unit_master`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
