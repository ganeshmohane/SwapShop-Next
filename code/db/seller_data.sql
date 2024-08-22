-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 05:47 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swapshop_next`
--

-- --------------------------------------------------------

--
-- Table structure for table `seller_register`
--

CREATE TABLE `seller_register` (
  `s_id` int(225) NOT NULL,
  `s_username` varchar(20) NOT NULL,
  `s_password` varchar(20) NOT NULL,
  `s_firstname` text NOT NULL,
  `s_surname` text NOT NULL,
  `s_gender` text NOT NULL,
  `s_college` varchar(100) NOT NULL,
  `s_stream` varchar(100) NOT NULL,
  `s_branch` varchar(50) NOT NULL,
  `s_sem` varchar(20) NOT NULL,
  `s_email` varchar(50) NOT NULL,
  `s_phone` varchar(10) NOT NULL,
  `s_verification_code` text NOT NULL,
  `s_email_verified_at` datetime(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `seller_register`
--

INSERT INTO `seller_register` (`s_id`, `s_username`, `s_password`, `s_firstname`, `s_surname`, `s_gender`, `s_college`, `s_stream`, `s_branch`, `s_sem`, `s_email`, `s_phone`, `s_verification_code`, `s_email_verified_at`) VALUES
(1, 'anuj', '@anuj', 'Anuj', 'Mishra', 'male', 'LTCE', 'B.Tech', 'data science', '4', 'anujmishra077214@gmail.com', '8591019369', '293254', '2023-03-18 20:29:06.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `seller_register`
--
ALTER TABLE `seller_register`
  ADD PRIMARY KEY (`s_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `seller_register`
--
ALTER TABLE `seller_register`
  MODIFY `s_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
