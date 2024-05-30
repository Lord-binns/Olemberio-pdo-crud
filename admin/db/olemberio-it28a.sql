-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2024 at 09:11 AM
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
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL,
  `city` varchar(50) NOT NULL,
  `street` varchar(100) NOT NULL,
  `house_number` varchar(10) NOT NULL,
  `payment_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `city`, `street`, `house_number`, `payment_id`) VALUES
(27, 'Cagayan de Oro', 'walay street', '9000', 0),
(28, 'Cebu City', 'walay street', '9000', 0);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `payment_item_name` varchar(200) NOT NULL,
  `payment_price` decimal(10,2) NOT NULL,
  `payment_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `products_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `payment_item_name`, `payment_price`, `payment_quantity`, `created_at`, `products_id`) VALUES
(187, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:12:36', 3),
(188, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:33:15', 3),
(189, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:33:23', 3),
(190, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:36:47', 3),
(191, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:36:48', 3),
(192, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:53:57', 3),
(193, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:54:01', 3),
(194, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:57:31', 3),
(195, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:58:23', 3),
(196, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:58:24', 3),
(197, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:58:31', 3),
(198, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 05:58:40', 3),
(199, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:00:10', 3),
(200, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:00:12', 3),
(201, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:03:12', 3),
(202, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:13:37', 3),
(203, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:13:58', 3),
(204, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:20:43', 3),
(205, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:20:57', 4),
(206, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:26:44', 3),
(207, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 06:35:33', 3),
(208, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:35:43', 4),
(209, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:36:26', 4),
(210, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:36:48', 4),
(211, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:44:19', 4),
(212, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:44:20', 4),
(213, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:50:48', 4),
(214, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:55:32', 4),
(215, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:55:34', 4),
(216, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:55:50', 4),
(217, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:56:40', 4),
(218, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:57:11', 4),
(219, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:58:33', 4),
(220, 'Mermaids Tear Necklace', 1800.00, 1, '2024-05-30 06:58:49', 4),
(221, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 07:00:45', 3),
(222, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 07:01:29', 3),
(223, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 07:01:31', 3),
(224, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 07:01:33', 3),
(225, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 07:01:36', 3),
(226, 'Dragon Scale Armor', 1900.00, 1, '2024-05-30 07:02:48', 3);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `products_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `rrp` decimal(10,0) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `img` text NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `users_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`products_id`, `title`, `description`, `price`, `rrp`, `quantity`, `img`, `date_added`, `users_id`) VALUES
(1, 'Elixir of Eternal Youth', 'A magical potion brewed from rare herbs and mystical ingredients that promises everlasting youth and vitality.', 1300, 1500, 20, 'https://imgs.search.brave.com/6Vi-BKNNCpIVJ2gSSiiK4jH9tiqjLLjx1hQgH650GgY/rs:fit:860:0:0/g:ce/aHR0cHM6Ly9pLmV0/c3lzdGF0aWMuY29t/LzQ0MDkyNzYyL3Iv/aWwvZGE4ZjA1LzUx/NDgyNjIxNjEvaWxf/NjAweDYwMC41MTQ4/MjYyMTYxX2l3YWEu/anBn', '2024-05-08 19:08:29', NULL),
(2, 'Phoenix Feather Wand', 'Crafted from the feather of a mythical phoenix, this wand channels powerful magical energies and is said to grant the user control over fire and resurrection.', 2800, 2000, 15, 'https://img.freepik.com/premium-photo/players-can-wield-power-phoenix-feather-wand-ai-generated-art_848850-1742.jpg', '2024-05-08 19:20:18', NULL),
(3, 'Dragon Scale Armor', 'Crafted from the impenetrable scales of a dragon, this armor provides exceptional protection against physical and magical attacks.', 1600, 1900, 40, 'https://images-wixmp-ed30a86b8c4ca887773594c2.wixmp.com/f/3d57ada8-f751-4596-8fed-58a9cf404347/dfw2bbs-55e6398f-c27d-4ea0-87ed-6c25ca3ee0ba.jpg?token=eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOiJ1cm46YXBwOjdlMGQxODg5ODIyNjQzNzNhNWYwZDQxNWVhMGQyNmUwIiwiaXNzIjoidXJuOmFwcDo3ZTBkMTg4OTgyMjY0MzczYTVmMGQ0MTVlYTBkMjZlMCIsIm9iaiI6W1t7InBhdGgiOiJcL2ZcLzNkNTdhZGE4LWY3NTEtNDU5Ni04ZmVkLTU4YTljZjQwNDM0N1wvZGZ3MmJicy01NWU2Mzk4Zi1jMjdkLTRlYTAtODdlZC02YzI1Y2EzZWUwYmEuanBnIn1dXSwiYXVkIjpbInVybjpzZXJ2aWNlOmZpbGUuZG93bmxvYWQiXX0.DJyo094rdy6eZv16BY586qOEwxPRXuEY7VX4m9lYjF4', '2024-05-08 20:09:12', NULL),
(4, 'Mermaids Tear Necklace', 'A necklace made from the tears of mermaids, rumored to grant the wearer the ability to breathe underwater and communicate with sea creatures.', 1700, 1800, 60, 'https://images.pexels.com/photos/906056/pexels-photo-906056.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1', '2024-05-08 20:14:20', NULL),
(5, 'Griffin Claw Dagger', 'A dagger crafted from the claw of a griffin, known for its sharpness and the power to strike with the force of a thunderbolt.', 1000, 900, 20, 'https://pic.ebid.net/upload_big/1/5/1/uo_1703076903-10674-1.jpg', '2024-05-08 20:21:14', NULL),
(6, 'Dragonfire Sword', 'A sword forged in dragonfire, imbued with the elemental power of flames and capable of igniting foes with a single strike.', 1500, 1600, 50, 'https://imagedelivery.net/9sCnq8t6WEGNay0RAQNdvQ/UUID-cl9hsevsq5654qnoppi6um908/public', '2024-05-21 20:22:45', NULL),
(7, 'Potion of Invisibility', 'A potion brewed from rare herbs and enchanted to render the drinker invisible for a limited duration, perfect for stealth and evasion.', 1800, 1850, 50, 'https://images.squarespace-cdn.com/content/v1/52c8e848e4b06ad2e570480f/066697b7-74d7-46df-ab0a-13a4b3d64c09/potion+of+invulnerability.png', '2024-05-21 20:41:29', NULL),
(8, 'Moonlight Blade', 'A blade infused with moonlight essence, granting its wielder heightened agility and the ability to strike with ethereal precision under moonlit skies.', 1700, 1800, 40, 'https://i.etsystatic.com/50930825/r/il/ee61bf/5918960685/il_fullxfull.5918960685_6a80.jpg', '2024-05-21 20:59:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$kGp4g1TjBK4XwLIwRbBHSeZ4W5FpPbYoB1ap5NfFUjUPAcE3KR5QG', '2024-04-29 16:39:58'),
(2, 'admin11', '$2y$10$Cxdi/T5.v2k1EZabtcxNI.U1e5qNQ8/Vj1HbxU5a9iNiWwAaDt6Ci', '2024-05-21 19:24:39'),
(3, 'admin111', '$2y$10$z3ho3hjJqLdFl7KsL9RcWO4SEmlTI6OTkOvFlmnoPWitfVWQug.aS', '2024-05-21 19:26:09'),
(4, 'imvince', '$2y$10$WwTbjwlTZelNHw/tGAjpI.Gkg.B.bOX64QJ16fzBnmk9NsifULHIK', '2024-05-27 16:21:29'),
(5, 'vince11', '$2y$10$NYNyjmd5JQTYJEsUznr21.EdRQZZEQTDQNHOjfQ6AamNfHoYNGNAO', '2024-05-29 08:40:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `payments_ibfk_1` (`products_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`products_id`),
  ADD KEY `test` (`users_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `address_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=227;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `products_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `test` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
