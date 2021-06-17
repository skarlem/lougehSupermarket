-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 09:11 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supermarket`
--

-- --------------------------------------------------------

--
-- Table structure for table `sales_record`
--

CREATE TABLE `sales_record` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price_per_unit` int(11) DEFAULT NULL,
  `customer_name` text DEFAULT NULL,
  `customer_address` text DEFAULT NULL,
  `customer_contact` varchar(11) DEFAULT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sales_record`
--

INSERT INTO `sales_record` (`id`, `product_name`, `quantity`, `price_per_unit`, `customer_name`, `customer_address`, `customer_contact`, `total_price`) VALUES
(7, 'FreshEggs', 8, 16, 'Carl Michael Jandic', 'Purok Del Pilar', '91581869', 128),
(8, 'carl michael jandic', 799, 550000, 'Carl', 'Bachelors Quarters, MSU Campus, Fatima', '09515061401', 41548),
(11, 'FreshEggs', 555, 16, 'Mhounic Joy', 'Purok Del Pilar', '09158010869', 29415),
(12, 'Laptop', 7000, 550000, 'Carl', 'Purok Del Pilar', '09158010869', 364000),
(13, 'Cellphone', 15, 18999, 'Carl Michael Jandic', 'Purok Del Pilar', '09158010869', 284985);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(8) UNSIGNED ZEROFILL NOT NULL,
  `supplier_name` text DEFAULT NULL,
  `contact_no` char(11) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `contact_no`, `address`, `status`) VALUES
(00000001, 'Chokoy Store', '09515061401', 'General Santos City', 1),
(00000002, 'Botoy Goods', '09158010869', 'Tampakan, South Cotabato', 1);

-- --------------------------------------------------------

--
-- Table structure for table `supply`
--

CREATE TABLE `supply` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `barcode` varchar(11) DEFAULT NULL,
  `product_desc` text DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `cost_per_unit` int(11) DEFAULT NULL,
  `supplier_id_code` char(8) DEFAULT NULL,
  `unit_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supply`
--

INSERT INTO `supply` (`id`, `barcode`, `product_desc`, `quantity`, `cost_per_unit`, `supplier_id_code`, `unit_price`) VALUES
(52, '33333333333', 'Laptop', 992200, 450000, '00000002', 550000),
(53, '22222222222', 'Fresh Eggs', 9444, 8, '00000001', 16),
(54, '11111111111', 'Cellphone', 11231, 13999, '00000001', 18999);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sales_record`
--
ALTER TABLE `sales_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supply`
--
ALTER TABLE `supply`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sales_record`
--
ALTER TABLE `sales_record`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
