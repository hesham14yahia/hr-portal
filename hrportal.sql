-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2018 at 05:10 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrportal`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `day` date NOT NULL,
  `work_hours` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `status_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `day`, `work_hours`, `employee_id`, `status_id`, `created_at`, `updated_at`) VALUES
(1, '2018-09-04', 7, 1, 2, NULL, NULL),
(2, '2018-09-12', 0, 2, 1, NULL, NULL),
(3, '2018-09-25', 8, 3, 4, NULL, NULL),
(4, '2018-09-29', 6, 4, 3, NULL, NULL),
(5, '2018-09-03', 0, 5, 6, NULL, NULL),
(6, '2018-09-11', 0, 6, 5, NULL, NULL),
(7, '2018-09-04', 7, 2, 7, NULL, NULL),
(8, '2018-09-03', 8, 5, 8, NULL, NULL),
(9, '2018-07-08', 10, 1, 9, '2018-09-08 18:42:09', '2018-09-08 18:42:09'),
(10, '2018-09-01', 7, 3, 10, NULL, NULL),
(11, '2018-08-10', 0, 4, 11, NULL, NULL),
(12, '2018-09-11', 0, 6, 12, NULL, NULL),
(13, '2018-09-05', 0, 3, 13, NULL, NULL),
(14, '2018-06-11', 0, 1, 14, NULL, NULL),
(15, '2018-05-15', 0, 2, 15, NULL, NULL),
(16, '2018-06-17', 0, 4, 16, NULL, NULL),
(17, '2018-06-01', 0, 5, 17, NULL, NULL),
(18, '2018-07-01', 0, 6, 18, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` int(11) NOT NULL,
  `hire_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `name`, `email`, `mobile`, `hire_date`, `created_at`, `updated_at`) VALUES
(1, 'Hesham', 'he@mail.com', 112266883, '2018-09-12', NULL, NULL),
(2, 'Mostafa Yahia', 'mos@mail.com', 113335858, '2018-09-06', NULL, '2018-09-06 09:11:54'),
(3, 'Mohamed', 'mo@mail.com', 549811366, '2018-03-12', NULL, NULL),
(4, 'Eslam', 'es@mail.com', 516516096, '2018-09-27', NULL, NULL),
(5, 'Salama', 'sa@mail.com', 1223569846, '2018-09-02', NULL, NULL),
(6, 'Slay', 'slay@mail.com', 54251236, '2018-06-06', '2018-09-06 08:33:15', '2018-09-06 08:33:15');

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
(27, '2014_10_12_000000_create_users_table', 1),
(28, '2014_10_12_100000_create_password_resets_table', 1),
(29, '2018_09_06_092010_create_employees_table', 1),
(30, '2018_09_06_093659_create_statuses_table', 1),
(31, '2018_09_06_094334_create_attendances_table', 1),
(34, '2018_09_08_163341_create_status_searches_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` int(10) UNSIGNED NOT NULL,
  `present` tinyint(1) NOT NULL,
  `absent` tinyint(1) NOT NULL,
  `sick_leave` tinyint(1) NOT NULL,
  `day_off` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `present`, `absent`, `sick_leave`, `day_off`, `created_at`, `updated_at`) VALUES
(1, 0, 1, 0, 0, NULL, NULL),
(2, 1, 0, 0, 0, NULL, NULL),
(3, 1, 0, 0, 0, NULL, NULL),
(4, 1, 0, 0, 0, NULL, NULL),
(5, 0, 0, 1, 0, NULL, NULL),
(6, 0, 0, 0, 1, NULL, NULL),
(7, 1, 0, 0, 0, NULL, NULL),
(8, 1, 0, 0, 0, NULL, NULL),
(9, 1, 0, 0, 0, '2018-09-08 18:43:37', '2018-09-08 18:43:37'),
(10, 1, 0, 0, 0, '2018-09-08 18:49:23', '2018-09-08 18:49:23'),
(11, 0, 1, 0, 0, NULL, NULL),
(12, 0, 0, 1, 0, NULL, NULL),
(13, 0, 0, 0, 1, NULL, NULL),
(14, 0, 1, 0, 0, NULL, NULL),
(15, 0, 0, 1, 0, NULL, NULL),
(16, 0, 0, 0, 1, NULL, NULL),
(17, 0, 1, 0, 0, NULL, NULL),
(18, 0, 0, 1, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_searches`
--

CREATE TABLE `status_searches` (
  `id` int(10) UNSIGNED NOT NULL,
  `status_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `status_searches`
--

INSERT INTO `status_searches` (`id`, `status_name`) VALUES
(1, 'Present'),
(2, 'Absent'),
(3, 'Sick Leave'),
(4, 'Day Off');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Hesham Yahia', 'heshamyahia@gmail.com', NULL, '$2y$10$G5yca9WwLsX132rsLOYOTuaLRb4UoHhJwGFcIU1jreCY9gtmN.1Sq', 'IloKNR9EzKNmmYjQbyEyYRSmDjJt54dU1Ngrdhks6szwOIKMEzulTOfoJn5u', '2018-09-06 06:18:15', '2018-09-06 06:18:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
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
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status_searches`
--
ALTER TABLE `status_searches`
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
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `status_searches`
--
ALTER TABLE `status_searches`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
