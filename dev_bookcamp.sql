-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2025 at 06:39 AM
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
-- Database: `dev_bookcamp`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounttypes`
--

CREATE TABLE `accounttypes` (
  `id` int(11) NOT NULL,
  `type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounttypes`
--

INSERT INTO `accounttypes` (`id`, `type`) VALUES
(1, 'Admin'),
(2, 'Staff'),
(3, 'Professor'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `pen_name` varchar(255) DEFAULT NULL,
  `first_name` varchar(1024) NOT NULL,
  `last_name` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(1024) NOT NULL,
  `isbn` bigint(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `isbn`, `genre`, `author_name`, `created_at`, `updated_at`) VALUES
(3, 'Test', 0, 'Haha', 'who', '2025-02-02 17:52:11', '2025-02-03 01:21:59'),
(5, 'test1', 0, 'test1', 'test1', '2025-02-03 01:57:40', '2025-02-03 01:57:40'),
(6, 'test2', 0, 'test2', 'test2', '2025-02-03 01:57:47', '2025-02-03 01:57:47');

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `id` int(11) NOT NULL,
  `class` int(8) NOT NULL,
  `genre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `class`, `genre`) VALUES
(1, 0, 'Computer science, information, and general works'),
(2, 100, 'Philosophy and psychology'),
(3, 200, 'Religion'),
(4, 300, 'Social sciences'),
(5, 400, 'Language'),
(6, 500, 'Science'),
(7, 600, 'Technology'),
(8, 700, 'Arts and recreation'),
(9, 800, 'Literature'),
(10, 900, 'History and geography');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `borrowed_at` datetime NOT NULL,
  `approved_at` datetime NOT NULL,
  `due_at` datetime NOT NULL,
  `status` enum('Approved','Rejected','Pending','Cancelled') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `status` enum('Verified','Unverified','Inactive','Archived') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `accountType_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `image`, `first_name`, `last_name`, `status`, `created_at`, `updated_at`, `accountType_id`) VALUES
(1, NULL, 'fillIndsdsdsds', 'fillIn', NULL, 'fillIndddddddd', 'fillIn', 'Verified', '2025-02-02 07:15:53', '2025-02-03 01:47:56', 1),
(3, NULL, 'fillIn2', 'fillIn2', NULL, 'fillIn2', 'fillIn2', 'Verified', '2025-02-02 07:16:52', NULL, 3),
(4, NULL, 'fillIn3', 'fillIn3', NULL, 'fillIn3', 'fillIn3', 'Verified', '2025-02-02 07:16:52', NULL, 4),
(5, NULL, 'fillIn4', 'fillIn4', NULL, 'fillIn4', 'fillIn4', 'Verified', '2025-02-02 07:16:52', NULL, 1),
(6, NULL, 'fillIn5', 'fillIn5', NULL, 'fillIn5', 'fillIn5', 'Verified', '2025-02-02 07:16:52', NULL, 2),
(7, NULL, 'fillIn6', 'fillIn6', NULL, 'fillIn6', 'fillIn6', 'Verified', '2025-02-02 07:16:52', NULL, 3),
(8, NULL, 'fillIn7', 'fillIn7', NULL, 'fillIn7', 'fillIn7', 'Verified', '2025-02-02 07:16:52', NULL, 4),
(9, NULL, 'fillIn8', 'fillIn8', NULL, 'fillIn8', 'fillIn8', 'Verified', '2025-02-02 07:16:52', NULL, 1),
(10, NULL, 'fillIn9', 'fillIn9', NULL, 'fillIn9', 'fillIn9', 'Verified', '2025-02-02 07:16:52', NULL, 2),
(11, NULL, 'fillIn10', 'fillIn10', NULL, 'fillIn10', 'fillIn10', 'Verified', '2025-02-02 07:16:52', NULL, 3),
(12, NULL, 'fillIn11', 'fillIn11', NULL, 'fillIn11', 'fillIn11', 'Verified', '2025-02-02 07:16:52', NULL, 4),
(14, NULL, 'test', '$2y$10$jyny.CqDkHwj46kZADq/HOzXO1K0MFFCZYa0yJZw9eTG3iZBYfJlm', NULL, 'test', 'test', 'Inactive', '0000-00-00 00:00:00', NULL, 1),
(15, NULL, 'test2', '$2y$10$HAXWKw67DpW4VJ5.4u2oaO69PtToCooMNCdVcWszckqJGOmRPcuCK', NULL, 'test2', 'test2', 'Inactive', '0000-00-00 00:00:00', NULL, 2),
(16, NULL, 'test3', '$2y$10$Sx8ItvqCznRdLLjr.kLsXuGLlEB7kxtiZbjobPoglxvCug0R6ZTRS', NULL, 'test3', 'test3', 'Inactive', '0000-00-00 00:00:00', NULL, 1),
(17, NULL, 'test4', '$2y$10$tJPb3plot6k5SVKIKvjmFOepvTKtRBX3lDhh1GkyQCO9zz/3Xkc6C', NULL, 'test4', 'test4', 'Inactive', '0000-00-00 00:00:00', NULL, 2),
(18, NULL, 'test5', '$2y$10$tPQ9WkbPruJXbjcfN3JO1uRXTc5NLM3dHa7o5g73BSdGNNEQN1hom', NULL, 'test5', 'test5', 'Inactive', '0000-00-00 00:00:00', NULL, 1),
(19, NULL, 'test6', '$2y$10$2DIlCgBfDc2skcrXUL2EpuJLy3XXTbArNfkCuiPEX.zKKQlDQHi/a', NULL, 'test6', 'test6', 'Inactive', '0000-00-00 00:00:00', NULL, 2),
(20, NULL, 'test7', '$2y$10$AftpwyQdmiyACmoqTqWYZu1KiOueiXD4m.NPlshsKwnVp9sHsLAY6', NULL, 'test7', 'test7', 'Inactive', '0000-00-00 00:00:00', NULL, 1),
(22, NULL, 'test8', '$2y$10$9auJQ40z23SS/o6LLqQfsuiWPPRWopEZkJXNthBmTIaKdM4Z/vE7i', NULL, 'test8', 'test8', 'Inactive', '0000-00-00 00:00:00', NULL, 2),
(25, NULL, 'test9', '$2y$10$cPbc3SgCLYXMsC4SrsDERemMrUCJhGIJRRpSJ.vw7p7sSjpt1egX.', NULL, 'test9', 'test9', 'Inactive', '2025-02-02 21:55:04', '2025-02-02 21:55:04', 2),
(27, NULL, 'test11', '$2y$10$rSoqK/DKc6kqIPom4ls/u.92jalinTEfjq68SH7ioyvRW1SY0Krpe', NULL, 'test11', 'test11', 'Inactive', '2025-02-02 22:00:29', '2025-02-02 22:00:29', 2),
(28, NULL, 'test12', '$2y$10$f2PjzEefi71VRrJ3mB2mCOGmJDZVOhpSo92aM0CVExHW1eEG8iV3C', NULL, 'test12', 'test12', 'Inactive', '2025-02-02 22:01:53', '2025-02-02 22:01:53', 2),
(29, NULL, 'test123', '$2y$10$p7cSHe6xMR2s4egbkDt/A.lLEtkHH67kMKGn21gVecj9tk63M11yC', NULL, 'test123', 'test123', 'Inactive', '2025-02-02 22:03:16', '2025-02-02 22:03:16', 2),
(32, NULL, 'sdsd', '$2y$10$RDt3kVlxcpjJKZ1tBevfieUG3jw3PqAJNsCjd1uKzDHQMKp7/3E3e', NULL, 'sdsd', 'sdsd', 'Inactive', '2025-02-02 22:03:53', '2025-02-02 22:03:53', 1),
(33, NULL, 'sdwd', '$2y$10$wtg9VgcrX8b8eQ9FeIYquefAIdjfEqbIOvKap0kQxG8D5qvw5jL7S', NULL, 'sdwd', 'sdwd', 'Inactive', '2025-02-02 22:07:56', '2025-02-02 22:07:56', 2),
(35, NULL, 'lastlastlast edited', '$2y$10$h/E1EY2BNmM2wcmnJVKf/eUWU9V2joAVYYsTVemkLb.MHw7QKr2cq', NULL, 'lastlastlast', 'lastlastlast', 'Inactive', '2025-02-02 22:08:56', '2025-02-03 01:24:19', 1),
(40, NULL, 'wowwwwers', '$2y$10$lx7d3Jv1XflSOLDyVnIaQubyqihPcLvZ6ika8JgTF3.cHjbb7KVxS', NULL, 'wow', 'wow', 'Inactive', '2025-02-03 01:24:29', '2025-02-03 01:48:06', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounttypes`
--
ALTER TABLE `accounttypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`,`book_id`),
  ADD KEY `book_id` (`book_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `accountType_id` (`accountType_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounttypes`
--
ALTER TABLE `accounttypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `transaction`
--
ALTER TABLE `transaction`
  ADD CONSTRAINT `transaction_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `transaction_ibfk_2` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`accountType_id`) REFERENCES `accounttypes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
