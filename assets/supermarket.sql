-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2021 at 06:33 PM
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
(1, 'whatkindofproductisthis?213123213', 3, 7, '333123123', '3333', '0', 21),
(2, '432reffsdfdsd', 4, 5000, 'Carl', 'Purok Del Pilar', '2147483647', 20000),
(3, '432reffsdfdsd', 4, 5000, 'Carl', 'Purok Del Pilar', '09158010869', 20000),
(4, 'ggfgdfgdfgdfggggggggggggggggg', 6, 333, 'Mhounic', 'Purok Del Pilar', '09158010869', 1998);

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(8) UNSIGNED ZEROFILL NOT NULL,
  `supplier_name` text DEFAULT NULL,
  `contact_no` char(11) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `supplier_name`, `contact_no`, `address`) VALUES
(00000001, 'Chokoy Storeeeeessssssssss', '09515061401', 'General Santos City'),
(00000002, 'Botoy Goods', '09158010869', 'Tampakan, South Cotabato'),
(00000003, 'Mhounic', '09158010869', 'Earth'),
(00000004, 'Carl', '09158010869', 'Balay'),
(00000005, 'Mhounic Carl', '09158010869', 'asdasd'),
(00000006, 'HEHEH', '12312312312', 'asdasdasd'),
(00000007, 'Mhounic Carl', '9158010869', '3333333333'),
(00000008, 'Carl Michael', '09158010869', '44444444444'),
(00000009, 'Carl Michael', '09158010869', NULL),
(00000010, 'Mhounic Carl', '09158010869', 'Nowhere'),
(00000011, 'Mhounic Carl', '09158010869', 'Nowhere'),
(00000012, 'fdsafdsaf', '09456321321', 'gensunnnnn'),
(00000013, 'Chokoy Storeeeeeeeeeessssssssssss', '23123123333', 'Earth');

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
(30, '2147483647', 'what kind of product is this?213123213', 30, 26, 'BG200000', 7),
(31, '53313132', 'ffffffffffffffff', 342423, 233243, 'BG200000', 5),
(33, '123123', '432reffsdfdsd', 16, 3424, 'CS100000', 5000),
(34, '42342342', 'fggfdgd', 54354, 543345, 'CS100000', 444),
(35, '123123123', 'ggfgdfgdfgdfggggggggggggggggg', 5344535, 5435345, 'CS100000', 333),
(37, '33333333333', 'qwe123123', 12312312, 2147483647, 'CS100000', 222),
(38, '23333333333', 'what kind of product is this?', 123123, 123123, 'CS100000', 12321),
(43, '12313444411', 'lolllllllll', 444444, 123123, '', 3333),
(44, '22654654654', 'eeheheheh', 11, 57, '', 50);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `supply`
--
ALTER TABLE `supply`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
