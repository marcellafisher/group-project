-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 26, 2024 at 10:26 AM
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
(20, NULL, 'Gary Busey', '3475869708549008', '', '452', '2024-03-26 00:57:13'),
(21, NULL, 'marcella fisher', '1234567891234567890', '', '122', '2024-03-26 09:41:22'),
(22, NULL, 'marcella fisher', '1234567891234567890', '', '122', '2024-03-26 09:41:49'),
(23, NULL, 'marcella fisher', '1234567891234567890', '', '122', '2024-03-26 09:43:47'),
(24, NULL, 'marcella fisher', '1234567891234567890', '', '122', '2024-03-26 09:44:19'),
(25, NULL, 'Johnson Smith', '5432487964520816', '', '344', '2024-03-26 09:47:54'),
(26, NULL, 'Johnson Smith', '5432487964520816', '', '344', '2024-03-26 09:51:22'),
(27, NULL, 'Johnson Smith', '5432487964520816', '', '344', '2024-03-26 09:53:11'),
(28, NULL, 'Johnson Smith', '43598475134875', '', '344', '2024-03-26 09:55:05'),
(29, NULL, 'Mike Smith', '293846349857', '', '122', '2024-03-26 09:58:58'),
(30, NULL, 'Aiden Marchlik', '2301954723598', '', '124', '2024-03-26 10:10:35');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `position` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `first_name`, `last_name`, `position`) VALUES
(1, 'John', 'Doe', 'Manager'),
(2, 'Jane', 'Smith', 'Sales Associate'),
(3, 'Michael', 'Johnson', 'Cashier'),
(4, 'Emily', 'Brown', 'Assistant Manager'),
(5, 'David', 'Lee', 'Sales Associate'),
(6, 'Sarah', 'Wilson', 'Cashier'),
(7, 'Daniel', 'Anderson', 'Sales Associate'),
(8, 'Jessica', 'Martinez', 'Store Clerk'),
(9, 'Matthew', 'Taylor', 'Sales Associate'),
(10, 'Amanda', 'Thomas', 'Cashier'),
(11, 'Christopher', 'Hernandez', 'Sales Associate'),
(12, 'Ashley', 'Young', 'Store Clerk'),
(13, 'James', 'Walker', 'Sales Associate'),
(14, 'Lauren', 'King', 'Cashier'),
(15, 'Andrew', 'Scott', 'Sales Associate'),
(16, 'Megan', 'White', 'Store Clerk'),
(17, 'Ryan', 'Hill', 'Sales Associate'),
(18, 'Stephanie', 'Green', 'Cashier'),
(19, 'William', 'Evans', 'Sales Associate'),
(20, 'Natalie', 'Adams', 'Store Clerk');

-- --------------------------------------------------------

--
-- Table structure for table `inventory`
--

CREATE TABLE `inventory` (
  `inventory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL,
  `cost` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inventory`
--

INSERT INTO `inventory` (`inventory_id`, `product_id`, `date`, `quantity`, `cost`) VALUES
(1, 1, '2024-01-01', 500, '10.00'),
(2, 2, '2024-01-02', 150, '15.00'),
(3, 3, '2024-01-03', 200, '20.00'),
(4, 4, '2024-01-04', 250, '25.00'),
(5, 5, '2024-01-05', 300, '30.00'),
(6, 6, '2024-01-06', 350, '35.00'),
(7, 7, '2024-01-07', 400, '40.00'),
(8, 8, '2024-01-08', 450, '45.00'),
(9, 9, '2024-01-09', 500, '50.00'),
(10, 10, '2024-01-10', 550, '55.00'),
(11, 11, '2024-01-11', 500, '60.00'),
(12, 12, '2024-01-12', 650, '65.00'),
(13, 13, '2024-01-13', 700, '70.00'),
(14, 14, '2024-01-14', 750, '75.00'),
(15, 15, '2024-01-15', 800, '80.00'),
(16, 16, '2024-01-16', 850, '85.00'),
(17, 17, '2024-01-17', 900, '90.00'),
(18, 18, '2024-01-18', 950, '95.00'),
(19, 19, '2024-01-19', 1000, '100.00'),
(20, 20, '2024-01-20', 1050, '105.00'),
(21, 22, '2024-01-01', 107, '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `employee_id`, `user_id`, `product_id`, `date`) VALUES
(1, 10, 3, 11, '2012-12-24'),
(2, 10, 3, 10, '2012-12-24'),
(3, 2, 14, 6, '2012-12-24'),
(81, 10, 3, 10, '2024-12-12'),
(82, 8, 14, 19, '2024-11-25'),
(83, 6, 6, 8, '2024-10-18'),
(84, 1, 20, 12, '2024-09-30'),
(85, 3, 10, 5, '2024-08-21'),
(86, 17, 17, 20, '2024-07-14'),
(87, 15, 8, 2, '2024-06-27'),
(88, 4, 19, 16, '2024-05-09'),
(89, 7, 5, 11, '2024-04-12'),
(90, 11, 16, 3, '2024-03-05'),
(91, 14, 12, 14, '2024-02-18'),
(92, 20, 7, 9, '2024-01-21'),
(93, 5, 18, 7, '2023-12-14'),
(94, 12, 11, 13, '2023-11-27'),
(95, 2, 9, 15, '2023-10-09'),
(96, 18, 4, 1, '2023-09-12'),
(97, 19, 15, 18, '2023-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `size` varchar(20) DEFAULT NULL,
  `color` varchar(50) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category`, `name`, `size`, `color`, `price`) VALUES
(1, 'Shirt', 'Men\'s Casual Shirt', 'M', 'Blue', '29.99'),
(2, 'Shirt', 'Women\'s Formal Shirt', 'S', 'White', '39.99'),
(3, 'Shirt', 'Unisex Graphic T-Shirt', 'L', 'Black', '24.99'),
(4, 'Shirt', 'Men\'s Polo Shirt', 'XL', 'Red', '34.99'),
(5, 'Shirt', 'Women\'s Blouse', 'M', 'Pink', '29.99'),
(6, 'Shoe', 'Men\'s Sneakers', '10', 'White', '79.99'),
(7, 'Shoe', 'Women\'s Heels', '8', 'Black', '59.99'),
(8, 'Shoe', 'Unisex Running Shoes', '9', 'Gray', '89.99'),
(9, 'Shoe', 'Men\'s Dress Shoes', '11', 'Brown', '99.99'),
(10, 'Shoe', 'Women\'s Boots', '7', 'Tan', '69.99'),
(11, 'Pant', 'Men\'s Jeans', '34x32', 'Blue', '49.99'),
(12, 'Pant', 'Women\'s Leggings', 'M', 'Black', '29.99'),
(13, 'Pant', 'Unisex Sweatpants', 'L', 'Gray', '39.99'),
(14, 'Pant', 'Men\'s Chinos', '36x32', 'Khaki', '44.99'),
(15, 'Pant', 'Women\'s Dress Pants', 'S', 'Navy', '54.99'),
(16, 'Shirt', 'Men\'s Casual Shirt', 'L', 'Green', '29.99'),
(17, 'Shirt', 'Women\'s Formal Shirt', 'M', 'Blue', '39.99'),
(18, 'Shirt', 'Unisex Graphic T-Shirt', 'XL', 'Gray', '24.99'),
(19, 'Shirt', 'Men\'s Polo Shirt', 'M', 'Navy', '34.99'),
(21, 'Mens Shirt', 'Shirt', 'XL', 'Blue', '75.00'),
(22, 'Pants', 'Marcella Pants', 'M', 'Pink', '100.00'),
(23, 'Shoes', 'Air Force 1', '11', 'Black', '111.00');

-- --------------------------------------------------------

--
-- Table structure for table `returns`
--

CREATE TABLE `returns` (
  `return_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `inventory_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `returns`
--

INSERT INTO `returns` (`return_id`, `order_id`, `inventory_id`, `date`, `quantity`) VALUES
(1, 1, 3, '2012-12-24', 1),
(2, 1, 4, '2012-12-24', 3),
(3, 1, 5, '2012-12-24', 2),
(4, 2, 6, '2012-12-24', 4),
(5, 2, 7, '2012-12-24', 5),
(6, 2, 8, '2012-12-24', 1),
(7, 3, 9, '2012-12-24', 2),
(8, 3, 10, '2012-12-24', 3),
(9, 3, 11, '2012-12-24', 4),
(10, 81, 12, '2012-12-24', 5),
(11, 81, 13, '2012-12-24', 1),
(12, 81, 14, '2012-12-24', 2),
(13, 82, 15, '2012-12-24', 3),
(14, 82, 16, '2012-12-24', 4),
(15, 82, 17, '2012-12-24', 5),
(16, 83, 18, '2012-12-24', 1),
(17, 83, 19, '2012-12-24', 2),
(18, 83, 20, '2012-12-24', 3),
(19, 84, 1, '2012-12-24', 4),
(20, 84, 2, '2012-12-24', 5),
(21, 1, 3, '2012-12-24', 1),
(24, 1, NULL, '2024-12-12', 1),
(25, 1, NULL, '2024-12-12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `username`, `role`) VALUES
(1, 'bsmith', 'admin'),
(2, 'pjones', 'customer');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(128) DEFAULT NULL,
  `forename` varchar(128) DEFAULT NULL,
  `surname` varchar(128) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shirt_size` char(2) NOT NULL,
  `pant_size` varchar(10) NOT NULL,
  `shoe_size` varchar(5) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `forename`, `surname`, `password`, `shirt_size`, `pant_size`, `shoe_size`, `address`) VALUES
(4, 'pjones', 'Jane', 'Smith', '$2y$10$sZhHPFDFtAZu7rKTKmgEReX81Qvqa/OkOkauknW9105Ns8qOQmp.a', 'S', '6', '8', '456 Elm St'),
(5, 'user3', 'Michael', 'Johnson', '$2y$10$d6507321fa9a3dc706494fe013d442db$', 'L', '36x34', '11', '789 Oak St'),
(6, 'user4', 'Emily', 'Brown', '$2y$10$8439aa6863ce10684d7883ee272d946d$', 'XL', '10', '9.5', '1011 Pine St'),
(7, 'user5', 'David', 'Lee', '$2y$10$b678b86fcdfaca79f691d14c7d0f8b71$', 'S', '30x30', '8', '1213 Maple St'),
(8, 'user6', 'Sarah', 'Wilson', '$2y$10$ce8d45abc50d204b98cddfb6e1708661$', 'M', '4', '7.5', '1415 Cedar St'),
(9, 'user7', 'Daniel', 'Anderson', '$2y$10$393ab685db8929ae37ed64192b7b1708$', 'L', '34x32', '9', '1617 Birch St'),
(10, 'user8', 'Jessica', 'Martinez', '$2y$10$c5ac4f81c7d1306946f2c65d84771ebf$', 'XL', '10', '10', '1819 Walnut St'),
(11, 'user9', 'Matthew', 'Taylor', '$2y$10$397e2a98877c6c814ec9071d09b33831$', 'S', '29x30', '8.5', '2021 Ash St'),
(12, 'user10', 'Amanda', 'Thomas', '$2y$10$29e68f55df9511f7af37cd0ef811abfa$', 'M', '2', '7', '2223 Spruce St'),
(13, 'user11', 'Christopher', 'Hernandez', '$2y$10$9c7ffe541cf2aed6edd0cbd787bdac97$', 'L', '36x32', '9.5', '2425 Oak St'),
(14, 'user12', 'Ashley', 'Young', '$2y$10$8b38a4ad74af04defbbdbabe7bc1579d$', 'XL', '10', '11', '2627 Pine St'),
(15, 'user13', 'James', 'Walker', '$2y$10$d016d67f94755ed5a6ba68e17b9e2610$', 'S', '28x30', '8', '2829 Cedar St'),
(16, 'user14', 'Lauren', 'King', '$2y$10$2a88cddc3eb16779452f1b245d57a13e$', 'M', '6', '7.5', '3031 Maple St'),
(17, 'user15', 'Andrew', 'Scott', '$2y$10$6425d4b33e90524964e01f3e386754a6$', 'L', '34x34', '9', '3233 Birch St'),
(18, 'user16', 'Megan', 'White', '$2y$10$023f7c424a027ac8a11d08b05c2e68eb$', 'XL', '8', '10.5', '3435 Walnut St'),
(19, 'user17', 'Ryan', 'Hill', '$2y$10$51e6721d59ea6e7cb6b21860fbcba4a1$', 'S', '30x30', '8', '3637 Ash St'),
(20, 'user18', 'Stephanie', 'Green', '$2y$10$adbbbfbfeda511b183c0190772b6ccb6$', 'M', '6', '7', '3839 Spruce St'),
(21, 'user19', 'Olivia', 'Clark', '$2y$10$220b0a46d388661ba9de474060c0e38f$', 'S', '2', '8.5', '4041 Elm St'),
(22, 'user20', 'Kevin', 'Adams', '$2y$10$b7650cac6c2ae68cca1e49844d71ae56$', 'M', '32x32', '9', '4243 Oak St'),
(23, 'user23', 'John', 'Apples', '$2y$10$09d2a1c047a5e1b5e3aa2ca7d70b76e3$', 'L', '33x34', '10', '122 Leaf St'),
(26, 'user25', 'Can', 'Canny', '$2y$10$09d2a1c047a5e1b5e3aa2ca7d70b76e3$', 'L', '33x34', '10', '11112 Brown St'),
(27, 'bsmith', 'Brian', 'Smith', '$2y$10$XvaPKxBWZpIPVl6ZUOd6lOZtgd6ZmU5Nz8x/kN6OMy9rstzR.P8Qe', 'S', '6', '8', '200 Elm St'),
(28, 'jsmith', 'Jackson', 'Smith', '$2y$10$SoxqzcaZ7BsmMmFES/ZovOadQBw.jzkzxeXqy0QgmosRUFqnLuPge', 'L', 'L', '9', '34 S Wolcott');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `credit_cards`
--
ALTER TABLE `credit_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `inventory`
--
ALTER TABLE `inventory`
  ADD PRIMARY KEY (`inventory_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `employee_id` (`employee_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `returns`
--
ALTER TABLE `returns`
  ADD PRIMARY KEY (`return_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `inventory_id` (`inventory_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `credit_cards`
--
ALTER TABLE `credit_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `inventory`
--
ALTER TABLE `inventory`
  MODIFY `inventory_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `returns`
--
ALTER TABLE `returns`
  MODIFY `return_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `returns`
--
ALTER TABLE `returns`
  ADD CONSTRAINT `returns_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`),
  ADD CONSTRAINT `returns_ibfk_2` FOREIGN KEY (`inventory_id`) REFERENCES `inventory` (`inventory_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
