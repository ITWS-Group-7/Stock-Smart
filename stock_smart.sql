-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2021 at 09:09 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `stock_smart`
--

-- --------------------------------------------------------

--
-- Table structure for table `donation`
--

CREATE TABLE `donation` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(255) NOT NULL,
  `expiration_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `donated` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `donation`
--

INSERT INTO `donation` (`id`, `food_name`, `userid`, `expiration_date`, `donated`) VALUES
(1, 'Milk ', 2, '2021-11-30 14:36:03', 0),
(2, 'milk', 2, '2021-12-08 14:18:59', 1),
(3, 'milk', 2, '2021-12-08 14:18:59', 1),
(4, 'milk', 2, '2021-12-08 14:18:59', 1),
(5, 'milk', 2, '2021-12-08 14:18:59', 1),
(6, 'milk', 2, '2021-12-08 14:18:59', 1),
(7, 'cheese', 2, '2021-12-08 14:18:59', 1),
(8, 'milk', 2, '2021-12-08 14:18:59', 1),
(9, 'milk', 2, '2021-12-08 14:18:59', 1),
(10, 'cheese', 2, '2021-12-08 14:18:59', 1),
(11, 'bread ', 2, '2021-12-08 14:18:59', 1),
(12, 's', 2, '2021-12-08 14:18:59', 1),
(13, 'milk', 1, '2021-12-08 14:18:59', 1),
(14, 'milka', 1, '2021-12-08 14:18:59', 1),
(15, 'milk', 1, '2021-12-08 14:18:59', 1),
(16, 'cheese', 1, '2021-12-08 14:18:59', 1),
(17, 's', 1, '2021-12-08 14:18:59', 1),
(18, 't', 1, '2021-12-08 14:18:59', 1),
(19, 'milk ', 1, '2021-12-08 14:18:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `expiration_dates`
--

CREATE TABLE `expiration_dates` (
  `id` int(11) NOT NULL,
  `food_group_id` int(11) NOT NULL,
  `expiration_days` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `expiration_dates`
--

INSERT INTO `expiration_dates` (`id`, `food_group_id`, `expiration_days`) VALUES
(1, 1, 7),
(2, 2, 14);

-- --------------------------------------------------------

--
-- Table structure for table `food_groups`
--

CREATE TABLE `food_groups` (
  `id` int(11) NOT NULL,
  `group` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_groups`
--

INSERT INTO `food_groups` (`id`, `group`) VALUES
(1, 'Dairy '),
(2, 'Fruit '),
(3, 'Vegetables '),
(4, 'Grains '),
(5, 'Protein ');

-- --------------------------------------------------------

--
-- Table structure for table `food_items`
--

CREATE TABLE `food_items` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `food_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `purchase_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `expiration_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `item_opened` tinyint(1) NOT NULL,
  `userid` int(255) NOT NULL,
  `food_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `food_items`
--

INSERT INTO `food_items` (`id`, `food_name`, `food_group`, `purchase_date`, `expiration_date`, `item_opened`, `userid`, `food_id`) VALUES
(1, 'Milk ', 'Dairy ', '2021-12-02 07:00:18', '2021-12-08 00:09:27', 0, 1, 1),
(2, 'Eggs ', 'Dairy ', '2021-12-02 07:09:27', '2021-12-17 00:20:13', 1, 1, 1),
(3, 'Carrots', 'Vegetables', '2021-12-01 03:43:14', '2021-12-01 00:10:50', 1, 2, 3),
(4, 'Chicken ', 'Protein ', '2021-12-01 23:04:20', '2021-12-08 22:58:03', 0, 3, 5),
(5, 'Apple', 'Fruit', '2021-10-05 06:20:03', '2021-10-12 23:24:03', 0, 1, 2),
(6, 'Milk ', 'Dairy ', '2021-11-30 22:12:40', '2021-12-03 22:12:40', 0, 1, 1),
(18, 'cheese', 'Dairy', '2021-12-01 05:00:00', '2021-12-16 05:00:00', 0, 1, 1),
(22, 'bread', 'Grains', '2021-12-01 05:00:00', '2021-12-08 05:00:00', 1, 1, 4),
(29, 'milk', 'Dairy', '2021-12-06 05:00:00', '2021-12-08 05:00:00', 0, 5, 1);

-- --------------------------------------------------------

--
-- Table structure for table `grocery`
--

CREATE TABLE `grocery` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bought` tinyint(1) NOT NULL,
  `food_group` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `userid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `grocery`
--

INSERT INTO `grocery` (`id`, `food_name`, `bought`, `food_group`, `userid`) VALUES
(1, 'a', 1, 'Dairy', 1),
(2, 'Orange ', 1, 'Fruits', 1),
(8, 'a', 0, 'Dairy', 8),
(9, 'ab', 1, 'Dairy', 8),
(10, 'milk ', 0, 'Dairy', 9),
(11, 'milk', 0, 'Dairy', 5);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `password`) VALUES
(1, 'John ', 'Doe ', 'doej@gmail.com', 'doej', 'pass'),
(2, 'Arian ', 'Neal ', 'nealar@gmail.com', 'neala', 'pass'),
(3, 'Abbi', 'Shannon ', 'shana@gmail.com', 'shana', 'pass'),
(4, 'sean', 'hung', 'hungs@rpi.edu', 'sean', 'pass'),
(5, 'abc', 'abc', 'abc@gmail.com', 'abc', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `userid` int(10) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `profile_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`userid`, `first_name`, `last_name`, `email`, `password`, `profile_image`) VALUES
(1, 'John ', 'Doe', 'hello@gmail.com', 'hello', 'profile.png'),
(2, 'Arian ', 'Neal ', 'hello@gmail.com', 'pass', 'profile.png'),
(3, 'Abbi ', 'Shannon ', 'shana@gmail.com', 'pass', 'profile.png '),
(4, 'sean ', 'hung ', 'hungs@rpi.edu', 'pass', 'profile.png'),
(5, 'abc', 'abc', 'abc@gmail.com', 'pass', 'profile.png');

-- --------------------------------------------------------

--
-- Table structure for table `user_random_codes`
--

CREATE TABLE `user_random_codes` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `donation`
--
ALTER TABLE `donation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `expiration_dates`
--
ALTER TABLE `expiration_dates`
  ADD PRIMARY KEY (`id`),
  ADD KEY `food_group_id` (`food_group_id`);

--
-- Indexes for table `food_groups`
--
ALTER TABLE `food_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_items`
--
ALTER TABLE `food_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`),
  ADD KEY `food_id` (`food_id`);

--
-- Indexes for table `grocery`
--
ALTER TABLE `grocery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `user_random_codes`
--
ALTER TABLE `user_random_codes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `donation`
--
ALTER TABLE `donation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `expiration_dates`
--
ALTER TABLE `expiration_dates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `food_groups`
--
ALTER TABLE `food_groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_items`
--
ALTER TABLE `food_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `grocery`
--
ALTER TABLE `grocery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `userid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_random_codes`
--
ALTER TABLE `user_random_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `donation`
--
ALTER TABLE `donation`
  ADD CONSTRAINT `donation_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`);

--
-- Constraints for table `expiration_dates`
--
ALTER TABLE `expiration_dates`
  ADD CONSTRAINT `expiration_dates_ibfk_1` FOREIGN KEY (`food_group_id`) REFERENCES `food_groups` (`id`);

--
-- Constraints for table `food_items`
--
ALTER TABLE `food_items`
  ADD CONSTRAINT `food_items_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `food_items_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food_groups` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
