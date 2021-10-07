-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 10:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(10) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `name`, `slug`, `image`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Banner 1', 'banner-1', 'uploads/banner/1624975943_banner.jpg', 1, '2021-06-29 07:12:23', '2021-06-29 07:12:23'),
(2, 'Banner 2', 'banner-2', 'uploads/banner/1626335513_1t43vz.jpg', 1, '2021-07-15 07:51:53', '2021-07-15 00:51:53'),
(3, 'banner 3', 'banner-3', 'uploads/banner/1626426545_Image-5-1.png', 1, '2021-07-16 02:09:05', '2021-07-16 02:09:05');

-- --------------------------------------------------------

--
-- Table structure for table `booking_cars`
--

CREATE TABLE `booking_cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_cars`
--

INSERT INTO `booking_cars` (`id`, `name`, `email`, `phone`, `address`, `note`, `price`, `status`, `user_id`, `car_id`, `created_at`, `updated_at`) VALUES
(1, 'Trung Hưng', 'trunghung@gmail.com', 346713429, 'HN', 'Đến xem xe vào ngày 15/7/2021', 630000000, 2, 3, 1, '2021-07-15 09:33:53', '2021-07-15 02:33:53'),
(3, 'Trung Hưng', 'trunghung@gmail.com', 346713429, 'HN', 'hen den xem xe vao ngay 7/16', 630000000, 2, 3, 1, '2021-07-16 09:19:07', '2021-07-16 02:19:07'),
(4, 'Hưng', 'zztrunghungzz@gmail.com', 395139875, 'Hà Nội', 'Hẹn 15/6', 630000000, 0, 2, 1, '2021-07-16 02:24:15', '2021-07-16 02:24:15');

-- --------------------------------------------------------

--
-- Table structure for table `booking_servicedetail`
--

CREATE TABLE `booking_servicedetail` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `booking_service_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_servicedetail`
--

INSERT INTO `booking_servicedetail` (`id`, `title`, `price`, `image`, `booking_service_id`, `service_id`, `created_at`, `updated_at`) VALUES
(1, 'DỌN NỘI THẤT', 1000000, 'uploads/service/1624977284_don noi that-min.jpg', 3, 4, '2021-07-15 02:08:32', '2021-07-15 02:08:32'),
(2, 'SƠN NHANH', 1000000, 'uploads/service/1624977028_tải xuống.jpg', 3, 3, '2021-07-15 02:08:32', '2021-07-15 02:08:32'),
(4, 'DỌN NỘI THẤT', 1000000, 'uploads/service/1624977284_don noi that-min.jpg', 5, 4, '2021-07-16 02:06:37', '2021-07-16 02:06:37'),
(5, 'BẢO DƯỠNG NHANH', 2000000, 'uploads/service/1624976902_TTX_Dichvusuachua_1-101d9458d083b49f41470ae9fd66d702.jpg', 5, 2, '2021-07-16 02:06:37', '2021-07-16 02:06:37');

-- --------------------------------------------------------

--
-- Table structure for table `booking_services`
--

CREATE TABLE `booking_services` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `total_price` int(11) NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_services`
--

INSERT INTO `booking_services` (`id`, `name`, `phone`, `email`, `address`, `note`, `status`, `total_price`, `user_id`, `created_at`, `updated_at`) VALUES
(3, 'Trung Hưng', 346713429, 'trunghung@gmail.com', 'HN', 'Hẹn dịch vụ vào ngày 15/7/2021', 1, 2000000, 3, '2021-07-15 10:07:40', '2021-07-15 10:07:40'),
(5, 'Trung Hưng', 346713429, 'trunghung@gmail.com', 'HN', 'dsadd', 1, 3000000, 3, '2021-07-16 09:16:28', '2021-07-16 02:16:28');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speed` int(11) NOT NULL,
  `engine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cylinder_capacity` int(11) NOT NULL,
  `wattage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `torque` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fuel_capacity` int(11) NOT NULL,
  `fuel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat` int(11) NOT NULL,
  `model_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `name`, `slug`, `image`, `price`, `qty`, `color`, `speed`, `engine`, `cylinder_capacity`, `wattage`, `torque`, `fuel_capacity`, `fuel`, `size`, `gear`, `seat`, `model_id`, `created_at`, `updated_at`) VALUES
(1, 'Vios GR-S', 'vios-gr-s', 'uploads/car/1624978294_VRG-S-(3R3)-1_1614032121.png', 630000000, 5, 'Đỏ ánh kim', 170, '2NR-FE', 1496, '79/6000', '140/4200', 40, 'Xăng/Petrol', '4425 x 1730 x 1475', 'Hộp số tự động vô cấp có lập trình/ CVT <10 cấp số điện tử>', 5, 1, '2021-07-16 09:22:59', '2021-07-16 02:22:59'),
(2, 'Vios 1.5G', 'vios-15g', 'uploads/car/1626334263_VG-(089)-1_1613996015.png', 590000000, 3, 'Trắng', 170, '2NR-FE', 1496, '79/6000', '140/4200', 40, 'Xăng/Petrol', '4425 x 1730 x 1475', 'Hộp số tự động vô cấp/ CVT', 5, 1, '2021-07-15 00:31:03', '2021-07-15 00:31:03'),
(3, 'Fortuner Legender 2.8AT 4x4', 'fortuner-legender-28at-4x4', 'uploads/car/1626335374_trang-070-min_1600312623.png', 1426000000, 3, 'Trắng', 180, '1GD-FTV (2.8L)', 2755, '150 (201)/3400', '500/1600', 80, 'Dầu/Diesel', '4795 x 1855 x 1835', 'Số tự động 6 cấp/6AT', 7, 3, '2021-07-15 07:50:28', '2021-07-15 00:50:28'),
(4, 'Fortuner Legender 2.4AT 4x2', 'fortuner-legender-24at-4x2', 'uploads/car/1626336563_trang-070-min_1600312623.png', 1080000000, 3, 'Trắng', 170, '2GD-FTV (2.4L)', 2393, '110 (147)/3400', '400/1600', 80, 'Dầu/Diesel', '4795 x 1855 x 1835', 'Số tự động 6 cấp/6AT', 7, 3, '2021-07-15 01:09:23', '2021-07-15 01:09:23'),
(5, 'Camry 2.5Q', 'camry-25q', 'uploads/car/1626337397_Do-(3T3)-Q-1.png', 1235000000, 3, 'đỏ', 180, '2AR-FE, I4, 16 van, DOHC, VVT-i kép, ACIS', 2494, '133 (178) / 6000', '231 / 4100', 60, 'Xăng không chì', '4885x 1840 x 1445', 'Tự động 6 cấp', 5, 2, '2021-07-15 01:23:17', '2021-07-15 01:23:17'),
(6, 'Wigo MT5', 'wigo-mt5', 'uploads/car/1626338051_R71_ORANGE-ME-1_1594783613.png', 352000000, 3, 'Cam', 160, '3NR-VE', 1197, '(65)87/6000', '108/4200', 33, 'Xăng/Petrol', '3660 x 1600 x 1520', 'Số sàn 5 cấp/5MT', 4, 4, '2021-07-15 01:34:11', '2021-07-15 01:34:11'),
(7, 'Innova 2.0V', 'innova-20v', 'uploads/car/1626338629_4V8_AVANT-GARDE-BRONZE-1-min_1601890784.png', 989000000, 3, 'Đồng Ánh Kim', 160, 'Động cơ xăng, VVT-i kép, 4 xy lanh thẳng hàng, 16 van DOHC', 1998, '(102)/5600', '183/4000', 55, 'Xăng/Petrol', '4735x1830x1795', 'Số tự động 6 cấp', 6, 6, '2021-07-15 01:43:49', '2021-07-15 01:43:49'),
(8, 'Coralla Altis 1.8G CVT', 'coralla-altis-18g-cvt', 'uploads/car/1626339188_WHILE-070-1-min_1596182517.png', 771000000, 3, 'Trắng', 170, '2ZR-FE, 16 van DOHC, VVT-i kép, ACIS', 1798, '(103)138/6400', '172/4000', 55, 'Xăng/Petrol', '4640 x 1775 x 1460', 'Số tự động vô cấp/CVT', 5, 5, '2021-07-15 01:53:08', '2021-07-15 01:53:08'),
(9, 'Camry 3', 'camry-3', 'uploads/car/1626426728_bac-1d4-g-1.png', 1333333333, 3, 'Trắng', 160, '12dsad', 1877, 'dsasd', 'fafsaf', 60, 'Xăng', '400 x 455 x 666', '6 cấp', 5, 2, '2021-07-16 09:12:33', '2021-07-16 02:12:33');

-- --------------------------------------------------------

--
-- Table structure for table `car_imgs`
--

CREATE TABLE `car_imgs` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `car_imgs`
--

INSERT INTO `car_imgs` (`id`, `image`, `car_id`, `created_at`, `updated_at`) VALUES
(7, 'uploads/car_img/1626333782_Toyota Vios RS 4-26xfox5loeg-resize-1500.jpg', 1, '2021-07-15 00:23:02', '2021-07-15 00:23:02'),
(8, 'uploads/car_img/1626333782_Toyota Vios RS 21-2rkp9bkebdx-resize-1500.jpg', 1, '2021-07-15 00:23:02', '2021-07-15 00:23:02'),
(9, 'uploads/car_img/1626333782_Toyota Vios RS 25-c0w98f9wp8t-resize-1500.jpg', 1, '2021-07-15 00:23:02', '2021-07-15 00:23:02'),
(10, 'uploads/car_img/1626333782_Toyota Vios RS van hanh 3-resize-1500.jpg', 1, '2021-07-15 00:23:02', '2021-07-15 00:23:02'),
(11, 'uploads/car_img/1626334263_Toyota Vios White 0b-resize-1500.jpg', 2, '2021-07-15 00:31:03', '2021-07-15 00:31:03'),
(12, 'uploads/car_img/1626334263_Toyota Vios White 4-resize-1500.jpg', 2, '2021-07-15 00:31:03', '2021-07-15 00:31:03'),
(13, 'uploads/car_img/1626334263_Toyota Vios White A 6-resize-1500.jpg', 2, '2021-07-15 00:31:03', '2021-07-15 00:31:03'),
(14, 'uploads/car_img/1626334263_Toyota Vios White A 8-resize-1500.jpg', 2, '2021-07-15 00:31:03', '2021-07-15 00:31:03'),
(20, 'uploads/car_img/1626335406_buek1w-min_1600317399.jpg', 3, '2021-07-15 00:50:06', '2021-07-15 00:50:06'),
(21, 'uploads/car_img/1626335406_ihlz4l-min_1600317399.jpg', 3, '2021-07-15 00:50:06', '2021-07-15 00:50:06'),
(22, 'uploads/car_img/1626335406_qfrqkk.jpg', 3, '2021-07-15 00:50:06', '2021-07-15 00:50:06'),
(23, 'uploads/car_img/1626335406_srncxx.jpg', 3, '2021-07-15 00:50:06', '2021-07-15 00:50:06'),
(24, 'uploads/car_img/1626336563_2ed73269f4a5605c1f13c2d2e6272ae6.jpg', 4, '2021-07-15 01:09:23', '2021-07-15 01:09:23'),
(25, 'uploads/car_img/1626336563_8466dc6231033903262ee06dbbb5ce07.jpg', 4, '2021-07-15 01:09:23', '2021-07-15 01:09:23'),
(26, 'uploads/car_img/1626336563_Ngoai-That-16-01.jpg', 4, '2021-07-15 01:09:23', '2021-07-15 01:09:23'),
(27, 'uploads/car_img/1626336563_unnamed.jpg', 4, '2021-07-15 01:09:23', '2021-07-15 01:09:23'),
(28, 'uploads/car_img/1626337397_Camry-Gallery (11).jpg', 5, '2021-07-15 01:23:17', '2021-07-15 01:23:17'),
(29, 'uploads/car_img/1626337397_Camry-Gallery (16).jpg', 5, '2021-07-15 01:23:17', '2021-07-15 01:23:17'),
(30, 'uploads/car_img/1626337397_Camry-Gallery (27).jpg', 5, '2021-07-15 01:23:17', '2021-07-15 01:23:17'),
(31, 'uploads/car_img/1626337397_Camry-Gallery (32).jpg', 5, '2021-07-15 01:23:17', '2021-07-15 01:23:17'),
(32, 'uploads/car_img/1626338051_Toyota Wigo-5-resize-1500.jpg', 6, '2021-07-15 01:34:11', '2021-07-15 01:34:11'),
(33, 'uploads/car_img/1626338051_Toyota Wigo-6-resize-1500.jpg', 6, '2021-07-15 01:34:11', '2021-07-15 01:34:11'),
(34, 'uploads/car_img/1626338051_Toyota Wigo-8-resize-1500.jpg', 6, '2021-07-15 01:34:11', '2021-07-15 01:34:11'),
(35, 'uploads/car_img/1626338051_Toyota Wigo-11-resize-1500.jpg', 6, '2021-07-15 01:34:11', '2021-07-15 01:34:11'),
(36, 'uploads/car_img/1626338629_Innova V-1-resize-1500.jpg', 7, '2021-07-15 01:43:49', '2021-07-15 01:43:49'),
(37, 'uploads/car_img/1626338629_Innova V-2-resize-1500.jpg', 7, '2021-07-15 01:43:49', '2021-07-15 01:43:49'),
(38, 'uploads/car_img/1626338629_Innova V-3-resize-1500.jpg', 7, '2021-07-15 01:43:49', '2021-07-15 01:43:49'),
(39, 'uploads/car_img/1626338629_Ngoại thất Innova 2020-8-resize-1500.png', 7, '2021-07-15 01:43:49', '2021-07-15 01:43:49'),
(40, 'uploads/car_img/1626339402_3-4.jpg', 8, '2021-07-15 01:56:42', '2021-07-15 01:56:42'),
(41, 'uploads/car_img/1626339402_3351694.jpg', 8, '2021-07-15 01:56:42', '2021-07-15 01:56:42'),
(42, 'uploads/car_img/1626339402_corolla-altis-tw-1-630x331-1443.jpg', 8, '2021-07-15 01:56:42', '2021-07-15 01:56:42'),
(43, 'uploads/car_img/1626339403_toyota_corolla_hybrid_sedan_38_04f4025b079505a2.jpg', 8, '2021-07-15 01:56:43', '2021-07-15 01:56:43'),
(44, 'uploads/car_img/1626426728_Image-5-1.png', 9, '2021-07-16 02:12:08', '2021-07-16 02:12:08'),
(45, 'uploads/car_img/1626426728_Image-7-1.png', 9, '2021-07-16 02:12:08', '2021-07-16 02:12:08'),
(46, 'uploads/car_img/1626426728_Image-8-1.png', 9, '2021-07-16 02:12:08', '2021-07-16 02:12:08');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `address`, `content`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Trung Hưng', 'trunghung@gmail.com', 346713429, 'HN', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 1, '2021-07-15 09:10:14', '2021-07-15 02:10:14'),
(2, 'Nguyễn Trung Hưng', 'zztrunghungzz@gmail.com', 395139875, 'HN', 'sadgshj', 1, '2021-07-16 09:15:01', '2021-07-16 02:15:01');

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `booking_car_id` int(11) NOT NULL,
  `sokhung` varchar(255) DEFAULT NULL,
  `somay` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `file_deposit` varchar(255) NOT NULL,
  `file_contract` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contract`
--

INSERT INTO `contract` (`id`, `user_id`, `booking_car_id`, `sokhung`, `somay`, `image`, `file_deposit`, `file_contract`, `created_at`, `updated_at`) VALUES
(1, 3, 1, '7DGHUAS7', 'GF7D67SS', 'uploads/contract/1626341633_z2046124874047-b1fe6ef709bca20-4110-9719-1598517885.jpg', 'uploads/contract/1626341144_Hop_dong_dat_coc_mua_xe_Toyota.doc', 'uploads/contract/1626341633_Hop_dong_giao_xe_Toyota.doc', '2021-07-15 09:33:53', '2021-07-15 02:33:53'),
(3, 3, 3, '6GHDGSA', 'DSAD87Y6', 'uploads/contract/1626427147_z2046124874047-b1fe6ef709bca20-4110-9719-1598517885.jpg', 'uploads/contract/1626427071_Hop_dong_dat_coc_mua_xe_Toyota.doc', 'uploads/contract/1626427147_Hop_dong_giao_xe_Toyota.doc', '2021-07-16 09:19:07', '2021-07-16 02:19:07');

-- --------------------------------------------------------

--
-- Table structure for table `in_cars`
--

CREATE TABLE `in_cars` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `in_cars`
--

INSERT INTO `in_cars` (`id`, `image`, `name`, `description`, `car_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/incar/1624978420_Representative-image-(VRG-S)_1614031976.jpg', 'TRẢI NGHIỆM KHÔNG GIAN XE THỂ THAO HOÀN TOÀN MỚI', 'Bước vào khoang lái VIOS phên bản GRS, bạn chắc chắn sẽ rất hào hứng bởi thiết kế đậm chất thể thao và không gian rộng rãi thoải mái đến bất ngờ.', 1, '2021-06-29 07:53:40', '2021-06-29 07:53:40'),
(2, 'uploads/incar/1624978509_KIỂM SOÁT HÀNH TRÌNH_1614070622.png', 'KIỂM SOÁT HÀNH TRÌNH', 'Tính năng kiểm soát hành trình giúp thiết lập và duy trì tốc độ mong muốn của người lái mà không cần nhấn ga, hỗ trợ người lái thoải mái, chủ động hơn trong...', 1, '2021-06-29 07:55:09', '2021-06-29 07:55:09'),
(3, 'uploads/incar/1624978534_HỆ THỐNG GIẢI TRÍ_1614070621.jpg', 'HỆ THỐNG GIẢI TRÍ', 'Với phiên bản Vios mới, việc giải trí được tối ưu hóa với Apple Car Play/ Android Auto cho phép bạn bắt đầu cuộc gọi, gửi/ nhận tin nhắn văn bản và nghe...', 1, '2021-06-29 07:55:34', '2021-06-29 07:55:34'),
(4, 'uploads/incar/1624978606_Chìa-khóa-thông-minh-1_1614031976.jpg', 'CHÌA KHÓA THÔNG MINH VÀ KHỞI ĐỘNG BẰNG NÚT BẤM', 'Hệ thống mở khóa và khởi động thông minh bằng nút bấm tạo sự tiện lợi tối đa cho khách hàng khi ra / vào xe và khởi động / tắt máy với bộ điều khiển mang bên...', 1, '2021-06-29 07:56:46', '2021-06-29 07:56:46'),
(5, 'uploads/incar/1624979020_Cụm-đồng-hồ-1_1613995976.jpg', 'CỤM ĐỒNG HỒ', 'Đồng hồ OPTITRON tự phát sáng tăng cường khả năng hiển thị với sự chính xác cao.', 1, '2021-06-29 08:03:40', '2021-06-29 08:03:40'),
(6, 'uploads/incar/1626334355_Representative-image-(VG)_1613995977.jpg', 'TRUYỀN CẢM HỨNG TỪ TIỆN NGHI VÀ THOẢI MÁI', 'Trải nghiệm không gian nội thất tinh tế, sang trọng với ngôn ngữ thiết kế hiện đại. Bảng điều khiển trung tâm với điểm nhấn là những đường mạ bạc liền mạch theo dạng dòng thác chảy từ trên xuống.', 2, '2021-07-15 00:32:35', '2021-07-15 00:32:35'),
(7, 'uploads/incar/1626334379_Tay-lai-G-1.png', 'TAY LÁI', 'Tay lái mới được thiết kế sang trọng, tinh tế với chất liệu da, mạ bạc, 3 chấu vừa vặn với vị trí đặt tay. Ngoài ra vô lăng có các nút điều chỉnh âm thanh,...', 2, '2021-07-15 00:32:59', '2021-07-15 00:32:59'),
(8, 'uploads/incar/1626334401_Cụm-đồng-hồ-1_1613995976.jpg', 'CỤM ĐỒNG HỒ', 'Đồng hồ OPTITRON tự phát sáng tăng cường khả năng hiển thị với sự chính xác cao', 2, '2021-07-15 00:33:21', '2021-07-15 00:33:21'),
(9, 'uploads/incar/1626334433_Hệ-thống-điều-hòa-1_1613995972.jpg', 'HỆ THỐNG ĐIỀU HÒA', 'Hệ thống điều hòa tự động mang lại sự tiện nghi cho người lái và cảm giác dễ chịu trong suốt hành trình.', 2, '2021-07-15 00:33:53', '2021-07-15 00:33:53'),
(10, 'uploads/incar/1626334467_Hệ-thống-giải-trí-(VG)-1_1613995966.jpg', 'HỆ THỐNG GIẢI TRÍ', 'Với phiên bản Vios mới, việc giải trí được tối ưu hóa với Kết nối điện thoại thông minh cho phép bạn bắt đầu cuộc gọi, gửi/nhận tin nhắn văn bản và nghe', 2, '2021-07-15 00:34:27', '2021-07-15 00:34:27'),
(11, 'uploads/incar/1626335843_noi-that-min_1600327905.jpg', 'NỘI THẤT HOÀN HẢO, TIỆN NGHI VƯỢT TRỘI', 'Không gian nội thất hiện đại, màu nội thất đen-đỏ cực thể thao, cùng với những tính năng tiện ích hiện đại mang đến sự thoải mái tối ưu. Mỗi hành trình với Fortuner là một trải nghiệm xứng tầm đẳng cấp.', 3, '2021-07-15 00:57:23', '2021-07-15 00:57:23'),
(12, 'uploads/incar/1626335876_khong-gian-noi-that-min_1600327906.jpg', 'KHÔNG GIAN NỘI THẤT', 'Thiết kế tối ưu khoang hành khách mang lại trải nghiệm thoải mái, tiện nghi cho chủ sở hữu.', 3, '2021-07-15 00:57:56', '2021-07-15 00:57:56'),
(13, 'uploads/incar/1626335900_ghe-ngoi]-min_1600327909.jpg', 'GHẾ NGỒI', 'Ghế lái chỉnh điện 8 hướng cùng cửa sổ điều chỉnh điện một chạm chống kẹt ở tất cả các cửa, tăng cường tiện nghi và an toàn cho hành khách', 3, '2021-07-15 00:58:20', '2021-07-15 00:58:20'),
(14, 'uploads/incar/1626335925_hop-de-do-co-kha-nang-lam-mat-min_1600327903.png', 'HỘP ĐỂ ĐỒ CÓ KHẢ NĂNG LÀM MÁT', 'Hộp để đồ thuận tiện với chức năng làm mát đồ uống, đem lại tối đa sự tiện nghi cho chủ sở hữu', 3, '2021-07-15 00:58:45', '2021-07-15 00:58:45'),
(15, 'uploads/incar/1626335958_bang-dong-ho-tap-lo-min_1600327908.jpg', 'BẢNG ĐỒNG HỒ TAP LÔ', 'Thiết kế bảng đồng hồ hiện đại giúp chủ sở hữu thuận tiện trong việc nắm bắt các thông số vận hành một cách chính xác và nhanh chóng', 3, '2021-07-15 00:59:18', '2021-07-15 00:59:18'),
(16, 'uploads/incar/1626336780_tczz2i-min_1600330958.jpg', 'NỘI THẤT HOÀN HẢO, TIỆN NGHI VƯỢT TRỘI', 'Không gian nội thất hiện đại, màu sắc sang trọng, cùng với những tính năng tiện ích hiện đại mang đến sự thoải mái tối ưu. Mỗi hành trình với Fortuner là một trải nghiệm xứng tầm đẳng cấp.', 4, '2021-07-15 01:13:00', '2021-07-15 01:13:00'),
(17, 'uploads/incar/1626336805_2n5qxj-min_1600330962.png', 'HỆ THỐNG ÂM THANH', 'Màn hình DVD mới thiết kế sang trọng với ánh sáng xanh da trời dịu mắt. Công nghệ cảm ứng rất dễ sử dụng và tiện nghi, kết hợp cùng các tính năng cao cấp', 4, '2021-07-15 01:13:25', '2021-07-15 01:13:25'),
(18, 'uploads/incar/1626336840_knvut1-min_1600330961.jpg', 'HỆ THỐNG ĐIỀU HÒA', 'Hệ thống điều hoà tự động giúp làm lạnh nhanh chóng.', 4, '2021-07-15 01:14:00', '2021-07-15 01:14:00'),
(19, 'uploads/incar/1626336861_g5q0qv-min_1600330959.jpg', 'BẢNG ĐỒNG HỒ TÁP LÔ', 'Thiết kế bảng đồng hồ hiện đại giúp chủ sở hữu thuận tiện trong việc nắm bắt các thông số vận hành một cách chính xác và nhanh chóng.', 4, '2021-07-15 01:14:21', '2021-07-15 01:14:21'),
(20, 'uploads/incar/1626336887_yxsveu-min_1600330962.jpg', 'KHÔNG GIAN NỘI THẤT', 'Phiên bản tiêu chuẩn của Fortuner với không gian nội thất rộng rãi, đầy đủ tiện nghi.', 4, '2021-07-15 01:14:47', '2021-07-15 01:14:47'),
(21, 'uploads/incar/1626337461_Noi-that--1.png', 'NỘI THẤT SANG TRỌNG, ĐẲNG CẤP', 'Nội thất rộng rãi, tiện nghi được cải tiến với công nghệ hiện đại, kiến tạo không gian đẳng cấp và yên bình.', 5, '2021-07-15 01:24:21', '2021-07-15 01:24:21'),
(22, 'uploads/incar/1626337500_He-thong-dinh-vi-Q-1.png', 'HỆ THỐNG ĐỊNH VỊ', 'Giao diện tiếng việt thân thiện, tích hợp bản đồ trực quan trên màn hình tiện lợi cho việc du lịch xa.', 5, '2021-07-15 01:25:00', '2021-07-15 01:25:00'),
(23, 'uploads/incar/1626337538_He-thong-am-thanh-Q-2.png', 'HỆ THỐNG ÂM THANH', 'Màn hình DVD 8 inch và 9 loa mang nhãn hiệu JBL danh tiếng (bản 2.5Q) tạo nên sự sang trong và đẳng cấp.', 5, '2021-07-15 01:25:38', '2021-07-15 01:25:38'),
(24, 'uploads/incar/1626337560_bang-dieu-khien-2.png', 'BẢNG ĐIỀU KHIỂN', 'Bảng điều khiển trên thanh đỡ tay sau tân tiến với các nút bấm cảm ứng đầy trang nhã, cho phép người ngồi sau dễ dàng điều chỉnh tiện nghi trong xe.', 5, '2021-07-15 01:26:00', '2021-07-15 01:26:00'),
(25, 'uploads/incar/1626337590_He-thong-gat-mua-tu-dong-2.png', 'HỆ THỐNG GẠT MƯA TỰ ĐỘNG', 'Hệ thống gạt mưa tự động thông minh tự kích hoạt khi phát hiện có mưa giúp giảm thao tác cho người lái', 5, '2021-07-15 01:26:30', '2021-07-15 01:26:30'),
(26, 'uploads/incar/1626338103_NỘI THẤT1b-1D_1594811644.jpg', 'CẢI TIẾN MỚI - TIỆN ÍCH HƠN', 'Không gian nội thất rộng rãi, các tính năng tiện ích giúp trải nghiệm lái thoải mái và đầy hứng khởi.', 6, '2021-07-15 01:35:03', '2021-07-15 01:35:03'),
(27, 'uploads/incar/1626338122_NỘI-THẤT2-2D_1594799385.png', 'TAY LÁI', 'Tay lái với thiết kế 3 chấu vừa vặn với vị trí dặt tay. Đồng thời tích hợp nút điều chỉnh âm thanh giúp tối đa hóa tiện ích sử dụng.', 6, '2021-07-15 01:35:22', '2021-07-15 01:35:22'),
(28, 'uploads/incar/1626338147_Bang-Dong-Ho_1594799398.jpg', 'ĐỒNG HỒ TABLO', 'Bảng đồng hồ trung tâm được bố trí tập trung về hướng người lái tạo sự thuận tiện cho việc quan sát khi lái xe.', 6, '2021-07-15 01:35:47', '2021-07-15 01:35:47'),
(29, 'uploads/incar/1626338166_NỘI-THẤT-5-2D_1594799400.png', 'NÚT BẤM KHỞI ĐỘNG', 'Nút bấm thông minh giúp thao tác khởi động và tắt máy thuận tiện, tiết kiệm thời gian tối đa', 6, '2021-07-15 01:36:06', '2021-07-15 01:36:06'),
(30, 'uploads/incar/1626338188_NỘI-THẤT-6-2D_1594799399.png', 'MÀN HÌNH DVD', 'Màn hình DVD với kết nối điện thoại thông minh, giúp tăng tiện ích cho khách hàng khi lái xe.', 6, '2021-07-15 01:36:28', '2021-07-15 01:36:28'),
(31, 'uploads/incar/1626338683_V-Representative-image-V_1601892572.png', 'SANG TRỌNG ĐẲNG CẤP', 'Nội thất sang trọng với tông màu nâu chủ đạo, đặc biệt nổi bật với những chi tiêt ốp gỗ tinh tế tạo không gian đẳng cấp cho chủ sở hữu.', 7, '2021-07-15 01:44:43', '2021-07-15 01:44:43'),
(32, 'uploads/incar/1626338713_V-Bảng-đồng-hồ-1-min_1601892569.jpg', 'BẢNG ĐỒNG HỒ', 'Mọi thứ nằm trong tầm kiểm soát của người lái với bảng đồng hồ và màn hình hiển thị đa thông tin một cách chính xác, rõ ràng.', 7, '2021-07-15 01:45:13', '2021-07-15 01:45:13'),
(33, 'uploads/incar/1626338765_V-Tay-lái-V-1-min_1601892573.jpg', 'TAY LÁI', 'Tay lái kết hợp hoàn hảo giữa chất liệu da tự nhiên, mạ bạc trang nhã và gỗ quý phái đồng thời tích hợp các nút điều chỉnh âm thanh, điện thoại rảnh tay', 7, '2021-07-15 01:46:05', '2021-07-15 01:46:05'),
(34, 'uploads/incar/1626338791_V-Hệ-thống-âm-thanh-V-1-min_1601892570.jpg', 'HỆ THỐNG ÂM THANH', 'Hệ thống âm thanh cao cấp thế hệ mới, cùng màn hình cảm ứng 8 inch hiện đại ứng dụng công nghệ trợ sáng giúp người lái thao tác dễ dàng khi đi buổi tối.', 7, '2021-07-15 01:46:31', '2021-07-15 01:46:31'),
(35, 'uploads/incar/1626338832_V-Hệ-thống-điều-hòa-V-1-min_1601892570.jpg', 'HỆ THỐNG ĐIỀU HÒA', 'Hệ thống điều hòa với hai dàn lạnh công tắc điều chỉnh tự động riêng biệt, thuận tiện cùng với cửa gió ở các hàng ghế giúp làm lạnh nhanh chóng', 7, '2021-07-15 01:47:12', '2021-07-15 01:47:12'),
(36, 'uploads/incar/1626339702_Nội-thất-1b-1-min_1596185570.jpg', 'TRẺ TRUNG MẠNH MẼ, KHÔNG NGỪNG BƯỚC TỚI', 'Tận hưởng không gian hiện đại, vững chãi và chất đến từng góc độ, cho người lái sự thoải mái tuyệt vời.', 8, '2021-07-15 02:01:42', '2021-07-15 02:01:42'),
(37, 'uploads/incar/1626339720_Cửa-sổ-chỉnh-điện-1 - Copy (1)-min_1596185564.jpg', 'CỬA SỔ CHỈNH ĐIỆN', 'Tất cả các cửa sổ được trang bị hệ thống điều chỉnh điện dễ dàng sử dụng và đặc biệt cửa sổ người lái còn có chức năng tự động lên/xuống đầy tiện ích.', 8, '2021-07-15 02:02:00', '2021-07-15 02:02:00'),
(38, 'uploads/incar/1626339740_Cửa-gió-điều-hòa-1 - Copy-min_1596186032.jpg', 'CỬA GIÓ ĐIỀU HÒA', 'Cửa gió điều hòa được thiết kế hình tròn cùng cánh gió hình sao 5 cánh thể thao hiện đại.', 8, '2021-07-15 02:02:20', '2021-07-15 02:02:20'),
(39, 'uploads/incar/1626339779_Hệ-thống-âm-thanh-1 - Copy-min_1596185569.jpg', 'HỆ THỐNG ÂM THANH', 'Cuộc sống chất lượng khi vừa chinh phục vừa có thể tận hưởng những bản nhạc yêu thích với hệ thống âm thanh được trang bị màn hình DVD 7\" sang trọng', 8, '2021-07-15 02:02:59', '2021-07-15 02:02:59'),
(40, 'uploads/incar/1626339796_Hệ-thống-điều-hòa-1 - Copy-min_1596185566.jpg', 'HỆ THỐNG ĐIỀU HÒA', 'Thiết kế bản điều khiển điều hòa tự động, sử dụng công tắc điều chỉnh dạng lẫy hiện đại và tiện dụng hơn', 8, '2021-07-15 02:03:16', '2021-07-15 02:03:16'),
(41, 'uploads/incar/1626426788_Image-5-1.png', 'Camry 3213', 'ádasdsad', 9, '2021-07-16 02:13:08', '2021-07-16 02:13:08');

-- --------------------------------------------------------

--
-- Table structure for table `models`
--

CREATE TABLE `models` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `models`
--

INSERT INTO `models` (`id`, `name`, `slug`, `image`, `created_at`, `updated_at`) VALUES
(1, 'VIOS', 'vios', 'uploads/model/1624976157_vios vgrs_1614142463.png', '2021-06-29 07:15:57', '2021-06-29 07:15:57'),
(2, 'CAMRY', 'camry', 'uploads/model/1624976198_Do-(3T3)-Q-1.png', '2021-06-29 07:16:38', '2021-06-29 07:16:38'),
(3, 'FORTUNER', 'fortuner', 'uploads/model/1624976212_Fortuner CKD_1614141291.png', '2021-06-29 07:16:52', '2021-06-29 07:16:52'),
(4, 'WIGO', 'wigo', 'uploads/model/1624976223_wigo_1617615120.png', '2021-06-29 07:17:03', '2021-06-29 07:17:03'),
(5, 'CORALLA  ALTIS', 'coralla-altis', 'uploads/model/1624976281_Corolla Altis_1614141742.png', '2021-06-29 14:19:11', '2021-06-29 07:19:11'),
(6, 'INNOVA', 'innova', 'uploads/model/1624976373_2020-thumb-model_1602240786.png', '2021-06-29 07:19:33', '2021-06-29 07:19:33');

-- --------------------------------------------------------

--
-- Table structure for table `out_cars`
--

CREATE TABLE `out_cars` (
  `id` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `car_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `out_cars`
--

INSERT INTO `out_cars` (`id`, `image`, `name`, `description`, `car_id`, `created_at`, `updated_at`) VALUES
(1, 'uploads/outcar/1624978681_Toyota Vios GRS van hanh em ai (2)-min(3)_1614056352.jpg', 'VIOS GRS ĐẬM CHẤT CÁ TÍNH', 'Lấy cảm hứng từ những dòng xe đua đẳng cấp thế giới, VIOS GRS lần đầu tiên xuất hiện tại Việt Nam với diện mạo cực chất, cực năng động thể hiện uy thế dẫn đầu mọi chặng đua.', 1, '2021-06-29 07:58:01', '2021-06-29 07:58:01'),
(2, 'uploads/outcar/1624978735_u-xe-(VRG-S)-1_1614032064.jpg', 'ĐẦU XE', 'Đường nét thiết kế sắc sảo của cụm đèn trước, hệ thống lưới tản nhiệt với thiết kế bậc thang trải dài liền mạch kết hợp cùng phần đèn sương mù hai bên tăng...', 1, '2021-06-29 07:58:55', '2021-06-29 07:58:55'),
(3, 'uploads/outcar/1624978751_Cụm-đèn-sau-(VRG-S)-1_1614032061.jpg', 'CỤM ĐÈN SAU', 'Cụm đèn hậu mảnh, trải dài sang hai bên kết hợp thanh cản lớn mang lại cảm giác rộng rãi, lịch lãm cho chiếc xe.', 1, '2021-06-29 07:59:11', '2021-06-29 07:59:11'),
(4, 'uploads/outcar/1624978784_ng-ten-(VRG-S)-1_1614032059.jpg', 'ANTEN VÂY CÁ', 'Ăng ten vây cá tăng sự ổn định khi vận hành đồng thời tạo cảm giác trẻ trung, năng động', 1, '2021-06-29 07:59:44', '2021-06-29 07:59:44'),
(5, 'uploads/outcar/1624978925_Gương-chiếu-hậu-ngoài-(VRG-S)-1_1614032065.jpg', 'GƯƠNG CHIẾU HẬU NGOÀI', 'Gương chiếu hậu được cải tiến với chức năng điều chỉnh điện ,chức năng gập điện và tích hợp báo rẽ tạo nên sự tiện nghi, dễ dàng hơn hết cho lái xe.', 1, '2021-06-29 08:02:05', '2021-06-29 08:02:05'),
(6, 'uploads/outcar/1626334577_Toyota Vios van hanh em ai(1)-min(1)_1614064515.jpg', 'THIẾT KẾ GIÀU CẢM XÚC', 'VIOS mới với thiết kế giàu cảm xúc và công nghệ an toàn đạt chuẩn 5 sao sẽ là nguồn cảm hứng bất tận cho bạn khám phá mọi cung đường', 2, '2021-07-15 00:36:17', '2021-07-15 00:36:17'),
(7, 'uploads/outcar/1626334607_u-xe-(VG)-1_1613995922.jpg', 'ĐẦU XE', 'Đường nét thiết kế sắc sảo của cụm đèn trước, hệ thống lưới tản nhiệt với thiết kế bậc thang trải dài liền mạch kết hợp cùng phần đèn sương mù hai bên tăng...', 2, '2021-07-15 00:36:47', '2021-07-15 00:36:47'),
(8, 'uploads/outcar/1626334650_n-sương-mù-(VG)-1_1613995927.jpg', 'ĐÈN SƯƠNG MÙ', 'Đèn sương mù phía trước hỗ trợ khả năng quan sát của người lái trong điều kiện thời tiết có sương mù, đảm bảo tính an toàn đồng thời là điểm nhấn tăng thêm...', 2, '2021-07-15 00:37:30', '2021-07-15 00:37:30'),
(9, 'uploads/outcar/1626334674_Gương-chiếu-hậu-ngoài-(VG)-1_1613995928.jpg', 'GƯƠNG CHIẾU HẬU NGOÀI', 'Gương chiếu hậu được cải tiến với chức năng điều chỉnh điện ,chức năng gập điện và tích hợp báo rẽ tạo nên sự tiện nghi, dễ dàng hơn hết cho lái xe.', 2, '2021-07-15 00:37:54', '2021-07-15 00:37:54'),
(10, 'uploads/outcar/1626334716_DuoiXe-(VG)-1_1613995929.jpg', 'ĐUÔI XE', 'Đuôi xe là sự kết hợp tương phản giữa cụm đèn sau, đèn sương mù hẹp, trải dài qua hai bên cùng cản sau lớn đem đến cảm giác thể thao và mạnh mẽ nhưng cũng...', 2, '2021-07-15 00:38:36', '2021-07-15 00:38:36'),
(11, 'uploads/outcar/1626335680_ngoai-that-min_1600334964.jpg', 'DÁNG VẺ BỀ THẾ & SANG TRỌNG', 'Một phiên bản nâng tầm vị thế của Fortuner. Mạnh mẽ đầy cá tính. Bóng bẩy đậm chất SUV.', 3, '2021-07-15 00:54:40', '2021-07-15 00:54:40'),
(12, 'uploads/outcar/1626335713_dau-xe-min_1600334966.png', 'ĐẦU XE', 'Thiết kế phần đầu xe với lưới tản nhiệt khỏe khoắn kết hợp với đèn LED cool ngầu mang lại vẻ hiện đại và trẻ trung cho một chiếc SUV cho đô thị', 3, '2021-07-15 00:55:13', '2021-07-15 00:55:13'),
(13, 'uploads/outcar/1626335745_guong-chieu-hau-ngoai-min_1600334966.jpg', 'GƯƠNG CHIẾU HẬU NGOÀI', 'Gương chiếu hậu bên ngoài có chức năng chỉnh điện, tích hợp đèn báo rẽ LED', 3, '2021-07-15 00:55:45', '2021-07-15 00:55:45'),
(14, 'uploads/outcar/1626335766_phan-hong-xe-min_1600334965.jpg', 'PHẦN HÔNG XE', 'Với các đường dập nổi đầy mạnh mẽ, thiết kế hông xe Fortuner toát lên sự đẳng cấp không thể chối cãi', 3, '2021-07-15 00:56:06', '2021-07-15 00:56:06'),
(15, 'uploads/outcar/1626335805_mam-xe-min_1600334963.jpg', 'MÂM XE', 'Phiên bản Legender được trang bị mâm xe 18 inch với cấu trúc chắc chắn và linh hoạt gồm hai tông màu đen-bạc sang trọng và thể thao', 3, '2021-07-15 00:56:45', '2021-07-15 00:56:45'),
(16, 'uploads/outcar/1626336642_ymy3ay-min_1600328702.jpg', 'MẠNH MẼ ĐẦY CUỐN HÚT', 'Uy thế không thể chối từ của Fortuner - chiếc SUV hàng đầu phân khúc, với sự sang trọng tinh tế.', 4, '2021-07-15 01:10:42', '2021-07-15 01:10:42'),
(17, 'uploads/outcar/1626336670_twl3kv-min_1600328701.jpg', 'ĐẦU XE', 'Nhằm tôn lên vẻ ngoài khỏe khoắn mà sang trọng, lưới tản nhiệt và ốp cản trước được mở rộng cùng với thiết kế liền mạch giữa hai bên đầu xe.', 4, '2021-07-15 01:11:10', '2021-07-15 01:11:10'),
(18, 'uploads/outcar/1626336692_soz1cd-min_1600328703.jpg', 'CỤM ĐÈN TRƯỚC', 'Cụm đèn trước gồm đèn LED và đèn chiếu sáng ban ngày LED được thiết kế thon gọn cùng đường nhấn sắc sảo, hiện đại giúp làm nổi bật uy thế của Fortuner.', 4, '2021-07-15 01:11:32', '2021-07-15 01:11:32'),
(19, 'uploads/outcar/1626336712_43gpmb-min_1600328701.jpg', 'GƯỚNG CHIẾU HẬU NGOÀI', 'Gương chiếu hậu bên ngoài có chức năng chỉnh điện, tích hợp đèn báo rẽ LED.', 4, '2021-07-15 01:11:52', '2021-07-15 01:11:52'),
(20, 'uploads/outcar/1626336732_vynsts-min_1600328700.jpg', 'CỤM ĐÈN SAU', 'Thiết kế hài hòa vuốt dọc từ hai bên thân xe cùng dải đèn LED chiếu sáng tối ưu vào ban đêm.', 4, '2021-07-15 01:12:12', '2021-07-15 01:12:12'),
(21, 'uploads/outcar/1626337626_Ngoai that-1.png', 'NGÔN NGỮ THIẾT KẾ THÔNG MINH GIÀU CẢM XÚC', 'Phiên bản Camry 2019 mang đến một diện mạo mới mẻ, vô cùng bắt mắt với sự liền mạch trong mọi chi tiết thiết kế, là tâm điểm thu hút những ánh nhìn mỗi khi lướt bánh.', 5, '2021-07-15 01:27:06', '2021-07-15 01:27:06'),
(22, 'uploads/outcar/1626337655_Dau-xe-Q-1.png', 'ĐẦU XE', 'Sự sang trọng, liền mạch trong thiết kế đến từ lưới tản nhiệt dài mềm mại nối liền 2 cụm đèn thon dài và nổi bật chính giữa là biểu tượng TOYOTA.', 5, '2021-07-15 01:27:35', '2021-07-15 01:27:35'),
(23, 'uploads/outcar/1626337674_Cum-den-truoc-Q-1.png', 'CỤM ĐÈN TRƯỚC', 'Cụm đèn được thiết kế dáng thể thao khỏe khoắn và tích hợp công nghệ Auto Light, công nghệ cân bằng góc chiếu và đèn chờ dẫn đường', 5, '2021-07-15 01:27:54', '2021-07-15 01:27:54'),
(24, 'uploads/outcar/1626337710_Guong-chieu-hau-Q-2.png', 'GƯƠNG CHIẾU HẬU', 'Gương chiếu hậu có chức năng chỉnh điện, gập rẽ và chức năng chống đọng nước.', 5, '2021-07-15 01:28:30', '2021-07-15 01:28:30'),
(25, 'uploads/outcar/1626337737_Cua-so-troi-Q-1.png', 'CỬA SỔ TRỜI', 'Cửa sổ trời tự động bằng điện đem đến trải nghiệm thú vị của những giây phút hòa mình với thiên nhiên trong lành', 5, '2021-07-15 01:28:57', '2021-07-15 01:28:57'),
(26, 'uploads/outcar/1626338239_Ngoai That_1594787138.jpg', 'DIỆN MẠO MỚI NĂNG ĐỘNG KHỎE KHOẮN', 'Sở hữu ngoại hình đậm chất thể thao với ngôn ngữ thiết kế trẻ trung và nhiều lựa chọn về màu sắc, xứng đáng là chiếc xe hơi đầu tiên của bạn', 6, '2021-07-15 01:37:19', '2021-07-15 01:37:19'),
(27, 'uploads/outcar/1626338270_u-xe-2D_1594787132.png', 'ĐẦU XE', 'Cụm lưới tản nhiệt ấn tượng với thiết kế theo dạng hình thang táo bạo kết hợp với cụm đèn trước sắc sảo mang lại vẻ ngoài thu hút và đầy mê hoặc', 6, '2021-07-15 01:37:50', '2021-07-15 01:37:50'),
(28, 'uploads/outcar/1626338295_Gương-chiếu-hậu--2D_1594787137.png', 'GƯƠNG CHIẾU HẬU', 'Gương chiếu hậu được cải tiến với chức năng gập điện tích hợp đèn báo rẽ tạo nên sự tiện nghi, dễ dàng hơn cho người lái.', 6, '2021-07-15 01:38:15', '2021-07-15 01:38:15'),
(29, 'uploads/outcar/1626338312_Mâm-xe-2D_1594787139.png', 'MÂM XE', 'Mâm xe mới có hình dáng khỏe khoắn đậm chất thể thao thu hút mọi ánh nhìn.', 6, '2021-07-15 01:38:32', '2021-07-15 01:38:32'),
(30, 'uploads/outcar/1626338334_Cụm-đèn-sau-2D_1594787142.png', 'CỤM ĐÈN SAU', 'Cụm đèn dạng LED được thiết kế sắc nét hơn giúp chiếc xe trở nên vô cùng bắt mắt và ấn tượng dù là ngày hay đêm.', 6, '2021-07-15 01:38:54', '2021-07-15 01:38:54'),
(31, 'uploads/outcar/1626338896_2020banner1280x720-min_1601974801.jpg', 'SANG TRỌNG - VỮNG CHÃI', 'Sở hữu vẻ ngoài sang trọng cùng khung gầm vững chắc, Innova Thế hệ đột phá đáp ứng mọi nhu cầu cho cuộc sống hiện đại, xứng đáng là người đồng hành lý tưởng cùng gia đình bạn trên mọi hành trình.', 7, '2021-07-15 01:48:16', '2021-07-15 01:48:16'),
(32, 'uploads/outcar/1626338921_V-Đầu-xe-V-1-min_1601891290.jpg', 'ĐẦU XE', 'Đầu xe với lưới tản nhiệt hình lục giác kết hợp với cụm đèn trước, cùng cản trước được thiết kế mở rộng tạo ra những đường nét vuốt dài sắc sảo', 7, '2021-07-15 01:48:41', '2021-07-15 01:48:41'),
(33, 'uploads/outcar/1626338955_V-Cụm-đèn-trước-V-1-min_1601891293.jpg', 'CỤM ĐÈN TRƯỚC', 'Thiết kế mới sắc sảo nối liền nẹp mạ crôm cùng đèn LED hiện đại chiếu gần dạng bóng chiếu, hệ thống tự động điều chỉnh góc chiếu và chế độ điều khiển đèn bật...', 7, '2021-07-15 01:49:15', '2021-07-15 01:49:15'),
(34, 'uploads/outcar/1626338977_V-Đèn-sương-mù-V-1-min_1601891290.jpg', 'ĐÈN SƯƠNG MÙ', 'Đèn sương mù kiểu dáng mới mẻ và đẹp mắt giúp nâng cao khả năng quan sát và làm người lái cảm thấy an tâm, tự tin hơn.', 7, '2021-07-15 01:49:37', '2021-07-15 01:49:37'),
(35, 'uploads/outcar/1626338998_V-Gương-chiếu-hậu-ngoài-V-1-min_1601891291.jpg', 'GƯƠNG CHIẾU HẬU NGOÀI', 'Gương chiếu hậu bên ngoài có chức năng chỉnh điện, gập điện, tích hợp đèn báo rẽ cùng đèn chào mừng độc đáo, được mạ crôm cho vẻ sang trọng, trang nhã.', 7, '2021-07-15 01:49:58', '2021-07-15 01:49:58'),
(36, 'uploads/outcar/1626339515_Ngoại thất-1-min_1596182874.jpg', 'PHONG CÁCH ĐĨNH ĐẠC', 'Sự hấp dẫn đến ngay từ ánh nhìn đầu tiên với từng đường nét đơn giản, sang trọng hoàn hảo. Corolla Altis xứng đáng là thủ lĩnh trên những cung đường, là lựa chọn hoàn hảo để thể hiện chất riêng lẫn phục vụ công việc hiệu quả', 8, '2021-07-15 01:58:35', '2021-07-15 01:58:35'),
(37, 'uploads/outcar/1626339545_u-xe-1 - Copy-min_1596182876.png', 'ĐẦU XE', 'Đầu xe thiết kế mới với bộ lưới tản nhiệt kéo dài ôm trọn đèn sương mù thu hút ánh nhìn ngay từ phút đầu tiên.', 8, '2021-07-15 01:59:05', '2021-07-15 01:59:05'),
(38, 'uploads/outcar/1626339566_Gương-chiếu-hậu-1 - Copy-min_1596182877.png', 'GƯƠNG CHIẾU HẬU BÊN NGOÀI', 'Gương chiếu hậu cùng màu thân xe, tích hợp đèn báo rẽ và điều chỉnh bằng điện mang đến tiện nghi tối đa cho chủ sở hữu', 8, '2021-07-15 01:59:26', '2021-07-15 01:59:26'),
(39, 'uploads/outcar/1626339591_Cụm-đèn-sau-1 - Copy-min_1596182869.png', 'CỤM ĐÈN SAU', 'Cụm đèn sau với thiết kế đặc biệt sắt nét cùng dải đèn LED dài mạnh mẽ', 8, '2021-07-15 01:59:51', '2021-07-15 01:59:51'),
(40, 'uploads/outcar/1626339618_uôi-xe-1 - Copy-min_1596182870.jpg', 'ĐUÔI XE', 'Phần đuôi xe hài hòa, tinh tế với trang bị LED cho cụm đèn sau thiết kế liền mạch qua khối nẹp trang trí biển số mạ Crom sáng bóng sang trọng.', 8, '2021-07-15 02:00:18', '2021-07-15 02:00:18'),
(41, 'uploads/outcar/1626426823_bac-1d4-g-1.png', 'Ngoại thất camry 3', 'dsadsad', 9, '2021-07-16 02:13:43', '2021-07-16 02:13:43');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `view` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `description`, `content`, `image`, `view`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'Ngày hội hiến máu Toyota Thanh Xuân 2020:  “Chia Sẻ Yêu Thương”', 'Thực hiện nghĩa cử cao đẹp cứu người, cũng như giúp đỡ những người bệnh đang cần những giọt máu quý giá để duy trì sự sống.', '<p>Thực hiện nghĩa cử cao đẹp cứu người,<strong>&nbsp;cũng như gi&uacute;p đỡ những người bệnh đang cần những giọt m&aacute;u qu&yacute; gi&aacute; để duy tr&igrave; sự sống.</strong>&nbsp;Tr&ecirc;n tinh thần &ldquo;Tương th&acirc;n tương &aacute;i&rdquo;, Toyota Thanh Xu&acirc;n phối hợp c&ugrave;ng Viện Huyết học Truyền m&aacute;u Trung ương tổ chức chương tr&igrave;nh hiến m&aacute;u nh&acirc;n đạo năm 2020.</p>\r\n\r\n<ol>\r\n	<li><strong>Th&ocirc;ng tin chương tr&igrave;nh</strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>T&ecirc;n sự kiện: Ng&agrave;y hội hiến m&aacute;u nh&acirc;n đạo 2020&nbsp;&ndash; Chia Sẻ Y&ecirc;u Thương</li>\r\n	<li>Thời gian tổ chức:&nbsp;<strong>09h00- 11h00 ng&agrave;y 12/12/2020.</strong></li>\r\n	<li>Địa điểm: Showroom tầng 1, Toyota Thanh Xu&acirc;n - 315 Trường Chinh, Q. Thanh Xu&acirc;n, H&agrave; Nội.</li>\r\n</ul>\r\n\r\n<ol start=\"2\">\r\n	<li><strong>Đối tượng tham gia</strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>To&agrave;n bộ CBNV, Kh&aacute;ch h&agrave;ng của Toyota Thanh Xu&acirc;n<strong>. Nam từ 18 đến 60 tuổi, nữ từ 18 đến 55 tuổi ho&agrave;n to&agrave;n khoẻ mạnh.</strong></li>\r\n	<li>C&acirc;n nặng &iacute;t nhất l&agrave; 42 kg (nữ) v&agrave; 45 kg (nam).</li>\r\n	<li>Trước khi hiến m&aacute;u buổi tối n&ecirc;n ngủ sớm, s&aacute;ng tham gia hiến m&aacute;u chỉ ăn nhẹ kh&ocirc;ng uống sữa, kh&ocirc;ng sử dụng chất k&iacute;ch th&iacute;ch, rượu bia. N&ecirc;n uống nước lọc hoặc tr&agrave; đường.</li>\r\n</ul>\r\n\r\n<ol start=\"3\">\r\n	<li><strong>Chi tiết li&ecirc;n hệ</strong></li>\r\n</ol>\r\n\r\n<ul>\r\n	<li>Số m&aacute;y chăm s&oacute;c kh&aacute;ch h&agrave;ng: 093469.6669 (nh&aacute;nh 0)</li>\r\n</ul>\r\n\r\n<p>Rất mong nhận được sự ủng hộ v&agrave; tham gia t&iacute;ch cực từ Qu&yacute; kh&aacute;ch h&agrave;ng, c&aacute;c c&aacute; nh&acirc;n v&agrave; tập thể để chương tr&igrave;nh mang lại&nbsp;nhiều &yacute; nghĩa cho x&atilde; hội.</p>\r\n\r\n<hr />\r\n<p><strong>Toyota Thanh Xu&acirc;n&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>\r\n\r\n<p>Hotline<strong>:&nbsp;</strong>093469.6669 (nh&aacute;nh 0)</p>\r\n\r\n<p>Fanpage:&nbsp;<a href=\"https://www.facebook.com/ToyotaThanhXuan\">www.facebook.com/ToyotaThanhXuan</a></p>\r\n\r\n<p>Địa chỉ: Toyota Thanh Xu&acirc;n &ndash; 315 Trường Chinh &ndash; P.Khương Mai &ndash; Q.Thanh Xu&acirc;n &ndash; H&agrave; Nội.</p>\r\n\r\n<p><em>Toyota Thanh Xu&acirc;n h&acirc;n hạnh được đ&oacute;n tiếp qu&yacute; kh&aacute;ch!</em></p>\r\n\r\n<p><img alt=\"\" height=\"400\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/zxz_1607600184.jpg\" width=\"600\" /></p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/75521988_2845840955435886_3324317168278962176_o_1607600344.jpg\" width=\"600\" /></p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/70146513_2845872472099401_2893739077582979072_o_1607600343.jpg\" width=\"600\" /></p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/76646877_2845840615435920_5358333222042206208_o_1607600341.jpg\" width=\"600\" /></p>', 'uploads/post/1624977388_HIENMAUNHANDAO_1607601371.jpg', 2, '2021-07-10 17:00:15', '2021-07-10 10:00:15', 'ngay-hoi-hien-mau-toyota-thanh-xuan-2020-chia-se-yeu-thuong'),
(2, 'SỰ KIỆN LÁI THỬ XE TẠI TOYOTA THANH XUÂN NGÀY 21.11.2020', 'Đến hẹn lại lên, sự kiện trưng bày và lái thử xe tại Toyota Thanh Xuân chính thức quay trở lại! Bạn đã sẵn sàng khởi động?', '<p>Với sự g&oacute;p mặt của Corolla Cross 2020, bộ sưu tập SUV mang thương hiệu Toyota đ&atilde; gia tăng đ&aacute;ng kể, mang lại nhiều lựa chọn cho Kh&aacute;ch h&agrave;ng trong năm 2020</p>\r\n\r\n<p>-<strong>&nbsp;Địa điểm</strong>: Toyota Thanh Xu&acirc;n - 315 Trường Chinh, Thanh Xu&acirc;n, H&agrave; Nội.</p>\r\n\r\n<p>-<strong>&nbsp;Thời gian</strong>: Từ 8h00-17h00 ng&agrave;y 21/11/2020</p>\r\n\r\n<p><strong>Đăng k&yacute; tham gia ngay: 0934.69.6669 (nh&aacute;nh #1)</strong></p>\r\n\r\n<p>Đến với sự kiện, kh&aacute;ch h&agrave;ng kh&ocirc;ng chỉ c&oacute; cơ hội trải nghiệm đa dạng v&agrave; l&aacute;i thử c&aacute;c d&ograve;ng xe mới nhất của Toyota m&agrave; c&ograve;n được tham gia c&aacute;c hoạt động s&ocirc;i nổi, th&uacute; vị kh&aacute;c:</p>\r\n\r\n<p>- Trải nghiệm &amp; L&aacute;i thử c&aacute;c d&ograve;ng xe Toyota thế hệ mới:&nbsp;Cross, Vios, Fortuner Legender, Wigo, Camry</p>\r\n\r\n<p>- Hỗ trợ kỹ thuật &amp; c&aacute;ch sử dụng c&aacute;c d&ograve;ng xe</p>\r\n\r\n<p>- Mua xe với mức gi&aacute; ưu đ&atilde;i chỉ &aacute;p dụng tại sự kiện</p>\r\n\r\n<p>- Tham gia bốc thăm may mắn, săn qu&agrave; &ldquo;SI&Ecirc;U HOT&rdquo;</p>\r\n\r\n<p>- Nhận qu&agrave; lưu niệm từ Toyota Thanh Xu&acirc;n</p>\r\n\r\n<p>Q&uacute;y kh&aacute;ch&nbsp;<strong><a href=\"http://bit.ly/laithuxeTTX\">ĐĂNG K&Yacute; NGAY</a></strong>&nbsp;theo 3 c&aacute;ch dưới đ&acirc;y:</p>\r\n\r\n<p>1. Website:&nbsp;<a href=\"http://bit.ly/laithuxeTTX\">bit.ly/laithuxeTTX</a></p>\r\n\r\n<p>2. Gọi tới Hotline 093469.6669 nh&aacute;nh 0.</p>\r\n\r\n<p>3. Fanpage&nbsp;<a href=\"http://www.fb.com/ToyotaThanhXuan\">https://www.fb.com/ToyotaThanhXuan</a></p>\r\n\r\n<p><em>Toyota Thanh Xu&acirc;n h&acirc;n hạnh được đ&oacute;n tiếp Qu&yacute; kh&aacute;ch!</em></p>\r\n\r\n<p><img alt=\"xe-lai-thu-Toyota-Thanh-Xuan\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/0adf6316c3a425fa7cb5_1605772130.jpg\" width=\"600\" /></p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/LAi-thu-xe-toyota%20(3)_1592991559.jpg\" width=\"600\" /></p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/LAi-thu-xe-toyota%20(6)_1592991557.jpg\" width=\"600\" /></p>\r\n\r\n<hr />\r\n<p>TOYOTA THANH XU&Acirc;N &ndash; 315 Trường Chinh, H&agrave; Nội</p>\r\n\r\n<p>➤Hotline:<strong>&nbsp;093469.6669&nbsp;</strong>(nh&aacute;nh 1) để được hỗ trợ</p>\r\n\r\n<p>➤Email :&nbsp;info@toyotathanhxuan.com.vn</p>\r\n\r\n<p>➤Fanpage:&nbsp;<a href=\"http://www.facebook.com/ToyotaThanhXuan\">www.facebook.com/ToyotaThanhXuan</a></p>\r\n\r\n<p>➤Youtube:&nbsp;<a href=\"http://www.youtube.com/c/toyotathanhxuan315\">https://www.youtube.com/c/toyotathanhxuan315</a></p>', 'uploads/post/1624977490_cross-2020_1605772413.jpg', 1, '2021-07-10 17:00:13', '2021-07-10 10:00:13', 'su-kien-lai-thu-xe-tai-toyota-thanh-xuan-ngay-21112020'),
(3, 'CHÍNH SÁCH BẢO HÀNH XE TOYOTA', 'Chế độ bảo hành bắt đầu được tính ngay kể từ thời điểm chiếc xe Toyota được giao cho chủ xe đầu tiên. Trong vòng 36 tháng hoặc 100.000 km', '<p><strong><em>Chế độ bảo h&agrave;nh bắt đầu được t&iacute;nh ngay kể từ thời điểm chiếc xe&nbsp;<a href=\"http://toyotalythuongkiet.com.vn/\">Toyota</a>&nbsp;được giao cho chủ xe đầu ti&ecirc;n. Trong v&ograve;ng 36 th&aacute;ng hoặc 100.000 km, t&ugrave;y thuộc điều kiện n&agrave;o đến trước, Toyota đảm bảo sẽ sửa chữa hoặc thay thế bất kỳ phụ t&ugrave;ng n&agrave;o của xe Toyota mới bị hỏng h&oacute;c.</em></strong></p>\r\n\r\n<p><strong>1. Những g&igrave; được bảo h&agrave;nh</strong></p>\r\n\r\n<p><strong>2. Những g&igrave; kh&ocirc;ng được bảo h&agrave;nh</strong></p>\r\n\r\n<p><strong>3. Tr&aacute;ch nhiệm chủ xe</strong></p>\r\n\r\n<p><strong>4. Th&ocirc;ng tin cần thiết</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Những g&igrave; được bảo h&agrave;nh</strong></p>\r\n\r\n<p><strong>1. Thời hạn bảo h&agrave;nh</strong>&nbsp;Chế độ bảo h&agrave;nh bắt đầu được t&iacute;nh ngay kể từ thời điểm xe được giao cho chủ xe đầu ti&ecirc;n. Trong v&ograve;ng 36 th&aacute;ng hoặc 100.000 km, t&ugrave;y thuộc điều kiện n&agrave;o đến trước, Toyota đảm bảo sẽ sửa chữa hoặc thay thế bất kỳ phụ t&ugrave;ng n&agrave;o của xe Toyota mới bị hỏng h&oacute;c.- Bảo h&agrave;nh ắc quy: Thời hạn bảo h&agrave;nh cho ắc quy l&agrave; 12 th&aacute;ng hoặc 20.000 km t&ugrave;y điều kiện n&agrave;o tới trước.- Bảo h&agrave;nh lốp: Bảo h&agrave;nh lốp: &ETH;ược bảo h&agrave;nh theo chế độ ri&ecirc;ng của nh&agrave; sản xuất lốp. Để biết th&ecirc;m chi tiết, xin qu&yacute; kh&aacute;ch vui l&ograve;ng tham khảo những trang web của:&nbsp;Bridgestone,&nbsp;Dunlop v&agrave;&nbsp;Michelin.</p>\r\n\r\n<p><strong>2. Điều kiện bảo h&agrave;nh xe Toyota</strong></p>\r\n\r\n<p>Toyota chỉ đảm bảo sửa chữa, thay thế c&aacute;c phụ t&ugrave;ng của xe Toyota mới bị hỏng h&oacute;c trong điều kiện:- Xe hoạt động trong điều kiện b&igrave;nh thường- Nguy&ecirc;n liệu phụ t&ugrave;ng kh&ocirc;ng tốt- Lỗi lắp r&aacute;p- Trừ những điều kiện ghi trong mục NHỮNG G&Igrave; KH&Ocirc;NG ĐƯỢC BẢO H&Agrave;NH</p>\r\n\r\n<p><strong><em>Ch&uacute; &yacute;:</em></strong>&nbsp;Bảo h&agrave;nh vẫn &aacute;p dụng khi xe được chuyển nhượng cho những chủ xe kh&aacute;c.</p>\r\n\r\n<p><strong>3. Phạm vi &aacute;p dụng bảo h&agrave;nh&nbsp;</strong></p>\r\n\r\n<p><em>Bảo h&agrave;nh chỉ &aacute;p dụng trong phạm vi nước Cộng h&ograve;a X&atilde; hội chủ nghĩa Việt Nam.</em></p>\r\n\r\n<p><strong>4. Bảo h&agrave;nh miễn ph&iacute;&nbsp;</strong></p>\r\n\r\n<p>Mọi sửa chữa thuộc chế độ bảo h&agrave;nh (phụ t&ugrave;ng, c&ocirc;ng lao động) l&agrave; miễn ph&iacute;.</p>\r\n\r\n<p><strong>Những g&igrave; kh&ocirc;ng được bảo h&agrave;nh</strong></p>\r\n\r\n<p><strong>1.&nbsp;Những yếu tố ngo&agrave;i kiểm so&aacute;t của nh&agrave; sản xuất</strong></p>\r\n\r\n<p>- Những sửa chữa hay điều chỉnh do sử dụng sai (đua xe, chở qu&aacute; tải), cẩu thả, tự &yacute; sửa đổi, biến cải, đấu nối, th&aacute;o ngắt, sửa chữa điều chỉnh kh&ocirc;ng đ&uacute;ng kỹ thuật, tai nạn, tự &yacute; lắp th&ecirc;m phụ t&ugrave;ng/phụ kiện, kh&ocirc;ng thuộc chế độ bảo h&agrave;nh.</p>\r\n\r\n<p>- Ăn m&ograve;n do h&oacute;a mỹ phẩm hoặc ăn m&ograve;n bề mặt xe do bị đ&aacute; bắn hoặc xước sơn kh&ocirc;ng được bảo h&agrave;nh.</p>\r\n\r\n<p>- Hư hại hay bị ăn m&ograve;n do m&ocirc;i trường như mưa axit, h&oacute;a chất, nhựa c&acirc;y, muối, mưa đ&aacute;, mưa b&atilde;o, sấm chớp, ngập lụt v&agrave; những t&aacute;c động tự nhi&ecirc;n kh&aacute;c kh&ocirc;ng được bảo h&agrave;nh.</p>\r\n\r\n<p><strong>2.&nbsp;Kh&ocirc;ng bảo dưỡng xe d&ugrave;ng sai nguy&ecirc;n liệu, dầu b&ocirc;i trơn</strong></p>\r\n\r\n<p>Sửa chữa, điều chỉnh do bảo dưỡng xe kh&ocirc;ng ph&ugrave; hợp, kh&ocirc;ng bảo dưỡng hay d&ugrave;ng nhi&ecirc;n liệu, dầu b&ocirc;i trơn kh&aacute;c với những loại ghi trong cuốn &quot;Hướng dẫn sử dụng&quot; kh&ocirc;ng thuộc chế độ bảo h&agrave;nh.</p>\r\n\r\n<p><strong>3.&nbsp;Chi ph&iacute; bảo dưỡng thuộc tr&aacute;ch nhiệm của chủ xe Toyota</strong></p>\r\n\r\n<p>Những c&ocirc;ng việc hiệu chỉnh động cơ, thay dầu b&ocirc;i trơn, rửa xe, đ&aacute;nh b&oacute;ng, thay bầu lọc, nước l&agrave;m m&aacute;t, dung dịch điện ph&acirc;n, ga điều h&ograve;a, nhi&ecirc;n liệu, c&aacute;c loại dầu mỡ, chất phụ gia, bugi, cầu ch&igrave;, b&oacute;ng đ&egrave;n (trừ b&oacute;ng halogen, b&oacute;ng HID, b&oacute;ng liền ch&oacute;a), d&acirc;y đai dẫn động (trừ d&acirc;y đai cam), cao su gạt nước, m&aacute; phanh, đĩa c&ocirc;n đ&atilde; m&ograve;n l&agrave; việc bảo dưỡng thường xuy&ecirc;n y&ecirc;u cầu cho mọi loại xe. Những hạng mục bảo dưỡng tr&ecirc;n kh&ocirc;ng thuộc chế độ bảo h&agrave;nh.</p>\r\n\r\n<p><strong>4.&nbsp;Tiếng động b&igrave;nh thường, xe rung, giảm gi&aacute; trị tự nhi&ecirc;n</strong></p>\r\n\r\n<p>Tiếng động b&igrave;nh thường, xe rung, sự ăn m&ograve;n hay bị giảm gi&aacute; trị tự nhi&ecirc;n như ngả m&agrave;u, biến dạng, tỳ vết, kh&ocirc;ng được bảo h&agrave;nh.</p>\r\n\r\n<p><strong>5.&nbsp;Thay đổi đồng hồ đo qu&atilde;ng đường</strong></p>\r\n\r\n<p>Mọi hỏng h&oacute;c đối với chiếc xe n&agrave;o đ&atilde; bị thay đổi hay điều chỉnh đồng hồ c&ocirc;ng-tơ-m&eacute;t dẫn đến kh&ocirc;ng x&aacute;c định được số đo ch&iacute;nh x&aacute;c đều kh&ocirc;ng được bảo h&agrave;nh.</p>\r\n\r\n<p><strong>6.&nbsp;Chi ph&iacute; phụ</strong></p>\r\n\r\n<p>Thiệt hại phụ hoặc hậu quả k&egrave;m theo như gọi điện thoại, mất thời gian, nhỡ việc hay thiệt hại về thương mại kh&ocirc;ng thuộc chế độ bảo h&agrave;nh.</p>\r\n\r\n<p><strong>Tr&aacute;ch nhiệm của chủ xe Toyota&nbsp;</strong></p>\r\n\r\n<p><strong>1. &ETH;ưa xe đến bảo h&agrave;nh</strong></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch c&oacute; tr&aacute;ch nhiệm đưa xe của m&igrave;nh đi đến bất kỳ &ETH;ại l&yacute; / Trạm dịch vụ bảo h&agrave;nh v&agrave; sửa chữa được Toyota ủy quyền tại Việt Nam để bảo h&agrave;nh.</p>\r\n\r\n<p><strong>2.&nbsp;<a href=\"https://toyotathanhxuan.com.vn/dich-vu/lich-bao-duong-xe-o-to-dinh-ky-cua-toyota/n\">Bảo dưỡng xe Toyota</a><a href=\"https://toyotathanhxuan.com.vn/dich-vu/lich-bao-duong-xe-o-to-dinh-ky-cua-toyota/n\">&nbsp;</a></strong></p>\r\n\r\n<p>Chủ xe c&oacute; tr&aacute;ch nhiệm sử dụng xe, bảo dưỡng xe một c&aacute;ch hợp l&yacute; v&agrave; quan t&acirc;m tới xe theo đ&uacute;ng những chỉ dẫn ghi trong cuốn &quot;Hướng dẫn sử dụng&quot;.Nếu xe của Qu&yacute; kh&aacute;ch được sử dụng trong điều kiện khắc nghiệt, Qu&yacute; kh&aacute;ch c&agrave;ng phải ch&uacute; &yacute; bảo dưỡng xe như y&ecirc;u cầu trong cuốn &quot;Hướng dẫn sử dụng&quot;.</p>\r\n\r\n<p><strong>3.&nbsp;Ghi lại những lần bảo dưỡng xe Toyota&nbsp;</strong></p>\r\n\r\n<p>Qu&yacute; kh&aacute;ch c&oacute; tr&aacute;ch nhiệm ghi lại tất cả những lần bảo dưỡng xe. &ETH;iều n&agrave;y cần thiết v&igrave; trong một số trường hợp n&oacute; chứng tỏ Qu&yacute; kh&aacute;ch đ&atilde; bảo dưỡng xe theo như y&ecirc;u cầu.</p>\r\n\r\n<p><strong>Th&ocirc;ng tin bảo h&agrave;nh xe Toyota chi tiết</strong></p>\r\n\r\n<p><strong>1. Nơi nhận dịch vụ bảo h&agrave;nh</strong></p>\r\n\r\n<p>&ETH;ại l&yacute; / Trạm dịch vụ bảo h&agrave;nh ủy quyền ch&iacute;nh h&atilde;ng của C&ocirc;ng ty &ocirc; t&ocirc; Toyota Việt Nam sẽ l&agrave; nơi thực hiện những sửa chữa cần thiết, sử dụng những phụ t&ugrave;ng mới hoặc những phụ t&ugrave;ng t&aacute;i chế cho xe của kh&aacute;ch h&agrave;ng nằm trong chế độ được bảo h&agrave;nh. Để đạt được sự chăm s&oacute;c tốt nhất v&agrave; gi&uacute;p cho xe của Qu&yacute; kh&aacute;ch h&agrave;ng được theo d&otilde;i th&agrave;nh một quy tr&igrave;nh, Toyota khuy&ecirc;n Qu&yacute; kh&aacute;ch h&atilde;y trở lại Đại l&yacute; / Trạm dịch vụ bảo h&agrave;nh đ&atilde; thực hiện b&aacute;n xe cho Qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p><strong>2. &ETH;i du lịch</strong>&nbsp;<strong>/</strong>&nbsp;<strong>Di chuyển sang nước kh&aacute;c</strong></p>\r\n\r\n<p>Nếu Qu&yacute; kh&aacute;ch đi du lịch hoặc di chuyển sang nước kh&aacute;c v&agrave; xảy ra trường hợp xe bị hỏng h&oacute;c, h&atilde;y li&ecirc;n hệ với &ETH;ại l&yacute; Toyota ở địa phương. Tuy vậy, xin lưu &yacute; rằng, dịch vụ bảo h&agrave;nh c&oacute; thể kh&ocirc;ng được cung cấp bởi Đại l&yacute; tại địa phương, v&igrave; xe Toyota của Qu&yacute; kh&aacute;ch c&oacute; thể kh&ocirc;ng tu&acirc;n thủ theo quy định hay những y&ecirc;u cầu về m&ocirc;i trường của quốc gia đ&oacute;.</p>\r\n\r\n<p><strong>3. Những th&ocirc;ng tin cần thiết kh&aacute;c</strong></p>\r\n\r\n<p>Trong trường hợp chiếc xe&nbsp;<strong>Toyota</strong>&nbsp;của qu&yacute; kh&aacute;ch xảy ra hỏng h&oacute;c, h&atilde;y chuẩn bị những th&ocirc;ng tin sau đ&acirc;y:</p>\r\n\r\n<p>- M&ocirc; tả ch&iacute;nh x&aacute;c về những hỏng h&oacute;c bao gồm những điều kiện hoạt động.</p>\r\n\r\n<p>- Model v&agrave; năm sản xuất.</p>\r\n\r\n<p>- Số nhận dạng phương tiện (VIN)</p>\r\n\r\n<p>- Số đo c&ocirc;ng tơ m&eacute;t hiện thời.</p>\r\n\r\n<p>- Ng&agrave;y mua xe.</p>\r\n\r\n<p>- &ETH;ại l&yacute; / Trạm dịch vụ bảo h&agrave;nh b&aacute;n xe v&agrave; thực hiện dịch vụ.</p>\r\n\r\n<p>- Thống k&ecirc; qu&aacute; tr&igrave;nh dịch vụ xe của Qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p><strong>4. L&agrave;m thế n&agrave;o để nhận sự gi&uacute;p đỡ</strong></p>\r\n\r\n<p><em>Bước 1: Li&ecirc;n hệ với Đại l&yacute; / Trạm dịch vụ Toyota của bạn</em></p>\r\n\r\n<p>Đ&acirc;y l&agrave; c&aacute;ch trực tiếp nhất để giải quyết những vấn đề của Qu&yacute; kh&aacute;ch. Tất cả những Đại l&yacute; / Trạm dịch vụ bảo h&agrave;nh Toyota ở Việt Nam l&agrave; ph&aacute;p nh&acirc;n chịu tr&aacute;ch nhiệm cuối c&ugrave;ng trong việc cung cấp c&aacute;c dịch vụ v&agrave; sửa chữa Qu&yacute; kh&aacute;ch cần. &ETH;ầu ti&ecirc;n, li&ecirc;n hệ với Trưởng ph&ograve;ng dịch vụ của Đại l&yacute; / Trạm dịch vụ hoặc với nh&acirc;n vi&ecirc;n phụ tr&aacute;ch quan hệ với kh&aacute;ch h&agrave;ng. Giải th&iacute;ch đầy đủ về t&igrave;nh trạng hỏng h&oacute;c.</p>\r\n\r\n<p>Nếu Qu&yacute; kh&aacute;ch thấy rằng vấn đề kh&ocirc;ng được giải quyết, h&atilde;y tr&igrave;nh b&agrave;y với Gi&aacute;m đốc đại l&yacute; của Qu&yacute; kh&aacute;ch l&agrave; người quan t&acirc;m nhất đến sự h&agrave;i l&ograve;ng v&agrave; sự lui tới của Qu&yacute; kh&aacute;ch.</p>\r\n\r\n<p>Nếu đại l&yacute; Toyota của Qu&yacute; kh&aacute;ch kh&ocirc;ng thể đưa ra giải ph&aacute;p...</p>\r\n\r\n<p><em>Bước 2: Li&ecirc;n hệ với C&ocirc;ng ty &ocirc; t&ocirc; Toyota Việt Nam</em></p>\r\n\r\n<p>Li&ecirc;n hệ với C&ocirc;ng ty &ocirc; t&ocirc; Toyota Việt Nam (TMV) qua ph&ograve;ng dịch vụ của TMV được ghi tr&ecirc;n Phiếu đăng k&yacute; bảo h&agrave;nh.</p>\r\n\r\n<hr />\r\n<p>Li&ecirc;n quan đến c&aacute;c vấn đề Bảo h&agrave;nh, Qu&yacute; kh&aacute;ch c&oacute; thể li&ecirc;n hệ với ch&uacute;ng t&ocirc;i th&ocirc;ng qua c&aacute;c k&ecirc;nh sau:</p>\r\n\r\n<p>- Hotline :&nbsp;<strong>093469.6669</strong>&nbsp;(nh&aacute;nh 2)</p>\r\n\r\n<p>- Tư vấn v&agrave; hỗ trợ 24/07:&nbsp;<a href=\"http://m.me/ToyotaThanhXuan\">m.me/ToyotaThanhXuan</a></p>\r\n\r\n<p>- Đăng k&iacute; đặt hẹn:&nbsp;<a href=\"http://bit.ly/dat-hen-ttx\">https://bit.ly/dat-hen-ttx</a></p>\r\n\r\n<p><strong>Toyota Thanh Xu&acirc;n h&acirc;n hạnh được đ&oacute;n tiếp qu&yacute; kh&aacute;ch!</strong></p>\r\n\r\n<hr />\r\n<p><strong>&copy;&nbsp; Toyota Thanh Xu&acirc;n:</strong></p>\r\n\r\n<p>➤&nbsp;Website:&nbsp;<a href=\"http://toyotathanhxuan.com.vn/\">http://toyotathanhxuan.com.vn/</a></p>\r\n\r\n<p>➤&nbsp;Fanpage:&nbsp;<a href=\"http://www.facebook.com/ToyotaThanhXuan/\">https://www.facebook.com/ToyotaThanhXuan/</a></p>\r\n\r\n<p>➤&nbsp;Youtube:&nbsp;<a href=\"https://www.youtube.com/c/ToyotaThanhXu%C3%A2n315\">https://www.youtube.com/c/ToyotaThanhXu&acirc;n315</a></p>\r\n\r\n<p>➤&nbsp;Hotline:<strong>&nbsp;093469.6669</strong>&nbsp;(nh&aacute;nh 2)</p>', 'uploads/post/1624977594_C0067_00_01_25_36_Still005_1596510913.jpg', 3, '2021-07-10 17:00:10', '2021-07-10 10:00:10', 'chinh-sach-bao-hanh-xe-toyota'),
(4, 'SIÊU LỄ HỘI - 100% CƠ HỘI -12/12/2020', 'Ngày 12/12/2020, Toyota Thanh Xuân mang đến chương trình “Siêu lễ hội - 100% cơ hội” với nhiều hoạt động cực hấp dẫn cho cả gia đình', '<p>Ng&agrave;y 12/12/2020, Toyota Thanh Xu&acirc;n mang đến chương tr&igrave;nh &ldquo;Si&ecirc;u lễ hội - 100% cơ hội&rdquo; với nhiều hoạt động cực hấp dẫn cho cả gia đ&igrave;nh</p>\r\n\r\n<p>Chương tr&igrave;nh được tổ chức tại Toyota Thanh Xu&acirc;n, cụ thể:<br />\r\n🔻&nbsp;Thời gian: 09h00 &ndash; 15h00 Thứ 7 ng&agrave;y 12/12/2020<br />\r\n🔻&nbsp;Địa điểm: Toyota Thanh Xu&acirc;n &ndash; 315 Trường Chinh, Q.Thanh Xu&acirc;n, H&agrave; Nội.</p>\r\n\r\n<p><br />\r\nHoạt động tại si&ecirc;u lễ hội:<br />\r\n- Trải nghiệm l&aacute;i thử c&aacute;c d&ograve;ng xe Toyota thế hệ mới: Cross, Fortuner Legender, Vios, Wigo, Camry<br />\r\n- Qu&agrave; tặng cho KH tham dự Chương tr&igrave;nh&nbsp;<a href=\"https://business.facebook.com/hashtag/hi%E1%BA%BFn_m%C3%A1u_nh%C3%A2n_%C4%91%E1%BA%A1o?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARBS2v4Cw1N1LzpA482M_Zr3DUxEb8KtZiXYSdhY9gCySq8AGD6JloErFRxvxai-oHmzfHoPY-DOSH7Nvz1BObhIPsSdb88gZiVa53I7CC7aXXX9Bfn724Nno3jXHkZD71FnL0av9c3UryLvgB46RL-w6txrC0FCfpkslgKJJyWyr5S3sZiJGgTelfsgTGUCADn47DDoVhkNi4NbBJSnaHLAmlHsmrUqDxY40zYtuYiorsaXhw8jEH4qko8XZ6KvTXSNvjKZNksvgGoJDOnGL4imQmACSlYT5zsLkoI8mf7pgNTZcUmhB2c476vcupAMeEnG&amp;__tn__=%2ANK-R\">#Hiến_m&aacute;u_nh&acirc;n_đạo</a>&nbsp;v&igrave; cộng đồng năm 2020<br />\r\n- Tặng ngay BƠM LỐP ĐIỆN TỬ khi kh&aacute;ch h&agrave;ng k&iacute; hợp đồng tại sự kiện<br />\r\n- B&eacute; Tham gia Minigame c&ugrave;ng &ocirc;ng gi&agrave;&nbsp;<a href=\"https://business.facebook.com/hashtag/noel?source=feed_text&amp;epa=HASHTAG&amp;__xts__%5B0%5D=68.ARBS2v4Cw1N1LzpA482M_Zr3DUxEb8KtZiXYSdhY9gCySq8AGD6JloErFRxvxai-oHmzfHoPY-DOSH7Nvz1BObhIPsSdb88gZiVa53I7CC7aXXX9Bfn724Nno3jXHkZD71FnL0av9c3UryLvgB46RL-w6txrC0FCfpkslgKJJyWyr5S3sZiJGgTelfsgTGUCADn47DDoVhkNi4NbBJSnaHLAmlHsmrUqDxY40zYtuYiorsaXhw8jEH4qko8XZ6KvTXSNvjKZNksvgGoJDOnGL4imQmACSlYT5zsLkoI8mf7pgNTZcUmhB2c476vcupAMeEnG&amp;__tn__=%2ANK-R\">#NOEL</a>&nbsp;nhận ngay nhiều phần qu&agrave; đến từ Toyota Thanh Xu&acirc;n.<br />\r\n- Thưởng thức tiệc Tea-break<br />\r\n- Bốc thăm tr&uacute;ng thưởng 01 l&ograve; vi s&oacute;ng ELEXTROLUX<br />\r\n- Chụp h&igrave;nh check in &ldquo;Đ&Oacute;N GI&Aacute;NG SINH - CH&Agrave;O NĂM MỚI&rdquo;</p>\r\n\r\n<p><br />\r\nĐăng k&yacute; tham gia sự kiện, Qu&yacute; kh&aacute;ch h&agrave;ng c&oacute; thể đăng k&yacute; theo c&aacute;c c&aacute;ch&nbsp;sau:<br />\r\n1. Đăng k&yacute; tham dự sự kiện tại:&nbsp;<a href=\"https://l.facebook.com/l.php?u=http%3A%2F%2Fbit.ly%2FlaithuxeTTX%3Ffbclid%3DIwAR29tMBQklW7ChIY9nGHbncheAc6gWjSPN0mh_TG0wRPiu3KMqJBcOmNHlo&amp;h=AT3sL8VtOou-n8z0PXPIun_PKYPjhlh-XelfYWd-HvVHOOq1enLePUazNW8z61jP1W4oYl1bdVpKf8RL3NcEiIkqaZo778pIM70S8Vt7aVKfSMtZ1Z1OITnJsD6E2HhsAXOs0GsGUX075BA_ZNkkTXBK6ZbQbz5CO9CR-XkGAglZijKi2-eNUjQj7Ew9_NMJ-l_VlU0ihO-LFPXVLsb8SFG-NeXZh11vqfA9uJl2S55sEuxeoE2otFb6HYVHq1INz2zoZSY7Ne95K9b4Bwjx7i2EpIuTQNGWkmCMCBJLwKchMYHE7f_PH_aou6f5AaHy2M3XDmSOlxrkzK9l32fsNQe4sYDehcDFo3yH38-wdnTJpD4UNcar_NFLQHLb5PQxzuwIe-w5yro5fBQIpjQRL2FODgEIdzwD2EGUfw9wBuWT29vntZBETNQJ4zPqHWxX_tm6QM-ccNjwQaLOs4wnB2u3yF6B0oxeXq-iV5VDXQ4281X-YVS-KEUrBOZKEHF7Q3i-69XNN18cmKjGWdqI_xfXN56LoWSCeoAC_xD1qBOi_el-UflPLLGeAVhgFDWiHare5Tyc3scUdsOscIkaUqUOn68UZfH9KDHNL0kj\" rel=\"noopener nofollow\" target=\"_blank\">bit.ly/laithuxeTTX</a><br />\r\n2. Gọi tới Hotline 0934696669 (Nh&aacute;nh #1)</p>\r\n\r\n<p><img alt=\"\" height=\"16\" src=\"https://static.xx.fbcdn.net/images/emoji.php/v9/tf3/1.5/16/2764.png\" width=\"16\" />&nbsp;Chuỗi ưu đ&atilde;i &quot;Si&ecirc;u lễ hội - trăm cơ hội&quot; l&agrave; dịp Toyota Thanh Xu&acirc;n tri &acirc;n kh&aacute;ch h&agrave;ng, cảm ơn qu&yacute; kh&aacute;ch h&agrave;ng tin tưởng lựa chọn v&agrave; đồng h&agrave;nh c&ugrave;ng Toyota Thanh Xu&acirc;n suốt một năm qua c&ugrave;ng rất nhiều phần qu&agrave; hấp dẫn đang chờ đ&oacute;n!</p>\r\n\r\n<hr />\r\n<p>&copy;&nbsp; Toyota Thanh Xu&acirc;n:</p>\r\n\r\n<p>➤&nbsp;Website:&nbsp;http://toyotathanhxuan.com.vn/</p>\r\n\r\n<p>➤&nbsp;Fanpage:&nbsp;https://www.facebook.com/ToyotaThanhXuan/</p>\r\n\r\n<p>➤&nbsp;Youtube:&nbsp;https://www.youtube.com/c/ToyotaThanhXu&acirc;n315</p>\r\n\r\n<p>➤&nbsp;Hotline:&nbsp;<strong>093469.6669&nbsp;</strong>(nh&aacute;nh 1)</p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/cross-2020_1605772413.jpg\" width=\"600\" /></p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/LAi-thu-xe-toyota%20(3)_1592991559.jpg\" width=\"600\" /></p>\r\n\r\n<p><img alt=\"\" height=\"338\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/77056694_2873545215998793_6113928959953469440_n_1587544915.png\" width=\"600\" /></p>', 'uploads/post/1624977668_CCCCCCC_1607506598.jpg', 7, '2021-07-16 09:06:50', '2021-07-16 02:06:50', 'sieu-le-hoi-100-co-hoi-12122020'),
(5, 'Bài viết số 3', 'dsadas', '<p>gdhsjadgjsa</p>', 'uploads/post/1626426588_Image-7-1.png', 0, '2021-07-16 02:09:48', '2021-07-16 02:09:48', 'bai-viet-so-3');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `slug`, `description`, `content`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 'CĂN CHỈNH ĐỘ CHỤM BÁNH XE BẰNG MÁY HUNTER', 'can-chinh-do-chum-banh-xe-bang-may-hunter', 'Hệ thống máy căn chỉnh góc đặt độ chụm bánh xe điện tử Hunter được cung cấp bởi hãng Hunter của Mỹ, một trong những hãng chuyên chế tạo máy cân bằng động lốp nổi tiếng trên thế giới.', '<p><strong>Hệ thống m&aacute;y căn chỉnh g&oacute;c đặt độ chụm b&aacute;nh xe điện tử Hunter&nbsp;</strong>được cung cấp bởi h&atilde;ng Hunter của Mỹ, một trong những h&atilde;ng chuy&ecirc;n chế tạo m&aacute;y c&acirc;n bằng động lốp nổi tiếng tr&ecirc;n thế giới.</p>\r\n\r\n<p>M&aacute;y được trang bị c&ocirc;ng nghệ hiện đại bậc nhất tr&ecirc;n thế giới, gi&uacute;p thực hiện c&ocirc;ng việc ch&iacute;nh x&aacute;c v&agrave; nhanh ch&oacute;ng, giảm thời gian để ho&agrave;n th&agrave;nh c&ocirc;ng việc, tăng năng suất v&agrave; hiệu quả l&agrave;m việc.</p>\r\n\r\n<p>Th&ocirc;ng qua c&ocirc;ng nghệ hiện đại, m&aacute;y gi&uacute;p đo v&agrave; c&acirc;n bằng động b&aacute;nh xe ch&iacute;nh x&aacute;c nhất nhưng với<strong>&nbsp;khối lượng ch&igrave;</strong>&nbsp;th&ecirc;m v&agrave;o &iacute;t nhất, giảm chi ph&iacute; ch&igrave; ph&aacute;t sinh khi c&acirc;n bằng động.</p>\r\n\r\n<p><img alt=\"\" height=\"433\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/Content/Dich-vu/cham-soc-lam-dep/2.jpg\" width=\"800\" /></p>\r\n\r\n<h4><strong>M&aacute;y căn chỉnh g&oacute;c đặt độ chụm b&aacute;nh xe điện tử Hunter c&oacute; những ưu điểm như sau:</strong></h4>\r\n\r\n<h4><strong>Khả năng phát hi&ecirc;̣n lực dọc &ldquo;Road Force&rdquo; làm bánh bị nh&acirc;̉y</strong></h4>\r\n\r\n<p>Đ&acirc;y l&agrave; một t&iacute;nh năng mới trong ng&agrave;nh c&ocirc;ng nghiệp dịch vụ &ocirc; t&ocirc;. T&iacute;nh năng n&agrave;y gi&uacute;p ch&uacute;ng ta đo được sự đồng đều của lốp xe.</p>\r\n\r\n<p>Th&ocirc;ng thường với c&aacute;c m&aacute;y c&acirc;n bằng lốp thế hệ trước, việc c&acirc;n bằng động chỉ c&oacute; thể gi&uacute;p b&aacute;nh xe c&acirc;n bằng về mặt khối lượng, c&ograve;n về mặt h&igrave;nh d&aacute;ng lồi l&otilde;m của lốp vẫn kh&ocirc;ng thể kiểm tra v&agrave; kh&ocirc;ng thể khắc phục được. Khi đi tr&ecirc;n đường do lực hướng t&acirc;m t&aacute;c dụng l&ecirc;n b&aacute;nh xe tại c&aacute;c vị tr&iacute; lồi l&otilde;m sẽ g&acirc;y n&ecirc;n rung động, tức l&agrave; hiện tượng b&aacute;nh bị nhẩy. Để kiểm tra độ lồi l&otilde;m với m&aacute;y c&acirc;n bằng động Hunter GSP 9700, một quả rul&ocirc; m&ocirc; phỏng mặt đường sẽ tạo một tải trọng tương đương 150 kg t&aacute;c dụng l&ecirc;n b&aacute;nh xe. Từ đ&oacute; n&oacute; sẽ x&aacute;c định được c&aacute;c vị tr&iacute; lồi l&otilde;m tr&ecirc;n lốp do m&ograve;n kh&ocirc;ng đều, v&agrave; hiển thị th&agrave;nh th&ocirc;ng số lực (đơn vị Newton).</p>\r\n\r\n<h4><strong>Khả năng phát hi&ecirc;̣n lực kéo ngang &ldquo;Lateral Force&rdquo; làm xe bị nhao lái</strong></h4>\r\n\r\n<p>Lốp xe sau một thời gian sử dụng, dưới t&aacute;c dụng lồi l&otilde;m của mặt đường cũng như sự sai lệch trong c&aacute;c g&oacute;c đặt b&aacute;nh xe sẽ l&agrave;m cho lốp xe bị c&ocirc;n (mặt trong v&agrave; ngo&agrave;i của lốp m&ograve;n kh&aacute;c nhau), dưới t&aacute;c dụng của tải trọng khi di chuyển tr&ecirc;n đường sẽ g&acirc;y ra lực k&eacute;o ngang l&ecirc;n lốp xe khiến xe bị nhao l&aacute;i. Qua việc quan s&aacute;t th&ocirc;ng thường ta c&oacute; thể thấy được độ c&ocirc;n của lốp, nhưng kh&ocirc;ng thể t&iacute;nh to&aacute;n được lực k&eacute;o ngang t&aacute;c dụng l&ecirc;n lốp khi chịu tải với c&aacute;c m&aacute;y c&acirc;n bằng động cũ trước đ&acirc;y.</p>\r\n\r\n<p>Điều n&agrave;y ho&agrave;n to&agrave;n thực hiện được với m&aacute;y c&acirc;n bằng động Hunter GSP 9700, bằng c&aacute;ch th&ocirc;ng qua quả rul&ocirc; m&ocirc; phỏng mặt đường, m&aacute;y sẽ đo được độ c&ocirc;n của từng lốp, từ đ&oacute; t&iacute;nh to&aacute;n được lực k&eacute;o ngang khi b&aacute;nh xe quay c&oacute; tải. Chức năng n&agrave;y kết hợp với chức năng Straight Track sẽ gi&uacute;p giảm thiểu nhao l&aacute;i đến thấp nhất, đem lại cảm gi&aacute;c l&aacute;i xe an to&agrave;n cho người l&aacute;i.</p>\r\n\r\n<h4><strong>Chức năng giảm thi&ecirc;̉u lực dọc &ldquo;Force Matching&rdquo;</strong></h4>\r\n\r\n<p>Chức năng n&agrave;y được sử dụng để đo độ m&eacute;o của v&agrave;nh cũng như độ m&eacute;o của lốp, sau đ&oacute; đưa vị tr&iacute; thấp nhất của v&agrave;nh tr&ugrave;ng với vị tr&iacute; cao nhất của lốp. Việc n&agrave;y gi&uacute;p c&aacute;c lực t&aacute;c dụng l&ecirc;n v&agrave;nh v&agrave; lốp tự triệt ti&ecirc;u nhau, gi&uacute;p giảm đi lực dọc t&aacute;c dụng l&ecirc;n b&aacute;nh xe, khiến b&aacute;nh bị nhẩy.</p>\r\n\r\n<h4><strong>Chức năng làm tri&ecirc;̣t ti&ecirc;u lực kéo ngang &ldquo;Straight Track&rdquo;&ndash; giúp xe chạy thẳng:</strong></h4>\r\n\r\n<p>Nhao l&aacute;i l&agrave; một hiện tượng dễ ph&aacute;t hiện nhưng kh&aacute; mất thời gian để x&aacute;c định nguy&ecirc;n nh&acirc;n cũng như sửa chữa n&oacute;, n&oacute; khiến cho xe kh&ocirc;ng thể chạy thẳng. Nhao l&aacute;i c&oacute; thể bắt nguồn từ r&ocirc; tuyn c&acirc;n bằng, từ hệ thống treo, c&aacute;c g&oacute;c Camber, Caster hay độ chụm kh&ocirc;ng đ&uacute;ng so với ti&ecirc;u chuẩn hay ngay từ ch&iacute;nh hệ thống phanh hoặc độ m&ograve;n kh&ocirc;ng đều của lốp. Trong trường hợp nguy&ecirc;n nh&acirc;n do độ m&ograve;n kh&ocirc;ng đều của lốp, th&ocirc;ng thường ta sẽ đảo lốp, tuy nhi&ecirc;n, việc n&agrave;y kh&ocirc;ng giải quyết được ho&agrave;n to&agrave;n vấn đề một c&aacute;ch nhanh ch&oacute;ng v&agrave; ch&iacute;nh x&aacute;c nhất.&nbsp;</p>\r\n\r\n<p><strong>Thời gian</strong>: Căn chỉnh g&oacute;c đặt/độ chụm (Kh&ocirc;ng c&oacute; c&acirc;n bằng động b&aacute;nh xe):<br />\r\nXe c&oacute; bul&ocirc;ng cam chỉnh: 30 ph&uacute;t<br />\r\nXe c&oacute; bul&ocirc;ng chỉnh hệ treo Macpherson: 50 Ph&uacute;t</p>', 'uploads/service/1624976628_2.jpg', 3000000, '2021-06-29 07:23:48', '2021-06-29 07:23:48'),
(2, 'BẢO DƯỠNG NHANH', 'bao-duong-nhanh', 'Toyota Thanh Xuân cung cấp Dịch vụ BẢO DƯỠNG NHANH theo quy định và tiêu chuẩn của Toyota Việt Nam.', '<p>Với &nbsp;mong muốn đ&aacute;p&nbsp;ứng hơn nữa y&ecirc;u cầu của Kh&aacute;ch h&agrave;ng nhất l&agrave; tiết kiệm thời gian qu&yacute; b&aacute;u cho Kh&aacute;ch h&agrave;ng khi đưa xe đi v&agrave;o Đại l&yacute; l&agrave;m bảo dưỡng,&nbsp;Toyota Thanh Xu&acirc;n<strong>&nbsp;</strong>cung cấp<strong>&nbsp;Dịch vụ BẢO DƯỠNG NHAN</strong><strong>H</strong>&nbsp;theo quy định v&agrave; ti&ecirc;u chuẩn của Toyota Việt Nam.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" height=\"533\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/Content/Dich-vu/bao-duong-nhanh/quick-maintenance-2.jpg\" width=\"800\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Dịch vụ&nbsp;<strong>BẢO DƯỠNG NHANH&nbsp;</strong>sẽ gi&uacute;p Qu&iacute; kh&aacute;ch h&agrave;ng h&agrave;i l&ograve;ng hơn khi thời gian chờ bảo dưỡng th&ocirc;ng thường giảm từ 150 ph&uacute;t xuống c&ograve;n 60 ph&uacute;t&nbsp;<em>(t&iacute;nh từ khi lệnh sửa chữa được k&yacute; cho đến l&uacute;c nhận lại xe).</em></p>\r\n\r\n<p><img alt=\"\" height=\"945\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/Content/Dich-vu/bao-duong-nhanh/quickmaintenanceproccess-13april--01.png\" width=\"600\" /></p>\r\n\r\n<p><strong>BẢO DƯỠNG NHANH</strong>&nbsp;đưa ra sự thay đổi cho quy chuẩn d&ograve;ng c&ocirc;ng việc. Khi kh&aacute;ch h&agrave;ng đặt hẹn qua điện thoại, Cố vấn dịch vụ sẽ thu thập c&aacute;c th&ocirc;ng tin chi tiết về Kh&aacute;ch h&agrave;ng, về t&igrave;nh trạng xe v&agrave; y&ecirc;u cầu dịch vụ, qua đ&oacute; x&aacute;c định ch&iacute;nh x&aacute;c thời điểm hẹn đưa xe tới bảo h&agrave;nh hoặc tư vấn cho kh&aacute;ch h&agrave;ng thời điểm n&agrave;o th&iacute;ch hợp. Tất cả được tổng hợp v&agrave; ghi r&otilde; tr&ecirc;n phiếu hẹn.&nbsp;<br />\r\n<br />\r\nDịch vụ&nbsp;<strong>BẢO DƯỠNG NHANH&nbsp;</strong>đ&ograve;i hỏi khả năng cung cấp nhanh v&agrave; ch&iacute;nh x&aacute;c c&aacute;c phụ t&ugrave;ng của&nbsp;Toyota Thanh&nbsp;Xu&acirc;n&nbsp;đồng thời thao t&aacute;c c&ocirc;ng việc phải đảm bảo ch&iacute;nh x&aacute;c, đ&uacute;ng quy tr&igrave;nh,&nbsp;r&uacute;t ngắn thời gian chờ đợi của Kh&aacute;ch h&agrave;ng. Để thực hiện được điều n&agrave;y đ&ograve;i hỏi đội ngũ nh&acirc;n vi&ecirc;n từ Cố vấn dịch vụ, Đốc c&ocirc;ng, Kỹ thuật vi&ecirc;n, Nh&acirc;n vi&ecirc;n phụ t&ugrave;ng, Điều phối vi&ecirc;n phải trải qua những đợt tập huấn kỹ lưỡng, nắm vững quy tr&igrave;nh chuẩn để c&oacute; thể phối hợp c&ocirc;ng việc một c&aacute;ch hiệu quả.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Để cung cấp Dịch vụ&nbsp;<strong>BẢO DƯỠNG NHANH</strong>&nbsp;theo đ&uacute;ng quy định của Toyota Việt Nam,&nbsp;Toyota Thanh Xu&acirc;n&nbsp;đ&atilde; đầu tư trang thiết bị cơ sở vật chất kỹ thuật ti&ecirc;n tiến, trang bị khoang bảo dưỡng nhanh những thiết bị chuy&ecirc;n d&ugrave;ng, hiện đại, thiết lập quy tr&igrave;nh l&agrave;m việc<strong>&nbsp;BẢO DƯỠNG NHANH&nbsp;</strong>theo ti&ecirc;u chuẩn&nbsp;<em>(sắp xếp, ph&acirc;n c&ocirc;ng c&ocirc;ng việc theo đ&uacute;ng quy tr&igrave;nh, giảm thiểu tối đa c&aacute;c động t&aacute;c thừa của nh&acirc;n vi&ecirc;n kỹ thuật trong thao t&aacute;c l&agrave;m việc)</em>, đồng thời li&ecirc;n tục thực hiện việc đ&agrave;o tạo n&acirc;ng cao tr&igrave;nh độ cho đội ngũ kỹ thuật vi&ecirc;n nhằm đảm bảo cung cấp được dịch vụ tốt mang tới sự h&agrave;i l&ograve;ng cao nhất cho Kh&aacute;ch h&agrave;ng.&nbsp;&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" height=\"533\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/Content/Dich-vu/bao-duong-nhanh/quick-maintenance-1.jpg\" width=\"800\" /></p>\r\n\r\n<p><strong>Hệ thống cầu n&acirc;ng hiện đại tại Khoang Sửa chữa nhanh (Khoang EM)</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" height=\"533\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/Content/Dich-vu/bao-duong-nhanh/quick-maintenance-3.jpg\" width=\"800\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"\" height=\"533\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-Thanh-Xuan/Content/Dich-vu/bao-duong-nhanh/quick-maintenance-4.jpg\" width=\"800\" /></p>', 'uploads/service/1624976902_TTX_Dichvusuachua_1-101d9458d083b49f41470ae9fd66d702.jpg', 2000000, '2021-06-29 14:41:41', '2021-06-29 07:41:41'),
(3, 'SƠN NHANH', 'son-nhanh', 'Toyota thiết lập dây chuyển sửa chữa nhanh thân Xe và Sơn (Express Body & Paint-EBP) dựa theo nguyên lý của Hệ thống sản xuất Toyota (TPS)', '<p>Toyota thiết lập d&acirc;y chuyển sửa chữa nhanh th&acirc;n Xe v&agrave; Sơn (Express Body &amp; Paint-EBP) dựa theo nguy&ecirc;n l&yacute; của Hệ thống sản xuất Toyota (TPS) nổi tiếng tr&ecirc;n to&agrave;n thế giới. D&acirc;y chuyển sản xuất được chia th&agrave;nh những c&ocirc;ng đoạn nhỏ, tại đ&oacute; c&oacute; sự tập trung chuy&ecirc;n m&ocirc;n h&oacute;a cao, giảm thiểu những c&ocirc;ng việc kh&ocirc;ng cần thiết. Việc kiểm tra chất lượng sản phẩm được thực hiện trong từng c&ocirc;ng đoạn v&agrave; trước khi giao xe.</p>\r\n\r\n<p>B&ecirc;n cạnh đ&oacute;, hệ thống xếp lượt kh&aacute;ch h&agrave;ng, quản l&yacute; đặt h&agrave;ng phụ t&ugrave;ng, theo d&otilde;i tiến độ... gi&uacute;p d&acirc;y chuyền EBP vận h&agrave;nh một c&aacute;ch li&ecirc;n tục ho&agrave;n hảo.EPB gi&uacute;p mang lại lợi &iacute;ch:</p>\r\n\r\n<ul>\r\n	<li>Chất lượng dịch vụ tốt nhất trong thời gian ngắn nhất.</li>\r\n	<li>Với chi ph&iacute; hợp l&yacute; nhất</li>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<ul>\r\n</ul>\r\n\r\n<ul dir=\"ltr\">\r\n</ul>\r\n\r\n<p><img alt=\"\" height=\"533\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-My-Dinh/Content/Dich-vu/A73W7418-min.jpg\" width=\"800\" /></p>\r\n\r\n<p>Kh&aacute;ch hảng nhận được hơn cả điều mong đợi:</p>\r\n\r\n<p>Chất lượng sửa chữa được đảm bảo nhờ cơ sở vật chất với dụng cụ ti&ecirc;n tiến, phụ t&ugrave;ng chinh hiệu, kỹ thuật vi&ecirc;n c&oacute; tay nghề cao.</p>\r\n\r\n<p>Quản l&yacute; v&agrave; r&uacute;t ngắn thời gian chờ đợi:</p>\r\n\r\n<p>Tiết kiệm chi phi do năng suất lao động tăng l&ecirc;n.</p>\r\n\r\n<p>Chế độ bảo h&agrave;nh cho dịch vụ sửa chữa vả phụ t&ugrave;ng thay thế ch&iacute;nh hiệu Toyota.</p>\r\n\r\n<h2><strong>C&Aacute;C C&Ocirc;NG ĐOẠN CH&Iacute;NH TRONG D&Acirc;Y CHUYỀN EBP</strong></h2>\r\n\r\n<h3><strong>1. Th&aacute;o chi tiết v&agrave; sửa vết l&otilde;m</strong></h3>\r\n\r\n<p>C&aacute;c cụm chi tiết được th&aacute;o ra phục vụ sửa chữa hoặc thay thế, đồng thời kỹ thuật vi&ecirc;n tiến h&agrave;nh g&ograve;, h&agrave;n giật để sửa c&aacute;c vết l&otilde;m tr&ecirc;n th&acirc;n xe.</p>\r\n\r\n<h3><strong>2. Chuẩn bị bề mặt</strong></h3>\r\n\r\n<p>Bao gồm c&aacute;c c&ocirc;ng việc từ xử l&yacute; chống gỉ (sơn l&oacute;t), bả mat&iacute;t, xả mat&iacute;t, sơn l&oacute;t đến giai đoạn che chắn để phun sơn</p>\r\n\r\n<h3><strong>3. Phun &amp; Sấy kh&ocirc; sơn</strong></h3>\r\n\r\n<p>Xe được chuyển v&agrave;o ph&ograve;ng sơn phun m&agrave;u. Sau đ&oacute;, chuyển qua ph&ograve;ng sấy kh&ocirc;. Ở đ&acirc;y, hệ thống sấy hồng ngoại s&oacute;ng ngắn sẽ sấy kh&ocirc; bề mặt sơn nhanh ch&oacute;ng v&agrave; đảm bảo chất lượng cao.</p>\r\n\r\n<h3><strong>4. Đ&aacute;nh b&oacute;ng &amp; Ho&agrave;n thiện</strong></h3>\r\n\r\n<p>Bao gồm c&aacute;c c&ocirc;ng việc đ&aacute;nh b&oacute;ng, lắp r&aacute;p chi tiết, kiểm tra cuối c&ugrave;ng trước khi giao xe.</p>\r\n\r\n<p><img alt=\"\" height=\"533\" src=\"https://node4-cdn.carbro.com/uploads/images/Toyota-My-Dinh/Content/Dich-vu/A73W7401-min.jpg\" width=\"800\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2><strong>Lưu &yacute;: Những xe sau đ&acirc;y ph&ugrave; hợp với d&acirc;y chuyền EBP</strong></h2>\r\n\r\n<p>&ndash; Kh&ocirc;ng thay thế tấm vỏ bằng phương ph&aacute;p h&agrave;n.</p>\r\n\r\n<p>&ndash; Kh&ocirc;ng nắn khung.</p>\r\n\r\n<p>&ndash; Phần tấm vỏ sửa chữa kh&ocirc;ng vượt qu&aacute; 1/2 diện t&iacute;ch tấm.</p>\r\n\r\n<p>&ndash; Số tấm cần sửa chữa hoặc thay thế kh&ocirc;ng vượt qu&aacute; 3 tấm.</p>', 'uploads/service/1624977028_tải xuống.jpg', 1000000, '2021-06-29 07:30:28', '2021-06-29 07:30:28'),
(4, 'DỌN NỘI THẤT', 'don-noi-that', 'Dọn nội thất ô tô rất quan trọng bởi trong quá trình sử dụng một số tác nhân sẽ gây ra mùi khó chịu', '<p>Dọn nội thất &ocirc; t&ocirc; rất quan trọng bởi trong qu&aacute; tr&igrave;nh sử dụng một số t&aacute;c nh&acirc;n sẽ g&acirc;y ra m&ugrave;i kh&oacute; chịu, đặc biệt đối với xe nội thất da, nỉ. Nếu kh&ocirc;ng kịp thời vệ sinh, dọn nội thất sạch sẽ th&igrave; c&oacute; thể dẫn đến một số bộ phận trong xe bị hoen ố, l&acirc;u ng&agrave;y sẽ bị hư hỏng.</p>', 'uploads/service/1624977284_don noi that-min.jpg', 1000000, '2021-06-29 07:34:44', '2021-06-29 07:34:44');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`, `avatar`, `active`, `created_at`, `updated_at`) VALUES
(2, 'Hưng', 'zztrunghungzz@gmail.com', '$2y$10$FiDqNIQMbuWryHMuaq2TNuguF3ncDeyFoBxwDotzMqeUATtVLLKV2', 395139875, 'Hà Nội', 1, 'uploads/user/1625368720_ddhj93p-b509cb78-4751-43f3-8d88-a97d25cdb8de.jpg', 1, '2021-07-04 03:18:40', '2021-07-03 20:18:40'),
(3, 'Trung Hưng', 'trunghung@gmail.com', '$2y$10$4d2D0E98ux0QSAE7uvptteO/y2sN9wK4YRXE0YtHENEK7B3S1dc2C', 346713429, 'HN', 0, NULL, 1, '2021-06-29 06:39:10', '2021-06-29 06:39:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking_cars`
--
ALTER TABLE `booking_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bookingCar_car_id` (`car_id`),
  ADD KEY `FK_bookingCar_user_id` (`user_id`);

--
-- Indexes for table `booking_servicedetail`
--
ALTER TABLE `booking_servicedetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bookingServiceDetail_bookingServiceId` (`booking_service_id`),
  ADD KEY `FK_bookingServiceDetail_ServiceId` (`service_id`);

--
-- Indexes for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_bookingService_UserId` (`user_id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_model_id` (`model_id`);

--
-- Indexes for table `car_imgs`
--
ALTER TABLE `car_imgs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_carImg_car_id` (`car_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_contract_bookingcar_id` (`booking_car_id`),
  ADD KEY `FK_contract_user_id` (`user_id`);

--
-- Indexes for table `in_cars`
--
ALTER TABLE `in_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_inCar_car_id` (`car_id`);

--
-- Indexes for table `models`
--
ALTER TABLE `models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `out_cars`
--
ALTER TABLE `out_cars`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_outCar_car_id` (`car_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `booking_cars`
--
ALTER TABLE `booking_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booking_servicedetail`
--
ALTER TABLE `booking_servicedetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `booking_services`
--
ALTER TABLE `booking_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `car_imgs`
--
ALTER TABLE `car_imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `in_cars`
--
ALTER TABLE `in_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `models`
--
ALTER TABLE `models`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `out_cars`
--
ALTER TABLE `out_cars`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking_cars`
--
ALTER TABLE `booking_cars`
  ADD CONSTRAINT `FK_bookingCar_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_bookingCar_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_servicedetail`
--
ALTER TABLE `booking_servicedetail`
  ADD CONSTRAINT `FK_bookingServiceDetail_ServiceId` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_bookingServiceDetail_bookingServiceId` FOREIGN KEY (`booking_service_id`) REFERENCES `booking_services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `booking_services`
--
ALTER TABLE `booking_services`
  ADD CONSTRAINT `FK_bookingService_UserId` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cars`
--
ALTER TABLE `cars`
  ADD CONSTRAINT `FK_model_id` FOREIGN KEY (`model_id`) REFERENCES `models` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car_imgs`
--
ALTER TABLE `car_imgs`
  ADD CONSTRAINT `FK_carImg_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `FK_contract_bookingcar_id` FOREIGN KEY (`booking_car_id`) REFERENCES `booking_cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_contract_user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `in_cars`
--
ALTER TABLE `in_cars`
  ADD CONSTRAINT `FK_inCar_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `out_cars`
--
ALTER TABLE `out_cars`
  ADD CONSTRAINT `FK_outCar_car_id` FOREIGN KEY (`car_id`) REFERENCES `cars` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
