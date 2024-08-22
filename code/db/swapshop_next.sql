-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2023 at 03:35 PM
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
-- Table structure for table `product_data`
--

CREATE TABLE `product_data` (
  `p_id` int(100) NOT NULL,
  `s_id` int(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `desc` varchar(250) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_data`
--

INSERT INTO `product_data` (`p_id`, `s_id`, `title`, `category`, `price`, `desc`, `image`) VALUES
(11, 1, 'the water', 'Book', 300, 'fmxgdfkutfljyhvhnvhfdytduyjfvhjvhjvghdcrdtgfvjhvjhgug', 'DATA1.jpg'),
(12, 1, 'the fire', 'Book', 123, 'cxmhfdktuk yufthfukyg y hgftufiy hgdjyr uyf u dkutfy fjfkyl gfg y ', 'DATA2.jpg'),
(13, 3, 'the air', 'Book', 321, 'ggdhtfdliyfgjhvhgfkyglugkhgv,jhgfuikgbkjbvjhfiyfvyhvfgjfkyj', 'math.webp');

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
-- Indexes for table `product_data`
--
ALTER TABLE `product_data`
  ADD PRIMARY KEY (`p_id`);

--
-- Indexes for table `seller_register`
--
ALTER TABLE `seller_register`
  ADD PRIMARY KEY (`s_id`);

--
-- Indexes for table `user_data`
--
ALTER TABLE `user_data`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `product_data`
--
ALTER TABLE `product_data`
  MODIFY `p_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `seller_register`
--
ALTER TABLE `seller_register`
  MODIFY `s_id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_data`
--
ALTER TABLE `user_data`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
