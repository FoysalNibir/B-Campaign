-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2018 at 02:21 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcampaign`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `title` varchar(750) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `constituency_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `circulations`
--

CREATE TABLE `circulations` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `title` varchar(750) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(750) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `engagements` int(11) NOT NULL,
  `comments` int(11) NOT NULL,
  `reach` int(11) NOT NULL,
  `likes` int(11) NOT NULL,
  `shares` int(11) NOT NULL,
  `constituency_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `constituencies`
--

CREATE TABLE `constituencies` (
  `id` int(11) NOT NULL,
  `name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remark` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `rp_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `op_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `det_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `constituencies`
--

INSERT INTO `constituencies` (`id`, `name`, `remark`, `rp_name`, `op_name`, `det_id`, `created_at`, `updated_at`) VALUES
(1, 'Example Edit', 'Example Constituency remark edit', 'BAL', 'BNP', 2, '2018-09-19 06:55:06', '2018-09-19 00:55:06');

-- --------------------------------------------------------

--
-- Table structure for table `dets`
--

CREATE TABLE `dets` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `remark` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dets`
--

INSERT INTO `dets` (`id`, `name`, `remark`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 'Example DET name', 'Example remark', 13, '2018-09-19 11:32:42', '2018-09-17 23:52:00'),
(3, 'Example DET name 2', 'Example remark 2', 12, '2018-09-19 11:32:42', '2018-09-17 23:52:00');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `caption` varchar(750) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `constituency_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `date`, `time`, `caption`, `image`, `constituency_id`, `created_at`, `updated_at`) VALUES
(1, '2018-09-13', '02:03:00', 'aaaaaaaaaa', 'storage\\production\\images\\Pohela-Boishakh.jpg', 1, '2018-09-18 01:56:32', '2018-09-18 01:56:32'),
(2, '2018-09-10', '02:03:00', 'example caption', 'storage\\production\\images\\image-1537346085.jpg', 1, '2018-09-19 08:34:45', '2018-09-19 02:34:45');

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
(3, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(4, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(5, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(6, '2016_06_01_000004_create_oauth_clients_table', 1),
(7, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('797ebcd1848d5f4ec5b042cc42705bfb769d4ff40fac1b3f8cd0fa1c5fc17f7d8afe6a81995ef120', 12, 1, 'bcampaign', '[]', 0, '2018-09-19 04:07:08', '2018-09-19 04:07:08', '2019-09-19 10:07:08'),
('96b2fa43fca620b3a72352f095e4e32bb62738fde61a8d07042ffde6fed3fca98eeb3ad0c99e29e5', 1, 1, 'MyApp', '[]', 0, '2018-09-18 23:12:52', '2018-09-18 23:12:52', '2019-09-19 05:12:52'),
('a967da9cba79933222424ffe70c46f222717bda51d7c9680df7b66b7ab0f23bda733dc83125e4eb9', 1, 1, 'bcampaign', '[]', 0, '2018-09-18 23:27:08', '2018-09-18 23:27:08', '2019-09-19 05:27:08'),
('d7c4acf1d282740bd373db1d209eb52fc6d9838900d24d2845c7465d23accd54c50ec27d9517b2b0', 13, 1, 'bcampaign', '[]', 0, '2018-09-19 05:17:53', '2018-09-19 05:17:53', '2019-09-19 11:17:53'),
('ddd3f4f5728b69330a82847cbada701014209f250e38c3b4d448f6f07aef2332b14db591bf4f7ce8', 1, 1, 'MyApp', '[]', 0, '2018-09-18 23:01:35', '2018-09-18 23:01:35', '2019-09-19 05:01:35'),
('f6e9cd6f3f3664b77548be90ca9bbe8e8389a65f26bae3a48e1a42d636805b6c3e9db7f439927bd0', 14, 1, 'bcampaign', '[]', 0, '2018-09-19 04:59:54', '2018-09-19 04:59:54', '2019-09-19 10:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', '6wljpWaV5mz1y95ZF3z78jGBozpRtSkklU2Q7krs', 'http://localhost', 1, 0, 0, '2018-09-17 01:03:52', '2018-09-17 01:03:52'),
(2, NULL, 'Laravel Password Grant Client', 'r1aFBq0AAyTGDwB5K69ETgZffWvn1NIeKrQWgoaD', 'http://localhost', 0, 1, 0, '2018-09-17 01:03:52', '2018-09-17 01:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-09-17 01:03:52', '2018-09-17 01:03:52');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(500) NOT NULL,
  `display_name` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Super Admin', '2018-09-17 07:14:03', '0000-00-00 00:00:00'),
(2, 'hqcommander', 'HQ Commander', '2018-09-17 07:15:58', '0000-00-00 00:00:00'),
(3, 'md', 'Managing Director', '2018-09-17 07:15:58', '0000-00-00 00:00:00'),
(4, 'detcommander', 'DET Commander', '2018-09-19 09:41:57', '0000-00-00 00:00:00'),
(5, 'detmanager', 'DET Manager', '2018-09-19 10:08:22', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `threats`
--

CREATE TABLE `threats` (
  `id` int(11) NOT NULL,
  `title` varchar(750) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `link` varchar(500) NOT NULL,
  `constituency_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `threats`
--

INSERT INTO `threats` (`id`, `title`, `date`, `time`, `description`, `level`, `link`, `constituency_id`, `created_at`, `updated_at`) VALUES
(1, 'যশোরের শার্শা থেকে সাদা পোশাকে তুলে নেয়ার একদিন পর দুই উপজেলায় মিললো দুই ভাইয়ের গুলিবিদ্ধ লাশ', '2018-09-18', '02:03:00', 'যশোরের শার্শা থেকে সাদা পোশাকে তুলে নেয়ার একদিন পর দুই উপজেলায় মিললো দুই ভাইয়ের গুলিবিদ্ধ লাশ। রোববার সকালে লাশ দুটি উদ্ধার করে যশোর ২৫০ শয্যা জেনারেল হাসপাতালে মর্গে পাঠায় পুলিশ।\r\n\r\nনিহতরা হলেন শার্শা উপজেলার জামতলা সামটা গ্রামের জেহের আলীর দুই ছেলে আজিজুল (৪০) ও ফারুক (৫০)।\r\n\r\nআজিজুল শার্শায় দুই দল মাদক ব্যবসায়ীর বন্দুকযুদ্ধে নিহত হয়েছে বলে জানিয়েছে পুলিশ। আর কেশবপুরে ফারুকের গুলিবিদ্ধ লাশ অজ্ঞাত হিসেবে উদ্ধার করে পুলিশ। ', 3, 'https://www.facebook.com/theRevolution.bangla/photos/a.419862848097914/1818681418216043/?type=3&__xts__%5B0%5D=68.ARCtw9YdChvajj3DWyknXugEhWBgC398Jww6PPMqSC3ryR2qIpuXESgWvMUqeQeAB79IjGCZ3fPyCZqFRP2pAi51-SsLPScaHD3fPI3ZUNc7wNNkAu_KrgS7odGwffrJ8p_Y_ssJRyYgelWjRLrsuPuIyP6SylqdedLU-55-WwccwrmTXoStuw&__tn__=-R', 1, '2018-09-18 12:00:37', '0000-00-00 00:00:00'),
(2, 'example title edit', '2018-09-10', '02:03:00', 'example description edit', 4, 'https://www.facebook.com/theRevolution.bangla/photos/a.419862848097914/1818681418216043/?type=3&__xts__%5B0%5D=68.ARCtw9YdChvajj3DWyknXugEhWBgC398Jww6PPMqSC3ryR2qIpuXESgWvMUqeQeAB79IjGCZ3fPyCZqFRP2pAi51-SsLPScaHD3fPI3ZUNc7wNNkAu_KrgS7odGwffrJ8p_Y_ssJRyYgelWjRLrsuPuIyP6SylqdedLU-55-WwccwrmTXoStuw&__tn__=-R', 1, '2018-09-19 09:23:32', '2018-09-19 03:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'users/default.png',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `password`, `remember_token`, `avatar`, `created_at`, `updated_at`) VALUES
(1, 1, 'Foysal', 'nibir2k12@gmail.com', '$2y$12$.RHkJjGRiuBdHupGBCZB9uchAI2X5FwjaNnllxr7/lpL2iSxpVgma', '1OoG2KEL0pGm2DrrHZuhARd9N5s3oy3nGwNWVd5PG9oWjKybayBwEdBSpAk6', '', NULL, NULL),
(11, 2, 'Zahan', 'safallwa@gmail.com', '$2y$10$6V/z0mrihDYRt4sZadNFnu6fNy0SkTPy6IC5KeycPk2pTQQQ/N0ge', NULL, 'storage\\photos\\users\\zahan.jpg', '2018-09-17 05:08:49', '2018-09-17 05:08:49'),
(12, 3, 'Munim', 'munim@gmail.com', '$2y$10$IaMJ5pWrP3RBYmpqKK9Wie3yeTb.YUGMrJ4tH8HqqLkUlmTAiLijO', NULL, 'users/default.png', '2018-09-18 23:40:35', '2018-09-18 23:40:35'),
(13, 4, 'Munim munna', 'munna@gmail.com', '$2y$10$IaMJ5pWrP3RBYmpqKK9Wie3yeTb.YUGMrJ4tH8HqqLkUlmTAiLijO', NULL, 'users/default.png', '2018-09-18 23:40:35', '2018-09-18 23:40:35'),
(14, 5, 'munna', 'mmunna@gmail.com', '$2y$10$IaMJ5pWrP3RBYmpqKK9Wie3yeTb.YUGMrJ4tH8HqqLkUlmTAiLijO', NULL, 'users/default.png', '2018-09-18 23:40:35', '2018-09-18 23:40:35');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `caption` varchar(750) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `video` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `constituency_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`id`, `date`, `time`, `caption`, `video`, `constituency_id`, `created_at`, `updated_at`) VALUES
(1, '2018-09-10', '02:03:00', 'example caption', 'storage\\production\\videos\\video-1537347511.mp4', 1, '2018-09-19 08:58:31', '2018-09-19 02:58:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `circulations`
--
ALTER TABLE `circulations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `constituencies`
--
ALTER TABLE `constituencies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dets`
--
ALTER TABLE `dets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `threats`
--
ALTER TABLE `threats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `circulations`
--
ALTER TABLE `circulations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `constituencies`
--
ALTER TABLE `constituencies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dets`
--
ALTER TABLE `dets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `threats`
--
ALTER TABLE `threats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
