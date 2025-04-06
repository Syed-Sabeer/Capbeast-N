-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 26, 2025 at 10:17 AM
-- Server version: 10.5.28-MariaDB-cll-lve
-- PHP Version: 8.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `supersof_capbeast`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('marketing','sale','superadmin') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'sabeer@developer.com', '$2y$10$GDIj3rw4oV72BOFWB.juCOy/dWSlwIX.HdvC1gotslctTRzrwIM9O', 'superadmin', NULL, NULL),
(2, 'admin@supersoft.com', '$2y$10$GDIj3rw4oV72BOFWB.juCOy/dWSlwIX.HdvC1gotslctTRzrwIM9O', '', NULL, NULL),
(3, 'sales@monkeybeanies.com', '$2y$10$WZ.NQEOChPtdhEYS.lvJ8.TFVA2kc3o0KRaycpjzPFSWHD6tY9kX6', 'marketing', NULL, NULL),
(4, 'accountant@monkeybeanies.com', '$2y$10$WZ.NQEOChPtdhEYS.lvJ8.TFVA2kc3o0KRaycpjzPFSWHD6tY9kX6', 'marketing', '2025-02-03 11:40:19', '2025-02-03 11:40:19'),
(5, 'comptabilite@monkeybeanies.com', '$2y$10$WZ.NQEOChPtdhEYS.lvJ8.TFVA2kc3o0KRaycpjzPFSWHD6tY9kX6', 'marketing', '2025-02-03 11:40:19', '2025-02-03 11:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `authorizedotnet_logs`
--

CREATE TABLE `authorizedotnet_logs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `amount` double(8,2) DEFAULT NULL,
  `name_of_card` varchar(255) DEFAULT NULL,
  `response_code` varchar(255) DEFAULT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `auth_id` varchar(255) DEFAULT NULL,
  `message_code` varchar(255) DEFAULT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `title`, `description`, `image`, `visibility`, `created_at`, `updated_at`) VALUES
(19, 'Adidas', NULL, 'categories/CIctJN8IFio6vHjpOYgTT6SWdcMlC4WsPbLuqr2w.jpg', 1, '2025-03-24 14:30:30', '2025-03-26 13:08:46'),
(20, 'CarHartt', NULL, 'categories/4UEMMS3n0K3HrkreqGbIVizSUbpNWubKFVpR7AXI.png', 1, '2025-03-24 14:30:43', '2025-03-26 13:09:13'),
(21, 'FlexFit', NULL, 'categories/pz9NcTBAg9v5bpWMmpvohtDwzPjkiMetekqGh8iQ.png', 1, '2025-03-24 14:30:52', '2025-03-26 13:09:39'),
(22, 'Imperial', NULL, 'categories/Fr89FTiqkg2CHtufEHONXuzcBvwmBYlSHCiu9dmp.jpg', 1, '2025-03-24 14:31:04', '2025-03-26 13:10:20'),
(23, 'Nike', NULL, 'categories/4txVuJesPXiIFCBLoVPGnvJVP5C4UMgmSXue3Ktm.png', 1, '2025-03-24 14:31:12', '2025-03-26 13:10:50'),
(24, 'Oakley', NULL, 'categories/8bcyiQfOK8jNLrqbv6ecWHT4jND76qE2EEq4k5ko.png', 1, '2025-03-24 14:31:24', '2025-03-26 13:11:21'),
(25, 'SportsMan', NULL, 'categories/5rns8laYvD9nzlgX8y1ox8U6jOhsiQJkVQBJdUtf.jpg', 1, '2025-03-24 14:31:41', '2025-03-26 13:11:54'),
(26, 'The North Face', NULL, 'categories/paPboBQriQaQTG9Tnul92I0IawuxEqkNGLis43yB.png', 1, '2025-03-24 14:31:55', '2025-03-26 13:12:32'),
(27, 'Yupoong', NULL, 'categories/72gkIPXgwZR4PE4E3TJlr8HZGMpXj6f6nF3Vhic1.png', 1, '2025-03-24 14:32:09', '2025-03-26 13:12:57'),
(28, '47', NULL, 'categories/CrLNKJVQvk7zOH12nsKcXdQcZ2rca2aEStGtYBe6.png', 1, '2025-03-24 14:33:02', '2025-03-26 13:13:29'),
(29, 'Capbeast', NULL, 'categories/z2X765v4Romb3o2fuv5YUPzSjLjXIsCYwtOR6AOQ.png', 1, '2025-03-24 14:33:51', '2025-03-26 13:13:55'),
(30, 'New Era', NULL, 'categories/PApslYJLEMIpEudKqR3VAAYdXhqV5uGslaUyLiDx.png', 1, '2025-03-25 12:26:40', '2025-03-26 13:15:20'),
(31, 'champion', NULL, 'categories/TX4NqrypDkst9f2kn3HTuGVwS3FzffwZtdIp37Uk.png', 1, '2025-03-25 13:05:01', '2025-03-26 13:14:57');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `printing_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `beanie_type` int(11) NOT NULL,
  `is_pompom` int(11) DEFAULT NULL,
  `printing_price` decimal(8,2) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `delivery_price` decimal(8,2) NOT NULL,
  `pompom_price` decimal(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_artwork`
--

CREATE TABLE `cart_artwork` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cart_id` bigint(20) UNSIGNED NOT NULL,
  `artwork_type` int(11) NOT NULL,
  `artwork_dataText` text DEFAULT NULL,
  `artwork_dataImage` text DEFAULT NULL,
  `patch_length` decimal(8,2) NOT NULL,
  `patch_height` decimal(8,2) NOT NULL,
  `font_style` varchar(255) NOT NULL,
  `num_of_imprint` int(11) NOT NULL,
  `imprint_color` text NOT NULL,
  `leathercolor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `description`, `image`, `visibility`, `created_at`, `updated_at`) VALUES
(22, 'Bucket Hats', NULL, NULL, 1, '2025-03-24 10:55:24', '2025-03-24 10:55:24'),
(23, 'Snapbacks', NULL, NULL, 1, '2025-03-24 11:40:42', '2025-03-24 11:40:42'),
(24, 'Beanies Blowout', NULL, NULL, 1, '2025-03-24 14:25:45', '2025-03-24 14:25:45'),
(25, 'Fitted Hats', NULL, NULL, 1, '2025-03-24 15:27:37', '2025-03-24 15:27:37'),
(26, 'Custom Baseball Hats', NULL, NULL, 1, '2025-03-25 11:45:45', '2025-03-25 11:45:45'),
(27, 'Cyber Monday Deals', NULL, NULL, 1, '2025-03-25 14:31:32', '2025-03-25 14:31:32'),
(28, 'Military Hats', NULL, NULL, 1, '2025-03-26 11:28:10', '2025-03-26 11:28:10'),
(29, 'Tie-Dye Hats', NULL, NULL, 1, '2025-03-26 11:52:15', '2025-03-26 11:52:15');

-- --------------------------------------------------------

--
-- Table structure for table `component_embroidery_color`
--

CREATE TABLE `component_embroidery_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `component_product_color`
--

CREATE TABLE `component_product_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `color_code` varchar(255) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `component_product_color`
--

INSERT INTO `component_product_color` (`id`, `color_name`, `color_code`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'CARAMEL', '#6a3b19', NULL, '2025-01-21 06:03:21', '2025-01-21 06:06:26'),
(2, 'BURGUNDY', '#48131d', NULL, '2025-01-21 06:05:43', '2025-01-21 06:05:43'),
(3, 'BLACK', '#000000', NULL, '2025-01-21 06:06:40', '2025-01-21 06:06:40'),
(4, 'CHARCOAL', '#2b2b2b', NULL, '2025-01-21 06:07:14', '2025-01-21 06:07:14'),
(5, 'CREME', '#837658', NULL, '2025-01-21 06:07:54', '2025-01-21 06:07:54'),
(6, 'GREY', '#797b72', NULL, '2025-01-21 06:08:25', '2025-01-21 06:08:25'),
(7, 'LIME', '#76b07b', NULL, '2025-01-21 06:09:05', '2025-01-21 06:09:05'),
(8, 'ORANGE', '#b82c11', NULL, '2025-01-21 06:09:39', '2025-01-21 06:09:39'),
(9, 'GREEN FOREST', '#122d2c', NULL, '2025-01-21 06:10:28', '2025-01-21 06:15:02'),
(10, 'PURPLE', '#382566', NULL, '2025-01-21 06:11:23', '2025-01-21 06:11:23'),
(11, 'ROYAL', '#163387', NULL, '2025-01-21 06:11:59', '2025-01-21 06:11:59'),
(12, 'RED', '#ff0000', NULL, '2025-01-21 06:12:12', '2025-01-21 06:12:12'),
(13, 'TAIL', '#188683', NULL, '2025-01-21 06:12:44', '2025-01-21 06:12:44'),
(14, 'PINK', '#ffc0cb', NULL, '2025-01-21 06:15:29', '2025-01-21 06:15:29'),
(15, 'GREEN', '#008000', NULL, '2025-01-21 06:17:03', '2025-01-21 06:17:03'),
(16, 'ORANGE PP', '#ad1700', NULL, '2025-01-21 06:17:38', '2025-01-21 06:17:38'),
(17, 'SAFTY ORANGE', '#e72613', NULL, '2025-01-21 06:19:19', '2025-01-21 06:19:19'),
(18, 'ORANGE BURN', '#b0230f', NULL, '2025-01-21 06:20:00', '2025-01-21 06:20:00'),
(19, 'NAVY', '#000080', NULL, '2025-01-21 17:13:08', '2025-01-21 17:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `discount_coupon`
--

CREATE TABLE `discount_coupon` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `coupon_country` int(11) NOT NULL,
  `coupon_user` int(11) NOT NULL,
  `discount_type` int(11) NOT NULL,
  `discountable_type` varchar(255) NOT NULL,
  `discountable_id` bigint(20) UNSIGNED DEFAULT NULL,
  `percentage` double(8,2) NOT NULL,
  `is_all` int(11) NOT NULL,
  `is_expiry` int(11) NOT NULL,
  `count` int(11) DEFAULT NULL,
  `duration_from` timestamp NULL DEFAULT NULL,
  `duration_to` timestamp NULL DEFAULT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_coupon`
--

INSERT INTO `discount_coupon` (`id`, `title`, `code`, `coupon_country`, `coupon_user`, `discount_type`, `discountable_type`, `discountable_id`, `percentage`, `is_all`, `is_expiry`, `count`, `duration_from`, `duration_to`, `visibility`, `created_at`, `updated_at`) VALUES
(16, 'Main Test', 'Main Test', 0, 0, 1, 'App\\Models\\Product', NULL, 99.00, 1, 0, NULL, NULL, NULL, 1, '2025-02-11 03:57:04', '2025-02-23 02:36:07'),
(17, 'Main Test2', 'Main Test2', 0, 0, 1, 'App\\Models\\Product', 1, 99.00, 0, 0, NULL, NULL, NULL, 1, '2025-02-11 03:57:54', '2025-02-11 03:57:54'),
(18, 'dfdsfdsdsfdsf', 'dsfd', 0, 0, 1, 'App\\Models\\Product', 1, 23.00, 1, 0, NULL, NULL, NULL, 1, '2025-02-19 07:09:20', '2025-02-19 07:09:40'),
(19, 'sdfkj', 'jlkasj', 0, 0, 1, 'App\\Models\\Product', 1, 32.00, 0, 0, NULL, NULL, NULL, 1, '2025-02-20 14:10:18', '2025-02-20 14:10:18'),
(20, 'fdhjh', 'jhkjdhf', 0, 0, 1, 'App\\Models\\Product', NULL, 23.00, 1, 1, 2, '2025-02-27 19:19:00', '2025-03-07 19:19:00', 1, '2025-02-20 14:19:50', '2025-02-20 14:19:50'),
(21, 'test', 'test', 0, 0, 1, 'App\\Models\\Product', NULL, 50.00, 1, 1, 1, '2025-02-19 19:20:00', '2025-02-19 19:20:00', 1, '2025-02-20 14:20:52', '2025-02-20 14:20:52'),
(22, 'dsjfh', 'jkhjk', 0, 0, 3, 'App\\Models\\ProductPrinting', 1, 32.00, 1, 0, NULL, NULL, NULL, 1, '2025-02-20 14:33:43', '2025-03-04 10:09:05'),
(23, 'new', 'new', 0, 0, 1, 'App\\Models\\Product', NULL, 23.00, 1, 0, NULL, NULL, NULL, 1, '2025-03-04 11:59:59', '2025-03-04 11:59:59'),
(24, 'Et et repellendus A', 'Deleniti voluptatem', 0, 1, 3, 'App\\Models\\ProductPrinting', NULL, 32.00, 1, 0, NULL, NULL, NULL, 1, '2025-03-05 02:11:08', '2025-03-05 02:11:08'),
(25, 'Sunt ipsa eos lib', 'Vitae minim sunt ali', 2, 2, 1, 'App\\Models\\Product', NULL, 3.00, 1, 0, NULL, NULL, NULL, 1, '2025-03-05 02:11:34', '2025-03-05 02:11:34'),
(26, 'test', 'testcode', 0, 2, 1, 'App\\Models\\Product', NULL, 20.00, 1, 0, NULL, NULL, NULL, 1, '2025-03-05 02:12:11', '2025-03-05 02:12:11'),
(27, 'Sunt voluptatem exer', 'Harum vel dolore del', 2, 1, 1, 'App\\Models\\Product', NULL, 23.00, 1, 1, 23, '2025-03-05 07:54:00', '2025-03-26 07:54:00', 1, '2025-03-05 02:54:32', '2025-03-05 02:54:32');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `internal_status`
--

CREATE TABLE `internal_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `internal_status`
--

INSERT INTO `internal_status` (`id`, `title`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(4, 'Pending', 'Order received, awaiting processing.', NULL, '2025-02-10 14:55:48', '2025-02-10 14:55:48'),
(5, 'Processing', 'Order is being prepared for fulfillment.', NULL, '2025-02-10 14:56:02', '2025-02-10 14:56:02'),
(6, 'Picking', 'Items are being picked from inventory for packing.', NULL, '2025-02-10 14:56:15', '2025-02-10 14:56:15'),
(7, 'Shipped', 'Order has been dispatched to the courier.', NULL, '2025-02-10 14:56:29', '2025-02-10 14:56:29'),
(8, 'Completed', 'Order is fully processed and marked as completed.', NULL, '2025-02-10 14:56:41', '2025-02-10 14:56:41'),
(9, 'Order Stock', 'Checking stock availability before processing the order.', NULL, '2025-02-10 14:56:56', '2025-02-10 14:56:56'),
(10, 'Stock Ordered', 'Stock has been ordered from the supplier.', NULL, '2025-02-10 14:57:12', '2025-02-10 14:57:12'),
(11, 'Back Ordered', 'Items are out of stock; waiting for restock before fulfillment.', NULL, '2025-02-10 14:57:24', '2025-02-10 14:57:24'),
(12, 'Waiting Approval', 'Order requires approval before proceeding.', NULL, '2025-02-10 14:57:39', '2025-02-10 14:57:39'),
(13, 'Approved', 'Order has been reviewed and approved for processing.', NULL, '2025-02-10 14:57:49', '2025-02-10 14:57:49'),
(14, 'In Production', 'Order is currently being processed or manufactured.', NULL, '2025-02-10 14:58:22', '2025-02-10 14:58:22'),
(15, 'Contact Client', 'Client needs to be contacted for further details or clarification.', NULL, '2025-02-10 14:58:37', '2025-02-10 14:58:37'),
(16, 'File Missing', 'Required file is missing; awaiting client to provide it.', NULL, '2025-02-10 14:58:52', '2025-02-10 14:58:52'),
(17, 'On Hold', 'Order is put on hold due to an issue or pending approval.', NULL, '2025-02-10 14:59:04', '2025-02-10 14:59:04'),
(18, 'Waiting Client Response', 'Waiting for client’s response to proceed with the order.', NULL, '2025-02-10 14:59:15', '2025-02-10 14:59:15'),
(19, 'Cancelled', 'Order has been cancelled due to client request or internal reasons.', NULL, '2025-02-10 14:59:31', '2025-02-10 14:59:31'),
(20, 'Payment Complete', 'Full payment has been received and verified.', NULL, '2025-02-10 14:59:47', '2025-02-10 14:59:47'),
(21, 'Payment Failed', 'Payment attempt was unsuccessful; requires action.', NULL, '2025-02-10 14:59:58', '2025-02-10 14:59:58'),
(22, 'Payment Pending', 'Payment is not yet received or is under process.', NULL, '2025-02-10 15:00:12', '2025-02-10 15:00:12'),
(23, 'Refunded', 'Payment has been refunded to the client.', '2025-03-04 10:09:24', '2025-02-10 15:00:24', '2025-03-04 10:09:24');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_12_18_190201_create_product_printing_table', 1),
(6, '2024_12_18_191749_create_products_table', 1),
(7, '2024_12_18_191833_create_product_pricing_table', 1),
(8, '2024_12_26_094812_create_product_delivery_table', 1),
(9, '2025_01_02_135324_create_admins_table', 1),
(10, '2025_01_04_090228_create_product_baseimages_table', 1),
(11, '2025_01_07_092943_create_order_table', 1),
(12, '2025_01_07_110753_create_component_embroidery_color_table', 1),
(13, '2025_01_07_110805_create__component_font_table', 1),
(14, '2025_01_13_142822_create_order_shipping_detail_table', 1),
(15, '2025_01_15_114442_create_order_files_table', 1),
(16, '2025_01_15_163712_create_internal_status_table', 1),
(17, '2025_01_15_182222_create_order_internal_status_table', 1),
(18, '2025_01_19_140119_create_component_product_color_table', 1),
(19, '2025_01_19_142343_create_product_color_table', 1),
(20, '2025_01_19_142721_create_order_items_table', 1),
(21, '2025_01_19_142722_create_order_artwork_table', 1),
(22, '2025_01_19_143115_create_cart_table', 1),
(23, '2025_01_19_143116_create_cart_artwork_table', 1),
(24, '2025_01_27_110317_create_authorizedotnet_logs_table', 2),
(25, '2025_02_02_075253_create_discount_coupon_table', 3),
(26, '2025_02_02_075707_create_discount_coupon_table', 4),
(27, '2025_02_02_084025_create_discount_coupon_table', 5),
(28, '2025_02_02_112714_create_discount_coupon_table', 6),
(29, '2025_02_09_081432_create_tax_price_table', 7),
(30, '2025_02_10_155206_create_tps_tax_price_table', 8),
(31, '2025_02_09_081432_create_tvq_tax_price_table', 9),
(32, '2025_02_10_165514_create_tps_tax_price_table', 10),
(33, '2025_02_10_175417_create_order_tax_details_table', 11),
(34, '2025_03_02_105404_create_temp_cart_images_table', 12),
(35, '2025_03_05_094522_create_product_seo_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discount_id` bigint(20) UNSIGNED DEFAULT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `subtotal_price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `tps_tax_price` decimal(10,2) NOT NULL,
  `tvq_tax_price` decimal(10,2) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `user_id`, `discount_id`, `total_price`, `subtotal_price`, `discount_price`, `tps_tax_price`, `tvq_tax_price`, `status`, `created_at`, `updated_at`) VALUES
(71, 'ESZI0O', 8, NULL, 179.36, 156.00, 0.00, 7.80, 15.56, 0, '2025-02-11 01:32:22', '2025-02-23 07:26:02'),
(72, 'GMQCI9', 8, NULL, 179.36, 156.00, 0.00, 7.80, 15.56, 0, '2025-02-11 01:40:36', '2025-02-23 07:47:57'),
(73, 'T0NZSR', 1, 21, 246.44, 301.88, 55.44, 0.00, 0.00, 1, '2025-02-20 14:30:49', '2025-02-23 02:43:30'),
(74, 'YDL3KV', 33, NULL, 221.15, 221.15, 0.00, 0.00, 0.00, NULL, '2025-03-18 03:38:34', '2025-03-18 03:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_artwork`
--

CREATE TABLE `order_artwork` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_item_id` bigint(20) UNSIGNED NOT NULL,
  `artwork_type` int(11) NOT NULL,
  `artwork_dataText` text DEFAULT NULL,
  `artwork_dataImage` text DEFAULT NULL,
  `patch_length` decimal(8,2) NOT NULL,
  `patch_height` decimal(8,2) NOT NULL,
  `font_style` varchar(255) NOT NULL,
  `num_of_imprint` int(11) NOT NULL,
  `imprint_color` text NOT NULL,
  `leathercolor` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_files`
--

CREATE TABLE `order_files` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_files`
--

INSERT INTO `order_files` (`id`, `order_id`, `title`, `file`, `created_at`, `updated_at`) VALUES
(4, 72, 'sdsf', 'OrderFiles/iHoacRkaSnKRaypNIQCKsdAy1JXihrxjrGbwzrG7.jpg', '2025-02-19 07:58:26', '2025-02-19 07:58:26'),
(5, 73, 'sakdj', 'OrderFiles/oJMY3MYj6g3VmdefBo1xeJjvx5ov76rXvpThzncq.docx', '2025-02-22 03:38:39', '2025-02-22 03:38:39'),
(6, 73, 'dsfsf', 'OrderFiles/1f5nBo3GOYMtbEJsvI0hxXLp2SGBTGBWqbNgnZM6.xlsx', '2025-02-22 03:38:49', '2025-02-22 03:38:49'),
(7, 73, 'wdwds', 'OrderFiles/KwOs3sW2PZCiEmprQAyS7sAXH2P4nHSedCEsEkRx.pdf', '2025-02-22 03:39:01', '2025-02-22 03:39:01');

-- --------------------------------------------------------

--
-- Table structure for table `order_internal_status`
--

CREATE TABLE `order_internal_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `internal_status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_internal_status`
--

INSERT INTO `order_internal_status` (`id`, `order_id`, `internal_status_id`, `created_at`, `updated_at`) VALUES
(4, 72, 5, '2025-02-19 07:58:16', '2025-03-17 03:30:33'),
(5, 72, 8, '2025-02-19 07:58:31', '2025-02-19 07:58:31'),
(6, 73, 5, '2025-02-22 03:27:52', '2025-02-22 03:38:06'),
(7, 73, 6, '2025-02-22 03:38:11', '2025-02-23 02:43:54'),
(8, 73, 9, '2025-02-22 03:38:17', '2025-02-22 03:38:17'),
(9, 73, 19, '2025-02-22 03:38:22', '2025-02-22 03:38:22'),
(10, 73, 8, '2025-02-23 02:43:57', '2025-02-23 02:43:57'),
(11, 72, 6, '2025-03-17 03:30:46', '2025-03-17 03:30:46');

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `printing_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `beanie_type` int(11) NOT NULL,
  `is_pompom` int(11) NOT NULL,
  `printing_price` decimal(8,2) NOT NULL,
  `product_price` decimal(8,2) NOT NULL,
  `delivery_price` decimal(8,2) NOT NULL,
  `pompom_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_shipping_detail`
--

CREATE TABLE `order_shipping_detail` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `companyname` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `additional_info` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_shipping_detail`
--

INSERT INTO `order_shipping_detail` (`id`, `order_id`, `firstname`, `lastname`, `companyname`, `address`, `email`, `phone`, `additional_info`, `created_at`, `updated_at`) VALUES
(57, 71, 'ytyu', 'yt', 'tyutu', 'ytytyu', 'tuytyt@def.com', '7678', NULL, '2025-02-11 01:32:22', '2025-02-11 01:32:22'),
(58, 72, 'Kyle', 'Walsh', 'Larson Mosley Associates', 'Assumenda fugiat qua', 'lozawe@mailinator.com', '77', NULL, '2025-02-11 01:40:36', '2025-02-11 01:40:36'),
(59, 73, 'Martha', 'Everett', 'Weiss Silva Trading', 'Enim quisquam enim h', 'bexemegaly@mailinator.com', '35', 'Delectus quam tempo', '2025-02-20 14:30:49', '2025-02-20 14:30:49'),
(60, 74, 'Bryar', 'Jensen', 'Nielsen and Burks Plc', 'Molestias odit fugia', 'mizume@mailinator.com', '8', 'Ducimus elit moles', '2025-03-18 03:38:34', '2025-03-18 03:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `order_tax_details`
--

CREATE TABLE `order_tax_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `tps_tax_no` varchar(255) NOT NULL,
  `tps_tax_percentage` decimal(10,3) NOT NULL,
  `tvq_tax_no` varchar(255) NOT NULL,
  `tvq_tax_percentage` decimal(10,3) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_tax_details`
--

INSERT INTO `order_tax_details` (`id`, `order_id`, `tps_tax_no`, `tps_tax_percentage`, `tvq_tax_no`, `tvq_tax_percentage`, `created_at`, `updated_at`) VALUES
(3, 71, '799230495', 5.000, '1223273960', 10.000, '2025-02-11 01:32:22', '2025-02-11 01:32:22'),
(4, 72, '799230495', 5.000, '1223273960', 9.975, '2025-02-11 01:40:36', '2025-02-11 01:40:36'),
(5, 73, '799230495', 55.000, '1223273960', 9.975, '2025-02-20 14:30:49', '2025-02-20 14:30:49'),
(6, 74, '799230495', 55.000, '1223273960', 9.975, '2025-03-18 03:38:34', '2025-03-18 03:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(400) NOT NULL,
  `description` text NOT NULL,
  `cost_price` decimal(8,2) DEFAULT NULL,
  `selling_price` decimal(8,2) NOT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, 22, NULL, 'Tie Dye Bucket Hat', 'tie-dye-bucket- hat', 'This Tie Dye custom Bucket Hat is the perfect accessory for your spring and summer wardrobe. made from 100% cotton which makes it durable and comfortable to wear. At the back of the hat is an adjustable strap closure that makes it the perfect fit for all head sizes. The personalized tie-dye hat has a low profile, and an unstructured design that makes it great for embroidered designs. The interior of the hat has a built-in sweatband that makes this hat comfortable to wear even in the warmest weather. Create your own custom embroidered bucket hats using the CapBeast hat maker. Upload your design or add custom stitched text to make the perfect hat, with no minimum order sizes. Features · Unisex design · 100% cotton material · Unstructured design · Sewn eyelets · No minimums · Custom Embroidered', NULL, 29.00, 1, '2025-03-24 11:58:53', '2025-03-24 11:58:53', NULL),
(30, 22, NULL, 'Black Bucket Hat | Sportman', 'black-bucket-hat-sportman', 'The black bucket hat by Sportman is made from 100% cotton material. It’s bio-washed chino twill makes it lightweight, comfortable, and environmentally friendly. The material is also sweat-wicking and easy to maintain. This custom embroidered hat has an unstructured design that ensures it can be folded and stored in a pocket or bag. It has a unisex design that makes it suitable for both men and women. The custom bucket hat has a black color that will enable it to go with most of your outfits. It has sewn eyelets that add to its breathability. Create your own by using the CapBeast custom hat maker. Stitch your design or catchphrase on your hat to make it a one-of-a-kind hat that will be sure to turn heads. Features · Bio-washed chino twill · Made of Eyelet design · Unstructured · Customizable · No Minimums', NULL, 28.00, 1, '2025-03-24 12:09:02', '2025-03-24 12:09:02', NULL),
(31, 22, NULL, 'Purple Passion Tie Dye Bucket Hat', 'purple-passion-tie-dye-bucket-hat', 'This purple passion tie-dye bucket hat has a vibrant, casual, and trendy look that will make you stand out from the crowd. It’s made of 100% cotton which makes it very comfortable to wear. The hat has a short brim that helps to protect you from UV rays. This custom embroidered hat has eyelets that allow fresh air to cool your head. It’s machine washable, and is one size fits all. The personalized tile dye hat features an unstructured design that makes it collapsible and foldable. It can also be washed regularly without losing its form. Design your own hat using the custom hat maker tool. Upload your logo or design and we will turn it into a unique one-of-a-kind hat. Features · Made of cotton material · Sewn eyelets · Unstructured design · Design your own · No minimums · Custom Embroidered', NULL, 29.00, 1, '2025-03-24 12:16:27', '2025-03-24 12:16:27', NULL),
(32, 22, NULL, 'Raspberry Mist Tie Dye Bucket Hat', 'raspberry-mist-tie-dye-bucket-hat', 'This Raspberry mist tie-dye bucket hat is made of 100% cotton material making it comfortable and lightweight. It’s a good choice for protecting you from harmful UV rays. The custom bucket hat has a low profile and an unstructured design that provides a comfortable and secure fit all the time. It has an easy-to-wear and comfortable casual shape that makes it your perfect outdoor companion. The hat comes with sewn eyelets that will keep you cool in the summer heat. This personalized tie-dye hat can be easily packed in your bag. It’s beautiful, stylish, and timeless. It will add a fashion flair to your style. Designing your custom embroidered hat has never been easier with our hat maker tool. Simply upload your logo and we will create a custom embroidered bucket hat that is unique to you. No minimums. Features · 100% cotton material · Sewn eyelets · Tie & dye prints · Unstructured design · Customize your design · No minimums', NULL, 29.00, 1, '2025-03-24 12:23:20', '2025-03-24 12:23:20', NULL),
(33, 22, NULL, 'Sky Tie Dye Bucket Hat', 'sky-tie-dye -bucket-hat', 'This Sky Tie Dye Custom Bucket Hat is made of 100% cotton that is soft, comfortable, and breathable. It has an unstructured design which helps the hat to keep it’s shape, even after it has been washed. The personalized cap has sewn eyelets to help keep your head cool in the summer heat, and has a unisex design that makes it suitable for both men and women. This custom hat will add a casual look in a fun and fashionable way. It’s the perfect accessory for any outfit. Design your own bucket hat using the Capbeast custom hat maker. Features · Cotton material · Sewn eyelets · Create your own · Unstructured design · Option to customize · No minimums', NULL, 29.00, 1, '2025-03-24 12:28:28', '2025-03-24 12:28:28', NULL),
(34, 22, NULL, 'Cotton Candy Tie Dye Bucket Hat', 'cotton-candy-tie-dye-bucket-hat', 'The cotton candy tie dye bucket hat is made of a twill cotton material that makes it comfortable, breathable, and fade-proof. It features a stylish unstructured design and a low profile that makes it a good choice for all head sizes. The custom hat has sewn ventilation eyelets that provide breathing space for your head. It offers ample protection while making you look smart and trendy. The bucket hat has a stylish tie-dye design to help you stand out from the crowd. The bucket design is a good choice for protecting you from the sun. It’s sun-proof, sweatproof, and has an odor-fighting function, ensuring your all-day comfort. Design your own custom hat with the CapBeast hat maker. Upload your logo, design or text to create a one of a kind embroidered hat that features your brand. Features · 100% cotton material · Unstructured design · Eyelets · Flat top · Create your own design · Custom embroidered · No minimums', NULL, 29.00, 1, '2025-03-24 12:34:43', '2025-03-24 12:34:43', NULL),
(35, 22, NULL, 'Ocean Tie Dye Bucket Hat', 'ocean-tie-dye-bucket-hat', 'This Ocean Tie Dye Bucket hat is a must-have accessory in your wardrobe. It’s made from 100% cotton material which makes it the perfect choice for outdoor activities. The cap has eyelets on its brim that allows air to cool your head. This personalized bucket hat features a short brim and flat top that makes it suitable for all head sizes. It has an unstructured design that makes it foldable and packable in a bag. Our custom embroidered hat is perfect for people of all ages who want to look stylish in any weather. Personalize your own bucket hat by using the Capbeast custom hat maker. Features · Made of cotton material · Sewn eyelet · Unstructured design · Design Your Own · Flat top structure · Custom embroidered · No minimums', NULL, 29.00, 1, '2025-03-24 12:43:52', '2025-03-24 12:43:52', NULL),
(36, 22, NULL, 'White Bucket Hat | Sportman', 'white-bucket-hat-sportman', 'This white bucket hat gives a retro look and feel that matches almost any outfit. Made of soft Bio-washed chino twill, it’s comfortable and durable. The cotton material is also soft and lightweight. The cap is one size fits all and comes with sewn eyelets that make the hat breathable, and quick-drying. It features a collapsible non-structured material that makes it easy to fold and fit in your bag or pocket. Create your own with the custom hat maker. Features · Sewn eyelet · Bio-washed chino twill · Unstructured design · Custom embroidered · White in color · No minimums', NULL, 28.00, 1, '2025-03-24 12:49:12', '2025-03-24 12:49:12', NULL),
(39, 22, NULL, 'Gray Bucket Hat | Sportman', 'Grey-bucket-hat-sportman', 'The gray Custom Bucket Hat from Sportsman is made from 100% chino twill material. Made to withstand harsh outdoor elements such as sun, rain, and snow. It comes with stitched eyelets that make it breathable. The cap has a fairly deep crown that ensures a perfect fit. Its brim is wide enough to provide cover from the harsh UV rays. It has a toned-down gray color that enables it to match most outfits. The hat is flexible, foldable, and provides a casual, fun, and upbeat mood. With its comfortable and lightweight material, it\'s a must-have accessory in your wardrobe. This custom bucket hat is unisex and has a stylish design. Features · Sewn eyelet · unstructured design · 100% bio-washed chino twill material', NULL, 28.00, 1, '2025-03-24 14:01:48', '2025-03-24 14:01:48', NULL),
(40, 22, NULL, 'Royal Bucket Hat | Sportman', 'royal-bucket-hat-sportman', 'With its wide brim, this Royal bucket hat is the best choice for protecting you from the harsh sun and wind. It’s made of bio-washed chino twill material that makes it durable, fade-resistant, and able to withstand the outdoor environment. The custom bucket features sewn in eyelets that adds to its breathability. With its unstructured design, it can be easily folded for travel. It has a simple but classic look that can be matched with various casual wear and denim. Design your own by uploading your logo or text in our hat maker. Create a one-of-a-kind custom embroidered hat that will be sure to turn heads. Features · Material: bio-washed chino twill material · Sewn eyelet · Lightweight and comfortable · unstructured design', NULL, 28.00, 1, '2025-03-24 14:07:39', '2025-03-24 14:07:39', NULL),
(41, 22, NULL, 'Red Bucket Hat | Sportman', 'red-bucket-hat-sportman', 'With its wide brim, this Royal bucket hat is the best choice for protecting you from the harsh sun and wind. It’s made of bio-washed chino twill material that makes it durable, fade-resistant, and able to withstand the outdoor environment. The custom bucket features sewn in eyelets that adds to its breathability. With its unstructured design, it can be easily folded for travel. It has a simple but classic look that can be matched with various casual wear and denim. Design your own by uploading your logo or text in our hat maker. Create a one-of-a-kind custom embroidered hat that will be sure to turn heads. Features · Material: bio-washed chino twill material · Sewn eyelet · Lightweight and comfortable · unstructured design', NULL, 28.00, 1, '2025-03-24 14:11:06', '2025-03-24 14:11:06', NULL),
(49, NULL, NULL, 'Retro 2 tone trucker hat | Yupoong', 'retro-2-tone-trucker-hat-yupoong', 'Bring the 90s back with this retro 2 tone Yupoong trucker hat. Featuring a classic contrast trucker mesh back and permacurv visor.', NULL, 34.00, 1, '2025-03-24 16:03:17', '2025-03-24 16:03:17', NULL),
(50, 23, NULL, 'Camo 9Fifty snapback | New Era', 'camo-9-Fifty-snapback-new-era', 'The Camo 9Fifty snapback from New Era is a must have streetwear accessory for all ages. It features a structured front panel, offering a high profile frame along with premium stability. To offer a flawless fit, the open back is equipped with a snap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom camo 9Fifty snapback for yourself, with the help of our very own custom hat maker. Use it to add your logo, graphics or text to create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-24 16:07:45', '2025-03-24 16:07:45', NULL),
(51, 23, NULL, 'Neon Snapback | Yupoong', 'neon-snapback- yupoong', 'The Neon snapback hat by Yupoong has a classic 6 panel design that features fan adjustable plastic strap on the back, a flat brim and a full crown profile. The button on the top of the hat is the same color as the hat itself, and so is the stitching. Materials: The Yupoong snapback is made from 80% Acrylic / 20% Wool. It has a bit of a heavier feel to the material, It breathes extremely well and is machine washable. Size & Fit: The Yupoong snapback is fully adjustable up to 24 ¼ inches, which means it fits most head sizes.', NULL, 30.00, 1, '2025-03-24 16:15:45', '2025-03-24 16:15:45', NULL),
(52, 23, NULL, 'Classic trucker hat with white front panel | Yupoong', 'classic-trucker-hat-with-white-front-panel -yupoong', 'The Classic trucker hat from Yupoong features a structured white front panel that is made from a 65/35 Polyester-Cotton blend material. It\'s large crown height (3.5 inches) gives it a large surface area making it a great hat for customization. It has a flat brim that can be manually curved and a snapback enclosure giving it a one size fits all fit. The undervisor of the hat matches the color of the brim.', NULL, 34.00, 1, '2025-03-24 16:26:27', '2025-03-24 16:26:27', NULL),
(53, 23, NULL, 'Melton Wool snapback | Yupoong', 'melton- wool- snapback- yupoong', 'The Melton Wool Snapback from Yupoong features a classic shape, identical to the Classic Snapback we offer. The key difference is the material as this snapback features a fresh and premium melton wool blend. Includes a matching plastic snap and six panel arrangement making it a perfect choice for your next custom hat. Other key features of this hat are the green under brim, white sweatband and the 7 position snap closure. The material composition is 50% wool, 30% acrylic and 20% nylon.', NULL, 34.00, 1, '2025-03-24 16:31:01', '2025-03-24 16:31:01', NULL),
(54, 23, NULL, 'Poplin golf snapback | Yupoong', 'poplin-golf-snapback- yupoong', 'The Yupoong poplin golf snapback sports 4 rows of stitching on the visor and a 60% cotton and 40% polyester blend material. The unique look features a ¼” thick braid on the visor along with a classic five panels. The front panel has no seams, making it a smooth surface for custom embroidery. This tone-on-tone snapback is a CapBeast favorite for it\'s retro styling and customization potential.', NULL, 34.00, 1, '2025-03-24 16:41:26', '2025-03-24 16:41:26', NULL),
(55, 23, NULL, 'Melton Wool snapback | Yupoong', 'melton-wool-snapback-yupoong', 'The Melton Wool Snapback from Yupoong features a classic shape, identical to the Classic Snapback we offer. The key difference is the material as this snapback features a fresh and premium melton wool blend. Includes a matching plastic snap and six panel arrangement making it a perfect choice for your next custom hat. Other key features of this hat are the green under brim, white sweatband and the 7 position snap closure. The material composition is 50% wool, 30% acrylic and 20% nylon.', NULL, 34.00, 1, '2025-03-24 16:47:42', '2025-03-24 16:47:42', NULL),
(56, 23, NULL, '2 tone camo Snapback | Yupoong', '2-tone-camo-Snapback-yupoong', 'The Yupoong 2 tone camo hat offers a classic woodland camo style visor, paired with a monochromatic color scheme for the back. Ideal for style experimentation and featuring a premium wool blend.', NULL, 34.00, 1, '2025-03-24 16:54:09', '2025-03-24 16:54:09', NULL),
(57, 23, NULL, 'Camo snapback | Yupoong', 'camo- snapback- yupoong', 'The Yupoong camo snapback offers the classic snapback style emblazoned with a classic high quality woodland military camo finish.', NULL, 34.00, 1, '2025-03-24 16:58:09', '2025-03-24 16:58:09', NULL),
(58, 23, NULL, 'Charcoal 9Fifty snapback | New Era', 'charcoal -9Fifty- snapback-new era', 'Channel your love for sports with the Charcoal personalized 9Fifty snapback from New Era. As the leading hat maker for sportspersons all across the globe, New Era brings to you a structured, 6-panel design with a flat brim. It is equipped with a convenient strapback enclosure for better adjustability. To maximize comfort, the hat uses 100% cotton twill material. Make use of our custom hat maker to add your logo, text, or graphics.', NULL, 31.00, 1, '2025-03-24 17:01:54', '2025-03-24 17:01:54', NULL),
(59, 23, NULL, 'Navy 9Fifty snapback | New Era', 'navy- 9Fifty -snapback-new-era', 'The Navy 9Fifty snapback from New Era is a street style essential for all ages. It features a structured front panel, offering a crisp shape and optimum stability. To offer a flawless fit, the open back is equipped with a strap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom 9Fifty snapback for yourself, with the help of your very own customized hat maker CapBeast. Here you can add graphics, a logo, or a design of your choice, and create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-24 17:05:43', '2025-03-24 17:05:43', NULL),
(60, 23, NULL, 'Gray 9Fifty snapback | New Era', 'gray- 9Fifty- snapback-new- era', 'New Era is regarded as one of the most prominent hat makers of the world, as their hats have been worn by numerous global sports icons. The grey custom 9Fifty snapback features a 6-panel design and a structured crown, giving the hat a neat shape. The open back of the custom cap comes with an adjustable strapback enclosure, to offer hassle-free fitting. The 100% cotton twill material ensures year-round comfort, and the minimalist design of the hat makes it a true classic. The steps for creating a personalized cap are pretty simple. Select a logo, graphics, and text that you want the hat to feature, add them to our cap maker.', NULL, 31.00, 1, '2025-03-24 17:09:31', '2025-03-24 17:09:31', NULL),
(61, 23, NULL, 'Camo & Black Trucker hat | New Era', 'camo & black- trucker- hat -new -era', 'The New Era Camo Trucker Hat ensures a perfect fit, thanks to the adjustable snapback closure. It comes with a cotton twill front panel and a polyester mesh mid and back panels, making way for convenient air circulation. The 5-panel design of the New Era trucker hat is complemented by its superior built and durability. With the help of CapBeast, now it\'s possible for you to possess a custom trucker hat that actually has your own logo on it. Choose a logo for yourself, add it to our interface, and watch how we embroider the same onto the cap. The custom New Era Hat awaits you, hurry up.', NULL, 36.40, 1, '2025-03-24 17:15:21', '2025-03-24 17:15:21', NULL),
(62, 23, NULL, 'Scarlet & Black Trucker hat | New Era', 'scarlet & black- trucker- hat-new- era', 'The classic combination of your favorite colors finds its way in this Black & Red Trucker Hat from New Era. Equipped with a snapback enclosure, the hat ensures an easy and comfortable fit. The mesh panels make room for better air circulation, making this New Era Hat an ideal choice for summers. Featuring a 5-panel design, this versatile cap can be worn by everyone, irrespective of their age or gender. If you want to add a personalized element to your cap, CapBeast gives you the option to create your custom trucker hat. For that, you have to give us the details of your choice of logo, and we would create embroidery on top of your cap. Place an order with CapBeast, and make the custom New era hat your own.', NULL, 36.40, 1, '2025-03-24 17:20:01', '2025-03-24 17:20:01', NULL),
(63, 23, NULL, 'Chocolate & Khakhi Trucker hat | New Era', 'chocolate & khakhi -trucker- hat-new- era', 'The smart and versatile Chocolate and Khaki Trucker Hat from New Era is a summer accessory that takes care of your comfort. Featuring 100% polyester mesh mid and back panels, and a front panel made out of cotton twill, this cap leaves ample room for air circulation. This 5-panel New Era Hat comes with a snapback closure, allowing ease of use. Thanks to CapBeast, now you can create a custom New Era hat for yourself that bears a logo and graphics of your choice. Add them to our interface, and our experts will get them embroidered on top of your cap. So place an order, and gear up to sport your custom trucker hat.', NULL, 36.40, 1, '2025-03-24 18:53:17', '2025-03-24 18:53:17', NULL),
(64, 23, NULL, 'Deep navy & White Trucker hat | New Era', 'deep- navy & white- trucker- hat-new- era', 'Featuring the all-time favorite color combination, the Navy and White Trucker Hat from New Era is an essential summer accessory. It features an adjustable snapback enclosure for better fitting. The polyester mesh mid and back panels are there to allow free flow of air so that your comfort doesn\'t have to be compromised. The simple and versatile 5-panel design of this New Era Trucker Hat has turned it into a timeless piece that never loses its utility. Now with CapBeast by your side, you can create a custom trucker hat that carries your personalized logo or text. Simply add your graphic or text to our interface, and our experts will have them embroidered on the caps to give them a unique look. So create your custom New Era Hat today.', NULL, 36.40, 1, '2025-03-24 18:58:32', '2025-03-24 18:58:32', NULL),
(65, 23, NULL, 'Graphite & Black Trucker hat | New Era', 'graphite & black-trucker-hat-new-era', 'Want to sport a custom trucker hat this summer? Take a look at the Graphite and Black Trucker Hat from New Era– it is versatile, comfortable, and can be customized as per your request. This New Era hat comes with an adjustable snapback closure so that it can fit well on your head. The front panel is made of 100% cotton twill while the mid and back panels are made of a polyester mesh, and allow better airflow. Available in a classic color combination, this 5-panel hat is a simple yet useful accessory, suitable for people of all ages. Now if you want to create your own custom New Era hat, all you have to do is upload a logo on our interface. CapBeast would turn it into embroidery, and present you with your custom trucker hat bearing your personalized logo.', NULL, 36.40, 1, '2025-03-24 19:41:43', '2025-03-24 19:41:43', NULL),
(66, 23, NULL, 'Kelly green & White Trucker hat | New Era', 'kelly- green & White- trucker- hat-new- era', 'The Kelly Green and White New Era Hat features a front panel made of pure cotton twill and a mid and back panel made of 100% polyester mesh for better air circulation. As you put on this cap, you can expect optimum comfort and a perfect fit, owing to the adjustable snapback closure. Designed with 5 panels, this New Era Trucker Hat is an essential accessory that not only keeps your hair and eyes protected but also leaves room for personalization. With CapBeast, now you can create a custom trucker hat, embellished with an embroidered logo of your choice. Upload your text and graphics to our interface, and together let\'s make a custom New Era hat for you.', NULL, 36.40, 1, '2025-03-24 19:54:24', '2025-03-24 19:54:24', NULL),
(67, 23, NULL, 'Royal & White Trucker hat | New Era', 'royal & white -trucker- hat-new- era', 'Crafted with 100% cotton twill, this New Era Trucker Hat is a comfortable accessory for all seasons. The middle and back panels feature a premium polyester mesh design, making them stand out from any other regular caps. This 5-panel New Era hat is equipped with an adjustable snapback closure, ensuring proper fitting for everyone. This one is available in a classic royal and white color. If you\'re looking for personalization, you can create a custom New Era hat by adding your logo, text, or graphics into our design interface, and we would get them embroidered on the hat. Your custom trucker hat is just a few steps away, so order yours today.', NULL, 36.40, 1, '2025-03-24 20:05:21', '2025-03-24 20:05:21', NULL),
(68, 23, NULL, 'Black Trucker hat | \'47 Brand', 'black -trucker -hat -47 brand', 'The \'47 Brand\'s Black Trucker Hat is the epitome of sophistication. It\'s simple, stylish, and ensures that your comfort doesn\'t have to be compromised. The 100% washed-cotton renders a soft touch to this cap, and the strapback design leads way to a good fit. The relaxed and curved bill design makes this cap a favorite for every season. If you want to personalize this cap to sport a unique look, CapBeast is here to help. Let us know the text and logo that you’d like to add to it, and we will embroider it for you. With a 100% guarantee of premium quality, your custom 47 brand trucker hat is just a few clicks away.', NULL, 34.00, 1, '2025-03-24 20:12:23', '2025-03-24 20:12:23', NULL),
(69, 23, NULL, 'Navy Trucker hat | \'47 Brand', 'navy- trucker- hat -47- brand', 'A cool cap not only breathes life into your daily look, but it\'s also a great accessory to keep you guarded against extreme weather. The Navy Trucker Hat from the \'47 Brand is an ideal choice for anyone looking for a sleek looking cap. Thanks to the high-quality washed-cotton material, the cap is soft to touch. Because of the strapback design and relaxed build, this one offers a perfect fit. To help you create a custom trucker hat, CapBeast offers personalization on all 4 sides of this cap. Add a logo and the text that you prefer, and we will get it embroidered on the cap, with premium quality assured. Place an order and get your personalized custom trucker hat today.', NULL, 34.00, 1, '2025-03-24 20:17:33', '2025-03-24 20:17:33', NULL),
(70, 23, NULL, 'Red Trucker hat | \'47 Brand', 'red- trucker- hat -47 -brand', 'Get yourself a custom trucker hat, and you\'re sorted for all seasons– be it winter or fall. Thanks to CapBeast, you can add a personalized text and logo to your Red Trucker Hat. This cap is crafted from pure washed cotton, making it soft and comfortable for everyday wear. With a strapback design and a relaxed fit, this cap is a must-have for every hat lover out there. Insert text and graphics on the interface, and get a customized logo embroidered on the cap. It\'s that easy to own a cap of your own brand.', NULL, 34.00, 1, '2025-03-24 20:21:46', '2025-03-24 20:21:46', NULL),
(71, 23, NULL, 'Green & Tan 112 Trucker hat | Richardson', 'green & tan -112 -trucker -hat-richardson', 'Available in a cool combination of olive green and tan, this custom Richardson 112 trucker hat is a versatile accessory for all occasions– whether it\'s a regular workday or you\'re headed to a sports match. This structured, mid-profile hat features a 5-panel design. The backside of the cap is made of 100% polyester mesh for adding a stylish touch. Now, if you\'re interested in owning custom Richardson 112 hats, CapBeast is here for you. Add your text, graphics, or logo to our hat maker and we will have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-24 20:29:53', '2025-03-24 20:29:53', NULL),
(72, 23, NULL, 'Black & white 112 Trucker hat | Richardson', 'black & white- 112- trucker- hat-richardson', 'Available in the unbeatable combination of black and white, this Richardson 112 trucker hat takes comfort and versatility to the next level. As the maker of premium hats for over five decades, Richardson promises great quality and a superior fit. Made of a 60/40 blend of cotton and polyester, this hat features a 100% polyester mesh back. This mid-profile Richardson hat comes with a 5-panel structured design and an adjustable snapback for comfortable fitting. If you want to own custom Richardson 112 hats with your personal logo and texts embossed on top, CapBeast can help you out. Insert your choice of graphics into our design interface, and we would have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-24 20:34:36', '2025-03-24 20:34:36', NULL),
(73, 23, NULL, 'Charcoal & White 112 Trucker hat | Richardson', 'charcoal & white -112- trucker- hat- richardson', 'The Charcoal and White Richardson 112 Trucker hat is a must-have in your cap collection. Featuring a mesh back design, this 5-panel mid-profile hat is all about versatility. Made of cotton and polyester, this Richardson hat offers comfort throughout all seasons. Thanks to the adjustable snapback design, you can expect a perfect fitting every time. If you\'re interested in custom Richardson 112 hats, CapBeast is here to create one for you. Insert a logo, text, and graphics into our design interface, and we would embroider them on your Richardson hat. Customize with CapBeast, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-24 20:41:00', '2025-03-24 20:41:00', NULL),
(74, 23, NULL, 'Heather gray & Amber 112 Trucker hat | Richardson', 'heather -gray & amber -112 -trucker -hat-richardson', 'The unique combination of heather gray and gold renders a timeless touch to this Richardson trucker hat. Featuring a 5-panel structured design, this mid-profile Richardson hat is not only comfortable but also versatile. Made of cotton and polyester with a mesh design at the back, it keeps you comfortable throughout all seasons. It comes with a plastic snapback that can be adjusted at your convenience to achieve the perfect fitting. Owning custom Richardson hats has never been easier. With CapBeast, all you have to do is insert your choice of text, graphics, and logo into our hat maker and we will do the rest.', NULL, 34.00, 1, '2025-03-24 20:49:02', '2025-03-24 20:49:02', NULL),
(75, 23, NULL, 'Heather gray & Black 112 Trucker hat | Richardson', 'heather -gray & black -112 -trucker -hat -richardson', 'The Heather Gray & Black Richardson 112 trucker hat features a 5-panel structured design and comes with a comfortable plastic snapback for a perfect fit. The cotton and polyester blend makes it a suitable accessory for all seasons, with the backside made of pure polyester mesh. Thanks to the simple yet versatile design of this Richardson hat, they can be worn by people of all ages. Now personalizing your hat is easier than ever. With CapBeast, you can create a custom trucker hat that carries your logo, text, and graphics.', NULL, 34.00, 1, '2025-03-24 20:55:10', '2025-03-24 20:55:10', NULL),
(76, 23, NULL, 'Ombre blue & Navy 112 Trucker hat | Richardson', 'ombre -blue & Navy -112 -trucker-hat-richardson', 'The Blue & Navy Richardson 112 Trucker is versatile headwear you can rely on for all seasons and all occasions. Made of a cotton and polyester blend, this Richardson hat features a mesh design at the back. The structured design of this 5-panel hat gives it a clean and polished look. Thanks to the adjustable plastic snapback, it fits your head comfortably. Personalize your using our online hat maker.', NULL, 34.00, 1, '2025-03-24 21:14:21', '2025-03-24 21:14:21', NULL),
(77, 23, NULL, 'Black Seven panel trucker hat | Richardson', 'black-seven-panel-trucker-hat-richardson', 'The classic Black Richardson Seven panel trucker hat is made of cotton, nylon, and polyester, with the backside featuring a mesh design made of pure polyester. This high-profile, structured Richardson hat has been designed for everyday use, ensuring utmost comfort every time you put this on. This convenient headwear features a snapback design, ensuring a seamless fit. Want to sport custom Richardson hats? CapBeast is here to help. Input your choice of text, logo, graphics, etc. to our user interface, and allow us to embroider them into your hat. With us, you are just a few clicks away from owning a custom trucker hat. Place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-24 21:19:05', '2025-03-24 21:19:05', NULL),
(78, 23, NULL, 'Brown & khakhi Seven panel trucker hat | Richardson', 'brown & khakhi -seven -panel -trucker -hat -richardson', 'The beautiful combination of brown and khaki renders a unique appeal to the Richardson seven-panel trucker hat. Featuring a structured design and a flat bill, this hat comes with a polyester mesh back. The front section of the cap is made out of a blend of cotton, nylon, and polyester. This Richardson hat has a strapback enclosure for better fitting. CapBeast is here to help you create custom Richardson hats. Tell us in detail about the logo and the text you want to add to your hat, and well will get them embroidered on the cap. Your custom trucker hat is waiting for you– place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-25 11:13:38', '2025-03-25 11:13:38', NULL),
(80, 23, NULL, 'Charcoal & black Seven panel trucker hat | Richardson', 'charcoal & black -seven -panel -trucker -hat -richardson', 'Available in a combination of charcoal and black, the Richardson seven-panel trucker hat is a classic choice. Made of cotton, nylon, and polyester, this structured, high-profile Richardson hat is extremely comfortable. The adjustable snapback enclosure ensures perfect fitting for everyone. If you want to break the monotony of this simple hat, CapBeast has a great solution for you. Use the empty canvas on the hat for personalization. Add your choice of logo, text, or graphics, and make this custom trucker hat truly yours. With us, making custom Richardson hats is easier than you could ever imagine. So place an order, today.', NULL, 34.00, 1, '2025-03-25 11:54:43', '2025-03-25 11:54:43', NULL),
(82, 23, NULL, 'Heather gray & Black Seven panel trucker hat | Richardson', 'heather gray & black -seven -panel -trucker- hat -richardson', 'The Heather Gray and Black Richardson seven-panel trucker hat is a classic accessory for all seasons. A favorite choice for people of all generations, this Richardson hat is made of cotton, nylon, and polyester blend, with the backside featuring a polyester mesh design. This structured, high-profile cap features a flat bill and a snapback enclosure for optimum convenience. To add your own creativity into these hats, you can take help from CapBeast. Use our design interface to input your logo, text, and graphics. Our team of designers will get them embroidered on your custom Richardson hat, with premium quality guaranteed. So place an order with CapBeast today, can get your own custom trucker hat.', NULL, 34.00, 1, '2025-03-25 12:00:26', '2025-03-25 12:00:26', NULL),
(83, 23, NULL, 'Red & Black Seven panel trucker hat | Richardson', 'red & black -seven- panel -trucker- hat -richardson', 'Available in the timeless combination of red and black, the Richardson seven-panel trucker hat is here to redefine comfort and versatility. Featuring a high-profile, structured design, this Richardson hat comes with a mesh design at the back. The front section is made of a high-quality blend to ensure breathability. The snapback enclosure ensures that it fits everyone with ease. At CapBeast, we are dedicated to creating beautifully embroidered custom trucker hats for you. All you need to do is tell us about your choice of logo/text/graphics, and wait for us to emulate them through embroidery. Creating custom Richardson hats is now easier than ever, thanks to CapBeast. So place an order with us, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-25 12:04:27', '2025-03-25 12:04:27', NULL),
(84, 23, NULL, 'Royal & Black Seven panel trucker hat | Richardson', 'royal & black -seven -panel -trucker -hat -richardson', 'The Royal & Black seven-panel trucker hat is a classic choice for all generations. The front section of the Richardson hat is made of a blend of cotton, nylon, and polyester, and the back section comes with a polyester mesh design. This high-profile, seven-panel structured hat features a flat bill, along with a convenient snapback closure for better adjustability. With CapBeast by your side, now you can create custom Richardson hats, with your own logo embossed on them. Insert a text, graphics, or logo into our design interface, and we will embroider the same on your custom trucker hat. So place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-25 12:07:49', '2025-03-25 12:07:49', NULL),
(85, 23, NULL, 'Black Low profile trucker hat | Richardson', 'black -low -profile -trucker- hat- richardson', 'Colors come and go, but the appeal of a black hat can never be diminished. The black Richardson low-profile trucker hat features a structured, six-panel design, along with a pre-curved visor. Made of a cotton-polyester blend, the back portion of the Richardson hat comes with a mesh design. It has a convenient snapback closure, making way for a perfect fit. With CapBeast, you can create a custom Richardson hat with just a few clicks. We will get your logo, graphics, and text embroidered on a cap of your choice, with premium quality guaranteed. So order your custom trucker hat, today.', NULL, 33.00, 1, '2025-03-25 12:10:58', '2025-03-25 12:10:58', NULL),
(86, 23, NULL, 'Black/Charcoal Low profile trucker hat | Richardson', 'black-charcoal -low -profile -trucker -hat -richardson', 'The Black/Charcoal Richardson low-profile trucker hats are here to offer you comfort and style at one go. Featuring a six-panel design, this structured hat comes with a mesh back design. Made with cotton and polyester blend, the cap is breathable enough to be used in all seasons. The snapback enclosure is another convenient addition, allowing a perfect fit for everyone. Now, in case you\'re interested in creating a custom Richardson hat for yourself, CapBeast is here for you. You have to follow a few simple steps to get your hands on a custom trucker hat. First, insert the logo, text, or graphics of your choice into our user interface. Then, place your order. Our team will replicate the text or logo through embroidery, and add a personalized touch to your Richardson hat.', NULL, 33.00, 1, '2025-03-25 12:16:08', '2025-03-25 12:16:08', NULL),
(87, 23, NULL, 'Black/Neon pink Low profile trucker hat | Richardson', 'black-neon- pink- low -profile- trucker -hat-richardson', 'Made of a superior cotton-polyester blend, the Black/Neon Pink Richardson low profile hat is all about comfort and versatile style. This vibrant-colored hat features a pre-curved visor, along with a snapback closure for ease of fitting. This structured, six-panel Richardson hat comes with a 100% mesh design at the back, making it stand out from any other hats you might own. Now you can design a custom Richardson hat just by following a few simple steps. Choose a logo, text, and graphics that you love, and add them to our user interface. As soon as you place an order, our team will get your logo and graphics embroidered on the cap. So place an order for a custom trucker hat, today.', NULL, 33.00, 1, '2025-03-25 12:19:34', '2025-03-25 12:19:34', NULL),
(89, 23, NULL, 'Blue teal/Birch/Navy Low profile trucker hat | Richardson', 'blue teal-birch-navy- low -profile- trucker- hat-richardson', 'Available in the Blue teal/Birch/Navy variant, this Richardson low profile trucker hat is a must-have in your headwear collection. Made of a premium blend of cotton and polyester, this hat is a comfortable choice for all seasons. It comes with a polyester mesh back, along with a snapback closure for easy fitting. This six-panel, structured Richardson hat features a pre-curved visor. If you\'re interested in creating custom Richardson hats, CapBeast is your best guide. Tell us more about your choice of logo, text, and graphics, and we would get them embroidered on top of your custom trucker hat. So place an order with us, today.', NULL, 33.00, 1, '2025-03-25 12:24:03', '2025-03-25 12:24:03', NULL),
(90, 23, NULL, 'Brown/Khakhi Low profile trucker hat | Richardson', 'brown-khakhi -low- profile- trucker- hat-richardson', 'Your everyday hat should be comfortable, reliable, and willing to go the long distance with you. The Richardson low profile trucker hat gets the job done without drawing too much attention. Made from a cotton and polyester blend, the Richardson hat features brown/khaki color combination - perfect for the long days under the sun. It\'s not just the color or the six-panel structured fit that makes it a fan favorite, the 100% polyester mesh back makes sure you stay nice and cool for a prolonged period of time. After all, the comfort brings customers back to the Richardson trucker hat every time. If you\'re still on the fence about it, know that you can truly make the custom trucker hat your own. Just let us know your preferred logo or text and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-25 12:27:48', '2025-03-25 12:27:48', NULL),
(91, 23, NULL, 'Chocolate chip/gray Low profile trucker hat | Richardson', 'chocolate- chip-gray- low- profile -trucker- hat-richardson', 'The Richardson low profile trucker hat in chocolate chip/grey hue is ideal for people who love the outdoors. It has a structured finish that holds its shape even after long hours of wearing it. Thanks to the blend of cotton and polyester, the Richardson hat provides a comfortable experience. It fits in your head perfectly and the six-panel structure ensures you move in style. The polyester mesh back has been added to make sure sweat doesn\'t get the better of you. With the pre-curved visor, you\'re always protected from light glare and sun rays. You can not only get the comfort of Richardson hats, but also the uniqueness of custom trucker hats. We offer custom Richardson hats. All you have to do is send us your texts and patterns and see how we customize the hat for you. Place your order today.', NULL, 33.00, 1, '2025-03-25 12:32:21', '2025-03-25 12:32:21', NULL),
(92, 23, NULL, 'Coffee/Claret Low profile trucker hat | Richardson', 'coffee-claret- low -profile- trucker- hat-richardson', 'The Richardson hat is the perfect blend of utility and comfort. Made from cotton and polyester, the hat has been designed to give you a superior feel. The structured, six-panel design of the Richardson low profile trucker hat holds its shape even after hours of rough usage. The combination of coffee and claret shades work like charm and is sure to draw some attention. The cap is both versatile and durable. Worried about excessive sweating? The polyester mesh back takes care of the heat without breaking a sweat. The custom Richardson hats come with unlimited possibilities of customization. Just tell us what you want to carry on your hat and we\'ll happily embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-25 12:37:12', '2025-03-25 12:37:12', NULL),
(93, 24, 30, 'Beanie hat | New Era', 'beanie-hat-new-era', 'A crazy cool and ultimately laid-back style, this is the epitome of all the good things in a well-made toque. The top starts out at a fine 1x1 knit rib then gradually increases towards the bottom to a 3x3 rib knit, adding just a subtle style point.', NULL, 31.00, 1, '2025-03-25 12:40:05', '2025-03-25 12:40:05', NULL),
(95, 23, NULL, 'Dark Loden/Jaffa Low profile trucker hat | Richardson', 'dark -loden-Jaffa -low -profile -trucker -hat-richardson', 'There\'s nothing like a good ol\' trucker hat that gets the job done without appearing too flashy. The Richardson hat in Dark Loden/Jaffa Orange color embodies the rustic nature. The Richardson low profile trucker hat is all about durability, comfort, and ease of use. You get a blend of cotton and polyester for a superior feeling and a structured, six-panel design for an easy fit. The pre-curved visor takes care of the sun for you while the polyester mesh back makes sure you stay nice and cool. The Richardson trucker hat is a utility product all right but you can still customize it to fit into your personality. You can let us know the texts or logos you want to flaunt on your hat and CapBeast will embroider it on your custom trucker hat. Place your order today.', NULL, 33.00, 1, '2025-03-25 12:46:49', '2025-03-25 12:46:49', NULL),
(96, 24, 30, 'Pom Pom beanie | New Era', 'pom -pom-beanie-new-era', 'Snow bunnies unite! Hit the hills for an all-day snow excursion and stay warm and cozy in this Pom Pom toque. The 1x1 ribbing is double-layered and made of 100% acrylic to keep the cold winter chills out.', NULL, 31.00, 1, '2025-03-25 12:52:58', '2025-03-25 12:52:58', NULL),
(97, 23, NULL, 'Heather gray/Birch Low profile trucker hat | Richardson', 'heather -gray-birch- low -profile -trucker- hat -richardson', 'A light-colored trucker hat with earthy shades should always be in your wardrobe. The Richardson hat is the ideal trucker hat if you\'re looking for a mix of style and durability. The Richardson low profile trucker hat is made of cotton and polyester - you get the softness of cotton and the fit of polyester. The heather grey/birch trucker hat also comes with a lighter mesh back made of polyester. It ensures you can go on with your day without worrying about excessive heat or sweat. The strapback closure bolsters the durability of the cap. You can get your Richardson hat customized to your liking. Just mention your preferred style or text and we\'ll embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-25 12:56:01', '2025-03-25 12:56:01', NULL),
(98, 23, NULL, 'Heather gray/Dark charcoal Low profile trucker hat | Richardson', 'Heather- gray-Dark- charcoal- low- profile- trucker- hat-richardson', 'There\'s nothing like an understated trucker hat that you can wear day in day out. The Richardson hat should be the trucker hat of your choice if you value usability and comfort. The Richardson low profile trucker hat comes in a mix of heather grey and dark charcoal colors. The shades add an earthy touch to the hat while the blend of cotton and polyester takes care of the comfort. The hat also comes with a 100% polyester mesh back to make sure you stay cool and comfortable. The custom trucker hat gives you the freedom to make it uniquely yours. Tell us your favorite pattern or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-25 13:00:00', '2025-03-25 13:00:00', NULL),
(99, 23, NULL, 'Heather Royal/Silver Low profile trucker hat | Richardson', 'heather- royal-silver- low -profile- trucker- hat-richardson', 'Having an everyday trucker hat that you can wear anywhere and for as long as you like is an absolute must. The Richardson hat in heather royal blue and silver is the perfect accessory to head out for the day. The Richardson low profile trucker hat is made of cotton and polyester. You also get a mesh back made from 100% polyester. Thanks to the structured, six-panel design, wearing the hat for a long time won\'t be an issue. The Richardson hat serves its purpose but you can customize it further to make it your own. Let us know your favorite quotes or patterns and we\'ll gladly embroider them on your custom trucker hat. Place your order now.', NULL, 33.00, 1, '2025-03-25 13:03:48', '2025-03-25 13:03:48', NULL),
(100, 23, NULL, 'Hot pink/Black Low profile trucker hat | Richardson', 'hot- pink-black- low -profile- trucker- hat-richardson', 'Trucker hats should be about you and your personality. They should feel comfortable, and they should last long. The Richardson hat fits the bill perfectly and the hot pink and black shades come together to show your style. The Richardson low profile trucker hat is made from cotton and polyester for the utmost comfort. The 100% polyester mesh back offers proper circulation of heat and discourages sweat formation. It feels good on your head and fits even better. Features like structured, six-panel design and strapback closure make sure the hat stays on you even during hectic hours. We offer custom Richardson hats to our buyers. Just tell us your preferred logo or pattern and we\'ll have them embroidered on your custom trucker hat.', NULL, 33.00, 1, '2025-03-25 13:06:53', '2025-03-25 13:06:53', NULL),
(101, 23, NULL, 'Loden Low profile trucker hat | Richardson', 'loden- low- profile- trucker- hat-richardson', 'Get an everyday essential in the color of the season. The Richardson hat in loden shade is the trucker hat to flaunt today. The Richardson low profile trucker hat is made of cotton and polyester. It feels good on your head and thanks to the mesh back, it keeps heat and sweat away. The structured hat keeps its shape for a long time and the strapback closure ensures a perfect fit. When it\'s too bright to go out, just wear this trucker hat and the pre-curved visor will protect you. Now get your hat customized at CapBeast. Just tell us what you want to flaunt on your hat and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-25 13:10:21', '2025-03-25 13:10:21', NULL),
(102, 23, NULL, 'Smoke blue/Aluminum Low profile trucker hat | Richardson', 'smoke- blue-aluminum -low- profile- trucker- hat- richardson', 'Richardson Smoke Blue/Aluminum Low Profile Trucker Hat – a stylish and comfortable cap with a breathable mesh back, structured low-profile fit, and adjustable snapback closure. Perfect for casual wear and outdoor adventures!', NULL, 33.00, 1, '2025-03-25 13:17:08', '2025-03-25 13:17:08', NULL),
(104, 23, NULL, 'White 9Fifty snapback | New Era', 'white- 9Fifty -snapback-new- era', 'Step out in style with the New Era custom 9Fifty snapback. It features the iconic sports and street style look of the classic New Era hats, but the only exception is the open back. This white 6-panel hat comes with an adjustable snapback closure, ensuring a comfortable fit. Made with 100% cotton twill, this hat keeps you company throughout all seasons. The sharp design of the hat makes you stand out from the crowd. Now you can take your love for sports culture to the next level, and design a hat. Add your logo, text, and graphics using our hat maker.', NULL, 31.00, 1, '2025-03-25 13:20:24', '2025-03-25 13:20:24', NULL),
(105, 23, NULL, 'Black 9Fifty snapback | New Era', 'black- 9Fifty- snapback- new- era', 'The New Era Black Custom 9Fifty snapback features a 6-panel design, with a structured appearance that gives the cap a flawless shape. It comes with an open backside, with an adjustable snapback closure for precise fitting. This iconic hat is a street style essential, no matter which generation you belong to. The material is 100% premium cotton twill, ensuring equal comfort in every season. Thanks to the evergreen black color, this hat will forever retain its versatile appeal. And if you want to sport a personalized New Era, use the CapBeast hat maker to help you design a hat.', NULL, 31.00, 1, '2025-03-25 13:23:58', '2025-03-25 13:23:58', NULL),
(106, 24, 20, 'Beanie hat | Carhartt', 'beanie-hat-carhartt', 'This classic Carhartt Beanie is a must have accessory. Carefully crafted from a high quality rib knit fabric, this beanie can now be customized with your logo or text. This beanie features the iconic Carhartt logo on the front, whit plenty of space on the sides and back for you to get creative with your design. Make your own unique custom Carhartt beanie at CapBeast.', NULL, 41.00, 1, '2025-03-25 13:24:00', '2025-03-25 13:24:00', NULL);
INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(107, 24, 20, 'Knit Cuffed Beanie| Carhartt', 'knit-cuffed-beanie-carhartt', 'The Carhartt knit cuffed beanie is made from pure acrylic rib-knit material, it is a premium accessory that will bring your fashion game to another level, and it takes care of your comfort at the same time. Available in classic black & gray colors, you can style this beanie with an array of clothes, and wear it however you want. This one element is all you need to switch from a monotonous casual look to a fresh and polished street-ready style. Thanks to the stretchable fabric of the beanie, you experience supreme comfort as the high-quality material keeps your head wrapped in warmth. It carries the sewn Carhartt label on the front, with a cuffed design to keep you comfy. Create your custom Carhartt Beanie at CapBeast today, and rock an effortlessly fashionable look.', NULL, 42.00, 1, '2025-03-25 13:28:04', '2025-03-25 13:28:04', NULL),
(108, 23, NULL, 'Multi Cam Classic Snapback | Yupoong', 'multi- cam- classic- snapback-yupoong', 'This custom baseball hat is made for the outdoor enthusiast who loves a minimalistic and subtle design. Made of cotton and spandex material, it\'s comfortable and has moisture-wicking properties. The hat features a snapback closure that makes it one size fits all. It has a high profile which makes it perfect for customization and the snapback closure makes it one size fits all. The hat has a flat brim that makes it trendy and stylish. It has a green under-visor that offers excellent protection from the sun\'s rays. At the back is a mesh material that ensures breathability. It has a sewn eyelet that helps to keep you cool in the summer heat. This customized hat is a must-have accessory for those who love the outdoors on hot days. You can create a custom baseball hat by adding your favorite logo or print on the front panel. You can do that using our CapBeast hat maker tool. Features • Made of 98% cotton and 2% spandex • High profile hat • Flat visor with green undervisor • Sewn eyelet', NULL, 27.00, 1, '2025-03-25 13:30:02', '2025-03-25 13:30:02', NULL),
(109, 24, 29, 'Slouchy Beanie | CapBeast', 'slouchy-beanie-capbeast', 'Perfectly lightweight and slouchy, this toque is the perfect topper for those slightly chilly days. This hat is also versatile and can be worn relaxed or folded up to create a wide hem. Add embroidery to match your personal style or keep it simple. Toque is made of marl rib knit.', NULL, 34.00, 1, '2025-03-25 13:38:04', '2025-03-25 13:38:04', NULL),
(111, 23, NULL, 'Black Flat bill cotton snapback | Yupoong', 'black- flat- bill -cotton- snapback-yupoong', 'This Black Flatbill cotton snapback is a sleek custom hat that is a must have for your wardrobe. It’s made of 100% cotton material, making it comfortable, sturdy, and durable. With a structured five-panel design, This snapback has a high-profile design that makes it suitable for pairing with most casual wear. It features a flat brim and a green under visor. The cap has sewn eyelets that keep your head cool in the summer heat. The snapback is one size fits all and can easily be adjusted the size of the cap as it comes with a custom snapback closure at the back. Design a hat using our hatmaker tool. Simply upload your text or logo and let the Capbeast tool do the rest. Features · Five-panel unstructured design · High profile · Snapback closure · Sewn eyelets · Flat bill · Custom Embroidered · No minimums', NULL, 29.00, 1, '2025-03-25 13:45:40', '2025-03-25 13:45:40', NULL),
(112, 24, 29, 'Camo Beanie toque - 12\" | CapBeast', 'camo-beanie-toque-12\"-capbeast', 'You know the type of person you are: always outdoors, always doing something, being active, barely resting. You’ve got a lot to do and the last thing you need to worry about is if what you wear to keep warm is fashionable enough or on-trend. You need a durable and reliable knit, and this is the one. The 12” knit and fold-over hem is good for versatility and warmth.', NULL, 34.00, 1, '2025-03-25 13:45:47', '2025-03-25 13:45:47', NULL),
(113, 23, NULL, 'Cyan/Black Low profile trucker hat | Richardson', 'cyan-black- low- profile- trucker- hat-richardson', 'If you\'re searching for a light and durable trucker hat, the Richardson hat might be the one you\'re looking for. The Richardson low profile trucker hat is made of a combination of cotton and polyester that offers both comfort and flexibility. The Richardson hat comes with a striking blend of cyan and black shades that are bold celebrations of your personality. It\'s not just the looks, the hat lives up to everything a classic trucker hat stands for. The 100% polyester mesh back quickly dissipates heat, discouraging sweat formation and keeping you cool. The snapback closure rounds off the safety features. You can make the trucker hat truly your own. Tell us your favorite logo, design, or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-25 13:49:01', '2025-03-25 13:49:01', NULL),
(114, 24, 29, 'Camo Beanie - 8\" | CapBeast', 'camo-beanie - 8\"-capbeast', 'Grab your gear and head out to the woods with this perfect camo beanie tuque. This cotton/polyester blend knit with 8” of headroom is a great no-hassle accessory when you’re out there doing your thing in the great outdoors. Even if you’re not battling the elements, this tuque serves as a great every day winter hat as well.', NULL, 34.00, 1, '2025-03-25 13:57:19', '2025-03-25 13:57:19', NULL),
(115, 23, NULL, 'Dark Gray Flat bill cotton snapback | Yupoong', 'dark-gray- flat -bill- cotton- snapback-yupoong', 'Made from 100% cotton twill material, this Dark Gray Flatbill cotton snapback is sturdily-made, comfortable, and durable. It has a flat brim and a green under-visor. There are sewn eyelets that help to keep you cool. At the back of the hat is a snapback closure that enables you to adjust the size of the hat for an exact fit. If you are searching for a timeless and trendy fashion accessory, this Yupoong hat is a must-have. You can pair it with all casual wear or dress it up. Desig your own hat using the Capbeast hat maker. Upload your logo or add text to create a unique personalized Yupoong hat. Features · Made of 100% cotton twill material · Sewn eyelets · Five-panel construction · Snapback closure · Design your own · Machine washable', NULL, 29.00, 1, '2025-03-25 14:00:31', '2025-03-25 14:00:31', NULL),
(116, 24, 20, 'Knit beanie black | Carhartt', 'knit-beanie-black-carhartt', 'A killer blend of functionality and style, the Carhartt Knit Beanie is a game-changing accessory for your wardrobe. Crafted from a rib-knit fabric to keep you warm, this beanie can be customized with embroidery. Designed in the traditional style, this one also oozes a contemporary vibe making it all the more alluring. At CapBeast, you can personalize your beanie with your own logo or text to make it one-of-a-kind. Boasting the Carhartt logo sewn at the front, this custom embroidered beanie not only elevates your style quotient but also keeps the cold at bay. Ideal for a street-style look on a wintery day, this black beanie is a versatile piece that can add an edge to every outfit. So get hold of your custom Carhartt beanie today, and exude an effortlessly cool winter fashion look!', NULL, 41.00, 1, '2025-03-25 14:01:30', '2025-03-25 14:01:30', NULL),
(117, 23, NULL, 'Navy Flat bill cotton snapback | Yupoong', 'navy- flat- bill- cotton- snapback-yupoong', 'Yupoong Navy Flat Bill Cotton Snapback – a sleek and durable cap with a structured fit, flat visor, and adjustable snapback closure. Made from high-quality cotton for all-day comfort and style!', NULL, 29.00, 1, '2025-03-25 14:04:01', '2025-03-25 14:04:01', NULL),
(118, 24, 20, 'Knit Beanie Gray | Carhartt', 'knit-beanie-gray-carhartt', 'This Knit Gray Beanie from Carhartt embodies the traditional style that can be easily transformed into a modern accessory, thanks to its minimalist design and versatility. Available in a muted gray tone, this custom embroidered beanie is a tailor-made piece to ensure absolute comfort, as you step out on a chilly day. Crafted carefully from premium-quality rib-knit acrylic fabric, the beanie is a long-term companion for your wardrobe. If you are on the lookout for a customized Carhartt hat that is not just functional, but also matches your sense of fashion, CapBeast is the right place for you. You can add your choice of logo and text, and create a unique product that only you\'ll possess! Featuring the Carhartt label at the front, this beanie can help you ace a stunning street-style look, and keep you enveloped in coziness. So place an order for your personalized Carhartt beanie with confidence.', NULL, 41.00, 1, '2025-03-25 14:07:04', '2025-03-25 14:07:04', NULL),
(119, 23, NULL, 'Red Flat bill cotton snapback | Yupoong', 'red- flat- bill- cotton- snapback-yupoong', 'The Red Flatbill cotton snapback from Yuppong is features a flat brim with a green undervisor. It is machine washable and has a large customization area making it one of our most popular custom baseball hats. It is made from 100% cotton twill material, it is machine washable and it has sewn eyelets to keep you cool in the summer heat. At the back of this personalized hat is an adjustable snap that enables you to adjust the size to your needs. The cap has a green under-visor that is soft and comfortable against the skin. Make your own custom embroidered cap by using the hat maker. Create a personalized hat by uploading your brand’s logo or slogan. Features · Made of 100% cotton twill material · Sewn eyelets · High profile design · Flat brim · No minimums · Custom embroidered', NULL, 29.00, 1, '2025-03-25 14:07:57', '2025-03-25 14:07:57', NULL),
(120, 24, 20, 'Knit Cuffed Beanie Black | Carhartt', 'knit-cuffed-beanie-black-carhartt', 'Made from pure acrylic rib-knit material, the Knit Cuffed Beanie from Carhartt is a premium accessory that amps up your fashion game and takes care of your comfort at the same time! Available in a classic black color, you can style this piece with an array of clothes, and carry it however you want. This one element is all you need to switch from a monotonous casual look to a fresh and polished street-ready style. Thanks to the stretchable fabric of the beanie, you experience supreme comfort as the high-quality material keeps your head wrapped in warmth. It carries the sewn Carhartt label on the front, with a cuffed design to keep you comfy. Create your custom Carhartt Beanie at CapBeast today, and rock an effortlessly fashionable look.', NULL, 42.00, 1, '2025-03-25 14:10:52', '2025-03-25 14:10:52', NULL),
(121, 23, NULL, 'Aqua Stone Faded Trucker Hat | Sportman', 'aqua- stone- faded- trucker- hat-sportman', 'This Aqua Stone Faded Trucker Hat is made of comfortable and breathable cotton and polyester material making it your ultimate outdoor companion. The interior has a moisture-wicking fabric that will keep you cool in the summer, absorb all sweat, and fight odor. This hat features an unstructured construction that makes it easy to fold and pack in your bag or pocket. It has a six-profile and low-profile construction that makes it suitable for men, women, and teenagers. The personalized trucker hat has an adjustable plastic tab closure that enables you to adjust the size. There are sewn eyelets that will keep your head cool. This hat will provide shade to your head during summer and keep your head warm during winter. Use our hat maker tool to create a personalized trucker hat. Upload your design or add custom stitched text to make the perfect hat, with no minimum order size. Features · Made of 55% cotton and 45% polyester · Sewn eyelets · Pre-curved visor · Plastic tab closure · No minimums · Customized\r\n\r\n5', NULL, 28.00, 1, '2025-03-25 14:12:18', '2025-03-25 14:12:18', NULL),
(122, 23, NULL, 'Forest Stone Faded Trucker Hat | Sportman', 'forest- stone- faded- trucker- hat-sportman', 'This Forest stone faded trucker hat is made of 55% cotton and 45% polyester making it soft, comfortable, and breathable. The hat has a low profile that ensures a secure fit for men, women, and teenagers. The sportsman trucker hat uses a plastic tab closure at the back that enables you to customize it to your head\'s size. It has a pre-curved visor that offers the perfect shade from harsh weather elements. The custom Sportsman hat has a moisture-wicking material that will absorb all sweat, keep you cool, and fight odors. It has sewn eyelets that keep your head well aerated. This custom tracker hat is suitable for wear during summer, winter, spring, and fall. It will keep you cool in summer and warm in winter. It’s sturdy, durable, and lightweight. Create a custom Sportsman hats hat with our Capbeast hat maker tool. Simply upload your logo or text and let our tool create a custom trucker hat that is unique to you. No minimums. Features · Material:55% cotton and 45% polyester · Sewn eyelet · Unstructured, low profile construction · Plastic tab closure · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:16:19', '2025-03-25 14:16:19', NULL),
(123, 24, 20, 'Knit Cuffed Beanie Gray | Carhartt', 'knit-cuffed-beanie-gray-carhartt', 'With the Carhartt Knit Cuffed Grey Beanie by your side, get ready to beat the extreme climate without compromising on style! Crafted with stretchable acrylic material, this accessory is comfortable and highly functional at the same time. Thanks to the warm fabric, you stay well-guarded from heavy cold. This minimal grey beanie flaunts a sewn-in Carhartt label at the front, making it a wardrobe essential. Customize your Carhartt Beanie at CapBeast, and sprinkle your personality into this elegant creation. With this beanie on your head, you can carry every street-style look with an effortless charm. Minimal and personalized, this piece is surely going to become your all-time-favorite custom beanie! Own it today, and infuse a classic style statement to your daily lookbook.', NULL, 42.00, 1, '2025-03-25 14:16:47', '2025-03-25 14:16:47', NULL),
(124, 23, NULL, 'Mustard Yellow Stone Faded Trucker Hat | Sportman', 'mustard- yellow- stone- faded- trucker- hat-sportman', 'This Mustard Yellow Stone Faded Trucker Hat is a unique, comfortable, and sturdily-made cap that will withstand all the outdoor elements. Made of 55% cotton and 45% Polyester, it\'s lightweight and stretchy to fit different head sizes. At the back of this custom Sportsman trucker hat is a plastic buckle strap that makes it easy to adjust the size to fit your head. It also has embroidered eyelets that add to its breathability. This personalized trucker hat has a moisture-wicking interior that absorbs all sweat and keeps you comfortable all day long. The embroidered cap has a pre-curved visor that works well in protecting your neck and face from the sun. Create a unique and personalized trucker hat using our hat maker tool. Upload your text or logo for your embroidered caps with no minimum orders. Features · Material: 45% cotton and 45% polyester · One size fit · Adjustable strap back closure · Embroidered eyelets · Structured design · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:20:51', '2025-03-25 14:20:51', NULL),
(125, 23, NULL, 'Navy Stone Faded Trucker Hat | Sportman', 'navy- stone- faded- trucker- hat-sportman', 'This Navy Stone Faded Trucker Hat is a classic unstructured hat that is made of 55% cotton and 45% polyester material combining comfort with breathability. The material blend also makes it fast drying and soft to the skin. The interior of the Sportsman trucker hat is made of a moisture-wicking material that absorbs all sweat and improves breathability. To ensure a custom fit, it has an adjustable strap closure at the back. With a five-panel construction and a curved brim, the custom trucker hat is the perfect choice for protecting yourself from the sun, rain, and snow. Personalize your custom trucker hat using our hat maker tool. Upload your design and let the tool embroider it for a custom trucker hat. Features · Made of 55% cotton and 45% polyester material · Sewn eyelet · Low profile, unstructured design · Strap back closure · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:25:32', '2025-03-25 14:25:32', NULL),
(126, 23, NULL, 'Red Stone Faded Trucker Hat | Sportman', 'red- stone- faded- trucker- hat-sportman', 'The Red Stone Faded Trucker hat is a low-profile hat that is made of 55% cotton and 45% polyester material. The comfortable, breathable, and stretchable hat will fit all head sizes. The custom Sportsman trucker hat has a strap back closure that enables you to adjust the size to fit your head. This makes it suitable for men, women, and teenagers. The embroidered caps feature a moisture-wicking interior material that will absorb all sweat and keep you dry and comfortable. As an unstructured hat, it is easy to pack in a bag or even fit in your pocket. The personalized trucker hat has sewn eyelets that keep your head aerated in hot conditions. It’s your ultimate accessory for the weekend and outdoors. Our Capbeast hat maker tool allows you to create a personalized trucker hat. Upload your logo or text and you will have embroidered caps. Features · Material:55% cotton and 45% polyester · Sewn eyelets · Pre-curved brim · Buckle closure · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:29:48', '2025-03-25 14:29:48', NULL),
(127, 23, NULL, 'Royal Stone Faded Trucker Hat | Sportman', 'royal- stone- faded- trucker- hat-sportman', 'Made of 55% cotton and 45% polyester, this Sportsman trucker hat is comfortable, lightweight, and breathable. It has an unstructured and low-profile design that enables it to fit in your pocket. The Sportsman trucker hat is sturdily made with top-notch embroidery ensuring a durable and tear-resistant cap. It has a buckle closure at the back for a one size fit for all. This hat has a pre-curved visor that offers good shade. There is contrast embroidery on the visor that adds to the pop of color. This unisex custom trucker hat can be worn with various outfits. It’s a great choice for daily use and outdoor activities such as running, fishing, cycling, camping, and the beach. With our Capbeast hat maker tool, you can create a custom trucker hat. Upload your logo or text and let the tool embroider it for a custom Sportman hat. No minimum orders. Features · Made of 55% cotton and 45% polyester material · Sewn eyelet · Unstructured construction · One size fits all · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:33:39', '2025-03-25 14:33:39', NULL),
(128, 27, 29, 'Black Dad hat | CapBeast', 'Black-dad-hat-capBeast', 'There is hardly anything as versatile as a dad hat. Put them on, and you\'re ready to face the challenges of the day, no matter which season it is. Thanks to their cool and timeless design, they enjoy equal popularity among all generations. Crafted with 100% bio-washed chino twill, our Black dad cap is designed for optimum comfort. This unstructured, six-panel hat comes with a pre-curved visor and a self-fabric snapback with buckle closure. Thanks to its adjustable design, this strapback is one size fits all. Personalize it with your logo or text using the CapBeast hat maker.', NULL, 30.40, 1, '2025-03-25 14:35:34', '2025-03-25 14:35:34', NULL),
(129, 23, NULL, 'Flat bill cotton snapback | Yupoong', 'flat- bill- cotton- snapback-yupoong', 'The Yupoon (YP Classics) Flatbill cotton snapback hat is made of 100% cotton twill material making for a durable, tear-resistant, and wrinkle-resistant cap. It has a five-panel construction and it has a large design area for your custom embroidered logo. This customized hat has a structured front crown and a high profile to fit all head sizes. It features a broad flat visor and an adjustable closure. The hat also features sewn eyelets that keep your head cool. Design your own hat by using the custom hat maker by CapBeast. Upload your logo or design to create a hat that is unique to you. Features · Made of cotton twill material · Flat visor · Five–structure panel · Adjustable size · No minimums', NULL, 29.00, 1, '2025-03-25 15:11:19', '2025-03-25 15:11:19', NULL),
(130, 26, NULL, 'Neon Snapback | Yupoong', 'neon- snapback-yupoong', 'The Neon snapback hat by Yupoong has a classic 6 panel design that features fan adjustable plastic strap on the back, a flat brim and a full crown profile. The button on the top of the hat is the same color as the hat itself, and so is the stitching. Materials: The Yupoong snapback is made from 80% Acrylic / 20% Wool. It has a bit of a heavier feel to the material, It breathes extremely well and is machine washable. Size & Fit: The Yupoong snapback is fully adjustable up to 24 ¼ inches, which means it fits most head sizes.', NULL, 30.00, 1, '2025-03-25 15:41:39', '2025-03-25 15:41:39', NULL),
(131, 26, NULL, 'Black Performance Cap | Adidas', 'black- performance- cap-adidas', 'Featuring the brand logo on the side, the classic Adidas Black Performance Cap comes with a hook and loop closure for maximum comfort. The structured build and the mid-profile design make it a convenient choice. The recycled polyester material is equipped with UPF 50, ensuring complete UV protection. Thanks to the moisture-wicking fabric, this one will keep you cool during summers. Once you put on this athletic hat, you\'d never feel like removing it. And if you want to sport a personalized cap that carries your logo on it, CapBeast is here. Tell us what you want on your cap, and our expert craftsmen will embroider it for you. Your custom Adidas hat is going to be absolutely unique, bearing your personal touch.', NULL, 39.00, 1, '2025-03-25 15:47:01', '2025-03-25 15:47:01', NULL),
(132, 27, 22, 'Retro Golf Hat | Imperial', 'retro-golf-hat-imperial', 'This Retro golf hat is made from 97% polyester and 3% spandex material making it fast-drying, and moisture-wicking. The hat is adjustable for a one size fits all fit. The golf hat features a structured five-panel construction and a mid-profile that makes it great to feature your custom embroidered logo. The interior of the hat features a performance sweatband that will absorb all the sweat in the summer heat. The hat has a pre-curved visor that will protect you from the UV rays. At the back of the cap is a plastic closure that enables you to adjust the hat for a perfect fit. Design your own custom hat using the CapBeast hat maker. Features · Material: 97% polyester and 3 % spandex · Pre-curved visor · Sweatband · Plastic snap closure · Five-panel construction, mid-profile · No minimums · Design your own', NULL, 33.00, 1, '2025-03-25 15:50:50', '2025-03-25 15:50:50', NULL),
(133, 26, NULL, 'Grey Performance Cap | Adidas', 'grey- performance -cap-adidas', 'Adidas Grey Performance Cap – a lightweight, moisture-wicking cap designed for comfort and breathability. Features a curved brim, adjustable strap, and Adidas logo for a sporty, stylish look!', NULL, 39.00, 1, '2025-03-25 15:51:24', '2025-03-25 15:51:24', NULL),
(134, 26, NULL, 'Deep navy Strapback structured cap | New Era', 'deep -navy -strapback- structured- cap-new- era', 'Featuring a simple design and a solid build, the Deep Navy Strapback Structured Cap is everyone’s favorite accessory. It is versatile in terms of style, making it a suitable choice for people of all age groups. Thanks to the 100% cotton twill material, this New Era hat ensures comfort. The hook and loop closure of this adjustable cap is another convenient feature that leads to a perfect fit. The dark navy tone of the cap can be a perfect canvas for customization. Thanks to CapBeast, now you can add an embroidered detail to your favorite strapback. Insert a logo or text on our interface, and we would make an embroidery out of it, and turn your plain hat into a custom strapback hat. Join hands with CapBeast, and start creating your very own custom New Era.', NULL, 34.00, 1, '2025-03-25 15:57:56', '2025-03-25 15:57:56', NULL),
(135, 27, 19, 'Performance Cap | Adidas', 'performance-cap-adidas', 'For the ones who grind hard on the field everyday, Adidas athletic caps are the ideal accessories. Designed from recycled polyester, the Adidas Performance Caps feature the brand logo on the side. Created for optimum protection, the caps come with UPF 50. Available in a wide range of colors, these sports hats are equipped with hook and loop closure, along with a structured, mid-profile design. They fit your head smoothly, ensuring comfort and convenience. If you want to add a personal touch to the cap, CapBeast is here to create a custom Adidas hat for you. The athletic hat will carry a customized embroidered logo and graphics of your choice.', NULL, 39.00, 1, '2025-03-25 15:59:33', '2025-03-25 15:59:33', NULL),
(136, 26, NULL, 'Black Strapback structured cap | New Era', 'black- strapback-structured-cap-new- era', 'The Black Strapback Structured Cap from New Era carries with it a simple and classic style, suitable for people across generations. This 6-panel hat is characterized by its superior built and 100% cotton twill material. It features a hook and loop closure for convenient fitting. Now, if you want to move beyond the basic black design, CapBeast can help you in creating a custom New Era. Add a text, graphic, or logo of your choice to our interface, and we would use it for creating an embroidered custom strapback hat for you. It will bear your personal logo, a marker of your signature style. Your custom-made hat awaits you– place your order with CapBeast.', NULL, 34.00, 1, '2025-03-25 16:01:48', '2025-03-25 16:01:48', NULL),
(137, 26, NULL, 'White Strapback structured cap | New Era', 'white- strapback- structured-cap-new- era', 'The classic and elegant White Strapback Structured Cap from New Era features a 6-panel design. The 100% cotton twill material ensures both comfort and durability, while the hook and loop closure allows for a greater fitting. If a simple, useful and ergonomic cap is what you\'re looking for, this one can be a good choice. If you want a little personal addition to this otherwise classic hat, CapBeast is here for you. Input your choice of logo or text to our interface, and our experts would embroider it to create a custom strapback hat for you. Your custom New Era hat is just a few clicks away from your reach, so place your order soon.', NULL, 34.00, 1, '2025-03-25 16:05:00', '2025-03-25 16:05:00', NULL),
(138, 26, NULL, 'Royal Strapback structured cap | New Era', 'royal- strapback- structured -cap-new-era', 'The Royal Strapback Structured Cap from New Era is characterized by its signature cotton twill material, and a premium build testifying to its durability. The hook and loop closure of this adjustable cap makes comfort and perfect fitting a top priority. This 6-panel New Era is a versatile accessory that is suitable for people of all generations. If you want to personalize this cap, CapBeast can be your guide. Tell us how you would want your custom strapback hat to look like, and we would have your personal logo embroidered on the cap. Your custom New Era is just a few clicks away, so place an order with CapBeast today.', NULL, 34.00, 1, '2025-03-25 16:08:17', '2025-03-25 16:08:17', NULL),
(139, 27, 29, 'Beanie hat with bottom stripe | CapBeast', 'beanie-hat-with-bottom-stripe-capbeast', 'Cover that noggin of yours with this bottom stripe knit beanie or as they say up north: toque. The 8” style fits heads perfectly and won’t slip around when you need it the most, and allows you to battle the extreme conditions you may find yourself in. The contrasting stripe at the bottom is just enough of an added detail to keep things interesting.', NULL, 28.00, 1, '2025-03-25 16:08:32', '2025-03-25 16:08:32', NULL),
(140, 26, NULL, 'Scarlet Strapback structured cap | New Era', 'scarlet-strapback-structured- cap-new-era', 'The Scarlet Strapback Structured Cap from New Era is a great fit for keeping your head well-protected throughout the seasons. Made with superior quality pure cotton twill, this adjustable cap features a hook and loop closure. It fits on your head comfortably, and thanks to the versatile design, this has become a staple accessory for people across generations. If you want to have a custom New Era cap with your own logo and text embossed on it, CapBeast can help you out. Add your choice of logo and text to our interface, and our experts would embroider the same on your hat. It\'s time to create your custom strapback hat– place your order, and sport it in style.', NULL, 34.00, 1, '2025-03-25 16:12:41', '2025-03-25 16:12:41', NULL),
(141, 26, NULL, 'Blue Cotton strapback hat | CapBeast', 'blue -Cotton- strapback -hat -capbeast', 'On days when you need something to keep your head covered comfortably, put on the Ocean Blue Cotton Strapback Hat! It comes with a structured design, it is made from pure cotton twill, and the color is too cool to ignore. The velcro strapback adds another dose of convenience to its list of features. And to make it more appealing, it\'s available for customization. Thanks to CapBeast, you can now get a custom logo embroidered on your strapback hat, with a full guarantee of premium-quality. A custom hat can instantly make your everyday look so much more interesting, while also maintaining your comfort. So, place an order with CapBeast, and get your one-of-a-kind custom hat.', NULL, 32.80, 1, '2025-03-25 16:16:21', '2025-03-25 16:16:21', NULL),
(142, 26, NULL, 'Navy Cotton strapback hat | CapBeast', 'navy- cotton- strapback- hat-capbeast', 'Wearing a cap can save you a lot of trouble– it offers protection from both heat and cold, and also makes you look stylish when you choose the right one. The Navy Cotton Strapback Hat is a versatile accessory that is ergonomic, durable, and great for daily use. It has a minimalist, structured design, with velcro straps for extra convenience. And thanks to the use of cotton twill, the material is thick and wrinkle-resistant but comfortable at the same time. It allows you to sport the same cap years after years, without any sign of wear and tear visible. And in case you customize the cap, CapBeast allows you to input text or graphics of your choice. Now you can own a custom hat that no one else can replicate– so, when are you creating yours?', NULL, 32.80, 1, '2025-03-25 16:19:37', '2025-03-25 16:19:37', NULL),
(143, 26, NULL, 'Royal blue Cotton strapback hat | CapBeast', 'royal -blue- cotton- strapback -hat-capBeast', 'Bored of your regular old cap? Bring home the Royal Blue Cotton Strapback Hat, customized to perfection by CapBeast. This minimalist cap is made with genuine cotton twill, promising longevity and resistance to wear and tear. Owing to the velcro straps at the back, it\'s easy to fit most people. It features a structured cut, rendering a polished appearance to the cap. Besides all of these specifications, CapBeast ensures that your cap can easily stand out from any other product. You may customize the cap by inserting graphics or text, and CapBeast will embroider it on the cap. This personalized creation will be unique, carrying your signature style. To get your custom hat, place an order with us!', NULL, 32.80, 1, '2025-03-25 16:23:46', '2025-03-25 16:23:46', NULL),
(144, 26, NULL, 'Red Cotton strapback hat | CapBeast', 'red-cotton-strapback-hat-capbeast', 'Once you set your eyes upon the Red Cotton Strapback Hat, there\'s no going back. It\'s made of premium cotton twill to ensure a sturdy build, with a structured design giving out a clean look. The velcro strap at the back makes the cap well-fitting. The bold yet classy red hue breaks the monotony of muted colors, rendering an interesting look to the hat. To take its appeal to the next level, CapBeast is here to customize the cap for you. You are free to add a graphic or logo of your preference, and CapBeast will deliver the cap to you with custom embroidery. So now, your cap will not just be an accessory to protect your head, but also a statement-maker.', NULL, 32.80, 1, '2025-03-25 16:27:46', '2025-03-25 16:27:46', NULL),
(145, 26, NULL, 'Khakhi Cotton strapback hat | CapBeast', 'khakhi -cotton- strapback -hat-capbeast', 'For the ones who prefer muted earthy tones, the Khaki Cotton Strapback Hat is a perfect choice of accessory. Made with high-quality cotton twill, this cap is a hardy one. It is equipped with a velcro strap for convenient fitting, and a structured cut for exuding a neat look. Thanks to the versatile shade, this will very soon become your go-to cap for all occasions. And to give a special touch to this cap, CapBeast offers to customize it for you. Get your favorite logo or graphics embroidered on the cap, and turn it into something unique that nobody else can possess. So stop thinking, and start creating your custom hat.', NULL, 32.80, 1, '2025-03-25 16:31:43', '2025-03-25 16:31:43', NULL),
(146, 26, NULL, 'Purple Cotton strapback hat | CapBeast', 'purple-cotton -strapback -hat-capbeast', 'A true admirer of exclusive caps can never say no to this Purple Cotton Strapback Hat. Crafted with 100% cotton twill, this one is high on the comfort quotient. It exudes a street-style vibe, complemented by an ergonomic build. It is a staple accessory that comes in handy for keeping yourself protected from weather, and also helps you look effortlessly cool. This cap comes with velcro straps for added convenience, and the structure design renders a classic appeal. The vibrant purple color is a great canvas for you to start customizing, be it with text or graphics. CapBeast will curate the personalized embroidered hat, with complete assurance of superior quality. So what are you waiting for? Let\'s start making your custom hat!', NULL, 32.80, 1, '2025-03-25 16:36:03', '2025-03-25 16:36:03', NULL),
(147, 26, NULL, 'Kelly Cotton strapback hat | CapBeast', 'kelly- cotton- strapback-hat-capbeast', 'Are you fond of bright and lively colored caps? The Kelly Green Cotton Strapback Hat might be a good choice for you. It has been crafted from 100% cotton twill, rendering it strength and longevity. The polished, structured cut leads to a perfectly fitted look, with a velcro strap ensuring adjustability. An ergonomic accessory like this one infuses a lot of personal touches while taking care of your day-to-night comfort. And to increase its appeal even further, CapBeast is here to offer you a customized version of this cap, featuring an embroidered logo or text of your choice. With CapBeast, creating a custom hat is just a cakewalk, so get yourself one today.', NULL, 32.80, 1, '2025-03-25 16:46:21', '2025-03-25 16:46:21', NULL),
(148, 26, NULL, 'Camo Cotton strapback hat | CapBeast', 'camo- cotton- strapback- hat-capbeast', 'Nothing screams out comfort more than this Camo Green Cotton Strapback Hat. The cotton twill material helps it retain its shape, keeping you wrapped in coziness even when you live and sleep with the cap on. It features a structured cut and a velcro strapback so that it fits you without any inconvenience. Now, to make this cap truly yours, you are free to customize it. Tell CapBeast how you\'d want your ideal cap to look like, and we would embroider a logo and text of your choice. With us, you can have a personalized, no-hassle cap that\'s ergonomic and also looks great! Get yourself a custom hat today.', NULL, 32.80, 1, '2025-03-25 16:50:58', '2025-03-25 16:50:58', NULL),
(149, 26, NULL, 'Tropical Pink Cotton strapback hat | CapBeast', 'tropical -pink- cotton -strapback- hat-capbeast', 'Designed for the lovers of bold and not-so-subtle hues, the Bright Pink Cotton Strapback Hat is a convenient choice for everyday wear. Thanks to the premium cotton twill material, this hat is sturdy enough to endure wear and tear. It keeps your head well-protected, and also ensures that your comfort remains intact. Thanks to the structured cut and the velcro strapback, the cap\'s fitting is impeccable. And to infuse some more attractive features into the list, CapBeast has taken the initiative of customizing these caps, by adding a logo, text, or graphic in the form of custom embroidery. Order yourself a custom hat, and sport your personalized cap every time you step out.', NULL, 32.80, 1, '2025-03-25 16:57:03', '2025-03-25 16:57:03', NULL),
(150, 26, NULL, 'Maroon Cotton strapback hat | CapBeast', 'maroon -cotton- strapback- hat-capbeast', 'Who doesn\'t love a no-fuss strapback? We know you do. And that\'s why CapBeast has brought you the Maroon Cotton Strapback Hat! It\'s durable, it\'s colorful and it\'s made for regular wear. The cotton twill makes sure you can go the whole day without worrying about the wrinkles or the build. On top of that, the structured hat doesn\'t lose its shape when you take it off. Add the velcro fastener, and you have a solid hat at your disposal here. But if you want to make the Strapback more special, just tell us what you want on your cap. The custom hat will be embroidered with the signs and logos of your liking, letting you flaunt a hat that\'s one of its kind. Place your order today.', NULL, 32.80, 1, '2025-03-25 17:05:48', '2025-03-25 17:05:48', NULL),
(151, 26, NULL, 'Black Mid profile baseball hat | \'47 Brand', 'black- mid- profile- baseball- hat-47- brand', 'The classic accessory for every street-style fan is a black sporty cap. It\'s understated, it\'s simple yet it never fails to carry personality. Get ready to exude your confident self with the Black Mid profile baseball hat from the \'47 Brand. Featuring a self-fabric strap at the back and a comfy fit, this cap is a lifesaver. It\'s simple, elegant, and helps you look cool with minimal effort. Thanks to the soft wool blend material, this one keeps cold at bay. To seal the deal even further, now you can get the cap customized. Add your logo and text, and get a custom embroidered hat that you will never feel like taking off.', NULL, 34.00, 1, '2025-03-25 17:10:25', '2025-03-25 17:10:25', NULL),
(152, 26, NULL, 'Navy Mid profile baseball hat | \'47 Brand', 'navy-mid- profile -baseball- hat -47- brand', 'Want a custom mid-profile baseball hat that captures your personality? With the option to create unique personalized caps on CapBeast, it\'s time to own a cap of your own brand. Here we have the Navy Mid profile baseball hat from the \'47 Brand, featuring the brand logo, and a self-fabric strap at the back. The use of a high-quality wool blend makes this product a suitable accessory for harsh weather. The navy cap is versatile and cool, but you can make it more appealing by adding text or graphics of your choice. CapBeast will send you a beautifully embroidered \'47 Brand baseball cap so that you can step out in style, and also keep up the productivity quotient!', NULL, 34.00, 1, '2025-03-25 17:13:51', '2025-03-25 17:13:51', NULL),
(153, 26, NULL, 'Charcoal Mid profile baseball hat | \'47 Brand', 'charcoal- mid -profile- baseball -hat -47 -brand', 'Are you looking for a sporty hat that vibes with your style? Check out the Charcoal Mid profile baseball hat from the \'47 Brand. Available in a versatile charcoal shade, this premium wool-blend cap keeps your comfort in check while giving a boost to your daily work-day look. Featuring the \'47 Brand logo at the front, this classic accessory comes with self-fabric straps and a comfortable fit. This one is available for customization. All you need to do is insert a logo and a text, and CapBeast will add the personalized embroidery on this cool cap. So be prepared to sport your custom \'47 brand hat, because it\'s time to tell the world who you are.', NULL, 34.00, 1, '2025-03-25 17:17:10', '2025-03-25 17:17:10', NULL),
(154, 26, NULL, 'White Mid profile baseball hat | \'47 Brand', 'white mid profile baseball hat-47-brand', 'A custom cap is the dream of every diehard cap fan out there. The White Mid-Profile Baseball Hat from the house of \'47 Brand is a classic one, keeping up the fashion quotient high, without cutting back on comfort. Its wool blend material brings to the table a cozy material that\'s good enough for keeping cold away. It features self-fabric straps and the brand logo to add a cool touch. But if you want to take this cap to the next level, CapBeast can surely assist you! Add your personalized logo and text, and get it embroidered on the cap. And that\'s it– you have your custom \'47 Brand Hat that is unique in every possible way.', NULL, 34.00, 1, '2025-03-25 17:21:04', '2025-03-25 17:21:04', NULL),
(155, 26, NULL, 'Red Mid profile baseball hat | \'47 Brand', 'red -mid -profile- baseball- hat-47-brand', 'The Red Mid Profile Baseball Hat from the \'47 Brand features the brand logo at the front, infusing a sporty touch. Made with a high-quality wool blend, this adjustable cap offers a great deal of comfort. Adding a personal touch to your favorite baseball cap is now easier than ever. Customize the hat with a logo and text that you want to add, and we will get it embroidered on it. The vibrant red hue makes up a perfect background for infusing your personalized graphics. This custom mid-profile baseball hat from CapBeast is both useful and stylish– a perfect extension to your ideal street-style look.', NULL, 34.00, 1, '2025-03-25 17:26:44', '2025-03-25 17:26:44', NULL),
(156, 26, NULL, 'Black Trucker hat | \'47 Brand', 'black- trucker- hat-47 brand', 'The \'47 Brand\'s Black Trucker Hat is the epitome of sophistication. It\'s simple, stylish, and ensures that your comfort doesn\'t have to be compromised. The 100% washed-cotton renders a soft touch to this cap, and the strapback design leads way to a good fit. The relaxed and curved bill design makes this cap a favorite for every season. If you want to personalize this cap to sport a unique look, CapBeast is here to help. Let us know the text and logo that you’d like to add to it, and we will embroider it for you. With a 100% guarantee of premium quality, your custom 47 brand trucker hat is just a few clicks away.', NULL, 34.00, 1, '2025-03-26 10:45:11', '2025-03-26 10:45:11', NULL),
(157, 26, NULL, 'Navy Trucker hat | \'47 Brand', 'navy-trucker-hat-47 brand', 'A cool cap not only breathes life into your daily look, but it\'s also a great accessory to keep you guarded against extreme weather. The Navy Trucker Hat from the \'47 Brand is an ideal choice for anyone looking for a sleek looking cap. Thanks to the high-quality washed-cotton material, the cap is soft to touch. Because of the strapback design and relaxed build, this one offers a perfect fit. To help you create a custom trucker hat, CapBeast offers personalization on all 4 sides of this cap. Add a logo and the text that you prefer, and we will get it embroidered on the cap, with premium quality assured. Place an order and get your personalized custom trucker hat today.', NULL, 34.00, 1, '2025-03-26 10:49:39', '2025-03-26 10:49:39', NULL),
(158, 26, NULL, 'Red Trucker hat | \'47 Brand', 'red -trucker -hat -47 brand', 'Get yourself a custom trucker hat, and you\'re sorted for all seasons– be it winter or fall. Thanks to CapBeast, you can add a personalized text and logo to your Red Trucker Hat. This cap is crafted from pure washed cotton, making it soft and comfortable for everyday wear. With a strapback design and a relaxed fit, this cap is a must-have for every hat lover out there. Insert text and graphics on the interface, and get a customized logo embroidered on the cap. It\'s that easy to own a cap of your own brand.', NULL, 34.00, 1, '2025-03-26 10:52:46', '2025-03-26 10:52:46', NULL),
(159, 26, NULL, 'Camo Fitted cotton hat | New Era', 'camo -fitted -cotton -hat- new era', 'The Camo Fitted New Era is a comfortable cap made of stretchable fabric, ensuring a perfect fit for all. Cotton and Spandex twill makes it a cozy yet durable hat, ideal for everyday use. The carefully stitched 6-panel design of this mid-profile cotton cap renders a classic touch to this accessory. If you want something more than just a plain cap, CapBeast can customize fitted New Era hats on your behalf. Add a personalized logo or text to your custom fitted hat through our interface, and our craftsmen would embroider the design for you. Order your custom fitted New Era from CapBeast, and sport it in style.', NULL, 32.00, 1, '2025-03-26 11:02:25', '2025-03-26 11:02:25', NULL),
(160, 26, NULL, 'Gray Fitted cotton hat | New Era', 'gray- fitted -cotton -hat-new era', 'The Gray Cotton Hat from New Era is made of 97% cotton and 3% Spandex. Thanks to the stretchable nature of the fabric, this cap offers a superior fit for all. Featuring a 6-panel design, this structured mid-profile hat bears the legacy of excellent craftsmanship and durability. If you\'re searching for a comfortable and versatile cotton cap, this can be a perfect choice. And in case you\'re interested in adding a personal touch to your fitted hat, allow CapBeast to be your guide. Insert a logo and text on our interface, and we would recreate the same logo on your custom fitted hat in the form of embroidery. So customize your fitted New Era hat today.', NULL, 32.00, 1, '2025-03-26 11:14:34', '2025-03-26 11:14:34', NULL),
(161, 26, NULL, 'Gold Fitted cotton hat | New Era', 'gold- fitted- cotton -hat-new- era', 'Complete your everyday look with the Gold Fitted Cotton Hat from New Era, and enjoy its functionality. Made of cotton and Spandex, the stretchable fabric of this cap ensures a perfect fit. This perfectly-sewn 6-panel mid-profile cotton cap is durable enough for daily use. Now, if you want to make this gold hat truly yours, personalization is always a good idea. To customize fitted New Era hats, you have to add your choice of text, graphics, or logo to our interface. Our experts will embroider it onto your custom fitted New Era hat. Simple and ergonomic, this fitted hat is the only accessory you\'ll ever require to carry a cool yet timeless style.', NULL, 32.00, 1, '2025-03-26 11:32:36', '2025-03-26 11:32:36', NULL),
(162, 28, 29, 'Fidel cap | CapBeast', 'fidel-cap-capbeast', 'This is a great style if you’re looking for the protection of a cap without the usual look of a standard cap. This shape is called a Military Fidel and is suitable to block out the sun and protect your head from the elements. It’s made of 100% cotton twill and treated to give off that rugged look (Bio-washed). It has a pre-curved visor and Velcro closure in back.', NULL, 30.00, 1, '2025-03-26 11:33:29', '2025-03-26 11:33:29', NULL),
(163, 28, 30, 'Camo 9Fifty snapback | New Era', 'camo-9fifty-snapback-new-era', 'The Camo 9Fifty snapback from New Era is a must have streetwear accessory for all ages. It features a structured front panel, offering a high profile frame along with premium stability. To offer a flawless fit, the open back is equipped with a snap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom camo 9Fifty snapback for yourself, with the help of our very own custom hat maker. Use it to add your logo, graphics or text to create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-26 11:38:19', '2025-03-26 11:38:19', NULL),
(164, 28, 27, 'Camo snapback | Yupoong', 'camo-snapback-yupoong', 'The Yupoong camo snapback offers the classic snapback style emblazoned with a classic high quality woodland military camo finish.', NULL, 34.00, 1, '2025-03-26 11:43:52', '2025-03-26 11:43:52', NULL),
(165, 28, 27, 'Tiger Camo 5 Panel hat | Yupoong', 'tiger-camo-5-Panel-hat-yupoong', 'This White Geo Sustainable Customized Bucket Hat features an unstructured design that makes it easy to fold and store without losing its shape. The custom embroidered hat cap is made of a 100% certified recycled polyester twill that makes it lightweight and comfortable to wear. It is one size fits most, and it features sewn eyelets that add to its breathability. It’s the perfect companion for your summer and outdoor protection from the sun. Personalize this hat with your own logo or design using the CapBeast custom hat maker. Features · 100% recycled polyester twill material · Sewn eyelets · Unstructured design · One-size fit · Material traceability using QR code · Global Sustainable Recycled Standard · No minimums · Design your own', NULL, 30.00, 1, '2025-03-26 11:49:13', '2025-03-26 11:49:13', NULL),
(166, 26, NULL, 'Royal Fitted cotton hat | New Era', 'royal-fitted -cotton- hat-new era', 'When you want to feel extra comfortable throughout the day, put on the Royal Fitted Cotton Hat from New Era. Made with premium quality stretchable fabric, this one fits around your head perfectly. This 6-panel cotton cap features a structured design, with superior craftsmanship ensuring durability. The simple and versatile design of this fitted hat makes it a suitable accessory for all occasions, and people of all ages. And if you\'re looking for a personalized, custom-fitted New Era, CapBeast is here to help. To customize fitted New Era hats, you have to upload your choice of text or logo to our interface. Our experts would embroider those designs, and create a custom fitted hat just for you.', NULL, 32.00, 1, '2025-03-26 11:59:36', '2025-03-26 11:59:36', NULL);
INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(167, 26, NULL, 'Black Fitted cotton hat | New Era', 'black -fitted -cotton- hat-new era', 'The Black Fitted Cotton Hat from New Era is a marker of optimum comfort and versatile style. Made of 97% cotton and 3% Spandex, this 6-panel hat is stretchable in nature, allowing a superior fit for everyone. Thanks to the minimalist black color, you can wear it on whichever occasion you like. The quality craftsmanship ensures that the cap is durable even after rugged use. And in case you want a custom-fitted hat, CapBeast can help you create one. To customize fitted New Era hats, you have to tell us about the kind of logo or graphics you want to add to your cotton cap. Then, our experts would embroider the same design to present you with a custom fitted New Era. With CapBeast, it\'s time to upgrade your accessories, and carry something that truly reflects your personality.', NULL, 32.00, 1, '2025-03-26 12:05:05', '2025-03-26 12:05:05', NULL),
(168, 29, NULL, 'Tie Dye Dad Hat', 'tie-dye-dad-hat', 'This Tie Dye custom Dad Hat is a classic and stylish cap that combines colorful styles and comfort. It’s made of 100% cotton material making it cozy to wear all day long. The strapback buckle closure at the back ensures a perfect fit. At the front is a pre-curved visor that protects your head from UV rays. The soft cotton also makes it packable and crushable so that you can carry it anywhere. This custom dad hat is designed to be unisex. It has six panels and a low structure that makes it stylish for the young and old. Design your own custom embroidered tie-dye hat with the Capbeast hat maker using your own logo or text. Features · Cotton material · Pre-curved visor · Six panels structure · Tri-glide buckle closure · No minimums', NULL, 28.00, 1, '2025-03-26 12:05:25', '2025-03-26 12:05:25', NULL),
(169, 26, NULL, 'Deep navy Fitted cotton hat | New Era', 'deep -navy- fitted -cotton- hat-new era', 'The New Era Deep Navy Fitted Cotton Hat is another name of comfort. The stretchable fabric makes way for an ideal fit, and the superior build quality renders durability to this 6-panel structured cotton cap. The minimalist design makes it a versatile accessory, suitable for people across generations. If you\'re looking for a deeply personalized baseball cap, you can always get a custom fitted New Era that speaks volumes about your personality. With CapBeast, owning a custom fitted hat is easier than ever. To customize fitted New Era Hats, all you need to do is add your choice of graphics to our interface, and wait for us to emulate them in your cap in the form of embroidery.', NULL, 32.00, 1, '2025-03-26 12:10:43', '2025-03-26 12:10:43', NULL),
(170, 26, NULL, 'Graphite Fitted cotton hat | New Era', 'graphite-fitted- cotton- hat-new era', 'If a classic and cool hat is what you\'re looking for, the Graphite Fitted Cotton Hat from New Era can be a great choice. The cotton and Spandex blend creates a stretchable fabric, ensuring a comfortable fit around your head. The quality craftsmanship of this 6-panel mid-profile hat promises durability. The simple design renders a versatile appeal to this accessory, making it suitable headwear for people of all ages. Now, in case you want to sport a custom fitted hat that stands out from the crowd, CapBeast is here for you. Add a text or graphics of your choice to your cotton cap, and we would embroider the design and create a custom fitted New Era, just for you. At CapBeast, we not only customize fitted New Era hats, but we also assure the premium quality of craftsmanship.', NULL, 32.00, 1, '2025-03-26 12:14:42', '2025-03-26 12:14:42', NULL),
(171, 26, NULL, 'Dark green Fitted cotton hat | New Era', 'dark green fitted cotton hat | new era', 'A stylish baseball cap can really help your personality shine through and when it\'s the New Era Dark Green Fitted Cotton Hat, you\'ll find it extra easy to draw attention. The Custom fitted hat is as beautiful as it\'s functional. With 6 panel design, striking cotton cap, and stretched cotton, wearing and carrying the hat all day is very easy. The custom fitted New Era hat perfectly protects the head and offers a subtle style element. If you want to make the Dark Green truly your own, now you have provisions for that as well. To customize fitted New Era hats, all you need to do is tell us your favorite patterns and texts and we\'ll embroider them on your cap.', NULL, 32.00, 1, '2025-03-26 12:19:09', '2025-03-26 12:19:09', NULL),
(172, 26, NULL, 'Purple Fitted cotton hat | New Era', 'purple-fitted- cotton- hat -new era', 'If you\'re looking to style up your daily look, you cannot go wrong with baseball caps. The New Era Purple Fitted Cotton Hat is the hassle-free option to amp up your rugged look without investing too many resources. The custom fitted New Era hat is everything you\'d want in a classic baseball cap - it\'s stylish, it\'s durable and it\'s never dull. The 6-panel design gives the custom fitted hat a contemporary look while the pronounced cotton cap makes it a flamboyant style statement. If you think the purple shade is not enough to draw attention, you can always go one step further. To customize fitted New Era hats just tell us your preferred style and texts and we at CapBeast will embroider it on your hat. Now that\'s a special hat!', NULL, 32.00, 1, '2025-03-26 12:23:31', '2025-03-26 12:23:31', NULL),
(173, 26, NULL, 'White Fitted cotton hat | New Era', 'white -fitted- cotton -hat-new era', 'A baseball cap that can keep up with your active lifestyle is hard to find, but not impossible. The New Era White Fitted Cotton Hat is a bold choice for anyone who dares to flaunt their lifestyle. The custom fitted hat from New Era features a 6 panel design that attracts a lot of eyeballs. The stretched cotton is both breathable under extreme conditions and durable against rough use. The New Era hats carry a classic design that\'s ideal for men outdoors. The custom fitted New Era hats can be customized however you want. Just let us know the patterns and texts you want to carry and we\'ll have them embroidered on your cap.', NULL, 32.00, 1, '2025-03-26 12:30:28', '2025-03-26 12:30:28', NULL),
(174, 26, NULL, 'Scarlet Fitted cotton hat | New Era', 'scarlet- fitted -cotton -hat-new era', 'A bold and beautiful baseball cap rarely has any competition. The New Era Scarlet Fitted Cotton Hat proudly flaunts its striking colors and classic design. The custom fitted New Era hat comes with the popular 6 panel design and a distance cotton cap - ideal for those who never shy away from starting a conversation. Coupled with stretched cotton, you have a structured hat that\'s as durable as it\'s comfortable to wear. If you\'re still looking to tailor the hats to your liking then you\'re in luck. The fitted hats can be customized with the texts and patterns of your choice. Just let us know what you want and we\'ll do the rest for you.', NULL, 32.00, 1, '2025-03-26 12:34:01', '2025-03-26 12:34:01', NULL),
(175, 26, NULL, 'Stone Fitted cotton hat | New Era', 'stone- fitted - -hat- new era', 'Going subtle should never be hard - the New Era Stone Fitted Cotton Hat carries the classic baseball cap design with an understated shade. The custom fitted New Era hat boasts the popular 6 panel design marked by a signature cotton cap. For days when you need to grind extra hard, the stretched cotton will help in breathability. Thanks to the stone hue of the fitted hat, you can wear it on different occasions, all without raising an eyebrow or sacrificing your love for a good ol\' baseball hat. The customized fitted New Era hats give you the freedom to make the hat completely your own. Just tell us your favorite texts and logos and we\'ll embroider them on the New Era cap.', NULL, 32.00, 1, '2025-03-26 12:37:22', '2025-03-26 12:37:22', NULL),
(176, 26, NULL, 'Camo stretch mesh cap | New Era', 'camo- stretch -mesh- cap-new era', 'If you\'re looking for a classic custom fitted hat to add to your collection, the New Era Camo Stretch Mesh Caps can be a good choice. Made with premium-quality 100% polyester, these 6-panel caps are comfortable, timeless, and fit around your head perfectly. When it comes to protecting your head and eyes, these baseball caps come in handy. Thanks to their versatile design, they suit people of all ages seamlessly. Now, in case you want to own a custom camo fitted hat that carries your own logo, CapBeast can help you out. Enter your choice of graphics to our interface, and we would have it embroidered onto your custom New Era fitted hat.', NULL, 33.00, 1, '2025-03-26 12:48:49', '2025-03-26 12:48:49', NULL),
(177, 26, NULL, 'Navy Camo stretch mesh cap | New Era', 'navy- camo- stretch- mesh-cap-new era', 'Put on the Navy Camo Mesh Cap from New Era, and channel the elegance of this classic baseball cap. Made with superior quality fabric, the 6 panels of the custom camo fitted hat are sewn together carefully to attain a perfect fit. Versatile in design and comfortable to wear, this cap works as your go-to headwear. The versatile color and simple design make the camo fitted hat a suitable choice for people across generations. And in case you wish to have a custom New Era fitted hat in your possession, you can always add a personalized touch to it. At CapBeast, we help in creating custom fitted hats that bear a logo and graphic of your choice. So let us know how you\'d like to design your custom camo hat, and we would happily oblige.', NULL, 33.00, 1, '2025-03-26 12:54:56', '2025-03-26 12:54:56', NULL),
(178, 29, NULL, 'Tie Dye Bucket Hat', 'tie-dye-bucket-hat', 'This Tie Dye custom Bucket Hat is the perfect accessory for your spring and summer wardrobe. made from 100% cotton which makes it durable and comfortable to wear. At the back of the hat is an adjustable strap closure that makes it the perfect fit for all head sizes. The personalized tie-dye hat has a low profile, and an unstructured design that makes it great for embroidered designs. The interior of the hat has a built-in sweatband that makes this hat comfortable to wear even in the warmest weather. Create your own custom embroidered bucket hats using the CapBeast hat maker. Upload your design or add custom stitched text to make the perfect hat, with no minimum order sizes. Features · Unisex design · 100% cotton material · Unstructured design · Sewn eyelets · No minimums · Custom Embroidered', NULL, 29.00, 1, '2025-03-26 12:56:09', '2025-03-26 12:56:09', NULL),
(179, 26, NULL, 'Grey Camo stretch mesh cap | New Era', 'grey- camo- stretch -mesh -cap-new era', 'Looking for a custom camo hat that is both comfortable and versatile? The Grey Camo Mesh Cap from New Era is the ideal fit for you. Made with 100% polyester, this 6-panel custom camo fitted hat can be personalized according to your preference. Featuring an adjustable design, the cap ensures that your head remains well-protected throughout the seasons. Create your very own custom New Era fitted hat with CapBeast, and get ready to marvel at our quality craftsmanship. Add your choice of logo and graphics, and we would have it embroidered on top of your custom fitted hat for a unique appearance.', NULL, 33.00, 1, '2025-03-26 13:00:22', '2025-03-26 13:00:22', NULL),
(180, 26, NULL, 'Black Camo stretch mesh cap | New Era', 'black- camo- stretch- mesh -new era', 'When it comes to everyday headwear, nothing can beat a custom camo fitted hat. The Black Camo Mesh Cap from New Era features a 6-panel design, made with superior quality polyester. Because of its timeless design, this cap can be worn by people across all generations. This custom fitted hat offers maximum comfort throughout all seasons. With CapBeast, creating your custom camo hat has become easier than ever. All you have to do is add your choice of text to our interface, and we would embroider the text/ logo on your custom New Era fitted hat. Place your order, and become a proud owner of your personalized camo hat.', NULL, 33.00, 1, '2025-03-26 13:04:53', '2025-03-26 13:04:53', NULL),
(181, 29, NULL, 'Tie Dye Twill Dad Hat', 'tie-dye-twill-dad-hat', 'Add fun and color to your look with the Tie-Dye customized Dad Hat. It’s made of 100% cotton, making it comfortable to wear and soft to the touch. The custom embroidered hat has six air ventilation holes on top to ensure good breathability. The pre-curved brim and the cotton fabric work hand in hand to protect you from the harsh UV rays. It has a tri-glide buckle closure that ensures a perfect fit. The hat is machine washable and easy to care for. Personalize your own by using the CapBeast custom hat maker. Upload your design or text to create a unique custom hat. No minimum-sized orders. Features · Cotton material · Buckle closure · Pre-curved visor · eyelets · No minimums · Design your own', NULL, 32.00, 1, '2025-03-26 13:07:02', '2025-03-26 13:07:02', NULL),
(182, 26, NULL, 'Heather gray & Amber 112 Trucker hat | Richardson', 'heather- gray & amber- 112 -trucker- hat-richardson', 'The unique combination of heather gray and gold renders a timeless touch to this Richardson trucker hat. Featuring a 5-panel structured design, this mid-profile Richardson hat is not only comfortable but also versatile. Made of cotton and polyester with a mesh design at the back, it keeps you comfortable throughout all seasons. It comes with a plastic snapback that can be adjusted at your convenience to achieve the perfect fitting. Owning custom Richardson hats has never been easier. With CapBeast, all you have to do is insert your choice of text, graphics, and logo into our hat maker and we will do the rest.', NULL, 34.00, 1, '2025-03-26 13:08:57', '2025-03-26 13:08:57', NULL),
(183, 26, NULL, 'Heather gray & Black 112 Trucker hat | Richardson', 'heather -gray & black -112- trucker -hat-richardson', 'The Heather Gray & Black Richardson 112 trucker hat features a 5-panel structured design and comes with a comfortable plastic snapback for a perfect fit. The cotton and polyester blend makes it a suitable accessory for all seasons, with the backside made of pure polyester mesh. Thanks to the simple yet versatile design of this Richardson hat, they can be worn by people of all ages. Now personalizing your hat is easier than ever. With CapBeast, you can create a custom trucker hat that carries your logo, text, and graphics.', NULL, 34.00, 1, '2025-03-26 13:12:31', '2025-03-26 13:12:31', NULL),
(184, 26, NULL, 'Green & Tan 112 Trucker hat | Richardson', 'green & tan- 112- trucker- hat-richardson', 'Available in a cool combination of olive green and tan, this custom Richardson 112 trucker hat is a versatile accessory for all occasions– whether it\'s a regular workday or you\'re headed to a sports match. This structured, mid-profile hat features a 5-panel design. The backside of the cap is made of 100% polyester mesh for adding a stylish touch. Now, if you\'re interested in owning custom Richardson 112 hats, CapBeast is here for you. Add your text, graphics, or logo to our hat maker and we will have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-26 13:22:59', '2025-03-26 13:22:59', NULL),
(185, 26, NULL, 'Black & white 112 Trucker hat | Richardson', 'black & white 112 trucker hat | richardson', 'Available in the unbeatable combination of black and white, this Richardson 112 trucker hat takes comfort and versatility to the next level. As the maker of premium hats for over five decades, Richardson promises great quality and a superior fit. Made of a 60/40 blend of cotton and polyester, this hat features a 100% polyester mesh back. This mid-profile Richardson hat comes with a 5-panel structured design and an adjustable snapback for comfortable fitting. If you want to own custom Richardson 112 hats with your personal logo and texts embossed on top, CapBeast can help you out. Insert your choice of graphics into our design interface, and we would have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-26 13:26:24', '2025-03-26 13:26:24', NULL),
(186, 26, NULL, 'Charcoal & White 112 Trucker hat | Richardson', 'charcoal & white- 112- trucker- hat-richardson', 'The Charcoal and White Richardson 112 Trucker hat is a must-have in your cap collection. Featuring a mesh back design, this 5-panel mid-profile hat is all about versatility. Made of cotton and polyester, this Richardson hat offers comfort throughout all seasons. Thanks to the adjustable snapback design, you can expect a perfect fitting every time. If you\'re interested in custom Richardson 112 hats, CapBeast is here to create one for you. Insert a logo, text, and graphics into our design interface, and we would embroider them on your Richardson hat. Customize with CapBeast, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-26 13:30:43', '2025-03-26 13:30:43', NULL),
(187, 26, NULL, 'Ombre blue & Navy 112 Trucker hat | Richardson', 'ombre blue & navy 112 trucker hat | richardson', 'The Blue & Navy Richardson 112 Trucker is versatile headwear you can rely on for all seasons and all occasions. Made of a cotton and polyester blend, this Richardson hat features a mesh design at the back. The structured design of this 5-panel hat gives it a clean and polished look. Thanks to the adjustable plastic snapback, it fits your head comfortably. Personalize your using our online hat maker.', NULL, 34.00, 1, '2025-03-26 13:46:29', '2025-03-26 13:46:29', NULL),
(188, 26, NULL, 'Brown & khakhi Seven panel trucker hat | Richardson', 'brown & khakhi- seven- panel- trucker -hat-richardson', 'The beautiful combination of brown and khaki renders a unique appeal to the Richardson seven-panel trucker hat. Featuring a structured design and a flat bill, this hat comes with a polyester mesh back. The front section of the cap is made out of a blend of cotton, nylon, and polyester. This Richardson hat has a strapback enclosure for better fitting. CapBeast is here to help you create custom Richardson hats. Tell us in detail about the logo and the text you want to add to your hat, and well will get them embroidered on the cap. Your custom trucker hat is waiting for you– place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-26 14:04:06', '2025-03-26 14:04:06', NULL),
(189, 29, NULL, 'Raspberry Mist Tie Dye Dad hat', 'raspberry-mist-tie-dye-dad-hat', 'This Raspberry Mist Tie Dye custom Dad hat has beautiful prints that provide you with an exquisite appearance and helps you stand out from the crowd. The hat is made of high-quality cotton material that makes it comfortable, sweat-proof, and odor-fighting. It can be adjusted with a tri-glide buckle at the back which makes it suitable for all head sizes. The unisex personalized tie-dye hat has gorgeous colors that will make you stand out from the crowd. This customized hat is a great choice for running, shopping, outdoor, summer, spring, and any other outdoor occasion and makes a great gift for anyone in the family. Use the custom hat maker tool to upload your own logo or add personalized text to create a one-of-a-kind custom tie-dye dad hat. Features · Pre-curved visor · Buckle closure · Cotton material · Low profile · Six-panel structure · No minimums', NULL, 28.00, 1, '2025-03-26 14:04:12', '2025-03-26 14:04:12', NULL),
(190, 29, NULL, 'Cotton Candy Tie Dye Dad hat', 'cotton-candy-tie-dye-dad-hat', 'The cotton candy tie dye custom dad hat is made of cotton which makes it comfortable and soft on the skin. It has beautiful and unique prints that are perfect for designing your own hat and it makes you stand out from the crowd. At the back is a pre-curved visor that helps to protect your face from the sun when you are outdoors. The front crown of the personalized tie-dye hat can be folded and unfolded while still retaining its shape. It features a strapback buckle closure that allows you to adjust the size to fit your head. The personalized hat has a hard structure at the top that improves its overall look. This is the perfect choice for Golf, athletic activities or just for casual wearing. Design your own tie-dye hat using the Capbeast hat maker tool. Simply upload your company logo, personalized design or text and we will stitch it on the hat. Features · Made of 100% cotton · One-size fit · Pre-curved visor · Low profile · Adjustable strapback closure · No minimums', NULL, 28.00, 1, '2025-03-26 14:13:34', '2025-03-26 14:13:34', NULL),
(191, 26, NULL, 'Charcoal & black Seven panel trucker hat | Richardson', 'charcoal & black- seven-panel- trucker -hat- richardson', 'Available in a combination of charcoal and black, the Richardson seven-panel trucker hat is a classic choice. Made of cotton, nylon, and polyester, this structured, high-profile Richardson hat is extremely comfortable. The adjustable snapback enclosure ensures perfect fitting for everyone. If you want to break the monotony of this simple hat, CapBeast has a great solution for you. Use the empty canvas on the hat for personalization. Add your choice of logo, text, or graphics, and make this custom trucker hat truly yours. With us, making custom Richardson hats is easier than you could ever imagine. So place an order, today.', NULL, 34.00, 1, '2025-03-26 14:15:42', '2025-03-26 14:15:42', NULL),
(192, 29, NULL, 'Gray Tie Dye Dad hat', 'gray-tie-dye-dad-hat', 'The Gray Tie Dye custom Dad hat is made of 100% cotton which makes it durable and smooth. It has an adjustable strap back closure that ensures a snug fit. The customized hat has air ventilation holes at the top that keeps you cool in the summer heat. It has a unisex design that makes it fit for both men and women. The pre-curved brim helps to protect your face from the harmful UV rays. This cap hat is a great choice for outdoor activities such as traveling, hiking, camping, cycling, and daily wear. It\'s a perfect gift for men, women, and teenagers. Design your own tie-dye dad cap using our custom hat maker tool. Simply upload your logo or text to create a one-of-a-kind embroidered hat. Features · Cotton material · Pre-curved visor · Buckle closure · Six-panel structure · No minimums', NULL, 28.00, 1, '2025-03-26 14:19:46', '2025-03-26 14:19:46', NULL),
(193, 26, NULL, 'Heather gray & Black Seven panel trucker hat | Richardson', 'heather -gray & black- seven -panel- trucker- hat -richardson', 'The Heather Gray and Black Richardson seven-panel trucker hat is a classic accessory for all seasons. A favorite choice for people of all generations, this Richardson hat is made of cotton, nylon, and polyester blend, with the backside featuring a polyester mesh design. This structured, high-profile cap features a flat bill and a snapback enclosure for optimum convenience. To add your own creativity into these hats, you can take help from CapBeast. Use our design interface to input your logo, text, and graphics. Our team of designers will get them embroidered on your custom Richardson hat, with premium quality guaranteed. So place an order with CapBeast today, can get your own custom trucker hat.', NULL, 34.00, 1, '2025-03-26 14:21:58', '2025-03-26 14:21:58', NULL),
(194, 29, NULL, 'Sky Tie Dye Dad hat', 'sky-tie-dye-dad-hat', 'The CapBeast Sky tie-dye custom Dad Hat is made of 100% cotton material, making it the perfect accessory to wear with any outfit. It features a low-profile design, and it is machine washable. The hat has a six-panel construction that provides a large design area, and at the back of the hat is a strapback buckle closure that ensures a perfect fit. The custom hat is incredibly lightweight and comfortable to wear. It has a pre-curved visor that offers you great protection from the sun. This cap will help you stay cooler and protect you from the sun. It’s also stylish and will match most of your outfits. You can now customize your own dad hat that is unique to you using our custom hat maker tool. Simply upload your logo or add text to create a unique custom embroidered hat. Features · Made of 100% cotton · Tie & dye pattern · Pre-curved visor · Low profile · No minimums · Design your own', NULL, 28.00, 1, '2025-03-26 14:29:13', '2025-03-26 14:29:13', NULL),
(195, 26, NULL, 'Red & Black Seven panel trucker hat | Richardson', 'red & black- seven- panel -trucker- hat-richardson', 'Available in the timeless combination of red and black, the Richardson seven-panel trucker hat is here to redefine comfort and versatility. Featuring a high-profile, structured design, this Richardson hat comes with a mesh design at the back. The front section is made of a high-quality blend to ensure breathability. The snapback enclosure ensures that it fits everyone with ease. At CapBeast, we are dedicated to creating beautifully embroidered custom trucker hats for you. All you need to do is tell us about your choice of logo/text/graphics, and wait for us to emulate them through embroidery. Creating custom Richardson hats is now easier than ever, thanks to CapBeast. So place an order with us, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-26 14:30:36', '2025-03-26 14:30:36', NULL),
(196, 26, NULL, 'Royal & Black Seven panel trucker hat | Richardson', 'royal & black- seven -panel- trucker -hat-richardson', 'The Royal & Black seven-panel trucker hat is a classic choice for all generations. The front section of the Richardson hat is made of a blend of cotton, nylon, and polyester, and the back section comes with a polyester mesh design. This high-profile, seven-panel structured hat features a flat bill, along with a convenient snapback closure for better adjustability. With CapBeast by your side, now you can create custom Richardson hats, with your own logo embossed on them. Insert a text, graphics, or logo into our design interface, and we will embroider the same on your custom trucker hat. So place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-26 14:37:32', '2025-03-26 14:37:32', NULL),
(197, 26, NULL, 'Black Low profile trucker hat | Richardson', 'black- low-profile -trucker- hat -richardson', 'Colors come and go, but the appeal of a black hat can never be diminished. The black Richardson low-profile trucker hat features a structured, six-panel design, along with a pre-curved visor. Made of a cotton-polyester blend, the back portion of the Richardson hat comes with a mesh design. It has a convenient snapback closure, making way for a perfect fit. With CapBeast, you can create a custom Richardson hat with just a few clicks. We will get your logo, graphics, and text embroidered on a cap of your choice, with premium quality guaranteed. So order your custom trucker hat, today.', NULL, 33.00, 1, '2025-03-26 14:41:40', '2025-03-26 14:41:40', NULL),
(198, 26, NULL, 'Black/Charcoal Low profile trucker hat | Richardson', 'black-charcoal -Low-profile- trucker-hat -richardson', 'The Black/Charcoal Richardson low-profile trucker hats are here to offer you comfort and style at one go. Featuring a six-panel design, this structured hat comes with a mesh back design. Made with cotton and polyester blend, the cap is breathable enough to be used in all seasons. The snapback enclosure is another convenient addition, allowing a perfect fit for everyone. Now, in case you\'re interested in creating a custom Richardson hat for yourself, CapBeast is here for you. You have to follow a few simple steps to get your hands on a custom trucker hat. First, insert the logo, text, or graphics of your choice into our user interface. Then, place your order. Our team will replicate the text or logo through embroidery, and add a personalized touch to your Richardson hat.', NULL, 33.00, 1, '2025-03-26 14:47:26', '2025-03-26 14:47:26', NULL),
(199, 26, NULL, 'Black/Neon pink Low profile trucker hat | Richardson', 'black-neon- pink- low -profile -trucker -hat-richardson', 'Made of a superior cotton-polyester blend, the Black/Neon Pink Richardson low profile hat is all about comfort and versatile style. This vibrant-colored hat features a pre-curved visor, along with a snapback closure for ease of fitting. This structured, six-panel Richardson hat comes with a 100% mesh design at the back, making it stand out from any other hats you might own. Now you can design a custom Richardson hat just by following a few simple steps. Choose a logo, text, and graphics that you love, and add them to our user interface. As soon as you place an order, our team will get your logo and graphics embroidered on the cap. So place an order for a custom trucker hat, today.', NULL, 33.00, 1, '2025-03-26 14:53:22', '2025-03-26 14:53:22', NULL),
(200, 26, NULL, 'Blue teal/Birch/Navy Low profile trucker hat | Richardson', 'blue -teal -birch- navy- low -profile -trucker -hat-richardson', 'Available in the Blue teal/Birch/Navy variant, this Richardson low profile trucker hat is a must-have in your headwear collection. Made of a premium blend of cotton and polyester, this hat is a comfortable choice for all seasons. It comes with a polyester mesh back, along with a snapback closure for easy fitting. This six-panel, structured Richardson hat features a pre-curved visor. If you\'re interested in creating custom Richardson hats, CapBeast is your best guide. Tell us more about your choice of logo, text, and graphics, and we would get them embroidered on top of your custom trucker hat. So place an order with us, today.', NULL, 33.00, 1, '2025-03-26 15:00:57', '2025-03-26 15:00:57', NULL),
(201, 29, NULL, 'Sorbet Tie Dye Twill Dad Hat', 'sorbet-tie-dye-twill-dad-hat', 'The Sorbet Tie Dye Twill Dad Hat is made from 100% cotton material that makes it comfortable, feather-light, and breathable. It has a unique tie & dye design that makes it colorful, eye-catching, and trendy. The custom dad hat features an adjustable tri-glide buckle at the back and a trendy strapback closure. It has a pre-curved design that provides great protection from the sun. This hat is a great choice for expressing your style and keeping you cool in the summer heat. The custom embroidered hat has a unisex design that makes it fit for both men and women. Use the CapBeast Custom Hat maker to make a one of a kind custom embroidered hat. Add text to your design or even upload your organization’s logo. Features · Made of cotton material · Pre-curved visor · Adjustable buckle closure at the back · Eyelets · Can be customized with a logo/prints · No minimums · Custom Embroidered', NULL, 32.00, 1, '2025-03-26 15:05:29', '2025-03-26 15:05:29', NULL),
(202, 26, NULL, 'Brown/Khakhi Low profile trucker hat | Richardson', 'brown-khakhi -low -profile- trucker- hat- richardson', 'Your everyday hat should be comfortable, reliable, and willing to go the long distance with you. The Richardson low profile trucker hat gets the job done without drawing too much attention. Made from a cotton and polyester blend, the Richardson hat features brown/khaki color combination - perfect for the long days under the sun. It\'s not just the color or the six-panel structured fit that makes it a fan favorite, the 100% polyester mesh back makes sure you stay nice and cool for a prolonged period of time. After all, the comfort brings customers back to the Richardson trucker hat every time. If you\'re still on the fence about it, know that you can truly make the custom trucker hat your own. Just let us know your preferred logo or text and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-26 15:07:05', '2025-03-26 15:07:05', NULL),
(203, 26, NULL, 'Chocolate chip/gray Low profile trucker hat | Richardson', 'chocolate -chip- gray- low- profile -trucker- hat -richardson', 'The Richardson low profile trucker hat in chocolate chip/grey hue is ideal for people who love the outdoors. It has a structured finish that holds its shape even after long hours of wearing it. Thanks to the blend of cotton and polyester, the Richardson hat provides a comfortable experience. It fits in your head perfectly and the six-panel structure ensures you move in style. The polyester mesh back has been added to make sure sweat doesn\'t get the better of you. With the pre-curved visor, you\'re always protected from light glare and sun rays. You can not only get the comfort of Richardson hats, but also the uniqueness of custom trucker hats. We offer custom Richardson hats. All you have to do is send us your texts and patterns and see how we customize the hat for you. Place your order today.', NULL, 33.00, 1, '2025-03-26 15:12:16', '2025-03-26 15:12:16', NULL),
(204, 26, NULL, 'Coffee/Claret Low profile trucker hat | Richardson', 'coffee-claret- low -profile- trucker-hat -richardson', 'The Richardson hat is the perfect blend of utility and comfort. Made from cotton and polyester, the hat has been designed to give you a superior feel. The structured, six-panel design of the Richardson low profile trucker hat holds its shape even after hours of rough usage. The combination of coffee and claret shades work like charm and is sure to draw some attention. The cap is both versatile and durable. Worried about excessive sweating? The polyester mesh back takes care of the heat without breaking a sweat. The custom Richardson hats come with unlimited possibilities of customization. Just tell us what you want to carry on your hat and we\'ll happily embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-26 15:16:30', '2025-03-26 15:16:30', NULL),
(205, 26, NULL, 'Cyan/Black Low profile trucker hat | Richardson', 'cyan-black- Low- profile- trucker- hat- richardson', 'If you\'re searching for a light and durable trucker hat, the Richardson hat might be the one you\'re looking for. The Richardson low profile trucker hat is made of a combination of cotton and polyester that offers both comfort and flexibility. The Richardson hat comes with a striking blend of cyan and black shades that are bold celebrations of your personality. It\'s not just the looks, the hat lives up to everything a classic trucker hat stands for. The 100% polyester mesh back quickly dissipates heat, discouraging sweat formation and keeping you cool. The snapback closure rounds off the safety features. You can make the trucker hat truly your own. Tell us your favorite logo, design, or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-26 15:20:45', '2025-03-26 15:20:45', NULL),
(206, 26, NULL, 'Dark Loden/Jaffa Low profile trucker hat | Richardson', 'dark- loden-jaffa- low -profile -trucker -hat-richardson', 'There\'s nothing like a good ol\' trucker hat that gets the job done without appearing too flashy. The Richardson hat in Dark Loden/Jaffa Orange color embodies the rustic nature. The Richardson low profile trucker hat is all about durability, comfort, and ease of use. You get a blend of cotton and polyester for a superior feeling and a structured, six-panel design for an easy fit. The pre-curved visor takes care of the sun for you while the polyester mesh back makes sure you stay nice and cool. The Richardson trucker hat is a utility product all right but you can still customize it to fit into your personality. You can let us know the texts or logos you want to flaunt on your hat and CapBeast will embroider it on your custom trucker hat. Place your order today.', NULL, 33.00, 1, '2025-03-26 15:25:36', '2025-03-26 15:25:36', NULL),
(207, 29, NULL, 'Purple Passion Tie Dye Dad hat', 'purple-passion-tie-dye-dad-hat', 'This Purple passion tie dye customized dad hat is made from comfortable and breathable cotton material that makes it sturdy and durable. The material is also comfortable and feels great to the touch. The adjustable unisex custom dad hat has an unstructured six-panel design that provides it with a stylish look. It has an adjustable buckle closure at the back that gives a comfortable fit. It is a low-profile custom hat and looks best with a smaller embroidery on the front. This personalized tie-dye hat has beautiful tie-dye prints that are sure to attract attention wherever you go. You can design your own hat using the CapBeast hat maker. Upload your personalized design or text, and we will turn your creation into a custom-made unique hat. Features · Six-panel structure · Pre-curved visor · Made of100% cotton · Tri-glide buckle closure · Customizable with a logo · No minimums', NULL, 28.00, 1, '2025-03-26 15:28:07', '2025-03-26 15:28:07', NULL),
(208, 26, NULL, 'Heather gray/Birch Low profile trucker hat | Richardson', 'heather -gray-birch- low- profile- trucker -hat- richardson', 'A light-colored trucker hat with earthy shades should always be in your wardrobe. The Richardson hat is the ideal trucker hat if you\'re looking for a mix of style and durability. The Richardson low profile trucker hat is made of cotton and polyester - you get the softness of cotton and the fit of polyester. The heather grey/birch trucker hat also comes with a lighter mesh back made of polyester. It ensures you can go on with your day without worrying about excessive heat or sweat. The strapback closure bolsters the durability of the cap. You can get your Richardson hat customized to your liking. Just mention your preferred style or text and we\'ll embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-26 15:29:36', '2025-03-26 15:29:36', NULL),
(209, 29, NULL, 'Pastel Tie Dye Twill Dad Hat', 'pastel-tie-dye-twill-dad-hat', 'The pastel Tie Dye Twill Dad Hat is a low-profile custom hat that is made of 100% cotton. It features a built-in sweatband that helps your head stay cool and dry. The hat has a bright tie-dye design that makes the dad cap look great with any ensemble. The custom embroidered hat can be worn by both men and women and is one size fits all. The adjustable strapback and tri-glide buckle closure makes it fit most head sizes. It features embroidered eyelets that help to keep your head cool. The pre-curved visor protects from harsh UV rays. Design your own custom embroidered hat using the CapBeast hat maker tool by uploading your design or text. Features · Cotton material · Tri-glide buckle closure · One size fit · Tie-die design · Pre-curved visor · No minimums · Custom Embroidered', NULL, 32.00, 1, '2025-03-26 15:32:55', '2025-03-26 15:32:55', NULL),
(210, 26, NULL, 'Heather gray/Dark charcoal Low profile trucker hat | Richardson', 'heather -gray-dark- charcoal- low- profile -trucker- hat- richardson', 'There\'s nothing like an understated trucker hat that you can wear day in day out. The Richardson hat should be the trucker hat of your choice if you value usability and comfort. The Richardson low profile trucker hat comes in a mix of heather grey and dark charcoal colors. The shades add an earthy touch to the hat while the blend of cotton and polyester takes care of the comfort. The hat also comes with a 100% polyester mesh back to make sure you stay cool and comfortable. The custom trucker hat gives you the freedom to make it uniquely yours. Tell us your favorite pattern or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-26 15:34:00', '2025-03-26 15:34:00', NULL),
(211, 26, NULL, 'Heather royal/Silver Low profile trucker hat | Richardson', 'heather- royal-silver low -profile- trucker- hat-richardson', 'Having an everyday trucker hat that you can wear anywhere and for as long as you like is an absolute must. The Richardson hat in heather royal blue and silver is the perfect accessory to head out for the day. The Richardson low profile trucker hat is made of cotton and polyester. You also get a mesh back made from 100% polyester. Thanks to the structured, six-panel design, wearing the hat for a long time won\'t be an issue. The Richardson hat serves its purpose but you can customize it further to make it your own. Let us know your favorite quotes or patterns and we\'ll gladly embroider them on your custom trucker hat. Place your order now.', NULL, 33.00, 1, '2025-03-26 15:38:42', '2025-03-26 15:38:42', NULL),
(212, 26, NULL, 'Hot pink/Black Low profile trucker hat | Richardson', 'hot- pink- black- low- profile -trucker -hat- richardson', 'Trucker hats should be about you and your personality. They should feel comfortable, and they should last long. The Richardson hat fits the bill perfectly and the hot pink and black shades come together to show your style. The Richardson low profile trucker hat is made from cotton and polyester for the utmost comfort. The 100% polyester mesh back offers proper circulation of heat and discourages sweat formation. It feels good on your head and fits even better. Features like structured, six-panel design and strapback closure make sure the hat stays on you even during hectic hours. We offer custom Richardson hats to our buyers. Just tell us your preferred logo or pattern and we\'ll have them embroidered on your custom trucker hat.', NULL, 33.00, 1, '2025-03-26 15:42:53', '2025-03-26 15:42:53', NULL),
(213, 26, NULL, 'Loden Low profile trucker hat | Richardson', 'loden -low -profile- trucker -hat -richardson', 'Get an everyday essential in the color of the season. The Richardson hat in loden shade is the trucker hat to flaunt today. The Richardson low profile trucker hat is made of cotton and polyester. It feels good on your head and thanks to the mesh back, it keeps heat and sweat away. The structured hat keeps its shape for a long time and the strapback closure ensures a perfect fit. When it\'s too bright to go out, just wear this trucker hat and the pre-curved visor will protect you. Now get your hat customized at CapBeast. Just tell us what you want to flaunt on your hat and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-26 15:47:25', '2025-03-26 15:47:25', NULL),
(214, 26, NULL, 'Smoke blue/Aluminum Low profile trucker hat | Richardson', 'smoke- blue -aluminum -low- profile- trucker -hat- richardson', 'Richardson Smoke Blue/Aluminum Low Profile Trucker Hat – a stylish and comfortable cap with a low-profile fit. Features a breathable mesh back, adjustable snap closure, and durable cotton-poly blend front. Perfect for casual wear, outdoor adventures, or branding.', NULL, 33.00, 1, '2025-03-26 15:52:14', '2025-03-26 15:52:14', NULL),
(215, 26, NULL, 'White 9Fifty snapback | New Era', 'white-9fifty- snapback-new era', 'Step out in style with the New Era custom 9Fifty snapback. It features the iconic sports and street style look of the classic New Era hats, but the only exception is the open back. This white 6-panel hat comes with an adjustable snapback closure, ensuring a comfortable fit. Made with 100% cotton twill, this hat keeps you company throughout all seasons. The sharp design of the hat makes you stand out from the crowd. Now you can take your love for sports culture to the next level, and design a hat. Add your logo, text, and graphics using our hat maker.', NULL, 31.00, 1, '2025-03-26 15:56:44', '2025-03-26 15:56:44', NULL),
(216, 26, NULL, 'Navy 9Fifty snapback | New Era', 'navy -9fifty -snapback-new era', 'The Navy 9Fifty snapback from New Era is a street style essential for all ages. It features a structured front panel, offering a crisp shape and optimum stability. To offer a flawless fit, the open back is equipped with a strap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom 9Fifty snapback for yourself, with the help of your very own customized hat maker CapBeast. Here you can add graphics, a logo, or a design of your choice, and create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-26 16:01:50', '2025-03-26 16:01:50', NULL),
(217, 26, NULL, 'Black 9Fifty snapback | New Era', 'black- 9fifty -snapback -new era', 'The New Era Black Custom 9Fifty snapback features a 6-panel design, with a structured appearance that gives the cap a flawless shape. It comes with an open backside, with an adjustable snapback closure for precise fitting. This iconic hat is a street style essential, no matter which generation you belong to. The material is 100% premium cotton twill, ensuring equal comfort in every season. Thanks to the evergreen black color, this hat will forever retain its versatile appeal. And if you want to sport a personalized New Era, use the CapBeast hat maker to help you design a hat.', NULL, 31.00, 1, '2025-03-26 16:04:30', '2025-03-26 16:04:30', NULL),
(218, 26, NULL, 'Charcoal 9Fifty snapback | New Era', 'charcoal- 9fifty- snapback-new era', 'Channel your love for sports with the Charcoal personalized 9Fifty snapback from New Era. As the leading hat maker for sportspersons all across the globe, New Era brings to you a structured, 6-panel design with a flat brim. It is equipped with a convenient strapback enclosure for better adjustability. To maximize comfort, the hat uses 100% cotton twill material. Make use of our custom hat maker to add your logo, text, or graphics.', NULL, 31.00, 1, '2025-03-26 16:07:37', '2025-03-26 16:07:37', NULL),
(219, 26, NULL, 'Gridiron Training Cap NE700 White Black & Gold | New Era', 'gridiron- training -cap- ne700- white- black & gold-new era', 'The Gridiron Training Cap from New Era is an iconic custom baseball hat for diehard sports fans. The hat resembles Pittsburgh Steelers colors as it comes in a mix of white, black, and gold shades. This custom fitted hat is made from 100% polyester, the Gridiron Training Cap is a durable hat made for the rough days on the field. It has moisture-wicking properties to keep sweat away from the body. On top of that, the stretch fit and elasticized bands make sure the wearer stays comfortable during the long hours. The structured, 6-panel design wraps up the modern aesthetics. Now you can design a hat to make it truly yours. Just add your favorite graphic or text using our custom baseball hat maker.', NULL, 28.00, 1, '2025-03-26 16:12:01', '2025-03-26 16:12:01', NULL),
(220, 26, NULL, 'Gridiron Training Cap NE700 White Green & Gold | New Era', 'gridiron -training- cap- ne700 -white -green & gold-new era', 'The Gridiron Training Cap from New Era is a stylish custom baseball hat that will keep you nice and cool for a long time. Made from 100% polyester, the hat is both durable and soft. The moisture-wicking properties help in breathability while the elasticized bands make sure it fits perfectly. The Gridiron Training Cap comes in white, green, and gold shades, lining up with the Green Bay Packers colors. The mid-profile, structured cap has a 6-panel design that gives it a modern touch. It’s a custom fitted hat so it comes in multiple sizes. Designing your own hats allows you to create a hat that feels authentic to you. Just add your favorite text or logo to customize the Gridiron Training Cap.', NULL, 28.00, 1, '2025-03-26 16:16:21', '2025-03-26 16:16:21', NULL),
(221, 26, NULL, 'Gridiron Training Cap NE700 White Gray & Navy | New Era', 'gridiron -training -cap- ne700 -white -gray & navy -new era', 'The Gridiron Training Cap from New Era is the perfect way to show your appreciation for your favorite team. The custom baseball hat comes in a mix of white, gray, and navy shades, resembling the Dallas Cowboys colors. Made from 100% polyester, the Gridiron Training Cap has a structured, 6-panel design with elasticized bands for a superior fit. It\'s a durable hat and the moisture-wicking properties make it a compelling option for Cowboys fans. The inside seams have New Era taping for added individuality. This hat is custom fitted so it comes in multiple sizes. You can get a personalized New Era hat by adding your favorite logo, quote, and graphics to the hat.', NULL, 28.00, 1, '2025-03-26 16:21:04', '2025-03-26 16:21:04', NULL),
(222, 26, NULL, 'Gridiron Training Cap NE700 White Red & Navy | New Era', 'gridiron- training- cap- ne700- white -red & navy-new era', 'The Gridiron Training Cap from New Era is the ideal custom fitted hat to let you enjoy the thrilling game. The baseball cap has a blend of white, red, and navy shades, resembling the Boston Red Sox colors. Made from 100% polyester, this durable customized hat is the go-to accessory for people who are planning for the outdoors. It has moisture-wicking properties that keep sweat away from the surface of the head. The mid-profile, structured, 6-panel design gives it an ergonomic and attractive look. Thanks to the stretch fit with elasticized bands, the training cap is able to offer superior comfort. Custom hats add a new dimension to standard sportswear. Add your favorite logo or text to make the Gridiron Training Cap from New Era your own.', NULL, 28.00, 1, '2025-03-26 16:25:31', '2025-03-26 16:25:31', NULL),
(223, 26, NULL, 'Two-tone Piped Fitted Athletic Hat Navy & Gold | New Era', 'two-tone- piped- fitted -athletic- hat -navy & gold-new era', 'The Two-tone Piped Fitted Athletic Hat from hat maker New Era is the ideal accessory for an active day in the field. It has a contrasting blend of navy and gold colors to elevate the sports look. The panels and the top brim of the hat feature 100% polyester double mesh for superior breathability. The moisture-wicking properties discourage sweat formation and maintain the head temperature. The under brim, sides, and piping feature 100% cotton twill for uber comfort. The athletic hat has a 6-panel design and New Era taping on the inside seams for a contemporary look. You can use custom hat embroidery to add a touch of personality and uniqueness.', NULL, 28.00, 1, '2025-03-26 16:32:23', '2025-03-26 16:32:23', NULL);
INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(224, 26, NULL, 'Two-tone Piped Fitted Athletic Hat Red & White | New Era', 'two-tone- piped -fitted -athletic- hat -red & white-new era', 'The Two-Tone Piped Fitted Athletic Hat from New Era is the perfect cap for hardcore baseball caps. Sported by the players of Major League Baseball players, this structured hat offers a comfortable fit, thanks to its stretchable design. The panels and top of the brim are of pure polyester double mesh, and the under brim is made of 100% cotton twill. The breathable and moisture-wicking fabric keeps your head sweat-free, so you can focus on the task at hand. This 6-panel hat comes in a classic combination of red and white, making it all the more versatile and universal. If you want to be your own hat maker and create a custom embroidered hat, simply add your choice of text and logo to this one.', NULL, 28.00, 1, '2025-03-26 16:37:44', '2025-03-26 16:37:44', NULL),
(225, 26, NULL, 'Vintage Mesh Cap | New Era', 'vintage -mesh-cap-new era', 'The Vintage Mesh Cap from New Era is a classic baseball hat, suitable for people of all generations. Designed for comfort, the front panel of the hat is made of 100% cotton twill, and the mid and back panels feature an 85/15 polyester/spandex mesh. The stretchable fit makes way for convenient fitting. You will be able to pick this structured mid-profile hat from multiple colors. They are characterized by mechanical distressing on the visor, rendering a cool look. If you\'re interested in sporting a personalized New Era cap, just add your choice of text or logo, and make it truly yours.', NULL, 28.00, 1, '2025-03-26 16:53:20', '2025-03-26 16:53:20', NULL),
(226, 26, NULL, 'Vintage Mesh Cap Black Graphite & White| New Era', 'vintage -mesh -cap -black-graphite & white-new era', 'This Vintage Mesh Cap from New Era comes in a classic combination of black graphite and white. It has a pure cotton twill front panel, with a mid and back panel made of a premium polyester and spandex blend. Thanks to the stretchable elasticized band, it seamlessly fits on heads of all sizes. The mechanical distressing on the visor gives a cool, worn-in touch to this hat, and this unique addition differs in different caps. You will find the brand logo attached to the top of the visor. If desired, you can create customized hats with your logo and graphic embroidered on them.', NULL, 28.00, 1, '2025-03-26 16:59:07', '2025-03-26 16:59:07', NULL),
(227, 26, NULL, 'Vintage Mesh Cap Blue Gray & White | New Era', 'vintage- mesh- cap- blue- gray & white-new era', 'Available in a combination of royal, gray, and white, this New Era Vintage Mesh Cap is versatile, comfortable, and suitable for people across generations. The visor is accentuated with a mechanical distressed design, along with the brand logo. Featuring a cotton twill front panel, and a polyester blend back and middle panel, this structured mid-profile hat offers a great fit. The stretchable band helps it stay in place, allowing you to go about your day without worrying about keeping your headgear in place. To create a custom embroidered hat, you can choose to add a personalized logo, text, or graphics on the hat, and make it truly unique.', NULL, 28.00, 1, '2025-03-26 17:06:55', '2025-03-26 17:06:55', NULL),
(228, 26, NULL, 'Melton Wool Strapback Hat | New Era', 'melton- wool- strapback- hat-new era', 'The Melton Wool Strapback hat from New Era has been designed to balance style, comfort, and convenience. The fabric of the hat is a blend of 50% cotton and 45% polyester to make it soft and durable. On top of that, the hat has 5% viscose to add a lightweight and sustainable footprint. The visor of the strapback hat is made of 100% cotton to keep the head nice and cool. It also has adjustable D-clip closure for an easy and hassle-free fit. The 6-panel design and New Era taping on the inside seams round off the aesthetics of the hat. The prominent shade of the hat is graphite heather but the visor comes in multiple colors. To design a hat on your own, insert your favorite logo, design, or graphics to create different types of custom caps.', NULL, 28.00, 1, '2025-03-26 17:27:51', '2025-03-26 17:27:51', NULL),
(229, 26, NULL, 'Heather Gray & Dark Green Melton Wool Strapback Hat | New Era', 'heather -gray & dark- green -melton -wool- strapback -hat-new era', 'The Melton Wool Strapback Hat from New Era epitomizes comfort and style in a durable package. The hat comes in heather gray while the visor carries a dark green shade. The fabric of the hat is a careful blend of cotton (50%), polyester (45%), and viscose (5%). The visor is made of 100% cotton for seamless heat dissipation. The 6-panel design of the hat maintains a contemporary touch while the adjustable D-clip closure at the back offers a superior fit. You can be a hat maker by adding custom hat embroidery. Just add your favorite logo or text for a unique New Era accessory.', NULL, 28.00, 1, '2025-03-26 17:33:24', '2025-03-26 17:33:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_baseimages`
--

CREATE TABLE `product_baseimages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `base_image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `product_color`
--

CREATE TABLE `product_color` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_name_1` varchar(255) DEFAULT NULL,
  `color_code_1` varchar(255) DEFAULT NULL,
  `color_name_2` varchar(255) DEFAULT NULL,
  `color_code_2` varchar(255) DEFAULT NULL,
  `front_image` varchar(255) DEFAULT NULL,
  `back_image` text DEFAULT NULL,
  `right_image` text DEFAULT NULL,
  `left_image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_name_1`, `color_code_1`, `color_name_2`, `color_code_2`, `front_image`, `back_image`, `right_image`, `left_image`, `created_at`, `updated_at`) VALUES
(76, 29, 'Ocean', '#76b6c4', 'Ocean', '#064273', 'ProductImages/FrontImage/w1mISw24fLC9cbSsU7C6B3Q5uSNUHU036zauiHc4.jpg', 'ProductImages/BackImage/Z2brDtLY3DDD73t1XkdpyC68HgXCC68HSDrMfUJx.jpg', 'ProductImages/RightImage/Unz7kC1PUZ4ZrfMstDbS7fibd0cnAlFFXEuv2qJm.jpg', 'ProductImages/LeftImage/SRzWnkygaMmnWSZGzlwNhPsAncnEe60M8RhD44EI.jpg', '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(77, 29, 'Purple Passion', '#ad65b2', 'Purple Passion', '#8d4592', 'ProductImages/FrontImage/0S1A5xztkkkC89unyq29DkCw4pSh0tkGe27hY8EW.jpg', 'ProductImages/BackImage/xG5ILP09GGFecIUb7XTxT8I165a74eNvHGQamsCe.jpg', 'ProductImages/RightImage/GgJsIVwSgvjAOHg9axAa6hCX2JIeLkhRbh2kKdUy.jpg', 'ProductImages/LeftImage/ChUtUegXpsQvqLVgl6dXQ5wRjMmRtEWRYFrDdbMl.jpg', '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(78, 29, 'Sky', '#009fff', 'Sky', '#007dff', 'ProductImages/FrontImage/0FyfjQ17NwB70xP9Gjq7B5r45EP69lIDsJXqVQlm.jpg', 'ProductImages/BackImage/zcJjFFywsrmRydT2QVpzz7dl2sXKXdKcQfBPhRI9.jpg', 'ProductImages/RightImage/62BUCz2fN8VY5Nu1fsLxrpn1KIGxd6XqjGNiQY0h.jpg', 'ProductImages/LeftImage/Zx6p88KAbD12cm0QNJ5bV6jVPYgStDnBE7BQNDbp.jpg', '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(79, 29, 'Raspberry Mist', '#c42253', 'Raspberry Mist', '#d1edc8', 'ProductImages/FrontImage/3SLrajBzIdMeMasiNX9c7BfwZz39d6zECgxZEiLI.jpg', 'ProductImages/BackImage/xWbd2Kx24bxpgcityD0K23bLWbyKIeWuyF4UV0zf.jpg', 'ProductImages/RightImage/ZJQDF9D9Je3G6M8vQO2wiXLNSat1AEj2rm3uK69a.jpg', 'ProductImages/LeftImage/AGLszwTKYAT1M7RW2JyZ5KNBdm2WJOI3GyCAnc3y.jpg', '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(80, 29, 'Cotton Candy', '#ffa7a7', 'Cotton Candy', '#ffcbcb', 'ProductImages/FrontImage/fJLjdsHIZx4wj97FZp9qXRdUq1brQha7mjx1b8FL.jpg', 'ProductImages/BackImage/75zU38iV2FFvTG4cADEz98agzvQjAS9kZaCZX9ak.jpg', 'ProductImages/RightImage/ocQQ3hcOLQnm3NoegEyTNZDNbvexQfP5o6cVmrCm.jpg', 'ProductImages/LeftImage/OHht8dHan6ToiXAga0UIa40fYG8rCsD6ZqcpYQok.jpg', '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(81, 30, 'Black', '#030303', NULL, '#000000', 'ProductImages/FrontImage/BDYsZxZdgKn0e1yw7S6XKdYRLZxrb8o2SIG6pJQd.jpg', 'ProductImages/BackImage/gWRz1K0mpVbX1xp35WZD8dMQsunMfqr1Sd4Cs5Fk.jpg', 'ProductImages/RightImage/CpHD5H3Mv50dHSdsc4q8A0jU1UsSym243CzL269M.jpg', 'ProductImages/LeftImage/cesAL3jlw37cE2EkJ5t57wR2IaYwbrDcOBtjJUp0.jpg', '2025-03-24 12:09:02', '2025-03-24 12:09:02'),
(82, 31, 'Purple Passion', '#ad65b2', 'Purple Passion', '#8d4592', 'ProductImages/FrontImage/cp4uvW52tSkgQYX8qBhFWo3jucgXsZH1qN3TEBuf.jpg', 'ProductImages/BackImage/7mnyYCYijw1RfWB1q97AUdz2M4O1Wobhl9LEFMsu.jpg', 'ProductImages/RightImage/i3ESrQyLzRXTt03RJsGz7rMtppsqXXIRbUW2Y2Cn.jpg', 'ProductImages/LeftImage/Jp6k9HRcS5ORREcdUfrizkrBr1F2cy1uxN0ZN8eF.jpg', '2025-03-24 12:16:27', '2025-03-24 12:16:27'),
(83, 32, 'Raspberry Mist', '#c42253', 'Raspberry Mist', '#d1edc8', 'ProductImages/FrontImage/y3c6RTkPqVGoG6diZ6RasUoey0Q4bKOM1ndK1wRG.jpg', 'ProductImages/BackImage/JshAeO7r9eL9iOmCvzcNVlgyjihR33urzNwjYJ6P.jpg', 'ProductImages/RightImage/Fum1lMkR9yiRWnyBWMd0bavsCC0xyebTEFdKV0Cd.jpg', 'ProductImages/LeftImage/DaNr7w6m22yXKyIlKwhh7PgUqOYrNxKqnNNw7h59.jpg', '2025-03-24 12:23:20', '2025-03-24 12:23:20'),
(85, 34, 'Cotton Candy', '#ffa7a7', 'Cotton Candy', '#ffcbcb', 'ProductImages/FrontImage/D7igpFqEUaoBugLojhw1PYGNZvvhSP8IUpPvX4P1.jpg', 'ProductImages/BackImage/AzNkARo5zQhSDAhHZs8U0JaPe5f3eEIGgVgrdeLB.jpg', 'ProductImages/RightImage/lO93gqJKan8e9OPPIEelJVBfNy7QYUfE9vWoWsAR.jpg', 'ProductImages/LeftImage/meItocKSSCpaEo4T20jTcFtI7pDi0sW18IN0evqB.jpg', '2025-03-24 12:34:43', '2025-03-24 12:34:43'),
(86, 35, 'Ocean', '#76b6c4', 'Ocean', '#064273', 'ProductImages/FrontImage/mCAOtsFZCz5no9DN1uYUwAj7UQQsLr3msDkqa8cJ.jpg', 'ProductImages/BackImage/7gyYHCTx59gW5Z2go3I6wEDYnVgLqj1IUkaKxhWE.jpg', 'ProductImages/RightImage/oy06Fpk97Yhi4PcVtqP4yBSy1NbmpVQFco1H3Uw5.jpg', 'ProductImages/LeftImage/1CBz1Nob7HBtDxR7dxI7kRZE0HNHzfLaacjjqcmr.jpg', '2025-03-24 12:43:52', '2025-03-24 12:43:52'),
(87, 36, 'white', '#ffffff', 'White', '#ffffff', 'ProductImages/FrontImage/fmmPWguaiQ1gBmSGpdBWlBZcG8bbaWRxDgiNrqeF.jpg', 'ProductImages/BackImage/Q1odJrVEp3LZ7qYcSAHuj5orVdZURwvrYUThRXl4.jpg', 'ProductImages/RightImage/abUMbhUb4Ok6LNrzMH37y2tiIs6KTXj2kAmtUuOd.jpg', 'ProductImages/LeftImage/BRTJ8ruZApCn1ovPo1ba5HbxKe5I7B9Uy0rKbGUv.jpg', '2025-03-24 12:49:12', '2025-03-24 12:49:12'),
(102, 39, 'Grey', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/sWuPLElqGlXbbWrUlbHINKhepeLwea6fyMO5rCcM.jpg', 'ProductImages/BackImage/3CtIj9q1mA3ImCsyG18nChJsZ12eX02yhubspo0F.jpg', 'ProductImages/RightImage/v9h6VPiDvWku3opIJES632qfmIirj3semxOEx2DF.jpg', 'ProductImages/LeftImage/3y3DQ87NzwiyWxMSVJfbv2Pls8bVKHyII75bf8Bj.jpg', '2025-03-24 14:01:48', '2025-03-24 14:01:48'),
(103, 40, 'Royal Blue', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/NuvXS5WQUseto2wB4O4CZ9SlmMFGDUg07Px9SCeu.jpg', 'ProductImages/BackImage/O1BAX68CS8lQZomLbOllXANRMDvj5z5lDKRBglZ4.jpg', 'ProductImages/RightImage/MzQBDkKaneiHycmSwNBKT2ly9dx9TzsUucmHCW6k.jpg', 'ProductImages/LeftImage/JQDXZSbl5e3scfTuv0zzt8bGdJWVKqCp1PcCtPq2.jpg', '2025-03-24 14:07:39', '2025-03-24 14:07:39'),
(104, 41, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/SfRXU5fslZX52tL1MHpowO2n9KnXuObCrKbP1MmQ.jpg', 'ProductImages/BackImage/3vr660PPusBvtTI75gFPdCCUMzcsZc0gY357Sepg.jpg', 'ProductImages/RightImage/LZ8vobIegxDmPtfaCZcVt2k7scvOCYqi2QGDTdLZ.jpg', 'ProductImages/LeftImage/hhRFk2OYAaDYy3DYU6RrzYJUKnvXh8ze2X9nARLW.jpg', '2025-03-24 14:11:06', '2025-03-24 14:11:06'),
(166, 49, 'White/Black', '#000000', 'White/Black', '#fafafa', 'ProductImages/FrontImage/leySPTzuQWyHwAl4t0e9XY7HPjvFcZJV2kNYBCzN.jpg', 'ProductImages/BackImage/Mixp7W11674ywaxkmoQGAZ86wdEwLH2ulH95ucLg.jpg', 'ProductImages/RightImage/knBUwCqEnkiqwOp6ksWvnRMor5NJWwqHgUpc8v4u.jpg', 'ProductImages/LeftImage/Wn71qcxFsqYbiK4yWh5A53MmmcbK5lOrqIU3P3bQ.jpg', '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(167, 49, 'Orange/Khaki', '#ffa500', 'Orange/Khaki', '#f0e68c', 'ProductImages/FrontImage/RQpYkrr6KoL0gn9wRV9avrRH8lZM3UcarwnFOLLJ.jpg', 'ProductImages/BackImage/E0vGMJnevrgzF5dcuHg08t8IUQaEPSssYY4tVga4.jpg', 'ProductImages/RightImage/Gp9C46Pz0Dwdhi4pUMoAW5ceytd3u9kRh6zDeDor.jpg', 'ProductImages/LeftImage/f0qvTnwsLDoJKnd7nqXA9lbBCGmRgskuRFKiakxE.jpg', '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(168, 49, 'Moss/Khaki', '#58a807', 'Moss/Khaki', '#c0b870', 'ProductImages/FrontImage/BzZyHbqKUvKCJ1V1CPJtt7ZrqSbx73Jl31DRSiKn.jpg', 'ProductImages/BackImage/XQBvVURkWbeLruFKy1Uu9Vnz6VEkRVijKwJr6Cfa.jpg', 'ProductImages/RightImage/1T0vgmXLElS4DpfKew5q9XnX9zZN6GMpj0wevROv.jpg', 'ProductImages/LeftImage/m2pC3JHpvlrTIQS7mE74qP2gly0Wkjau4PDtaEbV.jpg', '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(169, 50, 'Camo', '#030303', 'Camo', '#1f5919', 'ProductImages/FrontImage/NEA9lkpQboed2YB9o8asd1c3nnGT7z4QW3ctdb8a.jpg', 'ProductImages/BackImage/6RtCBEef0UKO6q7EYVTRYf27ePZ2suylx1FFt6gb.jpg', 'ProductImages/RightImage/e2NPfR1vtF0YL1leKOH6LKAaRfVAWRWxLuSqKPuu.jpg', 'ProductImages/LeftImage/dic9Ji8gzmvqEg8OY5PiuoYjW5S17xkns78TSqAQ.jpg', '2025-03-24 16:07:45', '2025-03-24 16:07:45'),
(170, 51, 'Black/Neon Green', '#a7f707', 'Black/Neon Green', '#000000', 'ProductImages/FrontImage/r7xqjMF5h8AOYXXeDDfnkJZBWQNT8tJnzuYII5Hm.jpg', 'ProductImages/BackImage/GxpDVyBpHWtaWdVX8D1Qux6px1ZFHzeKZsKy6Zyw.jpg', 'ProductImages/RightImage/AqIW8iu06CweDvUC0nuQKlYQKHhiQiynOdPNTNNd.jpg', 'ProductImages/LeftImage/KqwQDFh40vWYXbmkTP6YWdU4G61ut4fWybhjLCpw.jpg', '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(171, 51, 'Black/Neon Pink', '#ff459c', 'Black/Neon Pink', '#000000', 'ProductImages/FrontImage/CCNKTgFACh2N0ZAzD3R2GCTRyjUe8V21DyBvnCrs.jpg', 'ProductImages/BackImage/F7gSq34rwTiqTCG5K6W5GXdMP272nMxllRb4MU0E.jpg', 'ProductImages/RightImage/uyPWPTDkR3nwdwXluv7dHoE6eiu78Swm5wfGsTw5.jpg', 'ProductImages/LeftImage/vQDfFTLl7nuE73itrDFPSR5fqHwgXnVh02U3tZKK.jpg', '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(172, 51, 'Black/Neon Orange', '#ff9436', 'Black/Neon Orange', '#000000', 'ProductImages/FrontImage/ZEdQW8VtxXnGdJL05DXHn7XlimBKn0BJPJvYHu9G.jpg', 'ProductImages/BackImage/cOHgVCQqxTxe1lgAaAUUZoV6VNuYvXIdP9lJqiDh.jpg', 'ProductImages/RightImage/3hJ4avKYp29NJeSKgd8cBgFdsfNkGuFYnrLQIbXo.jpg', 'ProductImages/LeftImage/HRJCmA0QV5EjO07Jl2gpfAmHgMKyfRhXo0rP7bue.jpg', '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(173, 52, 'Navy/White/Navy', '#1900ff', 'Navy/White/Navy', '#ffffff', 'ProductImages/FrontImage/A9H5JsJWjFKtaKTnAQR6hnryPeqQ9okmeFuad8Rm.jpg', 'ProductImages/BackImage/Cv60oAC87D3zGudNuAcplYWwhhTEd1BoPgMMcFXX.jpg', 'ProductImages/RightImage/elRa1mc44LJ6gcYeIBv6Rult4zYg22qDPXX3vfiN.jpg', 'ProductImages/LeftImage/52N5vjQgDImoD14VTb0jzhKMPEsOvPSMlUtdfs49.jpg', '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(174, 52, 'Royal/White/Royal', '#3a35d4', 'Royal/White/Royal', '#ffffff', 'ProductImages/FrontImage/lizgXlE8XL6NDtnG8rtPtLu8WYi5YMhJP46SWzhy.jpg', 'ProductImages/BackImage/k4MA8EASv3ChoTTcQjsqme0wHcaXvAEdRxMxyywG.jpg', 'ProductImages/RightImage/NyJ2zFCND8uDUoXZE3ukz5Qw3iQWh0FxBgj3g3J9.jpg', 'ProductImages/LeftImage/tSuBrxYpOmKnls3ewM4sf7FAE6KlG6c6M8cb8pdC.jpg', '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(175, 52, 'Black/White/Black', '#000000', 'Black/White/Black', '#ffffff', 'ProductImages/FrontImage/RnUGea3XtO8LSfxGAarjtNZpTeXUHaaCq7VRc38A.jpg', 'ProductImages/BackImage/aaNIpxZByjkEtLZkm4p17YWwgMPtVLIMctgNcz9c.jpg', 'ProductImages/RightImage/RGMCd6zGqWrUgOD1YKYkcaBcbeZhyUchvJLZbRe6.jpg', 'ProductImages/LeftImage/996N8zKNYboUribVFN4S6fGJXJxWbxGxPzAdERXX.jpg', '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(176, 52, 'Kelly/White/Kelly', '#076935', 'Kelly/White/Kelly', '#ffffff', 'ProductImages/FrontImage/2k588s0RMrqUVAlqQ6yoaeK7zKPXa6KtKa4HFcyX.jpg', 'ProductImages/BackImage/YWB94hAu5TNWfaKz3vCRzGP3jCgQTUHDXqs4xWTZ.jpg', 'ProductImages/RightImage/FUm0zzjLACDCafLF8dmfWL075KuzjdXzVvPPr39X.jpg', 'ProductImages/LeftImage/PoI17aMwT6Le29meYEf328VL9UyCmbwqTCPU34yL.jpg', '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(177, 53, 'Natural', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/MjdSv9w0E7yOnKXRhDCnszXi2Hc0vyqUBV2i1ajd.jpg', 'ProductImages/BackImage/WYxNMbK119MvzQGqnHpLCdXiCwn663DUr69TsrZW.jpg', 'ProductImages/RightImage/96S9PZYyjBNu2W4mM7HxC5Y9WO8hGRHixkmDBXZZ.jpg', 'ProductImages/LeftImage/JEWOA5RXwjiw1UEahuIxDVd3SKQzICIXZKVBWw5M.jpg', '2025-03-24 16:31:01', '2025-03-24 16:31:01'),
(178, 54, 'Black', '#030303', NULL, '#000000', 'ProductImages/FrontImage/iXnF5afftYb4OwrHj9PRCzVZeBz5Saf0cEwi5c5t.jpg', 'ProductImages/BackImage/fW0WbrVsqXN8lIcIUhRyulzTeGdQJWh6rOUVTl5V.jpg', 'ProductImages/RightImage/fRVraP873uRI02z5oiHb6FKg4DbmGWsk7uWo0cn8.jpg', 'ProductImages/LeftImage/zxQqr2qUGPncY2JmzFD9jinpsPFqtLDYeCUTQ5dr.jpg', '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(179, 54, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/IBYkxHz43gUmS7N0Z9QCVo3J60V9EkXOsIi8T393.jpg', 'ProductImages/BackImage/6Me370xbu29eLNB6pR1FRHAp0zM5rWyLP2qnFGPL.jpg', 'ProductImages/RightImage/UFcm2jRjIxOXmvpGFsQ7iPjisezdEHrO7jkzqCB6.jpg', 'ProductImages/LeftImage/xh8TnLnsSWRkGh3h6YFsWNBQQvvR88lFRl0KjhU4.jpg', '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(180, 54, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/fgRMHENjePaLzBMS71MI17Z4ViQAgvqATp19PM3V.jpg', 'ProductImages/BackImage/N7A0T8RipMKvK1Ka7saI0M8PvWamDL8AshrNtyI0.jpg', 'ProductImages/RightImage/91i1LI2s3uQDprn4ySPamyLg9MPBYeAQB0dBY4EF.jpg', 'ProductImages/LeftImage/CK12XcrkYDfhL2fQbWfBQgCRnm0Wp1CyZRaICB9U.jpg', '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(181, 55, 'Natural', '#fbffd6', NULL, '#000000', 'ProductImages/FrontImage/ztXFq5T0TTKFvzeS1t57it9IB4TLEOyjqA2LQEVb.jpg', 'ProductImages/BackImage/Q3M2bN7CZyaVZqZrPR7KlXRc5fSBBE7Sn8ZeCMHT.jpg', 'ProductImages/RightImage/qbYx0gOG8VOeuHR72gp0AvPB4Mr7Zv7EPhFW4qgG.jpg', 'ProductImages/LeftImage/slhy822PmWMuEEgV8et4uqBG3Nr8AJFmEeUfIjTe.jpg', '2025-03-24 16:47:42', '2025-03-24 16:47:42'),
(182, 56, 'Green Camo', '#368a06', 'Green Camo', '#000000', 'ProductImages/FrontImage/yT2FFtu9Qh2HqlxnOSkuADhrJh5C6W34sNibM0db.jpg', 'ProductImages/BackImage/h4ASGUPKWLG9kUEZzDDfqHBHvteTJDORVFYORpQX.jpg', 'ProductImages/RightImage/IZRezUkdowBXArnAyFKSB8d1FnBLPz7Y3JtV6M31.jpg', 'ProductImages/LeftImage/EGQmg3pZcAjwB6gXCzIKBpawj6kpFg8sDSpWQjPv.jpg', '2025-03-24 16:54:09', '2025-03-24 16:54:09'),
(183, 57, 'Green Camo', '#368a06', 'Green Camo', '#000000', 'ProductImages/FrontImage/Oy1ThSw0XipkmRqCgNHrMDPMt3l5bQ8ZcZk3E4Bu.jpg', 'ProductImages/BackImage/ipQ233r5hGtPonRFFaI6RwIPVD26C0Q5diw0Ykus.jpg', 'ProductImages/RightImage/g2iyDP5Hfz6l40M4rSCl2ttR6bsLL0NZQUKZYGL1.jpg', 'ProductImages/LeftImage/DBeVyc0ZU8i5lSXvDy0ioBeCqiZl12UFjgiRJshh.jpg', '2025-03-24 16:58:09', '2025-03-24 16:58:09'),
(184, 58, 'Charcoal', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/3JFpB3xos001tZVQv5HmZLQzaa9YZTw6vhsOqntn.jpg', 'ProductImages/BackImage/ZJsdWSpOuVXguRbR93EJ4jc7QhNFqe96v76hIRH2.jpg', 'ProductImages/RightImage/BOCbl46xrdTunzRYQQGMlj8h2bSVz9E02KO6fsu1.jpg', 'ProductImages/LeftImage/cPUA29gXoXMhnldVUUKRAl7fjrlSODk174CJIf2x.jpg', '2025-03-24 17:01:54', '2025-03-24 17:01:54'),
(185, 59, 'Navy', '#311e85', NULL, '#000000', 'ProductImages/FrontImage/KeIn4QFJT13FNVJzyoTKjt2o23cB8qSzzEgsPEol.jpg', 'ProductImages/BackImage/VIQDi9QR8SnWVXao1Ih5xl4BqZd3dMUoT7XD71G4.jpg', 'ProductImages/RightImage/LI8eaWf7OlowUxgoZCzbqUWZMmX2E3UeDwp5pv6h.jpg', 'ProductImages/LeftImage/BdREPGBgYP4Mp8tNrKbYTtukBjgLHSiZ12oLl2Gr.jpg', '2025-03-24 17:05:43', '2025-03-24 17:05:43'),
(186, 60, 'Gray', '#cccccc', NULL, '#000000', 'ProductImages/FrontImage/JfAfy5rMkeuImjFClqL8mw2hbYEPlzFHXr6UMJeB.jpg', 'ProductImages/BackImage/g5vzQ8Y4T8hDsUwy2GPVXWA8pQOAX4zqTOK1FH6Z.jpg', 'ProductImages/RightImage/cI1tSKjReb1L4QD3d21nEudnkV83tqWsTKZDRvpw.jpg', 'ProductImages/LeftImage/ItBhKN1sZZzMnLOx42K5aq9NxmVxzhG9MR0lPn3t.jpg', '2025-03-24 17:09:31', '2025-03-24 17:09:31'),
(187, 61, 'Camo/Black', '#177a1c', 'Camo/Black', '#000000', 'ProductImages/FrontImage/gaWxZHHmiisy1JdjyWS0pc0sZuRKi8SomPuDkLuQ.jpg', 'ProductImages/BackImage/8giLArrBSbghzVOkxgZhFSPvGKysQlQRv45NEiNG.jpg', 'ProductImages/RightImage/maJyszVYad9GKtPYBmqlq6dOaZN4N9FyyluWC6ox.jpg', 'ProductImages/LeftImage/0ttzcCsOUX54XAlumFYldCk1YcyKLx4WpucfTb4r.jpg', '2025-03-24 17:15:21', '2025-03-24 17:15:21'),
(188, 62, 'Black/Scarlett', '#d91f00', 'Black/Scarlett', '#000000', 'ProductImages/FrontImage/lRFm645GF1eTUSRoxvc6RhAfFVz5OdKVDS0WZiuM.jpg', 'ProductImages/BackImage/JoRBYMszcdzgpmjIZwZW71Y1MuIqI6VX1B8u80sL.jpg', 'ProductImages/RightImage/mHeMyIwwDXe5jamonjn0mJQtw2ZgbVxB2Zvm7tIU.jpg', 'ProductImages/LeftImage/7vAyUBJ0wVRhBKlhD8ObLF6ODEPMxzqWBlLYdKjy.jpg', '2025-03-24 17:20:01', '2025-03-24 17:20:01'),
(189, 63, 'Choclate/Khaki', '#644f1a', 'Choclate/Khaki', '#c0b870', 'ProductImages/FrontImage/ThBkNUX3vjMdI1tJyQe7VeDa9IdeeUl6wt2PYIFq.jpg', 'ProductImages/BackImage/l4XKib6i0BzqrtYH1WHgcNW3cznAFPG863lzaEy3.jpg', 'ProductImages/RightImage/9E1gyFCpHlD8ac3NddImnan6TIYjL2BJsvC8EFVY.jpg', 'ProductImages/LeftImage/hVvT0B210rld5daD8HU4bm6ebT8u8MfFSdJKCdeF.jpg', '2025-03-24 18:53:17', '2025-03-24 18:53:17'),
(190, 64, 'Deap Navy/White', '#15125c', 'Deap Navy/White', '#ffffff', 'ProductImages/FrontImage/2WPlx04MVPikDHrIUUSD0QIl5pY2seNsMubtcX9I.jpg', 'ProductImages/BackImage/qZwOvGByrrfYZhsAogjYzgzRWrlXKcRemoFp3O0l.jpg', 'ProductImages/RightImage/D9hmmryLpOURtmsozcjI92OQ4rM9uVZFVWvYJbA3.jpg', 'ProductImages/LeftImage/pzTRfwj1RcfYAGEQ3Pff13s24Jhsf0zTrCFADb1b.jpg', '2025-03-24 18:58:32', '2025-03-24 18:58:32'),
(191, 65, 'Graphite/Black', '#5e5e66', 'Graphite/Black', '#000000', 'ProductImages/FrontImage/TUrzxM7pW3lm9V5t5STtlYrNLi8t28czn3HjW1KG.jpg', 'ProductImages/BackImage/lvYryLZk6p1cuQuuVNuOguImcc1fXMOLtmmy7Blp.jpg', 'ProductImages/RightImage/uh37rKYsITkWo15PeN43DeGmtrnuiETkDIX7vZQv.jpg', 'ProductImages/LeftImage/Pa9i06mWdZKUVIHHlwDXW3teqZR7mUqGrTD5U2Lo.jpg', '2025-03-24 19:41:43', '2025-03-24 19:41:43'),
(192, 66, 'Kelly/White', '#076935', 'Kelly/White', '#ffffff', 'ProductImages/FrontImage/cbpOPedY852ipGat0qDCJ39N6wo6khYTd7PkULCI.jpg', 'ProductImages/BackImage/ZQxHX9FFk6G16ZY2XJslC7dkS8UApV1kYnYpVKXY.jpg', 'ProductImages/RightImage/Selcdl8MHXsmW2aTpCWVKcxt1VSVOBmjyvhf6zhJ.jpg', 'ProductImages/LeftImage/XM0HtLzq9GVYUcR3xQF8bCHJX5cpHb2ye5dXBuDi.jpg', '2025-03-24 19:54:24', '2025-03-24 19:54:24'),
(193, 67, 'Royal/White', '#3a35d4', 'Royal/White', '#ffffff', 'ProductImages/FrontImage/u3T5E1JsWVhKlAWxFdzoiPIpVfjg9297zLJfqUl1.jpg', 'ProductImages/BackImage/yBk0WkQzoDFKMCqhtfEsnV6oA2eMdXBjOthzop9e.jpg', 'ProductImages/RightImage/0EJPcX6jXURhFCyA27aIeQSp6O0AGVgXIUrTfPm4.jpg', 'ProductImages/LeftImage/Ng2QdGZXzwhSCFSmkuDi8m8r0cCdHMQkq8dvgp8M.jpg', '2025-03-24 20:05:21', '2025-03-24 20:05:21'),
(194, 68, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/H1I997EgJubpvuLA9DmDwLg1ncf23WSnWBtVZMDI.jpg', 'ProductImages/BackImage/7X1YYxbdEI6Bu7rNSOG7wb9pVvb2Gw6oanK2IO2Z.jpg', 'ProductImages/RightImage/VYuxJd9F5KZORqZNqc25TGq7nYNgoqUVmb8fSJI9.jpg', 'ProductImages/LeftImage/ViQMyYzgGpcoViTjf0b6f5QEQNxiycSxaUGrPfUY.jpg', '2025-03-24 20:12:23', '2025-03-24 20:12:23'),
(195, 69, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/5AsWWNVMUXL04tEJPpbUhrISCK7AIXM0BflQdEkr.jpg', 'ProductImages/BackImage/HwRGxt7XaZoZDfsUwEpaBaUR6GdboWZgNXp0h0Xk.jpg', 'ProductImages/RightImage/tmJj8NF2WShNUuSGIqCcoWodc617SQqDk3VzSqTD.jpg', 'ProductImages/LeftImage/BZnyULvE7z4WjRk4fvFDDHKWLVbjFGLE7QjjtWXY.jpg', '2025-03-24 20:17:33', '2025-03-24 20:17:33'),
(196, 70, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/RfswZMKGE4Ei9j46erv86FOjQfnS9MoSxDu7u4OR.jpg', 'ProductImages/BackImage/AjH0wK44WhQVJb2Glptsn1lB3TSh4f5T1Ja0TzfK.jpg', 'ProductImages/RightImage/0hHcyGw1qGgVlTHys3AVx7O4i4Vqj6O0RsrixNhN.jpg', 'ProductImages/LeftImage/eLmpBWxvGXNOWxJFXLWA2Nllj4Ry9GzmZVVq8RuB.jpg', '2025-03-24 20:21:46', '2025-03-24 20:21:46'),
(197, 71, 'Army Olive Green/Tan', '#6d8761', 'Army Olive Green/Tan', '#96965f', 'ProductImages/FrontImage/aQ4qYRc0ucWRuFsQjGaswD46YcQiDTxVLmzrjOrz.jpg', 'ProductImages/BackImage/tDVzq0woo1UVoeeBp9Bw5uJ3XhUP1DsjwSv0swrR.jpg', 'ProductImages/RightImage/qHe6UYf6ZS7e6W3T6nVTLzS2UQsjzZCLBxniUONY.jpg', 'ProductImages/LeftImage/Dh1Yj17D6FVXth75eXXraC3jo2FzAiB24uXctAde.jpg', '2025-03-24 20:29:53', '2025-03-24 20:29:53'),
(198, 72, 'Black/White', '#ffffff', 'Black/White', '#000000', 'ProductImages/FrontImage/V1KGI97ceEwhOQRqjdk7ZudVDdkPkdmdvKWkwbt4.jpg', 'ProductImages/BackImage/9Aj7i4rKiOvlWyGxSmiy0cNZC5ZsixtnrGEZkIFY.jpg', 'ProductImages/RightImage/VKwasEbN0uLvkzoFoeoWNu48yzw20LBbSpUpC42I.jpg', 'ProductImages/LeftImage/tdm4oSLLgjRL8rlmYb40ljzFygwBjvQjLC8KcQBn.jpg', '2025-03-24 20:34:36', '2025-03-24 20:34:36'),
(199, 73, 'Charcoal/White', '#747d7d', 'Charcoal/White', '#ffffff', 'ProductImages/FrontImage/mKcc1GjHGHoJPtKHlra8xlCXjz6vFy5JZW35PBWR.jpg', 'ProductImages/BackImage/41SIpS0yX8liCvh6WHPKCLXSx7fOhwW7v2ZNlg4w.jpg', 'ProductImages/RightImage/D52fN77mcXTsBrmV7Mca8YmySTZ7N9BPcpBK04tF.jpg', 'ProductImages/LeftImage/vmqzn7C2cUz8Q93mZAfoRXCmOh8bnqktxYxow2f1.jpg', '2025-03-24 20:41:00', '2025-03-24 20:41:00'),
(200, 74, 'Heather Gray/Amber', '#c4c4c4', 'Heather Gray/Amber', '#edd95d', 'ProductImages/FrontImage/hj2VCNYGRAijU5pGBiLSV8NWdP1fyyMI1tBK576a.jpg', 'ProductImages/BackImage/7boyctrqunKhcTO1e9jFYUD4q8Cy0lLrcKCUOCBR.jpg', 'ProductImages/RightImage/rhuZPyQrGgIlfbXoUr2vzZwbze4HDSl5kMfVUwII.jpg', 'ProductImages/LeftImage/vzs10fIMePrHBv6x6XhBT0RkawtPGwv2ygYW1jys.jpg', '2025-03-24 20:49:02', '2025-03-24 20:49:02'),
(201, 75, 'Heather Gray/Black', '#c4c4c4', 'Heather Gray/Black', '#000000', 'ProductImages/FrontImage/CZpuz2AWxffDkWumwKqkU5qQ99KLUwnitPYirQyj.jpg', 'ProductImages/BackImage/JvJB0qZ9qOAiizWsFUk3tQaMmXpDYYfZU3kDYQsj.jpg', 'ProductImages/RightImage/NyiiRB7Tn5hLotpO6rDYfNNIVzb9GuxeCuik6B4n.jpg', 'ProductImages/LeftImage/mXcBZzXGSDsh7q37AxcV8ChIJzIWX8XQEjEbAWAJ.jpg', '2025-03-24 20:55:10', '2025-03-24 20:55:10'),
(202, 76, 'Ombre Blue/Navy', '#3e596a', 'Ombre Blue/Navy', '#15125c', 'ProductImages/FrontImage/pV51O95MiaOPKx3iOq2rCh6fsrFEfhlTayTVmI8B.jpg', 'ProductImages/BackImage/r1g4O5vKZOMrber41qhWwDXvO9y1QtSEuRsmtrq7.jpg', 'ProductImages/RightImage/1cN8BZQ3sJaXX9TVfs5UaSO8fLcPcE346DaHrzNK.jpg', 'ProductImages/LeftImage/iqk858czEagHH5Vt5InJTU012CQM8KBi97CP3Apd.jpg', '2025-03-24 21:14:21', '2025-03-24 21:14:21'),
(203, 77, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/LZiEzGNQcO2Gb5nFLGrsCaNYZXQRGTf1hzsCA4Ez.jpg', 'ProductImages/BackImage/8Wu9v5QffufTsz404eZ8diPBCT2db3Y4m8dCEPtW.jpg', 'ProductImages/RightImage/J4IzPsR8rw8yMTznOvG2ksL1FW9xUr4hYhBRRgeh.jpg', 'ProductImages/LeftImage/pKWcGEmhBtneFcSgsp1wGxaIWwJ4AfZ894b46eSl.jpg', '2025-03-24 21:19:05', '2025-03-24 21:19:05'),
(204, 78, 'Brown/Khaki', '#6b4c45', 'Brown/Khaki', '#c0b870', 'ProductImages/FrontImage/nFRAjFrd3VOtElF8DqTCbi2H0GtasfgizDgC9rhF.jpg', 'ProductImages/BackImage/W2B5vqLyJuZKrM85C3GxewlQWM5mjvYg6SuPcBXK.jpg', 'ProductImages/RightImage/LheNZ3i4HBRP8Ri5RfDE9Jgqo8SWiNAwe2jpIY7I.jpg', 'ProductImages/LeftImage/0BT4LigmnIGkW1SjKZNPnQ9QpfvUwSstprrCE09b.jpg', '2025-03-25 11:13:38', '2025-03-25 11:13:38'),
(211, 80, 'Charcoal/Black', '#747d7d', 'Charcoal/Black', '#000000', 'ProductImages/FrontImage/jtjlNdnRlXx6ERqNoRxb8FMg3IRnLv26pkRqcTtS.jpg', 'ProductImages/BackImage/1pcYX1vnA9HGiv0ZdlkBFNo2S8EFAzdWEvPX3hVP.jpg', 'ProductImages/RightImage/VCX1iYv2fgnpIAJQ0FdDBn4N06M5O26xyurMuIam.jpg', 'ProductImages/LeftImage/4A2AVgsbSp2xLqcSZfD5P75PGJDI1LWVZcXsqnBE.jpg', '2025-03-25 11:54:43', '2025-03-25 11:54:43'),
(221, 82, 'Heather gray & Black', '#c4c4c4', 'Heather gray & Black', '#000000', 'ProductImages/FrontImage/faiZG6slbhMrNSJ4jn11XdLn6aJkLMrnYUlqYYtj.jpg', 'ProductImages/BackImage/OElBqsMBweSAbjXzkibiAkaOSGYVx7VFDkGfBaUM.jpg', 'ProductImages/RightImage/M1MRCieEzVUWr7WHlb6TnLjjf9mrC4cJvcki7a3U.jpg', 'ProductImages/LeftImage/QYDIP1wxdKpfBWOdz0EktWRgXykrliDcdFWTb5mh.jpg', '2025-03-25 12:00:26', '2025-03-25 12:00:26'),
(222, 83, 'Red/Black', '#ff0000', 'Red/Black', '#000000', 'ProductImages/FrontImage/NGjzTF0JfRxJWH5MehPax9u5VD2A5QcDZkxc6n4w.jpg', 'ProductImages/BackImage/FGDqxo7kZsCJsstDkID1i9keIPRfSy2myPeT9Hp6.jpg', 'ProductImages/RightImage/81HxbQjWIfZTozmokR7ogKYjHEJS396VlclDMHhP.jpg', 'ProductImages/LeftImage/OGOTvK8ODo0ff8D8mVUSJiPpX6PPF0WgUCcDUnFb.jpg', '2025-03-25 12:04:27', '2025-03-25 12:04:27'),
(223, 84, 'Royal/Black', '#3a35d4', 'Royal/Black', '#000000', 'ProductImages/FrontImage/owRZkYlEus0KyVRBky76PvfulaptvKo8bc69AKXo.jpg', 'ProductImages/BackImage/z1gxS84VKxGb6mr9QdDmum5xWMQeF0w63aWL3NSn.jpg', 'ProductImages/RightImage/lJLPc0zY6Jf2FVJvEfu85SCjdZVMCNqGhvK4YTHy.jpg', 'ProductImages/LeftImage/fjLQmcOr0QfLGjzWMs14zqo1vZkBmD0PNZcl8DEb.jpg', '2025-03-25 12:07:49', '2025-03-25 12:07:49'),
(224, 85, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/DU14M4RRnctbpcUkXLcdRa9eRSXCmYF7DbARbJnt.jpg', 'ProductImages/BackImage/xMx5BbL3BgdgFkmMx0PODyNvB1afn38dBvAQjPDa.jpg', 'ProductImages/RightImage/tMKXv9ZLiQhGfEpScaIILM4tB6RnGOTmkvkH5yb1.jpg', 'ProductImages/LeftImage/wI2J2nAomqTOjNf9Kyi6y8HyzNkcsexaS8ZWXhMC.jpg', '2025-03-25 12:10:58', '2025-03-25 12:10:58'),
(225, 86, 'Black/Charcoal', '#747d7d', 'Black/Charcoal', '#000000', 'ProductImages/FrontImage/NhBti9B5xMAs680frToOxQHPTyqyzdJLAN9gFoSC.jpg', 'ProductImages/BackImage/Y5JXqYd0swV3MYYQTKIcmYlHDaqtmaKu0nTCchJy.jpg', 'ProductImages/RightImage/GqSigxMg0bYwsr70uyNXGspaXxi1U358VQXCLubl.jpg', 'ProductImages/LeftImage/KS3BW6ZZPrIetZMYDm2ZD0UUN1jz6ilq0CrxacTa.jpg', '2025-03-25 12:16:08', '2025-03-25 12:16:08'),
(226, 87, 'Black/Neon Pink', '#ff459c', 'Black/Neon Pink', '#000000', 'ProductImages/FrontImage/zMKUmLDS3DnUhAjDs5PcKFrJ3U7YuqHTOKUJ0vt4.jpg', 'ProductImages/BackImage/WVxytOUkwyw4RuF81bfSpXAmUY2xKnlgndy4Iany.jpg', 'ProductImages/RightImage/ZeI3Vd8SCEmBjVWtNGxpjeaub0ph5fT4Cz5fiy47.jpg', 'ProductImages/LeftImage/QR2KjPClLhEGxV4VsYHJ23prAc8kuDRgZvwlji0S.jpg', '2025-03-25 12:19:34', '2025-03-25 12:19:34'),
(235, 89, 'Blue Teal/Birch/Navy', '#367588', 'Blue Teal/Birch/Navy', '#f8dfa1', 'ProductImages/FrontImage/Ui1zkpR0EdmscXD5qpX0IijTiop2XjifdMoAtgIU.jpg', 'ProductImages/BackImage/ifLyF7dcgjNxSx5ebesVeYm9m3t3whHlhMiPpslW.jpg', 'ProductImages/RightImage/LSQ7bkNhBwyexEoBqKeqqIcweZlD08y9i4rG7WKx.jpg', 'ProductImages/LeftImage/X2NsDDNoAZGuRPEhU0ACcSbObMB3l01GTup8S0S7.jpg', '2025-03-25 12:24:03', '2025-03-25 12:24:03'),
(236, 90, 'Brown/Khaki', '#6b4b45', 'Brown/Khaki', '#c0b870', 'ProductImages/FrontImage/LCyRBxGS4eZtrzpyzAyfkKzWFVkZl1uvycFwThNm.jpg', 'ProductImages/BackImage/QXSeZViL1mRg1bTHZnD1NbSk5XM8iwVHnvG5IuzG.jpg', 'ProductImages/RightImage/ShxRCFxPHOJccUdE5zEwkCkdFPU87YLwAv23qOro.jpg', 'ProductImages/LeftImage/2T2iZufpoAQsGNKIZh6ft0FAHDgtCUvjalSO4mjo.jpg', '2025-03-25 12:27:48', '2025-03-25 12:27:48'),
(237, 91, 'Choclate Chip/Gray', '#685a4e', 'Choclate Chip/Gray', '#bdbdbd', 'ProductImages/FrontImage/kGQQjdcyGVU5dmQeHeepJEVL5lZlz1wc9NNzT5wO.jpg', 'ProductImages/BackImage/R2fdXHhrm0jPiWmRbRTIvqfSfSUmLGgDQxh9x4x0.jpg', 'ProductImages/RightImage/y3IC021R75KAvj5rtcKbGjPrlReS1QUsTDJGGSXw.jpg', 'ProductImages/LeftImage/CdSjTsdZvOKvJv4E2voAxZRcOftE7H64DbqzgoOA.jpg', '2025-03-25 12:32:21', '2025-03-25 12:32:21'),
(238, 92, 'Coffee/Claret', '#6f4e37', 'Coffee/Claret', '#7f1734', 'ProductImages/FrontImage/3INaYjR75jS1PItXJfCapJWNr1aDlBG8buzkVmBv.jpg', 'ProductImages/BackImage/5V0ITL1MuAFjt2IL9noMDOoCTyLcvmRTLHiTPw1o.jpg', 'ProductImages/RightImage/LPUk0s90mXMDD3fQSL7FbdRwRrcQbs0czkQTZDr2.jpg', 'ProductImages/LeftImage/oZg93Y8b8FEP1jQ32G6Zs2xIkmleeTK6xNsKXNWN.jpg', '2025-03-25 12:37:12', '2025-03-25 12:37:12'),
(239, 93, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/6suabggea3Yqe2Nj9NuG1CTlcfGB55eHEIGKZVyo.jpg', 'ProductImages/BackImage/YijufMSzrLY8h7SK945DhIM8sJjWsVNUelNBNpBD.jpg', 'ProductImages/RightImage/GE2uzXc42JYmvLt2ivVZeLaGDPeUdSufW3OKXKA8.jpg', 'ProductImages/LeftImage/JF6wSapzuhzgoW76oVl5pS0kWb1CDlP0Edoro1lX.jpg', '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(240, 93, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/lmuhElHLqBDyPiE0ORHL8YT4sYIIFwLDkZgh4zmj.jpg', 'ProductImages/BackImage/mYm24l8TW0L4abx4ubsF4pc298RX5aUclB1lsBo3.jpg', 'ProductImages/RightImage/8mgqxwUABPcOJAcmK4ODBzCNj6KUTTVosYPcRFLV.jpg', 'ProductImages/LeftImage/U9phL12YZBIHgf7aARCpNwDvRDhexXWwcxjg1uJh.jpg', '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(241, 93, 'Deep Navy', '#15125c', NULL, '#000000', 'ProductImages/FrontImage/YG4lvvNkKmakjowX1qW8URBs0Amg51IhWxQGZOG0.jpg', 'ProductImages/BackImage/6WJ6wFiE9J45gfn7bsLWvwzqjTMOHMmoVx8DdisD.jpg', 'ProductImages/RightImage/Pk7GGToztgiSVowLzVNavRPhMw7g3uXqOth40gYa.jpg', 'ProductImages/LeftImage/BjyHTs6PuKWMIsawkm6VZUV9F2nWgIULdNKl1PJE.jpg', '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(242, 93, 'Pink', '#cfb0b5', NULL, '#000000', 'ProductImages/FrontImage/8QNK3FmPDJLgtvGCzaNU0rvhena9RjRjNCsa4CYa.jpg', 'ProductImages/BackImage/WApE2PdZsllUqDf7qnWorlYxUTgcmdwEKwqR4Pht.jpg', 'ProductImages/RightImage/DyJQXNykagdpPiRsL39NnF0FXupBqRLX2uv8JHwV.jpg', 'ProductImages/LeftImage/uOEjTfeg5iiiC7JKUKl28ktUN79ibVihwheWSFA6.jpg', '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(243, 93, 'Grey', '#9a999f', NULL, '#000000', 'ProductImages/FrontImage/FWqEAgv7Rs89p5iYMl5xjakHyVojiPPEigxuZJ7K.jpg', 'ProductImages/BackImage/ZdEWXy1VXI2B5fovW44FA0xk8Q42hH0YDT1ZYbNY.jpg', 'ProductImages/RightImage/4ulfYaa9cRH5zGCTrFdI74pA6j5vDY2rEmUHtk2y.jpg', 'ProductImages/LeftImage/f1cHgHz4uVdNBH1y8LahKFOhSwMI8qyA3rgH5Oak.jpg', '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(245, 95, 'Dark Laden/jaffa', '#415236', 'Dark Laden/jaffa', '#e27945', 'ProductImages/FrontImage/xatJd6DAiXJ3n5BCG66yNg1o9qSkDSx0f8Ub1BhP.jpg', 'ProductImages/BackImage/HyWLvNqslnQsuw5DAMFXRsOUZPgVaam6OgbzhugH.jpg', 'ProductImages/RightImage/ElsdCqCXAZyUqAtZdE7nENat7kqTlhBbFcyrVqNj.jpg', 'ProductImages/LeftImage/tCaq8zfgbYHh40J9Mwc47o6AtKuz4IH1boAudvYk.jpg', '2025-03-25 12:46:49', '2025-03-25 12:46:49'),
(246, 96, 'Deep Navy', '#15125c', NULL, '#000000', 'ProductImages/FrontImage/XBboGZXIhg2hnNDffZHPW7IWXXgrQmxxoD3lkTeZ.jpg', 'ProductImages/BackImage/laIU5YtIoqk18avGhwsMIai84TPObq3YbZEs3ayY.jpg', 'ProductImages/RightImage/dWueYLQcBZkMuLulZGyRvbSVgdLYzf42XftLTdkt.jpg', 'ProductImages/LeftImage/wMtnPbid2I4EzTc7uqxLygpdrX2n127jsJoILYXS.jpg', '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(247, 96, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/x6jVCmQ1rZnrIu16nbTxRKi6RhhEzc0MzN8eI1A7.jpg', 'ProductImages/BackImage/nsD50Kb6sfvkEo8uBHU0wA8mQMdyB4ULv9SORCWB.jpg', 'ProductImages/RightImage/g3t470jG05ci1b1JRTFsqGwh9Dlev8C5npBHha07.jpg', 'ProductImages/LeftImage/ALaWUEkLSEnM7P474cyeY2c0gKE4doRAbG7Tk5mY.jpg', '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(248, 96, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/zJDOB5Wk0K5XuwlKIYGhPLuU1K4g7aMypHW2svK6.jpg', 'ProductImages/BackImage/l9A4SE52dDsVdTrvKKBH1j77VRQQIEXhxPXjsyAD.jpg', 'ProductImages/RightImage/I1e017UZAreK9Co4fZsLy5IyeoptkhafPp1EdCKn.jpg', 'ProductImages/LeftImage/275TQpxuhKKSjjUpQU5rLLt0gfxOekicDV11zh7Z.jpg', '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(249, 96, 'Grey', '#cccccc', NULL, '#000000', 'ProductImages/FrontImage/o5WadjO1ujHNP5M9pEH4NNTvBbrPBuWz58WDeg9z.jpg', 'ProductImages/BackImage/eiFvLtQOqrDqBeaNX38IUsMcs6cOpwlh9EESQu61.jpg', 'ProductImages/RightImage/3t0woDbNhLIzvLkZWNB1NkRCE6q736FbKk7qci8B.jpg', 'ProductImages/LeftImage/ugXVSfhalCTfZ3ut53XIOeXJ9clKoCTYJEBCE4To.jpg', '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(250, 96, 'Pink', '#ffc3ba', NULL, '#000000', 'ProductImages/FrontImage/1sP5dIOC5FgZhWmUl8tpWy07qQBYuptIv3badldI.jpg', 'ProductImages/BackImage/Alw44Ro8LlTMf1P7AxLusMTVV2gDsJT7mIrQAQSN.jpg', 'ProductImages/RightImage/3GhxVioVw3RR6CPo0Zx3g1BhXWNd9SmdYjgd1lNB.jpg', 'ProductImages/LeftImage/509rVFOnctP6PKUePLLvfmzc2AEStWmzR9gqljAw.jpg', '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(251, 97, 'Heather Gray/Birch', '#c4c4c4', 'Heather Gray/Birch', '#f8dfa1', 'ProductImages/FrontImage/aFhlSoRCNNsz9PcSGW0w6tJQXihHgtkrD9Ykzq78.jpg', 'ProductImages/BackImage/tGmhNjoxGFztmXu6UoJVMFJyhby0NoVIDyY1secz.jpg', 'ProductImages/RightImage/bUMIFEb5glYY77xVwVUWGmKfUVNHIc95jzKaOSaN.jpg', 'ProductImages/LeftImage/sH7knLYtSaf46OWEjXEmLmNXoJqcs4RmjdVSjgr6.jpg', '2025-03-25 12:56:01', '2025-03-25 12:56:01'),
(252, 98, 'Heather Gray/Dark Charcoal', '#c4c4c4', 'Heather Gray/Dark Charcoal', '#333333', 'ProductImages/FrontImage/C4tEhORhK02x1OusrcbE9AGOZKWXtCHbufs1TYjR.jpg', 'ProductImages/BackImage/JSbwZjxeCJwNeKNZ9kqh94hJ7wNyqkhSqONv4m6c.jpg', 'ProductImages/RightImage/wOVA89xslQy5iXMgZf6G1kJBZJQncq7Eolyx9AYu.jpg', 'ProductImages/LeftImage/s3U9uQN77i92DEW1fTkgePPV3jsb7bhteJlOcOCU.jpg', '2025-03-25 13:00:00', '2025-03-25 13:00:00'),
(253, 99, 'Heather Royal/Silver', '#307fe2', 'Heather Royal/Silver', '#c0c0c0', 'ProductImages/FrontImage/FAH3PGgIpAhZ3J6VqcUYSDIYeAnDmW9rw0y0LHml.jpg', 'ProductImages/BackImage/SVLrqFXp9ldK3uXjFZgvVPcNOmKeLq1arEEmNc1c.jpg', 'ProductImages/RightImage/GbucysoOonZDYxgmTKFWq4tRYp723aLUohjUzM6C.jpg', 'ProductImages/LeftImage/YH9UO1GiQAr4T8Wtwb6NTl2PRFDIDJeHl8NWBMVA.jpg', '2025-03-25 13:03:48', '2025-03-25 13:03:48'),
(254, 100, 'Hot Pink/Black', '#ff69b4', 'Hot Pink/Black', '#000000', 'ProductImages/FrontImage/ad1P7LkWdmab1S3xsdKgrrSTUA3tK2e8R88ud1hY.jpg', 'ProductImages/BackImage/pRciGHx6tnShV8p6idp4PoWpJtlbMN32AsmjgPe8.jpg', 'ProductImages/RightImage/5UmULnyS08MsenHm8vuLhh3gmxvXtxGzligdykRc.jpg', 'ProductImages/LeftImage/LeYddimgTAzsoe44LXt4ypoCfp6maxvZRbjIYiNf.jpg', '2025-03-25 13:06:53', '2025-03-25 13:06:53'),
(255, 101, 'Loden', '#415236', NULL, '#000000', 'ProductImages/FrontImage/FOWw7DXGu8BMgHqUJw0vq55uL9Mtg9nWkPDrQowA.jpg', 'ProductImages/BackImage/K7VrYiXLc6oNiVPJfOWvbGRpplOv4i5QzNKtOjQL.jpg', 'ProductImages/RightImage/RJYMZ7ePG6E5RWarH2OAhTOEinZ14TEnWLEvPAsh.jpg', 'ProductImages/LeftImage/GnUzR4689s7M4gj9jEPHIi6X5ERWK0TnxNVyUtbB.jpg', '2025-03-25 13:10:21', '2025-03-25 13:10:21'),
(256, 102, 'Smoke Blue/Aluminum', '#8296a6', 'Smoke Blue/Aluminum', '#c9ced0', 'ProductImages/FrontImage/MvNbYJMptviRk27Fr5I9gGCtqpWMsPOBUy1aewZJ.jpg', 'ProductImages/BackImage/sWPXsG8IlFg6Xtg4xllansiS6invNlwi2sgL102q.jpg', 'ProductImages/RightImage/udSLnke29sWPK6qkYz6SQu034KIM1f1mnDwL4LRQ.jpg', 'ProductImages/LeftImage/JEkEbnfpqFczo9GvH5C9uPGThzM4f26uXjMxNum1.jpg', '2025-03-25 13:17:08', '2025-03-25 13:17:08'),
(266, 104, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/hcJocSLhtLuCXPkV8CbuR2DTsHgfdEMGnplkckju.jpg', 'ProductImages/BackImage/e2w6fWzQrJY4lItSfSp30YsFlsz5Xaf6BmEiYQPA.jpg', 'ProductImages/RightImage/1wuKAD4A1Cx2mCu6xRg78grfdRCdRSh17LB6Bmmo.jpg', 'ProductImages/LeftImage/LvVrp6r7znYBFLAIxV1BWqQ4lvOe6Uj8NrRPlKAZ.jpg', '2025-03-25 13:20:24', '2025-03-25 13:20:24'),
(267, 105, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/O849gOM2Qw7gFeiaZcI14DrPsRAb79KsYYhiRB5g.jpg', 'ProductImages/BackImage/0T5TwLmoDPLrPs5HyHp12fmNQlrCOyPg3CJyl1Kb.jpg', 'ProductImages/RightImage/VrXBibMEmSMqL8nAJni4uH5OqZwfYUDE3xCYheBq.jpg', 'ProductImages/LeftImage/rEs3MessfAPH625u94JA8DvRfU7ANeeFib9bmbu0.jpg', '2025-03-25 13:23:59', '2025-03-25 13:23:59'),
(268, 106, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/SDKRwSTr5wnt6mM7vfInyEfNflV2QNoqjnkCNBf6.jpg', 'ProductImages/BackImage/xu8JZhRntR7CoiM6T1McKz0Q0Xe1NGpXcS6gDq8L.jpg', 'ProductImages/RightImage/FEZedk2F29kUN740CDfNYOeB8eFxYZKrELZknycq.jpg', 'ProductImages/LeftImage/DCwAtiIHTQHV3mcHq0rR5t0MVjUEI013XWd4bned.jpg', '2025-03-25 13:24:00', '2025-03-25 13:24:00'),
(269, 106, 'Grey', '#8c8c8c', NULL, '#000000', 'ProductImages/FrontImage/C0R3m77ab5v8tKVGF15TVPUPB91KKCwFNrtROB2M.jpg', 'ProductImages/BackImage/ZSVfpAhfR0clMMvbzmxeMmVEMvFloqoovoOqHhLd.jpg', 'ProductImages/RightImage/9rmBHCmP3Gd9J40suvT9tgHG2SKce3zxWj39nzRc.jpg', 'ProductImages/LeftImage/t1AipysRgMWukZKHfaTakYKds3lfSG1y7zINXpCV.jpg', '2025-03-25 13:24:00', '2025-03-25 13:24:00'),
(270, 107, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/0DUrcumhnmtCilCQylCKZziWE9DK4AxII9S0FTCZ.jpg', 'ProductImages/BackImage/VyLMqwivFNgd0T4riwKO2ooRO0oJ9a0u9KximcDP.jpg', 'ProductImages/RightImage/udnQrW0CjwgX7JwxAWgee5pWDuxW8kPvpzq2UGHz.jpg', 'ProductImages/LeftImage/o0E6DdD2S3jy6Tg6kE17EQStv3gGbKSTtQ9KcNkq.jpg', '2025-03-25 13:28:04', '2025-03-25 13:28:04'),
(271, 107, 'Carcoal', '#47484a', NULL, '#000000', 'ProductImages/FrontImage/Pl8eKLSy1VJVU0kIgCuVpix6k4jhe51UgN5ESdNz.jpg', 'ProductImages/BackImage/mANZRTm3hk0HErkRLSIQF4yXlLryvPnVSgIeIzWO.jpg', 'ProductImages/RightImage/EJdoLIUBrSlGqkbezk0oSmAHJKZF2jG8gOK3NIkN.jpg', 'ProductImages/LeftImage/bctmI6q6B71GqvFszajBo4wzVygp5Uqj9TOmW2vq.jpg', '2025-03-25 13:28:04', '2025-03-25 13:28:04'),
(272, 108, 'Multi Cam/Black', '#6b665a', 'Multi Cam/Black', '#000000', 'ProductImages/FrontImage/syL58usUueypeEjMJ62lqapjEhZEoAABo6r3Zflu.jpg', 'ProductImages/BackImage/tJoBGgpLOPs09VCjBRnPpy2uQk5SfgRcpuNVXpy7.jpg', 'ProductImages/RightImage/j1rIerGMn74qlqmPMLdNPKhwnZ7fLhAMFsikdMqR.jpg', 'ProductImages/LeftImage/kDzNovvH2yO9TKBxSpLMWo2GltP7wuzX5EtPJ1mN.jpg', '2025-03-25 13:30:02', '2025-03-25 13:30:02'),
(273, 109, 'White', '#ffffff', 'Grey', '#bdbdbd', 'ProductImages/FrontImage/pqD7kV6wkdeasyp2fdHX210Fxpq7RJsmkygIL2oH.jpg', 'ProductImages/BackImage/DMlWU3aDR2kn2NrlGNnWW4VdGIDufgq3t1SQb9QV.jpg', 'ProductImages/RightImage/mBxdg900m6ebwHtibViFHvKEQtPET06BlTxhfzVr.jpg', 'ProductImages/LeftImage/KNfTcbQl7gAAFWZwrcK89IMnTcrBThKoual6T5xf.jpg', '2025-03-25 13:38:04', '2025-03-25 13:38:04'),
(274, 109, 'Charcoal', '#747d7d', 'Grey', '#bdbdbd', 'ProductImages/FrontImage/c3KtTRtjXKUtXLzXHtM0nrpt94CGr1o33T3QuZE6.jpg', 'ProductImages/BackImage/72lKE7KMYX42kOyj09btchMtkENTRvPz6HOM3upI.jpg', 'ProductImages/RightImage/bUezpqqc5oJ3vIeSpQjgff9MLsIeJq27d0JQE8ku.jpg', 'ProductImages/LeftImage/zfYb6J5zejt9PD6scMvzslAxr2bPHakz9J7XQnJC.jpg', '2025-03-25 13:38:04', '2025-03-25 13:38:04'),
(279, 111, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/l4pYgLmuNgXzdyiH6lxt1FQQEGKRHglZSTSyG4Vd.jpg', 'ProductImages/BackImage/wj2GwaNtjVZaXgD1p8UHv3BalZ7kVwH9p5cU4eg2.jpg', 'ProductImages/RightImage/zxDPpKFr9Isu9gPGHscGJOm6jQzk3TvGGpB59oWu.jpg', 'ProductImages/LeftImage/xUiOyFdzSnGX0wyv8PBmnhoSDpK8QJzEaOlDLEf0.jpg', '2025-03-25 13:45:40', '2025-03-25 13:45:40'),
(280, 112, 'Mosy Oak', '#575757', NULL, '#000000', 'ProductImages/FrontImage/K8hyPO1ZSyoRKgTF1c0Axe1gFi2UBheDWD9pLbzU.jpg', 'ProductImages/BackImage/CCBP19o82jrjXZiDrN6CCxBgWs1hoTMCg5zpZXrl.jpg', 'ProductImages/RightImage/a7heroYAStBSsTc4OJVKJ7ZPfzhCtEjwv4rRqV7y.jpg', 'ProductImages/LeftImage/BAbs0YzJn5N3eXBxlWqMxIguRKHCMlAroe1VYxHT.jpg', '2025-03-25 13:45:47', '2025-03-25 13:45:47'),
(281, 112, 'Real Tree', '#75653e', NULL, '#000000', 'ProductImages/FrontImage/ydSPLzNCVzuFbFsRNfoVDF7MPwCS2OeK3o7APKAA.jpg', 'ProductImages/BackImage/pPsHGLyvFU5bEmRLFdvKS6VAgmPO94xEWzzd5W4Y.jpg', 'ProductImages/RightImage/4leNTUm2zPx0FJ309VzE1kREhjF1lY3xsoH4Y032.jpg', 'ProductImages/LeftImage/Nc7ifcvLVXKU5wYl8usuFXVi84srH2nh4zdlOpsc.jpg', '2025-03-25 13:45:47', '2025-03-25 13:45:47'),
(282, 113, 'Cyan/Black', '#00ffff', 'Cyan/Black', '#000000', 'ProductImages/FrontImage/bbyySSyn8TKsaURtPeAD2HubgVxEJwfetqxFF4Z3.jpg', 'ProductImages/BackImage/Ia9lMUU09tq73AaFjuZNifXiOu2DYEM9xTXUc8CK.jpg', 'ProductImages/RightImage/5inCBsMigOpQ85ftwsLb3YANhaXkKiiOJAzULD24.jpg', 'ProductImages/LeftImage/klAoZOtCD5Bt3KQKvG3hQopjQMlB6iGVRJAtKCAX.jpg', '2025-03-25 13:49:01', '2025-03-25 13:49:01'),
(283, 114, 'Real Tree White', '#ebe5e1', NULL, '#000000', 'ProductImages/FrontImage/cCQjw4rNNhtEiI63fHelprbIoQfH8MFHbsdybPFs.jpg', 'ProductImages/BackImage/9VsVEmFnqzLHeo3bYGm4r0A70cvEmBmJQL20RS4D.jpg', 'ProductImages/RightImage/SMHbpCUMEApP1jIaTyPI8mr3bJ1doSksGXmrZHDD.jpg', 'ProductImages/LeftImage/ac1ifHAp69djPXHldUTjiRP8EEBqscKD3xgwEigE.jpg', '2025-03-25 13:57:19', '2025-03-25 13:57:19'),
(284, 114, 'Real Tree Ap', '#283326', NULL, '#000000', 'ProductImages/FrontImage/zmO5EhadHsteVWbH95ljVvTexV49epNdmBhJqjad.jpg', 'ProductImages/BackImage/DvU1p0DJCMxss1g00xmBGUcQUHWKuSBT0j8b4nCA.jpg', 'ProductImages/RightImage/qTeK6kRFLsV5SRNYu6NE4lH6trjtP42gi68ev84C.jpg', 'ProductImages/LeftImage/yyP0aNJVPuKxXnOUkSbV4UXAz2eIB6wh1OIYCUrv.jpg', '2025-03-25 13:57:19', '2025-03-25 13:57:19'),
(285, 115, 'Dark/Gray', '#636363', NULL, '#000000', 'ProductImages/FrontImage/N606AL2k09QX7daMCaO3ePr49MWS2ueoAU5hbRcV.jpg', 'ProductImages/BackImage/6iKItZKF5tmuwFjVruk0k3Bn9QjiJlzJcesvX35N.jpg', 'ProductImages/RightImage/XGa9e4OTY7iSrOuFx1uBa2ZCIPYMr6KxyaEvPf2H.jpg', 'ProductImages/LeftImage/PK02XaAlsksxe2zjg743kafB3Og1rrhpdNrSy9we.jpg', '2025-03-25 14:00:31', '2025-03-25 14:00:31'),
(286, 116, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/rgykv9zS1RF5x4IuWGBIUufm9qRodohYWvCujw6c.jpg', 'ProductImages/BackImage/bqx1hiobgE6cI8ASCYtX5LxjFvLpSIxItJH0cOFU.jpg', 'ProductImages/RightImage/nkbjgbLoWNeKlWcT4CXtK1FbXq5auRPKHww4zMto.jpg', 'ProductImages/LeftImage/3CVScGTxGX7KxmXVIqqPdsvsEbfaRQarCJWikNQz.jpg', '2025-03-25 14:01:30', '2025-03-25 14:01:30'),
(287, 117, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/qfHk1iWWLVEEmtA5cxiOaajlLqoVRhHBhyavxqsM.jpg', 'ProductImages/BackImage/g4tCKxPmjxxrgp4YXO32VDp5VPmPj1NvuXoxjzT6.jpg', 'ProductImages/RightImage/DsTzxZffcPopnlg5d7nwaxiWKHyus3CRGjtgq8pJ.jpg', 'ProductImages/LeftImage/1rObk5j2dqXiTna0QiTKyQ9jy9v3dDAUrDpvDb6d.jpg', '2025-03-25 14:04:01', '2025-03-25 14:04:01'),
(288, 118, 'Grey', '#cccccc', NULL, '#000000', 'ProductImages/FrontImage/NXDpSAkt7rqcU0coN89YlsFQmUQQM1aw3foxLAzs.jpg', 'ProductImages/BackImage/zhQLm8amcCiCOhbcbJnwKJB7I0YyS5pPR7oJP1YY.jpg', 'ProductImages/RightImage/3Pyd1ti2gWF7rBBBnqCxuZqFWrTh0iHMgtnQvTQC.jpg', 'ProductImages/LeftImage/9DKFjMUh8VqIy45uy9gOSdulBR9PdzuaCcBMDiIP.jpg', '2025-03-25 14:07:04', '2025-03-25 14:07:04'),
(289, 119, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/r6KHr0t1mXLD8gYxnKN9MNNVYbPLpoVS4hdawvVX.jpg', 'ProductImages/BackImage/RyKRqMllSttvI50mzTAr9KiIq0oO5qBAm2AZnpEv.jpg', 'ProductImages/RightImage/m8W9cRSMUMBWPYaDkWKRy1VzxPLnsYI89qRuRTLg.jpg', 'ProductImages/LeftImage/8BIqZKAfDYsKXIeV1uY70Kbmu7klfSJUFDER7et6.jpg', '2025-03-25 14:07:57', '2025-03-25 14:07:57'),
(290, 120, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/jB5xSLgyvGKvbBDMPa7XuM2FjWUvN44GKGBzuWIm.jpg', 'ProductImages/BackImage/bb0vuZ6fsYwrLOjtaDe3mD2DhVXTrlgtVJkbBUwP.jpg', 'ProductImages/RightImage/kU556kYISI1jxB3uPMmEbWQ6elIYiMKDGmP2hCNK.jpg', 'ProductImages/LeftImage/ckb6HbAyIhP5IDxK0VR3nosQNioKw72aZnD5UuZr.jpg', '2025-03-25 14:10:52', '2025-03-25 14:10:52'),
(291, 121, 'Aqua/Stone', '#00ffff', 'Aqua/Stone', '#888c8d', 'ProductImages/FrontImage/hNr8hag0zS7zp5WiNy6AcjjLa1XXhveYmD9mJZIt.jpg', 'ProductImages/BackImage/ZMrewJHjIeWbyUShpjksAg9XnwYLHgZLykBlAtZB.jpg', 'ProductImages/RightImage/BNPKrbX7L5ixKZcJcguVLyrz3NR9c6Dn5L0w78qI.jpg', 'ProductImages/LeftImage/12MmSIqdcLu2wHi5MGsqhzyBHKIaSrXt0jxcckR7.jpg', '2025-03-25 14:12:18', '2025-03-25 14:12:18'),
(292, 122, 'Forest/ Stone', '#014421', 'Forest/ Stone', '#888c8d', 'ProductImages/FrontImage/KOnGlrEVJ56eTbmQpDXJlU0FDfPKxCcR4Qiw41kV.jpg', 'ProductImages/BackImage/adqxnx3xO8x5B3kO4R1UairzaymaMHDzQWhzmxVa.jpg', 'ProductImages/RightImage/M7SAadXDkHjBpXYztpM0P3qN3bChYv1ba5NxaTC8.jpg', 'ProductImages/LeftImage/rQj0KK3bIBrOMQM8A5mScUryabbIZOzJcX6rr6JL.jpg', '2025-03-25 14:16:19', '2025-03-25 14:16:19'),
(293, 123, 'Charcoal', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/I7upIcqZeg0UM2rDDK4jn4vN58ZTW1172zVNRXuL.jpg', 'ProductImages/BackImage/scnYDyJrzpqYWv2ZMzcqDaCMUHg964ejsslQKbvf.jpg', 'ProductImages/RightImage/HSRylQMZY6mbEPhA1Tk8ALDtjgG4Q1PGwzb5Kf2Y.jpg', 'ProductImages/LeftImage/bYlwFYkfm0UhZpu0OOIYIq7BNFXcvOkawfldyYZe.jpg', '2025-03-25 14:16:47', '2025-03-25 14:16:47'),
(294, 124, 'Mustard Yellow/ Stone', '#ffdb58', 'Mustard Yellow/ Stone', '#888c8d', 'ProductImages/FrontImage/hMJrjz777PPWKIDmHHcLur9TOB1uX0lwQMFOd5pC.jpg', 'ProductImages/BackImage/SfmhSXuFaPeulAUALfJxNVyTUIHLJ7U504YsYeGI.jpg', 'ProductImages/RightImage/c8z5qW0UBOj6OMPpnDaTtoPBBU56BwHlpU3lilxz.jpg', 'ProductImages/LeftImage/l1XP8oN84gOJhglv4I5yXCnLnK271dzCXOk1O6sr.jpg', '2025-03-25 14:20:51', '2025-03-25 14:20:51'),
(295, 125, 'Navy /Stone', '#311e8f', 'Navy /Stone', '#d6c994', 'ProductImages/FrontImage/JV2IyWSqVVD7zWbEcRin9icKPLhVlqQgl1AuJq1S.jpg', 'ProductImages/BackImage/kM7Q5LQTFGwAd1cteV6xrtG5yecAErTccsSQ8j45.jpg', 'ProductImages/RightImage/JxCEK1Qy4qFiT8VjmZW9RigApAb5i8TAiWoIlrzj.jpg', 'ProductImages/LeftImage/ABrBgy5bZNKIRroDDDEybqv6ioNzv48302GcRLtB.jpg', '2025-03-25 14:25:32', '2025-03-25 14:25:32'),
(296, 126, 'Red/Stone', '#ff0000', 'Red/Stone', '#888c8d', 'ProductImages/FrontImage/R7VfMOeoFZ757CLAP6OZxEDXcq6lU9MaUG8Ix94a.jpg', 'ProductImages/BackImage/3r5brFjuCXyr5ov6fqhjqxdaMJpp8TVzCm5e2LLB.jpg', 'ProductImages/RightImage/Rnd3raypiPrRo2YA9cUyFjnyym1JycDtY0MAPD8f.jpg', 'ProductImages/LeftImage/Vw7cdPwuCFvmaAp49WQKkOEGinMft63fHi1jrbo7.jpg', '2025-03-25 14:29:48', '2025-03-25 14:29:48'),
(297, 127, 'Royal /Stone', '#4169e1', 'Royal /Stone', '#888c8d', 'ProductImages/FrontImage/tjtyYinQLkvHhTAN3ePU0Es8Dd86SzbP338t4w3F.jpg', 'ProductImages/BackImage/JswtFoVYxEDmtdEADOIJtOg4IsqfePXs87PAnJ4f.jpg', 'ProductImages/RightImage/irGOJrWnbQs7aG6JSFjSQxye54KNFbFGBCwjXRAB.jpg', 'ProductImages/LeftImage/L8fETP6B8AN9gZFGNFRd0qFO57RKfcaHdaUXDVfi.jpg', '2025-03-25 14:33:39', '2025-03-25 14:33:39'),
(298, 128, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/OZPe2s3Egd1pm0aELxpoQeReLKKi8rgWXJp64tJ5.jpg', 'ProductImages/BackImage/CaR1w1wxZ9Cg1PVb3NbbXx1gVJi6OSeeNw0Dxch5.jpg', 'ProductImages/RightImage/blPHeBb8vCQAaJcRcAFNTv0EffxIWY4g7CeD2qaT.jpg', 'ProductImages/LeftImage/6wVkrkEZlrBgvXSeCyy1ckTrsVW32OV8vQuDufxV.jpg', '2025-03-25 14:35:34', '2025-03-25 14:35:34'),
(299, 129, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/77zECY7zazx3eGHzkqRVSc96oPzTmE3kX37W7iz2.jpg', 'ProductImages/BackImage/vH6RDWGD48bGqJfyGijJ3rqxzOOAA9MlWFLhDCJv.jpg', 'ProductImages/RightImage/kgMq3RkQJl9AEAjoIR6ytHXtzsni2BNcN92x83oR.jpg', 'ProductImages/LeftImage/nvbyZGjPJ2UCIMGM279ZmTbGpfuDWaioWlscaXeB.jpg', '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(300, 129, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/ppu0PXxp1DHTePRUpIIQ0QqfoOPfKk0qDX9iu6Uh.jpg', 'ProductImages/BackImage/UnQyh3RN6LrMJMsUTdc7XDw7wsCIFEx88VoTPneY.jpg', 'ProductImages/RightImage/x1ZDWHWtPUNaZJDgTnUweRk9UP1wKnD82FIFFLVS.jpg', 'ProductImages/LeftImage/MRRn4zyoo6Ee6Z9gIrTUJgZst1mq0RFMcYH00yZx.jpg', '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(301, 129, 'Gray', '#636363', NULL, '#000000', 'ProductImages/FrontImage/rgdAPKVCoO5WxKBYw3DPIYq0YqpoBVFboPzGFLqX.jpg', 'ProductImages/BackImage/hnC2IIHLnSJ1EtYtQkbL1cCTH6sajkdSbQPkVuVw.jpg', 'ProductImages/RightImage/qyXuOBJPX1UmX2dyXM7AJ5Vxb4T3YBxkPtgmW1U6.jpg', 'ProductImages/LeftImage/wz8wo9GJU7ukvBNgM6THM9oOyO1dW78l4MAaXqj7.jpg', '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(302, 129, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/jxa2KhsvV2uA03ZIjM3dNAQtCDhJTzrVf1BymEbH.jpg', 'ProductImages/BackImage/6zbtkiYBagLMhTctLsgkgujhotkrmDJFiiji6sQO.jpg', 'ProductImages/RightImage/xm0IQ22eKDlf4P7y5qrpd4Y4JwUiITinloCAJtYR.jpg', 'ProductImages/LeftImage/X2niRQKN7qRf7OMBfdRrl68ccfrDRQUBkYbI2eOz.jpg', '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(303, 130, 'Black/Neon Green', '#a7f707', 'Black/Neon Green', '#000000', 'ProductImages/FrontImage/7W0nBrNF4Jll1zb06OI8HUzBANIQr7kzKxwlT35Q.jpg', 'ProductImages/BackImage/qsP6rtWGRhYUK7GlgzcYtJQ5zM1VMVbhwD5cBj2S.jpg', 'ProductImages/RightImage/zp2ggBbgAWywotgxLXwd2UWFLA3Heejl8tQFKxxH.jpg', 'ProductImages/LeftImage/YnXZqsRJ3xl50tQTBlXZitW077lrFvlVY2ngNTq2.jpg', '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(304, 130, 'Black/Neon Pink', '#ff459c', 'Black/Neon Pink', '#000000', 'ProductImages/FrontImage/htRecMraX0h4c1Z9IHxzM8VcmbXSqAgS9ubMkl4K.jpg', 'ProductImages/BackImage/rQlEQU6buHE0DD1Ua4Z6knNRC8hXoWI9e9E5OA7S.jpg', 'ProductImages/RightImage/mH8dLfNfYQJDdhJRgyjwGWu4UchOee3WS9YGVJ9j.jpg', 'ProductImages/LeftImage/EjBe0HbB1a7IZxSR7EisEtzz3aaU9SbTxZ8HzG4A.jpg', '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(305, 130, 'Black/Neon Orange', '#ff9436', 'Black/Neon Orange', '#000000', 'ProductImages/FrontImage/1GG4Tpt0VKSosq9hJGTwMk4iVCjnqyREu5rRzCco.jpg', 'ProductImages/BackImage/3SBurOCHBvcy5qln8R0mQanOZSkCfsjl7v1SPfch.jpg', 'ProductImages/RightImage/0ZnG9NQCeIXTzKlS2NIlNZO7iSVxxSfJdcEhPx8S.jpg', 'ProductImages/LeftImage/Q8izyMRgx4CnEecxy2U66PPoN3kiYo4LgsBrFP34.jpg', '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(306, 131, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/MXylOv5WjIJAvi0WZwtf5kMiDunKcOdzcnrJ7t2X.jpg', 'ProductImages/BackImage/xPqQv59A73TrudT5NzerN5Osppfy68mKcexkefDB.jpg', 'ProductImages/RightImage/UzSi2c6KcF8BMTHlKJPQvWbFhD1F9JNxarcNcM5c.jpg', 'ProductImages/LeftImage/GmjiDNqpLOJdH5Hmbeu8CQdVPV1WWEidk8umEKKJ.jpg', '2025-03-25 15:47:01', '2025-03-25 15:47:01'),
(307, 132, 'White', '#ffffff', 'Black', '#000000', 'ProductImages/FrontImage/G3kAR45Z33WH1y4edZ43rZgm6t9M2VxY7VmxQVEL.jpg', 'ProductImages/BackImage/90SyUbi45F9A5uln2MsKzncqXKnI0BEKEWzniuQQ.jpg', 'ProductImages/RightImage/NlRuQiDaT3YjfRAHNsLDyEfYkKcK48e9fAY3jlYb.jpg', 'ProductImages/LeftImage/GlM94AlPpUdeZlZXIBNE1k443lrPCNHzhrN2zGOt.jpg', '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(308, 132, 'White', '#fffafa', 'Red', '#ff0000', 'ProductImages/FrontImage/vdCaEIXsk7yB7e9JemWDbMMoOko9EWNWrbJDiSkk.jpg', 'ProductImages/BackImage/kWroBCEsWbEmQDhFoZNDHe5SHpnUQyBMJMbt1U5n.jpg', 'ProductImages/RightImage/zovhHzg6ET2astYIXjv76tIwmIwBD6TKFyG1mCo4.jpg', 'ProductImages/LeftImage/a0kWB7KREoWpUnsm4VIUUELTPz35070udseJ4S17.jpg', '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(309, 132, 'Navy', '#000080', 'White', '#fafafa', 'ProductImages/FrontImage/8bMOu2Ep6mwNnscuaUm7V1QviTbfsvLA2RJNKPcW.jpg', 'ProductImages/BackImage/gjdFFL8ASTvJ8KZJ1LOulL166q71KLaQYVr8yJvN.jpg', 'ProductImages/RightImage/asw8Q8m2iZdyZO6PifT83eocfkI7eR5N2OZJDEZI.jpg', 'ProductImages/LeftImage/TeuesIPse6WCVDoOx0yHQTc8zDmyv2iTxPpWTvCe.jpg', '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(310, 132, 'White', '#ffffff', 'Navy', '#000080', 'ProductImages/FrontImage/R7ci4TOrdq3HT9Q1o8j2kZPSeQJysWqtf7IKbpuz.jpg', 'ProductImages/BackImage/kIj685iiZbaLjC84X5gzvadGOGzP1HV3T5LNPCKs.jpg', 'ProductImages/RightImage/AG9qixNuH4cfcO386A9rBhtcErws1k1WmKcxnEzO.jpg', 'ProductImages/LeftImage/1x8ulJDCN6ePGLLpWETasxI9dvZgJgh2dRzXxivh.jpg', '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(311, 132, 'Black', '#000000', 'White', '#ffffff', 'ProductImages/FrontImage/Mr3NFo7XEMAaqJm4O95XzCDhu4DyWc2aVVIlJpJH.jpg', 'ProductImages/BackImage/30hmCciHJqxLLDIo8VuRW39LWmfeI2PW4A2i78TJ.jpg', 'ProductImages/RightImage/mnxl4Xz7tpq9mnp6Vm0HimbaIMpxL3KRXlPk2SHI.jpg', 'ProductImages/LeftImage/5hkyLmfvDSsYzXrqavqlfhnDlWjxKs5R0fMGiU9S.jpg', '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(312, 133, 'Gray', '#cccccc', NULL, '#000000', 'ProductImages/FrontImage/B3lY3sicW2D0Sti8lcWF4RIwe2azBDtJAQCU3s3J.jpg', 'ProductImages/BackImage/MvVtG4yvdzaDFWewWAuszplNidLqMDqiHDgDkWx0.jpg', 'ProductImages/RightImage/DOxOfUrVTu5RJORSOihmn3gEWxOtD27gM31B3y4z.jpg', 'ProductImages/LeftImage/vSLiFCAdEBWpK4UjfpGxWtTNqaIWyE7ztEYeRX85.jpg', '2025-03-25 15:51:24', '2025-03-25 15:51:24'),
(313, 134, 'Deap Navy', '#15125c', NULL, '#000000', 'ProductImages/FrontImage/J2mCjn6xAFSQrUuF5TvBW59P3QnGpvdLPVBUnfgY.jpg', 'ProductImages/BackImage/ATqq2RlXJe8QZXej9IaorRMUMZn53ZbH0msbOUjL.jpg', 'ProductImages/RightImage/SewYUwxWcRi2MQrUVu0mL3FJI2Kz1GQA8sq5WIEg.jpg', 'ProductImages/LeftImage/wLoIk3utfalVbeuqRQZpyIfLW0MbZa1XwILlpHr1.jpg', '2025-03-25 15:57:56', '2025-03-25 15:57:56'),
(314, 135, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/nysBFb6Tcka7zMiTcIfSJfYwJWXN3ILPUwY8eOAC.jpg', 'ProductImages/BackImage/493YpTrsE5U0nx9upAMAujDku5ocwbpB6ZHNqtvX.jpg', 'ProductImages/RightImage/ufgqtNYNkqQlmLACqzWmcgtKRgBa11IHX6d5N5vs.jpg', 'ProductImages/LeftImage/VcyQPPVJ1m6ZRNnrWmHE7PHGAFKgGH30M20ugPGu.jpg', '2025-03-25 15:59:33', '2025-03-25 15:59:33');
INSERT INTO `product_color` (`id`, `product_id`, `color_name_1`, `color_code_1`, `color_name_2`, `color_code_2`, `front_image`, `back_image`, `right_image`, `left_image`, `created_at`, `updated_at`) VALUES
(315, 135, 'Grey', '#cccccc', NULL, '#000000', 'ProductImages/FrontImage/qstdj2lztpxk1V80D6nis24QmXUyEEh4E1zC9nFK.jpg', 'ProductImages/BackImage/jicaE8YERto5lZ0cXbBEr3R82jTAZIn5Ekz4ZRL6.jpg', 'ProductImages/RightImage/oaGlj5m5fpF7e58XBDTGzxFdzjDCFuqyiCBqXpJS.jpg', 'ProductImages/LeftImage/TwPdKa9kkqmjEEycuRiQaB7PK7zMYkBAfyZlXVIl.jpg', '2025-03-25 15:59:33', '2025-03-25 15:59:33'),
(316, 136, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/fZMQlYhrsYHEOxQ9S3rigCtm8esXsRP9LK0nZIDv.jpg', 'ProductImages/BackImage/ja2G25NoJ61BboIcJvj7j0lYWJ4Nks4lujqq5t8W.jpg', 'ProductImages/RightImage/AxYZ69LjqraeIVoaGZ3aTumcsV6Fu2zsyTitYszN.jpg', 'ProductImages/LeftImage/wgMY1rDMdqdRNShNPqVBWDUrOUttCf4k5eztW3eX.jpg', '2025-03-25 16:01:48', '2025-03-25 16:01:48'),
(317, 137, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/gU94CH7X46zZVjzNctEP2WpMjCAF8yyIftcoaqkX.jpg', 'ProductImages/BackImage/qYlt3fEbOMsCabpwCb9Ipvzje7BTtR4cxRP6VFu4.jpg', 'ProductImages/RightImage/8lZH1Jbjmngx1iHdkxlFrThA995tlKtTZgj1Zia6.jpg', 'ProductImages/LeftImage/Khq7AFk3NJuS1KDeMpG7clpVAoagdjKxePOBdD0n.jpg', '2025-03-25 16:05:00', '2025-03-25 16:05:00'),
(318, 138, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/FCzkEvEy8txDFQD4eYRXg1yp4kWbriEuFN6P4GNb.jpg', 'ProductImages/BackImage/ISBdtm0lLI9GkvCGBRo2cjxtIorkgAVibgOf1MWi.jpg', 'ProductImages/RightImage/5dpUYUpHJoKZjaXO2XVEtwPOVuhmRhDWIHsJJekS.jpg', 'ProductImages/LeftImage/3q4buictjGFKRcXrYwD54aUXcovY3WnazCqxhfWl.jpg', '2025-03-25 16:08:17', '2025-03-25 16:08:17'),
(319, 139, 'Red', '#ff0000', 'Navy', '#311e8f', 'ProductImages/FrontImage/RsDL2K4GnXddxAkkuzptvnyQcoZf38634YwzQZLt.jpg', 'ProductImages/BackImage/d0VaNcHES6OIeLBmqwXlfzagAMjqAPI0x4Ly8X3V.jpg', 'ProductImages/RightImage/geMiRDudDiS60dUvRMfxpuDVWiOX0xH7tjdC1Frb.jpg', 'ProductImages/LeftImage/9lrbpX1UiGqcsnf1cnf7SSgFy3qqZgnnO00YQa19.jpg', '2025-03-25 16:08:32', '2025-03-25 16:08:32'),
(320, 139, 'Black', '#000000', 'Red', '#ff0000', 'ProductImages/FrontImage/flrqSgATZDqY6JMqAp9SWNWqswfjJKFJM3rkziQ6.jpg', 'ProductImages/BackImage/c3yJOelEISqknIQ5rIyGfMcVKc50n4K3UjWF0PW9.jpg', 'ProductImages/RightImage/qasfBOpcS5qULo84OOBxK2cCUtGSQ96vgigfEoto.jpg', 'ProductImages/LeftImage/R7ct8Fxg6GBWrICNopf5ZtgerrCGu3PkMwOIKAan.jpg', '2025-03-25 16:08:32', '2025-03-25 16:08:32'),
(321, 140, 'Scarlet', '#d91f00', NULL, '#000000', 'ProductImages/FrontImage/heLhBf3SNrmURrQBjZqcYGnfNaGhnc0uypMwlKjp.jpg', 'ProductImages/BackImage/ZwC947Wn64ZbUjLz9KFpjlLdx4DijTfNJh6McJH2.jpg', 'ProductImages/RightImage/cG81XxaBVpCUHQN7BM9JJk8y5S7EQ5qpJ7b8HzgS.jpg', 'ProductImages/LeftImage/00ePd4C8WFpM8k2jO2Tf6SfqdvnIfVmwrZMIhsi4.jpg', '2025-03-25 16:12:41', '2025-03-25 16:12:41'),
(322, 141, 'Authentic Blue', '#07c6e8', NULL, '#000000', 'ProductImages/FrontImage/M3jCzrGofZ3l3tJ8avLBluesjaCuUjcCHtl2mr5w.jpg', 'ProductImages/BackImage/WPpqLBPDroL33JNzN8IGwNpVY8hOczTTKMqgeIms.jpg', 'ProductImages/RightImage/bPVf44towftB0LUVQWS0DE1GFBOBDV6QK65CtbP8.jpg', 'ProductImages/LeftImage/d5mHECV66sx6HMV1S8vvkGynzzuou10K7pNt6dvl.jpg', '2025-03-25 16:16:21', '2025-03-25 16:16:21'),
(323, 142, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/54FArhu1cphc8IPVbhQ503cLMHQdlZp4B592k0AR.jpg', 'ProductImages/BackImage/5BtgSNO4iB8dg8215PQZITxz1pR2rd6N7TPtwZGl.jpg', 'ProductImages/RightImage/VQHgR2S6mYTiDlbETGke8ufx3iyOtmyZpNMjidBC.jpg', 'ProductImages/LeftImage/DUrpakIOuxgDhHg8o1fGzkjGYYi0gDIcXZkF4Bvt.jpg', '2025-03-25 16:19:37', '2025-03-25 16:19:37'),
(324, 143, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/B2mrRO8Ga44ehiOdd8mfQf4Bm0fXg0fUxVRc8RVN.jpg', 'ProductImages/BackImage/BVUgGw52ZlVEGp2vKeUwLpQb0P5J7mshx65BkeH4.jpg', 'ProductImages/RightImage/r0BXX3GxfYNc9RItbrz6XzE3C7DSpzrTmGBlW40m.jpg', 'ProductImages/LeftImage/STagGUBFKkCvA3TYQgiD6sYGOuB8e1m3GjUzsP47.jpg', '2025-03-25 16:23:46', '2025-03-25 16:23:46'),
(325, 144, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/adtJaOuA6FtJTsmbgPXP8MslQiNNzA3DK6yOJ95W.jpg', 'ProductImages/BackImage/lC3Pdm4WcVrTyxzNkzY0WdgOz6CsO0S6CTaiDTOD.jpg', 'ProductImages/RightImage/ZJQoxkcZekTKznzAE53GIKn9q2MwkSRQBZwz1gAk.jpg', 'ProductImages/LeftImage/vU4Ru6LTYRvJjfW8FU1kVzZle7AgKWnR81meUm4e.jpg', '2025-03-25 16:27:46', '2025-03-25 16:27:46'),
(326, 145, 'Khaki', '#c0b870', NULL, '#000000', 'ProductImages/FrontImage/H1kBZUA7UQtWmqnc6727jsXSnk1MAeFASSGsHyKa.jpg', 'ProductImages/BackImage/jKwROIZqv8jB6eVBOthgUJ0rkzR5zWQCl0tCOWVr.jpg', 'ProductImages/RightImage/XzCcevkcDzSBlC3jzAjwSXNbIHmD5ywnqlIrwGqC.jpg', 'ProductImages/LeftImage/pMqZh5Kh9NL89CFzCl7r9XmA433sLSBCpxIr4bDc.jpg', '2025-03-25 16:31:43', '2025-03-25 16:31:43'),
(327, 146, 'Purple', '#4f1b69', NULL, '#000000', 'ProductImages/FrontImage/Azy65XWFrFxY35gVHOJ3QexOK9RDBdLoLr98uUg2.jpg', 'ProductImages/BackImage/kq1PnZXonX34diwzx52wqKufo4jo8ZHOioi2Q1XT.jpg', 'ProductImages/RightImage/cpFOKNFErN1vlZAeejwHxeunGvcsPhGJbClo0XzI.jpg', 'ProductImages/LeftImage/2oZxz2JsngNHZIfuSCeXKAAGgM9R7J2hsxUcSfdd.jpg', '2025-03-25 16:36:03', '2025-03-25 16:36:03'),
(328, 147, 'Kelly', '#1bab50', NULL, '#000000', 'ProductImages/FrontImage/5KalYVMVCZZXzpP8zqXQEqVjUQkUiY5ssIQk7u6V.jpg', 'ProductImages/BackImage/OflKTDVD3q9GSSDxgoL5OkaFtxIQR1MvmTWEu5gn.jpg', 'ProductImages/RightImage/rIlWq2fAQg3bGvVE7OqrdlQYcaubcYwor9pcoARg.jpg', 'ProductImages/LeftImage/qAfx5qRzUPrT3FAGYuiGDqSbyBwYmhvTkXGbWXMU.jpg', '2025-03-25 16:46:21', '2025-03-25 16:46:21'),
(329, 148, 'Camo', '#1f5919', 'Camo', '#000000', 'ProductImages/FrontImage/dJPeCPEb0qaMr2IqNGQjkaY0Rz4YCwtEHPAvvqLt.jpg', 'ProductImages/BackImage/Q5tSsXehJSeoQTqPwTGeKQCVNjy4VJTUGiiCXgUE.jpg', 'ProductImages/RightImage/xBEtl9MVriZIlmAjAkVSKyboh81sCBqtTUubVlks.jpg', 'ProductImages/LeftImage/lD43LM5YR4vmVPfMKmHdMYRKdufn27JAM7aceT4M.jpg', '2025-03-25 16:50:58', '2025-03-25 16:50:58'),
(330, 149, 'Tropical Pink', '#ea7ffa', NULL, '#000000', 'ProductImages/FrontImage/hfZhj8a6Du2VhdRUAMDAroFsKI0aATlGV6hJySrO.jpg', 'ProductImages/BackImage/Mti8hNm9uKYgu4IgizmViRePadiXTzPemfknbvRT.jpg', 'ProductImages/RightImage/AF422d1zLUBYpZgryn3NHLktOYbkhJ5CqJWyrWg6.jpg', 'ProductImages/LeftImage/rI7MIAPr8V8szJqDFJefWXK1Cnsch9fBmErapuL8.jpg', '2025-03-25 16:57:03', '2025-03-25 16:57:03'),
(331, 150, 'Maroon', '#470421', NULL, '#000000', 'ProductImages/FrontImage/wpokNvL6Tgt9MbmBZ54esYfbYmr3Zsm6dtc64h53.jpg', 'ProductImages/BackImage/PPuHTxDh7II44VOrylw0gYF31EwtU4hX6m3MgPZC.jpg', 'ProductImages/RightImage/7INkmeipjeulcdq65M709OgTVFClmkQqwdIeWHGT.jpg', 'ProductImages/LeftImage/B1EouVyRfUK2QdTYzMPYD3oOI97nDuEHeoHn5meW.jpg', '2025-03-25 17:05:48', '2025-03-25 17:05:48'),
(332, 151, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/bTqazC2biWoFqsmkjtEjDPPtBClzl8z0jvpuBMfk.jpg', 'ProductImages/BackImage/qnKhrKrykquWdxExFtvCTdiaV4SmaKYWc9SgpeAq.jpg', 'ProductImages/RightImage/rWggEf7nx99PXypraJ3Sd2Knua4dSbRKYiBn6syd.jpg', 'ProductImages/LeftImage/dPgRC1lyEf4v2sHD6qL9INykyZXAoQnPMWsw294a.jpg', '2025-03-25 17:10:25', '2025-03-25 17:10:25'),
(333, 152, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/e5GE0l2u0mxHNzjr6JQTQBl2FzDcdCImYBhia29p.jpg', 'ProductImages/BackImage/BqX2KvuMZVlRLwpX76OVcSqNf9xr71pGnk0cvDQn.jpg', 'ProductImages/RightImage/lZt4rMm1wlab8lm58XsPivubm7z5yoXqye6HaLsr.jpg', 'ProductImages/LeftImage/5zcMK5EYJaaMMjPj4OvVgGTGRaqNzHePuvhMm5VZ.jpg', '2025-03-25 17:13:51', '2025-03-25 17:13:51'),
(334, 153, 'Charcoal', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/4R5iElKqwNOpiDfZdk80MwMDYY56aOvyBoBaiHVX.jpg', 'ProductImages/BackImage/A3rNvx8uc5LewTCFu83MMwsndKFnIHeX7p7S6k4k.jpg', 'ProductImages/RightImage/tukNl221Ug2ypxptLN2NZuRAFs0GsZrev2cuLt0e.jpg', 'ProductImages/LeftImage/RJlQBTf4Qj5mTBwt2rQ2ACCj3V05sSycVQkNCnwF.jpg', '2025-03-25 17:17:10', '2025-03-25 17:17:10'),
(335, 154, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/NVYTJXYB1ONsmysC52sCWHmGPQUTLnVeshP9bqWB.jpg', 'ProductImages/BackImage/wuhrgqg7YDvnatjv7Wg2J45eHgb4qnDLpFgv4guT.jpg', 'ProductImages/RightImage/U44r8jdjrh1iamE3x3KWVWPGYlIRPFC4XbxeFp3t.jpg', 'ProductImages/LeftImage/O8RIgrYYv6OG6BjEOHavPSl4CupbQNPCVSXfkUWV.jpg', '2025-03-25 17:21:04', '2025-03-25 17:21:04'),
(336, 155, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/aLK2TdQFszeHxEY18TfMzdyPJZrr6xb5N0s5VcIx.jpg', 'ProductImages/BackImage/Rke1Fpy6k9JUFpJFhAjok73bMD9qNvdarjeN1dbq.jpg', 'ProductImages/RightImage/pynC3mnm8yX90oRoXZCvl17wczw7OZqh3Ye2Ed6h.jpg', 'ProductImages/LeftImage/tLK7LsA1L7y0X7ZES4IIZIBLCPQFqgcnqY0XbHHV.jpg', '2025-03-25 17:26:44', '2025-03-25 17:26:44'),
(337, 156, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/Qz7lcRa4GHczILeIay1h0dtlZlNuWv9rjHiApVG5.jpg', 'ProductImages/BackImage/oOetxgPopW7GHSSFTjn4i48EWG3YfGVIu6FwP4NS.jpg', 'ProductImages/RightImage/wN374Ugk7isA0pWAHzfGMkSARi9vgrrMip161Ci9.jpg', 'ProductImages/LeftImage/TsSw5Uo5Li8rJuONj0gTg13RC5vaWvoHSALPiBuV.jpg', '2025-03-26 10:45:11', '2025-03-26 10:45:11'),
(338, 157, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/bn3ICUXOAKUWXyQVnFiP8wudX3GeGIHo4gIrEHHe.jpg', 'ProductImages/BackImage/0rG2rFqet5B2XdoHJOsdibh7yyyGmMCdyuG4aGgs.jpg', 'ProductImages/RightImage/7RoTDwj1vaQimqaZzUzP39NWYmsSICSUtqgxNmoH.jpg', 'ProductImages/LeftImage/VGphnNJ7Do4s5G55GkmJLrbwfsVeq1kFpxcXtnzZ.jpg', '2025-03-26 10:49:39', '2025-03-26 10:49:39'),
(339, 158, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/IyHDyYF4TJ77dHASbrfrHbsTPApcAzTtTpGnOTKo.jpg', 'ProductImages/BackImage/9rzv8Ln16nQnBYOhZvB9r8DFS0AD6pmujGY4Jw0S.jpg', 'ProductImages/RightImage/gQSqaWZFnkfUYImALPeAAlCwiDGQgkjZ0VT2lSbl.jpg', 'ProductImages/LeftImage/SzzUy0yKTcSE97YqABU1Sl4xKAWD0wDmnGxgTjeh.jpg', '2025-03-26 10:52:46', '2025-03-26 10:52:46'),
(340, 159, 'Camo', '#1f5919', 'Camo', '#000000', 'ProductImages/FrontImage/zIi8x8yTc3hSDF1mXXtBAo6U4fNG5sVkXGlun271.jpg', 'ProductImages/BackImage/p4m2405sWZUIwrIwkYKYJwpFfwzMnzYAO63cqsn5.jpg', 'ProductImages/RightImage/b5RZY4VWm7vr0tUXptPuiQP6QAZA45TAodVO7Xdi.jpg', 'ProductImages/LeftImage/eYKYS0i1e3JeCFjBVRGV2Xv5To62hHj2FEiWWzrf.jpg', '2025-03-26 11:02:25', '2025-03-26 11:02:25'),
(341, 160, 'Gray', '#cccccc', NULL, '#000000', 'ProductImages/FrontImage/eCTbVADrpHPYStTe4eTGHkNq4SeZDk3YyfOxlS2D.jpg', 'ProductImages/BackImage/wBUb0kykMBoEPHpJi102hBzOKzTugzjW1qtGMm8f.jpg', 'ProductImages/RightImage/E6BBWwrHWT0CV0Hcg7ESekRfh4JZl9YlwLJJMNC3.jpg', 'ProductImages/LeftImage/W1Th17Ww7IWcvqd3JUc9wYOyyxEEjYHG8xDPMjLE.jpg', '2025-03-26 11:14:34', '2025-03-26 11:14:34'),
(342, 161, 'Gold', '#ffd700', NULL, '#000000', 'ProductImages/FrontImage/IjTb2YWu9vQ4KEWL3hkuSl7Zta1Abn5UImDjAj6A.jpg', 'ProductImages/BackImage/NtupRcjv7Xj7fzdGLLUHIWPNzAXLvu5Q8ePdx8ci.jpg', 'ProductImages/RightImage/CVja6nwDZNhl0bIEO8G6r58zfqfmRAYX1VP8DmhG.jpg', 'ProductImages/LeftImage/PXmB3pNszALdYtoa4ltZ5RcRf1nL2D6xPOThF15u.jpg', '2025-03-26 11:32:36', '2025-03-26 11:32:36'),
(343, 162, 'Khaki', '#c0b870', NULL, '#000000', 'ProductImages/FrontImage/8pMx2hYb43EB7Duy1XPz3iGlzW7gyLqXDinGjhOf.jpg', 'ProductImages/BackImage/l7I7V595BnODbSXh7pqiHk6GWRp0jwDUINPyJkXY.jpg', 'ProductImages/RightImage/1o8xoYFUnXSpwBQscsJbWJgHgV8nKvllNHMMyI46.jpg', 'ProductImages/LeftImage/TEhJQWJZDRRtPNM1vPkuYRRHujgw2kucpUBGDCj6.jpg', '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(344, 162, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/XcC0mOt6JaUAO76zCyF9mmEYy1CLOuyAxkJwTPx5.jpg', 'ProductImages/BackImage/6bNPZp4XmdYOYIRdG3qviFJMgqwYeqNl15tkwGSL.jpg', 'ProductImages/RightImage/OT5nBezQxvBAy42adxnKjcfEvCRUpC462dg6iodu.jpg', 'ProductImages/LeftImage/oxPFKPwAYoOpogZhHZgaERXSVlFOl3y5VjEdrETB.jpg', '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(345, 162, 'Brown', '#634a34', NULL, '#000000', 'ProductImages/FrontImage/4vBNGI2WIxZ9G99zIjKbqx30e3mxfeFNhVFG6PY3.jpg', 'ProductImages/BackImage/oAuLZ1cfWzHfnzOgalGoDgd5viRYKBLEU2N9XAbP.jpg', 'ProductImages/RightImage/ND5LYPNNZov03mO7f3zyNfnuE235DNdsS9Wd8OU1.jpg', 'ProductImages/LeftImage/M84EqiGUGIXFQP8SrtHFKyKZkMCNROu4hotLx7Na.jpg', '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(346, 163, 'Camo', '#000000', 'Camo', '#1f5919', 'ProductImages/FrontImage/16wjUjqrmO7FPFTwx7dsEaEweyYh3ReI6EAwZ3cq.jpg', 'ProductImages/BackImage/95nJPYaJvsmZrNeo0kt6OvRHkTpGOzXvoo4XkL9l.jpg', 'ProductImages/RightImage/XKBGafpEdcAbaapLLiRPmLyMLq6MG566MxOYNjU6.jpg', 'ProductImages/LeftImage/sX1YaX2N9kwZUFt9MNfFQdhSKEePLqvObryZdn7h.jpg', '2025-03-26 11:38:19', '2025-03-26 11:38:19'),
(347, 164, 'Green Camo', '#000000', 'Green Camo', '#368a06', 'ProductImages/FrontImage/5sSvsl1Vx45UxjSWBCzSLj4cAAffRlO2RiuhYEj2.jpg', 'ProductImages/BackImage/9rP5SEuIpDZpgFUgcq91pdwQnRZi7djuA3Ne4zRX.jpg', 'ProductImages/RightImage/AyBrhf0UX65o8wmelnMwatCAvozAWZVGyvdOTPKh.jpg', 'ProductImages/LeftImage/Ygt5cI8J6Q7Bza9KSpsXQr6yoL4zJ8u9MBasiJHB.jpg', '2025-03-26 11:43:52', '2025-03-26 11:43:52'),
(348, 165, 'Tiger Camo', '#000000', 'TigerCamo', '#556b2f', 'ProductImages/FrontImage/WcittRdw7tY6vHMwVhnLBgNBY2ryLMozC8PX3BQT.jpg', 'ProductImages/BackImage/Sk1d51bfPGjx3ATcroH4MoWenjnuzSo3CXvxpHsp.jpg', 'ProductImages/RightImage/tYnWeA6qKnVM5AXIIHxbXevTdocQbmXipuZgP5D4.jpg', 'ProductImages/LeftImage/xsbS2BH74tAPANg04X3o4p8D2CivyiGBdIFI1dml.jpg', '2025-03-26 11:49:13', '2025-03-26 11:49:13'),
(349, 166, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/ypYPalToWCCJEaa1T6rOPNpAZO4Jv9HEUt1h5wN4.jpg', 'ProductImages/BackImage/SD4qQwaLjiBOMzmNh1n1S91WdTQZgTjN2oe3Ik7Y.jpg', 'ProductImages/RightImage/paOcjSBA7nkScapsNOy8hGEbWtmr5zAp3AIrdetb.jpg', 'ProductImages/LeftImage/zvCRjOCSPfjdFRryefbbyN1OydJ92Ils3A9CIvIh.jpg', '2025-03-26 11:59:36', '2025-03-26 11:59:36'),
(350, 167, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/47uXEsKlmtQ5WtcBh557VL28HruFlCKMYFDDVBmw.jpg', 'ProductImages/BackImage/dnfbAh85wkFcmRyAdi1Mf0eXSaz8yZTIyoo1UTNM.jpg', 'ProductImages/RightImage/ARVGMmBJROdIDFqAQDIziWhDKoHIHwKLVy3Cc39s.jpg', 'ProductImages/LeftImage/yjBBlQ8CoFtV5cGNvDdTu8ZcJINn2QT509GqB7sQ.jpg', '2025-03-26 12:05:05', '2025-03-26 12:05:05'),
(351, 168, 'Raspberry Mist', '#d1edcb', 'Raspberry Mist', '#c42253', 'ProductImages/FrontImage/MWxkOzjAA5hln0plNxL7pUVuZRlA9zDRhPgUULGj.jpg', 'ProductImages/BackImage/ZHncEWBQMrA5HzCOrDimLVcImRCunyjoYlYD8YM1.jpg', 'ProductImages/RightImage/AUMI0yylAQRn1wxET2ighrRHNOyEx6GagOJgJ4h9.jpg', 'ProductImages/LeftImage/82fV2cd1njM5IO2FwXKWrTyFuXmGG5jtRpMMuQZc.jpg', '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(352, 168, 'Grey', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/ktlvreug6JPz0td288ItqCJkYdCsAIM6ZuX3m7Ql.jpg', 'ProductImages/BackImage/TZhiqXa7BCCfylFhOKe7drf8dVoGl0d9BdmuD4mW.jpg', 'ProductImages/RightImage/65d3WRU09lztKaFMxDSYh0i4uvJnTNvDxxvWdZtD.jpg', 'ProductImages/LeftImage/Uccx0t4O9RDzolAoNSCIHYpc7ri02LwvzyojtOCa.jpg', '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(353, 168, 'Sky', '#007dff', 'Sky', '#009fff', 'ProductImages/FrontImage/TXa1wvc4cUKDpdRguOQU56pwhmAdZqZ5ZZGdxDQX.jpg', 'ProductImages/BackImage/fOHqGfNt6KJucuNB7Ciw9DyqroAhYWRLXjXW0bwh.jpg', 'ProductImages/RightImage/agIbDIKUjEwm0uXzONKs9zdv1BLsAMN1lRCjxuwZ.jpg', 'ProductImages/LeftImage/xZFWriBomdLhjj6j5s7NzxSo183uEgDMq2x0tRfm.jpg', '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(354, 168, 'Purple Passion', '#8d4592', 'Purple Passion', '#ad65b2', 'ProductImages/FrontImage/xgy145jIroOwIQ8ckcH6MYUtwn7R7MZlLBYfmoBq.jpg', 'ProductImages/BackImage/SfAb1fC9Cj2QYbBpAXBs6yWPcKwJFBfWhQeFDmN8.jpg', 'ProductImages/RightImage/AEH1HMni560ql7L7i4m6FHBlL1W3XJ0zcYwnufmp.jpg', 'ProductImages/LeftImage/RtPy5zRQY79BZlv2jVhjySSlW7gMfCIZgGlSCEwC.jpg', '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(355, 169, 'Deap Navy', '#15125c', NULL, '#000000', 'ProductImages/FrontImage/XZ0LdW5oB2no9kTLq9683OOCLYbgJa4CkWxHq1UU.jpg', 'ProductImages/BackImage/r3GkH39vUcQzeqIFmJjSaBkOkQHfqZfCO0P3OVwD.jpg', 'ProductImages/RightImage/aw8U2n7FoTAXkgRqaar0OFRA4O42NNbFknfkKPPE.jpg', 'ProductImages/LeftImage/0oAs43kfwAj4OzS9qAKldTst4ayMq7Z8j3pImPGd.jpg', '2025-03-26 12:10:43', '2025-03-26 12:10:43'),
(356, 170, 'Graphite', '#7c7c7c', NULL, '#000000', 'ProductImages/FrontImage/G88eGrm5w5GgYD5LWrpTBJ7UV7qhDxLLIKlEqT6O.jpg', 'ProductImages/BackImage/GX9rCkzIYQm1ovKRzAGG9AJWTuKSPiWNVajugT7n.jpg', 'ProductImages/RightImage/YiCRIhd4e2gv1vUefUzmQPOhNhkojWt7M8aWxoKu.jpg', 'ProductImages/LeftImage/HLTbMvXKcULztDjnCUp5kmukhYPJ9ZrlDEQ1H7kH.jpg', '2025-03-26 12:14:42', '2025-03-26 12:14:42'),
(357, 171, 'Dark Green', '#000000', NULL, '#000000', 'ProductImages/FrontImage/0UJuM25BGrGaiNKSzbyaNCNnxwhJgFZTkFAxRaJk.jpg', 'ProductImages/BackImage/CYJgVkxEaLHA3ulXEpjM0fJyRFqeuD1VLiZfIKcB.jpg', 'ProductImages/RightImage/DnwBTBov3AEi3OBl5yySxeYalGWu74Vjr7QFpTeE.jpg', 'ProductImages/LeftImage/XNE3FseGKgCaMCndKwnjRZx6h9GpsMmlSvfCtzf0.jpg', '2025-03-26 12:19:09', '2025-03-26 12:19:09'),
(358, 172, 'Purple', '#4f1b69', NULL, '#000000', 'ProductImages/FrontImage/H9S4aNlmyPmkcy6cdliPMUcLt91TpJEvGlLlS0Ys.jpg', 'ProductImages/BackImage/tOeoplUGBXJBvMUzdTlOybaaBYUSSOomE00djCB5.jpg', 'ProductImages/RightImage/kIinOzW4ozrnZHqDFfCqna2kS1l5fMGmfZLZUxa0.jpg', 'ProductImages/LeftImage/7eBeXU8OTrDejvBCHgN7aHd01cDau2LJvlM5bdgB.jpg', '2025-03-26 12:23:31', '2025-03-26 12:23:31'),
(359, 173, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/bnXbyMdj8tm8Fqt0WVvuh06NAmjfMCAGKGx2r3Ts.jpg', 'ProductImages/BackImage/kTsmTwEB4ogWvPx0yl3xNAqiTitOYEd1nJL1An11.jpg', 'ProductImages/RightImage/nJ502NuBc14nMk9m8JVxoHVQUQASxVyUzJ6cxCz4.jpg', 'ProductImages/LeftImage/hgZTjjjFcqzgadG3qvEqpk7ToOTr0XUmder63209.jpg', '2025-03-26 12:30:28', '2025-03-26 12:30:28'),
(360, 174, 'Scarlet', '#d91f00', NULL, '#000000', 'ProductImages/FrontImage/sE1Epd5qlu4nwoOGxWsAhRjqDBP43JBkQtMeo2VD.jpg', 'ProductImages/BackImage/2YZFR5VrTJEzjrDmpAovf6HLjY025fDSUxX6h4qz.jpg', 'ProductImages/RightImage/ubzCOc1vP5vAJecD4il9oWPNlvj5gddyurPrPRIi.jpg', 'ProductImages/LeftImage/fTH9WCbM7G8oD2GQ9YamKCM4mh2Dre5pY1GdPPc8.jpg', '2025-03-26 12:34:01', '2025-03-26 12:34:01'),
(361, 175, 'Stone', '#d6c994', NULL, '#000000', 'ProductImages/FrontImage/z3jFPttKUj4H9S7ma5KHBfhrniilReHC133swePm.jpg', 'ProductImages/BackImage/v6FDhyfRUujFHCFrD9DmPoVebwwEFxRfWMiA25cK.jpg', 'ProductImages/RightImage/78kc2D0pUMHcWpo3zp5cZ8heql4S2IPZgl0gkzlS.jpg', 'ProductImages/LeftImage/8evRj1SiHVHuTiRSSNV1nM2rGDinFXJ1kiT3JxII.jpg', '2025-03-26 12:37:22', '2025-03-26 12:37:22'),
(362, 176, 'Gray Camo', '#bdbdbd', 'Gray Camo', '#000000', 'ProductImages/FrontImage/wEJ42P0uapQHXNdFgicvZvWpJnTW44aQTW33DMIm.jpg', 'ProductImages/BackImage/wD6sckkqhcRNwM0XVKhlzXFUrPlCmZ4voWKW37bE.jpg', 'ProductImages/RightImage/gGa4FH3qHKUdOU32wXQFHrERf7iUU2XCmQOmYaWm.jpg', 'ProductImages/LeftImage/muOh8X9I7dOINC37rtUHkIwycJRiYQDBhZ7BGKFJ.jpg', '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(363, 176, 'Black Camo', '#000000', NULL, '#000000', 'ProductImages/FrontImage/rFmxa163aCwMlw5hh7y6v2F8BarySgt1U6fKqDN5.jpg', 'ProductImages/BackImage/72q53KA52PeKhcVf1Cl3Djsf3c9HI5JddJE4SRIO.jpg', 'ProductImages/RightImage/RnSETUWk8vQ3zoaedRlB1J7JIosZ4wHfu2FtKyvn.jpg', 'ProductImages/LeftImage/htKoBnp93Mb6j55fVMEqTVJ6vqlCDbvI2qXCGigv.jpg', '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(364, 176, 'Navy Camo', '#06518a', 'Navy Camo', '#000000', 'ProductImages/FrontImage/dcCqQANYVgTmvKV3L8wcBsEUuWHBGP8FsJmQJAt6.jpg', 'ProductImages/BackImage/XWxxD4ZGxNjnujZSvm8M9IdRysoJ11LVq94zyijH.jpg', 'ProductImages/RightImage/9ov19uYniZlV6bU8cQGdgugBqTVwApQlcn5glQRs.jpg', 'ProductImages/LeftImage/SNnCwupcfLCs3hc9K1zK9vq7K9CDGNFHeIC1zFeU.jpg', '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(365, 177, 'Navy Camo', '#06518a', 'Navy Camo', '#000000', 'ProductImages/FrontImage/P91nAeqF3LgzomCd8eyZiE33tL6EqKV0PaE3URr3.jpg', 'ProductImages/BackImage/OIXHdupitneeEhMiC9DOmqyuoBWZewFweXNBBFoP.jpg', 'ProductImages/RightImage/B5cT8a9gWL8P5mkSQnz6N7QeyJ41JFubfGzspsjk.jpg', 'ProductImages/LeftImage/x0e6FxSVyKYbjkJGNn0Jruq8cFETbb6R0cqhMBwO.jpg', '2025-03-26 12:54:56', '2025-03-26 12:54:56'),
(366, 178, 'Ocean', '#064273', 'Ocean', '#76b6c4', 'ProductImages/FrontImage/mGnzZTlpC6eAM6osqFjffRFkV6sulKD87Yf4V5jC.jpg', 'ProductImages/BackImage/PYJx0BfSSHui1Y5eW5R3ZrL015gc1d0VuOr5v6Rp.jpg', 'ProductImages/RightImage/MEyYF3VowmJKxCiHqpCo1fdMAlFca99xYtdLM0rt.jpg', 'ProductImages/LeftImage/E8U3C31ubuNc1V0lvljPFOPe47JMJkIfQIBEer76.jpg', '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(367, 178, 'Purple Passion', '#8d4592', 'Purple Passion', '#ad65b2', 'ProductImages/FrontImage/rH5sOR4wQ9bLuHm0yCNLaUkHZKMolWHZHqB4ctqI.jpg', 'ProductImages/BackImage/yACDM2B3eg6EIQ43tldiFMDhzUhd0v32UBYr3a1a.jpg', 'ProductImages/RightImage/IlBy0iUaGuPwT5IDe73bz7GkZVj6btim8yYfiZUz.jpg', 'ProductImages/LeftImage/zXJLlKjNZyhwqyddUm4fj9D6GcxRtt9pFjJYJfPb.jpg', '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(368, 178, 'Sky', '#007dff', 'Sky', '#009fff', 'ProductImages/FrontImage/sT4cZ1WguzvduDs0S3GgWe4sSW6EUpx0uLZ8myCt.jpg', 'ProductImages/BackImage/40Wml4M9Arf9rbZSepwq2tdWAu76GI03IO8JFSBP.jpg', 'ProductImages/RightImage/mfY3hFmKAClN2C3xsFl1AhJoZtSPUpkf3jw3k8aJ.jpg', 'ProductImages/LeftImage/KWMPRhGoojCqJXUbuQs8JIU6iHXo8tuzYUMesSMD.jpg', '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(369, 178, 'Raspberry Mist', '#d1edc8', 'Raspberry Mist', '#c42253', 'ProductImages/FrontImage/GiAC7STqJ5m1aVW3ELbQJheRLHXRELt1HsG8kkoH.jpg', 'ProductImages/BackImage/RjvpuObrNUpABmGGR5q9EP3QDGNWmWaIZBajIDLl.jpg', 'ProductImages/RightImage/CiKx1THeFNCTpM8XGFC2mVC2KyzEiaGGZS9PRUG3.jpg', 'ProductImages/LeftImage/96KdYjlMcOk5asrjAfeBvBkhfqOSKpwISzU5V0pL.jpg', '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(370, 178, 'Cotton Candy', '#ffcbcb', 'Cotton Candy', '#ffa7a7', 'ProductImages/FrontImage/X30Np5ClLbdNDpUVnuNeI6y1xlXiBgfZv132DxAm.jpg', 'ProductImages/BackImage/yeUdzIvRne10VKLPWlW1YpEGBnJojR34EV7rb8n0.jpg', 'ProductImages/RightImage/LQUBzCvt8bWDb55vfI0G2SKQ4EG4f27ROvzhJ4It.jpg', 'ProductImages/LeftImage/AWSwIykxrsP8bu6RTlzKwzdV5c2LCgwcgAzvxJcT.jpg', '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(371, 179, 'Gray Camo', '#bdbdbd', 'Gray Camo', '#000000', 'ProductImages/FrontImage/zlXJHsumwZu4IIlTUEJ3gBggKtsXjhatUqsa3cOa.jpg', 'ProductImages/BackImage/VOR2ZxcpIOR4MDVbDXPmZABo2EJHnxFbewDxwwXU.jpg', 'ProductImages/RightImage/hP8AZwIjZkiXNf1LOqhMxyzZseqe9ILyfQ84J0CX.jpg', 'ProductImages/LeftImage/GSlPNuHgNhLjCtRBUFvY5I0tGT9Ku8ohz9szCXDV.jpg', '2025-03-26 13:00:22', '2025-03-26 13:00:22'),
(372, 180, 'Black Camo', '#000000', NULL, '#000000', 'ProductImages/FrontImage/FROX2EoKmzxwIWH66YF6rCs1fxH77PWV2WxyJS1a.jpg', 'ProductImages/BackImage/KiB6oyF7ji97AwFeG8PiEOMtgJKKhtlYHPooUK78.jpg', 'ProductImages/RightImage/Fkb72ZzrT6hkaDLninVwnxvmZivMlXgtoFrkX2tl.jpg', 'ProductImages/LeftImage/4WDjBvJibDyfuVmvffs2EaxQmOGryOZ4kbBf1YS6.jpg', '2025-03-26 13:04:53', '2025-03-26 13:04:53'),
(373, 181, 'Pastel', '#e1f7d5', 'Pastel', '#ffbdbd', 'ProductImages/FrontImage/KpWhFIBAQC1j8tZbe32BHMAVuw7EOf1DUugs8Xjd.jpg', 'ProductImages/BackImage/UDB59aveJsjiLEwDX3Q0T8gyLGpuQ2O6KeeLMg91.jpg', 'ProductImages/RightImage/CUAQifomo1F9PP1rBl7IXFZN47rmgp4xIrnO9bi4.jpg', 'ProductImages/LeftImage/1AAUrDSKFSYprjXM7f4zkcfdxsM6J86s1oo1X2Qy.jpg', '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(374, 181, 'Sorbet', '#fac815', 'Sorbet', '#89f2e7', 'ProductImages/FrontImage/n2vCowRvSsPjcx2jm9FZjtL5c82FGYYHyv9SRv04.jpg', 'ProductImages/BackImage/K4hgSxKWAU7ctYV9xVNW93RDjJF1R1W3PCP7mJk7.jpg', 'ProductImages/RightImage/XnWa4ZTBGa59euKK5ewsZMRlTOVwp3bbqDK4zHLX.jpg', 'ProductImages/LeftImage/NChMt8QjRdS90zqpn3iNXxDOCVyTWPqBb5tkJKg3.jpg', '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(375, 181, 'Grey Scale', '#b0a5a5', 'Grey Scale', '#bfb4b4', 'ProductImages/FrontImage/3SKa8kvh9QMyd47Nv0OhaLgc8Irp80BnR60bXQjU.jpg', 'ProductImages/BackImage/dzAYC8dvqHGuf9fIbOqSCbVohFFNm6dhADBXmzMc.jpg', 'ProductImages/RightImage/euAU7AkuQarzWZoVdDvofq3xNNvEd3iABvtEdhsJ.jpg', 'ProductImages/LeftImage/pMgXQBt7RQK7NU0zhQFNikVbCLz7l2eTKXqy5aNZ.jpg', '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(376, 182, 'Heather Gray/Amber', '#c4c4c4', 'Heather Gray/Amber', '#edd95d', 'ProductImages/FrontImage/FrWoKIt5y220E24nOOylYRwm0q3sU5uiaTaj5Wow.jpg', 'ProductImages/BackImage/8EZuAihBHbU31T5Yy6qxV0UeMg0UcnaLTVCpEH9q.jpg', 'ProductImages/RightImage/aqutW3kY0e8yphvFTXffbK5w1SpNghioKEQWDpxD.jpg', 'ProductImages/LeftImage/w2ndOFIooovnU4E79ChX0npkRP5qP16emk7dSNyn.jpg', '2025-03-26 13:08:57', '2025-03-26 13:08:57'),
(377, 183, 'Heather Gray/Black', '#c4c4c4', 'Heather Gray/Black', '#000000', 'ProductImages/FrontImage/wy7dsqik2VMMTHurUkz6wdUFFULq1AYxZkSzr7pe.jpg', 'ProductImages/BackImage/f2j9t34BFPqr6BqVz6EJi9CDEUU8p1IPYWGSOOfd.jpg', 'ProductImages/RightImage/1ifReHCxNGzyfFd3WNAPnW3Jj7bnTs6DVVg21rwS.jpg', 'ProductImages/LeftImage/7H17ukmD7ljYmSaaiG5qMRslke5Zn9dWOO3J3R58.jpg', '2025-03-26 13:12:31', '2025-03-26 13:12:31'),
(378, 184, 'Army Olive Oil Green/Tan', '#6d8761', 'Army Olive Oil Green/Tan', '#96965f', 'ProductImages/FrontImage/4jIldIqMMDzEqM8Gd11ZVAuW4Rakvg7I2ArcbK3j.jpg', 'ProductImages/BackImage/hhXGaRFYA0gOVFUVecJIKOPOe3PBYzyvckmrNJ9W.jpg', 'ProductImages/RightImage/3KCZIoGvi5K0qurMc11feu3fgt0z4biBbj7HJpiM.jpg', 'ProductImages/LeftImage/Lv6mwAtP3eVnxfdmJ0WUMRKkAxSFFT2RRflYz1r5.jpg', '2025-03-26 13:22:59', '2025-03-26 13:22:59'),
(379, 185, 'Black/White', '#ffffff', 'Black/White', '#000000', 'ProductImages/FrontImage/hq6usvNHP46mNm1VMmZspHgNcHePDZ4fmZ2wNFr0.jpg', 'ProductImages/BackImage/UPDeq9mcBnqxX1UVGNMjA47pAGSKQ1n2u6rGhFT0.jpg', 'ProductImages/RightImage/04dy5uu7aJwznfxXylpqG9r6dZrmxhXJjcB48HYz.jpg', 'ProductImages/LeftImage/36WUtv6zThOkG8QY0vBzwfYzOlfl9nsVi7Iyu8xc.jpg', '2025-03-26 13:26:24', '2025-03-26 13:26:24'),
(380, 186, 'Charcoal/White', '#747d7d', 'Charcoal/White', '#ffffff', 'ProductImages/FrontImage/aFKcA5IZ7QIXqLWPQ7qDbfv8vjcGbwONAQz50aJB.jpg', 'ProductImages/BackImage/GsdU4W9KkwpTi6AjPyR8CKf1YzEUS1RmnwEWJj9Q.jpg', 'ProductImages/RightImage/2k0ThxbkD7RAbIV00djf51NK92B27o2ELV1EOW5l.jpg', 'ProductImages/LeftImage/j6W0kgsVNE2pB0vUiTuZk4O2s5hb64idc6YGwPfq.jpg', '2025-03-26 13:30:43', '2025-03-26 13:30:43'),
(381, 187, 'Ombre Blue/Navy', '#3e596a', 'Ombre Blue/Navy', '#15125c', 'ProductImages/FrontImage/ROfw12k8VIaDCqFNnCRGxCBXV1N9oiWRivznM7Lg.jpg', 'ProductImages/BackImage/M7ASBEbs8TmBGcGJnablqL5C1JjfaT6LFkWGHw7g.jpg', 'ProductImages/RightImage/ASdNaNwBuWUWQpn9R0kndJBwrn2IZKPwGttlIyhs.jpg', 'ProductImages/LeftImage/WzyQqjCmBFaMYUssOFYd1BrVFGY0ojL3ACiSFtNx.jpg', '2025-03-26 13:46:29', '2025-03-26 13:46:29'),
(382, 188, 'Brown/Khaki', '#6b4c45', 'Brown/Khaki', '#c0b870', 'ProductImages/FrontImage/P0uPwoz7SLbwRv2UgAwnl95XGRAyyXQso1OwO8Vm.jpg', 'ProductImages/BackImage/DCU1DdIPxQsyc4xiGTbblxbmCGnuRFrXOfwUf88W.jpg', 'ProductImages/RightImage/YvvKBAkgXwPwgHvtRSxfl5qJpaQiii7uFgRevmnt.jpg', 'ProductImages/LeftImage/kHDSz2FeBnFTqNbuFXH0dHKLbFq5DGSsBcDaZRWH.jpg', '2025-03-26 14:04:06', '2025-03-26 14:04:06'),
(383, 189, 'Raspberry Mist', '#d1edcb', 'Raspberry Mist', '#c42253', 'ProductImages/FrontImage/JZOKw0LZptOgpEyBWjzM0b55jYUOK4vmiNpLfSLJ.jpg', 'ProductImages/BackImage/KRY41JWHQ7OLm65QuuCNoxMOw1WDab84SP53DtM5.jpg', 'ProductImages/RightImage/pmN5Lojr366y6xuY0cR0MbYENsC5TmqEQrz7CFWe.jpg', 'ProductImages/LeftImage/ol68hEcjVyRH2lDTvAJNgiYY4ohQgIozzJIyumeq.jpg', '2025-03-26 14:04:12', '2025-03-26 14:04:12'),
(384, 190, 'Cotton Candy', '#ffa7a7', 'Cotton Candy', '#ffcbcb', 'ProductImages/FrontImage/QqHZ6FdHznfBx0R1aIjo5kKfGcrhNVGW3NHGrT6L.jpg', 'ProductImages/BackImage/mkXMoi710qEtbB2bsJWlfvlUkHanVzn6yvpbVCbH.jpg', 'ProductImages/RightImage/G0ZMGMXwZjm5kWBc6SwdNsVcHW0iI3kACuF2dEgv.jpg', 'ProductImages/LeftImage/CM9jbf2Strp9l09uq1WGwVkfL47YK9sLYKmr08KN.jpg', '2025-03-26 14:13:34', '2025-03-26 14:13:34'),
(385, 191, 'Charcoal/Black', '#747d7d', 'Charcoal/Black', '#000000', 'ProductImages/FrontImage/pSkrHwB2r3hLCmv65qgEvm8r9t42OQdrAXwToWC4.jpg', 'ProductImages/BackImage/s28I3fKLxcsQQ5KqUiWP1Qjdn1Lo7UvmbIbVvoYP.jpg', 'ProductImages/RightImage/Ki5EeqDo0DOCRTJNVPuQ4ARXHKPhrenQWbz0rCy3.jpg', 'ProductImages/LeftImage/ueWqtHNS9Vtg2Wjwm6u4YJPXMtsc8gRaB5i47sVJ.jpg', '2025-03-26 14:15:42', '2025-03-26 14:15:42'),
(386, 192, 'Grey', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/aPZIZ6ij5ynFxvAgIy3LOck1az8Nhjr0t7cnVz9Z.jpg', 'ProductImages/BackImage/hELFgzQuaxpfwsZCjdOQIMCCicS8YtLhPv4Mmg5N.jpg', 'ProductImages/RightImage/v6Fn8gUxzdoIGfORNEa23BVl2H4Rzd1JfqXdLRAo.jpg', 'ProductImages/LeftImage/ioiPUT22DPyLktPXdryzBOCanjoIM8ng3OfDkvjx.jpg', '2025-03-26 14:19:46', '2025-03-26 14:19:46'),
(387, 193, 'Heather Gray/Black', '#c4c4c4', 'Heather Gray/Black', '#000000', 'ProductImages/FrontImage/MjWwXh1eLKnVHP3HZmshvhUU83rgFmixMzVdZlf0.jpg', 'ProductImages/BackImage/6XNxSNE5fYEpu2jC574HqxkQQGrTrOn9cPFuowmP.jpg', 'ProductImages/RightImage/SvoBx4GGblZ5l6uxo6ZL1Gll2FHm6dYgaxEZGVhv.jpg', 'ProductImages/LeftImage/ym2mdy8hViumKrM98ZAhQmUfBu8X96EshtO6Q9ia.jpg', '2025-03-26 14:21:58', '2025-03-26 14:21:58'),
(389, 195, 'Red/Black', '#ff0000', 'Red/Black', '#000000', 'ProductImages/FrontImage/wxE5yklebEUdj0UlqxcDSlgy7JbmxEUZzPAzucNl.jpg', 'ProductImages/BackImage/YP1Kry7u7tmopFGUiozDaZJqTwpMkh1YbQEOPTlS.jpg', 'ProductImages/RightImage/e7LV0tTn9BZfEMYOS8BQUDDPdvtcFtSeTqiIx0hM.jpg', 'ProductImages/LeftImage/27MrmR94aQhFO2Uq9SmZwjhsxEhGDyGjiUiaYtAh.jpg', '2025-03-26 14:30:36', '2025-03-26 14:30:36'),
(390, 196, 'Royal/BlacK', '#3a35d4', 'Royal/Black', '#000000', 'ProductImages/FrontImage/gsXldKGJWBbYdbZqo7GxO7DfLdM6K6x8YTgLTfAr.jpg', 'ProductImages/BackImage/Cbx7d7qgJ0FCyZK9QGRikpsAn4jkCMvQ37t0Yx6K.jpg', 'ProductImages/RightImage/vUz1ZeONzsYF0GGndCT20ldfXkDYuTbp2lKecJDG.jpg', 'ProductImages/LeftImage/WBbM3Cod77v6odO0etaKTkON8NIujmnlVYkoCXed.jpg', '2025-03-26 14:37:32', '2025-03-26 14:37:32'),
(391, 197, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/EQHmf8QROPTZPE2AQQwAPesPO4oLMIPFQSnOufBM.jpg', 'ProductImages/BackImage/14ojSBvzDjzCaSJqtNBAKO1YNTE3rKiHZ7lkhKsk.jpg', 'ProductImages/RightImage/scTfKsiPzbdq7AdQJlCFjQLVfR3lSGoj1TxFDHXq.jpg', 'ProductImages/LeftImage/9FMb4oF4zehgTDO1bbODr9PWrjMSbbqHCxqVLapA.jpg', '2025-03-26 14:41:40', '2025-03-26 14:41:40'),
(392, 198, 'Black/Charcoal', '#747d7d', 'Black/Charcoal', '#000000', 'ProductImages/FrontImage/Qir3XV9JA8vNRBKQxSgERhHnou6BFOG1GlJ68RlC.jpg', 'ProductImages/BackImage/6Ihubd3Q5jnqHDcUFW7cbeE7zjwsTH6SPuWiP6Es.jpg', 'ProductImages/RightImage/AblNcMRio9Ir56len87PzCTbMCJkQhABEfA0ux4m.jpg', 'ProductImages/LeftImage/4ZNZx5bJrTOWRJd9gwPttimNHotIA6UR6RSdYdcr.jpg', '2025-03-26 14:47:26', '2025-03-26 14:47:26'),
(393, 199, 'Black/Neon pink', '#ff459c', 'Black/Neon pink', '#000000', 'ProductImages/FrontImage/OxQ7geT8SllCKi4RBmSyMhByAFsLj67ZGUmedTk5.jpg', 'ProductImages/BackImage/wr95PqKyc8HRMaus89Y3Cv9ol8Nj5Cdwa6doBLtA.jpg', 'ProductImages/RightImage/XrND0POE2Ki7hvrCc0S7aYYvqiIPVGHEdKlxndgj.jpg', 'ProductImages/LeftImage/TA46lCDXAwRdCzgyeihEIjlbbNMeLWHhKSJhBDHf.jpg', '2025-03-26 14:53:22', '2025-03-26 14:53:22'),
(394, 200, 'Blue Teal/Birch/Navy', '#367588', 'Blue Teal/Birch/Navy', '#f8dfa1', 'ProductImages/FrontImage/KdksZKazuUV03ApgbNTI9HWHq5KygLxTHw9zooys.jpg', 'ProductImages/BackImage/iL1LXR3FH40ZeQYxVLkRRVhwVJYVHNa8D9r1whuc.jpg', 'ProductImages/RightImage/0INHfGCeh1mqm9YcmWlWaipOvh0ItKip0tYGAq4P.jpg', 'ProductImages/LeftImage/dQooE1KGoYAX6S6X6WvCdUwa5yG8q2wQmTyFHPPM.jpg', '2025-03-26 15:00:57', '2025-03-26 15:00:57'),
(395, 201, 'Sorbet', '#fac815', 'Sorbet', '#89f2e7', 'ProductImages/FrontImage/tY3NYR2Fnzc1Y3c1pw6I9XKZeOsUNWFqt6OO1Jcj.jpg', 'ProductImages/BackImage/jc9VwxXqK4RyqPjjEqibdd89bTB9NiWi3oCLiQtD.jpg', 'ProductImages/RightImage/Hfoo48f78iFaxWgKpdzXORXHyxbh06R5gHBA6wjC.jpg', 'ProductImages/LeftImage/jMb9ZRQ6nyeJCgXXy06rh36LMZpGPGgnup54Z4pD.jpg', '2025-03-26 15:05:29', '2025-03-26 15:05:29'),
(396, 202, 'Brown/Khaki', '#6b4c45', 'Brown/Khaki', '#c0b870', 'ProductImages/FrontImage/aJKXjWFAs44zbaDtSER0Jc9Utap0YN9DlzXdOZYx.jpg', 'ProductImages/BackImage/RA77ruWL5Ov5hmleKBTyxJWzLmbvJvJhd1aKmqK8.jpg', 'ProductImages/RightImage/ZwJXYdjDqYFJAgqnfqkjid7HLmHQkMpmdIl4zJ4Z.jpg', 'ProductImages/LeftImage/EvjtDfZpq3cjkjC09B3onD9WA7MI3wkpccnzISTU.jpg', '2025-03-26 15:07:05', '2025-03-26 15:07:05'),
(397, 203, 'Chocolate Chip/Gray', '#685a4e', 'Chocolate Chip/Gray', '#bdbdbd', 'ProductImages/FrontImage/fSz03ubD9d2wKmHgO4En7HHZ12SJFIHEmQ1xesNQ.jpg', 'ProductImages/BackImage/h5eF8qzPgBm14u6WUaFqLuJGYLkkDA6w4EbbEO0i.jpg', 'ProductImages/RightImage/kvYz1LG4mNKu2MFw5mnwFoT6gpI2VNfIoGuP5alj.jpg', 'ProductImages/LeftImage/7CY5lkZOCwxsjpyppTDiw8kNrRrB9NA7St8TL463.jpg', '2025-03-26 15:12:16', '2025-03-26 15:12:16'),
(398, 204, 'Coffee/Claret', '#6f4e37', 'Coffee/Claret', '#7f1734', 'ProductImages/FrontImage/QellGnFsR8mEDmDYUIXOZtum9VdJFXlI2M2KGewB.jpg', 'ProductImages/BackImage/zPsBDWX9LkLU6OytGqbfiljiALIopC5277bw7kyZ.jpg', 'ProductImages/RightImage/xoGbXDQA5MgWMv7dK68KxwYtP8Zj0xivgUmb0izN.jpg', 'ProductImages/LeftImage/F9HMqVQY0XRlC4uTsD5MRP1WT2PdKAZ6yHKr4h2w.jpg', '2025-03-26 15:16:30', '2025-03-26 15:16:30'),
(399, 205, 'Cyan/Black', '#00ffff', 'Cyan/Black', '#000000', 'ProductImages/FrontImage/CtA0PB8Oj3vAO4Y4Fjo0T0S2OKV5LMAqTruukYOZ.jpg', 'ProductImages/BackImage/9PUuy0Ukc6hDko5OnRJYdMLSOC8eWqR8mMQIeFqx.jpg', 'ProductImages/RightImage/6jCH22nsgRvAxyKoVKFOIARzcuX6NvXKL1jebDXf.jpg', 'ProductImages/LeftImage/qfETUC8bDU81hirEKBAaiNvOKGQcjshzRNd33xYT.jpg', '2025-03-26 15:20:45', '2025-03-26 15:20:45'),
(401, 206, 'Dark Loden/Jaffa', '#415236', 'Dark Loden/Jaffa', '#e27945', 'ProductImages/FrontImage/YmJ5eulwJC8cAk5r8skyFzxMvFobrFfzzpSojFdr.jpg', 'ProductImages/BackImage/3doknHYxrNwSaQL5Z2XQUvx4KjcT16LbDLpXBvRe.jpg', 'ProductImages/RightImage/GaflrQNhMRuOCsCqej5gLF0emjg30VE9lxfOKN4v.jpg', 'ProductImages/LeftImage/XZjQapJ2OX3BCwEMfvD8yesErqWUKB0uJOZ48bFq.jpg', '2025-03-26 15:25:36', '2025-03-26 15:25:36'),
(402, 207, 'Purple Passion', '#8d4592', 'Purple Passion', '#ad65b2', 'ProductImages/FrontImage/9VwwRhaHdnRlzdCyW2BAlYURflno9tSBw1WLnWE5.jpg', 'ProductImages/BackImage/W0ePGhwa85UaETokkbUbZQ8ZlkrxuDomdVDTwB3A.jpg', 'ProductImages/RightImage/zCl0ZZxduhXbh666Q5tA0tdgkTWL4h7cTDQDXINx.jpg', 'ProductImages/LeftImage/iuxXOL287FsurAe8kwgq2gOmQCyaPSmOUm4UFZ23.jpg', '2025-03-26 15:28:07', '2025-03-26 15:28:07'),
(403, 208, 'Heather Gray/Birch', '#c4c4c4', 'Heather Gray/Birch', '#f8d8a1', 'ProductImages/FrontImage/GjQltQp1GLty0KFx0mpDeOOrCPzfl0eFiaKu0GFi.jpg', 'ProductImages/BackImage/9KblEtIooVf5PHfetWpvXAGbylzu6Z8s4DpDxypP.jpg', 'ProductImages/RightImage/MOWqMtWsr6l1cCsaisRcDPpIEFeOPJrxp8hjsA0v.jpg', 'ProductImages/LeftImage/LRu87Q4ayhnoe7GjqNhOww6EMYyQcivOonMOkYgt.jpg', '2025-03-26 15:29:36', '2025-03-26 15:29:36'),
(404, 209, 'Pastel', '#e1f7d5', 'Pastel', '#ffbdbd', 'ProductImages/FrontImage/AgOtmhTLurAkOpQVXf2a4xKps4LlVVjK8hSMqBi6.jpg', 'ProductImages/BackImage/FupNTvLgzsOPWVnIw5AoD0uE6DJJ3lx5khDcYwXf.jpg', 'ProductImages/RightImage/HS1wNiU9mfr6K2D8OlloM3xrrzlkFwt7J9jv0dif.jpg', 'ProductImages/LeftImage/pevFIcTLkKsJwptXaDMU5C4r0XmnMbinfljqG99p.jpg', '2025-03-26 15:32:55', '2025-03-26 15:32:55'),
(405, 210, 'Heather Gray/Dark Charcoal', '#c4c4c4', 'Heather gray/Dark charcoal', '#333333', 'ProductImages/FrontImage/C4cVdiJnyh66g39OVnNaSy7ggIKKcyjU9s8aPDSW.jpg', 'ProductImages/BackImage/OZxmKl3npxNRfdvbDjaMEAxUDo8J1M3GJyEutglY.jpg', 'ProductImages/RightImage/Uzsb0TWHRn3YD054GQiVdIXPNBzuLbIqywCCGFCB.jpg', 'ProductImages/LeftImage/s1WFT31o3SDlmaISgBiIiqzNQS5ONC5HPIG6NwF8.jpg', '2025-03-26 15:34:00', '2025-03-26 15:34:00'),
(406, 211, 'Heather Royal/Silver', '#307fe2', 'Heather Royal/Silver', '#c0c0c0', 'ProductImages/FrontImage/s6pyH56V5Y3y5VnIS6JFFRgB98tRE2BoAT3wcll8.jpg', 'ProductImages/BackImage/i9KXw4vwPLsrecl3tWjYoEsk3WV3Se86pxjUQP29.jpg', 'ProductImages/RightImage/AAltFjTeUcHKMhXrNGJsQDB56bSVgjUFr34LsZpg.jpg', 'ProductImages/LeftImage/LN6UnbdCMEI6oKE899EXaeHPsK9pmZfE32pUTyrb.jpg', '2025-03-26 15:38:42', '2025-03-26 15:38:42'),
(407, 212, 'Hot Pink/Black', '#ff69b4', 'Hot Pink/Black', '#000000', 'ProductImages/FrontImage/OKS2VJGHAL0CdCKucIXQfye9utEoHK6Vz3OT0txR.jpg', 'ProductImages/BackImage/TkjSkhjjrqH3VhncEFft9gVHDTolPE7d3bnORNC2.jpg', 'ProductImages/RightImage/ljJY7fv1N0JLBryv1pOviph1xFfZzxQiT3KfdSor.jpg', 'ProductImages/LeftImage/EmvdhQLkCSYQ6fhaedshCd2VZCRvVNSi4XoQcw4G.jpg', '2025-03-26 15:42:53', '2025-03-26 15:42:53'),
(408, 213, 'Loden', '#415236', NULL, '#000000', 'ProductImages/FrontImage/NZuyBPEVF7XUiNq1gf8W5L3tCf1PqVoE119dUhfB.jpg', 'ProductImages/BackImage/qMiwGLXzreq2xmxDaNN8U5zPTCPLX2HVCzMsQEHr.jpg', 'ProductImages/RightImage/8oZa7DQbfnVmzLi1Mvua1GIrqcPtLcNYvnFC2tjn.jpg', 'ProductImages/LeftImage/vgwmPWuQMJr6MP9btkdrL7WpuXWo3dnneb5R4z4C.jpg', '2025-03-26 15:47:25', '2025-03-26 15:47:25'),
(409, 214, 'Smoke Blue/Aluminum', '#829ba6', 'Smoke Blue/Aluminum', '#c9ced0', 'ProductImages/FrontImage/dfC05Sg7XT3um0iBHLD7Y1Tzc7WAnAcYy0zy7Vvu.jpg', 'ProductImages/BackImage/eTdNk3l4xkFPgAq1RTCJ4VMWJ6DXJKIMoPFCkJQw.jpg', 'ProductImages/RightImage/icVeTyEwa6kYbZGhGSgEKyCXhBK6TuyPT3zZAXIu.jpg', 'ProductImages/LeftImage/kBgFsS2zPcIuLBcf789HN2D4JdBbSP1WnXpLt5Vo.jpg', '2025-03-26 15:52:14', '2025-03-26 15:52:14'),
(410, 215, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/CBgDWcTQDGSDrjZZ0lzNtTFEjiY6wkEzROXMd2JB.jpg', 'ProductImages/BackImage/Gss1STi8XwFu4eVXR6YcK0X6gg4Zsh5viFQR6ziR.jpg', 'ProductImages/RightImage/ADSe3B95pL9wkhiTlRYim6z0HWwrKqUXguBV8phe.jpg', 'ProductImages/LeftImage/6GBa1Yv6CTIoQbCIKnm89aCgjIDauDYBo3PRp27i.jpg', '2025-03-26 15:56:44', '2025-03-26 15:56:44'),
(411, 216, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/JEKBclqm5t0vZSfO6FMBkJKqlawZ1EoybirTSFp1.jpg', 'ProductImages/BackImage/ua4fRI90hGSn5NVgguzSr3Nk3UGNmd7CaaZtOJ5i.jpg', 'ProductImages/RightImage/xuJ17GtlWZLHzRsqWF0fvMUsTFJ7ajjQwAXdMiXd.jpg', 'ProductImages/LeftImage/x5Ob1qnfh7GnTBHUlYEjj7EYWXj9d1JbpZ7zlJEg.jpg', '2025-03-26 16:01:50', '2025-03-26 16:01:50'),
(412, 217, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/3des7fzi6Go8T6T9MR6VV51gajtifvIIsdDoaxkb.jpg', 'ProductImages/BackImage/D1UwxqfUQJYtYLxwaOpJM6IHQiDSP4cwWhCbS6lA.jpg', 'ProductImages/RightImage/khb2dCPwqVEVOrWUAzrPAxoI4ac3MZxxzlPrY464.jpg', 'ProductImages/LeftImage/ojBCLsHhslXavhYFfHcS3Ae5a4UwLrQTMcizJqTu.jpg', '2025-03-26 16:04:30', '2025-03-26 16:04:30'),
(413, 218, 'Charcoal', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/qlH5h9o0y0qF1j7QmuLLkisPCHZCgTLbQKKRo32K.jpg', 'ProductImages/BackImage/tqZrxQJQIjBRKyznBl1260Mcj1HPWhUi3Wsjm4FV.jpg', 'ProductImages/RightImage/Icd3mC4B3zlvkpiP3ctJ98SI4yws5NI4jGCrMbx0.jpg', 'ProductImages/LeftImage/rQis9a5P0hThWNTg92z6yRJmSBTjxQlm4uQV4LF8.jpg', '2025-03-26 16:07:37', '2025-03-26 16:07:37'),
(414, 219, 'White/Gold/Black', '#ffffff', 'White/Gold/Black', '#ffd700', 'ProductImages/FrontImage/Bs4ujTjzDUViGWnFhaZzbqjSOFxPobzOieOodsmX.jpg', 'ProductImages/BackImage/cqw8T83fHAwocd8hWQGLToDoaYuhGrHPn1fvB4QO.jpg', 'ProductImages/RightImage/RRQcnfHi9WOUOuM6jzdowiOkFvqR5uFMgLTbXM5E.jpg', 'ProductImages/LeftImage/GbIZsYEkAaI2F1K4kzVo5nhjRWnyEd4DiCJ4Xgz6.jpg', '2025-03-26 16:12:01', '2025-03-26 16:12:01'),
(415, 220, 'White/Gold/Dark Green', '#ffd700', 'White/Gold/Dark Green', '#000000', 'ProductImages/FrontImage/K9vWWO1F9ecz72zmpFWWz1zCJ44ftplXFCcyFBoI.jpg', 'ProductImages/BackImage/4S3gwMNGMfix90F92ApnI5EYPoGgek4BWr4SHbHB.jpg', 'ProductImages/RightImage/9l3VAnZhGNR0467yafhRrPAXqyn7OQ4GXtB4zghO.jpg', 'ProductImages/LeftImage/mK4hjISS9c0wqa9egwwgRiVX4LMDpP1dfFmQmxVD.jpg', '2025-03-26 16:16:21', '2025-03-26 16:16:21'),
(416, 221, 'White/Grey/Deep Navy', '#cccccc', 'White/Grey/Deep Navy', '#ffffff', 'ProductImages/FrontImage/f40FK2i5obCTkWSyqLz3TrmLwCIOLOnQ7xSu8qkD.jpg', 'ProductImages/BackImage/ES4SI9EqKyJhyBHlXIcQtzXNL2qHF81Okaw6NuJS.jpg', 'ProductImages/RightImage/TCblvVgcyizfUk7meWPLzeed0hQatKGcvGLKOog3.jpg', 'ProductImages/LeftImage/o8A5pP4XG2LmEIz1KhG7Bi2TMOY1bqOBE6mpfdkD.jpg', '2025-03-26 16:21:04', '2025-03-26 16:21:04'),
(417, 222, 'White/Scarlet/Deep Navy', '#d91f00', 'White/Scarlet/Deep Navy', '#ffffff', 'ProductImages/FrontImage/5iBEUMjsRnp8tnPURNyv768yFrZ5wNL9mwQ1JYN4.jpg', 'ProductImages/BackImage/4wCy5d73AEz0tsiUCq2yjwRGQtpFZVdHi6YQxYUy.jpg', 'ProductImages/RightImage/Q4UF8HP1w0SdaVbno1Hkjv88FTPMtikCM1jg229o.jpg', 'ProductImages/LeftImage/buNgwUJBttPttAXhrlNugDQJc0xJsf5WMYvbSIoS.jpg', '2025-03-26 16:25:31', '2025-03-26 16:25:31'),
(418, 223, 'Deep Navy/Gold', '#15125c', 'Deep Navy/Gold', '#ffd700', 'ProductImages/FrontImage/9mrgorSIEyISThuE7EmxgeV6XTdNXWEWGWuT6CuE.jpg', 'ProductImages/BackImage/9k2bNH6AgL8L5WlxSl8o1PicGnZiwIwfJ8FzalJu.jpg', 'ProductImages/RightImage/JaBEogaJp30G2wPpNLWw22ztiXRAA5oKmGyDmEGW.jpg', 'ProductImages/LeftImage/ttMZJ3AFgud1J0BPBG2a7pk2qwdhG7Flrt8EAvLb.jpg', '2025-03-26 16:32:23', '2025-03-26 16:32:23'),
(419, 224, 'Scarlet/White', '#d91f00', 'Scarlet/White', '#ffffff', 'ProductImages/FrontImage/q1PQHIDVkSD6ly0H61lnydTvrSaT661d7rcPJXzy.jpg', 'ProductImages/BackImage/6Ix1t6tDZTTWZwvsgjcTVAS8B30MNpsQKn02lJyk.jpg', 'ProductImages/RightImage/08x7z0gcbrkI1VElaUpgNDAeDqmAHXB4IglwVUKQ.jpg', 'ProductImages/LeftImage/dHcOC4UCuYBC2n7FQMK9Qqs0466XMxzeInmeJSzw.jpg', '2025-03-26 16:37:44', '2025-03-26 16:37:44'),
(420, 225, 'Black/Graphite/White', '#251607', 'Black/Graphite/White', '#000000', 'ProductImages/FrontImage/3VXb8kLoIKfT6RoUH2j9M7W3BJ1zV9dGBJBYTYPo.jpg', 'ProductImages/BackImage/YtHZumKkmfj16Jpv0urKslcfhjHkeVQIJpP9L7rK.jpg', 'ProductImages/RightImage/TTETaoVRwZPwy6x5DGXmdiWxXa0gNEEZmygUv89d.jpg', 'ProductImages/LeftImage/CCpCOW32Mu6jGmAzKR1y5Sj1lRsvVs8FmVlnVwhY.jpg', '2025-03-26 16:53:20', '2025-03-26 16:53:20'),
(421, 225, 'Royal/Grey/White', '#4169e1', 'Royal/Grey/White', '#808080', 'ProductImages/FrontImage/QaG9LRb9iy0VkjZcPHpdUotTJVuie5khGb83KPJj.jpg', 'ProductImages/BackImage/CWKs4np08UBaifuGWFue2m3ay87J9r732GCUrhS4.jpg', 'ProductImages/RightImage/nZwboLtZ8TukEnYoW82AF1EIoquQWi9qComx0XZP.jpg', 'ProductImages/LeftImage/TKMdOkNX4cCNvALS2YTsoB1JS1GjzIZ9Uz0DphiI.jpg', '2025-03-26 16:53:20', '2025-03-26 16:53:20'),
(422, 226, 'Black/Graphite/White', '#251607', 'Black/Graphite/White', '#000000', 'ProductImages/FrontImage/jRcA3nAuJbeUxvcetsDNumyBLnFvTf9qWwYVuwNE.jpg', 'ProductImages/BackImage/MSXz0NXOxrvRge7mQKSHsuwkbVKLmim5jo6ZBi4Q.jpg', 'ProductImages/RightImage/hW96YurqZlNpyG9eyj49YN6nN8P7HP19ceth0Z6F.jpg', 'ProductImages/LeftImage/zXeRn14s4P5pw73NVtH5F4aeePmUUa2mridY0MIw.jpg', '2025-03-26 16:59:07', '2025-03-26 16:59:07'),
(423, 227, 'Royal/Gray/White', '#4169e1', 'Royal/Gray/White', '#808080', 'ProductImages/FrontImage/FZ8JB2X4cLM8vV1gYtqURHJHfC1xbcstQM0xY7fd.jpg', 'ProductImages/BackImage/8BXmRKYYnVoV9woaC82HZoLOMLDJzTyf1IWOXGdG.jpg', 'ProductImages/RightImage/eVjVXdqW2WbVxtAcgiHn0fTZ8OdBgGktRDQOxEc9.jpg', 'ProductImages/LeftImage/WxFjqQOT0VUhssv66BzpJu5rDGnTYAMnFh5PoAPl.jpg', '2025-03-26 17:06:56', '2025-03-26 17:06:56'),
(424, 228, 'Graphite Heather/Royal', '#474a51', 'Graphite Heather/Royal', '#4169e1', 'ProductImages/FrontImage/CK80PnMwIhGXviushsDSTLVVcMVQNW5oCbVcRsZM.jpg', 'ProductImages/BackImage/nPkRwZ4U15qd4PQSBFcRfLs9xrcFkPRI4AD8FeJM.jpg', 'ProductImages/RightImage/SRizcucf4EvMcHaQU3559mkUnl7nlz4DIsg1OGhF.jpg', 'ProductImages/LeftImage/DO9tBHUbKulrac0od5JuRmIQurx9UVag1ybKC75I.jpg', '2025-03-26 17:27:51', '2025-03-26 17:27:51'),
(425, 228, 'Graphite Heather/Dark Green', '#474a51', 'Graphite Heather/Dark Green', '#006400', 'ProductImages/FrontImage/h77ylpFFoM8WETLoztEi9CBtzazeEakzdOXOJXip.jpg', 'ProductImages/BackImage/LkonZqc9J4U2CtVL5k939M60JN2S3yzjQLBWqXqg.jpg', 'ProductImages/RightImage/vOpa8qYOEPXROD84ozW4Xi8n1m0M7nGnyC74tjJC.jpg', 'ProductImages/LeftImage/sVmg6xqHjyI3Np5Eed1Ldn3GbJzcuVSxLX820MZx.jpg', '2025-03-26 17:27:51', '2025-03-26 17:27:51'),
(426, 229, 'Graphite Heather/Dark Green', '#474a51', 'Graphite Heather/Dark Green', '#006400', 'ProductImages/FrontImage/FEdtXM8JQ4kqn3YNVyu7vX9qpAD7xXI9sfc55KvL.jpg', 'ProductImages/BackImage/s9W4ypRS2jETZiiBXSPcX5LKdlo2mN5m860v22rs.jpg', 'ProductImages/RightImage/yw56nF81iLvdbfJe3RTxVClmM2gNfiSXMlvogNnK.jpg', 'ProductImages/LeftImage/e2PrxvGNjXPGcJrtjNGEmYusV791wSxKfLBv5Fen.jpg', '2025-03-26 17:33:24', '2025-03-26 17:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_delivery`
--

CREATE TABLE `product_delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quantity` text NOT NULL,
  `pricing` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_delivery`
--

INSERT INTO `product_delivery` (`id`, `quantity`, `pricing`, `created_at`, `updated_at`) VALUES
(1, '\"[\\\"12\\\",\\\"25\\\",\\\"50\\\",\\\"100\\\",\\\"250\\\",\\\"500\\\",\\\"1000\\\",\\\"2500\\\",\\\"5000\\\"]\"', '\"[\\\"20\\\",\\\"18\\\",\\\"16\\\",\\\"14\\\",\\\"12\\\",\\\"10\\\",\\\"8\\\",\\\"6\\\",\\\"4\\\"]\"', '2025-01-21 16:43:57', '2025-01-21 16:43:57');

-- --------------------------------------------------------

--
-- Table structure for table `product_printing`
--

CREATE TABLE `product_printing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` text DEFAULT NULL,
  `quantity` text NOT NULL,
  `price` text NOT NULL,
  `is_leather` int(11) NOT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_printing`
--

INSERT INTO `product_printing` (`id`, `title`, `image`, `quantity`, `price`, `is_leather`, `visibility`, `created_at`, `updated_at`) VALUES
(1, 'No Imprint - Blank', 'ProductPrintingImages/qEyTNpdavaDywG5NN3nlDkfI1gotxneMMpZ3CZmJ.jpg', '[\"0\"]', '[\"0\"]', 0, 1, '2025-01-21 05:45:19', '2025-01-21 05:45:19'),
(2, 'Direct Embroidery', 'ProductPrintingImages/j6b3JRbeBkVadUbLWKfe0XALB4R1cIvvXVWLVQwG.png', '[\"12\",\"25\",\"50\",\"100\",\"250\",\"500\",\"1000\",\"2500\",\"5000\",\"10000\"]', '[\"6.5\",\"4.75\",\"4.35\",\"4.35\",\"4.25\",\"4\",\"3.75\",\"3.5\",\"3\",\"2\"]', 0, 1, '2025-01-28 10:03:04', '2025-01-28 10:03:04'),
(3, 'Embroidery Patch', 'ProductPrintingImages/Zu6vTdKP2RRiGBfx5cMMpWm6Z4iq0lXd06fM4UV9.jpg', '[\"12\",\"25\",\"50\",\"100\",\"250\",\"500\",\"1000\",\"2500\",\"5000\",\"10000\"]', '[\"7.15\",\"5.225\",\"4.785\",\"4.785\",\"4.675\",\"4.4\",\"4.125\",\"3.85\",\"3.3\",\"2.2\"]', 0, 1, '2025-01-21 05:45:49', '2025-01-21 05:45:49'),
(4, '3D Embroidery Patch', 'ProductPrintingImages/EQq6Qt2bLkCjQgiGGYqcVoBr06t92JWonssG2hAW.jpg', '[\"12\",\"25\",\"50\",\"100\",\"250\",\"500\",\"1000\",\"2500\",\"5000\",\"10000\"]', '[\"1\"]', 0, 0, '2025-01-21 05:46:03', '2025-01-21 05:46:03'),
(5, 'DTF', 'ProductPrintingImages/y0UAtXSxwQ2lKv5iyTChQ9LXCNsSvwOozHAhKMKA.jpg', '[\"12\",\"25\",\"50\",\"100\",\"250\",\"500\",\"1000\",\"2500\",\"5000\",\"10000\"]', '[\"6.955\",\"5.0825\",\"4.6545\",\"4.6545\",\"4.5475\",\"4.28\",\"4.0125\",\"3.745\",\"3.21\",\"2.14\"]', 0, 1, '2025-01-21 05:46:20', '2025-01-21 05:46:20'),
(6, 'Woven Patch', 'ProductPrintingImages/1YH73Phgwd5ZJ75ASa0RMbcdOMUiLTjKQLQEu2j0.jpg', '[\"12\",\"25\",\"50\",\"100\",\"250\",\"500\",\"1000\",\"2500\",\"5000\",\"10000\"]', '[\"2\"]', 0, 0, '2025-01-21 05:46:32', '2025-01-21 05:46:32'),
(7, 'Woven Labels', 'ProductPrintingImages/AkXODM7syZdlakFzrWbgSXmST8ctfDOAbAg47jM9.jpg', '[\"12\",\"25\",\"50\",\"100\",\"250\",\"500\",\"1000\",\"2500\",\"5000\",\"10000\"]', '[\"2\"]', 0, 0, '2025-01-21 05:46:41', '2025-01-21 05:46:41'),
(8, 'Real Leather Patch', 'ProductPrintingImages/FtyRjewN0y5L2BOVoP5yk8YoXAvzbyRr3IR0x5WA.jpg', '[\"12\",\"25\",\"50\",\"100\",\"250\",\"500\",\"1000\",\"2500\",\"5000\",\"10000\"]', '[\"\",\"\",\"6.98175\",\"6.98175\",\"6.82125\",\"6.42\",\"6.01875\",\"5.6175\",\"4.815\",\"3.21\"]', 1, 1, '2025-01-21 05:46:54', '2025-01-21 05:46:54'),
(11, 'adkdkl', 'ProductPrintingImages/YosugEAXeu29ymH0DUIBtMuerAfk3k4tyqxiHJAk.jpg', '[\"2\"]', '[\"2\"]', 0, 1, '2025-03-04 10:06:45', '2025-03-04 10:06:45');

-- --------------------------------------------------------

--
-- Table structure for table `product_seo`
--

CREATE TABLE `product_seo` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `metatitle` text DEFAULT NULL,
  `metadescription` text DEFAULT NULL,
  `metakeywords` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_seo`
--

INSERT INTO `product_seo` (`id`, `product_id`, `metatitle`, `metadescription`, `metakeywords`, `created_at`, `updated_at`) VALUES
(13, 29, NULL, NULL, NULL, '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(14, 30, NULL, NULL, NULL, '2025-03-24 12:09:02', '2025-03-24 12:09:02'),
(15, 31, NULL, NULL, NULL, '2025-03-24 12:16:27', '2025-03-24 12:16:27'),
(16, 32, NULL, NULL, NULL, '2025-03-24 12:23:20', '2025-03-24 12:23:20'),
(17, 33, NULL, NULL, NULL, '2025-03-24 12:28:28', '2025-03-24 12:28:28'),
(18, 34, NULL, NULL, NULL, '2025-03-24 12:34:43', '2025-03-24 12:34:43'),
(19, 35, NULL, NULL, NULL, '2025-03-24 12:43:52', '2025-03-24 12:43:52'),
(20, 36, NULL, NULL, NULL, '2025-03-24 12:49:12', '2025-03-24 12:49:12'),
(23, 39, NULL, NULL, NULL, '2025-03-24 14:01:48', '2025-03-24 14:01:48'),
(24, 40, NULL, NULL, NULL, '2025-03-24 14:07:39', '2025-03-24 14:07:39'),
(25, 41, NULL, NULL, NULL, '2025-03-24 14:11:06', '2025-03-24 14:11:06'),
(33, 49, NULL, NULL, NULL, '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(34, 50, NULL, NULL, NULL, '2025-03-24 16:07:45', '2025-03-24 16:07:45'),
(35, 51, NULL, NULL, NULL, '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(36, 52, NULL, NULL, NULL, '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(37, 53, NULL, NULL, NULL, '2025-03-24 16:31:01', '2025-03-24 16:31:01'),
(38, 54, NULL, NULL, NULL, '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(39, 55, NULL, NULL, NULL, '2025-03-24 16:47:42', '2025-03-24 16:47:42'),
(40, 56, NULL, NULL, NULL, '2025-03-24 16:54:09', '2025-03-24 16:54:09'),
(41, 57, NULL, NULL, NULL, '2025-03-24 16:58:09', '2025-03-24 16:58:09'),
(42, 58, NULL, NULL, NULL, '2025-03-24 17:01:54', '2025-03-24 17:01:54'),
(43, 59, NULL, NULL, NULL, '2025-03-24 17:05:43', '2025-03-24 17:05:43'),
(44, 60, NULL, NULL, NULL, '2025-03-24 17:09:31', '2025-03-24 17:09:31'),
(45, 61, NULL, NULL, NULL, '2025-03-24 17:15:21', '2025-03-24 17:15:21'),
(46, 62, NULL, NULL, NULL, '2025-03-24 17:20:01', '2025-03-24 17:20:01'),
(47, 63, NULL, NULL, NULL, '2025-03-24 18:53:17', '2025-03-24 18:53:17'),
(48, 64, NULL, NULL, NULL, '2025-03-24 18:58:32', '2025-03-24 18:58:32'),
(49, 65, NULL, NULL, NULL, '2025-03-24 19:41:43', '2025-03-24 19:41:43'),
(50, 66, NULL, NULL, NULL, '2025-03-24 19:54:24', '2025-03-24 19:54:24'),
(51, 67, NULL, NULL, NULL, '2025-03-24 20:05:21', '2025-03-24 20:05:21'),
(52, 68, NULL, NULL, NULL, '2025-03-24 20:12:23', '2025-03-24 20:12:23'),
(53, 69, NULL, NULL, NULL, '2025-03-24 20:17:33', '2025-03-24 20:17:33'),
(54, 70, NULL, NULL, NULL, '2025-03-24 20:21:46', '2025-03-24 20:21:46'),
(55, 71, NULL, NULL, NULL, '2025-03-24 20:29:53', '2025-03-24 20:29:53'),
(56, 72, NULL, NULL, NULL, '2025-03-24 20:34:36', '2025-03-24 20:34:36'),
(57, 73, NULL, NULL, NULL, '2025-03-24 20:41:00', '2025-03-24 20:41:00'),
(58, 74, NULL, NULL, NULL, '2025-03-24 20:49:02', '2025-03-24 20:49:02'),
(59, 75, NULL, NULL, NULL, '2025-03-24 20:55:10', '2025-03-24 20:55:10'),
(60, 76, NULL, NULL, NULL, '2025-03-24 21:14:21', '2025-03-24 21:14:21'),
(61, 77, NULL, NULL, NULL, '2025-03-24 21:19:05', '2025-03-24 21:19:05'),
(62, 78, NULL, NULL, NULL, '2025-03-25 11:13:38', '2025-03-25 11:13:38'),
(64, 80, NULL, NULL, NULL, '2025-03-25 11:54:43', '2025-03-25 11:54:43'),
(66, 82, NULL, NULL, NULL, '2025-03-25 12:00:26', '2025-03-25 12:00:26'),
(67, 83, NULL, NULL, NULL, '2025-03-25 12:04:27', '2025-03-25 12:04:27'),
(68, 84, NULL, NULL, NULL, '2025-03-25 12:07:49', '2025-03-25 12:07:49'),
(69, 85, NULL, NULL, NULL, '2025-03-25 12:10:58', '2025-03-25 12:10:58'),
(70, 86, NULL, NULL, NULL, '2025-03-25 12:16:08', '2025-03-25 12:16:08'),
(71, 87, NULL, NULL, NULL, '2025-03-25 12:19:34', '2025-03-25 12:19:34'),
(73, 89, NULL, NULL, NULL, '2025-03-25 12:24:03', '2025-03-25 12:24:03'),
(74, 90, NULL, NULL, NULL, '2025-03-25 12:27:48', '2025-03-25 12:27:48'),
(75, 91, NULL, NULL, NULL, '2025-03-25 12:32:21', '2025-03-25 12:32:21'),
(76, 92, NULL, NULL, NULL, '2025-03-25 12:37:12', '2025-03-25 12:37:12'),
(77, 93, NULL, NULL, NULL, '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(79, 95, NULL, NULL, NULL, '2025-03-25 12:46:49', '2025-03-25 12:46:49'),
(80, 96, NULL, NULL, NULL, '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(81, 97, NULL, NULL, NULL, '2025-03-25 12:56:01', '2025-03-25 12:56:01'),
(82, 98, NULL, NULL, NULL, '2025-03-25 13:00:00', '2025-03-25 13:00:00'),
(83, 99, NULL, NULL, NULL, '2025-03-25 13:03:48', '2025-03-25 13:03:48'),
(84, 100, NULL, NULL, NULL, '2025-03-25 13:06:53', '2025-03-25 13:06:53'),
(85, 101, NULL, NULL, NULL, '2025-03-25 13:10:21', '2025-03-25 13:10:21'),
(86, 102, NULL, NULL, NULL, '2025-03-25 13:17:08', '2025-03-25 13:17:08'),
(88, 104, NULL, NULL, NULL, '2025-03-25 13:20:24', '2025-03-25 13:20:24'),
(89, 105, NULL, NULL, NULL, '2025-03-25 13:23:58', '2025-03-25 13:23:58'),
(90, 106, NULL, NULL, NULL, '2025-03-25 13:24:00', '2025-03-25 13:24:00'),
(91, 107, NULL, NULL, NULL, '2025-03-25 13:28:04', '2025-03-25 13:28:04'),
(92, 108, NULL, NULL, NULL, '2025-03-25 13:30:02', '2025-03-25 13:30:02'),
(93, 109, NULL, NULL, NULL, '2025-03-25 13:38:04', '2025-03-25 13:38:04'),
(95, 111, NULL, NULL, NULL, '2025-03-25 13:45:40', '2025-03-25 13:45:40'),
(96, 112, NULL, NULL, NULL, '2025-03-25 13:45:47', '2025-03-25 13:45:47'),
(97, 113, NULL, NULL, NULL, '2025-03-25 13:49:01', '2025-03-25 13:49:01'),
(98, 114, NULL, NULL, NULL, '2025-03-25 13:57:19', '2025-03-25 13:57:19'),
(99, 115, NULL, NULL, NULL, '2025-03-25 14:00:31', '2025-03-25 14:00:31'),
(100, 116, NULL, NULL, NULL, '2025-03-25 14:01:30', '2025-03-25 14:01:30'),
(101, 117, NULL, NULL, NULL, '2025-03-25 14:04:01', '2025-03-25 14:04:01'),
(102, 118, NULL, NULL, NULL, '2025-03-25 14:07:04', '2025-03-25 14:07:04'),
(103, 119, NULL, NULL, NULL, '2025-03-25 14:07:57', '2025-03-25 14:07:57'),
(104, 120, NULL, NULL, NULL, '2025-03-25 14:10:52', '2025-03-25 14:10:52'),
(105, 121, NULL, NULL, NULL, '2025-03-25 14:12:18', '2025-03-25 14:12:18'),
(106, 122, NULL, NULL, NULL, '2025-03-25 14:16:19', '2025-03-25 14:16:19'),
(107, 123, NULL, NULL, NULL, '2025-03-25 14:16:47', '2025-03-25 14:16:47'),
(108, 124, NULL, NULL, NULL, '2025-03-25 14:20:51', '2025-03-25 14:20:51'),
(109, 125, NULL, NULL, NULL, '2025-03-25 14:25:32', '2025-03-25 14:25:32'),
(110, 126, NULL, NULL, NULL, '2025-03-25 14:29:48', '2025-03-25 14:29:48'),
(111, 127, NULL, NULL, NULL, '2025-03-25 14:33:39', '2025-03-25 14:33:39'),
(112, 128, NULL, NULL, NULL, '2025-03-25 14:35:34', '2025-03-25 14:35:34'),
(113, 129, NULL, NULL, NULL, '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(114, 130, NULL, NULL, NULL, '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(115, 131, NULL, NULL, NULL, '2025-03-25 15:47:01', '2025-03-25 15:47:01'),
(116, 132, NULL, NULL, NULL, '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(117, 133, NULL, NULL, NULL, '2025-03-25 15:51:24', '2025-03-25 15:51:24'),
(118, 134, NULL, NULL, NULL, '2025-03-25 15:57:56', '2025-03-25 15:57:56'),
(119, 135, NULL, NULL, NULL, '2025-03-25 15:59:33', '2025-03-25 15:59:33'),
(120, 136, NULL, NULL, NULL, '2025-03-25 16:01:48', '2025-03-25 16:01:48'),
(121, 137, NULL, NULL, NULL, '2025-03-25 16:05:00', '2025-03-25 16:05:00'),
(122, 138, NULL, NULL, NULL, '2025-03-25 16:08:17', '2025-03-25 16:08:17'),
(123, 139, NULL, NULL, NULL, '2025-03-25 16:08:32', '2025-03-25 16:08:32'),
(124, 140, NULL, NULL, NULL, '2025-03-25 16:12:41', '2025-03-25 16:12:41'),
(125, 141, NULL, NULL, NULL, '2025-03-25 16:16:21', '2025-03-25 16:16:21'),
(126, 142, NULL, NULL, NULL, '2025-03-25 16:19:37', '2025-03-25 16:19:37'),
(127, 143, NULL, NULL, NULL, '2025-03-25 16:23:46', '2025-03-25 16:23:46'),
(128, 144, NULL, NULL, NULL, '2025-03-25 16:27:46', '2025-03-25 16:27:46'),
(129, 145, NULL, NULL, NULL, '2025-03-25 16:31:43', '2025-03-25 16:31:43'),
(130, 146, NULL, NULL, NULL, '2025-03-25 16:36:03', '2025-03-25 16:36:03'),
(131, 147, NULL, NULL, NULL, '2025-03-25 16:46:21', '2025-03-25 16:46:21'),
(132, 148, NULL, NULL, NULL, '2025-03-25 16:50:58', '2025-03-25 16:50:58'),
(133, 149, NULL, NULL, NULL, '2025-03-25 16:57:03', '2025-03-25 16:57:03'),
(134, 150, NULL, NULL, NULL, '2025-03-25 17:05:48', '2025-03-25 17:05:48'),
(135, 151, NULL, NULL, NULL, '2025-03-25 17:10:25', '2025-03-25 17:10:25'),
(136, 152, NULL, NULL, NULL, '2025-03-25 17:13:51', '2025-03-25 17:13:51'),
(137, 153, NULL, NULL, NULL, '2025-03-25 17:17:10', '2025-03-25 17:17:10'),
(138, 154, NULL, NULL, NULL, '2025-03-25 17:21:04', '2025-03-25 17:21:04'),
(139, 155, NULL, NULL, NULL, '2025-03-25 17:26:44', '2025-03-25 17:26:44'),
(140, 156, NULL, NULL, NULL, '2025-03-26 10:45:11', '2025-03-26 10:45:11'),
(141, 157, NULL, NULL, NULL, '2025-03-26 10:49:39', '2025-03-26 10:49:39'),
(142, 158, NULL, NULL, NULL, '2025-03-26 10:52:46', '2025-03-26 10:52:46'),
(143, 159, NULL, NULL, NULL, '2025-03-26 11:02:25', '2025-03-26 11:02:25'),
(144, 160, NULL, NULL, NULL, '2025-03-26 11:14:34', '2025-03-26 11:14:34'),
(145, 161, NULL, NULL, NULL, '2025-03-26 11:32:36', '2025-03-26 11:32:36'),
(146, 162, NULL, NULL, NULL, '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(147, 163, NULL, NULL, NULL, '2025-03-26 11:38:19', '2025-03-26 11:38:19'),
(148, 164, NULL, NULL, NULL, '2025-03-26 11:43:52', '2025-03-26 11:43:52'),
(149, 165, NULL, NULL, NULL, '2025-03-26 11:49:13', '2025-03-26 11:49:13'),
(150, 166, NULL, NULL, NULL, '2025-03-26 11:59:36', '2025-03-26 11:59:36'),
(151, 167, NULL, NULL, NULL, '2025-03-26 12:05:05', '2025-03-26 12:05:05'),
(152, 168, NULL, NULL, NULL, '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(153, 169, NULL, NULL, NULL, '2025-03-26 12:10:43', '2025-03-26 12:10:43'),
(154, 170, NULL, NULL, NULL, '2025-03-26 12:14:42', '2025-03-26 12:14:42'),
(155, 171, NULL, NULL, NULL, '2025-03-26 12:19:09', '2025-03-26 12:19:09'),
(156, 172, NULL, NULL, NULL, '2025-03-26 12:23:31', '2025-03-26 12:23:31'),
(157, 173, NULL, NULL, NULL, '2025-03-26 12:30:28', '2025-03-26 12:30:28'),
(158, 174, NULL, NULL, NULL, '2025-03-26 12:34:01', '2025-03-26 12:34:01'),
(159, 175, NULL, NULL, NULL, '2025-03-26 12:37:22', '2025-03-26 12:37:22'),
(160, 176, NULL, NULL, NULL, '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(161, 177, NULL, NULL, NULL, '2025-03-26 12:54:56', '2025-03-26 12:54:56'),
(162, 178, NULL, NULL, NULL, '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(163, 179, NULL, NULL, NULL, '2025-03-26 13:00:22', '2025-03-26 13:00:22'),
(164, 180, NULL, NULL, NULL, '2025-03-26 13:04:53', '2025-03-26 13:04:53'),
(165, 181, NULL, NULL, NULL, '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(166, 182, NULL, NULL, NULL, '2025-03-26 13:08:57', '2025-03-26 13:08:57'),
(167, 183, NULL, NULL, NULL, '2025-03-26 13:12:31', '2025-03-26 13:12:31'),
(168, 184, NULL, NULL, NULL, '2025-03-26 13:22:59', '2025-03-26 13:22:59'),
(169, 185, NULL, NULL, NULL, '2025-03-26 13:26:24', '2025-03-26 13:26:24'),
(170, 186, NULL, NULL, NULL, '2025-03-26 13:30:43', '2025-03-26 13:30:43'),
(171, 187, NULL, NULL, NULL, '2025-03-26 13:46:29', '2025-03-26 13:46:29'),
(172, 188, NULL, NULL, NULL, '2025-03-26 14:04:06', '2025-03-26 14:04:06'),
(173, 189, NULL, NULL, NULL, '2025-03-26 14:04:12', '2025-03-26 14:04:12'),
(174, 190, NULL, NULL, NULL, '2025-03-26 14:13:34', '2025-03-26 14:13:34'),
(175, 191, NULL, NULL, NULL, '2025-03-26 14:15:42', '2025-03-26 14:15:42'),
(176, 192, NULL, NULL, NULL, '2025-03-26 14:19:46', '2025-03-26 14:19:46'),
(177, 193, NULL, NULL, NULL, '2025-03-26 14:21:58', '2025-03-26 14:21:58'),
(178, 194, NULL, NULL, NULL, '2025-03-26 14:29:13', '2025-03-26 14:29:13'),
(179, 195, NULL, NULL, NULL, '2025-03-26 14:30:36', '2025-03-26 14:30:36'),
(180, 196, NULL, NULL, NULL, '2025-03-26 14:37:32', '2025-03-26 14:37:32'),
(181, 197, NULL, NULL, NULL, '2025-03-26 14:41:40', '2025-03-26 14:41:40'),
(182, 198, NULL, NULL, NULL, '2025-03-26 14:47:26', '2025-03-26 14:47:26'),
(183, 199, NULL, NULL, NULL, '2025-03-26 14:53:22', '2025-03-26 14:53:22'),
(184, 200, NULL, NULL, NULL, '2025-03-26 15:00:57', '2025-03-26 15:00:57'),
(185, 201, NULL, NULL, NULL, '2025-03-26 15:05:29', '2025-03-26 15:05:29'),
(186, 202, NULL, NULL, NULL, '2025-03-26 15:07:05', '2025-03-26 15:07:05'),
(187, 203, NULL, NULL, NULL, '2025-03-26 15:12:16', '2025-03-26 15:12:16'),
(188, 204, NULL, NULL, NULL, '2025-03-26 15:16:30', '2025-03-26 15:16:30'),
(189, 205, NULL, NULL, NULL, '2025-03-26 15:20:45', '2025-03-26 15:20:45'),
(190, 206, NULL, NULL, NULL, '2025-03-26 15:25:36', '2025-03-26 15:25:36'),
(191, 207, NULL, NULL, NULL, '2025-03-26 15:28:07', '2025-03-26 15:28:07'),
(192, 208, NULL, NULL, NULL, '2025-03-26 15:29:36', '2025-03-26 15:29:36'),
(193, 209, NULL, NULL, NULL, '2025-03-26 15:32:55', '2025-03-26 15:32:55'),
(194, 210, NULL, NULL, NULL, '2025-03-26 15:34:00', '2025-03-26 15:34:00'),
(195, 211, NULL, NULL, NULL, '2025-03-26 15:38:42', '2025-03-26 15:38:42'),
(196, 212, NULL, NULL, NULL, '2025-03-26 15:42:53', '2025-03-26 15:42:53'),
(197, 213, NULL, NULL, NULL, '2025-03-26 15:47:25', '2025-03-26 15:47:25'),
(198, 214, NULL, NULL, NULL, '2025-03-26 15:52:14', '2025-03-26 15:52:14'),
(199, 215, NULL, NULL, NULL, '2025-03-26 15:56:44', '2025-03-26 15:56:44'),
(200, 216, NULL, NULL, NULL, '2025-03-26 16:01:50', '2025-03-26 16:01:50'),
(201, 217, NULL, NULL, NULL, '2025-03-26 16:04:30', '2025-03-26 16:04:30'),
(202, 218, NULL, NULL, NULL, '2025-03-26 16:07:37', '2025-03-26 16:07:37'),
(203, 219, NULL, NULL, NULL, '2025-03-26 16:12:01', '2025-03-26 16:12:01'),
(204, 220, NULL, NULL, NULL, '2025-03-26 16:16:21', '2025-03-26 16:16:21'),
(205, 221, NULL, NULL, NULL, '2025-03-26 16:21:04', '2025-03-26 16:21:04'),
(206, 222, NULL, NULL, NULL, '2025-03-26 16:25:31', '2025-03-26 16:25:31'),
(207, 223, NULL, NULL, NULL, '2025-03-26 16:32:23', '2025-03-26 16:32:23'),
(208, 224, NULL, NULL, NULL, '2025-03-26 16:37:44', '2025-03-26 16:37:44'),
(209, 225, NULL, NULL, NULL, '2025-03-26 16:53:20', '2025-03-26 16:53:20'),
(210, 226, NULL, NULL, NULL, '2025-03-26 16:59:07', '2025-03-26 16:59:07'),
(211, 227, NULL, NULL, NULL, '2025-03-26 17:06:56', '2025-03-26 17:06:56'),
(212, 228, NULL, NULL, NULL, '2025-03-26 17:27:51', '2025-03-26 17:27:51'),
(213, 229, NULL, NULL, NULL, '2025-03-26 17:33:24', '2025-03-26 17:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `product_volume_discount`
--

CREATE TABLE `product_volume_discount` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `discount` decimal(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_volume_discount`
--

INSERT INTO `product_volume_discount` (`id`, `product_id`, `discount`, `quantity`, `created_at`, `updated_at`) VALUES
(107, 29, 10.00, 5, '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(108, 29, 15.00, 15, '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(109, 29, 20.00, 20, '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(110, 29, 25.00, 50, '2025-03-24 11:58:53', '2025-03-24 11:58:53'),
(111, 30, 10.00, 5, '2025-03-24 12:09:02', '2025-03-24 12:09:02'),
(112, 30, 15.00, 15, '2025-03-24 12:09:02', '2025-03-24 12:09:02'),
(113, 30, 20.00, 20, '2025-03-24 12:09:02', '2025-03-24 12:09:02'),
(114, 31, 10.00, 5, '2025-03-24 12:16:27', '2025-03-24 12:16:27'),
(115, 31, 15.00, 15, '2025-03-24 12:16:27', '2025-03-24 12:16:27'),
(116, 31, 20.00, 20, '2025-03-24 12:16:27', '2025-03-24 12:16:27'),
(117, 31, 25.00, 50, '2025-03-24 12:16:27', '2025-03-24 12:16:27'),
(118, 32, 10.00, 5, '2025-03-24 12:23:20', '2025-03-24 12:23:20'),
(119, 32, 15.00, 15, '2025-03-24 12:23:20', '2025-03-24 12:23:20'),
(120, 32, 20.00, 20, '2025-03-24 12:23:20', '2025-03-24 12:23:20'),
(121, 32, 25.00, 50, '2025-03-24 12:23:20', '2025-03-24 12:23:20'),
(122, 33, 10.00, 5, '2025-03-24 12:28:28', '2025-03-24 12:28:28'),
(123, 33, 15.00, 15, '2025-03-24 12:28:28', '2025-03-24 12:28:28'),
(124, 33, 20.00, 20, '2025-03-24 12:28:28', '2025-03-24 12:28:28'),
(125, 33, 25.00, 50, '2025-03-24 12:28:28', '2025-03-24 12:28:28'),
(126, 34, 10.00, 5, '2025-03-24 12:34:43', '2025-03-24 12:34:43'),
(127, 34, 15.00, 15, '2025-03-24 12:34:43', '2025-03-24 12:34:43'),
(128, 34, 20.00, 20, '2025-03-24 12:34:43', '2025-03-24 12:34:43'),
(129, 34, 25.00, 50, '2025-03-24 12:34:43', '2025-03-24 12:34:43'),
(130, 35, 10.00, 5, '2025-03-24 12:43:52', '2025-03-24 12:43:52'),
(131, 35, 15.00, 15, '2025-03-24 12:43:52', '2025-03-24 12:43:52'),
(132, 35, 20.00, 20, '2025-03-24 12:43:52', '2025-03-24 12:43:52'),
(133, 35, 25.00, 50, '2025-03-24 12:43:52', '2025-03-24 12:43:52'),
(134, 36, 10.00, 5, '2025-03-24 12:49:12', '2025-03-24 12:49:12'),
(135, 36, 15.00, 15, '2025-03-24 12:49:12', '2025-03-24 12:49:12'),
(136, 36, 20.00, 20, '2025-03-24 12:49:12', '2025-03-24 12:49:12'),
(137, 36, 25.00, 50, '2025-03-24 12:49:12', '2025-03-24 12:49:12'),
(146, 39, 10.00, 5, '2025-03-24 14:01:48', '2025-03-24 14:01:48'),
(147, 39, 15.00, 15, '2025-03-24 14:01:48', '2025-03-24 14:01:48'),
(148, 39, 20.00, 20, '2025-03-24 14:01:48', '2025-03-24 14:01:48'),
(149, 39, 25.00, 50, '2025-03-24 14:01:48', '2025-03-24 14:01:48'),
(150, 40, 10.00, 5, '2025-03-24 14:07:39', '2025-03-24 14:07:39'),
(151, 40, 15.00, 15, '2025-03-24 14:07:39', '2025-03-24 14:07:39'),
(152, 40, 20.00, 20, '2025-03-24 14:07:39', '2025-03-24 14:07:39'),
(153, 40, 25.00, 50, '2025-03-24 14:07:39', '2025-03-24 14:07:39'),
(154, 41, 10.00, 5, '2025-03-24 14:11:06', '2025-03-24 14:11:06'),
(155, 41, 15.00, 15, '2025-03-24 14:11:06', '2025-03-24 14:11:06'),
(156, 41, 20.00, 20, '2025-03-24 14:11:06', '2025-03-24 14:11:06'),
(157, 41, 25.00, 50, '2025-03-24 14:11:06', '2025-03-24 14:11:06'),
(170, 49, 10.00, 5, '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(171, 49, 15.00, 15, '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(172, 49, 20.00, 20, '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(173, 49, 25.00, 50, '2025-03-24 16:03:17', '2025-03-24 16:03:17'),
(174, 50, 10.00, 5, '2025-03-24 16:07:45', '2025-03-24 16:07:45'),
(175, 50, 15.00, 15, '2025-03-24 16:07:45', '2025-03-24 16:07:45'),
(176, 50, 20.00, 20, '2025-03-24 16:07:45', '2025-03-24 16:07:45'),
(177, 50, 25.00, 50, '2025-03-24 16:07:45', '2025-03-24 16:07:45'),
(178, 51, 10.00, 5, '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(179, 51, 15.00, 15, '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(180, 51, 20.00, 20, '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(181, 51, 25.00, 50, '2025-03-24 16:15:45', '2025-03-24 16:15:45'),
(182, 52, 10.00, 5, '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(183, 52, 15.00, 15, '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(184, 52, 20.00, 20, '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(185, 52, 25.00, 50, '2025-03-24 16:26:27', '2025-03-24 16:26:27'),
(186, 53, 10.00, 5, '2025-03-24 16:31:01', '2025-03-24 16:31:01'),
(187, 53, 15.00, 15, '2025-03-24 16:31:01', '2025-03-24 16:31:01'),
(188, 53, 20.00, 20, '2025-03-24 16:31:01', '2025-03-24 16:31:01'),
(189, 53, 25.00, 50, '2025-03-24 16:31:01', '2025-03-24 16:31:01'),
(190, 54, 10.00, 5, '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(191, 54, 15.00, 15, '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(192, 54, 20.00, 20, '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(193, 54, 25.00, 50, '2025-03-24 16:41:26', '2025-03-24 16:41:26'),
(194, 55, 10.00, 5, '2025-03-24 16:47:42', '2025-03-24 16:47:42'),
(195, 55, 15.00, 15, '2025-03-24 16:47:42', '2025-03-24 16:47:42'),
(196, 55, 20.00, 20, '2025-03-24 16:47:42', '2025-03-24 16:47:42'),
(197, 55, 25.00, 50, '2025-03-24 16:47:42', '2025-03-24 16:47:42'),
(198, 56, 10.00, 5, '2025-03-24 16:54:09', '2025-03-24 16:54:09'),
(199, 56, 15.00, 15, '2025-03-24 16:54:09', '2025-03-24 16:54:09'),
(200, 56, 20.00, 20, '2025-03-24 16:54:09', '2025-03-24 16:54:09'),
(201, 56, 25.00, 50, '2025-03-24 16:54:09', '2025-03-24 16:54:09'),
(202, 57, 10.00, 5, '2025-03-24 16:58:09', '2025-03-24 16:58:09'),
(203, 57, 15.00, 15, '2025-03-24 16:58:09', '2025-03-24 16:58:09'),
(204, 57, 20.00, 20, '2025-03-24 16:58:09', '2025-03-24 16:58:09'),
(205, 57, 25.00, 50, '2025-03-24 16:58:09', '2025-03-24 16:58:09'),
(206, 58, 10.00, 5, '2025-03-24 17:01:54', '2025-03-24 17:01:54'),
(207, 58, 15.00, 15, '2025-03-24 17:01:54', '2025-03-24 17:01:54'),
(208, 58, 20.00, 20, '2025-03-24 17:01:54', '2025-03-24 17:01:54'),
(209, 58, 25.00, 50, '2025-03-24 17:01:54', '2025-03-24 17:01:54'),
(210, 59, 10.00, 5, '2025-03-24 17:05:43', '2025-03-24 17:05:43'),
(211, 59, 15.00, 15, '2025-03-24 17:05:43', '2025-03-24 17:05:43'),
(212, 59, 20.00, 20, '2025-03-24 17:05:43', '2025-03-24 17:05:43'),
(213, 59, 25.00, 50, '2025-03-24 17:05:43', '2025-03-24 17:05:43'),
(214, 60, 10.00, 5, '2025-03-24 17:09:31', '2025-03-24 17:09:31'),
(215, 60, 15.00, 15, '2025-03-24 17:09:31', '2025-03-24 17:09:31'),
(216, 60, 20.00, 20, '2025-03-24 17:09:31', '2025-03-24 17:09:31'),
(217, 60, 25.00, 50, '2025-03-24 17:09:31', '2025-03-24 17:09:31'),
(218, 61, 10.00, 5, '2025-03-24 17:15:21', '2025-03-24 17:15:21'),
(219, 61, 15.00, 15, '2025-03-24 17:15:21', '2025-03-24 17:15:21'),
(220, 61, 20.00, 20, '2025-03-24 17:15:21', '2025-03-24 17:15:21'),
(221, 61, 25.00, 50, '2025-03-24 17:15:21', '2025-03-24 17:15:21'),
(222, 62, 10.00, 5, '2025-03-24 17:20:01', '2025-03-24 17:20:01'),
(223, 62, 15.00, 15, '2025-03-24 17:20:01', '2025-03-24 17:20:01'),
(224, 62, 20.00, 20, '2025-03-24 17:20:01', '2025-03-24 17:20:01'),
(225, 62, 25.00, 50, '2025-03-24 17:20:01', '2025-03-24 17:20:01'),
(226, 63, 10.00, 5, '2025-03-24 18:53:17', '2025-03-24 18:53:17'),
(227, 63, 15.00, 15, '2025-03-24 18:53:17', '2025-03-24 18:53:17'),
(228, 63, 20.00, 20, '2025-03-24 18:53:17', '2025-03-24 18:53:17'),
(229, 63, 25.00, 50, '2025-03-24 18:53:17', '2025-03-24 18:53:17'),
(230, 64, 10.00, 5, '2025-03-24 18:58:32', '2025-03-24 18:58:32'),
(231, 64, 15.00, 15, '2025-03-24 18:58:32', '2025-03-24 18:58:32'),
(232, 64, 20.00, 20, '2025-03-24 18:58:32', '2025-03-24 18:58:32'),
(233, 64, 25.00, 50, '2025-03-24 18:58:32', '2025-03-24 18:58:32'),
(234, 65, 10.00, 5, '2025-03-24 19:41:43', '2025-03-24 19:41:43'),
(235, 65, 15.00, 15, '2025-03-24 19:41:43', '2025-03-24 19:41:43'),
(236, 65, 20.00, 20, '2025-03-24 19:41:43', '2025-03-24 19:41:43'),
(237, 65, 25.00, 50, '2025-03-24 19:41:43', '2025-03-24 19:41:43'),
(238, 66, 10.00, 5, '2025-03-24 19:54:24', '2025-03-24 19:54:24'),
(239, 66, 15.00, 15, '2025-03-24 19:54:24', '2025-03-24 19:54:24'),
(240, 66, 20.00, 20, '2025-03-24 19:54:24', '2025-03-24 19:54:24'),
(241, 66, 25.00, 50, '2025-03-24 19:54:24', '2025-03-24 19:54:24'),
(242, 67, 10.00, 5, '2025-03-24 20:05:21', '2025-03-24 20:05:21'),
(243, 67, 15.00, 15, '2025-03-24 20:05:21', '2025-03-24 20:05:21'),
(244, 67, 20.00, 20, '2025-03-24 20:05:21', '2025-03-24 20:05:21'),
(245, 67, 25.00, 50, '2025-03-24 20:05:21', '2025-03-24 20:05:21'),
(246, 68, 10.00, 5, '2025-03-24 20:12:23', '2025-03-24 20:12:23'),
(247, 68, 15.00, 15, '2025-03-24 20:12:23', '2025-03-24 20:12:23'),
(248, 68, 20.00, 20, '2025-03-24 20:12:23', '2025-03-24 20:12:23'),
(249, 68, 25.00, 50, '2025-03-24 20:12:23', '2025-03-24 20:12:23'),
(250, 69, 10.00, 5, '2025-03-24 20:17:33', '2025-03-24 20:17:33'),
(251, 69, 15.00, 15, '2025-03-24 20:17:33', '2025-03-24 20:17:33'),
(252, 69, 20.00, 20, '2025-03-24 20:17:33', '2025-03-24 20:17:33'),
(253, 69, 25.00, 50, '2025-03-24 20:17:33', '2025-03-24 20:17:33'),
(254, 70, 10.00, 5, '2025-03-24 20:21:46', '2025-03-24 20:21:46'),
(255, 70, 15.00, 15, '2025-03-24 20:21:46', '2025-03-24 20:21:46'),
(256, 70, 20.00, 20, '2025-03-24 20:21:46', '2025-03-24 20:21:46'),
(257, 70, 25.00, 50, '2025-03-24 20:21:46', '2025-03-24 20:21:46'),
(258, 71, 10.00, 5, '2025-03-24 20:29:53', '2025-03-24 20:29:53'),
(259, 71, 15.00, 15, '2025-03-24 20:29:53', '2025-03-24 20:29:53'),
(260, 71, 20.00, 20, '2025-03-24 20:29:53', '2025-03-24 20:29:53'),
(261, 71, 25.00, 50, '2025-03-24 20:29:53', '2025-03-24 20:29:53'),
(262, 72, 10.00, 5, '2025-03-24 20:34:36', '2025-03-24 20:34:36'),
(263, 72, 15.00, 15, '2025-03-24 20:34:36', '2025-03-24 20:34:36'),
(264, 72, 20.00, 20, '2025-03-24 20:34:36', '2025-03-24 20:34:36'),
(265, 72, 25.00, 50, '2025-03-24 20:34:36', '2025-03-24 20:34:36'),
(266, 73, 10.00, 5, '2025-03-24 20:41:00', '2025-03-24 20:41:00'),
(267, 73, 15.00, 15, '2025-03-24 20:41:00', '2025-03-24 20:41:00'),
(268, 73, 20.00, 20, '2025-03-24 20:41:00', '2025-03-24 20:41:00'),
(269, 73, 25.00, 50, '2025-03-24 20:41:00', '2025-03-24 20:41:00'),
(270, 74, 10.00, 5, '2025-03-24 20:49:02', '2025-03-24 20:49:02'),
(271, 74, 15.00, 15, '2025-03-24 20:49:02', '2025-03-24 20:49:02'),
(272, 74, 20.00, 20, '2025-03-24 20:49:02', '2025-03-24 20:49:02'),
(273, 74, 25.00, 50, '2025-03-24 20:49:02', '2025-03-24 20:49:02'),
(274, 75, 10.00, 5, '2025-03-24 20:55:10', '2025-03-24 20:55:10'),
(275, 75, 15.00, 15, '2025-03-24 20:55:10', '2025-03-24 20:55:10'),
(276, 75, 20.00, 20, '2025-03-24 20:55:10', '2025-03-24 20:55:10'),
(277, 75, 25.00, 50, '2025-03-24 20:55:10', '2025-03-24 20:55:10'),
(278, 76, 10.00, 5, '2025-03-24 21:14:21', '2025-03-24 21:14:21'),
(279, 76, 15.00, 15, '2025-03-24 21:14:21', '2025-03-24 21:14:21'),
(280, 76, 20.00, 20, '2025-03-24 21:14:21', '2025-03-24 21:14:21'),
(281, 76, 25.00, 50, '2025-03-24 21:14:21', '2025-03-24 21:14:21'),
(282, 77, 10.00, 5, '2025-03-24 21:19:05', '2025-03-24 21:19:05'),
(283, 77, 15.00, 15, '2025-03-24 21:19:05', '2025-03-24 21:19:05'),
(284, 77, 20.00, 20, '2025-03-24 21:19:05', '2025-03-24 21:19:05'),
(285, 77, 25.00, 50, '2025-03-24 21:19:05', '2025-03-24 21:19:05'),
(286, 78, 10.00, 5, '2025-03-25 11:13:38', '2025-03-25 11:13:38'),
(287, 78, 15.00, 15, '2025-03-25 11:13:38', '2025-03-25 11:13:38'),
(288, 78, 20.00, 20, '2025-03-25 11:13:38', '2025-03-25 11:13:38'),
(289, 78, 25.00, 50, '2025-03-25 11:13:38', '2025-03-25 11:13:38'),
(290, 80, 10.00, 5, '2025-03-25 11:54:43', '2025-03-25 11:54:43'),
(291, 80, 15.00, 15, '2025-03-25 11:54:43', '2025-03-25 11:54:43'),
(292, 80, 20.00, 20, '2025-03-25 11:54:43', '2025-03-25 11:54:43'),
(293, 80, 25.00, 50, '2025-03-25 11:54:43', '2025-03-25 11:54:43'),
(298, 82, 10.00, 5, '2025-03-25 12:00:26', '2025-03-25 12:00:26'),
(299, 82, 15.00, 15, '2025-03-25 12:00:26', '2025-03-25 12:00:26'),
(300, 82, 20.00, 20, '2025-03-25 12:00:26', '2025-03-25 12:00:26'),
(301, 82, 25.00, 50, '2025-03-25 12:00:26', '2025-03-25 12:00:26'),
(302, 83, 10.00, 5, '2025-03-25 12:04:27', '2025-03-25 12:04:27'),
(303, 83, 15.00, 15, '2025-03-25 12:04:27', '2025-03-25 12:04:27'),
(304, 83, 20.00, 20, '2025-03-25 12:04:27', '2025-03-25 12:04:27'),
(305, 83, 25.00, 50, '2025-03-25 12:04:27', '2025-03-25 12:04:27'),
(306, 84, 10.00, 5, '2025-03-25 12:07:49', '2025-03-25 12:07:49'),
(307, 84, 15.00, 15, '2025-03-25 12:07:49', '2025-03-25 12:07:49'),
(308, 84, 20.00, 20, '2025-03-25 12:07:49', '2025-03-25 12:07:49'),
(309, 84, 25.00, 50, '2025-03-25 12:07:49', '2025-03-25 12:07:49'),
(310, 85, 10.00, 5, '2025-03-25 12:10:58', '2025-03-25 12:10:58'),
(311, 85, 15.00, 15, '2025-03-25 12:10:58', '2025-03-25 12:10:58'),
(312, 85, 20.00, 20, '2025-03-25 12:10:58', '2025-03-25 12:10:58'),
(313, 85, 25.00, 50, '2025-03-25 12:10:58', '2025-03-25 12:10:58'),
(314, 86, 10.00, 5, '2025-03-25 12:16:08', '2025-03-25 12:16:08'),
(315, 86, 15.00, 15, '2025-03-25 12:16:08', '2025-03-25 12:16:08'),
(316, 86, 20.00, 20, '2025-03-25 12:16:08', '2025-03-25 12:16:08'),
(317, 86, 25.00, 50, '2025-03-25 12:16:08', '2025-03-25 12:16:08'),
(318, 87, 10.00, 5, '2025-03-25 12:19:34', '2025-03-25 12:19:34'),
(319, 87, 15.00, 15, '2025-03-25 12:19:34', '2025-03-25 12:19:34'),
(320, 87, 20.00, 20, '2025-03-25 12:19:34', '2025-03-25 12:19:34'),
(321, 87, 25.00, 50, '2025-03-25 12:19:34', '2025-03-25 12:19:34'),
(326, 89, 10.00, 5, '2025-03-25 12:24:03', '2025-03-25 12:24:03'),
(327, 89, 15.00, 15, '2025-03-25 12:24:03', '2025-03-25 12:24:03'),
(328, 89, 20.00, 20, '2025-03-25 12:24:03', '2025-03-25 12:24:03'),
(329, 89, 25.00, 50, '2025-03-25 12:24:03', '2025-03-25 12:24:03'),
(330, 90, 10.00, 5, '2025-03-25 12:27:48', '2025-03-25 12:27:48'),
(331, 90, 15.00, 15, '2025-03-25 12:27:48', '2025-03-25 12:27:48'),
(332, 90, 20.00, 20, '2025-03-25 12:27:48', '2025-03-25 12:27:48'),
(333, 90, 25.00, 50, '2025-03-25 12:27:48', '2025-03-25 12:27:48'),
(334, 91, 10.00, 5, '2025-03-25 12:32:21', '2025-03-25 12:32:21'),
(335, 91, 15.00, 15, '2025-03-25 12:32:21', '2025-03-25 12:32:21'),
(336, 91, 20.00, 20, '2025-03-25 12:32:21', '2025-03-25 12:32:21'),
(337, 91, 25.00, 50, '2025-03-25 12:32:21', '2025-03-25 12:32:21'),
(338, 92, 10.00, 5, '2025-03-25 12:37:12', '2025-03-25 12:37:12'),
(339, 92, 15.00, 15, '2025-03-25 12:37:12', '2025-03-25 12:37:12'),
(340, 92, 20.00, 20, '2025-03-25 12:37:12', '2025-03-25 12:37:12'),
(341, 92, 25.00, 50, '2025-03-25 12:37:12', '2025-03-25 12:37:12'),
(342, 93, 10.00, 5, '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(343, 93, 15.00, 15, '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(344, 93, 20.00, 20, '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(345, 93, 25.00, 50, '2025-03-25 12:40:05', '2025-03-25 12:40:05'),
(350, 95, 10.00, 5, '2025-03-25 12:46:49', '2025-03-25 12:46:49'),
(351, 95, 15.00, 15, '2025-03-25 12:46:49', '2025-03-25 12:46:49'),
(352, 95, 20.00, 20, '2025-03-25 12:46:49', '2025-03-25 12:46:49'),
(353, 95, 25.00, 50, '2025-03-25 12:46:49', '2025-03-25 12:46:49'),
(354, 96, 10.00, 5, '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(355, 96, 15.00, 15, '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(356, 96, 20.00, 20, '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(357, 96, 25.00, 50, '2025-03-25 12:52:58', '2025-03-25 12:52:58'),
(358, 97, 10.00, 5, '2025-03-25 12:56:01', '2025-03-25 12:56:01'),
(359, 97, 15.00, 15, '2025-03-25 12:56:01', '2025-03-25 12:56:01'),
(360, 97, 20.00, 20, '2025-03-25 12:56:01', '2025-03-25 12:56:01'),
(361, 97, 25.00, 50, '2025-03-25 12:56:01', '2025-03-25 12:56:01'),
(362, 98, 10.00, 5, '2025-03-25 13:00:00', '2025-03-25 13:00:00'),
(363, 98, 15.00, 15, '2025-03-25 13:00:00', '2025-03-25 13:00:00'),
(364, 98, 20.00, 20, '2025-03-25 13:00:00', '2025-03-25 13:00:00'),
(365, 98, 25.00, 50, '2025-03-25 13:00:00', '2025-03-25 13:00:00'),
(366, 99, 10.00, 5, '2025-03-25 13:03:48', '2025-03-25 13:03:48'),
(367, 99, 15.00, 15, '2025-03-25 13:03:48', '2025-03-25 13:03:48'),
(368, 99, 20.00, 20, '2025-03-25 13:03:48', '2025-03-25 13:03:48'),
(369, 99, 25.00, 50, '2025-03-25 13:03:48', '2025-03-25 13:03:48'),
(370, 100, 10.00, 5, '2025-03-25 13:06:53', '2025-03-25 13:06:53'),
(371, 100, 15.00, 15, '2025-03-25 13:06:53', '2025-03-25 13:06:53'),
(372, 100, 20.00, 20, '2025-03-25 13:06:53', '2025-03-25 13:06:53'),
(373, 100, 25.00, 50, '2025-03-25 13:06:53', '2025-03-25 13:06:53'),
(374, 101, 10.00, 5, '2025-03-25 13:10:21', '2025-03-25 13:10:21'),
(375, 101, 15.00, 15, '2025-03-25 13:10:21', '2025-03-25 13:10:21'),
(376, 101, 20.00, 20, '2025-03-25 13:10:21', '2025-03-25 13:10:21'),
(377, 101, 25.00, 50, '2025-03-25 13:10:21', '2025-03-25 13:10:21'),
(378, 102, 10.00, 5, '2025-03-25 13:17:08', '2025-03-25 13:17:08'),
(379, 102, 15.00, 15, '2025-03-25 13:17:08', '2025-03-25 13:17:08'),
(380, 102, 20.00, 20, '2025-03-25 13:17:08', '2025-03-25 13:17:08'),
(381, 102, 25.00, 50, '2025-03-25 13:17:08', '2025-03-25 13:17:08'),
(386, 104, 10.00, 5, '2025-03-25 13:20:24', '2025-03-25 13:20:24'),
(387, 104, 15.00, 15, '2025-03-25 13:20:24', '2025-03-25 13:20:24'),
(388, 104, 20.00, 20, '2025-03-25 13:20:24', '2025-03-25 13:20:24'),
(389, 104, 25.00, 50, '2025-03-25 13:20:24', '2025-03-25 13:20:24'),
(390, 105, 10.00, 5, '2025-03-25 13:23:59', '2025-03-25 13:23:59'),
(391, 105, 15.00, 15, '2025-03-25 13:23:59', '2025-03-25 13:23:59'),
(392, 105, 20.00, 20, '2025-03-25 13:23:59', '2025-03-25 13:23:59'),
(393, 105, 25.00, 50, '2025-03-25 13:23:59', '2025-03-25 13:23:59'),
(394, 106, 10.00, 5, '2025-03-25 13:24:00', '2025-03-25 13:24:00'),
(395, 106, 15.00, 16, '2025-03-25 13:24:00', '2025-03-25 13:24:00'),
(396, 106, 20.00, 20, '2025-03-25 13:24:00', '2025-03-25 13:24:00'),
(397, 106, 25.00, 50, '2025-03-25 13:24:00', '2025-03-25 13:24:00'),
(398, 107, 10.00, 5, '2025-03-25 13:28:04', '2025-03-25 13:28:04'),
(399, 107, 15.00, 15, '2025-03-25 13:28:04', '2025-03-25 13:28:04'),
(400, 107, 20.00, 20, '2025-03-25 13:28:04', '2025-03-25 13:28:04'),
(401, 107, 25.00, 50, '2025-03-25 13:28:04', '2025-03-25 13:28:04'),
(402, 108, 10.00, 5, '2025-03-25 13:30:02', '2025-03-25 13:30:02'),
(403, 108, 15.00, 15, '2025-03-25 13:30:03', '2025-03-25 13:30:03'),
(404, 108, 20.00, 20, '2025-03-25 13:30:03', '2025-03-25 13:30:03'),
(405, 108, 25.00, 50, '2025-03-25 13:30:03', '2025-03-25 13:30:03'),
(406, 109, 10.00, 5, '2025-03-25 13:38:04', '2025-03-25 13:38:04'),
(407, 109, 15.00, 15, '2025-03-25 13:38:04', '2025-03-25 13:38:04'),
(408, 109, 20.00, 20, '2025-03-25 13:38:04', '2025-03-25 13:38:04'),
(409, 109, 25.00, 50, '2025-03-25 13:38:04', '2025-03-25 13:38:04'),
(414, 111, 10.00, 5, '2025-03-25 13:45:40', '2025-03-25 13:45:40'),
(415, 111, 15.00, 15, '2025-03-25 13:45:40', '2025-03-25 13:45:40'),
(416, 111, 20.00, 20, '2025-03-25 13:45:40', '2025-03-25 13:45:40'),
(417, 111, 25.00, 50, '2025-03-25 13:45:40', '2025-03-25 13:45:40'),
(418, 112, 10.00, 5, '2025-03-25 13:45:47', '2025-03-25 13:45:47'),
(419, 112, 15.00, 15, '2025-03-25 13:45:47', '2025-03-25 13:45:47'),
(420, 112, 20.00, 20, '2025-03-25 13:45:47', '2025-03-25 13:45:47'),
(421, 112, 25.00, 50, '2025-03-25 13:45:47', '2025-03-25 13:45:47'),
(422, 113, 10.00, 5, '2025-03-25 13:49:01', '2025-03-25 13:49:01'),
(423, 113, 15.00, 15, '2025-03-25 13:49:01', '2025-03-25 13:49:01'),
(424, 113, 20.00, 20, '2025-03-25 13:49:01', '2025-03-25 13:49:01'),
(425, 113, 25.00, 50, '2025-03-25 13:49:01', '2025-03-25 13:49:01'),
(426, 114, 10.00, 5, '2025-03-25 13:57:19', '2025-03-25 13:57:19'),
(427, 114, 15.00, 15, '2025-03-25 13:57:19', '2025-03-25 13:57:19'),
(428, 114, 20.00, 20, '2025-03-25 13:57:19', '2025-03-25 13:57:19'),
(429, 114, 25.00, 50, '2025-03-25 13:57:19', '2025-03-25 13:57:19'),
(430, 115, 10.00, 5, '2025-03-25 14:00:31', '2025-03-25 14:00:31'),
(431, 115, 15.00, 15, '2025-03-25 14:00:31', '2025-03-25 14:00:31'),
(432, 115, 20.00, 20, '2025-03-25 14:00:31', '2025-03-25 14:00:31'),
(433, 115, 25.00, 50, '2025-03-25 14:00:31', '2025-03-25 14:00:31'),
(434, 116, 10.00, 5, '2025-03-25 14:01:30', '2025-03-25 14:01:30'),
(435, 116, 15.00, 15, '2025-03-25 14:01:30', '2025-03-25 14:01:30'),
(436, 116, 20.00, 20, '2025-03-25 14:01:30', '2025-03-25 14:01:30'),
(437, 116, 25.00, 50, '2025-03-25 14:01:30', '2025-03-25 14:01:30'),
(438, 117, 10.00, 5, '2025-03-25 14:04:01', '2025-03-25 14:04:01'),
(439, 117, 15.00, 15, '2025-03-25 14:04:01', '2025-03-25 14:04:01'),
(440, 117, 20.00, 20, '2025-03-25 14:04:01', '2025-03-25 14:04:01'),
(441, 117, 25.00, 50, '2025-03-25 14:04:01', '2025-03-25 14:04:01'),
(442, 118, 10.00, 5, '2025-03-25 14:07:04', '2025-03-25 14:07:04'),
(443, 118, 15.00, 15, '2025-03-25 14:07:04', '2025-03-25 14:07:04'),
(444, 118, 20.00, 20, '2025-03-25 14:07:04', '2025-03-25 14:07:04'),
(445, 118, 25.00, 50, '2025-03-25 14:07:04', '2025-03-25 14:07:04'),
(446, 119, 10.00, 5, '2025-03-25 14:07:57', '2025-03-25 14:07:57'),
(447, 119, 15.00, 15, '2025-03-25 14:07:57', '2025-03-25 14:07:57'),
(448, 119, 20.00, 20, '2025-03-25 14:07:57', '2025-03-25 14:07:57'),
(449, 119, 25.00, 50, '2025-03-25 14:07:57', '2025-03-25 14:07:57'),
(450, 120, 10.00, 5, '2025-03-25 14:10:52', '2025-03-25 14:10:52'),
(451, 120, 15.00, 15, '2025-03-25 14:10:52', '2025-03-25 14:10:52'),
(452, 120, 20.00, 20, '2025-03-25 14:10:52', '2025-03-25 14:10:52'),
(453, 120, 25.00, 50, '2025-03-25 14:10:52', '2025-03-25 14:10:52'),
(454, 121, 10.00, 5, '2025-03-25 14:12:18', '2025-03-25 14:12:18'),
(455, 121, 15.00, 15, '2025-03-25 14:12:18', '2025-03-25 14:12:18'),
(456, 121, 20.00, 20, '2025-03-25 14:12:18', '2025-03-25 14:12:18'),
(457, 121, 25.00, 50, '2025-03-25 14:12:18', '2025-03-25 14:12:18'),
(458, 122, 10.00, 5, '2025-03-25 14:16:19', '2025-03-25 14:16:19'),
(459, 122, 15.00, 15, '2025-03-25 14:16:19', '2025-03-25 14:16:19'),
(460, 122, 20.00, 20, '2025-03-25 14:16:19', '2025-03-25 14:16:19'),
(461, 122, 25.00, 50, '2025-03-25 14:16:19', '2025-03-25 14:16:19'),
(462, 123, 10.00, 5, '2025-03-25 14:16:47', '2025-03-25 14:16:47'),
(463, 123, 15.00, 15, '2025-03-25 14:16:47', '2025-03-25 14:16:47'),
(464, 123, 20.00, 20, '2025-03-25 14:16:47', '2025-03-25 14:16:47'),
(465, 123, 25.00, 50, '2025-03-25 14:16:47', '2025-03-25 14:16:47'),
(466, 124, 10.00, 5, '2025-03-25 14:20:51', '2025-03-25 14:20:51'),
(467, 124, 15.00, 15, '2025-03-25 14:20:51', '2025-03-25 14:20:51'),
(468, 124, 20.00, 20, '2025-03-25 14:20:51', '2025-03-25 14:20:51'),
(469, 124, 25.00, 50, '2025-03-25 14:20:51', '2025-03-25 14:20:51'),
(470, 125, 10.00, 5, '2025-03-25 14:25:32', '2025-03-25 14:25:32'),
(471, 125, 15.00, 15, '2025-03-25 14:25:32', '2025-03-25 14:25:32'),
(472, 125, 20.00, 20, '2025-03-25 14:25:32', '2025-03-25 14:25:32'),
(473, 125, 25.00, 50, '2025-03-25 14:25:32', '2025-03-25 14:25:32'),
(474, 126, 10.00, 5, '2025-03-25 14:29:48', '2025-03-25 14:29:48'),
(475, 126, 15.00, 15, '2025-03-25 14:29:48', '2025-03-25 14:29:48'),
(476, 126, 20.00, 20, '2025-03-25 14:29:48', '2025-03-25 14:29:48'),
(477, 126, 25.00, 50, '2025-03-25 14:29:48', '2025-03-25 14:29:48'),
(478, 127, 10.00, 5, '2025-03-25 14:33:39', '2025-03-25 14:33:39'),
(479, 127, 15.00, 15, '2025-03-25 14:33:39', '2025-03-25 14:33:39'),
(480, 127, 20.00, 20, '2025-03-25 14:33:39', '2025-03-25 14:33:39'),
(481, 127, 25.00, 50, '2025-03-25 14:33:39', '2025-03-25 14:33:39'),
(482, 128, 10.00, 5, '2025-03-25 14:35:34', '2025-03-25 14:35:34'),
(483, 128, 15.00, 15, '2025-03-25 14:35:34', '2025-03-25 14:35:34'),
(484, 128, 20.00, 20, '2025-03-25 14:35:34', '2025-03-25 14:35:34'),
(485, 128, 25.00, 50, '2025-03-25 14:35:34', '2025-03-25 14:35:34'),
(486, 129, 10.00, 5, '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(487, 129, 15.00, 15, '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(488, 129, 20.00, 20, '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(489, 129, 25.00, 50, '2025-03-25 15:11:19', '2025-03-25 15:11:19'),
(490, 130, 10.00, 5, '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(491, 130, 15.00, 15, '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(492, 130, 20.00, 20, '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(493, 130, 25.00, 50, '2025-03-25 15:41:39', '2025-03-25 15:41:39'),
(494, 131, 10.00, 5, '2025-03-25 15:47:01', '2025-03-25 15:47:01'),
(495, 131, 15.00, 15, '2025-03-25 15:47:01', '2025-03-25 15:47:01'),
(496, 131, 20.00, 20, '2025-03-25 15:47:01', '2025-03-25 15:47:01'),
(497, 131, 25.00, 50, '2025-03-25 15:47:01', '2025-03-25 15:47:01'),
(498, 132, 10.00, 5, '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(499, 132, 15.00, 15, '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(500, 132, 20.00, 20, '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(501, 132, 25.00, 50, '2025-03-25 15:50:50', '2025-03-25 15:50:50'),
(502, 133, 10.00, 5, '2025-03-25 15:51:24', '2025-03-25 15:51:24'),
(503, 133, 15.00, 15, '2025-03-25 15:51:24', '2025-03-25 15:51:24'),
(504, 133, 20.00, 20, '2025-03-25 15:51:24', '2025-03-25 15:51:24'),
(505, 133, 25.00, 50, '2025-03-25 15:51:24', '2025-03-25 15:51:24'),
(506, 134, 10.00, 5, '2025-03-25 15:57:56', '2025-03-25 15:57:56'),
(507, 134, 15.00, 15, '2025-03-25 15:57:56', '2025-03-25 15:57:56'),
(508, 134, 20.00, 20, '2025-03-25 15:57:56', '2025-03-25 15:57:56'),
(509, 134, 25.00, 50, '2025-03-25 15:57:56', '2025-03-25 15:57:56'),
(510, 135, 10.00, 5, '2025-03-25 15:59:33', '2025-03-25 15:59:33'),
(511, 135, 15.00, 15, '2025-03-25 15:59:33', '2025-03-25 15:59:33'),
(512, 135, 20.00, 20, '2025-03-25 15:59:33', '2025-03-25 15:59:33'),
(513, 135, 25.00, 50, '2025-03-25 15:59:33', '2025-03-25 15:59:33'),
(514, 136, 10.00, 5, '2025-03-25 16:01:48', '2025-03-25 16:01:48'),
(515, 136, 15.00, 15, '2025-03-25 16:01:48', '2025-03-25 16:01:48'),
(516, 136, 20.00, 20, '2025-03-25 16:01:48', '2025-03-25 16:01:48'),
(517, 136, 25.00, 50, '2025-03-25 16:01:48', '2025-03-25 16:01:48'),
(518, 137, 10.00, 5, '2025-03-25 16:05:00', '2025-03-25 16:05:00'),
(519, 137, 15.00, 15, '2025-03-25 16:05:00', '2025-03-25 16:05:00'),
(520, 137, 20.00, 20, '2025-03-25 16:05:00', '2025-03-25 16:05:00'),
(521, 137, 25.00, 50, '2025-03-25 16:05:00', '2025-03-25 16:05:00'),
(522, 138, 10.00, 5, '2025-03-25 16:08:17', '2025-03-25 16:08:17'),
(523, 138, 15.00, 15, '2025-03-25 16:08:17', '2025-03-25 16:08:17'),
(524, 138, 20.00, 20, '2025-03-25 16:08:17', '2025-03-25 16:08:17'),
(525, 138, 25.00, 50, '2025-03-25 16:08:17', '2025-03-25 16:08:17'),
(526, 139, 10.00, 5, '2025-03-25 16:08:32', '2025-03-25 16:08:32'),
(527, 139, 15.00, 15, '2025-03-25 16:08:32', '2025-03-25 16:08:32'),
(528, 139, 20.00, 20, '2025-03-25 16:08:32', '2025-03-25 16:08:32'),
(529, 139, 25.00, 50, '2025-03-25 16:08:32', '2025-03-25 16:08:32'),
(530, 140, 10.00, 5, '2025-03-25 16:12:41', '2025-03-25 16:12:41'),
(531, 140, 15.00, 15, '2025-03-25 16:12:41', '2025-03-25 16:12:41'),
(532, 140, 20.00, 20, '2025-03-25 16:12:41', '2025-03-25 16:12:41'),
(533, 140, 25.00, 50, '2025-03-25 16:12:41', '2025-03-25 16:12:41'),
(534, 141, 10.00, 5, '2025-03-25 16:16:21', '2025-03-25 16:16:21'),
(535, 141, 15.00, 15, '2025-03-25 16:16:21', '2025-03-25 16:16:21'),
(536, 141, 20.00, 20, '2025-03-25 16:16:21', '2025-03-25 16:16:21'),
(537, 141, 25.00, 50, '2025-03-25 16:16:21', '2025-03-25 16:16:21'),
(538, 142, 10.00, 5, '2025-03-25 16:19:37', '2025-03-25 16:19:37'),
(539, 142, 15.00, 15, '2025-03-25 16:19:37', '2025-03-25 16:19:37'),
(540, 142, 20.00, 20, '2025-03-25 16:19:37', '2025-03-25 16:19:37'),
(541, 142, 25.00, 50, '2025-03-25 16:19:37', '2025-03-25 16:19:37'),
(542, 143, 10.00, 5, '2025-03-25 16:23:46', '2025-03-25 16:23:46'),
(543, 143, 15.00, 15, '2025-03-25 16:23:46', '2025-03-25 16:23:46'),
(544, 143, 20.00, 20, '2025-03-25 16:23:46', '2025-03-25 16:23:46'),
(545, 143, 25.00, 50, '2025-03-25 16:23:46', '2025-03-25 16:23:46'),
(546, 144, 10.00, 5, '2025-03-25 16:27:46', '2025-03-25 16:27:46'),
(547, 144, 15.00, 15, '2025-03-25 16:27:46', '2025-03-25 16:27:46'),
(548, 144, 20.00, 20, '2025-03-25 16:27:46', '2025-03-25 16:27:46'),
(549, 144, 25.00, 50, '2025-03-25 16:27:46', '2025-03-25 16:27:46'),
(550, 145, 10.00, 5, '2025-03-25 16:31:43', '2025-03-25 16:31:43'),
(551, 145, 15.00, 15, '2025-03-25 16:31:43', '2025-03-25 16:31:43'),
(552, 145, 20.00, 20, '2025-03-25 16:31:43', '2025-03-25 16:31:43'),
(553, 145, 25.00, 50, '2025-03-25 16:31:43', '2025-03-25 16:31:43'),
(554, 146, 10.00, 5, '2025-03-25 16:36:03', '2025-03-25 16:36:03'),
(555, 146, 15.00, 15, '2025-03-25 16:36:03', '2025-03-25 16:36:03'),
(556, 146, 20.00, 20, '2025-03-25 16:36:03', '2025-03-25 16:36:03'),
(557, 146, 25.00, 50, '2025-03-25 16:36:03', '2025-03-25 16:36:03'),
(558, 147, 10.00, 5, '2025-03-25 16:46:21', '2025-03-25 16:46:21'),
(559, 147, 15.00, 15, '2025-03-25 16:46:21', '2025-03-25 16:46:21'),
(560, 147, 20.00, 20, '2025-03-25 16:46:21', '2025-03-25 16:46:21'),
(561, 147, 25.00, 50, '2025-03-25 16:46:21', '2025-03-25 16:46:21'),
(562, 148, 10.00, 5, '2025-03-25 16:50:58', '2025-03-25 16:50:58'),
(563, 148, 15.00, 15, '2025-03-25 16:50:58', '2025-03-25 16:50:58'),
(564, 148, 20.00, 20, '2025-03-25 16:50:58', '2025-03-25 16:50:58'),
(565, 148, 25.00, 50, '2025-03-25 16:50:58', '2025-03-25 16:50:58'),
(566, 149, 10.00, 5, '2025-03-25 16:57:03', '2025-03-25 16:57:03'),
(567, 149, 15.00, 15, '2025-03-25 16:57:03', '2025-03-25 16:57:03'),
(568, 149, 20.00, 20, '2025-03-25 16:57:03', '2025-03-25 16:57:03'),
(569, 149, 25.00, 50, '2025-03-25 16:57:03', '2025-03-25 16:57:03'),
(570, 150, 10.00, 5, '2025-03-25 17:05:48', '2025-03-25 17:05:48'),
(571, 150, 15.00, 15, '2025-03-25 17:05:48', '2025-03-25 17:05:48'),
(572, 150, 20.00, 20, '2025-03-25 17:05:48', '2025-03-25 17:05:48'),
(573, 150, 25.00, 50, '2025-03-25 17:05:48', '2025-03-25 17:05:48'),
(574, 151, 10.00, 5, '2025-03-25 17:10:25', '2025-03-25 17:10:25'),
(575, 151, 15.00, 15, '2025-03-25 17:10:25', '2025-03-25 17:10:25'),
(576, 151, 20.00, 20, '2025-03-25 17:10:25', '2025-03-25 17:10:25'),
(577, 151, 25.00, 50, '2025-03-25 17:10:25', '2025-03-25 17:10:25'),
(578, 152, 10.00, 5, '2025-03-25 17:13:51', '2025-03-25 17:13:51'),
(579, 152, 15.00, 15, '2025-03-25 17:13:51', '2025-03-25 17:13:51'),
(580, 152, 20.00, 20, '2025-03-25 17:13:51', '2025-03-25 17:13:51'),
(581, 152, 25.00, 50, '2025-03-25 17:13:51', '2025-03-25 17:13:51'),
(582, 153, 10.00, 5, '2025-03-25 17:17:10', '2025-03-25 17:17:10'),
(583, 153, 15.00, 15, '2025-03-25 17:17:10', '2025-03-25 17:17:10'),
(584, 153, 20.00, 20, '2025-03-25 17:17:10', '2025-03-25 17:17:10'),
(585, 153, 25.00, 50, '2025-03-25 17:17:10', '2025-03-25 17:17:10'),
(586, 154, 10.00, 5, '2025-03-25 17:21:04', '2025-03-25 17:21:04'),
(587, 154, 15.00, 15, '2025-03-25 17:21:04', '2025-03-25 17:21:04'),
(588, 154, 20.00, 20, '2025-03-25 17:21:04', '2025-03-25 17:21:04'),
(589, 154, 25.00, 50, '2025-03-25 17:21:04', '2025-03-25 17:21:04'),
(590, 155, 10.00, 5, '2025-03-25 17:26:44', '2025-03-25 17:26:44'),
(591, 155, 15.00, 15, '2025-03-25 17:26:44', '2025-03-25 17:26:44'),
(592, 155, 20.00, 20, '2025-03-25 17:26:44', '2025-03-25 17:26:44'),
(593, 155, 25.00, 50, '2025-03-25 17:26:44', '2025-03-25 17:26:44'),
(594, 156, 10.00, 5, '2025-03-26 10:45:11', '2025-03-26 10:45:11'),
(595, 156, 15.00, 15, '2025-03-26 10:45:11', '2025-03-26 10:45:11'),
(596, 156, 20.00, 20, '2025-03-26 10:45:11', '2025-03-26 10:45:11'),
(597, 156, 25.00, 50, '2025-03-26 10:45:11', '2025-03-26 10:45:11'),
(598, 157, 10.00, 5, '2025-03-26 10:49:39', '2025-03-26 10:49:39'),
(599, 157, 15.00, 15, '2025-03-26 10:49:39', '2025-03-26 10:49:39'),
(600, 157, 20.00, 20, '2025-03-26 10:49:39', '2025-03-26 10:49:39'),
(601, 157, 25.00, 50, '2025-03-26 10:49:39', '2025-03-26 10:49:39'),
(602, 158, 10.00, 5, '2025-03-26 10:52:46', '2025-03-26 10:52:46'),
(603, 158, 15.00, 15, '2025-03-26 10:52:46', '2025-03-26 10:52:46'),
(604, 158, 20.00, 20, '2025-03-26 10:52:46', '2025-03-26 10:52:46'),
(605, 158, 25.00, 50, '2025-03-26 10:52:46', '2025-03-26 10:52:46'),
(606, 159, 10.00, 5, '2025-03-26 11:02:25', '2025-03-26 11:02:25'),
(607, 159, 15.00, 15, '2025-03-26 11:02:25', '2025-03-26 11:02:25'),
(608, 159, 20.00, 20, '2025-03-26 11:02:25', '2025-03-26 11:02:25'),
(609, 159, 25.00, 50, '2025-03-26 11:02:25', '2025-03-26 11:02:25'),
(610, 160, 10.00, 5, '2025-03-26 11:14:34', '2025-03-26 11:14:34'),
(611, 160, 15.00, 15, '2025-03-26 11:14:34', '2025-03-26 11:14:34'),
(612, 160, 20.00, 20, '2025-03-26 11:14:34', '2025-03-26 11:14:34'),
(613, 160, 25.00, 50, '2025-03-26 11:14:34', '2025-03-26 11:14:34'),
(614, 161, 10.00, 5, '2025-03-26 11:32:36', '2025-03-26 11:32:36'),
(615, 161, 15.00, 15, '2025-03-26 11:32:36', '2025-03-26 11:32:36'),
(616, 161, 20.00, 20, '2025-03-26 11:32:36', '2025-03-26 11:32:36'),
(617, 161, 25.00, 50, '2025-03-26 11:32:36', '2025-03-26 11:32:36'),
(618, 162, 10.00, 5, '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(619, 162, 15.00, 15, '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(620, 162, 20.00, 20, '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(621, 162, 25.00, 50, '2025-03-26 11:33:29', '2025-03-26 11:33:29'),
(622, 163, 10.00, 5, '2025-03-26 11:38:19', '2025-03-26 11:38:19'),
(623, 163, 15.00, 15, '2025-03-26 11:38:19', '2025-03-26 11:38:19'),
(624, 163, 20.00, 20, '2025-03-26 11:38:19', '2025-03-26 11:38:19'),
(625, 163, 25.00, 50, '2025-03-26 11:38:19', '2025-03-26 11:38:19'),
(626, 164, 10.00, 5, '2025-03-26 11:43:52', '2025-03-26 11:43:52'),
(627, 164, 15.00, 15, '2025-03-26 11:43:52', '2025-03-26 11:43:52'),
(628, 164, 20.00, 20, '2025-03-26 11:43:52', '2025-03-26 11:43:52'),
(629, 164, 25.00, 50, '2025-03-26 11:43:52', '2025-03-26 11:43:52'),
(630, 165, 10.00, 5, '2025-03-26 11:49:13', '2025-03-26 11:49:13'),
(631, 165, 15.00, 15, '2025-03-26 11:49:13', '2025-03-26 11:49:13'),
(632, 165, 20.00, 20, '2025-03-26 11:49:13', '2025-03-26 11:49:13'),
(633, 165, 25.00, 50, '2025-03-26 11:49:13', '2025-03-26 11:49:13'),
(634, 166, 10.00, 5, '2025-03-26 11:59:36', '2025-03-26 11:59:36'),
(635, 166, 15.00, 15, '2025-03-26 11:59:36', '2025-03-26 11:59:36'),
(636, 166, 20.00, 20, '2025-03-26 11:59:36', '2025-03-26 11:59:36'),
(637, 166, 25.00, 50, '2025-03-26 11:59:36', '2025-03-26 11:59:36'),
(638, 167, 10.00, 5, '2025-03-26 12:05:05', '2025-03-26 12:05:05'),
(639, 167, 15.00, 15, '2025-03-26 12:05:05', '2025-03-26 12:05:05'),
(640, 167, 20.00, 20, '2025-03-26 12:05:05', '2025-03-26 12:05:05'),
(641, 167, 25.00, 50, '2025-03-26 12:05:05', '2025-03-26 12:05:05'),
(642, 168, 10.00, 5, '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(643, 168, 15.00, 15, '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(644, 168, 20.00, 20, '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(645, 168, 25.00, 50, '2025-03-26 12:05:25', '2025-03-26 12:05:25'),
(646, 169, 10.00, 5, '2025-03-26 12:10:43', '2025-03-26 12:10:43'),
(647, 169, 15.00, 15, '2025-03-26 12:10:43', '2025-03-26 12:10:43'),
(648, 169, 20.00, 20, '2025-03-26 12:10:43', '2025-03-26 12:10:43'),
(649, 169, 25.00, 50, '2025-03-26 12:10:43', '2025-03-26 12:10:43'),
(650, 170, 10.00, 5, '2025-03-26 12:14:42', '2025-03-26 12:14:42'),
(651, 170, 15.00, 15, '2025-03-26 12:14:42', '2025-03-26 12:14:42'),
(652, 170, 20.00, 20, '2025-03-26 12:14:42', '2025-03-26 12:14:42'),
(653, 170, 25.00, 50, '2025-03-26 12:14:42', '2025-03-26 12:14:42'),
(654, 171, 10.00, 5, '2025-03-26 12:19:09', '2025-03-26 12:19:09'),
(655, 171, 15.00, 15, '2025-03-26 12:19:09', '2025-03-26 12:19:09'),
(656, 171, 20.00, 20, '2025-03-26 12:19:09', '2025-03-26 12:19:09'),
(657, 171, 25.00, 50, '2025-03-26 12:19:09', '2025-03-26 12:19:09'),
(658, 172, 10.00, 5, '2025-03-26 12:23:31', '2025-03-26 12:23:31'),
(659, 172, 15.00, 15, '2025-03-26 12:23:31', '2025-03-26 12:23:31'),
(660, 172, 20.00, 20, '2025-03-26 12:23:31', '2025-03-26 12:23:31'),
(661, 172, 25.00, 50, '2025-03-26 12:23:31', '2025-03-26 12:23:31'),
(662, 173, 10.00, 5, '2025-03-26 12:30:28', '2025-03-26 12:30:28'),
(663, 173, 15.00, 15, '2025-03-26 12:30:28', '2025-03-26 12:30:28'),
(664, 173, 20.00, 20, '2025-03-26 12:30:28', '2025-03-26 12:30:28'),
(665, 173, 25.00, 50, '2025-03-26 12:30:28', '2025-03-26 12:30:28'),
(666, 174, 10.00, 5, '2025-03-26 12:34:01', '2025-03-26 12:34:01'),
(667, 174, 15.00, 15, '2025-03-26 12:34:01', '2025-03-26 12:34:01'),
(668, 174, 20.00, 20, '2025-03-26 12:34:01', '2025-03-26 12:34:01'),
(669, 174, 25.00, 50, '2025-03-26 12:34:01', '2025-03-26 12:34:01'),
(670, 175, 10.00, 5, '2025-03-26 12:37:22', '2025-03-26 12:37:22'),
(671, 175, 15.00, 15, '2025-03-26 12:37:22', '2025-03-26 12:37:22'),
(672, 175, 20.00, 20, '2025-03-26 12:37:22', '2025-03-26 12:37:22'),
(673, 175, 25.00, 50, '2025-03-26 12:37:22', '2025-03-26 12:37:22'),
(674, 176, 10.00, 5, '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(675, 176, 15.00, 15, '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(676, 176, 20.00, 20, '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(677, 176, 25.00, 50, '2025-03-26 12:48:49', '2025-03-26 12:48:49'),
(678, 177, 10.00, 5, '2025-03-26 12:54:56', '2025-03-26 12:54:56'),
(679, 177, 15.00, 15, '2025-03-26 12:54:56', '2025-03-26 12:54:56'),
(680, 177, 20.00, 20, '2025-03-26 12:54:56', '2025-03-26 12:54:56'),
(681, 177, 25.00, 50, '2025-03-26 12:54:56', '2025-03-26 12:54:56'),
(682, 178, 10.00, 5, '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(683, 178, 15.00, 15, '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(684, 178, 20.00, 20, '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(685, 178, 25.00, 50, '2025-03-26 12:56:09', '2025-03-26 12:56:09'),
(686, 179, 10.00, 5, '2025-03-26 13:00:22', '2025-03-26 13:00:22'),
(687, 179, 15.00, 15, '2025-03-26 13:00:22', '2025-03-26 13:00:22'),
(688, 179, 20.00, 20, '2025-03-26 13:00:22', '2025-03-26 13:00:22'),
(689, 179, 25.00, 50, '2025-03-26 13:00:22', '2025-03-26 13:00:22'),
(690, 180, 10.00, 5, '2025-03-26 13:04:53', '2025-03-26 13:04:53'),
(691, 180, 15.00, 15, '2025-03-26 13:04:53', '2025-03-26 13:04:53'),
(692, 180, 20.00, 20, '2025-03-26 13:04:53', '2025-03-26 13:04:53'),
(693, 180, 25.00, 50, '2025-03-26 13:04:53', '2025-03-26 13:04:53'),
(694, 181, 10.00, 5, '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(695, 181, 15.00, 15, '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(696, 181, 20.00, 20, '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(697, 181, 25.00, 50, '2025-03-26 13:07:02', '2025-03-26 13:07:02'),
(698, 182, 10.00, 5, '2025-03-26 13:08:57', '2025-03-26 13:08:57'),
(699, 182, 15.00, 15, '2025-03-26 13:08:57', '2025-03-26 13:08:57'),
(700, 182, 20.00, 20, '2025-03-26 13:08:57', '2025-03-26 13:08:57'),
(701, 182, 25.00, 50, '2025-03-26 13:08:57', '2025-03-26 13:08:57'),
(702, 183, 10.00, 5, '2025-03-26 13:12:31', '2025-03-26 13:12:31'),
(703, 183, 15.00, 15, '2025-03-26 13:12:31', '2025-03-26 13:12:31'),
(704, 183, 20.00, 20, '2025-03-26 13:12:31', '2025-03-26 13:12:31'),
(705, 183, 25.00, 50, '2025-03-26 13:12:31', '2025-03-26 13:12:31'),
(706, 184, 10.00, 5, '2025-03-26 13:22:59', '2025-03-26 13:22:59'),
(707, 184, 15.00, 15, '2025-03-26 13:22:59', '2025-03-26 13:22:59'),
(708, 184, 20.00, 20, '2025-03-26 13:22:59', '2025-03-26 13:22:59'),
(709, 184, 25.00, 50, '2025-03-26 13:22:59', '2025-03-26 13:22:59'),
(710, 185, 10.00, 5, '2025-03-26 13:26:24', '2025-03-26 13:26:24'),
(711, 185, 15.00, 15, '2025-03-26 13:26:24', '2025-03-26 13:26:24'),
(712, 185, 20.00, 20, '2025-03-26 13:26:24', '2025-03-26 13:26:24'),
(713, 185, 25.00, 50, '2025-03-26 13:26:24', '2025-03-26 13:26:24'),
(714, 186, 10.00, 5, '2025-03-26 13:30:43', '2025-03-26 13:30:43'),
(715, 186, 15.00, 15, '2025-03-26 13:30:43', '2025-03-26 13:30:43'),
(716, 186, 20.00, 20, '2025-03-26 13:30:43', '2025-03-26 13:30:43'),
(717, 186, 25.00, 50, '2025-03-26 13:30:43', '2025-03-26 13:30:43'),
(718, 187, 10.00, 5, '2025-03-26 13:46:29', '2025-03-26 13:46:29'),
(719, 187, 15.00, 15, '2025-03-26 13:46:29', '2025-03-26 13:46:29'),
(720, 187, 20.00, 20, '2025-03-26 13:46:29', '2025-03-26 13:46:29'),
(721, 187, 25.00, 50, '2025-03-26 13:46:29', '2025-03-26 13:46:29'),
(722, 188, 10.00, 5, '2025-03-26 14:04:06', '2025-03-26 14:04:06'),
(723, 188, 15.00, 15, '2025-03-26 14:04:06', '2025-03-26 14:04:06'),
(724, 188, 20.00, 20, '2025-03-26 14:04:06', '2025-03-26 14:04:06'),
(725, 188, 25.00, 50, '2025-03-26 14:04:06', '2025-03-26 14:04:06'),
(726, 189, 10.00, 5, '2025-03-26 14:04:12', '2025-03-26 14:04:12'),
(727, 189, 15.00, 15, '2025-03-26 14:04:12', '2025-03-26 14:04:12'),
(728, 189, 20.00, 20, '2025-03-26 14:04:12', '2025-03-26 14:04:12'),
(729, 189, 25.00, 50, '2025-03-26 14:04:12', '2025-03-26 14:04:12'),
(730, 190, 10.00, 5, '2025-03-26 14:13:34', '2025-03-26 14:13:34'),
(731, 190, 15.00, 15, '2025-03-26 14:13:34', '2025-03-26 14:13:34'),
(732, 190, 20.00, 20, '2025-03-26 14:13:34', '2025-03-26 14:13:34'),
(733, 190, 25.00, 50, '2025-03-26 14:13:34', '2025-03-26 14:13:34'),
(734, 191, 10.00, 5, '2025-03-26 14:15:42', '2025-03-26 14:15:42'),
(735, 191, 15.00, 15, '2025-03-26 14:15:42', '2025-03-26 14:15:42'),
(736, 191, 20.00, 20, '2025-03-26 14:15:42', '2025-03-26 14:15:42'),
(737, 191, 25.00, 50, '2025-03-26 14:15:42', '2025-03-26 14:15:42'),
(738, 192, 10.00, 5, '2025-03-26 14:19:46', '2025-03-26 14:19:46'),
(739, 192, 15.00, 15, '2025-03-26 14:19:46', '2025-03-26 14:19:46'),
(740, 192, 20.00, 20, '2025-03-26 14:19:46', '2025-03-26 14:19:46'),
(741, 192, 25.00, 50, '2025-03-26 14:19:46', '2025-03-26 14:19:46'),
(742, 193, 10.00, 5, '2025-03-26 14:21:58', '2025-03-26 14:21:58'),
(743, 193, 15.00, 15, '2025-03-26 14:21:58', '2025-03-26 14:21:58'),
(744, 193, 20.00, 20, '2025-03-26 14:21:58', '2025-03-26 14:21:58'),
(745, 193, 25.00, 50, '2025-03-26 14:21:58', '2025-03-26 14:21:58'),
(750, 195, 10.00, 5, '2025-03-26 14:30:36', '2025-03-26 14:30:36'),
(751, 195, 15.00, 15, '2025-03-26 14:30:36', '2025-03-26 14:30:36'),
(752, 195, 20.00, 20, '2025-03-26 14:30:36', '2025-03-26 14:30:36'),
(753, 195, 25.00, 50, '2025-03-26 14:30:36', '2025-03-26 14:30:36'),
(754, 196, 10.00, 5, '2025-03-26 14:37:32', '2025-03-26 14:37:32'),
(755, 196, 15.00, 15, '2025-03-26 14:37:32', '2025-03-26 14:37:32'),
(756, 196, 20.00, 20, '2025-03-26 14:37:32', '2025-03-26 14:37:32'),
(757, 196, 25.00, 50, '2025-03-26 14:37:32', '2025-03-26 14:37:32'),
(758, 197, 10.00, 5, '2025-03-26 14:41:40', '2025-03-26 14:41:40'),
(759, 197, 15.00, 15, '2025-03-26 14:41:40', '2025-03-26 14:41:40'),
(760, 197, 20.00, 20, '2025-03-26 14:41:40', '2025-03-26 14:41:40'),
(761, 197, 25.00, 50, '2025-03-26 14:41:40', '2025-03-26 14:41:40'),
(762, 198, 10.00, 5, '2025-03-26 14:47:26', '2025-03-26 14:47:26'),
(763, 198, 15.00, 15, '2025-03-26 14:47:26', '2025-03-26 14:47:26'),
(764, 198, 20.00, 20, '2025-03-26 14:47:26', '2025-03-26 14:47:26'),
(765, 198, 25.00, 50, '2025-03-26 14:47:26', '2025-03-26 14:47:26'),
(766, 199, 10.00, 5, '2025-03-26 14:53:22', '2025-03-26 14:53:22'),
(767, 199, 15.00, 15, '2025-03-26 14:53:22', '2025-03-26 14:53:22'),
(768, 199, 20.00, 20, '2025-03-26 14:53:22', '2025-03-26 14:53:22'),
(769, 199, 25.00, 50, '2025-03-26 14:53:22', '2025-03-26 14:53:22'),
(770, 200, 10.00, 5, '2025-03-26 15:00:57', '2025-03-26 15:00:57'),
(771, 200, 15.00, 15, '2025-03-26 15:00:57', '2025-03-26 15:00:57'),
(772, 200, 20.00, 20, '2025-03-26 15:00:57', '2025-03-26 15:00:57'),
(773, 200, 25.00, 50, '2025-03-26 15:00:57', '2025-03-26 15:00:57'),
(774, 201, 10.00, 5, '2025-03-26 15:05:29', '2025-03-26 15:05:29'),
(775, 201, 15.00, 15, '2025-03-26 15:05:29', '2025-03-26 15:05:29'),
(776, 201, 20.00, 20, '2025-03-26 15:05:29', '2025-03-26 15:05:29'),
(777, 201, 25.00, 50, '2025-03-26 15:05:29', '2025-03-26 15:05:29'),
(778, 202, 10.00, 5, '2025-03-26 15:07:05', '2025-03-26 15:07:05'),
(779, 202, 15.00, 15, '2025-03-26 15:07:05', '2025-03-26 15:07:05'),
(780, 202, 20.00, 20, '2025-03-26 15:07:05', '2025-03-26 15:07:05'),
(781, 202, 25.00, 50, '2025-03-26 15:07:05', '2025-03-26 15:07:05'),
(782, 203, 10.00, 5, '2025-03-26 15:12:16', '2025-03-26 15:12:16'),
(783, 203, 15.00, 15, '2025-03-26 15:12:16', '2025-03-26 15:12:16'),
(784, 203, 20.00, 20, '2025-03-26 15:12:16', '2025-03-26 15:12:16'),
(785, 203, 25.00, 50, '2025-03-26 15:12:16', '2025-03-26 15:12:16'),
(786, 204, 10.00, 5, '2025-03-26 15:16:30', '2025-03-26 15:16:30'),
(787, 204, 15.00, 15, '2025-03-26 15:16:30', '2025-03-26 15:16:30'),
(788, 204, 20.00, 20, '2025-03-26 15:16:30', '2025-03-26 15:16:30'),
(789, 204, 25.00, 50, '2025-03-26 15:16:30', '2025-03-26 15:16:30'),
(790, 205, 10.00, 5, '2025-03-26 15:20:45', '2025-03-26 15:20:45'),
(791, 205, 15.00, 15, '2025-03-26 15:20:45', '2025-03-26 15:20:45'),
(792, 205, 20.00, 20, '2025-03-26 15:20:45', '2025-03-26 15:20:45'),
(793, 205, 25.00, 50, '2025-03-26 15:20:45', '2025-03-26 15:20:45'),
(794, 194, 10.00, 5, '2025-03-26 15:23:22', '2025-03-26 15:23:22'),
(795, 194, 15.00, 15, '2025-03-26 15:23:22', '2025-03-26 15:23:22'),
(796, 194, 20.00, 20, '2025-03-26 15:23:22', '2025-03-26 15:23:22'),
(797, 194, 25.00, 50, '2025-03-26 15:23:22', '2025-03-26 15:23:22'),
(798, 206, 10.00, 5, '2025-03-26 15:25:36', '2025-03-26 15:25:36'),
(799, 206, 15.00, 15, '2025-03-26 15:25:36', '2025-03-26 15:25:36'),
(800, 206, 20.00, 20, '2025-03-26 15:25:36', '2025-03-26 15:25:36'),
(801, 206, 25.00, 50, '2025-03-26 15:25:36', '2025-03-26 15:25:36'),
(802, 207, 10.00, 5, '2025-03-26 15:28:07', '2025-03-26 15:28:07'),
(803, 207, 15.00, 15, '2025-03-26 15:28:07', '2025-03-26 15:28:07'),
(804, 207, 20.00, 20, '2025-03-26 15:28:07', '2025-03-26 15:28:07'),
(805, 207, 25.00, 50, '2025-03-26 15:28:07', '2025-03-26 15:28:07'),
(806, 208, 10.00, 5, '2025-03-26 15:29:36', '2025-03-26 15:29:36'),
(807, 208, 15.00, 15, '2025-03-26 15:29:36', '2025-03-26 15:29:36'),
(808, 208, 20.00, 20, '2025-03-26 15:29:36', '2025-03-26 15:29:36'),
(809, 208, 26.00, 50, '2025-03-26 15:29:36', '2025-03-26 15:29:36'),
(810, 209, 10.00, 5, '2025-03-26 15:32:55', '2025-03-26 15:32:55'),
(811, 209, 15.00, 15, '2025-03-26 15:32:55', '2025-03-26 15:32:55'),
(812, 209, 20.00, 20, '2025-03-26 15:32:55', '2025-03-26 15:32:55'),
(813, 209, 25.00, 50, '2025-03-26 15:32:55', '2025-03-26 15:32:55'),
(814, 210, 10.00, 5, '2025-03-26 15:34:00', '2025-03-26 15:34:00'),
(815, 210, 15.00, 15, '2025-03-26 15:34:00', '2025-03-26 15:34:00'),
(816, 210, 20.00, 20, '2025-03-26 15:34:00', '2025-03-26 15:34:00'),
(817, 210, 25.00, 50, '2025-03-26 15:34:00', '2025-03-26 15:34:00'),
(818, 211, 10.00, 5, '2025-03-26 15:38:42', '2025-03-26 15:38:42'),
(819, 211, 15.00, 15, '2025-03-26 15:38:42', '2025-03-26 15:38:42'),
(820, 211, 20.00, 20, '2025-03-26 15:38:42', '2025-03-26 15:38:42'),
(821, 211, 25.00, 50, '2025-03-26 15:38:42', '2025-03-26 15:38:42'),
(822, 212, 10.00, 5, '2025-03-26 15:42:53', '2025-03-26 15:42:53'),
(823, 212, 15.00, 15, '2025-03-26 15:42:53', '2025-03-26 15:42:53'),
(824, 212, 20.00, 20, '2025-03-26 15:42:53', '2025-03-26 15:42:53'),
(825, 212, 25.00, 50, '2025-03-26 15:42:53', '2025-03-26 15:42:53'),
(826, 213, 10.00, 5, '2025-03-26 15:47:25', '2025-03-26 15:47:25'),
(827, 213, 15.00, 15, '2025-03-26 15:47:25', '2025-03-26 15:47:25'),
(828, 213, 20.00, 20, '2025-03-26 15:47:25', '2025-03-26 15:47:25'),
(829, 213, 25.00, 50, '2025-03-26 15:47:25', '2025-03-26 15:47:25'),
(830, 214, 10.00, 5, '2025-03-26 15:52:14', '2025-03-26 15:52:14'),
(831, 214, 15.00, 15, '2025-03-26 15:52:14', '2025-03-26 15:52:14'),
(832, 214, 20.00, 20, '2025-03-26 15:52:14', '2025-03-26 15:52:14'),
(833, 214, 25.00, 50, '2025-03-26 15:52:14', '2025-03-26 15:52:14'),
(834, 215, 10.00, 5, '2025-03-26 15:56:44', '2025-03-26 15:56:44'),
(835, 215, 15.00, 15, '2025-03-26 15:56:45', '2025-03-26 15:56:45'),
(836, 215, 20.00, 20, '2025-03-26 15:56:45', '2025-03-26 15:56:45'),
(837, 215, 25.00, 50, '2025-03-26 15:56:45', '2025-03-26 15:56:45'),
(838, 216, 10.00, 5, '2025-03-26 16:01:50', '2025-03-26 16:01:50'),
(839, 216, 15.00, 15, '2025-03-26 16:01:50', '2025-03-26 16:01:50'),
(840, 216, 20.00, 20, '2025-03-26 16:01:50', '2025-03-26 16:01:50'),
(841, 216, 25.00, 50, '2025-03-26 16:01:50', '2025-03-26 16:01:50'),
(842, 217, 10.00, 5, '2025-03-26 16:04:30', '2025-03-26 16:04:30'),
(843, 217, 15.00, 15, '2025-03-26 16:04:30', '2025-03-26 16:04:30'),
(844, 217, 20.00, 20, '2025-03-26 16:04:30', '2025-03-26 16:04:30'),
(845, 217, 25.00, 50, '2025-03-26 16:04:30', '2025-03-26 16:04:30'),
(846, 218, 10.00, 5, '2025-03-26 16:07:37', '2025-03-26 16:07:37'),
(847, 218, 15.00, 15, '2025-03-26 16:07:37', '2025-03-26 16:07:37'),
(848, 218, 20.00, 20, '2025-03-26 16:07:37', '2025-03-26 16:07:37'),
(849, 218, 25.00, 50, '2025-03-26 16:07:37', '2025-03-26 16:07:37'),
(850, 219, 10.00, 5, '2025-03-26 16:12:01', '2025-03-26 16:12:01'),
(851, 219, 15.00, 15, '2025-03-26 16:12:01', '2025-03-26 16:12:01'),
(852, 219, 20.00, 20, '2025-03-26 16:12:01', '2025-03-26 16:12:01'),
(853, 219, 25.00, 50, '2025-03-26 16:12:01', '2025-03-26 16:12:01'),
(854, 220, 10.00, 5, '2025-03-26 16:16:21', '2025-03-26 16:16:21'),
(855, 220, 15.00, 15, '2025-03-26 16:16:21', '2025-03-26 16:16:21'),
(856, 220, 20.00, 20, '2025-03-26 16:16:21', '2025-03-26 16:16:21'),
(857, 220, 25.00, 50, '2025-03-26 16:16:21', '2025-03-26 16:16:21'),
(858, 221, 10.00, 5, '2025-03-26 16:21:04', '2025-03-26 16:21:04'),
(859, 221, 15.00, 15, '2025-03-26 16:21:04', '2025-03-26 16:21:04'),
(860, 221, 20.00, 20, '2025-03-26 16:21:04', '2025-03-26 16:21:04'),
(861, 221, 25.00, 50, '2025-03-26 16:21:04', '2025-03-26 16:21:04'),
(862, 222, 10.00, 5, '2025-03-26 16:25:31', '2025-03-26 16:25:31'),
(863, 222, 15.00, 15, '2025-03-26 16:25:31', '2025-03-26 16:25:31'),
(864, 222, 20.00, 20, '2025-03-26 16:25:31', '2025-03-26 16:25:31'),
(865, 222, 25.00, 50, '2025-03-26 16:25:31', '2025-03-26 16:25:31'),
(866, 223, 10.00, 5, '2025-03-26 16:32:23', '2025-03-26 16:32:23'),
(867, 223, 15.00, 15, '2025-03-26 16:32:23', '2025-03-26 16:32:23'),
(868, 223, 20.00, 20, '2025-03-26 16:32:23', '2025-03-26 16:32:23'),
(869, 223, 25.00, 50, '2025-03-26 16:32:23', '2025-03-26 16:32:23'),
(870, 224, 10.00, 5, '2025-03-26 16:37:44', '2025-03-26 16:37:44'),
(871, 224, 15.00, 15, '2025-03-26 16:37:44', '2025-03-26 16:37:44'),
(872, 224, 20.00, 20, '2025-03-26 16:37:44', '2025-03-26 16:37:44'),
(873, 224, 25.00, 50, '2025-03-26 16:37:44', '2025-03-26 16:37:44'),
(874, 225, 10.00, 5, '2025-03-26 16:53:20', '2025-03-26 16:53:20'),
(875, 225, 15.00, 15, '2025-03-26 16:53:20', '2025-03-26 16:53:20'),
(876, 225, 20.00, 20, '2025-03-26 16:53:20', '2025-03-26 16:53:20'),
(877, 225, 25.00, 50, '2025-03-26 16:53:20', '2025-03-26 16:53:20'),
(878, 226, 10.00, 5, '2025-03-26 16:59:07', '2025-03-26 16:59:07'),
(879, 226, 15.00, 15, '2025-03-26 16:59:07', '2025-03-26 16:59:07'),
(880, 226, 20.00, 20, '2025-03-26 16:59:07', '2025-03-26 16:59:07'),
(881, 226, 25.00, 50, '2025-03-26 16:59:07', '2025-03-26 16:59:07'),
(882, 227, 10.00, 5, '2025-03-26 17:06:56', '2025-03-26 17:06:56'),
(883, 227, 15.00, 15, '2025-03-26 17:06:56', '2025-03-26 17:06:56'),
(884, 227, 20.00, 20, '2025-03-26 17:06:56', '2025-03-26 17:06:56'),
(885, 227, 25.00, 50, '2025-03-26 17:06:56', '2025-03-26 17:06:56'),
(886, 228, 10.00, 5, '2025-03-26 17:27:51', '2025-03-26 17:27:51'),
(887, 228, 15.00, 15, '2025-03-26 17:27:51', '2025-03-26 17:27:51'),
(888, 228, 20.00, 20, '2025-03-26 17:27:51', '2025-03-26 17:27:51'),
(889, 228, 25.00, 50, '2025-03-26 17:27:52', '2025-03-26 17:27:52'),
(890, 229, 10.00, 5, '2025-03-26 17:33:24', '2025-03-26 17:33:24'),
(891, 229, 15.00, 15, '2025-03-26 17:33:24', '2025-03-26 17:33:24'),
(892, 229, 20.00, 20, '2025-03-26 17:33:24', '2025-03-26 17:33:24'),
(893, 229, 25.00, 50, '2025-03-26 17:33:24', '2025-03-26 17:33:24');

-- --------------------------------------------------------

--
-- Table structure for table `temp_cart_images`
--

CREATE TABLE `temp_cart_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `artwork_dataImage` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_cart_images`
--

INSERT INTO `temp_cart_images` (`id`, `session_id`, `artwork_dataImage`, `created_at`, `updated_at`) VALUES
(13, '756gAEgK9hNYBqHPPOJ3vZuZxSaaJbUeMlEEWF2n', 'TempCartImages/1741076836_images.jpg', NULL, NULL),
(18, 'pMTQGUIDBZDHRycyVvGnLRKRLpCVdDYED1XxNVQP', 'TempCartImages/1741078630_images.jpg', NULL, NULL),
(20, 'rVK5zmoT4bLJXBmUWPO4enKG595Xi9LMlvXAPDbM', 'TempCartImages/1741100220_images.jpg', NULL, NULL),
(22, 'VBTErSDrTSdSZsHijLXvPLd9OEkXpZgArGzc7EY5', 'TempCartImages/1741158038_images.jpg', NULL, NULL),
(28, '3MICXwD9oWazJJuYSSuCzcTfHsgZlNwDshJlm380', 'TempCartImages/1742199209_2.jpg', NULL, NULL),
(31, 'gPx204a13YwFQ5TNICuKvObHR5aHKqNcNmhwypGm', 'TempCartImages/1742286857_2.jpg', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tps_tax_price`
--

CREATE TABLE `tps_tax_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percentage` double(8,2) NOT NULL,
  `taxno` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tps_tax_price`
--

INSERT INTO `tps_tax_price` (`id`, `percentage`, `taxno`, `created_at`, `updated_at`) VALUES
(1, 55.00, '799230495', '2025-02-10 12:01:38', '2025-02-19 07:38:56');

-- --------------------------------------------------------

--
-- Table structure for table `tvq_tax_price`
--

CREATE TABLE `tvq_tax_price` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `percentage` double(8,3) NOT NULL,
  `taxno` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tvq_tax_price`
--

INSERT INTO `tvq_tax_price` (`id`, `percentage`, `taxno`, `created_at`, `updated_at`) VALUES
(1, 9.975, '1223273960', '2025-02-10 12:10:25', '2025-02-10 14:51:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(300) NOT NULL,
  `last_name` varchar(300) NOT NULL,
  `language` varchar(300) NOT NULL,
  `contact_number` varchar(300) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `country` enum('USA','CANADA') NOT NULL,
  `status` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `language`, `contact_number`, `email`, `email_verified_at`, `password`, `country`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', '', '', 'syedsabeer@gmail.com', NULL, '$2y$10$IIwAEh0X3FceNNwGqdjduOMmYg3j5KfUNiKqTb3DZP/1GLr.Hem5y', 'CANADA', 1, NULL, '2025-01-20 01:55:00', '2025-01-20 01:55:00'),
(4, '', '', '', '', 'b.torres@weborka.com', NULL, '$2y$10$c534M1g.z515j6WPNOxKJeYBCotHeto523I7sZRWA0hPNWZm7VU4W', 'CANADA', 1, NULL, NULL, NULL),
(6, '', '', '', '', 'sean@capbeast.com', NULL, '$2y$10$wy6Z1cY9400HHf/2BFKyV.dqVXA6o.i5si9EvnSTBDmWj.jXPziBO', 'CANADA', 1, NULL, NULL, NULL),
(8, '', '', '', '', 'testuser@gmail.com', NULL, '$2y$10$4M6sKRlGdeX3arReQFAVg.hc.r81z4n0.ffCB2VqdkeihRUWDm3Nm', 'CANADA', 1, NULL, '2025-02-09 08:01:23', '2025-02-09 08:02:21'),
(17, 'syed', 'sabeer', 'en', '23873489', 'testsabeer@gmail.com', NULL, '$2y$10$FK1bFPt9tPI.0e9ENI8xPOLZBNvPsBnAbL/YhG86I1c6nRjx9zv0u', 'USA', 1, NULL, '2025-03-01 03:47:49', '2025-03-17 03:12:04'),
(18, 'test', 'usa', 'en', '8293829', 'testsabeer2@gmail.com', NULL, '$2y$10$AW1BVwzsTYAWg0CByLVmDeQ5tcOkflpIc4DDNcpl56uWaf5JxCc4.', 'USA', 1, NULL, '2025-03-04 09:57:35', '2025-03-04 09:57:35'),
(19, 'test', 'user', 'en', '383848', 'test22@gmail.com', NULL, '$2y$10$qx0UlYJvxtfCyXeFPnkcA.B4ZIdkbQimHnyY0YYO6NZ8KME7z.1LC', 'USA', 1, NULL, '2025-03-04 11:25:38', '2025-03-04 11:25:38'),
(20, 'kjdskjdjk', 'jkdjkdjkf', 'en', 'kjsdjkdsjkf', 'tt@gmail.com', NULL, '$2y$10$jL9zI8BDYOpRwH7Dak/VJeSyRWxSN.fNFjBxoS18JvMe2y/ZITUQC', 'USA', 1, NULL, '2025-03-04 11:31:24', '2025-03-04 11:31:24'),
(21, 'skuasfk', 'jdjjfk', 'en', '898889', 'jj@gmail.com', NULL, '$2y$10$XdK4Wi6ERgLINpoBk1bouu9aWAlI6t..riib9pEBreL/bO9E7Snl.', 'USA', 1, NULL, '2025-03-04 11:35:49', '2025-03-04 11:35:49'),
(22, 'djdfjj', 'kjdjkjkdjk', 'en', '3434544', 'ff@gmail.com', NULL, '$2y$10$3fgqkhBxjL2w6RI6PJsMnOI5mcJ5WJdmmf0G8hfrAIzFVbeT3HSQK', 'USA', 1, NULL, '2025-03-04 11:36:57', '2025-03-04 11:36:57'),
(23, 'skhjsdk', 'kjhkdjfh', 'en', '3848394', 'djsfhdkf@dssfdf.com', NULL, '$2y$10$HQVT64q4gS5.vjxY.DcF6.tc1rpZmsntpW7/SdDFxZ272.XD6/89G', 'USA', 1, NULL, '2025-03-05 02:01:05', '2025-03-05 02:01:05'),
(25, 'sdsjksd', 'kjdsjfjdk', 'en', '88889', 'dfddfs@sfdsfd.com', NULL, '$2y$10$k47ZcyxFK62d433U0HTyr.yaJF4QdajlWLRyL76cL0rCxho2mFDfS', 'USA', 1, NULL, '2025-03-16 04:46:27', '2025-03-16 04:46:27'),
(26, 'dsfdf', 'sadsaf', 'en', '2132', 'dfdsf@dfdsfsd.com', NULL, '$2y$10$zP2MnOdO133J3Ci6R9Q83e3nadQMqSf6nJme.cIb5r4EFamMJ1TOW', 'USA', 1, NULL, '2025-03-16 04:48:49', '2025-03-16 04:48:49'),
(27, 'sdsds', 'asdsa', 'en', '3234334', 'dfdsf@dsfds.com', NULL, '$2y$10$YtMaG6KlucAwrBsFBGuWL.f7N.5NwZ655bM604YCRJtBDzKT5SC4C', 'USA', 1, NULL, '2025-03-16 05:00:37', '2025-03-16 05:00:37'),
(28, 'ddfds', 'sdsf', 'en', '3344', 'sddsf@wdsdf.om', NULL, '$2y$10$lmIelbflK96KbosEbYzyuuU5C2Ozb.XhVgZbppCz8hd0lht.Mp8lS', 'USA', 1, NULL, '2025-03-16 05:02:44', '2025-03-16 05:02:44'),
(29, 'syed', 'sabeer', 'en', '34324324', 'ssdfdsf@dsdfsdf.com', NULL, '$2y$10$Cir8BNhK9i1aTWc1WYkp1.uZHaoJzzJk772K8zHpEaVcXH35GXjQi', 'USA', 1, NULL, '2025-03-17 03:14:49', '2025-03-17 03:14:49'),
(32, 'ewre', 'dfdf', 'en', '33939', 'fdsfdd@dsdsfd.com', NULL, '$2y$10$TWViexeTub0hg0gBXAAsyeLki03rQowCPv7.urv9u5YgdXdkp5uYC', 'USA', 1, NULL, '2025-03-18 03:34:42', '2025-03-18 03:34:42'),
(33, 'dfjdj', 'jkdfjkjk', 'en', '2330300', 'dfdf@ffdf.com', NULL, '$2y$10$BSxbT/p7XAHNACU26MENOeRxcWf4MWPW/W7sFzAr2hr6sYlCsujUO', 'USA', 1, NULL, '2025-03-18 03:37:18', '2025-03-18 03:37:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `authorizedotnet_logs`
--
ALTER TABLE `authorizedotnet_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_user_id_foreign` (`user_id`),
  ADD KEY `cart_product_id_foreign` (`product_id`),
  ADD KEY `cart_color_id_foreign` (`color_id`),
  ADD KEY `cart_printing_id_foreign` (`printing_id`);

--
-- Indexes for table `cart_artwork`
--
ALTER TABLE `cart_artwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cart_artwork_cart_id_foreign` (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_embroidery_color`
--
ALTER TABLE `component_embroidery_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `component_product_color`
--
ALTER TABLE `component_product_color`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discount_coupon_discountable_type_discountable_id_index` (`discountable_type`,`discountable_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `internal_status`
--
ALTER TABLE `internal_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `orders_order_id_unique` (`order_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `fk_discount` (`discount_id`);

--
-- Indexes for table `order_artwork`
--
ALTER TABLE `order_artwork`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_artwork_order_item_id_foreign` (`order_item_id`);

--
-- Indexes for table `order_files`
--
ALTER TABLE `order_files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_files_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_internal_status`
--
ALTER TABLE `order_internal_status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_internal_status_order_id_foreign` (`order_id`),
  ADD KEY `order_internal_status_internal_status_id_foreign` (`internal_status_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_color_id_foreign` (`color_id`),
  ADD KEY `order_items_printing_id_foreign` (`printing_id`);

--
-- Indexes for table `order_shipping_detail`
--
ALTER TABLE `order_shipping_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_shipping_detail_order_id_foreign` (`order_id`);

--
-- Indexes for table `order_tax_details`
--
ALTER TABLE `order_tax_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_tax_details_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_fk` (`category_id`),
  ADD KEY `brand_fk` (`brand_id`);

--
-- Indexes for table `product_baseimages`
--
ALTER TABLE `product_baseimages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_baseimages_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_delivery`
--
ALTER TABLE `product_delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_printing`
--
ALTER TABLE `product_printing`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_seo`
--
ALTER TABLE `product_seo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_seo_product_id_foreign` (`product_id`);

--
-- Indexes for table `product_volume_discount`
--
ALTER TABLE `product_volume_discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_pricing_product_id_foreign` (`product_id`);

--
-- Indexes for table `temp_cart_images`
--
ALTER TABLE `temp_cart_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tps_tax_price`
--
ALTER TABLE `tps_tax_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tvq_tax_price`
--
ALTER TABLE `tvq_tax_price`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authorizedotnet_logs`
--
ALTER TABLE `authorizedotnet_logs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `cart_artwork`
--
ALTER TABLE `cart_artwork`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `component_embroidery_color`
--
ALTER TABLE `component_embroidery_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `component_product_color`
--
ALTER TABLE `component_product_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `discount_coupon`
--
ALTER TABLE `discount_coupon`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `internal_status`
--
ALTER TABLE `internal_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `order_artwork`
--
ALTER TABLE `order_artwork`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `order_files`
--
ALTER TABLE `order_files`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `order_internal_status`
--
ALTER TABLE `order_internal_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `order_shipping_detail`
--
ALTER TABLE `order_shipping_detail`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `order_tax_details`
--
ALTER TABLE `order_tax_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;

--
-- AUTO_INCREMENT for table `product_baseimages`
--
ALTER TABLE `product_baseimages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=427;

--
-- AUTO_INCREMENT for table `product_delivery`
--
ALTER TABLE `product_delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product_printing`
--
ALTER TABLE `product_printing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_seo`
--
ALTER TABLE `product_seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=214;

--
-- AUTO_INCREMENT for table `product_volume_discount`
--
ALTER TABLE `product_volume_discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=894;

--
-- AUTO_INCREMENT for table `temp_cart_images`
--
ALTER TABLE `temp_cart_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tps_tax_price`
--
ALTER TABLE `tps_tax_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tvq_tax_price`
--
ALTER TABLE `tvq_tax_price`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_printing_id_foreign` FOREIGN KEY (`printing_id`) REFERENCES `product_printing` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cart_artwork`
--
ALTER TABLE `cart_artwork`
  ADD CONSTRAINT `cart_artwork_cart_id_foreign` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_discount` FOREIGN KEY (`discount_id`) REFERENCES `discount_coupon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_artwork`
--
ALTER TABLE `order_artwork`
  ADD CONSTRAINT `order_artwork_order_item_id_foreign` FOREIGN KEY (`order_item_id`) REFERENCES `order_items` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_files`
--
ALTER TABLE `order_files`
  ADD CONSTRAINT `order_files_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_internal_status`
--
ALTER TABLE `order_internal_status`
  ADD CONSTRAINT `order_internal_status_internal_status_id_foreign` FOREIGN KEY (`internal_status_id`) REFERENCES `internal_status` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `order_internal_status_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `product_color` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_printing_id_foreign` FOREIGN KEY (`printing_id`) REFERENCES `product_printing` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_shipping_detail`
--
ALTER TABLE `order_shipping_detail`
  ADD CONSTRAINT `order_shipping_detail_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_tax_details`
--
ALTER TABLE `order_tax_details`
  ADD CONSTRAINT `order_tax_details_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `brand_fk` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `category_fk` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_baseimages`
--
ALTER TABLE `product_baseimages`
  ADD CONSTRAINT `product_baseimages_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_color`
--
ALTER TABLE `product_color`
  ADD CONSTRAINT `product_color_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_seo`
--
ALTER TABLE `product_seo`
  ADD CONSTRAINT `product_seo_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `product_volume_discount`
--
ALTER TABLE `product_volume_discount`
  ADD CONSTRAINT `product_pricing_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
