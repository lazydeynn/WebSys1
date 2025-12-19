-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2025 at 07:12 AM
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
-- Database: `thesis_archive_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` text DEFAULT NULL,
  `log_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `user_id`, `action`, `log_time`) VALUES
(1, 5, 'User Logged In', '2025-12-19 06:02:34'),
(2, 5, 'User Logged In', '2025-12-19 06:03:29'),
(3, 5, 'User Logged In', '2025-12-19 06:03:46'),
(4, 5, 'User Logged In', '2025-12-19 06:04:07'),
(5, 5, 'User Logged In', '2025-12-19 06:04:13'),
(6, 5, 'User Logged In', '2025-12-19 06:04:55'),
(7, 3, 'User Logged In', '2025-12-19 06:05:55'),
(8, 4, 'User Logged In', '2025-12-19 06:06:02'),
(9, 5, 'User Logged In', '2025-12-19 06:06:18'),
(10, 3, 'User Logged In', '2025-12-19 06:07:53'),
(11, 4, 'User Logged In', '2025-12-19 06:08:52'),
(12, 4, 'Submitted Thesis: Title Test', '2025-12-19 06:09:50'),
(13, 3, 'User Logged In', '2025-12-19 06:09:58'),
(14, 3, 'Reviewed Thesis ID 1: Approved', '2025-12-19 06:10:13'),
(15, 4, 'User Logged In', '2025-12-19 06:10:18'),
(16, 4, 'Submitted Thesis: Thesis 2', '2025-12-19 06:10:30'),
(17, 3, 'User Logged In', '2025-12-19 06:10:44'),
(18, 3, 'Reviewed Thesis ID 2: Rejected', '2025-12-19 06:10:58'),
(19, 5, 'User Logged In', '2025-12-19 06:11:01'),
(20, 4, 'User Logged In', '2025-12-19 06:11:32');

-- --------------------------------------------------------

--
-- Table structure for table `approvals`
--

CREATE TABLE `approvals` (
  `id` int(11) NOT NULL,
  `thesis_id` int(11) DEFAULT NULL,
  `status` enum('Pending','Reviewing','Approved','Rejected') DEFAULT 'Pending',
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `approvals`
--

INSERT INTO `approvals` (`id`, `thesis_id`, `status`, `updated_at`) VALUES
(1, 1, 'Approved', '2025-12-19 06:10:13'),
(2, 2, 'Rejected', '2025-12-19 06:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `dept_name`) VALUES
(1, 'College of Information Technology'),
(2, 'College of Business Administration'),
(3, 'College of Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `thesis_id` int(11) DEFAULT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `file_type` varchar(50) DEFAULT 'document',
  `uploaded_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `thesis_id`, `file_path`, `file_type`, `uploaded_at`) VALUES
(1, 1, 'uploads/1766124590_thesis.pdf', 'document', '2025-12-19 06:09:50'),
(2, 2, 'uploads/1766124630_thesis.pdf', 'document', '2025-12-19 06:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `program_name` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `dept_id`, `program_name`) VALUES
(1, 1, 'BS Information Technology'),
(2, 1, 'BS Computer Science'),
(3, 2, 'BS Business Administration'),
(4, 2, 'BS Accountancy'),
(5, 3, 'BS Civil Engineering'),
(6, 3, 'BS Computer Engineering');

-- --------------------------------------------------------

--
-- Table structure for table `review_logs`
--

CREATE TABLE `review_logs` (
  `id` int(11) NOT NULL,
  `thesis_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `comments` text DEFAULT NULL,
  `verdict` varchar(50) DEFAULT NULL,
  `log_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_logs`
--

INSERT INTO `review_logs` (`id`, `thesis_id`, `reviewer_id`, `comments`, `verdict`, `log_date`) VALUES
(1, 1, 3, 'asdasdasdasd', 'Approved', '2025-12-19 06:10:13'),
(2, 2, 3, 'sadasdsa', 'Rejected', '2025-12-19 06:10:58');

-- --------------------------------------------------------

--
-- Table structure for table `thesis`
--

CREATE TABLE `thesis` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `program_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `abstract` text DEFAULT NULL,
  `keywords` varchar(255) DEFAULT NULL,
  `adviser` varchar(100) DEFAULT NULL,
  `year_published` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `thesis`
--

INSERT INTO `thesis` (`id`, `student_id`, `program_id`, `title`, `abstract`, `keywords`, `adviser`, `year_published`, `created_at`) VALUES
(1, 4, 1, 'Title Test', 'asdasdasdas', 'asdasdasdas', 'Instructor 1', '2025', '2025-12-19 06:09:50'),
(2, 4, 1, 'Thesis 2', 'asdasda', 'asdsadas', 'asdasdas', '2025', '2025-12-19 06:10:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','faculty','student') DEFAULT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `profile_pic` varchar(255) DEFAULT NULL,
  `signature` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `full_name`, `dept_id`, `profile_pic`, `signature`) VALUES
(3, 'faculty', '$2y$10$0yOtk0TAehYy3u0fp6d.AeKlZRz8sHQs2wh9u0JqW7C3YcX1gxaAa', 'faculty', 'Faculty 1', 1, 'uploads/1766124038_faculty.png', 'uploads/1766124038_faculty.png'),
(4, 'student', '$2y$10$fkDgPlvlTGpuJ4ROesjvgeOX3aDEEFynCfjKHYqzQNvNF/HFUvSl2', 'student', 'Student 1', 1, 'uploads/1766124048_student.jpg', 'uploads/1766124048_sign.png'),
(5, 'admin', '$2y$10$2IY6PqwocRq2d0LhkV5aaOFtT/ANwaiBm44Wjghnee2TqIUXpn5Ue', 'admin', 'Admin 1', 1, 'uploads/1766124150_admin.png', 'uploads/1766124150_admin.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `approvals`
--
ALTER TABLE `approvals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_id` (`thesis_id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_id` (`thesis_id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dept_id` (`dept_id`);

--
-- Indexes for table `review_logs`
--
ALTER TABLE `review_logs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `thesis_id` (`thesis_id`),
  ADD KEY `reviewer_id` (`reviewer_id`);

--
-- Indexes for table `thesis`
--
ALTER TABLE `thesis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `program_id` (`program_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `dept_id` (`dept_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `approvals`
--
ALTER TABLE `approvals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review_logs`
--
ALTER TABLE `review_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `thesis`
--
ALTER TABLE `thesis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD CONSTRAINT `activity_logs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `approvals`
--
ALTER TABLE `approvals`
  ADD CONSTRAINT `approvals_ibfk_1` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `programs`
--
ALTER TABLE `programs`
  ADD CONSTRAINT `programs_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`);

--
-- Constraints for table `review_logs`
--
ALTER TABLE `review_logs`
  ADD CONSTRAINT `review_logs_ibfk_1` FOREIGN KEY (`thesis_id`) REFERENCES `thesis` (`id`),
  ADD CONSTRAINT `review_logs_ibfk_2` FOREIGN KEY (`reviewer_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `thesis`
--
ALTER TABLE `thesis`
  ADD CONSTRAINT `thesis_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `thesis_ibfk_2` FOREIGN KEY (`program_id`) REFERENCES `programs` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`dept_id`) REFERENCES `departments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
