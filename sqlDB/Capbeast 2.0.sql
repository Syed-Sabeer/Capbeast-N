-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 28, 2025 at 09:05 AM
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
(31, 'champion', NULL, 'categories/TX4NqrypDkst9f2kn3HTuGVwS3FzffwZtdIp37Uk.png', 1, '2025-03-25 13:05:01', '2025-03-26 13:14:57'),
(32, 'Richardson', NULL, 'categories/6fFCukgG7phO7iFcZXl6a5ImpENdDoV4wQBj40oI.jpg', 1, '2025-03-27 14:16:44', '2025-03-28 14:07:14');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(255) DEFAULT NULL,
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
(22, 'Bucket Hats', NULL, 'categories/QSdFoeER6YZlGUnALg3IcFUavAmhj1d87TXDBkzD.jpg', 1, '2025-03-24 10:55:24', '2025-03-28 14:09:05'),
(23, 'Snapbacks', NULL, 'categories/UeODSkzE1sv1vTRn3JmQXdkgLIytVQnSRvwMWcdW.jpg', 1, '2025-03-24 11:40:42', '2025-03-28 14:10:12'),
(24, 'Beanies Blowout', NULL, 'categories/JHkeOfoq58JDHVIVlz0Nog9KA143tiN3jLiUy1Q0.png', 1, '2025-03-24 14:25:45', '2025-03-28 14:10:23'),
(25, 'Fitted Hats', NULL, 'categories/WVxFEFaAcKUY6RGZqbJsjXxD24gvRD1aiHc2m8g3.jpg', 1, '2025-03-24 15:27:37', '2025-03-28 14:08:37'),
(26, 'Custom Baseball Hats', NULL, 'categories/tp8OvV3kco8ajHeBmcRRyrNEL37DS5i6urNuqzQE.jpg', 1, '2025-03-25 11:45:45', '2025-03-28 14:10:33'),
(27, 'Cyber Monday Deals', NULL, 'categories/C2yaxOrRKGclS4MkzgtQNlR2n5x5vwmVzT9TOb5P.png', 1, '2025-03-25 14:31:32', '2025-03-28 14:13:39'),
(28, 'Military Hats', NULL, 'categories/vcLFtJMt3SF8mqrR774BR82Rm5Q9x2QzVrjMylQi.jpg', 1, '2025-03-26 11:28:10', '2025-03-28 14:11:33'),
(29, 'Tie-Dye Hats', NULL, 'categories/emdtcl5wBlcHxECKswVS1AzZvgvsCFohyn9TuwQ9.jpg', 1, '2025-03-26 11:52:15', '2025-03-28 14:11:58');

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
-- Table structure for table `mlb`
--

CREATE TABLE `mlb` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `visibility` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mlb`
--

INSERT INTO `mlb` (`id`, `title`, `description`, `image`, `visibility`, `created_at`, `updated_at`) VALUES
(2, 'Atlanta Braves', NULL, NULL, 1, '2025-03-27 23:26:57', '2025-03-27 23:26:57'),
(3, 'Boston Red Sox', NULL, NULL, 1, '2025-03-28 02:47:22', '2025-03-28 02:47:22'),
(4, 'Chicago Cubs', NULL, NULL, 1, '2025-03-28 02:47:54', '2025-03-28 02:47:54'),
(5, 'Chicago White Sox', NULL, NULL, 1, '2025-03-28 02:48:10', '2025-03-28 02:48:10'),
(6, 'Cincinnati Reds', NULL, NULL, 1, '2025-03-28 02:48:25', '2025-03-28 02:48:25'),
(7, 'Colorado Rockies', NULL, NULL, 1, '2025-03-28 02:49:30', '2025-03-28 02:49:30'),
(8, 'Detroit Tigers', NULL, NULL, 1, '2025-03-28 02:49:55', '2025-03-28 02:49:55'),
(9, 'Florida Marlins', NULL, NULL, 1, '2025-03-28 02:50:27', '2025-03-28 02:50:27'),
(10, 'Kansas City Royals', NULL, NULL, 1, '2025-03-28 02:50:42', '2025-03-28 02:50:42'),
(11, 'Los Angeles Dodgers', NULL, NULL, 1, '2025-03-28 02:51:10', '2025-03-28 02:51:10'),
(12, 'Montreal Expos', NULL, NULL, 1, '2025-03-28 02:51:41', '2025-03-28 02:51:41'),
(13, 'Minnesota Twins', NULL, NULL, 1, '2025-03-28 02:52:08', '2025-03-28 02:52:08'),
(14, 'Milwaukee Brewers', NULL, NULL, 1, '2025-03-28 02:52:31', '2025-03-28 02:52:31'),
(15, 'New York Mets', NULL, NULL, 1, '2025-03-28 02:52:47', '2025-03-28 02:52:47'),
(16, 'New York Yankees', NULL, NULL, 1, '2025-03-28 02:53:05', '2025-03-28 02:53:05'),
(17, 'Oakland Athletics', NULL, NULL, 1, '2025-03-28 02:53:26', '2025-03-28 02:53:26'),
(18, 'Philadelphia Phillies', NULL, NULL, 1, '2025-03-28 02:53:44', '2025-03-28 02:53:44'),
(19, 'Pittsburgh Pirates', NULL, NULL, 1, '2025-03-28 02:54:03', '2025-03-28 02:54:03'),
(20, 'San Diego Padre', NULL, NULL, 1, '2025-03-28 02:54:19', '2025-03-28 02:54:19'),
(21, 'San Francisco Giants', NULL, NULL, 1, '2025-03-28 02:54:39', '2025-03-28 02:54:39'),
(22, 'St. Louis Cardinals', NULL, NULL, 1, '2025-03-28 02:54:54', '2025-03-28 02:54:54'),
(23, 'Toronto Blue Jays', NULL, NULL, 1, '2025-03-28 02:55:18', '2025-03-28 02:55:18'),
(24, 'Washington Nationals', NULL, NULL, 1, '2025-03-28 02:55:38', '2025-03-28 02:55:38'),
(25, 'Baltimore Orioles', NULL, NULL, 1, '2025-03-28 02:55:56', '2025-03-28 02:55:56'),
(26, 'Seattle Mariners', NULL, NULL, 1, '2025-03-28 02:56:09', '2025-03-28 02:56:09'),
(27, 'Cleveland Indians', NULL, NULL, 1, '2025-03-28 02:56:29', '2025-03-28 02:56:29'),
(28, 'Los Angeles Angels', NULL, NULL, 1, '2025-03-28 02:56:50', '2025-03-28 02:56:50');

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
  `brand_id` bigint(20) UNSIGNED DEFAULT NULL,
  `mlb_id` bigint(20) UNSIGNED DEFAULT NULL,
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

INSERT INTO `products` (`id`, `brand_id`, `mlb_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(29, NULL, NULL, 'Tie Dye Bucket Hat', 'tie-dye-bucket- hat', 'This Tie Dye custom Bucket Hat is the perfect accessory for your spring and summer wardrobe. made from 100% cotton which makes it durable and comfortable to wear. At the back of the hat is an adjustable strap closure that makes it the perfect fit for all head sizes. The personalized tie-dye hat has a low profile, and an unstructured design that makes it great for embroidered designs. The interior of the hat has a built-in sweatband that makes this hat comfortable to wear even in the warmest weather. Create your own custom embroidered bucket hats using the CapBeast hat maker. Upload your design or add custom stitched text to make the perfect hat, with no minimum order sizes. Features · Unisex design · 100% cotton material · Unstructured design · Sewn eyelets · No minimums · Custom Embroidered', NULL, 29.00, 1, '2025-03-24 11:58:53', '2025-03-24 11:58:53', NULL),
(30, 25, NULL, 'Black Bucket Hat | Sportman', 'black-bucket-hat-sportman', 'The black bucket hat by Sportman is made from 100% cotton material. It’s bio-washed chino twill makes it lightweight, comfortable, and environmentally friendly. The material is also sweat-wicking and easy to maintain. This custom embroidered hat has an unstructured design that ensures it can be folded and stored in a pocket or bag. It has a unisex design that makes it suitable for both men and women. The custom bucket hat has a black color that will enable it to go with most of your outfits. It has sewn eyelets that add to its breathability. Create your own by using the CapBeast custom hat maker. Stitch your design or catchphrase on your hat to make it a one-of-a-kind hat that will be sure to turn heads. Features · Bio-washed chino twill · Made of Eyelet design · Unstructured · Customizable · No Minimums', NULL, 28.00, 1, '2025-03-24 12:09:02', '2025-03-27 13:51:34', NULL),
(31, NULL, NULL, 'Purple Passion Tie Dye Bucket Hat', 'purple-passion-tie-dye-bucket-hat', 'This purple passion tie-dye bucket hat has a vibrant, casual, and trendy look that will make you stand out from the crowd. It’s made of 100% cotton which makes it very comfortable to wear. The hat has a short brim that helps to protect you from UV rays. This custom embroidered hat has eyelets that allow fresh air to cool your head. It’s machine washable, and is one size fits all. The personalized tile dye hat features an unstructured design that makes it collapsible and foldable. It can also be washed regularly without losing its form. Design your own hat using the custom hat maker tool. Upload your logo or design and we will turn it into a unique one-of-a-kind hat. Features · Made of cotton material · Sewn eyelets · Unstructured design · Design your own · No minimums · Custom Embroidered', NULL, 29.00, 1, '2025-03-24 12:16:27', '2025-03-24 12:16:27', NULL),
(32, NULL, NULL, 'Raspberry Mist Tie Dye Bucket Hat', 'raspberry-mist-tie-dye-bucket-hat', 'This Raspberry mist tie-dye bucket hat is made of 100% cotton material making it comfortable and lightweight. It’s a good choice for protecting you from harmful UV rays. The custom bucket hat has a low profile and an unstructured design that provides a comfortable and secure fit all the time. It has an easy-to-wear and comfortable casual shape that makes it your perfect outdoor companion. The hat comes with sewn eyelets that will keep you cool in the summer heat. This personalized tie-dye hat can be easily packed in your bag. It’s beautiful, stylish, and timeless. It will add a fashion flair to your style. Designing your custom embroidered hat has never been easier with our hat maker tool. Simply upload your logo and we will create a custom embroidered bucket hat that is unique to you. No minimums. Features · 100% cotton material · Sewn eyelets · Tie & dye prints · Unstructured design · Customize your design · No minimums', NULL, 29.00, 1, '2025-03-24 12:23:20', '2025-03-24 12:23:20', NULL),
(33, NULL, NULL, 'Sky Tie Dye Bucket Hat', 'sky-tie-dye -bucket-hat', '<p>This Sky Tie Dye Custom Bucket Hat is made of 100% cotton that is soft, comfortable, and breathable. It has an unstructured design which helps the hat to keep it’s shape, even after it has been washed. The personalized cap has sewn eyelets to help keep your head cool in the summer heat, and has a unisex design that makes it suitable for both men and women. This custom hat will add a casual look in a fun and fashionable way. It’s the perfect accessory for any outfit. Design your own bucket hat using the Capbeast custom hat maker. Features · Cotton material · Sewn eyelets · Create your own · Unstructured design · Option to customize · No minimums</p>', NULL, 29.00, 1, '2025-03-24 12:28:28', '2025-03-27 16:02:54', NULL),
(34, NULL, NULL, 'Cotton Candy Tie Dye Bucket Hat', 'cotton-candy-tie-dye-bucket-hat', 'The cotton candy tie dye bucket hat is made of a twill cotton material that makes it comfortable, breathable, and fade-proof. It features a stylish unstructured design and a low profile that makes it a good choice for all head sizes. The custom hat has sewn ventilation eyelets that provide breathing space for your head. It offers ample protection while making you look smart and trendy. The bucket hat has a stylish tie-dye design to help you stand out from the crowd. The bucket design is a good choice for protecting you from the sun. It’s sun-proof, sweatproof, and has an odor-fighting function, ensuring your all-day comfort. Design your own custom hat with the CapBeast hat maker. Upload your logo, design or text to create a one of a kind embroidered hat that features your brand. Features · 100% cotton material · Unstructured design · Eyelets · Flat top · Create your own design · Custom embroidered · No minimums', NULL, 29.00, 1, '2025-03-24 12:34:43', '2025-03-24 12:34:43', NULL),
(35, NULL, NULL, 'Ocean Tie Dye Bucket Hat', 'ocean-tie-dye-bucket-hat', 'This Ocean Tie Dye Bucket hat is a must-have accessory in your wardrobe. It’s made from 100% cotton material which makes it the perfect choice for outdoor activities. The cap has eyelets on its brim that allows air to cool your head. This personalized bucket hat features a short brim and flat top that makes it suitable for all head sizes. It has an unstructured design that makes it foldable and packable in a bag. Our custom embroidered hat is perfect for people of all ages who want to look stylish in any weather. Personalize your own bucket hat by using the Capbeast custom hat maker. Features · Made of cotton material · Sewn eyelet · Unstructured design · Design Your Own · Flat top structure · Custom embroidered · No minimums', NULL, 29.00, 1, '2025-03-24 12:43:52', '2025-03-24 12:43:52', NULL),
(36, 25, NULL, 'White Bucket Hat | Sportman', 'white-bucket-hat-sportman', 'This white bucket hat gives a retro look and feel that matches almost any outfit. Made of soft Bio-washed chino twill, it’s comfortable and durable. The cotton material is also soft and lightweight. The cap is one size fits all and comes with sewn eyelets that make the hat breathable, and quick-drying. It features a collapsible non-structured material that makes it easy to fold and fit in your bag or pocket. Create your own with the custom hat maker. Features · Sewn eyelet · Bio-washed chino twill · Unstructured design · Custom embroidered · White in color · No minimums', NULL, 28.00, 1, '2025-03-24 12:49:12', '2025-03-27 13:54:10', NULL),
(39, 25, NULL, 'Gray Bucket Hat | Sportman', 'Grey-bucket-hat-sportman', 'The gray Custom Bucket Hat from Sportsman is made from 100% chino twill material. Made to withstand harsh outdoor elements such as sun, rain, and snow. It comes with stitched eyelets that make it breathable. The cap has a fairly deep crown that ensures a perfect fit. Its brim is wide enough to provide cover from the harsh UV rays. It has a toned-down gray color that enables it to match most outfits. The hat is flexible, foldable, and provides a casual, fun, and upbeat mood. With its comfortable and lightweight material, it\'s a must-have accessory in your wardrobe. This custom bucket hat is unisex and has a stylish design. Features · Sewn eyelet · unstructured design · 100% bio-washed chino twill material', NULL, 28.00, 1, '2025-03-24 14:01:48', '2025-03-27 14:01:08', NULL),
(40, 25, NULL, 'Royal Bucket Hat | Sportman', 'royal-bucket-hat-sportman', 'With its wide brim, this Royal bucket hat is the best choice for protecting you from the harsh sun and wind. It’s made of bio-washed chino twill material that makes it durable, fade-resistant, and able to withstand the outdoor environment. The custom bucket features sewn in eyelets that adds to its breathability. With its unstructured design, it can be easily folded for travel. It has a simple but classic look that can be matched with various casual wear and denim. Design your own by uploading your logo or text in our hat maker. Create a one-of-a-kind custom embroidered hat that will be sure to turn heads. Features · Material: bio-washed chino twill material · Sewn eyelet · Lightweight and comfortable · unstructured design', NULL, 28.00, 1, '2025-03-24 14:07:39', '2025-03-27 14:01:28', NULL),
(41, 25, NULL, 'Red Bucket Hat | Sportman', 'red-bucket-hat-sportman', 'With its wide brim, this Royal bucket hat is the best choice for protecting you from the harsh sun and wind. It’s made of bio-washed chino twill material that makes it durable, fade-resistant, and able to withstand the outdoor environment. The custom bucket features sewn in eyelets that adds to its breathability. With its unstructured design, it can be easily folded for travel. It has a simple but classic look that can be matched with various casual wear and denim. Design your own by uploading your logo or text in our hat maker. Create a one-of-a-kind custom embroidered hat that will be sure to turn heads. Features · Material: bio-washed chino twill material · Sewn eyelet · Lightweight and comfortable · unstructured design', NULL, 28.00, 1, '2025-03-24 14:11:06', '2025-03-27 14:01:47', NULL),
(49, 27, NULL, 'Retro 2 tone trucker hat | Yupoong', 'retro-2-tone-trucker-hat-yupoong', 'Bring the 90s back with this retro 2 tone Yupoong trucker hat. Featuring a classic contrast trucker mesh back and permacurv visor.', NULL, 34.00, 1, '2025-03-24 16:03:17', '2025-03-27 14:02:07', NULL),
(50, 30, NULL, 'Camo 9Fifty snapback | New Era', 'camo-9-Fifty-snapback-new-era', 'The Camo 9Fifty snapback from New Era is a must have streetwear accessory for all ages. It features a structured front panel, offering a high profile frame along with premium stability. To offer a flawless fit, the open back is equipped with a snap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom camo 9Fifty snapback for yourself, with the help of our very own custom hat maker. Use it to add your logo, graphics or text to create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-24 16:07:45', '2025-03-27 14:02:29', NULL),
(51, 27, NULL, 'Neon Snapback | Yupoong', 'neon-snapback- yupoong', 'The Neon snapback hat by Yupoong has a classic 6 panel design that features fan adjustable plastic strap on the back, a flat brim and a full crown profile. The button on the top of the hat is the same color as the hat itself, and so is the stitching. Materials: The Yupoong snapback is made from 80% Acrylic / 20% Wool. It has a bit of a heavier feel to the material, It breathes extremely well and is machine washable. Size & Fit: The Yupoong snapback is fully adjustable up to 24 ¼ inches, which means it fits most head sizes.', NULL, 30.00, 1, '2025-03-24 16:15:45', '2025-03-27 14:03:25', NULL),
(52, 27, NULL, 'Classic trucker hat with white front panel | Yupoong', 'classic-trucker-hat-with-white-front-panel -yupoong', 'The Classic trucker hat from Yupoong features a structured white front panel that is made from a 65/35 Polyester-Cotton blend material. It\'s large crown height (3.5 inches) gives it a large surface area making it a great hat for customization. It has a flat brim that can be manually curved and a snapback enclosure giving it a one size fits all fit. The undervisor of the hat matches the color of the brim.', NULL, 34.00, 1, '2025-03-24 16:26:27', '2025-03-27 14:04:01', NULL),
(53, 27, NULL, 'Melton Wool snapback | Yupoong', 'melton- wool- snapback- yupoong', 'The Melton Wool Snapback from Yupoong features a classic shape, identical to the Classic Snapback we offer. The key difference is the material as this snapback features a fresh and premium melton wool blend. Includes a matching plastic snap and six panel arrangement making it a perfect choice for your next custom hat. Other key features of this hat are the green under brim, white sweatband and the 7 position snap closure. The material composition is 50% wool, 30% acrylic and 20% nylon.', NULL, 34.00, 1, '2025-03-24 16:31:01', '2025-03-27 14:04:23', NULL),
(54, 27, NULL, 'Poplin golf snapback | Yupoong', 'poplin-golf-snapback- yupoong', 'The Yupoong poplin golf snapback sports 4 rows of stitching on the visor and a 60% cotton and 40% polyester blend material. The unique look features a ¼” thick braid on the visor along with a classic five panels. The front panel has no seams, making it a smooth surface for custom embroidery. This tone-on-tone snapback is a CapBeast favorite for it\'s retro styling and customization potential.', NULL, 34.00, 1, '2025-03-24 16:41:26', '2025-03-27 14:04:42', NULL),
(55, 27, NULL, 'Melton Wool snapback | Yupoong', 'melton-wool-snapback-yupoong', 'The Melton Wool Snapback from Yupoong features a classic shape, identical to the Classic Snapback we offer. The key difference is the material as this snapback features a fresh and premium melton wool blend. Includes a matching plastic snap and six panel arrangement making it a perfect choice for your next custom hat. Other key features of this hat are the green under brim, white sweatband and the 7 position snap closure. The material composition is 50% wool, 30% acrylic and 20% nylon.', NULL, 34.00, 1, '2025-03-24 16:47:42', '2025-03-27 14:05:03', NULL),
(56, 27, NULL, '2 tone camo Snapback | Yupoong', '2-tone-camo-Snapback-yupoong', 'The Yupoong 2 tone camo hat offers a classic woodland camo style visor, paired with a monochromatic color scheme for the back. Ideal for style experimentation and featuring a premium wool blend.', NULL, 34.00, 1, '2025-03-24 16:54:09', '2025-03-27 14:05:23', NULL),
(57, 27, NULL, 'Camo snapback | Yupoong', 'camo- snapback- yupoong', 'The Yupoong camo snapback offers the classic snapback style emblazoned with a classic high quality woodland military camo finish.', NULL, 34.00, 1, '2025-03-24 16:58:09', '2025-03-27 14:05:54', NULL),
(58, 30, NULL, 'Charcoal 9Fifty snapback | New Era', 'charcoal -9Fifty- snapback-new era', 'Channel your love for sports with the Charcoal personalized 9Fifty snapback from New Era. As the leading hat maker for sportspersons all across the globe, New Era brings to you a structured, 6-panel design with a flat brim. It is equipped with a convenient strapback enclosure for better adjustability. To maximize comfort, the hat uses 100% cotton twill material. Make use of our custom hat maker to add your logo, text, or graphics.', NULL, 31.00, 1, '2025-03-24 17:01:54', '2025-03-27 14:06:50', NULL),
(59, 30, NULL, 'Navy 9Fifty snapback | New Era', 'navy- 9Fifty -snapback-new-era', 'The Navy 9Fifty snapback from New Era is a street style essential for all ages. It features a structured front panel, offering a crisp shape and optimum stability. To offer a flawless fit, the open back is equipped with a strap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom 9Fifty snapback for yourself, with the help of your very own customized hat maker CapBeast. Here you can add graphics, a logo, or a design of your choice, and create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-24 17:05:43', '2025-03-27 14:07:26', NULL),
(60, 30, NULL, 'Gray 9Fifty snapback | New Era', 'gray- 9Fifty- snapback-new- era', 'New Era is regarded as one of the most prominent hat makers of the world, as their hats have been worn by numerous global sports icons. The grey custom 9Fifty snapback features a 6-panel design and a structured crown, giving the hat a neat shape. The open back of the custom cap comes with an adjustable strapback enclosure, to offer hassle-free fitting. The 100% cotton twill material ensures year-round comfort, and the minimalist design of the hat makes it a true classic. The steps for creating a personalized cap are pretty simple. Select a logo, graphics, and text that you want the hat to feature, add them to our cap maker.', NULL, 31.00, 1, '2025-03-24 17:09:31', '2025-03-27 14:07:50', NULL),
(61, 30, NULL, 'Camo & Black Trucker hat | New Era', 'camo & black- trucker- hat -new -era', 'The New Era Camo Trucker Hat ensures a perfect fit, thanks to the adjustable snapback closure. It comes with a cotton twill front panel and a polyester mesh mid and back panels, making way for convenient air circulation. The 5-panel design of the New Era trucker hat is complemented by its superior built and durability. With the help of CapBeast, now it\'s possible for you to possess a custom trucker hat that actually has your own logo on it. Choose a logo for yourself, add it to our interface, and watch how we embroider the same onto the cap. The custom New Era Hat awaits you, hurry up.', NULL, 36.40, 1, '2025-03-24 17:15:21', '2025-03-27 14:08:34', NULL),
(62, 30, NULL, 'Scarlet & Black Trucker hat | New Era', 'scarlet & black- trucker- hat-new- era', 'The classic combination of your favorite colors finds its way in this Black & Red Trucker Hat from New Era. Equipped with a snapback enclosure, the hat ensures an easy and comfortable fit. The mesh panels make room for better air circulation, making this New Era Hat an ideal choice for summers. Featuring a 5-panel design, this versatile cap can be worn by everyone, irrespective of their age or gender. If you want to add a personalized element to your cap, CapBeast gives you the option to create your custom trucker hat. For that, you have to give us the details of your choice of logo, and we would create embroidery on top of your cap. Place an order with CapBeast, and make the custom New era hat your own.', NULL, 36.40, 1, '2025-03-24 17:20:01', '2025-03-27 14:11:16', NULL),
(63, 30, NULL, 'Chocolate & Khakhi Trucker hat | New Era', 'chocolate & khakhi -trucker- hat-new- era', 'The smart and versatile Chocolate and Khaki Trucker Hat from New Era is a summer accessory that takes care of your comfort. Featuring 100% polyester mesh mid and back panels, and a front panel made out of cotton twill, this cap leaves ample room for air circulation. This 5-panel New Era Hat comes with a snapback closure, allowing ease of use. Thanks to CapBeast, now you can create a custom New Era hat for yourself that bears a logo and graphics of your choice. Add them to our interface, and our experts will get them embroidered on top of your cap. So place an order, and gear up to sport your custom trucker hat.', NULL, 36.40, 1, '2025-03-24 18:53:17', '2025-03-27 14:12:09', NULL),
(64, 30, NULL, 'Deep navy & White Trucker hat | New Era', 'deep- navy & white- trucker- hat-new- era', 'Featuring the all-time favorite color combination, the Navy and White Trucker Hat from New Era is an essential summer accessory. It features an adjustable snapback enclosure for better fitting. The polyester mesh mid and back panels are there to allow free flow of air so that your comfort doesn\'t have to be compromised. The simple and versatile 5-panel design of this New Era Trucker Hat has turned it into a timeless piece that never loses its utility. Now with CapBeast by your side, you can create a custom trucker hat that carries your personalized logo or text. Simply add your graphic or text to our interface, and our experts will have them embroidered on the caps to give them a unique look. So create your custom New Era Hat today.', NULL, 36.40, 1, '2025-03-24 18:58:32', '2025-03-27 14:13:09', NULL),
(65, 30, NULL, 'Graphite & Black Trucker hat | New Era', 'graphite & black-trucker-hat-new-era', 'Want to sport a custom trucker hat this summer? Take a look at the Graphite and Black Trucker Hat from New Era– it is versatile, comfortable, and can be customized as per your request. This New Era hat comes with an adjustable snapback closure so that it can fit well on your head. The front panel is made of 100% cotton twill while the mid and back panels are made of a polyester mesh, and allow better airflow. Available in a classic color combination, this 5-panel hat is a simple yet useful accessory, suitable for people of all ages. Now if you want to create your own custom New Era hat, all you have to do is upload a logo on our interface. CapBeast would turn it into embroidery, and present you with your custom trucker hat bearing your personalized logo.', NULL, 36.40, 1, '2025-03-24 19:41:43', '2025-03-27 14:13:22', NULL),
(66, 30, NULL, 'Kelly green & White Trucker hat | New Era', 'kelly- green & White- trucker- hat-new- era', 'The Kelly Green and White New Era Hat features a front panel made of pure cotton twill and a mid and back panel made of 100% polyester mesh for better air circulation. As you put on this cap, you can expect optimum comfort and a perfect fit, owing to the adjustable snapback closure. Designed with 5 panels, this New Era Trucker Hat is an essential accessory that not only keeps your hair and eyes protected but also leaves room for personalization. With CapBeast, now you can create a custom trucker hat, embellished with an embroidered logo of your choice. Upload your text and graphics to our interface, and together let\'s make a custom New Era hat for you.', NULL, 36.40, 1, '2025-03-24 19:54:24', '2025-03-27 14:13:39', NULL),
(67, 30, NULL, 'Royal & White Trucker hat | New Era', 'royal & white -trucker- hat-new- era', 'Crafted with 100% cotton twill, this New Era Trucker Hat is a comfortable accessory for all seasons. The middle and back panels feature a premium polyester mesh design, making them stand out from any other regular caps. This 5-panel New Era hat is equipped with an adjustable snapback closure, ensuring proper fitting for everyone. This one is available in a classic royal and white color. If you\'re looking for personalization, you can create a custom New Era hat by adding your logo, text, or graphics into our design interface, and we would get them embroidered on the hat. Your custom trucker hat is just a few steps away, so order yours today.', NULL, 36.40, 1, '2025-03-24 20:05:21', '2025-03-27 14:13:51', NULL),
(68, 30, NULL, 'Black Trucker hat | \'47 Brand', 'black -trucker -hat -47 brand', 'The \'47 Brand\'s Black Trucker Hat is the epitome of sophistication. It\'s simple, stylish, and ensures that your comfort doesn\'t have to be compromised. The 100% washed-cotton renders a soft touch to this cap, and the strapback design leads way to a good fit. The relaxed and curved bill design makes this cap a favorite for every season. If you want to personalize this cap to sport a unique look, CapBeast is here to help. Let us know the text and logo that you’d like to add to it, and we will embroider it for you. With a 100% guarantee of premium quality, your custom 47 brand trucker hat is just a few clicks away.', NULL, 34.00, 1, '2025-03-24 20:12:23', '2025-03-27 14:14:59', NULL),
(69, 28, NULL, 'Navy Trucker hat | \'47 Brand', 'navy- trucker- hat -47- brand', 'A cool cap not only breathes life into your daily look, but it\'s also a great accessory to keep you guarded against extreme weather. The Navy Trucker Hat from the \'47 Brand is an ideal choice for anyone looking for a sleek looking cap. Thanks to the high-quality washed-cotton material, the cap is soft to touch. Because of the strapback design and relaxed build, this one offers a perfect fit. To help you create a custom trucker hat, CapBeast offers personalization on all 4 sides of this cap. Add a logo and the text that you prefer, and we will get it embroidered on the cap, with premium quality assured. Place an order and get your personalized custom trucker hat today.', NULL, 34.00, 1, '2025-03-24 20:17:33', '2025-03-27 14:15:23', NULL),
(70, 28, NULL, 'Red Trucker hat | \'47 Brand', 'red- trucker- hat -47 -brand', 'Get yourself a custom trucker hat, and you\'re sorted for all seasons– be it winter or fall. Thanks to CapBeast, you can add a personalized text and logo to your Red Trucker Hat. This cap is crafted from pure washed cotton, making it soft and comfortable for everyday wear. With a strapback design and a relaxed fit, this cap is a must-have for every hat lover out there. Insert text and graphics on the interface, and get a customized logo embroidered on the cap. It\'s that easy to own a cap of your own brand.', NULL, 34.00, 1, '2025-03-24 20:21:46', '2025-03-27 14:15:36', NULL),
(71, 32, NULL, 'Green & Tan 112 Trucker hat | Richardson', 'green & tan -112 -trucker -hat-richardson', 'Available in a cool combination of olive green and tan, this custom Richardson 112 trucker hat is a versatile accessory for all occasions– whether it\'s a regular workday or you\'re headed to a sports match. This structured, mid-profile hat features a 5-panel design. The backside of the cap is made of 100% polyester mesh for adding a stylish touch. Now, if you\'re interested in owning custom Richardson 112 hats, CapBeast is here for you. Add your text, graphics, or logo to our hat maker and we will have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-24 20:29:53', '2025-03-27 14:17:23', NULL),
(72, 32, NULL, 'Black & white 112 Trucker hat | Richardson', 'black & white- 112- trucker- hat-richardson', 'Available in the unbeatable combination of black and white, this Richardson 112 trucker hat takes comfort and versatility to the next level. As the maker of premium hats for over five decades, Richardson promises great quality and a superior fit. Made of a 60/40 blend of cotton and polyester, this hat features a 100% polyester mesh back. This mid-profile Richardson hat comes with a 5-panel structured design and an adjustable snapback for comfortable fitting. If you want to own custom Richardson 112 hats with your personal logo and texts embossed on top, CapBeast can help you out. Insert your choice of graphics into our design interface, and we would have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-24 20:34:36', '2025-03-27 14:17:57', NULL),
(73, 32, NULL, 'Charcoal & White 112 Trucker hat | Richardson', 'charcoal & white -112- trucker- hat- richardson', 'The Charcoal and White Richardson 112 Trucker hat is a must-have in your cap collection. Featuring a mesh back design, this 5-panel mid-profile hat is all about versatility. Made of cotton and polyester, this Richardson hat offers comfort throughout all seasons. Thanks to the adjustable snapback design, you can expect a perfect fitting every time. If you\'re interested in custom Richardson 112 hats, CapBeast is here to create one for you. Insert a logo, text, and graphics into our design interface, and we would embroider them on your Richardson hat. Customize with CapBeast, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-24 20:41:00', '2025-03-27 14:18:30', NULL),
(74, 32, NULL, 'Heather gray & Amber 112 Trucker hat | Richardson', 'heather -gray & amber -112 -trucker -hat-richardson', 'The unique combination of heather gray and gold renders a timeless touch to this Richardson trucker hat. Featuring a 5-panel structured design, this mid-profile Richardson hat is not only comfortable but also versatile. Made of cotton and polyester with a mesh design at the back, it keeps you comfortable throughout all seasons. It comes with a plastic snapback that can be adjusted at your convenience to achieve the perfect fitting. Owning custom Richardson hats has never been easier. With CapBeast, all you have to do is insert your choice of text, graphics, and logo into our hat maker and we will do the rest.', NULL, 34.00, 1, '2025-03-24 20:49:02', '2025-03-27 14:18:46', NULL),
(75, 32, NULL, 'Heather gray & Black 112 Trucker hat | Richardson', 'heather -gray & black -112 -trucker -hat -richardson', 'The Heather Gray & Black Richardson 112 trucker hat features a 5-panel structured design and comes with a comfortable plastic snapback for a perfect fit. The cotton and polyester blend makes it a suitable accessory for all seasons, with the backside made of pure polyester mesh. Thanks to the simple yet versatile design of this Richardson hat, they can be worn by people of all ages. Now personalizing your hat is easier than ever. With CapBeast, you can create a custom trucker hat that carries your logo, text, and graphics.', NULL, 34.00, 1, '2025-03-24 20:55:10', '2025-03-27 14:18:54', NULL),
(76, 32, NULL, 'Ombre blue & Navy 112 Trucker hat | Richardson', 'ombre -blue & Navy -112 -trucker-hat-richardson', 'The Blue & Navy Richardson 112 Trucker is versatile headwear you can rely on for all seasons and all occasions. Made of a cotton and polyester blend, this Richardson hat features a mesh design at the back. The structured design of this 5-panel hat gives it a clean and polished look. Thanks to the adjustable plastic snapback, it fits your head comfortably. Personalize your using our online hat maker.', NULL, 34.00, 1, '2025-03-24 21:14:21', '2025-03-27 14:19:51', NULL),
(77, 32, NULL, 'Black Seven panel trucker hat | Richardson', 'black-seven-panel-trucker-hat-richardson', 'The classic Black Richardson Seven panel trucker hat is made of cotton, nylon, and polyester, with the backside featuring a mesh design made of pure polyester. This high-profile, structured Richardson hat has been designed for everyday use, ensuring utmost comfort every time you put this on. This convenient headwear features a snapback design, ensuring a seamless fit. Want to sport custom Richardson hats? CapBeast is here to help. Input your choice of text, logo, graphics, etc. to our user interface, and allow us to embroider them into your hat. With us, you are just a few clicks away from owning a custom trucker hat. Place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-24 21:19:05', '2025-03-27 14:19:58', NULL),
(78, 32, NULL, 'Brown & khakhi Seven panel trucker hat | Richardson', 'brown & khakhi -seven -panel -trucker -hat -richardson', 'The beautiful combination of brown and khaki renders a unique appeal to the Richardson seven-panel trucker hat. Featuring a structured design and a flat bill, this hat comes with a polyester mesh back. The front section of the cap is made out of a blend of cotton, nylon, and polyester. This Richardson hat has a strapback enclosure for better fitting. CapBeast is here to help you create custom Richardson hats. Tell us in detail about the logo and the text you want to add to your hat, and well will get them embroidered on the cap. Your custom trucker hat is waiting for you– place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-25 11:13:38', '2025-03-27 14:20:11', NULL),
(80, 32, NULL, 'Charcoal & black Seven panel trucker hat | Richardson', 'charcoal & black -seven -panel -trucker -hat -richardson', 'Available in a combination of charcoal and black, the Richardson seven-panel trucker hat is a classic choice. Made of cotton, nylon, and polyester, this structured, high-profile Richardson hat is extremely comfortable. The adjustable snapback enclosure ensures perfect fitting for everyone. If you want to break the monotony of this simple hat, CapBeast has a great solution for you. Use the empty canvas on the hat for personalization. Add your choice of logo, text, or graphics, and make this custom trucker hat truly yours. With us, making custom Richardson hats is easier than you could ever imagine. So place an order, today.', NULL, 34.00, 1, '2025-03-25 11:54:43', '2025-03-27 14:20:18', NULL),
(82, 32, NULL, 'Heather gray & Black Seven panel trucker hat | Richardson', 'heather gray & black -seven -panel -trucker- hat -richardson', 'The Heather Gray and Black Richardson seven-panel trucker hat is a classic accessory for all seasons. A favorite choice for people of all generations, this Richardson hat is made of cotton, nylon, and polyester blend, with the backside featuring a polyester mesh design. This structured, high-profile cap features a flat bill and a snapback enclosure for optimum convenience. To add your own creativity into these hats, you can take help from CapBeast. Use our design interface to input your logo, text, and graphics. Our team of designers will get them embroidered on your custom Richardson hat, with premium quality guaranteed. So place an order with CapBeast today, can get your own custom trucker hat.', NULL, 34.00, 1, '2025-03-25 12:00:26', '2025-03-27 14:20:29', NULL),
(83, 32, NULL, 'Red & Black Seven panel trucker hat | Richardson', 'red & black -seven- panel -trucker- hat -richardson', 'Available in the timeless combination of red and black, the Richardson seven-panel trucker hat is here to redefine comfort and versatility. Featuring a high-profile, structured design, this Richardson hat comes with a mesh design at the back. The front section is made of a high-quality blend to ensure breathability. The snapback enclosure ensures that it fits everyone with ease. At CapBeast, we are dedicated to creating beautifully embroidered custom trucker hats for you. All you need to do is tell us about your choice of logo/text/graphics, and wait for us to emulate them through embroidery. Creating custom Richardson hats is now easier than ever, thanks to CapBeast. So place an order with us, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-25 12:04:27', '2025-03-27 14:20:36', NULL),
(84, 32, NULL, 'Royal & Black Seven panel trucker hat | Richardson', 'royal & black -seven -panel -trucker -hat -richardson', 'The Royal & Black seven-panel trucker hat is a classic choice for all generations. The front section of the Richardson hat is made of a blend of cotton, nylon, and polyester, and the back section comes with a polyester mesh design. This high-profile, seven-panel structured hat features a flat bill, along with a convenient snapback closure for better adjustability. With CapBeast by your side, now you can create custom Richardson hats, with your own logo embossed on them. Insert a text, graphics, or logo into our design interface, and we will embroider the same on your custom trucker hat. So place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-25 12:07:49', '2025-03-27 14:20:49', NULL),
(85, 32, NULL, 'Black Low profile trucker hat | Richardson', 'black -low -profile -trucker- hat- richardson', 'Colors come and go, but the appeal of a black hat can never be diminished. The black Richardson low-profile trucker hat features a structured, six-panel design, along with a pre-curved visor. Made of a cotton-polyester blend, the back portion of the Richardson hat comes with a mesh design. It has a convenient snapback closure, making way for a perfect fit. With CapBeast, you can create a custom Richardson hat with just a few clicks. We will get your logo, graphics, and text embroidered on a cap of your choice, with premium quality guaranteed. So order your custom trucker hat, today.', NULL, 33.00, 1, '2025-03-25 12:10:58', '2025-03-27 14:22:16', NULL),
(86, 32, NULL, 'Black/Charcoal Low profile trucker hat | Richardson', 'black-charcoal -low -profile -trucker -hat -richardson', 'The Black/Charcoal Richardson low-profile trucker hats are here to offer you comfort and style at one go. Featuring a six-panel design, this structured hat comes with a mesh back design. Made with cotton and polyester blend, the cap is breathable enough to be used in all seasons. The snapback enclosure is another convenient addition, allowing a perfect fit for everyone. Now, in case you\'re interested in creating a custom Richardson hat for yourself, CapBeast is here for you. You have to follow a few simple steps to get your hands on a custom trucker hat. First, insert the logo, text, or graphics of your choice into our user interface. Then, place your order. Our team will replicate the text or logo through embroidery, and add a personalized touch to your Richardson hat.', NULL, 33.00, 1, '2025-03-25 12:16:08', '2025-03-27 14:22:24', NULL),
(87, 32, NULL, 'Black/Neon pink Low profile trucker hat | Richardson', 'black-neon- pink- low -profile- trucker -hat-richardson', 'Made of a superior cotton-polyester blend, the Black/Neon Pink Richardson low profile hat is all about comfort and versatile style. This vibrant-colored hat features a pre-curved visor, along with a snapback closure for ease of fitting. This structured, six-panel Richardson hat comes with a 100% mesh design at the back, making it stand out from any other hats you might own. Now you can design a custom Richardson hat just by following a few simple steps. Choose a logo, text, and graphics that you love, and add them to our user interface. As soon as you place an order, our team will get your logo and graphics embroidered on the cap. So place an order for a custom trucker hat, today.', NULL, 33.00, 1, '2025-03-25 12:19:34', '2025-03-27 14:22:36', NULL),
(89, 32, NULL, 'Blue teal/Birch/Navy Low profile trucker hat | Richardson', 'blue teal-birch-navy- low -profile- trucker- hat-richardson', 'Available in the Blue teal/Birch/Navy variant, this Richardson low profile trucker hat is a must-have in your headwear collection. Made of a premium blend of cotton and polyester, this hat is a comfortable choice for all seasons. It comes with a polyester mesh back, along with a snapback closure for easy fitting. This six-panel, structured Richardson hat features a pre-curved visor. If you\'re interested in creating custom Richardson hats, CapBeast is your best guide. Tell us more about your choice of logo, text, and graphics, and we would get them embroidered on top of your custom trucker hat. So place an order with us, today.', NULL, 33.00, 1, '2025-03-25 12:24:03', '2025-03-27 14:22:44', NULL),
(90, 32, NULL, 'Brown/Khakhi Low profile trucker hat | Richardson', 'brown-khakhi -low- profile- trucker- hat-richardson', 'Your everyday hat should be comfortable, reliable, and willing to go the long distance with you. The Richardson low profile trucker hat gets the job done without drawing too much attention. Made from a cotton and polyester blend, the Richardson hat features brown/khaki color combination - perfect for the long days under the sun. It\'s not just the color or the six-panel structured fit that makes it a fan favorite, the 100% polyester mesh back makes sure you stay nice and cool for a prolonged period of time. After all, the comfort brings customers back to the Richardson trucker hat every time. If you\'re still on the fence about it, know that you can truly make the custom trucker hat your own. Just let us know your preferred logo or text and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-25 12:27:48', '2025-03-27 14:22:56', NULL),
(91, NULL, NULL, 'Chocolate chip/gray Low profile trucker hat | Richardson', 'chocolate- chip-gray- low- profile -trucker- hat-richardson', 'The Richardson low profile trucker hat in chocolate chip/grey hue is ideal for people who love the outdoors. It has a structured finish that holds its shape even after long hours of wearing it. Thanks to the blend of cotton and polyester, the Richardson hat provides a comfortable experience. It fits in your head perfectly and the six-panel structure ensures you move in style. The polyester mesh back has been added to make sure sweat doesn\'t get the better of you. With the pre-curved visor, you\'re always protected from light glare and sun rays. You can not only get the comfort of Richardson hats, but also the uniqueness of custom trucker hats. We offer custom Richardson hats. All you have to do is send us your texts and patterns and see how we customize the hat for you. Place your order today.', NULL, 33.00, 1, '2025-03-25 12:32:21', '2025-03-25 12:32:21', NULL),
(92, NULL, NULL, 'Coffee/Claret Low profile trucker hat | Richardson', 'coffee-claret- low -profile- trucker- hat-richardson', 'The Richardson hat is the perfect blend of utility and comfort. Made from cotton and polyester, the hat has been designed to give you a superior feel. The structured, six-panel design of the Richardson low profile trucker hat holds its shape even after hours of rough usage. The combination of coffee and claret shades work like charm and is sure to draw some attention. The cap is both versatile and durable. Worried about excessive sweating? The polyester mesh back takes care of the heat without breaking a sweat. The custom Richardson hats come with unlimited possibilities of customization. Just tell us what you want to carry on your hat and we\'ll happily embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-25 12:37:12', '2025-03-25 12:37:12', NULL),
(93, 30, NULL, 'Beanie hat | New Era', 'beanie-hat-new-era', 'A crazy cool and ultimately laid-back style, this is the epitome of all the good things in a well-made toque. The top starts out at a fine 1x1 knit rib then gradually increases towards the bottom to a 3x3 rib knit, adding just a subtle style point.', NULL, 31.00, 1, '2025-03-25 12:40:05', '2025-03-25 12:40:05', NULL),
(95, NULL, NULL, 'Dark Loden/Jaffa Low profile trucker hat | Richardson', 'dark -loden-Jaffa -low -profile -trucker -hat-richardson', 'There\'s nothing like a good ol\' trucker hat that gets the job done without appearing too flashy. The Richardson hat in Dark Loden/Jaffa Orange color embodies the rustic nature. The Richardson low profile trucker hat is all about durability, comfort, and ease of use. You get a blend of cotton and polyester for a superior feeling and a structured, six-panel design for an easy fit. The pre-curved visor takes care of the sun for you while the polyester mesh back makes sure you stay nice and cool. The Richardson trucker hat is a utility product all right but you can still customize it to fit into your personality. You can let us know the texts or logos you want to flaunt on your hat and CapBeast will embroider it on your custom trucker hat. Place your order today.', NULL, 33.00, 1, '2025-03-25 12:46:49', '2025-03-25 12:46:49', NULL),
(96, 30, NULL, 'Pom Pom beanie | New Era', 'pom -pom-beanie-new-era', 'Snow bunnies unite! Hit the hills for an all-day snow excursion and stay warm and cozy in this Pom Pom toque. The 1x1 ribbing is double-layered and made of 100% acrylic to keep the cold winter chills out.', NULL, 31.00, 1, '2025-03-25 12:52:58', '2025-03-25 12:52:58', NULL),
(97, NULL, NULL, 'Heather gray/Birch Low profile trucker hat | Richardson', 'heather -gray-birch- low -profile -trucker- hat -richardson', 'A light-colored trucker hat with earthy shades should always be in your wardrobe. The Richardson hat is the ideal trucker hat if you\'re looking for a mix of style and durability. The Richardson low profile trucker hat is made of cotton and polyester - you get the softness of cotton and the fit of polyester. The heather grey/birch trucker hat also comes with a lighter mesh back made of polyester. It ensures you can go on with your day without worrying about excessive heat or sweat. The strapback closure bolsters the durability of the cap. You can get your Richardson hat customized to your liking. Just mention your preferred style or text and we\'ll embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-25 12:56:01', '2025-03-25 12:56:01', NULL),
(98, NULL, NULL, 'Heather gray/Dark charcoal Low profile trucker hat | Richardson', 'Heather- gray-Dark- charcoal- low- profile- trucker- hat-richardson', 'There\'s nothing like an understated trucker hat that you can wear day in day out. The Richardson hat should be the trucker hat of your choice if you value usability and comfort. The Richardson low profile trucker hat comes in a mix of heather grey and dark charcoal colors. The shades add an earthy touch to the hat while the blend of cotton and polyester takes care of the comfort. The hat also comes with a 100% polyester mesh back to make sure you stay cool and comfortable. The custom trucker hat gives you the freedom to make it uniquely yours. Tell us your favorite pattern or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-25 13:00:00', '2025-03-25 13:00:00', NULL),
(99, NULL, NULL, 'Heather Royal/Silver Low profile trucker hat | Richardson', 'heather- royal-silver- low -profile- trucker- hat-richardson', 'Having an everyday trucker hat that you can wear anywhere and for as long as you like is an absolute must. The Richardson hat in heather royal blue and silver is the perfect accessory to head out for the day. The Richardson low profile trucker hat is made of cotton and polyester. You also get a mesh back made from 100% polyester. Thanks to the structured, six-panel design, wearing the hat for a long time won\'t be an issue. The Richardson hat serves its purpose but you can customize it further to make it your own. Let us know your favorite quotes or patterns and we\'ll gladly embroider them on your custom trucker hat. Place your order now.', NULL, 33.00, 1, '2025-03-25 13:03:48', '2025-03-25 13:03:48', NULL),
(100, NULL, NULL, 'Hot pink/Black Low profile trucker hat | Richardson', 'hot- pink-black- low -profile- trucker- hat-richardson', 'Trucker hats should be about you and your personality. They should feel comfortable, and they should last long. The Richardson hat fits the bill perfectly and the hot pink and black shades come together to show your style. The Richardson low profile trucker hat is made from cotton and polyester for the utmost comfort. The 100% polyester mesh back offers proper circulation of heat and discourages sweat formation. It feels good on your head and fits even better. Features like structured, six-panel design and strapback closure make sure the hat stays on you even during hectic hours. We offer custom Richardson hats to our buyers. Just tell us your preferred logo or pattern and we\'ll have them embroidered on your custom trucker hat.', NULL, 33.00, 1, '2025-03-25 13:06:53', '2025-03-25 13:06:53', NULL),
(101, NULL, NULL, 'Loden Low profile trucker hat | Richardson', 'loden- low- profile- trucker- hat-richardson', 'Get an everyday essential in the color of the season. The Richardson hat in loden shade is the trucker hat to flaunt today. The Richardson low profile trucker hat is made of cotton and polyester. It feels good on your head and thanks to the mesh back, it keeps heat and sweat away. The structured hat keeps its shape for a long time and the strapback closure ensures a perfect fit. When it\'s too bright to go out, just wear this trucker hat and the pre-curved visor will protect you. Now get your hat customized at CapBeast. Just tell us what you want to flaunt on your hat and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-25 13:10:21', '2025-03-25 13:10:21', NULL),
(102, NULL, NULL, 'Smoke blue/Aluminum Low profile trucker hat | Richardson', 'smoke- blue-aluminum -low- profile- trucker- hat- richardson', 'Richardson Smoke Blue/Aluminum Low Profile Trucker Hat – a stylish and comfortable cap with a breathable mesh back, structured low-profile fit, and adjustable snapback closure. Perfect for casual wear and outdoor adventures!', NULL, 33.00, 1, '2025-03-25 13:17:08', '2025-03-25 13:17:08', NULL),
(104, NULL, NULL, 'White 9Fifty snapback | New Era', 'white- 9Fifty -snapback-new- era', 'Step out in style with the New Era custom 9Fifty snapback. It features the iconic sports and street style look of the classic New Era hats, but the only exception is the open back. This white 6-panel hat comes with an adjustable snapback closure, ensuring a comfortable fit. Made with 100% cotton twill, this hat keeps you company throughout all seasons. The sharp design of the hat makes you stand out from the crowd. Now you can take your love for sports culture to the next level, and design a hat. Add your logo, text, and graphics using our hat maker.', NULL, 31.00, 1, '2025-03-25 13:20:24', '2025-03-25 13:20:24', NULL),
(105, NULL, NULL, 'Black 9Fifty snapback | New Era', 'black- 9Fifty- snapback- new- era', 'The New Era Black Custom 9Fifty snapback features a 6-panel design, with a structured appearance that gives the cap a flawless shape. It comes with an open backside, with an adjustable snapback closure for precise fitting. This iconic hat is a street style essential, no matter which generation you belong to. The material is 100% premium cotton twill, ensuring equal comfort in every season. Thanks to the evergreen black color, this hat will forever retain its versatile appeal. And if you want to sport a personalized New Era, use the CapBeast hat maker to help you design a hat.', NULL, 31.00, 1, '2025-03-25 13:23:58', '2025-03-25 13:23:58', NULL),
(106, 20, NULL, 'Beanie hat | Carhartt', 'beanie-hat-carhartt', 'This classic Carhartt Beanie is a must have accessory. Carefully crafted from a high quality rib knit fabric, this beanie can now be customized with your logo or text. This beanie features the iconic Carhartt logo on the front, whit plenty of space on the sides and back for you to get creative with your design. Make your own unique custom Carhartt beanie at CapBeast.', NULL, 41.00, 1, '2025-03-25 13:24:00', '2025-03-25 13:24:00', NULL);
INSERT INTO `products` (`id`, `brand_id`, `mlb_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(107, 20, NULL, 'Knit Cuffed Beanie| Carhartt', 'knit-cuffed-beanie-carhartt', 'The Carhartt knit cuffed beanie is made from pure acrylic rib-knit material, it is a premium accessory that will bring your fashion game to another level, and it takes care of your comfort at the same time. Available in classic black & gray colors, you can style this beanie with an array of clothes, and wear it however you want. This one element is all you need to switch from a monotonous casual look to a fresh and polished street-ready style. Thanks to the stretchable fabric of the beanie, you experience supreme comfort as the high-quality material keeps your head wrapped in warmth. It carries the sewn Carhartt label on the front, with a cuffed design to keep you comfy. Create your custom Carhartt Beanie at CapBeast today, and rock an effortlessly fashionable look.', NULL, 42.00, 1, '2025-03-25 13:28:04', '2025-03-25 13:28:04', NULL),
(108, NULL, NULL, 'Multi Cam Classic Snapback | Yupoong', 'multi- cam- classic- snapback-yupoong', 'This custom baseball hat is made for the outdoor enthusiast who loves a minimalistic and subtle design. Made of cotton and spandex material, it\'s comfortable and has moisture-wicking properties. The hat features a snapback closure that makes it one size fits all. It has a high profile which makes it perfect for customization and the snapback closure makes it one size fits all. The hat has a flat brim that makes it trendy and stylish. It has a green under-visor that offers excellent protection from the sun\'s rays. At the back is a mesh material that ensures breathability. It has a sewn eyelet that helps to keep you cool in the summer heat. This customized hat is a must-have accessory for those who love the outdoors on hot days. You can create a custom baseball hat by adding your favorite logo or print on the front panel. You can do that using our CapBeast hat maker tool. Features • Made of 98% cotton and 2% spandex • High profile hat • Flat visor with green undervisor • Sewn eyelet', NULL, 27.00, 1, '2025-03-25 13:30:02', '2025-03-25 13:30:02', NULL),
(109, 29, NULL, 'Slouchy Beanie | CapBeast', 'slouchy-beanie-capbeast', 'Perfectly lightweight and slouchy, this toque is the perfect topper for those slightly chilly days. This hat is also versatile and can be worn relaxed or folded up to create a wide hem. Add embroidery to match your personal style or keep it simple. Toque is made of marl rib knit.', NULL, 34.00, 1, '2025-03-25 13:38:04', '2025-03-25 13:38:04', NULL),
(111, NULL, NULL, 'Black Flat bill cotton snapback | Yupoong', 'black- flat- bill -cotton- snapback-yupoong', 'This Black Flatbill cotton snapback is a sleek custom hat that is a must have for your wardrobe. It’s made of 100% cotton material, making it comfortable, sturdy, and durable. With a structured five-panel design, This snapback has a high-profile design that makes it suitable for pairing with most casual wear. It features a flat brim and a green under visor. The cap has sewn eyelets that keep your head cool in the summer heat. The snapback is one size fits all and can easily be adjusted the size of the cap as it comes with a custom snapback closure at the back. Design a hat using our hatmaker tool. Simply upload your text or logo and let the Capbeast tool do the rest. Features · Five-panel unstructured design · High profile · Snapback closure · Sewn eyelets · Flat bill · Custom Embroidered · No minimums', NULL, 29.00, 1, '2025-03-25 13:45:40', '2025-03-25 13:45:40', NULL),
(112, 29, NULL, 'Camo Beanie toque - 12\" | CapBeast', 'camo-beanie-toque-12\"-capbeast', 'You know the type of person you are: always outdoors, always doing something, being active, barely resting. You’ve got a lot to do and the last thing you need to worry about is if what you wear to keep warm is fashionable enough or on-trend. You need a durable and reliable knit, and this is the one. The 12” knit and fold-over hem is good for versatility and warmth.', NULL, 34.00, 1, '2025-03-25 13:45:47', '2025-03-25 13:45:47', NULL),
(113, NULL, NULL, 'Cyan/Black Low profile trucker hat | Richardson', 'cyan-black- low- profile- trucker- hat-richardson', 'If you\'re searching for a light and durable trucker hat, the Richardson hat might be the one you\'re looking for. The Richardson low profile trucker hat is made of a combination of cotton and polyester that offers both comfort and flexibility. The Richardson hat comes with a striking blend of cyan and black shades that are bold celebrations of your personality. It\'s not just the looks, the hat lives up to everything a classic trucker hat stands for. The 100% polyester mesh back quickly dissipates heat, discouraging sweat formation and keeping you cool. The snapback closure rounds off the safety features. You can make the trucker hat truly your own. Tell us your favorite logo, design, or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-25 13:49:01', '2025-03-25 13:49:01', NULL),
(114, 29, NULL, 'Camo Beanie - 8\" | CapBeast', 'camo-beanie - 8\"-capbeast', 'Grab your gear and head out to the woods with this perfect camo beanie tuque. This cotton/polyester blend knit with 8” of headroom is a great no-hassle accessory when you’re out there doing your thing in the great outdoors. Even if you’re not battling the elements, this tuque serves as a great every day winter hat as well.', NULL, 34.00, 1, '2025-03-25 13:57:19', '2025-03-25 13:57:19', NULL),
(115, NULL, NULL, 'Dark Gray Flat bill cotton snapback | Yupoong', 'dark-gray- flat -bill- cotton- snapback-yupoong', 'Made from 100% cotton twill material, this Dark Gray Flatbill cotton snapback is sturdily-made, comfortable, and durable. It has a flat brim and a green under-visor. There are sewn eyelets that help to keep you cool. At the back of the hat is a snapback closure that enables you to adjust the size of the hat for an exact fit. If you are searching for a timeless and trendy fashion accessory, this Yupoong hat is a must-have. You can pair it with all casual wear or dress it up. Desig your own hat using the Capbeast hat maker. Upload your logo or add text to create a unique personalized Yupoong hat. Features · Made of 100% cotton twill material · Sewn eyelets · Five-panel construction · Snapback closure · Design your own · Machine washable', NULL, 29.00, 1, '2025-03-25 14:00:31', '2025-03-25 14:00:31', NULL),
(116, 20, NULL, 'Knit beanie black | Carhartt', 'knit-beanie-black-carhartt', 'A killer blend of functionality and style, the Carhartt Knit Beanie is a game-changing accessory for your wardrobe. Crafted from a rib-knit fabric to keep you warm, this beanie can be customized with embroidery. Designed in the traditional style, this one also oozes a contemporary vibe making it all the more alluring. At CapBeast, you can personalize your beanie with your own logo or text to make it one-of-a-kind. Boasting the Carhartt logo sewn at the front, this custom embroidered beanie not only elevates your style quotient but also keeps the cold at bay. Ideal for a street-style look on a wintery day, this black beanie is a versatile piece that can add an edge to every outfit. So get hold of your custom Carhartt beanie today, and exude an effortlessly cool winter fashion look!', NULL, 41.00, 1, '2025-03-25 14:01:30', '2025-03-25 14:01:30', NULL),
(117, NULL, NULL, 'Navy Flat bill cotton snapback | Yupoong', 'navy- flat- bill- cotton- snapback-yupoong', 'Yupoong Navy Flat Bill Cotton Snapback – a sleek and durable cap with a structured fit, flat visor, and adjustable snapback closure. Made from high-quality cotton for all-day comfort and style!', NULL, 29.00, 1, '2025-03-25 14:04:01', '2025-03-25 14:04:01', NULL),
(118, 20, NULL, 'Knit Beanie Gray | Carhartt', 'knit-beanie-gray-carhartt', 'This Knit Gray Beanie from Carhartt embodies the traditional style that can be easily transformed into a modern accessory, thanks to its minimalist design and versatility. Available in a muted gray tone, this custom embroidered beanie is a tailor-made piece to ensure absolute comfort, as you step out on a chilly day. Crafted carefully from premium-quality rib-knit acrylic fabric, the beanie is a long-term companion for your wardrobe. If you are on the lookout for a customized Carhartt hat that is not just functional, but also matches your sense of fashion, CapBeast is the right place for you. You can add your choice of logo and text, and create a unique product that only you\'ll possess! Featuring the Carhartt label at the front, this beanie can help you ace a stunning street-style look, and keep you enveloped in coziness. So place an order for your personalized Carhartt beanie with confidence.', NULL, 41.00, 1, '2025-03-25 14:07:04', '2025-03-25 14:07:04', NULL),
(119, NULL, NULL, 'Red Flat bill cotton snapback | Yupoong', 'red- flat- bill- cotton- snapback-yupoong', 'The Red Flatbill cotton snapback from Yuppong is features a flat brim with a green undervisor. It is machine washable and has a large customization area making it one of our most popular custom baseball hats. It is made from 100% cotton twill material, it is machine washable and it has sewn eyelets to keep you cool in the summer heat. At the back of this personalized hat is an adjustable snap that enables you to adjust the size to your needs. The cap has a green under-visor that is soft and comfortable against the skin. Make your own custom embroidered cap by using the hat maker. Create a personalized hat by uploading your brand’s logo or slogan. Features · Made of 100% cotton twill material · Sewn eyelets · High profile design · Flat brim · No minimums · Custom embroidered', NULL, 29.00, 1, '2025-03-25 14:07:57', '2025-03-25 14:07:57', NULL),
(120, 20, NULL, 'Knit Cuffed Beanie Black | Carhartt', 'knit-cuffed-beanie-black-carhartt', 'Made from pure acrylic rib-knit material, the Knit Cuffed Beanie from Carhartt is a premium accessory that amps up your fashion game and takes care of your comfort at the same time! Available in a classic black color, you can style this piece with an array of clothes, and carry it however you want. This one element is all you need to switch from a monotonous casual look to a fresh and polished street-ready style. Thanks to the stretchable fabric of the beanie, you experience supreme comfort as the high-quality material keeps your head wrapped in warmth. It carries the sewn Carhartt label on the front, with a cuffed design to keep you comfy. Create your custom Carhartt Beanie at CapBeast today, and rock an effortlessly fashionable look.', NULL, 42.00, 1, '2025-03-25 14:10:52', '2025-03-25 14:10:52', NULL),
(121, NULL, NULL, 'Aqua Stone Faded Trucker Hat | Sportman', 'aqua- stone- faded- trucker- hat-sportman', 'This Aqua Stone Faded Trucker Hat is made of comfortable and breathable cotton and polyester material making it your ultimate outdoor companion. The interior has a moisture-wicking fabric that will keep you cool in the summer, absorb all sweat, and fight odor. This hat features an unstructured construction that makes it easy to fold and pack in your bag or pocket. It has a six-profile and low-profile construction that makes it suitable for men, women, and teenagers. The personalized trucker hat has an adjustable plastic tab closure that enables you to adjust the size. There are sewn eyelets that will keep your head cool. This hat will provide shade to your head during summer and keep your head warm during winter. Use our hat maker tool to create a personalized trucker hat. Upload your design or add custom stitched text to make the perfect hat, with no minimum order size. Features · Made of 55% cotton and 45% polyester · Sewn eyelets · Pre-curved visor · Plastic tab closure · No minimums · Customized\r\n\r\n5', NULL, 28.00, 1, '2025-03-25 14:12:18', '2025-03-25 14:12:18', NULL),
(122, NULL, NULL, 'Forest Stone Faded Trucker Hat | Sportman', 'forest- stone- faded- trucker- hat-sportman', 'This Forest stone faded trucker hat is made of 55% cotton and 45% polyester making it soft, comfortable, and breathable. The hat has a low profile that ensures a secure fit for men, women, and teenagers. The sportsman trucker hat uses a plastic tab closure at the back that enables you to customize it to your head\'s size. It has a pre-curved visor that offers the perfect shade from harsh weather elements. The custom Sportsman hat has a moisture-wicking material that will absorb all sweat, keep you cool, and fight odors. It has sewn eyelets that keep your head well aerated. This custom tracker hat is suitable for wear during summer, winter, spring, and fall. It will keep you cool in summer and warm in winter. It’s sturdy, durable, and lightweight. Create a custom Sportsman hats hat with our Capbeast hat maker tool. Simply upload your logo or text and let our tool create a custom trucker hat that is unique to you. No minimums. Features · Material:55% cotton and 45% polyester · Sewn eyelet · Unstructured, low profile construction · Plastic tab closure · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:16:19', '2025-03-25 14:16:19', NULL),
(123, 20, NULL, 'Knit Cuffed Beanie Gray | Carhartt', 'knit-cuffed-beanie-gray-carhartt', 'With the Carhartt Knit Cuffed Grey Beanie by your side, get ready to beat the extreme climate without compromising on style! Crafted with stretchable acrylic material, this accessory is comfortable and highly functional at the same time. Thanks to the warm fabric, you stay well-guarded from heavy cold. This minimal grey beanie flaunts a sewn-in Carhartt label at the front, making it a wardrobe essential. Customize your Carhartt Beanie at CapBeast, and sprinkle your personality into this elegant creation. With this beanie on your head, you can carry every street-style look with an effortless charm. Minimal and personalized, this piece is surely going to become your all-time-favorite custom beanie! Own it today, and infuse a classic style statement to your daily lookbook.', NULL, 42.00, 1, '2025-03-25 14:16:47', '2025-03-25 14:16:47', NULL),
(124, NULL, NULL, 'Mustard Yellow Stone Faded Trucker Hat | Sportman', 'mustard- yellow- stone- faded- trucker- hat-sportman', 'This Mustard Yellow Stone Faded Trucker Hat is a unique, comfortable, and sturdily-made cap that will withstand all the outdoor elements. Made of 55% cotton and 45% Polyester, it\'s lightweight and stretchy to fit different head sizes. At the back of this custom Sportsman trucker hat is a plastic buckle strap that makes it easy to adjust the size to fit your head. It also has embroidered eyelets that add to its breathability. This personalized trucker hat has a moisture-wicking interior that absorbs all sweat and keeps you comfortable all day long. The embroidered cap has a pre-curved visor that works well in protecting your neck and face from the sun. Create a unique and personalized trucker hat using our hat maker tool. Upload your text or logo for your embroidered caps with no minimum orders. Features · Material: 45% cotton and 45% polyester · One size fit · Adjustable strap back closure · Embroidered eyelets · Structured design · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:20:51', '2025-03-25 14:20:51', NULL),
(125, NULL, NULL, 'Navy Stone Faded Trucker Hat | Sportman', 'navy- stone- faded- trucker- hat-sportman', 'This Navy Stone Faded Trucker Hat is a classic unstructured hat that is made of 55% cotton and 45% polyester material combining comfort with breathability. The material blend also makes it fast drying and soft to the skin. The interior of the Sportsman trucker hat is made of a moisture-wicking material that absorbs all sweat and improves breathability. To ensure a custom fit, it has an adjustable strap closure at the back. With a five-panel construction and a curved brim, the custom trucker hat is the perfect choice for protecting yourself from the sun, rain, and snow. Personalize your custom trucker hat using our hat maker tool. Upload your design and let the tool embroider it for a custom trucker hat. Features · Made of 55% cotton and 45% polyester material · Sewn eyelet · Low profile, unstructured design · Strap back closure · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:25:32', '2025-03-25 14:25:32', NULL),
(126, NULL, NULL, 'Red Stone Faded Trucker Hat | Sportman', 'red- stone- faded- trucker- hat-sportman', 'The Red Stone Faded Trucker hat is a low-profile hat that is made of 55% cotton and 45% polyester material. The comfortable, breathable, and stretchable hat will fit all head sizes. The custom Sportsman trucker hat has a strap back closure that enables you to adjust the size to fit your head. This makes it suitable for men, women, and teenagers. The embroidered caps feature a moisture-wicking interior material that will absorb all sweat and keep you dry and comfortable. As an unstructured hat, it is easy to pack in a bag or even fit in your pocket. The personalized trucker hat has sewn eyelets that keep your head aerated in hot conditions. It’s your ultimate accessory for the weekend and outdoors. Our Capbeast hat maker tool allows you to create a personalized trucker hat. Upload your logo or text and you will have embroidered caps. Features · Material:55% cotton and 45% polyester · Sewn eyelets · Pre-curved brim · Buckle closure · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:29:48', '2025-03-25 14:29:48', NULL),
(127, NULL, NULL, 'Royal Stone Faded Trucker Hat | Sportman', 'royal- stone- faded- trucker- hat-sportman', 'Made of 55% cotton and 45% polyester, this Sportsman trucker hat is comfortable, lightweight, and breathable. It has an unstructured and low-profile design that enables it to fit in your pocket. The Sportsman trucker hat is sturdily made with top-notch embroidery ensuring a durable and tear-resistant cap. It has a buckle closure at the back for a one size fit for all. This hat has a pre-curved visor that offers good shade. There is contrast embroidery on the visor that adds to the pop of color. This unisex custom trucker hat can be worn with various outfits. It’s a great choice for daily use and outdoor activities such as running, fishing, cycling, camping, and the beach. With our Capbeast hat maker tool, you can create a custom trucker hat. Upload your logo or text and let the tool embroider it for a custom Sportman hat. No minimum orders. Features · Made of 55% cotton and 45% polyester material · Sewn eyelet · Unstructured construction · One size fits all · No minimums · Customized', NULL, 28.00, 1, '2025-03-25 14:33:39', '2025-03-25 14:33:39', NULL),
(128, 29, NULL, 'Black Dad hat | CapBeast', 'Black-dad-hat-capBeast', 'There is hardly anything as versatile as a dad hat. Put them on, and you\'re ready to face the challenges of the day, no matter which season it is. Thanks to their cool and timeless design, they enjoy equal popularity among all generations. Crafted with 100% bio-washed chino twill, our Black dad cap is designed for optimum comfort. This unstructured, six-panel hat comes with a pre-curved visor and a self-fabric snapback with buckle closure. Thanks to its adjustable design, this strapback is one size fits all. Personalize it with your logo or text using the CapBeast hat maker.', NULL, 30.40, 1, '2025-03-25 14:35:34', '2025-03-25 14:35:34', NULL),
(129, NULL, NULL, 'Flat bill cotton snapback | Yupoong', 'flat- bill- cotton- snapback-yupoong', 'The Yupoon (YP Classics) Flatbill cotton snapback hat is made of 100% cotton twill material making for a durable, tear-resistant, and wrinkle-resistant cap. It has a five-panel construction and it has a large design area for your custom embroidered logo. This customized hat has a structured front crown and a high profile to fit all head sizes. It features a broad flat visor and an adjustable closure. The hat also features sewn eyelets that keep your head cool. Design your own hat by using the custom hat maker by CapBeast. Upload your logo or design to create a hat that is unique to you. Features · Made of cotton twill material · Flat visor · Five–structure panel · Adjustable size · No minimums', NULL, 29.00, 1, '2025-03-25 15:11:19', '2025-03-25 15:11:19', NULL),
(130, NULL, NULL, 'Neon Snapback | Yupoong', 'neon- snapback-yupoong', 'The Neon snapback hat by Yupoong has a classic 6 panel design that features fan adjustable plastic strap on the back, a flat brim and a full crown profile. The button on the top of the hat is the same color as the hat itself, and so is the stitching. Materials: The Yupoong snapback is made from 80% Acrylic / 20% Wool. It has a bit of a heavier feel to the material, It breathes extremely well and is machine washable. Size & Fit: The Yupoong snapback is fully adjustable up to 24 ¼ inches, which means it fits most head sizes.', NULL, 30.00, 1, '2025-03-25 15:41:39', '2025-03-25 15:41:39', NULL),
(131, NULL, NULL, 'Black Performance Cap | Adidas', 'black- performance- cap-adidas', 'Featuring the brand logo on the side, the classic Adidas Black Performance Cap comes with a hook and loop closure for maximum comfort. The structured build and the mid-profile design make it a convenient choice. The recycled polyester material is equipped with UPF 50, ensuring complete UV protection. Thanks to the moisture-wicking fabric, this one will keep you cool during summers. Once you put on this athletic hat, you\'d never feel like removing it. And if you want to sport a personalized cap that carries your logo on it, CapBeast is here. Tell us what you want on your cap, and our expert craftsmen will embroider it for you. Your custom Adidas hat is going to be absolutely unique, bearing your personal touch.', NULL, 39.00, 1, '2025-03-25 15:47:01', '2025-03-25 15:47:01', NULL),
(132, 22, NULL, 'Retro Golf Hat | Imperial', 'retro-golf-hat-imperial', 'This Retro golf hat is made from 97% polyester and 3% spandex material making it fast-drying, and moisture-wicking. The hat is adjustable for a one size fits all fit. The golf hat features a structured five-panel construction and a mid-profile that makes it great to feature your custom embroidered logo. The interior of the hat features a performance sweatband that will absorb all the sweat in the summer heat. The hat has a pre-curved visor that will protect you from the UV rays. At the back of the cap is a plastic closure that enables you to adjust the hat for a perfect fit. Design your own custom hat using the CapBeast hat maker. Features · Material: 97% polyester and 3 % spandex · Pre-curved visor · Sweatband · Plastic snap closure · Five-panel construction, mid-profile · No minimums · Design your own', NULL, 33.00, 1, '2025-03-25 15:50:50', '2025-03-25 15:50:50', NULL),
(133, NULL, NULL, 'Grey Performance Cap | Adidas', 'grey- performance -cap-adidas', 'Adidas Grey Performance Cap – a lightweight, moisture-wicking cap designed for comfort and breathability. Features a curved brim, adjustable strap, and Adidas logo for a sporty, stylish look!', NULL, 39.00, 1, '2025-03-25 15:51:24', '2025-03-25 15:51:24', NULL),
(134, NULL, NULL, 'Deep navy Strapback structured cap | New Era', 'deep -navy -strapback- structured- cap-new- era', 'Featuring a simple design and a solid build, the Deep Navy Strapback Structured Cap is everyone’s favorite accessory. It is versatile in terms of style, making it a suitable choice for people of all age groups. Thanks to the 100% cotton twill material, this New Era hat ensures comfort. The hook and loop closure of this adjustable cap is another convenient feature that leads to a perfect fit. The dark navy tone of the cap can be a perfect canvas for customization. Thanks to CapBeast, now you can add an embroidered detail to your favorite strapback. Insert a logo or text on our interface, and we would make an embroidery out of it, and turn your plain hat into a custom strapback hat. Join hands with CapBeast, and start creating your very own custom New Era.', NULL, 34.00, 1, '2025-03-25 15:57:56', '2025-03-25 15:57:56', NULL),
(135, 19, NULL, 'Performance Cap | Adidas', 'performance-cap-adidas', 'For the ones who grind hard on the field everyday, Adidas athletic caps are the ideal accessories. Designed from recycled polyester, the Adidas Performance Caps feature the brand logo on the side. Created for optimum protection, the caps come with UPF 50. Available in a wide range of colors, these sports hats are equipped with hook and loop closure, along with a structured, mid-profile design. They fit your head smoothly, ensuring comfort and convenience. If you want to add a personal touch to the cap, CapBeast is here to create a custom Adidas hat for you. The athletic hat will carry a customized embroidered logo and graphics of your choice.', NULL, 39.00, 1, '2025-03-25 15:59:33', '2025-03-25 15:59:33', NULL),
(136, NULL, NULL, 'Black Strapback structured cap | New Era', 'black- strapback-structured-cap-new- era', 'The Black Strapback Structured Cap from New Era carries with it a simple and classic style, suitable for people across generations. This 6-panel hat is characterized by its superior built and 100% cotton twill material. It features a hook and loop closure for convenient fitting. Now, if you want to move beyond the basic black design, CapBeast can help you in creating a custom New Era. Add a text, graphic, or logo of your choice to our interface, and we would use it for creating an embroidered custom strapback hat for you. It will bear your personal logo, a marker of your signature style. Your custom-made hat awaits you– place your order with CapBeast.', NULL, 34.00, 1, '2025-03-25 16:01:48', '2025-03-25 16:01:48', NULL),
(137, NULL, NULL, 'White Strapback structured cap | New Era', 'white- strapback- structured-cap-new- era', 'The classic and elegant White Strapback Structured Cap from New Era features a 6-panel design. The 100% cotton twill material ensures both comfort and durability, while the hook and loop closure allows for a greater fitting. If a simple, useful and ergonomic cap is what you\'re looking for, this one can be a good choice. If you want a little personal addition to this otherwise classic hat, CapBeast is here for you. Input your choice of logo or text to our interface, and our experts would embroider it to create a custom strapback hat for you. Your custom New Era hat is just a few clicks away from your reach, so place your order soon.', NULL, 34.00, 1, '2025-03-25 16:05:00', '2025-03-25 16:05:00', NULL),
(138, NULL, NULL, 'Royal Strapback structured cap | New Era', 'royal- strapback- structured -cap-new-era', 'The Royal Strapback Structured Cap from New Era is characterized by its signature cotton twill material, and a premium build testifying to its durability. The hook and loop closure of this adjustable cap makes comfort and perfect fitting a top priority. This 6-panel New Era is a versatile accessory that is suitable for people of all generations. If you want to personalize this cap, CapBeast can be your guide. Tell us how you would want your custom strapback hat to look like, and we would have your personal logo embroidered on the cap. Your custom New Era is just a few clicks away, so place an order with CapBeast today.', NULL, 34.00, 1, '2025-03-25 16:08:17', '2025-03-25 16:08:17', NULL),
(139, 29, NULL, 'Beanie hat with bottom stripe | CapBeast', 'beanie-hat-with-bottom-stripe-capbeast', 'Cover that noggin of yours with this bottom stripe knit beanie or as they say up north: toque. The 8” style fits heads perfectly and won’t slip around when you need it the most, and allows you to battle the extreme conditions you may find yourself in. The contrasting stripe at the bottom is just enough of an added detail to keep things interesting.', NULL, 28.00, 1, '2025-03-25 16:08:32', '2025-03-25 16:08:32', NULL),
(140, NULL, NULL, 'Scarlet Strapback structured cap | New Era', 'scarlet-strapback-structured- cap-new-era', 'The Scarlet Strapback Structured Cap from New Era is a great fit for keeping your head well-protected throughout the seasons. Made with superior quality pure cotton twill, this adjustable cap features a hook and loop closure. It fits on your head comfortably, and thanks to the versatile design, this has become a staple accessory for people across generations. If you want to have a custom New Era cap with your own logo and text embossed on it, CapBeast can help you out. Add your choice of logo and text to our interface, and our experts would embroider the same on your hat. It\'s time to create your custom strapback hat– place your order, and sport it in style.', NULL, 34.00, 1, '2025-03-25 16:12:41', '2025-03-25 16:12:41', NULL),
(141, NULL, NULL, 'Blue Cotton strapback hat | CapBeast', 'blue -Cotton- strapback -hat -capbeast', 'On days when you need something to keep your head covered comfortably, put on the Ocean Blue Cotton Strapback Hat! It comes with a structured design, it is made from pure cotton twill, and the color is too cool to ignore. The velcro strapback adds another dose of convenience to its list of features. And to make it more appealing, it\'s available for customization. Thanks to CapBeast, you can now get a custom logo embroidered on your strapback hat, with a full guarantee of premium-quality. A custom hat can instantly make your everyday look so much more interesting, while also maintaining your comfort. So, place an order with CapBeast, and get your one-of-a-kind custom hat.', NULL, 32.80, 1, '2025-03-25 16:16:21', '2025-03-25 16:16:21', NULL),
(142, NULL, NULL, 'Navy Cotton strapback hat | CapBeast', 'navy- cotton- strapback- hat-capbeast', 'Wearing a cap can save you a lot of trouble– it offers protection from both heat and cold, and also makes you look stylish when you choose the right one. The Navy Cotton Strapback Hat is a versatile accessory that is ergonomic, durable, and great for daily use. It has a minimalist, structured design, with velcro straps for extra convenience. And thanks to the use of cotton twill, the material is thick and wrinkle-resistant but comfortable at the same time. It allows you to sport the same cap years after years, without any sign of wear and tear visible. And in case you customize the cap, CapBeast allows you to input text or graphics of your choice. Now you can own a custom hat that no one else can replicate– so, when are you creating yours?', NULL, 32.80, 1, '2025-03-25 16:19:37', '2025-03-25 16:19:37', NULL),
(143, NULL, NULL, 'Royal blue Cotton strapback hat | CapBeast', 'royal -blue- cotton- strapback -hat-capBeast', 'Bored of your regular old cap? Bring home the Royal Blue Cotton Strapback Hat, customized to perfection by CapBeast. This minimalist cap is made with genuine cotton twill, promising longevity and resistance to wear and tear. Owing to the velcro straps at the back, it\'s easy to fit most people. It features a structured cut, rendering a polished appearance to the cap. Besides all of these specifications, CapBeast ensures that your cap can easily stand out from any other product. You may customize the cap by inserting graphics or text, and CapBeast will embroider it on the cap. This personalized creation will be unique, carrying your signature style. To get your custom hat, place an order with us!', NULL, 32.80, 1, '2025-03-25 16:23:46', '2025-03-25 16:23:46', NULL),
(144, NULL, NULL, 'Red Cotton strapback hat | CapBeast', 'red-cotton-strapback-hat-capbeast', 'Once you set your eyes upon the Red Cotton Strapback Hat, there\'s no going back. It\'s made of premium cotton twill to ensure a sturdy build, with a structured design giving out a clean look. The velcro strap at the back makes the cap well-fitting. The bold yet classy red hue breaks the monotony of muted colors, rendering an interesting look to the hat. To take its appeal to the next level, CapBeast is here to customize the cap for you. You are free to add a graphic or logo of your preference, and CapBeast will deliver the cap to you with custom embroidery. So now, your cap will not just be an accessory to protect your head, but also a statement-maker.', NULL, 32.80, 1, '2025-03-25 16:27:46', '2025-03-25 16:27:46', NULL),
(145, NULL, NULL, 'Khakhi Cotton strapback hat | CapBeast', 'khakhi -cotton- strapback -hat-capbeast', 'For the ones who prefer muted earthy tones, the Khaki Cotton Strapback Hat is a perfect choice of accessory. Made with high-quality cotton twill, this cap is a hardy one. It is equipped with a velcro strap for convenient fitting, and a structured cut for exuding a neat look. Thanks to the versatile shade, this will very soon become your go-to cap for all occasions. And to give a special touch to this cap, CapBeast offers to customize it for you. Get your favorite logo or graphics embroidered on the cap, and turn it into something unique that nobody else can possess. So stop thinking, and start creating your custom hat.', NULL, 32.80, 1, '2025-03-25 16:31:43', '2025-03-25 16:31:43', NULL),
(146, NULL, NULL, 'Purple Cotton strapback hat | CapBeast', 'purple-cotton -strapback -hat-capbeast', 'A true admirer of exclusive caps can never say no to this Purple Cotton Strapback Hat. Crafted with 100% cotton twill, this one is high on the comfort quotient. It exudes a street-style vibe, complemented by an ergonomic build. It is a staple accessory that comes in handy for keeping yourself protected from weather, and also helps you look effortlessly cool. This cap comes with velcro straps for added convenience, and the structure design renders a classic appeal. The vibrant purple color is a great canvas for you to start customizing, be it with text or graphics. CapBeast will curate the personalized embroidered hat, with complete assurance of superior quality. So what are you waiting for? Let\'s start making your custom hat!', NULL, 32.80, 1, '2025-03-25 16:36:03', '2025-03-25 16:36:03', NULL),
(147, NULL, NULL, 'Kelly Cotton strapback hat | CapBeast', 'kelly- cotton- strapback-hat-capbeast', 'Are you fond of bright and lively colored caps? The Kelly Green Cotton Strapback Hat might be a good choice for you. It has been crafted from 100% cotton twill, rendering it strength and longevity. The polished, structured cut leads to a perfectly fitted look, with a velcro strap ensuring adjustability. An ergonomic accessory like this one infuses a lot of personal touches while taking care of your day-to-night comfort. And to increase its appeal even further, CapBeast is here to offer you a customized version of this cap, featuring an embroidered logo or text of your choice. With CapBeast, creating a custom hat is just a cakewalk, so get yourself one today.', NULL, 32.80, 1, '2025-03-25 16:46:21', '2025-03-25 16:46:21', NULL),
(148, NULL, NULL, 'Camo Cotton strapback hat | CapBeast', 'camo- cotton- strapback- hat-capbeast', 'Nothing screams out comfort more than this Camo Green Cotton Strapback Hat. The cotton twill material helps it retain its shape, keeping you wrapped in coziness even when you live and sleep with the cap on. It features a structured cut and a velcro strapback so that it fits you without any inconvenience. Now, to make this cap truly yours, you are free to customize it. Tell CapBeast how you\'d want your ideal cap to look like, and we would embroider a logo and text of your choice. With us, you can have a personalized, no-hassle cap that\'s ergonomic and also looks great! Get yourself a custom hat today.', NULL, 32.80, 1, '2025-03-25 16:50:58', '2025-03-25 16:50:58', NULL),
(149, NULL, NULL, 'Tropical Pink Cotton strapback hat | CapBeast', 'tropical -pink- cotton -strapback- hat-capbeast', 'Designed for the lovers of bold and not-so-subtle hues, the Bright Pink Cotton Strapback Hat is a convenient choice for everyday wear. Thanks to the premium cotton twill material, this hat is sturdy enough to endure wear and tear. It keeps your head well-protected, and also ensures that your comfort remains intact. Thanks to the structured cut and the velcro strapback, the cap\'s fitting is impeccable. And to infuse some more attractive features into the list, CapBeast has taken the initiative of customizing these caps, by adding a logo, text, or graphic in the form of custom embroidery. Order yourself a custom hat, and sport your personalized cap every time you step out.', NULL, 32.80, 1, '2025-03-25 16:57:03', '2025-03-25 16:57:03', NULL),
(150, NULL, NULL, 'Maroon Cotton strapback hat | CapBeast', 'maroon -cotton- strapback- hat-capbeast', 'Who doesn\'t love a no-fuss strapback? We know you do. And that\'s why CapBeast has brought you the Maroon Cotton Strapback Hat! It\'s durable, it\'s colorful and it\'s made for regular wear. The cotton twill makes sure you can go the whole day without worrying about the wrinkles or the build. On top of that, the structured hat doesn\'t lose its shape when you take it off. Add the velcro fastener, and you have a solid hat at your disposal here. But if you want to make the Strapback more special, just tell us what you want on your cap. The custom hat will be embroidered with the signs and logos of your liking, letting you flaunt a hat that\'s one of its kind. Place your order today.', NULL, 32.80, 1, '2025-03-25 17:05:48', '2025-03-25 17:05:48', NULL),
(151, NULL, NULL, 'Black Mid profile baseball hat | \'47 Brand', 'black- mid- profile- baseball- hat-47- brand', 'The classic accessory for every street-style fan is a black sporty cap. It\'s understated, it\'s simple yet it never fails to carry personality. Get ready to exude your confident self with the Black Mid profile baseball hat from the \'47 Brand. Featuring a self-fabric strap at the back and a comfy fit, this cap is a lifesaver. It\'s simple, elegant, and helps you look cool with minimal effort. Thanks to the soft wool blend material, this one keeps cold at bay. To seal the deal even further, now you can get the cap customized. Add your logo and text, and get a custom embroidered hat that you will never feel like taking off.', NULL, 34.00, 1, '2025-03-25 17:10:25', '2025-03-25 17:10:25', NULL),
(152, NULL, NULL, 'Navy Mid profile baseball hat | \'47 Brand', 'navy-mid- profile -baseball- hat -47- brand', 'Want a custom mid-profile baseball hat that captures your personality? With the option to create unique personalized caps on CapBeast, it\'s time to own a cap of your own brand. Here we have the Navy Mid profile baseball hat from the \'47 Brand, featuring the brand logo, and a self-fabric strap at the back. The use of a high-quality wool blend makes this product a suitable accessory for harsh weather. The navy cap is versatile and cool, but you can make it more appealing by adding text or graphics of your choice. CapBeast will send you a beautifully embroidered \'47 Brand baseball cap so that you can step out in style, and also keep up the productivity quotient!', NULL, 34.00, 1, '2025-03-25 17:13:51', '2025-03-25 17:13:51', NULL),
(153, NULL, NULL, 'Charcoal Mid profile baseball hat | \'47 Brand', 'charcoal- mid -profile- baseball -hat -47 -brand', 'Are you looking for a sporty hat that vibes with your style? Check out the Charcoal Mid profile baseball hat from the \'47 Brand. Available in a versatile charcoal shade, this premium wool-blend cap keeps your comfort in check while giving a boost to your daily work-day look. Featuring the \'47 Brand logo at the front, this classic accessory comes with self-fabric straps and a comfortable fit. This one is available for customization. All you need to do is insert a logo and a text, and CapBeast will add the personalized embroidery on this cool cap. So be prepared to sport your custom \'47 brand hat, because it\'s time to tell the world who you are.', NULL, 34.00, 1, '2025-03-25 17:17:10', '2025-03-25 17:17:10', NULL),
(154, NULL, NULL, 'White Mid profile baseball hat | \'47 Brand', 'white mid profile baseball hat-47-brand', 'A custom cap is the dream of every diehard cap fan out there. The White Mid-Profile Baseball Hat from the house of \'47 Brand is a classic one, keeping up the fashion quotient high, without cutting back on comfort. Its wool blend material brings to the table a cozy material that\'s good enough for keeping cold away. It features self-fabric straps and the brand logo to add a cool touch. But if you want to take this cap to the next level, CapBeast can surely assist you! Add your personalized logo and text, and get it embroidered on the cap. And that\'s it– you have your custom \'47 Brand Hat that is unique in every possible way.', NULL, 34.00, 1, '2025-03-25 17:21:04', '2025-03-25 17:21:04', NULL),
(155, NULL, NULL, 'Red Mid profile baseball hat | \'47 Brand', 'red -mid -profile- baseball- hat-47-brand', 'The Red Mid Profile Baseball Hat from the \'47 Brand features the brand logo at the front, infusing a sporty touch. Made with a high-quality wool blend, this adjustable cap offers a great deal of comfort. Adding a personal touch to your favorite baseball cap is now easier than ever. Customize the hat with a logo and text that you want to add, and we will get it embroidered on it. The vibrant red hue makes up a perfect background for infusing your personalized graphics. This custom mid-profile baseball hat from CapBeast is both useful and stylish– a perfect extension to your ideal street-style look.', NULL, 34.00, 1, '2025-03-25 17:26:44', '2025-03-25 17:26:44', NULL),
(156, NULL, NULL, 'Black Trucker hat | \'47 Brand', 'black- trucker- hat-47 brand', 'The \'47 Brand\'s Black Trucker Hat is the epitome of sophistication. It\'s simple, stylish, and ensures that your comfort doesn\'t have to be compromised. The 100% washed-cotton renders a soft touch to this cap, and the strapback design leads way to a good fit. The relaxed and curved bill design makes this cap a favorite for every season. If you want to personalize this cap to sport a unique look, CapBeast is here to help. Let us know the text and logo that you’d like to add to it, and we will embroider it for you. With a 100% guarantee of premium quality, your custom 47 brand trucker hat is just a few clicks away.', NULL, 34.00, 1, '2025-03-26 10:45:11', '2025-03-26 10:45:11', NULL),
(157, NULL, NULL, 'Navy Trucker hat | \'47 Brand', 'navy-trucker-hat-47 brand', 'A cool cap not only breathes life into your daily look, but it\'s also a great accessory to keep you guarded against extreme weather. The Navy Trucker Hat from the \'47 Brand is an ideal choice for anyone looking for a sleek looking cap. Thanks to the high-quality washed-cotton material, the cap is soft to touch. Because of the strapback design and relaxed build, this one offers a perfect fit. To help you create a custom trucker hat, CapBeast offers personalization on all 4 sides of this cap. Add a logo and the text that you prefer, and we will get it embroidered on the cap, with premium quality assured. Place an order and get your personalized custom trucker hat today.', NULL, 34.00, 1, '2025-03-26 10:49:39', '2025-03-26 10:49:39', NULL),
(158, NULL, NULL, 'Red Trucker hat | \'47 Brand', 'red -trucker -hat -47 brand', 'Get yourself a custom trucker hat, and you\'re sorted for all seasons– be it winter or fall. Thanks to CapBeast, you can add a personalized text and logo to your Red Trucker Hat. This cap is crafted from pure washed cotton, making it soft and comfortable for everyday wear. With a strapback design and a relaxed fit, this cap is a must-have for every hat lover out there. Insert text and graphics on the interface, and get a customized logo embroidered on the cap. It\'s that easy to own a cap of your own brand.', NULL, 34.00, 1, '2025-03-26 10:52:46', '2025-03-26 10:52:46', NULL),
(159, NULL, NULL, 'Camo Fitted cotton hat | New Era', 'camo -fitted -cotton -hat- new era', 'The Camo Fitted New Era is a comfortable cap made of stretchable fabric, ensuring a perfect fit for all. Cotton and Spandex twill makes it a cozy yet durable hat, ideal for everyday use. The carefully stitched 6-panel design of this mid-profile cotton cap renders a classic touch to this accessory. If you want something more than just a plain cap, CapBeast can customize fitted New Era hats on your behalf. Add a personalized logo or text to your custom fitted hat through our interface, and our craftsmen would embroider the design for you. Order your custom fitted New Era from CapBeast, and sport it in style.', NULL, 32.00, 1, '2025-03-26 11:02:25', '2025-03-26 11:02:25', NULL),
(160, NULL, NULL, 'Gray Fitted cotton hat | New Era', 'gray- fitted -cotton -hat-new era', 'The Gray Cotton Hat from New Era is made of 97% cotton and 3% Spandex. Thanks to the stretchable nature of the fabric, this cap offers a superior fit for all. Featuring a 6-panel design, this structured mid-profile hat bears the legacy of excellent craftsmanship and durability. If you\'re searching for a comfortable and versatile cotton cap, this can be a perfect choice. And in case you\'re interested in adding a personal touch to your fitted hat, allow CapBeast to be your guide. Insert a logo and text on our interface, and we would recreate the same logo on your custom fitted hat in the form of embroidery. So customize your fitted New Era hat today.', NULL, 32.00, 1, '2025-03-26 11:14:34', '2025-03-26 11:14:34', NULL),
(161, NULL, NULL, 'Gold Fitted cotton hat | New Era', 'gold- fitted- cotton -hat-new- era', 'Complete your everyday look with the Gold Fitted Cotton Hat from New Era, and enjoy its functionality. Made of cotton and Spandex, the stretchable fabric of this cap ensures a perfect fit. This perfectly-sewn 6-panel mid-profile cotton cap is durable enough for daily use. Now, if you want to make this gold hat truly yours, personalization is always a good idea. To customize fitted New Era hats, you have to add your choice of text, graphics, or logo to our interface. Our experts will embroider it onto your custom fitted New Era hat. Simple and ergonomic, this fitted hat is the only accessory you\'ll ever require to carry a cool yet timeless style.', NULL, 32.00, 1, '2025-03-26 11:32:36', '2025-03-26 11:32:36', NULL),
(162, 29, NULL, 'Fidel cap | CapBeast', 'fidel-cap-capbeast', 'This is a great style if you’re looking for the protection of a cap without the usual look of a standard cap. This shape is called a Military Fidel and is suitable to block out the sun and protect your head from the elements. It’s made of 100% cotton twill and treated to give off that rugged look (Bio-washed). It has a pre-curved visor and Velcro closure in back.', NULL, 30.00, 1, '2025-03-26 11:33:29', '2025-03-26 11:33:29', NULL),
(163, 30, NULL, 'Camo 9Fifty snapback | New Era', 'camo-9fifty-snapback-new-era', 'The Camo 9Fifty snapback from New Era is a must have streetwear accessory for all ages. It features a structured front panel, offering a high profile frame along with premium stability. To offer a flawless fit, the open back is equipped with a snap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom camo 9Fifty snapback for yourself, with the help of our very own custom hat maker. Use it to add your logo, graphics or text to create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-26 11:38:19', '2025-03-26 11:38:19', NULL),
(164, 27, NULL, 'Camo snapback | Yupoong', 'camo-snapback-yupoong', 'The Yupoong camo snapback offers the classic snapback style emblazoned with a classic high quality woodland military camo finish.', NULL, 34.00, 1, '2025-03-26 11:43:52', '2025-03-26 11:43:52', NULL),
(165, 27, NULL, 'Tiger Camo 5 Panel hat | Yupoong', 'tiger-camo-5-Panel-hat-yupoong', 'This White Geo Sustainable Customized Bucket Hat features an unstructured design that makes it easy to fold and store without losing its shape. The custom embroidered hat cap is made of a 100% certified recycled polyester twill that makes it lightweight and comfortable to wear. It is one size fits most, and it features sewn eyelets that add to its breathability. It’s the perfect companion for your summer and outdoor protection from the sun. Personalize this hat with your own logo or design using the CapBeast custom hat maker. Features · 100% recycled polyester twill material · Sewn eyelets · Unstructured design · One-size fit · Material traceability using QR code · Global Sustainable Recycled Standard · No minimums · Design your own', NULL, 30.00, 1, '2025-03-26 11:49:13', '2025-03-26 11:49:13', NULL),
(166, NULL, NULL, 'Royal Fitted cotton hat | New Era', 'royal-fitted -cotton- hat-new era', 'When you want to feel extra comfortable throughout the day, put on the Royal Fitted Cotton Hat from New Era. Made with premium quality stretchable fabric, this one fits around your head perfectly. This 6-panel cotton cap features a structured design, with superior craftsmanship ensuring durability. The simple and versatile design of this fitted hat makes it a suitable accessory for all occasions, and people of all ages. And if you\'re looking for a personalized, custom-fitted New Era, CapBeast is here to help. To customize fitted New Era hats, you have to upload your choice of text or logo to our interface. Our experts would embroider those designs, and create a custom fitted hat just for you.', NULL, 32.00, 1, '2025-03-26 11:59:36', '2025-03-26 11:59:36', NULL);
INSERT INTO `products` (`id`, `brand_id`, `mlb_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(167, NULL, NULL, 'Black Fitted cotton hat | New Era', 'black -fitted -cotton- hat-new era', 'The Black Fitted Cotton Hat from New Era is a marker of optimum comfort and versatile style. Made of 97% cotton and 3% Spandex, this 6-panel hat is stretchable in nature, allowing a superior fit for everyone. Thanks to the minimalist black color, you can wear it on whichever occasion you like. The quality craftsmanship ensures that the cap is durable even after rugged use. And in case you want a custom-fitted hat, CapBeast can help you create one. To customize fitted New Era hats, you have to tell us about the kind of logo or graphics you want to add to your cotton cap. Then, our experts would embroider the same design to present you with a custom fitted New Era. With CapBeast, it\'s time to upgrade your accessories, and carry something that truly reflects your personality.', NULL, 32.00, 1, '2025-03-26 12:05:05', '2025-03-26 12:05:05', NULL),
(168, NULL, NULL, 'Tie Dye Dad Hat', 'tie-dye-dad-hat', 'This Tie Dye custom Dad Hat is a classic and stylish cap that combines colorful styles and comfort. It’s made of 100% cotton material making it cozy to wear all day long. The strapback buckle closure at the back ensures a perfect fit. At the front is a pre-curved visor that protects your head from UV rays. The soft cotton also makes it packable and crushable so that you can carry it anywhere. This custom dad hat is designed to be unisex. It has six panels and a low structure that makes it stylish for the young and old. Design your own custom embroidered tie-dye hat with the Capbeast hat maker using your own logo or text. Features · Cotton material · Pre-curved visor · Six panels structure · Tri-glide buckle closure · No minimums', NULL, 28.00, 1, '2025-03-26 12:05:25', '2025-03-26 12:05:25', NULL),
(169, NULL, NULL, 'Deep navy Fitted cotton hat | New Era', 'deep -navy- fitted -cotton- hat-new era', 'The New Era Deep Navy Fitted Cotton Hat is another name of comfort. The stretchable fabric makes way for an ideal fit, and the superior build quality renders durability to this 6-panel structured cotton cap. The minimalist design makes it a versatile accessory, suitable for people across generations. If you\'re looking for a deeply personalized baseball cap, you can always get a custom fitted New Era that speaks volumes about your personality. With CapBeast, owning a custom fitted hat is easier than ever. To customize fitted New Era Hats, all you need to do is add your choice of graphics to our interface, and wait for us to emulate them in your cap in the form of embroidery.', NULL, 32.00, 1, '2025-03-26 12:10:43', '2025-03-26 12:10:43', NULL),
(170, NULL, NULL, 'Graphite Fitted cotton hat | New Era', 'graphite-fitted- cotton- hat-new era', 'If a classic and cool hat is what you\'re looking for, the Graphite Fitted Cotton Hat from New Era can be a great choice. The cotton and Spandex blend creates a stretchable fabric, ensuring a comfortable fit around your head. The quality craftsmanship of this 6-panel mid-profile hat promises durability. The simple design renders a versatile appeal to this accessory, making it suitable headwear for people of all ages. Now, in case you want to sport a custom fitted hat that stands out from the crowd, CapBeast is here for you. Add a text or graphics of your choice to your cotton cap, and we would embroider the design and create a custom fitted New Era, just for you. At CapBeast, we not only customize fitted New Era hats, but we also assure the premium quality of craftsmanship.', NULL, 32.00, 1, '2025-03-26 12:14:42', '2025-03-26 12:14:42', NULL),
(171, NULL, NULL, 'Dark green Fitted cotton hat | New Era', 'dark green fitted cotton hat | new era', 'A stylish baseball cap can really help your personality shine through and when it\'s the New Era Dark Green Fitted Cotton Hat, you\'ll find it extra easy to draw attention. The Custom fitted hat is as beautiful as it\'s functional. With 6 panel design, striking cotton cap, and stretched cotton, wearing and carrying the hat all day is very easy. The custom fitted New Era hat perfectly protects the head and offers a subtle style element. If you want to make the Dark Green truly your own, now you have provisions for that as well. To customize fitted New Era hats, all you need to do is tell us your favorite patterns and texts and we\'ll embroider them on your cap.', NULL, 32.00, 1, '2025-03-26 12:19:09', '2025-03-26 12:19:09', NULL),
(172, NULL, NULL, 'Purple Fitted cotton hat | New Era', 'purple-fitted- cotton- hat -new era', 'If you\'re looking to style up your daily look, you cannot go wrong with baseball caps. The New Era Purple Fitted Cotton Hat is the hassle-free option to amp up your rugged look without investing too many resources. The custom fitted New Era hat is everything you\'d want in a classic baseball cap - it\'s stylish, it\'s durable and it\'s never dull. The 6-panel design gives the custom fitted hat a contemporary look while the pronounced cotton cap makes it a flamboyant style statement. If you think the purple shade is not enough to draw attention, you can always go one step further. To customize fitted New Era hats just tell us your preferred style and texts and we at CapBeast will embroider it on your hat. Now that\'s a special hat!', NULL, 32.00, 1, '2025-03-26 12:23:31', '2025-03-26 12:23:31', NULL),
(173, NULL, NULL, 'White Fitted cotton hat | New Era', 'white -fitted- cotton -hat-new era', 'A baseball cap that can keep up with your active lifestyle is hard to find, but not impossible. The New Era White Fitted Cotton Hat is a bold choice for anyone who dares to flaunt their lifestyle. The custom fitted hat from New Era features a 6 panel design that attracts a lot of eyeballs. The stretched cotton is both breathable under extreme conditions and durable against rough use. The New Era hats carry a classic design that\'s ideal for men outdoors. The custom fitted New Era hats can be customized however you want. Just let us know the patterns and texts you want to carry and we\'ll have them embroidered on your cap.', NULL, 32.00, 1, '2025-03-26 12:30:28', '2025-03-26 12:30:28', NULL),
(174, NULL, NULL, 'Scarlet Fitted cotton hat | New Era', 'scarlet- fitted -cotton -hat-new era', 'A bold and beautiful baseball cap rarely has any competition. The New Era Scarlet Fitted Cotton Hat proudly flaunts its striking colors and classic design. The custom fitted New Era hat comes with the popular 6 panel design and a distance cotton cap - ideal for those who never shy away from starting a conversation. Coupled with stretched cotton, you have a structured hat that\'s as durable as it\'s comfortable to wear. If you\'re still looking to tailor the hats to your liking then you\'re in luck. The fitted hats can be customized with the texts and patterns of your choice. Just let us know what you want and we\'ll do the rest for you.', NULL, 32.00, 1, '2025-03-26 12:34:01', '2025-03-26 12:34:01', NULL),
(175, NULL, NULL, 'Stone Fitted cotton hat | New Era', 'stone- fitted - -hat- new era', 'Going subtle should never be hard - the New Era Stone Fitted Cotton Hat carries the classic baseball cap design with an understated shade. The custom fitted New Era hat boasts the popular 6 panel design marked by a signature cotton cap. For days when you need to grind extra hard, the stretched cotton will help in breathability. Thanks to the stone hue of the fitted hat, you can wear it on different occasions, all without raising an eyebrow or sacrificing your love for a good ol\' baseball hat. The customized fitted New Era hats give you the freedom to make the hat completely your own. Just tell us your favorite texts and logos and we\'ll embroider them on the New Era cap.', NULL, 32.00, 1, '2025-03-26 12:37:22', '2025-03-26 12:37:22', NULL),
(176, NULL, NULL, 'Camo stretch mesh cap | New Era', 'camo- stretch -mesh- cap-new era', 'If you\'re looking for a classic custom fitted hat to add to your collection, the New Era Camo Stretch Mesh Caps can be a good choice. Made with premium-quality 100% polyester, these 6-panel caps are comfortable, timeless, and fit around your head perfectly. When it comes to protecting your head and eyes, these baseball caps come in handy. Thanks to their versatile design, they suit people of all ages seamlessly. Now, in case you want to own a custom camo fitted hat that carries your own logo, CapBeast can help you out. Enter your choice of graphics to our interface, and we would have it embroidered onto your custom New Era fitted hat.', NULL, 33.00, 1, '2025-03-26 12:48:49', '2025-03-26 12:48:49', NULL),
(177, NULL, NULL, 'Navy Camo stretch mesh cap | New Era', 'navy- camo- stretch- mesh-cap-new era', 'Put on the Navy Camo Mesh Cap from New Era, and channel the elegance of this classic baseball cap. Made with superior quality fabric, the 6 panels of the custom camo fitted hat are sewn together carefully to attain a perfect fit. Versatile in design and comfortable to wear, this cap works as your go-to headwear. The versatile color and simple design make the camo fitted hat a suitable choice for people across generations. And in case you wish to have a custom New Era fitted hat in your possession, you can always add a personalized touch to it. At CapBeast, we help in creating custom fitted hats that bear a logo and graphic of your choice. So let us know how you\'d like to design your custom camo hat, and we would happily oblige.', NULL, 33.00, 1, '2025-03-26 12:54:56', '2025-03-26 12:54:56', NULL),
(178, NULL, NULL, 'Tie Dye Bucket Hat', 'tie-dye-bucket-hat', 'This Tie Dye custom Bucket Hat is the perfect accessory for your spring and summer wardrobe. made from 100% cotton which makes it durable and comfortable to wear. At the back of the hat is an adjustable strap closure that makes it the perfect fit for all head sizes. The personalized tie-dye hat has a low profile, and an unstructured design that makes it great for embroidered designs. The interior of the hat has a built-in sweatband that makes this hat comfortable to wear even in the warmest weather. Create your own custom embroidered bucket hats using the CapBeast hat maker. Upload your design or add custom stitched text to make the perfect hat, with no minimum order sizes. Features · Unisex design · 100% cotton material · Unstructured design · Sewn eyelets · No minimums · Custom Embroidered', NULL, 29.00, 1, '2025-03-26 12:56:09', '2025-03-26 12:56:09', NULL),
(179, NULL, NULL, 'Grey Camo stretch mesh cap | New Era', 'grey- camo- stretch -mesh -cap-new era', 'Looking for a custom camo hat that is both comfortable and versatile? The Grey Camo Mesh Cap from New Era is the ideal fit for you. Made with 100% polyester, this 6-panel custom camo fitted hat can be personalized according to your preference. Featuring an adjustable design, the cap ensures that your head remains well-protected throughout the seasons. Create your very own custom New Era fitted hat with CapBeast, and get ready to marvel at our quality craftsmanship. Add your choice of logo and graphics, and we would have it embroidered on top of your custom fitted hat for a unique appearance.', NULL, 33.00, 1, '2025-03-26 13:00:22', '2025-03-26 13:00:22', NULL),
(180, NULL, NULL, 'Black Camo stretch mesh cap | New Era', 'black- camo- stretch- mesh -new era', 'When it comes to everyday headwear, nothing can beat a custom camo fitted hat. The Black Camo Mesh Cap from New Era features a 6-panel design, made with superior quality polyester. Because of its timeless design, this cap can be worn by people across all generations. This custom fitted hat offers maximum comfort throughout all seasons. With CapBeast, creating your custom camo hat has become easier than ever. All you have to do is add your choice of text to our interface, and we would embroider the text/ logo on your custom New Era fitted hat. Place your order, and become a proud owner of your personalized camo hat.', NULL, 33.00, 1, '2025-03-26 13:04:53', '2025-03-26 13:04:53', NULL),
(181, NULL, NULL, 'Tie Dye Twill Dad Hat', 'tie-dye-twill-dad-hat', 'Add fun and color to your look with the Tie-Dye customized Dad Hat. It’s made of 100% cotton, making it comfortable to wear and soft to the touch. The custom embroidered hat has six air ventilation holes on top to ensure good breathability. The pre-curved brim and the cotton fabric work hand in hand to protect you from the harsh UV rays. It has a tri-glide buckle closure that ensures a perfect fit. The hat is machine washable and easy to care for. Personalize your own by using the CapBeast custom hat maker. Upload your design or text to create a unique custom hat. No minimum-sized orders. Features · Cotton material · Buckle closure · Pre-curved visor · eyelets · No minimums · Design your own', NULL, 32.00, 1, '2025-03-26 13:07:02', '2025-03-26 13:07:02', NULL),
(182, NULL, NULL, 'Heather gray & Amber 112 Trucker hat | Richardson', 'heather- gray & amber- 112 -trucker- hat-richardson', 'The unique combination of heather gray and gold renders a timeless touch to this Richardson trucker hat. Featuring a 5-panel structured design, this mid-profile Richardson hat is not only comfortable but also versatile. Made of cotton and polyester with a mesh design at the back, it keeps you comfortable throughout all seasons. It comes with a plastic snapback that can be adjusted at your convenience to achieve the perfect fitting. Owning custom Richardson hats has never been easier. With CapBeast, all you have to do is insert your choice of text, graphics, and logo into our hat maker and we will do the rest.', NULL, 34.00, 1, '2025-03-26 13:08:57', '2025-03-26 13:08:57', NULL),
(183, NULL, NULL, 'Heather gray & Black 112 Trucker hat | Richardson', 'heather -gray & black -112- trucker -hat-richardson', 'The Heather Gray & Black Richardson 112 trucker hat features a 5-panel structured design and comes with a comfortable plastic snapback for a perfect fit. The cotton and polyester blend makes it a suitable accessory for all seasons, with the backside made of pure polyester mesh. Thanks to the simple yet versatile design of this Richardson hat, they can be worn by people of all ages. Now personalizing your hat is easier than ever. With CapBeast, you can create a custom trucker hat that carries your logo, text, and graphics.', NULL, 34.00, 1, '2025-03-26 13:12:31', '2025-03-26 13:12:31', NULL),
(184, NULL, NULL, 'Green & Tan 112 Trucker hat | Richardson', 'green & tan- 112- trucker- hat-richardson', 'Available in a cool combination of olive green and tan, this custom Richardson 112 trucker hat is a versatile accessory for all occasions– whether it\'s a regular workday or you\'re headed to a sports match. This structured, mid-profile hat features a 5-panel design. The backside of the cap is made of 100% polyester mesh for adding a stylish touch. Now, if you\'re interested in owning custom Richardson 112 hats, CapBeast is here for you. Add your text, graphics, or logo to our hat maker and we will have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-26 13:22:59', '2025-03-26 13:22:59', NULL),
(185, NULL, NULL, 'Black & white 112 Trucker hat | Richardson', 'black & white 112 trucker hat | richardson', 'Available in the unbeatable combination of black and white, this Richardson 112 trucker hat takes comfort and versatility to the next level. As the maker of premium hats for over five decades, Richardson promises great quality and a superior fit. Made of a 60/40 blend of cotton and polyester, this hat features a 100% polyester mesh back. This mid-profile Richardson hat comes with a 5-panel structured design and an adjustable snapback for comfortable fitting. If you want to own custom Richardson 112 hats with your personal logo and texts embossed on top, CapBeast can help you out. Insert your choice of graphics into our design interface, and we would have them embroidered on your hat.', NULL, 34.00, 1, '2025-03-26 13:26:24', '2025-03-26 13:26:24', NULL),
(186, NULL, NULL, 'Charcoal & White 112 Trucker hat | Richardson', 'charcoal & white- 112- trucker- hat-richardson', 'The Charcoal and White Richardson 112 Trucker hat is a must-have in your cap collection. Featuring a mesh back design, this 5-panel mid-profile hat is all about versatility. Made of cotton and polyester, this Richardson hat offers comfort throughout all seasons. Thanks to the adjustable snapback design, you can expect a perfect fitting every time. If you\'re interested in custom Richardson 112 hats, CapBeast is here to create one for you. Insert a logo, text, and graphics into our design interface, and we would embroider them on your Richardson hat. Customize with CapBeast, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-26 13:30:43', '2025-03-26 13:30:43', NULL),
(187, NULL, NULL, 'Ombre blue & Navy 112 Trucker hat | Richardson', 'ombre blue & navy 112 trucker hat | richardson', 'The Blue & Navy Richardson 112 Trucker is versatile headwear you can rely on for all seasons and all occasions. Made of a cotton and polyester blend, this Richardson hat features a mesh design at the back. The structured design of this 5-panel hat gives it a clean and polished look. Thanks to the adjustable plastic snapback, it fits your head comfortably. Personalize your using our online hat maker.', NULL, 34.00, 1, '2025-03-26 13:46:29', '2025-03-26 13:46:29', NULL),
(188, NULL, NULL, 'Brown & khakhi Seven panel trucker hat | Richardson', 'brown & khakhi- seven- panel- trucker -hat-richardson', 'The beautiful combination of brown and khaki renders a unique appeal to the Richardson seven-panel trucker hat. Featuring a structured design and a flat bill, this hat comes with a polyester mesh back. The front section of the cap is made out of a blend of cotton, nylon, and polyester. This Richardson hat has a strapback enclosure for better fitting. CapBeast is here to help you create custom Richardson hats. Tell us in detail about the logo and the text you want to add to your hat, and well will get them embroidered on the cap. Your custom trucker hat is waiting for you– place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-26 14:04:06', '2025-03-26 14:04:06', NULL),
(189, NULL, NULL, 'Raspberry Mist Tie Dye Dad hat', 'raspberry-mist-tie-dye-dad-hat', 'This Raspberry Mist Tie Dye custom Dad hat has beautiful prints that provide you with an exquisite appearance and helps you stand out from the crowd. The hat is made of high-quality cotton material that makes it comfortable, sweat-proof, and odor-fighting. It can be adjusted with a tri-glide buckle at the back which makes it suitable for all head sizes. The unisex personalized tie-dye hat has gorgeous colors that will make you stand out from the crowd. This customized hat is a great choice for running, shopping, outdoor, summer, spring, and any other outdoor occasion and makes a great gift for anyone in the family. Use the custom hat maker tool to upload your own logo or add personalized text to create a one-of-a-kind custom tie-dye dad hat. Features · Pre-curved visor · Buckle closure · Cotton material · Low profile · Six-panel structure · No minimums', NULL, 28.00, 1, '2025-03-26 14:04:12', '2025-03-26 14:04:12', NULL),
(190, NULL, NULL, 'Cotton Candy Tie Dye Dad hat', 'cotton-candy-tie-dye-dad-hat', 'The cotton candy tie dye custom dad hat is made of cotton which makes it comfortable and soft on the skin. It has beautiful and unique prints that are perfect for designing your own hat and it makes you stand out from the crowd. At the back is a pre-curved visor that helps to protect your face from the sun when you are outdoors. The front crown of the personalized tie-dye hat can be folded and unfolded while still retaining its shape. It features a strapback buckle closure that allows you to adjust the size to fit your head. The personalized hat has a hard structure at the top that improves its overall look. This is the perfect choice for Golf, athletic activities or just for casual wearing. Design your own tie-dye hat using the Capbeast hat maker tool. Simply upload your company logo, personalized design or text and we will stitch it on the hat. Features · Made of 100% cotton · One-size fit · Pre-curved visor · Low profile · Adjustable strapback closure · No minimums', NULL, 28.00, 1, '2025-03-26 14:13:34', '2025-03-26 14:13:34', NULL),
(191, NULL, NULL, 'Charcoal & black Seven panel trucker hat | Richardson', 'charcoal & black- seven-panel- trucker -hat- richardson', 'Available in a combination of charcoal and black, the Richardson seven-panel trucker hat is a classic choice. Made of cotton, nylon, and polyester, this structured, high-profile Richardson hat is extremely comfortable. The adjustable snapback enclosure ensures perfect fitting for everyone. If you want to break the monotony of this simple hat, CapBeast has a great solution for you. Use the empty canvas on the hat for personalization. Add your choice of logo, text, or graphics, and make this custom trucker hat truly yours. With us, making custom Richardson hats is easier than you could ever imagine. So place an order, today.', NULL, 34.00, 1, '2025-03-26 14:15:42', '2025-03-26 14:15:42', NULL),
(192, NULL, NULL, 'Gray Tie Dye Dad hat', 'gray-tie-dye-dad-hat', 'The Gray Tie Dye custom Dad hat is made of 100% cotton which makes it durable and smooth. It has an adjustable strap back closure that ensures a snug fit. The customized hat has air ventilation holes at the top that keeps you cool in the summer heat. It has a unisex design that makes it fit for both men and women. The pre-curved brim helps to protect your face from the harmful UV rays. This cap hat is a great choice for outdoor activities such as traveling, hiking, camping, cycling, and daily wear. It\'s a perfect gift for men, women, and teenagers. Design your own tie-dye dad cap using our custom hat maker tool. Simply upload your logo or text to create a one-of-a-kind embroidered hat. Features · Cotton material · Pre-curved visor · Buckle closure · Six-panel structure · No minimums', NULL, 28.00, 1, '2025-03-26 14:19:46', '2025-03-26 14:19:46', NULL),
(193, NULL, NULL, 'Heather gray & Black Seven panel trucker hat | Richardson', 'heather -gray & black- seven -panel- trucker- hat -richardson', 'The Heather Gray and Black Richardson seven-panel trucker hat is a classic accessory for all seasons. A favorite choice for people of all generations, this Richardson hat is made of cotton, nylon, and polyester blend, with the backside featuring a polyester mesh design. This structured, high-profile cap features a flat bill and a snapback enclosure for optimum convenience. To add your own creativity into these hats, you can take help from CapBeast. Use our design interface to input your logo, text, and graphics. Our team of designers will get them embroidered on your custom Richardson hat, with premium quality guaranteed. So place an order with CapBeast today, can get your own custom trucker hat.', NULL, 34.00, 1, '2025-03-26 14:21:58', '2025-03-26 14:21:58', NULL),
(194, NULL, NULL, 'Sky Tie Dye Dad hat', 'sky-tie-dye-dad-hat', 'The CapBeast Sky tie-dye custom Dad Hat is made of 100% cotton material, making it the perfect accessory to wear with any outfit. It features a low-profile design, and it is machine washable. The hat has a six-panel construction that provides a large design area, and at the back of the hat is a strapback buckle closure that ensures a perfect fit. The custom hat is incredibly lightweight and comfortable to wear. It has a pre-curved visor that offers you great protection from the sun. This cap will help you stay cooler and protect you from the sun. It’s also stylish and will match most of your outfits. You can now customize your own dad hat that is unique to you using our custom hat maker tool. Simply upload your logo or add text to create a unique custom embroidered hat. Features · Made of 100% cotton · Tie & dye pattern · Pre-curved visor · Low profile · No minimums · Design your own', NULL, 28.00, 1, '2025-03-26 14:29:13', '2025-03-26 14:29:13', NULL),
(195, NULL, NULL, 'Red & Black Seven panel trucker hat | Richardson', 'red & black- seven- panel -trucker- hat-richardson', 'Available in the timeless combination of red and black, the Richardson seven-panel trucker hat is here to redefine comfort and versatility. Featuring a high-profile, structured design, this Richardson hat comes with a mesh design at the back. The front section is made of a high-quality blend to ensure breathability. The snapback enclosure ensures that it fits everyone with ease. At CapBeast, we are dedicated to creating beautifully embroidered custom trucker hats for you. All you need to do is tell us about your choice of logo/text/graphics, and wait for us to emulate them through embroidery. Creating custom Richardson hats is now easier than ever, thanks to CapBeast. So place an order with us, and get ready to sport your custom trucker hat in style.', NULL, 34.00, 1, '2025-03-26 14:30:36', '2025-03-26 14:30:36', NULL),
(196, NULL, NULL, 'Royal & Black Seven panel trucker hat | Richardson', 'royal & black- seven -panel- trucker -hat-richardson', 'The Royal & Black seven-panel trucker hat is a classic choice for all generations. The front section of the Richardson hat is made of a blend of cotton, nylon, and polyester, and the back section comes with a polyester mesh design. This high-profile, seven-panel structured hat features a flat bill, along with a convenient snapback closure for better adjustability. With CapBeast by your side, now you can create custom Richardson hats, with your own logo embossed on them. Insert a text, graphics, or logo into our design interface, and we will embroider the same on your custom trucker hat. So place an order with CapBeast, today.', NULL, 34.00, 1, '2025-03-26 14:37:32', '2025-03-26 14:37:32', NULL),
(197, NULL, NULL, 'Black Low profile trucker hat | Richardson', 'black- low-profile -trucker- hat -richardson', 'Colors come and go, but the appeal of a black hat can never be diminished. The black Richardson low-profile trucker hat features a structured, six-panel design, along with a pre-curved visor. Made of a cotton-polyester blend, the back portion of the Richardson hat comes with a mesh design. It has a convenient snapback closure, making way for a perfect fit. With CapBeast, you can create a custom Richardson hat with just a few clicks. We will get your logo, graphics, and text embroidered on a cap of your choice, with premium quality guaranteed. So order your custom trucker hat, today.', NULL, 33.00, 1, '2025-03-26 14:41:40', '2025-03-26 14:41:40', NULL),
(198, NULL, NULL, 'Black/Charcoal Low profile trucker hat | Richardson', 'black-charcoal -Low-profile- trucker-hat -richardson', 'The Black/Charcoal Richardson low-profile trucker hats are here to offer you comfort and style at one go. Featuring a six-panel design, this structured hat comes with a mesh back design. Made with cotton and polyester blend, the cap is breathable enough to be used in all seasons. The snapback enclosure is another convenient addition, allowing a perfect fit for everyone. Now, in case you\'re interested in creating a custom Richardson hat for yourself, CapBeast is here for you. You have to follow a few simple steps to get your hands on a custom trucker hat. First, insert the logo, text, or graphics of your choice into our user interface. Then, place your order. Our team will replicate the text or logo through embroidery, and add a personalized touch to your Richardson hat.', NULL, 33.00, 1, '2025-03-26 14:47:26', '2025-03-26 14:47:26', NULL),
(199, NULL, NULL, 'Black/Neon pink Low profile trucker hat | Richardson', 'black-neon- pink- low -profile -trucker -hat-richardson', 'Made of a superior cotton-polyester blend, the Black/Neon Pink Richardson low profile hat is all about comfort and versatile style. This vibrant-colored hat features a pre-curved visor, along with a snapback closure for ease of fitting. This structured, six-panel Richardson hat comes with a 100% mesh design at the back, making it stand out from any other hats you might own. Now you can design a custom Richardson hat just by following a few simple steps. Choose a logo, text, and graphics that you love, and add them to our user interface. As soon as you place an order, our team will get your logo and graphics embroidered on the cap. So place an order for a custom trucker hat, today.', NULL, 33.00, 1, '2025-03-26 14:53:22', '2025-03-26 14:53:22', NULL),
(200, NULL, NULL, 'Blue teal/Birch/Navy Low profile trucker hat | Richardson', 'blue -teal -birch- navy- low -profile -trucker -hat-richardson', 'Available in the Blue teal/Birch/Navy variant, this Richardson low profile trucker hat is a must-have in your headwear collection. Made of a premium blend of cotton and polyester, this hat is a comfortable choice for all seasons. It comes with a polyester mesh back, along with a snapback closure for easy fitting. This six-panel, structured Richardson hat features a pre-curved visor. If you\'re interested in creating custom Richardson hats, CapBeast is your best guide. Tell us more about your choice of logo, text, and graphics, and we would get them embroidered on top of your custom trucker hat. So place an order with us, today.', NULL, 33.00, 1, '2025-03-26 15:00:57', '2025-03-26 15:00:57', NULL),
(201, NULL, NULL, 'Sorbet Tie Dye Twill Dad Hat', 'sorbet-tie-dye-twill-dad-hat', 'The Sorbet Tie Dye Twill Dad Hat is made from 100% cotton material that makes it comfortable, feather-light, and breathable. It has a unique tie & dye design that makes it colorful, eye-catching, and trendy. The custom dad hat features an adjustable tri-glide buckle at the back and a trendy strapback closure. It has a pre-curved design that provides great protection from the sun. This hat is a great choice for expressing your style and keeping you cool in the summer heat. The custom embroidered hat has a unisex design that makes it fit for both men and women. Use the CapBeast Custom Hat maker to make a one of a kind custom embroidered hat. Add text to your design or even upload your organization’s logo. Features · Made of cotton material · Pre-curved visor · Adjustable buckle closure at the back · Eyelets · Can be customized with a logo/prints · No minimums · Custom Embroidered', NULL, 32.00, 1, '2025-03-26 15:05:29', '2025-03-26 15:05:29', NULL),
(202, NULL, NULL, 'Brown/Khakhi Low profile trucker hat | Richardson', 'brown-khakhi -low -profile- trucker- hat- richardson', 'Your everyday hat should be comfortable, reliable, and willing to go the long distance with you. The Richardson low profile trucker hat gets the job done without drawing too much attention. Made from a cotton and polyester blend, the Richardson hat features brown/khaki color combination - perfect for the long days under the sun. It\'s not just the color or the six-panel structured fit that makes it a fan favorite, the 100% polyester mesh back makes sure you stay nice and cool for a prolonged period of time. After all, the comfort brings customers back to the Richardson trucker hat every time. If you\'re still on the fence about it, know that you can truly make the custom trucker hat your own. Just let us know your preferred logo or text and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-26 15:07:05', '2025-03-26 15:07:05', NULL),
(203, NULL, NULL, 'Chocolate chip/gray Low profile trucker hat | Richardson', 'chocolate -chip- gray- low- profile -trucker- hat -richardson', 'The Richardson low profile trucker hat in chocolate chip/grey hue is ideal for people who love the outdoors. It has a structured finish that holds its shape even after long hours of wearing it. Thanks to the blend of cotton and polyester, the Richardson hat provides a comfortable experience. It fits in your head perfectly and the six-panel structure ensures you move in style. The polyester mesh back has been added to make sure sweat doesn\'t get the better of you. With the pre-curved visor, you\'re always protected from light glare and sun rays. You can not only get the comfort of Richardson hats, but also the uniqueness of custom trucker hats. We offer custom Richardson hats. All you have to do is send us your texts and patterns and see how we customize the hat for you. Place your order today.', NULL, 33.00, 1, '2025-03-26 15:12:16', '2025-03-26 15:12:16', NULL),
(204, NULL, NULL, 'Coffee/Claret Low profile trucker hat | Richardson', 'coffee-claret- low -profile- trucker-hat -richardson', 'The Richardson hat is the perfect blend of utility and comfort. Made from cotton and polyester, the hat has been designed to give you a superior feel. The structured, six-panel design of the Richardson low profile trucker hat holds its shape even after hours of rough usage. The combination of coffee and claret shades work like charm and is sure to draw some attention. The cap is both versatile and durable. Worried about excessive sweating? The polyester mesh back takes care of the heat without breaking a sweat. The custom Richardson hats come with unlimited possibilities of customization. Just tell us what you want to carry on your hat and we\'ll happily embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-26 15:16:30', '2025-03-26 15:16:30', NULL),
(205, NULL, NULL, 'Cyan/Black Low profile trucker hat | Richardson', 'cyan-black- Low- profile- trucker- hat- richardson', 'If you\'re searching for a light and durable trucker hat, the Richardson hat might be the one you\'re looking for. The Richardson low profile trucker hat is made of a combination of cotton and polyester that offers both comfort and flexibility. The Richardson hat comes with a striking blend of cyan and black shades that are bold celebrations of your personality. It\'s not just the looks, the hat lives up to everything a classic trucker hat stands for. The 100% polyester mesh back quickly dissipates heat, discouraging sweat formation and keeping you cool. The snapback closure rounds off the safety features. You can make the trucker hat truly your own. Tell us your favorite logo, design, or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-26 15:20:45', '2025-03-26 15:20:45', NULL),
(206, NULL, NULL, 'Dark Loden/Jaffa Low profile trucker hat | Richardson', 'dark- loden-jaffa- low -profile -trucker -hat-richardson', 'There\'s nothing like a good ol\' trucker hat that gets the job done without appearing too flashy. The Richardson hat in Dark Loden/Jaffa Orange color embodies the rustic nature. The Richardson low profile trucker hat is all about durability, comfort, and ease of use. You get a blend of cotton and polyester for a superior feeling and a structured, six-panel design for an easy fit. The pre-curved visor takes care of the sun for you while the polyester mesh back makes sure you stay nice and cool. The Richardson trucker hat is a utility product all right but you can still customize it to fit into your personality. You can let us know the texts or logos you want to flaunt on your hat and CapBeast will embroider it on your custom trucker hat. Place your order today.', NULL, 33.00, 1, '2025-03-26 15:25:36', '2025-03-26 15:25:36', NULL),
(207, NULL, NULL, 'Purple Passion Tie Dye Dad hat', 'purple-passion-tie-dye-dad-hat', 'This Purple passion tie dye customized dad hat is made from comfortable and breathable cotton material that makes it sturdy and durable. The material is also comfortable and feels great to the touch. The adjustable unisex custom dad hat has an unstructured six-panel design that provides it with a stylish look. It has an adjustable buckle closure at the back that gives a comfortable fit. It is a low-profile custom hat and looks best with a smaller embroidery on the front. This personalized tie-dye hat has beautiful tie-dye prints that are sure to attract attention wherever you go. You can design your own hat using the CapBeast hat maker. Upload your personalized design or text, and we will turn your creation into a custom-made unique hat. Features · Six-panel structure · Pre-curved visor · Made of100% cotton · Tri-glide buckle closure · Customizable with a logo · No minimums', NULL, 28.00, 1, '2025-03-26 15:28:07', '2025-03-26 15:28:07', NULL),
(208, NULL, NULL, 'Heather gray/Birch Low profile trucker hat | Richardson', 'heather -gray-birch- low- profile- trucker -hat- richardson', 'A light-colored trucker hat with earthy shades should always be in your wardrobe. The Richardson hat is the ideal trucker hat if you\'re looking for a mix of style and durability. The Richardson low profile trucker hat is made of cotton and polyester - you get the softness of cotton and the fit of polyester. The heather grey/birch trucker hat also comes with a lighter mesh back made of polyester. It ensures you can go on with your day without worrying about excessive heat or sweat. The strapback closure bolsters the durability of the cap. You can get your Richardson hat customized to your liking. Just mention your preferred style or text and we\'ll embroider it on your custom trucker hat.', NULL, 33.00, 1, '2025-03-26 15:29:36', '2025-03-26 15:29:36', NULL),
(209, NULL, NULL, 'Pastel Tie Dye Twill Dad Hat', 'pastel-tie-dye-twill-dad-hat', 'The pastel Tie Dye Twill Dad Hat is a low-profile custom hat that is made of 100% cotton. It features a built-in sweatband that helps your head stay cool and dry. The hat has a bright tie-dye design that makes the dad cap look great with any ensemble. The custom embroidered hat can be worn by both men and women and is one size fits all. The adjustable strapback and tri-glide buckle closure makes it fit most head sizes. It features embroidered eyelets that help to keep your head cool. The pre-curved visor protects from harsh UV rays. Design your own custom embroidered hat using the CapBeast hat maker tool by uploading your design or text. Features · Cotton material · Tri-glide buckle closure · One size fit · Tie-die design · Pre-curved visor · No minimums · Custom Embroidered', NULL, 32.00, 1, '2025-03-26 15:32:55', '2025-03-26 15:32:55', NULL),
(210, NULL, NULL, 'Heather gray/Dark charcoal Low profile trucker hat | Richardson', 'heather -gray-dark- charcoal- low- profile -trucker- hat- richardson', 'There\'s nothing like an understated trucker hat that you can wear day in day out. The Richardson hat should be the trucker hat of your choice if you value usability and comfort. The Richardson low profile trucker hat comes in a mix of heather grey and dark charcoal colors. The shades add an earthy touch to the hat while the blend of cotton and polyester takes care of the comfort. The hat also comes with a 100% polyester mesh back to make sure you stay cool and comfortable. The custom trucker hat gives you the freedom to make it uniquely yours. Tell us your favorite pattern or text and we\'ll embroider them on your custom Richardson hats. Order now.', NULL, 33.00, 1, '2025-03-26 15:34:00', '2025-03-26 15:34:00', NULL),
(211, NULL, NULL, 'Heather royal/Silver Low profile trucker hat | Richardson', 'heather- royal-silver low -profile- trucker- hat-richardson', 'Having an everyday trucker hat that you can wear anywhere and for as long as you like is an absolute must. The Richardson hat in heather royal blue and silver is the perfect accessory to head out for the day. The Richardson low profile trucker hat is made of cotton and polyester. You also get a mesh back made from 100% polyester. Thanks to the structured, six-panel design, wearing the hat for a long time won\'t be an issue. The Richardson hat serves its purpose but you can customize it further to make it your own. Let us know your favorite quotes or patterns and we\'ll gladly embroider them on your custom trucker hat. Place your order now.', NULL, 33.00, 1, '2025-03-26 15:38:42', '2025-03-26 15:38:42', NULL),
(212, NULL, NULL, 'Hot pink/Black Low profile trucker hat | Richardson', 'hot- pink- black- low- profile -trucker -hat- richardson', 'Trucker hats should be about you and your personality. They should feel comfortable, and they should last long. The Richardson hat fits the bill perfectly and the hot pink and black shades come together to show your style. The Richardson low profile trucker hat is made from cotton and polyester for the utmost comfort. The 100% polyester mesh back offers proper circulation of heat and discourages sweat formation. It feels good on your head and fits even better. Features like structured, six-panel design and strapback closure make sure the hat stays on you even during hectic hours. We offer custom Richardson hats to our buyers. Just tell us your preferred logo or pattern and we\'ll have them embroidered on your custom trucker hat.', NULL, 33.00, 1, '2025-03-26 15:42:53', '2025-03-26 15:42:53', NULL),
(213, NULL, NULL, 'Loden Low profile trucker hat | Richardson', 'loden -low -profile- trucker -hat -richardson', 'Get an everyday essential in the color of the season. The Richardson hat in loden shade is the trucker hat to flaunt today. The Richardson low profile trucker hat is made of cotton and polyester. It feels good on your head and thanks to the mesh back, it keeps heat and sweat away. The structured hat keeps its shape for a long time and the strapback closure ensures a perfect fit. When it\'s too bright to go out, just wear this trucker hat and the pre-curved visor will protect you. Now get your hat customized at CapBeast. Just tell us what you want to flaunt on your hat and we\'ll embroider it on your custom Richardson hats.', NULL, 33.00, 1, '2025-03-26 15:47:25', '2025-03-26 15:47:25', NULL),
(214, NULL, NULL, 'Smoke blue/Aluminum Low profile trucker hat | Richardson', 'smoke- blue -aluminum -low- profile- trucker -hat- richardson', 'Richardson Smoke Blue/Aluminum Low Profile Trucker Hat – a stylish and comfortable cap with a low-profile fit. Features a breathable mesh back, adjustable snap closure, and durable cotton-poly blend front. Perfect for casual wear, outdoor adventures, or branding.', NULL, 33.00, 1, '2025-03-26 15:52:14', '2025-03-26 15:52:14', NULL),
(215, NULL, NULL, 'White 9Fifty snapback | New Era', 'white-9fifty- snapback-new era', 'Step out in style with the New Era custom 9Fifty snapback. It features the iconic sports and street style look of the classic New Era hats, but the only exception is the open back. This white 6-panel hat comes with an adjustable snapback closure, ensuring a comfortable fit. Made with 100% cotton twill, this hat keeps you company throughout all seasons. The sharp design of the hat makes you stand out from the crowd. Now you can take your love for sports culture to the next level, and design a hat. Add your logo, text, and graphics using our hat maker.', NULL, 31.00, 1, '2025-03-26 15:56:44', '2025-03-26 15:56:44', NULL),
(216, NULL, NULL, 'Navy 9Fifty snapback | New Era', 'navy -9fifty -snapback-new era', 'The Navy 9Fifty snapback from New Era is a street style essential for all ages. It features a structured front panel, offering a crisp shape and optimum stability. To offer a flawless fit, the open back is equipped with a strap closure. Thanks to the pure cotton twill material, this one is your all-year-round companion. Now you can create a custom 9Fifty snapback for yourself, with the help of your very own customized hat maker CapBeast. Here you can add graphics, a logo, or a design of your choice, and create a personalized hat that makes you stand out.', NULL, 31.00, 1, '2025-03-26 16:01:50', '2025-03-26 16:01:50', NULL),
(217, NULL, NULL, 'Black 9Fifty snapback | New Era', 'black- 9fifty -snapback -new era', 'The New Era Black Custom 9Fifty snapback features a 6-panel design, with a structured appearance that gives the cap a flawless shape. It comes with an open backside, with an adjustable snapback closure for precise fitting. This iconic hat is a street style essential, no matter which generation you belong to. The material is 100% premium cotton twill, ensuring equal comfort in every season. Thanks to the evergreen black color, this hat will forever retain its versatile appeal. And if you want to sport a personalized New Era, use the CapBeast hat maker to help you design a hat.', NULL, 31.00, 1, '2025-03-26 16:04:30', '2025-03-26 16:04:30', NULL),
(218, NULL, NULL, 'Charcoal 9Fifty snapback | New Era', 'charcoal- 9fifty- snapback-new era', 'Channel your love for sports with the Charcoal personalized 9Fifty snapback from New Era. As the leading hat maker for sportspersons all across the globe, New Era brings to you a structured, 6-panel design with a flat brim. It is equipped with a convenient strapback enclosure for better adjustability. To maximize comfort, the hat uses 100% cotton twill material. Make use of our custom hat maker to add your logo, text, or graphics.', NULL, 31.00, 1, '2025-03-26 16:07:37', '2025-03-26 16:07:37', NULL),
(219, NULL, NULL, 'Gridiron Training Cap NE700 White Black & Gold | New Era', 'gridiron- training -cap- ne700- white- black & gold-new era', 'The Gridiron Training Cap from New Era is an iconic custom baseball hat for diehard sports fans. The hat resembles Pittsburgh Steelers colors as it comes in a mix of white, black, and gold shades. This custom fitted hat is made from 100% polyester, the Gridiron Training Cap is a durable hat made for the rough days on the field. It has moisture-wicking properties to keep sweat away from the body. On top of that, the stretch fit and elasticized bands make sure the wearer stays comfortable during the long hours. The structured, 6-panel design wraps up the modern aesthetics. Now you can design a hat to make it truly yours. Just add your favorite graphic or text using our custom baseball hat maker.', NULL, 28.00, 1, '2025-03-26 16:12:01', '2025-03-26 16:12:01', NULL),
(220, NULL, NULL, 'Gridiron Training Cap NE700 White Green & Gold | New Era', 'gridiron -training- cap- ne700 -white -green & gold-new era', 'The Gridiron Training Cap from New Era is a stylish custom baseball hat that will keep you nice and cool for a long time. Made from 100% polyester, the hat is both durable and soft. The moisture-wicking properties help in breathability while the elasticized bands make sure it fits perfectly. The Gridiron Training Cap comes in white, green, and gold shades, lining up with the Green Bay Packers colors. The mid-profile, structured cap has a 6-panel design that gives it a modern touch. It’s a custom fitted hat so it comes in multiple sizes. Designing your own hats allows you to create a hat that feels authentic to you. Just add your favorite text or logo to customize the Gridiron Training Cap.', NULL, 28.00, 1, '2025-03-26 16:16:21', '2025-03-26 16:16:21', NULL),
(221, NULL, NULL, 'Gridiron Training Cap NE700 White Gray & Navy | New Era', 'gridiron -training -cap- ne700 -white -gray & navy -new era', 'The Gridiron Training Cap from New Era is the perfect way to show your appreciation for your favorite team. The custom baseball hat comes in a mix of white, gray, and navy shades, resembling the Dallas Cowboys colors. Made from 100% polyester, the Gridiron Training Cap has a structured, 6-panel design with elasticized bands for a superior fit. It\'s a durable hat and the moisture-wicking properties make it a compelling option for Cowboys fans. The inside seams have New Era taping for added individuality. This hat is custom fitted so it comes in multiple sizes. You can get a personalized New Era hat by adding your favorite logo, quote, and graphics to the hat.', NULL, 28.00, 1, '2025-03-26 16:21:04', '2025-03-26 16:21:04', NULL),
(222, NULL, NULL, 'Gridiron Training Cap NE700 White Red & Navy | New Era', 'gridiron- training- cap- ne700- white -red & navy-new era', 'The Gridiron Training Cap from New Era is the ideal custom fitted hat to let you enjoy the thrilling game. The baseball cap has a blend of white, red, and navy shades, resembling the Boston Red Sox colors. Made from 100% polyester, this durable customized hat is the go-to accessory for people who are planning for the outdoors. It has moisture-wicking properties that keep sweat away from the surface of the head. The mid-profile, structured, 6-panel design gives it an ergonomic and attractive look. Thanks to the stretch fit with elasticized bands, the training cap is able to offer superior comfort. Custom hats add a new dimension to standard sportswear. Add your favorite logo or text to make the Gridiron Training Cap from New Era your own.', NULL, 28.00, 1, '2025-03-26 16:25:31', '2025-03-26 16:25:31', NULL),
(223, NULL, NULL, 'Two-tone Piped Fitted Athletic Hat Navy & Gold | New Era', 'two-tone- piped- fitted -athletic- hat -navy & gold-new era', 'The Two-tone Piped Fitted Athletic Hat from hat maker New Era is the ideal accessory for an active day in the field. It has a contrasting blend of navy and gold colors to elevate the sports look. The panels and the top brim of the hat feature 100% polyester double mesh for superior breathability. The moisture-wicking properties discourage sweat formation and maintain the head temperature. The under brim, sides, and piping feature 100% cotton twill for uber comfort. The athletic hat has a 6-panel design and New Era taping on the inside seams for a contemporary look. You can use custom hat embroidery to add a touch of personality and uniqueness.', NULL, 28.00, 1, '2025-03-26 16:32:23', '2025-03-26 16:32:23', NULL);
INSERT INTO `products` (`id`, `brand_id`, `mlb_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(224, NULL, NULL, 'Two-tone Piped Fitted Athletic Hat Red & White | New Era', 'two-tone- piped -fitted -athletic- hat -red & white-new era', 'The Two-Tone Piped Fitted Athletic Hat from New Era is the perfect cap for hardcore baseball caps. Sported by the players of Major League Baseball players, this structured hat offers a comfortable fit, thanks to its stretchable design. The panels and top of the brim are of pure polyester double mesh, and the under brim is made of 100% cotton twill. The breathable and moisture-wicking fabric keeps your head sweat-free, so you can focus on the task at hand. This 6-panel hat comes in a classic combination of red and white, making it all the more versatile and universal. If you want to be your own hat maker and create a custom embroidered hat, simply add your choice of text and logo to this one.', NULL, 28.00, 1, '2025-03-26 16:37:44', '2025-03-26 16:37:44', NULL),
(225, NULL, NULL, 'Vintage Mesh Cap | New Era', 'vintage -mesh-cap-new era', 'The Vintage Mesh Cap from New Era is a classic baseball hat, suitable for people of all generations. Designed for comfort, the front panel of the hat is made of 100% cotton twill, and the mid and back panels feature an 85/15 polyester/spandex mesh. The stretchable fit makes way for convenient fitting. You will be able to pick this structured mid-profile hat from multiple colors. They are characterized by mechanical distressing on the visor, rendering a cool look. If you\'re interested in sporting a personalized New Era cap, just add your choice of text or logo, and make it truly yours.', NULL, 28.00, 1, '2025-03-26 16:53:20', '2025-03-26 16:53:20', NULL),
(226, NULL, NULL, 'Vintage Mesh Cap Black Graphite & White| New Era', 'vintage -mesh -cap -black-graphite & white-new era', 'This Vintage Mesh Cap from New Era comes in a classic combination of black graphite and white. It has a pure cotton twill front panel, with a mid and back panel made of a premium polyester and spandex blend. Thanks to the stretchable elasticized band, it seamlessly fits on heads of all sizes. The mechanical distressing on the visor gives a cool, worn-in touch to this hat, and this unique addition differs in different caps. You will find the brand logo attached to the top of the visor. If desired, you can create customized hats with your logo and graphic embroidered on them.', NULL, 28.00, 1, '2025-03-26 16:59:07', '2025-03-26 16:59:07', NULL),
(227, NULL, NULL, 'Vintage Mesh Cap Blue Gray & White | New Era', 'vintage- mesh- cap- blue- gray & white-new era', 'Available in a combination of royal, gray, and white, this New Era Vintage Mesh Cap is versatile, comfortable, and suitable for people across generations. The visor is accentuated with a mechanical distressed design, along with the brand logo. Featuring a cotton twill front panel, and a polyester blend back and middle panel, this structured mid-profile hat offers a great fit. The stretchable band helps it stay in place, allowing you to go about your day without worrying about keeping your headgear in place. To create a custom embroidered hat, you can choose to add a personalized logo, text, or graphics on the hat, and make it truly unique.', NULL, 28.00, 1, '2025-03-26 17:06:55', '2025-03-26 17:06:55', NULL),
(228, NULL, NULL, 'Melton Wool Strapback Hat | New Era', 'melton- wool- strapback- hat-new era', 'The Melton Wool Strapback hat from New Era has been designed to balance style, comfort, and convenience. The fabric of the hat is a blend of 50% cotton and 45% polyester to make it soft and durable. On top of that, the hat has 5% viscose to add a lightweight and sustainable footprint. The visor of the strapback hat is made of 100% cotton to keep the head nice and cool. It also has adjustable D-clip closure for an easy and hassle-free fit. The 6-panel design and New Era taping on the inside seams round off the aesthetics of the hat. The prominent shade of the hat is graphite heather but the visor comes in multiple colors. To design a hat on your own, insert your favorite logo, design, or graphics to create different types of custom caps.', NULL, 28.00, 1, '2025-03-26 17:27:51', '2025-03-26 17:27:51', NULL),
(229, NULL, NULL, 'Heather Gray & Dark Green Melton Wool Strapback Hat | New Era', 'heather -gray & dark- green -melton -wool- strapback -hat-new era', 'The Melton Wool Strapback Hat from New Era epitomizes comfort and style in a durable package. The hat comes in heather gray while the visor carries a dark green shade. The fabric of the hat is a careful blend of cotton (50%), polyester (45%), and viscose (5%). The visor is made of 100% cotton for seamless heat dissipation. The 6-panel design of the hat maintains a contemporary touch while the adjustable D-clip closure at the back offers a superior fit. You can be a hat maker by adding custom hat embroidery. Just add your favorite logo or text for a unique New Era accessory.', NULL, 28.00, 1, '2025-03-26 17:33:24', '2025-03-26 17:33:24', NULL),
(230, NULL, NULL, 'Heather Gray & Royal Blue Melton Wool Strapback Hat | New Era', 'heather- gray & roya-l blue- melton -wool- strapback- hat-new era', 'The Melton Wool Strapback Hat from New Era is the ideal way to amp up the everyday look without drawing too much attention. The hat comes in a rich blend of heather gray and royal blue. The strapback hat is made of 50% cotton and 45% polyester to offer comfort and durability. 5% viscose has been added in a bid to create a lightweight and sustainable product. The 6-panel design gives it a contemporary look while the adjustable D-clip closure easily wraps around all kinds of head shapes. To get a custom strapback, you can add your favorite logo or text. The personalized New Era hat is going to stay true to your authentic style.', NULL, 28.00, 1, '2025-03-27 11:13:39', '2025-03-27 11:13:39', NULL),
(231, NULL, NULL, 'Black & Gold Mesh stretch fitted hat | New Era', 'black & gold -mesh -stretch- fitted -hat-new era', 'The Black & Gold Mesh stretch fitted hat from New Era not only ensures comfort but also gives off a sporty appearance. The front panel of the hat is made of 100% cotton twill, while the middle and back panels are of pure polyester Spacer mesh. Designed for daily use, this hat promises longevity, and retains its shape even after prolonged use. This 6-panel customized hat offers a stretchable fit, thanks to the elasticized band design. The visor features the New Era brand logo on top of it. If you\'re looking for a custom hat, you can create one by adding text or graphics of your preference.', NULL, 32.00, 1, '2025-03-27 11:17:20', '2025-03-27 11:17:20', NULL),
(232, NULL, NULL, 'Graphite & Cyber Green Mesh stretch fitted hat | New Era', 'graphite & cyber -green- mesh -stretch -fitted -hat-new era', 'This mid-profile stretch-fitted hat from New Era comes in a combination of graphite and cyber green, featuring the brand logo on the visor. Designed for year-round comfort, the front panel has been made of pure cotton twill. The mid and back panel is made of textured polyester Spacer mesh, while the inner seams of the cap carry the New Era taping. Thanks to the elasticized band, it offers a stretchable fit. The 6-panel structured design gives the cap a neat look and allows it to stay in shape for the longest time. If you want to create a custom hat, you can add personalized text or graphics to it.', NULL, 32.00, 1, '2025-03-27 11:24:27', '2025-03-27 11:24:27', NULL),
(233, NULL, NULL, 'Black & White Mesh stretch fitted hat | New Era', 'black & white- mesh -stretch- fitted- hat-new era', 'The Black & White Mesh stretch fitted hat from New Era makes sure you stay nice and comfortable the whole day wearing it. The mid and back panels of the custom fitted hat are made of 100% polyester Spacer mesh which is the ideal material to balance between comfort, ruggedness, and moisture-wicking properties. It\'s a fitted, structured cap that features cotton twill on the front panel. The two-tone design goes well with numerous occasions and the elasticized band takes care of the fit. The New Era personalized hats allow you to carry your personality in your outfits. Just add your favorite graphics or text for a custom embroidered hat.', NULL, 32.00, 1, '2025-03-27 11:28:19', '2025-03-27 11:28:19', NULL),
(234, NULL, NULL, 'Deep Navy Mesh stretch fitted hat | New Era', 'deep -navy -mesh -stretch- fitted -hat-new era', 'The Deep Navy Mesh stretch fitted hat from New Era exudes the timeless charm of New Era hats and blends the style of mesh hats. Made from 100% polyester Spacer mesh, the custom baseball hat which provides superior comfort in the heat. The front panel of the hat is made of 100% cotton twill to soften out the impact of the sun’s rays. It\'s a mid-profile, structured hat with a 6-panel design that looks refreshingly modern. The elasticized band at the back means that it’s also custom fitted and ensures that this hat is a great fit for everyone. The New Era hats can be tweaked to fit individual preferences. To flaunt custom embroidered hats, all you have to do is add your favorite text, logo, and graphics using our hat maker.', NULL, 32.00, 1, '2025-03-27 11:32:24', '2025-03-27 11:32:24', NULL),
(235, NULL, NULL, 'Deep Navy & White Mesh stretch fitted hat | New Era', 'deep-navy & white-mesh -stretch- fitted- hat-new era', 'The Deep Navy & White Mesh stretch fitted hat from New Era is the ideal accessory for people who love to wear customized hats in modern style. The dual-tone hat with a 6-panel design fits into every occasion. Made from 100% polyester Spacer mesh, this New Era custom baseball hat is extremely comfortable and durable at the same time. The structured hat\'s front panel is made of 100% cotton twill and it has an elasticized band at the back. The New Era taping on the inside seams carries the signature aesthetics of the cap. You can design a hat by adding your favorite logo, text, or graphics in our hat maker.', NULL, 32.00, 1, '2025-03-27 11:37:31', '2025-03-27 11:37:31', NULL),
(236, NULL, NULL, 'Black Mesh stretch fitted hat | New Era', 'black- mesh- stretch- fitted- hat-new era', 'The Black Mesh stretch fitted hat from New Era is for those who grind it out every day under the sun. The mid and back panels are made from 100% polyester Spacer mesh to discourage sweat formation and the front panel is made of 100% cotton twill to keep the wearer nice and comfortable. The structured, mid-profile hat has a stretch fit and elasticized band at the back ensures a seamless fit. The bold New Era logo on the front panel and New Era taping on the inside seams round off the aesthetics of this wonderful custom baseball hat. Use our hat maker and customize hats with your logo, graphics or text.', NULL, 32.00, 1, '2025-03-27 11:40:54', '2025-03-27 11:40:54', NULL),
(237, NULL, NULL, 'Royal Mesh stretch fitted hat | New Era', 'royal-mesh- stretch- fitted- hat -new era', 'The Royal Mesh stretch fitted hat from New Era is the ideal hat to elevate everyday looks. The front panel of this custom fitted hat is made of 100% cotton twill while the middle and back panels are made of 100% polyester Spacer mesh to offer both comfort and breathability. The structured, 6-panel design of the hat brings a touch of modernity while covering all the basics of custom baseball hats. It has an elasticized band at the back and unique New Era taping on the inside seams to stand out in the crowd. You can design your own hat by adding your favorite graphics or texts to the hat.', NULL, 32.00, 1, '2025-03-27 11:46:54', '2025-03-27 11:46:54', NULL),
(238, NULL, NULL, 'Red/White Mesh stretch fitted hat | New Era', 'red-white- mesh -stretch-fitted- hat-new era', 'The Red/White Mesh stretch fitted hat from New Era is the ideal choice for people who love bold customized hats that stand out from the crowd. By using 100% cotton twill on the front panel and from 100% polyester Spacer mesh on the mid and back panels, this fitted hat is able to offer a superior balance between comfort and durability under extreme conditions. The structured, mid-profile hat has a 6-panel design, and the distinct logo and taping on the inside seams further make it a unique product. To get a customized hat, just add your favorite logo, graphics or text using our hat maker.', NULL, 32.00, 1, '2025-03-27 11:52:45', '2025-03-27 11:52:45', NULL),
(239, NULL, NULL, 'Dark Green Clean up cap | \'47 Brand', 'dark- green- clean -up- cap-47 brand', 'Whether it’s baseball season or a company event is approaching, this dark green 47 Clean up is perfect for you and your team. With a rounded athletic, curved fit, this low-profile baseball hat is made from high-quality wool blend materials. No structure to the front crown makes sure that these custom baseball hats fit your head snuggly. The curved bill gives you a perfect athletic look. Using the self-adjustable strap closure, you can achieve the right fit for sizes ranging from 6 7/8\" to 7 5/8\". You can increase or decrease the closure’s length for the desired fit. There is a flat embroidered brand logo on the left side of the hat. Moreover, you get enough space to customize hats with your brand logo, business name, or anything you want. Key Features: Fabric: 100% cotton twill, garment-washed Fit: Unstructured, relaxed Style: Adjustable self-fabric strap Bill: Curved Color: Dark green One size fits all Hand wash only', NULL, 34.00, 1, '2025-03-27 11:56:40', '2025-03-27 11:56:40', NULL),
(240, NULL, NULL, 'Maroon Clean up cap | \'47 Brand', 'maroon- clean- up -cap-47 brand', 'Show everyone your sports spirit by wearing this officially licensed custom 47 clean up cap. It’s a relaxed baseball hat made from garment-washed cotton twill material. So, you get a softer look and feel with a comfortable, snug fit. The metal clasp at the back strap ensures an adjustable fit for every head size. So, it’s perfect for men, women, and even kids. If you’re looking for a personalized baseball hat, this clean up cap is a great choice. Besides an embroidered ’47 logo, you get enough space to embroider your logo, quote, or any desired icon. So, use our hat maker and design a hat that’s exceptionally superior, lightweight, breathable, and comfortable. Key Features: Material: 100% cotton twill Fit: Unstructured, relaxed Style: Adjustable back strap closure Bill: Curved Color: Maroon Garment-washed for softer look & feel One size fits all', NULL, 34.00, 1, '2025-03-27 12:00:14', '2025-03-27 12:00:14', NULL),
(241, NULL, NULL, 'Columbia Blue Clean up cap | \'47 Brand', 'columbia -blue- clean-up -cap-47 brand', 'Officially licensed by MLB, this 47 Clean up is made from 100% cotton twill material. The garment-washed fabric brings a thicker and softer appearance while reducing shrinkage after wash. This custom baseball hat fits most, thanks to the adjustable fabric closure on the back; it’s one size fits all. So, it fits comfortably and securely while ensuring maximum comfort at all times. The unisex design makes it suitable for both men and women. Design a hat with a new elevated take on this plain baseball cap. It features embroidered eyelets, panel structure, premium cotton, and a soft feel that brings both comfort and luxury to your day. What’s more, this cool and durable 47 Clean up cap makes a nice present for friends, family, and team members. Key Features: Brand: ‘47 Brand Material: Garment washed 100% cotton twill Fit: Unstructured, relaxed Style: Adjustable back strap closure Bill: Curved Color: Columbia blue Garment-washed for softer look & feel One size fits all Hand wash only', NULL, 34.00, 1, '2025-03-27 12:04:07', '2025-03-27 12:04:07', NULL),
(242, NULL, NULL, 'Charcoal Clean up cap | \'47 Brand', 'charcoal- clean- up- cap -47 brand', 'Flaunting a unique construction and classic style, these charcoal-shaded embroidered caps make the ultimate everyday hat. Made with garment-washed cotton twill material, this cap embodies the brand’s promise of high-quality materials & incredible comfort. It has a flat embroidered brand logo on the left side. The unstructured crown and curved bill make this ’47 Brand cap perfect for customization with your logo or text and it provides a total athletic and functional addition to your wardrobe. An easy-to-use adjustable closure on the back gives a comfortable fit. Just increase or decrease the length of the hook and loop strap for a snuggly and secure fit. Adjust sizes between 6 ⅞” and 7 ⅝”. Design a hat that speaks of your brand or a personalized message in a unique way. You can get a logo, brand name, or any other personalized icon features on these custom baseball hats. Key Features: Fabric: 100% cotton twill Fit: Unstructured Style: Adjustable strapback Bill: Curved Color: Charcoal One size Hand wash only', NULL, 34.00, 1, '2025-03-27 12:12:02', '2025-03-27 12:12:02', NULL),
(243, NULL, NULL, 'Black Clean up cap | 47 Brand', 'black- clean- up -cap -47 brand', 'Are you looking for custom baseball hats for a special event? This ‘47 Clean up provides ample space for customization. It’s made from 100% cotton twill fabric and ensures a comfortable fit for hours. That garment-washed material guarantees the softness and unique elegance you might be looking for. The cap features a raised embroidered ’47 brand logo. You can customize hats by leveraging the blank space with your logo, brand name, or anything you like. It fits every head size – men and women, thanks to the adjustable strap on the back. The eyelets on the top will wick away any moisture while keeping your head cool by allowing adequate ventilation. This 47 Clean up baseball cap is perfect for everyday use. Despite regular wash, the cap develops a naturally worn, vintage charm. It can retain its softness and flexibility with the right care. Key Features: Fabric: 100% cotton twill Fit: Unstructured Style: Adjustable strapback Bill: Curved Color: Black Garment washed for softer look and feel One size fits all Hand wash only', NULL, 34.00, 1, '2025-03-27 12:15:15', '2025-03-27 12:15:15', NULL),
(244, NULL, NULL, 'White Clean up cap | \'47 Brand', 'white -clean- up -cap-47 brand', 'You\'ll love this custom ‘47 clean up cap. This white dad-hat-style baseball cap adds an active, athletic style to your entire look. Available in many other colors, this unstructured cap offers a snuggly fit to heads of all sizes. Garment-washed cotton twill fabric makes it look and feel soft. The adjustable back strap makes them one-size-fits-all adult heads – men and women. Another best thing about this baseball hat as a giveaway is that it’s extremely useful. It protects the wearer from sunshine and also keeps your secret on a bad hair day. This low-profile personalized baseball hat is sure to be hit at your next group event. So, put something nice on the front and design a hat that best speaks of your unique personality. Key Features: Material: 100% cotton twill Fit: Unstructured, relaxed Style: Adjustable back strap closure Bill: Curved Color: White Garment-washed for softer look & feel One size fIts all', NULL, 34.00, 1, '2025-03-27 12:20:18', '2025-03-27 12:20:18', NULL),
(245, NULL, NULL, 'Navy Clean up cap | \'47 Brand', 'navy- clean -up- cap -47 brand', 'This 47 Clean up baseball hat is an updated classic that would best reflect your brand personality without breaking the budget. The low-profile crown, curved visor, and navy color make it a fresh take on classic baseball caps. If you’re looking for custom baseball hats, it’s a great accessory to pick. It has ample space for the placement of your brand, logo, or any other icon of your choice. Pairing this with the embroidered ’47 brand logo on the left, this is sure to impress the crowd. This unisex 47 Clean Up baseball hat is one size fits all, with a size ranging between 6 7/8\" and 7 5/8\". The soft cotton twill fabric looks classic while embroidered eyelets help with ventilation. So, make a custom embroidered hat using our hat maker that makes you or your business stand out. Key Features: Material: 100% cotton twill Fit: Unstructured, relaxed Style: Adjustable back strap closure Bill: Curved Color: Navy Garment-washed for softer look & feel One size', NULL, 34.00, 1, '2025-03-27 12:24:56', '2025-03-27 12:24:56', NULL),
(246, NULL, NULL, 'MVP hat | \'47 Brand', 'mvp hat | \'47 brand', 'Infuse fun and a stylish look to your personality with this ‘47 MVP hat. Available in various many attractive colors, this custom baseball hat is comfortable to wear, even for long hours. It can be matched perfectly with almost any outfit. This mid-profile baseball hat’s look and feel make it a go-to everyday hat. It is made of wool blend materials which give unmatched comfort to the wearer. This hat is perfect for your team, business, or just for yourself to wear casually. Furthermore, the embroidered ‘47 Brand logo on the left side and curved visor make this cap really stand out. Select from the colors that suit your personality and add 47 MVP hats to your fashion lineup. Use CapBeast’s custom hat maker to design a custom embroidered hat that suits you. Key Features: Fabric: 15% Wool, 85% acrylic Colors: Red, Charcoal, Navy, White, and Black Size: One size fits all Uses: Casual/sports/travel Soft and comfortable', NULL, 34.00, 1, '2025-03-27 12:41:46', '2025-03-27 12:41:46', NULL),
(247, 29, NULL, 'Cotton strapback hat | CapBeast', 'cotton-strapback-hat-capbeast', 'With CapBeast, create a custom hat that allows you to be at your productive best. Here we have a wide range of Cotton Strapback Hats, available in a host of colors. Made with 100% cotton twill, the caps don\'t lose their shape even when you use them for a long time. They come with adjustable velcro straps for more convenience. Classic structured hats like these never go out of style, thanks to the comfort they have to offer. Now, to make these simple caps a lot more interesting, you can choose to add embroidered text and get it customized. So it\'s time to put on a custom hat from the house of CapBeast, today.', NULL, 32.80, 1, '2025-03-27 14:42:58', '2025-03-27 14:42:58', NULL),
(248, 19, NULL, 'Athletic Hat | Adidas', 'athletic-hat-adidas', 'The Adidas Athletic custom hat features a sturdily-made cotton exterior and an interior sweatband that wicks away sweat and keeps you cool in the summer heat. It has a pre-curved brim that shields you from the sun. At the back of the cap is a classic strapback that ensures a custom fit. The side of the hat features an Adidas logo that keeps you stylish and guarantees the authenticity of your hat. The athletic wear hat has a breathable mesh panel at the back that keeps you cool. Design your own hat using the CapBeast custom hat maker. It allows you to upload your own logo or text to make a one of kind Adidas hat. Features • Cotton material • Precurved brim • Adidas logo on the side • Breathable mesh panel • Snapback closure', NULL, 36.00, 1, '2025-03-27 15:02:33', '2025-03-27 15:02:33', NULL),
(249, 29, NULL, 'Beanie hat | CapBeast', 'beanie-hat-capbeast', 'Simple and classic with clean lines, when something is this good there’s no need to change it. You cover your head because you need to, now you can cover it with something that gives you the comfort and protection you need while looking good. Comes in a variety of show-stopping colors, or neutrals if that’s more your thing. This one size fits most beanie is 8\" in length overall and is made from 100% acrylic. We embroider your design or text directly on the beanie making it a truly custom hat.', NULL, 14.00, 1, '2025-03-27 15:33:40', '2025-03-27 15:33:40', NULL),
(250, 29, NULL, 'Cuffed Beanie | CapBeast', 'cuffed-beanie-capbeast', '<p>The custom cuffed knit beanie from CapBeast is made from premium-quality material and are 100% acrylic and comes in a variety of colors. The heather gray beanie is 62% acrylic and 38% polyester. The heather charcoal beanie is 80% polyester and 20% acrylic. Other heather colors of these beanie hats are 50% acrylic and 50% polyester. All these winter hats are highly flexible, soft, warm, and comfortable to wear. Moreover, these beanie hats match well with every outfit in your wardrobe. Use the CapBeast custom hat maker to design a beanie that is completely personalized and custom embroidered to your specifications. Key Features: Material: 100% Acrylic Colors: Black, Orange, Brown, Camel, Heather Charcoal, Heather Gray, and more Heather Grey is 62/38 acrylic/ polyester Heather Charcoal is 80/20 polyester/ acrylic Other Heather colors are 50/50 acrylic/ polyester Style: Cap with 12\" knit Adjustable cuff</p>', NULL, 14.00, 1, '2025-03-27 16:04:05', '2025-03-27 16:04:05', NULL),
(251, 28, 6, 'Cincinnati Reds 1968 Cooperstown Clean Up Cap | \'47', 'cincinnati-reds-1968-cooperstown-clean-up-cap-47', '<p>Introducing the Cincinnati Reds 1968 Cooperstown Clean Up Cap from \'47 Brand - the perfect way to show your true colours and support your team! Made from garment-washed cotton for a soft feel, this relaxed and curved dad-style cap is extremely comfortable to wear all day and night. And with its adjustable pull-through back fabric strap, it\'s guaranteed to give you the perfect fit every time. So don\'t hesitate - get your hands on the Cincinnati Reds 1968 Cooperstown Clean Up Cap from \'47 Brand today</p>', NULL, 34.00, 1, '2025-03-28 03:10:56', '2025-03-28 03:11:41', '2025-03-28 03:11:41'),
(252, 28, 2, 'Atlanta Braves 1972 Cooperstown clean up cap | \'47', 'atlanta-braves-1972-cooperstown-clean-up-cap-47', '<p>Looking for a way to show off your favourite team with some old school flair? Check out this \'47 Brand Cooperstown Collection Clean Up hat, perfect for any dedicated Atlanta Braves fan. This hat features the classic Atlanta Braves look from the past, complete with embroidered graphics and raised details. It\'s officially licensed by the MLB, and its 100% cotton construction makes it surface washable for easy care. It also has an adjustable strap closure for a comfortable, custom fit. Whether you\'re wearing it to the game or just out and about, this hat is sure to show everyone where your loyalty lies.</p>', NULL, 34.00, 1, '2025-03-28 03:18:01', '2025-03-28 12:27:25', '2025-03-28 12:27:25'),
(253, 28, 6, 'Cincinnati Reds 1968 Cooperstown Clean Up Cap | \'47', 'cincinnati-reds-1968-cooperstown-clean-up-cap-47', '<p>Introducing the Cincinnati Reds 1968 Cooperstown Clean Up Cap from \'47 Brand - the perfect way to show your true colours and support your team! Made from garment-washed cotton for a soft feel, this relaxed and curved dad-style cap is extremely comfortable to wear all day and night. And with its adjustable pull-through back fabric strap, it\'s guaranteed to give you the perfect fit every time. So don\'t hesitate - get your hands on the Cincinnati Reds 1968 Cooperstown Clean Up Cap from \'47 Brand today!</p>', NULL, 34.00, 1, '2025-03-28 03:19:10', '2025-03-28 12:27:33', '2025-03-28 12:27:33'),
(254, 28, 2, 'Atlanta Braves 1981 Cooperstown clean up cap | \'47', 'atlanta-braves-1981-cooperstown-clean-up-cap-47', '<p>Introducing the Atlanta Braves 1981 Cooperstown clean up cap from \'47 Brand! This relaxed and curved adjustable strapback is made from reversed garment washed cotton twill and features raised embroidery on the front. It\'s the perfect way to show your support for your favourite team!</p>', NULL, 34.00, 1, '2025-03-28 03:23:27', '2025-03-28 03:49:26', '2025-03-28 03:49:26'),
(255, 28, 6, 'Cincinnati Reds Clean Up Cap | \'47 Brand', 'cincinnati-reds-clean-up-cap-47-brand', '<p>The \'47 Clean Up is the perfect choice for baseball fans who want to show off their team spirit in style. Made from garment-washed cotton twill, it features a relaxed fit and retro look. The Cincinnati Reds logo is embroidered on the front, and the strapback closure ensures a comfortable, one-size-fits-most fit. Whether you\'re cheering on your team from the stands or just showing your support around town, this cap is a must-have for any true fan.</p>', NULL, 34.00, 1, '2025-03-28 03:40:29', '2025-03-28 03:49:17', '2025-03-28 03:49:17'),
(256, NULL, NULL, 'White MVP hat | \'47 Brand', 'white-mvp-hat-47-brand', '<p>Whether you are a baseball player or want to design a custom baseball hat for your own team, ‘47 brand MVP hats are a perfect choice. This classic white hat is not only best for baseball players but can be worn on the streets by anyone. This ‘47 MVP hat in white color looks so stylish and tidy to wear. It is made of wool blend material and is comfortable to wear every day. There is a brand logo on the left side, making it a stylish hat for fashion aficionados. The MVP hat is ‘one size fits all, which means that it has an adjustable velcro back strap to give you a comfortable fit for sizes ranging from 6 ⅞\" to 7 ⅝\". You can increase or decrease the closure\'s length for the desired fit. The best thing about designing your own hat is that you can have your logo or text custom embroidered using our baseball hat maker. Key Features Material: 15% wool and 85% acrylic Color: White Style: Baseball hat Size: Fit sizes to all Adjustable velcro back strap Curved bill Hand wash only</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 09:09:09', '2025-03-28 09:09:09', NULL),
(257, NULL, NULL, 'Red MVP hat | \'47 Brand', 'red-mvp-hat-47-brand', '<p>If you are looking to design a custom baseball hat, the red MVP hat is for you. The MVP can be worn with any ensemble. With a unique style and construction, this red-colored embroidered cap makes the ultimate everyday hat. The ‘47 Brand MVP hats are is made of high-quality woolen blend material and are very comfortable to wear. An easy-to-use adjustable strap on the back allows you to increase or decrease the size of the hat for a secure fit. You can adjust the sizes between 6 ⅞\" and 7 ⅝\". Moreover, the structured crown and curved visor make this cap more stylish and perfect for any wardrobe. Make custom embroidered caps using our hat maker tool. Key Features Fabric: 15% wool and 85% acrylic Fit: Structured Style: Adjustable strap Color: Red One size fits all Hand wash only</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 09:12:08', '2025-03-28 09:12:08', NULL),
(258, NULL, NULL, 'Navy MVP hat | \'47 Brand', 'navy-mvp-hat-47-brand', '<p>When you are in search of a high-quality yet comfortable baseball hat, \'47 Brand MVP is a great option. This navy-colored custom baseball hat is very comfortable to wear while playing, practicing, or watching the game. You can also wear it every day with any outfit to look good and fashionable. The 47 Brand MVP is made out of wool and acrylic material which is soft to feel and touch. Also, the hat features a 47 Brand ogo on the left side, which makes it a more unique and aesthetic baseball cap. And, if you\'re searching for custom baseball hats, this \'47 Brand MVP makes a perfect choice for your company logo. Upload your design using our hat maker and create the perfect design for you. Key Features: Material: 15% wool and 85% acrylic Color: Navy Style: Hat Size: One size fits all Hand washable only</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 09:15:08', '2025-03-28 09:15:08', NULL),
(259, NULL, NULL, 'Charcoal MVP hat | \'47 Brand', 'charcoal-mvp-hat-47-brand', '<p>Flaunting a classic style, this charcoal-colored custom 47 MVP cap makes the ultimate everyday hat for you. It is made of high-quality wool blend material, which is soft and comfortable to wear for long hours. An embroidered brand logo on the left side of this hat gives it a classy look. Furthermore, this personalized baseball hat is one size fits all that features an adjustable velcro back strap to provide you with a comfortable fit. The best part is that making customized hats has never been easier. Use our custom hat maker to upload your design or text and create a personalized hat that’s perfect for you. Key Features: Fabric: 15% wool and 85% acrylic Style: Adjustable strap back Bill: Curved visor Color: Charcoal One size fits all Hand wash only</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 09:18:03', '2025-03-28 09:18:03', NULL),
(260, NULL, NULL, 'Black MVP hat | \'47 Brand', 'black-mvp-hat-47-brand', '<p>This black 47 MVPhat is a great staple for your stylish wardrobe. It\'s lined with 15% wool and 85% acrylic that is comfortable to wear for long hours. The sleek, custom baseball hat fits comfortably on any head size and is easy to wear as well. There is a back strap with which you can easily adjust. The black cap with a white embroidered logo on its left side looks great with every outfit. Use our hat maker to design an embroidered cap that is perfect for you. Key Features: Material: 15% wool and 85% acrylic Color: Black Style: hat Soft and comfortable fit One size fits all Hand wash only</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 09:20:30', '2025-03-28 09:20:30', NULL),
(261, NULL, NULL, 'Red Athletic Hat | Adidas', 'red-athletic-hat-adidas', '<p>With its top-quality construction and double stitching, the Red Adidas athletic custom hat is the perfect summer accessory for any ensemble. With an unstructured six panel frame and low profile construction, this hat is perfect for Golf, baseball or even working out at the gym. The front features a a pre-curved visor made from a high-quality cotton material to shield you from the sun. It has a breathable mesh panel that ensures maximum ventilation in the summer heat. The back of the custom dad hat is a snapback closure for a custom fit. Design your own using our hat creator tool. You can embroider your own logo or text to make a hat that is unique to you. Features • Brushed cotton twill • Precurved visor • Adidas flip buckle and grommet • Embroidered Adidas logo on the side</p><p><br>&nbsp;</p>', NULL, 36.00, 1, '2025-03-28 09:26:07', '2025-03-28 09:26:07', NULL),
(262, NULL, NULL, 'Navy Athletic Hat | Adidas', 'navy-athletic-hat-adidas', '<p>The Adidas Navy Athletic hat features an adjustable strapback buckle and closure suitable for all head sizes. The custom hat is made of brushed cotton material that is naturally absorbent and comfortable. It has a mesh back that makes it highly breathable and keeps you cool in the summer heat. It has an embroidered Adidas logo. The hat has a pre-curved visor that protects you from the sun. In the interior is a black under-visor that helps to reduce the glare from the sun. This hat is perfect for Golf, working out at the gym or just as your everyday go to hat. You can also customize the front panel with your own custom embroidered logo. additional logos or printing using our Capbeast hat maker. Features • Brushed cotton material • Adidas logo on the side • Customizable front panel • Adjustable size • Mesh back</p><p><br>&nbsp;</p>', NULL, 36.00, 1, '2025-03-28 09:29:00', '2025-03-28 09:29:00', NULL),
(263, NULL, NULL, 'Navy Athletic Hat | Adidas', 'navy-athletic-hat-adidas', '<p>The Adidas Navy Athletic hat features an adjustable strapback buckle and closure suitable for all head sizes. The custom hat is made of brushed cotton material that is naturally absorbent and comfortable. It has a mesh back that makes it highly breathable and keeps you cool in the summer heat. It has an embroidered Adidas logo. The hat has a pre-curved visor that protects you from the sun. In the interior is a black under-visor that helps to reduce the glare from the sun. This hat is perfect for Golf, working out at the gym or just as your everyday go to hat. You can also customize the front panel with your own custom embroidered logo. additional logos or printing using our Capbeast hat maker. Features • Brushed cotton material • Adidas logo on the side • Customizable front panel • Adjustable size • Mesh back</p><p><br>&nbsp;</p>', NULL, 36.00, 1, '2025-03-28 09:29:02', '2025-03-28 09:29:02', NULL),
(264, NULL, NULL, 'Royal Athletic Hat | Adidas', 'royal-athletic-hat-adidas', '<p>The Adidas Royal Athletic custom Hat is the perfect hat for wearing at the gym or even playing golf. It features an adjustable strapback which means that the hat is one size fits most. The custom Adidas hat\'s back is a mesh that ensures breathability. It has a black interior visor that offers good protection from the outdoors. The is breathable, comfortable, and moisture-wicking, preventing sweat buildup. The golf cap has a pre-curved brim that will rebound well after being stored in a bag. Combined with the low profile of athletic wear, the visor offers excellent protection from the sun. Whether you wear it when running, cycling, working out, or weekend, this athletic wear will keep you comfortable and stylish. You can also design your own by using the CapBeast hat maker tool. Features Made of cotton material Adidas logo on the side Pre-curved visor Mesh back</p><p><br>&nbsp;</p>', NULL, 36.00, 1, '2025-03-28 09:32:07', '2025-03-28 09:32:07', NULL),
(265, NULL, NULL, 'White Athletic Hat | Adidas', 'white-athletic-hat-adidas', '<p>The Adidas white athletic hat features a lightly padded front section that makes it comfortable to wear. It’s made of soft cotton and it features a pre-curved brim that offers additional protection from the sun\'s harsh rays. Made of quality cotton, this customized Adidas hat has moisture-wicking fabric to keep you cool and dry. The hat\'s back is an Adidas adjustable strapback that ensures a perfect fit. With its half-moon mesh back that provides ventilation, this hat is the perfect accessory for all your outdoor activities. It has an Adidas logo on the side that guarantees its authenticity. Features • Cotton material • White in color • Pre-curved visor • Embroidered Adidas logo • Buckle and grommet closure</p><p><br>&nbsp;</p>', NULL, 36.00, 1, '2025-03-28 09:35:26', '2025-03-28 09:35:26', NULL),
(266, NULL, NULL, 'Gray Athletic Hat | Adidas', 'gray-athletic-hat-adidas', '<p>This custom Adidas Athletic hat offers the comfort and style of the everyday golf hat while providing the performance needed for hitting the outdoors. The cotton material also has moisture-wicking properties that absorb the sweat while providing the necessary comfort to wear your hat all day long. The Adidas golf hat has a mesh back that offers breathability in the summer heat. The pre-curved visor provides additional protection from the sun. The custiomized hat has an adjustable strapback at the back to fit different head sizes. Make your own hat by using the CapBeast hat maker. Upload your logo or text to create a one of a kind embroidered Adidas hat. Features 100% cotton material Pre-curved visor Gray in color Mesh material at the back</p><p><br>&nbsp;</p>', NULL, 36.00, 1, '2025-03-28 09:39:16', '2025-03-28 09:39:16', NULL),
(267, NULL, NULL, 'Multi Cam Classic Snapback | Yupoong', 'multi-cam-classic-snapback-yupoong', '<p>This custom baseball hat is made for the outdoor enthusiast who loves a minimalistic and subtle design. Made of cotton and spandex material, it\'s comfortable and has moisture-wicking properties. The hat features a snapback closure that makes it one size fits all. It has a high profile which makes it perfect for customization and the snapback closure makes it one size fits all. The hat has a flat brim that makes it trendy and stylish. It has a green under-visor that offers excellent protection from the sun\'s rays. At the back is a mesh material that ensures breathability. It has a sewn eyelet that helps to keep you cool in the summer heat. This customized hat is a must-have accessory for those who love the outdoors on hot days. You can create a custom baseball hat by adding your favorite logo or print on the front panel. You can do that using our CapBeast hat maker tool. Features • Made of 98% cotton and 2% spandex • High profile hat • Flat visor with green undervisor • Sewn eyelet</p><p><br>&nbsp;</p>', NULL, 27.00, 1, '2025-03-28 10:38:24', '2025-03-28 10:38:24', NULL),
(268, NULL, NULL, 'MultiCam Light Green Dad Hat | Yupoong', 'multicam-light-green-dad-hat-yupoong', '<p>The Yupoong Multicam Light Green custom dad hat has all the functionality needed for outdoor activities. It\'s breathable and moisture-wicking making it perfect for casual wear, hunting, fishing, running, etc. Made of cotton and spandex, it\'s comfortable, durable and feels good on the skin. It has a flat visor which maximizes protection from sunlight. It also features a black under-visor. The personalized hat has embroidery on the visor that adds to its stylish look. It has a snapback closure at the back to ensure a custom fit. The custom dad hat has a light green color that makes it perfect for the outdoors. Design your own custom hat by using our hat maker tool. Upload your own logo or design and we\'ll embroider it on the hat. Features • Made of cotton and spandex material • Flat visor • Black under-visor • Sewn eyelets</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 10:44:21', '2025-03-28 10:44:21', NULL),
(269, NULL, NULL, 'Multicam Dark Green Dad Hat | Yupoong', 'multicam-dark-green-dad-hat-yupoong', '<p>The Yupoong Multicam dark green hat is made of cotton material and has moisture-wicking properties that make it extremely comfortable for wearing for all types of activities. The hat has a pre-curved visor that offers good protection from the sun. It has a six-panel brim which means that it has plenty of space to feature your custom embroidered design. The hat features a strapback closure providing an adjustable fit. This camo strap back has a structured form that is stylish and durable. The back of the hat is a mesh that keeps you cool in the hot weather. Design your own by using our custom hat maker. Features • Cotton material • Pre-curved visor • Low profile • Buckle closure</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 10:47:41', '2025-03-28 10:47:41', NULL),
(270, NULL, NULL, 'Tie Dye Twill Dad Hat', 'tie-dye-twill-dad-hat', '<p>Add fun and color to your look with the Tie-Dye customized Dad Hat. It’s made of 100% cotton, making it comfortable to wear and soft to the touch. The custom embroidered hat has six air ventilation holes on top to ensure good breathability. The pre-curved brim and the cotton fabric work hand in hand to protect you from the harsh UV rays. It has a tri-glide buckle closure that ensures a perfect fit. The hat is machine washable and easy to care for. Personalize your own by using the CapBeast custom hat maker. Upload your design or text to create a unique custom hat. No minimum-sized orders. Features · Cotton material · Buckle closure · Pre-curved visor · eyelets · No minimums · Design your own</p><p><br>&nbsp;</p>', NULL, 32.00, 1, '2025-03-28 10:56:48', '2025-03-28 10:56:48', NULL),
(271, NULL, NULL, 'Grayscale Tie Dye Twill Dad Hat', 'grayscale-tie-dye-twill-dad-hat', '<p>This Grayscale Tie Dye Twill custom embroidered Dad Hat features an unstructured six-panel design that makes it stylish and suitable for all head sizes. With its low profile, it can be worn by people of all ages. The custom hat is one size fits all and features an adjustable strapback with a tri-glide buckle closure that enables you to adjust it to fit the size of your head. It features a pre-curved visor that offers protection from the sun while making you look stylish. The personalized hat is easy to care for as it can be hand-washed or machine-washed. It’s an excellent gift item for both men and women. Design your own custom hat using the CapBeast hat maker. Use your own design or text to create a unique hat for you or your business. Features · 100% cotton material · Tie&amp; die pattern · Six-panel profile · Pre-curved visor · Buckle closure · No minimums · Custom Embroidered</p><p><br>&nbsp;</p>', NULL, 32.00, 1, '2025-03-28 11:00:15', '2025-03-28 11:00:15', NULL),
(272, NULL, NULL, 'Pastel Tie Dye Twill Dad Hat', 'pastel-tie-dye-twill-dad-hat', '<p>The pastel Tie Dye Twill Dad Hat is a low-profile custom hat that is made of 100% cotton. It features a built-in sweatband that helps your head stay cool and dry. The hat has a bright tie-dye design that makes the dad cap look great with any ensemble. The custom embroidered hat can be worn by both men and women and is one size fits all. The adjustable strapback and tri-glide buckle closure makes it fit most head sizes. It features embroidered eyelets that help to keep your head cool. The pre-curved visor protects from harsh UV rays. Design your own custom embroidered hat using the CapBeast hat maker tool by uploading your design or text. Features · Cotton material · Tri-glide buckle closure · One size fit · Tie-die design · Pre-curved visor · No minimums · Custom Embroidered</p><p><br>&nbsp;</p>', NULL, 32.00, 1, '2025-03-28 11:03:03', '2025-03-28 11:03:03', NULL),
(273, NULL, NULL, 'Sorbet Tie Dye Twill Dad Hat', 'sorbet-tie-dye-twill-dad-hat', '<p>The Sorbet Tie Dye Twill Dad Hat is made from 100% cotton material that makes it comfortable, feather-light, and breathable. It has a unique tie &amp; dye design that makes it colorful, eye-catching, and trendy. The custom dad hat features an adjustable tri-glide buckle at the back and a trendy strapback closure. It has a pre-curved design that provides great protection from the sun. This hat is a great choice for expressing your style and keeping you cool in the summer heat. The custom embroidered hat has a unisex design that makes it fit for both men and women. Use the CapBeast Custom Hat maker to make a one of a kind custom embroidered hat. Add text to your design or even upload your organization’s logo. Features · Made of cotton material · Pre-curved visor · Adjustable buckle closure at the back · Eyelets · Can be customized with a logo/prints · No minimums · Custom Embroidered</p><p><br>&nbsp;</p>', NULL, 32.00, 1, '2025-03-28 11:05:51', '2025-03-28 11:05:51', NULL),
(274, NULL, NULL, 'Tie Dye Dad Hat', 'tie-dye-dad-hat', '<p>This Tie Dye custom Dad Hat is a classic and stylish cap that combines colorful styles and comfort. It’s made of 100% cotton material making it cozy to wear all day long. The strapback buckle closure at the back ensures a perfect fit. At the front is a pre-curved visor that protects your head from UV rays. The soft cotton also makes it packable and crushable so that you can carry it anywhere. This custom dad hat is designed to be unisex. It has six panels and a low structure that makes it stylish for the young and old. Design your own custom embroidered tie-dye hat with the Capbeast hat maker using your own logo or text. Features · Cotton material · Pre-curved visor · Six panels structure · Tri-glide buckle closure · No minimums</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 11:21:50', '2025-03-28 11:21:50', NULL),
(275, NULL, NULL, 'Cotton Candy Tie Dye Dad hat', 'cotton-candy-tie-dye-dad-hat', '<p>The cotton candy tie dye custom dad hat is made of cotton which makes it comfortable and soft on the skin. It has beautiful and unique prints that are perfect for designing your own hat and it makes you stand out from the crowd. At the back is a pre-curved visor that helps to protect your face from the sun when you are outdoors. The front crown of the personalized tie-dye hat can be folded and unfolded while still retaining its shape. It features a strapback buckle closure that allows you to adjust the size to fit your head. The personalized hat has a hard structure at the top that improves its overall look. This is the perfect choice for Golf, athletic activities or just for casual wearing. Design your own tie-dye hat using the Capbeast hat maker tool. Simply upload your company logo, personalized design or text and we will stitch it on the hat. Features · Made of 100% cotton · One-size fit · Pre-curved visor · Low profile · Adjustable strapback closure · No minimums</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 11:24:40', '2025-03-28 11:24:40', NULL),
(276, NULL, NULL, 'Gray Tie Dye Dad hat', 'gray-tie-dye-dad-hat', '<p>The Gray Tie Dye custom Dad hat is made of 100% cotton which makes it durable and smooth. It has an adjustable strap back closure that ensures a snug fit. The customized hat has air ventilation holes at the top that keeps you cool in the summer heat. It has a unisex design that makes it fit for both men and women. The pre-curved brim helps to protect your face from the harmful UV rays. This cap hat is a great choice for outdoor activities such as traveling, hiking, camping, cycling, and daily wear. It\'s a perfect gift for men, women, and teenagers. Design your own tie-dye dad cap using our custom hat maker tool. Simply upload your logo or text to create a one-of-a-kind embroidered hat. Features · Cotton material · Pre-curved visor · Buckle closure · Six-panel structure · No minimums</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 11:26:50', '2025-03-28 11:26:50', NULL),
(277, NULL, NULL, 'Purple Passion Tie Dye Dad hat', 'purple-passion-tie-dye-dad-hat', '<p>This Purple passion tie dye customized dad hat is made from comfortable and breathable cotton material that makes it sturdy and durable. The material is also comfortable and feels great to the touch. The adjustable unisex custom dad hat has an unstructured six-panel design that provides it with a stylish look. It has an adjustable buckle closure at the back that gives a comfortable fit. It is a low-profile custom hat and looks best with a smaller embroidery on the front. This personalized tie-dye hat has beautiful tie-dye prints that are sure to attract attention wherever you go. You can design your own hat using the CapBeast hat maker. Upload your personalized design or text, and we will turn your creation into a custom-made unique hat. Features · Six-panel structure · Pre-curved visor · Made of100% cotton · Tri-glide buckle closure · Customizable with a logo · No minimums</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 11:30:39', '2025-03-28 11:30:39', NULL);
INSERT INTO `products` (`id`, `brand_id`, `mlb_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(278, NULL, NULL, 'Raspberry Mist Tie Dye Dad hat', 'raspberry-mist-tie-dye-dad-hat', '<p>This Raspberry Mist Tie Dye custom Dad hat has beautiful prints that provide you with an exquisite appearance and helps you stand out from the crowd. The hat is made of high-quality cotton material that makes it comfortable, sweat-proof, and odor-fighting. It can be adjusted with a tri-glide buckle at the back which makes it suitable for all head sizes. The unisex personalized tie-dye hat has gorgeous colors that will make you stand out from the crowd. This customized hat is a great choice for running, shopping, outdoor, summer, spring, and any other outdoor occasion and makes a great gift for anyone in the family. Use the custom hat maker tool to upload your own logo or add personalized text to create a one-of-a-kind custom tie-dye dad hat. Features · Pre-curved visor · Buckle closure · Cotton material · Low profile · Six-panel structure · No minimums</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 11:33:38', '2025-03-28 11:33:38', NULL),
(279, NULL, NULL, 'Sky Tie Dye Dad hat', 'sky-tie-dye-dad-hat', '<p>The CapBeast Sky tie-dye custom Dad Hat is made of 100% cotton material, making it the perfect accessory to wear with any outfit. It features a low-profile design, and it is machine washable. The hat has a six-panel construction that provides a large design area, and at the back of the hat is a strapback buckle closure that ensures a perfect fit. The custom hat is incredibly lightweight and comfortable to wear. It has a pre-curved visor that offers you great protection from the sun. This cap will help you stay cooler and protect you from the sun. It’s also stylish and will match most of your outfits. You can now customize your own dad hat that is unique to you using our custom hat maker tool. Simply upload your logo or add text to create a unique custom embroidered hat. Features · Made of 100% cotton · Tie &amp; dye pattern · Pre-curved visor · Low profile · No minimums · Design your own</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 11:37:12', '2025-03-28 11:37:12', NULL),
(280, NULL, NULL, 'Flat bill cotton snapback | Yupoong', 'flat-bill-cotton-snapback-yupoong', '<p>The Yupoon (YP Classics) Flatbill cotton snapback hat is made of 100% cotton twill material making for a durable, tear-resistant, and wrinkle-resistant cap. It has a five-panel construction and it has a large design area for your custom embroidered logo. This customized hat has a structured front crown and a high profile to fit all head sizes. It features a broad flat visor and an adjustable closure. The hat also features sewn eyelets that keep your head cool. Design your own hat by using the custom hat maker by CapBeast. Upload your logo or design to create a hat that is unique to you. Features · Made of cotton twill material · Flat visor · Five–structure panel · Adjustable size · No minimums</p><p><br>&nbsp;</p>', NULL, 29.00, 1, '2025-03-28 11:45:16', '2025-03-28 11:45:16', NULL),
(281, NULL, NULL, 'Black Flat bill cotton snapback | Yupoong', 'black-flat-bill-cotton-snapback-yupoong', '<p>This Black Flatbill cotton snapback is a sleek custom hat that is a must have for your wardrobe. It’s made of 100% cotton material, making it comfortable, sturdy, and durable. With a structured five-panel design, This snapback has a high-profile design that makes it suitable for pairing with most casual wear. It features a flat brim and a green under visor. The cap has sewn eyelets that keep your head cool in the summer heat. The snapback is one size fits all and can easily be adjusted the size of the cap as it comes with a custom snapback closure at the back. Design a hat using our hatmaker tool. Simply upload your text or logo and let the Capbeast tool do the rest. Features · Five-panel unstructured design · High profile · Snapback closure · Sewn eyelets · Flat bill · Custom Embroidered · No minimums</p><p><br>&nbsp;</p>', NULL, 29.00, 1, '2025-03-28 11:47:51', '2025-03-28 11:47:51', NULL),
(282, NULL, NULL, 'Dark Gray Flat bill cotton snapback | Yupoong', 'dark-gray-flat-bill-cotton-snapback-yupoong', '<p>Made from 100% cotton twill material, this Dark Gray Flatbill cotton snapback is sturdily-made, comfortable, and durable. It has a flat brim and a green under-visor. There are sewn eyelets that help to keep you cool. At the back of the hat is a snapback closure that enables you to adjust the size of the hat for an exact fit. If you are searching for a timeless and trendy fashion accessory, this Yupoong hat is a must-have. You can pair it with all casual wear or dress it up. Desig your own hat using the Capbeast hat maker. Upload your logo or add text to create a unique personalized Yupoong hat. Features · Made of 100% cotton twill material · Sewn eyelets · Five-panel construction · Snapback closure · Design your own · Machine washable</p><p><br>&nbsp;</p>', NULL, 29.00, 1, '2025-03-28 11:49:33', '2025-03-28 11:49:33', NULL),
(283, NULL, NULL, 'Navy Flat bill cotton snapback | Yupoong', 'navy-flat-bill-cotton-snapback-yupoong', '<p>A stylish and durable snapback crafted from high-quality cotton. Features a structured 6-panel design with a flat bill for a modern look. Adjustable snapback closure ensures a comfortable fit. Perfect for casual wear, street style, or branding.</p>', NULL, 29.00, 1, '2025-03-28 11:58:55', '2025-03-28 11:58:55', NULL),
(284, NULL, NULL, 'Red Flat bill cotton snapback | Yupoong', 'red-flat-bill-cotton-snapback-yupoong', '<p>The Red Flatbill cotton snapback from Yuppong is features a flat brim with a green undervisor. It is machine washable and has a large customization area making it one of our most popular custom baseball hats. It is made from 100% cotton twill material, it is machine washable and it has sewn eyelets to keep you cool in the summer heat. At the back of this personalized hat is an adjustable snap that enables you to adjust the size to your needs. The cap has a green under-visor that is soft and comfortable against the skin. Make your own custom embroidered cap by using the hat maker. Create a personalized hat by uploading your brand’s logo or slogan. Features · Made of 100% cotton twill material · Sewn eyelets · High profile design · Flat brim · No minimums · Custom embroidered</p><p><br>&nbsp;</p>', NULL, 29.00, 1, '2025-03-28 12:00:23', '2025-03-28 12:00:23', NULL),
(285, NULL, NULL, 'Black and Charcoal Fitted Mesh Trucker Hat | Richardson', 'black-and-charcoal-fitted-mesh-trucker-hat-richardson', '<p>If you are searching for a simple, classic, and stylish golf cap, the Black and Charcoal Fitted Mesh Trucker Hat is perfect for you. Made of 98% Polyester and 2% Spandex material, it’s comfortable, lightweight, and fast-drying. The custom dad hat has a moisture-wicking sweatband and it features an adjustable strap back closure to ensure the perfect fit. The hat features a curved bill that offers good protection from the sun. It has eye-catching embroidery on the visor providing it with a gorgeous but simple design Design your own custom Trucker Hat with the CapBeast hat maker. Features · Made of 98% polyester and 2% spandex · Sewn eyelet · Strap back closure · Mesh fabric sides · No minimums · Design your own</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 12:04:23', '2025-03-28 12:04:23', NULL),
(286, NULL, NULL, 'Charcoal and White Fitted Mesh Trucker Hat | Richardson', 'charcoal-and-white-fitted-mesh-trucker-hat-richardson', '<p>The Richardson Charcoal and White Fitted Mesh Trucker Hat is the perfect custom hat. Made from a 98% Polyester and 2% Spandex blend, it’s lightweight, durable, and easy to care for. The mid-profile is perfect for customization. At the front of the hat is a pre-curved visor that shields your eyes and face from the sun, wind, rain, and snow. It has mesh sides and back that provide excellent circulation. You can easily adjust the size of the hat with the snap closure at the back. The hat has a six-panel construction that enables it to retain its shape. Customize your own hat with the CapBeast hat maker. Features · Made of 98% polyester and 2% spandex material · Mesh fabric on the back and sides · Pre-curved visor · Mid-profile, structured design · No minimums · Design your own</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 12:07:10', '2025-03-28 12:07:10', NULL),
(287, NULL, NULL, 'Gray White Black Fitted Mesh Trucker Hat | Richardson', 'gray-white-black-fitted-mesh-trucker-hat-richardson', '<p>The Gray, White and Black Fitted Mesh Trucker Hat from Richardson is made of 98% polyester and 2% Spandex material that makes it comfortable, lightweight, wrinkle-resistant, and fast-drying. At the back of the hat is a snapback closure that can be adjusted to create a perfect fit giving optimum comfort. The hat has decorative stitching on the visor. As a mid-profile hat, this is a good choice for people who find the small profile hats too small and the large profile hats too big. The custom hat features mesh material on the sides and back that keeps your head well aerated. It has a pre-curved visor that works great in protecting your face and eyes from UV rays. You can design your own personalized golf hat using our hat maker. Upload your logo or text and we will custom embroider it for you. Features · Material: 98% Polyester and 2% spandex · Sewn eyelet · Mesh sides and back · Pre-curved visor · Strap back closure · No minimums · Customizable</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 12:19:42', '2025-03-28 12:19:42', NULL),
(288, 28, 23, 'Consequatur rem err', 'molestias-ut-hic-har', '<p>xcsdfd</p>', 257.00, 894.00, 1, '2025-03-28 12:25:37', '2025-03-28 12:26:46', '2025-03-28 12:26:46'),
(289, NULL, NULL, 'Navy White Red Fitted Mesh Trucker Hat | Richardson', 'navy-white-red-fitted-mesh-trucker-hat-richardson', '<p>The Richardson Navy White Red Fitted Mesh Trucker Hat is a high-quality hat with contrasting colors that provides a striking look. The hat is made of 98% polyester and 2% spandex material making it comfortable, lightweight, and easy to care for. The custom cap features a pre-curved visor and a mesh back that adds to its breathability. It has a moisture-wicking and odor-fighting sweatband to keep you cool and fresh in the summer heat. To enable you to customize it to your fit, the trucker cap has an adjustable strap back closure at the back. The athletic hat has a structured design that makes it easy for you to add custom embroidered logo. Make your own custom trucker hats using the hat maker. Features · Material: 98% Polyester, 2% spandex · Adjustable snapback · Pre-curved visor · Interior sweatband · Structured design · No minimums · Customizable</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 12:53:00', '2025-03-28 12:53:00', NULL),
(290, NULL, NULL, 'Red Charcoal Black Fitted Mesh Trucker Hat | Richardson', 'red-charcoal-black-fitted-mesh-trucker-hat-richardson', '<p>The Red Charcoal Black Fitted Mesh Trucker Hat by Richardson is a mid-profile hat made of high-performance polyester and spandex fabric providing you with all-day comfort. The Oakley hat has a structured construction and adjustable strap back that makes it a one-size fit for all. It has a pre-curved visor to provide you with ample protection from the sun. At the back and sides of the custom dad hat is a mesh that will keep your head cool in hot conditions. The hat has an embroidered stitching on the visor that makes it simple but stylish. Design your own hat using the CapBeast custom hat maker. Features · Made of polyester and spandex material · One size fit · Sewn eyelet · Structured design · Pre-curved visor · No minimums · Customizable</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 12:58:22', '2025-03-28 12:58:22', NULL),
(291, NULL, NULL, 'Royal Charcoal Black Fitted Mesh Trucker Hat | Richardson', 'royal-charcoal-black-fitted-mesh-trucker-hat-richardson', '<p>The Richardson Royal-Charcoal-Black Fitted Mesh Trucker Hat features a structured construction that makes it casual and trendy. The custom cap has a moisture-wicking sweatband and it has mesh material on the back and side that ensures excellent air circulation. It’s made of 98% polyester and 2% spandex material that makes it comfortable, lightweight, and fast-drying. The six-panel cap has a mid-structure profile and pre-curved brim. It features sewn eyelets that add to its breathability. Design your own custom trucker hat with the CapBeast hat maker. Upload your logo or add your own text to make a one-of-a-kind hat that is unique to you. Features · Made of polyester and spandex · Structured construction · Six-panel design · Mesh back and sides · No minimums · Design your own</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 13:03:37', '2025-03-28 13:03:37', NULL),
(292, NULL, NULL, 'White Navy Red Fitted Mesh Trucker Hat | Richardson', 'white-navy-red-fitted-mesh-trucker-hat-richardson', '<p>The White-Navy-Red Richardson Fitted Mesh Trucker Hat has a lightweight and moisture-wicking fabric that makes it perfect for hat wearers that enjoy an active lifestyle. The 98% polyester and 2% Spandex material also makes it comfortable, lightweight, and crease-resistant. This custom dad hat has a rounded curve that provides ample protection from the sun. It has mesh material on the side and back to keep your head well aerated. The interior has a sweatband that absorbs moisture and prevents sweat from running down your face. To enable you to adjust the fit of the personalized Richardson hat, it has an adjustable strap back closure at the back. Features · Material: Polyester and Spandex · Mesh sides and back · Pre-curved visor · Six-panel design · No minimums · Design your own</p><p><br>&nbsp;</p>', NULL, 34.00, 1, '2025-03-28 13:07:29', '2025-03-28 13:07:29', NULL),
(293, NULL, NULL, 'Aqua Stone Faded Trucker Hat | Sportman', 'aqua-stone-faded-trucker-hat-sportman', '<p>This Aqua Stone Faded Trucker Hat is made of comfortable and breathable cotton and polyester material making it your ultimate outdoor companion. The interior has a moisture-wicking fabric that will keep you cool in the summer, absorb all sweat, and fight odor. This hat features an unstructured construction that makes it easy to fold and pack in your bag or pocket. It has a six-profile and low-profile construction that makes it suitable for men, women, and teenagers. The personalized trucker hat has an adjustable plastic tab closure that enables you to adjust the size. There are sewn eyelets that will keep your head cool. This hat will provide shade to your head during summer and keep your head warm during winter. Use our hat maker tool to create a personalized trucker hat. Upload your design or add custom stitched text to make the perfect hat, with no minimum order size. Features · Made of 55% cotton and 45% polyester · Sewn eyelets · Pre-curved visor · Plastic tab closure · No minimums · Customized</p><p><br>5</p>', NULL, 28.00, 1, '2025-03-28 13:13:07', '2025-03-28 13:13:07', NULL),
(294, NULL, NULL, 'Forest Stone Faded Trucker Hat | Sportman', 'forest-stone-faded-trucker-hat-sportman', '<p>This Forest stone faded trucker hat is made of 55% cotton and 45% polyester making it soft, comfortable, and breathable. The hat has a low profile that ensures a secure fit for men, women, and teenagers. The sportsman trucker hat uses a plastic tab closure at the back that enables you to customize it to your head\'s size. It has a pre-curved visor that offers the perfect shade from harsh weather elements. The custom Sportsman hat has a moisture-wicking material that will absorb all sweat, keep you cool, and fight odors. It has sewn eyelets that keep your head well aerated. This custom tracker hat is suitable for wear during summer, winter, spring, and fall. It will keep you cool in summer and warm in winter. It’s sturdy, durable, and lightweight. Create a custom Sportsman hats hat with our Capbeast hat maker tool. Simply upload your logo or text and let our tool create a custom trucker hat that is unique to you. No minimums. Features · Material:55% cotton and 45% polyester · Sewn eyelet · Unstructured, low profile construction · Plastic tab closure · No minimums · Customized</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 13:18:09', '2025-03-28 13:18:09', NULL),
(295, NULL, NULL, 'Mustard Yellow Stone Faded Trucker Hat | Sportman', 'mustard-yellow-stone-faded-trucker-hat-sportman', '<p>This Mustard Yellow Stone Faded Trucker Hat is a unique, comfortable, and sturdily-made cap that will withstand all the outdoor elements. Made of 55% cotton and 45% Polyester, it\'s lightweight and stretchy to fit different head sizes. At the back of this custom Sportsman trucker hat is a plastic buckle strap that makes it easy to adjust the size to fit your head. It also has embroidered eyelets that add to its breathability. This personalized trucker hat has a moisture-wicking interior that absorbs all sweat and keeps you comfortable all day long. The embroidered cap has a pre-curved visor that works well in protecting your neck and face from the sun. Create a unique and personalized trucker hat using our hat maker tool. Upload your text or logo for your embroidered caps with no minimum orders. Features · Material: 45% cotton and 45% polyester · One size fit · Adjustable strap back closure · Embroidered eyelets · Structured design · No minimums · Customized</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 13:21:52', '2025-03-28 13:21:52', NULL),
(296, NULL, NULL, 'Navy Stone Faded Trucker Hat | Sportman', 'navy-stone-faded-trucker-hat-sportman', '<p>This Navy Stone Faded Trucker Hat is a classic unstructured hat that is made of 55% cotton and 45% polyester material combining comfort with breathability. The material blend also makes it fast drying and soft to the skin. The interior of the Sportsman trucker hat is made of a moisture-wicking material that absorbs all sweat and improves breathability. To ensure a custom fit, it has an adjustable strap closure at the back. With a five-panel construction and a curved brim, the custom trucker hat is the perfect choice for protecting yourself from the sun, rain, and snow. Personalize your custom trucker hat using our hat maker tool. Upload your design and let the tool embroider it for a custom trucker hat. Features · Made of 55% cotton and 45% polyester material · Sewn eyelet · Low profile, unstructured design · Strap back closure · No minimums · Customized</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 13:29:41', '2025-03-28 13:29:41', NULL),
(297, NULL, NULL, 'Red Stone Faded Trucker Hat | Sportman', 'red-stone-faded-trucker-hat-sportman', '<p>The Red Stone Faded Trucker hat is a low-profile hat that is made of 55% cotton and 45% polyester material. The comfortable, breathable, and stretchable hat will fit all head sizes. The custom Sportsman trucker hat has a strap back closure that enables you to adjust the size to fit your head. This makes it suitable for men, women, and teenagers. The embroidered caps feature a moisture-wicking interior material that will absorb all sweat and keep you dry and comfortable. As an unstructured hat, it is easy to pack in a bag or even fit in your pocket. The personalized trucker hat has sewn eyelets that keep your head aerated in hot conditions. It’s your ultimate accessory for the weekend and outdoors. Our Capbeast hat maker tool allows you to create a personalized trucker hat. Upload your logo or text and you will have embroidered caps. Features · Material:55% cotton and 45% polyester · Sewn eyelets · Pre-curved brim · Buckle closure · No minimums · Customized</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 13:33:13', '2025-03-28 13:33:13', NULL),
(298, NULL, NULL, 'Royal Stone Faded Trucker Hat | Sportman', 'royal-stone-faded-trucker-hat-sportman', '<p>Made of 55% cotton and 45% polyester, this Sportsman trucker hat is comfortable, lightweight, and breathable. It has an unstructured and low-profile design that enables it to fit in your pocket. The Sportsman trucker hat is sturdily made with top-notch embroidery ensuring a durable and tear-resistant cap. It has a buckle closure at the back for a one size fit for all. This hat has a pre-curved visor that offers good shade. There is contrast embroidery on the visor that adds to the pop of color. This unisex custom trucker hat can be worn with various outfits. It’s a great choice for daily use and outdoor activities such as running, fishing, cycling, camping, and the beach. With our Capbeast hat maker tool, you can create a custom trucker hat. Upload your logo or text and let the tool embroider it for a custom Sportman hat. No minimum orders. Features · Made of 55% cotton and 45% polyester material · Sewn eyelet · Unstructured construction · One size fits all · No minimums · Customized</p><p><br>&nbsp;</p>', NULL, 28.00, 1, '2025-03-28 13:39:01', '2025-03-28 13:39:01', NULL),
(299, NULL, NULL, 'Youth Pulse R-Flex fitted baseball hat | Richardson', 'youth-pulse-r-flex-fitted-baseball-hat-richardson', '<p>If you\'re looking for a cap that can keep up with your wild child, look no further than the Richardson Youth Pulse R-Flex fitted baseball hat! This cap is made of 98/2 polyester/spandex and has a mid-profile, six-panel construction for a comfortable fit. The Performance stretch fabric ensures that the hat will move with you, while the U-form technology keeps the visor in place however you choose to flex it. And with its Pulse fabric and R-Active technology, this cap is sure to keep your budding superstar cool in the heat. Create your own custom Richardson Youth Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s interface.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 13:54:48', '2025-03-28 13:54:48', NULL),
(300, NULL, NULL, 'Navy-Red Youth Pulse R-Flex fitted baseball hat | Richardson', 'navy-red-youth-pulse-r-flex-fitted-baseball-hat-richardson', '<p>With its bright red brim, this youth baseball cap is sure to make a statement on the field. Richardson\'s Pulse fabric and R-Active technology provide superior performance for any kid who wants an authentic look without having too much trouble taking care of their hair or worrying about it getting wet from sweat! The visor can be flexed between two positions - curved like most hats are designed in order wearer have protection when batting at high speeds while flat so they stay cool during summer games. Create your own custom Richardson Navy-Red Youth Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s interface.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 13:58:04', '2025-03-28 13:58:04', NULL),
(301, NULL, NULL, 'Royal Youth Pulse R-Flex fitted baseball hat | Richardson', 'royal-youth-pulse-r-flex-fitted-baseball-hat-richardson', '<p>This stylish accessory is a perfect choice for younger athletes and features Richardson’s innovative fabric technology. The visor can be flexed in order to change its shape thanks to U-form construction. ITs StayDri performance stretch band keeping you comfortable all day long no matter what activity or event it may apply at any time of year when weather permits. It’s not just about fashion – it\'s also important that we stay cool while playing sports.Create your own custom Richardson Royal Youth Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s interface.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 14:00:39', '2025-03-28 14:00:39', NULL),
(302, NULL, NULL, 'White-Black Youth Pulse R-Flex fitted baseball hat | Richardson', 'white-black-youth-pulse-r-flex-fitted-baseball-hat-richardson', '<p>Looking for a fitted baseball hat that will let your young athlete show off their team\'s logo in style? Look no further than Richardson’s White-Black Youth Pulse R-Flex. This hat is made from high-quality materials, with a two-panel white front that allows for large logos, and a performance stretch fabric that keeps you cool and comfortable. Plus, the U-form technology lets you flex the visor from curved to flat position at all times, making it perfect for any activity. Create your own custom Richardson White-Black Youth Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s interface.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 14:04:17', '2025-03-28 14:04:17', NULL),
(303, NULL, NULL, 'Dark Green Pulse R-Flex fitted baseball hat | Richardson', 'dark-green-pulse-r-flex-fitted-baseball-hat-richardson', '<p>The hat is made from a blend of polyester and spandex, giving it the ability to stretch while still being breathable. The mid profile design features performance materials that are comfortable no matter what you\'re doing on your next adventure! You can flex this visor up into its curved position when needed or keep sweat out with Pulse technology which provides superior moisture wicking capabilities coupled with R-active engineering so players don\'t have worry about their headgear getting wet from excessive perspiration during any sport related activity. Create your own custom Richardson Dark Green Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s hat maker.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 14:07:03', '2025-03-28 14:07:03', NULL),
(304, NULL, NULL, 'Navy-Red Pulse R-Flex fitted baseball hat | Richardson', 'navy-red-pulse-r-flex-fitted-baseball-hat-richardson', '<p>This hat is designed with performance and style in mind. The two-colored crown and brim hat is made of a polyester/spandex blend for a comfortable fit, and the mid-profile, the six-panel design provides a great look. The U-form technology allows you to flex the visor from a curved to a flat position at all times, while the Pulse fabric and StayDri Performance stretch sweatband keep you cool and dry. Create your own custom Richardson Navy/Red Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast’s design interface.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 14:09:16', '2025-03-28 14:09:16', NULL),
(305, NULL, NULL, 'White-Black Pulse R-Flex fitted baseball hat | Richardson', 'white-black-pulse-r-flex-fitted-baseball-hat-richardson', '<p>Made from a lightweight and breathable polyester/spandex blend, the Richardson White-Black Pulse R-Flex hat features a mid-profile, six-panel design and performance stretch fabric that will move with you as you run, play or just enjoy a day out in the sun. The built-in U-form technology allows you to flex the visor from curved to flat position at all times, while the Pulse fabric and R-Active technology work together to provide superior moisture management. And for added comfort, this hat is equipped with a StayDri Performance stretch. The two-panel white front provides a large canvas ideal for big logos. Create your own custom Richardson White-Black Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s interface.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 14:11:58', '2025-03-28 14:11:58', NULL),
(306, NULL, NULL, 'White-Navy Pulse R-Flex fitted baseball hat | Richardson', 'white-navy-pulse-r-flex-fitted-baseball-hat-richardson', '<p>Richardson\'s White-Navy baseball cap is the perfect way to show pride on game day. Built with performance stretch fabric, it will move with you as you run around bases or just enjoy an afternoon playing outside in this lightweight and breathable material! The six-panel design provides sun protection while also keeping cool during hot summer days thanks its builtin U-form technology which can be curved into a visor at all times so there are never any worries about your head overheating during practice periods. Create your own custom Richardson White-Navy Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s interface. The large, two-panel white front is a great canvas for CapBeast’s extraordinary embroidering.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 14:15:54', '2025-03-28 14:15:54', NULL),
(307, NULL, NULL, 'White-Red Pulse R-Flex fitted baseball hat | Richardson', 'white-red-pulse-r-flex-fitted-baseball-hat-richardson', '<p>The Richardson White/Red Pulse R-Flex fitted baseball hat is for the fashion-savvy sports fan. This hat is made with 98/2 polyester/spandex and has a Performance stretch sweatband to ensure you stay cool and comfortable while wearing it. The U-form technology allows the visor to be flexible in any direction, and the Pulse fabric helps keep you cool and dry. The two-panel white front of the crown is an ideal canvas for big, bold logos. Create your own custom Richardson White-Red Pulse R-Flex fitted baseball cap by adding your logo, text, or graphics using CapBeast\'s interface.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 14:18:47', '2025-03-28 14:18:47', NULL),
(308, NULL, NULL, 'Dark Green Lite R-Flex U-Form fitted baseball hat | Richardson', 'dark-green-lite-r-flex-u-form-fitted-baseball-hat-richardson', '<p>A premium fitted baseball hat by Richardson, featuring R-Flex stretch for a snug yet comfortable fit. The U-Form visor allows for a customized curved or flat look. Made from lightweight, breathable fabric in a sleek dark green color, perfect for sports, casual wear, or team branding. Designed for durability and all-day comfort.</p>', NULL, 37.00, 1, '2025-03-28 14:48:25', '2025-03-28 14:48:25', NULL),
(309, NULL, NULL, 'Maroon Lite R-Flex U-Form fitted baseball hat | Richardson', 'maroon-lite-r-flex-u-form-fitted-baseball-hat-richardson', '<p>Made with 98/2 polyester/spandex and featuring UForm technology, this custom baseball hat will let you flex the visor to any shape or size you want, while the R-Active technology ensures that your head will stay cool and comfortable all day long. Plus, the StayDri performance stretch sweatband means you\'ll never have to worry about your hair while you\'re playing ball. Design your own custom Lite R-Flex U-Form fitted baseball hat with the CapBeast hat maker. Upload your logo or add your own text to make a one-of-a-kind hat that is unique to you.</p><p><br>&nbsp;</p>', NULL, 37.00, 1, '2025-03-28 14:52:08', '2025-03-28 14:52:08', NULL),
(310, 28, 2, 'Atlanta Braves 1972 Cooperstown clean up cap | \'47', 'atlanta-braves-1972-cooperstown-clean-up-cap-47', '<p>Looking for a way to show off your favorite team with some old school flair? Check out this \'47 Brand Cooperstown Collection Clean Up hat, perfect for any dedicated Atlanta Braves fan. This hat features the classic Atlanta Braves look from the past, complete with embroidered graphics and raised details. It\'s officially licensed by the MLB, and its 100% cotton construction makes it surface washable for easy care. It also has an adjustable strap closure for a comfortable, custom fit. Whether you\'re wearing it to the game or just out and about, this hat is sure to show everyone where your loyalty lies.</p>', NULL, 34.00, 1, '2025-03-28 14:52:50', '2025-03-28 14:54:35', '2025-03-28 14:54:35'),
(311, NULL, NULL, 'Royal Lite R-Flex U-Form fitted baseball hat | Richardson', 'royal-lite-r-flex-u-form-fitted-baseball-hat-richardson', '<p>Richardson\'s Royal Lite R-Flex U-Form fitted baseball hat is perfect for athletes who demand the best in performance and comfort. The innovative U-Form technology allows you to flex the visor from a curved to a flat position at all times, while the R-Active technology ensures maximum breathability and comfort. The laser-vented back panels provide superior ventilation, and the StayDri performance stretch sweatband keeps you cool and dry all game long. Made from lightweight stretch fabric, this cap is sure to keep you comfortable all season long. Add your logo or text to make it a one-of-a-kind hat using CapBeast’s custom hat maker interface.</p><p><br>&nbsp;</p>', NULL, 37.00, 1, '2025-03-28 14:55:38', '2025-03-28 14:55:38', NULL),
(312, 19, 3, 'Aliquip quibusdam mo', 'aliquip-quibusdam-mo', '<p>dsfdsfsd</p>', 235.00, 373.00, 1, '2025-03-28 14:57:24', '2025-03-28 14:59:40', '2025-03-28 14:59:40'),
(313, NULL, NULL, 'White-Black Lite R-Flex U-Form fitted baseball hat | Richardson', 'white-black-lite-r-flex-u-form-fitted-baseball-hat-richardson', '<p>With its 98/2 polyester/spandex blend, this hat is sure to keep you cool and comfortable all game long. And because it features U-Form technology, you can flex the visor from a curved to a flat position at any time. Plus, the R-Active technology ensures that your hat will stay in place no matter how hard you play. Finally, the StayDri performance stretch sweatband helps keep sweat off your face so you can focus on winning. With a broad white canvas to play on, add your logo or text to make it a one-of-a-kind hat using CapBeast’s hat maker interface.</p><p><br>&nbsp;</p>', NULL, 37.00, 1, '2025-03-28 14:58:05', '2025-03-28 14:58:05', NULL),
(314, 20, 14, 'In dolores cum elit', 'in-dolores-cum-elit', '<p>kjjkjkjk</p>', 795.00, 987.00, 1, '2025-03-28 14:58:32', '2025-03-28 14:59:20', '2025-03-28 14:59:20'),
(315, NULL, NULL, 'White-Navy Lite R-Flex U-Form fitted baseball hat | Richardson', 'white-navy-lite-r-flex-u-form-fitted-baseball-hat-richardson', '<p>This stylish hat is made from a lightweight stretch fabric and features U-Form technology that allows you to flex the visor from a curved to a flat position at all times. Additionally, our R-Active technology helps wick away sweat and keep you cool and comfortable, even during the most intense games. Plus, the laser-vented back panels provide maximum breathability so you can focus on your game. With a large white canvas to play on, add your logo or text to make it a one-of-a-kind hat using CapBeast’s hat maker interface.</p><p><br>&nbsp;</p>', NULL, 37.00, 1, '2025-03-28 15:01:24', '2025-03-28 15:01:24', NULL),
(316, NULL, NULL, 'White-Royal Lite R-Flex U-Form fitted baseball hat | Richardson', 'white-royal-lite-r-flex-u-form-fitted-baseball-hat-richardson', '<p>The White-Royal Lite R-Flex U-Form fitted baseball hat from Richardson is the perfect choice for athletes who demand the best in performance and style. The hat\'s sleek design features a curved visor that can be flexed to a flat position, and laser-vented back panels that allow for maximum breathability and comfort. And thanks to R-Active technology, this hat is guaranteed to keep you cool and dry all game long.With its large white canvas on the crown, you can easily add your logo or text with stark colors using CapBeast’s custom hat maker.</p><p><br>&nbsp;</p>', NULL, 37.00, 1, '2025-03-28 15:05:23', '2025-03-28 15:05:23', NULL),
(317, NULL, NULL, 'Heather Fitted Hat | Flexfit', 'heather-fitted-hat-flexfit', '<p>If you\'re looking for a fitted hat that will keep you looking fresh all day long, then look no further than the Heather Fitted Hat from Flexfit! Made from a polyester/polyurethane blend, this structured hat features a mid-profile and six-panel design, as well as a Permacurv visor and black undervisor. It also comes in two sizes to fit most people\'s noggins. You can add your logo or text using CapBeast’s custom hat maker, but be mindful of how your logo might look on the contrasting grey canvas of the Heather Fitted Hat.</p><p><br>&nbsp;</p>', NULL, 32.00, 1, '2025-03-28 15:10:37', '2025-03-28 15:10:37', NULL),
(318, 28, 2, 'Atlanta Braves 1972 Cooperstown clean up cap | \'47 Brand', 'atlanta-braves-1972-cooperstown-clean-up-cap-47-brand', '<p>Looking for a way to show off your favorite team with some old school flair? Check out this \'47 Brand Cooperstown Collection Clean Up hat, perfect for any dedicated Atlanta Braves fan. This hat features the classic Atlanta Braves look from the past, complete with embroidered graphics and raised details. It\'s officially licensed by the MLB, and its 100% cotton construction makes it surface washable for easy care. It also has an adjustable strap closure for a comfortable, custom fit. Whether you\'re wearing it to the game or just out and about, this hat is sure to show everyone where your loyalty lies.</p>', NULL, 34.00, 1, '2025-03-28 15:12:48', '2025-03-28 15:53:01', '2025-03-28 15:53:01'),
(319, NULL, NULL, 'Dark Heather Fitted Hat | Flexfit', 'dark-heather-fitted-hat-flexfit', '<p>This hat is made from a 98/2 polyester/polyurethane blend, and features a structured, mid-profile design with a six-panel construction. The Permacurv visor provides a great look, while the black undervisor helps keep the sun out of your eyes. This hat comes in two sizes, S/M and L/XL, making it easy to find the perfect fit. You can add your logo or text using CapBeast’s hat maker, but be mindful of how your logo might look on the dark grey canvas of the Dark Heather Fitted Hat. Bolder colors and white borders will help make it pop.</p><p><br>&nbsp;</p>', NULL, 32.00, 1, '2025-03-28 15:14:14', '2025-03-28 15:14:14', NULL),
(320, 20, 13, 'Irure sint voluptate', 'itaque-sequi-ad-in-e', '<p>dfdsfdf</p>', 425.00, 520.00, 1, '2025-03-28 15:17:04', '2025-03-28 15:25:12', '2025-03-28 15:25:12'),
(321, 28, 2, 'Atlanta Braves 1972 Cooperstown clean up cap | \'47 Brand', 'atlanta-braves-1972-cooperstown-clean-up-cap-47-brand', '<p>dsfjkdsjfds sdjfkdsjkf kjdfjksdf</p>', NULL, 323.00, 1, '2025-03-28 15:18:31', '2025-03-28 15:26:03', '2025-03-28 15:26:03'),
(322, 28, 2, 'kjsdjkj', 'kjsdjkj', '<p>dfjksdjkfjdsf</p>', NULL, 32.00, 1, '2025-03-28 15:19:25', '2025-03-28 15:25:48', '2025-03-28 15:25:48'),
(323, 22, 15, 'Quam culpa cupidita', 'voluptatum-adipisci', '<p>sdjfjdsfjkjkdf</p>', 126.00, 3.00, 1, '2025-03-28 15:19:59', '2025-03-28 15:26:12', '2025-03-28 15:26:12'),
(324, NULL, NULL, 'Delta Seamless fitted hat | Flexfit', 'delta-seamless-fitted-hat-flexfit', '<p>Looking for a versatile and stylish hat that will keep you looking cool and comfortable all day long? Made from high-quality polyester, the Delta Seamless fitted hat is perfect for any activity, whether you\'re hitting the gym, going for a run, or just hanging out with friends. The Permacurv visor provides superior protection from the sun\'s harmful rays, while the quick-drying fabric ensures you won\'t have to worry about pesky sweat stains. And don\'t worry about feeling stinky - the anti-bacterial inside seam tape prevents bacterial growth and keeps your head feeling fresh all day long. Add a logo or text in the CapBeast hat maker to make your design truly unique.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 15:25:46', '2025-03-28 15:25:46', NULL),
(325, 24, 18, 'Praesentium accusamu', 'praesentium-accusamu', '<p>ndsfjkdsjfkjsdkf</p>', 738.00, 502.00, 1, '2025-03-28 15:26:40', '2025-03-28 15:27:28', '2025-03-28 15:27:28'),
(326, 28, 2, 'Atlanta Braves 1972 Cooperstown clean up cap | \'47', 'atlanta-braves-1972-cooperstown-clean-up-cap-47', '<p>Looking for a way to show off your favorite team with some old school flair? Check out this \'47 Brand Cooperstown Collection Clean Up hat, perfect for any dedicated Atlanta Braves fan. This hat features the classic Atlanta Braves look from the past, complete with embroidered graphics and raised details. It\'s officially licensed by the MLB, and its 100% cotton construction makes it surface washable for easy care. It also has an adjustable strap closure for a comfortable, custom fit. Whether you\'re wearing it to the game or just out and about, this hat is sure to show everyone where your loyalty lies.</p>', NULL, 34.00, 1, '2025-03-28 15:27:01', '2025-03-28 15:27:01', NULL),
(327, 28, 2, 'Atlanta Braves 1981 Cooperstown clean up cap | \'47 Brand', 'atlanta-braves-1981-cooperstown-clean-up-cap-47-brand', '<p>Introducing the Atlanta Braves 1981 Cooperstown clean up cap from \'47 Brand! This relaxed and curved adjustable strapback is made from reversed garment washed cotton twill and features raised embroidery on the front. It\'s the perfect way to show your support for your favorite team!</p>', NULL, 34.00, 1, '2025-03-28 15:29:46', '2025-03-28 15:29:46', NULL),
(328, NULL, NULL, 'Dark Gray Delta Seamless fitted hat | Flexfit', 'dark-gray-delta-seamless-fitted-hat-flexfit', '<p>This cool and comfortable fitted hat is made of a quick drying, stain-resistant fabric with an anti-bacterial inside seam tape. It features a laser-cut eyelets and a black Delta logo on the right side. The structured, six-panel, mid-profile design provides a classic look, while the Permacurv® visor ensures optimal sun and rain protection. Whether you\'re hitting the beach or the streets, this hat is sure to keep you looking sharp! Take it to the next level by adding a logo or text in the CapBeast hat maker to make your design pop.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 15:29:56', '2025-03-28 15:29:56', NULL),
(329, NULL, NULL, 'Navy Delta Seamless fitted hat | Flexfit', 'navy-delta-seamless-fitted-hat-flexfit', '<p>The Navy Delta Seamless fitted hat is the perfect addition to your wardrobe. The structured, six-panel, mid-profile ensures that this hat will fit well and look good on you. The Permacurv® visor provides a curved shape that will stay in place, while the anti-bacterial inside seam tape prevents any staining or sweat build-up. The black Delta logo on the right side is subtle and stylish. Best of all, this hat is made from quick drying stain-resistant fabric, so you can wear it with confidence wherever you go. Make it special by adding a logo or text in the CapBeast custom hat maker.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 15:34:27', '2025-03-28 15:34:27', NULL),
(330, 28, 2, 'Atlanta Braves Navy Clean Up Cap | \'47 Brand', 'atlanta-braves-navy-clean-up-cap-47-brand', '<p>Introducing the Atlanta Braves Navy Clean Up Cap from \'47 Brand! This stylish cap is a must-have for any true Braves fan. Featuring the team logo in raised embroidery on the front crown, this cap is sure to turn heads. The adjustable slide closing system ensures a perfect fit, while the woven loop label in the back displays the team logo proudly. The garment has been washed for a worn in and comfortable look. Officially licensed by the MLB®, this cap is a must-have for any Braves fan!</p>', NULL, 34.00, 1, '2025-03-28 15:35:09', '2025-03-28 15:35:09', NULL),
(331, 28, 3, 'Boston Red Sox Black and Grey MVP Hat | \'47 Brand', 'boston-red-sox-black-and-grey-mvp-hat-47-brand', '<p>Looking for a hat that shows off your Boston Red Sox pride? Check out this MVP hat from \'47 Brand. It\'s got a structured crown and a curved visor, plus an adjustable hook and loop closure for a snug, comfortable fit. The front of the hat features raised embroidery, and the back has flat embroidery. It\'s made from wool blend material for a soft, warm feel.</p>', NULL, 34.00, 1, '2025-03-28 15:37:13', '2025-03-28 15:37:13', NULL),
(332, 28, 3, 'Boston Red Sox Black on Black Clean Up Cap | \'47 Brand', 'boston-red-sox-black-on-black-clean-up-cap-47-brand', '<p>You\'ll look great supporting your Boston Red Sox in this Black on Black Clean Up cap from \'47 Brand. The embroidered graphics with raised details are sharp and stylish, and the adjustable strap ensures a perfect fit. This unstructured relaxed fit cap is made from 100% cotton and is surface washable. It\'s officially licensed by Major League Baseball and makes a great addition to any fan\'s wardrobe.</p>', NULL, 34.00, 1, '2025-03-28 15:39:33', '2025-03-28 15:39:33', NULL),
(333, 28, 3, 'Boston Red Sox Charcoal Clean Up Cap | \'47 brand', 'boston-red-sox-charcoal-clean-up-cap-47-brand', '<p>Introducing the Boston Red Sox Charcoal Clean Up Cap from \'47 brand! This adjustable hat is perfect for any fan, with a relaxed fit and curved brim. It features a raised embroidered team logo on the front and an embroidered \'47 logo on the side. The buckle adjustable closure back lets you customize your fit, while the one size fits most design makes it easy to wear. Officially licensed by Major League Baseball, this cap is a must-have for any Boston fan!</p>', NULL, 34.00, 1, '2025-03-28 15:41:51', '2025-03-28 15:41:51', NULL),
(334, NULL, NULL, 'Silver Delta Seamless fitted hat | Flexfit', 'silver-delta-seamless-fitted-hat-flexfit', '<p>Top of the line and top of the head. This Silver Delta Seamless fitted hat is a high performer, made with quick drying, stain-resistant fabric and anti-bacterial inside seam tape. With a structured six-panel mid-profile and Permacurv® visor, it\'ll keep your style game strong all day long. And since it\'s got our black Delta logo on the right side, you\'ll rep your allegiance to the best in class with ease. Make it stand out by adding your logo or text in our CapBeast custom hat maker.</p><p><br>&nbsp;</p>', NULL, 35.00, 1, '2025-03-28 15:41:58', '2025-03-28 15:41:58', NULL),
(335, 28, 3, 'Boston Red Sox Red Gamut Clean Up Cap | \'47 Brand', 'boston-red-sox-red-gamut-clean-up-cap-47-brand', '<p>Looking for a relaxed and comfortable way to show your Red Sox pride? Look no further than this Gamut Clean Up Cap from the \'47 Brand. Made from 100% cotton, it\'s light and airy -- perfect for those hot summer days at Fenway. The unstructured fit means you can wear it any way you want, while the adjustable fabric strap ensures a perfect fit. And the best part? The intricately embroidered graphics with raised details really make this cap pop. So whether you\'re tailgating or just running errands, do it in style with this Boston Red Sox Gamut Clean Up Cap.</p>', NULL, 39.00, 1, '2025-03-28 15:45:35', '2025-03-28 15:45:35', NULL),
(336, NULL, NULL, 'White Custom Dad Hat | Sportsman', 'white-custom-dad-hat-sportsman', '<p>The White Custom Dad Hat is perfect for the sportsman who wants to make a statement. This hat is made of 100% pigment-dyed cotton and is available in a variety of colors, each with its own unique look and feel. The unstructured design gives it a casual and comfortable fit, while the pre-curved visor ensures that you\'ll be looking good no matter what your day throws your way. The tri-glide buckle closure makes it easy to adjust the size to ensure a perfect fit. Although Sportsman warns about custom ink being a possible issue during care and washing, let us assure you that CapBeast’s custom embroidery won’t fade unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 15:48:55', '2025-03-28 15:48:55', NULL),
(337, NULL, NULL, 'Aqua Custom Dad Hat | Sportsman', 'aqua-custom-dad-hat-sportsman', '<p>This one-of-a-kind hat is made from 100% cotton pigment dyed twill and is unstructured with a six-panel design. It also features a pre-curved visor and a tri-glide buckle closure. The special dye and washing process used to create this hat makes it truly one-of-a-kind. So whether you\'re hitting the links or just running errands, do it in style with the Aqua Custom Dad Hat from Sportsman! Although Sportsman warns about custom ink being a possible issue during care and washing, let us assure you that CapBeast’s custom embroidery won’t fade unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 15:50:55', '2025-03-28 15:50:55', NULL),
(338, NULL, NULL, 'Black Custom Dad Hat | Sportsman', 'black-custom-dad-hat-sportsman', '<p>Looking good on or off the golf course is important, but feeling good is what really counts. And nothing beats our Black Custom Dad Hat from Sportsman. Made from 100% cotton pigment dyed twill, this unstructured, six-panel hat is perfect for those hot days out on the course. The pre-curved visor will help keep the sun out of your eyes, and the tri-glide buckle closure ensures a comfortable, adjustable fit. Although Sportsman warns about custom ink being a possible issue during care and washing, let us assure you that CapBeast’s custom embroidery won’t fade unless under the most extreme circumstances. Add your logo or text in CapBeast’s hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 15:53:11', '2025-03-28 15:53:11', NULL),
(339, NULL, NULL, 'Brown Custom Dad Hat | Sportsman', 'brown-custom-dad-hat-sportsman', '<p>Our Sportsman Brown Custom Dad Hats are made from 100% pigment-dyed cotton, ensuring that each one is unique. We use a special dye and washing process that creates beautiful variations in color, meaning no two hats are exactly alike. Plus, our hats are unstructured and have a low profile, making them perfect for any occasion. So whether you\'re on the golf course or out on the town, our Brown Custom Dad Hat will make you look good! Although Sportsman warns about custom ink being a possible issue during care and washing, let us assure you that CapBeast’s custom embroidery won’t fade unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 15:55:43', '2025-03-28 15:55:43', NULL),
(340, NULL, NULL, 'Cardinal Custom Dad Hat | Sportsman', 'cardinal-custom-dad-hat-sportsman', '<p>This 100% cotton pigment dyed cardinal-colored twill hat is unstructured and features a low profile with a pre-curved visor. It\'s perfect for any outdoor activity, and the tri-glide buckle closure ensures a comfortable and snug fit. Plus, the unique dyeing and washing process results in variations of color from one hat to the next, making each one truly one-of-a-kind. So grab one today and step up your dad hat game! Be assured that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 15:58:30', '2025-03-28 15:58:30', NULL);
INSERT INTO `products` (`id`, `brand_id`, `mlb_id`, `title`, `slug`, `description`, `cost_price`, `selling_price`, `visibility`, `created_at`, `updated_at`, `deleted_at`) VALUES
(341, NULL, NULL, 'Forest Custom Dad Hat | Sportsman', 'forest-custom-dad-hat-sportsman', '<p>The 100% cotton pigment dyed twill and unstructured six-panel design make this Sportsman Forest Custom Dad Hat comfortable and breathable, while the pre-curved visor protects against the sun\'s rays. The tri-glide buckle closure ensures a perfect fit, and theforest color is perfect for blending in with your surroundings. All hand-crafted with a special dye and washing process which results in unique variations of color to make it stand out. Be assured that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:00:51', '2025-03-28 16:00:51', NULL),
(342, 28, 4, 'Chicago Cubs Alternate Clean Up Cap | \'47 Brand', 'chicago-cubs-alternate-clean-up-cap-47-brand', '<p>If you\'re a Chicago Cubs fan, then you need this Alternate Clean Up Cap from \'47 Brand! It\'s perfect for showing your team pride in style. The embroidered Chicago Cubs graphic on the crown is bold and eye-catching. The slide closure ensures a perfect fit, so you can cheer on your team in comfort. Whether you\'re at the game or watching at home, this cap is a must-have for any true Cubs fan.</p>', NULL, 34.00, 1, '2025-03-28 16:03:18', '2025-03-28 16:03:18', NULL),
(343, NULL, NULL, 'Maroon Custom Dad Hat | Sportsman', 'maroon-custom-dad-hat-sportsman', '<p>The Sportsman Maroon Custom Dad Hat is made from 100% cotton pigment dyed twill, making it super comfortable to wear. It\'s unstructured and has a low-profile, making it perfect for any activity. Plus, the pre-curved visor will keep the sun out of your eyes. And the tri-glide buckle closure ensures a perfect fit. All of our hats are hand-crafted with a special dye and washing process. So you know you\'re getting a one-of-a-kind product. Feel confident that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:04:20', '2025-03-28 16:04:20', NULL),
(344, 28, 4, 'Chicago Cubs Royal Clean Up Cap | \'47 Brand', 'chicago-cubs-royal-clean-up-cap-47-brand', '<p>Make a bold statement with the Chicago Cubs Royal Clean Up Cap from \'47 Brand. This adjustable hat features a curved brim and a buckled closure for a customized fit. It\'s also emblazoned with the team logo on the front and the \'47 logo on the side. Whether you\'re hitting the Diamond or just cheering from the stands, this hat is perfect for showing your team spirit. Officially licensed by the MLB®, it\'s made from durable cotton twill and is available in multiple colors.</p>', NULL, 34.00, 1, '2025-03-28 16:06:21', '2025-03-28 16:06:21', NULL),
(345, NULL, NULL, 'Mustard Custom Dad Hat | Sportsman', 'mustard-custom-dad-hat-sportsman', '<p>This fashionable hat is made from 100% cotton pigment dyed twill and features an unstructured, six-panel design with a pre-curved visor. The tri-glide buckle closure ensures a comfortable, custom fit, while the special dye and washing process makes each one look unique. So whether you\'re hitting the links or just kicking back at the barbecue, make sure to do it in style with the Mustard Custom Dad Hat. Feel secure that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:06:35', '2025-03-28 16:06:35', NULL),
(346, 28, 5, 'Chicago White Sox 1949 Cooperstown clean up cap | \'47 Brand', 'chicago-white-sox-1949-cooperstown-clean-up-cap-47-brand', '<p>Looking for a relaxed and comfortable way to support your team? Look no further than the Chicago White Sox 1949 Cooperstown clean up cap from \'47 Brand. This dad-style cap is made from garment-washed cotton for a soft feel, and features an adjustable back strap for the perfect fit. The front logo is embroidered for a subtle look, while the Curved bill provides sun and wind protection. Whether you\'re hitting the ballpark or just running errands, this cap is the perfect way to show your true colors.</p>', NULL, 34.00, 1, '2025-03-28 16:08:01', '2025-03-28 16:08:01', NULL),
(347, NULL, NULL, 'Olive Custom Dad Hat | Sportsman', 'olive-custom-dad-hat-sportsman', '<p>This one-of-a-kind hat is made from 100% cotton pigment dyed twill and features an unstructured, six-panel design with a pre-curved visor. The low-profile design makes it perfect for wearing to sporting events, while the tri-glide buckle closure ensures a snug and comfortable fit. Each hat is hand-crafted with a special dye and washing process which results in unique variations of color from one hat to the next. So show your team pride in style with the Olive Custom Dad Hat from Sportsman! Be assured that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:09:00', '2025-03-28 16:09:00', NULL),
(348, 28, 6, 'Cincinnati Reds 1968 Cooperstown Clean Up Cap | \'47 Brand', 'cincinnati-reds-1968-cooperstown-clean-up-cap-47-brand', '<p>Introducing the Cincinnati Reds 1968 Cooperstown Clean Up Cap from \'47 Brand - the perfect way to show your true colours and support your team! Made from garment-washed cotton for a soft feel, this relaxed and curved dad-style cap is extremely comfortable to wear all day and night. And with its adjustable pull-through back fabric strap, it\'s guaranteed to give you the perfect fit every time. So don\'t hesitate - get your hands on the Cincinnati Reds 1968 Cooperstown Clean Up Cap from \'47 Brand today!</p>', NULL, 34.00, 1, '2025-03-28 16:09:46', '2025-03-28 16:09:46', NULL),
(349, NULL, NULL, 'Periwinkle Custom Dad Hat | Sportsman', 'periwinkle-custom-dad-hat-sportsman', '<p>There\'s something special about Sportsman’s Periwinkle Custom Dad Hat. It\'s hand-crafted with a unique dye and washing process, resulting in variations of color from one hat to the next. And the 100% cotton pigment dyed twill means it\'s built to last. But what really sets this hat apart is the attention to detail. From the pre-curved visor to the tri-glide buckle closure, every aspect has been designed for comfort and style. Feel secure that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:11:15', '2025-03-28 16:11:15', NULL),
(350, 28, 6, 'Cincinnati Reds Clean Up Cap | \'47 Brand', 'cincinnati-reds-clean-up-cap-47-brand', '<p>The \'47 Clean Up is the perfect choice for baseball fans who want to show off their team spirit in style. Made from garment-washed cotton twill, it features a relaxed fit and retro look. The Cincinnati Reds logo is embroidered on the front, and the strapback closure ensures a comfortable, one-size-fits-most fit. Whether you\'re cheering on your team from the stands or just showing your support around town, this cap is a must-have for any true fan.</p>', NULL, 34.00, 1, '2025-03-28 16:11:23', '2025-03-28 16:11:23', NULL),
(351, 28, 7, 'Colorado Rockies Black Clean Up Cap | \'47 Brand', 'colorado-rockies-black-clean-up-cap-47-brand', '<p>Your Colorado Rockies fandom will be on full display when you put on this Black Clean Up Cap from \'47 Brand. This hat features bold Colorado Rockies graphics embroidered on the crown, making it the perfect way to show your team pride. It\'s made from 100% cotton for a comfortable fit, and has an adjustable strap so you can get the perfect fit. Whether you\'re tailgating or watching the game from home, this hat is a must-have for any true Colorado Rockies fan.</p>', NULL, 34.00, 1, '2025-03-28 16:12:47', '2025-03-28 16:12:47', NULL),
(352, NULL, NULL, 'Pink Custom Dad Hat | Sportsman', 'pink-custom-dad-hat-sportsman', '<p>Introducing the Pink Custom Dad Hat from Sportsman! This hat is perfect for those who appreciate quality craftsmanship and stylish design. Made from 100% cotton pigment dyed twill, this unstructured six-panel low-profile hat features a pre-curved visor and tri-glide buckle closure. Thespecial dye and washing process used to create this hat results in unique variations of color, making each one truly one-of-a-kind. Feel confident that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:13:37', '2025-03-28 16:13:37', NULL),
(353, NULL, NULL, 'Red Custom Dad Hat | Sportsman', 'red-custom-dad-hat-sportsman', '<p>Made from 100% cotton pigment dyed twill, this unstructured six-panel Red Custom Dad Hat from Sportsman features a low-profile design and a pre-curved visor. The tri-glide buckle closure ensures a snug, comfortable fit, and the unique washing process results in variations of color from one hat to the next. So whether you\'re hitting the golf course or just running errands, you\'ll look great doing it in the Red Custom Dad Hat! Be assured that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:16:52', '2025-03-28 16:16:52', NULL),
(354, NULL, NULL, 'Royal Custom Dad Hat | Sportsman', 'royal-custom-dad-hat-sportsman', '<p>This unique hat is 100% cotton and pigment dyed for a one-of-a-kind look. It features an unstructured, six-panel design and a pre-curved visor. The tri-glide buckle closure ensures a comfortable, custom fit. This hat is all hand-crafted with a special dye and washing process which results in unique variations of color from one hat to the next. So you can be sure that your Sportsman Royal Custom Dad Hat is truly one-of-a-kind! Feel confident that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:20:33', '2025-03-28 16:20:33', NULL),
(355, NULL, NULL, 'Seafoam Custom Dad Hat | Sportsman', 'seafoam-custom-dad-hat-sportsman', '<p>Every dad needs a great ball cap, and our Seafoam Custom Dad Hat is perfect for the sportsman in your life! This unstructured, six-panel hat is made from 100% cotton pigment dyed twill and features a pre-curved visor and tri-glide buckle closure. The all-handcrafted dyeing and washing process results in unique variations of color from one hat to the next. Feel secure that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:23:14', '2025-03-28 16:23:14', NULL),
(356, NULL, NULL, 'Stone Custom Dad Hat | Sportsman', 'stone-custom-dad-hat-sportsman', '<p>The Stone Custom Dad Hat from Sportsman is perfect for any golfer or casual wearer. It is made of 100% cotton pigment dyed twill and has an unstructured, six-panel, low-profile design. The pre-curved visor and tri-glide buckle closure make it adjustable to fit any head size. This hat is all hand-crafted with a special dye and washing process which results in unique variations of color from one hat to the next. Be assured that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:25:46', '2025-03-28 16:25:46', NULL),
(357, NULL, NULL, 'Teal Custom Dad Hat | Sportsman', 'teal-custom-dad-hat-sportsman', '<p>Introducing the Teal Custom Dad Hat from Sportsman, the perfect cap for any sportsman. This hat is made from 100% cotton pigment dyed twill, making it extremely durable and comfortable. It features an unstructured, six-panel design and a low-profile pre-curved visor. The tri-glide buckle closure ensures a snug and comfortable fit. This hat is hand-crafted with a special dye and washing process which results in unique variations of color from one hat to the next. The Teal Custom Dad Hat is available in one size that fits 6 5/8\"-7 3/8\". Feel confident that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:28:38', '2025-03-28 16:28:38', NULL),
(358, NULL, NULL, 'Texas Orange Custom Dad Hat | Sportsman', 'texas-orange-custom-dad-hat-sportsman', '<p>Introducing the Texas Orange Custom Dad Hat from Sportsman! This snazzy and unique hat is perfect for any outdoor activity. Made from 100% cotton pigment dyed twill, it\'s unstructured, six-panel, low-profile design is perfect for a day on the golf course or a hike in the woods. The pre-curved visor and tri-glide buckle closure make it adjustable to fit any head size, while the all-handcrafted construction uses a special dye for its coloring. Whether you\'re looking for a fashion statement or functional headwear, the Texas Orange Custom Dad Hat from Sportsman is a great choice! Feel secure that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:31:56', '2025-03-28 16:31:56', NULL),
(359, NULL, NULL, 'Wine Custom Dad Hat | Sportsman', 'wine-custom-dad-hat-sportsman', '<p>The Wine Custom Dad Hat from Sportsman is perfect for any sporty dad or athlete. The rich wine color is achieved through a special dyeing and washing process. The unstructured, six-panel design is low-profile and has a pre-curved visor, making it comfortable to wear. The tri-glide buckle closure ensures a perfect fit. Plus, the 100% cotton pigment dyed twill is soft and breathable. Hand-crafted with care, this hat is a must-have for any dad who loves to stay active. Be assured that CapBeast’s custom embroidery won’t fade or run on the pigment-dyed cotton unless under the most extreme circumstances. Add your logo or text in CapBeast’s custom hat maker today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:36:28', '2025-03-28 16:36:28', NULL),
(360, NULL, NULL, 'Gold and Black Sandwich Bill Cap | ATC', 'gold-and-black-sandwich-bill-cap-atc', '<p>You know what they say, dress for the job you want, not the job you have. Why not put your best foot forward with the Gold and Black Sandwich Bill Cap from The Authentic T-Shirt Company (ATC)? This sharp-looking cap is made from 100% cotton twill and features a 6-panel design with an adjustable hook and loop closure. The structured mid-profile design looks great on anyone, and the striking gold and black color scheme is sure to turn heads. Whether you\'re hitting the town or the office, make a statement with the Gold and Black Sandwich Bill Cap from ATC.</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:43:10', '2025-03-28 16:43:10', NULL),
(361, NULL, NULL, 'Black and Khaki Sandwich Bill Cap | ATC', 'black-and-khaki-sandwich-bill-cap-atc', '<p>For a smart, versatile hat that you can wear with any outfit, give our Black and Khaki Sandwich Bill Cap from The Authentic T-Shirt Company (ATC) a try! Made from 100% cotton twill, this six-panel cap is comfortable to wear and features an adjustable hook and loop closure. The structured design keeps the hat looking sharp, while the mid profile provides just the right amount of coverage. Whether you\'re headed to the beach or hitting the town, this cap is a great choice for any occasion. Plus, it comes in a two-tone black and khaki color scheme that goes with everything. So don\'t wait - grab one of our Black and Khaki Sandwich Bill Caps today!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:50:02', '2025-03-28 16:50:02', NULL),
(362, NULL, NULL, 'Black and White Sandwich Bill Cap | ATC', 'black-and-white-sandwich-bill-cap-atc', '<p>For a chic and functional hat that will keep you cool and comfortable all day long, give a look at our Black and White Sandwich Bill Cap from The Authentic T-Shirt Company (ATC)! Made from 100% cotton twill, this 6-panel hat is adjustable to ensure the perfect fit. Plus, the structured design means it will hold its shape wear after wear. Whether you\'re hitting the beach or the streets, this cap will turn heads.</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:53:11', '2025-03-28 16:53:11', NULL),
(363, NULL, NULL, 'Black and Gold Sandwich Bill Cap | ATC', 'black-and-gold-sandwich-bill-cap-atc', '<p>Looking sharp and feeling cool is a breeze with our Black and Gold Sandwich Bill Cap. Made from 100% cotton twill, this 6-panel cap features an adjustable hook and loop closure for the perfect fit. The structured design keeps things feeling fresh, while the mid profile provides just the right amount of coverage. Plus, the cool black and gold color combo is sure to turn heads. Whether you\'re hitting the streets orthe slopes, this cap has you covered.</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:55:43', '2025-03-28 16:55:43', NULL),
(364, NULL, NULL, 'Charcoal and Black Sandwich Bill Cap | ATC', 'charcoal-and-black-sandwich-bill-cap-atc', '<p>This is the perfect cap for those who like to keep it cool and classic. The charcoal and black sandwich bill cap from The Authentic T-Shirt Company (ATC) is made of 100% cotton twill and features a 6-panel design. It has an adjustable hook and loop closure and a mid-profile structured fit. Plus, the charcoal and black color combo is perfect for any outfit. So don\'t wait any longer, grab one of these caps today and show the world your sense of style!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 16:59:09', '2025-03-28 16:59:09', NULL),
(365, NULL, NULL, 'Navy and Gold Sandwich Bill Cap | ATC', 'navy-and-gold-sandwich-bill-cap-atc', '<p>For a chic way to show your support for your favorite team? Look no further than the Navy and Gold Sandwich Bill Cap from The Authentic T-Shirt Company (ATC). This sharp-looking cap is made from 100% cotton twill and features a 6-panel design with an adjustable hook and loop closure. It\'s also got a mid profile and structured design that makes it perfect for showing your team pride in any setting. And of course, it comes in the navy and gold colors of your favorite team. So grab one today and show your support in style!</p><p><br>&nbsp;</p>', NULL, 26.00, 1, '2025-03-28 17:03:32', '2025-03-28 17:03:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `product_categories`
--

CREATE TABLE `product_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_categories`
--

INSERT INTO `product_categories` (`id`, `product_id`, `category_id`, `created_at`, `updated_at`) VALUES
(9, 246, 26, '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(10, 244, 26, '2025-03-27 12:42:42', '2025-03-27 12:42:42'),
(11, 96, 24, '2025-03-27 13:40:03', '2025-03-27 13:40:03'),
(13, 30, 22, '2025-03-27 13:51:34', '2025-03-27 13:51:34'),
(14, 31, 22, '2025-03-27 13:52:07', '2025-03-27 13:52:07'),
(15, 32, 22, '2025-03-27 13:52:30', '2025-03-27 13:52:30'),
(17, 34, 22, '2025-03-27 13:53:24', '2025-03-27 13:53:24'),
(18, 35, 22, '2025-03-27 13:53:42', '2025-03-27 13:53:42'),
(20, 36, 22, '2025-03-27 13:59:06', '2025-03-27 13:59:06'),
(21, 39, 22, '2025-03-27 14:01:08', '2025-03-27 14:01:08'),
(22, 40, 22, '2025-03-27 14:01:28', '2025-03-27 14:01:28'),
(23, 41, 22, '2025-03-27 14:01:47', '2025-03-27 14:01:47'),
(24, 49, 22, '2025-03-27 14:02:07', '2025-03-27 14:02:07'),
(25, 50, 22, '2025-03-27 14:02:29', '2025-03-27 14:02:29'),
(26, 51, 23, '2025-03-27 14:03:25', '2025-03-27 14:03:25'),
(27, 52, 23, '2025-03-27 14:04:01', '2025-03-27 14:04:01'),
(28, 53, 23, '2025-03-27 14:04:23', '2025-03-27 14:04:23'),
(29, 54, 23, '2025-03-27 14:04:42', '2025-03-27 14:04:42'),
(30, 55, 23, '2025-03-27 14:05:03', '2025-03-27 14:05:03'),
(32, 56, 23, '2025-03-27 14:05:32', '2025-03-27 14:05:32'),
(33, 57, 23, '2025-03-27 14:05:54', '2025-03-27 14:05:54'),
(34, 58, 23, '2025-03-27 14:06:50', '2025-03-27 14:06:50'),
(35, 59, 23, '2025-03-27 14:07:26', '2025-03-27 14:07:26'),
(36, 60, 23, '2025-03-27 14:07:50', '2025-03-27 14:07:50'),
(37, 61, 23, '2025-03-27 14:08:34', '2025-03-27 14:08:34'),
(39, 62, 23, '2025-03-27 14:11:27', '2025-03-27 14:11:27'),
(40, 63, 23, '2025-03-27 14:12:09', '2025-03-27 14:12:09'),
(41, 64, 23, '2025-03-27 14:13:09', '2025-03-27 14:13:09'),
(42, 65, 23, '2025-03-27 14:13:22', '2025-03-27 14:13:22'),
(43, 66, 23, '2025-03-27 14:13:39', '2025-03-27 14:13:39'),
(44, 67, 23, '2025-03-27 14:13:51', '2025-03-27 14:13:51'),
(45, 68, 23, '2025-03-27 14:14:59', '2025-03-27 14:14:59'),
(46, 69, 23, '2025-03-27 14:15:23', '2025-03-27 14:15:23'),
(48, 70, 23, '2025-03-27 14:15:43', '2025-03-27 14:15:43'),
(49, 71, 23, '2025-03-27 14:17:23', '2025-03-27 14:17:23'),
(50, 72, 23, '2025-03-27 14:17:57', '2025-03-27 14:17:57'),
(51, 73, 23, '2025-03-27 14:18:30', '2025-03-27 14:18:30'),
(52, 74, 23, '2025-03-27 14:18:46', '2025-03-27 14:18:46'),
(53, 75, 23, '2025-03-27 14:18:54', '2025-03-27 14:18:54'),
(54, 76, 23, '2025-03-27 14:19:51', '2025-03-27 14:19:51'),
(55, 77, 23, '2025-03-27 14:19:58', '2025-03-27 14:19:58'),
(56, 78, 23, '2025-03-27 14:20:11', '2025-03-27 14:20:11'),
(57, 80, 23, '2025-03-27 14:20:18', '2025-03-27 14:20:18'),
(58, 82, 23, '2025-03-27 14:20:29', '2025-03-27 14:20:29'),
(59, 83, 23, '2025-03-27 14:20:36', '2025-03-27 14:20:36'),
(60, 84, 23, '2025-03-27 14:20:49', '2025-03-27 14:20:49'),
(61, 85, 23, '2025-03-27 14:22:16', '2025-03-27 14:22:16'),
(62, 86, 23, '2025-03-27 14:22:24', '2025-03-27 14:22:24'),
(63, 87, 23, '2025-03-27 14:22:36', '2025-03-27 14:22:36'),
(64, 89, 23, '2025-03-27 14:22:44', '2025-03-27 14:22:44'),
(65, 90, 23, '2025-03-27 14:22:56', '2025-03-27 14:22:56'),
(66, 247, 27, '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(67, 248, 27, '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(68, 249, 27, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(71, 29, 22, '2025-03-27 15:38:31', '2025-03-27 15:38:31'),
(73, 250, 27, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(75, 256, 26, '2025-03-28 09:09:09', '2025-03-28 09:09:09'),
(76, 257, 26, '2025-03-28 09:12:08', '2025-03-28 09:12:08'),
(77, 258, 26, '2025-03-28 09:15:08', '2025-03-28 09:15:08'),
(78, 259, 26, '2025-03-28 09:18:03', '2025-03-28 09:18:03'),
(79, 260, 26, '2025-03-28 09:20:30', '2025-03-28 09:20:30'),
(80, 261, 26, '2025-03-28 09:26:07', '2025-03-28 09:26:07'),
(81, 262, 26, '2025-03-28 09:29:00', '2025-03-28 09:29:00'),
(82, 263, 26, '2025-03-28 09:29:02', '2025-03-28 09:29:02'),
(83, 264, 26, '2025-03-28 09:32:07', '2025-03-28 09:32:07'),
(84, 265, 26, '2025-03-28 09:35:26', '2025-03-28 09:35:26'),
(85, 266, 26, '2025-03-28 09:39:16', '2025-03-28 09:39:16'),
(86, 267, 26, '2025-03-28 10:38:24', '2025-03-28 10:38:24'),
(87, 268, 26, '2025-03-28 10:44:21', '2025-03-28 10:44:21'),
(88, 269, 26, '2025-03-28 10:47:41', '2025-03-28 10:47:41'),
(89, 270, 26, '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(90, 271, 26, '2025-03-28 11:00:15', '2025-03-28 11:00:15'),
(91, 272, 26, '2025-03-28 11:03:03', '2025-03-28 11:03:03'),
(92, 273, 26, '2025-03-28 11:05:51', '2025-03-28 11:05:51'),
(93, 274, 26, '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(94, 275, 26, '2025-03-28 11:24:40', '2025-03-28 11:24:40'),
(95, 276, 26, '2025-03-28 11:26:50', '2025-03-28 11:26:50'),
(96, 277, 26, '2025-03-28 11:30:39', '2025-03-28 11:30:39'),
(97, 278, 26, '2025-03-28 11:33:38', '2025-03-28 11:33:38'),
(98, 279, 26, '2025-03-28 11:37:12', '2025-03-28 11:37:12'),
(99, 280, 26, '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(100, 281, 26, '2025-03-28 11:47:51', '2025-03-28 11:47:51'),
(101, 282, 26, '2025-03-28 11:49:33', '2025-03-28 11:49:33'),
(102, 283, 26, '2025-03-28 11:58:55', '2025-03-28 11:58:55'),
(103, 284, 26, '2025-03-28 12:00:23', '2025-03-28 12:00:23'),
(104, 285, 26, '2025-03-28 12:04:23', '2025-03-28 12:04:23'),
(105, 286, 26, '2025-03-28 12:07:10', '2025-03-28 12:07:10'),
(106, 287, 26, '2025-03-28 12:19:42', '2025-03-28 12:19:42'),
(109, 288, 24, '2025-03-28 12:26:11', '2025-03-28 12:26:11'),
(110, 288, 25, '2025-03-28 12:26:11', '2025-03-28 12:26:11'),
(111, 289, 26, '2025-03-28 12:53:00', '2025-03-28 12:53:00'),
(112, 290, 26, '2025-03-28 12:58:22', '2025-03-28 12:58:22'),
(113, 291, 26, '2025-03-28 13:03:37', '2025-03-28 13:03:37'),
(114, 292, 26, '2025-03-28 13:07:29', '2025-03-28 13:07:29'),
(115, 293, 26, '2025-03-28 13:13:07', '2025-03-28 13:13:07'),
(116, 294, 26, '2025-03-28 13:18:09', '2025-03-28 13:18:09'),
(117, 295, 26, '2025-03-28 13:21:52', '2025-03-28 13:21:52'),
(118, 296, 26, '2025-03-28 13:29:41', '2025-03-28 13:29:41'),
(119, 297, 26, '2025-03-28 13:33:13', '2025-03-28 13:33:13'),
(120, 298, 26, '2025-03-28 13:39:01', '2025-03-28 13:39:01'),
(121, 299, 26, '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(122, 300, 26, '2025-03-28 13:58:04', '2025-03-28 13:58:04'),
(123, 301, 26, '2025-03-28 14:00:39', '2025-03-28 14:00:39'),
(125, 302, 26, '2025-03-28 14:04:17', '2025-03-28 14:04:17'),
(126, 303, 26, '2025-03-28 14:07:03', '2025-03-28 14:07:03'),
(127, 304, 26, '2025-03-28 14:09:16', '2025-03-28 14:09:16'),
(128, 305, 26, '2025-03-28 14:11:58', '2025-03-28 14:11:58'),
(129, 306, 26, '2025-03-28 14:15:54', '2025-03-28 14:15:54'),
(130, 307, 26, '2025-03-28 14:18:47', '2025-03-28 14:18:47'),
(131, 308, 26, '2025-03-28 14:48:25', '2025-03-28 14:48:25'),
(132, 309, 26, '2025-03-28 14:52:08', '2025-03-28 14:52:08'),
(133, 311, 26, '2025-03-28 14:55:38', '2025-03-28 14:55:38'),
(134, 312, 23, '2025-03-28 14:57:24', '2025-03-28 14:57:24'),
(135, 312, 25, '2025-03-28 14:57:24', '2025-03-28 14:57:24'),
(136, 312, 26, '2025-03-28 14:57:24', '2025-03-28 14:57:24'),
(137, 312, 28, '2025-03-28 14:57:24', '2025-03-28 14:57:24'),
(138, 313, 26, '2025-03-28 14:58:05', '2025-03-28 14:58:05'),
(143, 314, 23, '2025-03-28 14:59:08', '2025-03-28 14:59:08'),
(144, 314, 26, '2025-03-28 14:59:08', '2025-03-28 14:59:08'),
(145, 314, 28, '2025-03-28 14:59:08', '2025-03-28 14:59:08'),
(146, 314, 29, '2025-03-28 14:59:08', '2025-03-28 14:59:08'),
(147, 315, 26, '2025-03-28 15:01:24', '2025-03-28 15:01:24'),
(148, 316, 26, '2025-03-28 15:05:23', '2025-03-28 15:05:23'),
(149, 317, 26, '2025-03-28 15:10:37', '2025-03-28 15:10:37'),
(150, 319, 26, '2025-03-28 15:14:14', '2025-03-28 15:14:14'),
(151, 320, 23, '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(152, 320, 24, '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(153, 320, 25, '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(154, 320, 27, '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(155, 320, 28, '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(156, 320, 29, '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(157, 322, 24, '2025-03-28 15:19:25', '2025-03-28 15:19:25'),
(158, 324, 26, '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(159, 328, 26, '2025-03-28 15:29:56', '2025-03-28 15:29:56'),
(160, 329, 26, '2025-03-28 15:34:27', '2025-03-28 15:34:27'),
(161, 334, 26, '2025-03-28 15:41:58', '2025-03-28 15:41:58'),
(163, 336, 26, '2025-03-28 15:48:55', '2025-03-28 15:48:55'),
(164, 337, 26, '2025-03-28 15:50:55', '2025-03-28 15:50:55'),
(165, 33, 22, '2025-03-28 15:51:53', '2025-03-28 15:51:53'),
(166, 338, 26, '2025-03-28 15:53:11', '2025-03-28 15:53:11'),
(167, 339, 26, '2025-03-28 15:55:43', '2025-03-28 15:55:43'),
(168, 340, 26, '2025-03-28 15:58:30', '2025-03-28 15:58:30'),
(169, 341, 26, '2025-03-28 16:00:51', '2025-03-28 16:00:51'),
(170, 343, 26, '2025-03-28 16:04:20', '2025-03-28 16:04:20'),
(171, 345, 26, '2025-03-28 16:06:35', '2025-03-28 16:06:35'),
(172, 347, 26, '2025-03-28 16:09:00', '2025-03-28 16:09:00'),
(173, 349, 26, '2025-03-28 16:11:15', '2025-03-28 16:11:15'),
(174, 352, 26, '2025-03-28 16:13:37', '2025-03-28 16:13:37'),
(175, 353, 26, '2025-03-28 16:16:52', '2025-03-28 16:16:52'),
(176, 354, 26, '2025-03-28 16:20:33', '2025-03-28 16:20:33'),
(177, 355, 26, '2025-03-28 16:23:14', '2025-03-28 16:23:14'),
(178, 356, 26, '2025-03-28 16:25:46', '2025-03-28 16:25:46'),
(179, 357, 26, '2025-03-28 16:28:38', '2025-03-28 16:28:38'),
(180, 358, 26, '2025-03-28 16:31:56', '2025-03-28 16:31:56'),
(181, 359, 26, '2025-03-28 16:36:28', '2025-03-28 16:36:28'),
(182, 360, 26, '2025-03-28 16:43:10', '2025-03-28 16:43:10'),
(183, 361, 26, '2025-03-28 16:50:02', '2025-03-28 16:50:02'),
(184, 362, 26, '2025-03-28 16:53:11', '2025-03-28 16:53:11'),
(185, 363, 26, '2025-03-28 16:55:43', '2025-03-28 16:55:43'),
(186, 364, 26, '2025-03-28 16:59:09', '2025-03-28 16:59:09'),
(187, 365, 26, '2025-03-28 17:03:32', '2025-03-28 17:03:32');

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
(426, 229, 'Graphite Heather/Dark Green', '#474a51', 'Graphite Heather/Dark Green', '#006400', 'ProductImages/FrontImage/FEdtXM8JQ4kqn3YNVyu7vX9qpAD7xXI9sfc55KvL.jpg', 'ProductImages/BackImage/s9W4ypRS2jETZiiBXSPcX5LKdlo2mN5m860v22rs.jpg', 'ProductImages/RightImage/yw56nF81iLvdbfJe3RTxVClmM2gNfiSXMlvogNnK.jpg', 'ProductImages/LeftImage/e2PrxvGNjXPGcJrtjNGEmYusV791wSxKfLBv5Fen.jpg', '2025-03-26 17:33:24', '2025-03-26 17:33:24'),
(427, 230, 'Graphite Heather/Royal', '#474a51', 'Graphite Heather/Royal', '#4169e1', 'ProductImages/FrontImage/OAVPug3z9lQFuWMqc5iEo0qfSYWqBe1Vls2cOXgG.jpg', 'ProductImages/BackImage/58fclzdiypUxRZgh88kekWaFEfztrWSSyoXUqiTK.jpg', 'ProductImages/RightImage/onMe7PcH7fF1S1wwF15bBEIQmmjH25sWYzN670gy.jpg', 'ProductImages/LeftImage/jniKq4hXxqi7DAw7Z0m2uoHiGPpDBGb5TDplJ99u.jpg', '2025-03-27 11:13:39', '2025-03-27 11:13:39'),
(428, 231, 'Black/Gold', '#ffd700', 'Black/Gold', '#000000', 'ProductImages/FrontImage/SzXmUB3b2PJvDuqttzfKuMVrgyMxuHXtpouBNPrK.jpg', 'ProductImages/BackImage/IcBRW0hs4jhJba6EM7ctdQ6P6hJ688gCiIqRfBcy.jpg', 'ProductImages/RightImage/SAtrthm8qIrlRGQfH3WgAoe0FtswMqDWTXfnvWKP.jpg', 'ProductImages/LeftImage/3bRJoZaFdWjMyr3u7vUHn58HrBHbAdsbL1zkRohl.jpg', '2025-03-27 11:17:20', '2025-03-27 11:17:20'),
(429, 232, 'Graphite/ Cyber Green', '#999999', 'Graphite/ Cyber Green', '#8fc963', 'ProductImages/FrontImage/iD98ystJBNWq09DAKIkXtTuBDr8HZA1mBmD0ZKai.jpg', 'ProductImages/BackImage/0AZpgflBsksQkuryKWXVYlzTFQfxTsGjlVatd5v4.jpg', 'ProductImages/RightImage/YmfBqiE7hAjFnIF6QA8DjiVgq4R30ixJiAgfo98G.jpg', 'ProductImages/LeftImage/jjp7Eeuaso9wAkLxiLppGGSftGl6waqXGdNTAePM.jpg', '2025-03-27 11:24:27', '2025-03-27 11:24:27'),
(430, 233, 'Black/White', '#ffffff', 'Black/White', '#000000', 'ProductImages/FrontImage/CWBmXXJytfHvLLnjLUAvMDkpTkt9YjNVZFx8t8Fu.jpg', 'ProductImages/BackImage/T2OWYCu31MSuK8Uu8qrebHDXNY0B6dOSqd7jImiC.jpg', 'ProductImages/RightImage/6aceCzl3PIEcBHAc5JTUqAH51jDMH0zFTjH9kVRt.jpg', 'ProductImages/LeftImage/h6MgHiDTYy4Nhaw7OY7JFlUi0ZCQIGhmQB0KgGZH.jpg', '2025-03-27 11:28:19', '2025-03-27 11:28:19'),
(431, 234, 'Deep Navy', '#15125c', NULL, '#000000', 'ProductImages/FrontImage/g5JMD0PlC2VCRzqEflsHE4Dlmokkg9u9Kt3z93ce.jpg', 'ProductImages/BackImage/xEAiosEVHn1vRFAtmS74m15wd3v1enkEBzKxEzBM.jpg', 'ProductImages/RightImage/qPwxgVFYma9nr4GeDaTwwcHQa9Qmn87uECk6SHMa.jpg', 'ProductImages/LeftImage/cGHfyPUDqpeAfnQ9f0QV8VodNGY3cjHgiesD8VBx.jpg', '2025-03-27 11:32:24', '2025-03-27 11:32:24'),
(432, 235, 'Deap Navy/White', '#15125c', 'Deap Navy/White', '#ffffff', 'ProductImages/FrontImage/KpCPCu3rBrgZfX5Uex3ymCkCEy68sKcXrsGrT7vO.jpg', 'ProductImages/BackImage/C7xf5YZLoZ39bV2FkEnsmzOGuLQ16ckyXVpruf4r.jpg', 'ProductImages/RightImage/HuMzydbP53oSKLrglbsEuSXsKQfzVVnDdBbDAwRg.jpg', 'ProductImages/LeftImage/eVPQFMfNeLRPDxWuBLkwBSdeUcFsJTKNR9G89tCR.jpg', '2025-03-27 11:37:31', '2025-03-27 11:37:31'),
(433, 236, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/aZpNq5RsATWULLIsTSswmjastVi3OPlfKgLVtDG7.jpg', 'ProductImages/BackImage/4NlziwjAfAu3pt8FTtM2Icv4zrW1FyDuSJtSMdhQ.jpg', 'ProductImages/RightImage/3YwqdNlI2ct5Wzhxwx4eORCRl3P7zRSYQxp0VUPP.jpg', 'ProductImages/LeftImage/PZWZfLJSQehjgJbJ9kiB3rnlUoqcI5e1PhvqSM7J.jpg', '2025-03-27 11:40:54', '2025-03-27 11:40:54'),
(434, 237, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/KNdPIxNVkIefVHTpWttd5deIM3oBpAQmyeCZT8FO.jpg', 'ProductImages/BackImage/ijv4Uj452rYCXJwSPPklq3RnRtFqQm1R9k0VHGim.jpg', 'ProductImages/RightImage/15UMz9oYHcGotASyyqQ0NkcEUkltdDbXp282CHOJ.jpg', 'ProductImages/LeftImage/Bo8sLD0eTEp6nSXa8ppYkqZXqf7wYxpJQwlvRdQR.jpg', '2025-03-27 11:46:54', '2025-03-27 11:46:54'),
(435, 238, 'Red/White', '#fc0800', 'Red/White', '#ffffff', 'ProductImages/FrontImage/yB89r8sPsiWW4UmpG7Mi8YgMosd8lqi2Vy1LQIp8.jpg', 'ProductImages/BackImage/BJiReopGqZxfFH49bRlgI9TmTeh1Bl0RgGDqVnnX.jpg', 'ProductImages/RightImage/01cWq3oiMnoGBK0wCOfk3id61XcPujo0da2WQ4RO.jpg', 'ProductImages/LeftImage/p7kGKwvaPfsnpcWhbNMXwPHECqFzkamYObTxU6hQ.jpg', '2025-03-27 11:52:45', '2025-03-27 11:52:45'),
(436, 239, 'Dark Green', '#006400', NULL, '#000000', 'ProductImages/FrontImage/d7w09504Lbl4zTnv3RWlJnLPPBXeHdRDE3FxlGh0.jpg', 'ProductImages/BackImage/Fve7xaH9mZp1yAXycFEVPOAillVtCcoVMPLhgGRS.jpg', 'ProductImages/RightImage/Un6ewfhxrhNvZIs1aAEPszS4ZSkgbjeDRcbFk2Zu.jpg', 'ProductImages/LeftImage/qrcmNmJkw9eUb6QHCxz8Jt1KLPTQRhntjpCHxG98.jpg', '2025-03-27 11:56:40', '2025-03-27 11:56:40'),
(437, 240, 'Maroon', '#470421', NULL, '#000000', 'ProductImages/FrontImage/AKib2IDHrCe9Wq5zIp9YvZGjGYa8I23f9eO22wky.jpg', 'ProductImages/BackImage/muz8vruUHtxI0g6PCRzcZPY2ccg3UPjzd1hX6p79.jpg', 'ProductImages/RightImage/BPTf9VkzgihR5FWffikycjUsROowJqdd0c7vk7Ii.jpg', 'ProductImages/LeftImage/x8rGT7ksQNGMzgxXhlMNKXjnlyuL05fgiGS0Kj8n.jpg', '2025-03-27 12:00:14', '2025-03-27 12:00:14'),
(438, 241, 'Columbia Blue', '#c3eaf1', NULL, '#000000', 'ProductImages/FrontImage/SSDXPv8d0WpqAMwdjAyqgagGQeYDlKrKPNyT21rc.jpg', 'ProductImages/BackImage/mLdrinVGXE6pgwXF5XwbdYDEMpw8NurNaXAfni9H.jpg', 'ProductImages/RightImage/cSGGn9eilKIPoecCakvACMzHJKx8PrmocSf9H8Ze.jpg', 'ProductImages/LeftImage/CUMyOBDlJuf1LD9HWwVccYGis7xZggpdSj0aujzG.jpg', '2025-03-27 12:04:07', '2025-03-27 12:04:07'),
(439, 242, 'Charcoal', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/4vWq1ydZA4JC5WehHijCdH1Vb8kpip8uaDa33yi5.jpg', 'ProductImages/BackImage/pqOMEYBLbmCznjGf2P2w8kp0CtvCzukk4EBE4Jxy.jpg', 'ProductImages/RightImage/UAkesSpgzLyu6iKo1eEOZIt97doCKgStaBsJWeeJ.jpg', 'ProductImages/LeftImage/d8VcM3qCpasehIcCB1awdRMetGc7fIMu8djtlSx3.jpg', '2025-03-27 12:12:02', '2025-03-27 12:12:02'),
(440, 243, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/fDR8l6IK2lGjG06aYnY2TWkYPcAmEWqKN5ATpQZj.jpg', 'ProductImages/BackImage/7wm4HLpWXLg2iTvwk2mBRuumNN1vXbJdJcAMRJu8.jpg', 'ProductImages/RightImage/mF7s38ClNWqRaCUVu3x2RAhDS7Ok3wUyOlkqLl3D.jpg', 'ProductImages/LeftImage/cDuxiD3R1VFeDnA3xuhmFzogdyyRdpVEDdyWXQY1.jpg', '2025-03-27 12:15:15', '2025-03-27 12:15:15'),
(441, 244, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/nkWKciQqtVSDme95WWiqwKTiZCwDWutXFfD1eckp.jpg', 'ProductImages/BackImage/LMlPcqRSrOhuEPGlysGO4ZkTYaZkL3YP8BbkyKZm.jpg', 'ProductImages/RightImage/FNpTZrjZ9OQm9Y0nQXqjh3OVkQGW0rdsTFNpxLKR.jpg', 'ProductImages/LeftImage/ldFEhB6lqkzv9J3YZN0e3muImkhdY6MrXE5q4PCj.jpg', '2025-03-27 12:20:18', '2025-03-27 12:20:18'),
(442, 245, 'Navy', '#311e85', NULL, '#000000', 'ProductImages/FrontImage/Ae8NsFdXP6nPcBBDYPsSvqeAcqlb3UjX1WvGEhZk.jpg', 'ProductImages/BackImage/h3232eS9YTSmQ4akVzJftiSmp4mGngyYJNccsZMe.jpg', 'ProductImages/RightImage/zOjabjE4GMgYVgeJafYWTZiLxlHjp294BOKEVfax.jpg', 'ProductImages/LeftImage/o5kxiwpd46aWSZtY3kpYg7gkuVJMAnlCZnJ7r8rg.jpg', '2025-03-27 12:24:56', '2025-03-27 12:24:56');
INSERT INTO `product_color` (`id`, `product_id`, `color_name_1`, `color_code_1`, `color_name_2`, `color_code_2`, `front_image`, `back_image`, `right_image`, `left_image`, `created_at`, `updated_at`) VALUES
(443, 246, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/k1kjlbrc6e9fcQSLljBmGGjnQMYNlz4T1Y79at3n.jpg', 'ProductImages/BackImage/EBcRx7r499FLRhuFopGUv5N4cFa31Nwz0nzSpDyQ.jpg', 'ProductImages/RightImage/ZQbx80PYnNoET6e7GmGsRdQLWpINonaBlN0Z4xTq.jpg', 'ProductImages/LeftImage/dFCBDs7z78xeMI3DcEMDYsAmirrQB9gZDd5zMHlu.jpg', '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(444, 246, 'Charcoal', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/qiZ3JWbmM18ptNXlfMg9eBOaeMO4vEd4JdmbvkGG.jpg', 'ProductImages/BackImage/6NQsa1xv0YpPN4I9nxh8o8SlLunzoTMkRyI1WSJw.jpg', 'ProductImages/RightImage/J6BI7Uks6DqnQnq9V5jc4xtNsH7Y7EJ5S8DAEDTi.jpg', 'ProductImages/LeftImage/fgB4f9SvJ84lVAutRGovCoHXOeagidcthdWSO5qL.jpg', '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(445, 246, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/0ay0c4RgJJMzdN5RqwPMabVtV62l6Ld22BxrRFge.jpg', 'ProductImages/BackImage/KSIsWjriMBLhHRGuJH0ohLtUkplKWgfpGn9kOANw.jpg', 'ProductImages/RightImage/uSYmx6BY8dQ9Pm2WyoVMDHxYKmbwNkYgC3jxF7sk.jpg', 'ProductImages/LeftImage/qUVM2PMtmdxXApmV9kfY2UNwOoO2rBUBJb9FwdRc.jpg', '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(446, 246, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/DtnJBA6JaWfhvq9ags70B2FwU8Sr7kINBP4HN4oq.jpg', 'ProductImages/BackImage/nJzEtjNhmppNmfiNZfHww1i0pi2Qogp4ThPAq5K1.jpg', 'ProductImages/RightImage/4xbCRtggvzf3P6DjcVK86MROiE9jeiguSgRMfE7r.jpg', 'ProductImages/LeftImage/p2Gxd5PylCUkJXbX1RYtmJgRtVcdx9XiXUbdYxsu.jpg', '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(447, 246, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/hGK3b5caQbwOGxmbeVtRW2SO7OzoF8KiMuqwx8Lr.jpg', 'ProductImages/BackImage/BgdAxdWI2rxJmTpU94MONeBd2uM9nZm3QSQIIM7b.jpg', 'ProductImages/RightImage/nZs3HVMM4QzoSdRjCe90lbwf7wuqosbcF0NT9GKH.jpg', 'ProductImages/LeftImage/wkIkc6fLdSdMorIoHgkWyAUWo3CcKV8ApDdcABbK.jpg', '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(448, 247, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/G0nS8o0JkdRrEkU6dqmt9IB9wghBFKoCDTO4vMfa.jpg', 'ProductImages/BackImage/oXiPflnScTcGV5xGi6Niy0Ko1SeuG8LotQFOk39v.jpg', 'ProductImages/RightImage/Sm1ix6KMFs3nCMi9XytoBRRRZ48GJbCtBUJVUkFQ.jpg', 'ProductImages/LeftImage/nTJqAwIJL4xI62mpczdqA8YCgBba7giDQLRGv4bD.jpg', '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(449, 247, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/QFmJEQkTZM5qopd2QHb5n6h9ZB3HkdW5aA0iUH1U.jpg', 'ProductImages/BackImage/XkO1G4YG7P8ZrahmurfJOSS4AX5tEXdOi77ja2A7.jpg', 'ProductImages/RightImage/YBnBltS0GUYZq8jwkSHyif2sI6M5ErU1Q2ES202a.jpg', 'ProductImages/LeftImage/8g49i5yG3gqwi4wfBK0AyuVsv4DXCVjEsEzEHIbL.jpg', '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(450, 247, 'Purple', '#4f1b69', NULL, '#000000', 'ProductImages/FrontImage/Qv1OV47xiYtWrVMjIz4oof7hKXF0uFai5E2sWMvb.jpg', 'ProductImages/BackImage/TTwKkCqthQnixGdTUOOVdpsTx9dFmZDLgtmwqrKb.jpg', 'ProductImages/RightImage/E004HxDCE2h4XRrJDgi9jUa5oLAO5lgG6LIY5uQS.jpg', 'ProductImages/LeftImage/jJvmCx5EjcrciijmK9NXAbb7nYvTvYzhgzYENHDc.jpg', '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(451, 247, 'Orange', '#cc5d08', NULL, '#000000', 'ProductImages/FrontImage/pw9NVKQ7mCrtBZJsKj8wGRWvtM0Bc3sWXb44Vfct.jpg', 'ProductImages/BackImage/Rp0VZ7gwVXFfhFxfSVa7bapexEu9biByceBPJjJm.jpg', 'ProductImages/RightImage/2Bxmp2EEyn11Kjapobjdtn2NFqAo5AiafsKO8yPp.jpg', 'ProductImages/LeftImage/XqkCjDpPvaDqzCOTVFnsivOBSFrQ1p8SlzpNemiD.jpg', '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(452, 247, 'Kelly', '#1bab50', NULL, '#000000', 'ProductImages/FrontImage/z1mpXAiextjz5QYHxXsVL6HhpK6jlqwHEtVjDBwB.jpg', 'ProductImages/BackImage/H7TQUMjM95SnNvuUrNT5OIjbZGf2e3wXSVI78UyY.jpg', 'ProductImages/RightImage/9USHTaEStkPQomYZh3k8hFwjOjHmAGv8upEmaxwk.jpg', 'ProductImages/LeftImage/lOqjTiY5hKbrx8Yl9kRVdIZjw6cyoMXTwZbZjfxA.jpg', '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(453, 248, 'White', '#fefbfb', NULL, '#000000', 'ProductImages/FrontImage/IjklcwbFSEINwpzJyRO9cVOxiNRGaKrDfbkRbeau.jpg', 'ProductImages/BackImage/dHRynnSIfCNcBp4ODf4hREjUpC4yuyNTmqanY9K0.jpg', 'ProductImages/RightImage/XLtnF8OhpyhPeWd75PHSgvNMWhTKDmwim6eg4NZr.jpg', 'ProductImages/LeftImage/r3W2A1vxpfrqBY7JjHQxRMYG9Kr6ksK3qLyF2bhd.jpg', '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(454, 248, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/YlVwQsr1u46mIXIMsX6PzLFPBSD8TjdqAzxSZryc.jpg', 'ProductImages/BackImage/hEN1BYgtZDtJkYc92166jSBSTD3FT5r85p2aKvsm.jpg', 'ProductImages/RightImage/QvubNyP3lv4n6iXPdf6l2Z4ozmWwH6amXOPA1yPs.jpg', 'ProductImages/LeftImage/btX51dV4IrdmrbKl20bitqChRQRZJl1JD9jtxA11.jpg', '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(455, 248, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/rh3WydnBtnnT04v1k6irx2qgLXBxbUPK04wSCRKC.jpg', 'ProductImages/BackImage/bN2rt399sNien5P1SsAnTkhbBWBfCgHEpPoj0ZFL.jpg', 'ProductImages/RightImage/9MyIbjf5JTrsItgSogx951y4HJY6dbQSnx7j9VPT.jpg', 'ProductImages/LeftImage/DfMQlBEN60mGOBsBHe7Yz8PAPJQwgMQDZxY57LEQ.jpg', '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(456, 248, 'Grey', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/z5YfbQoNUu0IuXBOrb4c0HRqBGpXarHOKY2uzHmv.jpg', 'ProductImages/BackImage/r58DlbIOcSFO41lWlWWOXfMkj6g35v8IpRg7zjrR.jpg', 'ProductImages/RightImage/p24gFJZL34aaRsTQdlnQqPvacAuh50HfyfpIEYH6.jpg', 'ProductImages/LeftImage/eIHVx414E1qcVmiPKmazpbbCxbl95aVzdQJqw2OW.jpg', '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(457, 248, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/NJq80ibJOPYv13ddaYcRGHXmwRqy03gU87FfXEAs.jpg', 'ProductImages/BackImage/dsTQlGJfAnBX75RLr5uUfIClVGszBfx6bJB4elSu.jpg', 'ProductImages/RightImage/OOBElucet0SH77lZFwBrggQcJzZC0eOLwXX1PUgr.jpg', 'ProductImages/LeftImage/GzxSZF5VaVFCpXzTQyLMo3GCKmgVsX5fwIqnORgG.jpg', '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(458, 249, 'Neon pink', '#ff8c9f', NULL, '#000000', 'ProductImages/FrontImage/dzJ71ehsWJ9E2vTFN1NvInzT363k7WsIDO38qwyj.jpg', 'ProductImages/BackImage/0EinRKyzAdJ4CqxXwO7O4VeEPCqmWRrtjph2Ych4.jpg', 'ProductImages/RightImage/kRYhfOp5VgWJ6fGRdPg4u8Brj2yQ9Hlpejoep134.jpg', 'ProductImages/LeftImage/YPf1iaZf613qmxOLQ3IYYuGcMMn1P7PN3zOegBn8.jpg', '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(459, 249, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/TTmwgOMLBrA0BnGV96bUOMsuCSEASYSVpnfSo9ft.jpg', 'ProductImages/BackImage/aW466k7Y3yEeNkF2Q8P8OzZzOrgXXqjbUxVdOS2V.jpg', 'ProductImages/RightImage/stFpNWaWZXLM9V5IAu8uNDoLTFmE4uScvWDwjG6u.jpg', 'ProductImages/LeftImage/0Tmbp28WPLMTqz9AvSkU9hiczvn0Ok4DCZBQWlFe.jpg', '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(460, 249, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/e1LaNBtKCqprhll2uEku8e7hiOEqxwF0M115giqO.jpg', 'ProductImages/BackImage/jMcN9jOJfOPKvKi33HoN4fq8HNVdRQsUTbm7B6Ts.jpg', 'ProductImages/RightImage/4Z33J3JVqf9JWvjGXky8OFvwitRfZI45Z0xdvqcc.jpg', 'ProductImages/LeftImage/wQSas2OgpL6c3JBhuPikq3j2QyPbNSgXDVbcx0KZ.jpg', '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(461, 249, 'Grey', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/Vt1wk82JNQu5LpnsGpuiGdaDddkbXEkgpClpGpmI.jpg', 'ProductImages/BackImage/DJLzjrGIb6dHWJj8K87AS9x3D6W6Xy3rs2pV4AoF.jpg', 'ProductImages/RightImage/S777G8n2Jp7PaqGjHBO1bOqZU0ZUIs3vAIbnRM9u.jpg', 'ProductImages/LeftImage/BtqpQxsQQwL0ngvNwnbSo6MuWeDoctRergC1Mrpc.jpg', '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(462, 249, 'Oxford', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/9WIDiWCM5ZPOkpI53DaDvWpQ0RR2lbLdkse4FrF4.jpg', 'ProductImages/BackImage/Llc3u9YxvHkxF0dYY5N4Ea3pZ77k6POa2cQk2gJD.jpg', 'ProductImages/RightImage/Ygw3dTY4ygbGZEw1kEHpskDoipAyuv7y6ze954Nf.jpg', 'ProductImages/LeftImage/E4xx22hZsfSfSqzZVoSV2tVeGydfv59yxahHLjvJ.jpg', '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(463, 249, 'Brown', '#573c35', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(464, 249, 'Cotton Candy', '#f9837f', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(465, 249, 'Neon Green', '#baf380', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(466, 249, 'Forest Green', '#516865', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(467, 250, 'Royal', '#4169e1', NULL, '#000000', 'ProductImages/FrontImage/tuMy3dy32eVYZXlnmsuTqXWcIz4jVy425KM6m3hs.jpg', 'ProductImages/BackImage/V5Jol9hSy73jhUOCLduC5Z6yghQvA0Ia23pqbAO4.jpg', 'ProductImages/RightImage/AxscUXpFiH1Vvtrmc4oipwnBaMmHP1ryB9hJwDlA.jpg', 'ProductImages/LeftImage/HCiuwASYsqTKDfrk4EyDkDx88D8dh06ydJW2ZFl6.jpg', '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(468, 250, 'Grey', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/h16Z1vrVlH2JsVcpT2Ow8iE5vFi0LLOIj8TjzsoM.jpg', 'ProductImages/BackImage/ygHFSC1jCdk43Sx3eFKpiosWPM97yMxpm6AyYC3U.jpg', 'ProductImages/RightImage/zORvJ7cJNMangCSwLo9vJC6fHB3B1UU9W8SPGzVK.jpg', 'ProductImages/LeftImage/RvgUIUg7h0CFBHq3B3Idug3cKzVnWlOLn0HYPPvX.jpg', '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(469, 250, 'heather red', '#b83a4b', NULL, '#000000', 'ProductImages/FrontImage/49o4cf93ioo6VwPL6Su1c60sr5rVJnYglPzGsmmD.jpg', 'ProductImages/BackImage/0WHGn5gdLcyu31nFOrdZSe3HmoWzoSCpIdfRnU4O.jpg', 'ProductImages/RightImage/WeS1UUl9jCrkKqgLqTEHeHu1RqpW82L1LIUWInCb.jpg', 'ProductImages/LeftImage/Xgk7R41aMdE0JUM0PYLQsW3N2JTpayhR5GKR5lro.jpg', '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(470, 250, 'Safety Yeloow', '#edff00', NULL, '#000000', 'ProductImages/FrontImage/bo1OJwavaxzTDWYDNObBOpWjyUK76zeOTr2TkqAa.jpg', 'ProductImages/BackImage/ljuhbaROy7kQiDaVAk8a0rxN8K0Y8Out7TjT9T7J.jpg', 'ProductImages/RightImage/zgzn3Yhd7jREHoZr3paarsPIhDxfWV6BxuqaF3em.jpg', 'ProductImages/LeftImage/4xZd2gz2lGUTtcOPYgGJk2I3OOARnknA3fdT3Zhw.jpg', '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(471, 250, 'Forest Green', '#0b5509', NULL, '#000000', 'ProductImages/FrontImage/mi4uKF7wFa5yCRyofGIiwv3CK9iUW2p1Q2aFG3Am.jpg', 'ProductImages/BackImage/2ZLh5bVmTwiHZTWOcqP2oQsQ7T0TX7L8UjWnmP8R.jpg', 'ProductImages/RightImage/UT3btk115LtabHHcHU62x4VMJiQaWQHdJQQiDFle.jpg', 'ProductImages/LeftImage/9cc1neS4VjqJGuh96uaVH237EihOQBJr5sPaUqWd.jpg', '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(472, 250, 'Red', '#d3222c', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(473, 250, 'White', '#ffffff', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(474, 250, 'Navy', '#1d233b', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(475, 250, 'Brown', '#533f36', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(476, 250, 'Charcoal', '#2b2b2b', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(477, 256, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/3Pn8i2aQycceGonyPMbk1B8Da2xhjswFiU3WmyRW.jpg', 'ProductImages/BackImage/82RojOz7bmISjRIRLVEyMPLmh17GQtPG0txkMmOi.jpg', 'ProductImages/RightImage/AY68qOS1npKL1YGIzQ7az28raVWZ6YsZCegp9bC0.jpg', 'ProductImages/LeftImage/O08QzKGm1rL2IQMkW2LAurv6MBfXKmiln76ivT82.jpg', '2025-03-28 09:09:10', '2025-03-28 09:09:10'),
(478, 257, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/KJeFc2J5uDrwu8tLXL82WCMfcVzxZKNzqK1bxvtA.jpg', 'ProductImages/BackImage/wehOpQyL9hM8vZkb6d9Q6uu82QaIRNg0iO4U3ijR.jpg', 'ProductImages/RightImage/AJlQkh4fK7zkVhCLVsoQIPd6Vh3X1sPaj7MWqIeZ.jpg', 'ProductImages/LeftImage/UOMCR0Vw3CE4oFZJQ7IKWtPkOelRB81ZdI6S88Ml.jpg', '2025-03-28 09:12:08', '2025-03-28 09:12:08'),
(479, 258, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/7dzEYMPKgOIWi1HrVOACRRk2DE9JamlngFgx8ghI.jpg', 'ProductImages/BackImage/Q7bADMMPMlMPWCs9rFLEl4fB7LYiqWQh55SJGHXv.jpg', 'ProductImages/RightImage/j0E3j53vsc5PI8HOT29Ui4f0srXOAaep8ElcCQsF.jpg', 'ProductImages/LeftImage/aBbsyVrtIfbcQGeYyS4e1PXmuoOFZthFbIxTRJPK.jpg', '2025-03-28 09:15:09', '2025-03-28 09:15:09'),
(480, 259, 'Charcoal', '#747d7d', NULL, '#000000', 'ProductImages/FrontImage/zS34KKDIgCDBrVmrKt5f4ZLvcDWfC3LBSMgYqBCj.jpg', 'ProductImages/BackImage/6Cto31ooZ88Gotj5hps1mlw3pnGlM80ly9MttxLc.jpg', 'ProductImages/RightImage/oc2cBk0W6U3eCs8zVthO1Kcp8cvW8OZMPrTHOM4N.jpg', 'ProductImages/LeftImage/dP8ycDpOTCTHcnDJBXrnWzzyhkxReuOyEF0uOMRH.jpg', '2025-03-28 09:18:03', '2025-03-28 09:18:03'),
(481, 260, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/S6iDNTkPeZWnj1sgz9FIaWIepECQ4lyX830DyNvv.jpg', 'ProductImages/BackImage/32HXhSFkHhcuIAO9m3MvWmkoFjT0NjobYj1eBvtV.jpg', 'ProductImages/RightImage/uC34aGPKGx8bbX2W3gujSiWrDgxCu14ts1bPzlZk.jpg', 'ProductImages/LeftImage/c5VmJOnx7Ectdm4kVr6qmvzYZJ0wd8xF15FuMTap.jpg', '2025-03-28 09:20:30', '2025-03-28 09:20:30'),
(482, 261, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/BXok1T3Woyx6fpTiWRJKlWaF1oXkQFtMf8u4SvsA.jpg', 'ProductImages/BackImage/96Y1FwfY8mQcmQjawtcJA4nSA0bGn1U9cAk6xxKv.jpg', 'ProductImages/RightImage/sQ7s30c2xdEQFxHZoiVJD2TaKFZx2He6vYE4c0S2.jpg', 'ProductImages/LeftImage/N7760cLPhzun21Iq67ASTunPw9I411WRu7Unksq9.jpg', '2025-03-28 09:26:07', '2025-03-28 09:26:07'),
(483, 262, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/TU7ouXEqYrRRcCDIqPbG94IMh33fe9lfoxqJtICh.jpg', 'ProductImages/BackImage/UqStf8mkKCg8X9fPHHLS582O2qVHkCXgh2fOjZS6.jpg', 'ProductImages/RightImage/SO6WJRXFeJWEnxPfNoxIIZ2tsxxU3KCQdIXZb1b8.jpg', 'ProductImages/LeftImage/RDeMeSzIKObPZPZvjIM88s0VkLyjDpPYBVvyLrmz.jpg', '2025-03-28 09:29:00', '2025-03-28 09:29:00'),
(484, 263, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/qRkMEZbouhJg98ip0Es3D3iRXQ3iCgbSvHXzBaS9.jpg', 'ProductImages/BackImage/xK8Pry8Roaj7Bwoh7WlPyWV7lbMzuoDsrKN9HZn8.jpg', 'ProductImages/RightImage/KRQkRz45FI3iqVxZXETVPTx747nHm5es81z2s4zv.jpg', 'ProductImages/LeftImage/AF4fO4saLk95ZtXXzYstLFz2e2SRXPhshRcv8xEq.jpg', '2025-03-28 09:29:02', '2025-03-28 09:29:02'),
(485, 264, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/YfCXzbmsYVUVjSIntCMyoKOGOopiaGe4z2qs83U6.jpg', 'ProductImages/BackImage/viiEM4QPfq35diav0pWkbh7B0Os0pJ7dEGU4GtGC.jpg', 'ProductImages/RightImage/Fm4cEJ3mYMggUuljS527YFSy5Pvux9dPoGRPnugK.jpg', 'ProductImages/LeftImage/sQ5ttihYrwf3VgVY2PeKJYw08JZlamPF7LEPKs6u.jpg', '2025-03-28 09:32:07', '2025-03-28 09:32:07'),
(486, 265, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/POGevqOFQ5AugJfHJWItilw3s6keiQg8M12eMfPn.jpg', 'ProductImages/BackImage/8TPjo6PqgoRoDi4YPbSFVTAYkR0S9deeXCRQd5fB.jpg', 'ProductImages/RightImage/Rs1wRCsl443BtUvBEiz9iQ4oiRWpGIKXQy0fLDj4.jpg', 'ProductImages/LeftImage/0T2k9or1iFjYkdeNghWLmSQdrXXtDq6zFgHmCSfR.jpg', '2025-03-28 09:35:26', '2025-03-28 09:35:26'),
(487, 266, 'Gray', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/AJT5yXeSlWXqTbmTOmgwCbychCk8h3oXJSxcmxBk.jpg', 'ProductImages/BackImage/nvR1PDF18bqKbtoG4MJMRjmuhEE3z3Qa0nep4yG4.jpg', 'ProductImages/RightImage/1UvYTAbrT0kc5w00g29q3ATpYRwVkYoV74gsLery.jpg', 'ProductImages/LeftImage/e0FbXotYtoDh5hPgqA0h52x0WpjPxcLUSoG9ugdt.jpg', '2025-03-28 09:39:16', '2025-03-28 09:39:16'),
(488, 267, 'Multicam Black', '#6b665a', 'Multicam Black', '#000000', 'ProductImages/FrontImage/9kgJ1RGUpIG3xk7W03KX9zblO4xrfXjsL0wbGJ5i.jpg', 'ProductImages/BackImage/RkEx7T86AvPdkqkfqZxK5O23qsT5UWVTa7YWrQdx.jpg', 'ProductImages/RightImage/uNZIHB8lqxP3zTwmzV0jhlwma0iV5Fr5m60rwNnd.jpg', 'ProductImages/LeftImage/FZLi4doSmxpwGNKl9kWmKfmC82fPVJXj8zdWF9j5.jpg', '2025-03-28 10:38:24', '2025-03-28 10:38:24'),
(489, 268, 'Mulicam Light Green', '#7b664a', 'Mulicam Light Green', '#958a68', 'ProductImages/FrontImage/4P471Ozo6ddUH9bVDcrYBZA1zuulIl0ZD6cEuCr7.jpg', 'ProductImages/BackImage/eo8PdqtM2N5DD6eJXlsa2ObT90T1G0MXjA3GrWZO.jpg', 'ProductImages/RightImage/GOv3Lum099j168ppOalNfchJWsbslx83VLX0g2Ag.jpg', 'ProductImages/LeftImage/d2UNkfKSU3T6piwl4MSZUx1t698ZM0u5JT6IdeK9.jpg', '2025-03-28 10:44:21', '2025-03-28 10:44:21'),
(490, 269, 'Mulicam Dark Green', '#7b664a', 'Mulicam Dark Green', '#958a68', 'ProductImages/FrontImage/r4KMozXuoSi9NN3tTpt83xWlzM5JSIL8jtsQjjpd.jpg', 'ProductImages/BackImage/Vsy3eBV1szJAKL62yT9yglN7bMu7tXtBbCMolcLB.jpg', 'ProductImages/RightImage/ogwIMeFndOFIcs2jhAd9fvh15MOv3CUoWLVTr3MR.jpg', 'ProductImages/LeftImage/P5wnUrH0VkEvHKH3p6zfx8IQRbH3nWjWM5ef1ZoD.jpg', '2025-03-28 10:47:41', '2025-03-28 10:47:41'),
(491, 270, 'Pastel', '#e1f7d5', 'Pastel', '#ffbdbd', 'ProductImages/FrontImage/qVymgXfzRI2PL3f32KbJdBTQYDV74BhRVtISxMZ9.jpg', 'ProductImages/BackImage/FUo8O1PPVDSG3EPh4YvwvjYFWtyg6z1gjo0XY5GQ.jpg', 'ProductImages/RightImage/e3VCqke5RC2NCbJvDAT8tIwOrksj5TjYtpqjXt5N.jpg', 'ProductImages/LeftImage/OQ6R3mnIWu2UO9AZqPp5k8xnOaFs2lDghDnGBbZ1.jpg', '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(492, 270, 'Sorbat', '#fac815', 'Sorbat', '#89f2e7', 'ProductImages/FrontImage/TiVmJec4vFvwHyYbJFrPuVCKtifgMvpsRuvpuJER.jpg', 'ProductImages/BackImage/tS6mgENj5tpEy7ghVqRSsR3gKOaXN3kWxxi4gOSc.jpg', 'ProductImages/RightImage/8fm7UPz8baNP8nE19cHyyXNHF7HHrqeIEffgZKrp.jpg', 'ProductImages/LeftImage/yCcPVK9Ds2dh4Q7dST4WfEzNpCRII1WOMVmsxDhL.jpg', '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(493, 270, 'Grey Scale', '#bfb4b4', 'Grey Scale', '#b0a5a5', 'ProductImages/FrontImage/yaTW4NjMopMxnozL4TCeYjMCgdAToTL4OEg9sRO1.jpg', 'ProductImages/BackImage/ORhmeE3su5gQTEC4tROtqDydHKySkH3R2oe3lED9.jpg', 'ProductImages/RightImage/8FRs3UYqCO7K90y0d4QW0kunKNF4H19nzqNz4vUo.jpg', 'ProductImages/LeftImage/FdPRbNXWY3268WKGHmErkClcSyR8yvRS1hTvxfnd.jpg', '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(494, 271, 'Grey Scale', '#bfb4b4', 'Grey Scale', '#b0a5a5', 'ProductImages/FrontImage/et4tZubfXVzqLfqNmylb8JkJSwCfsFpqWCaCWjRT.jpg', 'ProductImages/BackImage/NXjMJsCIRAytnr39nBFDtCdgkGrtIbw5KGPKF4jK.jpg', 'ProductImages/RightImage/MOTjgOYnlWw0oaBTmogb1ALzoU2FKtB57ufr0Zst.jpg', 'ProductImages/LeftImage/efW0447PGHNcGdvdwpN8dOxUOINZWx32KV6mGLeQ.jpg', '2025-03-28 11:00:15', '2025-03-28 11:00:15'),
(495, 272, 'Pastel', '#e1f7d5', 'Pastel', '#ffbdbd', 'ProductImages/FrontImage/nMuYpUL2QSXtihDfI7LeAE24hboZhv4H6NW23rKN.jpg', 'ProductImages/BackImage/MvaTkA3BhOnQxnqoCBoce57VCad8ac6lzNGG98mB.jpg', 'ProductImages/RightImage/Hr6jrLLuE17A4hHzGASzEoexUMPqT2S9KF6oFNP7.jpg', 'ProductImages/LeftImage/IzLxLiiXQjvqEqX9KSkl38xIoBIFSFca7WAtVvOk.jpg', '2025-03-28 11:03:03', '2025-03-28 11:03:03'),
(496, 273, 'Sorbet', '#fac815', 'Sorbet', '#89f2e7', 'ProductImages/FrontImage/mOFYOpX4k5aVWdX05KLqpHrOlZJsjYKL1JZ0cPJh.jpg', 'ProductImages/BackImage/gLHwcO505fUwyNdgfyABgpkyjGaLkHRx9bQL2zrg.jpg', 'ProductImages/RightImage/afKnoAGmtG34MiJvZHGb9825x1UuR6Js5HBxeN7J.jpg', 'ProductImages/LeftImage/5MovyKhIFAXX4dgManeaJnD3fJ9IToLNhiDu3OFw.jpg', '2025-03-28 11:05:51', '2025-03-28 11:05:51'),
(497, 274, 'Raspberry Mist', '#d1edc8', 'Raspberry Mist', '#c42243', 'ProductImages/FrontImage/2mvfy5KiNlWG0tI01cydN35zCz8WjHNpnC2Q1rQ8.jpg', 'ProductImages/BackImage/zLIxlq3qNqzgnvTcbdiEobsIWCoPB0BE0LSRHsSJ.jpg', 'ProductImages/RightImage/uap1XP7ys6fQD6Q8ueWaTauVU819T9kMjJYT0NV0.jpg', 'ProductImages/LeftImage/WVBrUtACMOMkBO78CXScLswCZ8sogMzajA38TRUz.jpg', '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(498, 274, 'Gray', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/gcJ91U6ArSkwbnKsHUv03bNSsJGhnm10LKPJnMDu.jpg', 'ProductImages/BackImage/URFzFoCt4zQLMX1Gknkn9wGAqx5rSqE8YzaD1Ler.jpg', 'ProductImages/RightImage/O3An00NWaZJVWdMEhjaIFz53MhWri0BJIPnRYk4P.jpg', 'ProductImages/LeftImage/TAHP5ASbrX41lVmjpMsUoNGUzLSPkyOaX233VaFu.jpg', '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(499, 274, 'Sky', '#007dff', 'Sky', '#009fff', 'ProductImages/FrontImage/L6H4OjwyHCcsulmh6xADspefhbZoGnCQbwkfPQBz.jpg', 'ProductImages/BackImage/MbmpEJj1kSJuOCUDR9kMCnjWyLwgL1iYK6nTIcze.jpg', 'ProductImages/RightImage/dHxwkQbExO1KIeGRiuwKWC6aaYj5mhvTXVoJ1H01.jpg', 'ProductImages/LeftImage/ZsDDzXZd900j9a1t8W4tMYkicK3Hd5bJ0U7ktcmJ.jpg', '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(500, 274, 'Purple Passion', '#8d4592', 'Purple Passion', '#ad65b2', 'ProductImages/FrontImage/kPw6hDwW8ktpGp6HZjCZLag8JJmMeyeuZvZpByaY.jpg', 'ProductImages/BackImage/Fr1R2ZD6rswQ96i5fMoZo6OziJaD5nNLQjbmLlPW.jpg', 'ProductImages/RightImage/UZGfqlkhirxJ8FC3U2siKtaogFsGkjZK4GuhRi20.jpg', 'ProductImages/LeftImage/Va6P5uK4IcSlukJLWXllHb1KCI7AhGRXwd6k08eM.jpg', '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(501, 274, 'Cotton Candy', '#ffcbcb', 'Cotton Candy', '#ffa7a7', 'ProductImages/FrontImage/oLYrt7MknCiz7jpcuxdnHiwe5SPj6JA7MUIlRglj.jpg', 'ProductImages/BackImage/NO2k600jyqjjcZVSDTynXwtZJrPPP0pc2rypINMI.jpg', 'ProductImages/RightImage/EDH6EttEvraH0EIKdk5xpf0lGGLYHhSvGjHStFGp.jpg', 'ProductImages/LeftImage/PXrWPMMTGzPXarPYBIZ5haHhNh4ZgFrsFsUUwUkU.jpg', '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(502, 275, 'Cotton Candy', '#ffcbcb', 'Cotton Candy', '#ffa7a7', 'ProductImages/FrontImage/YlA5Ut7GtZDyfgIWhCGDeZZpivQi3NQ4vs4vzQ9S.jpg', 'ProductImages/BackImage/7XFZL8TPUgldbDBJEGLXPF4WnCcOO4HoNpbLsxEc.jpg', 'ProductImages/RightImage/3c1SlGBKRxIc8rtrlg6eS4J9klJqTLHbtmSi1RSv.jpg', 'ProductImages/LeftImage/pY59ZaqD1dP4cVNtGu9uL7QOBB22wUEXGUFjwQJr.jpg', '2025-03-28 11:24:40', '2025-03-28 11:24:40'),
(503, 276, 'Gray', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/2WLgvYdhfNoWhb5yr1METYkV0bnSPGlQhyCsjj0i.jpg', 'ProductImages/BackImage/ubQa0aScVSDnctyqv8fEjuGmxL4bGIpEHlyIJ72G.jpg', 'ProductImages/RightImage/iPbPXJvWBC2nidOBs508QmV1gMB0Z12Ib3Qf1voP.jpg', 'ProductImages/LeftImage/FhIZz45uQoVucMQj8eNkUy2qk63S63gzxO6KPZMb.jpg', '2025-03-28 11:26:50', '2025-03-28 11:26:50'),
(504, 277, 'Purple Passion', '#8d4592', 'Purple Passion', '#ad65b2', 'ProductImages/FrontImage/e1YZp40M28dTMbZ77ZSXCnEP1jROSt70VIUS52N3.jpg', 'ProductImages/BackImage/bdzSr4WUaE8WbJhfVwBVKjagcmWFR64R1Pgnt7En.jpg', 'ProductImages/RightImage/oSqy9z8Hqb6pb58gOiNW1kW8V5LMrFgCUXHRtvYo.jpg', 'ProductImages/LeftImage/heL1l9gQpAVEaTRjnSCAUR8BOF1KoXdRXvnUhp1c.jpg', '2025-03-28 11:30:39', '2025-03-28 11:30:39'),
(505, 278, 'Raspberry Mist', '#d1edc8', 'Raspberry Mist', '#c42253', 'ProductImages/FrontImage/I8Q9nuVaYPeHGkRiNC10pj4LtasZrSgM68AR3dUI.jpg', 'ProductImages/BackImage/HJ8YgOix73uIxaE6v4xNtKlJWig9XQUcizmLNPyq.jpg', 'ProductImages/RightImage/YSRmyWWoanfnhObeeAH3Hn8w3C4DpMLz4WNmBPn4.jpg', 'ProductImages/LeftImage/wCWx5Yk4w1fJ1Vae0K9VmBOIRr07nWr6Yi6q90h1.jpg', '2025-03-28 11:33:38', '2025-03-28 11:33:38'),
(506, 279, 'Sky', '#007dff', 'Sky', '#009fff', 'ProductImages/FrontImage/lEl3utNVE85LK664v2wqVvbTkf4uHEYmFKZ7uxlq.jpg', 'ProductImages/BackImage/lr8tYgwnMsjgU7175gjhOXwwamgyfJBH3T9fFZ8u.jpg', 'ProductImages/RightImage/C5EDons9c9ND4tQ9Kxvx054gzuMmM3VfIbM3Pg4h.jpg', 'ProductImages/LeftImage/OtjLnOQ2q1u0JZrV08gycVdJEBpw3bJdCEx5iCo1.jpg', '2025-03-28 11:37:12', '2025-03-28 11:37:12'),
(507, 280, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/utZKYDNaFfv5s4rVw97LmI0XT9dOAvf1ONiAjXzg.jpg', 'ProductImages/BackImage/oo9WTbI2UBCD6fqgJ9tJ3LuBfGCbPXu5t5zQxfNV.jpg', 'ProductImages/RightImage/WG2h9BJ0neGItdyCMtWqd22r5oI5LGz3BSYPpRga.jpg', 'ProductImages/LeftImage/hBcWTjesiQ3Oac7KEwD19EgJuNDWRy2lXxrjdjt1.jpg', '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(508, 280, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/dpjr8E4hIiOYeiKxTB6TdPETS6sD5iV4UB7NzQOB.jpg', 'ProductImages/BackImage/sTVqXQ6SMZLA9toh5gMVcca66q2Gu8CsXo3R1zqG.jpg', 'ProductImages/RightImage/u0sgQFPrL81PcefK91aqgeJQFS5o6gVFUZ2WVs0k.jpg', 'ProductImages/LeftImage/kzOlSMsuXE32FmALjlWZh5AbtYIbCVBhrSsG9Xv9.jpg', '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(509, 280, 'Dark Gray', '#636363', NULL, '#000000', 'ProductImages/FrontImage/cEbYqdoa4qbuh0kHsx8UJ4dUN6qva1BBnLEfJ4Ku.jpg', 'ProductImages/BackImage/MHzVayiGeuFW1LAix4nOYld1PkAjNqra6zpR9tkI.jpg', 'ProductImages/RightImage/e7fxj58mRPfVucqPWpcMeW3aANCBmCuKgUOM7ZF9.jpg', 'ProductImages/LeftImage/hDtbC0p4ezduEo00Lt9n0IZPCvpBZEAXL259VDrz.jpg', '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(510, 280, 'Navy', '#311e85', NULL, '#000000', 'ProductImages/FrontImage/A7ZDQ9BClxAp0dBtHHVb2JQ8kZfEoHjaAwyV3uWn.jpg', 'ProductImages/BackImage/OFfeIoEUgKXk9NtJhweTC64qM9rK1m6qJCRf4dH8.jpg', 'ProductImages/RightImage/nvuBHUiMuRJ24t4qWBUIQ65Z9TvtC3LWZFxmjzSg.jpg', 'ProductImages/LeftImage/Wlzs4wBYktmcYGVfNUaThdTtU2PNbKytlMO0BAcf.jpg', '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(511, 281, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/PfdmFqEjwfEAYfh9VEG9fUu9xzjeyV281DBhvc0l.jpg', 'ProductImages/BackImage/4NsivaXwXRMUM3i1dTNtSclZR35zdq2aLbFP6l6Z.jpg', 'ProductImages/RightImage/8hKexX1y5lpK5fljsTukW89I9dlAb7hCJe8ONbhv.jpg', 'ProductImages/LeftImage/ZuibaHCSuD2d3B1WyzEi6OzBb81Qh1RQGykAsp0C.jpg', '2025-03-28 11:47:52', '2025-03-28 11:47:52'),
(512, 282, 'Dark Gray', '#636363', NULL, '#000000', 'ProductImages/FrontImage/d2xU29jhPusfPjwI2Jm2ZgXhHpAWBvOdNbla5y3j.jpg', 'ProductImages/BackImage/dNET0n3BA1KBmWym3cGwwZh9YisoljJgycSGS7qA.jpg', 'ProductImages/RightImage/C1dRLh65UQKVKwTiy3F7jqPxjQSiJgmh72U73zOT.jpg', 'ProductImages/LeftImage/H7wU7E0TWjJHgzOrpMi9k0s1H91wKY31WxY7vJVg.jpg', '2025-03-28 11:49:33', '2025-03-28 11:49:33'),
(513, 283, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/3M9xJk8pTebHHIR4hR5Bx5g6c9hPmxFQ10BC24Tb.jpg', 'ProductImages/BackImage/UDaPxrkI5kxYrl5TkFDlqqTshfLN8avh4qcJkvuJ.jpg', 'ProductImages/RightImage/tmwDjcVnZSovGEH1okjQp65RVliA5AbpgUJzpk8D.jpg', 'ProductImages/LeftImage/dJa60PKLEqc8Vl1rUyp3Udt5bj8mVaQB7MLjMFE3.jpg', '2025-03-28 11:58:55', '2025-03-28 11:58:55'),
(514, 284, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/OdmPbhcKf0RI9WPE2Hplkj04xNEXi2D0IF3UBL9D.jpg', 'ProductImages/BackImage/VIeofBdcNFWuL971EcNEUoHsHtuCpU1UajW9Qgzf.jpg', 'ProductImages/RightImage/eUOyJcmpYZe6vy8wC5wTvEm71XNWaF2rE0qAp6Rz.jpg', 'ProductImages/LeftImage/Kf25hfrx0izAFpvKrc3q0A2dZUQfkuV4ruuVGEDW.jpg', '2025-03-28 12:00:23', '2025-03-28 12:00:23'),
(515, 285, 'Black/Charcoal', '#747d7d', 'Black/Charcoal', '#000000', 'ProductImages/FrontImage/ZdQabYWZlKOoWu4Z1lZ4V9ME5R5ngNGqdtfvN4iV.jpg', 'ProductImages/BackImage/PEHO0Om3TdIhywQxbvuPeKZ9cxstk7BmEobmt8Fv.jpg', 'ProductImages/RightImage/Jm8bWlI1bdVfxM8NMlNprSggtqXZnf4fCKN6zUNf.jpg', 'ProductImages/LeftImage/1O9sCo5OsFeOXnwEIJLkXON1jRULF3XCrmcetGGO.jpg', '2025-03-28 12:04:23', '2025-03-28 12:04:23'),
(516, 286, 'Charcoal/White', '#ffffff', 'Charcoal/White', '#747d7d', 'ProductImages/FrontImage/7vtGOJ8baTVhxg1inStsMwIURyTz8HK4WNHJVTPI.jpg', 'ProductImages/BackImage/Ww4ykRxYXwY3xJdiBXBv8Py4104NNkD6xwWbm46s.jpg', 'ProductImages/RightImage/ViJsqtuiiAw9oWXuf8vSvrTMaVfEIiQ9xHMd1bnj.jpg', 'ProductImages/LeftImage/XOksEIFCeQxOVmmE1cX6g5XBtyuF2DLkdSCT32ay.jpg', '2025-03-28 12:07:10', '2025-03-28 12:07:10'),
(517, 287, 'Gray/White/Black', '#808080', 'Gray/White/Black', '#ffffff', 'ProductImages/FrontImage/Gd5rbUIpoq79jNYMXeqXQnP5ptduPd9atBij7e5r.jpg', 'ProductImages/BackImage/VKWAjkSIglY1pyhTGDTspO9fuoPEBXTp5BSnXTaA.jpg', 'ProductImages/RightImage/qlr31VvScjGScNYIHoBxNtqgGBIMnQT8m9jg460L.jpg', 'ProductImages/LeftImage/sBsb71WeO4vdIUGZwaiJOj9zdXpUVUSomANKSOFf.jpg', '2025-03-28 12:19:42', '2025-03-28 12:19:42'),
(519, 289, 'Navy/White/Red', '#000080', 'Navy/White/Red', '#ffffff', 'ProductImages/FrontImage/0C2x574hunbLO8QfvlC4CdgaJ7id2mWw6NH6nQZW.jpg', 'ProductImages/BackImage/fj63vaiu8b3IjNZ9UciKoV5hD5AypClSTmSZNcGt.jpg', 'ProductImages/RightImage/Q6lV7jW6sl6LgrWmQIRsyZVRn2LeHGLKAFu9MeaN.jpg', 'ProductImages/LeftImage/yhWRH6VQZ7wL2WokGMPpEYsX11AZ1RYNJTDbO5Dk.jpg', '2025-03-28 12:53:00', '2025-03-28 12:53:00'),
(520, 290, 'Red/Charcoal/Black', '#ff0000', 'Red/Charcoal/Black', '#364548', 'ProductImages/FrontImage/VQWzW3VvsBEWLVZdOf2tqiTGpZaShA8MR0XS76d3.jpg', 'ProductImages/BackImage/fpu3rh1fd5TsqI1U47VxcpAxMWgQsCqwKv5vIlF4.jpg', 'ProductImages/RightImage/2vTsZNuPT4wN72tnfgSvDCBRNeLEDx5wLdl5Cu2Z.jpg', 'ProductImages/LeftImage/kA7ffS11gFHEeCNFozl8uFliUtC30pBtIcNApFJB.jpg', '2025-03-28 12:58:22', '2025-03-28 12:58:22'),
(521, 291, 'Royal/Charcoal/Black', '#4169e1', 'Royal/Charcoal/Black', '#36454f', 'ProductImages/FrontImage/Z7XEp5JkifXoJjDdBkUEV5x3hjGg2AuEs3p1clKi.jpg', 'ProductImages/BackImage/7CDnR07W0D1Kfk829q4YLkAM8ZzseDPIa1a6zakW.jpg', 'ProductImages/RightImage/Y8eB9f8CnLQV2GtzKZqS16kMloN3Ym3I6F8BFUcB.jpg', 'ProductImages/LeftImage/wMNRhZLvCker6ZR6MJ0nWSpvnZraD0Xvdv2OqsQH.jpg', '2025-03-28 13:03:37', '2025-03-28 13:03:37'),
(522, 292, 'White/Navy/Red', '#000080', 'White/Navy/Red', '#ffffff', 'ProductImages/FrontImage/k16Sw9ZF8wlD9MRXp8QeTd19Fq5crDkEzxEgbMSL.jpg', 'ProductImages/BackImage/eektGnTNuvfIcQtEHBO8spsLW6NNQYX0hfeLCXSd.jpg', 'ProductImages/RightImage/IJzBLJpDNRABh4LE4PaENzShlKzaANk7wvboEocn.jpg', 'ProductImages/LeftImage/n3NWwXnjT1Q6Aoy2v1cxt5RuwJlweTqqTcvsn7yI.jpg', '2025-03-28 13:07:29', '2025-03-28 13:07:29'),
(523, 293, NULL, '#00ffff', NULL, '#888c8d', 'ProductImages/FrontImage/d8l16Rb2Q1Xmm8dc36efDegcIvREIgZonUrAHSrG.jpg', 'ProductImages/BackImage/1C9yzhMOxw2pMKKvdKaajeVMWjXsuQgBAOmZlTg4.jpg', 'ProductImages/RightImage/SW4QR6fB6l8DnvAzQRzRs58uHWYxzvLIa0Hatnzm.jpg', 'ProductImages/LeftImage/bkvOqwZBoEfhruwPShgHFBO4bHzJVvGyZHdj8y0t.jpg', '2025-03-28 13:13:07', '2025-03-28 13:13:07'),
(524, 294, 'Forest /Stone', '#014421', 'Forest /Stone', '#888c8d', 'ProductImages/FrontImage/yqFsgJyLkaK4U1Hm4aHFkvE5IPhirDiGxpTaqxdM.jpg', 'ProductImages/BackImage/CtqSqdwi7YrpZhHFuQV8XnkMJewjMQW61A7ChmAL.jpg', 'ProductImages/RightImage/kzoG5NLRKyEBdpvnV3jDSXCQpucGqrHU0qgCBh9a.jpg', 'ProductImages/LeftImage/ztScpM7aLMLBXVR5GUdSyPpLioVeXbGqaEaeb5BU.jpg', '2025-03-28 13:18:09', '2025-03-28 13:18:09'),
(525, 295, 'Mustard/ Yellow /Stone', '#ffdb58', 'Mustard/ Yellow /Stone', '#888c8d', 'ProductImages/FrontImage/lGg8yVcRl6H2zrurHzg4A3n04QHzzM8lPW42bPju.jpg', 'ProductImages/BackImage/jT1dxRjl0AQeNYeBbY7YBwvCSJP5dGqfIEp3Vb5F.jpg', 'ProductImages/RightImage/OStAFWwlBs1sYUklUctdvKixKoQfVeeQi8ypknOR.jpg', 'ProductImages/LeftImage/YKMZBjO20iZ8LesiB2wQRBERXPJ44BZIUddT31c1.jpg', '2025-03-28 13:21:52', '2025-03-28 13:21:52'),
(526, 296, 'Navy/ Stone', '#311e8f', 'Navy/ Stone', '#d6c994', 'ProductImages/FrontImage/1Q6tfzu5ZGh0e5rCtaMGLVkDEfzdbMxOMjPzlJOY.jpg', 'ProductImages/BackImage/9gm0urikH2E2nc7plrObb7xzFrVakku8ccXE2X4i.jpg', 'ProductImages/RightImage/n8j3lB26AjWNMRJR2USNoFdciwFTG1Gje4mhAPXx.jpg', 'ProductImages/LeftImage/fcpGqnlzV22fL2dYdPgCdEyvjKyh0lAStd6rI1oc.jpg', '2025-03-28 13:29:41', '2025-03-28 13:29:41'),
(527, 297, 'Red/Stone', '#ff0000', 'Red/Stone', '#888c8d', 'ProductImages/FrontImage/HsS70vH9kay7MTqrS6AWz8Ia2AAo7zTs46oX3giN.jpg', 'ProductImages/BackImage/2xuvwlS9e0kui39IUn6bFAHpTOYqZvzelaPcHiCA.jpg', 'ProductImages/RightImage/OSf602l3lv8fUNZoqktGPDdpHEPekIjgsR1GX2aS.jpg', 'ProductImages/LeftImage/GZjEtnweKKhkUCQ2pNsRteeY2lO7zp8bmSVzUrvL.jpg', '2025-03-28 13:33:13', '2025-03-28 13:33:13'),
(528, 298, 'Royal/Stone', '#4169e1', 'Royal/Stone', '#888c8d', 'ProductImages/FrontImage/1KQctbAwpatgxhqRlBRuewbJCz7bjQOGdn9rsW6V.jpg', 'ProductImages/BackImage/YB3rKaolZxKSEtP0GhBGwEWowLx7KTxVWcN8a6U7.jpg', 'ProductImages/RightImage/RuVymFE5bxGdQ8u0eSPSfX3gsqfLYBsXYTRIKwRM.jpg', 'ProductImages/LeftImage/L73sCyX8ybRqASgEhzFs41L1dTspe9C0fCNcLtXw.jpg', '2025-03-28 13:39:01', '2025-03-28 13:39:01'),
(529, 299, 'White/Black', '#000000', 'White/Black', '#ffffff', 'ProductImages/FrontImage/aCOk8ICWPfb2VhDkk4L24Xim6O0tjzuNbV26VcqR.jpg', 'ProductImages/BackImage/2R7HnojQSbBQSmgX6ZZwfQMKfU5wUyp15mo7fix8.jpg', 'ProductImages/RightImage/sJrHmgoxkenri9ilRVAcJMhJX7KYwJv9t9yZKAAu.jpg', 'ProductImages/LeftImage/ogoIHiHaumso4Te3Z4xX2gHbDJnlWs6aqT72TVWb.jpg', '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(530, 299, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/cEvtWemDnzGqTHAIiETTSzEB2G2jXt7AxYsqpSEe.jpg', 'ProductImages/BackImage/yX3P6f9YF8iCRJDriiplDgTFDWaefjYJEQSBCOHR.jpg', 'ProductImages/RightImage/UnC3hYUGPqD1uJDhzBO0H7D1jfCvbzkuY4BpccDr.jpg', 'ProductImages/LeftImage/2CyGjh5Ww0OfgTJPRwunusgmhMvsV2Fw6ljtz5fj.jpg', '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(531, 299, 'Navy/Red', '#311e8f', 'Navy/Red', '#ff0000', 'ProductImages/FrontImage/2YfKncEO5Bb4equAfoNhDxEte7ofa3234dI9Uax5.jpg', 'ProductImages/BackImage/OakNAVzNhYXcjScEWLuN0yCU0INuHdD72yyjap2s.jpg', 'ProductImages/RightImage/4gyYUga7SCS5zMPSkS4Le7LU8mlOciKUCPoAxZYx.jpg', 'ProductImages/LeftImage/aTNDD492gpdFUsoJVv6qHPEegDUgQl4kjqHPVeos.jpg', '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(532, 300, 'Navy/Red', '#311e8f', 'Navy/Red', '#ff0000', 'ProductImages/FrontImage/qPPNTVXMMo4VfWZj2fvAXIPFl8O8bilqwl0EBvct.jpg', 'ProductImages/BackImage/GU2xtQV7nktgC1FbkSvChqhJIfdhVIInyOKkHrl8.jpg', 'ProductImages/RightImage/tkZuOgaMg4ohGvvty7gAlstIRDmlUgY1ElP38Oev.jpg', 'ProductImages/LeftImage/lhcQHBsSXKvmhIZt2DcjDZvj6VnnO7kSz96Zi70v.jpg', '2025-03-28 13:58:04', '2025-03-28 13:58:04'),
(533, 301, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/VZBhBQTSmU8Q4OlM2swx8rD7G2LooJsbLya5XLlD.jpg', 'ProductImages/BackImage/KmAinl5pUTbbC52OLYplo7k034QVN20ZbwhQnFBw.jpg', 'ProductImages/RightImage/h3HktysuMKw5xTMh0tKd8PHHgaWAsdbTpmOYs9QO.jpg', 'ProductImages/LeftImage/mFePv9dEIWX2L5GOpcZFPWpMhXghExwQTAs3kNlf.jpg', '2025-03-28 14:00:39', '2025-03-28 14:00:39'),
(535, 302, 'Black/White', '#000000', 'Black/White', '#ffffff', 'ProductImages/FrontImage/tFzjCiAXP05MpNEc9FEGvFq3rKD00AgJtQ5d0x1D.jpg', 'ProductImages/BackImage/yCQIdwzXLMoRy21e6f11vqsPipmiPcYcNE5lB3go.jpg', 'ProductImages/RightImage/iKxLGcJtMCs9PkP2QLQYDzbeFnYppeQDsKLRbTy1.jpg', 'ProductImages/LeftImage/wKCZ4z1d3UtAGzrLqy4jJrmD2OkMo3u4jWwulVKq.jpg', '2025-03-28 14:04:17', '2025-03-28 14:04:17'),
(536, 303, 'Dark Green', '#006400', NULL, '#000000', 'ProductImages/FrontImage/cPGF1JqCae97K0TCZyfPyigqjUr7GePqqu5DNcqf.jpg', 'ProductImages/BackImage/UEiUmpgWDAyJ9shTr2BuJom2BXbXmn06WS11WMZn.jpg', 'ProductImages/RightImage/rfyx4tBCjXlEj7io8zpTDNJv6QqthIsxGp8ggyb6.jpg', 'ProductImages/LeftImage/ROeb3GQDppsLpETSxbHg2wQ8tleTRC7dS0No7EXG.jpg', '2025-03-28 14:07:03', '2025-03-28 14:07:03'),
(537, 304, 'Navy/Red', '#311e8f', 'Navy/Red', '#ff0000', 'ProductImages/FrontImage/YJi7Rs3lBPKdRYUHkIgSKNGI4kNefO9JVyZFWnU0.jpg', 'ProductImages/BackImage/UdkJXtx1igvERglKtk3Kws4eKJgedWdxJ4cMBKwX.jpg', 'ProductImages/RightImage/yLNmQHYv0F8xhmTs60fmpBWWA6IyhI7pTiBp977W.jpg', 'ProductImages/LeftImage/uXwAS6z4tDpukhyzCznxKfmD2s1bnbRfFHCYtLxF.jpg', '2025-03-28 14:09:16', '2025-03-28 14:09:16'),
(538, 305, 'White/Black', '#000000', 'White/Black', '#ffffff', 'ProductImages/FrontImage/PVmNk3cipeXc9zNJsM4Zf5oV3SAhLzU94vnWj9tM.jpg', 'ProductImages/BackImage/kfuDuCmu2PNE3fbHub52CvnjNg26L6aCp6oW8BRs.jpg', 'ProductImages/RightImage/y1ZZgOzIgDHJb0d2eJQaqClZsrZAceGqCgnsNbDy.jpg', 'ProductImages/LeftImage/2p6S9Q7l8zaXh7G9OF7PhO7bCFBR00MAEUsoeI4Y.jpg', '2025-03-28 14:11:58', '2025-03-28 14:11:58'),
(539, 306, 'White/Navy', '#000080', 'White/Navy', '#ffffff', 'ProductImages/FrontImage/wDcYFqbMREUIT5rSKxWClGzrgYTUHAPKJiA0qMa9.jpg', 'ProductImages/BackImage/Wwecg5lYsmGkjSvb0Kyi74iGCKRyNH6ePifJcOan.jpg', 'ProductImages/RightImage/vu3Blrz3zSLwkyLLHvLZNFoUJAnm87hgvCXdPErb.jpg', 'ProductImages/LeftImage/F0xxCbQGINJBkhZjL77xfX8zudrE8c3njYTEyLUJ.jpg', '2025-03-28 14:15:54', '2025-03-28 14:15:54'),
(540, 307, 'White/Red', '#ffffff', 'White/Red', '#ff0000', 'ProductImages/FrontImage/ncJMGwTSfzUjqx10lb2hUBAC2H2l2oAEGWir2C2G.jpg', 'ProductImages/BackImage/I7bzfdJIzFKewYmkIGrxfzhmAmAXdQ0VznW1DfQj.jpg', 'ProductImages/RightImage/Aww5MvbaOie070qOhSsFDulMyOdAPkER4IKpjKRr.jpg', 'ProductImages/LeftImage/rCkec9m4aaLkkN1G7T1TdSWNkXhYOWh5aHXKMqII.jpg', '2025-03-28 14:18:47', '2025-03-28 14:18:47'),
(541, 308, 'Dark Green', '#006400', NULL, '#000000', 'ProductImages/FrontImage/9qYoGExvIUjWCjAv5dNIESgWALOxyRA3UjDNKSy7.jpg', 'ProductImages/BackImage/7ZPBatRVMcVzALEl7x08lVm8aQuUdXkcrlxmnxjj.jpg', 'ProductImages/RightImage/X3yEUiQbPwdqk3tLJ9N2urIZSKwrQYvmX6QxTOt7.jpg', 'ProductImages/LeftImage/G3fNCrBEPHNavsYn7ztp81ZuCzCzlB6V3te4VCsZ.jpg', '2025-03-28 14:48:25', '2025-03-28 14:48:25'),
(542, 309, 'Maroon', '#470421', NULL, '#000000', 'ProductImages/FrontImage/MoJ7UVek8S58g1Y8KPlHCVCoiaYW3Tcmu7qoTEqP.jpg', 'ProductImages/BackImage/Q1kTA1FDle3V8gFsXGP1yo9Afbe56TI3en1EQlSi.jpg', 'ProductImages/RightImage/6Rzwxq0CWMKvezrafBcJ3cBnA2yninYIrPmDB31W.jpg', 'ProductImages/LeftImage/2TSQ9DoOtM5I2V5fNdweDMkcLkaJ1Dyc4a5A8yxT.jpg', '2025-03-28 14:52:08', '2025-03-28 14:52:08'),
(543, 311, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/7xSVmW0mee4xUYZlclEL0o2f7vTHmnwZR4vAew95.jpg', 'ProductImages/BackImage/ljAHaMii5F9ndd5t14f7i5G6dBAvAboqwyvVtAcp.jpg', 'ProductImages/RightImage/rULxJxac1AqNVtAf8pXf1QxyyzR6YGY8M8uV1wJ7.jpg', 'ProductImages/LeftImage/BNcJ9mlJuDJ5qJjGiMUt15RynesUEeYTW73ZeRRB.jpg', '2025-03-28 14:55:38', '2025-03-28 14:55:38'),
(544, 312, 'Kiayada Hays', '#43b855', 'Ezekiel Ruiz', '#c28023', 'ProductImages/FrontImage/bH93JprE51o5zwx2uaDSoJLWfrLewlIQY3iyGVmE.jpg', NULL, NULL, NULL, '2025-03-28 14:57:24', '2025-03-28 14:57:24'),
(545, 313, 'Black/White', '#000000', 'Black/White', '#ffffff', 'ProductImages/FrontImage/qY1trOkVJ9VoSujGqe1qtjHdRjxVyqRUX2FeCiGR.jpg', 'ProductImages/BackImage/PCF6tJTO2rAp1NQMJWvMC5ynWagS6gcdKrTqbomV.jpg', 'ProductImages/RightImage/WGNmyfXGuEZZx2ESzlW2kCKE6HdZIbFyxsLCPl9L.jpg', 'ProductImages/LeftImage/VSTXjgQX16uZ6Iblt8ykrw92r9byrPJFbgRu6zPM.jpg', '2025-03-28 14:58:05', '2025-03-28 14:58:05'),
(547, 314, 'oiioio', '#000000', NULL, '#000000', 'ProductImages/FrontImage/Mwme8foMjQdBsKV8Un9HWuzCX5khmxggk06l6yA7.jpg', NULL, NULL, NULL, '2025-03-28 14:59:08', '2025-03-28 14:59:08'),
(548, 315, 'White/Navy', '#000080', 'White/Navy', '#ffffff', 'ProductImages/FrontImage/jA467qSLLQINSAxLZ6izgzzSyHZlGFNKvYeJfucL.jpg', 'ProductImages/BackImage/BKdnN7bWNrCBveVWupYqEYTjDPt2pj3Ux8hh7Q6N.jpg', 'ProductImages/RightImage/43xZowaAby9mYsW8GmEtmjJPCtISIPunefGe3aRi.jpg', 'ProductImages/LeftImage/WdtZhr4k1rSmZ4IiSb1WU4oGwZJoy1ghFmv0iptP.jpg', '2025-03-28 15:01:24', '2025-03-28 15:01:24'),
(549, 316, 'White/Royal', '#ffffff', 'White/Royal', '#303acf', 'ProductImages/FrontImage/sHEuEnxz1ya4VtayJi6BDbmwKjhLt4yMDruxoBua.jpg', 'ProductImages/BackImage/yueQVakvVTDtTGs4YQpH8zIfdCENbZKCUHWCl0B8.jpg', 'ProductImages/RightImage/ILDHPbpTAbq7z7lfFRDQIFsZ7cPY4wnD7rW18CCo.jpg', 'ProductImages/LeftImage/r8WL8BgJpolC5Rf1F9mUY8HPVDfML98rheo3krjC.jpg', '2025-03-28 15:05:23', '2025-03-28 15:05:23'),
(550, 317, 'Dark Heather', '#3f4444', NULL, '#000000', 'ProductImages/FrontImage/HZZcfnG9R2aB3LSp7TK0bxJ0kPImddotrKS6EXCq.jpg', 'ProductImages/BackImage/6K9rf1NNQebiVAoGVNrIle5ebM0s4ReYlevAuuUo.jpg', 'ProductImages/RightImage/ecZj7bdycbzvIZ9jibsC85FVXe0EXix2aD0UI8Vp.jpg', 'ProductImages/LeftImage/Th10EQVkJ3fbh9itnsV2IPiZo58JBwzCzxYW1U26.jpg', '2025-03-28 15:10:37', '2025-03-28 15:10:37'),
(551, 319, 'Dark Heather', '#686c6c', NULL, '#000000', 'ProductImages/FrontImage/FWeyr8hFZaLJ7i2EGmAauAvOMNrFbd7ZFKJmdAuv.jpg', 'ProductImages/BackImage/LtBnjgbT62suLJA1jmlq36z9HZw5PIViikfqAStW.jpg', 'ProductImages/RightImage/JvGOXlhsRLr5IR8O72gTBJM1s38tPMUtFh4XUfAd.jpg', 'ProductImages/LeftImage/UIr6Rg88gklQnr6Oz5y6Tziaca9QlQxpCHldBPo7.jpg', '2025-03-28 15:14:14', '2025-03-28 15:14:14'),
(552, 320, 'Allen Reid', '#50a9ca', 'Amanda Cortez', '#01bbc8', 'ProductImages/FrontImage/JORWeiPp6a9r7uPIArwVzCeItrLYOVFUhHl0r1bk.jpg', NULL, NULL, NULL, '2025-03-28 15:17:04', '2025-03-28 15:25:12'),
(554, 322, 'ewsdfdsf', '#c73333', NULL, '#000000', 'ProductImages/FrontImage/cCQ8FNeTV3geIIlwVs9IIwdK3tRygROCxtw7CRwe.jpg', NULL, NULL, NULL, '2025-03-28 15:19:25', '2025-03-28 15:25:48'),
(555, 324, 'Dark Gray', '#636363', NULL, '#000000', 'ProductImages/FrontImage/tixvnKcNFDPYqJFsfZhlGf4EwVUsKgApdo7KMQUH.jpg', 'ProductImages/BackImage/XsSx0FfYJExw5VlGSRBwPffQbVjymqBWfc1tNH28.jpg', 'ProductImages/RightImage/ohDwtg9rUd34dMQH9sWlWgmsU2GLTkEaVseRY2m7.jpg', 'ProductImages/LeftImage/ZfoldSDcmsmMaoaDJqpyhyc450jYX3bz4XpDaUYS.jpg', '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(556, 324, 'Silver', '#919191', NULL, '#000000', 'ProductImages/FrontImage/7RPaqwkLI5Cu3ARPzgYjPt4Ub9vSZ7wa6TgFhyNM.jpg', 'ProductImages/BackImage/RHWaQg6dZLCJVnmCwLJJLpU0ZvhBVdgvvbyw8185.jpg', 'ProductImages/RightImage/bkBByYQGRqQupQIXHkjM359ylG1sWGaFDkGve6Bz.jpg', 'ProductImages/LeftImage/GnABUS1aa1Fb2JybU7QpY2WYOcVQmXAOd3fzg3Qn.jpg', '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(557, 324, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/2OsJ36Kc3ReXAsC3mtJ7SwiJUuKsSDZojyqtqxlL.jpg', 'ProductImages/BackImage/2aZsiJk25j74MuKxX6arpPk3OWTj5PANyfmKirez.jpg', 'ProductImages/RightImage/UnUKn3ctyZ1KKBuYajAIKIxnNszniJuryzp0c9Sy.jpg', 'ProductImages/LeftImage/CHgDOOpbIa1l5PvLsYwcKRkSJVVYyWlnZ9XwlV8d.jpg', '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(559, 326, 'Royal', '#3435d4', NULL, '#000000', 'ProductImages/FrontImage/sog9G53cqtLIPaJdPyynKsswDn36iOEQoHZme4nN.jpg', 'ProductImages/BackImage/xSL1pzhIEDgo7n5sizprSfwrskEQgqnsUr81V6g2.jpg', NULL, NULL, '2025-03-28 15:27:01', '2025-03-28 15:27:01'),
(560, 325, 'djfjsfk', '#000000', NULL, '#000000', NULL, NULL, NULL, NULL, '2025-03-28 15:27:14', '2025-03-28 15:27:28'),
(561, 327, 'Light blue', '#b8deff', NULL, '#000000', 'ProductImages/FrontImage/X2Rj4D6WRc38CUYakq9J9qK6uMCMwXvDOtHuWhtG.jpg', 'ProductImages/BackImage/4mHye62AOv7xBheDOAIX9FOluYgRKSRvScbn8maf.jpg', NULL, NULL, '2025-03-28 15:29:46', '2025-03-28 15:29:46'),
(562, 328, 'Dark Gray', '#636363', NULL, '#000000', 'ProductImages/FrontImage/LGsWZDSzBcJfBtfFcoynC0Q5wUVOQpxRLbh5xwXc.jpg', 'ProductImages/BackImage/zlhM6duQm76cmVbcUVshIjwPUKfZqWYpb7el04zq.jpg', 'ProductImages/RightImage/nSLpT7UULwATkYV1TpNBtwAx2izlOUqjHcHY0cCw.jpg', 'ProductImages/LeftImage/fgqH6iL9jszcnVdv9ardHeZIgn8hxRIOkfqYjyZE.jpg', '2025-03-28 15:29:56', '2025-03-28 15:29:56'),
(563, 329, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/HhN61Ro62Jgz94ENieaJkhkhgMtN6sNXQRMpSbzm.jpg', 'ProductImages/BackImage/imeUslEKRj2rirKFzOjIwAnBLI8R7fxVL5LPDiuR.jpg', 'ProductImages/RightImage/S1Q9GwGYlOAD7kNTm1RmouW1mRBDlnWBokLyCzeP.jpg', 'ProductImages/LeftImage/xlhFPMCEWSH2TlMz20TkuF0hTIX0uQ3uvCbqBgzL.jpg', '2025-03-28 15:34:27', '2025-03-28 15:34:27'),
(564, 330, 'Navy', '#311e8f', NULL, '#000000', 'ProductImages/FrontImage/wyfBfvtknXjshkhz1x1rjTtFvgG5D1AyFMG4oOC1.png', 'ProductImages/BackImage/XoIewcbCCw2yDia9a78dc3BiKxtZn3rlgDYY695g.png', NULL, NULL, '2025-03-28 15:35:09', '2025-03-28 15:35:09'),
(565, 331, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/Xf3gMnzARs9UYv4PJHP8QWaPuMIvrsJXOw3O06mq.jpg', 'ProductImages/BackImage/YaI9a7Wph9X0adEohFuMkQIUWRzxdILKNyro3eMQ.jpg', NULL, NULL, '2025-03-28 15:37:13', '2025-03-28 15:37:13'),
(566, 332, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/AKQGYm4ml8jpwQXzOA66cUeMzniE9DVFn0Lgrt21.jpg', 'ProductImages/BackImage/UuYtfLfooKLWyyvxoVXOQylQnv1u2V8eMRfZLlx0.jpg', NULL, NULL, '2025-03-28 15:39:33', '2025-03-28 15:39:33'),
(567, 333, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/FwoiSt5IrPfN4MT749Y7sFdgr7Ij444PMCh0kp0L.jpg', 'ProductImages/BackImage/g6UBPo5TAx9GQgH0MubAULuPxtsBZDKXj2I0CIDK.jpg', NULL, NULL, '2025-03-28 15:41:51', '2025-03-28 15:41:51'),
(568, 334, 'Silver', '#919191', NULL, '#000000', 'ProductImages/FrontImage/HaPwTi6xqHDQf1HbA9csp42c1MUp3sqIaTHr3Aal.jpg', 'ProductImages/BackImage/n10oO0t1fzwYSfonDT5MlC39hSG1Ll3S7gFBlyUC.jpg', 'ProductImages/RightImage/ad4b7Wj7GpU2HKSZviyMcT3WndM5zCiAGKaT3zEx.jpg', 'ProductImages/LeftImage/Mdcitn1Glje59ZgUEdub0ZwmstceOUyyXf33gMNu.jpg', '2025-03-28 15:41:59', '2025-03-28 15:41:59'),
(569, 335, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/XdXCBSoRL65IEb7H5ux3R2NNWNu2SrE19kKxMwA9.png', 'ProductImages/BackImage/9TKp4im9Jhk61XNobuTkbeF0VmASI62zCyGKlUas.jpg', NULL, NULL, '2025-03-28 15:45:35', '2025-03-28 15:45:35'),
(571, 336, 'White', '#ffffff', NULL, '#000000', 'ProductImages/FrontImage/jbwGkIuyoHwsdN43ELOiflR53SNq8beaC7sD1Xcr.jpg', 'ProductImages/BackImage/uAL7FwRt45Hx0ZHrznlRJZYeRqjbaNbDH0P8Vmn0.jpg', 'ProductImages/RightImage/fRRDyIYN2s9fF2P2kchQA6UQIkwLGbNDz24UGaw3.jpg', 'ProductImages/LeftImage/q6FTXEOgVyjrbl9q4Dav5axPWhNFRbTNhHAutyTf.jpg', '2025-03-28 15:48:55', '2025-03-28 15:48:55'),
(572, 337, 'Aqua', '#00ffff', NULL, '#000000', 'ProductImages/FrontImage/PuAXS2h3Vb90itX3EmZA1jcvmgVu17Wfuc32v10A.jpg', 'ProductImages/BackImage/fIVWAQaGBc8sAkUJwIz9NcRCckOiyQ1zRycXafiM.jpg', 'ProductImages/RightImage/zRUS0nyexHDFxhdNCPWCwlLoEZzxrV4Gf5pnkjlJ.jpg', 'ProductImages/LeftImage/wiYOlsPEPa1PaY3kuV5huk7u1ZtXMTFUJAubGCak.jpg', '2025-03-28 15:50:55', '2025-03-28 15:50:55'),
(573, 33, 'Sky', '#009fff', 'Sky', '#007dff', 'ProductImages/FrontImage/PioVrOnrj3hfxyWRi5qtOpmExID2uGEYLzGCr09j.jpg', 'ProductImages/BackImage/Nh3pVsi1MFi0RjeVNtyJkWvYkrJK6NMoxEK9fllY.jpg', 'ProductImages/RightImage/HggUS0WbmbS3TBFV9MRCBER26SHep0rTuZ9XpUWx.jpg', 'ProductImages/LeftImage/0BYovUr7iBWuS0yUz7tODAVaH6VAIcA9JT5hlzwV.jpg', '2025-03-28 15:51:53', '2025-03-28 15:51:53'),
(574, 338, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/Q045FmgAMCaj8bxTSLtDc2UefOOt6hsWHvCPGSMO.jpg', 'ProductImages/BackImage/Y07PniAR4KDEDs8xSLIgIXBSULo7kbz3JNi1qiUn.jpg', 'ProductImages/RightImage/Ux93KjDsjo4ChxOcxB7mLFJofivaonS9LlTcOD8o.jpg', 'ProductImages/LeftImage/FwASMYsXsCNUPRMWjUR0M4vz4183PwUBsVhZrpKi.jpg', '2025-03-28 15:53:11', '2025-03-28 15:53:11'),
(575, 339, 'Brown', '#634a34', NULL, '#000000', 'ProductImages/FrontImage/ka6vqywO0x2TcAoP4qyI61Zz0P3XykweJDbKYDju.jpg', 'ProductImages/BackImage/w2PtIpVngVDY0MTjrChDn8F7YK9rdsvD0yIfFVw8.jpg', 'ProductImages/RightImage/EYNIKuGtMCXu9WlvBVuR4gcjYdYTsBcr15KZOUcy.jpg', 'ProductImages/LeftImage/0qoS1rEFumKr61XyawFif1XhkqB7GdsspO8bTM6R.jpg', '2025-03-28 15:55:43', '2025-03-28 15:55:43'),
(576, 340, 'Cardinal', '#870843', NULL, '#000000', 'ProductImages/FrontImage/26aBQV26n91n2nNJxGds4R6wbggOZJ8csvEVx0oz.jpg', 'ProductImages/BackImage/wzaMDjX6jwXCbG7fzWqFBnAlk3ECqAfYujtASi4V.jpg', 'ProductImages/RightImage/4umXluhW5Z8NGh73lLPNAL9RstZnP2jNW39aG3hO.jpg', 'ProductImages/LeftImage/mBCKi8681cX5bvLiXGXrtoYzUghQWYAd3xSYYoCR.jpg', '2025-03-28 15:58:30', '2025-03-28 15:58:30'),
(577, 341, 'Forest', '#0b5509', NULL, '#000000', 'ProductImages/FrontImage/xFVsaw69ESWOkj6TgB9cyzJlmz5oiFSa6VeFokKt.jpg', 'ProductImages/BackImage/ZrAPiyghR8PYnck9uQ5QjGNJ7PLQYzYOWvC5dqNm.jpg', 'ProductImages/RightImage/zqyoOdpHyoyayisI6XFImGfio5OZnJq6pM3glF5q.jpg', 'ProductImages/LeftImage/6kEfrKXJzl4MBvntWI5CK6aACXcJNDhrgvnTSXs2.jpg', '2025-03-28 16:00:51', '2025-03-28 16:00:51'),
(578, 342, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/4ynJyPcxNSJGcsbHOnOHBpelPzQSXg5wqLfFf9ER.jpg', 'ProductImages/BackImage/LXicGLfkYxeuToAUNIUUcKIeBTGvINr1hiFw30cN.jpg', NULL, NULL, '2025-03-28 16:03:18', '2025-03-28 16:03:18'),
(579, 343, 'Maroon', '#470421', NULL, '#000000', 'ProductImages/FrontImage/OPH6SkA7ZfeFK1L4SXKvE88As521uIDuWHfTOzln.jpg', 'ProductImages/BackImage/5k2v8thUmeI6qkOiQzb7hOwLMfo7gAJQnyx14vxk.jpg', 'ProductImages/RightImage/Fto2lTtEOzHZ4kXoWUXBTlYNUgNfQmOfrW576QcY.jpg', 'ProductImages/LeftImage/rYLvkKlAE9WbNb6KzzNUaptyPknCJ0bfPIQeEePD.jpg', '2025-03-28 16:04:20', '2025-03-28 16:04:20'),
(580, 344, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/sahyZ66AZ7RaRckZMjzAUbxAuDo08Z0EPjpEOGpX.jpg', 'ProductImages/BackImage/QYuQ60Er1TMSs1D7CqyLZ7z8kAb3jIn6DzFLboVJ.jpg', NULL, NULL, '2025-03-28 16:06:21', '2025-03-28 16:06:21'),
(581, 345, 'Mustard', '#ffdb58', NULL, '#000000', 'ProductImages/FrontImage/zkeVmFsNy0QmSEtqXVcF8T2Zfkbk9fKmjmVvpAnK.jpg', 'ProductImages/BackImage/NcXVZtzLccun0hPqSqgVVIDsjfw0wiTXjvHeYTfT.jpg', 'ProductImages/RightImage/1lfeB72CIgzRQ1MsPCnwjOUgBUfmQVxFv12PId5r.jpg', 'ProductImages/LeftImage/TOy7s6RgPMFBrwug23uslem0N2jZVUZI99GswDKZ.jpg', '2025-03-28 16:06:35', '2025-03-28 16:06:35'),
(582, 346, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/JFiYI2yx3qOaXLIzcw5YQ6H65ZDsv0NWEZvP9Fhb.jpg', 'ProductImages/BackImage/YUt3HuS6Q0HLS3E80j60jvh0LODSTBGsHuCXx2tk.jpg', NULL, NULL, '2025-03-28 16:08:01', '2025-03-28 16:08:01'),
(583, 347, 'Olive', '#556b2f', NULL, '#000000', 'ProductImages/FrontImage/gCIeTkJDqNwGtDWOJc8EiEinjEkwDcupmC4FABkB.jpg', 'ProductImages/BackImage/JcOoBvymJJ5zAO1olXPZmlphjs135WwLqHOEahVm.jpg', 'ProductImages/RightImage/XpJ9GzDwG7jy93IEKKdcSrPjkMxpXTeDogjrOx3q.jpg', 'ProductImages/LeftImage/BkgExpN3YVrfYBSgNLv99rbBZr6EVl5KdN9bQ1GQ.jpg', '2025-03-28 16:09:00', '2025-03-28 16:09:00'),
(584, 348, 'Gray', '#bdbdbd', NULL, '#000000', 'ProductImages/FrontImage/X7YdL1oq1RabO0SlYKoiEXPmCmB0gZpbfrlUgcH3.jpg', 'ProductImages/BackImage/rgLxzuAPgCMYUhE7jNmdJUzgPd5WzmHZnUycNuis.jpg', NULL, NULL, '2025-03-28 16:09:46', '2025-03-28 16:09:46'),
(585, 349, 'Periwinkle', '#ccccff', NULL, '#000000', 'ProductImages/FrontImage/XZ1iOazXLTfReoPSDWmvpqaluLX2KyEXX3uqZj0G.jpg', 'ProductImages/BackImage/0nT8odj9GF6duYzXivVUtjqTUKCEtQJQdVbXCAnS.jpg', 'ProductImages/RightImage/DU5Sf65sY0XHiGrIVqU5QUpOHNUYQwcfe5aFQBCE.jpg', 'ProductImages/LeftImage/xI8XgUzTdKtfJeYcOHCBWC7xYqnSbgKvT9qux5sg.jpg', '2025-03-28 16:11:15', '2025-03-28 16:11:15'),
(586, 350, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/uZ1m9MC8vMb9Q5KgIPqSoXVWwtzWBbBpmTFuwNL2.jpg', 'ProductImages/BackImage/SIYLjrcy5fzYIGXmvLr61b6iiKNrQ3g0xCWMAv6l.jpg', NULL, NULL, '2025-03-28 16:11:23', '2025-03-28 16:11:23'),
(587, 351, 'Black', '#000000', NULL, '#000000', 'ProductImages/FrontImage/E11fD23lGjbnEj9IdWJsdwG4c0ki7b6bhCDINhxp.jpg', 'ProductImages/BackImage/lFSpJfbz2BxzNPGimBl1SdJj8WnOykjbJdVMcN8L.jpg', NULL, NULL, '2025-03-28 16:12:47', '2025-03-28 16:12:47'),
(588, 352, 'Pink', '#ffc3ba', NULL, '#000000', 'ProductImages/FrontImage/qvqqneohrfCSYm7w5bvrLKTPPiG41IYJL9zuk0Dq.jpg', 'ProductImages/BackImage/WxoSU19GZoKKHAm6S9qptdAjeR9qQyANLCAB3LH0.jpg', 'ProductImages/RightImage/GQY0jfPQ0fARD7ZZON5ID4nArdVMkDhhOGD9CHdi.jpg', 'ProductImages/LeftImage/DMvkV09R4VlNIT97JuDmcO7QxKqurvqEsyHLKefn.jpg', '2025-03-28 16:13:37', '2025-03-28 16:13:37'),
(589, 353, 'Red', '#ff0000', NULL, '#000000', 'ProductImages/FrontImage/nUsXO63yfNImXvvLXLQoOeBrVv4cAhXWs5j3mIbe.jpg', 'ProductImages/BackImage/7NqSzFx8IzkXjys0fXyI3u0cFygcS5xL3pez35iY.jpg', 'ProductImages/RightImage/iyIH59nytf8piVdqTR5bwtGf0bs3TJNBxV2aJ66L.jpg', 'ProductImages/LeftImage/wyQAdzsAkdjuJWS7bXvQoR3blrDEWKXHaIItVIt4.jpg', '2025-03-28 16:16:52', '2025-03-28 16:16:52');
INSERT INTO `product_color` (`id`, `product_id`, `color_name_1`, `color_code_1`, `color_name_2`, `color_code_2`, `front_image`, `back_image`, `right_image`, `left_image`, `created_at`, `updated_at`) VALUES
(590, 354, 'Royal', '#3a35d4', NULL, '#000000', 'ProductImages/FrontImage/8FIyWhXabvztu9IW05PcnM2foGuUYKZdGHTHIB3U.jpg', 'ProductImages/BackImage/8sAzcWIN0qGmtW2KneWsWTvCjJq4gKFH8912ZBnN.jpg', 'ProductImages/RightImage/6upSI6xI6fJ2CHY8isB8KXWZkA3DV8GcQl23KMbv.jpg', 'ProductImages/LeftImage/gnstMTSOhD9aRMvyhRGoBR5WPozx6VNdJ01kLuIL.jpg', '2025-03-28 16:20:33', '2025-03-28 16:20:33'),
(591, 355, 'Seafoam', '#93e9be', NULL, '#000000', 'ProductImages/FrontImage/uLQ6OSnWxtcLPujuuzX6ZwwKrGDneAxRPR8vg8pb.jpg', 'ProductImages/BackImage/j3mK3CRDZKf5YEqOKklY6vb7Pr5hlG9W0hsppoNe.jpg', 'ProductImages/RightImage/YOgDv9UCCPGIlXpvyVmkNmo2MqIO5pZCdVMio3Jl.jpg', 'ProductImages/LeftImage/wcblhECu93j1jwL2e9uBlPMPZTqmfRqnvcel21nl.jpg', '2025-03-28 16:23:14', '2025-03-28 16:23:14'),
(592, 356, 'Stone', '#d6c994', NULL, '#000000', 'ProductImages/FrontImage/RNkuEeAHR2Ng2VIdxsZ8twzWhyByMtswzc3FUohF.jpg', 'ProductImages/BackImage/IFRMWDazFGnbNaGTmA27sSqvXQhaTnwhZFMOnECX.jpg', 'ProductImages/RightImage/NzHmuQJkRuj11iHLM28F8IKicWEsptfeVVq69rBu.jpg', 'ProductImages/LeftImage/JDzAB7aVfZeNEsvwPBJp10q5fTb6CynoPIK3k486.jpg', '2025-03-28 16:25:46', '2025-03-28 16:25:46'),
(593, 357, 'Teal', '#008083', NULL, '#000000', 'ProductImages/FrontImage/8HvssbLuIWtjejLPpRTPj6mcwyZiEnopJF3QhQE5.jpg', 'ProductImages/BackImage/ktEU3yh5fivlQX88z3ihCtz0koFMfENUwdShHjaK.jpg', 'ProductImages/RightImage/gtfztvK63jng35bMhIsA0keiiywU0YxkE7rGgm3F.jpg', 'ProductImages/LeftImage/76cTpL1viGIrxwMvHs5I995dCcoSqpmMXiNf8dwz.jpg', '2025-03-28 16:28:38', '2025-03-28 16:28:38'),
(594, 358, 'Texas Orange', '#bf5700', NULL, '#000000', 'ProductImages/FrontImage/GZBg20MPbvgX6hwCT7rZgAuJ4BsRYGpeEOZMGa5t.jpg', 'ProductImages/BackImage/ObR4wDFdEvNScCZwJOHdDCstfpg9GPiHTuaqm6Jn.jpg', 'ProductImages/RightImage/nOZpvpFclymNAmG6YPBXx7wYgwJmQPQHoYXJSYTr.jpg', 'ProductImages/LeftImage/pRFZeUS48fzmyjUIlL0uhGK2Y2KL6PSjMg7Pzkwc.jpg', '2025-03-28 16:31:56', '2025-03-28 16:31:56'),
(595, 359, 'Wine', '#722537', NULL, '#000000', 'ProductImages/FrontImage/egXXVaXTt2XiEym84lXglVjPrHhJYPMaWKyDADYe.jpg', 'ProductImages/BackImage/UmMzF0GCrqSlF0wGr1aW5lnSSCl2cr53jr2XU9z8.jpg', 'ProductImages/RightImage/K0eeiCuTlSDYn5Wf4ypIr2BXUP00kkXjWNbJ6iGV.jpg', 'ProductImages/LeftImage/NVkxBGsDy30hty5RnFmqjubyPuMSYUvg5tc1lsRd.jpg', '2025-03-28 16:36:28', '2025-03-28 16:36:28'),
(596, 360, 'Gold/ Black', '#ffd700', 'Gold/ Black', '#000000', 'ProductImages/FrontImage/IyKVzH9iwMYvK9OQrhJn64BRg3vRLBV76Ss8XFW3.jpg', 'ProductImages/BackImage/U4FnfFFYHhEyU30fe4Sd7JBJnHVFL3z9Davei4N0.jpg', 'ProductImages/RightImage/pIFLXSPJ8Z9TiOolBXWtvo3CqVf0ZZxiiRLKf6Gc.jpg', 'ProductImages/LeftImage/2Gb5aGoqlGl3e6pcjreaKeZEGUKnBa3tLZlXMvPx.jpg', '2025-03-28 16:43:10', '2025-03-28 16:43:10'),
(597, 361, 'Black/Khaki', '#f0e68c', 'Black/Khaki', '#000000', 'ProductImages/FrontImage/MS8yZAR1vQUhXM10ptDrWwgfJdlVSRrq2Mp1hVvk.jpg', 'ProductImages/BackImage/UNVQGvWSWQvCXQ20SjCwKZNfIWCN2CWnyddLoAFy.jpg', 'ProductImages/RightImage/AQteLulgYDZNjrGseDwpaTRJuboi1nk4jTBzlRf0.jpg', 'ProductImages/LeftImage/3aJcu6szDjMi7WOTJzjcr8vzKkPh4ZXuuhcmXloi.jpg', '2025-03-28 16:50:02', '2025-03-28 16:50:02'),
(598, 362, 'Black/White', '#ffffff', 'Black/White', '#000000', 'ProductImages/FrontImage/5vwu0b6MLiC4Gzw2gkaVe6Mx6Uugx8v3J39cCEig.jpg', 'ProductImages/BackImage/0JjVWDw3m1a6xLeSW8aT0zV6PKWi9ctfyjgIEGUj.jpg', 'ProductImages/RightImage/TuXR6XOOBE3BqGy5ygHD4krbSMBjkj8RAWgt3gs2.jpg', 'ProductImages/LeftImage/PxUcQiZg5IkqChHRbGBRkg2k87f2nvVscNZuakmI.jpg', '2025-03-28 16:53:11', '2025-03-28 16:53:11'),
(599, 363, 'Black/Gold', '#ffd700', 'Black/Gold', '#000000', 'ProductImages/FrontImage/U3FhM1jSSCjvTE4d1BSwMtByCidKziJlGZ7VXRtZ.jpg', 'ProductImages/BackImage/9NQ6G6ooUSCQV53sAoQcXCuWCkarNlSzikXVPGcI.jpg', 'ProductImages/RightImage/dQF3Kf0ZDLvRDkXPJbQc586chbSA7CeSYkVwFjVT.jpg', 'ProductImages/LeftImage/hmpexSjOa8TLwLyzuQorec7Nv2vqRiMqlGsFCLIe.jpg', '2025-03-28 16:55:43', '2025-03-28 16:55:43'),
(600, 364, 'Charcoal/Black', '#747d7d', 'Charcoal/Black', '#000000', 'ProductImages/FrontImage/UCIThizdqE6ezKLXR5cghGHR8nIutZVBMTPBDo4z.jpg', 'ProductImages/BackImage/ZoqH4ZtXyBfSvUlygBz0wV8VfkSgDCpTgSp3dLlc.jpg', 'ProductImages/RightImage/B3EOsXWiZcV4e1yCMxhwIhlao4nVe68iPslzgnuZ.jpg', 'ProductImages/LeftImage/LcSS28V5Y624QjoTK8ZEuZqYJSctjvm2RDAQmZiJ.jpg', '2025-03-28 16:59:09', '2025-03-28 16:59:09'),
(601, 365, 'Navy/Gold', '#311e8f', 'Navy/Gold', '#ffd700', 'ProductImages/FrontImage/kbpBBTa6uV3NsT1qVUEknqXah4GyY3tGG8VIb4Tb.jpg', 'ProductImages/BackImage/YkMSjEJHnmtrEWQB9DfpISsrkMmBpGyZcaTzY5MN.jpg', 'ProductImages/RightImage/XihOGmj3CBeNjg6SOcrgiYszOaCel5exmfOoOXHz.jpg', 'ProductImages/LeftImage/dO97R6PjOsrIjXlAcnRjHdXH6swHQtBWkPvnJgRs.jpg', '2025-03-28 17:03:32', '2025-03-28 17:03:32');

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
(213, 229, NULL, NULL, NULL, '2025-03-26 17:33:24', '2025-03-26 17:33:24'),
(214, 230, NULL, NULL, NULL, '2025-03-27 11:13:39', '2025-03-27 11:13:39'),
(215, 231, NULL, NULL, NULL, '2025-03-27 11:17:20', '2025-03-27 11:17:20'),
(216, 232, NULL, NULL, NULL, '2025-03-27 11:24:27', '2025-03-27 11:24:27'),
(217, 233, NULL, NULL, NULL, '2025-03-27 11:28:19', '2025-03-27 11:28:19'),
(218, 234, NULL, NULL, NULL, '2025-03-27 11:32:24', '2025-03-27 11:32:24'),
(219, 235, NULL, NULL, NULL, '2025-03-27 11:37:31', '2025-03-27 11:37:31'),
(220, 236, NULL, NULL, NULL, '2025-03-27 11:40:54', '2025-03-27 11:40:54'),
(221, 237, NULL, NULL, NULL, '2025-03-27 11:46:54', '2025-03-27 11:46:54'),
(222, 238, NULL, NULL, NULL, '2025-03-27 11:52:45', '2025-03-27 11:52:45'),
(223, 239, NULL, NULL, NULL, '2025-03-27 11:56:40', '2025-03-27 11:56:40'),
(224, 240, NULL, NULL, NULL, '2025-03-27 12:00:14', '2025-03-27 12:00:14'),
(225, 241, NULL, NULL, NULL, '2025-03-27 12:04:07', '2025-03-27 12:04:07'),
(226, 242, NULL, NULL, NULL, '2025-03-27 12:12:02', '2025-03-27 12:12:02'),
(227, 243, NULL, NULL, NULL, '2025-03-27 12:15:15', '2025-03-27 12:15:15'),
(228, 244, NULL, NULL, NULL, '2025-03-27 12:20:18', '2025-03-27 12:20:18'),
(229, 245, NULL, NULL, NULL, '2025-03-27 12:24:56', '2025-03-27 12:24:56'),
(230, 246, NULL, NULL, NULL, '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(231, 247, NULL, NULL, NULL, '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(232, 248, NULL, NULL, NULL, '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(233, 249, NULL, NULL, NULL, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(234, 250, NULL, NULL, NULL, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(235, 256, NULL, NULL, NULL, '2025-03-28 09:09:09', '2025-03-28 09:09:09'),
(236, 257, NULL, NULL, NULL, '2025-03-28 09:12:08', '2025-03-28 09:12:08'),
(237, 258, NULL, NULL, NULL, '2025-03-28 09:15:09', '2025-03-28 09:15:09'),
(238, 259, NULL, NULL, NULL, '2025-03-28 09:18:03', '2025-03-28 09:18:03'),
(239, 260, NULL, NULL, NULL, '2025-03-28 09:20:30', '2025-03-28 09:20:30'),
(240, 261, NULL, NULL, NULL, '2025-03-28 09:26:07', '2025-03-28 09:26:07'),
(241, 262, NULL, NULL, NULL, '2025-03-28 09:29:00', '2025-03-28 09:29:00'),
(242, 263, NULL, NULL, NULL, '2025-03-28 09:29:02', '2025-03-28 09:29:02'),
(243, 264, NULL, NULL, NULL, '2025-03-28 09:32:07', '2025-03-28 09:32:07'),
(244, 265, NULL, NULL, NULL, '2025-03-28 09:35:26', '2025-03-28 09:35:26'),
(245, 266, NULL, NULL, NULL, '2025-03-28 09:39:16', '2025-03-28 09:39:16'),
(246, 267, NULL, NULL, NULL, '2025-03-28 10:38:24', '2025-03-28 10:38:24'),
(247, 268, NULL, NULL, NULL, '2025-03-28 10:44:21', '2025-03-28 10:44:21'),
(248, 269, NULL, NULL, NULL, '2025-03-28 10:47:41', '2025-03-28 10:47:41'),
(249, 270, NULL, NULL, NULL, '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(250, 271, NULL, NULL, NULL, '2025-03-28 11:00:15', '2025-03-28 11:00:15'),
(251, 272, NULL, NULL, NULL, '2025-03-28 11:03:03', '2025-03-28 11:03:03'),
(252, 273, NULL, NULL, NULL, '2025-03-28 11:05:51', '2025-03-28 11:05:51'),
(253, 274, NULL, NULL, NULL, '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(254, 275, NULL, NULL, NULL, '2025-03-28 11:24:40', '2025-03-28 11:24:40'),
(255, 276, NULL, NULL, NULL, '2025-03-28 11:26:50', '2025-03-28 11:26:50'),
(256, 277, NULL, NULL, NULL, '2025-03-28 11:30:39', '2025-03-28 11:30:39'),
(257, 278, NULL, NULL, NULL, '2025-03-28 11:33:38', '2025-03-28 11:33:38'),
(258, 279, NULL, NULL, NULL, '2025-03-28 11:37:12', '2025-03-28 11:37:12'),
(259, 280, NULL, NULL, NULL, '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(260, 281, NULL, NULL, NULL, '2025-03-28 11:47:52', '2025-03-28 11:47:52'),
(261, 282, NULL, NULL, NULL, '2025-03-28 11:49:33', '2025-03-28 11:49:33'),
(262, 283, NULL, NULL, NULL, '2025-03-28 11:58:55', '2025-03-28 11:58:55'),
(263, 284, NULL, NULL, NULL, '2025-03-28 12:00:23', '2025-03-28 12:00:23'),
(264, 285, NULL, NULL, NULL, '2025-03-28 12:04:23', '2025-03-28 12:04:23'),
(265, 286, NULL, NULL, NULL, '2025-03-28 12:07:10', '2025-03-28 12:07:10'),
(266, 287, NULL, NULL, NULL, '2025-03-28 12:19:42', '2025-03-28 12:19:42'),
(267, 252, NULL, NULL, NULL, '2025-03-28 12:22:40', '2025-03-28 12:22:40'),
(268, 288, 'Et eum ut placeat i', 'Eiusmod non sit bla', 'Perferendis eu quae', '2025-03-28 12:25:38', '2025-03-28 12:25:38'),
(269, 289, NULL, NULL, NULL, '2025-03-28 12:53:00', '2025-03-28 12:53:00'),
(270, 290, NULL, NULL, NULL, '2025-03-28 12:58:22', '2025-03-28 12:58:22'),
(271, 291, NULL, NULL, NULL, '2025-03-28 13:03:37', '2025-03-28 13:03:37'),
(272, 292, NULL, NULL, NULL, '2025-03-28 13:07:29', '2025-03-28 13:07:29'),
(273, 293, NULL, NULL, NULL, '2025-03-28 13:13:07', '2025-03-28 13:13:07'),
(274, 294, NULL, NULL, NULL, '2025-03-28 13:18:09', '2025-03-28 13:18:09'),
(275, 295, NULL, NULL, NULL, '2025-03-28 13:21:52', '2025-03-28 13:21:52'),
(276, 296, NULL, NULL, NULL, '2025-03-28 13:29:41', '2025-03-28 13:29:41'),
(277, 297, NULL, NULL, NULL, '2025-03-28 13:33:13', '2025-03-28 13:33:13'),
(278, 298, NULL, NULL, NULL, '2025-03-28 13:39:01', '2025-03-28 13:39:01'),
(279, 299, NULL, NULL, NULL, '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(280, 300, NULL, NULL, NULL, '2025-03-28 13:58:04', '2025-03-28 13:58:04'),
(281, 301, NULL, NULL, NULL, '2025-03-28 14:00:39', '2025-03-28 14:00:39'),
(282, 302, NULL, NULL, NULL, '2025-03-28 14:04:17', '2025-03-28 14:04:17'),
(283, 303, NULL, NULL, NULL, '2025-03-28 14:07:03', '2025-03-28 14:07:03'),
(284, 304, NULL, NULL, NULL, '2025-03-28 14:09:16', '2025-03-28 14:09:16'),
(285, 305, NULL, NULL, NULL, '2025-03-28 14:11:58', '2025-03-28 14:11:58'),
(286, 306, NULL, NULL, NULL, '2025-03-28 14:15:54', '2025-03-28 14:15:54'),
(287, 307, NULL, NULL, NULL, '2025-03-28 14:18:47', '2025-03-28 14:18:47'),
(288, 308, NULL, NULL, NULL, '2025-03-28 14:48:25', '2025-03-28 14:48:25'),
(289, 309, NULL, NULL, NULL, '2025-03-28 14:52:08', '2025-03-28 14:52:08'),
(290, 311, NULL, NULL, NULL, '2025-03-28 14:55:38', '2025-03-28 14:55:38'),
(291, 312, 'Sit cumque adipisci', 'Ut unde officia at l', 'Aliqua Deserunt ad', '2025-03-28 14:57:24', '2025-03-28 14:57:24'),
(292, 313, NULL, NULL, NULL, '2025-03-28 14:58:05', '2025-03-28 14:58:05'),
(293, 314, 'Aut magna voluptas c', 'Enim ea sint tempor', 'Eaque voluptatem adi', '2025-03-28 14:58:32', '2025-03-28 14:58:32'),
(294, 315, NULL, NULL, NULL, '2025-03-28 15:01:24', '2025-03-28 15:01:24'),
(295, 316, NULL, NULL, NULL, '2025-03-28 15:05:23', '2025-03-28 15:05:23'),
(296, 317, NULL, NULL, NULL, '2025-03-28 15:10:37', '2025-03-28 15:10:37'),
(297, 319, NULL, NULL, NULL, '2025-03-28 15:14:14', '2025-03-28 15:14:14'),
(298, 320, 'Laboris iure laborum', 'Perspiciatis omnis', 'In laudantium minim', '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(299, 318, NULL, NULL, NULL, '2025-03-28 15:17:32', '2025-03-28 15:17:32'),
(300, 322, NULL, NULL, NULL, '2025-03-28 15:19:25', '2025-03-28 15:19:25'),
(301, 324, NULL, NULL, NULL, '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(302, 325, 'Assumenda corporis e', 'Ullamco pariatur Il', 'Neque nobis do ipsum', '2025-03-28 15:26:40', '2025-03-28 15:26:40'),
(303, 326, NULL, NULL, NULL, '2025-03-28 15:27:01', '2025-03-28 15:27:01'),
(304, 327, NULL, NULL, NULL, '2025-03-28 15:29:46', '2025-03-28 15:29:46'),
(305, 328, NULL, NULL, NULL, '2025-03-28 15:29:56', '2025-03-28 15:29:56'),
(306, 329, NULL, NULL, NULL, '2025-03-28 15:34:27', '2025-03-28 15:34:27'),
(307, 330, NULL, NULL, NULL, '2025-03-28 15:35:09', '2025-03-28 15:35:09'),
(308, 331, NULL, NULL, NULL, '2025-03-28 15:37:13', '2025-03-28 15:37:13'),
(309, 332, NULL, NULL, NULL, '2025-03-28 15:39:33', '2025-03-28 15:39:33'),
(310, 333, NULL, NULL, NULL, '2025-03-28 15:41:51', '2025-03-28 15:41:51'),
(311, 334, NULL, NULL, NULL, '2025-03-28 15:41:58', '2025-03-28 15:41:58'),
(312, 335, NULL, NULL, NULL, '2025-03-28 15:45:35', '2025-03-28 15:45:35'),
(313, 336, NULL, NULL, NULL, '2025-03-28 15:48:55', '2025-03-28 15:48:55'),
(314, 337, NULL, NULL, NULL, '2025-03-28 15:50:55', '2025-03-28 15:50:55'),
(315, 338, NULL, NULL, NULL, '2025-03-28 15:53:11', '2025-03-28 15:53:11'),
(316, 339, NULL, NULL, NULL, '2025-03-28 15:55:43', '2025-03-28 15:55:43'),
(317, 340, NULL, NULL, NULL, '2025-03-28 15:58:30', '2025-03-28 15:58:30'),
(318, 341, NULL, NULL, NULL, '2025-03-28 16:00:51', '2025-03-28 16:00:51'),
(319, 342, NULL, NULL, NULL, '2025-03-28 16:03:18', '2025-03-28 16:03:18'),
(320, 343, NULL, NULL, NULL, '2025-03-28 16:04:20', '2025-03-28 16:04:20'),
(321, 344, NULL, NULL, NULL, '2025-03-28 16:06:21', '2025-03-28 16:06:21'),
(322, 345, NULL, NULL, NULL, '2025-03-28 16:06:35', '2025-03-28 16:06:35'),
(323, 346, NULL, NULL, NULL, '2025-03-28 16:08:01', '2025-03-28 16:08:01'),
(324, 347, NULL, NULL, NULL, '2025-03-28 16:09:00', '2025-03-28 16:09:00'),
(325, 348, NULL, NULL, NULL, '2025-03-28 16:09:46', '2025-03-28 16:09:46'),
(326, 349, NULL, NULL, NULL, '2025-03-28 16:11:15', '2025-03-28 16:11:15'),
(327, 350, NULL, NULL, NULL, '2025-03-28 16:11:23', '2025-03-28 16:11:23'),
(328, 351, NULL, NULL, NULL, '2025-03-28 16:12:47', '2025-03-28 16:12:47'),
(329, 352, NULL, NULL, NULL, '2025-03-28 16:13:37', '2025-03-28 16:13:37'),
(330, 353, NULL, NULL, NULL, '2025-03-28 16:16:52', '2025-03-28 16:16:52'),
(331, 354, NULL, NULL, NULL, '2025-03-28 16:20:33', '2025-03-28 16:20:33'),
(332, 355, NULL, NULL, NULL, '2025-03-28 16:23:14', '2025-03-28 16:23:14'),
(333, 356, NULL, NULL, NULL, '2025-03-28 16:25:46', '2025-03-28 16:25:46'),
(334, 357, NULL, NULL, NULL, '2025-03-28 16:28:38', '2025-03-28 16:28:38'),
(335, 358, NULL, NULL, NULL, '2025-03-28 16:31:56', '2025-03-28 16:31:56'),
(336, 359, NULL, NULL, NULL, '2025-03-28 16:36:28', '2025-03-28 16:36:28'),
(337, 360, NULL, NULL, NULL, '2025-03-28 16:43:10', '2025-03-28 16:43:10'),
(338, 361, NULL, NULL, NULL, '2025-03-28 16:50:02', '2025-03-28 16:50:02'),
(339, 362, NULL, NULL, NULL, '2025-03-28 16:53:11', '2025-03-28 16:53:11'),
(340, 363, NULL, NULL, NULL, '2025-03-28 16:55:43', '2025-03-28 16:55:43'),
(341, 364, NULL, NULL, NULL, '2025-03-28 16:59:09', '2025-03-28 16:59:09'),
(342, 365, NULL, NULL, NULL, '2025-03-28 17:03:32', '2025-03-28 17:03:32');

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
(893, 229, 25.00, 50, '2025-03-26 17:33:24', '2025-03-26 17:33:24'),
(894, 230, 10.00, 5, '2025-03-27 11:13:39', '2025-03-27 11:13:39'),
(895, 230, 15.00, 15, '2025-03-27 11:13:39', '2025-03-27 11:13:39'),
(896, 230, 20.00, 20, '2025-03-27 11:13:39', '2025-03-27 11:13:39'),
(897, 230, 25.00, 50, '2025-03-27 11:13:39', '2025-03-27 11:13:39'),
(898, 231, 10.00, 5, '2025-03-27 11:17:20', '2025-03-27 11:17:20'),
(899, 231, 15.00, 16, '2025-03-27 11:17:20', '2025-03-27 11:17:20'),
(900, 231, 20.00, 20, '2025-03-27 11:17:20', '2025-03-27 11:17:20'),
(901, 231, 25.00, 50, '2025-03-27 11:17:20', '2025-03-27 11:17:20'),
(902, 232, 10.00, 5, '2025-03-27 11:24:27', '2025-03-27 11:24:27'),
(903, 232, 15.00, 15, '2025-03-27 11:24:27', '2025-03-27 11:24:27'),
(904, 232, 20.00, 20, '2025-03-27 11:24:27', '2025-03-27 11:24:27'),
(905, 232, 25.00, 50, '2025-03-27 11:24:27', '2025-03-27 11:24:27'),
(906, 233, 10.00, 5, '2025-03-27 11:28:19', '2025-03-27 11:28:19'),
(907, 233, 15.00, 15, '2025-03-27 11:28:19', '2025-03-27 11:28:19'),
(908, 233, 20.00, 20, '2025-03-27 11:28:19', '2025-03-27 11:28:19'),
(909, 233, 25.00, 50, '2025-03-27 11:28:19', '2025-03-27 11:28:19'),
(910, 234, 10.00, 5, '2025-03-27 11:32:24', '2025-03-27 11:32:24'),
(911, 234, 15.00, 15, '2025-03-27 11:32:24', '2025-03-27 11:32:24'),
(912, 234, 20.00, 20, '2025-03-27 11:32:24', '2025-03-27 11:32:24'),
(913, 234, 25.00, 50, '2025-03-27 11:32:24', '2025-03-27 11:32:24'),
(914, 235, 10.00, 5, '2025-03-27 11:37:31', '2025-03-27 11:37:31'),
(915, 235, 15.00, 15, '2025-03-27 11:37:31', '2025-03-27 11:37:31'),
(916, 235, 20.00, 20, '2025-03-27 11:37:31', '2025-03-27 11:37:31'),
(917, 235, 25.00, 50, '2025-03-27 11:37:31', '2025-03-27 11:37:31'),
(918, 236, 10.00, 5, '2025-03-27 11:40:54', '2025-03-27 11:40:54'),
(919, 236, 15.00, 15, '2025-03-27 11:40:54', '2025-03-27 11:40:54'),
(920, 236, 20.00, 20, '2025-03-27 11:40:54', '2025-03-27 11:40:54'),
(921, 236, 20.00, 50, '2025-03-27 11:40:54', '2025-03-27 11:40:54'),
(922, 236, 25.00, 50, '2025-03-27 11:40:54', '2025-03-27 11:40:54'),
(923, 237, 10.00, 5, '2025-03-27 11:46:54', '2025-03-27 11:46:54'),
(924, 237, 15.00, 115, '2025-03-27 11:46:54', '2025-03-27 11:46:54'),
(925, 237, 20.00, 20, '2025-03-27 11:46:54', '2025-03-27 11:46:54'),
(926, 237, 25.00, 50, '2025-03-27 11:46:54', '2025-03-27 11:46:54'),
(927, 238, 10.00, 5, '2025-03-27 11:52:45', '2025-03-27 11:52:45'),
(928, 238, 15.00, 15, '2025-03-27 11:52:45', '2025-03-27 11:52:45'),
(929, 238, 20.00, 20, '2025-03-27 11:52:45', '2025-03-27 11:52:45'),
(930, 238, 25.00, 50, '2025-03-27 11:52:45', '2025-03-27 11:52:45'),
(931, 239, 10.00, 5, '2025-03-27 11:56:40', '2025-03-27 11:56:40'),
(932, 239, 15.00, 15, '2025-03-27 11:56:40', '2025-03-27 11:56:40'),
(933, 239, 20.00, 20, '2025-03-27 11:56:40', '2025-03-27 11:56:40'),
(934, 239, 25.00, 50, '2025-03-27 11:56:40', '2025-03-27 11:56:40'),
(935, 240, 10.00, 5, '2025-03-27 12:00:14', '2025-03-27 12:00:14'),
(936, 240, 15.00, 15, '2025-03-27 12:00:14', '2025-03-27 12:00:14'),
(937, 240, 20.00, 20, '2025-03-27 12:00:14', '2025-03-27 12:00:14'),
(938, 240, 25.00, 50, '2025-03-27 12:00:14', '2025-03-27 12:00:14'),
(939, 241, 10.00, 5, '2025-03-27 12:04:07', '2025-03-27 12:04:07'),
(940, 241, 15.00, 15, '2025-03-27 12:04:07', '2025-03-27 12:04:07'),
(941, 241, 20.00, 20, '2025-03-27 12:04:07', '2025-03-27 12:04:07'),
(942, 241, 25.00, 50, '2025-03-27 12:04:07', '2025-03-27 12:04:07'),
(943, 242, 10.00, 5, '2025-03-27 12:12:02', '2025-03-27 12:12:02'),
(944, 242, 15.00, 15, '2025-03-27 12:12:02', '2025-03-27 12:12:02'),
(945, 242, 20.00, 20, '2025-03-27 12:12:02', '2025-03-27 12:12:02'),
(946, 242, 25.00, 50, '2025-03-27 12:12:02', '2025-03-27 12:12:02'),
(947, 243, 10.00, 5, '2025-03-27 12:15:15', '2025-03-27 12:15:15'),
(948, 243, 15.00, 15, '2025-03-27 12:15:15', '2025-03-27 12:15:15'),
(949, 243, 20.00, 20, '2025-03-27 12:15:15', '2025-03-27 12:15:15'),
(950, 243, 25.00, 50, '2025-03-27 12:15:15', '2025-03-27 12:15:15'),
(955, 245, 10.00, 5, '2025-03-27 12:24:56', '2025-03-27 12:24:56'),
(956, 245, 15.00, 15, '2025-03-27 12:24:56', '2025-03-27 12:24:56'),
(957, 245, 20.00, 20, '2025-03-27 12:24:56', '2025-03-27 12:24:56'),
(958, 245, 25.00, 50, '2025-03-27 12:24:56', '2025-03-27 12:24:56'),
(959, 246, 10.00, 5, '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(960, 246, 15.00, 15, '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(961, 246, 20.00, 20, '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(962, 246, 25.00, 50, '2025-03-27 12:41:46', '2025-03-27 12:41:46'),
(963, 244, 10.00, 5, '2025-03-27 12:42:42', '2025-03-27 12:42:42'),
(964, 244, 15.00, 15, '2025-03-27 12:42:42', '2025-03-27 12:42:42'),
(965, 244, 20.00, 20, '2025-03-27 12:42:42', '2025-03-27 12:42:42'),
(966, 244, 25.00, 50, '2025-03-27 12:42:42', '2025-03-27 12:42:42'),
(967, 96, 10.00, 5, '2025-03-27 13:40:03', '2025-03-27 13:40:03'),
(968, 96, 15.00, 15, '2025-03-27 13:40:03', '2025-03-27 13:40:03'),
(969, 96, 20.00, 20, '2025-03-27 13:40:03', '2025-03-27 13:40:03'),
(970, 96, 25.00, 50, '2025-03-27 13:40:03', '2025-03-27 13:40:03'),
(975, 30, 10.00, 5, '2025-03-27 13:51:34', '2025-03-27 13:51:34'),
(976, 30, 15.00, 15, '2025-03-27 13:51:34', '2025-03-27 13:51:34'),
(977, 30, 20.00, 20, '2025-03-27 13:51:34', '2025-03-27 13:51:34'),
(978, 31, 10.00, 5, '2025-03-27 13:52:07', '2025-03-27 13:52:07'),
(979, 31, 15.00, 15, '2025-03-27 13:52:07', '2025-03-27 13:52:07'),
(980, 31, 20.00, 20, '2025-03-27 13:52:07', '2025-03-27 13:52:07'),
(981, 31, 25.00, 50, '2025-03-27 13:52:07', '2025-03-27 13:52:07'),
(982, 32, 10.00, 5, '2025-03-27 13:52:30', '2025-03-27 13:52:30'),
(983, 32, 15.00, 15, '2025-03-27 13:52:30', '2025-03-27 13:52:30'),
(984, 32, 20.00, 20, '2025-03-27 13:52:30', '2025-03-27 13:52:30'),
(985, 32, 25.00, 50, '2025-03-27 13:52:30', '2025-03-27 13:52:30'),
(990, 34, 10.00, 5, '2025-03-27 13:53:24', '2025-03-27 13:53:24'),
(991, 34, 15.00, 15, '2025-03-27 13:53:24', '2025-03-27 13:53:24'),
(992, 34, 20.00, 20, '2025-03-27 13:53:24', '2025-03-27 13:53:24'),
(993, 34, 25.00, 50, '2025-03-27 13:53:24', '2025-03-27 13:53:24'),
(994, 35, 10.00, 5, '2025-03-27 13:53:42', '2025-03-27 13:53:42'),
(995, 35, 15.00, 15, '2025-03-27 13:53:42', '2025-03-27 13:53:42'),
(996, 35, 20.00, 20, '2025-03-27 13:53:42', '2025-03-27 13:53:42'),
(997, 35, 25.00, 50, '2025-03-27 13:53:42', '2025-03-27 13:53:42'),
(1002, 36, 10.00, 5, '2025-03-27 13:59:06', '2025-03-27 13:59:06'),
(1003, 36, 15.00, 15, '2025-03-27 13:59:06', '2025-03-27 13:59:06'),
(1004, 36, 20.00, 20, '2025-03-27 13:59:06', '2025-03-27 13:59:06'),
(1005, 36, 25.00, 50, '2025-03-27 13:59:06', '2025-03-27 13:59:06'),
(1006, 39, 10.00, 5, '2025-03-27 14:01:08', '2025-03-27 14:01:08'),
(1007, 39, 15.00, 15, '2025-03-27 14:01:08', '2025-03-27 14:01:08'),
(1008, 39, 20.00, 20, '2025-03-27 14:01:08', '2025-03-27 14:01:08'),
(1009, 39, 25.00, 50, '2025-03-27 14:01:08', '2025-03-27 14:01:08'),
(1010, 40, 10.00, 5, '2025-03-27 14:01:28', '2025-03-27 14:01:28'),
(1011, 40, 15.00, 15, '2025-03-27 14:01:28', '2025-03-27 14:01:28'),
(1012, 40, 20.00, 20, '2025-03-27 14:01:28', '2025-03-27 14:01:28'),
(1013, 40, 25.00, 50, '2025-03-27 14:01:28', '2025-03-27 14:01:28'),
(1014, 41, 10.00, 5, '2025-03-27 14:01:47', '2025-03-27 14:01:47'),
(1015, 41, 15.00, 15, '2025-03-27 14:01:47', '2025-03-27 14:01:47'),
(1016, 41, 20.00, 20, '2025-03-27 14:01:47', '2025-03-27 14:01:47'),
(1017, 41, 25.00, 50, '2025-03-27 14:01:47', '2025-03-27 14:01:47'),
(1018, 49, 10.00, 5, '2025-03-27 14:02:07', '2025-03-27 14:02:07'),
(1019, 49, 15.00, 15, '2025-03-27 14:02:07', '2025-03-27 14:02:07'),
(1020, 49, 20.00, 20, '2025-03-27 14:02:07', '2025-03-27 14:02:07'),
(1021, 49, 25.00, 50, '2025-03-27 14:02:07', '2025-03-27 14:02:07'),
(1022, 50, 10.00, 5, '2025-03-27 14:02:29', '2025-03-27 14:02:29'),
(1023, 50, 15.00, 15, '2025-03-27 14:02:29', '2025-03-27 14:02:29'),
(1024, 50, 20.00, 20, '2025-03-27 14:02:29', '2025-03-27 14:02:29'),
(1025, 50, 25.00, 50, '2025-03-27 14:02:29', '2025-03-27 14:02:29'),
(1026, 51, 10.00, 5, '2025-03-27 14:03:25', '2025-03-27 14:03:25'),
(1027, 51, 15.00, 15, '2025-03-27 14:03:25', '2025-03-27 14:03:25'),
(1028, 51, 20.00, 20, '2025-03-27 14:03:25', '2025-03-27 14:03:25'),
(1029, 51, 25.00, 50, '2025-03-27 14:03:25', '2025-03-27 14:03:25'),
(1030, 52, 10.00, 5, '2025-03-27 14:04:01', '2025-03-27 14:04:01'),
(1031, 52, 15.00, 15, '2025-03-27 14:04:01', '2025-03-27 14:04:01'),
(1032, 52, 20.00, 20, '2025-03-27 14:04:01', '2025-03-27 14:04:01'),
(1033, 52, 25.00, 50, '2025-03-27 14:04:01', '2025-03-27 14:04:01'),
(1034, 53, 10.00, 5, '2025-03-27 14:04:23', '2025-03-27 14:04:23'),
(1035, 53, 15.00, 15, '2025-03-27 14:04:23', '2025-03-27 14:04:23'),
(1036, 53, 20.00, 20, '2025-03-27 14:04:23', '2025-03-27 14:04:23'),
(1037, 53, 25.00, 50, '2025-03-27 14:04:23', '2025-03-27 14:04:23'),
(1038, 54, 10.00, 5, '2025-03-27 14:04:42', '2025-03-27 14:04:42'),
(1039, 54, 15.00, 15, '2025-03-27 14:04:42', '2025-03-27 14:04:42'),
(1040, 54, 20.00, 20, '2025-03-27 14:04:42', '2025-03-27 14:04:42'),
(1041, 54, 25.00, 50, '2025-03-27 14:04:42', '2025-03-27 14:04:42'),
(1042, 55, 10.00, 5, '2025-03-27 14:05:03', '2025-03-27 14:05:03'),
(1043, 55, 15.00, 15, '2025-03-27 14:05:03', '2025-03-27 14:05:03'),
(1044, 55, 20.00, 20, '2025-03-27 14:05:03', '2025-03-27 14:05:03'),
(1045, 55, 25.00, 50, '2025-03-27 14:05:03', '2025-03-27 14:05:03'),
(1050, 56, 10.00, 5, '2025-03-27 14:05:32', '2025-03-27 14:05:32'),
(1051, 56, 15.00, 15, '2025-03-27 14:05:32', '2025-03-27 14:05:32'),
(1052, 56, 20.00, 20, '2025-03-27 14:05:32', '2025-03-27 14:05:32'),
(1053, 56, 25.00, 50, '2025-03-27 14:05:32', '2025-03-27 14:05:32'),
(1054, 57, 10.00, 5, '2025-03-27 14:05:54', '2025-03-27 14:05:54'),
(1055, 57, 15.00, 15, '2025-03-27 14:05:54', '2025-03-27 14:05:54'),
(1056, 57, 20.00, 20, '2025-03-27 14:05:54', '2025-03-27 14:05:54'),
(1057, 57, 25.00, 50, '2025-03-27 14:05:54', '2025-03-27 14:05:54'),
(1058, 58, 10.00, 5, '2025-03-27 14:06:50', '2025-03-27 14:06:50'),
(1059, 58, 15.00, 15, '2025-03-27 14:06:50', '2025-03-27 14:06:50'),
(1060, 58, 20.00, 20, '2025-03-27 14:06:50', '2025-03-27 14:06:50'),
(1061, 58, 25.00, 50, '2025-03-27 14:06:50', '2025-03-27 14:06:50'),
(1062, 59, 10.00, 5, '2025-03-27 14:07:26', '2025-03-27 14:07:26'),
(1063, 59, 15.00, 15, '2025-03-27 14:07:26', '2025-03-27 14:07:26'),
(1064, 59, 20.00, 20, '2025-03-27 14:07:26', '2025-03-27 14:07:26'),
(1065, 59, 25.00, 50, '2025-03-27 14:07:26', '2025-03-27 14:07:26'),
(1066, 60, 10.00, 5, '2025-03-27 14:07:50', '2025-03-27 14:07:50'),
(1067, 60, 15.00, 15, '2025-03-27 14:07:50', '2025-03-27 14:07:50'),
(1068, 60, 20.00, 20, '2025-03-27 14:07:50', '2025-03-27 14:07:50'),
(1069, 60, 25.00, 50, '2025-03-27 14:07:50', '2025-03-27 14:07:50'),
(1070, 61, 10.00, 5, '2025-03-27 14:08:34', '2025-03-27 14:08:34'),
(1071, 61, 15.00, 15, '2025-03-27 14:08:34', '2025-03-27 14:08:34'),
(1072, 61, 20.00, 20, '2025-03-27 14:08:34', '2025-03-27 14:08:34'),
(1073, 61, 25.00, 50, '2025-03-27 14:08:34', '2025-03-27 14:08:34'),
(1078, 62, 10.00, 5, '2025-03-27 14:11:27', '2025-03-27 14:11:27'),
(1079, 62, 15.00, 15, '2025-03-27 14:11:27', '2025-03-27 14:11:27'),
(1080, 62, 20.00, 20, '2025-03-27 14:11:27', '2025-03-27 14:11:27'),
(1081, 62, 25.00, 50, '2025-03-27 14:11:27', '2025-03-27 14:11:27'),
(1082, 63, 10.00, 5, '2025-03-27 14:12:09', '2025-03-27 14:12:09'),
(1083, 63, 15.00, 15, '2025-03-27 14:12:09', '2025-03-27 14:12:09'),
(1084, 63, 20.00, 20, '2025-03-27 14:12:09', '2025-03-27 14:12:09'),
(1085, 63, 25.00, 50, '2025-03-27 14:12:09', '2025-03-27 14:12:09'),
(1086, 64, 10.00, 5, '2025-03-27 14:13:09', '2025-03-27 14:13:09'),
(1087, 64, 15.00, 15, '2025-03-27 14:13:09', '2025-03-27 14:13:09'),
(1088, 64, 20.00, 20, '2025-03-27 14:13:09', '2025-03-27 14:13:09'),
(1089, 64, 25.00, 50, '2025-03-27 14:13:09', '2025-03-27 14:13:09'),
(1090, 65, 10.00, 5, '2025-03-27 14:13:22', '2025-03-27 14:13:22'),
(1091, 65, 15.00, 15, '2025-03-27 14:13:22', '2025-03-27 14:13:22'),
(1092, 65, 20.00, 20, '2025-03-27 14:13:22', '2025-03-27 14:13:22'),
(1093, 65, 25.00, 50, '2025-03-27 14:13:22', '2025-03-27 14:13:22'),
(1094, 66, 10.00, 5, '2025-03-27 14:13:39', '2025-03-27 14:13:39'),
(1095, 66, 15.00, 15, '2025-03-27 14:13:39', '2025-03-27 14:13:39'),
(1096, 66, 20.00, 20, '2025-03-27 14:13:39', '2025-03-27 14:13:39'),
(1097, 66, 25.00, 50, '2025-03-27 14:13:39', '2025-03-27 14:13:39'),
(1098, 67, 10.00, 5, '2025-03-27 14:13:51', '2025-03-27 14:13:51'),
(1099, 67, 15.00, 15, '2025-03-27 14:13:51', '2025-03-27 14:13:51'),
(1100, 67, 20.00, 20, '2025-03-27 14:13:51', '2025-03-27 14:13:51'),
(1101, 67, 25.00, 50, '2025-03-27 14:13:51', '2025-03-27 14:13:51'),
(1102, 68, 10.00, 5, '2025-03-27 14:14:59', '2025-03-27 14:14:59'),
(1103, 68, 15.00, 15, '2025-03-27 14:14:59', '2025-03-27 14:14:59'),
(1104, 68, 20.00, 20, '2025-03-27 14:14:59', '2025-03-27 14:14:59'),
(1105, 68, 25.00, 50, '2025-03-27 14:14:59', '2025-03-27 14:14:59'),
(1106, 69, 10.00, 5, '2025-03-27 14:15:23', '2025-03-27 14:15:23'),
(1107, 69, 15.00, 15, '2025-03-27 14:15:23', '2025-03-27 14:15:23'),
(1108, 69, 20.00, 20, '2025-03-27 14:15:23', '2025-03-27 14:15:23'),
(1109, 69, 25.00, 50, '2025-03-27 14:15:23', '2025-03-27 14:15:23'),
(1114, 70, 10.00, 5, '2025-03-27 14:15:43', '2025-03-27 14:15:43'),
(1115, 70, 15.00, 15, '2025-03-27 14:15:43', '2025-03-27 14:15:43'),
(1116, 70, 20.00, 20, '2025-03-27 14:15:43', '2025-03-27 14:15:43'),
(1117, 70, 25.00, 50, '2025-03-27 14:15:43', '2025-03-27 14:15:43'),
(1118, 71, 10.00, 5, '2025-03-27 14:17:23', '2025-03-27 14:17:23'),
(1119, 71, 15.00, 15, '2025-03-27 14:17:23', '2025-03-27 14:17:23'),
(1120, 71, 20.00, 20, '2025-03-27 14:17:23', '2025-03-27 14:17:23'),
(1121, 71, 25.00, 50, '2025-03-27 14:17:23', '2025-03-27 14:17:23'),
(1122, 72, 10.00, 5, '2025-03-27 14:17:57', '2025-03-27 14:17:57'),
(1123, 72, 15.00, 15, '2025-03-27 14:17:57', '2025-03-27 14:17:57'),
(1124, 72, 20.00, 20, '2025-03-27 14:17:57', '2025-03-27 14:17:57'),
(1125, 72, 25.00, 50, '2025-03-27 14:17:57', '2025-03-27 14:17:57'),
(1126, 73, 10.00, 5, '2025-03-27 14:18:30', '2025-03-27 14:18:30'),
(1127, 73, 15.00, 15, '2025-03-27 14:18:30', '2025-03-27 14:18:30'),
(1128, 73, 20.00, 20, '2025-03-27 14:18:30', '2025-03-27 14:18:30'),
(1129, 73, 25.00, 50, '2025-03-27 14:18:30', '2025-03-27 14:18:30');
INSERT INTO `product_volume_discount` (`id`, `product_id`, `discount`, `quantity`, `created_at`, `updated_at`) VALUES
(1130, 74, 10.00, 5, '2025-03-27 14:18:46', '2025-03-27 14:18:46'),
(1131, 74, 15.00, 15, '2025-03-27 14:18:46', '2025-03-27 14:18:46'),
(1132, 74, 20.00, 20, '2025-03-27 14:18:46', '2025-03-27 14:18:46'),
(1133, 74, 25.00, 50, '2025-03-27 14:18:46', '2025-03-27 14:18:46'),
(1134, 75, 10.00, 5, '2025-03-27 14:18:54', '2025-03-27 14:18:54'),
(1135, 75, 15.00, 15, '2025-03-27 14:18:54', '2025-03-27 14:18:54'),
(1136, 75, 20.00, 20, '2025-03-27 14:18:54', '2025-03-27 14:18:54'),
(1137, 75, 25.00, 50, '2025-03-27 14:18:54', '2025-03-27 14:18:54'),
(1138, 76, 10.00, 5, '2025-03-27 14:19:51', '2025-03-27 14:19:51'),
(1139, 76, 15.00, 15, '2025-03-27 14:19:51', '2025-03-27 14:19:51'),
(1140, 76, 20.00, 20, '2025-03-27 14:19:51', '2025-03-27 14:19:51'),
(1141, 76, 25.00, 50, '2025-03-27 14:19:51', '2025-03-27 14:19:51'),
(1142, 77, 10.00, 5, '2025-03-27 14:19:58', '2025-03-27 14:19:58'),
(1143, 77, 15.00, 15, '2025-03-27 14:19:58', '2025-03-27 14:19:58'),
(1144, 77, 20.00, 20, '2025-03-27 14:19:58', '2025-03-27 14:19:58'),
(1145, 77, 25.00, 50, '2025-03-27 14:19:58', '2025-03-27 14:19:58'),
(1146, 78, 10.00, 5, '2025-03-27 14:20:11', '2025-03-27 14:20:11'),
(1147, 78, 15.00, 15, '2025-03-27 14:20:11', '2025-03-27 14:20:11'),
(1148, 78, 20.00, 20, '2025-03-27 14:20:11', '2025-03-27 14:20:11'),
(1149, 78, 25.00, 50, '2025-03-27 14:20:11', '2025-03-27 14:20:11'),
(1150, 80, 10.00, 5, '2025-03-27 14:20:18', '2025-03-27 14:20:18'),
(1151, 80, 15.00, 15, '2025-03-27 14:20:18', '2025-03-27 14:20:18'),
(1152, 80, 20.00, 20, '2025-03-27 14:20:18', '2025-03-27 14:20:18'),
(1153, 80, 25.00, 50, '2025-03-27 14:20:18', '2025-03-27 14:20:18'),
(1154, 82, 10.00, 5, '2025-03-27 14:20:29', '2025-03-27 14:20:29'),
(1155, 82, 15.00, 15, '2025-03-27 14:20:29', '2025-03-27 14:20:29'),
(1156, 82, 20.00, 20, '2025-03-27 14:20:29', '2025-03-27 14:20:29'),
(1157, 82, 25.00, 50, '2025-03-27 14:20:29', '2025-03-27 14:20:29'),
(1158, 83, 10.00, 5, '2025-03-27 14:20:36', '2025-03-27 14:20:36'),
(1159, 83, 15.00, 15, '2025-03-27 14:20:36', '2025-03-27 14:20:36'),
(1160, 83, 20.00, 20, '2025-03-27 14:20:36', '2025-03-27 14:20:36'),
(1161, 83, 25.00, 50, '2025-03-27 14:20:36', '2025-03-27 14:20:36'),
(1162, 84, 10.00, 5, '2025-03-27 14:20:49', '2025-03-27 14:20:49'),
(1163, 84, 15.00, 15, '2025-03-27 14:20:49', '2025-03-27 14:20:49'),
(1164, 84, 20.00, 20, '2025-03-27 14:20:49', '2025-03-27 14:20:49'),
(1165, 84, 25.00, 50, '2025-03-27 14:20:49', '2025-03-27 14:20:49'),
(1166, 85, 10.00, 5, '2025-03-27 14:22:16', '2025-03-27 14:22:16'),
(1167, 85, 15.00, 15, '2025-03-27 14:22:16', '2025-03-27 14:22:16'),
(1168, 85, 20.00, 20, '2025-03-27 14:22:16', '2025-03-27 14:22:16'),
(1169, 85, 25.00, 50, '2025-03-27 14:22:16', '2025-03-27 14:22:16'),
(1170, 86, 10.00, 5, '2025-03-27 14:22:24', '2025-03-27 14:22:24'),
(1171, 86, 15.00, 15, '2025-03-27 14:22:24', '2025-03-27 14:22:24'),
(1172, 86, 20.00, 20, '2025-03-27 14:22:24', '2025-03-27 14:22:24'),
(1173, 86, 25.00, 50, '2025-03-27 14:22:24', '2025-03-27 14:22:24'),
(1174, 87, 10.00, 5, '2025-03-27 14:22:36', '2025-03-27 14:22:36'),
(1175, 87, 15.00, 15, '2025-03-27 14:22:36', '2025-03-27 14:22:36'),
(1176, 87, 20.00, 20, '2025-03-27 14:22:36', '2025-03-27 14:22:36'),
(1177, 87, 25.00, 50, '2025-03-27 14:22:36', '2025-03-27 14:22:36'),
(1178, 89, 10.00, 5, '2025-03-27 14:22:44', '2025-03-27 14:22:44'),
(1179, 89, 15.00, 15, '2025-03-27 14:22:44', '2025-03-27 14:22:44'),
(1180, 89, 20.00, 20, '2025-03-27 14:22:44', '2025-03-27 14:22:44'),
(1181, 89, 25.00, 50, '2025-03-27 14:22:44', '2025-03-27 14:22:44'),
(1182, 90, 10.00, 5, '2025-03-27 14:22:56', '2025-03-27 14:22:56'),
(1183, 90, 15.00, 15, '2025-03-27 14:22:56', '2025-03-27 14:22:56'),
(1184, 90, 20.00, 20, '2025-03-27 14:22:56', '2025-03-27 14:22:56'),
(1185, 90, 25.00, 50, '2025-03-27 14:22:56', '2025-03-27 14:22:56'),
(1186, 247, 10.00, 5, '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(1187, 247, 15.00, 15, '2025-03-27 14:42:58', '2025-03-27 14:42:58'),
(1188, 247, 20.00, 20, '2025-03-27 14:42:59', '2025-03-27 14:42:59'),
(1189, 247, 25.00, 50, '2025-03-27 14:42:59', '2025-03-27 14:42:59'),
(1190, 248, 10.00, 5, '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(1191, 248, 15.00, 15, '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(1192, 248, 20.00, 20, '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(1193, 248, 25.00, 50, '2025-03-27 15:02:33', '2025-03-27 15:02:33'),
(1194, 249, 10.00, 5, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(1195, 249, 15.00, 15, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(1196, 249, 20.00, 20, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(1197, 249, 25.00, 50, '2025-03-27 15:33:40', '2025-03-27 15:33:40'),
(1202, 29, 10.00, 5, '2025-03-27 15:38:31', '2025-03-27 15:38:31'),
(1203, 29, 15.00, 15, '2025-03-27 15:38:31', '2025-03-27 15:38:31'),
(1204, 29, 20.00, 20, '2025-03-27 15:38:31', '2025-03-27 15:38:31'),
(1205, 29, 25.00, 50, '2025-03-27 15:38:31', '2025-03-27 15:38:31'),
(1210, 250, 10.00, 5, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(1211, 250, 15.00, 15, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(1212, 250, 20.00, 20, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(1213, 250, 25.00, 50, '2025-03-27 16:04:05', '2025-03-27 16:04:05'),
(1218, 256, 10.00, 5, '2025-03-28 09:09:10', '2025-03-28 09:09:10'),
(1219, 256, 15.00, 15, '2025-03-28 09:09:10', '2025-03-28 09:09:10'),
(1220, 256, 20.00, 20, '2025-03-28 09:09:10', '2025-03-28 09:09:10'),
(1221, 256, 25.00, 50, '2025-03-28 09:09:10', '2025-03-28 09:09:10'),
(1222, 257, 10.00, 5, '2025-03-28 09:12:08', '2025-03-28 09:12:08'),
(1223, 257, 15.00, 15, '2025-03-28 09:12:08', '2025-03-28 09:12:08'),
(1224, 257, 20.00, 20, '2025-03-28 09:12:08', '2025-03-28 09:12:08'),
(1225, 257, 25.00, 50, '2025-03-28 09:12:08', '2025-03-28 09:12:08'),
(1226, 258, 10.00, 5, '2025-03-28 09:15:09', '2025-03-28 09:15:09'),
(1227, 258, 15.00, 15, '2025-03-28 09:15:09', '2025-03-28 09:15:09'),
(1228, 258, 20.00, 20, '2025-03-28 09:15:09', '2025-03-28 09:15:09'),
(1229, 258, 25.00, 50, '2025-03-28 09:15:09', '2025-03-28 09:15:09'),
(1230, 259, 10.00, 5, '2025-03-28 09:18:03', '2025-03-28 09:18:03'),
(1231, 259, 15.00, 15, '2025-03-28 09:18:03', '2025-03-28 09:18:03'),
(1232, 259, 20.00, 20, '2025-03-28 09:18:03', '2025-03-28 09:18:03'),
(1233, 259, 25.00, 50, '2025-03-28 09:18:03', '2025-03-28 09:18:03'),
(1234, 260, 10.00, 5, '2025-03-28 09:20:30', '2025-03-28 09:20:30'),
(1235, 260, 15.00, 15, '2025-03-28 09:20:30', '2025-03-28 09:20:30'),
(1236, 260, 20.00, 20, '2025-03-28 09:20:30', '2025-03-28 09:20:30'),
(1237, 260, 25.00, 50, '2025-03-28 09:20:30', '2025-03-28 09:20:30'),
(1238, 261, 10.00, 5, '2025-03-28 09:26:07', '2025-03-28 09:26:07'),
(1239, 261, 15.00, 15, '2025-03-28 09:26:07', '2025-03-28 09:26:07'),
(1240, 261, 20.00, 20, '2025-03-28 09:26:07', '2025-03-28 09:26:07'),
(1241, 261, 25.00, 50, '2025-03-28 09:26:07', '2025-03-28 09:26:07'),
(1242, 262, 10.00, 5, '2025-03-28 09:29:00', '2025-03-28 09:29:00'),
(1243, 262, 15.00, 15, '2025-03-28 09:29:00', '2025-03-28 09:29:00'),
(1244, 262, 20.00, 20, '2025-03-28 09:29:00', '2025-03-28 09:29:00'),
(1245, 262, 25.00, 50, '2025-03-28 09:29:00', '2025-03-28 09:29:00'),
(1246, 263, 10.00, 5, '2025-03-28 09:29:02', '2025-03-28 09:29:02'),
(1247, 263, 15.00, 15, '2025-03-28 09:29:02', '2025-03-28 09:29:02'),
(1248, 263, 20.00, 20, '2025-03-28 09:29:02', '2025-03-28 09:29:02'),
(1249, 263, 25.00, 50, '2025-03-28 09:29:02', '2025-03-28 09:29:02'),
(1250, 264, 10.00, 5, '2025-03-28 09:32:07', '2025-03-28 09:32:07'),
(1251, 264, 15.00, 15, '2025-03-28 09:32:07', '2025-03-28 09:32:07'),
(1252, 264, 20.00, 20, '2025-03-28 09:32:07', '2025-03-28 09:32:07'),
(1253, 264, 25.00, 50, '2025-03-28 09:32:07', '2025-03-28 09:32:07'),
(1254, 265, 10.00, 5, '2025-03-28 09:35:26', '2025-03-28 09:35:26'),
(1255, 265, 15.00, 15, '2025-03-28 09:35:26', '2025-03-28 09:35:26'),
(1256, 265, 20.00, 20, '2025-03-28 09:35:26', '2025-03-28 09:35:26'),
(1257, 265, 25.00, 50, '2025-03-28 09:35:26', '2025-03-28 09:35:26'),
(1258, 266, 10.00, 5, '2025-03-28 09:39:16', '2025-03-28 09:39:16'),
(1259, 266, 15.00, 15, '2025-03-28 09:39:16', '2025-03-28 09:39:16'),
(1260, 266, 20.00, 20, '2025-03-28 09:39:16', '2025-03-28 09:39:16'),
(1261, 266, 25.00, 50, '2025-03-28 09:39:16', '2025-03-28 09:39:16'),
(1262, 267, 10.00, 5, '2025-03-28 10:38:24', '2025-03-28 10:38:24'),
(1263, 267, 15.00, 15, '2025-03-28 10:38:24', '2025-03-28 10:38:24'),
(1264, 267, 20.00, 20, '2025-03-28 10:38:24', '2025-03-28 10:38:24'),
(1265, 267, 25.00, 50, '2025-03-28 10:38:24', '2025-03-28 10:38:24'),
(1266, 268, 10.00, 5, '2025-03-28 10:44:21', '2025-03-28 10:44:21'),
(1267, 268, 15.00, 15, '2025-03-28 10:44:21', '2025-03-28 10:44:21'),
(1268, 268, 20.00, 20, '2025-03-28 10:44:21', '2025-03-28 10:44:21'),
(1269, 268, 25.00, 50, '2025-03-28 10:44:21', '2025-03-28 10:44:21'),
(1270, 269, 10.00, 5, '2025-03-28 10:47:41', '2025-03-28 10:47:41'),
(1271, 269, 15.00, 15, '2025-03-28 10:47:41', '2025-03-28 10:47:41'),
(1272, 269, 20.00, 20, '2025-03-28 10:47:41', '2025-03-28 10:47:41'),
(1273, 269, 25.00, 50, '2025-03-28 10:47:41', '2025-03-28 10:47:41'),
(1274, 270, 10.00, 5, '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(1275, 270, 15.00, 15, '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(1276, 270, 20.00, 20, '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(1277, 270, 25.00, 50, '2025-03-28 10:56:48', '2025-03-28 10:56:48'),
(1278, 271, 10.00, 5, '2025-03-28 11:00:15', '2025-03-28 11:00:15'),
(1279, 271, 15.00, 15, '2025-03-28 11:00:15', '2025-03-28 11:00:15'),
(1280, 271, 20.00, 20, '2025-03-28 11:00:15', '2025-03-28 11:00:15'),
(1281, 271, 25.00, 50, '2025-03-28 11:00:15', '2025-03-28 11:00:15'),
(1282, 272, 10.00, 5, '2025-03-28 11:03:03', '2025-03-28 11:03:03'),
(1283, 272, 15.00, 15, '2025-03-28 11:03:03', '2025-03-28 11:03:03'),
(1284, 272, 20.00, 20, '2025-03-28 11:03:03', '2025-03-28 11:03:03'),
(1285, 272, 25.00, 50, '2025-03-28 11:03:03', '2025-03-28 11:03:03'),
(1286, 273, 10.00, 5, '2025-03-28 11:05:51', '2025-03-28 11:05:51'),
(1287, 273, 15.00, 15, '2025-03-28 11:05:51', '2025-03-28 11:05:51'),
(1288, 273, 20.00, 20, '2025-03-28 11:05:51', '2025-03-28 11:05:51'),
(1289, 273, 25.00, 50, '2025-03-28 11:05:51', '2025-03-28 11:05:51'),
(1290, 274, 10.00, 5, '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(1291, 274, 15.00, 15, '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(1292, 274, 20.00, 20, '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(1293, 274, 25.00, 50, '2025-03-28 11:21:50', '2025-03-28 11:21:50'),
(1294, 275, 10.00, 5, '2025-03-28 11:24:40', '2025-03-28 11:24:40'),
(1295, 275, 15.00, 15, '2025-03-28 11:24:40', '2025-03-28 11:24:40'),
(1296, 275, 20.00, 20, '2025-03-28 11:24:40', '2025-03-28 11:24:40'),
(1297, 275, 25.00, 50, '2025-03-28 11:24:40', '2025-03-28 11:24:40'),
(1298, 276, 10.00, 5, '2025-03-28 11:26:50', '2025-03-28 11:26:50'),
(1299, 276, 15.00, 15, '2025-03-28 11:26:50', '2025-03-28 11:26:50'),
(1300, 276, 20.00, 20, '2025-03-28 11:26:50', '2025-03-28 11:26:50'),
(1301, 276, 25.00, 50, '2025-03-28 11:26:50', '2025-03-28 11:26:50'),
(1302, 277, 10.00, 5, '2025-03-28 11:30:39', '2025-03-28 11:30:39'),
(1303, 277, 15.00, 15, '2025-03-28 11:30:39', '2025-03-28 11:30:39'),
(1304, 277, 20.00, 20, '2025-03-28 11:30:39', '2025-03-28 11:30:39'),
(1305, 277, 25.00, 50, '2025-03-28 11:30:39', '2025-03-28 11:30:39'),
(1306, 278, 10.00, 5, '2025-03-28 11:33:38', '2025-03-28 11:33:38'),
(1307, 278, 15.00, 15, '2025-03-28 11:33:38', '2025-03-28 11:33:38'),
(1308, 278, 20.00, 20, '2025-03-28 11:33:38', '2025-03-28 11:33:38'),
(1309, 278, 25.00, 50, '2025-03-28 11:33:38', '2025-03-28 11:33:38'),
(1310, 279, 10.00, 5, '2025-03-28 11:37:12', '2025-03-28 11:37:12'),
(1311, 279, 15.00, 15, '2025-03-28 11:37:12', '2025-03-28 11:37:12'),
(1312, 279, 20.00, 20, '2025-03-28 11:37:12', '2025-03-28 11:37:12'),
(1313, 279, 25.00, 50, '2025-03-28 11:37:12', '2025-03-28 11:37:12'),
(1314, 280, 10.00, 5, '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(1315, 280, 15.00, 15, '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(1316, 280, 20.00, 20, '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(1317, 280, 25.00, 50, '2025-03-28 11:45:16', '2025-03-28 11:45:16'),
(1318, 281, 10.00, 5, '2025-03-28 11:47:52', '2025-03-28 11:47:52'),
(1319, 281, 15.00, 15, '2025-03-28 11:47:52', '2025-03-28 11:47:52'),
(1320, 281, 20.00, 20, '2025-03-28 11:47:52', '2025-03-28 11:47:52'),
(1321, 281, 25.00, 50, '2025-03-28 11:47:52', '2025-03-28 11:47:52'),
(1322, 282, 10.00, 5, '2025-03-28 11:49:33', '2025-03-28 11:49:33'),
(1323, 282, 15.00, 15, '2025-03-28 11:49:33', '2025-03-28 11:49:33'),
(1324, 282, 20.00, 20, '2025-03-28 11:49:33', '2025-03-28 11:49:33'),
(1325, 282, 25.00, 50, '2025-03-28 11:49:33', '2025-03-28 11:49:33'),
(1326, 283, 10.00, 5, '2025-03-28 11:58:55', '2025-03-28 11:58:55'),
(1327, 283, 15.00, 15, '2025-03-28 11:58:55', '2025-03-28 11:58:55'),
(1328, 283, 20.00, 20, '2025-03-28 11:58:55', '2025-03-28 11:58:55'),
(1329, 283, 25.00, 50, '2025-03-28 11:58:55', '2025-03-28 11:58:55'),
(1330, 284, 10.00, 5, '2025-03-28 12:00:23', '2025-03-28 12:00:23'),
(1331, 284, 15.00, 15, '2025-03-28 12:00:23', '2025-03-28 12:00:23'),
(1332, 284, 20.00, 20, '2025-03-28 12:00:23', '2025-03-28 12:00:23'),
(1333, 284, 25.00, 50, '2025-03-28 12:00:23', '2025-03-28 12:00:23'),
(1334, 285, 10.00, 5, '2025-03-28 12:04:23', '2025-03-28 12:04:23'),
(1335, 285, 15.00, 15, '2025-03-28 12:04:23', '2025-03-28 12:04:23'),
(1336, 285, 20.00, 20, '2025-03-28 12:04:23', '2025-03-28 12:04:23'),
(1337, 285, 25.00, 50, '2025-03-28 12:04:23', '2025-03-28 12:04:23'),
(1338, 286, 10.00, 5, '2025-03-28 12:07:10', '2025-03-28 12:07:10'),
(1339, 286, 15.00, 15, '2025-03-28 12:07:10', '2025-03-28 12:07:10'),
(1340, 286, 20.00, 20, '2025-03-28 12:07:10', '2025-03-28 12:07:10'),
(1341, 286, 25.00, 50, '2025-03-28 12:07:10', '2025-03-28 12:07:10'),
(1342, 287, 10.00, 5, '2025-03-28 12:19:42', '2025-03-28 12:19:42'),
(1343, 287, 15.00, 15, '2025-03-28 12:19:42', '2025-03-28 12:19:42'),
(1344, 287, 20.00, 20, '2025-03-28 12:19:42', '2025-03-28 12:19:42'),
(1345, 287, 25.00, 50, '2025-03-28 12:19:42', '2025-03-28 12:19:42'),
(1346, 289, 10.00, 5, '2025-03-28 12:53:00', '2025-03-28 12:53:00'),
(1347, 289, 15.00, 15, '2025-03-28 12:53:00', '2025-03-28 12:53:00'),
(1348, 289, 20.00, 20, '2025-03-28 12:53:00', '2025-03-28 12:53:00'),
(1349, 289, 25.00, 50, '2025-03-28 12:53:00', '2025-03-28 12:53:00'),
(1350, 290, 10.00, 5, '2025-03-28 12:58:22', '2025-03-28 12:58:22'),
(1351, 290, 15.00, 15, '2025-03-28 12:58:22', '2025-03-28 12:58:22'),
(1352, 290, 20.00, 20, '2025-03-28 12:58:22', '2025-03-28 12:58:22'),
(1353, 290, 25.00, 50, '2025-03-28 12:58:22', '2025-03-28 12:58:22'),
(1354, 291, 10.00, 5, '2025-03-28 13:03:37', '2025-03-28 13:03:37'),
(1355, 291, 15.00, 15, '2025-03-28 13:03:37', '2025-03-28 13:03:37'),
(1356, 291, 20.00, 20, '2025-03-28 13:03:37', '2025-03-28 13:03:37'),
(1357, 291, 25.00, 50, '2025-03-28 13:03:37', '2025-03-28 13:03:37'),
(1358, 292, 10.00, 5, '2025-03-28 13:07:29', '2025-03-28 13:07:29'),
(1359, 292, 15.00, 15, '2025-03-28 13:07:29', '2025-03-28 13:07:29'),
(1360, 292, 20.00, 20, '2025-03-28 13:07:29', '2025-03-28 13:07:29'),
(1361, 292, 25.00, 50, '2025-03-28 13:07:29', '2025-03-28 13:07:29'),
(1362, 293, 10.00, 5, '2025-03-28 13:13:07', '2025-03-28 13:13:07'),
(1363, 293, 15.00, 15, '2025-03-28 13:13:07', '2025-03-28 13:13:07'),
(1364, 293, 20.00, 20, '2025-03-28 13:13:07', '2025-03-28 13:13:07'),
(1365, 293, 25.00, 50, '2025-03-28 13:13:07', '2025-03-28 13:13:07'),
(1366, 294, 10.00, 5, '2025-03-28 13:18:09', '2025-03-28 13:18:09'),
(1367, 294, 15.00, 15, '2025-03-28 13:18:09', '2025-03-28 13:18:09'),
(1368, 294, 20.00, 20, '2025-03-28 13:18:09', '2025-03-28 13:18:09'),
(1369, 294, 25.00, 50, '2025-03-28 13:18:09', '2025-03-28 13:18:09'),
(1370, 295, 10.00, 5, '2025-03-28 13:21:52', '2025-03-28 13:21:52'),
(1371, 295, 15.00, 15, '2025-03-28 13:21:52', '2025-03-28 13:21:52'),
(1372, 295, 20.00, 20, '2025-03-28 13:21:52', '2025-03-28 13:21:52'),
(1373, 295, 25.00, 50, '2025-03-28 13:21:52', '2025-03-28 13:21:52'),
(1374, 296, 10.00, 5, '2025-03-28 13:29:41', '2025-03-28 13:29:41'),
(1375, 296, 15.00, 15, '2025-03-28 13:29:41', '2025-03-28 13:29:41'),
(1376, 296, 20.00, 20, '2025-03-28 13:29:41', '2025-03-28 13:29:41'),
(1377, 296, 25.00, 50, '2025-03-28 13:29:41', '2025-03-28 13:29:41'),
(1378, 297, 10.00, 5, '2025-03-28 13:33:13', '2025-03-28 13:33:13'),
(1379, 297, 15.00, 15, '2025-03-28 13:33:13', '2025-03-28 13:33:13'),
(1380, 297, 20.00, 20, '2025-03-28 13:33:13', '2025-03-28 13:33:13'),
(1381, 297, 25.00, 50, '2025-03-28 13:33:13', '2025-03-28 13:33:13'),
(1382, 298, 10.00, 5, '2025-03-28 13:39:01', '2025-03-28 13:39:01'),
(1383, 298, 15.00, 15, '2025-03-28 13:39:01', '2025-03-28 13:39:01'),
(1384, 298, 20.00, 20, '2025-03-28 13:39:01', '2025-03-28 13:39:01'),
(1385, 298, 25.00, 50, '2025-03-28 13:39:01', '2025-03-28 13:39:01'),
(1386, 299, 10.00, 5, '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(1387, 299, 15.00, 15, '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(1388, 299, 20.00, 20, '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(1389, 299, 25.00, 50, '2025-03-28 13:54:48', '2025-03-28 13:54:48'),
(1390, 300, 10.00, 5, '2025-03-28 13:58:04', '2025-03-28 13:58:04'),
(1391, 300, 15.00, 15, '2025-03-28 13:58:04', '2025-03-28 13:58:04'),
(1392, 300, 20.00, 20, '2025-03-28 13:58:04', '2025-03-28 13:58:04'),
(1393, 300, 25.00, 50, '2025-03-28 13:58:04', '2025-03-28 13:58:04'),
(1394, 301, 10.00, 5, '2025-03-28 14:00:39', '2025-03-28 14:00:39'),
(1395, 301, 15.00, 15, '2025-03-28 14:00:39', '2025-03-28 14:00:39'),
(1396, 301, 20.00, 20, '2025-03-28 14:00:39', '2025-03-28 14:00:39'),
(1397, 301, 25.00, 50, '2025-03-28 14:00:39', '2025-03-28 14:00:39'),
(1402, 302, 10.00, 5, '2025-03-28 14:04:17', '2025-03-28 14:04:17'),
(1403, 302, 15.00, 15, '2025-03-28 14:04:17', '2025-03-28 14:04:17'),
(1404, 302, 20.00, 20, '2025-03-28 14:04:17', '2025-03-28 14:04:17'),
(1405, 302, 25.00, 50, '2025-03-28 14:04:17', '2025-03-28 14:04:17'),
(1406, 303, 10.00, 5, '2025-03-28 14:07:03', '2025-03-28 14:07:03'),
(1407, 303, 15.00, 15, '2025-03-28 14:07:03', '2025-03-28 14:07:03'),
(1408, 303, 20.00, 20, '2025-03-28 14:07:03', '2025-03-28 14:07:03'),
(1409, 303, 25.00, 50, '2025-03-28 14:07:03', '2025-03-28 14:07:03'),
(1410, 304, 10.00, 5, '2025-03-28 14:09:16', '2025-03-28 14:09:16'),
(1411, 304, 15.00, 15, '2025-03-28 14:09:16', '2025-03-28 14:09:16'),
(1412, 304, 20.00, 20, '2025-03-28 14:09:16', '2025-03-28 14:09:16'),
(1413, 304, 25.00, 50, '2025-03-28 14:09:16', '2025-03-28 14:09:16'),
(1414, 305, 10.00, 5, '2025-03-28 14:11:58', '2025-03-28 14:11:58'),
(1415, 305, 15.00, 15, '2025-03-28 14:11:58', '2025-03-28 14:11:58'),
(1416, 305, 20.00, 20, '2025-03-28 14:11:58', '2025-03-28 14:11:58'),
(1417, 305, 25.00, 50, '2025-03-28 14:11:58', '2025-03-28 14:11:58'),
(1418, 306, 10.00, 5, '2025-03-28 14:15:54', '2025-03-28 14:15:54'),
(1419, 306, 15.00, 15, '2025-03-28 14:15:54', '2025-03-28 14:15:54'),
(1420, 306, 20.00, 20, '2025-03-28 14:15:54', '2025-03-28 14:15:54'),
(1421, 306, 25.00, 50, '2025-03-28 14:15:54', '2025-03-28 14:15:54'),
(1422, 307, 10.00, 5, '2025-03-28 14:18:47', '2025-03-28 14:18:47'),
(1423, 307, 15.00, 15, '2025-03-28 14:18:47', '2025-03-28 14:18:47'),
(1424, 307, 20.00, 20, '2025-03-28 14:18:47', '2025-03-28 14:18:47'),
(1425, 307, 25.00, 50, '2025-03-28 14:18:47', '2025-03-28 14:18:47'),
(1426, 308, 10.00, 5, '2025-03-28 14:48:25', '2025-03-28 14:48:25'),
(1427, 308, 15.00, 15, '2025-03-28 14:48:25', '2025-03-28 14:48:25'),
(1428, 308, 20.00, 20, '2025-03-28 14:48:25', '2025-03-28 14:48:25'),
(1429, 308, 25.00, 50, '2025-03-28 14:48:25', '2025-03-28 14:48:25'),
(1430, 309, 10.00, 5, '2025-03-28 14:52:08', '2025-03-28 14:52:08'),
(1431, 309, 15.00, 15, '2025-03-28 14:52:08', '2025-03-28 14:52:08'),
(1432, 309, 20.00, 20, '2025-03-28 14:52:08', '2025-03-28 14:52:08'),
(1433, 309, 25.00, 50, '2025-03-28 14:52:08', '2025-03-28 14:52:08'),
(1434, 311, 10.00, 5, '2025-03-28 14:55:38', '2025-03-28 14:55:38'),
(1435, 311, 15.00, 15, '2025-03-28 14:55:38', '2025-03-28 14:55:38'),
(1436, 311, 20.00, 20, '2025-03-28 14:55:38', '2025-03-28 14:55:38'),
(1437, 311, 25.00, 50, '2025-03-28 14:55:38', '2025-03-28 14:55:38'),
(1438, 313, 10.00, 5, '2025-03-28 14:58:05', '2025-03-28 14:58:05'),
(1439, 313, 15.00, 15, '2025-03-28 14:58:05', '2025-03-28 14:58:05'),
(1440, 313, 20.00, 20, '2025-03-28 14:58:05', '2025-03-28 14:58:05'),
(1441, 313, 25.00, 50, '2025-03-28 14:58:05', '2025-03-28 14:58:05'),
(1442, 315, 10.00, 5, '2025-03-28 15:01:24', '2025-03-28 15:01:24'),
(1443, 315, 15.00, 15, '2025-03-28 15:01:24', '2025-03-28 15:01:24'),
(1444, 315, 20.00, 20, '2025-03-28 15:01:24', '2025-03-28 15:01:24'),
(1445, 315, 25.00, 50, '2025-03-28 15:01:24', '2025-03-28 15:01:24'),
(1446, 316, 10.00, 5, '2025-03-28 15:05:23', '2025-03-28 15:05:23'),
(1447, 316, 15.00, 15, '2025-03-28 15:05:23', '2025-03-28 15:05:23'),
(1448, 316, 20.00, 20, '2025-03-28 15:05:23', '2025-03-28 15:05:23'),
(1449, 316, 25.00, 50, '2025-03-28 15:05:23', '2025-03-28 15:05:23'),
(1450, 317, 10.00, 5, '2025-03-28 15:10:37', '2025-03-28 15:10:37'),
(1451, 317, 15.00, 15, '2025-03-28 15:10:37', '2025-03-28 15:10:37'),
(1452, 317, 20.00, 20, '2025-03-28 15:10:37', '2025-03-28 15:10:37'),
(1453, 317, 25.00, 50, '2025-03-28 15:10:37', '2025-03-28 15:10:37'),
(1454, 319, 10.00, 5, '2025-03-28 15:14:14', '2025-03-28 15:14:14'),
(1455, 319, 15.00, 15, '2025-03-28 15:14:14', '2025-03-28 15:14:14'),
(1456, 319, 20.00, 20, '2025-03-28 15:14:14', '2025-03-28 15:14:14'),
(1457, 319, 25.00, 50, '2025-03-28 15:14:14', '2025-03-28 15:14:14'),
(1458, 320, 32.00, 612, '2025-03-28 15:17:04', '2025-03-28 15:17:04'),
(1459, 322, 2.00, 21, '2025-03-28 15:19:25', '2025-03-28 15:19:25'),
(1460, 322, 1.00, 32, '2025-03-28 15:19:25', '2025-03-28 15:19:25'),
(1461, 324, 10.00, 5, '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(1462, 324, 15.00, 15, '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(1463, 324, 20.00, 20, '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(1464, 324, 25.00, 50, '2025-03-28 15:25:46', '2025-03-28 15:25:46'),
(1465, 326, 10.00, 5, '2025-03-28 15:27:01', '2025-03-28 15:27:01'),
(1466, 326, 15.00, 15, '2025-03-28 15:27:01', '2025-03-28 15:27:01'),
(1467, 326, 20.00, 20, '2025-03-28 15:27:01', '2025-03-28 15:27:01'),
(1468, 326, 25.00, 50, '2025-03-28 15:27:01', '2025-03-28 15:27:01'),
(1469, 327, 10.00, 5, '2025-03-28 15:29:46', '2025-03-28 15:29:46'),
(1470, 327, 15.00, 15, '2025-03-28 15:29:46', '2025-03-28 15:29:46'),
(1471, 327, 20.00, 20, '2025-03-28 15:29:46', '2025-03-28 15:29:46'),
(1472, 327, 25.00, 50, '2025-03-28 15:29:46', '2025-03-28 15:29:46'),
(1473, 328, 10.00, 5, '2025-03-28 15:29:56', '2025-03-28 15:29:56'),
(1474, 328, 15.00, 15, '2025-03-28 15:29:56', '2025-03-28 15:29:56'),
(1475, 328, 20.00, 20, '2025-03-28 15:29:56', '2025-03-28 15:29:56'),
(1476, 328, 25.00, 50, '2025-03-28 15:29:56', '2025-03-28 15:29:56'),
(1477, 329, 10.00, 5, '2025-03-28 15:34:27', '2025-03-28 15:34:27'),
(1478, 329, 15.00, 15, '2025-03-28 15:34:27', '2025-03-28 15:34:27'),
(1479, 329, 20.00, 20, '2025-03-28 15:34:27', '2025-03-28 15:34:27'),
(1480, 329, 25.00, 50, '2025-03-28 15:34:27', '2025-03-28 15:34:27'),
(1481, 330, 10.00, 5, '2025-03-28 15:35:09', '2025-03-28 15:35:09'),
(1482, 330, 15.00, 15, '2025-03-28 15:35:09', '2025-03-28 15:35:09'),
(1483, 330, 20.00, 20, '2025-03-28 15:35:09', '2025-03-28 15:35:09'),
(1484, 330, 25.00, 50, '2025-03-28 15:35:09', '2025-03-28 15:35:09'),
(1485, 331, 10.00, 5, '2025-03-28 15:37:13', '2025-03-28 15:37:13'),
(1486, 331, 15.00, 15, '2025-03-28 15:37:13', '2025-03-28 15:37:13'),
(1487, 331, 20.00, 20, '2025-03-28 15:37:13', '2025-03-28 15:37:13'),
(1488, 331, 25.00, 50, '2025-03-28 15:37:13', '2025-03-28 15:37:13'),
(1489, 332, 10.00, 5, '2025-03-28 15:39:33', '2025-03-28 15:39:33'),
(1490, 332, 15.00, 15, '2025-03-28 15:39:33', '2025-03-28 15:39:33'),
(1491, 332, 20.00, 20, '2025-03-28 15:39:33', '2025-03-28 15:39:33'),
(1492, 332, 25.00, 50, '2025-03-28 15:39:33', '2025-03-28 15:39:33'),
(1493, 333, 10.00, 5, '2025-03-28 15:41:51', '2025-03-28 15:41:51'),
(1494, 333, 15.00, 15, '2025-03-28 15:41:51', '2025-03-28 15:41:51'),
(1495, 333, 20.00, 20, '2025-03-28 15:41:51', '2025-03-28 15:41:51'),
(1496, 333, 25.00, 50, '2025-03-28 15:41:51', '2025-03-28 15:41:51'),
(1497, 334, 10.00, 5, '2025-03-28 15:41:59', '2025-03-28 15:41:59'),
(1498, 334, 15.00, 15, '2025-03-28 15:41:59', '2025-03-28 15:41:59'),
(1499, 334, 20.00, 20, '2025-03-28 15:41:59', '2025-03-28 15:41:59'),
(1500, 334, 25.00, 50, '2025-03-28 15:41:59', '2025-03-28 15:41:59'),
(1501, 335, 10.00, 5, '2025-03-28 15:45:35', '2025-03-28 15:45:35'),
(1502, 335, 15.00, 15, '2025-03-28 15:45:35', '2025-03-28 15:45:35'),
(1503, 335, 20.00, 20, '2025-03-28 15:45:35', '2025-03-28 15:45:35'),
(1504, 335, 25.00, 50, '2025-03-28 15:45:35', '2025-03-28 15:45:35'),
(1509, 336, 10.00, 5, '2025-03-28 15:48:55', '2025-03-28 15:48:55'),
(1510, 336, 15.00, 15, '2025-03-28 15:48:55', '2025-03-28 15:48:55'),
(1511, 336, 20.00, 20, '2025-03-28 15:48:55', '2025-03-28 15:48:55'),
(1512, 336, 25.00, 50, '2025-03-28 15:48:55', '2025-03-28 15:48:55'),
(1513, 337, 10.00, 5, '2025-03-28 15:50:55', '2025-03-28 15:50:55'),
(1514, 337, 15.00, 15, '2025-03-28 15:50:55', '2025-03-28 15:50:55'),
(1515, 337, 20.00, 20, '2025-03-28 15:50:55', '2025-03-28 15:50:55'),
(1516, 337, 25.00, 50, '2025-03-28 15:50:55', '2025-03-28 15:50:55'),
(1517, 33, 10.00, 5, '2025-03-28 15:51:53', '2025-03-28 15:51:53'),
(1518, 33, 15.00, 15, '2025-03-28 15:51:53', '2025-03-28 15:51:53'),
(1519, 33, 20.00, 20, '2025-03-28 15:51:53', '2025-03-28 15:51:53'),
(1520, 33, 25.00, 50, '2025-03-28 15:51:53', '2025-03-28 15:51:53'),
(1521, 338, 10.00, 5, '2025-03-28 15:53:11', '2025-03-28 15:53:11'),
(1522, 338, 15.00, 15, '2025-03-28 15:53:11', '2025-03-28 15:53:11'),
(1523, 338, 20.00, 20, '2025-03-28 15:53:11', '2025-03-28 15:53:11'),
(1524, 338, 25.00, 50, '2025-03-28 15:53:11', '2025-03-28 15:53:11'),
(1525, 339, 10.00, 5, '2025-03-28 15:55:43', '2025-03-28 15:55:43'),
(1526, 339, 15.00, 15, '2025-03-28 15:55:43', '2025-03-28 15:55:43'),
(1527, 339, 20.00, 20, '2025-03-28 15:55:43', '2025-03-28 15:55:43'),
(1528, 339, 25.00, 50, '2025-03-28 15:55:43', '2025-03-28 15:55:43'),
(1529, 340, 10.00, 5, '2025-03-28 15:58:30', '2025-03-28 15:58:30'),
(1530, 340, 15.00, 15, '2025-03-28 15:58:30', '2025-03-28 15:58:30'),
(1531, 340, 20.00, 20, '2025-03-28 15:58:30', '2025-03-28 15:58:30'),
(1532, 340, 25.00, 50, '2025-03-28 15:58:30', '2025-03-28 15:58:30'),
(1533, 341, 10.00, 5, '2025-03-28 16:00:51', '2025-03-28 16:00:51'),
(1534, 341, 15.00, 15, '2025-03-28 16:00:51', '2025-03-28 16:00:51'),
(1535, 341, 20.00, 20, '2025-03-28 16:00:51', '2025-03-28 16:00:51'),
(1536, 341, 25.00, 50, '2025-03-28 16:00:51', '2025-03-28 16:00:51'),
(1537, 342, 10.00, 5, '2025-03-28 16:03:18', '2025-03-28 16:03:18'),
(1538, 342, 15.00, 15, '2025-03-28 16:03:18', '2025-03-28 16:03:18'),
(1539, 342, 20.00, 20, '2025-03-28 16:03:18', '2025-03-28 16:03:18'),
(1540, 342, 25.00, 50, '2025-03-28 16:03:18', '2025-03-28 16:03:18'),
(1541, 343, 10.00, 5, '2025-03-28 16:04:20', '2025-03-28 16:04:20'),
(1542, 343, 15.00, 15, '2025-03-28 16:04:20', '2025-03-28 16:04:20'),
(1543, 343, 20.00, 20, '2025-03-28 16:04:20', '2025-03-28 16:04:20'),
(1544, 343, 25.00, 50, '2025-03-28 16:04:20', '2025-03-28 16:04:20'),
(1545, 344, 10.00, 5, '2025-03-28 16:06:21', '2025-03-28 16:06:21'),
(1546, 344, 15.00, 15, '2025-03-28 16:06:21', '2025-03-28 16:06:21'),
(1547, 344, 20.00, 20, '2025-03-28 16:06:21', '2025-03-28 16:06:21'),
(1548, 344, 25.00, 50, '2025-03-28 16:06:21', '2025-03-28 16:06:21'),
(1549, 345, 10.00, 5, '2025-03-28 16:06:35', '2025-03-28 16:06:35'),
(1550, 345, 15.00, 15, '2025-03-28 16:06:35', '2025-03-28 16:06:35'),
(1551, 345, 20.00, 20, '2025-03-28 16:06:35', '2025-03-28 16:06:35'),
(1552, 345, 25.00, 50, '2025-03-28 16:06:35', '2025-03-28 16:06:35'),
(1553, 346, 10.00, 5, '2025-03-28 16:08:01', '2025-03-28 16:08:01'),
(1554, 346, 15.00, 15, '2025-03-28 16:08:01', '2025-03-28 16:08:01'),
(1555, 346, 20.00, 20, '2025-03-28 16:08:01', '2025-03-28 16:08:01'),
(1556, 346, 25.00, 50, '2025-03-28 16:08:01', '2025-03-28 16:08:01'),
(1557, 347, 10.00, 5, '2025-03-28 16:09:00', '2025-03-28 16:09:00'),
(1558, 347, 15.00, 15, '2025-03-28 16:09:00', '2025-03-28 16:09:00'),
(1559, 347, 20.00, 20, '2025-03-28 16:09:00', '2025-03-28 16:09:00'),
(1560, 347, 25.00, 50, '2025-03-28 16:09:00', '2025-03-28 16:09:00'),
(1561, 348, 10.00, 5, '2025-03-28 16:09:46', '2025-03-28 16:09:46'),
(1562, 348, 15.00, 15, '2025-03-28 16:09:46', '2025-03-28 16:09:46'),
(1563, 348, 20.00, 20, '2025-03-28 16:09:46', '2025-03-28 16:09:46'),
(1564, 348, 25.00, 50, '2025-03-28 16:09:46', '2025-03-28 16:09:46'),
(1565, 349, 10.00, 5, '2025-03-28 16:11:15', '2025-03-28 16:11:15'),
(1566, 349, 15.00, 15, '2025-03-28 16:11:15', '2025-03-28 16:11:15'),
(1567, 349, 20.00, 20, '2025-03-28 16:11:15', '2025-03-28 16:11:15'),
(1568, 349, 25.00, 50, '2025-03-28 16:11:15', '2025-03-28 16:11:15'),
(1569, 350, 10.00, 5, '2025-03-28 16:11:23', '2025-03-28 16:11:23'),
(1570, 350, 15.00, 15, '2025-03-28 16:11:23', '2025-03-28 16:11:23'),
(1571, 350, 20.00, 20, '2025-03-28 16:11:23', '2025-03-28 16:11:23'),
(1572, 350, 25.00, 50, '2025-03-28 16:11:23', '2025-03-28 16:11:23'),
(1573, 351, 10.00, 5, '2025-03-28 16:12:47', '2025-03-28 16:12:47'),
(1574, 351, 15.00, 15, '2025-03-28 16:12:47', '2025-03-28 16:12:47'),
(1575, 351, 20.00, 20, '2025-03-28 16:12:47', '2025-03-28 16:12:47'),
(1576, 351, 25.00, 50, '2025-03-28 16:12:47', '2025-03-28 16:12:47'),
(1577, 352, 10.00, 5, '2025-03-28 16:13:37', '2025-03-28 16:13:37'),
(1578, 352, 15.00, 15, '2025-03-28 16:13:37', '2025-03-28 16:13:37'),
(1579, 352, 20.00, 20, '2025-03-28 16:13:37', '2025-03-28 16:13:37'),
(1580, 352, 25.00, 50, '2025-03-28 16:13:37', '2025-03-28 16:13:37'),
(1581, 353, 10.00, 5, '2025-03-28 16:16:52', '2025-03-28 16:16:52'),
(1582, 353, 15.00, 15, '2025-03-28 16:16:52', '2025-03-28 16:16:52'),
(1583, 353, 20.00, 20, '2025-03-28 16:16:52', '2025-03-28 16:16:52'),
(1584, 353, 25.00, 50, '2025-03-28 16:16:52', '2025-03-28 16:16:52'),
(1585, 354, 10.00, 5, '2025-03-28 16:20:33', '2025-03-28 16:20:33'),
(1586, 354, 15.00, 15, '2025-03-28 16:20:33', '2025-03-28 16:20:33'),
(1587, 354, 20.00, 20, '2025-03-28 16:20:33', '2025-03-28 16:20:33'),
(1588, 354, 25.00, 50, '2025-03-28 16:20:33', '2025-03-28 16:20:33'),
(1589, 355, 10.00, 5, '2025-03-28 16:23:14', '2025-03-28 16:23:14'),
(1590, 355, 15.00, 15, '2025-03-28 16:23:14', '2025-03-28 16:23:14'),
(1591, 355, 20.00, 20, '2025-03-28 16:23:14', '2025-03-28 16:23:14'),
(1592, 355, 25.00, 50, '2025-03-28 16:23:14', '2025-03-28 16:23:14'),
(1593, 356, 10.00, 5, '2025-03-28 16:25:46', '2025-03-28 16:25:46'),
(1594, 356, 15.00, 15, '2025-03-28 16:25:46', '2025-03-28 16:25:46'),
(1595, 356, 20.00, 20, '2025-03-28 16:25:46', '2025-03-28 16:25:46'),
(1596, 356, 25.00, 50, '2025-03-28 16:25:46', '2025-03-28 16:25:46'),
(1597, 357, 10.00, 5, '2025-03-28 16:28:38', '2025-03-28 16:28:38'),
(1598, 357, 15.00, 15, '2025-03-28 16:28:38', '2025-03-28 16:28:38'),
(1599, 357, 20.00, 20, '2025-03-28 16:28:38', '2025-03-28 16:28:38'),
(1600, 357, 25.00, 50, '2025-03-28 16:28:38', '2025-03-28 16:28:38'),
(1601, 358, 10.00, 5, '2025-03-28 16:31:56', '2025-03-28 16:31:56'),
(1602, 358, 15.00, 15, '2025-03-28 16:31:56', '2025-03-28 16:31:56'),
(1603, 358, 20.00, 20, '2025-03-28 16:31:56', '2025-03-28 16:31:56'),
(1604, 359, 10.00, 5, '2025-03-28 16:36:28', '2025-03-28 16:36:28'),
(1605, 359, 15.00, 15, '2025-03-28 16:36:28', '2025-03-28 16:36:28'),
(1606, 359, 20.00, 20, '2025-03-28 16:36:28', '2025-03-28 16:36:28'),
(1607, 359, 25.00, 50, '2025-03-28 16:36:28', '2025-03-28 16:36:28'),
(1608, 360, 10.00, 5, '2025-03-28 16:43:10', '2025-03-28 16:43:10'),
(1609, 360, 15.00, 15, '2025-03-28 16:43:10', '2025-03-28 16:43:10'),
(1610, 360, 20.00, 20, '2025-03-28 16:43:10', '2025-03-28 16:43:10'),
(1611, 360, 25.00, 50, '2025-03-28 16:43:10', '2025-03-28 16:43:10'),
(1612, 361, 10.00, 5, '2025-03-28 16:50:02', '2025-03-28 16:50:02'),
(1613, 361, 15.00, 15, '2025-03-28 16:50:02', '2025-03-28 16:50:02'),
(1614, 361, 20.00, 20, '2025-03-28 16:50:02', '2025-03-28 16:50:02'),
(1615, 361, 25.00, 50, '2025-03-28 16:50:02', '2025-03-28 16:50:02'),
(1616, 362, 10.00, 5, '2025-03-28 16:53:11', '2025-03-28 16:53:11'),
(1617, 362, 15.00, 15, '2025-03-28 16:53:11', '2025-03-28 16:53:11'),
(1618, 362, 20.00, 20, '2025-03-28 16:53:11', '2025-03-28 16:53:11'),
(1619, 362, 25.00, 50, '2025-03-28 16:53:11', '2025-03-28 16:53:11'),
(1620, 363, 10.00, 5, '2025-03-28 16:55:43', '2025-03-28 16:55:43'),
(1621, 363, 15.00, 15, '2025-03-28 16:55:43', '2025-03-28 16:55:43'),
(1622, 363, 20.00, 20, '2025-03-28 16:55:43', '2025-03-28 16:55:43'),
(1623, 363, 25.00, 50, '2025-03-28 16:55:43', '2025-03-28 16:55:43'),
(1624, 364, 10.00, 5, '2025-03-28 16:59:09', '2025-03-28 16:59:09'),
(1625, 364, 15.00, 15, '2025-03-28 16:59:09', '2025-03-28 16:59:09'),
(1626, 364, 20.00, 20, '2025-03-28 16:59:09', '2025-03-28 16:59:09'),
(1627, 364, 25.00, 50, '2025-03-28 16:59:09', '2025-03-28 16:59:09'),
(1628, 365, 10.00, 5, '2025-03-28 17:03:32', '2025-03-28 17:03:32'),
(1629, 365, 15.00, 15, '2025-03-28 17:03:32', '2025-03-28 17:03:32'),
(1630, 365, 20.00, 20, '2025-03-28 17:03:32', '2025-03-28 17:03:32'),
(1631, 365, 25.00, 50, '2025-03-28 17:03:32', '2025-03-28 17:03:32');

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

INSERT INTO `users` (`id`, `first_name`, `last_name`, `contact_number`, `email`, `email_verified_at`, `password`, `country`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '', '', '', 'syedsabeer@gmail.com', NULL, '$2y$10$IIwAEh0X3FceNNwGqdjduOMmYg3j5KfUNiKqTb3DZP/1GLr.Hem5y', 'CANADA', 1, NULL, '2025-01-20 01:55:00', '2025-01-20 01:55:00'),
(4, '', '', '', 'b.torres@weborka.com', NULL, '$2y$10$c534M1g.z515j6WPNOxKJeYBCotHeto523I7sZRWA0hPNWZm7VU4W', 'CANADA', 1, NULL, NULL, NULL),
(6, '', '', '', 'sean@capbeast.com', NULL, '$2y$10$wy6Z1cY9400HHf/2BFKyV.dqVXA6o.i5si9EvnSTBDmWj.jXPziBO', 'CANADA', 1, NULL, NULL, NULL),
(8, '', '', '', 'testuser@gmail.com', NULL, '$2y$10$4M6sKRlGdeX3arReQFAVg.hc.r81z4n0.ffCB2VqdkeihRUWDm3Nm', 'CANADA', 1, NULL, '2025-02-09 08:01:23', '2025-02-09 08:02:21'),
(17, 'syed', 'sabeer', '23873489', 'testsabeer@gmail.com', NULL, '$2y$10$FK1bFPt9tPI.0e9ENI8xPOLZBNvPsBnAbL/YhG86I1c6nRjx9zv0u', 'USA', 1, NULL, '2025-03-01 03:47:49', '2025-03-17 03:12:04'),
(18, 'test', 'usa', '8293829', 'testsabeer2@gmail.com', NULL, '$2y$10$AW1BVwzsTYAWg0CByLVmDeQ5tcOkflpIc4DDNcpl56uWaf5JxCc4.', 'USA', 1, NULL, '2025-03-04 09:57:35', '2025-03-04 09:57:35'),
(19, 'test', 'user', '383848', 'test22@gmail.com', NULL, '$2y$10$qx0UlYJvxtfCyXeFPnkcA.B4ZIdkbQimHnyY0YYO6NZ8KME7z.1LC', 'USA', 1, NULL, '2025-03-04 11:25:38', '2025-03-04 11:25:38'),
(20, 'kjdskjdjk', 'jkdjkdjkf', 'kjsdjkdsjkf', 'tt@gmail.com', NULL, '$2y$10$jL9zI8BDYOpRwH7Dak/VJeSyRWxSN.fNFjBxoS18JvMe2y/ZITUQC', 'USA', 1, NULL, '2025-03-04 11:31:24', '2025-03-04 11:31:24'),
(21, 'skuasfk', 'jdjjfk', '898889', 'jj@gmail.com', NULL, '$2y$10$XdK4Wi6ERgLINpoBk1bouu9aWAlI6t..riib9pEBreL/bO9E7Snl.', 'USA', 1, NULL, '2025-03-04 11:35:49', '2025-03-04 11:35:49'),
(22, 'djdfjj', 'kjdjkjkdjk', '3434544', 'ff@gmail.com', NULL, '$2y$10$3fgqkhBxjL2w6RI6PJsMnOI5mcJ5WJdmmf0G8hfrAIzFVbeT3HSQK', 'USA', 1, NULL, '2025-03-04 11:36:57', '2025-03-04 11:36:57'),
(23, 'skhjsdk', 'kjhkdjfh', '3848394', 'djsfhdkf@dssfdf.com', NULL, '$2y$10$HQVT64q4gS5.vjxY.DcF6.tc1rpZmsntpW7/SdDFxZ272.XD6/89G', 'USA', 1, NULL, '2025-03-05 02:01:05', '2025-03-05 02:01:05'),
(25, 'sdsjksd', 'kjdsjfjdk', '88889', 'dfddfs@sfdsfd.com', NULL, '$2y$10$k47ZcyxFK62d433U0HTyr.yaJF4QdajlWLRyL76cL0rCxho2mFDfS', 'USA', 1, NULL, '2025-03-16 04:46:27', '2025-03-16 04:46:27'),
(26, 'dsfdf', 'sadsaf', '2132', 'dfdsf@dfdsfsd.com', NULL, '$2y$10$zP2MnOdO133J3Ci6R9Q83e3nadQMqSf6nJme.cIb5r4EFamMJ1TOW', 'USA', 1, NULL, '2025-03-16 04:48:49', '2025-03-16 04:48:49'),
(27, 'sdsds', 'asdsa', '3234334', 'dfdsf@dsfds.com', NULL, '$2y$10$YtMaG6KlucAwrBsFBGuWL.f7N.5NwZ655bM604YCRJtBDzKT5SC4C', 'USA', 1, NULL, '2025-03-16 05:00:37', '2025-03-16 05:00:37'),
(28, 'ddfds', 'sdsf', '3344', 'sddsf@wdsdf.om', NULL, '$2y$10$lmIelbflK96KbosEbYzyuuU5C2Ozb.XhVgZbppCz8hd0lht.Mp8lS', 'USA', 1, NULL, '2025-03-16 05:02:44', '2025-03-16 05:02:44'),
(29, 'syed', 'sabeer', '34324324', 'ssdfdsf@dsdfsdf.com', NULL, '$2y$10$Cir8BNhK9i1aTWc1WYkp1.uZHaoJzzJk772K8zHpEaVcXH35GXjQi', 'USA', 1, NULL, '2025-03-17 03:14:49', '2025-03-17 03:14:49'),
(32, 'ewre', 'dfdf', '33939', 'fdsfdd@dsdsfd.com', NULL, '$2y$10$TWViexeTub0hg0gBXAAsyeLki03rQowCPv7.urv9u5YgdXdkp5uYC', 'USA', 1, NULL, '2025-03-18 03:34:42', '2025-03-18 03:34:42'),
(33, 'dfjdj', 'jkdfjkjk', '2330300', 'dfdf@ffdf.com', NULL, '$2y$10$BSxbT/p7XAHNACU26MENOeRxcWf4MWPW/W7sFzAr2hr6sYlCsujUO', 'USA', 1, NULL, '2025-03-18 03:37:18', '2025-03-18 03:37:18');

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
  ADD KEY `cart_color_id_foreign` (`color_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
-- Indexes for table `mlb`
--
ALTER TABLE `mlb`
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
  ADD KEY `brand_fk` (`brand_id`),
  ADD KEY `mlb_fk` (`mlb_id`);

--
-- Indexes for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_categories_product_id_foreign` (`product_id`),
  ADD KEY `product_categories_category_id_foreign` (`category_id`);

--
-- Indexes for table `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_color_product_id_foreign` (`product_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=209;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
-- AUTO_INCREMENT for table `mlb`
--
ALTER TABLE `mlb`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=366;

--
-- AUTO_INCREMENT for table `product_categories`
--
ALTER TABLE `product_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=602;

--
-- AUTO_INCREMENT for table `product_printing`
--
ALTER TABLE `product_printing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product_seo`
--
ALTER TABLE `product_seo`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=343;

--
-- AUTO_INCREMENT for table `product_volume_discount`
--
ALTER TABLE `product_volume_discount`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1632;

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
  ADD CONSTRAINT `cart_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_discount` FOREIGN KEY (`discount_id`) REFERENCES `discount_coupon` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
  ADD CONSTRAINT `mlb_fk` FOREIGN KEY (`mlb_id`) REFERENCES `mlb` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `product_categories`
--
ALTER TABLE `product_categories`
  ADD CONSTRAINT `product_categories_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `product_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

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
