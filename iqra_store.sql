-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2025 at 03:43 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iqra_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` text NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `products` text DEFAULT NULL,
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `customer_name`, `customer_email`, `customer_address`, `total_price`, `order_date`, `products`, `status`) VALUES
(1, NULL, 'Sharjeel Ahmed', 'Sharjeel123@gmail.com', 'karachi center jail chorangi karachi\r\nkarachi center jail chorangi karachi', 999.00, '2025-06-16 18:14:34', '[{\"name\":\"Royal Blue\",\"size\":\"Small\",\"quantity\":\"1\",\"price\":\"999.00\"}]', 'Completed'),
(2, NULL, 'zubair khan', 'zubair12@gmail.com', 'block3', 999.00, '2025-06-16 18:44:07', '[{\"name\":\"Dark Gray\",\"size\":\"Small\",\"quantity\":\"1\",\"price\":\"999.00\"}]', 'Pending'),
(3, NULL, 'combine check', 'check11@gmail.com', 'snjsnd', 2298.00, '2025-06-16 18:46:43', '[{\"name\":\"Black Tshirt\",\"size\":\"Small\",\"quantity\":\"1\",\"price\":\"999.00\"},{\"name\":\"RED T Shirt\",\"size\":\"Small\",\"quantity\":\"1\",\"price\":\"1299.00\"}]', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `category` enum('T-Shirt','Polo','Drop Shoulder') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category`, `price`, `image`, `description`, `created_at`) VALUES
(3, 'Pac of 2 polo', 'Polo', 1500.00, 'C:/xampp/htdocs/wpl_project_final/polo/Copilot_20250611_204703.png', 'cotton', '2025-06-14 19:46:20'),
(4, 'green', 'Polo', 1599.00, 'C:/xampp/htdocs/wpl_project_final/polo/Copilot_20250611_231624.png', 'cotton shirt', '2025-06-14 19:47:02'),
(5, 'Black Tshirt', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Copilot_20250611_184223.png', 'cotton', '2025-06-14 20:01:17'),
(6, 'Neon Green', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Neon Green.jpg', 'cotton', '2025-06-14 20:16:26'),
(7, 'Royal Blue', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Royal Blue.jpg', 'cotton', '2025-06-14 20:17:21'),
(8, 'Sky Blu', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/skyblue.jpg', 'Cotton', '2025-06-14 20:19:16'),
(9, 'Dark Gray', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/dark gray.jpg', 'cotton', '2025-06-14 20:20:16'),
(10, 'Yellow T-Shirt', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Yellow.jpg', 'Pure CottonShirt', '2025-06-14 20:41:52'),
(11, 'Lilac', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Lilac.jpg', 'cotton', '2025-06-14 20:44:45'),
(12, 'Olive', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/olive.jpg', 'cotton\r\n', '2025-06-14 20:45:02'),
(13, 'Orange', 'T-Shirt', 999.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/orange.jpg', 'cotton', '2025-06-14 20:45:21'),
(14, 'pack of 2', 'Drop Shoulder', 1399.00, 'C:/xampp/htdocs/wpl_project_final/dropshoulder/Copilot_20250611_185118.png', 'cotton', '2025-06-14 20:46:50'),
(15, 'Pac of 3 polo', 'T-Shirt', 1799.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Copilot_20250611_190953.png', 'cotton', '2025-06-14 20:47:32'),
(16, 'Pac of 3 polo', 'T-Shirt', 2099.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Copilot_20250611_192232.png', 'cotton', '2025-06-14 20:48:47'),
(19, 'Pac of 5 polo', 'T-Shirt', 3499.00, 'C:/xampp/htdocs/wpl_project_final/t-shirt/Copilot_20250611_201731.png', 'cotton', '2025-06-14 20:51:12'),
(21, 'RED T Shirt', 'Polo', 1299.00, 'C:/xampp/htdocs/wpl_project_final/polo/Copilot_20250612_014250.png', 'cotton', '2025-06-14 21:03:48'),
(22, 'yellow printed', 'Drop Shoulder', 1399.00, 'C:/xampp/htdocs/wpl_project_final/dropshoulder/1740157379142.jpg', 'cotton', '2025-06-14 21:07:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `username`, `email`, `password`, `created_at`) VALUES
(2, 'New Admin', 'admin', 'newadmin@gmail.com', 'newpassword', '2025-06-14 18:45:53'),
(3, 'sharjeel', 'sharjeel123', 'sharjeel123@gmail.com', '0f124e1435509e10a867cbb65bac28bce5103ee334a389de3bd79226f56e3466', '2025-06-14 18:57:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
