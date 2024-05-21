-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2024 at 02:08 PM
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
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`) VALUES
(1, 'Elixir of Eternal Youth', 'A magical potion brewed from rare herbs and mystical ingredients that promises everlasting youth and vitality.', 1300, 1500, 10, 'https://imgs.search.brave.com/6Vi-BKNNCpIVJ2gSSiiK4jH9tiqjLLjx1hQgH650GgY/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pLmV0/c3lzdGF0aWMuY29t/LzQ0MDkyNzYyL3Iv/aWwvZGE4ZjA1LzUx/NDgyNjIxNjEvaWxf/NjAweDYwMC41MTQ4/MjYyMTYxX2l3YWEu/anBn', '2024-05-08 00:00:00'),
(2, 'Phoenix Feather Wand', 'Crafted from the feather of a mythical phoenix, this wand channels powerful magical energies and is said to grant the user control over fire and resurrection.', 2800, 2000, 30, 'https://img.freepik.com/premium-photo/players-can-wield-power-phoenix-feather-wand-ai-generated-art_848850-1742.jpg', '2024-05-08 00:00:00'),
(3, 'Dragon Scale Armor', 'Crafted from the impenetrable scales of a dragon, this armor provides exceptional protection against physical and magical attacks.', 1600, 1900, 40, 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/3d57ada8-f751-4596-8fed-58a9cf404347/dfw2bbs-55e6398f-c27d-4ea0-87ed-6c25ca3ee0ba.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzNkNTdhZGE4LWY3NTEtNDU5Ni04ZmVkLTU4YTljZjQwNDM0N1wvZGZ3MmJicy01NWU2Mzk4Zi1jMjdkLTRlYTAtODdlZC02YzI1Y2EzZWUwYmEuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.DJyo094rdy6eZv16BY586qOEwxPRXuEY7VX4m9lYjF4', '2024-05-08 00:00:00'),
(4, 'Mermaid\'s Tear Necklace', 'A necklace made from the tears of mermaids, rumored to grant the wearer the ability to breathe underwater and communicate with sea creatures.', 1700, 1800, 60, 'https://images.pexels.com/photos/906056/pexels-photo-906056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', '2024-05-08 00:00:00'),
(5, 'Griffin Claw Dagger', 'A dagger crafted from the claw of a griffin, known for its sharpness and the power to strike with the force of a thunderbolt.', 1000, 900, 20, 'https://pic.ebid.net/upload_big/1/5/1/uo_1703076903-10674-1.jpg', '2024-05-08 00:00:00');

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
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58'),
(0, 'admin11', '$2y$10$Cxdi/T5.v2k1EZabtcxNI.U1e5qNQ8/Vj1HbxU5a9iNiWwAaDt6Ci', '2024-05-21 19:24:39'),
(0, 'admin111', '$2y$10$z3ho3hjJqLdFl7KsL9RcWO4SEmlTI6OTkOvFlmnoPWitfVWQug.aS', '2024-05-21 19:26:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
