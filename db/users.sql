-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2024 at 01:02 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

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
(5, 'admin1', '$2y$10$j/EO/Lf9YapO4FW/J9EBV.YwLZw7J5s4upJngJjBH9.fPKEReVIvO', '2024-04-29 18:14:53'),
(6, '11111', '$2y$10$fc6V/5wNk817ed4ZUjHESuTVF2hzWVoaHdIP6kBjdZrSG/MjC7dKm', '2024-04-29 18:21:36'),
(7, 'qwerty', '$2y$10$uJfiosJe05YLpzGb4xSr1O1e19PF4jXNB.U91v.BBrD8JikMS6B9y', '2024-04-29 18:22:56'),
(8, 'admin11', '$2y$10$uI8DK9RlC143Fby9l82F1O1C10BobYwintoM/HwfIBvNN2CM9/IKK', '2024-04-29 18:31:05'),
(9, 'asd', '$2y$10$8KXMgdwCCPJdUHjTeBgSSejoUGMlEuDq/cauAU73yb6ZTXqGeugtq', '2024-04-29 18:32:04'),
(10, 'asdf', '$2y$10$2i61rqi/wswg0U8VlA6sseKg0fUohGWjy6ts91Rj4gE1GjePRaHKO', '2024-04-29 18:33:04'),
(11, 'zfdhgmnjh', '$2y$10$9j4Wr80Xa6kG/KsCnVxYsuOCnmSoOhgoxk7Miuq/eu7EyO9jxDrTK', '2024-04-29 18:33:47'),
(12, 'asdffhgj', '$2y$10$4B58DWX.DaYH26AHGKx/GOAIGtJz7zcDjtI7prJkndGNDHCunf6au', '2024-04-29 18:35:14'),
(13, 'dsdahsdfbvhjhyt', '$2y$10$AjUKkrEW8WiQqnihsclYsutEO6/OvxlH0kbQ3hNrnvrKxMCT.7Ee6', '2024-04-29 18:37:30'),
(14, 'sdghfgkmhg', '$2y$10$9TWK6kcUbhTGbEOySPHSou7O6GoyOMiENnBerW7KY9XLSNBt.QwQi', '2024-04-29 18:38:02'),
(15, 'xdcfhgyklhm', '$2y$10$p9W34HzLaB6fZvET7iO9SuP35yjlzfZo2rF0Fq4X3D6V7zhSYicse', '2024-04-29 18:38:52'),
(16, 'ffhhhhhhhhh', '$2y$10$2QTskT1WQ3jk9ZQFzOs9oe.WWz/l3csMdFD0.r0TQRcev9TN3Qk4K', '2024-04-29 18:39:43'),
(17, 'jjjjjjjjj', '$2y$10$Foi85BOp7LQ4FRy51HToHOu/qRvrEGS33Kn/wNZ.XDGDx1wgySsYu', '2024-04-29 18:40:04'),
(18, 'ddddd', '$2y$10$Lzfq9QcKIQjY/G3AKEJsReQsS0bZuaCtaBdwD3zAhqfATx7.93xBG', '2024-04-29 18:40:33'),
(19, 'vvvvvvvv', '$2y$10$bsitwxRzq0KNbT5mPkkKGe5a8YSzw.BGp1pdNN6AoN1X8OVGAU3uG', '2024-04-29 18:41:54'),
(20, 'hhhhhhhh', '$2y$10$JUNrVUsuRCM4gvMHNAsmuemip7ZpjsbFt6B4SRKqK/Xa.U75T8Tte', '2024-04-29 18:42:18'),
(21, 'cccccc', '$2y$10$GgZ6sBqoUCVJmmvoMkNgUeh1ueLC0zdf6SDvXYuYudqBPeNSOXlKa', '2024-04-29 18:42:24'),
(22, 'admin', '$2y$10$M2acWCGqAb.DTkN437qYRuyosO1IQLdKq7pcFTeVtJwZF4GL6rKEa', '2024-04-29 18:48:37');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
