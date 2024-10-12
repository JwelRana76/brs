-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2024 at 07:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brs`
--

-- --------------------------------------------------------

--
-- Table structure for table `blood_groups`
--

CREATE TABLE `blood_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blood_groups`
--

INSERT INTO `blood_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'A+', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(2, 'A-', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(3, 'B+', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(4, 'B-', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(5, 'O+', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(6, 'O-', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(7, 'AB+', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(8, 'AB-', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `brs`
--

CREATE TABLE `brs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `resa_no` varchar(255) NOT NULL,
  `jlno_id` bigint(20) UNSIGNED NOT NULL,
  `khotian_no` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `brs_details`
--

CREATE TABLE `brs_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brs_id` bigint(20) UNSIGNED NOT NULL,
  `name` longtext DEFAULT NULL,
  `part` varchar(255) DEFAULT NULL,
  `revenue` varchar(255) DEFAULT NULL,
  `stain` varchar(255) DEFAULT NULL,
  `plottype1` varchar(255) DEFAULT NULL,
  `plottype2` varchar(255) DEFAULT NULL,
  `amount1` varchar(255) DEFAULT NULL,
  `amount2` varchar(255) DEFAULT NULL,
  `khotian_amount` varchar(255) DEFAULT NULL,
  `plot_amount1` varchar(255) DEFAULT NULL,
  `plot_amount2` varchar(255) DEFAULT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cs`
--

CREATE TABLE `cs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `resa_no` varchar(255) NOT NULL,
  `jlno_id` bigint(20) UNSIGNED NOT NULL,
  `khotian_no` varchar(255) NOT NULL,
  `touja_no` varchar(255) NOT NULL,
  `porogona` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cs_details`
--

CREATE TABLE `cs_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cs_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `three` varchar(255) DEFAULT NULL,
  `four` varchar(255) DEFAULT NULL,
  `five` varchar(255) DEFAULT NULL,
  `six` varchar(255) DEFAULT NULL,
  `seven` varchar(255) DEFAULT NULL,
  `eight` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cs_detail_fours`
--

CREATE TABLE `cs_detail_fours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cs_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `three` varchar(255) DEFAULT NULL,
  `four` varchar(255) DEFAULT NULL,
  `five` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cs_detail_threes`
--

CREATE TABLE `cs_detail_threes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cs_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `three` varchar(255) DEFAULT NULL,
  `four` varchar(255) DEFAULT NULL,
  `five` varchar(255) DEFAULT NULL,
  `six` varchar(255) DEFAULT NULL,
  `seven` varchar(255) DEFAULT NULL,
  `eight` varchar(255) DEFAULT NULL,
  `nine` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cs_detail_twos`
--

CREATE TABLE `cs_detail_twos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cs_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dags`
--

CREATE TABLE `dags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mouja_id` bigint(20) UNSIGNED NOT NULL,
  `cs_dag` varchar(255) NOT NULL,
  `cs_land_type` varchar(255) DEFAULT NULL,
  `cs_khotian` varchar(255) DEFAULT NULL,
  `cs_land_qty` varchar(255) DEFAULT NULL,
  `cs_mouja_sheet_no` varchar(255) DEFAULT NULL,
  `sa_dag` varchar(255) NOT NULL,
  `sa_land_type` varchar(255) DEFAULT NULL,
  `sa_khotian` varchar(255) DEFAULT NULL,
  `sa_land_qty` varchar(255) DEFAULT NULL,
  `sa_mouja_sheet_no` varchar(255) DEFAULT NULL,
  `brs_dag` varchar(255) NOT NULL,
  `brs_land_type` varchar(255) DEFAULT NULL,
  `brs_khotian` varchar(255) DEFAULT NULL,
  `brs_land_qty` varchar(255) DEFAULT NULL,
  `brs_mouja_sheet_no` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `division_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `division_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Jashore', '551', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(2, 2, 'Rangpur', '652', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(3, 3, 'Pabna', '541', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 'Khulna', '305', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(2, 'Rangpur', '965', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(3, 'Rajshahi', '287', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

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
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Male', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(2, 'Female', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(3, 'Other', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `jlnos`
--

CREATE TABLE `jlnos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mouja_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `khajnas`
--

CREATE TABLE `khajnas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sl_no` varchar(255) NOT NULL,
  `office_name` varchar(255) NOT NULL,
  `mouja_no` varchar(255) NOT NULL,
  `holding_no` varchar(255) NOT NULL,
  `khotian_no` varchar(255) NOT NULL,
  `beforethreeYearDue` varchar(255) NOT NULL DEFAULT '0',
  `threeYearDue` varchar(255) NOT NULL DEFAULT '0',
  `due_interest` varchar(255) NOT NULL DEFAULT '0',
  `haldabi` varchar(255) NOT NULL DEFAULT '0',
  `totaldabi` varchar(255) NOT NULL DEFAULT '0',
  `totalcollect` varchar(255) NOT NULL DEFAULT '0',
  `totaldue` varchar(255) NOT NULL DEFAULT '0',
  `comment` text NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khajnas`
--

INSERT INTO `khajnas` (`id`, `sl_no`, `office_name`, `mouja_no`, `holding_no`, `khotian_no`, `beforethreeYearDue`, `threeYearDue`, `due_interest`, `haldabi`, `totaldabi`, `totalcollect`, `totaldue`, `comment`, `district_id`, `upazila_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Esse at proident e', 'Anthony Schwartz', 'Aliqua Reprehenderi', 'Atque est soluta ame', 'Exercitationem place', '2003', '1978', 'Quae odit odit sunt', 'Accusamus est commo', 'Fugiat velit ipsum', 'Nesciunt optio lor', 'Sequi facere nemo es', 'Molestiae possimus', 1, 1, NULL, '2014-10-14 18:00:00', '2024-10-10 12:02:28'),
(2, 'Assumenda exercitati', 'Wayne Walls', 'Ad consequatur perf', 'Ratione voluptatibus', 'Iste do ut quo dolor', '2018', '2009', '100', '120', '130', '140', '150', 'Autem recusandae Vi', 1, 1, NULL, '1996-11-14 18:00:00', '2024-10-10 12:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `land_details`
--

CREATE TABLE `land_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khajna_id` bigint(20) UNSIGNED NOT NULL,
  `dag_no` varchar(255) NOT NULL,
  `land_type` varchar(255) NOT NULL,
  `land_qty` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `land_details`
--

INSERT INTO `land_details` (`id`, `khajna_id`, `dag_no`, `land_type`, `land_qty`, `created_at`, `updated_at`) VALUES
(1, 1, 'Nulla aperiam verita', 'Architecto odit labo', '571', '2024-10-10 12:02:28', '2024-10-10 12:02:28'),
(2, 2, 'Commodo repellendus', 'Totam a hic dolore e', '586', '2024-10-10 12:14:30', '2024-10-10 12:14:30');

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
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_10_18_042636_create_permission_groups_table', 1),
(7, '2023_10_18_042658_create_permissions_table', 1),
(8, '2023_10_18_043354_create_roles_table', 1),
(9, '2023_10_18_043414_create_user_has_roles_table', 1),
(10, '2023_10_20_030743_create_role_has_permissions_table', 1),
(11, '2023_10_22_061908_create_site_settings_table', 1),
(12, '2024_02_13_181848_create_divisions_table', 1),
(13, '2024_02_14_142904_create_blood_groups_table', 1),
(14, '2024_02_14_142916_create_genders_table', 1),
(15, '2024_02_14_145040_create_districts_table', 1),
(16, '2024_02_14_145120_create_upazilas_table', 1),
(17, '2024_02_14_145407_create_moujas_table', 1),
(18, '2024_02_14_145546_create_jlnos_table', 1),
(19, '2024_02_14_145701_create_plot_types_table', 1),
(20, '2024_02_17_112042_create_brs_table', 1),
(21, '2024_02_17_112056_create_brs_details_table', 1),
(22, '2024_02_20_110841_create_sas_table', 1),
(23, '2024_02_20_112549_create_sa_details_table', 1),
(24, '2024_03_14_080258_create_sa_details_twos_table', 1),
(25, '2024_03_14_080310_create_sa_details_threes_table', 1),
(26, '2024_03_14_080343_create_sa_details_fours_table', 1),
(27, '2024_04_01_061105_create_cs_table', 1),
(28, '2024_04_01_061146_create_cs_details_table', 1),
(29, '2024_04_01_061308_create_cs_detail_twos_table', 1),
(30, '2024_04_01_061317_create_cs_detail_threes_table', 1),
(31, '2024_04_01_061324_create_cs_detail_fours_table', 1),
(32, '2024_05_09_170642_create_khajnas_table', 1),
(33, '2024_05_09_170704_create_owner_details_table', 1),
(34, '2024_05_09_170712_create_land_details_table', 1),
(35, '2024_05_11_163109_create_dags_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `moujas`
--

CREATE TABLE `moujas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `upazila_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `owner_details`
--

CREATE TABLE `owner_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `khajna_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `land_part` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `owner_details`
--

INSERT INTO `owner_details` (`id`, `khajna_id`, `name`, `land_part`, `created_at`, `updated_at`) VALUES
(1, 1, 'Abraham Wallace', 'Sint et excepteur q', '2024-10-10 12:02:28', '2024-10-10 12:02:28'),
(2, 2, 'Wendy Morse', 'Sunt dolore commodi', '2024-10-10 12:14:30', '2024-10-10 12:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `permission_group_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `permission_group_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'patient-module', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(2, 1, 'patient-index', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(3, 1, 'patient-store', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(4, 1, 'patient-update', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(5, 1, 'patient-delete', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(6, 1, 'patient-advance', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(7, 2, 'setting-module', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(8, 2, 'setting-index', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(9, 2, 'setting-store', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(10, 2, 'setting-update', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(11, 2, 'setting-delete', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(12, 2, 'setting-advance', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(13, 3, 'report-module', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(14, 3, 'report-index', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(15, 3, 'report-store', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(16, 3, 'report-update', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(17, 3, 'report-delete', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(18, 3, 'report-advance', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `permission_groups`
--

CREATE TABLE `permission_groups` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_groups`
--

INSERT INTO `permission_groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'patient', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(2, 'setting', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(3, 'report', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

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
-- Table structure for table `plot_types`
--

CREATE TABLE `plot_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '0=agriculture/1=Un-agriculture',
  `name` varchar(255) NOT NULL,
  `code` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sas`
--

CREATE TABLE `sas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `unique_id` varchar(255) NOT NULL,
  `resa_no` varchar(255) NOT NULL,
  `jlno_id` bigint(20) UNSIGNED NOT NULL,
  `khotian_no` varchar(255) NOT NULL,
  `touja_no` varchar(255) NOT NULL,
  `porogona` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sa_details`
--

CREATE TABLE `sa_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sa_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `three` varchar(255) DEFAULT NULL,
  `four` varchar(255) DEFAULT NULL,
  `five` varchar(255) DEFAULT NULL,
  `six` varchar(255) DEFAULT NULL,
  `seven` varchar(255) DEFAULT NULL,
  `eight` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sa_details_fours`
--

CREATE TABLE `sa_details_fours` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sa_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `three` varchar(255) DEFAULT NULL,
  `four` varchar(255) DEFAULT NULL,
  `five` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sa_details_threes`
--

CREATE TABLE `sa_details_threes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sa_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `three` varchar(255) DEFAULT NULL,
  `four` varchar(255) DEFAULT NULL,
  `five` varchar(255) DEFAULT NULL,
  `six` varchar(255) DEFAULT NULL,
  `seven` varchar(255) DEFAULT NULL,
  `eight` varchar(255) DEFAULT NULL,
  `nine` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sa_details_twos`
--

CREATE TABLE `sa_details_twos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sa_id` bigint(20) UNSIGNED NOT NULL,
  `one` varchar(255) DEFAULT NULL,
  `two` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `name_short` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `name_short`, `address`, `contact`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'BRS', 'BRS', 'Rangpur Sadar, Rangpur', '01571-166570', NULL, '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `upazilas`
--

CREATE TABLE `upazilas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `district_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `upazilas`
--

INSERT INTO `upazilas` (`id`, `district_id`, `name`, `code`, `created_at`, `updated_at`) VALUES
(1, 1, 'Bagherpara', '302', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(2, 2, 'Taraganj', '127', '2024-10-10 12:02:03', '2024-10-10 12:02:03'),
(3, 3, 'Gangachara', '574', '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `email_verified_at`, `password`, `is_active`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$fHFUnrQ.w5pI5Bk/X2vxEO8qlkyYrbHp2cB.jtbz6cJkQCyaNTSqC', 1, NULL, '2024-10-10 12:02:03', '2024-10-10 12:02:03');

-- --------------------------------------------------------

--
-- Table structure for table `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_has_roles`
--

INSERT INTO `user_has_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2024-10-10 12:02:03', '2024-10-10 12:02:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blood_groups`
--
ALTER TABLE `blood_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brs`
--
ALTER TABLE `brs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brs_unique_id_unique` (`unique_id`),
  ADD KEY `brs_jlno_id_foreign` (`jlno_id`);

--
-- Indexes for table `brs_details`
--
ALTER TABLE `brs_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `brs_details_brs_id_foreign` (`brs_id`);

--
-- Indexes for table `cs`
--
ALTER TABLE `cs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cs_unique_id_unique` (`unique_id`),
  ADD KEY `cs_jlno_id_foreign` (`jlno_id`);

--
-- Indexes for table `cs_details`
--
ALTER TABLE `cs_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cs_details_cs_id_foreign` (`cs_id`);

--
-- Indexes for table `cs_detail_fours`
--
ALTER TABLE `cs_detail_fours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cs_detail_fours_cs_id_foreign` (`cs_id`);

--
-- Indexes for table `cs_detail_threes`
--
ALTER TABLE `cs_detail_threes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cs_detail_threes_cs_id_foreign` (`cs_id`);

--
-- Indexes for table `cs_detail_twos`
--
ALTER TABLE `cs_detail_twos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cs_detail_twos_cs_id_foreign` (`cs_id`);

--
-- Indexes for table `dags`
--
ALTER TABLE `dags`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dags_mouja_id_foreign` (`mouja_id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `districts_division_id_foreign` (`division_id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jlnos`
--
ALTER TABLE `jlnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jlnos_mouja_id_foreign` (`mouja_id`);

--
-- Indexes for table `khajnas`
--
ALTER TABLE `khajnas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `khajnas_district_id_foreign` (`district_id`),
  ADD KEY `khajnas_upazila_id_foreign` (`upazila_id`);

--
-- Indexes for table `land_details`
--
ALTER TABLE `land_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `land_details_khajna_id_foreign` (`khajna_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `moujas`
--
ALTER TABLE `moujas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `moujas_upazila_id_foreign` (`upazila_id`);

--
-- Indexes for table `owner_details`
--
ALTER TABLE `owner_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_details_khajna_id_foreign` (`khajna_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_permission_group_id_foreign` (`permission_group_id`);

--
-- Indexes for table `permission_groups`
--
ALTER TABLE `permission_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plot_types`
--
ALTER TABLE `plot_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`),
  ADD KEY `role_has_permissions_permission_id_foreign` (`permission_id`);

--
-- Indexes for table `sas`
--
ALTER TABLE `sas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sas_unique_id_unique` (`unique_id`),
  ADD KEY `sas_jlno_id_foreign` (`jlno_id`);

--
-- Indexes for table `sa_details`
--
ALTER TABLE `sa_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sa_details_sa_id_foreign` (`sa_id`);

--
-- Indexes for table `sa_details_fours`
--
ALTER TABLE `sa_details_fours`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sa_details_fours_sa_id_foreign` (`sa_id`);

--
-- Indexes for table `sa_details_threes`
--
ALTER TABLE `sa_details_threes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sa_details_threes_sa_id_foreign` (`sa_id`);

--
-- Indexes for table `sa_details_twos`
--
ALTER TABLE `sa_details_twos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sa_details_twos_sa_id_foreign` (`sa_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `upazilas_district_id_foreign` (`district_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_has_roles_user_id_foreign` (`user_id`),
  ADD KEY `user_has_roles_role_id_foreign` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blood_groups`
--
ALTER TABLE `blood_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `brs`
--
ALTER TABLE `brs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `brs_details`
--
ALTER TABLE `brs_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs`
--
ALTER TABLE `cs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_details`
--
ALTER TABLE `cs_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_detail_fours`
--
ALTER TABLE `cs_detail_fours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_detail_threes`
--
ALTER TABLE `cs_detail_threes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cs_detail_twos`
--
ALTER TABLE `cs_detail_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dags`
--
ALTER TABLE `dags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jlnos`
--
ALTER TABLE `jlnos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `khajnas`
--
ALTER TABLE `khajnas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `land_details`
--
ALTER TABLE `land_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `moujas`
--
ALTER TABLE `moujas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `owner_details`
--
ALTER TABLE `owner_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `permission_groups`
--
ALTER TABLE `permission_groups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plot_types`
--
ALTER TABLE `plot_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sas`
--
ALTER TABLE `sas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sa_details`
--
ALTER TABLE `sa_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sa_details_fours`
--
ALTER TABLE `sa_details_fours`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sa_details_threes`
--
ALTER TABLE `sa_details_threes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sa_details_twos`
--
ALTER TABLE `sa_details_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `upazilas`
--
ALTER TABLE `upazilas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brs`
--
ALTER TABLE `brs`
  ADD CONSTRAINT `brs_jlno_id_foreign` FOREIGN KEY (`jlno_id`) REFERENCES `jlnos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `brs_details`
--
ALTER TABLE `brs_details`
  ADD CONSTRAINT `brs_details_brs_id_foreign` FOREIGN KEY (`brs_id`) REFERENCES `brs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs`
--
ALTER TABLE `cs`
  ADD CONSTRAINT `cs_jlno_id_foreign` FOREIGN KEY (`jlno_id`) REFERENCES `jlnos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_details`
--
ALTER TABLE `cs_details`
  ADD CONSTRAINT `cs_details_cs_id_foreign` FOREIGN KEY (`cs_id`) REFERENCES `cs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_detail_fours`
--
ALTER TABLE `cs_detail_fours`
  ADD CONSTRAINT `cs_detail_fours_cs_id_foreign` FOREIGN KEY (`cs_id`) REFERENCES `cs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_detail_threes`
--
ALTER TABLE `cs_detail_threes`
  ADD CONSTRAINT `cs_detail_threes_cs_id_foreign` FOREIGN KEY (`cs_id`) REFERENCES `cs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cs_detail_twos`
--
ALTER TABLE `cs_detail_twos`
  ADD CONSTRAINT `cs_detail_twos_cs_id_foreign` FOREIGN KEY (`cs_id`) REFERENCES `cs` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dags`
--
ALTER TABLE `dags`
  ADD CONSTRAINT `dags_mouja_id_foreign` FOREIGN KEY (`mouja_id`) REFERENCES `moujas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `districts`
--
ALTER TABLE `districts`
  ADD CONSTRAINT `districts_division_id_foreign` FOREIGN KEY (`division_id`) REFERENCES `divisions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jlnos`
--
ALTER TABLE `jlnos`
  ADD CONSTRAINT `jlnos_mouja_id_foreign` FOREIGN KEY (`mouja_id`) REFERENCES `moujas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `khajnas`
--
ALTER TABLE `khajnas`
  ADD CONSTRAINT `khajnas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `khajnas_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `land_details`
--
ALTER TABLE `land_details`
  ADD CONSTRAINT `land_details_khajna_id_foreign` FOREIGN KEY (`khajna_id`) REFERENCES `khajnas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `moujas`
--
ALTER TABLE `moujas`
  ADD CONSTRAINT `moujas_upazila_id_foreign` FOREIGN KEY (`upazila_id`) REFERENCES `upazilas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `owner_details`
--
ALTER TABLE `owner_details`
  ADD CONSTRAINT `owner_details_khajna_id_foreign` FOREIGN KEY (`khajna_id`) REFERENCES `khajnas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permissions`
--
ALTER TABLE `permissions`
  ADD CONSTRAINT `permissions_permission_group_id_foreign` FOREIGN KEY (`permission_group_id`) REFERENCES `permission_groups` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sas`
--
ALTER TABLE `sas`
  ADD CONSTRAINT `sas_jlno_id_foreign` FOREIGN KEY (`jlno_id`) REFERENCES `jlnos` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sa_details`
--
ALTER TABLE `sa_details`
  ADD CONSTRAINT `sa_details_sa_id_foreign` FOREIGN KEY (`sa_id`) REFERENCES `sas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sa_details_fours`
--
ALTER TABLE `sa_details_fours`
  ADD CONSTRAINT `sa_details_fours_sa_id_foreign` FOREIGN KEY (`sa_id`) REFERENCES `sas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sa_details_threes`
--
ALTER TABLE `sa_details_threes`
  ADD CONSTRAINT `sa_details_threes_sa_id_foreign` FOREIGN KEY (`sa_id`) REFERENCES `sas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sa_details_twos`
--
ALTER TABLE `sa_details_twos`
  ADD CONSTRAINT `sa_details_twos_sa_id_foreign` FOREIGN KEY (`sa_id`) REFERENCES `sas` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `upazilas`
--
ALTER TABLE `upazilas`
  ADD CONSTRAINT `upazilas_district_id_foreign` FOREIGN KEY (`district_id`) REFERENCES `districts` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_has_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
