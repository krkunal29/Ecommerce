-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2019 at 07:16 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce`
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
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blogcategory`
--

CREATE TABLE `blogcategory` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `categoryDesc` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogcategory`
--

INSERT INTO `blogcategory` (`categoryId`, `category`, `categoryDesc`, `createdAt`, `updatedAt`) VALUES
(1, 'Farma', NULL, '2019-11-27 20:22:54', '2019-11-27 20:22:54'),
(2, 'Technology', NULL, '2019-12-03 21:15:03', '2019-12-03 21:15:03'),
(3, 'Ploitics', NULL, '2019-12-03 21:15:20', '2019-12-03 21:15:20'),
(4, 'Lifestyle', NULL, '2019-12-03 21:15:28', '2019-12-03 21:15:28'),
(5, 'Food', NULL, '2019-12-03 21:15:41', '2019-12-03 21:15:41');

-- --------------------------------------------------------

--
-- Table structure for table `blogmaster`
--

CREATE TABLE `blogmaster` (
  `blogId` int(11) NOT NULL,
  `blogTitle` varchar(255) DEFAULT NULL,
  `blogContent` text DEFAULT NULL,
  `categoryId` int(11) DEFAULT NULL,
  `blogStatus` enum('0','1') DEFAULT NULL,
  `blogUrl` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blogmaster`
--

INSERT INTO `blogmaster` (`blogId`, `blogTitle`, `blogContent`, `categoryId`, `blogStatus`, `blogUrl`, `createdAt`, `updatedAt`) VALUES
(3, 'The Basics Of Buying A Telescope', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.', 4, '0', 'http://www.youtube.com', '2019-12-03 21:23:37', '2019-12-03 21:23:37'),
(4, 'The Glossary Of Telescopes', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.', 1, '0', 'http://www.youtube.com', '2019-12-03 21:23:57', '2019-12-03 21:23:57'),
(5, 'The Night Sky', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.', 2, '0', 'http://www.youtube.com', '2019-12-03 21:24:19', '2019-12-03 21:24:19'),
(6, 'Telescopes 101', 'MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.', 3, '0', 'http://www.youtube.com', '2019-12-03 21:24:47', '2019-12-03 21:24:47');

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `categoryId` int(11) NOT NULL,
  `category` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`categoryId`, `category`, `createdAt`, `updatedAt`) VALUES
(1, 'Pickles', '2019-11-23 00:15:31', '2019-11-23 00:15:31'),
(2, 'Cakes', '2019-11-23 00:15:42', '2019-11-23 00:15:42');

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
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `farmer_details`
--

INSERT INTO `farmer_details` (`userId`, `tehsil`, `hectre`, `water`, `peek`, `createdAt`, `updatedAt`) VALUES
(4, 'San Fransico,England', 0, '', 'Ganna', '2019-12-03 00:31:43', '2019-12-03 00:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `logmaster`
--

CREATE TABLE `logmaster` (
  `logId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `userAction` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post_comments`
--

CREATE TABLE `post_comments` (
  `commentId` int(11) NOT NULL,
  `postId` int(11) DEFAULT NULL,
  `userId` int(11) NOT NULL,
  `commentText` text DEFAULT NULL,
  `commentStatus` enum('0','1') DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_comments`
--

INSERT INTO `post_comments` (`commentId`, `postId`, `userId`, `commentText`, `commentStatus`, `createdAt`, `updatedAt`) VALUES
(1, 1, 2, 'Not Good as expected', NULL, '2019-12-04 00:45:42', '2019-12-04 00:45:42');

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
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`productId`, `TaxId`, `salePrice`, `displayPrice`, `Quantity`, `createdAt`, `updatedAt`) VALUES
(1, NULL, 15.20, 20.50, 20, '2019-12-07 20:53:14', '2019-12-08 12:33:47'),
(3, NULL, 15.20, 12.00, 20, '2019-12-07 20:56:19', '2019-12-08 00:30:57'),
(5, NULL, 15.20, 20.00, 20, '2019-12-07 20:58:05', '2019-12-07 23:16:48'),
(7, NULL, 16.00, 18.50, 15, '2019-12-07 20:59:39', '2019-12-07 23:14:33'),
(8, NULL, 12.50, 20.00, 40, '2019-12-07 22:38:00', '2019-12-07 23:11:46'),
(10, NULL, 10.32, 22.00, 20, '2019-12-07 23:22:49', '2019-12-08 00:31:32');

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
  `description` text DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_master`
--

INSERT INTO `product_master` (`productId`, `productName`, `SKU`, `HSN`, `unitId`, `categoryId`, `description`, `createdAt`, `updatedAt`) VALUES
(1, 'Thumsup', 'NULL', 'RAY125', 1, 1, 'Not Good as expected', '2019-12-07 20:53:14', '2019-12-08 00:20:48'),
(3, 'Sprite', '1245', '123456', 1, 2, 'coca-cola product', '2019-12-07 20:56:19', '2019-12-08 00:32:47'),
(5, 'Limka', 'S1234', '123456', 1, 1, 'coca-cola product', '2019-12-07 20:58:05', '2019-12-07 23:19:04'),
(7, 'Kinely', 'S1234', '123459', 1, 1, 'coca-cola product', '2019-12-07 20:59:39', '2019-12-07 23:15:40'),
(8, 'Fanta', 'cocafanta', '123lk9', 1, 1, 'coca cola product', '2019-12-07 22:38:00', '2019-12-08 00:31:56'),
(10, 'Appy Fizz', '', '123456', 1, 1, 'Fizz product', '2019-12-07 23:22:49', '2019-12-07 23:25:05');

-- --------------------------------------------------------

--
-- Table structure for table `rolemaster`
--

CREATE TABLE `rolemaster` (
  `roleId` int(11) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rolemaster`
--

INSERT INTO `rolemaster` (`roleId`, `role`, `createdAt`, `updatedAt`) VALUES
(1, 'Admin', '2019-11-19 00:12:21', '2019-11-19 00:12:21'),
(2, 'User', '2019-11-19 00:12:21', '2019-11-19 00:12:21');

-- --------------------------------------------------------

--
-- Table structure for table `taxmaster`
--

CREATE TABLE `taxmaster` (
  `TaxId` int(11) NOT NULL,
  `Tax` int(11) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `taxmaster`
--

INSERT INTO `taxmaster` (`TaxId`, `Tax`, `createdAt`, `updatedAt`) VALUES
(1, 18, '2019-11-19 21:08:29', '2019-11-19 21:08:29'),
(2, 12, '2019-11-19 21:08:29', '2019-11-19 21:08:29'),
(3, 18, '2019-11-22 23:52:02', '2019-11-22 23:52:02'),
(4, 12, '2019-11-22 23:55:21', '2019-11-22 23:55:21'),
(5, 17, '2019-11-22 23:56:08', '2019-11-22 23:56:08'),
(6, 17, '2019-11-22 23:58:02', '2019-11-22 23:58:02'),
(7, 17, '2019-11-22 23:58:17', '2019-11-22 23:58:17');

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
(5, 3, 10, NULL, 5, 12, NULL),
(6, 2, 8, NULL, 2, 25, NULL),
(7, 2, 7, NULL, 2, 14, NULL),
(8, 2, 3, NULL, 5, NULL, NULL);

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
  `remark` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction_master`
--

INSERT INTO `transaction_master` (`transactionId`, `t_type`, `userId`, `invDate`, `discount`, `remark`, `createdAt`, `updatedAt`) VALUES
(2, 'Invoice', 1, '2019-11-09', 3, 'good invoice', '2019-12-01 16:55:08', '2019-12-01 16:55:08'),
(3, 'Invoice', 1, '2019-11-09', 3, 'good invoice', '2019-12-01 16:55:23', '2019-12-01 16:55:23');

-- --------------------------------------------------------

--
-- Table structure for table `unit_master`
--

CREATE TABLE `unit_master` (
  `unitId` int(11) NOT NULL,
  `unit` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `unit_master`
--

INSERT INTO `unit_master` (`unitId`, `unit`, `createdAt`, `updatedAt`) VALUES
(1, '200ml', '2019-11-23 00:17:36', '2019-11-23 00:17:36');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `userId` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `contactAddress` text DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `profileUrl` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`userId`, `fname`, `mname`, `lname`, `contactAddress`, `pincode`, `profileUrl`, `createdAt`, `updatedAt`) VALUES
(1, 'John', 'M', 'Doe', 'California,USA', NULL, NULL, '2019-12-08 23:41:02', '2019-12-08 23:41:02'),
(2, 'Tony', 'NULL', 'stark', 'San Diego,California', 'NULL', NULL, '2019-12-03 00:21:27', '2019-12-03 00:21:27'),
(4, 'Stephan', 'John', 'Hawkins', 'San Diego,California', '4789652', NULL, '2019-12-03 00:31:43', '2019-12-03 00:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `userId` int(11) NOT NULL,
  `roleId` int(11) DEFAULT NULL,
  `emailId` varchar(255) DEFAULT NULL,
  `contactNumber` varchar(100) DEFAULT NULL,
  `upassword` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`userId`, `roleId`, `emailId`, `contactNumber`, `upassword`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'john@gmail.com', '9657613754', '12345', '2019-12-01 15:49:11', '2019-12-01 15:49:11'),
(2, 2, 'tonystark@avengers.com', '8208504868', '12345', '2019-12-03 00:21:27', '2019-12-03 00:21:27'),
(4, 2, 'hulkt@avengers.com', '9763602243', '12345', '2019-12-03 00:31:43', '2019-12-03 00:31:43');

-- --------------------------------------------------------

--
-- Table structure for table `user_posts`
--

CREATE TABLE `user_posts` (
  `postId` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `postTitle` varchar(255) DEFAULT NULL,
  `postContent` text DEFAULT NULL,
  `postUrl` text DEFAULT NULL,
  `postStatus` enum('0','1') DEFAULT '1',
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_posts`
--

INSERT INTO `user_posts` (`postId`, `userId`, `postTitle`, `postContent`, `postUrl`, `postStatus`, `createdAt`, `updatedAt`) VALUES
(1, 2, 'Astronomy Binoculars A Great Alternative', ' MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction.\n\nBoot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed\n\nBoot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training. who has the willpower to actually sit through a self-imposed ', 'http://youtube.com', '1', '2019-12-04 00:19:00', '2019-12-04 00:19:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `roleId` int(11) NOT NULL,
  `roleTable` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `createdAt` datetime DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  ADD PRIMARY KEY (`categoryId`);

--
-- Indexes for table `blogmaster`
--
ALTER TABLE `blogmaster`
  ADD PRIMARY KEY (`blogId`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`categoryId`);

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
  ADD KEY `userId` (`userId`),
  ADD KEY `postId` (`postId`);

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
  ADD PRIMARY KEY (`roleId`),
  ADD UNIQUE KEY `uni` (`role`);

--
-- Indexes for table `taxmaster`
--
ALTER TABLE `taxmaster`
  ADD PRIMARY KEY (`TaxId`);

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
  ADD PRIMARY KEY (`unitId`);

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
  ADD UNIQUE KEY `contactNumber` (`contactNumber`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD PRIMARY KEY (`postId`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `wallet_master`
--
ALTER TABLE `wallet_master`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  ADD PRIMARY KEY (`tid`);

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
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blogmaster`
--
ALTER TABLE `blogmaster`
  MODIFY `blogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `farmer_details`
--
ALTER TABLE `farmer_details`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `logmaster`
--
ALTER TABLE `logmaster`
  MODIFY `logId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post_comments`
--
ALTER TABLE `post_comments`
  MODIFY `commentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_master`
--
ALTER TABLE `product_master`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rolemaster`
--
ALTER TABLE `rolemaster`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `taxmaster`
--
ALTER TABLE `taxmaster`
  MODIFY `TaxId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `tDetailId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction_master`
--
ALTER TABLE `transaction_master`
  MODIFY `transactionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `unit_master`
--
ALTER TABLE `unit_master`
  MODIFY `unitId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_posts`
--
ALTER TABLE `user_posts`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_roles`
--
ALTER TABLE `user_roles`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_master`
--
ALTER TABLE `wallet_master`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wallet_transaction`
--
ALTER TABLE `wallet_transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignrolesmaster`
--
ALTER TABLE `assignrolesmaster`
  ADD CONSTRAINT `assignrolesmaster_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `user_roles` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `assignrolesmaster_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `blogmaster`
--
ALTER TABLE `blogmaster`
  ADD CONSTRAINT `blogmaster_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `blogcategory` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `farmer_details`
--
ALTER TABLE `farmer_details`
  ADD CONSTRAINT `farmer_details_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `logmaster`
--
ALTER TABLE `logmaster`
  ADD CONSTRAINT `logmaster_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `post_comments`
--
ALTER TABLE `post_comments`
  ADD CONSTRAINT `post_comments_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_comments_ibfk_2` FOREIGN KEY (`postId`) REFERENCES `user_posts` (`postId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD CONSTRAINT `productdetails_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product_master` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_master`
--
ALTER TABLE `product_master`
  ADD CONSTRAINT `product_master_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category_master` (`categoryId`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `product_master_ibfk_2` FOREIGN KEY (`unitId`) REFERENCES `unit_master` (`unitId`) ON UPDATE NO ACTION;

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_ibfk_1` FOREIGN KEY (`productId`) REFERENCES `product_master` (`productId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaction_details_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `transaction_master` (`transactionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transaction_master`
--
ALTER TABLE `transaction_master`
  ADD CONSTRAINT `transaction_master_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_master`
--
ALTER TABLE `user_master`
  ADD CONSTRAINT `user_master_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `rolemaster` (`roleId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_posts`
--
ALTER TABLE `user_posts`
  ADD CONSTRAINT `user_posts_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallet_master`
--
ALTER TABLE `wallet_master`
  ADD CONSTRAINT `wallet_master_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user_master` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
