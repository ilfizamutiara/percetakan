-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 06:08 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `marketplace`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_frees`
--

CREATE TABLE `admin_frees` (
  `id` int(11) NOT NULL,
  `persentase` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_frees`
--

INSERT INTO `admin_frees` (`id`, `persentase`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-01-22 10:23:07', '2022-01-22 10:23:07');

-- --------------------------------------------------------

--
-- Table structure for table `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `bahan` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `bahan`, `created_at`, `updated_at`) VALUES
(1, 'flexy 280', '2021-10-22 04:59:03', '2021-10-22 04:59:03'),
(2, 'flexy china', '2021-10-22 04:59:03', '2021-10-22 04:59:03'),
(3, 'akrilik', '2021-10-26 14:48:25', '2021-10-26 14:48:25'),
(4, 'albatros', '2021-10-27 06:17:09', '2021-10-27 06:17:09'),
(5, 'oneway vision', '2021-10-27 06:31:19', '2021-10-27 06:31:19'),
(6, 'kain Polyester', '2021-10-27 06:34:34', '2021-10-27 06:34:34'),
(7, 'Artcarton 260gsm', '2021-10-27 06:43:43', '2021-10-27 06:43:43'),
(8, 'karton linen', '2021-10-27 06:44:01', '2021-10-27 06:44:01'),
(9, 'Karton BW', '2021-10-27 06:44:21', '2021-10-27 06:44:21'),
(10, 'Novajet', '2021-10-27 06:44:32', '2021-10-27 06:44:32'),
(11, 'flexy 260 gsm', '2021-11-11 03:31:23', '2021-11-11 03:31:23'),
(12, '-', '2021-11-11 03:57:44', '2021-11-11 03:57:44'),
(13, 'NCR 3 Ply', '2021-11-11 04:01:29', '2021-11-11 04:01:29'),
(14, 'A5 Art Paper 120gsm', '2021-11-11 04:15:00', '2021-11-11 04:15:00'),
(15, 'canvas', '2022-02-17 03:25:48', '2022-02-17 03:25:48'),
(16, 'kertas oraccal', '2022-02-17 03:34:59', '2022-02-17 03:34:59');

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id_bank` int(11) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`id_bank`, `nama_bank`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'BRI', NULL, '2022-01-22 14:47:02', '2022-01-22 14:47:02'),
(2, 'BNI', NULL, '2022-01-22 14:47:02', '2022-01-22 14:47:02'),
(3, 'Mandiri', NULL, '2022-01-22 14:47:52', '2022-01-22 14:47:52'),
(4, 'BSI (Bank Syariah Indonesia)', NULL, '2022-01-22 14:47:52', '2022-01-22 14:47:52'),
(5, 'Bank Nagari', NULL, '2022-01-22 14:52:19', '2022-01-22 14:52:19'),
(6, 'BTN', NULL, '2022-01-22 14:52:19', '2022-01-22 14:52:19'),
(7, 'BCA', NULL, '2022-01-22 14:53:01', '2022-01-22 14:53:01');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `no_resi` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id`, `id_pesanan`, `id_percetakan`, `id_produk`, `jumlah`, `ukuran`, `dokumen`, `created_at`, `updated_at`) VALUES
(135, 200222928, 13, 56, 2, '1x2', NULL, '2022-02-20 01:34:55', '2022-02-20 01:34:55'),
(136, 200222928, 13, 55, 10, '1x1', NULL, '2022-02-20 01:34:55', '2022-02-20 01:34:55'),
(138, 200222930, 7, 48, 3, '1x1', NULL, '2022-02-20 01:36:53', '2022-02-20 01:36:53'),
(140, 200222346, 13, 56, 2, '1x2', NULL, '2022-02-20 01:44:27', '2022-02-20 01:44:27'),
(141, 200222542, 13, 55, 5, '1x1', NULL, '2022-02-20 01:59:41', '2022-02-20 01:59:41'),
(142, 200222122, 7, 48, 10, '1x1', NULL, '2022-02-20 01:59:42', '2022-02-20 01:59:42'),
(143, 200222974, 10, 42, 1, 'besar-bulat', NULL, '2022-02-20 02:14:41', '2022-02-20 02:14:41'),
(144, 200222611, 17, 62, 10, 'besar-bulat', NULL, '2022-02-20 02:14:42', '2022-02-20 02:14:42'),
(145, 20022242, 13, 55, 50, '1x1', NULL, '2022-02-20 02:16:40', '2022-02-20 02:16:40'),
(146, 200222563, 13, 55, 100, '1x1', NULL, '2022-02-20 02:20:39', '2022-02-20 02:20:39'),
(147, 200222951, 10, 42, 1, 'besar-bulat', NULL, '2022-02-20 02:55:44', '2022-02-20 02:55:44'),
(148, 200222951, 10, 38, 6, '2x3', NULL, '2022-02-20 02:55:44', '2022-02-20 02:55:44'),
(149, 20022254, 13, 57, 1, '1x1', NULL, '2022-02-20 02:55:45', '2022-02-20 02:55:45'),
(150, 200222960, 17, 64, 10, '1x1', NULL, '2022-02-20 02:55:46', '2022-02-20 02:55:46'),
(151, 200222340, 13, 69, 20, '1x1', NULL, '2022-02-20 03:14:13', '2022-02-20 03:14:13'),
(152, 200222340, 13, 70, 3, '1x3', NULL, '2022-02-20 03:14:13', '2022-02-20 03:14:13'),
(153, 200222375, 10, 42, 1, 'besar-bulat', NULL, '2022-02-20 09:11:51', '2022-02-20 09:11:51'),
(154, 21022296, 7, 47, 1, 'besar-bulat', NULL, '2022-02-21 04:40:31', '2022-02-21 04:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` float NOT NULL,
  `file` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kategori`, `created_at`, `updated_at`) VALUES
(2, 'Undangan', '2021-11-26 05:20:58', '2021-11-26 05:20:58'),
(3, 'card', '2021-12-02 06:45:25', '2021-12-02 06:45:25'),
(4, 'media promosi', '2021-12-02 06:45:42', '2021-12-02 06:45:42'),
(5, 'kalender', '2021-12-02 06:49:00', '2021-12-02 06:49:00'),
(6, 'stempel', '2021-12-02 06:49:11', '2021-12-02 06:49:11'),
(7, 'sticker', '2021-12-02 06:57:34', '2021-12-02 06:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `ukuran` varchar(100) NOT NULL,
  `dokumen` varchar(255) DEFAULT NULL,
  `total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_produk`, `id_pelanggan`, `id_percetakan`, `jumlah`, `ukuran`, `dokumen`, `total`) VALUES
(24, 45, 2, 7, 3, '1X3', '', 210000),
(40, 40, 9, 10, 1, '1x1', NULL, 50000),
(156, 55, 8, 13, 1, '1x1', NULL, 15000),
(157, 42, 27, 10, 1, 'besar-bulat', NULL, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `konfirmasi_pembayaran`
--

CREATE TABLE `konfirmasi_pembayaran` (
  `id_konfirmasi` int(11) NOT NULL,
  `id_pesanan` int(11) NOT NULL,
  `total_tagihan` int(11) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfirmasi_pembayaran`
--

INSERT INTO `konfirmasi_pembayaran` (`id_konfirmasi`, `id_pesanan`, `total_tagihan`, `bukti_bayar`, `created_at`, `update_at`) VALUES
(53, 200222928, NULL, NULL, '2022-02-20 01:34:56', '2022-02-20 01:34:56'),
(54, 200222930, NULL, NULL, '2022-02-20 01:36:53', '2022-02-20 01:36:53'),
(55, 200222346, NULL, '20220220022552.jpg', '2022-02-20 01:44:28', '2022-02-20 01:44:28'),
(56, 200222542, NULL, '20220220031907.jpg', '2022-02-20 01:59:42', '2022-02-20 01:59:42'),
(57, 200222122, NULL, '20220220022506.jpg', '2022-02-20 01:59:42', '2022-02-20 01:59:42'),
(58, 200222974, NULL, NULL, '2022-02-20 02:14:41', '2022-02-20 02:14:41'),
(59, 200222611, NULL, '20220220022330.jpg', '2022-02-20 02:14:42', '2022-02-20 02:14:42'),
(60, 20022242, NULL, '20220220031725.jpg', '2022-02-20 02:16:40', '2022-02-20 02:16:40'),
(61, 200222563, NULL, '20220220022308.jpg', '2022-02-20 02:20:39', '2022-02-20 02:20:39'),
(62, 200222951, NULL, '20220220025631.jpg', '2022-02-20 02:55:44', '2022-02-20 02:55:44'),
(63, 200222951, NULL, '20220220025631.jpg', '2022-02-20 02:55:44', '2022-02-20 02:55:44'),
(64, 20022254, NULL, '20220220025612.jpg', '2022-02-20 02:55:45', '2022-02-20 02:55:45'),
(65, 200222960, NULL, '20220220025726.jpg', '2022-02-20 02:55:46', '2022-02-20 02:55:46'),
(66, 200222340, NULL, '20220220031440.jpg', '2022-02-20 03:14:13', '2022-02-20 03:14:13'),
(67, 200222340, NULL, '20220220031440.jpg', '2022-02-20 03:14:13', '2022-02-20 03:14:13'),
(68, 200222375, NULL, '20220220091347.jpg', '2022-02-20 09:11:51', '2022-02-20 09:11:51'),
(69, 21022296, NULL, '20220221044137.jpg', '2022-02-21 04:40:31', '2022-02-21 04:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id_city` int(11) UNSIGNED NOT NULL,
  `city_name` varchar(200) NOT NULL,
  `id_province` int(11) UNSIGNED NOT NULL,
  `created_at` int(11) NOT NULL DEFAULT current_timestamp(),
  `updated_at` int(11) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id_city`, `city_name`, `id_province`, `created_at`, `updated_at`) VALUES
(1, 'Aceh Barat', 21, 2021, 2021),
(2, 'Aceh Barat Daya', 21, 2021, 2021),
(3, 'Aceh Besar', 21, 2021, 2021),
(4, 'Aceh Jaya', 21, 2021, 2021),
(5, 'Aceh Selatan', 21, 2021, 2021),
(6, 'Aceh Singkil', 21, 2021, 2021),
(7, 'Aceh Tamiang', 21, 2021, 2021),
(8, 'Aceh Tengah', 21, 2021, 2021),
(9, 'Aceh Tenggara', 21, 2021, 2021),
(10, 'Aceh Timur', 21, 2021, 2021),
(11, 'Aceh Utara', 21, 2021, 2021),
(12, 'Agam', 32, 2021, 2021),
(13, 'Alor', 23, 2021, 2021),
(14, 'Ambon', 19, 2021, 2021),
(15, 'Asahan', 34, 2021, 2021),
(16, 'Asmat', 24, 2021, 2021),
(17, 'Badung', 1, 2021, 2021),
(18, 'Balangan', 13, 2021, 2021),
(19, 'Balikpapan', 15, 2021, 2021),
(20, 'Banda Aceh', 21, 2021, 2021),
(21, 'Bandar Lampung', 18, 2021, 2021),
(22, 'Bandung', 9, 2021, 2021),
(23, 'Bandung', 9, 2021, 2021),
(24, 'Bandung Barat', 9, 2021, 2021),
(25, 'Banggai', 29, 2021, 2021),
(26, 'Banggai Kepulauan', 29, 2021, 2021),
(27, 'Bangka', 2, 2021, 2021),
(28, 'Bangka Barat', 2, 2021, 2021),
(29, 'Bangka Selatan', 2, 2021, 2021),
(30, 'Bangka Tengah', 2, 2021, 2021),
(31, 'Bangkalan', 11, 2021, 2021),
(32, 'Bangli', 1, 2021, 2021),
(33, 'Banjar', 13, 2021, 2021),
(34, 'Banjar', 9, 2021, 2021),
(35, 'Banjarbaru', 13, 2021, 2021),
(36, 'Banjarmasin', 13, 2021, 2021),
(37, 'Banjarnegara', 10, 2021, 2021),
(38, 'Bantaeng', 28, 2021, 2021),
(39, 'Bantul', 5, 2021, 2021),
(40, 'Banyuasin', 33, 2021, 2021),
(41, 'Banyumas', 10, 2021, 2021),
(42, 'Banyuwangi', 11, 2021, 2021),
(43, 'Barito Kuala', 13, 2021, 2021),
(44, 'Barito Selatan', 14, 2021, 2021),
(45, 'Barito Timur', 14, 2021, 2021),
(46, 'Barito Utara', 14, 2021, 2021),
(47, 'Barru', 28, 2021, 2021),
(48, 'Batam', 17, 2021, 2021),
(49, 'Batang', 10, 2021, 2021),
(50, 'Batang Hari', 8, 2021, 2021),
(51, 'Batu', 11, 2021, 2021),
(52, 'Batu Bara', 34, 2021, 2021),
(53, 'Bau-Bau', 30, 2021, 2021),
(54, 'Bekasi', 9, 2021, 2021),
(55, 'Bekasi', 9, 2021, 2021),
(56, 'Belitung', 2, 2021, 2021),
(57, 'Belitung Timur', 2, 2021, 2021),
(58, 'Belu', 23, 2021, 2021),
(59, 'Bener Meriah', 21, 2021, 2021),
(60, 'Bengkalis', 26, 2021, 2021),
(61, 'Bengkayang', 12, 2021, 2021),
(62, 'Bengkulu', 4, 2021, 2021),
(63, 'Bengkulu Selatan', 4, 2021, 2021),
(64, 'Bengkulu Tengah', 4, 2021, 2021),
(65, 'Bengkulu Utara', 4, 2021, 2021),
(66, 'Berau', 15, 2021, 2021),
(67, 'Biak Numfor', 24, 2021, 2021),
(68, 'Bima', 22, 2021, 2021),
(69, 'Bima', 22, 2021, 2021),
(70, 'Binjai', 34, 2021, 2021),
(71, 'Bintan', 17, 2021, 2021),
(72, 'Bireuen', 21, 2021, 2021),
(73, 'Bitung', 31, 2021, 2021),
(74, 'Blitar', 11, 2021, 2021),
(75, 'Blitar', 11, 2021, 2021),
(76, 'Blora', 10, 2021, 2021),
(77, 'Boalemo', 7, 2021, 2021),
(78, 'Bogor', 9, 2021, 2021),
(79, 'Bogor', 9, 2021, 2021),
(80, 'Bojonegoro', 11, 2021, 2021),
(81, 'Bolaang Mongondow (Bolmong)', 31, 2021, 2021),
(82, 'Bolaang Mongondow Selatan', 31, 2021, 2021),
(83, 'Bolaang Mongondow Timur', 31, 2021, 2021),
(84, 'Bolaang Mongondow Utara', 31, 2021, 2021),
(85, 'Bombana', 30, 2021, 2021),
(86, 'Bondowoso', 11, 2021, 2021),
(87, 'Bone', 28, 2021, 2021),
(88, 'Bone Bolango', 7, 2021, 2021),
(89, 'Bontang', 15, 2021, 2021),
(90, 'Boven Digoel', 24, 2021, 2021),
(91, 'Boyolali', 10, 2021, 2021),
(92, 'Brebes', 10, 2021, 2021),
(93, 'Bukittinggi', 32, 2021, 2021),
(94, 'Buleleng', 1, 2021, 2021),
(95, 'Bulukumba', 28, 2021, 2021),
(96, 'Bulungan (Bulongan)', 16, 2021, 2021),
(97, 'Bungo', 8, 2021, 2021),
(98, 'Buol', 29, 2021, 2021),
(99, 'Buru', 19, 2021, 2021),
(100, 'Buru Selatan', 19, 2021, 2021),
(101, 'Buton', 30, 2021, 2021),
(102, 'Buton Utara', 30, 2021, 2021),
(103, 'Ciamis', 9, 2021, 2021),
(104, 'Cianjur', 9, 2021, 2021),
(105, 'Cilacap', 10, 2021, 2021),
(106, 'Cilegon', 3, 2021, 2021),
(107, 'Cimahi', 9, 2021, 2021),
(108, 'Cirebon', 9, 2021, 2021),
(109, 'Cirebon', 9, 2021, 2021),
(110, 'Dairi', 34, 2021, 2021),
(111, 'Deiyai (Deliyai)', 24, 2021, 2021),
(112, 'Deli Serdang', 34, 2021, 2021),
(113, 'Demak', 10, 2021, 2021),
(114, 'Denpasar', 1, 2021, 2021),
(115, 'Depok', 9, 2021, 2021),
(116, 'Dharmasraya', 32, 2021, 2021),
(117, 'Dogiyai', 24, 2021, 2021),
(118, 'Dompu', 22, 2021, 2021),
(119, 'Donggala', 29, 2021, 2021),
(120, 'Dumai', 26, 2021, 2021),
(121, 'Empat Lawang', 33, 2021, 2021),
(122, 'Ende', 23, 2021, 2021),
(123, 'Enrekang', 28, 2021, 2021),
(124, 'Fakfak', 25, 2021, 2021),
(125, 'Flores Timur', 23, 2021, 2021),
(126, 'Garut', 9, 2021, 2021),
(127, 'Gayo Lues', 21, 2021, 2021),
(128, 'Gianyar', 1, 2021, 2021),
(129, 'Gorontalo', 7, 2021, 2021),
(130, 'Gorontalo', 7, 2021, 2021),
(131, 'Gorontalo Utara', 7, 2021, 2021),
(132, 'Gowa', 28, 2021, 2021),
(133, 'Gresik', 11, 2021, 2021),
(134, 'Grobogan', 10, 2021, 2021),
(135, 'Gunung Kidul', 5, 2021, 2021),
(136, 'Gunung Mas', 14, 2021, 2021),
(137, 'Gunungsitoli', 34, 2021, 2021),
(138, 'Halmahera Barat', 20, 2021, 2021),
(139, 'Halmahera Selatan', 20, 2021, 2021),
(140, 'Halmahera Tengah', 20, 2021, 2021),
(141, 'Halmahera Timur', 20, 2021, 2021),
(142, 'Halmahera Utara', 20, 2021, 2021),
(143, 'Hulu Sungai Selatan', 13, 2021, 2021),
(144, 'Hulu Sungai Tengah', 13, 2021, 2021),
(145, 'Hulu Sungai Utara', 13, 2021, 2021),
(146, 'Humbang Hasundutan', 34, 2021, 2021),
(147, 'Indragiri Hilir', 26, 2021, 2021),
(148, 'Indragiri Hulu', 26, 2021, 2021),
(149, 'Indramayu', 9, 2021, 2021),
(150, 'Intan Jaya', 24, 2021, 2021),
(151, 'Jakarta Barat', 6, 2021, 2021),
(152, 'Jakarta Pusat', 6, 2021, 2021),
(153, 'Jakarta Selatan', 6, 2021, 2021),
(154, 'Jakarta Timur', 6, 2021, 2021),
(155, 'Jakarta Utara', 6, 2021, 2021),
(156, 'Jambi', 8, 2021, 2021),
(157, 'Jayapura', 24, 2021, 2021),
(158, 'Jayapura', 24, 2021, 2021),
(159, 'Jayawijaya', 24, 2021, 2021),
(160, 'Jember', 11, 2021, 2021),
(161, 'Jembrana', 1, 2021, 2021),
(162, 'Jeneponto', 28, 2021, 2021),
(163, 'Jepara', 10, 2021, 2021),
(164, 'Jombang', 11, 2021, 2021),
(165, 'Kaimana', 25, 2021, 2021),
(166, 'Kampar', 26, 2021, 2021),
(167, 'Kapuas', 14, 2021, 2021),
(168, 'Kapuas Hulu', 12, 2021, 2021),
(169, 'Karanganyar', 10, 2021, 2021),
(170, 'Karangasem', 1, 2021, 2021),
(171, 'Karawang', 9, 2021, 2021),
(172, 'Karimun', 17, 2021, 2021),
(173, 'Karo', 34, 2021, 2021),
(174, 'Katingan', 14, 2021, 2021),
(175, 'Kaur', 4, 2021, 2021),
(176, 'Kayong Utara', 12, 2021, 2021),
(177, 'Kebumen', 10, 2021, 2021),
(178, 'Kediri', 11, 2021, 2021),
(179, 'Kediri', 11, 2021, 2021),
(180, 'Keerom', 24, 2021, 2021),
(181, 'Kendal', 10, 2021, 2021),
(182, 'Kendari', 30, 2021, 2021),
(183, 'Kepahiang', 4, 2021, 2021),
(184, 'Kepulauan Anambas', 17, 2021, 2021),
(185, 'Kepulauan Aru', 19, 2021, 2021),
(186, 'Kepulauan Mentawai', 32, 2021, 2021),
(187, 'Kepulauan Meranti', 26, 2021, 2021),
(188, 'Kepulauan Sangihe', 31, 2021, 2021),
(189, 'Kepulauan Seribu', 6, 2021, 2021),
(190, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 31, 2021, 2021),
(191, 'Kepulauan Sula', 20, 2021, 2021),
(192, 'Kepulauan Talaud', 31, 2021, 2021),
(193, 'Kepulauan Yapen (Yapen Waropen)', 24, 2021, 2021),
(194, 'Kerinci', 8, 2021, 2021),
(195, 'Ketapang', 12, 2021, 2021),
(196, 'Klaten', 10, 2021, 2021),
(197, 'Klungkung', 1, 2021, 2021),
(198, 'Kolaka', 30, 2021, 2021),
(199, 'Kolaka Utara', 30, 2021, 2021),
(200, 'Konawe', 30, 2021, 2021),
(201, 'Konawe Selatan', 30, 2021, 2021),
(202, 'Konawe Utara', 30, 2021, 2021),
(203, 'Kotabaru', 13, 2021, 2021),
(204, 'Kotamobagu', 31, 2021, 2021),
(205, 'Kotawaringin Barat', 14, 2021, 2021),
(206, 'Kotawaringin Timur', 14, 2021, 2021),
(207, 'Kuantan Singingi', 26, 2021, 2021),
(208, 'Kubu Raya', 12, 2021, 2021),
(209, 'Kudus', 10, 2021, 2021),
(210, 'Kulon Progo', 5, 2021, 2021),
(211, 'Kuningan', 9, 2021, 2021),
(212, 'Kupang', 23, 2021, 2021),
(213, 'Kupang', 23, 2021, 2021),
(214, 'Kutai Barat', 15, 2021, 2021),
(215, 'Kutai Kartanegara', 15, 2021, 2021),
(216, 'Kutai Timur', 15, 2021, 2021),
(217, 'Labuhan Batu', 34, 2021, 2021),
(218, 'Labuhan Batu Selatan', 34, 2021, 2021),
(219, 'Labuhan Batu Utara', 34, 2021, 2021),
(220, 'Lahat', 33, 2021, 2021),
(221, 'Lamandau', 14, 2021, 2021),
(222, 'Lamongan', 11, 2021, 2021),
(223, 'Lampung Barat', 18, 2021, 2021),
(224, 'Lampung Selatan', 18, 2021, 2021),
(225, 'Lampung Tengah', 18, 2021, 2021),
(226, 'Lampung Timur', 18, 2021, 2021),
(227, 'Lampung Utara', 18, 2021, 2021),
(228, 'Landak', 12, 2021, 2021),
(229, 'Langkat', 34, 2021, 2021),
(230, 'Langsa', 21, 2021, 2021),
(231, 'Lanny Jaya', 24, 2021, 2021),
(232, 'Lebak', 3, 2021, 2021),
(233, 'Lebong', 4, 2021, 2021),
(234, 'Lembata', 23, 2021, 2021),
(235, 'Lhokseumawe', 21, 2021, 2021),
(236, 'Lima Puluh Koto/Kota', 32, 2021, 2021),
(237, 'Lingga', 17, 2021, 2021),
(238, 'Lombok Barat', 22, 2021, 2021),
(239, 'Lombok Tengah', 22, 2021, 2021),
(240, 'Lombok Timur', 22, 2021, 2021),
(241, 'Lombok Utara', 22, 2021, 2021),
(242, 'Lubuk Linggau', 33, 2021, 2021),
(243, 'Lumajang', 11, 2021, 2021),
(244, 'Luwu', 28, 2021, 2021),
(245, 'Luwu Timur', 28, 2021, 2021),
(246, 'Luwu Utara', 28, 2021, 2021),
(247, 'Madiun', 11, 2021, 2021),
(248, 'Madiun', 11, 2021, 2021),
(249, 'Magelang', 10, 2021, 2021),
(250, 'Magelang', 10, 2021, 2021),
(251, 'Magetan', 11, 2021, 2021),
(252, 'Majalengka', 9, 2021, 2021),
(253, 'Majene', 27, 2021, 2021),
(254, 'Makassar', 28, 2021, 2021),
(255, 'Malang', 11, 2021, 2021),
(256, 'Malang', 11, 2021, 2021),
(257, 'Malinau', 16, 2021, 2021),
(258, 'Maluku Barat Daya', 19, 2021, 2021),
(259, 'Maluku Tengah', 19, 2021, 2021),
(260, 'Maluku Tenggara', 19, 2021, 2021),
(261, 'Maluku Tenggara Barat', 19, 2021, 2021),
(262, 'Mamasa', 27, 2021, 2021),
(263, 'Mamberamo Raya', 24, 2021, 2021),
(264, 'Mamberamo Tengah', 24, 2021, 2021),
(265, 'Mamuju', 27, 2021, 2021),
(266, 'Mamuju Utara', 27, 2021, 2021),
(267, 'Manado', 31, 2021, 2021),
(268, 'Mandailing Natal', 34, 2021, 2021),
(269, 'Manggarai', 23, 2021, 2021),
(270, 'Manggarai Barat', 23, 2021, 2021),
(271, 'Manggarai Timur', 23, 2021, 2021),
(272, 'Manokwari', 25, 2021, 2021),
(273, 'Manokwari Selatan', 25, 2021, 2021),
(274, 'Mappi', 24, 2021, 2021),
(275, 'Maros', 28, 2021, 2021),
(276, 'Mataram', 22, 2021, 2021),
(277, 'Maybrat', 25, 2021, 2021),
(278, 'Medan', 34, 2021, 2021),
(279, 'Melawi', 12, 2021, 2021),
(280, 'Merangin', 8, 2021, 2021),
(281, 'Merauke', 24, 2021, 2021),
(282, 'Mesuji', 18, 2021, 2021),
(283, 'Metro', 18, 2021, 2021),
(284, 'Mimika', 24, 2021, 2021),
(285, 'Minahasa', 31, 2021, 2021),
(286, 'Minahasa Selatan', 31, 2021, 2021),
(287, 'Minahasa Tenggara', 31, 2021, 2021),
(288, 'Minahasa Utara', 31, 2021, 2021),
(289, 'Mojokerto', 11, 2021, 2021),
(290, 'Mojokerto', 11, 2021, 2021),
(291, 'Morowali', 29, 2021, 2021),
(292, 'Muara Enim', 33, 2021, 2021),
(293, 'Muaro Jambi', 8, 2021, 2021),
(294, 'Muko Muko', 4, 2021, 2021),
(295, 'Muna', 30, 2021, 2021),
(296, 'Murung Raya', 14, 2021, 2021),
(297, 'Musi Banyuasin', 33, 2021, 2021),
(298, 'Musi Rawas', 33, 2021, 2021),
(299, 'Nabire', 24, 2021, 2021),
(300, 'Nagan Raya', 21, 2021, 2021),
(301, 'Nagekeo', 23, 2021, 2021),
(302, 'Natuna', 17, 2021, 2021),
(303, 'Nduga', 24, 2021, 2021),
(304, 'Ngada', 23, 2021, 2021),
(305, 'Nganjuk', 11, 2021, 2021),
(306, 'Ngawi', 11, 2021, 2021),
(307, 'Nias', 34, 2021, 2021),
(308, 'Nias Barat', 34, 2021, 2021),
(309, 'Nias Selatan', 34, 2021, 2021),
(310, 'Nias Utara', 34, 2021, 2021),
(311, 'Nunukan', 16, 2021, 2021),
(312, 'Ogan Ilir', 33, 2021, 2021),
(313, 'Ogan Komering Ilir', 33, 2021, 2021),
(314, 'Ogan Komering Ulu', 33, 2021, 2021),
(315, 'Ogan Komering Ulu Selatan', 33, 2021, 2021),
(316, 'Ogan Komering Ulu Timur', 33, 2021, 2021),
(317, 'Pacitan', 11, 2021, 2021),
(318, 'Padang', 32, 2021, 2021),
(319, 'Padang Lawas', 34, 2021, 2021),
(320, 'Padang Lawas Utara', 34, 2021, 2021),
(321, 'Padang Panjang', 32, 2021, 2021),
(322, 'Padang Pariaman', 32, 2021, 2021),
(323, 'Padang Sidempuan', 34, 2021, 2021),
(324, 'Pagar Alam', 33, 2021, 2021),
(325, 'Pakpak Bharat', 34, 2021, 2021),
(326, 'Palangka Raya', 14, 2021, 2021),
(327, 'Palembang', 33, 2021, 2021),
(328, 'Palopo', 28, 2021, 2021),
(329, 'Palu', 29, 2021, 2021),
(330, 'Pamekasan', 11, 2021, 2021),
(331, 'Pandeglang', 3, 2021, 2021),
(332, 'Pangandaran', 9, 2021, 2021),
(333, 'Pangkajene Kepulauan', 28, 2021, 2021),
(334, 'Pangkal Pinang', 2, 2021, 2021),
(335, 'Paniai', 24, 2021, 2021),
(336, 'Parepare', 28, 2021, 2021),
(337, 'Pariaman', 32, 2021, 2021),
(338, 'Parigi Moutong', 29, 2021, 2021),
(339, 'Pasaman', 32, 2021, 2021),
(340, 'Pasaman Barat', 32, 2021, 2021),
(341, 'Paser', 15, 2021, 2021),
(342, 'Pasuruan', 11, 2021, 2021),
(343, 'Pasuruan', 11, 2021, 2021),
(344, 'Pati', 10, 2021, 2021),
(345, 'Payakumbuh', 32, 2021, 2021),
(346, 'Pegunungan Arfak', 25, 2021, 2021),
(347, 'Pegunungan Bintang', 24, 2021, 2021),
(348, 'Pekalongan', 10, 2021, 2021),
(349, 'Pekalongan', 10, 2021, 2021),
(350, 'Pekanbaru', 26, 2021, 2021),
(351, 'Pelalawan', 26, 2021, 2021),
(352, 'Pemalang', 10, 2021, 2021),
(353, 'Pematang Siantar', 34, 2021, 2021),
(354, 'Penajam Paser Utara', 15, 2021, 2021),
(355, 'Pesawaran', 18, 2021, 2021),
(356, 'Pesisir Barat', 18, 2021, 2021),
(357, 'Pesisir Selatan', 32, 2021, 2021),
(358, 'Pidie', 21, 2021, 2021),
(359, 'Pidie Jaya', 21, 2021, 2021),
(360, 'Pinrang', 28, 2021, 2021),
(361, 'Pohuwato', 7, 2021, 2021),
(362, 'Polewali Mandar', 27, 2021, 2021),
(363, 'Ponorogo', 11, 2021, 2021),
(364, 'Pontianak', 12, 2021, 2021),
(365, 'Pontianak', 12, 2021, 2021),
(366, 'Poso', 29, 2021, 2021),
(367, 'Prabumulih', 33, 2021, 2021),
(368, 'Pringsewu', 18, 2021, 2021),
(369, 'Probolinggo', 11, 2021, 2021),
(370, 'Probolinggo', 11, 2021, 2021),
(371, 'Pulang Pisau', 14, 2021, 2021),
(372, 'Pulau Morotai', 20, 2021, 2021),
(373, 'Puncak', 24, 2021, 2021),
(374, 'Puncak Jaya', 24, 2021, 2021),
(375, 'Purbalingga', 10, 2021, 2021),
(376, 'Purwakarta', 9, 2021, 2021),
(377, 'Purworejo', 10, 2021, 2021),
(378, 'Raja Ampat', 25, 2021, 2021),
(379, 'Rejang Lebong', 4, 2021, 2021),
(380, 'Rembang', 10, 2021, 2021),
(381, 'Rokan Hilir', 26, 2021, 2021),
(382, 'Rokan Hulu', 26, 2021, 2021),
(383, 'Rote Ndao', 23, 2021, 2021),
(384, 'Sabang', 21, 2021, 2021),
(385, 'Sabu Raijua', 23, 2021, 2021),
(386, 'Salatiga', 10, 2021, 2021),
(387, 'Samarinda', 15, 2021, 2021),
(388, 'Sambas', 12, 2021, 2021),
(389, 'Samosir', 34, 2021, 2021),
(390, 'Sampang', 11, 2021, 2021),
(391, 'Sanggau', 12, 2021, 2021),
(392, 'Sarmi', 24, 2021, 2021),
(393, 'Sarolangun', 8, 2021, 2021),
(394, 'Sawah Lunto', 32, 2021, 2021),
(395, 'Sekadau', 12, 2021, 2021),
(396, 'Selayar (Kepulauan Selayar)', 28, 2021, 2021),
(397, 'Seluma', 4, 2021, 2021),
(398, 'Semarang', 10, 2021, 2021),
(399, 'Semarang', 10, 2021, 2021),
(400, 'Seram Bagian Barat', 19, 2021, 2021),
(401, 'Seram Bagian Timur', 19, 2021, 2021),
(402, 'Serang', 3, 2021, 2021),
(403, 'Serang', 3, 2021, 2021),
(404, 'Serdang Bedagai', 34, 2021, 2021),
(405, 'Seruyan', 14, 2021, 2021),
(406, 'Siak', 26, 2021, 2021),
(407, 'Sibolga', 34, 2021, 2021),
(408, 'Sidenreng Rappang/Rapang', 28, 2021, 2021),
(409, 'Sidoarjo', 11, 2021, 2021),
(410, 'Sigi', 29, 2021, 2021),
(411, 'Sijunjung (Sawah Lunto Sijunjung)', 32, 2021, 2021),
(412, 'Sikka', 23, 2021, 2021),
(413, 'Simalungun', 34, 2021, 2021),
(414, 'Simeulue', 21, 2021, 2021),
(415, 'Singkawang', 12, 2021, 2021),
(416, 'Sinjai', 28, 2021, 2021),
(417, 'Sintang', 12, 2021, 2021),
(418, 'Situbondo', 11, 2021, 2021),
(419, 'Sleman', 5, 2021, 2021),
(420, 'Solok', 32, 2021, 2021),
(421, 'Solok', 32, 2021, 2021),
(422, 'Solok Selatan', 32, 2021, 2021),
(423, 'Soppeng', 28, 2021, 2021),
(424, 'Sorong', 25, 2021, 2021),
(425, 'Sorong', 25, 2021, 2021),
(426, 'Sorong Selatan', 25, 2021, 2021),
(427, 'Sragen', 10, 2021, 2021),
(428, 'Subang', 9, 2021, 2021),
(429, 'Subulussalam', 21, 2021, 2021),
(430, 'Sukabumi', 9, 2021, 2021),
(431, 'Sukabumi', 9, 2021, 2021),
(432, 'Sukamara', 14, 2021, 2021),
(433, 'Sukoharjo', 10, 2021, 2021),
(434, 'Sumba Barat', 23, 2021, 2021),
(435, 'Sumba Barat Daya', 23, 2021, 2021),
(436, 'Sumba Tengah', 23, 2021, 2021),
(437, 'Sumba Timur', 23, 2021, 2021),
(438, 'Sumbawa', 22, 2021, 2021),
(439, 'Sumbawa Barat', 22, 2021, 2021),
(440, 'Sumedang', 9, 2021, 2021),
(441, 'Sumenep', 11, 2021, 2021),
(442, 'Sungaipenuh', 8, 2021, 2021),
(443, 'Supiori', 24, 2021, 2021),
(444, 'Surabaya', 11, 2021, 2021),
(445, 'Surakarta (Solo)', 10, 2021, 2021),
(446, 'Tabalong', 13, 2021, 2021),
(447, 'Tabanan', 1, 2021, 2021),
(448, 'Takalar', 28, 2021, 2021),
(449, 'Tambrauw', 25, 2021, 2021),
(450, 'Tana Tidung', 16, 2021, 2021),
(451, 'Tana Toraja', 28, 2021, 2021),
(452, 'Tanah Bumbu', 13, 2021, 2021),
(453, 'Tanah Datar', 32, 2021, 2021),
(454, 'Tanah Laut', 13, 2021, 2021),
(455, 'Tangerang', 3, 2021, 2021),
(456, 'Tangerang', 3, 2021, 2021),
(457, 'Tangerang Selatan', 3, 2021, 2021),
(458, 'Tanggamus', 18, 2021, 2021),
(459, 'Tanjung Balai', 34, 2021, 2021),
(460, 'Tanjung Jabung Barat', 8, 2021, 2021),
(461, 'Tanjung Jabung Timur', 8, 2021, 2021),
(462, 'Tanjung Pinang', 17, 2021, 2021),
(463, 'Tapanuli Selatan', 34, 2021, 2021),
(464, 'Tapanuli Tengah', 34, 2021, 2021),
(465, 'Tapanuli Utara', 34, 2021, 2021),
(466, 'Tapin', 13, 2021, 2021),
(467, 'Tarakan', 16, 2021, 2021),
(468, 'Tasikmalaya', 9, 2021, 2021),
(469, 'Tasikmalaya', 9, 2021, 2021),
(470, 'Tebing Tinggi', 34, 2021, 2021),
(471, 'Tebo', 8, 2021, 2021),
(472, 'Tegal', 10, 2021, 2021),
(473, 'Tegal', 10, 2021, 2021),
(474, 'Teluk Bintuni', 25, 2021, 2021),
(475, 'Teluk Wondama', 25, 2021, 2021),
(476, 'Temanggung', 10, 2021, 2021),
(477, 'Ternate', 20, 2021, 2021),
(478, 'Tidore Kepulauan', 20, 2021, 2021),
(479, 'Timor Tengah Selatan', 23, 2021, 2021),
(480, 'Timor Tengah Utara', 23, 2021, 2021),
(481, 'Toba Samosir', 34, 2021, 2021),
(482, 'Tojo Una-Una', 29, 2021, 2021),
(483, 'Toli-Toli', 29, 2021, 2021),
(484, 'Tolikara', 24, 2021, 2021),
(485, 'Tomohon', 31, 2021, 2021),
(486, 'Toraja Utara', 28, 2021, 2021),
(487, 'Trenggalek', 11, 2021, 2021),
(488, 'Tual', 19, 2021, 2021),
(489, 'Tuban', 11, 2021, 2021),
(490, 'Tulang Bawang', 18, 2021, 2021),
(491, 'Tulang Bawang Barat', 18, 2021, 2021),
(492, 'Tulungagung', 11, 2021, 2021),
(493, 'Wajo', 28, 2021, 2021),
(494, 'Wakatobi', 30, 2021, 2021),
(495, 'Waropen', 24, 2021, 2021),
(496, 'Way Kanan', 18, 2021, 2021),
(497, 'Wonogiri', 10, 2021, 2021),
(498, 'Wonosobo', 10, 2021, 2021),
(499, 'Yahukimo', 24, 2021, 2021),
(500, 'Yalimo', 24, 2021, 2021),
(501, 'Yogyakarta', 5, 2021, 2021);

-- --------------------------------------------------------

--
-- Table structure for table `kurirs`
--

CREATE TABLE `kurirs` (
  `id` int(11) NOT NULL,
  `kurir` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kurirs`
--

INSERT INTO `kurirs` (`id`, `kurir`, `created_at`, `updated_at`) VALUES
(1, 'jne', '2022-02-07 07:26:23', '2022-02-07 07:26:23'),
(2, 'tiki', '2022-02-07 07:26:23', '2022-02-07 07:26:23'),
(3, 'pos', '2022-02-07 07:26:41', '2022-02-07 07:26:41');

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
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_08_19_080855_create_permission_tables', 1),
(6, '2021_10_03_234425_create_provinsis_table', 2),
(7, '2021_10_03_234454_create_kotas_table', 2),
(8, '2021_10_03_234509_create_kurirs_table', 2),
(9, '2021_12_28_093449_create_uploads_table', 3),
(10, '2021_12_31_143208_create_province_table', 4),
(11, '2021_12_31_143422_create_city_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 13),
(2, 'App\\Models\\User', 18),
(2, 'App\\Models\\User', 22),
(2, 'App\\Models\\User', 23),
(2, 'App\\Models\\User', 34),
(2, 'App\\Models\\User', 38),
(2, 'App\\Models\\User', 40),
(2, 'App\\Models\\User', 42),
(2, 'App\\Models\\User', 44),
(2, 'App\\Models\\User', 45),
(2, 'App\\Models\\User', 98),
(2, 'App\\Models\\User', 108),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 27),
(3, 'App\\Models\\User', 28),
(3, 'App\\Models\\User', 29),
(3, 'App\\Models\\User', 30),
(3, 'App\\Models\\User', 31),
(3, 'App\\Models\\User', 46),
(3, 'App\\Models\\User', 47),
(3, 'App\\Models\\User', 49),
(3, 'App\\Models\\User', 50),
(3, 'App\\Models\\User', 51),
(3, 'App\\Models\\User', 54),
(3, 'App\\Models\\User', 55),
(3, 'App\\Models\\User', 61),
(3, 'App\\Models\\User', 65),
(3, 'App\\Models\\User', 66),
(3, 'App\\Models\\User', 67),
(3, 'App\\Models\\User', 70),
(3, 'App\\Models\\User', 87),
(3, 'App\\Models\\User', 89),
(3, 'App\\Models\\User', 90),
(3, 'App\\Models\\User', 91),
(3, 'App\\Models\\User', 92),
(3, 'App\\Models\\User', 105),
(3, 'App\\Models\\User', 106),
(3, 'App\\Models\\User', 111);

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
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jenis_kelamin` varchar(20) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `no_hp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `nama`, `jenis_kelamin`, `alamat`, `no_hp`, `created_at`, `updated_at`) VALUES
(2, 27, 'Jisung', 'Laki-Laki', 'simp. Rumbio', '0867829292', '2021-09-17 21:26:10', '2021-09-17 21:26:10'),
(7, 46, 'ilfiza', 'Perempuan', 'simp. Rumbio', '0867829292', '2021-11-09 08:16:13', '2021-11-09 08:16:13'),
(8, 54, 'ani', 'Perempuan', 'vi suku', '085754234151', '2021-11-10 05:45:53', '2021-11-10 05:45:53'),
(9, 55, 'Sastra Gautama', 'Laki-Laki', 'Jl. Ahmad Yani No. 3', '082345631234', '2022-01-02 05:29:49', '2022-01-02 05:29:49'),
(11, 65, 'fiza', 'Perempuan', 'vi suku', '086757873423', '2022-02-01 00:17:57', '2022-02-01 00:17:57'),
(12, 66, 'mutiara', 'Perempuan', 'Jl. Dr. M. Hatta', '087896875643', '2022-02-01 01:39:59', '2022-02-01 01:39:59'),
(25, 90, 'mutia', NULL, 'Jl. Dr. M. Hatta No 2 Kel. Air Mati', '087862536627', '2022-02-10 03:27:36', '2022-02-10 03:27:36'),
(26, 91, 'mutiara', NULL, 'Jl. Dr. M. Hatta', '087896875643', '2022-02-10 15:58:31', '2022-02-10 15:58:31'),
(27, 92, 'Hani', NULL, 'Jl. Dr. M. Hatta', '085767564554', '2022-02-14 03:25:43', '2022-02-14 03:25:43'),
(28, 105, 'Andi', NULL, 'Jl. Dr. M. Yamin no. 3', '087867565546', '2022-02-18 02:35:05', '2022-02-18 02:35:05'),
(29, 106, 'dini', NULL, 'simp. Rumbio, Air mati', '085767827726', '2022-02-18 03:53:48', '2022-02-18 03:53:48'),
(30, 111, 'fiza', NULL, 'jl. dr m hatta no 3', '08785675564', '2022-02-21 04:34:52', '2022-02-21 04:34:52');

-- --------------------------------------------------------

--
-- Table structure for table `percetakan`
--

CREATE TABLE `percetakan` (
  `id_percetakan` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `nama_toko` varchar(255) DEFAULT NULL,
  `alamat_toko` varchar(255) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `percetakan`
--

INSERT INTO `percetakan` (`id_percetakan`, `id_user`, `nama_toko`, `alamat_toko`, `no_telp`, `created_at`, `updated_at`) VALUES
(7, 18, 'NR DIGITAL PRINTING', 'Jl. Diponegoro No. 25, VI Suku, Lubuk Sikarah, kota Solok', '085674635454', '2021-08-27 08:54:05', '2021-08-27 08:54:05'),
(9, 22, 'TIGA PUTRA DIGITAL PRINTING', 'Jln. A. Yani No. 83 Kel. VI Suku Kec. Lubuk Sikarah Kota Solok', '082378918920', '2021-09-10 06:30:53', '2021-09-10 06:30:53'),
(10, 23, 'Cemerlang Digital Printing', 'Jl. Diponegoro No. 44 Simpang Ambacang VI Suku kota Solok', '082341567854', '2021-09-10 07:13:19', '2021-09-10 07:13:19'),
(13, 34, 'Central Digital Printing', 'Jl. Dr. Hamka. No. 142 Kateka, Lubuk sikarah, Kota Solok, Sumatra Barat', '089734221245', '2021-09-22 15:46:26', '2021-09-22 15:46:26'),
(17, 40, 'STARGRAF DIGITAL PRINTING', 'Jl. Prof. M. Yamin SH, Komplek Ruko Jaya (Pandang Ujung) Kelurahan, Ps. Pandan Air Mati, Tj. Harapan, Kota Solok, Sumatra Barat 27317', '082344368799', '2021-09-23 05:09:13', '2021-09-23 05:09:13'),
(30, 98, 'Bengkel Print Sumatra Barat', 'Jl. Patimura No.71, Tj. Paku, Tj. Harapan, Kota Solok, Sumatra Barat, 27317', '081363916106', '2022-02-17 04:59:39', '2022-02-17 04:59:39'),
(31, 99, 'Cover Advertising- Digital Printing Kota Solok', 'Jln. Perwira Simp. Sigege. Kel. VI Suku, Kec. Lubuk Sikarah, Kota Solok', '082386324627', '2022-02-17 05:08:44', '2022-02-17 05:08:44'),
(34, 103, 'Djoyo Digital Pinting', 'Jl. Ahmad Yani, VI Suku, Kec. Lubuk Sikarah, Kota SOlok, Sumatra Barat 27317', '082170066636', '2022-02-17 06:27:01', '2022-02-17 06:27:01'),
(35, 104, 'AR Digital Printing', 'Jl. Dr M. Yamin, Ps. Pandan Ai Mati, Tj. Harapan,  Solo Sumatra Barat 27317', '081363124412', '2022-02-17 06:30:12', '2022-02-17 06:30:12');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_status_pesanan` int(11) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `id_city` int(11) UNSIGNED NOT NULL,
  `id_province` int(11) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `total_harga` int(11) DEFAULT NULL,
  `ongkir` int(100) DEFAULT NULL,
  `pajak` int(11) NOT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `kurir` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_status_pesanan`, `tgl_pesan`, `id_pelanggan`, `id_percetakan`, `id_city`, `id_province`, `nama`, `alamat`, `kode_pos`, `no_hp`, `total_harga`, `ongkir`, `pajak`, `total_bayar`, `metode_pembayaran`, `kurir`, `created_at`, `updated_at`) VALUES
(20022242, 5, '2022-02-20', 25, 13, 420, 32, 'mutia', 'Jl. Dr. M. Hatta No 2 Kel. Air Mati', 24537, '087862536627', 750000, 11000, 7500, 768500, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 02:16:40', '2022-02-20 02:16:40'),
(20022254, 5, '2022-02-20', 29, 13, 421, 32, 'dini', 'simp. Rumbio', 24534, '085767827726', 73000, 12000, 730, 85730, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 02:55:45', '2022-02-20 02:55:45'),
(21022296, 3, '2022-02-21', 30, 7, 421, 32, 'fiza', 'jl. dr m hatta no 3', 27317, '08785675564', 40000, 10000, 400, 50400, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-21 04:40:31', '2022-02-21 04:40:31'),
(200222122, 5, '2022-02-20', 7, 7, 421, 32, 'ilfiza', 'simp. Rumbio', 273544, '0867829292', 100000, 10000, 1000, 111000, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 01:59:42', '2022-02-20 01:59:42'),
(200222340, 5, '2022-02-20', 29, 13, 421, 32, 'dini', 'simp. Rumbio, Air mati', 24534, '085767827726', 300000, 10000, 3000, 313000, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 03:14:13', '2022-02-20 03:14:13'),
(200222346, 5, '2022-02-20', 7, 13, 421, 32, 'ilfiza', 'simp. Rumbio', 273544, '0867829292', 90000, 10000, 900, 100900, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 01:44:27', '2022-02-20 01:44:27'),
(200222375, 2, '2022-02-20', 7, 10, 32, 32, 'ilfiza', 'simp. Rumbio', 273544, '0867829292', 60000, 40000, 600, 100600, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 09:11:51', '2022-02-20 09:11:51'),
(200222542, 5, '2022-02-20', 7, 13, 421, 32, 'ilfiza', 'simp. Rumbio', 273544, '0867829292', 75000, 10000, 750, 85750, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 01:59:41', '2022-02-20 01:59:41'),
(200222563, 3, '2022-02-20', 25, 13, 421, 32, 'mutia', 'Jl. Dr. M. Hatta No 2 Kel. Air Mati', 24537, '087862536627', 1500000, 6000, 15000, 1521000, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 02:20:39', '2022-02-20 02:20:39'),
(200222611, 3, '2022-02-20', 25, 17, 421, 32, 'mutia', 'Jl. Dr. M. Hatta No 2 Kel. Air Mati', 24533, '087862536627', 500000, 10000, 5000, 515000, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 02:14:41', '2022-02-20 02:14:41'),
(200222928, 6, '2022-02-20', 28, 13, 421, 32, 'Andi', 'Jl. Dr. M. Yamin no. 3', 27317, '087867565546', 240000, 10000, 2400, 252400, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 01:34:55', '2022-02-20 01:34:55'),
(200222930, 1, '2022-02-20', 28, 7, 411, 32, 'Andi', 'Jl. Dr. M. Yamin no. 3', 27317, '087867565546', 30000, 11000, 300, 41300, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 01:36:53', '2022-02-20 01:36:53'),
(200222951, 3, '2022-02-20', 29, 10, 421, 32, 'dini', 'simp. Rumbio', 24534, '085767827726', 1050000, 12000, 10500, 1072500, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 02:55:44', '2022-02-20 02:55:44'),
(200222960, 3, '2022-02-20', 29, 17, 421, 32, 'dini', 'simp. Rumbio', 24534, '085767827726', 20000, 12000, 200, 32200, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 02:55:46', '2022-02-20 02:55:46'),
(200222974, 5, '2022-02-20', 25, 13, 421, 32, 'mutia', 'Jl. Dr. M. Hatta No 2 Kel. Air Mati', 24533, '087862536627', 60000, 10000, 600, 70600, 'Mandiri - 9829828903 - Dprint', NULL, '2022-02-20 02:14:40', '2022-02-20 02:14:40');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_satuan_produk` int(11) NOT NULL,
  `nama_produk` varchar(30) NOT NULL,
  `harga` int(50) NOT NULL,
  `stok` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `estimasi_pengerjaan` varchar(30) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_percetakan`, `id_kategori`, `id_bahan`, `id_satuan_produk`, `nama_produk`, `harga`, `stok`, `berat`, `estimasi_pengerjaan`, `keterangan`, `gambar`, `created_at`, `updated_at`) VALUES
(24, 9, 4, 1, 2, 'Spanduk', 21000, 198, 1200, '1-2 hari', '1 lembar', 'product-gambar/20210930173131.jpg', '2021-09-13 15:02:22', '2021-09-13 15:02:22'),
(25, 9, 7, 1, 1, 'Sticker Ritrama', 100000, 1998, 600, '1-3 hari', '1 lembar', 'product-gambar/20210921061537.jpg', '2021-09-21 06:15:37', '2021-09-21 06:15:37'),
(26, 9, 4, 1, 8, 'Banner', 130000, 344, 700, '1-2 hari', 'Percetakan. Meliputi nama percetakan,', 'product-gambar/20210921061723.jpg', '2021-09-21 06:17:23', '2021-09-21 06:17:23'),
(27, 9, 3, 1, 2, 'Kartu Nama', 90000, 1482, 50, '1-2 hari', '1 ', 'product-gambar/20210921062202.jpg', '2021-09-21 06:18:42', '2021-09-21 06:18:42'),
(28, 9, 3, 1, 2, 'Kartu Nama', 70000, 1500, 50, '1-2 hari', '1 pcs', 'product-gambar/20210921062034.jpg', '2021-09-21 06:20:34', '2021-09-21 06:20:34'),
(29, 9, 3, 1, 2, 'ID Card', 30000, 992, 70, '1 hari', '1pcs', 'product-gambar/20210921062131.jpg', '2021-09-21 06:21:31', '2021-09-21 06:21:31'),
(30, 9, 4, 2, 8, 'Neon Box', 2000000, 99, 1000, '2-4 hari', '1 pcs', 'product-gambar/20210921062325.jpg', '2021-09-21 06:23:25', '2021-09-21 06:23:25'),
(31, 9, 4, 2, 8, 'Roll Up Banner', 200000, 494, 600, '1-3 hari', 'harga permeter', 'product-gambar/20210921062412.jpg', '2021-09-21 06:24:12', '2021-09-21 06:24:12'),
(35, 10, 4, 2, 8, 'Spanduk', 30000, 88, 1000, '2-3 hari', 'DETAIL PRODUK : - Bahan medium flexi HIGH RESOLUTION ketebalan 340 gram - Harga untuk pembelian MIN 1 meter - Harga sudah termasuk mata ayam 4 lubang tiap sudut - Untuk pengiriman spanduk akan dilipat-lipat - Desain gratis MIN Order 2 Meter persegi - Bisa dengan design sendiri - Bisa disesuaikan dengan katalog desain kami - Cetak menggunakan mesin besar bukan mesin biasa', 'product-gambar/20211025063650.jpg', '2021-10-02 04:20:21', '2021-10-02 04:20:21'),
(36, 10, 4, 1, 8, 'Baliho', 25000, 991, 900, '1-3 hari', '- Bahan Flexi 280\r\n- Menggunakan bahan berkualitas\r\n- Cetak menggunakan mesin terbaru\r\n- Hasil cetakan High resolution\r\n- Harga 25000/m persegi\r\n\r\nFinishing :\r\n- Mata Ayam ( Lubang untuk ikat )\r\n- Selongsong untuk jepit kayu / bambu\r\n( mohon sertakan jenis finishing yang ingin di gunakan )', 'product-gambar/20211025083022.jpg', '2021-10-25 08:30:22', '2021-10-25 08:30:22'),
(37, 10, 4, 3, 8, 'Neon Box', 1870000, 58, 1000, '2-4 hari', 'neon box & periklanan \r\nKotak,bulat,oval,huruf,dll\r\nHarga termurah \r\nKulitas terjamin \r\n\r\nAkrilik & beklet\r\nakrilik susu 2mm (tergantung design )\r\nstiker vinly uv/cutting stiker \r\n2sisi depan belakang\r\nlampu led\r\nlist Stanless\r\nstiker UV', 'product-gambar/20211026145637.jpg', '2021-10-26 14:51:52', '2021-10-26 14:51:52'),
(38, 10, 4, 4, 8, 'Roll Up Banner', 165000, 92, 700, '1-3 hari', 'Roll Up Banner sudah menjadi salah satu andalan dalam berpromosi, cocok digunakan untuk semua kegiatan\r\n\r\nTerbuat dari Bahan almunium yg BERKUALITAS TINGGI dan dilengkapi tas oxford hitam sehingga mudah dibawa-bawa..\r\n\r\nkami menggunakan bahan cetak ALBATROS!!\r\n\r\nRoll up hanya rangka dan tas saja belum termasuk visual cetak\r\nRoll up variasi + Cetak itu proses 1-2hari kaa \r\napabila variasi + Cetak laminasi kaka bisa pilih laminasi MATTE / GLOSSY', 'product-gambar/20211027062741.jpg', '2021-10-27 06:27:08', '2021-10-27 06:27:08'),
(39, 10, 4, 5, 8, 'Stiker one way', 60000, 115, 500, '1-3 hari', 'Spesifikasi\r\n- Bahan Sticker ONE WAY VISION\r\n- Harga per meter persegi\r\n- Ukuran lebar maksimal 1.2 meter\r\n- Ukuran Panjang Bebas', 'product-gambar/20211027063250.jpg', '2021-10-27 06:32:50', '2021-10-27 06:32:50'),
(40, 10, 4, 6, 1, 'umbul-umbul', 50000, 468, 200, '1-3 hari', 'Jasa cetak umbul - umbul printing \r\ndesain / gambar bisa custom sesukamu\r\n - kain polyster\r\n- jahit / obras \r\n-  bisa pesan minimal 2\r\n- hasil cetak detail sesuai gambar\r\n- proses cepat', 'product-gambar/20211027063821.jpg', '2021-10-27 06:38:21', '2021-10-27 06:38:21'),
(41, 10, 3, 10, 2, 'Kartu Nama', 90000, 972, 50, '1-3 hari', 'Spesifikasi :\r\n- Ukuran 9 x 5,5 cm\r\n- Bahan sesuai yg di pilih di varian\r\n  Art carton 260 gsm sedikit glossy\r\n  BW permukaan halus dan gampang untuk ditulis\r\n  Linen permukaan ada serat garis halus dan gampang ditulis\r\n  Novajet permukaan halus dan anti air karena berbahan dasar palstik\r\n- Cetak Fullcolour.\r\n- File siap cetak (format Pdf, psd, jpeg,cdr,ai).\r\n- min 1 box (100 kartu)', 'product-gambar/20211027064802.jpg', '2021-10-27 06:48:02', '2021-10-27 06:48:02'),
(42, 10, 6, 10, 1, 'stempel', 60000, 2420, 200, '1-2 hari', '-  Stempel sangat praktis tinggal langsung cap aja..., karena sudah ada tinta di dalam stempelnya...\r\n-  Tidak perlu bantalan/bak tinta\r\n-  Tinta yang sudah kami isi di dalam stempel cukup untuk sekitar 500x cap', 'product-gambar/20211027070542.jpg', '2021-10-27 07:05:42', '2021-10-27 07:05:42'),
(43, 7, 4, 11, 8, 'Spanduk flexy', 25000, 150, 600, '1-2 hari', 'Cetak Spanduk Bahan Flexy 260gr\r\n\r\nSpesifikasi:\r\n-Cetak menggunakan Print Head Konica Minolta\r\n-Bahan : Flexi 260gsm\r\n-Bahan flexi dengan serat yang halus\r\n-mesin konica minolta 512i\r\n\r\nFinishing :\r\n1. Mata ayam (lubang untuk ikat)\r\n2. Slongsong buat jepit bambu/kayu\r\n(Mohon sertakan jenis finishing yang diinginkan, Jika tidak ada keterangan finishing kita anggap tanpa finishing)', 'product-gambar/20211111033331.jpg', '2021-11-11 03:33:31', '2021-11-11 03:33:31'),
(44, 7, 4, 1, 8, 'Spanduk Baliho', 40000, 79, 500, '1-2 hari', '√ Bahan Flexi 280  tebal dan halus\r\n√ Kualitas High Resolution (mesin terbaru)\r\n√ Tinta Anti Luntur (tahan panas & hujan)\r\n√ Desain suka-suka atau bebas sesuai selera anda.', 'product-gambar/20211111033642.jpg', '2021-11-11 03:36:42', '2021-11-11 03:36:42'),
(45, 7, 3, 7, 2, 'Kartu Nama', 70000, 2997, 50, '1-2 hari', 'SPESIFIKASI:\r\n- Hasil cetak memiliki resolusi tinggi\r\n- Bahan cetak menggunakan kertas Art Carton 260 gsm\r\n- Ukuran area cetak 9 x 5,5 cm\r\n- Dicetak full colour 1 sisi atau 2 sisi\r\n- Dicetak menggunakan mesin Heidelberg\r\n- Jenis kartu Square Corner ( potongan sudut siku ) dan Rounded Corner ( potongan sudut lengkung )\r\n- Finishing laminasi Glossy, Doff / Matte, dan Non-Laminasi\r\n- Include box eksklusif, 1 box isi 100 pcs', 'product-gambar/20211111034753.jpg', '2021-11-11 03:47:53', '2021-11-11 03:47:53'),
(46, 7, 4, 5, 8, 'Roll Up Banner', 80000, 246, 700, '1-2 hari', 'Yang Akan Anda Dapatkan Adalah Sebagai Berikut:\r\n1) Stand Only Ukuran 60x160cm (Banner Tidak Termasuk)\r\n2) Sarung / Tas Stand Roll Up', 'product-gambar/20211111035021.jpg', '2021-11-11 03:50:21', '2021-11-11 03:50:21'),
(47, 7, 6, 12, 1, 'Stempel', 40000, 1440, 100, '1-2 hari', 'Keunggulan produk kami :\r\n-  Stempel sangat praktis tinggal langsung cap aja..., \r\nkarena sudah ada tinta di dalam stempelnya...\r\n-  Tidak perlu bantalan/bak tinta\r\n-  Tinta yang sudah kami isi di dalam stempel cukup untuk sekitar 500x cap\r\n\r\nUkuran STANDAR :\r\n- Bulat 28mm\r\n- Bulat 35mm\r\n- Bulat 40mm\r\n- Bulat 45mm\r\n- 13x55mm\r\n- 17x55mm\r\n- 22x43mm\r\n- 22x55mm\r\n- 27x43mm\r\n- 27x55mm\r\n- 35x35mm\r\n- Oval 45mm', 'product-gambar/20211111035942.jpg', '2021-11-11 03:59:42', '2021-11-11 03:59:42'),
(48, 7, 2, 13, 1, 'Faktur', 10000, 471, 100, '1-2 hari', 'Deskripsi Produk\r\n* Size 210 x 160mm.\r\n* 1 Faktur isi 25 lembar.\r\n* NCR 3 ply.', 'product-gambar/20211111040352.PNG', '2021-11-11 04:03:52', '2021-11-11 04:03:52'),
(49, 7, 7, 5, 8, 'One way', 62000, 500, 300, '1-3 hari', 'BISA DI PSANG DI SEMUA KACA \r\n- JENDELA RUMAH \r\n- GEDUNG PERKANTORAN\r\n- MOBIL\r\nJENIS ONE WAY\r\nPeredam Panas Dan Anti Uv\r\nLebar: 152 cm\r\nPanjang 50 cm per quantity (Harga per meter lari)', 'product-gambar/20211111040924.jpg', '2021-11-11 04:09:24', '2021-11-11 04:09:24'),
(50, 7, 4, 6, 8, 'umbul-umbul', 35000, 600, 300, '1-2 hari', 'UMBUL UMBUL CUSTOM LOGO BEBAS tulisan bebas (harga tersebut udh termasuk sablon logo dan tulisannya) \r\nBahan kain polyster veles', 'product-gambar/20211111041138.jpg', '2021-11-11 04:11:38', '2021-11-11 04:11:38'),
(51, 7, 2, 14, 9, 'Brosur', 250000, 2996, 30, '1-2 hari', 'Brosur ukuran :  A5 (14.8x21cm) \r\nKertas : Art Paper 120 gram (Mengkilap)\r\nCetak : \r\n2 Sisi\r\nJumlah per paket  : 500 Lembar (1 Rim)', 'product-gambar/20211111041801.jpg', '2021-11-11 04:18:01', '2021-11-11 04:18:01'),
(52, 7, 4, 3, 8, 'Neon Box', 500000, 97, 1000, '1-3 hari', 'Keterangan Barang :\r\n\r\n- Bagian depan akrilik putih susu 3mm\r\n- Bagian belakang PVC Board 8mm\r\n- Lampu LED strip chip 2835 (12 bh x 1,5 w = 18 w)\r\n- Daya 6 watt /meter\r\n- DC 12 volt\r\n- Power suply\r\n- Bisa dipakai untuk indoor atau outdoor\r\n- Kabel power NYM 0,75mm x 200mm x 3m (jika lebih akan dikenakan tambahan biaya 10,000/m\r\n- Stop kontak On / Off', 'product-gambar/20211111042133.jpg', '2021-11-11 04:21:33', '2021-11-11 04:21:33'),
(55, 13, 3, 8, 1, 'ID Card', 15000, 322, 100, '2 hari', 'Cetak id card bisa 2 sisi ( depan belakang) harga sama', 'product-gambar/20220209075500.jpg', '2022-02-09 07:55:00', '2022-02-09 07:55:00'),
(56, 13, 4, 2, 8, 'Spanduk', 45000, 339, 500, '4 hari', 'Menerima berbagai macam cetak spanduk\r\nBagi rekan-rekan yang sudah punya usaha tapi belum ada spanduknya,\r\nbisa order spanduk di tempat kami. Harga murah, bahan Tebal pengerjaan Cepat.', 'product-gambar/20220209075842.jpg', '2022-02-09 07:58:42', '2022-02-09 07:58:42'),
(57, 13, 3, 7, 2, 'Kartu Nama', 73000, 394, 800, '2 hari', 'PILIH VARIASI : \r\n~~ 1 MUKA (1 Sisi) /  2 MUKA (Bulak balik) ~~', 'product-gambar/20220209080057.jpg', '2022-02-09 08:00:57', '2022-02-09 08:00:57'),
(59, 17, 4, 11, 8, 'spanduk', 30000, 500, 340, '2-4 hari', 'KETEBALAN 340 GRAM HI-RES (HIGH- RESOLUTION)\r\n✔ REVISI MAKSIMAL 5x\r\n✔ REVISI LEBIH DARI 5x DIKENAKAN BIAYA DESIGN 20K\r\n✔ REVISI SETELAH FIX, DIKENAKAN BIAYA DESIGN 20K\r\n\r\nMINIMAL ORDER 2 PCS (2m x 1m)', 'product-gambar/20220217025715.jpg', '2022-02-17 02:57:15', '2022-02-17 02:57:15'),
(60, 17, 3, 3, 2, 'name card', 90000, 600, 900, '2-5 hari', 'Ukuran: dudukan penutup: 8 * 10.2cm kartu kertas: 5 * 8cm lanyard: 47cm\r\nWarna: 9 Warna sebagai gambar\r\nPaket: 1 x Tempat kartu\r\n\r\nCatatan: Warna foto mungkin sedikit berbeda dari produk yang sebenarnya karena tampilan warna monitor yang berbeda', 'product-gambar/20220217030828.jpg', '2022-02-17 03:08:28', '2022-02-17 03:08:28'),
(61, 17, 2, 9, 1, 'undangan', 950, 1000, 150, '3-6 hari', '- Kualitas Produk Dijamin berkualitas di kelas nya, Berbahan kertas tebal 150 & 210 Gram dan dicetak dengan mesin cetak yang memakai tinta anti luntur (Bukan dicetak Printer ya). \r\n- Jenis Model Undangan Lipat 2 (Bifold) dengan Ukuran Tertutup 13.5 x 19 cm & Terbuka 27 x 19 cm\r\nFree : \r\n- Plastik Undangan \r\n- Label Nama \r\n- Kartu Tanda Ucapan Terima kasih\r\n\r\nMin. Order 100 Undangan\r\n\r\nSETELAH KAKA MELAKUKAN ORDER, KIRIM DATA UNDANGAN KE CHAT PENJUAL', 'product-gambar/20220217031506.jpg', '2022-02-17 03:15:06', '2022-02-17 03:15:06'),
(62, 17, 6, 10, 1, 'stempel', 50000, 285, 100, '2-4 hari', 'Tambah Tinta \r\n (Order Jika ada penambahan Warna / lebih dari 1 warna)\r\n\r\n\r\n\r\n⬇⬇ Ukuran Gagang ⬇⬇\r\n\r\nKecil :\r\n12 mm (Bulat)\r\n17 mm (Bulat)\r\n13 x 40 mm (Persegi Panjang)\r\n22 x 22 mm (Kotak)\r\n\r\nStandard :\r\n25 mm (Bulat)\r\n28 mm (Bulat)\r\n35 mm (Bulat)\r\n40 mm (Bulat)\r\n35 x 35 mm (Kotak)\r\n17 x 43 mm (Persegi Panjang)\r\n22 x 43 mm (Persegi Panjang)\r\n27 x 43 mm (Persegi Panjang)\r\n32 x 43 mm (Persegi Panjang)\r\n13 x 55 mm (Persegi Panjang)\r\n17 x 55 mm (Persegi Panjang)\r\n22 x 55 mm (Persegi Panjang)\r\n27 x 55 mm (Persegi Panjang)\r\n\r\nBesar :\r\n42 mm (Bulat)\r\n45 mm (Bulat)\r\n35 x 51 mm (Oval)\r\n40 x 40 mm (Kotak)\r\n32 x 55 mm (Persegi Panjang)\r\n13 x 70 mm (Persegi Panjang)\r\n17 x 67 mm (Persegi Panjang)\r\n22 x 67 mm (Persegi Panjang)\r\n27 x 67 mm (Persegi Panjang)\r\n\r\nNOTE :\r\nUkuran yang tertera diatas adalah ukuran gagang stempel. untuk ukuran jadi stempel dikurangin 2MM dari Ukuran gagang. contoh Bulat 35mm ukuran jadinya 33mm, 22x55mm ukuran jadinya 20x53mm dst.\r\n\r\n\r\n⬇⬇ Warna Pilihan ⬇⬇\r\nMerah, Biru Tua, Biru Muda, Hijau Tua, Hijau Muda, Orange, Kuning, Pink, Abu - Abu, Cokelat, Hitam, Ungu', 'product-gambar/20220217032216.jpg', '2022-02-17 03:22:16', '2022-02-17 03:22:16'),
(63, 17, 7, 15, 2, 'pin', 15000, 500, 200, '2-5 hari', 'Harap di perhatikan :\r\n1. Desain sudah harus siap cetak, tanpa permintaan edit perubahan warna desain. Bila ada permintaan perubahan desain maka akan dikenakan biaya.\r\n2. Kualitas cetak tergantung kualitas gambar yg dikirim, bila resolusinya bagus akan tercetak bagus, bila resolusi rendah makan akan tercetak kurang bagus.\r\n\r\nAdapun syarat & ketentuan yang kami berikan :\r\n- Tanpa PO , Bukan berarti langsung dikirim jam itu juga , maka itu anda juga perlu tau bahwa produk ini adalah produk custom yang artinya membutuhkan waktu untuk proses cetak , dan anda sendiri yang akan menentukan gambar apa yang akan dicetak .\r\n- Untuk pengiriman Produk MAX H+2 Setelah Design Fix Kita terima\r\n- Mohon Diperhatikan Untuk Mencamtumkan Nomor Hp yg aktif atau nomor WA yg aktif agar Kita Mudah mengkonfirmasi Design Yg kurang Jelas\r\n- Untuk pesanan yang bentuknya urgent, bisa langsung hubungi kami .', 'product-gambar/20220217033015.jpg', '2022-02-17 03:30:15', '2022-02-17 03:30:15'),
(64, 17, 7, 16, 1, 'stiker', 2000, 770, 100, '2-4 hari', 'Stiker Pack Sponsor Racing Dapet Banyak\r\n Seperti Di Iklan\r\nBahan Hologram + Laminasi glossy (ANTI AIR) \r\nBahan oraccal Terbaik \r\n\r\n catatan: minmal belanja 10 pcs', 'product-gambar/20220217033937.jpg', '2022-02-17 03:39:37', '2022-02-17 03:39:37'),
(66, 17, 4, 11, 8, 'banner', 40000, 300, 340, '3-6 hari', 'Print Spanduk Banner Flexi Premium 260 Gram Ukuran 160x60cm.\r\n- Sudah Termasuk Tiang X-Banner Fiber Lengkap dan Berkualitas.\r\n- Dicetak di Mesin Starfire GongZheng GZC 10PL (PicoLiter) Tajam.\r\n- Belum Termasuk Ongkos Desain dan Setting, harap segera kirim file siap print agar proses cepat dan murah. \r\n\r\n- Pastikan sebelum memesan, file sudah dalam bentuk file siap print\r\n- Format file : PDF / JPEG / PNG / RAR\r\n\r\nUntuk info lebih lengkap bisa chat penjual terlebih dahulu dan untuk menghindari terjadinya kesalahan dalam pemesanan', 'product-gambar/20220217034527.jpg', '2022-02-17 03:45:27', '2022-02-17 03:45:27'),
(67, 17, 7, 5, 1, 'one way', 30000, 300, 500, '3-6 hari', 'Spesifikasi\r\n- Bahan Sticker ONE WAY VISION\r\n- Harga per meter persegi\r\n- Ukuran lebar maksimal 1.2 meter\r\n- Ukuran Panjang Bebas\r\n\r\nContoh Order\r\n1m x 2m x 2 pcs masukkan jumlah order 6\r\n\r\nJika ukuran tidak bulat akan di bulatkan keatas\r\ncontoh 1,2m x 2m x 1 pcs masukan jumlah order 3\r\n\r\nFORMAT TULIS DI KETERANGAN :\r\nPANJANG x LEBAR + JUMLAH\r\n\r\nCetak High Ress & Full Colour', 'product-gambar/20220217035003.jpg', '2022-02-17 03:50:03', '2022-02-17 03:50:03'),
(68, 17, 4, 3, 8, 'neon box', 400000, 80, 10000, '4-7 hari', 'NEON BOX ASLI BERKUALITAS ,BUKAN ABAL2 HARGA MURAH.\r\nWAJIB CHECKOUT PACKING KAYU \r\nbisa dibuka di etalase toko kami. <-- masukan kedalam 1 keranjang\r\n\r\nSmart Buyer MOHON DIBACA ya kak !!!\r\nBerikut deskripsi spek lengkap dan cara pemesanan ya kak.\r\n \r\n*HARGA TERTERA ADALAH HARGA PER 1 CM²\r\n- Bentuk Bulat dan Kotak = ( Rp.350 / 1 cm² ) \r\n- Bentuk Persegi Panjang = ( Rp.450 / 1 cm² )\r\njasa design tidak berbayar = GRATIS!!!\r\n\r\n*HARGA TOTAL SESUAI DENGAN REQUEST UKURAN YANG ANDA BUTUHKAN.\r\n\r\n*NEON BOX CUSTOM Bebas Design 2 SISI ( paket lengkap tinggal pasang ).\r\n- Material Akrilik merk MC yang jelas kualitasnya  .\r\n- Termasuk Custom 2 Sisi Layer ( cuting stiker oracal & printing multicolour ).\r\n- Lampu yang kami pake Led Module 3 Mata (bukan LED STRIP yang harganya lebih murah) \r\n + Adaptor 12v 5a - 10a + kabel + colokan.\r\n- Termasuk Bracket Besi .\r\n- Paket lengkap ini sudah tinggal pasang dan siap pakai untuk daya tarik outlet atau toko anda.\r\n- pemasangan mudah bracket besi di tempel di media tembok / tiang / pagar / bahkan pohon ,tinggal di baut saja.', 'product-gambar/20220217035435.jpg', '2022-02-17 03:54:35', '2022-02-17 03:54:35'),
(69, 13, 7, 16, 1, 'stiker', 3000, 480, 100, '2-4 hari', '1 LEMBAR ISI MULAI DARI 13/22/25/26/27/30\r\n- BAHAN VINYL dan HOLOGRAM\r\n- DILAPISI LAMINASI GLOSSY ANTI AIR\r\n- BELUM DIPOTONG (POTONG SENDIRI) \r\n- DESAIN TAJAM, GAMBAR TIDAK PECAH\r\n- BAHAN TEBAL DAN LENTUR, SANGAT MUDAH DIPASANG\r\n- BAHAN LEM KUAT NAMUN TIDAK MENINGGALKAN BEKAS KETIKA MAU DILEPAS LAGI\r\n- KETAHANAN TINTA 3-4 TAHUN\r\n- PENGIRIMAN SETIAP JAM 5 SORE\r\n- ORDERAN YANG SUDAH MASUK LANGSUNG DIPROSES DAN TIDAK BISA DIBATALKAN DENGAN ALASAN APAPUN\r\n- PAKET YANG SUDAH MASUK STATUS DIKIRIM, SEPENUHNYA TANGGUNG JAWAB EKSPEDISI\r\n- BARANG YG DIKIRIM SELALU DALAM KONDISI KEADAAN BAIK DAN BAGUS\r\nCATATAN :\r\nminimal belanja 10 pcs', 'product-gambar/20220217040323.jpg', '2022-02-17 04:03:23', '2022-02-17 04:03:23'),
(70, 13, 4, 11, 8, 'banner', 80000, 297, 340, '2-5 hari', 'roll up banner ukuran 60x180 cm hanya rangka \r\nspesifikasi:\r\n-rangka roll up banner 60x180 cm\r\n-tas roll up\r\n-tiang roll up\r\n-layar roll up\r\nnote:tidak termasuk media cetak/spanduknya', 'product-gambar/20220217040827.jpg', '2022-02-17 04:08:27', '2022-02-17 04:08:27');

-- --------------------------------------------------------

--
-- Table structure for table `province`
--

CREATE TABLE `province` (
  `id_province` int(11) UNSIGNED NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `province`
--

INSERT INTO `province` (`id_province`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bali', '2021-12-31 07:53:41', '2021-12-31 07:53:41'),
(2, 'Bangka Belitung', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(3, 'Banten', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(4, 'Bengkulu', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(5, 'DI Yogyakarta', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(6, 'DKI Jakarta', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(7, 'Gorontalo', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(8, 'Jambi', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(9, 'Jawa Barat', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(10, 'Jawa Tengah', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(11, 'Jawa Timur', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(12, 'Kalimantan Barat', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(13, 'Kalimantan Selatan', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(14, 'Kalimantan Tengah', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(15, 'Kalimantan Timur', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(16, 'Kalimantan Utara', '2021-12-31 07:53:42', '2021-12-31 07:53:42'),
(17, 'Kepulauan Riau', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(18, 'Lampung', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(19, 'Maluku', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(20, 'Maluku Utara', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(21, 'Nanggroe Aceh Darussalam (NAD)', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(22, 'Nusa Tenggara Barat (NTB)', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(23, 'Nusa Tenggara Timur (NTT)', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(24, 'Papua', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(25, 'Papua Barat', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(26, 'Riau', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(27, 'Sulawesi Barat', '2021-12-31 07:53:43', '2021-12-31 07:53:43'),
(28, 'Sulawesi Selatan', '2021-12-31 07:53:44', '2021-12-31 07:53:44'),
(29, 'Sulawesi Tengah', '2021-12-31 07:53:44', '2021-12-31 07:53:44'),
(30, 'Sulawesi Tenggara', '2021-12-31 07:53:44', '2021-12-31 07:53:44'),
(31, 'Sulawesi Utara', '2021-12-31 07:53:44', '2021-12-31 07:53:44'),
(32, 'Sumatera Barat', '2021-12-31 07:53:44', '2021-12-31 07:53:44'),
(33, 'Sumatera Selatan', '2021-12-31 07:53:44', '2021-12-31 07:53:44'),
(34, 'Sumatera Utara', '2021-12-31 07:53:44', '2021-12-31 07:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rek` int(11) NOT NULL,
  `id_bank` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `no_rek` varchar(50) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rek`, `id_bank`, `id_user`, `no_rek`, `nama_pemilik`, `created_at`, `updated_at`) VALUES
(17, 3, 1, '9829828903', 'Dprint', '2022-01-23 00:27:12', '2022-01-23 00:27:12'),
(18, 1, 1, '781782772127', 'Dprint', '2022-01-23 00:27:47', '2022-01-23 00:27:47'),
(20, 2, 1, '55627189203', 'Dprint', '2022-01-23 00:32:42', '2022-01-23 00:32:42'),
(21, 7, 1, '567389238983', 'Dprint', '2022-01-23 00:33:09', '2022-01-23 00:33:09'),
(23, 1, 34, '8928736783', 'CentralDigital', '2022-02-09 07:32:34', '2022-02-09 07:32:34'),
(25, 1, 18, '6273688901', 'NR Digital', '2022-02-12 03:35:35', '2022-02-12 03:35:35'),
(26, 1, 23, '5554257267', 'CemerlangDigital', '2022-02-16 05:14:37', '2022-02-16 05:14:37'),
(27, 1, 22, '5567354638', 'Tiga Putra Digital', '2022-02-16 05:20:35', '2022-02-16 05:20:35'),
(28, 1, 40, '5673699190', 'Stargraf Digital', '2022-02-16 05:22:55', '2022-02-16 05:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-08-19 02:06:19', '2021-08-19 02:06:19'),
(2, 'percetakan', 'web', '2021-08-19 02:06:20', '2021-08-19 02:06:20'),
(3, 'pelanggan', 'web', '2021-08-19 02:06:20', '2021-08-19 02:06:20');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `satuan_produk`
--

CREATE TABLE `satuan_produk` (
  `id_satuan_produk` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan_produk`
--

INSERT INTO `satuan_produk` (`id_satuan_produk`, `satuan`) VALUES
(1, 'pcs'),
(2, 'kotak'),
(8, 'meter'),
(9, 'rim');

-- --------------------------------------------------------

--
-- Table structure for table `shop_payment`
--

CREATE TABLE `shop_payment` (
  `id` int(11) NOT NULL,
  `id_percetakan` int(11) NOT NULL,
  `no_rek_pengirim` varchar(255) NOT NULL,
  `no_rek_penerima` varchar(255) NOT NULL,
  `jml_transfer` varchar(255) NOT NULL,
  `bukti_transfer` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop_payment`
--

INSERT INTO `shop_payment` (`id`, `id_percetakan`, `no_rek_pengirim`, `no_rek_penerima`, `jml_transfer`, `bukti_transfer`, `status`, `created_at`, `updated_at`) VALUES
(6, 10, 'BRI - 632763286 - Dprint', 'BRI - 5554257267 - CemerlangDigital', 'Rp.240,000', '20220217205557.jpg', 'lunas', '2022-02-17 13:55:57', '2022-02-17 13:55:57'),
(8, 7, 'BRI - 632763286 - Dprint', 'BRI - 6273688901 - NR Digital', 'Rp.110,000', '20220220104318.jpeg', 'lunas', '2022-02-20 03:43:18', '2022-02-20 03:43:18'),
(11, 13, 'BRI - 632763286 - Dprint', 'BRI - 8928736783 - CentralDigital', 'Rp.1,411,000', '20220222234839.jpeg', 'lunas', '2022-02-22 16:48:39', '2022-02-22 16:48:39');

-- --------------------------------------------------------

--
-- Table structure for table `status_pesanan`
--

CREATE TABLE `status_pesanan` (
  `id` int(11) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status_pesanan`
--

INSERT INTO `status_pesanan` (`id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Belum bayar', '2021-10-21 22:17:53', '2021-10-21 22:17:53'),
(2, 'Dibayar', '2021-10-21 22:17:53', '2021-10-21 22:17:53'),
(3, 'Diproses', '2021-10-21 22:18:18', '2021-10-21 22:18:18'),
(4, 'Dikirim', '2021-10-21 22:18:18', '2021-10-21 22:18:18'),
(5, 'Diterima', '2021-10-21 22:18:49', '2021-10-21 22:18:49'),
(6, 'Dibatalkan\r\n', '2021-10-22 02:22:28', '2021-10-22 02:22:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_province` int(11) UNSIGNED DEFAULT NULL,
  `id_city` int(11) UNSIGNED DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `id_role` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `id_province`, `id_city`, `kode_pos`, `id_role`, `foto`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, NULL, NULL, 1, NULL, NULL, '$2y$10$W40r0g3zldLJk56qeL5WRudYIH/zr0d57aJZaXL/r2y4WumdT472i', NULL, '2021-08-18 19:06:21', '2021-08-18 19:06:21'),
(18, 'NR DIGITAL PRINTING', 'nrdigitalprinting@gmail.com', 32, 421, 27356, 2, '20220217055949.jpg', NULL, '$2y$10$dzfD5x7htIp/2AY.qTjEaeLyUo/013oOVFl8uaRMXbcb6klMhSeOm', NULL, '2021-08-26 18:54:05', '2022-02-16 22:59:49'),
(22, 'tigaputra', 'tigaputra1401@gmail.com', 32, 421, 27356, 2, '20220217060126.jpg', NULL, '$2y$10$31BDMa4FHLt946ok2NO01Ot9MBOIfEMWejK9h4W4A4w4uuOtBTBbi', NULL, '2021-09-09 16:30:53', '2022-02-16 23:01:26'),
(23, 'cdp', 'cemerlangdigital.1solok@gmail.com', 32, 421, 27356, 2, '20220217055843.jpg', NULL, '$2y$10$EsL10o1SpMR7/ENX9BjyguzR6eZBLSRdN4tK6FliHHAR.aJasXLMi', NULL, '2021-09-09 17:13:19', '2022-02-16 22:58:43'),
(34, 'Central Digital Printing', 'centraldigital@gmail.com', 32, 421, 27356, 2, '20220217055917.jpg', NULL, '$2y$10$YE5ZsjrGPJhAqFZZmu9BxeP0QGiQJPfZmWPnwTPBHwRGK.ur5Hrjq', NULL, '2021-09-22 01:46:26', '2022-02-16 22:59:17'),
(40, 'STARGRAF DIGITAL PRINTING', 'stargrafsolok@gmail.com', 32, 421, 27356, 2, '20220217060032.jpg', NULL, '$2y$10$qoLgqOUUVueN6FCehk7wy.HCqbocl7wWgrqjEJz2PVxpL.2o9mNRK', NULL, '2021-09-22 15:09:12', '2022-02-16 23:00:32'),
(46, 'ilfiza', 'ilfiza@gmail.com', 32, 32, 273544, 3, NULL, NULL, '$2y$10$znHjQJHRQmZKJdAgt6aoYuANQWFaTd0IKOz912FonK4HIus0Jbcv2', NULL, '2021-11-08 17:48:42', '2022-02-20 02:10:45'),
(54, 'ania', 'ani@gmail.com', 32, 32, 25163, 3, NULL, NULL, '$2y$10$q9SfqdRokQ.psr.Vr7Kzoek5vKIvmkZJgjPrj9HuQTIfLpIRxl4Xq', NULL, '2021-11-09 15:45:52', '2022-02-13 20:24:37'),
(55, 'sastra', 'sastra@gmail.com', 32, 318, NULL, 3, NULL, NULL, '$2y$10$u2bftygQ9Sgs83QQda6Qs.2bbdJU1QxBJevfV.kUdZ2NIWaMXu5LK', NULL, '2022-01-01 15:29:49', '2022-01-02 23:15:01'),
(61, 'iii', 'ii@gmail.com', 32, 12, 27354, 3, NULL, NULL, '$2y$10$E3bAsALBoHK/0ajTgFQpJeSaW967.X3F1gbVvxK90Av/J3M.INhYu', NULL, '2022-01-24 01:39:54', '2022-01-24 01:39:54'),
(65, 'fiza', 'fiza@gmail.com', 32, 12, 27354, 3, NULL, NULL, '$2y$10$IDcJ6BRALR.ZGTVpBGJao.NOSxAqv1iB08vX1zKHq6Q4mxWsqqOvu', NULL, '2022-01-31 17:17:56', '2022-01-31 18:36:46'),
(66, 'mutiara', 'mutiara@gmail.com', 32, 421, 27354, 3, NULL, NULL, '$2y$10$mBm1/IXSpWqpqVE.pkV3GevWLMtftqLSO1xSxGTpDizYmonLux2ei', NULL, '2022-01-31 18:39:57', '2022-01-31 22:41:55'),
(90, 'mutia', 'mutia@gmail.com', 32, 421, 24537, 3, NULL, NULL, '$2y$10$3yulsIZtK7J0dT4ZE/3SeeBnr8oSMlqj0aoNVf5gQ4Hut0dIyijDa', NULL, '2022-02-09 20:27:36', '2022-02-19 19:20:17'),
(91, 'saya', 'saya@gmail.com', 32, 32, 24534, 3, NULL, NULL, '$2y$10$9Z9qKY1cG60wvChXXxqNLeN0J7YUhXFMyeOYjwMkuIr.ABNhYkGaO', NULL, '2022-02-10 08:58:31', '2022-02-10 09:00:06'),
(92, 'Hani', 'hani@gmail.com', 32, 422, 27354, 3, NULL, NULL, '$2y$10$p3UT8kZR9bsLl5AJsWFURujSQfO0UPGWypCDnHUkDHdrZuhPZy.Z.', NULL, '2022-02-13 20:25:43', '2022-02-13 20:37:22'),
(98, 'Bengkel Print', 'bpsumbar@gmail.com', 32, 421, 27317, 2, NULL, NULL, '$2y$10$CH.hVHirHR9Ra1C4o6GN9OHImt4It9xPHc6s8D6T.pOh.0mqitWAe', NULL, '2022-02-16 21:59:39', '2022-02-16 23:01:56'),
(99, 'Cover Advertising- Digital Printing Kota Solok', 'cover@gmail.com', 32, 421, 27311, 2, NULL, NULL, '$2y$10$qpm6LrrV8/YMdLRQpaiDdeTEzsoc59xv/cNjOfxVtWgEIiIZOAPNK', NULL, '2022-02-16 22:08:44', '2022-02-16 23:02:20'),
(103, 'Djoyo Digital Pinting', 'djoyodigital1@gmail.com', 32, 421, 27317, 2, NULL, NULL, '$2y$10$i3VWj/rxgiPriQ6gtMFqfOqfxGojs1RDlVCoAVAe7cSOVDO.yyenC', NULL, '2022-02-16 23:27:01', '2022-02-16 23:27:01'),
(104, 'AR Digital', 'ardigital@gmail.com', 32, 421, 27317, 2, NULL, NULL, '$2y$10$CTMCkwI2pmHyYJ6q93XQ1Ok0SVY0eLL.A6UsoG54N6TWe8eQuoOOy', NULL, '2022-02-16 23:30:12', '2022-02-16 23:30:12'),
(105, 'andi', 'andi@gmail.com', 32, 411, 27317, 3, NULL, NULL, '$2y$10$NxYKItuNUxQMSGd6Lc9t0efyTXunKhQiFE9hjRFzWb6ZuZoeP/bRS', NULL, '2022-02-17 19:35:04', '2022-02-19 18:36:41'),
(106, 'dini', 'dini@gmail.com', 32, 421, 24534, 3, NULL, NULL, '$2y$10$pAq7AWj8NO6InRs33I/qvOtUs5HZe2gNuQk.MADhbuOY0PTT.7Swa', NULL, '2022-02-17 20:53:48', '2022-02-19 20:14:00'),
(111, 'fiza', 'fizaaa@gmail.com', 32, 421, 27317, 3, NULL, NULL, '$2y$10$EaKUUxgoYvdVBsV9IRQ9u.vg5DajbaSo9ZR7Cei3S7UCiTaTxEYo.', NULL, '2022-02-20 21:34:51', '2022-02-20 21:39:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_frees`
--
ALTER TABLE `admin_frees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_percetakan` (`id_percetakan`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_percetakan` (`id_percetakan`);

--
-- Indexes for table `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_produk` (`id_produk`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_percetakan` (`id_percetakan`);

--
-- Indexes for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  ADD PRIMARY KEY (`id_konfirmasi`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_city`),
  ADD KEY `id_province` (`id_province`);

--
-- Indexes for table `kurirs`
--
ALTER TABLE `kurirs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `percetakan`
--
ALTER TABLE `percetakan`
  ADD PRIMARY KEY (`id_percetakan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_status_pesanan` (`id_status_pesanan`),
  ADD KEY `id_city` (`id_city`),
  ADD KEY `id_province` (`id_province`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `id_percetakan` (`id_percetakan`),
  ADD KEY `id_satuan_produk` (`id_satuan_produk`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indexes for table `province`
--
ALTER TABLE `province`
  ADD PRIMARY KEY (`id_province`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rek`),
  ADD KEY `id_bank` (`id_bank`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `satuan_produk`
--
ALTER TABLE `satuan_produk`
  ADD PRIMARY KEY (`id_satuan_produk`);

--
-- Indexes for table `shop_payment`
--
ALTER TABLE `shop_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_percetakan` (`id_percetakan`);

--
-- Indexes for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_frees`
--
ALTER TABLE `admin_frees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id_bank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT for table `konfirmasi_pembayaran`
--
ALTER TABLE `konfirmasi_pembayaran`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id_city` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=502;

--
-- AUTO_INCREMENT for table `kurirs`
--
ALTER TABLE `kurirs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=340;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `percetakan`
--
ALTER TABLE `percetakan`
  MODIFY `id_percetakan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `province`
--
ALTER TABLE `province`
  MODIFY `id_province` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan_produk`
--
ALTER TABLE `satuan_produk`
  MODIFY `id_satuan_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `shop_payment`
--
ALTER TABLE `shop_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `status_pesanan`
--
ALTER TABLE `status_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_percetakan`) REFERENCES `percetakan` (`id_percetakan`);

--
-- Constraints for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_status_pesanan`) REFERENCES `status_pesanan` (`id`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`id_city`) REFERENCES `kota` (`id_city`),
  ADD CONSTRAINT `pesanan_ibfk_3` FOREIGN KEY (`id_province`) REFERENCES `province` (`id_province`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_ibfk_4` FOREIGN KEY (`id_percetakan`) REFERENCES `percetakan` (`id_percetakan`),
  ADD CONSTRAINT `produk_ibfk_5` FOREIGN KEY (`id_satuan_produk`) REFERENCES `satuan_produk` (`id_satuan_produk`),
  ADD CONSTRAINT `produk_ibfk_6` FOREIGN KEY (`id_bahan`) REFERENCES `bahan` (`id_bahan`),
  ADD CONSTRAINT `produk_ibfk_7` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`);

--
-- Constraints for table `rekening`
--
ALTER TABLE `rekening`
  ADD CONSTRAINT `rekening_ibfk_1` FOREIGN KEY (`id_bank`) REFERENCES `bank` (`id_bank`),
  ADD CONSTRAINT `rekening_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `shop_payment`
--
ALTER TABLE `shop_payment`
  ADD CONSTRAINT `shop_payment_ibfk_1` FOREIGN KEY (`id_percetakan`) REFERENCES `percetakan` (`id_percetakan`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
