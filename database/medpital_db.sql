-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2024 at 06:41 PM
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
-- Database: `medpital_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `analyses`
--

CREATE TABLE `analyses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `analyses`
--

INSERT INTO `analyses` (`id`, `name`, `description`) VALUES
(1, 'CT scan', 'A CT (computed tomography) scan is a type of x-ray that creates 3-dimensional images of your body, including bones, organs, tissues and tumours. The machine moves in a circular motion around you and takes x-rays of very thin slices of your body to create a cross-sectional image.'),
(2, 'Electrocardiogram (ECG)', 'An ECG is a graph of your heart\'s electrical activity. It is a safe test. There is no risk of being electrocuted.'),
(3, 'Magnetic Resonance Imaging (MRI) Scan', 'A magnetic resonance imaging (MRI) scan takes detailed pictures of the inside of the body. It can show up problems in the soft tissues without the need for surgery. It is also useful for planning some treatments of the same areas.'),
(4, 'X-Rays', 'An x-ray uses radiation to create a picture of the inside of the body. The x-ray beam is absorbed differently by various structures in the body, such as bones and soft tissues, and this is used to create the image. X-ray is also known as radiography.'),
(5, 'Ultrasound', 'An ultrasound scan creates a real-time picture of the inside of the body using sound waves. Ultrasound is generally painless and non-invasive. Ultrasound works differently to x-ray in that it does not use radiation.');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `schedule` datetime NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `institution_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `code`, `schedule`, `patient_id`, `prescription_id`, `institution_id`, `status`, `created_at`, `updated_at`) VALUES
(1, '20240327-140715', '2024-03-01 14:07:00', 1, 1, 1, '0', '2024-03-27 13:07:20', '2024-03-27 13:07:20');

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
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(80) NOT NULL,
  `location` varchar(255) NOT NULL,
  `opening` varchar(100) NOT NULL,
  `closing` varchar(100) DEFAULT NULL,
  `work_days` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institutions`
--

INSERT INTO `institutions` (`id`, `name`, `location`, `opening`, `closing`, `work_days`, `created_at`, `updated_at`) VALUES
(1, 'Laboratoire d\'analyses médicales Absi', 'Rue Nguyen van troy', 'Open 24 hours', NULL, '7 days a week', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `institution_analyses`
--

CREATE TABLE `institution_analyses` (
  `institution_id` int(10) UNSIGNED NOT NULL,
  `analyse_id` int(10) UNSIGNED NOT NULL,
  `cost` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `institution_analyses`
--

INSERT INTO `institution_analyses` (`institution_id`, `analyse_id`, `cost`) VALUES
(1, 1, '5000'),
(1, 3, '2000'),
(1, 4, '2000'),
(1, 5, '5800');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
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
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_11_16_190036_create_institutions_table', 1),
(6, '2023_11_16_190038_create_users_types_table', 1),
(7, '2023_11_16_190039_create_users_table', 1),
(8, '2023_11_18_092507_create_prescriptions_table', 1),
(9, '2023_11_30_210150_create_prices_table', 1),
(10, '2023_12_07_234717_create_jobs_table', 1),
(11, '2023_12_11_001454_create_analyses_table', 1),
(12, '2023_12_11_001651_create_prescription_analyses_table', 1),
(13, '2023_12_11_001826_create_institution_analyses_table', 1),
(14, '2024_01_17_215219_create_appointments_table', 1);

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
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `patient_id` int(10) UNSIGNED NOT NULL,
  `institution_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `patient_id`, `institution_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '1', '2024-01-11 22:27:44', '2024-03-27 13:07:20'),
(2, 1, 1, '0', '2024-01-11 22:27:44', '2024-01-11 22:27:44'),
(3, 1, 1, '0', '2024-01-11 22:27:44', '2024-01-11 22:27:44');

-- --------------------------------------------------------

--
-- Table structure for table `prescription_analyses`
--

CREATE TABLE `prescription_analyses` (
  `prescription_id` int(10) UNSIGNED NOT NULL,
  `analyse_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescription_analyses`
--

INSERT INTO `prescription_analyses` (`prescription_id`, `analyse_id`) VALUES
(1, 1),
(1, 3),
(1, 4),
(2, 3),
(3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` int(10) UNSIGNED NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `institution_id` int(10) UNSIGNED NOT NULL,
  `price` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_card_number` varchar(255) NOT NULL,
  `id_card_file` varchar(255) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `phone` varchar(13) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(2) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `institution_id` int(10) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `ac_status` varchar(2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_card_number`, `id_card_file`, `name`, `date_of_birth`, `phone`, `address`, `gender`, `email`, `user_type_id`, `institution_id`, `email_verified_at`, `password`, `remember_token`, `ac_status`, `created_at`, `updated_at`) VALUES
(1, '35245324635', NULL, 'admin', NULL, '0541866503', 'Bechar - debdaba - Rue de Amir abdelkader', NULL, 'admin@gmail.com', 4, NULL, NULL, '$2y$10$4fuBv9NQvKMwHVIu/3CFN.PZ22xzJbSZRyolvKgZgrqelKd6nm7SK', 'CiN9UWsRhoJkqOIeqv6CCjqPZHw8yUzqNRJ3Sc3BcXfpZEtBL51XQAVHSNza', '1', '2023-06-09 21:25:09', '2023-06-09 21:25:09'),
(2, '984620376523', NULL, 'patient', '2000-11-23', '0641866508', 'Bechar - debdaba - Rue de Amir abdelkader', '2', 'patient@gmail.com', 1, NULL, NULL, '$2y$10$6n65YpIPIPteRX1WcJPJE.nR6JlRrZ/jAHn/lMYwcG/NEB/XyU41u', 'yyZk5KhyQLxcnHWbCpHlqkbvnK6RGYHofeMhGEtFIUkaVxlwnEGg0IEgbzSc', '1', '2023-06-09 21:25:09', '2023-06-09 21:25:09'),
(3, '2352689756892', NULL, 'laboratorian', NULL, '0541866708', 'Bechar - debdaba - Rue de Amir abdelkader', NULL, 'lab@gmail.com', 3, 1, NULL, '$2y$10$G7sSMJo3cix7NHuwZPkaIOtcehI2HUPK3E62Hflin4ZDr5jQB8wfu', 'Qwu0O6glA1LFynoyIckw6g6QXYdUXAM3gCUvK364fO63ADPRqsCRbYigFd0j', '1', '2023-06-09 21:25:09', '2023-06-09 21:25:09');

-- --------------------------------------------------------

--
-- Table structure for table `users_types`
--

CREATE TABLE `users_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_types`
--

INSERT INTO `users_types` (`id`, `name`) VALUES
(2, 'admin'),
(3, 'laboratorian'),
(1, 'patient'),
(4, 'super-admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `analyses`
--
ALTER TABLE `analyses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `appointments_code_unique` (`code`),
  ADD KEY `appointments_patient_id_foreign` (`patient_id`),
  ADD KEY `appointments_prescription_id_foreign` (`prescription_id`),
  ADD KEY `appointments_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `institution_analyses`
--
ALTER TABLE `institution_analyses`
  ADD KEY `institution_analyses_institution_id_foreign` (`institution_id`),
  ADD KEY `institution_analyses_analyse_id_foreign` (`analyse_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prescriptions_patient_id_foreign` (`patient_id`),
  ADD KEY `prescriptions_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `prescription_analyses`
--
ALTER TABLE `prescription_analyses`
  ADD KEY `prescription_analyses_prescription_id_foreign` (`prescription_id`),
  ADD KEY `prescription_analyses_analyse_id_foreign` (`analyse_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `prices_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_id_card_number_unique` (`id_card_number`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_id_foreign` (`user_type_id`),
  ADD KEY `users_institution_id_foreign` (`institution_id`);

--
-- Indexes for table `users_types`
--
ALTER TABLE `users_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_types_name_unique` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `analyses`
--
ALTER TABLE `analyses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users_types`
--
ALTER TABLE `users_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `appointments_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `institution_analyses`
--
ALTER TABLE `institution_analyses`
  ADD CONSTRAINT `institution_analyses_analyse_id_foreign` FOREIGN KEY (`analyse_id`) REFERENCES `analyses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `institution_analyses_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD CONSTRAINT `prescriptions_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescriptions_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prescription_analyses`
--
ALTER TABLE `prescription_analyses`
  ADD CONSTRAINT `prescription_analyses_analyse_id_foreign` FOREIGN KEY (`analyse_id`) REFERENCES `analyses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `prescription_analyses_prescription_id_foreign` FOREIGN KEY (`prescription_id`) REFERENCES `prescriptions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `prices`
--
ALTER TABLE `prices`
  ADD CONSTRAINT `prices_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_institution_id_foreign` FOREIGN KEY (`institution_id`) REFERENCES `institutions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_user_type_id_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `users_types` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
