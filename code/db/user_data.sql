-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2023 at 05:46 PM
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
-- Table structure for table `user_data`
--

CREATE TABLE `user_data` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `firstname` text NOT NULL,
  `surname` text NOT NULL,
  `gender` text NOT NULL,
  `college` varchar(50) NOT NULL,
  `stream` varchar(50) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `sem` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `verification_code` text NOT NULL,
  `email_verified_at` datetime(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_data`
--

INSERT INTO `user_data` (`id`, `username`, `password`, `firstname`, `surname`, `gender`, `college`, `stream`, `branch`, `sem`, `email`, `phone`, `verification_code`, `email_verified_at`) VALUES
(1, 'anuj', '@anuj', 'Anuj', 'Mishra', 'male', 'LTCE', 'B.Tech', 'data science', '4', 'anujmishra077214@gmail.com', '8591019369', '921172', '2023-03-17 16:28:26.00000'),
(2, 'anuj', '@mishra', 'Anuj', 'Mishra', 'male', 'ltce', 'b.tech', 'data sciencs', '4', 'anujmishra077214@gmail.com', '0000000000', '817012', '2023-03-17 16:34:30.00000'),
(3, 'vivek', 'sharma', 'vivek', 'sharma', 'male', 'thakur', 'bms', 'management', '6', 'sharmavivek7030@gmail.com', '0000000000', '109736', '2023-03-17 16:43:32.00000'),
(4, 'ganesh', '@ganesh', 'Ganesh', 'Mohane', 'male', 'LTCE', 'B.Tech', 'data science', '4', 'ganeshmohane5@gmail.com', '8591019369', '159119', '2023-03-19 19:36:37.00000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
