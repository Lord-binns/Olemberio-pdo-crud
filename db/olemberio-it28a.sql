-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2024 at 05:06 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `olemberio-it28a`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_thumbnail_link` varchar(255) DEFAULT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_description` varchar(100) NOT NULL,
  `product_retail_price` varchar(255) NOT NULL,
  `product_date_added` date NOT NULL,
  `product_updated_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_thumbnail_link`, `product_name`, `product_description`, `product_retail_price`, `product_date_added`, `product_updated_date`) VALUES
(1, NULL, 'magic', 'qwerty', '1', '0000-00-00', NULL),
(2, NULL, 'Haas Claw', 'asasdd', '44', '0000-00-00', NULL),
(4, NULL, 'tty', 'hgj', '7', '0000-00-00', NULL),
(5, NULL, 'ff', 'gg', '4', '0000-00-00', NULL),
(6, NULL, 'ff', 'kk', '9', '0000-00-00', NULL),
(7, NULL, 'hh', '8', '9', '0000-00-00', NULL),
(8, NULL, 'dd', '8', '1', '0000-00-00', NULL),
(9, NULL, 'jj', '8', '1', '0000-00-00', NULL),
(10, NULL, 'ff', '8', '1', '0000-00-00', NULL),
(11, NULL, 'ff', '8', '1', '0000-00-00', NULL),
(12, NULL, 'q', '8', '4', '0000-00-00', NULL),
(13, NULL, 'u', '8', '6', '0000-00-00', NULL),
(14, NULL, 'Y', '8', '1', '0000-00-00', NULL),
(15, NULL, 'I', '8', '8', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(23, 'admin', '$2y$10$54aZJptqRkPcVwo9CFTckOTRRJPfpF6x7vpSymcYGN2Yjd/JlK/8y', '2024-05-13 23:18:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
