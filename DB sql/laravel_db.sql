-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 19, 2018 at 09:36 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

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
(24, '2018-07-20 10:09:29', '2018-08-05 14:09:16', 'การตลาด'),
(25, '2018-07-21 09:54:58', '2018-07-21 09:55:21', 'บัญชี และการเงิน'),
(32, '2018-08-04 16:04:03', '2018-08-04 16:04:03', 'ฝ่ายบุคคล'),
(35, '2018-08-04 16:22:09', '2018-08-05 14:10:59', 'ฝ่ายขาย35'),
(36, '2018-08-04 16:22:09', '2018-08-04 16:22:09', 'ฝ่ายขาย'),
(37, '2018-08-04 16:25:00', '2018-08-04 16:25:00', 'ช่างติดตั้งกกwerwrwrwrw'),
(38, '2018-08-04 16:25:15', '2018-08-04 16:25:15', 'ฝ่ายขาย'),
(39, '2018-08-04 16:25:21', '2018-08-04 16:25:21', 'ฝ่ายขาย'),
(41, '2018-08-04 16:25:38', '2018-08-04 16:25:38', 'ฝ่ายจัดซื้อ'),
(42, '2018-08-04 16:26:00', '2018-08-04 16:26:00', 'ช่างติดตั้งกก'),
(43, '2018-08-04 16:38:11', '2018-08-04 16:38:11', 'daf'),
(44, '2018-08-04 16:38:59', '2018-08-04 16:38:59', 'ฝ่ายบุคคล'),
(45, '2018-08-05 13:24:54', '2018-08-05 13:24:54', 'ช่างติดตั้งกกsdsad'),
(46, '2018-08-05 13:25:04', '2018-08-05 13:25:04', 'asd'),
(47, '2018-08-05 14:11:15', '2018-08-05 14:11:28', 'ช่างติดตั้งกกsdsad'),
(48, '2018-08-05 14:53:38', '2018-08-05 15:39:01', 'ffffffffff'),
(49, '2018-08-19 07:55:35', '2018-08-19 07:55:35', 'dfgdsh');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `nstart_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nend_day` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_leave` int(11) DEFAULT NULL COMMENT '0=คิดตามระบบ 1=ไม่หักเงิน 2=หักเงิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leaves`
--

INSERT INTO `leaves` (`id`, `id_per`, `type_leave`, `date_leave`, `reason_leave`, `dstart_leave`, `dend_leave`, `proof_leave`, `approved`, `created_at`, `updated_at`, `nstart_day`, `nend_day`, `status_leave`) VALUES
(1, 21, 3, '2018-07-06', 'xxx', '2018-07-05', '2018-07-18', '3', 2, '2018-07-24 11:38:43', '2018-07-24 11:38:43', NULL, NULL, NULL),
(2, 31, 2, '2018-07-02', 'cccccccc', '2018-08-19', '2018-08-19', '1', 3, '2018-07-24 11:39:27', '2018-08-19 11:39:48', '2018-08-18T13:00', '2018-08-19T17:30', NULL),
(3, 31, 2, '2018-07-12', 'cccccccc', '2018-07-13', '2018-07-08', '2', 1, '2018-07-24 11:39:27', '2018-07-24 11:39:27', NULL, NULL, NULL),
(4, 31, 4, '2018-07-11', 'cccccccc', '2018-08-19', '2018-08-19', '3,4', 1, '2018-07-24 11:39:27', '2018-08-19 11:40:36', '2018-08-23T08:30', '2018-08-25T17:30', NULL),
(5, 38, 1, '2018-07-28', 'คลอดลูกที่ต่างจังหวัด', '2018-07-29', '2018-07-29', '1', 3, '2018-07-30 08:42:18', '2018-07-30 08:42:18', NULL, NULL, NULL),
(6, 38, 1, '2018-07-28', 'คลอดลูกที่ต่างจังหวัด', '2018-07-29', '2018-07-29', '4', 3, '2018-07-30 08:42:18', '2018-07-30 08:42:18', NULL, NULL, NULL),
(7, 40, 4, '2018-07-13', 'ลาไปสมัครงาน', '2018-07-26', '2018-07-28', '2', 1, '2018-07-30 10:04:56', '2018-07-30 10:04:56', NULL, NULL, NULL),
(8, 37, 2, '2018-07-27', 'dend_leave', '2018-07-06', '2018-07-06', '2', 1, '2018-07-30 10:43:07', '2018-07-30 10:43:07', NULL, NULL, NULL),
(9, 31, 3, '2018-07-18', 'dadada', '2018-07-31', '2018-08-01', '2,3,4', 4, '2018-07-31 03:06:46', '2018-07-31 03:06:46', NULL, NULL, NULL),
(10, 40, 3, '2018-07-21', NULL, '2018-07-31', '2018-07-31', '1,2,3,4', 1, '2018-07-31 04:11:54', '2018-07-31 04:11:54', NULL, NULL, NULL),
(11, 31, 2, '2018-07-20', 'sssssssssss', '2018-07-18', '2018-07-20', '1,2,4', 3, '2018-07-31 10:02:56', '2018-07-31 10:02:56', '2018-08-01T08:30', '2018-08-02T17:30', NULL),
(12, 37, 4, '2018-07-27', 'cxz', '2018-07-31', '2018-07-31', '2', 2, '2018-07-31 12:13:53', '2018-07-31 12:13:53', '2018-07-31T08:30', '2018-07-31T17:30', NULL),
(13, 42, 2, '2018-07-31', 'ไม่สบาย', '2018-07-31', '2018-07-31', '1,4', 3, '2018-07-31 12:29:47', '2018-07-31 12:29:47', '2018-08-01T08:30', '2018-08-01T12:00', NULL),
(14, 42, 3, '2018-07-31', 'ธุระ', '2018-07-31', '2018-07-31', '2', 4, '2018-07-31 12:30:38', '2018-07-31 12:30:38', '2018-07-31T08:30', '2018-07-31T17:30', NULL),
(15, 42, 2, '2018-07-30', 'กดหฟฟฟฟฟฟฟฟฟฟฟฟฟฟ', '2018-07-31', '2018-07-31', '', 3, '2018-07-31 13:50:55', '2018-07-31 13:50:55', '2018-07-31T08:30', '2018-07-31T17:30', NULL),
(16, 31, 2, '2018-07-31', NULL, '2018-07-31', '2018-07-31', '4', 3, '2018-07-31 14:05:51', '2018-07-31 14:05:51', '2018-08-01T08:30', '2018-08-02T17:30', NULL),
(17, 37, 2, '2018-08-09', 'fghfgh', '2018-08-19', '2018-08-19', '4', 3, '2018-08-19 07:56:57', '2018-08-19 07:56:57', '2018-08-02T08:30', '2018-08-04T17:30', NULL),
(18, 43, 1, '2018-08-07', NULL, '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 07:57:20', '2018-08-19 07:57:20', '2018-08-19T08:30', '2018-08-19T17:30', NULL),
(19, 43, 3, '2018-08-18', 'dfghgf', '2018-08-19', '2018-08-19', '4', 3, '2018-08-19 09:09:27', '2018-08-19 09:09:27', '2018-08-14T08:30', '2018-08-15T17:30', NULL),
(20, 43, 1, '2018-08-09', 'dasd', '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 09:44:02', '2018-08-19 09:44:02', '2018-08-19T08:30', '2018-08-19T17:30', 0),
(21, 43, 3, '2018-08-21', 'dfghfgh', '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 09:44:46', '2018-08-19 09:44:46', '2018-08-19T08:30', '2018-08-19T17:30', 1),
(22, 43, 4, '2018-08-17', 'dfh', '2018-08-19', '2018-08-19', '1,2,4', 4, '2018-08-19 09:45:34', '2018-08-19 09:45:34', '2018-08-21T08:30', '2018-08-23T17:30', 2),
(23, 43, 2, '2018-08-17', NULL, '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 09:48:30', '2018-08-19 09:48:30', '2018-08-21T08:30', '2018-08-22T12:00', 1),
(24, 43, 2, '2018-08-10', 'fgh', '2018-08-19', '2018-08-19', '2', 2, '2018-08-19 10:16:50', '2018-08-19 10:16:50', '2018-08-22T08:30', '2018-08-24T17:30', 1),
(25, 43, 2, '2018-08-10', NULL, '2018-08-19', '2018-08-19', '', 3, '2018-08-19 10:21:36', '2018-08-19 10:21:36', '2018-08-19T08:30', '2018-08-19T17:30', 0),
(26, 45, 0, '2018-08-09', 'กดเกเ', '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 10:30:55', '2018-08-19 10:30:55', '2018-08-20T08:30', '2018-08-21T10:00', 0),
(27, 45, 0, '2018-08-16', 'ยสลยบล', '2018-08-19', '2018-08-19', '', 3, '2018-08-19 10:32:01', '2018-08-19 10:32:01', '2018-08-21T08:30', '2018-08-23T11:00', 0),
(28, 45, 0, '2018-08-08', '4564', '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 10:33:08', '2018-08-19 10:33:08', '2018-08-23T08:30', '2018-08-24T09:00', 0),
(29, 45, 0, '2018-08-19', 'เ้ดก้', '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 10:34:29', '2018-08-19 10:34:29', '2018-08-23T08:30', '2018-08-25T11:00', 1),
(30, 45, 0, '2018-08-25', NULL, '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 10:36:39', '2018-08-19 15:13:33', '2018-08-19T08:30', '2018-08-19T17:30', 1),
(31, 45, 0, '2018-08-16', NULL, '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 10:37:02', '2018-08-19 10:37:02', '2018-08-27T08:30', '2018-08-28T17:30', 1),
(32, 45, 0, '2018-08-18', NULL, '2018-08-19', '2018-08-19', '2,3', 3, '2018-08-19 10:57:01', '2018-08-19 10:57:25', '2018-08-18T08:30', '2018-08-19T17:30', 0),
(33, 45, 0, '2018-08-17', NULL, '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 10:58:06', '2018-08-19 10:58:13', '2018-08-19T08:30', '2018-08-19T12:00', 0),
(34, 45, 0, '2018-08-16', NULL, '2018-08-19', '2018-08-19', '', 2, '2018-08-19 10:58:41', '2018-08-19 15:13:45', '2018-08-18T13:00', '2018-08-18T17:30', 1),
(35, 45, 0, '2018-08-19', NULL, '2018-08-19', '2018-08-19', '', 2, '2018-08-19 10:59:08', '2018-08-19 10:59:08', '2018-08-21T08:30', '2018-08-21T09:00', 0),
(36, 45, 0, '2018-08-17', NULL, '2018-08-19', '2018-08-19', '2', 2, '2018-08-19 10:59:30', '2018-08-19 10:59:30', '2018-08-19T13:00', '2018-08-19T16:00', 0),
(37, 45, 0, '2018-08-15', NULL, '2018-08-19', '2018-08-19', '2', 1, '2018-08-19 10:59:58', '2018-08-19 15:30:11', '2018-08-24T08:30', '2018-08-25T11:00', 1),
(38, 45, 0, '2018-08-28', NULL, '2018-08-19', '2018-08-19', '2', 2, '2018-08-19 11:00:29', '2018-08-19 11:00:29', '2018-08-29T15:00', '2018-08-29T17:30', 0),
(39, 45, 0, '2018-08-28', NULL, '2018-08-19', '2018-08-19', '2', 2, '2018-08-19 11:01:07', '2018-08-19 11:01:07', '2018-08-30T08:30', '2018-08-31T11:30', 0),
(40, 45, 0, '2018-08-28', NULL, '2018-08-19', '2018-08-19', '2', 1, '2018-08-19 11:01:37', '2018-08-19 11:01:37', '2018-09-01T08:30', '2018-09-02T10:30', 1),
(41, 45, 2, '2018-08-16', NULL, '2018-08-19', '2018-08-19', '2,3,4', 3, '2018-08-19 11:28:35', '2018-08-19 11:28:35', '2018-08-16T08:30', '2018-08-19T17:30', 1),
(42, 45, 2, '2018-08-16', NULL, '2018-08-19', '2018-08-19', '2,3,4', 3, '2018-08-19 11:28:35', '2018-08-19 11:28:35', '2018-08-16T08:30', '2018-08-19T17:30', 1),
(43, 45, 3, '2018-08-08', 'gdsdg', '2018-08-19', '2018-08-19', '1,2', 2, '2018-08-19 11:29:13', '2018-08-19 15:13:54', '2018-08-13T08:30', '2018-08-18T17:30', 2),
(44, 45, 3, '2018-08-16', NULL, '2018-08-19', '2018-08-19', '2', 2, '2018-08-19 11:29:35', '2018-08-19 11:29:35', '2018-08-21T08:30', '2018-08-24T12:00', 0),
(45, 45, 4, '2018-08-18', NULL, '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 11:37:22', '2018-08-19 15:29:56', '2018-08-20T08:30', '2018-08-25T17:30', 2),
(46, 45, 4, '2018-08-30', NULL, '2018-08-19', '2018-08-19', '3', 3, '2018-08-19 11:37:49', '2018-08-19 11:38:20', '2018-08-17T11:30', '2018-08-17T12:00', 0),
(47, 45, 2, '2018-08-18', 'กดหเก้', '2018-08-19', '2018-08-19', '', 3, '2018-08-19 14:41:51', '2018-08-19 14:48:58', '2018-08-20T08:30', '2018-08-23T10:30', 1),
(48, 45, 0, '2018-08-09', 'yjflkgjkl', '2018-08-19', '2018-08-19', '2', 2, '2018-08-19 14:45:52', '2018-08-19 15:38:18', '2018-08-21T13:00', '2018-08-23T17:30', 2),
(49, 45, 0, '2018-08-16', 'yuill', '2018-08-19', '2018-08-19', '4', 4, '2018-08-19 15:51:42', '2018-08-19 15:51:42', '2018-10-08T08:30', '2018-10-12T17:30', 2),
(50, 45, 0, '2018-08-15', NULL, '2018-08-19', '2018-08-19', '3', 2, '2018-08-19 15:52:51', '2018-08-19 15:53:15', '2018-08-01T08:30', '2018-08-02T12:00', 2),
(51, 45, 0, '2018-08-24', NULL, '2018-08-20', '2018-08-20', '1,2,3', 2, '2018-08-19 17:43:08', '2018-08-19 17:43:08', '2018-12-12T08:30', '2018-12-12T17:30', 0),
(52, 45, 0, '2018-08-25', NULL, '2018-08-20', '2018-08-20', '2', 2, '2018-08-19 17:52:26', '2018-08-19 17:58:04', '2018-09-29T08:30', '2018-09-30T17:30', 0),
(53, 45, 2, '2018-08-21', 'ะพด้เ่เ้่', '2018-08-20', '2018-08-20', '2', 3, '2018-08-19 18:10:21', '2018-08-19 18:16:10', '2018-09-30T08:30', '2018-09-30T17:30', 0);

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
(21, 'นายสุชิน  บุญคำ', 'ชิน', '1987-03-12', '2018-07-12 09:45:25', '2018-08-19 08:53:43', 'TPM002', '2010-06-01', '2018-07-12', '99', 7, 0x313533343636383832332e706e67, 5, 'Software Test Engineer', 699897555),
(31, 'นายบรรลังฤทธิ์  วงค์เหมาะ', 'ตุ่ย', '2018-07-01', '2018-07-19 08:19:45', '2018-08-19 08:54:05', 'TPM004', '2018-05-23', '2018-07-19', '99', 7, 0x313533343636383834352e6a7067, 4, NULL, 0),
(37, 'นางfffffffff', 'ffffff', '1990-06-29', '2018-07-30 06:58:24', '2018-08-19 08:53:37', 'TPM002', '2018-06-05', '2018-07-30', '99', 13, 0x313533343636383831372e6a7067, 6, 'วิทยาการคอมพิวเตอร์', 896901952),
(38, 'นางสาวพิมพ์พิไล  งามแสง', 'แปว', '1820-07-10', '2018-07-30 07:07:08', '2018-08-19 08:53:58', 'TPM002', '2018-02-26', '2018-07-30', '99', 13, 0x313533343636383833382e69636f, 1, 'วิทยาการคอมพิวเตอร์', 21571250),
(40, 'นางสาวเกศสุดา  อาสสุวรรณ์', 'คุณเกด', '1986-06-27', '2018-07-30 07:31:50', '2018-08-19 08:54:22', 'TPM015', '2018-04-17', '2018-07-30', '99', 3, 0x313533343636383836322e706e67, 5, 'Software Test Engineer', 847743106),
(41, 'นางสาวแพรวรุ่ง  เลื้อยไธสง', 'คุณโบว์', '1993-11-18', '2018-07-30 07:35:46', '2018-07-30 08:38:26', 'TPM007', '2016-01-30', '2018-07-30', '99', 11, 0x313533323933363134362e4a5047, 5, NULL, 802412506),
(42, 'นายสมชัย  ทองหล่อ', 'ชาย', '1880-07-19', '2018-07-31 12:28:56', '2018-08-19 08:53:20', 'TP003', '2013-01-12', '2018-07-31', '99', 16, 0x313533343636383830302e6a7067, 1, NULL, 896326599),
(43, 'nn', 'fghd', '1988-08-06', '2018-08-19 07:56:35', '2018-08-19 07:56:35', 'dfg', '2018-06-01', '2018-08-19', '99', 1, 0x313533343636353339352e6a7067, NULL, NULL, 22222),
(44, 'test', 'test', '1992-10-16', '2018-08-19 08:56:31', '2018-08-19 08:56:31', 'test', '2016-02-01', '2018-08-19', '99', 4, 0x313533343636383939312e706e67, 6, 'it', 896326599),
(45, 'สุทธิรักษ์ นาระถี', 'ตุ่ย', '1992-10-16', '2018-08-19 10:24:50', '2018-08-19 16:18:50', 'TP007', '2018-06-02', '2018-08-19', '99', 4, 0x313533343637343239302e6a7067, 6, 'เทคโนโลยีสารสนเทศ', 896326599);

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
(25, '2018_07_30_114434_add_phone_to_libs_table', 19),
(26, '2018_07_31_171201_add_nstart_day_to_leaves_table', 20),
(27, '2018_07_31_171244_add_nend_day_to_leaves_table', 20),
(28, '2018_08_19_160602_add_status_leave_to_leaves_table', 21);

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
(10, NULL, '2018-08-05 15:30:07', 'พนักงานหลังการขาย', 1),
(11, NULL, '2018-07-30 07:39:19', 'พนักงานคลังสินค้า', 29),
(13, NULL, NULL, 'หัวหน้าฝ่ายขาย', 3),
(14, NULL, NULL, 'หัวหน้าฝ่ายการเงิน', 2),
(15, NULL, NULL, 'หัวหน้าฝ่ายบุคคล', 1),
(16, NULL, NULL, 'ช่างซ่อมบริการหลังการขาย', 4),
(17, NULL, NULL, 'หัวหน้าช่างซ่อมบริการหลังการขาย', 4),
(18, NULL, '2018-08-05 15:39:48', 'ทนายความ', 2),
(19, NULL, NULL, 'ทวงหนี้', 2),
(20, '2018-07-17 08:27:47', '2018-07-30 07:53:55', 'เจ้าหน้าที่บุคคลgggg', 1),
(21, '2018-07-17 08:29:48', '2018-07-30 07:53:59', 'เจ้าหน้าที่ทวงหนี้', 1),
(23, '2018-07-20 10:04:52', '2018-07-30 07:54:06', 'หาคน', 2),
(24, '2018-07-20 10:08:16', '2018-07-20 10:08:16', 'หาคน', 2),
(25, '2018-07-20 10:10:20', '2018-07-20 10:10:20', 'หาเงินสด', 24),
(29, '2018-07-21 09:55:55', '2018-07-21 09:55:55', 'ติดตามทวงหนี้', 25),
(30, '2018-07-21 10:10:32', '2018-07-21 10:11:09', 'ติดตามทวงหนี้้้เเเเเเ', 2),
(31, '2018-07-23 02:28:42', '2018-07-23 02:28:42', 'เจ้าหน้าที่ โปรแกรมเมอร์', 2),
(32, '2018-07-30 04:19:25', '2018-07-30 04:19:25', 'เจ้าหน้าที่ โปรแกรมเมอร์', 27),
(33, '2018-08-19 07:55:42', '2018-08-19 07:55:51', '123465', 44);

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
(1, 'sutthirak', 'sutthirak.k28@gmail.com', '$2y$10$aq87USmNDMWuP0LZR4unXuYegO4XzYxRB5KvffEZflhy7bw37oitW', 'mzWfcpLNdrHAJooq6eOOgZwxhocOLxrg8sMwOjeHlkAkxcNMV4S55wPKBfVr', '2018-07-08 21:55:56', '2018-07-08 21:55:56');

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
  MODIFY `id_dep` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `leaves`
--
ALTER TABLE `leaves`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `libs`
--
ALTER TABLE `libs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id_pos` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
