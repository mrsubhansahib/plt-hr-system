-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 19, 2024 at 01:04 PM
-- Server version: 8.0.30
-- PHP Version: 8.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `plt-hr-system`
--

-- --------------------------------------------------------

--
-- Table structure for table `auths`
--

CREATE TABLE `auths` (
  `id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `capabilities`
--

CREATE TABLE `capabilities` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `on_capability_procedure` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outcome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `warning_issued_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disciplinaries`
--

CREATE TABLE `disciplinaries` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `reason_for_disciplinary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `hearing_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `outcome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `suspended` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_suspended` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `disclosures`
--

CREATE TABLE `disclosures` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `dbs_level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_requested` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_on_certificate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `paid_liberata` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reimbursed_candidate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoice_sent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `facility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_center` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_of_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `number_of_hours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contract_type` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `termination_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contract_returned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jd_returned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dbs_required` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `main_job`, `user_id`, `facility`, `cost_center`, `start_date`, `rate_of_pay`, `number_of_hours`, `contract_type`, `termination_date`, `contract_returned`, `jd_returned`, `dbs_required`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Swimming Teacher Co-ordinator', 'yes', 3, 'Seedhill Athletics and Fitness Centre', 'A occaecat facilis e', '10-Jan-2022', 'Dolor quas ea fugiat', '83', 'Casual', '07-Aug-1976', 'yes', 'yes', 'no', 'Est ex labore error', '2024-12-19 07:10:39', '2024-12-19 07:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `latenesses`
--

CREATE TABLE `latenesses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `lateness_triggered` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lateness_stage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `warning_level` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `outcome` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `review_date` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `module_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `admin_id`, `user_id`, `module_id`, `module_type`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 'User', 'update', '2024-12-19 07:09:29', '2024-12-19 07:09:29'),
(2, 1, 2, 2, 'User', 'create', '2024-12-19 07:09:56', '2024-12-19 07:09:56'),
(3, 1, 3, 3, 'User', 'create', '2024-12-19 07:10:24', '2024-12-19 07:10:24'),
(4, 1, 3, 3, 'User', 'update', '2024-12-19 07:10:30', '2024-12-19 07:10:30'),
(5, 1, 3, 1, 'Job', 'create', '2024-12-19 07:10:40', '2024-12-19 07:10:40'),
(6, 1, 3, 3, 'User', 'update', '2024-12-19 07:12:00', '2024-12-19 07:12:00'),
(7, 1, 3, 3, 'User', 'update', '2024-12-19 07:12:16', '2024-12-19 07:12:16'),
(8, 1, 1, 1, 'User', 'update', '2024-12-19 07:14:43', '2024-12-19 07:14:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_11_16_104253_create_auths_table', 1),
(6, '2024_11_20_125558_create_latenesses_table', 1),
(7, '2024_11_21_083136_create_jobs_table', 1),
(8, '2024_11_21_084705_create_disclosures_table', 1),
(9, '2024_11_21_085314_create_sicknesses_table', 1),
(10, '2024_11_21_085848_create_capabilities_table', 1),
(11, '2024_11_21_090732_create_disciplinaries_table', 1),
(12, '2024_11_21_091749_create_trainings_table', 1),
(13, '2024_12_18_113234_create_logs_table', 2);

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
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sicknesses`
--

CREATE TABLE `sicknesses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `reason_for_absence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_from` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_to` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certification_form_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit_note_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `trainings`
--

CREATE TABLE `trainings` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `training_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `course_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `renewal_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ihasco_training_sent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ihasco_training_complete` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middle_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preferred_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ethnicity` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ni_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contracted_from_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reason_termination` text COLLATE utf8mb4_unicode_ci,
  `handbook_sent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `medical_form_returned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `new_entrant_form_returned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `confidentiality_statement_returned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `work_document_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qualifications_checked` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `references_requested` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `references_returned` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payroll_informed` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `probation_complete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `equipment_required` text COLLATE utf8mb4_unicode_ci,
  `equipment_ordered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_cost_center` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `salaried` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `casual_holiday_pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p45` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_pack_sent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_1_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_1_ph_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_1_home_ph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_1_relation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_2_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_2_ph_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_2_home_ph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_2_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_form_to_payroll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `first_name`, `middle_name`, `surname`, `preferred_name`, `role`, `email`, `password`, `address1`, `address2`, `address3`, `town`, `post_code`, `mobile_tel`, `home_tel`, `dob`, `age`, `gender`, `ethnicity`, `disability`, `ni_number`, `commencement_date`, `contracted_from_date`, `termination_date`, `reason_termination`, `handbook_sent`, `medical_form_returned`, `new_entrant_form_returned`, `confidentiality_statement_returned`, `work_document_received`, `qualifications_checked`, `references_requested`, `references_returned`, `payroll_informed`, `probation_complete`, `equipment_required`, `equipment_ordered`, `default_cost_center`, `salaried`, `casual_holiday_pay`, `p45`, `employee_pack_sent`, `emergency_1_name`, `emergency_1_ph_no`, `emergency_1_home_ph`, `emergency_1_relation`, `emergency_2_name`, `emergency_2_ph_no`, `emergency_2_home_ph`, `emergency_2_relation`, `termination_form_to_payroll`, `notes`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'active', 'Softic', 'Era', 'Admin', '', 'super_admin', 'admin@softicera.com', '$2y$10$7UYpyKjnMKx56py..nfb5ehzrFlatFgvTUxl07FuXrYTqmSwKSxT.', 'Jinnah Colony It Tower 2', '', '', '', '', '21123231321', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, '2024-12-17 10:17:44', '2024-12-19 07:14:43'),
(2, 'active', 'Emerald', NULL, 'Little', 'Carolyn Compton', 'admin', 'kudijopico@mailinator.com', '$2y$10$qOn2UNNDaLr6l5o7wt2o7e.V7oJDOcQmF2qF.ea4vPMrf2Xp.SwqS', '72 West Green Oak Parkway', NULL, NULL, 'Consequat Quos aliq', 'Cupiditate ipsam id', NULL, NULL, 'Minus asperiores qua', '88', 'other', 'Mixed White and Black African', NULL, '638', '21-Aug-1998', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Saepe qui iste et ea', 'Doloremque et nobis', NULL, NULL, NULL, 'Graham Hale', '51', NULL, 'Incididunt nihil acc', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-19 07:09:56', '2024-12-19 07:09:56'),
(3, 'active', 'Kenneth', 'Phyllis Barber', 'Sparks', 'Kalia Sheppard', 'employee', 'buhezagidi@mailinator.com', 'Pa$$w0rd!', '830 East First Drive', 'Facilis eligendi qui', 'Voluptatem Eveniet', 'Obcaecati saepe quis', 'Laborum ut accusanti', 'Aliquid adipisci neq', 'Mollit vel unde corp', 'Quia proident volup', '44', 'other', 'Black or Black British Caribbean', 'no', '196', '20-May-1981', '17-Mar-1987', '16-Jun-1990', 'Laborum qui magnam n', 'yes', 'yes', 'no', 'no', 'no', 'yes', 'no', 'yes', 'no', 'not_required', 'phone', 'other', 'Exercitation minus q', 'Mollit excepteur nul', '9', 'no', 'yes', 'Heidi Norton', '34', '24', 'Libero rerum eligend', 'Scarlett Adams', '26', '100', 'Id quam exercitatio', 'no', 'Delectus ad sint q', NULL, NULL, '2024-12-19 07:10:24', '2024-12-19 07:12:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auths`
--
ALTER TABLE `auths`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capabilities`
--
ALTER TABLE `capabilities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `capabilities_user_id_foreign` (`user_id`);

--
-- Indexes for table `disciplinaries`
--
ALTER TABLE `disciplinaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disciplinaries_user_id_foreign` (`user_id`);

--
-- Indexes for table `disclosures`
--
ALTER TABLE `disclosures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `disclosures_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `latenesses`
--
ALTER TABLE `latenesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `latenesses_user_id_foreign` (`user_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `logs_admin_id_foreign` (`admin_id`),
  ADD KEY `logs_user_id_foreign` (`user_id`);

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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sicknesses`
--
ALTER TABLE `sicknesses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sicknesses_user_id_foreign` (`user_id`);

--
-- Indexes for table `trainings`
--
ALTER TABLE `trainings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trainings_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_ni_number_unique` (`ni_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auths`
--
ALTER TABLE `auths`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `capabilities`
--
ALTER TABLE `capabilities`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disciplinaries`
--
ALTER TABLE `disciplinaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `disclosures`
--
ALTER TABLE `disclosures`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `latenesses`
--
ALTER TABLE `latenesses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sicknesses`
--
ALTER TABLE `sicknesses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `trainings`
--
ALTER TABLE `trainings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `capabilities`
--
ALTER TABLE `capabilities`
  ADD CONSTRAINT `capabilities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `disciplinaries`
--
ALTER TABLE `disciplinaries`
  ADD CONSTRAINT `disciplinaries_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `disclosures`
--
ALTER TABLE `disclosures`
  ADD CONSTRAINT `disclosures_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `latenesses`
--
ALTER TABLE `latenesses`
  ADD CONSTRAINT `latenesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `logs`
--
ALTER TABLE `logs`
  ADD CONSTRAINT `logs_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sicknesses`
--
ALTER TABLE `sicknesses`
  ADD CONSTRAINT `sicknesses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `trainings`
--
ALTER TABLE `trainings`
  ADD CONSTRAINT `trainings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
