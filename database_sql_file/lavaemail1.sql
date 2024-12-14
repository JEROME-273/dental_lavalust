-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 14, 2024 at 05:35 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lavaemail1`
--

-- --------------------------------------------------------

--
-- Table structure for table `flashcards`
--

CREATE TABLE `flashcards` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('draft','posted') COLLATE utf8mb4_general_ci DEFAULT 'draft'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flashcards`
--

INSERT INTO `flashcards` (`id`, `user_id`, `category`, `title`, `created_at`, `status`) VALUES
(19, 33, 'Soc Sci 114', 'dsada', '2024-12-11 06:44:27', 'draft'),
(20, 33, 'ITC 311', 'hello', '2024-12-11 07:32:23', 'posted'),
(21, 33, 'ITP 311', 'KIEN ABNOY', '2024-12-11 09:12:23', 'posted'),
(22, 33, 'ITP 311', 'Cisco', '2024-12-11 11:50:15', 'posted');

-- --------------------------------------------------------

--
-- Table structure for table `flashcard_items`
--

CREATE TABLE `flashcard_items` (
  `id` int NOT NULL,
  `flashcard_id` int NOT NULL,
  `question` text COLLATE utf8mb4_general_ci NOT NULL,
  `answer` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `flashcard_items`
--

INSERT INTO `flashcard_items` (`id`, `flashcard_id`, `question`, `answer`, `created_at`) VALUES
(36, 19, 'das', 'das', '2024-12-11 06:44:45'),
(37, 19, 'das', 'asas', '2024-12-11 06:44:45'),
(38, 20, 'ddsa', 'das', '2024-12-11 07:32:29'),
(39, 21, 'WILL U BE MY VALENTINE?', 'HELLO', '2024-12-11 09:13:00'),
(42, 22, 'Sino panget', 'Siya', '2024-12-11 11:54:10');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reset_token` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_results`
--

CREATE TABLE `quiz_results` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `flashcard_id` int NOT NULL,
  `score` int NOT NULL,
  `total_questions` int NOT NULL,
  `completed_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz_results`
--

INSERT INTO `quiz_results` (`id`, `user_id`, `flashcard_id`, `score`, `total_questions`, `completed_at`) VALUES
(43, 33, 19, 1, 2, '2024-12-11 07:30:17'),
(44, 33, 20, 1, 1, '2024-12-11 07:32:38'),
(45, 33, 20, 1, 1, '2024-12-11 09:11:56'),
(46, 33, 21, 0, 1, '2024-12-11 09:13:25'),
(47, 33, 21, 1, 1, '2024-12-11 09:13:35'),
(48, 33, 21, 0, 1, '2024-12-11 11:52:21'),
(49, 33, 22, 1, 1, '2024-12-11 11:53:47'),
(50, 33, 22, 1, 1, '2024-12-11 11:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `registervf`
--

CREATE TABLE `registervf` (
  `id` int NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `reset_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registervf`
--

INSERT INTO `registervf` (`id`, `email`, `reset_token`, `created_on`) VALUES
(21, 'normanrivera005@gmail.com', 'QYNFjwvSIs', '2024-11-21 11:43:31'),
(22, 'nor@gmail.com', 'EWdwQozOij', '2024-11-27 06:04:18'),
(23, 'malakas@gmail.com', '8J9I7y3Fc2', '2024-12-10 14:33:07'),
(24, 'lanslorence@gmail.com', 'RfPjhvOxIn', '2024-12-10 14:54:33'),
(25, 'hernandezlanslorence@gmail.com', 'xevntFGECs', '2024-12-10 17:01:07');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int NOT NULL,
  `user_id` int NOT NULL,
  `browser` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ip` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `session_data` varchar(70) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `browser`, `ip`, `session_data`, `created_at`) VALUES
(24, 30, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', '::1', '28b0370bc4abadafad937c16874ccc14b252dbac9e76660f2731cf9ecc0fb59c', '2024-11-21 19:44:31'),
(25, 32, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', 'ebbe3977d652c23bbc933371e78229bcb5a0ae427789b1ee0d533a53df2245d8', '2024-12-10 22:35:04'),
(40, 33, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '127.0.0.1', '4611fac4ab672686d2660b42590669fc4a030841a95d780600965a0a3f696043', '2024-12-11 02:43:12'),
(44, 33, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '127.0.0.1', 'e6f2b313e41fd4f23328522f2cd89d7d053d76327f5e5cc4da2872ffb63c023a', '2024-12-11 04:45:23'),
(86, 33, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '127.0.0.1', '58be6e0c285cd7bda51fcb5f99fe5f83aae5eb87b2a3ca1facd581c7f815eca4', '2024-12-11 12:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(11) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `class` varchar(255) COLLATE utf8mb4_general_ci DEFAULT 'Student',
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_token` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `google_oauth_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `avatar`, `firstname`, `lastname`, `phone`, `address`, `gender`, `dob`, `role`, `class`, `email`, `email_token`, `email_verified_at`, `password`, `remember_token`, `google_oauth_id`, `created_at`, `updated_at`) VALUES
(31, 'manman', NULL, 'Kien', 'Abas', NULL, NULL, 'Male', NULL, NULL, 'Student', 'nor@gmail.com', '7295f89c61f8689f1f8b41158d0fe1eb993b49afd033818325788987e6b120837fec322ecfaee66515cb2de280a50f2e3aef', NULL, '$2y$04$ShvWaulVPodieYMjZsZS/eFBV7S9v7acdkC6a9ZUEzC8mEWhDoMzG', NULL, NULL, '2024-11-27 06:04:18', NULL),
(32, 'Malakas', NULL, 'Malakas', 'Man', '09053570298', 'Pachoca, Calapan City', 'Female', '2003-07-31', NULL, 'Student', 'malakas@gmail.com', 'fd7c947ff1269c070df169425ba478525d020c51e238389ff78e78255ae4ac5f14ec2443bd8a7f7f47f20d7ca25e1def5a43', NULL, '$2y$04$Gx0yIiGGBISFFULXOk2HI.qpqFZvyGWe7iuwt9YZ87WF/812..YC6', NULL, NULL, '2024-12-10 14:33:07', '2024-12-10 22:24:27'),
(33, 'L4nszxc_09', NULL, 'Lans Lorence', 'Hernandez', '09127649805', 'Ibaba West, Calapan City , Oriental Mindoro', 'Male', '2004-07-09', NULL, 'Student', 'lanslorence@gmail.com', '4187ce80db37be6cd2780bd821a0e0926080f4bdce447830de4c145e021e76e01c3ea78b9003afd0d30bb311f5f1aedb933e', NULL, '$2y$04$wUd8spjHxOb4qqM0F.Esx.uYZfkvBXN5xCYeizpS7imrYvZPQwmJu', NULL, NULL, '2024-12-10 14:54:33', '2024-12-11 04:04:44'),
(34, 'L4nszxc_', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Student', 'hernandezlanslorence@gmail.com', '523d69f4e8dff11c6113a87d826ae45bb4d31f881b2bcd799a12256dbe7ff20dc7504e3bc0c2f21fd95d8852f40a89eba00f', NULL, '$2y$04$fV40md9gZ/9ZD6j7IegEa./sJGWumwyAnVY3vSOVkBz4t7pa122hy', NULL, NULL, '2024-12-10 17:01:07', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `flashcard_items`
--
ALTER TABLE `flashcard_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `flashcard_id` (`flashcard_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `flashcard_id` (`flashcard_id`);

--
-- Indexes for table `registervf`
--
ALTER TABLE `registervf`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `flashcards`
--
ALTER TABLE `flashcards`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `flashcard_items`
--
ALTER TABLE `flashcard_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `quiz_results`
--
ALTER TABLE `quiz_results`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `registervf`
--
ALTER TABLE `registervf`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `flashcards`
--
ALTER TABLE `flashcards`
  ADD CONSTRAINT `flashcards_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `flashcard_items`
--
ALTER TABLE `flashcard_items`
  ADD CONSTRAINT `flashcard_items_ibfk_1` FOREIGN KEY (`flashcard_id`) REFERENCES `flashcards` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quiz_results`
--
ALTER TABLE `quiz_results`
  ADD CONSTRAINT `quiz_results_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `quiz_results_ibfk_2` FOREIGN KEY (`flashcard_id`) REFERENCES `flashcards` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
