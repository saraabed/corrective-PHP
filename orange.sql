-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 11:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orange`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', 'b60c306f62fbc07820dd607b17968aa2');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `id` mediumint(9) NOT NULL,
  `name` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'zarqa'),
(2, 'irbid'),
(3, 'balqa'),
(4, 'aqaba'),
(5, 'test'),
(6, 'mayyas'),
(7, 'mayyas'),
(8, 'moh'),
(9, 'moh'),
(10, 'amman'),
(11, 'mayyas'),
(12, 'mayyas'),
(13, 'anzor'),
(14, ' DEPARTMENT'),
(15, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` mediumint(9) NOT NULL,
  `f_name` char(100) NOT NULL,
  `l_name` char(100) NOT NULL,
  `phone` char(100) NOT NULL,
  `department` char(100) NOT NULL,
  `task` char(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `f_name`, `l_name`, `phone`, `department`, `task`) VALUES
(1, 'name', 'email', 'phone', 'gender', 'academy'),
(2, 'name', 'email', 'phone', 'gender', 'academy'),
(3, '?', '?', '?', '?', '?'),
(4, '', '', '', '', ''),
(5, '', '', '', '', ''),
(6, 'name', 'email', 'phone', 'gender', 'academy'),
(7, 'name', 'email', 'phone', 'gender', 'academy'),
(8, '', '', '', '', ''),
(9, '', '', '', '', ''),
(10, 'mayyas', 'admin@admin.com', '65', 'Male', 'zarqa'),
(11, 'mayyas', 'admin@admin.com', '156', 'Male', 'zarqa'),
(12, 'rashed almayyas', 'rashed@orange', '0778083602', 'Male', 'zarqa'),
(13, 'mayyas', 'admin@1525', '153', 'Male', 'zarqa'),
(14, 'mnjk', 'admin@admin.com', '-145', 'Male', 'zarqa'),
(15, 'rashed almayyas``', 'admin@admin.com', '151416', 'Male', 'zarqa'),
(16, 'rashed almayyas``', 'admin@admin.com', '151416', 'Male', 'zarqa'),
(17, 'aaaa', 'bbb', '025161', ' DEPARTMENT', 'Male'),
(18, 'aaaa', 'bbb', '025161', ' DEPARTMENT', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `task`
--

CREATE TABLE `task` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `employee` varchar(100) NOT NULL,
  `description` varchar(500) NOT NULL,
  `due_date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `task`
--

INSERT INTO `task` (`id`, `title`, `employee`, `description`, `due_date`) VALUES
(20, 'test', 'mayyas', 'ttt', '2022-10-26'),
(21, 'test', 'rashed almayyas``', '151561', '2022-10-25'),
(22, 'test', 'rashed almayyas``', '151561', '2022-10-25'),
(23, 'mqyy', 'name', '14556', '2022-10-26');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task`
--
ALTER TABLE `task`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `task`
--
ALTER TABLE `task`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
