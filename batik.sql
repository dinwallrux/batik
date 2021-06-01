-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: host.docker.internal
-- Generation Time: Jun 01, 2021 at 03:31 PM
-- Server version: 5.7.31
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `batik`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat`
--

CREATE TABLE `alat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alat`
--

INSERT INTO `alat` (`id`, `nama`, `gambar`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Lilin', '/storage/1616860109.jpg', 'Ini adalah lilin', '2021-03-27 15:39:14', '2021-03-27 15:48:29'),
(2, 'Cetakan', '/storage/1616859609.jpg', 'Ini adalah cetakan', '2021-03-27 15:40:09', '2021-03-27 15:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Kain Rayon', '2021-02-16 14:07:53', '2021-02-16 14:07:53'),
(2, 'Screen', '2021-02-16 14:08:38', '2021-02-16 14:26:21');

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
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 2),
(5, '2021_02_02_161516_create_peran_table', 3),
(6, '2021_02_06_144714_create_motif_table', 4),
(7, '2021_02_14_143508_create_obat_table', 5),
(8, '2021_02_16_134557_create_bahan_table', 6),
(9, '2021_02_20_091047_create_produk_table', 7),
(11, '2021_03_11_112658_create_order_table', 8),
(13, '2021_03_21_101610_create_order_produk_table', 9),
(14, '2021_03_23_122059_add_hasil_in_obat_table', 10),
(15, '2021_03_23_153113_add_campuran_in_obat_table', 11),
(16, '2021_03_23_163423_add_takaran_in_obat_table', 12),
(17, '2021_03_23_170301_drop_column_nama_takaran_in_obat_table', 13),
(18, '2021_03_27_151244_create_alat_table', 14),
(19, '2021_03_29_171519_create_produk_obat_table', 15),
(21, '2021_04_04_150857_create_obat_produk_table', 16),
(23, '2021_05_23_152809_add_obat_id_in_order_produk_table', 17),
(24, '2021_06_01_125017_add_field_peran_in_users_table', 18);

-- --------------------------------------------------------

--
-- Table structure for table `motif`
--

CREATE TABLE `motif` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `motif`
--

INSERT INTO `motif` (`id`, `nama`, `gambar`, `created_at`, `updated_at`) VALUES
(6, 'Bunga Putih', '/storage/1613231476.jpg', '2021-02-13 15:51:16', '2021-02-13 15:51:16'),
(7, 'Bunga Cokelat', '/storage/1613310729.jpg', '2021-02-13 16:35:08', '2021-02-14 13:52:11');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hasil` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `campuran_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campuran_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `campuran_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `takaran_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `takaran_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `takaran_3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `created_at`, `updated_at`, `hasil`, `campuran_1`, `campuran_2`, `campuran_3`, `takaran_1`, `takaran_2`, `takaran_3`) VALUES
(2, '2021-03-25 17:31:45', '2021-03-25 17:31:45', 'Biru', 'Pikmen', 'Sulfur', 'Poliatif Blue RSP', '20', '20', '20'),
(3, '2021-04-04 12:41:46', '2021-04-04 12:41:46', 'Hijau', 'Remasol Reed RB', 'Remasol Orange 3R', 'Soda as', '20', '20', '20'),
(4, '2021-04-04 15:20:44', '2021-04-04 15:20:44', 'Oren', 'Remasol Orange 3R', 'Soda kue', 'Pikmen', '20', '20', '20');

-- --------------------------------------------------------

--
-- Table structure for table `obat_produk`
--

CREATE TABLE `obat_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `obat_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `obat_produk`
--

INSERT INTO `obat_produk` (`id`, `produk_id`, `obat_id`, `created_at`, `updated_at`) VALUES
(1, 9, 2, '2021-05-22 15:04:58', '2021-05-22 15:04:58'),
(2, 9, 3, '2021-05-22 15:04:58', '2021-05-22 15:04:58'),
(3, 8, 2, '2021-05-22 15:05:09', '2021-05-22 15:05:09'),
(4, 7, 3, '2021-05-22 15:06:25', '2021-05-22 15:06:25'),
(5, 7, 4, '2021-05-22 15:06:25', '2021-05-22 15:06:25'),
(6, 6, 2, '2021-05-22 15:06:33', '2021-05-22 15:06:33'),
(7, 6, 3, '2021-05-22 15:06:33', '2021-05-22 15:06:33'),
(8, 6, 4, '2021-05-22 15:06:33', '2021-05-22 15:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('pending','processing','completed','decline') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `grand_total` double(8,2) NOT NULL,
  `item_count` int(11) NOT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `payment_method` enum('cash_on_delivery','paypal','stripe','card') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'cash_on_delivery',
  `shipping_fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zipcode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `order_number`, `user_id`, `status`, `grand_total`, `item_count`, `is_paid`, `payment_method`, `shipping_fullname`, `shipping_address`, `shipping_city`, `shipping_state`, `shipping_zipcode`, `shipping_phone`, `shipping_email`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'OrderNumber-604e32fd25802', 1, 'pending', 100000.00, 1, 0, 'cash_on_delivery', 'Din', 'Bali, Indonesia', 'Bali', 'Indonesia', '80481', '+6281239973667', 'din@mail.com', NULL, '2021-03-14 15:59:57', '2021-03-14 15:59:57'),
(2, 'OrderNumber-605497a0a858f', 1, 'pending', 200000.00, 1, 0, 'cash_on_delivery', 'Din', 'Bali, Indonesia', 'Bali', 'Indonesia', '8236', '081246723632', 'test@gmail.com', NULL, '2021-03-19 12:22:56', '2021-03-19 12:22:56'),
(3, 'OrderNumber-605764b8370d1', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:22:32', '2021-03-21 15:22:32'),
(4, 'OrderNumber-6057667909785', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:30:01', '2021-03-21 15:30:01'),
(5, 'OrderNumber-605766a99898a', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:30:49', '2021-03-21 15:30:49'),
(6, 'OrderNumber-605766ba322bf', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:31:06', '2021-03-21 15:31:06'),
(7, 'OrderNumber-605766c47203d', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:31:16', '2021-03-21 15:31:16'),
(8, 'OrderNumber-605766c958ce5', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:31:21', '2021-03-21 15:31:21'),
(9, 'OrderNumber-605766d7c6ee4', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:31:35', '2021-03-21 15:31:35'),
(10, 'OrderNumber-605766dc87d16', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:31:40', '2021-03-21 15:31:40'),
(11, 'OrderNumber-605766e26804b', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:31:46', '2021-03-21 15:31:46'),
(12, 'OrderNumber-605766ff32a68', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:32:15', '2021-03-21 15:32:15'),
(13, 'OrderNumber-60576717aaf10', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:32:39', '2021-03-21 15:32:39'),
(14, 'OrderNumber-60576bc523ca3', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 15:52:37', '2021-03-21 15:52:37'),
(15, 'OrderNumber-6057725610105', 1, 'pending', 220000.00, 2, 0, 'cash_on_delivery', 'Test', 'Jln. Mawar No. 12', 'Denpasar', 'Indonesia', '82334', '08153623836', 'test@mail.com', NULL, '2021-03-21 16:20:38', '2021-03-21 16:20:38'),
(16, 'OrderNumber-605772e995c61', 1, 'pending', 300000.00, 1, 0, 'cash_on_delivery', 'Test Test', 'Jl. Pantai Keramas, Bali Diamond Estate Villa 5 Pantai Keramas', 'Gianyar', 'Indonesia', '80500', '0812346567', 'test@mail.com', NULL, '2021-03-21 16:23:05', '2021-03-21 16:23:05'),
(17, 'OrderNumber-60a91942c9587', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din Din', 'Bali, Indonesia', 'Bali', 'Indonesia', '80483', '+6281239973667', 'sholahudinbest@gmail.com', 'Masuk gang ya', '2021-05-22 14:46:26', '2021-05-22 14:46:26'),
(18, 'OrderNumber-60ae0871ba541', 1, 'pending', 300000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'din@mail.com', NULL, '2021-05-26 08:36:01', '2021-05-26 08:36:01'),
(19, 'OrderNumber-60ae08ff34f7f', 1, 'pending', 300000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'din@mail.com', NULL, '2021-05-26 08:38:23', '2021-05-26 08:38:23'),
(20, 'OrderNumber-60ae0958230e2', 1, 'pending', 300000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'din@mail.com', NULL, '2021-05-26 08:39:52', '2021-05-26 08:39:52'),
(21, 'OrderNumber-60b30d57175ea', 1, 'pending', 0.00, 0, 0, 'cash_on_delivery', 'Din', 'Jl Sandat', 'Denpasar', 'Indonesia', '80221', '0813327432', 'sholahudinbest@gmail.com', 'Hello world', '2021-05-30 03:58:15', '2021-05-30 03:58:15'),
(22, 'OrderNumber-60b30eb8dc0b4', 1, 'pending', 0.00, 0, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 04:04:08', '2021-05-30 04:04:08'),
(23, 'OrderNumber-60b30ee468135', 1, 'pending', 0.00, 0, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 04:04:52', '2021-05-30 04:04:52'),
(24, 'OrderNumber-60b30ef374766', 1, 'pending', 0.00, 0, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 04:05:07', '2021-05-30 04:05:07'),
(25, 'OrderNumber-60b30f059a36b', 1, 'pending', 0.00, 0, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 04:05:25', '2021-05-30 04:05:25'),
(26, 'OrderNumber-60b31a18bb5e6', 1, 'pending', 0.00, 0, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'din@mail.com', 'Catatan', '2021-05-30 04:52:40', '2021-05-30 04:52:40'),
(27, 'OrderNumber-60b37f7ebaa4f', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:05:18', '2021-05-30 12:05:18'),
(28, 'OrderNumber-60b381921e012', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:14:10', '2021-05-30 12:14:10'),
(29, 'OrderNumber-60b381c210e7d', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:14:58', '2021-05-30 12:14:58'),
(30, 'OrderNumber-60b3820f81568', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:16:15', '2021-05-30 12:16:15'),
(31, 'OrderNumber-60b38233e975c', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:16:51', '2021-05-30 12:16:51'),
(32, 'OrderNumber-60b38298a0a07', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:18:32', '2021-05-30 12:18:32'),
(33, 'OrderNumber-60b3883ec6454', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:42:38', '2021-05-30 12:42:38'),
(34, 'OrderNumber-60b38910a89b0', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:46:08', '2021-05-30 12:46:08'),
(35, 'OrderNumber-60b3898f467a7', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:48:15', '2021-05-30 12:48:15'),
(36, 'OrderNumber-60b389f525a22', 1, 'pending', 300000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 12:49:57', '2021-05-30 12:49:57'),
(37, 'OrderNumber-60b3afcd4bd5b', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 15:31:25', '2021-05-30 15:31:25'),
(38, 'OrderNumber-60b3b02aef420', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 15:32:59', '2021-05-30 15:32:59'),
(39, 'OrderNumber-60b3b1244e42e', 1, 'pending', 450000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 15:37:08', '2021-05-30 15:37:08'),
(40, 'OrderNumber-60b3b183aee5a', 1, 'pending', 600000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 15:38:43', '2021-05-30 15:38:43'),
(41, 'OrderNumber-60b3b1a0e92af', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 15:39:12', '2021-05-30 15:39:12'),
(42, 'OrderNumber-60b3b1c42d6eb', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 15:39:48', '2021-05-30 15:39:48'),
(43, 'OrderNumber-60b3b267c0127', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 15:42:31', '2021-05-30 15:42:31'),
(44, 'OrderNumber-60b3b28f39ea3', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'c', '2021-05-30 15:43:11', '2021-05-30 15:43:11'),
(45, 'OrderNumber-60b3b2b6739ba', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'c', '2021-05-30 15:43:50', '2021-05-30 15:43:50'),
(46, 'OrderNumber-60b3b2d3bf074', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 15:44:19', '2021-05-30 15:44:19'),
(47, 'OrderNumber-60b3b4129723b', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 15:49:38', '2021-05-30 15:49:38'),
(48, 'OrderNumber-60b3b437826a3', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 15:50:15', '2021-05-30 15:50:15'),
(49, 'OrderNumber-60b3b657a9304', 1, 'pending', 300000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan 1', '2021-05-30 15:59:19', '2021-05-30 15:59:19'),
(50, 'OrderNumber-60b3b68ae41e0', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:00:10', '2021-05-30 16:00:10'),
(51, 'OrderNumber-60b3b6df1a91e', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:01:35', '2021-05-30 16:01:35'),
(52, 'OrderNumber-60b3b8c37b55a', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:09:39', '2021-05-30 16:09:39'),
(53, 'OrderNumber-60b3b8f723b4d', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:10:31', '2021-05-30 16:10:31'),
(54, 'OrderNumber-60b3b94a1012a', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:11:54', '2021-05-30 16:11:54'),
(55, 'OrderNumber-60b3b95a144e3', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:12:10', '2021-05-30 16:12:10'),
(56, 'OrderNumber-60b3b976aa069', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:12:38', '2021-05-30 16:12:38'),
(57, 'OrderNumber-60b3b98ddbb47', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:13:01', '2021-05-30 16:13:01'),
(58, 'OrderNumber-60b3b9e985519', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:14:33', '2021-05-30 16:14:33'),
(59, 'OrderNumber-60b3ba5792f9f', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:16:23', '2021-05-30 16:16:23'),
(60, 'OrderNumber-60b3ba875a28f', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:17:11', '2021-05-30 16:17:11'),
(61, 'OrderNumber-60b3ba9b97cee', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:17:31', '2021-05-30 16:17:31'),
(62, 'OrderNumber-60b3bab5859e9', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:17:57', '2021-05-30 16:17:57'),
(63, 'OrderNumber-60b3badcd243b', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:18:36', '2021-05-30 16:18:36'),
(64, 'OrderNumber-60b3bb75640b0', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:21:09', '2021-05-30 16:21:09'),
(65, 'OrderNumber-60b3bbd0c0ff5', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:22:40', '2021-05-30 16:22:40'),
(66, 'OrderNumber-60b3bc5d701c3', 1, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:25:01', '2021-05-30 16:25:01'),
(67, 'OrderNumber-60b3bd69027a2', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:29:29', '2021-05-30 16:29:29'),
(68, 'OrderNumber-60b3bdd4d5ce8', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:31:16', '2021-05-30 16:31:16'),
(69, 'OrderNumber-60b3bddf6f0ea', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:31:27', '2021-05-30 16:31:27'),
(70, 'OrderNumber-60b3bdf640c33', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:31:50', '2021-05-30 16:31:50'),
(71, 'OrderNumber-60b3be6486068', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:33:40', '2021-05-30 16:33:40'),
(72, 'OrderNumber-60b3be886d377', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:34:16', '2021-05-30 16:34:16'),
(73, 'OrderNumber-60b3be9ca171d', 1, 'pending', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:34:36', '2021-05-30 16:34:36'),
(74, 'OrderNumber-60b3bea41bba2', 1, 'completed', 150000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Catatan', '2021-05-30 16:34:44', '2021-06-01 12:14:42'),
(75, 'OrderNumber-60b62908aa2b3', 1, 'pending', 450000.00, 1, 0, 'cash_on_delivery', 'Din', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Halo Reseller', '2021-06-01 12:33:12', '2021-06-01 12:33:12'),
(76, 'OrderNumber-60b642f365349', 1, 'pending', 900000.00, 2, 0, 'cash_on_delivery', 'Jon', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'admin@mail.com', 'Halo Admin disini jon', '2021-06-01 14:23:47', '2021-06-01 14:23:47'),
(77, 'OrderNumber-60b64694764d6', 3, 'pending', 750000.00, 2, 0, 'cash_on_delivery', 'Wallrux', 'Jl. Manggis no. 20', 'Denpasar', 'Indonesia', '80221', '08123457683', 'din@mail.com', 'Halo ini wallrux', '2021-06-01 14:39:16', '2021-06-01 14:39:16');

-- --------------------------------------------------------

--
-- Table structure for table `order_produk`
--

CREATE TABLE `order_produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `produk_id` bigint(20) UNSIGNED NOT NULL,
  `price` double(8,2) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `obat_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_produk`
--

INSERT INTO `order_produk` (`id`, `order_id`, `produk_id`, `price`, `quantity`, `created_at`, `updated_at`, `obat_id`) VALUES
(1, 15, 2, 100000.00, 1, NULL, NULL, NULL),
(2, 15, 1, 120000.00, 1, NULL, NULL, NULL),
(3, 16, 2, 100000.00, 3, '2021-03-21 16:23:05', '2021-03-21 16:23:05', NULL),
(4, 17, 9, 150000.00, 1, '2021-05-22 14:46:26', '2021-05-22 14:46:26', NULL),
(5, 20, 9, 150000.00, 2, '2021-05-26 08:39:52', '2021-05-26 08:39:52', 2),
(6, 25, 9, 150000.00, 1, '2021-05-30 04:05:25', '2021-05-30 04:05:25', 2),
(7, 25, 8, 250000.00, 2, '2021-05-30 04:05:25', '2021-05-30 04:05:25', 2),
(8, 26, 9, 150000.00, 1, '2021-05-30 04:52:40', '2021-05-30 04:52:40', 3),
(9, 26, 8, 250000.00, 1, '2021-05-30 04:52:40', '2021-05-30 04:52:40', 2),
(10, 27, 9, 150000.00, 2, '2021-05-30 12:05:18', '2021-05-30 12:05:18', 2),
(11, 27, 9, 150000.00, 3, '2021-05-30 12:05:18', '2021-05-30 12:05:18', 3),
(12, 28, 9, 150000.00, 1, '2021-05-30 12:14:10', '2021-05-30 12:14:10', 2),
(13, 29, 9, 150000.00, 1, '2021-05-30 12:14:58', '2021-05-30 12:14:58', 2),
(14, 30, 9, 150000.00, 1, '2021-05-30 12:16:15', '2021-05-30 12:16:15', 2),
(15, 31, 9, 150000.00, 1, '2021-05-30 12:16:51', '2021-05-30 12:16:51', 2),
(16, 32, 9, 150000.00, 1, '2021-05-30 12:18:32', '2021-05-30 12:18:32', 2),
(17, 33, 9, 150000.00, 1, '2021-05-30 12:42:38', '2021-05-30 12:42:38', 2),
(18, 34, 9, 150000.00, 1, '2021-05-30 12:46:08', '2021-05-30 12:46:08', 2),
(19, 35, 9, 150000.00, 1, '2021-05-30 12:48:15', '2021-05-30 12:48:15', 2),
(20, 36, 9, 150000.00, 2, '2021-05-30 12:49:57', '2021-05-30 12:49:57', 2),
(21, 37, 9, 150000.00, 1, '2021-05-30 15:31:25', '2021-05-30 15:31:25', 2),
(22, 38, 9, 150000.00, 1, '2021-05-30 15:32:59', '2021-05-30 15:32:59', 2),
(23, 39, 9, 150000.00, 2, '2021-05-30 15:37:08', '2021-05-30 15:37:08', 2),
(24, 39, 9, 150000.00, 1, '2021-05-30 15:37:08', '2021-05-30 15:37:08', 3),
(25, 40, 9, 150000.00, 3, '2021-05-30 15:38:43', '2021-05-30 15:38:43', 2),
(26, 40, 9, 150000.00, 1, '2021-05-30 15:38:43', '2021-05-30 15:38:43', 3),
(27, 41, 9, 150000.00, 1, '2021-05-30 15:39:12', '2021-05-30 15:39:12', 2),
(28, 42, 9, 150000.00, 1, '2021-05-30 15:39:48', '2021-05-30 15:39:48', 2),
(29, 43, 9, 150000.00, 1, '2021-05-30 15:42:31', '2021-05-30 15:42:31', 2),
(30, 44, 9, 150000.00, 1, '2021-05-30 15:43:11', '2021-05-30 15:43:11', 2),
(31, 45, 9, 150000.00, 1, '2021-05-30 15:43:50', '2021-05-30 15:43:50', 2),
(32, 46, 9, 150000.00, 1, '2021-05-30 15:44:19', '2021-05-30 15:44:19', 2),
(33, 47, 9, 150000.00, 1, '2021-05-30 15:49:38', '2021-05-30 15:49:38', 2),
(34, 48, 9, 150000.00, 1, '2021-05-30 15:50:15', '2021-05-30 15:50:15', 2),
(35, 49, 9, 150000.00, 2, '2021-05-30 15:59:19', '2021-05-30 15:59:19', 2),
(36, 50, 9, 150000.00, 1, '2021-05-30 16:00:11', '2021-05-30 16:00:11', 2),
(37, 51, 9, 150000.00, 1, '2021-05-30 16:01:35', '2021-05-30 16:01:35', 2),
(38, 52, 9, 150000.00, 1, '2021-05-30 16:09:39', '2021-05-30 16:09:39', 2),
(39, 53, 9, 150000.00, 1, '2021-05-30 16:10:31', '2021-05-30 16:10:31', 2),
(40, 54, 9, 150000.00, 1, '2021-05-30 16:11:54', '2021-05-30 16:11:54', 2),
(41, 55, 9, 150000.00, 1, '2021-05-30 16:12:10', '2021-05-30 16:12:10', 2),
(42, 56, 9, 150000.00, 1, '2021-05-30 16:12:38', '2021-05-30 16:12:38', 2),
(43, 57, 9, 150000.00, 1, '2021-05-30 16:13:01', '2021-05-30 16:13:01', 2),
(44, 58, 9, 150000.00, 1, '2021-05-30 16:14:33', '2021-05-30 16:14:33', 2),
(45, 59, 9, 150000.00, 1, '2021-05-30 16:16:23', '2021-05-30 16:16:23', 2),
(46, 60, 9, 150000.00, 3, '2021-05-30 16:17:11', '2021-05-30 16:17:11', 2),
(47, 60, 9, 150000.00, 2, '2021-05-30 16:17:11', '2021-05-30 16:17:11', 3),
(48, 61, 9, 150000.00, 3, '2021-05-30 16:17:31', '2021-05-30 16:17:31', 2),
(49, 61, 9, 150000.00, 2, '2021-05-30 16:17:31', '2021-05-30 16:17:31', 3),
(50, 62, 9, 150000.00, 3, '2021-05-30 16:17:57', '2021-05-30 16:17:57', 2),
(51, 62, 9, 150000.00, 2, '2021-05-30 16:17:57', '2021-05-30 16:17:57', 3),
(52, 63, 9, 150000.00, 3, '2021-05-30 16:18:36', '2021-05-30 16:18:36', 2),
(53, 63, 9, 150000.00, 2, '2021-05-30 16:18:36', '2021-05-30 16:18:36', 3),
(54, 64, 9, 150000.00, 3, '2021-05-30 16:21:09', '2021-05-30 16:21:09', 2),
(55, 64, 9, 150000.00, 2, '2021-05-30 16:21:09', '2021-05-30 16:21:09', 3),
(56, 65, 9, 150000.00, 3, '2021-05-30 16:22:40', '2021-05-30 16:22:40', 2),
(57, 65, 9, 150000.00, 2, '2021-05-30 16:22:40', '2021-05-30 16:22:40', 3),
(58, 66, 9, 150000.00, 3, '2021-05-30 16:25:01', '2021-05-30 16:25:01', 2),
(59, 66, 9, 150000.00, 2, '2021-05-30 16:25:01', '2021-05-30 16:25:01', 3),
(60, 67, 9, 150000.00, 1, '2021-05-30 16:29:29', '2021-05-30 16:29:29', 2),
(61, 68, 9, 150000.00, 1, '2021-05-30 16:31:16', '2021-05-30 16:31:16', 2),
(62, 69, 9, 150000.00, 1, '2021-05-30 16:31:27', '2021-05-30 16:31:27', 2),
(63, 70, 9, 150000.00, 1, '2021-05-30 16:31:50', '2021-05-30 16:31:50', 2),
(64, 71, 9, 150000.00, 1, '2021-05-30 16:33:40', '2021-05-30 16:33:40', 2),
(65, 72, 9, 150000.00, 1, '2021-05-30 16:34:16', '2021-05-30 16:34:16', 2),
(66, 73, 9, 150000.00, 1, '2021-05-30 16:34:36', '2021-05-30 16:34:36', 2),
(67, 74, 9, 150000.00, 1, '2021-05-30 16:34:44', '2021-05-30 16:34:44', 2),
(68, 75, 9, 150000.00, 3, '2021-06-01 12:33:12', '2021-06-01 12:33:12', 2),
(69, 76, 9, 150000.00, 2, '2021-06-01 14:23:47', '2021-06-01 14:23:47', 3),
(70, 76, 7, 200000.00, 3, '2021-06-01 14:23:47', '2021-06-01 14:23:47', 4),
(71, 77, 9, 150000.00, 3, '2021-06-01 14:39:16', '2021-06-01 14:39:16', 2),
(72, 77, 9, 150000.00, 2, '2021-06-01 14:39:16', '2021-06-01 14:39:16', 3);

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
-- Table structure for table `peran`
--

CREATE TABLE `peran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `peran`
--

INSERT INTO `peran` (`id`, `nama`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', '2021-02-04 14:08:35', '2021-02-04 14:08:35');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` bigint(20) NOT NULL,
  `gambar` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `nama`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'Bunga Putih', 120000, '/storage/1613916477.jpg', '2021-02-21 14:07:58', '2021-02-21 14:12:20'),
(2, 'Batik Kuning', 100000, '/storage/1615111545.jpg', '2021-03-07 10:05:46', '2021-04-04 16:00:07'),
(6, 'Hawaian', 250000, '/storage/1617549155.jpeg', '2021-04-04 15:12:36', '2021-04-04 15:12:36'),
(7, 'Batik Burung', 200000, '/storage/1621669654.jpg', '2021-05-22 07:47:35', '2021-05-22 07:47:35'),
(8, 'Batik Awan', 250000, '/storage/1621677303.jpg', '2021-05-22 09:55:04', '2021-05-22 09:55:04'),
(9, 'Batik Bunga', 150000, '/storage/1621677531.png', '2021-05-22 09:58:51', '2021-05-22 09:58:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `peran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'pembeli'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `peran`) VALUES
(1, 'admin', 'admin@mail.com', NULL, '$2y$10$VsKilB9sQAmYTzzBECt1muKah4o74Bs317X.W8u8ilAipcrUz2AsW', 'VcRyGwOeGeMisXWuamlIwHMRBelAqpkugsIfVkTRfRnvzjQXOZVWNQLpl3vm', '2021-01-27 15:38:46', '2021-02-02 15:53:07', 'admin'),
(3, 'Din', 'din@mail.com', NULL, '$2y$10$cB2Aa9hgF0uE7Wij38q9zeXvyzkgj05M8qJA0CbkGY00eP0Nc4adC', NULL, '2021-06-01 12:49:26', '2021-06-01 12:49:26', 'pembeli');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat`
--
ALTER TABLE `alat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
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
-- Indexes for table `motif`
--
ALTER TABLE `motif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat_produk`
--
ALTER TABLE `obat_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `obat_produk_produk_id_foreign` (`produk_id`),
  ADD KEY `obat_produk_obat_id_foreign` (`obat_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_produk`
--
ALTER TABLE `order_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_produk_order_id_foreign` (`order_id`),
  ADD KEY `order_produk_produk_id_foreign` (`produk_id`),
  ADD KEY `order_produk_obat_id_foreign` (`obat_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `peran`
--
ALTER TABLE `peran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
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
-- AUTO_INCREMENT for table `alat`
--
ALTER TABLE `alat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `motif`
--
ALTER TABLE `motif`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `obat_produk`
--
ALTER TABLE `obat_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `order_produk`
--
ALTER TABLE `order_produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `peran`
--
ALTER TABLE `peran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `obat_produk`
--
ALTER TABLE `obat_produk`
  ADD CONSTRAINT `obat_produk_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `obat_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_produk`
--
ALTER TABLE `order_produk`
  ADD CONSTRAINT `order_produk_obat_id_foreign` FOREIGN KEY (`obat_id`) REFERENCES `obat` (`id`),
  ADD CONSTRAINT `order_produk_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_produk_produk_id_foreign` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
