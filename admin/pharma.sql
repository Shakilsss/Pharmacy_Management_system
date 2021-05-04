-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2021 at 03:23 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharma`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`) VALUES
(2, 'Tablet', 1),
(3, 'Liquid', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(30) NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `phone`, `address`, `city`, `zip`) VALUES
(1, 'Mohammad', '01997587682', 'Agargaon Taltola', 'Dhaka', 1207),
(2, 'Shakil Hossain', '01797587683', 'Agargaon Taltola', 'Dhaka', 1207);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE `customer_orders` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(15) NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`id`, `name`, `phone`, `address`, `city`, `zip`) VALUES
(1, '', '', '', '', 0),
(2, 'Shakil Hossain', '01797587683', 'Agargaon Taltola', 'Dhaka', 1207),
(3, 'Mohammad', '01997587682', 'Agargaon Taltola', 'Dhaka', 1207),
(4, 'Shakil Hossain', '01797587683', 'Agargaon Taltola', 'Dhaka', 1207),
(5, 'Shakil Hossain', '01797587683', 'Agargaon Taltola', 'Dhaka', 1207),
(6, '', '', '', '', 0),
(7, '', '', '', '', 0),
(8, '', '', '', '', 0),
(9, '', '', '', '', 0),
(10, '', '', '', '', 0),
(11, '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `manufacturers`
--

CREATE TABLE `manufacturers` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(25) NOT NULL,
  `zip` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `manufacturers`
--

INSERT INTO `manufacturers` (`id`, `name`, `email`, `mobile`, `address`, `city`, `zip`) VALUES
(1, 'Shakil Hossain', 'kils674@gmail.com', '01797587683', 'Agargaon Taltola', 'Dhaka', 1207),
(2, 'Shakil Hossain', 'kils674@gmail.com', '01797587683', 'Agargaon Taltola', 'Dhaka', 1207);

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `id` int(11) NOT NULL,
  `names` varchar(25) NOT NULL,
  `code` varchar(8) NOT NULL,
  `manufacturer` varchar(25) NOT NULL,
  `manufacturer_price` float NOT NULL,
  `price` float NOT NULL,
  `category_id` int(3) NOT NULL,
  `unit_id` int(3) NOT NULL,
  `strength` varchar(10) NOT NULL,
  `shelf` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `expired_date` date NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`id`, `names`, `code`, `manufacturer`, `manufacturer_price`, `price`, `category_id`, `unit_id`, `strength`, `shelf`, `quantity`, `expired_date`, `description`, `status`) VALUES
(2, 'Radiant', 'MED-162', 'Manufacturer List', 300, 350, 2, 1, '400mg', 0, 3, '2021-04-30', 'dasa', 1),
(3, 'Radiants', 'MED-163', 'Manufacturer List', 300, 350, 3, 1, '400mg', 0, 3, '2021-04-30', 'dasa', 1),
(4, 'Radiantss', 'MED-161', 'Manufacturer List', 300, 350, 2, 1, '400mg', 0, 3, '2021-04-30', 'dasa', 1),
(5, 'Radiantsss', 'MED-162', 'Manufacturer List', 300, 350, 2, 1, '400mg', 0, 3, '2021-04-30', 'dasa', 1),
(6, 'Radiantssss', 'MED-166', 'Manufacturer List', 300, 350, 2, 1, '400mg', 0, 3, '2021-04-30', 'dasa', 1),
(7, 'Radianst', 'MED-165', 'Manufacturer List', 300, 350, 2, 1, '400mg', 0, 3, '2021-04-30', 'dasa', 1),
(8, 'demoss', 'MED-604', 'Manufacturer List', 250, 300, 2, 1, '400mg', 5, 5, '2021-06-25', 'sad', 1);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_price`
--

CREATE TABLE `medicine_price` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `oreder_id` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `customer_id` int(5) NOT NULL,
  `medicine_name` varchar(25) NOT NULL,
  `qty` int(4) NOT NULL,
  `price` float NOT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `medicine_name`, `qty`, `price`, `total`) VALUES
(1, 11, 'Choose Medicine', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `status`) VALUES
(1, 'mg', 1),
(2, 'ml', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `password` varchar(15) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `role_id`) VALUES
(1, 'Super Admin', 'superadmin@gmail.com', '01234567891', '12345678', 0),
(2, 'Admin', 'admin@gmail.com', '01234567892', '12345678', 1),
(3, 'User', 'user@gmail.com', '01234567893', '12345678', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_orders`
--
ALTER TABLE `customer_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manufacturers`
--
ALTER TABLE `manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicines`
--
ALTER TABLE `medicines`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `customer_orders`
--
ALTER TABLE `customer_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `manufacturers`
--
ALTER TABLE `manufacturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `medicines`
--
ALTER TABLE `medicines`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
