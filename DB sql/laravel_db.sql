-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2018 at 12:37 PM
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
  `position` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libs`
--

INSERT INTO `libs` (`id`, `surname`, `nickname`, `age`, `created_at`, `updated_at`, `id_employ`, `job_start`, `job_end`, `y_work`, `position`) VALUES
(11, 'นายวันชัย  คุชิตา', 'กุ้ง', '2014-05-12', '2018-07-08 17:00:00', NULL, 'TP002', '2016-08-22', '2017-08-22', '3', 'พนักงานช่างติดตั้ง'),
(12, 'ดเ่เ่เาสวสส', '้่า้ส้่ส่ส', '2016-08-22', '2018-07-10 10:13:01', '2018-07-10 10:13:01', 'rt012', '2018-07-01', '2018-07-01', '99', 'กดเกดเ'),
(14, 'หดห', 'หดหกด', '2010-11-01', '2018-07-10 10:37:56', '2018-07-10 10:37:56', 'หกดห', '2016-01-05', '2018-07-10', '2', 'หกด'),
(15, 'นายวิทวัส  บุญยงค์', 'ชำ', '2011-10-22', '2018-07-10 10:38:34', '2018-07-10 10:38:34', 'TP003', '2013-01-04', '2018-07-10', '5', 'หัวหน้าช่างติดตั้ง'),
(16, 'นายมงคล ใจสุข', 'น้อย', '1985-07-05', '2018-07-11 10:12:51', '2018-07-11 10:12:51', 'TP004', '2015-09-13', '2018-07-11', '99', 'ช่างติดตั้ง');

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
(14, '2018_07_11_105646_change_y_work_type_in_libs_table', 11);

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
(1, 'sutthirak', 'sutthirak.k28@gmail.com', '$2y$10$aq87USmNDMWuP0LZR4unXuYegO4XzYxRB5KvffEZflhy7bw37oitW', 'wUxM2igqYmKlx0XlaHKZ3sale3E2PWazXIlJiuLLfL88T1p2NAqw9bmIb8HY', '2018-07-08 21:55:56', '2018-07-08 21:55:56');

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
-- AUTO_INCREMENT for table `libs`
--
ALTER TABLE `libs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
