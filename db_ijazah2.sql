-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 14, 2023 at 02:33 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ijazah2`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_user`
--

CREATE TABLE `detail_user` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `nim` varchar(100) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `program_studi` varchar(100) NOT NULL,
  `fakultas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `detail_user`
--

INSERT INTO `detail_user` (`id`, `user_id`, `nim`, `tgl_lahir`, `tempat_lahir`, `program_studi`, `fakultas`) VALUES
(1, 1, '111', '1998-01-28', 'Dumai', 'sistem informasi', 'sains dan teknologi'),
(2, 4, '11553102773', '1998-01-28', 'Pekanbaru', 'sistem informasi', 'sains dan teknologi'),
(3, 8, '1122334455', '1996-01-01', 'Pekanbaru', 'sistem informasi', 'sains dan teknologi');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255)  NOT NULL,
  `connection` text  NOT NULL,
  `queue` text  NOT NULL,
  `payload` longtext  NOT NULL,
  `exception` longtext  NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `ijazah`
--

CREATE TABLE `ijazah` (
  `id` int NOT NULL,
  `nim` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `alasan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `ijazah`
--

INSERT INTO `ijazah` (`id`, `nim`, `status`, `alasan`, `created_at`) VALUES
(1, '111', 'approve by dekan', '', '2023-06-01 14:02:38'),
(2, '1122334455', 'approve by dekan', NULL, '2023-06-14 20:59:30');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255)  NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255)  NOT NULL,
  `token` varchar(255)  NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255)  NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `token` varchar(64)  NOT NULL,
  `abilities` text ,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255)  NOT NULL,
  `email` varchar(255)  NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255)  NOT NULL,
  `remember_token` varchar(100)  DEFAULT NULL,
  `level` varchar(50) CHARACTER SET utf8mb4  NOT NULL DEFAULT 'mhs' COMMENT 'mhs | staff | dekan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'M Anang Ramadhan', 'mhs@gmail.com', NULL, '$2y$10$oY0Damj6fa512C7ASUXH2uqtNzQFjQkc1kb7acwFN4ESPpLXkRLb2', NULL, 'mhs', '2023-05-08 08:29:04', '2023-05-08 08:29:04'),
(2, 'M Anang Ramadhan', 'staff@gmail.com', NULL, '$2y$10$oY0Damj6fa512C7ASUXH2uqtNzQFjQkc1kb7acwFN4ESPpLXkRLb2', NULL, 'staff', '2023-05-08 08:29:04', '2023-05-08 08:29:04'),
(3, 'M Anang Ramadhan', 'dekan@gmail.com', NULL, '$2y$10$oY0Damj6fa512C7ASUXH2uqtNzQFjQkc1kb7acwFN4ESPpLXkRLb2', NULL, 'dekan', '2023-05-08 08:29:04', '2023-05-08 08:29:04'),
(4, 'anang', 'anang@gmail.com', NULL, '$2y$10$i494Mcp1/6U/yxqmjNDkFeVBEjpqnXyb4tNikOIBlUun7mKg8JEA6', NULL, 'mhs', '2023-06-05 08:57:21', '2023-06-05 08:57:21'),
(5, 'Admin', 'admin@gmail.com', NULL, '$2y$10$i494Mcp1/6U/yxqmjNDkFeVBEjpqnXyb4tNikOIBlUun7mKg8JEA6', NULL, 'admin', '2023-06-05 08:57:21', '2023-06-05 08:57:21'),
(7, 'tes', 'tes@gmail.com', NULL, '$2y$10$v5ULTgbeZrd5kjBeqjrIq.G7ZY/g9h4dFNRWonP66r5PVr55Sdo/C', NULL, 'staff', '2023-06-06 08:11:28', '2023-06-06 08:11:28'),
(8, 'testing', 'testing@gmail.com', NULL, '$2y$10$F9LOnklcG7Z/mhkB/VRC6eqnFPQDrTfLijk8.Z2Sd9sPI6X8Pko22', NULL, 'mhs', '2023-06-14 06:56:29', '2023-06-14 06:56:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_user`
--
ALTER TABLE `detail_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `ijazah`
--
ALTER TABLE `ijazah`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_user`
--
ALTER TABLE `detail_user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ijazah`
--
ALTER TABLE `ijazah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
