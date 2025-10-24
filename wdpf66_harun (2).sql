-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2025 at 11:30 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `id` int(11) NOT NULL,
  `bom_code` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `revision_no` varchar(20) DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_boms`
--

INSERT INTO `core_boms` (`id`, `bom_code`, `product_id`, `product_name`, `revision_no`, `effective_date`, `status_id`, `created_at`, `updated_at`) VALUES
(1, 'BOM-#00001', 1, 'iPhone 15 Pro', 'A', '2025-10-20', 1, '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(2, 'BOM-#00002', 3, 'Men T-Shirt', 'A', '2025-10-20', 1, '2025-10-20 00:18:22', '2025-10-20 00:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `core_bom_details`
--

CREATE TABLE `core_bom_details` (
  `id` int(11) NOT NULL,
  `bom_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_bom_details`
--

INSERT INTO `core_bom_details` (`id`, `bom_id`, `raw_material_id`, `quantity`, `uom`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 16, 1.00, 'Piece', '', '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(2, 1, 10, 1.00, 'Piece', '', '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(3, 1, 6, 1.00, 'Piece', '', '2025-10-19 22:10:22', '2025-10-19 22:10:22'),
(4, 2, 16, 1.00, 'Piece', '', '2025-10-20 00:18:22', '2025-10-20 00:18:22'),
(5, 2, 10, 1.00, 'Piece', '', '2025-10-20 00:18:22', '2025-10-20 00:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `core_categories`
--

CREATE TABLE `core_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_categories`
--

INSERT INTO `core_categories` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', 'Electronic gadgets and devices', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(2, 'Clothing', 'Men and Women clothing items', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(3, 'Footwear', 'Shoes, sandals and boots', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(4, 'Furniture', 'Home and office furniture', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(5, 'Groceries', 'Daily grocery items', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(6, 'Stationery', 'Office and school stationery', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(7, 'Cosmetics', 'Beauty and skincare products', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(8, 'Beverages', 'Drinks and juices', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(9, 'Snacks', 'Chips, biscuits and fast foods', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(10, 'Books', 'Educational and story books', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(11, 'Sports', 'Sports accessories and equipment', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(12, 'Mobile Accessories', 'Chargers, cables, earphones', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(13, 'Computer Accessories', 'Keyboards, mouse, monitors', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(14, 'Kitchenware', 'Cooking and kitchen accessories', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(15, 'Toys', 'Children toys and games', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(16, 'Jewelry', 'Gold, silver, imitation jewelry', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(17, 'Watches', 'Analog and digital watches', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(18, 'Automobiles', 'Car and bike accessories', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(19, 'Medicines', 'Pharmaceutical products', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(20, 'Cleaning Supplies', 'Home cleaning products', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(21, 'Baby Care', 'Products for babies', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(22, 'Pet Supplies', 'Pet food and accessories', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(23, 'Gardening', 'Plants and gardening tools', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(24, 'Hardware', 'Home improvement hardware', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(25, 'Lighting', 'LED bulbs, lamps', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(26, 'Musical Instruments', 'Guitars, drums, pianos', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(27, 'Health Products', 'Vitamins, supplements', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(28, 'Travel Accessories', 'Bags, suitcases', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(29, 'Shoes for Kids', 'Footwear for children', '2025-10-03 17:34:01', '2025-10-03 17:34:01'),
(30, 'Seasonal Items', 'Festive and seasonal products', '2025-10-03 17:34:01', '2025-10-03 17:34:01');

-- --------------------------------------------------------

--
-- Table structure for table `core_customers`
--

CREATE TABLE `core_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
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
  `id` int(11) NOT NULL,
  `expense_date` date DEFAULT curdate(),
  `expense_category` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) NOT NULL,
  `currency` varchar(10) DEFAULT 'BDT',
  `paid_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_expenses`
--

INSERT INTO `core_expenses` (`id`, `expense_date`, `expense_category`, `description`, `amount`, `currency`, `paid_by`, `created_at`) VALUES
(1, '2025-10-20', 'Labor Cost', 'Worker wages for production', 5000.00, '৳', 1, '2025-10-19 22:43:36'),
(2, '2025-10-20', 'Overhead / Utilities', 'Electricity bill for factory', 1200.00, '৳', 2, '2025-10-19 22:43:36'),
(3, '2025-10-20', 'Packaging', 'Packaging materials', 800.00, '৳', 1, '2025-10-19 22:43:36'),
(4, '2025-10-20', 'Transport / Others', 'Transport cost for delivery', 1500.00, '৳', 2, '2025-10-19 22:43:36');

-- --------------------------------------------------------

--
-- Table structure for table `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text DEFAULT NULL,
  `shipping_method_id` int(11) DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT 0,
  `paid_amount` double NOT NULL DEFAULT 0,
  `status_id` int(10) DEFAULT 1,
  `discount` float DEFAULT 0,
  `vat` float DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `warehouse_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_orders`
--

INSERT INTO `core_orders` (`id`, `customer_id`, `order_date`, `delivery_date`, `shipping_address`, `shipping_method_id`, `order_total`, `paid_amount`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`, `warehouse_name`) VALUES
(1, 3, '2025-10-21 03:17:36', '2025-10-21 03:17:36', 'Khulna, Bangladesh', 1, 45, 45, 1, 0, 0, '2025-10-21 03:17:36', '2025-10-21 03:17:36', 'Barisal Hub'),
(2, 12, '2025-10-21 04:37:15', '2025-10-21 04:37:15', 'Gazipur, Bangladesh', 6, 45, 45, 1, 0, 0, '2025-10-21 04:37:15', '2025-10-21 04:37:15', 'Central Warehouse'),
(3, 12, '2025-10-21 04:37:25', '2025-10-21 04:37:25', 'Gazipur, Bangladesh', 6, 2, 2, 1, 0, 0, '2025-10-21 04:37:26', '2025-10-21 04:37:26', 'Central Warehouse'),
(4, 12, '2025-10-21 04:37:31', '2025-10-21 04:37:31', 'Gazipur, Bangladesh', 6, 9, 9, 1, 0, 0, '2025-10-21 04:37:31', '2025-10-21 04:37:31', 'Central Warehouse'),
(5, 1, '2025-10-21 05:55:32', '2025-10-21 05:55:32', 'shipaddress', 1, 20, 20, 1, 0, 0, '2025-10-21 05:55:32', '2025-10-21 05:55:32', 'Comilla Warehouse'),
(6, 12, '2025-10-21 06:14:30', '2025-10-21 06:14:30', 'Gazipur, Bangladesh', 1, 0, 0, 1, 0, 0, '2025-10-21 06:14:30', '2025-10-21 06:14:30', 'Dhaka Main Warehouse'),
(7, 9, '2025-10-21 06:17:02', '2025-10-21 06:17:02', 'Mymensingh, Bangladesh', 1, 13, 13, 1, 0, 0, '2025-10-21 06:17:02', '2025-10-21 06:17:02', 'Dhaka Main Warehouse');

-- --------------------------------------------------------

--
-- Table structure for table `core_order_details`
--

CREATE TABLE `core_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT 0,
  `discount` float NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `warehouse_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_order_details`
--

INSERT INTO `core_order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `vat`, `discount`, `created_at`, `updated_at`, `warehouse_id`) VALUES
(1, 1, 15, 1, 45, 0, 0, '2025-10-21 03:17:36', '2025-10-21 03:17:36', '10'),
(2, 2, 4, 1, 45, 0, 0, '2025-10-21 04:37:15', '2025-10-21 04:37:15', '1'),
(3, 3, 8, 1, 2, 0, 0, '2025-10-21 04:37:26', '2025-10-21 04:37:26', '1'),
(4, 4, 9, 1, 8.5, 0, 0, '2025-10-21 04:37:31', '2025-10-21 04:37:31', '1'),
(5, 5, 14, 4, 5, 0, 0, '2025-10-21 05:55:32', '2025-10-21 05:55:32', '13'),
(6, 6, 1, 5, 0, 1, 0, '2025-10-21 06:14:30', '2025-10-21 06:14:30', '6'),
(7, 7, 10, 5, 2.5, 0, 0, '2025-10-21 06:17:02', '2025-10-21 06:17:02', '6');

-- --------------------------------------------------------

--
-- Table structure for table `core_production_log`
--

CREATE TABLE `core_production_log` (
  `id` int(11) NOT NULL,
  `production_order_id` int(11) NOT NULL,
  `shift` varchar(50) DEFAULT NULL,
  `produced_qty` decimal(10,2) NOT NULL,
  `operator_name` varchar(100) DEFAULT NULL,
  `log_date` date DEFAULT curdate(),
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_production_log`
--

INSERT INTO `core_production_log` (`id`, `production_order_id`, `shift`, `produced_qty`, `operator_name`, `log_date`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, 'Morning', 100.00, 'Operator A', '2025-10-01', 'Started production', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(2, 2, 'Morning', 50.00, 'Operator B', '2025-10-02', 'Initial batch', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(3, 3, 'Evening', 75.00, 'Operator C', '2025-10-03', 'Half day production', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(4, 4, 'Morning', 120.00, 'Operator D', '2025-10-04', 'Production going smoothly', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(5, 5, 'Evening', 60.00, 'Operator E', '2025-10-05', 'Delayed due to machine issue', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(6, 6, 'Morning', 90.00, 'Operator F', '2025-10-06', 'Normal production', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(7, 7, 'Evening', 80.00, 'Operator G', '2025-10-07', 'Completed half quantity', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(8, 8, 'Morning', 100.00, 'Operator H', '2025-10-08', 'Production on track', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(9, 9, 'Evening', 150.00, 'Operator I', '2025-10-09', 'High output day', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(10, 10, 'Morning', 200.00, 'Operator J', '2025-10-10', 'Exceeded target', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(11, 11, 'Morning', 100.00, 'Operator A', '2025-10-11', 'Second batch', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(12, 12, 'Evening', 80.00, 'Operator B', '2025-10-12', 'Running smoothly', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(13, 13, 'Morning', 90.00, 'Operator C', '2025-10-13', 'Maintaining pace', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(14, 14, 'Evening', 100.00, 'Operator D', '2025-10-14', 'Good production', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(15, 15, 'Morning', 70.00, 'Operator E', '2025-10-15', 'Partial completion', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(16, 16, 'Evening', 60.00, 'Operator F', '2025-10-16', 'Production stable', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(17, 17, 'Morning', 80.00, 'Operator G', '2025-10-17', 'Started new batch', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(18, 18, 'Evening', 50.00, 'Operator H', '2025-10-18', 'Reduced output', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(19, 19, 'Morning', 120.00, 'Operator I', '2025-10-19', 'Target achieved', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(20, 20, 'Evening', 90.00, 'Operator J', '2025-10-20', 'Normal production', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(21, 21, 'Morning', 110.00, 'Operator A', '2025-10-21', 'Batch complete', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(22, 22, 'Evening', 70.00, 'Operator B', '2025-10-22', 'Production good', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(23, 23, 'Morning', 95.00, 'Operator C', '2025-10-23', 'All smooth', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(24, 24, 'Evening', 100.00, 'Operator D', '2025-10-24', 'Batch finished', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(25, 25, 'Morning', 60.00, 'Operator E', '2025-10-25', 'Partial batch', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(26, 26, 'Evening', 80.00, 'Operator F', '2025-10-26', 'Regular production', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(27, 27, 'Morning', 90.00, 'Operator G', '2025-10-27', 'Production normal', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(28, 28, 'Evening', 50.00, 'Operator H', '2025-10-28', 'Delayed output', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(29, 29, 'Morning', 120.00, 'Operator I', '2025-10-29', 'Good output', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(30, 30, 'Evening', 100.00, 'Operator J', '2025-10-30', 'Batch completed', '2025-10-03 17:40:43', '2025-10-03 17:40:43'),
(31, 31, 'day', 5.00, 'king', '2025-10-07', 'nothing', '2025-10-05 15:50:21', '2025-10-05 15:50:21');

-- --------------------------------------------------------

--
-- Table structure for table `core_production_orders`
--

CREATE TABLE `core_production_orders` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `planned_qty` decimal(10,2) NOT NULL,
  `produced_qty` decimal(10,2) NOT NULL,
  `status` enum('Pending','In_Progress','Completed') DEFAULT 'Pending',
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_production_orders`
--

INSERT INTO `core_production_orders` (`id`, `order_id`, `product_id`, `planned_qty`, `produced_qty`, `status`, `start_date`, `end_date`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 500.00, 0.00, 'Pending', '2025-10-01', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(2, 2, 5, 300.00, 0.00, 'Pending', '2025-10-02', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(3, 3, 1, 150.00, 0.00, 'Pending', '2025-10-03', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(4, 4, 4, 400.00, 0.00, 'Pending', '2025-10-04', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(5, 5, 3, 200.00, 0.00, 'Pending', '2025-10-05', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(6, 6, 6, 250.00, 0.00, 'Pending', '2025-10-06', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(7, 7, 7, 180.00, 0.00, 'Pending', '2025-10-07', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(8, 8, 8, 220.00, 0.00, 'Pending', '2025-10-08', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(9, 9, 9, 350.00, 0.00, 'Pending', '2025-10-09', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(10, 10, 10, 400.00, 0.00, 'Pending', '2025-10-10', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(11, 11, 2, 500.00, 0.00, 'Pending', '2025-10-11', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(12, 12, 3, 300.00, 0.00, 'Pending', '2025-10-12', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(13, 13, 4, 450.00, 0.00, 'Pending', '2025-10-13', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(14, 14, 5, 500.00, 0.00, 'Pending', '2025-10-14', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(15, 15, 7, 250.00, 0.00, 'Pending', '2025-10-15', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(16, 16, 4, 200.00, 0.00, 'Pending', '2025-10-16', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(17, 17, 8, 300.00, 0.00, 'Pending', '2025-10-17', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(18, 18, 9, 150.00, 0.00, 'Pending', '2025-10-18', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(19, 19, 6, 400.00, 0.00, 'Pending', '2025-10-19', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(20, 20, 10, 350.00, 0.00, 'Pending', '2025-10-20', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(21, 21, 2, 500.00, 0.00, 'Pending', '2025-10-21', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(22, 22, 3, 300.00, 0.00, 'Pending', '2025-10-22', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(23, 23, 4, 450.00, 0.00, 'Pending', '2025-10-23', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(24, 24, 5, 500.00, 0.00, 'Pending', '2025-10-24', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(25, 25, 7, 250.00, 0.00, 'Pending', '2025-10-25', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(26, 26, 4, 200.00, 0.00, 'Pending', '2025-10-26', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(27, 27, 8, 300.00, 0.00, 'Pending', '2025-10-27', NULL, 2, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(28, 28, 9, 150.00, 0.00, 'Pending', '2025-10-28', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(29, 29, 6, 400.00, 0.00, 'Pending', '2025-10-29', NULL, 3, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(30, 30, 10, 350.00, 0.00, 'Pending', '2025-10-30', NULL, 1, '2025-10-03 17:40:26', '2025-10-03 17:40:26'),
(31, 5, 2, 2.00, 5.00, 'In_Progress', '2025-10-07', '2025-10-16', 5, '2025-10-05 15:49:06', '2025-10-05 15:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `core_products`
--

CREATE TABLE `core_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `is_raw` tinyint(1) NOT NULL DEFAULT 1,
  `sku` varchar(50) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `stock_qty` int(11) DEFAULT 0,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_products`
--

INSERT INTO `core_products` (`id`, `name`, `category_id`, `uom_id`, `description`, `brand`, `price`, `is_raw`, `sku`, `tax`, `image`, `stock_qty`, `purchase_price`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 15 Pro', 1, 1, 'Latest Apple smartphone', 'Apple', 1500.00, 1, 'IP15PRO', 67.00, 'iphone15.jpg', 50, 1200.00, '2025-10-03 17:34:38', '2025-10-14 15:44:51'),
(2, 'Samsung Galaxy S23', 1, 1, 'Flagship Samsung smartphone', 'Samsung', 1200.00, 1, 'SGS23', 88.00, 's23.jpg', 60, 950.00, '2025-10-03 17:34:38', '2025-10-14 15:45:02'),
(3, 'Men T-Shirt', 2, 3, 'Cotton casual t-shirt', 'Levis', 25.00, 1, 'TSHIRT001', 8.00, 'tshirt1.jpg', 200, 15.00, '2025-10-03 17:34:38', '2025-10-14 15:45:11'),
(4, 'Women Jeans', 2, NULL, 'Blue denim jeans', 'Zara', 45.00, 1, 'JEANS001', 5.00, 'jeans1.jpg', 150, 30.00, '2025-10-03 17:34:38', '2025-10-14 15:45:19'),
(5, 'Sports Shoes', 3, NULL, 'Running shoes for men', 'Nike', 80.00, 1, 'SHOE001', 6.00, 'shoe1.jpg', 120, 60.00, '2025-10-03 17:34:38', '2025-10-14 15:45:27'),
(6, 'Leather Sofa', 4, NULL, '3-seater leather sofa', 'IKEA', 600.00, 1, 'SOFA001', 7.00, 'sofa.jpg', 20, 450.00, '2025-10-03 17:34:38', '2025-10-14 15:45:42'),
(7, 'Rice (5kg)', 5, NULL, 'Premium quality rice', 'ACI', 10.00, 1, 'RICE001', 1.00, 'rice.jpg', 300, 8.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(8, 'Notebook', 6, NULL, '200 pages notebook', 'Matador', 2.00, 1, 'NOTE001', 0.50, 'notebook.jpg', 500, 1.50, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(9, 'Face Cream', 7, NULL, 'Moisturizing cream', 'Nivea', 8.50, 1, 'CRM001', 3.00, 'cream.jpg', 100, 6.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(10, 'Coca Cola (2L)', 8, NULL, 'Soft drink bottle', 'Coca Cola', 2.50, 1, 'CC2L', 4.00, 'cocacola.jpg', 400, 1.80, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(11, 'Potato Chips', 9, NULL, 'Crispy potato chips', 'Lays', 1.50, 1, 'CHIP001', 1.00, 'chips.jpg', 300, 1.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(12, 'Programming Book', 10, NULL, 'Learn PHP & MySQL', 'OReilly', 35.00, 1, 'BOOK001', 0.50, 'book1.jpg', 100, 20.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(13, 'Football', 11, NULL, 'FIFA standard football', 'Adidas', 30.00, 1, 'SPORT001', 0.80, 'football.jpg', 70, 22.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(14, 'USB Cable', 12, NULL, 'Fast charging cable', 'Anker', 5.00, 1, 'USB001', 1.50, 'usb.jpg', 250, 3.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(15, 'Gaming Mouse', 13, NULL, 'RGB gaming mouse', 'Logitech', 45.00, 1, 'MOUSE001', 3.50, 'mouse.jpg', 80, 30.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(16, 'Non-stick Pan', 14, NULL, 'Cooking pan', 'Tefal', 20.00, 1, 'PAN001', 2.50, 'pan.jpg', 90, 15.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(17, 'Toy Car', 15, NULL, 'Remote control car', 'Hot Wheels', 25.00, 1, 'TOY001', 5.00, 'toycar.jpg', 60, 18.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(18, 'Necklace', 16, NULL, 'Gold plated necklace', 'Swarovski', 150.00, 1, 'JW001', 8.00, 'necklace.jpg', 40, 100.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(19, 'Digital Watch', 17, NULL, 'Waterproof watch', 'Casio', 75.00, 1, 'WATCH001', 10.00, 'watch.jpg', 70, 55.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(20, 'Car Tire', 18, NULL, 'Durable car tire', 'Michelin', 120.00, 1, 'TIRE001', 9.00, 'tire.jpg', 50, 90.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(21, 'Paracetamol', 19, NULL, 'Pain relief tablet', 'Square', 1.00, 1, 'MED001', 1.50, 'para.jpg', 500, 0.60, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(22, 'Detergent Powder', 20, NULL, 'Cleaning detergent', 'Surf Excel', 3.50, 1, 'DET001', 4.00, 'detergent.jpg', 200, 2.50, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(23, 'Baby Diaper Pack', 21, NULL, 'Pack of 20 diapers', 'Huggies', 15.00, 1, 'DIAPER001', 15.00, 'diaper.jpg', 180, 12.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(24, 'Dog Food', 22, NULL, 'Premium pet food 5kg', 'Pedigree', 25.00, 1, 'PET001', 12.00, 'dogfood.jpg', 100, 18.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(25, 'Flower Pot', 23, NULL, 'Clay flower pot', 'Local', 8.00, 1, 'GARDEN001', 6.00, 'flowerpot.jpg', 150, 5.00, '2025-10-03 17:34:38', '2025-10-14 15:47:30'),
(26, 'Hammer', 24, NULL, 'Steel hammer', 'Bosch', 12.00, 1, 'HAMMER001', 0.00, 'hammer.jpg', 80, 8.00, '2025-10-03 17:34:38', '2025-10-03 17:34:38'),
(27, 'LED Bulb', 25, NULL, '10W LED bulb', 'Philips', 5.00, 1, 'BULB001', 0.00, 'bulb.jpg', 300, 3.00, '2025-10-03 17:34:38', '2025-10-03 17:34:38'),
(28, 'Guitar', 26, NULL, 'Acoustic guitar', 'Yamaha', 120.00, 1, 'GUITAR001', 0.00, 'guitar.jpg', 30, 90.00, '2025-10-03 17:34:38', '2025-10-03 17:34:38'),
(29, 'Vitamin C Tablets', 27, NULL, 'Immunity booster', 'Bayer', 12.00, 1, 'VITC001', 0.00, 'vitc.jpg', 200, 8.00, '2025-10-03 17:34:38', '2025-10-03 17:34:38'),
(30, 'Travel Bag', 28, NULL, 'Large size bag', 'American Tourister', 60.00, 1, 'BAG001', 0.00, 'bag.jpg', 70, 45.00, '2025-10-03 17:34:38', '2025-10-03 17:34:38'),
(31, 'computer', 2, NULL, 'jhkFJfbc', 'nothing', 10000.00, 1, '5000', 0.00, '', 0, 90022.00, '2025-10-05 15:47:47', '2025-10-05 15:47:47'),
(32, 'Mozammel', 3, NULL, 'afff', 'Zara', 35266.00, 1, '26', 0.00, '', 0, 6262.00, '2025-10-05 18:37:21', '2025-10-05 18:37:21');

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT current_timestamp(),
  `invoice_no` varchar(100) DEFAULT NULL,
  `warehouse_name` varchar(250) NOT NULL,
  `purchase_total` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `discount` decimal(10,2) NOT NULL DEFAULT 0.00,
  `vat` decimal(10,2) NOT NULL DEFAULT 0.00,
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_purchases`
--

INSERT INTO `core_purchases` (`id`, `supplier_id`, `purchase_date`, `invoice_no`, `warehouse_name`, `purchase_total`, `paid_amount`, `discount`, `vat`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 1, '2025-10-21 00:00:00', '#0001', 'Dhaka Main Warehouse', 45.00, 45.00, 0.00, 0.00, '', '2025-10-21 03:17:57', '2025-10-21 03:17:57'),
(2, 1, '2025-10-21 00:00:00', '#0002', 'Central Warehouse', 45.00, 45.00, 0.00, 0.00, '', '2025-10-21 03:19:09', '2025-10-21 03:19:09'),
(3, 1, '2025-10-21 00:00:00', '#0003', 'Central Warehouse', 9.00, 9.00, 0.00, 0.00, '', '2025-10-21 04:37:46', '2025-10-21 04:37:46'),
(4, 1, '2025-10-21 00:00:00', '#0003', 'Central Warehouse', 45.00, 45.00, 0.00, 0.00, '', '2025-10-21 04:37:52', '2025-10-21 04:37:52'),
(5, 1, '2025-10-21 00:00:00', '#0005', 'Dhaka Main Warehouse', 18.00, 18.00, 0.00, 0.00, '', '2025-10-21 05:56:51', '2025-10-21 05:56:51'),
(6, 4, '2025-10-23 00:00:00', '#0006', 'East Warehouse', 950.00, 950.00, 0.00, 0.00, '', '2025-10-22 22:41:57', '2025-10-22 22:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `core_purchase_details`
--

CREATE TABLE `core_purchase_details` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `warehouse_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `total` decimal(10,2) GENERATED ALWAYS AS (`qty` * `price`) STORED,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_purchase_details`
--

INSERT INTO `core_purchase_details` (`id`, `purchase_id`, `product_id`, `warehouse_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 6, 1, 45.00, '2025-10-21 03:17:57', '2025-10-21 03:17:57'),
(2, 2, 15, 1, 1, 45.00, '2025-10-21 03:19:09', '2025-10-21 03:19:09'),
(3, 3, 9, 1, 1, 8.50, '2025-10-21 04:37:47', '2025-10-21 04:37:47'),
(4, 4, 4, 1, 1, 45.00, '2025-10-21 04:37:52', '2025-10-21 04:37:52'),
(5, 5, 10, 6, 7, 2.50, '2025-10-21 05:56:51', '2025-10-21 05:56:51'),
(6, 6, 2, 4, 1, 950.00, '2025-10-22 22:41:57', '2025-10-22 22:41:57');

-- --------------------------------------------------------

--
-- Table structure for table `core_raw_materials`
--

CREATE TABLE `core_raw_materials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_raw_materials`
--

INSERT INTO `core_raw_materials` (`id`, `name`, `description`, `unit_cost`, `created_at`, `updated_at`) VALUES
(1, 'Resistor 220Ω', 'Carbon Film Resistor', 5.50, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(2, 'Capacitor 10uF 16V', 'Electrolytic Capacitor', 8.75, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(3, 'Transistor BC547', 'NPN Transistor', 6.20, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(4, 'Diode 1N4007', 'Rectifier Diode', 4.90, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(5, 'LED 5mm Red', 'Light Emitting Diode', 3.50, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(6, 'LED 5mm Green', 'Light Emitting Diode', 3.60, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(7, 'Potentiometer 10kΩ', 'Variable Resistor', 18.50, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(8, 'IC 555 Timer', 'Timer IC', 25.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(9, 'IC 7805', 'Voltage Regulator 5V', 20.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(10, 'Crystal Oscillator 16MHz', 'Quartz Crystal', 15.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(11, 'Push Button Switch', 'Momentary Switch', 10.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(12, 'Toggle Switch', '2-Pin Switch', 25.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(13, 'Jumper Wire', 'Male to Male Connector', 2.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(14, 'Breadboard 400 Points', 'Prototype Board', 85.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(15, 'Arduino Uno', 'Microcontroller Board', 480.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(16, 'Arduino Nano', 'Compact Microcontroller', 420.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(17, 'ESP32 Module', 'WiFi + Bluetooth Module', 520.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(18, 'L293D Motor Driver', 'Dual H-Bridge IC', 75.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(19, 'Relay 5V', 'Electromechanical Relay', 40.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(20, 'DC Motor 12V', 'Brushed DC Motor', 120.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(21, 'Stepper Motor', '28BYJ-48 Motor', 180.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(22, 'Servo Motor', 'SG90 Micro Servo', 150.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(23, 'Ultrasonic Sensor HC-SR04', 'Distance Sensor', 90.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(24, 'Temperature Sensor LM35', 'Analog Sensor', 65.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(25, 'IR Sensor Module', 'Obstacle Detector', 55.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(26, 'Sound Sensor Module', 'Microphone Detector', 75.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(27, 'Light Sensor LDR', 'Photoresistor', 15.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(28, 'Soil Moisture Sensor', 'Analog Type', 70.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(29, 'Gas Sensor MQ-2', 'Smoke Detector Sensor', 120.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(30, 'Flame Sensor Module', 'Fire Detector', 65.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(31, 'Bluetooth Module HC-05', 'Wireless Serial Module', 250.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(32, 'WiFi Module ESP8266', 'Wireless Transceiver', 220.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(33, 'OLED Display 0.96\"', 'I2C Display Module', 270.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(34, 'LCD Display 16x2', 'Character Display', 180.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(35, 'RTC Module DS3231', 'Real Time Clock', 190.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(36, 'Micro SD Card Module', 'Data Storage Module', 150.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(37, 'Buzzer 5V', 'Piezoelectric Sound Buzzer', 25.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(38, 'Battery 9V', 'Rechargeable Battery', 60.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(39, 'Battery Holder 2xAA', 'Plastic Holder', 20.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(40, 'JST Connector', '2-Pin Wire Connector', 12.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(41, 'DC Barrel Jack', 'Power Connector', 18.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(42, 'USB Cable Type-A', 'Standard Data Cable', 45.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(43, 'USB Cable Type-C', 'Fast Charging Cable', 75.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(44, 'Copper Wire 1m', 'Electric Wire', 10.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(45, 'Soldering Iron 25W', 'Electrical Tool', 320.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(46, 'Solder Wire 50g', 'Tin Lead Wire', 150.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(47, 'Heat Shrink Tube', 'Wire Protector', 40.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(48, 'Multimeter DT830B', 'Digital Multimeter', 400.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(49, 'Breadboard Jumper Kit', 'Cable Set', 80.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10'),
(50, 'Power Supply 12V 2A', 'AC to DC Adapter', 480.00, '2024-12-31 18:00:00', '2025-10-18 21:56:10');

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

CREATE TABLE `core_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Manager'),
(3, 'Editor'),
(4, 'User'),
(5, 'Guest');

-- --------------------------------------------------------

--
-- Table structure for table `core_shipping_methods`
--

CREATE TABLE `core_shipping_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_shipping_methods`
--

INSERT INTO `core_shipping_methods` (`id`, `name`, `description`) VALUES
(1, 'Free Ground Shipping', 'Standard delivery via local ground transport, usually free of cost'),
(2, 'Truck Delivery', 'Goods transported locally via company truck or third-party hauler'),
(3, 'Courier Service', 'Regular courier delivery within the city or nearby area'),
(4, 'Express Courier', 'Fast city-wide delivery within 24 hours'),
(5, 'Bike Delivery', 'Small parcel or urgent delivery via motorbike courier'),
(6, 'Pickup by Customer', 'Customer will collect the goods directly from warehouse or store'),
(7, 'Intercity Truck Service', 'Delivery to another city via truck'),
(8, 'Bus Parcel Service', 'Sent via long-distance bus parcel service'),
(9, 'Postal Service', 'Sent via government postal mail or parcel service'),
(10, 'DHL Express', 'International air delivery via DHL'),
(11, 'FedEx Air Freight', 'International fast air cargo delivery'),
(12, 'UPS Ground', 'Overseas shipping through UPS ground network'),
(13, 'TNT Express', 'Worldwide express delivery by TNT'),
(14, 'Aramex Courier', 'International door-to-door courier delivery'),
(15, 'EMS International', 'Government postal EMS international delivery'),
(16, 'Sea Freight', 'Bulk shipment through cargo ship, for heavy or large orders'),
(17, 'Air Cargo', 'Large quantity goods shipped via air cargo service'),
(18, 'Container Shipment', 'Full or partial container-based international sea freight'),
(19, 'Warehouse Transfer', 'Internal stock transfer between company warehouses'),
(20, 'Third Party Logistics (3PL)', 'Handled by a 3PL partner for both transport and storage'),
(21, 'Same Day Delivery', 'Guaranteed same-day delivery service for urgent orders'),
(22, 'Overnight Delivery', 'Delivery within 24 hours through priority courier'),
(23, 'Temperature Controlled Delivery', 'For perishable or sensitive goods requiring cold chain'),
(24, 'Fragile Handling Service', 'For delicate goods needing special packaging & handling');

-- --------------------------------------------------------

--
-- Table structure for table `core_status`
--

CREATE TABLE `core_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_status`
--

INSERT INTO `core_status` (`id`, `name`) VALUES
(1, 'Pending'),
(2, 'Processing'),
(3, 'Completed'),
(4, 'Cancelled'),
(5, 'On Hold'),
(6, 'Shipped'),
(7, 'Delivered'),
(8, 'Returned'),
(9, 'Refunded'),
(10, 'Awaiting Payment'),
(11, 'Payment Received'),
(12, 'Partially Paid'),
(13, 'Payment Failed'),
(14, 'Awaiting Shipment'),
(15, 'Packed'),
(16, 'Out for Delivery'),
(17, 'Rescheduled'),
(18, 'Confirmed'),
(19, 'Dispatched'),
(20, 'Awaiting Confirmation'),
(21, 'Invoiced'),
(22, 'Pre-Order'),
(23, 'Backordered'),
(24, 'Awaiting Stock'),
(25, 'Partially Shipped'),
(26, 'Awaiting Pickup'),
(27, 'Picked Up'),
(29, 'Awaiting Approval'),
(30, 'Closed');

-- --------------------------------------------------------

--
-- Table structure for table `core_stocks`
--

CREATE TABLE `core_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float DEFAULT NULL,
  `transaction_type_id` int(10) UNSIGNED DEFAULT NULL,
  `remark` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `warehouse_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `lot_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_stocks`
--

INSERT INTO `core_stocks` (`id`, `product_id`, `qty`, `transaction_type_id`, `remark`, `created_at`, `warehouse_id`, `updated_at`, `lot_id`) VALUES
(1, 15, 1, 2, '', '2025-10-21 03:17:37', 10, '2025-10-21 09:17:37', 12345),
(2, 4, 1, 1, '', '2025-10-21 03:17:57', 6, '2025-10-21 09:17:57', 12345),
(3, 15, 1, 1, '', '2025-10-21 03:19:09', 1, '2025-10-21 09:19:09', 12345),
(4, 4, 1, 2, '', '2025-10-21 04:37:15', 1, '2025-10-21 10:37:15', 12345),
(5, 8, 1, 2, '', '2025-10-21 04:37:26', 1, '2025-10-21 10:37:26', 12345),
(6, 9, 1, 2, '', '2025-10-21 04:37:31', 1, '2025-10-21 10:37:31', 12345),
(7, 9, 1, 1, '', '2025-10-21 04:37:47', 1, '2025-10-21 10:37:47', 12345),
(8, 4, 1, 1, '', '2025-10-21 04:37:52', 1, '2025-10-21 10:37:52', 12345),
(9, 14, 4, 2, '', '2025-10-21 05:55:32', 13, '2025-10-21 11:55:32', 12345),
(10, 10, 7, 1, '', '2025-10-21 05:56:51', 6, '2025-10-21 11:56:51', 12345),
(11, 1, 5, 2, '', '2025-10-21 06:14:30', 6, '2025-10-21 12:14:30', 12345),
(12, 10, 5, 2, '', '2025-10-21 06:17:02', 6, '2025-10-21 12:17:02', 12345),
(13, 2, 1, 1, '', '2025-10-22 22:41:57', 4, '2025-10-23 04:41:57', 12345);

-- --------------------------------------------------------

--
-- Table structure for table `core_suppliers`
--

CREATE TABLE `core_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `contact_person` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `contact_person`, `phone`, `email`, `address`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Supplier A', 'Rahim', '01710000001', 'supplierA@example.com', 'Dhaka', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(2, 'Supplier B', 'Karim', '01710000002', 'supplierB@example.com', 'Chittagong', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(3, 'Supplier C', 'Salam', '01710000003', 'supplierC@example.com', 'Khulna', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(4, 'Supplier D', 'Rana', '01710000004', 'supplierD@example.com', 'Rajshahi', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(5, 'Supplier E', 'Shakil', '01710000005', 'supplierE@example.com', 'Barishal', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(6, 'Supplier F', 'Jahid', '01710000006', 'supplierF@example.com', 'Sylhet', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(7, 'Supplier G', 'Tareq', '01710000007', 'supplierG@example.com', 'Mymensingh', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(8, 'Supplier H', 'Fahim', '01710000008', 'supplierH@example.com', 'Comilla', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(9, 'Supplier I', 'Monir', '01710000009', 'supplierI@example.com', 'Dinajpur', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(10, 'Supplier J', 'Hasan', '01710000010', 'supplierJ@example.com', 'Bogra', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(11, 'Supplier K', 'Riyad', '01710000011', 'supplierK@example.com', 'Tangail', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(12, 'Supplier L', 'Sabbir', '01710000012', 'supplierL@example.com', 'Pabna', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(13, 'Supplier M', 'Nazmul', '01710000013', 'supplierM@example.com', 'Narsingdi', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(14, 'Supplier N', 'Shafiq', '01710000014', 'supplierN@example.com', 'Jessore', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(15, 'Supplier O', 'Imran', '01710000015', 'supplierO@example.com', 'Cox\'s Bazar', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(16, 'Supplier P', 'Jamal', '01710000016', 'supplierP@example.com', 'Noakhali', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(17, 'Supplier Q', 'Rashed', '01710000017', 'supplierQ@example.com', 'Feni', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(18, 'Supplier R', 'Tanvir', '01710000018', 'supplierR@example.com', 'Khagrachhari', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(19, 'Supplier S', 'Ehsan', '01710000019', 'supplierS@example.com', 'Rangpur', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(20, 'Supplier T', 'Bappa', '01710000020', 'supplierT@example.com', 'Moulvibazar', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(21, 'Supplier U', 'Sourav', '01710000021', 'supplierU@example.com', 'Sirajganj', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(22, 'Supplier V', 'Rafiq', '01710000022', 'supplierV@example.com', 'Patuakhali', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(23, 'Supplier W', 'Shuvro', '01710000023', 'supplierW@example.com', 'Bhola', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(24, 'Supplier X', 'Arif', '01710000024', 'supplierX@example.com', 'Kushtia', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(25, 'Supplier Y', 'Saif', '01710000025', 'supplierY@example.com', 'Jamalpur', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(26, 'Supplier Z', 'Nayeem', '01710000026', 'supplierZ@example.com', 'Habiganj', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(27, 'Supplier AA', 'Rafi', '01710000027', 'supplierAA@example.com', 'Brahmanbaria', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(28, 'Supplier AB', 'Shamim', '01710000028', 'supplierAB@example.com', 'Chandpur', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(29, 'Supplier AC', 'Anis', '01710000029', 'supplierAC@example.com', 'Lakshmipur', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51'),
(30, 'Supplier AD', 'Riyadul', '01710000030', 'supplierAD@example.com', 'Cox\'s Bazar', 1, '2025-10-04 14:46:51', '2025-10-04 14:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `core_transactions`
--

CREATE TABLE `core_transactions` (
  `id` int(11) NOT NULL,
  `transaction_type` varchar(50) DEFAULT NULL,
  `reference_no` varchar(100) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `warehouse_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` decimal(12,2) DEFAULT 0.00,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_transactions`
--

INSERT INTO `core_transactions` (`id`, `transaction_type`, `reference_no`, `date`, `warehouse_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 'Purchase', 'PO-1001', '2025-10-01', 1, 1, 100.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(2, 'Sale', 'SO-1001', '2025-10-02', 2, 2, 50.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(3, 'Transfer', 'TR-1001', '2025-10-03', 3, 3, 30.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(4, 'Purchase', 'PO-1002', '2025-10-04', 1, 4, 200.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(5, 'Sale', 'SO-1002', '2025-10-05', 2, 5, 75.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(6, 'Transfer', 'TR-1002', '2025-10-06', 3, 6, 60.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(7, 'Purchase', 'PO-1003', '2025-10-07', 4, 7, 150.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(8, 'Sale', 'SO-1003', '2025-10-08', 5, 8, 90.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(9, 'Transfer', 'TR-1003', '2025-10-09', 6, 9, 40.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(10, 'Purchase', 'PO-1004', '2025-10-10', 7, 10, 120.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(11, 'Sale', 'SO-1004', '2025-10-11', 8, 11, 55.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(12, 'Transfer', 'TR-1004', '2025-10-12', 9, 12, 25.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(13, 'Purchase', 'PO-1005', '2025-10-13', 10, 13, 180.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(14, 'Sale', 'SO-1005', '2025-10-14', 11, 14, 65.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(15, 'Transfer', 'TR-1005', '2025-10-15', 12, 15, 35.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(16, 'Purchase', 'PO-1006', '2025-10-16', 13, 16, 210.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(17, 'Sale', 'SO-1006', '2025-10-17', 14, 17, 80.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(18, 'Transfer', 'TR-1006', '2025-10-18', 15, 18, 45.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(19, 'Purchase', 'PO-1007', '2025-10-19', 16, 19, 140.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(20, 'Sale', 'SO-1007', '2025-10-20', 17, 20, 70.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(21, 'Transfer', 'TR-1007', '2025-10-21', 18, 21, 55.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(22, 'Purchase', 'PO-1008', '2025-10-22', 19, 22, 160.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(23, 'Sale', 'SO-1008', '2025-10-23', 20, 23, 60.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(24, 'Transfer', 'TR-1008', '2025-10-24', 1, 24, 50.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(25, 'Purchase', 'PO-1009', '2025-10-25', 2, 25, 130.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(26, 'Sale', 'SO-1009', '2025-10-26', 3, 26, 75.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(27, 'Transfer', 'TR-1009', '2025-10-27', 4, 27, 40.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(28, 'Purchase', 'PO-1010', '2025-10-28', 5, 28, 190.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22'),
(29, 'Sale', 'SO-1010', '2025-10-29', 6, 29, 85.00, '2025-10-04 14:45:22', '2025-10-04 14:45:22');

-- --------------------------------------------------------

--
-- Table structure for table `core_transaction_types`
--

CREATE TABLE `core_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_transaction_types`
--

INSERT INTO `core_transaction_types` (`id`, `name`, `description`) VALUES
(1, 'IN', 'Stock coming into warehouse'),
(2, 'OUT', 'Stock going out of warehouse');

-- --------------------------------------------------------

--
-- Table structure for table `core_uom`
--

CREATE TABLE `core_uom` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_uom`
--

INSERT INTO `core_uom` (`id`, `name`, `code`, `description`, `status`, `created_at`) VALUES
(1, 'Piece', 'pcs', 'Used for countable items', 1, '2025-10-06 14:23:58'),
(2, 'Kilogram', 'kg', 'Used for measuring weight', 1, '2025-10-06 14:23:58'),
(3, 'Gram', 'g', 'Smaller unit of weight', 1, '2025-10-06 14:23:58'),
(4, 'Liter', 'ltr', 'Used for measuring liquid volume', 1, '2025-10-06 14:23:58'),
(5, 'Milliliter', 'ml', 'Smaller unit of liquid volume', 1, '2025-10-06 14:23:58'),
(6, 'Meter', 'm', 'Used for measuring length', 1, '2025-10-06 14:23:58'),
(7, 'Centimeter', 'cm', 'Smaller unit of length', 1, '2025-10-06 14:23:58'),
(8, 'Box', 'box', 'Used for packed products', 1, '2025-10-06 14:23:58'),
(9, 'Packet', 'pkt', 'Used for grouped items', 1, '2025-10-06 14:23:58'),
(10, 'Roll', 'roll', 'Used for coiled materials', 1, '2025-10-06 14:23:58'),
(11, 'Dozen', 'doz', 'Used for sets of 12 items', 1, '2025-10-06 14:23:58'),
(12, 'Pair', 'pair', 'Used for paired items', 1, '2025-10-06 14:23:58'),
(13, 'Set', 'set', 'Used for grouped/bundled items', 1, '2025-10-06 14:23:58'),
(14, 'Foot', 'ft', 'Used for measuring length', 1, '2025-10-06 14:23:58'),
(15, 'Inch', 'in', 'Smaller unit for length', 1, '2025-10-06 14:23:58'),
(16, 'Ton', 'ton', 'Used for bulk weight', 1, '2025-10-06 14:23:58'),
(17, 'Bag', 'bag', 'Used for packaged materials', 1, '2025-10-06 14:23:58'),
(18, 'Carton', 'ctn', 'Used for boxed packaging', 1, '2025-10-06 14:23:58'),
(19, 'Bundle', 'bndl', 'Used for tied group items', 1, '2025-10-06 14:23:58'),
(20, 'Sheet', 'sht', 'Used for flat material pieces', 1, '2025-10-06 14:23:58');

-- --------------------------------------------------------

--
-- Table structure for table `core_users`
--

CREATE TABLE `core_users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `inactive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `name`, `full_name`, `password`, `email`, `mobile`, `photo`, `role_id`, `inactive`) VALUES
(1, 'admin', 'System Administrator', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'admin@example.com', '01710000001', 'admin.jpg', 1, 0),
(2, 'manager1', 'Project Manager One', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'manager1@example.com', '01710000002', 'manager1.jpg', 2, 0),
(3, 'editor1', 'Content Editor One', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'editor1@example.com', '01710000003', 'editor1.jpg', 3, 0),
(4, 'user1', 'Regular User One', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'user1@example.com', '01710000004', 'user1.jpg', 4, 0),
(5, 'guest1', 'Guest User One', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'guest1@example.com', '01710000005', 'guest1.jpg', 5, 1),
(6, 'manager2', 'Project Manager Two', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'manager2@example.com', '01710000006', 'manager2.jpg', 2, 0),
(7, 'editor2', 'Content Editor Two', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'editor2@example.com', '01710000007', 'editor2.jpg', 3, 0),
(8, 'user2', 'Regular User Two', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'user2@example.com', '01710000008', 'user2.jpg', 4, 0),
(9, 'guest2', 'Guest User Two', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'guest2@example.com', '01710000009', 'guest2.jpg', 5, 1),
(10, 'superadmin', 'Super Administrator', '$2y$10$V9bb7eWPmBTicJqCd.9HxetwqFYfobRUPfLMJhrvmAlkgF.m8xw4q', 'superadmin@example.com', '01710000010', 'superadmin.jpg', 1, 0),
(11, 'Mozammel', 'a couple ', '$2y$10$wzC6uII/LlUCRpTm7k3R2OrkNhNLnzD8FSun3tYZZ6BUr9z/EQY.u', 'company@mail.com', '123142514565', 'screenshot-14-png.png', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_warehouses`
--

CREATE TABLE `core_warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `core_warehouses`
--

INSERT INTO `core_warehouses` (`id`, `name`, `location`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Central Warehouse', 'Dhaka', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(2, 'North Warehouse', 'Gazipur', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(3, 'South Warehouse', 'Chittagong', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(4, 'East Warehouse', 'Sylhet', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(5, 'West Warehouse', 'Khulna', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(6, 'Dhaka Main Warehouse', 'Dhaka', 0, '2025-10-04 14:42:45', '2025-10-04 19:47:11'),
(7, 'Chittagong Depot', 'Chittagong', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(8, 'Sylhet Storage', 'Sylhet', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(9, 'Khulna Stockyard', 'Khulna', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(10, 'Barisal Hub', 'Barisal', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(11, 'Rangpur Storage', 'Rangpur', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(12, 'Mymensingh Depot', 'Mymensingh', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(13, 'Comilla Warehouse', 'Comilla', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(14, 'Jessore Stock', 'Jessore', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(15, 'Rajshahi Hub', 'Rajshahi', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(16, 'Narsingdi Warehouse', 'Narsingdi', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(17, 'Tangail Storage', 'Tangail', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(18, 'Pabna Depot', 'Pabna', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(19, 'Coxs Bazar Warehouse', 'Coxs Bazar', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(20, 'Feni Stockyard', 'Feni', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(21, 'Bogra Warehouse', 'Bogra', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(22, 'Dinajpur Depot', 'Dinajpur', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(23, 'Thakurgaon Storage', 'Thakurgaon', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(25, 'Noakhali Hub', 'Noakhali', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(26, 'Gopalganj Stock', 'Gopalganj', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(27, 'Habiganj Warehouse', 'Habiganj', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(28, 'Patuakhali Depot', 'Patuakhali', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(29, 'Netrokona Storage', 'Netrokona', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(30, 'Sirajganj Warehouse', 'Sirajganj', 1, '2025-10-04 14:42:45', '2025-10-04 14:42:45'),
(31, 'Banana', 'Dhaka', 1, '2025-10-05 15:50:43', '2025-10-05 15:50:43'),
(32, 'Mozammel', 'Dhaka', 1, '2025-10-05 18:37:53', '2025-10-05 18:37:53');

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
-- Indexes for table `core_production_log`
--
ALTER TABLE `core_production_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_production_orders`
--
ALTER TABLE `core_production_orders`
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
-- Indexes for table `core_raw_materials`
--
ALTER TABLE `core_raw_materials`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_boms`
--
ALTER TABLE `core_boms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_bom_details`
--
ALTER TABLE `core_bom_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_categories`
--
ALTER TABLE `core_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `core_expenses`
--
ALTER TABLE `core_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_orders`
--
ALTER TABLE `core_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_order_details`
--
ALTER TABLE `core_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_production_log`
--
ALTER TABLE `core_production_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `core_production_orders`
--
ALTER TABLE `core_production_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `core_products`
--
ALTER TABLE `core_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `core_purchases`
--
ALTER TABLE `core_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_raw_materials`
--
ALTER TABLE `core_raw_materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `core_roles`
--
ALTER TABLE `core_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_shipping_methods`
--
ALTER TABLE `core_shipping_methods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `core_status`
--
ALTER TABLE `core_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `core_stocks`
--
ALTER TABLE `core_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `core_transactions`
--
ALTER TABLE `core_transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_uom`
--
ALTER TABLE `core_uom`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
