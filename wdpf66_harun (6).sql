-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 26, 2025 at 10:20 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wdpf66_harun`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_boms`
--

CREATE TABLE `core_boms` (
  `id` int NOT NULL,
  `bom_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `revision_no` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `status_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_boms`
--

INSERT INTO `core_boms` (`id`, `bom_code`, `product_id`, `product_name`, `revision_no`, `effective_date`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'BOM-#00001', 1, 'iPhone 15 Pro', 'A', '2025-10-20', 1, '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(2, 'BOM-#00002', 3, 'Men T-Shirt', 'A', '2025-10-20', 1, '2025-10-20 00:18:22', '2025-10-20 00:18:22'),
(3, 'BOM-#00003', 1, 'Lithium Battery', 'A', '2025-10-25', 1, '2025-10-24 21:27:07', '2025-10-24 21:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `core_bom_details`
--

CREATE TABLE `core_bom_details` (
  `id` int NOT NULL,
  `bom_id` int NOT NULL,
  `raw_material_id` int NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `uom` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_bom_details`
--

INSERT INTO `core_bom_details` (`id`, `bom_id`, `raw_material_id`, `quantity`, `uom`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 1.00, 'Piece', '', '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(2, 1, 10, 1.00, 'Piece', '', '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(3, 1, 6, 1.00, 'Piece', '', '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(4, 2, 16, 1.00, 'Piece', '', '2025-10-20 00:18:22', '2025-10-20 00:18:22'),
(5, 2, 10, 1.00, 'Piece', '', '2025-10-20 00:18:22', '2025-10-20 00:18:22'),
(6, 3, 1, 1.00, 'Kilogram', '', '2025-10-24 21:27:07', '2025-10-24 21:27:07');

-- --------------------------------------------------------

--
-- Table structure for table `core_categories`
--

CREATE TABLE `core_categories` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_categories`
--

INSERT INTO `core_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'Electronic gadgets and devices', '2025-10-24 19:18:12', '2025-10-24 19:18:12'),
(2, 'Clothing', 'Men and Women clothing items', '2025-10-24 19:18:12', '2025-10-24 19:18:12'),
(3, 'Footwear', 'Shoes, sandals and boots', '2025-10-24 19:18:12', '2025-10-24 19:18:12'),
(4, 'Groceries', 'Daily grocery items', '2025-10-24 19:18:12', '2025-10-24 19:18:12'),
(5, 'Cosmetics', 'Beauty and skincare products', '2025-10-24 19:18:12', '2025-10-24 19:18:12'),
(6, 'Stationery', 'Office and school stationery', '2025-10-24 19:18:12', '2025-10-24 19:18:12');

-- --------------------------------------------------------

--
-- Table structure for table `core_customers`
--

CREATE TABLE `core_customers` (
  `id` int NOT NULL,
  `name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_customers`
--

INSERT INTO `core_customers` (`id`, `name`, `phone`, `email`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Rahim Traders', '01711000001', 'rahim@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(2, 'Karim Enterprise', '01711000002', 'karim@example.com', 'Chittagong, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(3, 'Akash Electronics', '01711000003', 'akash@example.com', 'Khulna, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(4, 'Mitu Fashion', '01711000004', 'mitu@example.com', 'Rajshahi, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(5, 'Nabila Mart', '01711000005', 'nabila@example.com', 'Sylhet, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(6, 'Hasan Furniture', '01711000006', 'hasan@example.com', 'Barisal, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(7, 'Selim Super Shop', '01711000007', 'selim@example.com', 'Rangpur, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(8, 'Happy Kids Store', '01711000008', 'happykids@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(9, 'Green Agro Ltd', '01711000009', 'greenagro@example.com', 'Mymensingh, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(10, 'Rupali Cosmetics', '01711000010', 'rupali@example.com', 'Comilla, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(11, 'City Pharmacy', '01711000011', 'citypharma@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(12, 'Digital World', '01711000012', 'digital@example.com', 'Gazipur, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(13, 'Tech House', '01711000013', 'techhouse@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(14, 'Book Lover', '01711000014', 'booklover@example.com', 'Rajshahi, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(15, 'Fresh Foods', '01711000015', 'freshfoods@example.com', 'Sylhet, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(16, 'Bashundhara Group', '01711000016', 'bashundhara@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(17, 'Akij Biri Factory', '01711000017', 'akij@example.com', 'Jessore, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(18, 'Square Pharma', '01711000018', 'square@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(19, 'Walton Hi-Tech', '01711000019', 'walton@example.com', 'Gazipur, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(20, 'ACI Limited', '01711000020', 'aci@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(21, 'Pran-RFL', '01711000021', 'pran@example.com', 'Narsingdi, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(22, 'Meena Bazar', '01711000022', 'meena@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(23, 'Agora Super Shop', '01711000023', 'agora@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(24, 'Shwapno Retail', '01711000024', 'shwapno@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(25, 'Eastern Bank', '01711000025', 'ebl@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(26, 'BRAC NGO', '01711000026', 'brac@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(27, 'Grameenphone', '01711000027', 'gp@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(28, 'Robi Axiata', '01711000028', 'robi@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09'),
(29, 'Banglalink', '01711000029', 'banglalink@example.com', 'Dhaka, Bangladesh', '2025-10-03 17:35:09', '2025-10-03 17:35:09');

-- --------------------------------------------------------

--
-- Table structure for table `core_expenses`
--

CREATE TABLE `core_expenses` (
  `id` int NOT NULL,
  `expense_date` timestamp NULL DEFAULT NULL,
  `expense_category` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT 'BDT',
  `paid_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_expenses`
--

INSERT INTO `core_expenses` (`id`, `expense_date`, `expense_category`, `description`, `amount`, `currency`, `paid_by`, `created_at`) VALUES
(1, '2025-01-04 18:00:00', 'Labor Cost', 'Worker salary for production batch #001', 8500.00, 'BDT', 1, '2025-01-05 04:15:00'),
(2, '2025-01-05 18:00:00', 'Overhead / Utilities', 'Electricity bill for factory', 3200.00, 'BDT', 2, '2025-01-06 05:10:00'),
(3, '2025-01-05 18:00:00', 'Packaging', 'Purchase of carton boxes & labels', 1250.00, 'BDT', 3, '2025-01-06 08:22:00'),
(4, '2025-01-06 18:00:00', 'Transport / Others', 'Delivery van fuel cost', 950.00, 'BDT', 4, '2025-01-07 03:45:00');

-- --------------------------------------------------------

--
-- Table structure for table `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int NOT NULL,
  `customer_id` int NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text,
  `shipping_method_id` int DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT '0',
  `paid_amount` double NOT NULL DEFAULT '0',
  `status_id` int DEFAULT '1',
  `discount` float DEFAULT '0',
  `vat` varchar(250) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warehouse_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_orders`
--

INSERT INTO `core_orders` (`id`, `customer_id`, `order_date`, `delivery_date`, `shipping_address`, `shipping_method_id`, `order_total`, `paid_amount`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`, `warehouse_name`) VALUES
(1, 4, '2025-10-25 01:48:14', '2025-10-25 01:48:14', 'Rajshahi, Bangladesh', 1, 171700, 171700, 1, 3400, '', '2025-10-24 19:48:14', '2025-10-24 19:48:14', 'Central Warehouse'),
(2, 5, '2025-10-25 01:52:34', '2025-10-25 01:52:34', 'Sylhet, Bangladesh', 1, 1360000, 1360000, 1, 27200, '', '2025-10-24 19:52:34', '2025-10-24 19:52:34', 'Khulna Warehouse'),
(3, 3, '2025-10-25 02:32:50', '2025-10-25 02:32:50', 'Khulna, Bangladesh', 1, 86700, 86700, 1, 850, '', '2025-10-24 20:32:50', '2025-10-24 20:32:50', 'Khulna Warehouse'),
(4, 5, '2025-10-25 02:34:06', '2025-10-25 02:34:06', 'Sylhet, Bangladesh', 1, 750, 750, 1, 0, '', '2025-10-24 20:34:06', '2025-10-24 20:34:06', 'Central Warehouse'),
(5, 2, '2025-10-25 02:38:38', '2025-10-25 02:38:38', 'Chittagong, Bangladesh', 1, 106050, 106050, 1, 1050, '', '2025-10-24 20:38:38', '2025-10-24 20:38:38', 'Central Warehouse'),
(6, 2, '2025-10-25 02:47:16', '2025-10-25 02:47:16', 'Chittagong, Bangladesh', 1, 2200, 2200, 1, 0, '', '2025-10-24 20:47:16', '2025-10-24 20:47:16', 'Chattogram Warehouse'),
(7, 4, '2025-10-25 02:49:21', '2025-10-25 02:49:21', 'Rajshahi, Bangladesh', 1, 85000, 85000, 1, 0, '', '2025-10-24 20:49:21', '2025-10-24 20:49:21', 'Central Warehouse'),
(8, 5, '2025-10-25 02:51:45', '2025-10-25 02:51:45', 'Sylhet, Bangladesh', 1, 510000, 510000, 1, 0, '', '2025-10-24 20:51:45', '2025-10-24 20:51:45', 'Central Warehouse'),
(9, 4, '2025-10-25 02:53:50', '2025-10-25 02:53:50', 'Rajshahi, Bangladesh', 1, 850000, 850000, 1, 0, '', '2025-10-24 20:53:51', '2025-10-24 20:53:51', 'Central Warehouse'),
(10, 3, '2025-10-25 02:55:57', '2025-10-25 02:55:57', 'Khulna, Bangladesh', 1, 85000, 85000, 1, 0, '', '2025-10-24 20:55:57', '2025-10-24 20:55:57', 'Central Warehouse');

-- --------------------------------------------------------

--
-- Table structure for table `core_order_details`
--

CREATE TABLE `core_order_details` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warehouse_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_order_details`
--

INSERT INTO `core_order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `vat`, `discount`, `created_at`, `updated_at`, `warehouse_id`) VALUES
(1, 1, 5, 2, 85000, 3, 2, '2025-10-24 19:48:14', '2025-10-24 19:48:14', '1'),
(2, 2, 5, 16, 85000, 2, 2, '2025-10-24 19:52:34', '2025-10-24 19:52:34', '3'),
(3, 3, 5, 1, 85000, 3, 1, '2025-10-24 20:32:50', '2025-10-24 20:32:50', '3'),
(4, 4, 7, 1, 750, 0, 0, '2025-10-24 20:34:06', '2025-10-24 20:34:06', '1'),
(5, 5, 4, 3, 35000, 2, 1, '2025-10-24 20:38:38', '2025-10-24 20:38:38', '1'),
(6, 6, 8, 1, 2200, 0, 0, '2025-10-24 20:47:16', '2025-10-24 20:47:16', '2'),
(7, 7, 5, 1, 85000, 0, 0, '2025-10-24 20:49:21', '2025-10-24 20:49:21', '1'),
(8, 8, 5, 6, 85000, 0, 0, '2025-10-24 20:51:45', '2025-10-24 20:51:45', '1'),
(9, 9, 5, 10, 85000, 0, 0, '2025-10-24 20:53:51', '2025-10-24 20:53:51', '1'),
(10, 10, 5, 1, 85000, 0, 0, '2025-10-24 20:55:57', '2025-10-24 20:55:57', '1');

-- --------------------------------------------------------

--
-- Table structure for table `core_productions`
--

CREATE TABLE `core_productions` (
  `id` int NOT NULL,
  `product_id` int NOT NULL,
  `produced_qty` decimal(10,2) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_productions`
--

INSERT INTO `core_productions` (`id`, `product_id`, `produced_qty`, `start_date`, `end_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 0.00, '2025-10-27', '2025-10-27', 1, '2025-10-26 22:06:00', '2025-10-26 22:06:00'),
(2, 1, 0.00, '2025-10-27', '2025-10-27', 1, '2025-10-26 22:15:03', '2025-10-26 22:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `core_production_details`
--

CREATE TABLE `core_production_details` (
  `id` int NOT NULL,
  `production_id` int NOT NULL,
  `produced_qty` decimal(10,2) NOT NULL,
  `operator_name` varchar(100) DEFAULT NULL,
  `remarks` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_products`
--

CREATE TABLE `core_products` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int NOT NULL,
  `uom_id` int DEFAULT NULL,
  `description` text,
  `is_raw` tinyint(1) NOT NULL DEFAULT '1',
  `brand` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT '0.00',
  `image` varchar(255) DEFAULT NULL,
  `stock_qty` int DEFAULT '0',
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_products`
--

INSERT INTO `core_products` (`id`, `name`, `category_id`, `uom_id`, `description`, `is_raw`, `brand`, `price`, `sku`, `tax`, `image`, `stock_qty`, `purchase_price`, `created_at`, `updated_at`) VALUES
(1, 'Lithium Battery', 1, 4, 'Rechargeable lithium battery', 1, 'TechParts', 500.00, 'ELEC-R01', 0.00, '', 502, 400.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(2, 'Smartphone Screen', 1, 4, '6.5 inch AMOLED display', 1, 'TechParts', 2000.00, 'ELEC-R02', 0.00, '', 301, 1800.00, '2025-10-24 19:16:08', '2025-10-24 20:22:35'),
(3, 'Plastic Casing', 1, 4, 'Smartphone casing', 1, 'TechParts', 300.00, 'ELEC-R03', 0.00, NULL, 400, 250.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(4, 'Smartphone X100', 1, 4, 'Assembled smartphone using battery, screen & casing', 0, 'TechBrand', 35000.00, 'ELEC-001', 0.00, '', 47, 30000.00, '2025-10-24 19:16:08', '2025-10-24 20:38:38'),
(5, 'Laptop Pro 15', 1, 4, 'High-performance laptop', 0, 'TechBrand', 85000.00, 'ELEC-002', 0.00, '', 11, 75000.00, '2025-10-24 19:16:08', '2025-10-24 20:55:57'),
(6, 'Cotton Fabric', 2, 8, 'Raw cotton fabric', 1, 'FabricCo', 200.00, 'CLO-R01', 0.00, NULL, 1000, 150.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(7, 'Men T-Shirt', 2, 4, 'Cotton t-shirt, size M', 0, 'FashionCo', 750.00, 'CLO-001', 0.00, '', 99, 500.00, '2025-10-24 19:16:08', '2025-10-24 20:34:06'),
(8, 'Women Dress', 2, 4, 'Elegant evening dress', 0, 'FashionCo', 2200.00, 'CLO-002', 0.00, NULL, 50, 1800.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(9, 'Leather', 3, 5, 'Raw leather', 1, 'LeatherCo', 1200.00, 'FOOT-R01', 0.00, NULL, 100, 1000.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(10, 'Running Shoes', 3, 10, 'Sneakers made from leather', 0, 'Sporty', 3200.00, 'FOOT-001', 0.00, NULL, 40, 2500.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(11, 'Sandals', 3, 10, 'Leather sandals', 0, 'FootWearCo', 1800.00, 'FOOT-002', 0.00, NULL, 60, 1400.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(12, 'Wheat Flour', 4, 5, 'Premium wheat flour', 1, 'AgroFood', 50.00, 'GROC-R01', 0.00, NULL, 500, 40.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(13, 'Rice 5kg', 4, 2, 'Basmati rice', 1, 'AgroFood', 650.00, 'GROC-R02', 0.00, NULL, 200, 500.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(14, 'Cooking Oil 1L', 4, 6, 'Sunflower oil', 1, 'AgroFood', 350.00, 'GROC-R03', 0.00, NULL, 150, 300.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(15, 'Chocolate Cake', 4, 4, 'Ready-to-eat cake made from flour & oil', 0, 'SweetCo', 350.00, 'GROC-001', 0.00, NULL, 50, 250.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(16, 'Fried Rice Pack', 4, 4, 'Rice snack pack with oil & spices', 0, 'AgroFood', 180.00, 'GROC-002', 0.00, NULL, 100, 120.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(17, 'Lipstick Red', 5, 4, 'Long-lasting red lipstick', 0, 'BeautyCo', 500.00, 'COS-001', 0.00, NULL, 80, 400.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(18, 'Face Cream', 5, 6, 'Moisturizing cream 50ml', 0, 'BeautyCo', 1200.00, 'COS-002', 0.00, NULL, 70, 1000.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(19, 'Notebook A5', 8, 4, '100-page notebook', 0, 'StationeryCo', 60.00, 'STN-001', 0.00, NULL, 300, 40.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08'),
(20, 'Ball Pen', 8, 4, 'Blue ink ball pen', 0, 'StationeryCo', 20.00, 'STN-002', 0.00, NULL, 500, 10.00, '2025-10-24 19:16:08', '2025-10-24 19:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int NOT NULL,
  `supplier_id` int NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_no` varchar(100) DEFAULT NULL,
  `warehouse_name` varchar(250) NOT NULL,
  `purchase_total` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_purchases`
--

INSERT INTO `core_purchases` (`id`, `supplier_id`, `purchase_date`, `invoice_no`, `warehouse_name`, `purchase_total`, `paid_amount`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 2, '2025-10-25 00:00:00', '#0001', 'Khulna Warehouse', 1800.00, 1800.00, 'dv', '2025-10-24 20:08:19', '2025-10-24 20:08:19'),
(2, 4, '2025-10-25 00:00:00', '#0002', 'Chattogram Warehouse', 1800.00, 1800.00, '', '2025-10-24 20:13:03', '2025-10-24 20:13:03'),
(3, 3, '2025-10-25 00:00:00', '#0003', 'Chattogram Warehouse', 1800.00, 1800.00, '', '2025-10-24 20:15:55', '2025-10-24 20:15:55'),
(4, 3, '2025-10-25 00:00:00', '#0004', 'Central Warehouse', 1800.00, 1800.00, '', '2025-10-24 20:18:48', '2025-10-24 20:18:48'),
(5, 3, '2025-10-25 00:00:00', '#0005', 'Chattogram Warehouse', 1800.00, 1800.00, '', '2025-10-24 20:22:35', '2025-10-24 20:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `core_purchase_details`
--

CREATE TABLE `core_purchase_details` (
  `id` int NOT NULL,
  `purchase_id` int NOT NULL,
  `product_id` int NOT NULL,
  `warehouse_id` int NOT NULL,
  `qty` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) GENERATED ALWAYS AS ((`qty` * `price`)) STORED,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_purchase_details`
--

INSERT INTO `core_purchase_details` (`id`, `purchase_id`, `product_id`, `warehouse_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 4, 2, 1, 1, 1800.00, '2025-10-24 20:18:48', '2025-10-24 20:18:48'),
(2, 5, 2, 2, 1, 1800.00, '2025-10-24 20:22:35', '2025-10-24 20:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

CREATE TABLE `core_roles` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Accounts'),
(3, 'Store Manager'),
(4, 'Logistics'),
(5, 'Production Manager'),
(6, 'Quality Control'),
(7, 'Sales Executive'),
(8, 'Customer Support');

-- --------------------------------------------------------

--
-- Table structure for table `core_shipping_methods`
--

CREATE TABLE `core_shipping_methods` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_shipping_methods`
--

INSERT INTO `core_shipping_methods` (`id`, `name`, `description`) VALUES
(1, 'Courier', 'Standard courier delivery via third-party service'),
(2, 'Home Delivery', 'Direct delivery to customer address'),
(3, 'Pickup Point', 'Customer picks up from designated location'),
(4, 'Express Delivery', 'Fast delivery within 24 hours'),
(5, 'Freight', 'Bulk delivery via freight service'),
(6, 'Drop Shipping', 'Direct shipment from supplier to customer');

-- --------------------------------------------------------

--
-- Table structure for table `core_status`
--

CREATE TABLE `core_status` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_status`
--

INSERT INTO `core_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Shipped'),
(4, 'Delivered'),
(5, 'Cancelled'),
(6, 'Returned');

-- --------------------------------------------------------

--
-- Table structure for table `core_stocks`
--

CREATE TABLE `core_stocks` (
  `id` int UNSIGNED NOT NULL,
  `product_id` int UNSIGNED NOT NULL,
  `qty` float DEFAULT NULL,
  `transaction_type_id` int UNSIGNED DEFAULT NULL,
  `remark` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `warehouse_id` int UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lot_id` int UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_stocks`
--

INSERT INTO `core_stocks` (`id`, `product_id`, `qty`, `transaction_type_id`, `remark`, `created_at`, `warehouse_id`, `updated_at`, `lot_id`) VALUES
(1, 5, 2, 2, '', '2025-10-24 19:48:14', 1, '2025-10-24 19:48:14', 12345),
(2, 5, 16, 2, '', '2025-10-24 19:52:34', 3, '2025-10-24 19:52:34', 12345),
(3, 2, 1, 1, '', '2025-10-24 20:18:48', 1, '2025-10-24 20:18:48', 12345),
(4, 2, 1, 1, '', '2025-10-24 20:22:35', 2, '2025-10-24 20:22:35', 12345),
(5, 5, 1, 2, 'Order #3', '2025-10-24 20:32:50', 3, '2025-10-24 20:32:50', 12345),
(6, 7, 1, 2, 'Order #4', '2025-10-24 20:34:06', 1, '2025-10-24 20:34:06', 12345),
(7, 4, -3, 2, 'Order #5', '2025-10-24 20:38:38', 1, '2025-10-24 20:38:38', 12345),
(8, 8, 1, 2, 'Order #6', '2025-10-24 20:47:16', 2, '2025-10-24 20:47:16', 12345),
(9, 5, 1, 2, 'Order #7', '2025-10-24 20:49:21', 1, '2025-10-24 20:49:21', 12345),
(10, 5, 6, 2, 'Order #8', '2025-10-24 20:51:45', 1, '2025-10-24 20:51:45', 12345),
(11, 5, -10, 2, 'Order #9', '2025-10-24 20:53:51', 1, '2025-10-24 20:53:51', 12345),
(12, 5, -1, 2, 'Order #10', '2025-10-24 20:55:57', 1, '2025-10-24 20:55:57', 12345),
(13, 1, 1, 1, 'Produced via production #1', '2025-10-26 22:06:00', 1, '2025-10-26 22:06:00', 12345),
(14, 1, 1, 1, 'Produced via production #2', '2025-10-26 22:15:03', 1, '2025-10-26 22:15:03', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `core_suppliers`
--

CREATE TABLE `core_suppliers` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `contact_person`, `phone`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'TechParts Ltd.', 'Rahim Hossain', '01710000001', 'rahim@techparts.com', 'Dhaka, Bangladesh', 1, '2025-10-24 19:22:40', '2025-10-24 19:22:40'),
(2, 'FabricCo', 'Sadia Akter', '01710000002', 'sadia@fabricco.com', 'Chattogram, Bangladesh', 1, '2025-10-24 19:22:40', '2025-10-24 19:22:40'),
(3, 'LeatherCo', 'Tanvir Alam', '01710000003', 'tanvir@leatherco.com', 'Dhaka, Bangladesh', 1, '2025-10-24 19:22:40', '2025-10-24 19:22:40'),
(4, 'AgroFood Ltd.', 'Nabila Rahman', '01710000004', 'nabila@agrofood.com', 'Khulna, Bangladesh', 1, '2025-10-24 19:22:40', '2025-10-24 19:22:40'),
(5, 'BeautyCo', 'Farzana Karim', '01710000005', 'farzana@beautyco.com', 'Dhaka, Bangladesh', 1, '2025-10-24 19:22:40', '2025-10-24 19:22:40'),
(6, 'StationeryCo', 'Rakib Ahmed', '01710000006', 'rakib@stationeryco.com', 'Chattogram, Bangladesh', 1, '2025-10-24 19:22:40', '2025-10-24 19:22:40'),
(7, 'SweetCo', 'Sabbir Hossain', '01710000007', 'sabbir@sweetco.com', 'Dhaka, Bangladesh', 1, '2025-10-24 19:22:40', '2025-10-24 19:22:40');

-- --------------------------------------------------------

--
-- Table structure for table `core_transactions`
--

CREATE TABLE `core_transactions` (
  `id` int NOT NULL,
  `transaction_type` varchar(50) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `warehouse_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` decimal(12,2) DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_transaction_types`
--

CREATE TABLE `core_transaction_types` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_transaction_types`
--

INSERT INTO `core_transaction_types` (`id`, `name`, `description`) VALUES
(1, 'IN', 'Stock coming in'),
(2, 'OUT', 'Stock going out');

-- --------------------------------------------------------

--
-- Table structure for table `core_uom`
--

CREATE TABLE `core_uom` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_uom`
--

INSERT INTO `core_uom` (`id`, `name`, `code`, `description`, `status`, `created_at`) VALUES
(1, 'Kilogram', 'kg', 'Weight in kilogram', 1, '2025-10-24 19:19:10'),
(2, 'Gram', 'g', 'Weight in gram', 1, '2025-10-24 19:19:10'),
(3, 'Liter', 'L', 'Volume in liter', 1, '2025-10-24 19:19:10'),
(4, 'Piece', 'pc', 'Single piece unit', 1, '2025-10-24 19:19:10'),
(5, 'Meter', 'm', 'Length in meter', 1, '2025-10-24 19:19:10'),
(6, 'Milliliter', 'ml', 'Volume in milliliter', 1, '2025-10-24 19:19:10'),
(7, 'Pack', 'pack', 'Packaged unit', 1, '2025-10-24 19:19:10'),
(8, 'Roll', 'roll', 'Roll unit', 1, '2025-10-24 19:19:10'),
(9, 'Set', 'set', 'Set of items', 1, '2025-10-24 19:19:10'),
(10, 'Pair', 'pair', 'Pair of items', 1, '2025-10-24 19:19:10');

-- --------------------------------------------------------

--
-- Table structure for table `core_users`
--

CREATE TABLE `core_users` (
  `id` int NOT NULL,
  `name` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role_id` int NOT NULL,
  `inactive` tinyint(1) DEFAULT '0'
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `name`, `full_name`, `password`, `email`, `mobile`, `photo`, `role_id`, `inactive`) VALUES
(1, 'harun', 'md.harun-or-rashid', '$2y$10$IqiozR/WxsVz9l4EDf5GsOynuITy//BkD3vLvkOD2qgkRnQ7ObSGO', 'harun.sk09@gmail.com', '', '', 1, 0),
(2, 'opu', 'opu sheikh', '$2y$10$5ickV/k5GrSS3x.XnD9gFeVB/OBT5vIesmfKD2Ista86rHlASfVNu', 'bd420king@gmail.com', '', '1761288176_WhatsApp Image 2025-03-31 at 18.01.59_d093789d.jpg', 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_warehouses`
--

CREATE TABLE `core_warehouses` (
  `id` int NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_warehouses`
--

INSERT INTO `core_warehouses` (`id`, `name`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Central Warehouse', 'Dhaka, Bangladesh', 1, '2025-10-24 19:23:33', '2025-10-24 19:23:33'),
(2, 'Chattogram Warehouse', 'Chattogram, Bangladesh', 1, '2025-10-24 19:23:33', '2025-10-24 19:23:33'),
(3, 'Khulna Warehouse', 'Khulna, Bangladesh', 1, '2025-10-24 19:23:33', '2025-10-24 19:23:33'),
(4, 'Rajshahi Warehouse', 'Rajshahi, Bangladesh', 1, '2025-10-24 19:23:33', '2025-10-24 19:23:33'),
(5, 'Sylhet Warehouse', 'Sylhet, Bangladesh', 1, '2025-10-24 19:23:33', '2025-10-24 19:23:33');

-- --------------------------------------------------------

--
-- Table structure for table `pma__bookmark`
--

CREATE TABLE `pma__bookmark` (
  `id` int UNSIGNED NOT NULL,
  `dbase` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `user` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `label` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `query` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Bookmarks';

-- --------------------------------------------------------

--
-- Table structure for table `pma__central_columns`
--

CREATE TABLE `pma__central_columns` (
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `col_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `col_type` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `col_length` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin,
  `col_collation` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `col_isNull` tinyint(1) NOT NULL,
  `col_extra` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT '',
  `col_default` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Central list of columns';

-- --------------------------------------------------------

--
-- Table structure for table `pma__column_info`
--

CREATE TABLE `pma__column_info` (
  `id` int UNSIGNED NOT NULL,
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `column_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `comment` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `mimetype` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT '',
  `transformation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `transformation_options` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `input_transformation_options` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Column information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__designer_settings`
--

CREATE TABLE `pma__designer_settings` (
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `settings_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Settings related to Designer';

-- --------------------------------------------------------

--
-- Table structure for table `pma__export_templates`
--

CREATE TABLE `pma__export_templates` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `export_type` varchar(10) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `template_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `template_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved export templates';

-- --------------------------------------------------------

--
-- Table structure for table `pma__favorite`
--

CREATE TABLE `pma__favorite` (
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `tables` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Favorite tables';

-- --------------------------------------------------------

--
-- Table structure for table `pma__history`
--

CREATE TABLE `pma__history` (
  `id` bigint UNSIGNED NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sqlquery` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='SQL history for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__navigationhiding`
--

CREATE TABLE `pma__navigationhiding` (
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `item_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `item_type` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Hidden items of navigation tree';

-- --------------------------------------------------------

--
-- Table structure for table `pma__pdf_pages`
--

CREATE TABLE `pma__pdf_pages` (
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `page_nr` int UNSIGNED NOT NULL,
  `page_descr` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='PDF relation pages for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__recent`
--

CREATE TABLE `pma__recent` (
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `tables` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Recently accessed tables';

--
-- Dumping data for table `pma__recent`
--

INSERT INTO `pma__recent` (`username`, `tables`) VALUES
('root', '[{\"db\":\"wdpf66_harun\",\"table\":\"core_production_details\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_productions\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_products\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_stocks\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_status\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_boms\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_bom_details\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_production_log\"},{\"db\":\"wdpf66_harun\",\"table\":\"core_production_orders\"}]');

-- --------------------------------------------------------

--
-- Table structure for table `pma__relation`
--

CREATE TABLE `pma__relation` (
  `master_db` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_table` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `master_field` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_db` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_table` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `foreign_field` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Relation table';

-- --------------------------------------------------------

--
-- Table structure for table `pma__savedsearches`
--

CREATE TABLE `pma__savedsearches` (
  `id` int UNSIGNED NOT NULL,
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `search_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Saved searches';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_coords`
--

CREATE TABLE `pma__table_coords` (
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `pdf_page_number` int NOT NULL DEFAULT '0',
  `x` float UNSIGNED NOT NULL DEFAULT '0',
  `y` float UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table coordinates for phpMyAdmin PDF output';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_info`
--

CREATE TABLE `pma__table_info` (
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `table_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT '',
  `display_field` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Table information for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__table_uiprefs`
--

CREATE TABLE `pma__table_uiprefs` (
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `prefs` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Tables'' UI preferences';

-- --------------------------------------------------------

--
-- Table structure for table `pma__tracking`
--

CREATE TABLE `pma__tracking` (
  `db_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `table_name` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `version` int UNSIGNED NOT NULL,
  `date_created` datetime NOT NULL,
  `date_updated` datetime NOT NULL,
  `schema_snapshot` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `schema_sql` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin,
  `data_sql` longtext CHARACTER SET utf8mb3 COLLATE utf8mb3_bin,
  `tracking` set('UPDATE','REPLACE','INSERT','DELETE','TRUNCATE','CREATE DATABASE','ALTER DATABASE','DROP DATABASE','CREATE TABLE','ALTER TABLE','RENAME TABLE','DROP TABLE','CREATE INDEX','DROP INDEX','CREATE VIEW','ALTER VIEW','DROP VIEW') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `tracking_active` int UNSIGNED NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Database changes tracking for phpMyAdmin';

-- --------------------------------------------------------

--
-- Table structure for table `pma__userconfig`
--

CREATE TABLE `pma__userconfig` (
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `timevalue` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `config_data` text CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User preferences storage for phpMyAdmin';

--
-- Dumping data for table `pma__userconfig`
--

INSERT INTO `pma__userconfig` (`username`, `timevalue`, `config_data`) VALUES
('root', '2025-10-26 22:20:52', '{\"Console\\/Mode\":\"collapse\"}');

-- --------------------------------------------------------

--
-- Table structure for table `pma__usergroups`
--

CREATE TABLE `pma__usergroups` (
  `usergroup` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `tab` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `allowed` enum('Y','N') CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='User groups with configured menu items';

-- --------------------------------------------------------

--
-- Table structure for table `pma__users`
--

CREATE TABLE `pma__users` (
  `username` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `usergroup` varchar(64) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin COMMENT='Users and their assignments to user groups';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_boms`
--
ALTER TABLE `core_boms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_bom_details`
--
ALTER TABLE `core_bom_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_categories`
--
ALTER TABLE `core_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_customers`
--
ALTER TABLE `core_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_expenses`
--
ALTER TABLE `core_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_orders`
--
ALTER TABLE `core_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_order_details`
--
ALTER TABLE `core_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_productions`
--
ALTER TABLE `core_productions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_production_details`
--
ALTER TABLE `core_production_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_products`
--
ALTER TABLE `core_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchases`
--
ALTER TABLE `core_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_roles`
--
ALTER TABLE `core_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_shipping_methods`
--
ALTER TABLE `core_shipping_methods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_status`
--
ALTER TABLE `core_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stocks`
--
ALTER TABLE `core_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_transactions`
--
ALTER TABLE `core_transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_uom`
--
ALTER TABLE `core_uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_users`
--
ALTER TABLE `core_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pma__central_columns`
--
ALTER TABLE `pma__central_columns`
  ADD PRIMARY KEY (`db_name`,`col_name`);

--
-- Indexes for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `db_name` (`db_name`,`table_name`,`column_name`);

--
-- Indexes for table `pma__designer_settings`
--
ALTER TABLE `pma__designer_settings`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_user_type_template` (`username`,`export_type`,`template_name`);

--
-- Indexes for table `pma__favorite`
--
ALTER TABLE `pma__favorite`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__history`
--
ALTER TABLE `pma__history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `username` (`username`,`db`,`table`,`timevalue`);

--
-- Indexes for table `pma__navigationhiding`
--
ALTER TABLE `pma__navigationhiding`
  ADD PRIMARY KEY (`username`,`item_name`,`item_type`,`db_name`,`table_name`);

--
-- Indexes for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  ADD PRIMARY KEY (`page_nr`),
  ADD KEY `db_name` (`db_name`);

--
-- Indexes for table `pma__recent`
--
ALTER TABLE `pma__recent`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__relation`
--
ALTER TABLE `pma__relation`
  ADD PRIMARY KEY (`master_db`,`master_table`,`master_field`),
  ADD KEY `foreign_field` (`foreign_db`,`foreign_table`);

--
-- Indexes for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_savedsearches_username_dbname` (`username`,`db_name`,`search_name`);

--
-- Indexes for table `pma__table_coords`
--
ALTER TABLE `pma__table_coords`
  ADD PRIMARY KEY (`db_name`,`table_name`,`pdf_page_number`);

--
-- Indexes for table `pma__table_info`
--
ALTER TABLE `pma__table_info`
  ADD PRIMARY KEY (`db_name`,`table_name`);

--
-- Indexes for table `pma__table_uiprefs`
--
ALTER TABLE `pma__table_uiprefs`
  ADD PRIMARY KEY (`username`,`db_name`,`table_name`);

--
-- Indexes for table `pma__tracking`
--
ALTER TABLE `pma__tracking`
  ADD PRIMARY KEY (`db_name`,`table_name`,`version`);

--
-- Indexes for table `pma__userconfig`
--
ALTER TABLE `pma__userconfig`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pma__usergroups`
--
ALTER TABLE `pma__usergroups`
  ADD PRIMARY KEY (`usergroup`,`tab`,`allowed`);

--
-- Indexes for table `pma__users`
--
ALTER TABLE `pma__users`
  ADD PRIMARY KEY (`username`,`usergroup`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_boms`
--
ALTER TABLE `core_boms`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_bom_details`
--
ALTER TABLE `core_bom_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_categories`
--
ALTER TABLE `core_categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_customers`
--
ALTER TABLE `core_customers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `core_expenses`
--
ALTER TABLE `core_expenses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_orders`
--
ALTER TABLE `core_orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `core_order_details`
--
ALTER TABLE `core_order_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `core_productions`
--
ALTER TABLE `core_productions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_production_details`
--
ALTER TABLE `core_production_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_products`
--
ALTER TABLE `core_products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `core_purchases`
--
ALTER TABLE `core_purchases`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_roles`
--
ALTER TABLE `core_roles`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `core_shipping_methods`
--
ALTER TABLE `core_shipping_methods`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_status`
--
ALTER TABLE `core_status`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_stocks`
--
ALTER TABLE `core_stocks`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_transactions`
--
ALTER TABLE `core_transactions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_uom`
--
ALTER TABLE `core_uom`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pma__bookmark`
--
ALTER TABLE `pma__bookmark`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__column_info`
--
ALTER TABLE `pma__column_info`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__export_templates`
--
ALTER TABLE `pma__export_templates`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__history`
--
ALTER TABLE `pma__history`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__pdf_pages`
--
ALTER TABLE `pma__pdf_pages`
  MODIFY `page_nr` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pma__savedsearches`
--
ALTER TABLE `pma__savedsearches`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
