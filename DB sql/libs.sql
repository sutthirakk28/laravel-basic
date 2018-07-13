-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2018 at 01:00 PM
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
  `position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `libs`
--

INSERT INTO `libs` (`id`, `surname`, `nickname`, `age`, `created_at`, `updated_at`, `id_employ`, `job_start`, `job_end`, `y_work`, `position`) VALUES
(11, 'นายวันชัย  คุชิตา', 'กุ้ง', '2014-05-12', '2018-07-08 17:00:00', NULL, 'TP002', '2016-08-22', '2017-08-22', '3', 7),
(16, 'นายมงคล ใจสุข', 'น้อย', '1985-07-05', '2018-07-11 10:12:51', '2018-07-11 10:12:51', 'TP004', '2015-09-13', '2018-07-11', '99', 7),
(18, 'นายสุทธิรักษ์  นาระถี', 'ตุ่ย', '1992-10-16', '2018-07-12 04:20:03', '2018-07-12 04:20:03', 'TPM008', '2016-02-01', '2018-07-12', '99', 4),
(19, 'นางสาวพิมพ์พิไล  งามแสง', 'พิ', '1990-10-13', '2018-07-12 06:52:16', '2018-07-12 06:52:16', 'TPM009', '2017-06-10', '2018-07-12', '99', 10),
(20, 'นายสรศักดิ์  แซ่ตั้ง', 'ไก่', '1992-10-04', '2018-07-12 08:36:49', '2018-07-12 08:36:49', 'TPM004', '2016-04-04', '2018-07-12', '99', 7),
(21, 'นายสุชิน  บุญคำ', 'ชิน', '1987-03-12', '2018-07-12 09:45:25', '2018-07-12 09:45:25', 'TPM002', '2010-06-01', '2018-07-12', '99', 7),
(22, 'ทดสอบ', 'ทดสอบ', '2018-07-09', '2018-07-13 02:11:57', '2018-07-13 02:11:57', 'TP000', '2018-05-18', '2018-07-13', '99', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `libs`
--
ALTER TABLE `libs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libs`
--
ALTER TABLE `libs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
