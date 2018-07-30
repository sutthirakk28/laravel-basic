-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2018 at 12:48 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_th` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `blog_th`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Gun n roses', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00'),
(2, 'Megadeth', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00'),
(3, 'Pearl Jam', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00'),
(4, 'System of a Down', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `blog_tbl`
--

CREATE TABLE `blog_tbl` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_th` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blog_tbl`
--

INSERT INTO `blog_tbl` (`id`, `title`, `blog_th`, `deleted`, `created_at`, `updated_at`) VALUES
(1, 'Gun n roses', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00'),
(2, 'Megadeth', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00'),
(3, 'Pearl Jam', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00'),
(4, 'System of a Down', 'Best of Rock band', 0, '2018-06-20 17:00:00', '2018-06-20 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) UNSIGNED NOT NULL,
  `blog_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deps`
--

CREATE TABLE `deps` (
  `id_dep` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_dep` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `deps`
--

INSERT INTO `deps` (`id_dep`, `created_at`, `updated_at`, `name_dep`) VALUES
(1, '2018-07-16 08:48:32', '2018-07-30 07:32:29', 'ฝ่ายบุคคล/HR'),
(2, '2018-07-16 08:48:52', '2018-07-16 10:47:18', 'ฝ่ายการเงิน'),
(3, '2018-07-16 08:49:00', '2018-07-17 03:02:12', 'ฝ่ายขาย'),
(4, '2018-07-16 08:49:10', '2018-07-17 09:36:34', 'ฝ่ายบริการหลังการขายc'),
(5, '2018-07-16 08:49:22', '2018-07-16 10:49:54', 'ฝ่ายช่างติดตั้ง'),
(24, '2018-07-20 10:09:29', '2018-07-20 10:09:29', 'การตลาด'),
(25, '2018-07-21 09:54:58', '2018-07-21 09:55:21', 'บัญชี และการเงิน'),
(26, '2018-07-21 10:09:38', '2018-07-21 10:10:04', 'บัญชี และการเงินาสาาา'),
(27, '2018-07-30 04:18:59', '2018-07-30 04:18:59', 'ต่างประเทศ'),
(29, '2018-07-30 07:39:00', '2018-07-30 07:39:00', 'การคลังสินค้า');

-- --------------------------------------------------------

--
-- Table structure for table `leaves`
--

CREATE TABLE `leaves` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_per` int(11) NOT NULL,
  `type_leave` int(11) NOT NULL COMMENT '1=ลาคลอด 2=ลาป่วย 3=ลากิจ 4=ลากิจ-ราชการ',
  `date_leave` date NOT NULL,
  `reason_leave` text COLLATE utf8mb4_unicode_ci,
  `dstart_leave` date NOT NULL,
  `dend_leave` date NOT NULL,
  `proof_leave` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '1=ใบรับรองแพทย์ 2=ใบติดต่อราชการ 3=ตารางสอบ/เรียน 4=หลักฐานอื่นๆ',
  `approved` int(11) NOT NULL COMMENT '1=ประธานบริษัท 2=กรรมการผู้จัดการ 3=เจ้าหน้าที่ฝ่ายบุคคล 4=หัวหน้าฝ่าย',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `id_per`, `type_leave`, `date_leave`, `reason_leave`, `dstart_leave`, `dend_leave`, `proof_leave`, `approved`, `created_at`, `updated_at`) VALUES
(1, 21, 3, '2018-07-06', 'xxx', '2018-07-05', '2018-07-18', '3', 2, '2018-07-24 11:38:43', '2018-07-24 11:38:43'),
(2, 31, 2, '2018-07-12', 'cccccccc', '2018-07-13', '2018-07-08', '1', 1, '2018-07-24 11:39:27', '2018-07-24 11:39:27'),
(3, 31, 2, '2018-07-12', 'cccccccc', '2018-07-13', '2018-07-08', '2', 1, '2018-07-24 11:39:27', '2018-07-24 11:39:27'),
(4, 31, 2, '2018-07-12', 'cccccccc', '2018-07-13', '2018-07-08', '3', 1, '2018-07-24 11:39:27', '2018-07-24 11:39:27'),
(5, 38, 1, '2018-07-28', 'คลอดลูกที่ต่างจังหวัด', '2018-07-29', '2018-07-29', '1', 3, '2018-07-30 08:42:18', '2018-07-30 08:42:18'),
(6, 38, 1, '2018-07-28', 'คลอดลูกที่ต่างจังหวัด', '2018-07-29', '2018-07-29', '4', 3, '2018-07-30 08:42:18', '2018-07-30 08:42:18'),
(7, 40, 4, '2018-07-13', 'ลาไปสมัครงาน', '2018-07-26', '2018-07-28', '2', 1, '2018-07-30 10:04:56', '2018-07-30 10:04:56'),
(8, 37, 2, '2018-07-27', 'dend_leave', '2018-07-06', '2018-07-06', '2', 1, '2018-07-30 10:43:07', '2018-07-30 10:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `libs`
--

CREATE TABLE `libs` (
  `id` int(10) UNSIGNED NOT NULL,
  `surname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `nickname` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_employ` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_start` date NOT NULL,
  `job_end` date NOT NULL,
  `y_work` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `user_photo` blob NOT NULL,
  `education` int(11) DEFAULT NULL COMMENT '1=มัธยมศึกษาตอนต้น 2=มัธยมศึกษาตอนปลาย 3=ปวช. (ประกาศนียบัตรวิชาชีพ) 4=  \nปวส. (ประกาศนียบัตรวิชาชีพชั้นสูง) 5=ปริญญาตรี 6=ปริญญาโท 7=ปริญญาเอก',
  `n_education` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libs`
--

INSERT INTO `libs` (`id`, `surname`, `nickname`, `age`, `created_at`, `updated_at`, `id_employ`, `job_start`, `job_end`, `y_work`, `position`, `user_photo`, `education`, `n_education`, `phone`) VALUES
(21, 'นายสุชิน  บุญคำ', 'ชิน', '1987-03-12', '2018-07-12 09:45:25', '2018-07-30 08:37:36', 'TPM002', '2010-06-01', '2018-07-12', '99', 7, 0x313533323933363630382e4a5047, 5, 'Software Test Engineer', 699897555),
(31, 'นายบรรลังฤทธิ์  วงค์เหมาะ', 'ตุ่ย', '2018-07-01', '2018-07-19 08:19:45', '2018-07-30 08:37:53', 'TPM004', '2018-05-23', '2018-07-19', '99', 7, 0x313533323037363735342e6a7067, 4, NULL, NULL),
(37, 'นางfffffffff', 'ffffff', '1990-06-29', '2018-07-30 06:58:24', '2018-07-30 06:58:24', 'TPM002', '2018-06-05', '2018-07-30', '99', 13, 0x313533323933333930342e6a7067, 6, 'วิทยาการคอมพิวเตอร์', 896901952),
(38, 'นางสาวพิมพ์พิไล  งามแสง', 'แปว', '1820-07-10', '2018-07-30 07:07:08', '2018-07-30 08:39:51', 'TPM002', '2018-02-26', '2018-07-30', '99', 13, 0x313533323933393939312e4a5047, 1, 'วิทยาการคอมพิวเตอร์', 21571250),
(40, 'นางสาวเกศสุดา  อาสสุวรรณ์', 'คุณเกด', '1986-06-27', '2018-07-30 07:31:50', '2018-07-30 08:41:22', 'TPM015', '2018-04-17', '2018-07-30', '99', 3, 0x313533323933353931302e4a5047, 5, 'Software Test Engineer', 847743106),
(41, 'นางสาวแพรวรุ่ง  เลื้อยไธสง', 'คุณโบว์', '1993-11-18', '2018-07-30 07:35:46', '2018-07-30 08:38:26', 'TPM007', '2016-01-30', '2018-07-30', '99', 11, 0x313533323933363134362e4a5047, 5, NULL, 802412506);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_21_035640_create_blog_table', 1),
(4, '2018_06_21_044628_rename_column_blog_table', 2),
(5, '2018_06_23_063730_create_libs_table', 3),
(6, '2018_06_28_102428_create_comments_table', 4),
(7, '2018_07_09_102716_add_table', 5),
(8, '2018_07_09_104455_rename_column_libs_table', 6),
(9, '2018_07_10_162438_add_position_to_libs_table', 7),
(10, '2018_07_10_163838_change_id_employ_type_in_libs_table', 8),
(11, '2018_07_11_103804_change_age_type_in_libs_table', 9),
(13, '2018_07_11_104512_change_y_work_type_in_libs_table', 10),
(14, '2018_07_11_105646_change_y_work_type_in_libs_table', 11),
(15, '2018_07_11_105804_change_age_type_in_libs_table', 12),
(16, '2018_07_13_101411_create_dep_table', 12),
(17, '2018_07_13_104459_create_pos_table', 13),
(19, '2018_07_13_154452_change_position_type_in_libs_table', 14),
(20, '2018_07_19_113437_add_user_photo_to_libs_table', 15),
(21, '2018_07_24_155505_create_leaves_table', 16),
(22, '2018_07_24_164746_change_proof_leave_type_in_leaves_table', 17),
(23, '2018_07_30_113720_add_education_to_libs_table', 18),
(24, '2018_07_30_113832_add_n_education_to_libs_table', 18),
(25, '2018_07_30_114434_add_phone_to_libs_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('sutthirak.k28@gmail.com', '$2y$10$mFl7fPIJVWnj8Nbpkwl8veixmLT0NhAMhtYSD9YSZx6Fbi5doVPeK', '2018-07-09 01:34:05');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id_pos` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_pos` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_dep` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id_pos`, `created_at`, `updated_at`, `name_pos`, `id_dep`) VALUES
(1, NULL, '2018-07-20 10:08:22', 'เจ้าหน้าที่บัญชีggggg', 2),
(2, NULL, NULL, 'พนักงานขาย', 3),
(3, NULL, NULL, 'เจ้าหน้าที่ฝ่ายบุคคล', 1),
(4, NULL, '2018-07-17 10:15:22', 'เจ้าหน้าที่ โปรแกรมเมอร์', 1),
(5, NULL, NULL, 'ล่ามแปลภาษา', 1),
(6, NULL, NULL, 'พนักงานทำความสะอาด', 1),
(7, NULL, NULL, 'ช่างติดตั้ง', 5),
(8, NULL, NULL, 'หัวหน้าช่างติดตั้ง', 5),
(9, NULL, NULL, 'หัวหน้าฝ่ายบริการหลังการขาย', 4),
(10, NULL, '2018-07-17 10:23:57', 'พนักงานหลังการขาย1', 4),
(11, NULL, '2018-07-30 07:39:19', 'พนักงานคลังสินค้า', 29),
(12, NULL, NULL, 'หัวหน้าฝ่ายคลังสินค้า', 5),
(13, NULL, NULL, 'หัวหน้าฝ่ายขาย', 3),
(14, NULL, NULL, 'หัวหน้าฝ่ายการเงิน', 2),
(15, NULL, NULL, 'หัวหน้าฝ่ายบุคคล', 1),
(16, NULL, NULL, 'ช่างซ่อมบริการหลังการขาย', 4),
(17, NULL, NULL, 'หัวหน้าช่างซ่อมบริการหลังการขาย', 4),
(18, NULL, NULL, 'ทนายความ', 1),
(19, NULL, NULL, 'ทวงหนี้', 2),
(20, '2018-07-17 08:27:47', '2018-07-30 07:53:55', 'เจ้าหน้าที่บุคคลgggg', 1),
(21, '2018-07-17 08:29:48', '2018-07-30 07:53:59', 'เจ้าหน้าที่ทวงหนี้', 1),
(22, '2018-07-18 03:03:12', '2018-07-30 07:54:02', 'เจ้าหน้าที่ติดตามหนี้', 1),
(23, '2018-07-20 10:04:52', '2018-07-30 07:54:06', 'หาคน', 2),
(24, '2018-07-20 10:08:16', '2018-07-20 10:08:16', 'หาคน', 2),
(25, '2018-07-20 10:10:20', '2018-07-20 10:10:20', 'หาเงินสด', 24),
(29, '2018-07-21 09:55:55', '2018-07-21 09:55:55', 'ติดตามทวงหนี้', 25),
(30, '2018-07-21 10:10:32', '2018-07-21 10:11:09', 'ติดตามทวงหนี้้้เเเเเเ', 2),
(31, '2018-07-23 02:28:42', '2018-07-23 02:28:42', 'เจ้าหน้าที่ โปรแกรมเมอร์', 2),
(32, '2018-07-30 04:19:25', '2018-07-30 04:19:25', 'เจ้าหน้าที่ โปรแกรมเมอร์', 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'sutthirak', 'sutthirak.k28@gmail.com', '$2y$10$aq87USmNDMWuP0LZR4unXuYegO4XzYxRB5KvffEZflhy7bw37oitW', 'PK0OKflPCKJQmGEyJ62ddZ7VrkomJwPALSmbF1UFqpmOQudYGiNXdDfuFNnk', '2018-07-08 21:55:56', '2018-07-08 21:55:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `deps`
--
ALTER TABLE `deps`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `leaves`
--
ALTER TABLE `leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `libs`
--
ALTER TABLE `libs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id_pos`);

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
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_tbl`
--
ALTER TABLE `blog_tbl`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `deps`
--
ALTER TABLE `deps`
  MODIFY `id_dep` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `libs`
--
ALTER TABLE `libs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id_pos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
