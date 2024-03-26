-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 26, 2024 at 12:57 AM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `group_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `credit_cards`
--

CREATE TABLE `credit_cards` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `cardholder_name` varchar(255) DEFAULT NULL,
  `card_number` varchar(255) DEFAULT NULL,
  `expiry_date` text,
  `cvv` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit_cards`
--

INSERT INTO `credit_cards` (`id`, `user_id`, `cardholder_name`, `card_number`, `expiry_date`, `cvv`, `created_at`) VALUES
(1, NULL, 'Bumpy Smith', '5674657876546798', '', '456', '2024-03-25 23:41:15'),
(2, NULL, 'Bumpy Smith', '5674657876546756', '', '456', '2024-03-25 23:55:17'),
(3, NULL, 'Bumpy Smith', '5674657876546756', '', '456', '2024-03-26 00:00:42'),
(4, NULL, 'Patrick Batemen', '5674657876872391', '', '981', '2024-03-26 00:11:04'),
(6, NULL, 'Ricky Stanicky', '4567389768987656', '', '456', '2024-03-26 00:50:08'),
(7, NULL, 'Joey Smiley', '4567389768523656', '', '678', '2024-03-26 00:51:33'),
(8, NULL, 'Bob Hope', '4567384568523567', '', '563', '2024-03-26 00:51:57'),
(9, NULL, 'Jamie Dimon', '4567384568522312', '', '554', '2024-03-26 00:52:16'),
(10, NULL, 'Jordan Belfort', '4567384568522908', '', '504', '2024-03-26 00:52:33'),
(11, NULL, 'Leonardo DiCaprio', '4567384568521632', '', '598', '2024-03-26 00:53:05'),
(12, NULL, 'Django Freeman', '4567384568521945', '', '675', '2024-03-26 00:53:28'),
(13, NULL, 'happy Gilmore', '456738456852445', '', '609', '2024-03-26 00:53:54'),
(14, NULL, 'Joey Chesnut', '456738456852311', '', '989', '2024-03-26 00:54:31'),
(15, NULL, 'Oliver Twist', '456738456853496', '', '567', '2024-03-26 00:54:51'),
(16, NULL, 'Johhny Drama', '456738456853496', '', '801', '2024-03-26 00:55:16'),
(17, NULL, 'Vincent Chase', '3475869708543672', '', '568', '2024-03-26 00:55:46'),
(18, NULL, 'Eric Murphy', '3475869708542395', '', '384', '2024-03-26 00:56:07'),
(19, NULL, 'Ai Gold', '3475869708548945', '', '805', '2024-03-26 00:56:46'),
(20, NULL, 'Gary Busey', '3475869708549008', '', '452', '2024-03-26 00:57:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
