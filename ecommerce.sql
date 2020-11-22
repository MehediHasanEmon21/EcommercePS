-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 11:57 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `status`, `slug`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Bangladeshi', 1, 'bangladeshi', 8, 8, '2020-06-28 23:21:17', '2020-06-28 23:21:17'),
(2, 'Malaysian', 1, 'malaysian', 8, 8, '2020-06-28 23:21:27', '2020-06-28 23:21:27');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `slug`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Chair', 1, 'chair', 8, 8, '2020-06-28 23:01:48', '2020-06-28 23:01:48'),
(6, 'Table', 1, 'table', 8, 8, '2020-06-28 23:01:55', '2020-06-28 23:01:55'),
(7, 'Workstation', 1, 'workstation', 8, 8, '2020-07-07 12:25:49', '2020-07-07 12:25:49'),
(8, 'Cabinet', 1, 'cabinet', 8, 8, '2020-07-07 12:26:11', '2020-07-07 12:26:11'),
(9, 'Drawer', 1, 'drawer', 8, 8, '2020-07-07 12:26:29', '2020-07-07 12:26:29'),
(10, 'Sofa', 1, 'sofa', 8, 8, '2020-07-08 12:43:04', '2020-07-08 12:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Red', 8, 8, '2020-06-28 23:56:29', '2020-06-28 23:56:29'),
(2, 'Black', 8, 8, '2020-06-28 23:56:38', '2020-06-28 23:56:38'),
(3, 'White', 8, 8, '2020-06-28 23:56:46', '2020-06-28 23:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_05_01_211624_add_column_to_users_table', 2),
(8, '2020_05_03_173502_create_categories_table', 5),
(20, '2020_06_29_050842_create_brands_table', 6),
(21, '2020_06_29_054001_create_colors_table', 7),
(22, '2020_06_29_054015_create_sizes_table', 7),
(23, '2020_06_29_213036_create_products_table', 8),
(24, '2020_06_29_213050_create_product_sizes_table', 8),
(25, '2020_06_29_213108_create_product_colors_table', 8),
(26, '2020_06_29_213122_create_product_sub_images_table', 8),
(27, '2020_07_18_072216_create_shippings_table', 9),
(28, '2020_07_18_072229_create_payments_table', 9),
(29, '2020_07_18_072241_create_orders_table', 9),
(30, '2020_07_18_072250_create_order_details_table', 9);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_no` int(11) NOT NULL,
  `order_total` double NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `shipping_id`, `user_id`, `payment_id`, `order_no`, `order_total`, `status`, `created_at`, `updated_at`) VALUES
(5, 5, 11, 7, 1, 5012, 1, '2020-07-18 13:01:28', '2020-07-18 13:01:28'),
(6, 6, 11, 8, 2, 6014, 1, '2020-07-19 11:05:24', '2020-07-19 11:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `color_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(5, 4, 24, 1, 7, 2, '2020-07-18 12:54:23', '2020-07-18 12:54:23'),
(6, 4, 20, 1, 7, 2, '2020-07-18 12:54:23', '2020-07-18 12:54:23'),
(7, 5, 19, 1, 4, 2, '2020-07-18 13:01:28', '2020-07-18 13:01:28'),
(8, 5, 18, 1, 7, 2, '2020-07-18 13:01:28', '2020-07-18 13:01:28'),
(9, 6, 22, 1, 7, 2, '2020-07-19 11:05:24', '2020-07-19 11:05:24'),
(10, 6, 21, 1, 7, 2, '2020-07-19 11:05:24', '2020-07-19 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `payment_method`, `transaction_id`, `created_at`, `updated_at`) VALUES
(7, 'bkash', 'qewf232ewd', '2020-07-18 13:01:28', '2020-07-18 13:01:28'),
(8, 'handcash', NULL, '2020-07-19 11:05:24', '2020-07-19 11:05:24');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `price` double NOT NULL,
  `short_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `long_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `category_id`, `brand_id`, `price`, `short_desc`, `long_desc`, `image`, `slug`, `created_at`, `updated_at`) VALUES
(14, 'Woek Station Table', 7, 1, 1000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'public/assets/backend/images/product/1Q4rH2YCMc.jpg', 'woek-station-table', '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(15, 'Black Chair', 5, 2, 303, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/JPF1Zb4FeX.jpg', 'black-chair', '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(16, 'Gorgious Sofa', 10, 1, 2000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/Fb8kNxoVND.jpg', 'gorgious-sofa', '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(17, 'New Sofa', 10, 2, 1000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/RJqbRZ9884.webp', 'new-sofa', '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(18, 'New WS Table', 7, 1, 2004, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/KeSoAN76yr.jpg', 'new-ws-table', '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(19, 'Salon Chair', 5, 1, 502, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/957so44jZy.jpg', 'salon-chair', '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(20, 'New Cabinet', 8, 1, 2000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/PgeqaOhcos.jpg', 'new-cabinet', '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(21, 'Garden Chair', 5, 2, 2005, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/OdzcKzx7NF.jpg', 'garden-chair', '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(22, 'New Almiras Cabinet', 8, 1, 1002, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/0z2MMyPAbv.webp', 'new-almiras-cabinet', '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(23, 'New Drawer', 9, 1, 2005, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/4HrBFlni4k.jpg', 'new-drawer', '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(24, 'Book Shelves', 9, 1, 502, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/W1aMx9zpuc.jpg', 'book-shelves', '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(25, 'New Arrival Table', 6, 2, 1000, 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not', 'public/assets/backend/images/product/XrD2ItLGOI.webp', 'new-arrival-table', '2020-07-08 12:54:22', '2020-07-08 12:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_colors`
--

CREATE TABLE `product_colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_colors`
--

INSERT INTO `product_colors` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(18, 14, 1, '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(19, 14, 2, '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(20, 15, 1, '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(21, 15, 2, '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(22, 16, 1, '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(23, 16, 2, '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(24, 16, 3, '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(25, 17, 1, '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(26, 17, 2, '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(27, 18, 1, '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(28, 18, 2, '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(29, 19, 1, '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(30, 19, 2, '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(31, 20, 1, '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(32, 20, 2, '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(33, 21, 1, '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(34, 21, 2, '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(35, 22, 1, '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(36, 22, 2, '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(37, 23, 1, '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(38, 23, 2, '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(39, 24, 1, '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(40, 24, 3, '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(41, 25, 1, '2020-07-08 12:54:22', '2020-07-08 12:54:22'),
(42, 25, 2, '2020-07-08 12:54:22', '2020-07-08 12:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_sizes`
--

CREATE TABLE `product_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sizes`
--

INSERT INTO `product_sizes` (`id`, `product_id`, `size_id`, `created_at`, `updated_at`) VALUES
(18, 14, 7, '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(19, 14, 8, '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(20, 15, 7, '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(21, 15, 8, '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(22, 16, 5, '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(23, 16, 6, '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(24, 17, 4, '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(25, 17, 5, '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(26, 18, 7, '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(27, 18, 8, '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(28, 19, 4, '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(29, 19, 5, '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(30, 20, 7, '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(31, 20, 8, '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(32, 21, 7, '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(33, 21, 8, '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(34, 22, 7, '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(35, 22, 8, '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(36, 23, 5, '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(37, 23, 6, '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(38, 24, 7, '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(39, 24, 8, '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(40, 25, 8, '2020-07-08 12:54:22', '2020-07-08 12:54:22'),
(41, 25, 9, '2020-07-08 12:54:22', '2020-07-08 12:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `product_sub_images`
--

CREATE TABLE `product_sub_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `sub_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_sub_images`
--

INSERT INTO `product_sub_images` (`id`, `product_id`, `sub_image`, `created_at`, `updated_at`) VALUES
(25, 14, 'public/assets/backend/images/product/product_subimage/xXl9Qw7wWu.jpg', '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(26, 14, 'public/assets/backend/images/product/product_subimage/q7F5froo0Y.jpg', '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(27, 14, 'public/assets/backend/images/product/product_subimage/bgQN5Pi6ln.jpg', '2020-07-08 12:41:21', '2020-07-08 12:41:21'),
(28, 15, 'public/assets/backend/images/product/product_subimage/J3MWp60ITg.jpg', '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(29, 15, 'public/assets/backend/images/product/product_subimage/zHnXOOHV4c.jpg', '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(30, 15, 'public/assets/backend/images/product/product_subimage/AAVxOFvqtf.jpg', '2020-07-08 12:42:41', '2020-07-08 12:42:41'),
(31, 16, 'public/assets/backend/images/product/product_subimage/hB3wRYHwe4.webp', '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(32, 16, 'public/assets/backend/images/product/product_subimage/pp4rbAoC1v.jpg', '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(33, 16, 'public/assets/backend/images/product/product_subimage/WdZfdFM22I.jpg', '2020-07-08 12:44:25', '2020-07-08 12:44:25'),
(34, 17, 'public/assets/backend/images/product/product_subimage/SlHb2GUHwn.webp', '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(35, 17, 'public/assets/backend/images/product/product_subimage/XjC6bL6BUe.jpg', '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(36, 17, 'public/assets/backend/images/product/product_subimage/ipMc2tsCzk.jpg', '2020-07-08 12:45:18', '2020-07-08 12:45:18'),
(37, 18, 'public/assets/backend/images/product/product_subimage/BURaltB50I.jpg', '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(38, 18, 'public/assets/backend/images/product/product_subimage/F1knOeAWT8.jpg', '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(39, 18, 'public/assets/backend/images/product/product_subimage/rL7r9zYDWY.jpg', '2020-07-08 12:46:15', '2020-07-08 12:46:15'),
(40, 19, 'public/assets/backend/images/product/product_subimage/Nh793VihMa.jpg', '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(41, 19, 'public/assets/backend/images/product/product_subimage/XepLLTEwqX.jpg', '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(42, 19, 'public/assets/backend/images/product/product_subimage/eiXINpWsMb.jpg', '2020-07-08 12:47:10', '2020-07-08 12:47:10'),
(43, 20, 'public/assets/backend/images/product/product_subimage/RrSFSVQyoP.jpg', '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(44, 20, 'public/assets/backend/images/product/product_subimage/dlxu6fR18M.jpg', '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(45, 20, 'public/assets/backend/images/product/product_subimage/ZaYc4OucK9.jpg', '2020-07-08 12:48:08', '2020-07-08 12:48:08'),
(46, 21, 'public/assets/backend/images/product/product_subimage/9e6qLwxTOi.jpg', '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(47, 21, 'public/assets/backend/images/product/product_subimage/6kbfoNFb5U.jpg', '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(48, 21, 'public/assets/backend/images/product/product_subimage/lLq42CHINm.jpg', '2020-07-08 12:49:06', '2020-07-08 12:49:06'),
(49, 22, 'public/assets/backend/images/product/product_subimage/iDh4FXZzlu.jpg', '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(50, 22, 'public/assets/backend/images/product/product_subimage/NXz1vVBJfi.jpg', '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(51, 22, 'public/assets/backend/images/product/product_subimage/p050wsQlMw.webp', '2020-07-08 12:50:02', '2020-07-08 12:50:02'),
(52, 23, 'public/assets/backend/images/product/product_subimage/83JvoJePfA.jpg', '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(53, 23, 'public/assets/backend/images/product/product_subimage/50QaCrcTIC.jpg', '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(54, 23, 'public/assets/backend/images/product/product_subimage/OMilc9jUpH.jpg', '2020-07-08 12:51:14', '2020-07-08 12:51:14'),
(55, 24, 'public/assets/backend/images/product/product_subimage/HeqpTHLNIw.jpg', '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(56, 24, 'public/assets/backend/images/product/product_subimage/5dU43LKj99.jpg', '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(57, 24, 'public/assets/backend/images/product/product_subimage/GbwM0ZzyWq.jpg', '2020-07-08 12:52:43', '2020-07-08 12:52:43'),
(58, 25, 'public/assets/backend/images/product/product_subimage/fbTYni7x16.jpg', '2020-07-08 12:54:22', '2020-07-08 12:54:22'),
(59, 25, 'public/assets/backend/images/product/product_subimage/PpW8DFc8HX.jpg', '2020-07-08 12:54:22', '2020-07-08 12:54:22'),
(60, 25, 'public/assets/backend/images/product/product_subimage/kgrMKE1S6Q.webp', '2020-07-08 12:54:22', '2020-07-08 12:54:22');

-- --------------------------------------------------------

--
-- Table structure for table `shippings`
--

CREATE TABLE `shippings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippings`
--

INSERT INTO `shippings` (`id`, `user_id`, `name`, `email`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(5, 11, 'Samim', 'samim@gmail.com', '01767765524', 'Dhaka', '2020-07-18 12:54:08', '2020-07-18 12:54:08'),
(6, 11, 'Shipon', 'shipon@gmail.com', '01675654563', 'Dhaka, Narayanganj', '2020-07-19 11:05:10', '2020-07-19 11:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `sizes`
--

CREATE TABLE `sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(4, 'XL', 8, 8, '2020-07-01 01:46:18', '2020-07-01 01:46:18'),
(5, 'XXL', 8, 8, '2020-07-01 01:46:25', '2020-07-01 01:46:25'),
(6, 'XXXL', 8, 8, '2020-07-01 01:46:40', '2020-07-01 01:46:40'),
(7, '81.5 x 39.5 x 101.6 cm', 8, 8, '2020-07-08 12:38:29', '2020-07-08 12:38:29'),
(8, '81.6 x 49.5 x 101.7 cm', 8, 8, '2020-07-08 12:38:51', '2020-07-08 12:38:51'),
(9, '1024x1024 cm', 8, 8, '2020-07-08 12:39:16', '2020-07-08 12:39:16'),
(10, '500x500 cm', 8, 8, '2020-07-08 12:39:26', '2020-07-08 12:39:26');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `userType` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile`, `address`, `gender`, `image`, `status`, `remember_token`, `created_at`, `updated_at`, `userType`, `code`) VALUES
(8, 'Emon', 'emon@gmail.com', NULL, '$2y$10$CWPJFZHLqPAN57an3Wy.oez6LQWqrNPk4/Laqw95SKm1x0MePInhW', '01783354905', NULL, 'Male', 'public/assets/backend/images/profile/ZqvQVzk26B.jpg', 1, NULL, '2020-06-21 20:21:31', '2020-06-21 20:34:22', 'admin', NULL),
(11, 'Customer Name u', 'customer@gmail.com', NULL, '$2y$10$CWPJFZHLqPAN57an3Wy.oez6LQWqrNPk4/Laqw95SKm1x0MePInhW', '01565636826', 'Dhaka, Narayanganj', 'Female', 'public/assets/frontend/images/customer/J5w4XGhkmI.jpg', 1, 'yOFhZQpMNRXypigMKL3mkhm0mCKGImXGPDP3T9fmSisLrPKYzxfMyw9NmlAA', '2020-07-15 13:33:42', '2020-07-18 00:37:43', 'customer', '835');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_colors`
--
ALTER TABLE `product_colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sizes`
--
ALTER TABLE `product_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippings`
--
ALTER TABLE `shippings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sizes`
--
ALTER TABLE `sizes`
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
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `product_colors`
--
ALTER TABLE `product_colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `product_sizes`
--
ALTER TABLE `product_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `product_sub_images`
--
ALTER TABLE `product_sub_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `shippings`
--
ALTER TABLE `shippings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
