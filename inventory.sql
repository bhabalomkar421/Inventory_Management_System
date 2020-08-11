-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2020 at 11:40 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `customer_id`, `product_id`, `quantity`) VALUES
(1, 1, 3, 20);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(255) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_phone` bigint(10) NOT NULL,
  `customer_gender` varchar(10) NOT NULL,
  `total_expenditure` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `customer_name`, `customer_email`, `customer_phone`, `customer_gender`, `total_expenditure`) VALUES
(1, 'ansh', 'anshchhadva@gmail.com', 9212156689, 'Male', 340),
(2, 'omkar', 'omkarbhabal@gmail.com', 8828071232, 'Male', 270),
(3, 'abhishek', 'abhig0209@gmail.com', 8169115101, 'Male', 490),
(4, 'monish', 'monish@gmail.com', 836931456, 'Male', 190),
(5, 'akhil', 'akhil@gmail.com', 9191919191, 'Male', 490),
(6, 'vinay', 'vinay@gmail.com', 9929929929, 'Male', 14000),
(7, 'jay', 'jay@gmail.com', 98989898989, 'Male', 370),
(8, 'raphael', 'raphael@gmail.com', 97979797979, 'Male', 250),
(9, 'zenden', 'zen@gmail.com', 882807122, 'Male', 400),
(11, 'arpit bhatt', 'arpitbhatt@gmail.com', 7666610975, 'Male', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(255) NOT NULL,
  `customer_id` int(255) NOT NULL,
  `product_id` int(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `total_amount` int(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `customer_id`, `product_id`, `quantity`, `total_amount`, `date_time`) VALUES
(1, 1, 3, 20, 240, '2020-08-09 13:08:18'),
(2, 1, 2, 10, 100, '2020-08-09 13:09:17'),
(4, 2, 2, 15, 150, '2020-08-09 13:12:08'),
(4, 2, 3, 10, 120, '2020-08-09 13:12:08'),
(5, 3, 1, 10, 100, '2020-08-09 15:20:46'),
(5, 3, 3, 20, 240, '2020-08-09 15:20:46'),
(6, 3, 2, 15, 150, '2020-08-09 15:21:11'),
(7, 6, 4, 350, 14000, '2020-08-09 15:32:32'),
(8, 5, 3, 20, 240, '2020-08-09 15:51:26'),
(8, 5, 1, 10, 100, '2020-08-09 15:51:26'),
(9, 4, 1, 19, 190, '2020-08-09 15:55:56'),
(10, 7, 1, 12, 120, '2020-08-09 17:17:20'),
(10, 7, 2, 25, 250, '2020-08-09 17:17:21'),
(11, 5, 1, 15, 150, '2020-08-09 18:37:35'),
(12, 9, 1, 15, 150, '2020-08-09 18:43:50'),
(12, 9, 2, 25, 250, '2020-08-09 18:43:50'),
(13, 8, 1, 10, 100, '2020-08-09 19:20:19'),
(13, 8, 2, 15, 150, '2020-08-09 19:20:19');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(255) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_quantity` int(255) NOT NULL,
  `quantity_lower_limit` int(255) NOT NULL,
  `product_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_quantity`, `quantity_lower_limit`, `product_price`) VALUES
(1, 'Bisleri', 310, 50, 10),
(2, 'Lays', 285, 20, 10),
(3, 'Maggi', 85, 25, 12),
(4, 'noodles', 50, 100, 40);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
