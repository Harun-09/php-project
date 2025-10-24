
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
); 




CREATE TABLE `core_roles` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
);




CREATE TABLE `core_products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `uom_id` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `brand` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `tax` decimal(10,2) DEFAULT 0.00,
  `image` varchar(255) DEFAULT NULL,
  `stock_qty` int(11) DEFAULT 0,
  `purchase_price` decimal(10,2) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);




CREATE TABLE `core_raw_materials` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `unit_cost` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);




CREATE TABLE `core_uom` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(10) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
);




CREATE TABLE `core_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);




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
);





CREATE TABLE `core_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);



CREATE TABLE `core_warehouses` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);





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
);




CREATE TABLE `core_bom_details` (
  `id` int(11) NOT NULL,
  `bom_id` int(11) NOT NULL,
  `raw_material_id` int(11) NOT NULL,
  `quantity` decimal(10,2) NOT NULL,
  `uom` varchar(20) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
);




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
);





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
);





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
);




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
);




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
);





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
);





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
);




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
);