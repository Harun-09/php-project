-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 22, 2025 at 11:14 PM
-- Server version: 8.0.17
-- PHP Version: 8.2.4

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
  `bom_code` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `revision_no` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `effective_date` date DEFAULT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `uom` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_general_ci,
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
(5, 2, 10, 1.00, 'Piece', '', '2025-10-20 00:18:22', '2025-10-20 00:18:22');

-- --------------------------------------------------------

--
-- Table structure for table `core_categories`
--

CREATE TABLE `core_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `name` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_general_ci,
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
  `id` int(11) NOT NULL,
  `expense_date` timestamp NULL DEFAULT NULL,
  `expense_category` varchar(50) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `amount` decimal(12,2) DEFAULT NULL,
  `currency` varchar(10) DEFAULT 'BDT',
  `paid_by` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(10) NOT NULL,
  `order_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text,
  `shipping_method_id` int(11) DEFAULT NULL,
  `order_total` double NOT NULL DEFAULT '0',
  `paid_amount` double NOT NULL DEFAULT '0',
  `status_id` int(10) DEFAULT '1',
  `discount` float DEFAULT '0',
  `vat` float DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warehouse_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `vat` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `warehouse_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `log_date` timestamp NULL DEFAULT NULL,
  `remarks` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_products`
--

CREATE TABLE `core_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `description` text,
  `brand` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT '0.00',
  `image` varchar(255) DEFAULT NULL,
  `stock_qty` int(11) DEFAULT '0',
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int(11) NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `purchase_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `invoice_no` varchar(100) DEFAULT NULL,
  `warehouse_name` varchar(250) NOT NULL,
  `purchase_total` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `vat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `remarks` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `total` decimal(10,2) GENERATED ALWAYS AS ((`qty` * `price`)) STORED,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_raw_materials`
--

CREATE TABLE `core_raw_materials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text,
  `unit_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

CREATE TABLE `core_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_shipping_methods`
--

CREATE TABLE `core_shipping_methods` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_status`
--

CREATE TABLE `core_status` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_stocks`
--

CREATE TABLE `core_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float DEFAULT NULL,
  `transaction_type_id` int(10) UNSIGNED DEFAULT NULL,
  `remark` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `warehouse_id` int(10) UNSIGNED DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `lot_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `quantity` decimal(12,2) DEFAULT '0.00',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_transaction_types`
--

CREATE TABLE `core_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_uom`
--

CREATE TABLE `core_uom` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `inactive` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `core_warehouses`
--

CREATE TABLE `core_warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
