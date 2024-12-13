-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 13, 2024 at 06:45 PM
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
-- Database: `lavaui2`
--

-- --------------------------------------------------------

--
-- Table structure for table `appoint`
--

CREATE TABLE `appoint` (
  `appoint_id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `appointData` datetime DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appoint`
--

INSERT INTO `appoint` (`appoint_id`, `user_id`, `fname`, `lname`, `email`, `phone`, `address`, `appointData`, `service_id`, `status`) VALUES
(11, NULL, 'Lans Lorence', 'Navarro Hernandez', 'lanslorence@gmail.com', '43432423', 'Ibaba West', '2024-12-14 02:39:00', 2, 'pending'),
(12, NULL, 'Lans Lorence', 'Navarro Hernandez', 'lanslorence@gmail.com', '43432423', 'Ibaba West', '2024-12-14 02:47:00', 1, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contact` varchar(15) DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id`, `name`, `email`, `contact`, `message`, `created_at`) VALUES
(1, NULL, 'jerome', 'lavalust@gmail.com', '09982863340', 'ang pogi', '2024-11-26 21:20:18'),
(2, NULL, 'jerome', 'jerome@gmail.com', '09123129322', 'qwe', '2024-11-26 21:22:54'),
(3, NULL, 'jerome', 'jerome@gmail.com', '09123129322', 'qwe', '2024-11-26 21:23:39'),
(4, NULL, 'gelo', 'gelo@gmail.com', '1231231', 'asdasd', '2024-11-26 22:51:45'),
(5, NULL, 'jans', 'firedown1231@gmail.com', '09123129322', 'ang pogi ng taga backend', '2024-12-02 09:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset`
--

CREATE TABLE `password_reset` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `reset_token` varchar(10) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `password_reset`
--

INSERT INTO `password_reset` (`id`, `email`, `reset_token`, `created_on`) VALUES
(1, 'firedown1231@gmail.com', 'oHI0xTsr3a', '2024-12-07 03:44:45'),
(2, 'firedown1231@gmail.com', '2G1qCSQTIo', '2024-12-09 22:40:07'),
(3, 'sachi@gmail.com', '5hwuC1OzvF', '2024-12-09 22:41:51');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int NOT NULL,
  `first_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `last_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `user_id`) VALUES
(1, 'Ma. Sachilette', 'Leyesa', 'saaach25@gmail.com', '09301952078', '2024-10-13 15:41:48', 0),
(2, 'Sachi', 'Leyesa', 'sach@gmail.com', '09301952078', '2024-10-13 16:43:59', 0),
(3, 'lans', 'lorence', 'sakdnwk4@gmal.com', '12d45', '2024-10-13 16:59:22', 0),
(4, 'Lans Lorence ', 'Hernandez', 'lanslorence@gmail.com', '09639447150', '2024-10-13 17:22:06', 0),
(5, 'dsadas', 'jttfgh', 'fhfg@gmail.com', '345678', '2024-10-13 17:24:38', 0),
(6, 'dsadas', 'jttfgh', 'fhfg@gmail.com', '345678', '2024-10-13 17:26:02', 0),
(7, 'dsadasdbsahdashg', 'hgdsaghfgashfjgj', 'dsladkas@gmail.com', '3124', '2024-10-13 17:26:18', 0),
(8, 'Sachi', 'Maria', 'sach@gmail.com', '09354651542', '2024-10-13 17:30:29', 0),
(9, 'Lorence', 'Hernandez', 'lans@gmail.com', '09127649805', '2024-10-13 23:11:54', 0),
(10, 'LAaaans', 'Hernandez', 'lans@gmail.com', '09127649805', '2024-10-14 16:49:00', 0),
(11, 'LAaaans', 'Hernandez', 'lans@gmail.com', '09127649805', '2024-10-14 18:32:07', 0),
(12, 'MA. SACHILETTE', 'LEYESA', 'maria@gmail.com', '09301648307', '2024-10-14 19:29:43', 0),
(13, 'Yessah', 'Vibas', 'ysa@gmail.com', '095462317651', '2024-10-14 19:45:43', 0),
(14, 'qfws', 'fcds', 'fvdfdx@gmail.com', '0216214864', '2024-10-14 19:50:53', 0),
(15, 'asdf', 'qwerty', 'vfdgr@gmail.com', '095489147412', '2024-10-14 19:52:11', 0),
(16, 'wfdsczdc', 'dsva', 'maria@gmail.com', '0948765124', '2024-10-14 19:52:30', 0),
(17, 'wfdsczdc', 'dsva', 'maria@gmail.com', '0948765124', '2024-10-14 19:52:51', 0),
(18, 'wertyy', 'sfacsa', 'asd@gmail.com', '09462178541', '2024-10-14 19:53:32', 0),
(19, 'wertyy', 'sfacsa', 'asd@gmail.com', '09462178541', '2024-10-14 19:57:52', 0),
(20, 'Marilou', 'Leyesa', 'malou@gmail.com', '09309146122', '2024-10-15 11:17:59', 0);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int NOT NULL,
  `service_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service_name`) VALUES
(1, 'Dental Checkup'),
(2, 'Teeth Cleaning'),
(3, 'Filling'),
(4, 'Root Canal Treatment'),
(5, 'Teeth Whitening'),
(6, 'Orthodontics'),
(7, 'Extraction');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `session_id` int NOT NULL,
  `user_id` int NOT NULL,
  `browser` varchar(255) NOT NULL,
  `ip` varchar(60) NOT NULL,
  `session_data` varchar(70) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `user_id`, `browser`, `ip`, `session_data`, `created_at`) VALUES
(50, 6, 'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.188 Safari/537.36 CrKey/1.54.250320', '::1', 'd8134337577364c3668c231d671d0f025eeb8f51ab4def7548ea9e0e5714d212', '2024-12-10 01:27:35'),
(58, 34, 'Mozilla/5.0 (X11; Linux aarch64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/88.0.4324.188 Safari/537.36 CrKey/1.54.250320', '::1', '4a0f6fca6dd26ec67caa85b7c70540ebc5cb4c4d9a49d895fdd3a8f3a212cb21', '2024-12-10 02:48:40'),
(62, 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', '331b9ac9cf35c15ef1566623806db84982fd2ea8acef5f84386c3f650c52b174', '2024-12-10 17:09:19'),
(67, 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '::1', '1ca1f1e23faf61bca18ecf13ce1ae8273b6d4ce84c6c37089c00fe4e2a6334a2', '2024-12-11 11:17:18'),
(70, 39, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', '127.0.0.1', '77818fe11aa8a2363353fcc0b067edbd420ab01967ff7d66e9d64db41305575e', '2024-12-14 02:44:22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_token` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `google_oauth_id` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `address` text,
  `street` varchar(100) DEFAULT NULL,
  `barangay` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `zip_code` varchar(20) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `email_token`, `email_verified_at`, `password`, `remember_token`, `google_oauth_id`, `role`, `created_at`, `updated_at`, `first_name`, `last_name`, `address`, `street`, `barangay`, `city`, `zip_code`, `phone_number`) VALUES
(33, 'jeromepogi', 'firedown1231@gmail.com', '17672ed0b51619c705e74079105c0679d29754bdae1dff35b2edd5191d42f141b3eacf49070c8a6d13cda70cbf124a7799c1', '2024-12-13 11:29:07', '$2y$04$HbJXVGQ.MKXNmpKsj4ynuebV7gjTt5ADBbXTu8FnNvXJuo8dLkLoq', NULL, NULL, 'user', '2024-12-09 17:56:39', '2024-12-13 18:29:07', 'jerome', 'martinez', NULL, 'malungay', 'nacoco', 'calapan', '5200', '09123129322'),
(34, 'sachi', 'sachi@gmail.com', '75e5c1c48312b54fd394a8bdcfb5a3be41aa3da061c6ebf0528178eb104b71b0475a7cd17dc8ef9c8fde40a7b31f3c4e8812', '2024-12-13 11:29:07', '$2y$04$VlyoPBgBncM3ApMrrNK8ruxSnttd59EQfKjEQ5gBAph8mgfdRlWZW', NULL, NULL, 'admin', '2024-12-09 17:57:43', '2024-12-13 18:29:07', 'sachi', 'leyesa', NULL, 'sa', 'sa', 'sa', '5200', '09123123123'),
(35, 'newnew', 'new@gmail.com', '1a1d89babbb54b0366703be3c32f9f010040c0239b96ea6010079f989fdeacb83ded845af378d6b8ebd5b26188629202caee', '2024-12-13 11:29:07', '$2y$04$lK9Vhb7EyMK2m7t1K3X6Aeg3QIoSr2w3X2N5InS6AZk7nc8o/8SqK', NULL, NULL, 'user', '2024-12-09 17:58:06', '2024-12-13 18:29:07', 'nw', 'ew', NULL, 'malungay', 'nacoco', 'calapan', '5200', '09123129322'),
(36, 'jnsspot', 'jnss@gmail.com', 'cc481598d49b889ab5580ef5eb237bcfbf77c6dbbeb635c8add82069c079f5bd1d69b3b60e0716310e77b97fc5ac54215bbb', '2024-12-13 11:29:07', '$2y$04$YUKW9zRjH3sXjMdQv72XXOqDQM4Dt.I5gd/7R0wlBSc3OH8GRb0CW', NULL, NULL, 'user', '2024-12-10 13:57:20', '2024-12-13 18:29:07', 'janss', 'martinez', NULL, 'nacoco', 'malungay', 'calapan', '5200', '98123123322'),
(37, 'Angelo', 'jelocolocado@gmail.com', '4ee6a566e052fd7a4c0cd35104bd248604b1d1b38b4022133000ce707519e114a42c765f882a5ff82a25d5d9842fb0a9fa12', '2024-12-13 11:29:07', '$2y$04$HJfYCL0w5a0WjQTTr/DksuttcR3dhsn8bf9YlyyM2vj2b9y7l5Yv6', NULL, NULL, 'user', '2024-12-11 03:12:49', '2024-12-13 18:29:07', 'Angelo', 'Barbacena', NULL, 'balingayan', 'nacoco', 'calapan', '5200', '+639982863340'),
(39, 'L4nszxc_09', 'lanslorence@gmail.com', 'b8b31a5f81717decd426f18b1e76687b8fb99bb3d63b13ff7ea93250bbd6b7a7328be7e8297a17e4cf716d175b980db64d68', '2024-12-13 11:29:07', '$2y$04$PWhnoAXKYT7L21xw.V/xAeGrhStb4YNshYBBf19p3D1qzczAnqdj.', NULL, NULL, 'user', '2024-12-13 18:29:03', '2024-12-13 18:29:07', 'Lans Lorence', 'Navarro Hernandez', NULL, 'Ibaba West', 'sa', 'Calapan City', '5200', '+639123123123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appoint`
--
ALTER TABLE `appoint`
  ADD PRIMARY KEY (`appoint_id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `password_reset`
--
ALTER TABLE `password_reset`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

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
-- AUTO_INCREMENT for table `appoint`
--
ALTER TABLE `appoint`
  MODIFY `appoint_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `password_reset`
--
ALTER TABLE `password_reset`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `session_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appoint`
--
ALTER TABLE `appoint`
  ADD CONSTRAINT `appoint_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`service_id`),
  ADD CONSTRAINT `appoint_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
