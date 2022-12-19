-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 13, 2022 at 08:49 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kbfirm`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_head_reports`
--

CREATE TABLE `account_head_reports` (
  `account_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `account_head_views`
--

CREATE TABLE `account_head_views` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_head` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_one` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `child_two` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account_head_views`
--

INSERT INTO `account_head_views` (`id`, `master_head`, `sub_head`, `child_one`, `child_two`, `created_at`, `updated_at`) VALUES
(1, '1', 'Current Assets', 'Cash', 'Petty Cash', '2022-11-22 20:53:26', NULL),
(2, '1', 'Current Assets', 'Cash', 'Main Cash', '2022-11-22 20:53:26', NULL),
(3, '5', 'Revenue Expenses', 'Salary', 'Staff Salary', '2022-11-22 20:53:26', NULL),
(4, '5', 'Revenue Expenses', 'Salary', 'Night Guard Salary', '2022-11-22 20:53:26', NULL),
(5, '5', 'Revenue Expenses', 'Rent Expense', 'Office Rent', '2022-11-22 20:53:26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `balance_sheets`
--

CREATE TABLE `balance_sheets` (
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `child_ones`
--

CREATE TABLE `child_ones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_head_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_ones`
--

INSERT INTO `child_ones` (`id`, `sub_head_id`, `head_name`, `head_code`, `opening_balance`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Cash', '11001', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(2, '1', 'Bank', '11002', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(3, '2', 'land', '12001', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(4, '10', 'Subscription', '41001', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(5, '10', 'Income from Garbage', '41002', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(6, '10', 'Income from Project', '41003', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(7, '11', 'Bank Interest', '42001', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(8, '11', 'Profit from Capital Market Investment', '42002', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(9, '14', 'Land Purchase', '51001', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(10, '14', 'Project Investment', '51002', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(11, '15', 'Salary', '52001', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(12, '15', 'Electricity Bill', '52002', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(13, '15', 'Miscellaneous expense', '52003', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(14, '15', 'Rent Expense', '52004', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(15, '15', 'Paint', '52005', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(16, '15', 'Stationary Expense', '52006', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(17, '15', 'Repair & Maintenance', '52007', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(18, '15', 'Clean Expense', '52008', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(19, '16', 'Income Tax', '53001', '0', '2022-12-13 01:41:01', '2022-12-13 01:41:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `child_twos`
--

CREATE TABLE `child_twos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `child_one_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `child_twos`
--

INSERT INTO `child_twos` (`id`, `child_one_id`, `head_name`, `head_code`, `opening_balance`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Petty Cash', '11001001', '0', '2022-12-13 00:50:16', '2022-12-13 00:50:16', NULL),
(2, '1', 'Main Cash', '11001002', '0', '2022-12-13 00:50:16', '2022-12-13 00:50:16', NULL),
(3, '11', 'Staff Salary', '52001001', '0', '2022-12-13 00:50:16', '2022-12-13 00:50:16', NULL),
(4, '11', 'Night Guard Salary', '52001002', '0', '2022-12-13 00:50:16', '2022-12-13 00:50:16', NULL),
(5, '14', 'Office Rent', '52004001', '0', '2022-12-13 00:50:16', '2022-12-13 00:50:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `client_infos`
--

CREATE TABLE `client_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_infos`
--

INSERT INTO `client_infos` (`id`, `name`, `image`, `father_name`, `contact_no`, `email`, `national_id`, `address`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'Shahidul islam', '7701669530162.jpg', 'Abdul Mazid', '01857933016', 'shahiduli555@gmail.com', '5850216', 'South Kanchana, Saktania, Chittagram', 1, NULL, '2022-11-27 00:22:42', '2022-11-27 22:38:12'),
(3, 'Ashab Uddin', '2901669610033.jpg', 'Abdul Mazid', '01887621949', 'ashab42@gmail.com', '5850211', 'Lohagara', 1, NULL, '2022-11-27 00:29:19', '2022-11-27 22:38:22'),
(4, 'Ariful islam', '9201669610057.jpg', 'Abdul Mazid', '01887621949', 'shahiduli555@gmail.com', '333', 'Satkania, Chittagram', 1, NULL, '2022-11-27 00:32:46', '2022-11-27 22:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `client_payments`
--

CREATE TABLE `client_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_info_id` int(11) NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `client_payments`
--

INSERT INTO `client_payments` (`id`, `client_id`, `project_info_id`, `date`, `method`, `amount`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2022-12-03', '3-child_twos', '5000.00', 1, NULL, '2022-12-02 22:57:12', '2022-12-02 22:57:12'),
(2, 1, 1, '2022-12-30', '4-child_twos', '30000.00', 1, NULL, '2022-12-03 01:00:04', '2022-12-03 01:00:04'),
(3, 1, 1, '2022-12-03', '4-child_twos', '50000.00', 1, NULL, '2022-12-03 05:12:50', '2022-12-03 05:12:50'),
(4, 1, 1, '2022-12-06', '3-child_twos', '50000.00', 1, NULL, '2022-12-05 23:58:30', '2022-12-05 23:58:30');

-- --------------------------------------------------------

--
-- Table structure for table `credit_vouchers`
--

CREATE TABLE `credit_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit_sum` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit_sum` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cre_voucher_bkdns`
--

CREATE TABLE `cre_voucher_bkdns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `credit_voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `debit_vouchers`
--

CREATE TABLE `debit_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit_sum` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit_sum` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `devoucher_bkdns`
--

CREATE TABLE `devoucher_bkdns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `debit_voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `date`, `name`, `image`, `remark`, `created_at`, `updated_at`) VALUES
(1, '2022-12-06', 'Shahidul islam', '3231670306882.png', 'pay', '2022-12-06 00:08:02', '2022-12-06 00:22:20');

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
-- Table structure for table `fee_categories`
--

CREATE TABLE `fee_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fee_categories`
--

INSERT INTO `fee_categories` (`id`, `name`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Annual', 2, NULL, '2022-11-22 20:53:29', '2022-11-22 20:53:29', NULL),
(2, 'Monthly', 2, NULL, '2022-11-22 20:53:29', '2022-11-22 20:53:29', NULL),
(3, 'Subscription', 2, NULL, '2022-11-22 20:53:29', '2022-11-22 20:53:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_ledgers`
--

CREATE TABLE `general_ledgers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journal_title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `cr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `rec_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jv_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `master_account_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_head_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_one_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `child_two_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit_voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `devoucher_bkdn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `credit_voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `crvoucher_bkdn_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `journal_voucher_id` int(11) DEFAULT NULL,
  `journal_voucher_bkdn_id` int(11) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_ledgers`
--

INSERT INTO `general_ledgers` (`id`, `journal_title`, `dr`, `cr`, `rec_date`, `jv_id`, `master_account_id`, `sub_head_id`, `child_one_id`, `child_two_id`, `debit_voucher_id`, `devoucher_bkdn_id`, `credit_voucher_id`, `crvoucher_bkdn_id`, `journal_voucher_id`, `journal_voucher_bkdn_id`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '52001002-Night Guard Salary', '5000', '0', '2022-12-01', '10000001', NULL, NULL, NULL, '4', NULL, NULL, NULL, NULL, 1, 1, 1, NULL, '2022-12-13 00:57:17', '2022-12-13 00:57:17', NULL),
(2, '11001001-Petty Cash', '0', '5000', '2022-12-01', '10000001', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 1, 2, 1, NULL, '2022-12-13 00:57:17', '2022-12-13 00:57:17', NULL),
(3, '52001001-Staff Salary', '10000', '0', '2022-12-02', '10000002', NULL, NULL, NULL, '3', NULL, NULL, NULL, NULL, 2, 3, 1, NULL, '2022-12-13 00:59:08', '2022-12-13 00:59:08', NULL),
(4, '11002-Bank', '0', '10000', '2022-12-02', '10000002', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 2, 4, 1, NULL, '2022-12-13 00:59:08', '2022-12-13 00:59:08', NULL),
(5, '52002-Electricity Bill', '500', '0', '2022-12-05', '10000003', NULL, NULL, '12', NULL, NULL, NULL, NULL, NULL, 3, 5, 1, NULL, '2022-12-13 00:59:58', '2022-12-13 00:59:58', NULL),
(6, '11001001-Petty Cash', '0', '500', '2022-12-05', '10000003', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 3, 6, 1, NULL, '2022-12-13 00:59:58', '2022-12-13 00:59:58', NULL),
(7, '52003-Miscellaneous Expense', '500', '0', '2022-12-15', '10000004', NULL, NULL, '13', NULL, NULL, NULL, NULL, NULL, 4, 7, 1, NULL, '2022-12-13 01:01:20', '2022-12-13 01:01:20', NULL),
(8, '11001001-Petty Cash', '0', '500', '2022-12-15', '10000004', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 4, 8, 1, NULL, '2022-12-13 01:01:20', '2022-12-13 01:01:20', NULL),
(9, '52004001-Office Rent', '5000', '0', '2022-12-15', '10000005', NULL, NULL, NULL, '5', NULL, NULL, NULL, NULL, 5, 9, 1, NULL, '2022-12-13 01:02:05', '2022-12-13 01:02:05', NULL),
(10, '11001002-Main Cash', '0', '5000', '2022-12-15', '10000005', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, 5, 10, 1, NULL, '2022-12-13 01:02:05', '2022-12-13 01:02:05', NULL),
(11, '52005-Paint', '2000', '0', '2022-12-17', '10000006', NULL, NULL, '15', NULL, NULL, NULL, NULL, NULL, 6, 11, 1, NULL, '2022-12-13 01:03:16', '2022-12-13 01:03:16', NULL),
(12, '11001001-Petty Cash', '0', '2000', '2022-12-17', '10000006', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 6, 12, 1, NULL, '2022-12-13 01:03:16', '2022-12-13 01:03:16', NULL),
(13, '52006-Stationary Expense', '1000', '0', '2022-12-20', '10000007', NULL, NULL, '16', NULL, NULL, NULL, NULL, NULL, 7, 13, 1, NULL, '2022-12-13 01:04:11', '2022-12-13 01:04:11', NULL),
(14, '11001001-Petty Cash', '0', '1000', '2022-12-20', '10000007', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 7, 14, 1, NULL, '2022-12-13 01:04:11', '2022-12-13 01:04:11', NULL),
(15, '52007-Repair & Maintenance', '2000', '0', '2022-12-22', '10000008', NULL, NULL, '17', NULL, NULL, NULL, NULL, NULL, 8, 15, 1, NULL, '2022-12-13 01:05:32', '2022-12-13 01:05:32', NULL),
(16, '11001002-Main Cash', '0', '2000', '2022-12-22', '10000008', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, 8, 16, 1, NULL, '2022-12-13 01:05:32', '2022-12-13 01:05:32', NULL),
(17, '52008-Clean Expense', '500', '0', '2022-12-31', '10000009', NULL, NULL, '18', NULL, NULL, NULL, NULL, NULL, 9, 17, 1, NULL, '2022-12-13 01:06:37', '2022-12-13 01:06:37', NULL),
(18, '11001001-Petty Cash', '0', '500', '2022-12-31', '10000009', NULL, NULL, NULL, '1', NULL, NULL, NULL, NULL, 9, 18, 1, NULL, '2022-12-13 01:06:37', '2022-12-13 01:06:37', NULL),
(19, '11002-Bank', '8000', '0', '2022-12-31', '10000010', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 10, 19, 1, NULL, '2022-12-13 01:10:45', '2022-12-13 01:10:45', NULL),
(20, '41001-Subscription', '0', '8000', '2022-12-31', '10000010', NULL, NULL, '4', NULL, NULL, NULL, NULL, NULL, 10, 20, 1, NULL, '2022-12-13 01:10:45', '2022-12-13 01:10:45', NULL),
(21, '11001002-Main Cash', '5000', '0', '2022-12-29', '10000011', NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, 11, 21, 1, NULL, '2022-12-13 01:11:44', '2022-12-13 01:11:44', NULL),
(22, '41002-Income From Garbage', '0', '5000', '2022-12-29', '10000011', NULL, NULL, '5', NULL, NULL, NULL, NULL, NULL, 11, 22, 1, NULL, '2022-12-13 01:11:44', '2022-12-13 01:11:44', NULL),
(23, '11002-Bank', '50000', '0', '2022-12-31', '10000012', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 12, 23, 1, NULL, '2022-12-13 01:13:18', '2022-12-13 01:13:18', NULL),
(24, '41003-Income From Project', '0', '50000', '2022-12-31', '10000012', NULL, NULL, '6', NULL, NULL, NULL, NULL, NULL, 12, 24, 1, NULL, '2022-12-13 01:13:18', '2022-12-13 01:13:18', NULL),
(25, '11002-Bank', '8000', '0', '2022-12-31', '10000013', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 13, 25, 1, NULL, '2022-12-13 01:14:43', '2022-12-13 01:14:43', NULL),
(26, '42001-Bank Interest', '0', '8000', '2022-12-31', '10000013', NULL, NULL, '7', NULL, NULL, NULL, NULL, NULL, 13, 26, 1, NULL, '2022-12-13 01:14:43', '2022-12-13 01:14:43', NULL),
(27, '11002-Bank', '12000', '0', '2022-12-31', '10000014', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 14, 27, 1, NULL, '2022-12-13 01:15:39', '2022-12-13 01:15:39', NULL),
(28, '42002-Profit From Capital Market Investment', '0', '12000', '2022-12-31', '10000014', NULL, NULL, '8', NULL, NULL, NULL, NULL, NULL, 14, 28, 1, NULL, '2022-12-13 01:15:39', '2022-12-13 01:15:39', NULL),
(29, '53001-Income Tax', '2500', '0', '2022-12-31', '10000015', NULL, NULL, '19', NULL, NULL, NULL, NULL, NULL, 15, 29, 1, NULL, '2022-12-13 01:47:31', '2022-12-13 01:47:31', NULL),
(30, '11002-Bank', '0', '2500', '2022-12-31', '10000015', NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL, 15, 30, 1, NULL, '2022-12-13 01:47:31', '2022-12-13 01:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `general_vouchers`
--

CREATE TABLE `general_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_vouchers`
--

INSERT INTO `general_vouchers` (`id`, `voucher_no`, `created_at`, `updated_at`) VALUES
(1, '10000001', '2022-12-13 00:57:17', '2022-12-13 00:57:17'),
(2, '10000002', '2022-12-13 00:59:08', '2022-12-13 00:59:08'),
(3, '10000003', '2022-12-13 00:59:58', '2022-12-13 00:59:58'),
(4, '10000004', '2022-12-13 01:01:20', '2022-12-13 01:01:20'),
(5, '10000005', '2022-12-13 01:02:05', '2022-12-13 01:02:05'),
(6, '10000006', '2022-12-13 01:03:16', '2022-12-13 01:03:16'),
(7, '10000007', '2022-12-13 01:04:11', '2022-12-13 01:04:11'),
(8, '10000008', '2022-12-13 01:05:32', '2022-12-13 01:05:32'),
(9, '10000009', '2022-12-13 01:06:37', '2022-12-13 01:06:37'),
(10, '10000010', '2022-12-13 01:10:45', '2022-12-13 01:10:45'),
(11, '10000011', '2022-12-13 01:11:44', '2022-12-13 01:11:44'),
(12, '10000012', '2022-12-13 01:13:18', '2022-12-13 01:13:18'),
(13, '10000013', '2022-12-13 01:14:43', '2022-12-13 01:14:43'),
(14, '10000014', '2022-12-13 01:15:39', '2022-12-13 01:15:39'),
(15, '10000015', '2022-12-13 01:47:31', '2022-12-13 01:47:31');

-- --------------------------------------------------------

--
-- Table structure for table `income_statements`
--

CREATE TABLE `income_statements` (
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investor_information`
--

CREATE TABLE `investor_information` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `national_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `number_shares` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nominee_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `relationship` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `joining_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `due` decimal(10,2) NOT NULL DEFAULT 0.00,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investor_information`
--

INSERT INTO `investor_information` (`id`, `investor_id`, `image`, `name`, `father_name`, `contact_no`, `email`, `national_id`, `address`, `number_shares`, `nominee_name`, `relationship`, `joining_date`, `due`, `user_id`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '2351669172427.jpg', 'Shahidul Islam', 'Abdul Mazid', '01887621949', 'shahiduli555@gmail.com', '28058216', NULL, '2', 'Md. Tohid', 'Son', '2022-11-23', '-20000.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-23 21:59:55', NULL),
(2, '2', '2171669180059.jpg', 'Ashab Uddin', 'Abdul Samad', '01777621950', 'ashab50@gmail.com', '28058324', NULL, '5', 'Md. Rabib', 'Son', '2022-11-23', '500.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-23 20:59:51', NULL),
(3, '3', '9501669180092.jpg', 'Md. Rabib', 'Jaker Hossain', '01777621222', 'rabib22@gmail.com', '20585643', NULL, '1', 'Ashab uddin', 'Son', '2022-11-23', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-22 23:08:12', NULL),
(4, '4', '6681669180106.jpg', 'Md Tohidul Islam', 'Hossain Akbor', '01777621225', 'tohid25@gmail.com', '28058565', NULL, '1', 'Hossain Akbor', 'father', '2022-11-23', '10000.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-23 00:38:31', NULL),
(5, '5', '8321669180123.jpg', 'Biplop Uddin', 'Akter Hossion', '01777621263', 'biplop63@gmail.com', '80585663', NULL, '1', 'Akter Hossion', 'father', '2022-11-23', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-22 23:08:43', NULL),
(6, '6', '3101669180144.jpg', 'Sajedul Hoque', 'Abdul Kader', '01777621242', 'sajedul42@gmail.com', '20585647', NULL, '3', 'Abdul Kader', 'father', '2022-11-23', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-23 21:00:03', NULL),
(7, '7', '2131669180159.jpg', 'Jalal Uddin', 'Md. Shahajan', '01777621532', 'jalal32@gmail.com', '280856532', NULL, '1', 'Md. Shahajan', 'father', '2022-11-23', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-22 23:09:19', NULL),
(8, '8', '8251669180172.jpg', 'Md. Jahid', 'Samsul Alom', '01777621578', 'jahid78@gmail.com', '280586578', NULL, '1', 'Samsul Alom', 'father', '2022-11-23', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-22 23:09:32', NULL),
(9, '9', '3841669180187.jpg', 'Saiful Islam', 'Jalal Uddin', '01777621566', 'saiful66@gmail.com', '280586566', NULL, '1', 'Jalal Uddin', 'father', '2022-11-23', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-22 23:09:47', NULL),
(10, '10', '7331669518520.jpg', 'Md. Rahat', 'Saiful Islam', '01777621537', 'rahat37@gmail.com', '280856537', NULL, '1', 'Saiful Islam', 'father', '2022-11-24', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-26 21:08:40', NULL),
(11, '11', '9511669518540.jpg', 'Ariful Islam', 'Md. Rahat', '01777621519', 'arif19@gmail.com', '280586519', NULL, '1', 'Md. Rahat', 'father', '2022-11-24', '6500.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-26 21:09:00', NULL),
(12, '12', '2831669518558.jpg', 'Md. Nasim', 'Ariful Islam', '01777621571', 'nasim71@gmail.com', '2855856571', NULL, '1', 'Ariful Islam', 'father', '2022-11-24', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-26 21:09:18', NULL),
(13, '13', '5491669518573.jpg', 'Haronur Rashid', 'Md. Nasim', '01777621589', 'harun89@gmail.com', '2805456589', NULL, '1', 'Md. Nasim', 'father', '2022-11-24', '0.00', NULL, 1, 1, NULL, '2022-11-22 20:53:23', '2022-11-26 21:09:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `investor_payments`
--

CREATE TABLE `investor_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `investor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `book_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `receipt_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees_month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `actual_amount` decimal(10,2) NOT NULL,
  `number_of_share` int(11) NOT NULL,
  `account_status` tinyint(1) DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `investor_payments`
--

INSERT INTO `investor_payments` (`id`, `investor_id`, `date`, `book_no`, `receipt_no`, `picture`, `payment_method`, `fees_month`, `amount`, `actual_amount`, `number_of_share`, `account_status`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '2022-11-23', '4', '4', '7001669180256.jpg', '4-child_twos', '2022-11', '23000.00', '23000.00', 2, 0, 1, NULL, '2022-11-22 23:10:56', '2022-11-22 23:10:56', NULL),
(2, '2', '2022-11-22', '2', '1', '4551669185343.jpg', '4-child_twos', '2022-11', '11000.00', '11500.00', 1, 0, 1, NULL, '2022-11-23 00:35:43', '2022-11-23 00:35:43', NULL),
(3, '4', '2022-11-23', '1', '230', '6111669185511.jpg', '4-child_twos', '2022-11', '1500.00', '11500.00', 1, 0, 1, NULL, '2022-11-23 00:38:31', '2022-11-23 00:38:31', NULL),
(4, '11', '2022-11-23', '2', '65465465', '2201669185552.jpg', '3-child_twos', '2022-11', '5000.00', '11500.00', 1, 0, 1, NULL, '2022-11-23 00:39:12', '2022-11-23 00:39:12', NULL),
(5, '1', '2022-12-01', '1', '55555', '8851669262394.jpg', '4-child_twos', '2022-11', '20000.00', '0.00', 2, 0, 1, NULL, '2022-11-23 21:59:55', '2022-11-23 21:59:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journal_vouchers`
--

CREATE TABLE `journal_vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `voucher_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `current_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `purpose` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `debit_sum` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit_sum` decimal(10,2) NOT NULL DEFAULT 0.00,
  `cheque_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cheque_dt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_vouchers`
--

INSERT INTO `journal_vouchers` (`id`, `voucher_no`, `current_date`, `pay_name`, `purpose`, `debit_sum`, `credit_sum`, `cheque_no`, `cheque_dt`, `bank`, `slip`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '10000001', '2022-12-01', 'Kamal', 'Night Guard Salary', '5000.00', '5000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 00:57:17', '2022-12-13 00:57:17', NULL),
(2, '10000002', '2022-12-02', 'Ashab Uddin', 'Office  Staff Salary', '10000.00', '10000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 00:59:08', '2022-12-13 00:59:08', NULL),
(3, '10000003', '2022-12-05', 'Electricity Bill Vendor', 'Electricity Bill', '500.00', '500.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 00:59:58', '2022-12-13 00:59:58', NULL),
(4, '10000004', '2022-12-15', 'Jalal', 'Miscellaneous Expense', '500.00', '500.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:01:20', '2022-12-13 01:01:20', NULL),
(5, '10000005', '2022-12-15', 'Jahidul Alom', 'Office Rent', '5000.00', '5000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:02:05', '2022-12-13 01:02:05', NULL),
(6, '10000006', '2022-12-17', 'Jahidul Alom', 'Painting', '2000.00', '2000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:03:16', '2022-12-13 01:03:16', NULL),
(7, '10000007', '2022-12-20', 'Kamrul', 'Stationary Purchase', '1000.00', '1000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:04:11', '2022-12-13 01:04:11', NULL),
(8, '10000008', '2022-12-22', 'Jalal', 'Repair & Maintenance', '2000.00', '2000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:05:32', '2022-12-13 01:05:52', NULL),
(9, '10000009', '2022-12-31', 'Ashab Uddin', 'Clean Expense', '500.00', '500.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:06:37', '2022-12-13 01:06:37', NULL),
(10, '10000010', '2022-12-31', 'Sajedul Sakib', 'Subscribtion Fee', '8000.00', '8000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:10:45', '2022-12-13 01:10:45', NULL),
(11, '10000011', '2022-12-29', 'Kamrul', 'Income from Garbage', '5000.00', '5000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:11:44', '2022-12-13 01:11:44', NULL),
(12, '10000012', '2022-12-31', 'Sajedul Sakib', 'Income from Project', '50000.00', '50000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:13:18', '2022-12-13 01:13:18', NULL),
(13, '10000013', '2022-12-31', 'IBBL', 'Income from Bank Interest', '8000.00', '8000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:14:43', '2022-12-13 01:14:43', NULL),
(14, '10000014', '2022-12-31', 'grameenphone', 'Profit From Capital Market Investment', '12000.00', '12000.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:15:39', '2022-12-13 01:15:39', NULL),
(15, '10000015', '2022-12-31', 'NBR', 'for Income Tax', '2500.00', '2500.00', NULL, NULL, NULL, NULL, 1, NULL, '2022-12-13 01:47:31', '2022-12-13 01:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `journal_voucher_bkdns`
--

CREATE TABLE `journal_voucher_bkdns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `journal_voucher_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `particulars` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `debit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `credit` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `journal_voucher_bkdns`
--

INSERT INTO `journal_voucher_bkdns` (`id`, `journal_voucher_id`, `particulars`, `account_code`, `table_name`, `table_id`, `debit`, `credit`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Paid On Cash', '52001002-Night Guard Salary', 'child_twos', '4', '5000.00', '0.00', 2, NULL, '2022-12-13 00:57:17', '2022-12-13 00:57:17', NULL),
(2, '1', 'Paid On Cash', '11001001-Petty Cash', 'child_twos', '1', '0.00', '5000.00', 2, NULL, '2022-12-13 00:57:17', '2022-12-13 00:57:17', NULL),
(3, '2', 'Paid On Cash', '52001001-Staff Salary', 'child_twos', '3', '10000.00', '0.00', 2, NULL, '2022-12-13 00:59:08', '2022-12-13 00:59:08', NULL),
(4, '2', '', '11002-Bank', 'child_ones', '2', '0.00', '10000.00', 2, NULL, '2022-12-13 00:59:08', '2022-12-13 00:59:08', NULL),
(5, '3', 'Paid On Cash', '52002-Electricity Bill', 'child_ones', '12', '500.00', '0.00', 2, NULL, '2022-12-13 00:59:58', '2022-12-13 00:59:58', NULL),
(6, '3', '', '11001001-Petty Cash', 'child_twos', '1', '0.00', '500.00', 2, NULL, '2022-12-13 00:59:58', '2022-12-13 00:59:58', NULL),
(7, '4', 'Paid On Cash', '52003-Miscellaneous Expense', 'child_ones', '13', '500.00', '0.00', 2, NULL, '2022-12-13 01:01:20', '2022-12-13 01:01:20', NULL),
(8, '4', 'Paid On Cash', '11001001-Petty Cash', 'child_twos', '1', '0.00', '500.00', 2, NULL, '2022-12-13 01:01:20', '2022-12-13 01:01:20', NULL),
(9, '5', 'Paid On Cash', '52004001-Office Rent', 'child_twos', '5', '5000.00', '0.00', 2, NULL, '2022-12-13 01:02:05', '2022-12-13 01:02:05', NULL),
(10, '5', '', '11001002-Main Cash', 'child_twos', '2', '0.00', '5000.00', 2, NULL, '2022-12-13 01:02:05', '2022-12-13 01:02:05', NULL),
(11, '6', '', '52005-Paint', 'child_ones', '15', '2000.00', '0.00', 2, NULL, '2022-12-13 01:03:16', '2022-12-13 01:03:16', NULL),
(12, '6', '', '11001001-Petty Cash', 'child_twos', '1', '0.00', '2000.00', 2, NULL, '2022-12-13 01:03:16', '2022-12-13 01:03:16', NULL),
(13, '7', '', '52006-Stationary Expense', 'child_ones', '16', '1000.00', '0.00', 2, NULL, '2022-12-13 01:04:11', '2022-12-13 01:04:11', NULL),
(14, '7', '', '11001001-Petty Cash', 'child_twos', '1', '0.00', '1000.00', 2, NULL, '2022-12-13 01:04:11', '2022-12-13 01:04:11', NULL),
(15, '8', '', '52007-Repair & Maintenance', 'child_ones', '17', '2000.00', '0.00', 2, NULL, '2022-12-13 01:05:32', '2022-12-13 01:05:32', NULL),
(16, '8', '', '11001002-Main Cash', 'child_twos', '2', '0.00', '2000.00', 2, NULL, '2022-12-13 01:05:32', '2022-12-13 01:05:32', NULL),
(17, '9', '', '52008-Clean Expense', 'child_ones', '18', '500.00', '0.00', 2, NULL, '2022-12-13 01:06:37', '2022-12-13 01:06:37', NULL),
(18, '9', '', '11001001-Petty Cash', 'child_twos', '1', '0.00', '500.00', 2, NULL, '2022-12-13 01:06:37', '2022-12-13 01:06:37', NULL),
(19, '10', '', '11002-Bank', 'child_ones', '2', '8000.00', '0.00', 2, NULL, '2022-12-13 01:10:45', '2022-12-13 01:10:45', NULL),
(20, '10', '', '41001-Subscription', 'child_ones', '4', '0.00', '8000.00', 2, NULL, '2022-12-13 01:10:45', '2022-12-13 01:10:45', NULL),
(21, '11', '', '11001002-Main Cash', 'child_twos', '2', '5000.00', '0.00', 2, NULL, '2022-12-13 01:11:44', '2022-12-13 01:11:44', NULL),
(22, '11', '', '41002-Income From Garbage', 'child_ones', '5', '0.00', '5000.00', 2, NULL, '2022-12-13 01:11:44', '2022-12-13 01:11:44', NULL),
(23, '12', '', '11002-Bank', 'child_ones', '2', '50000.00', '0.00', 2, NULL, '2022-12-13 01:13:18', '2022-12-13 01:13:18', NULL),
(24, '12', '', '41003-Income From Project', 'child_ones', '6', '0.00', '50000.00', 2, NULL, '2022-12-13 01:13:18', '2022-12-13 01:13:18', NULL),
(25, '13', '', '11002-Bank', 'child_ones', '2', '8000.00', '0.00', 2, NULL, '2022-12-13 01:14:43', '2022-12-13 01:14:43', NULL),
(26, '13', '', '42001-Bank Interest', 'child_ones', '7', '0.00', '8000.00', 2, NULL, '2022-12-13 01:14:43', '2022-12-13 01:14:43', NULL),
(27, '14', '', '11002-Bank', 'child_ones', '2', '12000.00', '0.00', 2, NULL, '2022-12-13 01:15:39', '2022-12-13 01:15:39', NULL),
(28, '14', '', '42002-Profit From Capital Market Investment', 'child_ones', '8', '0.00', '12000.00', 2, NULL, '2022-12-13 01:15:39', '2022-12-13 01:15:39', NULL),
(29, '15', '', '53001-Income Tax', 'child_ones', '19', '2500.00', '0.00', 2, NULL, '2022-12-13 01:47:31', '2022-12-13 01:47:31', NULL),
(30, '15', '', '11002-Bank', 'child_ones', '2', '0.00', '2500.00', 2, NULL, '2022-12-13 01:47:31', '2022-12-13 01:47:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `master_accounts`
--

CREATE TABLE `master_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `head_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `master_accounts`
--

INSERT INTO `master_accounts` (`id`, `head_name`, `head_code`, `opening_balance`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Assets', '1000', '0', '2022-12-13 00:50:14', '2022-12-13 00:50:14', NULL),
(2, 'Liabilities', '2000', '0', '2022-12-13 00:50:14', '2022-12-13 00:50:14', NULL),
(3, 'Capital', '3000', '0', '2022-12-13 00:50:14', '2022-12-13 00:50:14', NULL),
(4, 'Income', '4000', '0', '2022-12-13 00:50:14', '2022-12-13 00:50:14', NULL),
(5, 'Expense', '5000', '0', '2022-12-13 00:50:14', '2022-12-13 00:50:14', NULL);

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
(89, '2013_11_01_070215_create_roles_table', 1),
(90, '2014_10_12_000000_create_users_table', 1),
(91, '2014_10_12_100000_create_password_resets_table', 1),
(92, '2019_08_19_000000_create_failed_jobs_table', 1),
(93, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(94, '2022_11_07_063846_create_investor_information_table', 1),
(99, '2022_11_14_044109_create_account_head_views_table', 1),
(100, '2022_11_14_065147_create_investor_payments_table', 1),
(103, '2022_11_19_070232_create_fee_categories_table', 1),
(104, '2022_11_19_081624_create_monthly_fees_table', 1),
(105, '2022_11_21_041900_create_debit_vouchers_table', 1),
(106, '2022_11_21_042453_create_devoucher_bkdns_table', 1),
(107, '2022_11_21_042833_create_general_ledgers_table', 1),
(108, '2022_11_21_042920_create_general_vouchers_table', 1),
(109, '2022_11_21_114623_create_journal_vouchers_table', 1),
(110, '2022_11_21_114805_create_credit_vouchers_table', 1),
(111, '2022_11_23_032018_create_cre_voucher_bkdns_table', 2),
(112, '2022_11_23_032349_create_journal_voucher_bkdns_table', 3),
(113, '2022_11_23_073355_create_trial_balances_table', 8),
(114, '2022_11_26_065550_create_client_infos_table', 5),
(116, '2022_11_28_044813_create_project_infos_table', 6),
(120, '2022_11_28_135011_create_client_payments_table', 7),
(122, '2022_12_06_043037_create_account_head_reports_table', 9),
(123, '2022_12_06_045216_create_recept_payment_accounts_table', 10),
(124, '2022_12_06_050522_create_documents_table', 11),
(125, '2022_12_06_112756_create_regulations_table', 12),
(127, '2022_12_10_045905_create_income_statements_table', 13),
(128, '2022_12_10_051102_create_profit_portfolios_table', 13),
(129, '2022_12_10_060012_create_balance_sheets_table', 14),
(158, '2022_11_13_050127_create_master_accounts_table', 15),
(159, '2022_11_13_062826_create_sub_heads_table', 15),
(160, '2022_11_13_145322_create_child_ones_table', 15),
(161, '2022_11_13_161204_create_child_twos_table', 15);

-- --------------------------------------------------------

--
-- Table structure for table `monthly_fees`
--

CREATE TABLE `monthly_fees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `note` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `monthly_fees`
--

INSERT INTO `monthly_fees` (`id`, `category_id`, `month`, `amount`, `note`, `created_by`, `updated_by`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', '2022-11', '10000.00', 'These are annual fees.', 2, NULL, '2022-11-22 20:53:30', '2022-11-22 20:53:30', NULL),
(2, '2', '2022-11', '1000.00', 'These are monthly fees.', 2, NULL, '2022-11-22 20:53:30', '2022-11-22 20:53:30', NULL),
(3, '3', '2022-11', '500.00', 'There are subscription fees.', 2, NULL, '2022-11-22 20:53:30', '2022-11-22 20:53:30', NULL);

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
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profit_portfolios`
--

CREATE TABLE `profit_portfolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_infos`
--

CREATE TABLE `project_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starting_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `end_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit_projections` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `return_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `return_profit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 1,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `project_infos`
--

INSERT INTO `project_infos` (`id`, `client_id`, `project_name`, `description`, `amount`, `duration`, `starting_date`, `end_date`, `profit_projections`, `return_date`, `return_profit`, `status`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'land invest', 'Investing on \"Papapy Cultivation on  Edge of Newly Drought Pond\"', '50000', '3 Month from Day of Cultivation', '2022-11-28', '2022-12-28', '4000', NULL, NULL, 1, 1, NULL, '2022-11-28 01:14:07', '2022-11-28 02:03:23'),
(2, 3, 'land invest', 'odjklfjsdla', '4000', '6 Month from Day of Cultivation', '2022-11-28', '2022-12-29', '7000', NULL, NULL, 1, 1, NULL, '2022-11-28 01:26:38', '2022-11-28 01:26:38'),
(3, 1, 'land invest', 'fggf', '50000', '3 Month from Day of Cultivation', '2022-12-03', '2023-10-03', '25000', NULL, NULL, 1, 1, NULL, '2022-12-03 05:13:57', '2022-12-03 05:13:57');

-- --------------------------------------------------------

--
-- Table structure for table `recept_payment_accounts`
--

CREATE TABLE `recept_payment_accounts` (
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `regulations`
--

CREATE TABLE `regulations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `identity` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `type`, `identity`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'superadmin', '2022-11-22 20:53:17', NULL),
(2, 'Admin', 'admin', '2022-11-22 20:53:17', NULL),
(3, 'Moderator', 'moderator', '2022-11-22 20:53:17', NULL),
(4, 'Investor', 'investor', '2022-11-22 20:53:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_heads`
--

CREATE TABLE `sub_heads` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `master_head_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `head_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `opening_balance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_heads`
--

INSERT INTO `sub_heads` (`id`, `master_head_id`, `head_name`, `head_code`, `opening_balance`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1', 'Current Assets', '1100', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(2, '1', 'Fixed Assets', '1200', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(3, '1', 'Intangible Assets', '1300', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(4, '1', 'Other Assets', '1400', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(5, '2', 'Current Liabilities', '2100', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(6, '2', 'Long Term Liabilities', '2200', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(7, '2', 'Other Liabilities', '2300', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(8, '3', 'Capital', '3100', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(9, '3', 'Provisions', '3200', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(10, '4', 'Operating Income', '4100', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(11, '4', 'Non operating Income', '4200', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(12, '4', 'Other Income', '4300', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(13, '4', 'Other Revenue Stamp', '4400', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(14, '5', 'Capital Expenses', '5100', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(15, '5', 'Operating Expense', '5200', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL),
(16, '5', 'Non Operating Expense', '5300', '0', '2022-12-13 00:50:15', '2022-12-13 00:50:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `trial_balances`
--

CREATE TABLE `trial_balances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cr` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` bigint(20) UNSIGNED NOT NULL DEFAULT 2,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'en',
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `full_name`, `name`, `email`, `phone`, `role_id`, `password`, `language`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'shahiduli555@gmail.com', '01887621949', 2, '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'en', NULL, NULL, '2022-11-22 20:55:02', '2022-11-22 20:55:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_head_views`
--
ALTER TABLE `account_head_views`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `child_ones`
--
ALTER TABLE `child_ones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `child_ones_head_code_unique` (`head_code`);

--
-- Indexes for table `child_twos`
--
ALTER TABLE `child_twos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `child_twos_head_code_unique` (`head_code`);

--
-- Indexes for table `client_infos`
--
ALTER TABLE `client_infos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `client_infos_national_id_unique` (`national_id`),
  ADD KEY `client_infos_created_by_index` (`created_by`),
  ADD KEY `client_infos_updated_by_index` (`updated_by`);

--
-- Indexes for table `client_payments`
--
ALTER TABLE `client_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_payments_created_by_index` (`created_by`),
  ADD KEY `client_payments_updated_by_index` (`updated_by`);

--
-- Indexes for table `credit_vouchers`
--
ALTER TABLE `credit_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_vouchers_created_by_index` (`created_by`),
  ADD KEY `credit_vouchers_updated_by_index` (`updated_by`);

--
-- Indexes for table `cre_voucher_bkdns`
--
ALTER TABLE `cre_voucher_bkdns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cre_voucher_bkdns_created_by_index` (`created_by`),
  ADD KEY `cre_voucher_bkdns_updated_by_index` (`updated_by`);

--
-- Indexes for table `debit_vouchers`
--
ALTER TABLE `debit_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `debit_vouchers_created_by_index` (`created_by`),
  ADD KEY `debit_vouchers_updated_by_index` (`updated_by`);

--
-- Indexes for table `devoucher_bkdns`
--
ALTER TABLE `devoucher_bkdns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `devoucher_bkdns_created_by_index` (`created_by`),
  ADD KEY `devoucher_bkdns_updated_by_index` (`updated_by`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `fee_categories`
--
ALTER TABLE `fee_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_categories_created_by_index` (`created_by`),
  ADD KEY `fee_categories_updated_by_index` (`updated_by`);

--
-- Indexes for table `general_ledgers`
--
ALTER TABLE `general_ledgers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `general_ledgers_created_by_index` (`created_by`),
  ADD KEY `general_ledgers_updated_by_index` (`updated_by`);

--
-- Indexes for table `general_vouchers`
--
ALTER TABLE `general_vouchers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investor_information`
--
ALTER TABLE `investor_information`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `investor_information_investor_id_unique` (`investor_id`),
  ADD UNIQUE KEY `investor_information_contact_no_unique` (`contact_no`),
  ADD UNIQUE KEY `investor_information_email_unique` (`email`),
  ADD UNIQUE KEY `investor_information_national_id_unique` (`national_id`),
  ADD KEY `investor_information_user_id_index` (`user_id`),
  ADD KEY `investor_information_created_by_index` (`created_by`),
  ADD KEY `investor_information_updated_by_index` (`updated_by`);

--
-- Indexes for table `investor_payments`
--
ALTER TABLE `investor_payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `investor_payments_created_by_index` (`created_by`),
  ADD KEY `investor_payments_updated_by_index` (`updated_by`);

--
-- Indexes for table `journal_vouchers`
--
ALTER TABLE `journal_vouchers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_vouchers_created_by_index` (`created_by`),
  ADD KEY `journal_vouchers_updated_by_index` (`updated_by`);

--
-- Indexes for table `journal_voucher_bkdns`
--
ALTER TABLE `journal_voucher_bkdns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `journal_voucher_bkdns_created_by_index` (`created_by`),
  ADD KEY `journal_voucher_bkdns_updated_by_index` (`updated_by`);

--
-- Indexes for table `master_accounts`
--
ALTER TABLE `master_accounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `master_accounts_head_code_unique` (`head_code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `monthly_fees`
--
ALTER TABLE `monthly_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `monthly_fees_created_by_index` (`created_by`),
  ADD KEY `monthly_fees_updated_by_index` (`updated_by`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `profit_portfolios`
--
ALTER TABLE `profit_portfolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_infos`
--
ALTER TABLE `project_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `project_infos_created_by_index` (`created_by`),
  ADD KEY `project_infos_updated_by_index` (`updated_by`);

--
-- Indexes for table `regulations`
--
ALTER TABLE `regulations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_type_unique` (`type`),
  ADD UNIQUE KEY `roles_identity_unique` (`identity`);

--
-- Indexes for table `sub_heads`
--
ALTER TABLE `sub_heads`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sub_heads_head_code_unique` (`head_code`);

--
-- Indexes for table `trial_balances`
--
ALTER TABLE `trial_balances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trial_balances_created_by_index` (`created_by`),
  ADD KEY `trial_balances_updated_by_index` (`updated_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_head_views`
--
ALTER TABLE `account_head_views`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `child_ones`
--
ALTER TABLE `child_ones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `child_twos`
--
ALTER TABLE `child_twos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `client_infos`
--
ALTER TABLE `client_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `client_payments`
--
ALTER TABLE `client_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `credit_vouchers`
--
ALTER TABLE `credit_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cre_voucher_bkdns`
--
ALTER TABLE `cre_voucher_bkdns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `debit_vouchers`
--
ALTER TABLE `debit_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `devoucher_bkdns`
--
ALTER TABLE `devoucher_bkdns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_categories`
--
ALTER TABLE `fee_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `general_ledgers`
--
ALTER TABLE `general_ledgers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `general_vouchers`
--
ALTER TABLE `general_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `investor_information`
--
ALTER TABLE `investor_information`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `investor_payments`
--
ALTER TABLE `investor_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `journal_vouchers`
--
ALTER TABLE `journal_vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `journal_voucher_bkdns`
--
ALTER TABLE `journal_voucher_bkdns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `master_accounts`
--
ALTER TABLE `master_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;

--
-- AUTO_INCREMENT for table `monthly_fees`
--
ALTER TABLE `monthly_fees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `profit_portfolios`
--
ALTER TABLE `profit_portfolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project_infos`
--
ALTER TABLE `project_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `regulations`
--
ALTER TABLE `regulations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_heads`
--
ALTER TABLE `sub_heads`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `trial_balances`
--
ALTER TABLE `trial_balances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `investor_information`
--
ALTER TABLE `investor_information`
  ADD CONSTRAINT `investor_information_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
