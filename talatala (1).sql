-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 12:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `talatala`
--

-- --------------------------------------------------------

--
-- Table structure for table `affiliate_admins`
--

CREATE TABLE `affiliate_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) DEFAULT NULL,
  `code` varchar(255) DEFAULT NULL,
  `price` int(11) NOT NULL DEFAULT 0,
  `number1` int(11) DEFAULT NULL,
  `number2` int(11) DEFAULT NULL,
  `active` int(11) NOT NULL DEFAULT 1,
  `total` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `affiliate_admins`
--

INSERT INTO `affiliate_admins` (`id`, `user`, `code`, `price`, `number1`, `number2`, `active`, `total`, `created_at`, `updated_at`) VALUES
(1, '3', NULL, 0, 0, 0, 1, 0, '2025-06-11 21:48:33', '2025-06-11 21:48:33'),
(2, '3', 'emt', 0, 0, 0, 1, 0, '2025-06-11 21:49:04', '2025-06-11 21:49:04'),
(3, '3', 'mt', 50, 0, 0, 1, 0, '2025-06-11 21:49:49', '2025-06-11 21:49:49'),
(4, '2', 'mmt', 100, 0, 0, 1, 0, '2025-06-11 21:51:32', '2025-06-11 21:51:32'),
(5, '2', 'mmt', 100, 0, 0, 1, 0, '2025-06-11 21:51:37', '2025-06-11 21:51:37');

-- --------------------------------------------------------

--
-- Table structure for table `bills`
--

CREATE TABLE `bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `plan_id` varchar(100) DEFAULT NULL,
  `active` varchar(100) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_23_161103_create_tenants_table', 1),
(6, '2025_01_04_101904_create_subscriptions_table', 1),
(7, '2025_01_04_103253_create_bills_table', 1),
(8, '2025_01_04_111005_create_tenant_stors_table', 1),
(9, '2025_03_19_160949_create_affiliate_admins_table', 1),
(10, '2025_03_19_172932_create_plan_requsts_table', 1),
(12, '2025_01_04_113201_create_stores_table', 2);

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
-- Table structure for table `plan_requsts`
--

CREATE TABLE `plan_requsts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `duration` varchar(255) NOT NULL DEFAULT '0',
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `plan_id` varchar(100) DEFAULT NULL,
  `active` varchar(100) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stores`
--

CREATE TABLE `stores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `tenant_id` tinyint(4) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `domains` varchar(500) DEFAULT NULL,
  `database_options` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`database_options`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stores`
--

INSERT INTO `stores` (`id`, `name`, `theme`, `tenant_id`, `status`, `domains`, `database_options`, `created_at`, `updated_at`) VALUES
(2, 'eslam badawy', 'theme1', 7, 'active', 'eslam_badawy_6176', '{\"dbname\":\"tall_2\"}', '2025-07-02 16:12:01', '2025-07-02 16:12:01');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(8,2) NOT NULL DEFAULT 0.00,
  `duration` varchar(100) DEFAULT NULL,
  `max_orders` int(11) NOT NULL DEFAULT 10,
  `description` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tenants`
--

CREATE TABLE `tenants` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `nametxt` varchar(255) DEFAULT NULL,
  `domain` varchar(255) NOT NULL,
  `db` varchar(255) NOT NULL,
  `domains` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenants`
--

INSERT INTO `tenants` (`id`, `username`, `user_id`, `nametxt`, `domain`, `db`, `domains`, `created_at`, `updated_at`) VALUES
(4, 'MStore', '4', 'eslam badawy', 'MStore.localhost', '_MStore', NULL, '2025-07-01 15:35:20', '2025-07-01 15:35:20'),
(5, 'StoreB', '5', 'eslam badawy', 'StoreB.localhost', '_StoreB', NULL, '2025-07-01 15:44:23', '2025-07-01 15:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `tenant_stors`
--

CREATE TABLE `tenant_stors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tenant_id` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `subscription` varchar(255) DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tenant_stors`
--

INSERT INTO `tenant_stors` (`id`, `tenant_id`, `name`, `user_id`, `subscription`, `duration`, `active`, `created_at`, `updated_at`) VALUES
(5, '5', 'StoreB', 5, '1', '30', 1, '2025-07-01 15:44:23', '2025-07-01 15:44:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subscription` varchar(255) NOT NULL DEFAULT '1',
  `duration` varchar(255) DEFAULT NULL,
  `type` varchar(255) NOT NULL DEFAULT '1',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `super` varchar(255) NOT NULL DEFAULT '0',
  `password` varchar(255) NOT NULL,
  `admin` varchar(255) NOT NULL DEFAULT '0',
  `affiliate` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phone`, `email`, `subscription`, `duration`, `type`, `email_verified_at`, `super`, `password`, `admin`, `affiliate`, `remember_token`, `created_at`, `updated_at`) VALUES
(5, 'eslam badawy', 'StoreB', '9665 51 24 55', 'e@badawy.e', '1', '2025-07-08 18:44:23', '1', NULL, '0', '$2y$12$/laC66jQzCoAX1iqFPdVluijCg8x1tUdRjYUeHYRBRptnCK6NxxoO', '0', NULL, NULL, '2025-07-01 15:44:23', '2025-07-01 15:44:23'),
(7, 'eslam badawy', 'admin', '115009801', 'e@b2adawy.e', '1', NULL, '1', NULL, '0', '$2y$12$ZuyjDPDpqazUCPHmyyE5Oe/f.0dYHAD/vdzlFEqvZ.sOee2U7SR36', '0', NULL, NULL, '2025-07-02 16:12:01', '2025-07-02 16:12:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `affiliate_admins`
--
ALTER TABLE `affiliate_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `plan_requsts`
--
ALTER TABLE `plan_requsts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stores`
--
ALTER TABLE `stores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tenants`
--
ALTER TABLE `tenants`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenants_username_unique` (`username`),
  ADD UNIQUE KEY `tenants_domain_unique` (`domain`),
  ADD UNIQUE KEY `tenants_db_unique` (`db`);

--
-- Indexes for table `tenant_stors`
--
ALTER TABLE `tenant_stors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tenant_stors_tenant_id_unique` (`tenant_id`);

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
-- AUTO_INCREMENT for table `affiliate_admins`
--
ALTER TABLE `affiliate_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `bills`
--
ALTER TABLE `bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plan_requsts`
--
ALTER TABLE `plan_requsts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stores`
--
ALTER TABLE `stores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tenants`
--
ALTER TABLE `tenants`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tenant_stors`
--
ALTER TABLE `tenant_stors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
