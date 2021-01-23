-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2021 at 06:41 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `practice`
--

-- --------------------------------------------------------

--
-- Table structure for table `agami_order`
--

CREATE TABLE `agami_order` (
  `id` bigint(20) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `order_description` text NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `agami_order`
--

INSERT INTO `agami_order` (`id`, `order_id`, `order_description`, `created_at`) VALUES
(2, 'Test', 'Description', '2021-01-23 11:35:11'),
(3, 'AGAMI-03', 'HP Laptop', '2021-01-23 11:35:27'),
(4, 'AGAMI-04', 'T-shirt Price 230 TK', '2021-01-23 11:35:54'),
(5, 'Test', 'Description', '2021-01-23 11:36:18'),
(6, 'AGAMI-06', 'Samsun A50. Price 24000 TK Only.', '2021-01-23 11:36:44'),
(10, 'AGAMI-09', 'Airplane', '2021-01-23 08:37:30'),
(22, 'Test 3', 'Description 3', '2021-01-23 18:40:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agami_order`
--
ALTER TABLE `agami_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agami_order`
--
ALTER TABLE `agami_order`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
