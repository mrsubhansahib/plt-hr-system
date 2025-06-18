-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 13, 2025 at 02:05 PM
-- Server version: 8.0.30
-- PHP Version: 8.3.14

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
  `on_capability_procedure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outcome` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warning_issued_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `review_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
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
  `reason_for_disciplinary` text COLLATE utf8mb4_unicode_ci,
  `hearing_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `outcome` text COLLATE utf8mb4_unicode_ci,
  `suspended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_suspended` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
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
  `date_on_certificate` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certificate_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` bigint UNSIGNED NOT NULL,
  `template_id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `dropdowns`
--

CREATE TABLE `dropdowns` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `module_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dropdowns`
--

INSERT INTO `dropdowns` (`id`, `user_id`, `module_type`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 1, 'User', 'Ethnicity', 'White British', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(2, 1, 'User', 'Ethnicity', 'White Irish', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(3, 1, 'User', 'Ethnicity', 'White Other', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(4, 1, 'User', 'Ethnicity', 'Mixed White and Black Caribbean', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(5, 1, 'User', 'Ethnicity', 'Mixed White and Black African', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(6, 1, 'User', 'Ethnicity', 'Mixed White and Asian', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(7, 1, 'User', 'Ethnicity', 'Mixed Other Background', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(8, 1, 'User', 'Ethnicity', 'Asian or Asian British Indian', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(9, 1, 'User', 'Ethnicity', 'Asian or Asian British Pakistani', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(10, 1, 'User', 'Ethnicity', 'Asian or Asian British Bangladeshi', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(11, 1, 'User', 'Ethnicity', 'Asian or Asian British Kashmiri', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(12, 1, 'User', 'Ethnicity', 'Asian or Asian British Other', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(13, 1, 'User', 'Ethnicity', 'Black or Black British Caribbean', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(14, 1, 'User', 'Ethnicity', 'Black or Black British African', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(15, 1, 'User', 'Ethnicity', 'Black or Black British Other', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(16, 1, 'User', 'Ethnicity', 'Chinese', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(17, 1, 'User', 'Ethnicity', 'Other Ethnic Group', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(18, 1, 'Job', 'Facility', 'No 1 Market Street', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(19, 1, 'Job', 'Facility', 'Profile Leisure Centre', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(20, 1, 'Job', 'Facility', 'Pendle Wavelengths', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(21, 1, 'Job', 'Facility', 'West Point Sports Centre', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(22, 1, 'Job', 'Facility', 'The Muni', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(23, 1, 'Job', 'Facility', 'Seedhill Athletics and Fitness Centre', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(24, 1, 'Job', 'Facility', 'Inside Spa', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(25, 1, 'Job', 'Facility', 'Good Life', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(26, 1, 'Job', 'Facility', 'All Facilities', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(27, 1, 'Job', 'Title', 'Activo Administration Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(28, 1, 'Job', 'Title', 'Administration Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(29, 1, 'Job', 'Title', 'Administration Assistant Senior', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(30, 1, 'Job', 'Title', 'Administration Assistant/Wages Clerk (REC)', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(31, 1, 'Job', 'Title', 'Allotment Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(32, 1, 'Job', 'Title', 'Allotment Development Worker', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(33, 1, 'Job', 'Title', 'Aquarhythmics Teacher', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(34, 1, 'Job', 'Title', 'Assistant Finance Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(35, 1, 'Job', 'Title', 'Assistant Theatre Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(36, 1, 'Job', 'Title', 'Bar and Catering Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(37, 1, 'Job', 'Title', 'Bar Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(38, 1, 'Job', 'Title', 'Bar Supervisor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(39, 1, 'Job', 'Title', 'Box Office / Information Sales Co-Ordinator', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(40, 1, 'Job', 'Title', 'Business Development Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(41, 1, 'Job', 'Title', 'Catering Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(42, 1, 'Job', 'Title', 'Catering Supervisor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(43, 1, 'Job', 'Title', 'Centre Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(44, 1, 'Job', 'Title', 'Chief Executive', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(45, 1, 'Job', 'Title', 'Cleaner', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(46, 1, 'Job', 'Title', 'Course Co-ordinator', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(47, 1, 'Job', 'Title', 'Credit Controller / Finance Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(48, 1, 'Job', 'Title', 'Customer Focus Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(49, 1, 'Job', 'Title', 'Digital Content Co-ordinator', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(50, 1, 'Job', 'Title', 'Executive Manager (Finance)', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(51, 1, 'Job', 'Title', 'Executive Manager (Human Resources)', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(52, 1, 'Job', 'Title', 'Feelgood Suite Instructor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(53, 1, 'Job', 'Title', 'Fitness / Class Instructor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(54, 1, 'Job', 'Title', 'Fitness Class Instructor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(55, 1, 'Job', 'Title', 'Fitness Instructor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(56, 1, 'Job', 'Title', 'Front of House Supervisor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(57, 1, 'Job', 'Title', 'Grant Funding/Administration Manager/PA', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(58, 1, 'Job', 'Title', 'Graphic Designer', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(59, 1, 'Job', 'Title', 'Gym Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(60, 1, 'Job', 'Title', 'Hallkeeper', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(61, 1, 'Job', 'Title', 'Health Activator', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(62, 1, 'Job', 'Title', 'Healthy Weight Coach', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(63, 1, 'Job', 'Title', 'Healthy Weight Co-ordinator', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(64, 1, 'Job', 'Title', 'Leisure Attendant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(65, 1, 'Job', 'Title', 'Marketing Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(66, 1, 'Job', 'Title', 'Marketing Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(67, 1, 'Job', 'Title', 'Operations Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(68, 1, 'Job', 'Title', 'Personal Training Instructor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(69, 1, 'Job', 'Title', 'Pinpoint Trainer', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(70, 1, 'Job', 'Title', 'Receptionist', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(71, 1, 'Job', 'Title', 'Relief Assistant Customer Focus Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(72, 1, 'Job', 'Title', 'Relief Customer Focus Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(73, 1, 'Job', 'Title', 'Repair and Maintenance Operative', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(74, 1, 'Job', 'Title', 'Seedhill Supervisor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(75, 1, 'Job', 'Title', 'Senior Spa Therapist', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(76, 1, 'Job', 'Title', 'Senior Usher', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(77, 1, 'Job', 'Title', 'Site Supervisor', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(78, 1, 'Job', 'Title', 'Spa Customer Focus Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(79, 1, 'Job', 'Title', 'Spa Receptionist', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(80, 1, 'Job', 'Title', 'Spa Therapist', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(81, 1, 'Job', 'Title', 'Stage Technician', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(82, 1, 'Job', 'Title', 'Swimming Teacher', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(83, 1, 'Job', 'Title', 'Swimming Teacher Administration', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(84, 1, 'Job', 'Title', 'Swimming Teacher Co-ordinator', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(85, 1, 'Job', 'Title', 'Technical Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(86, 1, 'Job', 'Title', 'Theatre Manager', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(87, 1, 'Job', 'Title', 'Usher', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(88, 1, 'Job', 'Title', 'Wages Assistant', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(89, 1, 'Job', 'Contract Type', 'Permanent', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(90, 1, 'Job', 'Contract Type', 'Casual', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(91, 1, 'Job', 'Contract Type', 'Fixed Term', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(92, 1, 'Job', 'Contract Type', 'Temporary', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(93, 1, 'Job', 'Contract Type', 'Permanent Variable', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(94, 1, 'Capability', 'Capability Stage', 'Triggered Capability', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(95, 1, 'Capability', 'Capability Stage', 'Capability A Counselling Interview', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(96, 1, 'Capability', 'Capability Stage', 'Restart Capability Procedure', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(97, 1, 'Capability', 'Capability Stage', 'Further Sikness', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(98, 1, 'Capability', 'Capability Stage', 'Long Term Sickness Counselling Interview', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(99, 1, 'Capability', 'Capability Stage', 'Long Term Sickness Review', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(100, 1, 'Capability', 'Capability Stage', 'Capability Formal Interview', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(101, 1, 'Capability', 'Capability Stage', 'Other', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(102, 1, 'Lateness', 'Lateness Stage', 'Triggered Lateness', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(103, 1, 'Lateness', 'Lateness Stage', 'Lateness A Counselling Interview', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(104, 1, 'Lateness', 'Lateness Stage', 'Restart Lateness Procedure', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(105, 1, 'Lateness', 'Lateness Stage', 'Further Lateness', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(106, 1, 'Lateness', 'Lateness Stage', 'Lateness Formal Interview', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(107, 1, 'Lateness', 'Lateness Stage', 'Other', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(108, 1, 'Training', 'Training Course Titles', 'NPLQ', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(109, 1, 'Training', 'Training Course Titles', 'NPLQ Renewal', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(110, 1, 'Training', 'Training Course Titles', 'FAAW', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(111, 1, 'Training', 'Training Course Titles', 'FAAW Renewal', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(112, 1, 'Training', 'Training Course Titles', 'Emergency First Aid', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(113, 1, 'Training', 'Training Course Titles', 'Monthly Staff Training', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(114, 1, 'Training', 'Training Course Titles', 'Emergency Response', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(115, 1, 'Training', 'Training Course Titles', 'Pool Plant Operators', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(116, 1, 'Training', 'Training Course Titles', 'Ladder and Steps Inspection Training', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(117, 1, 'Training', 'Training Course Titles', 'iHasco allocated modules', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(118, 1, 'Training', 'Training Course Titles', 'IOSH Managing Safely', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(119, 1, 'Training', 'Training Course Titles', 'Swimming Teaching Course', '2025-06-13 04:04:42', '2025-06-13 04:04:42'),
(120, 1, 'Training', 'Training Course Titles', 'Other', '2025-06-13 04:04:42', '2025-06-13 04:04:42');

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
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `main_job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `facility` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost_center` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `start_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate_of_pay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pay_frequency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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

-- --------------------------------------------------------

--
-- Table structure for table `latenesses`
--

CREATE TABLE `latenesses` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `lateness_triggered` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lateness_stage` text COLLATE utf8mb4_unicode_ci,
  `warning_level` text COLLATE utf8mb4_unicode_ci,
  `outcome` text COLLATE utf8mb4_unicode_ci,
  `review_date` text COLLATE utf8mb4_unicode_ci,
  `notes` text COLLATE utf8mb4_unicode_ci,
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
(13, '2024_12_18_113234_create_logs_table', 1),
(14, '2024_12_24_102349_create_dropdown-table', 1),
(15, '2025_02_13_083714_create_notes_table', 1),
(16, '2025_04_15_142925_create_templates_table', 1),
(17, '2025_04_15_153115_create_documents_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `admin_id` bigint UNSIGNED NOT NULL,
  `module_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `module_id` bigint UNSIGNED NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `date_to` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_hours` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `certification_form_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fit_note_received` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_info` tinyint(1) NOT NULL DEFAULT '0',
  `job_info` tinyint(1) NOT NULL DEFAULT '0',
  `disclosure_info` tinyint(1) NOT NULL DEFAULT '0',
  `sickness_info` tinyint(1) NOT NULL DEFAULT '0',
  `capability_info` tinyint(1) NOT NULL DEFAULT '0',
  `disciplinary_info` tinyint(1) NOT NULL DEFAULT '0',
  `lateness_info` tinyint(1) NOT NULL DEFAULT '0',
  `training_info` tinyint(1) NOT NULL DEFAULT '0',
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
  `training_title` text COLLATE utf8mb4_unicode_ci,
  `course_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `renewal_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
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
  `joined_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `left_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `preferred_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'employee',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `age` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ethnicity` text COLLATE utf8mb4_unicode_ci,
  `disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ni_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `commencement_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
  `default_cost_center` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salaried` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `casual_holiday_pay` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p45` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_pack_sent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_1_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_1_ph_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_1_home_ph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_1_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_2_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_2_ph_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_2_home_ph` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_2_relation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `termination_form_to_payroll` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `ihasco_training_sent` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ihasco_training_complete` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `status`, `first_name`, `middle_name`, `surname`, `joined_date`, `left_date`, `preferred_name`, `role`, `email`, `password`, `address1`, `address2`, `address3`, `town`, `post_code`, `mobile_tel`, `home_tel`, `dob`, `age`, `gender`, `ethnicity`, `disability`, `ni_number`, `commencement_date`, `contracted_from_date`, `termination_date`, `reason_termination`, `handbook_sent`, `medical_form_returned`, `new_entrant_form_returned`, `confidentiality_statement_returned`, `work_document_received`, `qualifications_checked`, `references_requested`, `references_returned`, `payroll_informed`, `probation_complete`, `equipment_required`, `equipment_ordered`, `default_cost_center`, `salaried`, `casual_holiday_pay`, `p45`, `employee_pack_sent`, `emergency_1_name`, `emergency_1_ph_no`, `emergency_1_home_ph`, `emergency_1_relation`, `emergency_2_name`, `emergency_2_ph_no`, `emergency_2_home_ph`, `emergency_2_relation`, `termination_form_to_payroll`, `notes`, `email_verified_at`, `ihasco_training_sent`, `ihasco_training_complete`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'active', 'Thumbs Up', 'Digital', 'Admin', NULL, NULL, '', 'super_admin', 'admin@thumbsupdigital.com', '$2y$10$59be5wNnq1W6I31ymrNnX.8ByE0zVI/cie2twJs8QRf.TK8J2aBZK', 'Jinnah Colony It Tower 2', '', '', '', '', '00000000000', '00000000000', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', NULL, NULL, NULL, NULL, '2025-06-13 04:04:42', '2025-06-13 04:04:42');

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
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documents_template_id_foreign` (`template_id`),
  ADD KEY `documents_user_id_foreign` (`user_id`);

--
-- Indexes for table `dropdowns`
--
ALTER TABLE `dropdowns`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dropdowns_user_id_foreign` (`user_id`);

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
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notes_user_id_foreign` (`user_id`),
  ADD KEY `notes_admin_id_foreign` (`admin_id`);

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
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `dropdowns`
--
ALTER TABLE `dropdowns`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latenesses`
--
ALTER TABLE `latenesses`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

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
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_template_id_foreign` FOREIGN KEY (`template_id`) REFERENCES `templates` (`id`),
  ADD CONSTRAINT `documents_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `dropdowns`
--
ALTER TABLE `dropdowns`
  ADD CONSTRAINT `dropdowns_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_admin_id_foreign` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

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
