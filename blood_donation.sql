-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2018 at 08:04 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blood_donation`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_data`
--

CREATE TABLE `admin_login_data` (
  `id` int(11) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_login_data`
--

INSERT INTO `admin_login_data` (`id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `blood_register`
--

CREATE TABLE `blood_register` (
  `id` int(11) NOT NULL,
  `name` varchar(33) NOT NULL,
  `gender` varchar(22) NOT NULL,
  `age` int(6) NOT NULL,
  `moblie_no` varchar(30) NOT NULL,
  `image` longblob NOT NULL,
  `blood_group` varchar(36) NOT NULL,
  `address` varchar(36) NOT NULL,
  `city` varchar(36) NOT NULL,
  `email` varchar(36) NOT NULL,
  `password` varchar(36) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_register`
--

INSERT INTO `blood_register` (`id`, `name`, `gender`, `age`, `moblie_no`, `image`, `blood_group`, `address`, `city`, `email`, `password`) VALUES
(1, 'bijen duwal', 'male', 22, '9843931918', '', 'A-positive', 'samakhushi', 'kathmandu', 'bijen857@gmail.com', 'admin123456');

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock_available`
--

CREATE TABLE `blood_stock_available` (
  `Uid` int(11) NOT NULL,
  `Blood_group` varchar(30) NOT NULL,
  `Stock` int(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_stock_available`
--

INSERT INTO `blood_stock_available` (`Uid`, `Blood_group`, `Stock`) VALUES
(1, 'A', 60),
(2, 'O-positive', 50),
(3, 'O-negative', 100);

-- --------------------------------------------------------

--
-- Table structure for table `blood_stock_request`
--

CREATE TABLE `blood_stock_request` (
  `Uid` int(11) NOT NULL,
  `Name` varchar(26) NOT NULL,
  `Blood_type` varchar(30) NOT NULL,
  `Stock` varchar(30) NOT NULL,
  `phone_no` varchar(30) NOT NULL,
  `Address` varchar(30) NOT NULL,
  `request_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blood_stock_request`
--

INSERT INTO `blood_stock_request` (`Uid`, `Name`, `Blood_type`, `Stock`, `phone_no`, `Address`, `request_date`) VALUES
(0, 'bijen duwal', 'A-positive', '2', ' 9843931918', ' samakhushi', '2018-12-04');

-- --------------------------------------------------------

--
-- Table structure for table `user_login_data`
--

CREATE TABLE `user_login_data` (
  `Uid` int(20) NOT NULL,
  `User_name` varchar(22) NOT NULL,
  `Password` varchar(22) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_login_data`
--

INSERT INTO `user_login_data` (`Uid`, `User_name`, `Password`) VALUES
(1, 'user', 'user'),
(2, 'bijen duwal', 'admin123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login_data`
--
ALTER TABLE `admin_login_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_register`
--
ALTER TABLE `blood_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blood_stock_available`
--
ALTER TABLE `blood_stock_available`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `blood_stock_request`
--
ALTER TABLE `blood_stock_request`
  ADD PRIMARY KEY (`Uid`);

--
-- Indexes for table `user_login_data`
--
ALTER TABLE `user_login_data`
  ADD PRIMARY KEY (`Uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login_data`
--
ALTER TABLE `admin_login_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_register`
--
ALTER TABLE `blood_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blood_stock_available`
--
ALTER TABLE `blood_stock_available`
  MODIFY `Uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_login_data`
--
ALTER TABLE `user_login_data`
  MODIFY `Uid` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
