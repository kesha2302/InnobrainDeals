-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2024 at 05:34 AM
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
-- Database: `innobraindeals`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `aboutus_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description1` varchar(800) NOT NULL,
  `description2` varchar(800) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`aboutus_id`, `title`, `description1`, `description2`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'InnoBrain Deals', 'InnoBrain Deals is a leading MSME registered IT company that specializes in cutting-edge software solutions and technology consulting services. With a focus on innovation, creativity and reliability, InnoBrain Deals has established itself as a trusted partner for businesses seeking to leverage technology for competitive advantage. The company is passionate about delivering exceptional results and exceeding client expectations.', 'At InnoBrain Deals, the range of services we offered spans across multiple domains including software development, mobile app development, web development, data analytics and more. The company is known for its ability to understand the unique needs of each client and tailor solutions that align with their business goals and objectives.', '2024-12-06 02:52:34', '2024-12-17 06:24:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `activatedlink`
--

CREATE TABLE `activatedlink` (
  `activated_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `activatedproductid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activatedlink`
--

INSERT INTO `activatedlink` (`activated_id`, `order_id`, `product_ids`, `activatedproductid`, `created_at`, `updated_at`) VALUES
(1, 'ORD730162', '1,7', '1', '2024-12-11 23:14:42', '2024-12-11 23:14:42'),
(2, 'ORD908111', '2', '2', '2024-12-17 22:46:33', '2024-12-17 22:46:33');

-- --------------------------------------------------------

--
-- Table structure for table `adminlogindetails`
--

CREATE TABLE `adminlogindetails` (
  `admin_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `adminlogindetails`
--

INSERT INTO `adminlogindetails` (`admin_id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'kesha', 'keshapatel6542@gmail.com', '$2y$12$1MSBg3ii4gORLEkXRXmdHexVV5d21vxNEhnGPgM3.4ZRxkJ379uKe', '2024-12-08 23:39:36', '2024-12-08 23:39:36'),
(2, 'kinjal', '89kinjalshah@gmail.com', '$2y$12$uUQ7nQZ4tmqtpb0qOTz/ZenS8WK71vtvMojl6xYFhjfjd2Reootw6', '2024-12-08 23:50:16', '2024-12-08 23:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `banner_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`banner_id`, `title`, `description`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, NULL, '1733467794img.jpg', '2024-12-06 01:19:54', '2024-12-17 06:24:41', '2024-12-17 06:24:41'),
(2, NULL, NULL, '1733467809img.jpg', '2024-12-06 01:20:09', '2024-12-09 03:03:38', '2024-12-09 03:03:38'),
(3, NULL, NULL, '1733468431img.jpg', '2024-12-06 01:25:32', '2024-12-09 03:03:39', '2024-12-09 03:03:39'),
(4, 'Watch premium OTT apps', 'Premium OTT  (Over-The-Top) apps are platforms that deliver high-quality digital video content directly to users over the internet without the need for traditional cable or satellite services. These apps typically offer subscription-based services for exclusive, ad-free access to movies, TV shows, original series, documentaries, and live events.', '1733733173img.png', '2024-12-09 03:02:53', '2024-12-17 06:24:25', NULL),
(5, 'AntiVirus', 'An antivirus is a type of software designed to detect, prevent, and remove malicious software (malware) from computer systems, networks, and devices. Malware includes viruses, worms, trojans, ransomware, spyware, and adware. Antivirus software plays a critical role in maintaining cybersecurity by safeguarding systems from known and emerging threats.', '1733733193img.jpg', '2024-12-09 03:03:13', '2024-12-09 03:03:13', NULL),
(6, 'LinkedIn Premium subscriptions', 'LinkedIn Premium subscriptions offer enhanced features tailored for job seekers and small businesses looking to advance their career or grow their business.', '1733733214img.jpg', '2024-12-09 03:03:34', '2024-12-09 03:03:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cartsession`
--

CREATE TABLE `cartsession` (
  `cartsession_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `discount_price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Anti - Virus', '2024-12-06 04:51:50', '2024-12-06 04:53:26', NULL),
(2, 'LinkedIn', '2024-12-06 04:53:34', '2024-12-06 04:53:34', NULL),
(3, 'OTT Platforms', '2024-12-06 04:53:45', '2024-12-06 04:53:45', NULL),
(4, 'VI Packages', '2024-12-06 04:53:57', '2024-12-17 06:25:36', '2024-12-17 06:25:36'),
(5, 'Jio Package', '2024-12-06 04:54:04', '2024-12-08 23:11:27', '2024-12-08 23:11:27'),
(6, 'Mobile Recharge Package', '2024-12-08 23:11:59', '2024-12-08 23:11:59', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `checkoutdetails`
--

CREATE TABLE `checkoutdetails` (
  `checkout_id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `checkoutdetails`
--

INSERT INTO `checkoutdetails` (`checkout_id`, `customer_id`, `order_id`, `name`, `email`, `contact`, `payment_id`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 1, 'ORD237833', 'Kesha Patel', 'keshapatel6542@gmail.com', 9737198626, 'pay_PVNadyU7T9IkWe', 199, '2024-12-10 01:16:44', '2024-12-10 01:16:44'),
(2, 1, 'ORD730162', 'Kesha Patel', 'keshapatel2302@gmail.com', 9737198626, 'pay_PVQD69RJ4zATU8', 1399, '2024-12-10 03:50:33', '2024-12-10 03:50:33'),
(3, 1, 'ORD908111', 'Kesha Avanishbhai Patel', 'keshapatel2302@gmail.com', 9737198626, 'pay_PWYXcsnHZjtj8Q', 130, '2024-12-13 00:38:30', '2024-12-13 00:38:30'),
(4, 1, 'ORD926036', 'Avanish Patel', 'keshapatel2302@gmail.com', 9737198626, 'pay_PYV8aQKf888bri', 130, '2024-12-17 22:36:48', '2024-12-17 22:36:48');

-- --------------------------------------------------------

--
-- Table structure for table `contactus`
--

CREATE TABLE `contactus` (
  `contactus_id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact1` bigint(20) NOT NULL,
  `contact2` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactus`
--

INSERT INTO `contactus` (`contactus_id`, `email`, `contact1`, `contact2`, `created_at`, `updated_at`) VALUES
(1, 'inquiry@innobraintechnologies.in', 7990523663, 9998202023, '2024-12-06 04:44:47', '2024-12-17 06:25:11');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `pincode` int(11) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `fullname`, `email`, `password`, `address`, `state`, `city`, `pincode`, `contact`, `created_at`, `updated_at`) VALUES
(1, 'Kesha Patel', 'keshapatel6542@gmail.com', '$2y$12$PpvPA3HH7ad7Nj6GDGXobu46P.us2Swco2I0lMZFQddnUSoql0ZJO', '10 Raj park', 'Gujarat', 'Vadodara', 388001, 9737198626, '2024-12-10 00:28:25', '2024-12-17 06:15:48');

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
-- Table structure for table `guestactivatedlink`
--

CREATE TABLE `guestactivatedlink` (
  `guestactivated_id` bigint(20) UNSIGNED NOT NULL,
  `guestorder_id` varchar(255) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `activatedproductid` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guestactivatedlink`
--

INSERT INTO `guestactivatedlink` (`guestactivated_id`, `guestorder_id`, `product_ids`, `activatedproductid`, `created_at`, `updated_at`) VALUES
(1, 'ORD207996', '2', '2', '2024-12-12 04:22:28', '2024-12-12 04:22:28'),
(2, 'ORD487098', '1', '1', '2024-12-17 22:49:03', '2024-12-17 22:49:03'),
(3, 'ORD214474', '7,2', '2', '2024-12-17 22:50:08', '2024-12-17 22:50:08');

-- --------------------------------------------------------

--
-- Table structure for table `guest_orders`
--

CREATE TABLE `guest_orders` (
  `gid` bigint(20) UNSIGNED NOT NULL,
  `guestorder_id` varchar(255) NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_orders`
--

INSERT INTO `guest_orders` (`gid`, `guestorder_id`, `product_ids`, `product_name`, `price`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 'ORD207996', '2', 'Amazon Prime', '130', 130, '2024-12-09 23:38:38', '2024-12-09 23:38:38'),
(2, 'ORD756717', '7,2', 'LinkedIn Career Plan,Amazon Prime', '1419,130', 1330, '2024-12-12 23:41:49', '2024-12-12 23:41:49'),
(3, 'ORD214474', '7,2', 'LinkedIn Career Plan,Amazon Prime', '1419,130', 1330, '2024-12-12 23:47:00', '2024-12-12 23:47:00'),
(4, 'ORD937643', '7,2', 'LinkedIn Career Plan,Amazon Prime', '1419,130', 1330, '2024-12-12 23:50:55', '2024-12-12 23:50:55'),
(5, 'ORD373911', '2', 'Amazon Prime', '130', 130, '2024-12-16 00:16:44', '2024-12-16 00:16:44'),
(6, 'ORD487098', '1', 'Netflix', '199', 199, '2024-12-17 22:38:54', '2024-12-17 22:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `guest_user`
--

CREATE TABLE `guest_user` (
  `guest_id` bigint(20) UNSIGNED NOT NULL,
  `guestorder_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guest_user`
--

INSERT INTO `guest_user` (`guest_id`, `guestorder_id`, `name`, `email`, `contact`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, 'ORD207996', 'Kesha Patel', 'keshapatel2302@gmail.com', 9737198626, 'pay_PVLv1WnhuEqHN8', '2024-12-09 23:38:38', '2024-12-09 23:38:38'),
(2, 'ORD756717', 'Trupti Patel', 'keshapatel2302@gmail.com', 9737198626, 'pay_PWXZifOQ60C8Hl', '2024-12-12 23:41:48', '2024-12-12 23:41:48'),
(3, 'ORD214474', 'Trupti Patel', 'keshapatel2302@gmail.com', 9737198626, 'pay_PWXfEsbvWI8y8F', '2024-12-12 23:47:00', '2024-12-12 23:47:00'),
(4, 'ORD937643', 'Yashvi Patel', 'keshapatel2302@gmail.com', 9737198626, 'pay_PWXjNPTIgG6m8E', '2024-12-12 23:50:55', '2024-12-12 23:50:55'),
(5, 'ORD373911', 'Kinjal Shah', 'keshapatel6542@gmail.com', 9737198626, 'pay_PXjltSdtDFjeW3', '2024-12-16 00:16:44', '2024-12-16 00:16:44'),
(6, 'ORD487098', 'Gayatri Patel', 'keshapatel2302@gmail.com', 987654321, 'pay_PYVAw9q5ndgqta', '2024-12-17 22:38:54', '2024-12-17 22:38:54');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_12_06_044716_create_customers_table', 2),
(5, '2024_12_06_044728_create_banner_table', 2),
(6, '2024_12_06_044743_create_aboutus_table', 2),
(7, '2024_12_06_044757_create_contactus_table', 2),
(8, '2024_12_06_044821_create_category_table', 2),
(9, '2024_12_06_050751_create_products_table', 3),
(10, '2024_12_06_053004_create_orders_table', 4),
(11, '2024_12_06_053146_create_checkoutdetails_table', 5),
(12, '2024_12_06_053637_create_guest_user_table', 6),
(13, '2024_12_06_055256_create_guest_orders_table', 6),
(14, '2024_12_06_104315_add_delete_at_to_products_table', 7),
(15, '2024_12_09_043330_create_adminlogindetails_table', 8),
(16, '2024_12_10_044931_create_resepassword_token_table', 9),
(17, '2024_12_10_051516_create_cartsession_token_table', 10),
(18, '2024_12_12_040747_create_activatedlink_table', 11),
(19, '2024_12_12_093100_create_guestactivatedlink_table', 12),
(20, '2024_12_16_060502_create_popularproduct_table', 13);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `product_ids` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `total_cost` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `order_id`, `customer_id`, `product_ids`, `product_name`, `price`, `total_cost`, `created_at`, `updated_at`) VALUES
(1, 'ORD237833', 1, '1', 'Netflix', '199', 199, '2024-12-10 01:16:43', '2024-12-10 01:16:43'),
(2, 'ORD730162', 1, '1,7', 'Netflix,LinkedIn Career Plan', '199,1419', 1399, '2024-12-10 03:50:33', '2024-12-10 03:50:33'),
(3, 'ORD908111', 1, '2', 'Amazon Prime', '130', 130, '2024-12-13 00:38:30', '2024-12-13 00:38:30'),
(4, 'ORD926036', 1, '2', 'Amazon Prime', '130', 130, '2024-12-17 22:36:48', '2024-12-17 22:36:48');

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
-- Table structure for table `popularproduct`
--

CREATE TABLE `popularproduct` (
  `popularproduct_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `popularproduct`
--

INSERT INTO `popularproduct` (`popularproduct_id`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-12-16 01:29:10', '2024-12-16 01:29:10'),
(4, 7, '2024-12-16 04:07:30', '2024-12-16 04:07:30'),
(7, 3, '2024-12-16 04:26:24', '2024-12-16 04:26:24'),
(8, 9, '2024-12-16 04:29:48', '2024-12-16 04:29:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `discount_price` int(11) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`, `discount_price`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 3, 'Netflix', 'Mobile Plan /month', 199, 1, '1734343019img.jpg', '2024-12-06 05:26:02', '2024-12-16 04:26:59', NULL),
(2, 3, 'Amazon Prime', 'Plane for 1 month', 130, 1, '1734328512img.png', '2024-12-06 05:56:47', '2024-12-16 00:25:12', NULL),
(3, 1, 'Norton', '3 device price', 2599, 2000, '1733722013img.jpg', '2024-12-08 23:56:53', '2024-12-16 03:53:12', NULL),
(4, 1, 'Bitdefender', '1 year for 1 device', 2542, 2000, '1734328352img.png', '2024-12-09 00:05:46', '2024-12-16 00:22:32', NULL),
(5, 6, 'VI', '1 year package with 1.5 GB data', 3499, 3000, '1733722712img.png', '2024-12-09 00:08:32', '2024-12-09 00:08:32', NULL),
(6, 6, 'Jio Package', '1 year package with 2.5 GB data', 3599, 3200, '1733722773img.png', '2024-12-09 00:09:33', '2024-12-09 00:09:33', NULL),
(7, 2, 'LinkedIn Career Plan', 'Career Plan per month', 1419, 1200, '1733722937img.jpg', '2024-12-09 00:12:17', '2024-12-09 00:12:17', NULL),
(8, 2, 'LinkedIn Business Plan', 'Business Plan per month', 1699, 1400, '1733722980img.jpg', '2024-12-09 00:13:00', '2024-12-17 22:27:56', NULL),
(9, 3, 'Zee5', 'This is one month plan', 199, 1, '1734343174img.png', '2024-12-16 04:29:34', '2024-12-16 04:30:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `resepassword_token`
--

CREATE TABLE `resepassword_token` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('jvFgd42v0FyYkMoHhK5N9CMjMgZU6LrWrYqjBQZ2', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiVnBiZlZLbzV1YVV1SDJmVE93TUFxS2hoaWVXdWkwcXVTQUVoVVAyYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjg6ImFkbWluX2lkIjtpOjE7fQ==', 1734496365);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`aboutus_id`);

--
-- Indexes for table `activatedlink`
--
ALTER TABLE `activatedlink`
  ADD PRIMARY KEY (`activated_id`),
  ADD KEY `activatedlink_order_id_foreign` (`order_id`);

--
-- Indexes for table `adminlogindetails`
--
ALTER TABLE `adminlogindetails`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cartsession`
--
ALTER TABLE `cartsession`
  ADD PRIMARY KEY (`cartsession_id`),
  ADD KEY `cartsession_token_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `checkoutdetails`
--
ALTER TABLE `checkoutdetails`
  ADD PRIMARY KEY (`checkout_id`),
  ADD KEY `checkoutdetails_customer_id_foreign` (`customer_id`),
  ADD KEY `checkoutdetails_order_id_foreign` (`order_id`);

--
-- Indexes for table `contactus`
--
ALTER TABLE `contactus`
  ADD PRIMARY KEY (`contactus_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guestactivatedlink`
--
ALTER TABLE `guestactivatedlink`
  ADD PRIMARY KEY (`guestactivated_id`);

--
-- Indexes for table `guest_orders`
--
ALTER TABLE `guest_orders`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `guest_user`
--
ALTER TABLE `guest_user`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
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
  ADD KEY `orders_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `popularproduct`
--
ALTER TABLE `popularproduct`
  ADD PRIMARY KEY (`popularproduct_id`),
  ADD KEY `popularproduct_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indexes for table `resepassword_token`
--
ALTER TABLE `resepassword_token`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `aboutus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `activatedlink`
--
ALTER TABLE `activatedlink`
  MODIFY `activated_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminlogindetails`
--
ALTER TABLE `adminlogindetails`
  MODIFY `admin_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `banner_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `cartsession`
--
ALTER TABLE `cartsession`
  MODIFY `cartsession_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `checkoutdetails`
--
ALTER TABLE `checkoutdetails`
  MODIFY `checkout_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactus`
--
ALTER TABLE `contactus`
  MODIFY `contactus_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guestactivatedlink`
--
ALTER TABLE `guestactivatedlink`
  MODIFY `guestactivated_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `guest_orders`
--
ALTER TABLE `guest_orders`
  MODIFY `gid` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `guest_user`
--
ALTER TABLE `guest_user`
  MODIFY `guest_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `popularproduct`
--
ALTER TABLE `popularproduct`
  MODIFY `popularproduct_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resepassword_token`
--
ALTER TABLE `resepassword_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activatedlink`
--
ALTER TABLE `activatedlink`
  ADD CONSTRAINT `activatedlink_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cartsession`
--
ALTER TABLE `cartsession`
  ADD CONSTRAINT `cartsession_token_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `checkoutdetails`
--
ALTER TABLE `checkoutdetails`
  ADD CONSTRAINT `checkoutdetails_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`),
  ADD CONSTRAINT `checkoutdetails_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`customer_id`);

--
-- Constraints for table `popularproduct`
--
ALTER TABLE `popularproduct`
  ADD CONSTRAINT `popularproduct_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
