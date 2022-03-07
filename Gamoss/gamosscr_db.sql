-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 24, 2022 at 09:53 PM
-- Server version: 5.7.37
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gamosscr_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `po` varchar(50) NOT NULL,
  `asn` varchar(50) NOT NULL,
  `invoice_number` varchar(50) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `discount_type` varchar(50) NOT NULL,
  `discount_value` bigint(20) NOT NULL,
  `tax_amount` bigint(20) NOT NULL,
  `grand_total` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hr_status` varchar(20) NOT NULL,
  `admin_status` varchar(20) NOT NULL,
  `invoice_slip` varchar(200) DEFAULT NULL,
  `hr_approved` datetime DEFAULT NULL,
  `admin_approved` datetime DEFAULT NULL,
  `payment_status` varchar(50) DEFAULT NULL,
  `payment_note` text,
  `payment_method` varchar(50) DEFAULT NULL,
  `payment_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `po_id`, `po`, `asn`, `invoice_number`, `sub_total`, `discount_type`, `discount_value`, `tax_amount`, `grand_total`, `created_at`, `hr_status`, `admin_status`, `invoice_slip`, `hr_approved`, `admin_approved`, `payment_status`, `payment_note`, `payment_method`, `payment_no`) VALUES
(1, 2, '123465', 'ASN123', 'INV2022', 45000, 'per', 5, 6750, 49500, '2022-01-21 13:01:21', 'ACCEPT', 'ACCEPT', NULL, '2022-02-11 08:08:58', '2022-02-13 07:22:58', NULL, NULL, NULL, NULL),
(2, 5, '110035', 'asndummy', 'TESTINV03', 270000, 'per', 10, 48600, 291600, '2022-01-24 17:42:22', 'ACCEPT', 'ACCEPT', 'Vikas_June1.pdf', '2022-01-24 13:45:34', '2022-01-24 13:49:31', NULL, NULL, NULL, NULL),
(4, 7, '1324', '7410', '789456', 2000, 'num', 40, 3240, 5200, '2022-02-11 12:59:25', 'ACCEPT', 'ACCEPT', 'PaymentSwayam_(1).pdf', '2022-02-11 07:30:11', '2022-02-11 07:30:11', NULL, NULL, NULL, NULL),
(5, 8, 'PO20228', '7410', 'INV20225', 28000, 'num', 237, 246960, 274723, '2022-02-11 22:41:56', 'ACCEPT', 'ACCEPT', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 9, 'PO20229', 'ASN001', 'INV20226', 5000, 'num', 0, 412200, 417200, '2022-02-11 22:44:13', 'ACCEPT', 'ACCEPT', 'Gamoss-2.pdf', '2022-02-11 17:15:52', '2022-02-11 17:19:15', 'Completed', 'test', 'UPI', '9643460132@paytm');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_orders`
--

CREATE TABLE `invoice_orders` (
  `id` int(11) NOT NULL,
  `inv_id` int(11) NOT NULL,
  `inv_item_name` varchar(200) NOT NULL,
  `inv_item_description` varchar(200) NOT NULL,
  `inv_item_hsn` varchar(50) NOT NULL,
  `inv_item_quantity` int(11) NOT NULL,
  `inv_item_rate` bigint(20) NOT NULL,
  `inv_item_tax` bigint(20) NOT NULL,
  `inv_item_tax_type` text,
  `inv_item_value` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_orders`
--

INSERT INTO `invoice_orders` (`id`, `inv_id`, `inv_item_name`, `inv_item_description`, `inv_item_hsn`, `inv_item_quantity`, `inv_item_rate`, `inv_item_tax`, `inv_item_tax_type`, `inv_item_value`) VALUES
(1, 1, 'Xiomi ', 'note 7 pro ', 'XI03 ', 1, 15000, 1350, 'igst', 16350),
(2, 1, 'Xiomi ', 'note 7 pro ', 'XI03 ', 3, 10000, 5400, 'gst', 35400),
(3, 2, 'laptop MAC ', 'Mac book ', 'MAC03 ', 2, 90000, 32400, NULL, 212400),
(4, 2, 'laptop ', 'acer ', 'ACER03 ', 3, 30000, 16200, NULL, 106200),
(7, 4, 'pendrive 2 ', 'kingston 2 ', 'PEN03 ', 3, 400, 1080, NULL, 2280),
(8, 4, 'pendrive ', 'kingston ', 'PEN123 ', 4, 200, 2160, NULL, 2960),
(9, 5, 'CC Road Cutting And Restoration ', 'xyz ', '995424 ', 80, 350, 246960, NULL, 274960),
(10, 6, 'Transportation for FHTC work ', 'xyz ', '995424 ', 100, 50, 412200, NULL, 417200);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `po_id` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `item_description` varchar(500) NOT NULL,
  `item_hsn` varchar(50) NOT NULL,
  `item_quantity` int(11) NOT NULL,
  `item_rate` bigint(20) NOT NULL,
  `item_tax` int(11) NOT NULL,
  `item_tax_type` text,
  `item_value` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `po_id`, `item_name`, `item_description`, `item_hsn`, `item_quantity`, `item_rate`, `item_tax`, `item_tax_type`, `item_value`) VALUES
(1, 1, 'Mouse ', 'hp mouse ', 'MO03 ', 20, 150, 270, NULL, 3270),
(2, 1, 'Laptop ', 'acep laptop ', 'ACER20 ', 10, 5000, 9000, NULL, 59000),
(3, 2, 'Xiomi ', 'note 7 pro ', 'XI03 ', 1, 15000, 1350, 'igst', 16350),
(4, 2, 'Xiomi ', 'note 7 pro ', 'XI03 ', 1, 10000, 1800, 'gst', 11800),
(7, 4, 'laptop MAC ', 'Mac book ', 'MAC03 ', 2, 90000, 32400, NULL, 212400),
(8, 4, 'laptop ', 'acer ', 'ACER03 ', 3, 30000, 16200, NULL, 106200),
(9, 5, 'laptop MAC ', 'Mac book ', 'MAC03 ', 2, 90000, 32400, 'gst', 212400),
(10, 5, 'laptop ', 'acer ', 'ACER03 ', 3, 30000, 16200, 'gst', 106200),
(14, 3, 'test item 1', 'test desc 2 ', 'TD2 ', 6, 250, 270, 'gst', 1770),
(15, 3, 'test item 2', 'test desc 1 ', 'TD1 ', 3, 100, 27, 'csgt', 327),
(16, 3, 'test item 3 ', 'test desc 3 ', 'TD3 ', 3, 50, 27, 'sgt', 177),
(19, 6, 'test 2 ', 'test dec 2 ', 'hsn2 ', 10, 500, 1350, ' igst gst ', 6350),
(20, 6, 'test 1 ', 'test dec 1 ', 'hsn1 ', 2, 100, 36, ' gst ', 236),
(21, 6, 'ghbj ', 'gghbj ', 'v bj ', 20, 100, 360, ' gst ', 2360),
(22, 7, 'pendrive 2 ', 'kingston 2 ', 'PEN03 ', 5, 400, 360, ' gst ', 2360),
(23, 7, 'pendrive ', 'kingston ', 'PEN123 ', 10, 200, 540, ' igst gst ', 2540),
(24, 8, 'CC Road Cutting And Restoration ', 'xyz ', '995424 ', 49, 350, 3087, ' gst ', 20237),
(25, 9, 'Transportation for FHTC work ', 'xyz ', '995424 ', 458, 50, 4122, ' gst ', 27022),
(26, 10, 'Cement ', 'Ambuja Cement ', 'AC2000 ', 100, 5000, 90000, ' gst ', 590000),
(27, 11, 'mobile ', 'note 8 pro ', 'MN8P ', 4, 22000, 15840, ' gst ', 103840),
(28, 11, 'mobile ', 'note 7 pro ', 'MN7P ', 2, 15000, 8100, ' igst gst ', 38100);

-- --------------------------------------------------------

--
-- Table structure for table `po_timeline`
--

CREATE TABLE `po_timeline` (
  `po_id` int(11) NOT NULL,
  `po_acknowledgement` tinyint(1) DEFAULT NULL,
  `po_invoice` tinyint(1) DEFAULT NULL,
  `po_hr` tinyint(1) DEFAULT NULL,
  `po_file` tinyint(1) DEFAULT NULL,
  `po_admin` tinyint(1) DEFAULT NULL,
  `po_payment` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `po_timeline`
--

INSERT INTO `po_timeline` (`po_id`, `po_acknowledgement`, `po_invoice`, `po_hr`, `po_file`, `po_admin`, `po_payment`) VALUES
(1, 1, 0, 0, 0, 0, 0),
(2, 1, 1, 1, 0, 1, 0),
(3, 0, 0, 0, 0, 0, 0),
(5, 1, 1, 1, 1, 1, 0),
(6, 0, 0, 0, 0, 0, 0),
(7, 1, 1, 1, 1, 1, 0),
(8, 1, 1, 0, 0, 0, 0),
(9, 1, 1, 1, 1, 1, 1),
(10, 1, 0, 0, 0, 0, 0),
(11, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id` int(11) NOT NULL,
  `vendor_id` int(11) NOT NULL,
  `date_time` datetime DEFAULT NULL,
  `po_number` varchar(30) NOT NULL,
  `sub_total` bigint(20) NOT NULL,
  `discount_type` varchar(20) NOT NULL,
  `discount_amount` bigint(20) NOT NULL,
  `tax_amount` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL,
  `approved_by_datetime` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `pdf_path` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id`, `vendor_id`, `date_time`, `po_number`, `sub_total`, `discount_type`, `discount_amount`, `tax_amount`, `total`, `created_at`, `status`, `approved_by_datetime`, `created_by`, `pdf_path`) VALUES
(1, 3, '2022-01-18 19:24:00', '110062', 53000, 'num', 70, 9270, 62200, '2022-01-18 19:45:43', 'REJECT', '2022-02-11 08:39:00', 1, NULL),
(2, 3, '2022-01-19 15:31:00', '123465', 25000, 'per', 5, 3150, 26900, '2022-01-19 15:32:58', 'ACCEPT', '2022-01-20 13:43:10', 1, NULL),
(3, 4, '2022-01-29 14:57:00', 'TEPO03', 1950, 'num', 74, 324, 2200, '2022-01-24 17:09:49', 'PENDING', NULL, 1, NULL),
(5, 4, '2022-01-24 17:40:00', '110035', 270000, 'per', 10, 48600, 291600, '2022-01-24 17:22:26', 'ACCEPT', '2022-01-24 13:06:27', 1, NULL),
(6, 4, '2022-02-10 10:55:00', '1234', 7200, 'num', 6, 1746, 8940, '2022-02-10 10:56:56', 'PENDING', NULL, 1, NULL),
(7, 3, '2022-02-11 12:48:00', '1324', 4000, 'num', 40, 900, 4860, '2022-02-11 12:55:22', 'ACCEPT', '2022-02-11 07:25:40', 1, NULL),
(8, 3, '2022-02-12 00:00:00', 'PO20228', 17150, 'num', 237, 3087, 20000, '2022-02-11 22:28:39', 'ACCEPT', '2022-02-11 17:05:34', 1, NULL),
(9, 3, '2022-02-11 05:26:00', 'PO20229', 22900, 'num', 0, 4122, 27022, '2022-02-11 22:37:17', 'ACCEPT', '2022-02-11 17:07:31', 1, NULL),
(10, 6, '2022-02-17 17:00:00', 'PO202210', 500000, 'num', 0, 90000, 590000, '2022-02-17 16:58:58', 'ACCEPT', '2022-02-17 11:33:33', 1, NULL),
(11, 6, '2022-02-18 18:34:00', 'PO202211', 118000, 'num', 40, 23940, 141900, '2022-02-18 18:35:17', 'PENDING', NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `website_url` text NOT NULL,
  `website_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_url`, `website_name`) VALUES
(1, 'http://localhost/gamoss/', 'Gamoss');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `image` text NOT NULL,
  `user_role` varchar(50) NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `mobile` bigint(20) DEFAULT NULL,
  `permission_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `user_role`, `status`, `mobile`, `permission_id`) VALUES
(1, 'vikas', 'krishna.pratap1997@gmail.com', '59f3848a6596af9efb8888a2c808a801', 'vikas.jpeg', 'ADMIN', 'ACTIVE', 7836097087, 1),
(2, 'kushagra', 'kpss2897@gmail.com', '2c7c2e96b79bf10c33aaef17a52ee5e3', 'defautimage.jpg', 'VENDOR', 'ACTIVE', 8171065443, 1),
(3, 'test vikas', 'vg1231923@gmail.com', '59f3848a6596af9efb8888a2c808a801', 'defautimage.jpg', 'VENDOR', 'ACTIVE', 9643460132, 1),
(4, 'hrgamoss', 'hr@gamoss.com', '59f3848a6596af9efb8888a2c808a801', 'defautimage.jpg', 'HR', 'ACTIVE', 7836097087, NULL),
(8, 'cindia', 'info@ssoftwares.in', '59f3848a6596af9efb8888a2c808a801', 'signature12.jpg', 'VENDOR', 'ACTIVE', 7011583846, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `vendor_add` int(11) NOT NULL,
  `vendor_edit` int(11) NOT NULL,
  `vendor_view` int(11) NOT NULL,
  `vendor_delete` int(11) NOT NULL,
  `po_add` int(11) NOT NULL,
  `po_edit` int(11) NOT NULL,
  `po_view` int(11) NOT NULL,
  `po_delete` int(11) NOT NULL,
  `po_approve` int(11) NOT NULL,
  `invoice_add` int(11) NOT NULL,
  `invoice_edit` int(11) NOT NULL,
  `invoice_view` int(11) NOT NULL,
  `invoice_delete` int(11) NOT NULL,
  `invoice_approve` int(11) NOT NULL,
  `hr_approve` int(11) NOT NULL,
  `admin_approve` int(11) NOT NULL,
  `payment_approve` int(11) NOT NULL,
  `user_add` int(11) NOT NULL,
  `user_edit` int(11) NOT NULL,
  `user_view` int(11) NOT NULL,
  `user_delete` int(11) NOT NULL,
  `user_approve` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`id`, `user_id`, `vendor_add`, `vendor_edit`, `vendor_view`, `vendor_delete`, `po_add`, `po_edit`, `po_view`, `po_delete`, `po_approve`, `invoice_add`, `invoice_edit`, `invoice_view`, `invoice_delete`, `invoice_approve`, `hr_approve`, `admin_approve`, `payment_approve`, `user_add`, `user_edit`, `user_view`, `user_delete`, `user_approve`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(2, 4, 1, 1, 1, 1, 0, 0, 1, 0, 0, 1, 1, 1, 1, 1, 1, 0, 1, 1, 1, 1, 1, 0),
(3, 2, 0, 0, 0, 0, 0, 1, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1),
(6, 8, 1, 1, 1, 1, 0, 0, 1, 0, 1, 1, 1, 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

CREATE TABLE `vendors` (
  `id` int(11) NOT NULL,
  `vendor_name` varchar(50) NOT NULL,
  `gst_number` varchar(50) NOT NULL,
  `vendor_mobile` bigint(20) NOT NULL,
  `vendor_email` varchar(50) NOT NULL,
  `contact_person_name` varchar(50) NOT NULL,
  `contact_person_mobile` bigint(20) NOT NULL,
  `vendor_address` text NOT NULL,
  `vendor_site` varchar(100) NOT NULL,
  `vendor_images` text,
  `created_at` date DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `vendor_name`, `gst_number`, `vendor_mobile`, `vendor_email`, `contact_person_name`, `contact_person_mobile`, `vendor_address`, `vendor_site`, `vendor_images`, `created_at`, `status`) VALUES
(3, 'kushagra', 'K1234', 8171065443, '30julykush@gmail.com', 'abhinav', 8888888888, 'delhi', 'test', 'defautimage.jpg', '2022-01-17', 'Inactive'),
(4, 'test vikas', 'TV03', 9643460132, 'kpss2897@gmail.com', 'vikas', 8888888888, 'test address', 'test site', 'signature121.jpg', '2022-01-24', 'Active'),
(6, 'cindia', '06IFAPS8244K1ZW', 7011583846, 'info@ssoftwares.in', 'Krishna Thakur', 9310140669, 'IMT MANESAR', 'MANESAR', 'signature12.jpg', NULL, 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_orders`
--
ALTER TABLE `invoice_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `po_timeline`
--
ALTER TABLE `po_timeline`
  ADD PRIMARY KEY (`po_id`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendors`
--
ALTER TABLE `vendors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `invoice_orders`
--
ALTER TABLE `invoice_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `purchase_order`
--
ALTER TABLE `purchase_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `vendors`
--
ALTER TABLE `vendors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
