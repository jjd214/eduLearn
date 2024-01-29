-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2024 at 10:09 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `edulearn`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `access` varchar(255) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `application-form_tbl`
--

CREATE TABLE `application-form_tbl` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `age` varchar(3) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `verify_token` varchar(255) DEFAULT NULL,
  `profile` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `course_tbl`
--

CREATE TABLE `course_tbl` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `title` varchar(100) DEFAULT NULL,
  `roadmap` varchar(100) DEFAULT NULL,
  `difficulty` varchar(100) DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `students_enrolled` bigint(20) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Private',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`id`, `instructor_id`, `title`, `roadmap`, `difficulty`, `thumbnail`, `description`, `students_enrolled`, `status`, `created_at`) VALUES
(66, 8, 'Data Structure and Algorithms', 'fullstack', 'Advanced', 'IMG-8-65b5a881eeca3.png', 'In this course we will understand different data structures and how to use them effectively for solving problems. It is expected that the students have basic experience in any high-level programming language. Data structures and algorithms are a crucial p', 2, 'Public', '2024-01-28 09:04:48'),
(67, 8, 'Laravel Framework', 'fullstack', 'Beginner', 'IMG-8-65b6f7a4555e2.jpg', 'qweqwrqweqweqeqw', 1, 'Public', '2024-01-29 08:55:36'),
(68, 8, 'Code Igniter Framework', 'fullstack', 'Beginner', 'IMG-8-65b6fbd192364.jpg', 'qweqwrqweqwe', 1, 'Public', '2024-01-29 09:13:31'),
(69, 9, 'Html and Css', 'frontend', 'Beginner', 'IMG-9-65b7012d0271b.png', 'HTML basics: Learn the fundamentals of HTML, including tags, elements, attributes, and structure, to build a solid foundation. CSS basics: Explore the basics of CSS, including selectors, properties, and values, to style and design web pages effectively.', 2, 'Public', '2024-01-29 09:36:16');

-- --------------------------------------------------------

--
-- Table structure for table `instructor_tbl`
--

CREATE TABLE `instructor_tbl` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `biography` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verify_token` varchar(255) NOT NULL,
  `age` varchar(3) DEFAULT NULL,
  `position` varchar(255) DEFAULT NULL,
  `profile` text DEFAULT NULL,
  `access` varchar(255) DEFAULT 'instructor'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `instructor_tbl`
--

INSERT INTO `instructor_tbl` (`id`, `firstname`, `lastname`, `gender`, `biography`, `email`, `password`, `verify_token`, `age`, `position`, `profile`, `access`) VALUES
(8, 'John Jacob', 'Ruiz', 'male', 'zxcxzcqweqeq', 'johnjacobdimaya2021@gmail.com', '065307ce8014f2f29c4e2ee84f2bb819', '9a8f24bfe9bdf3ce950455f39ec71848e69b76c9b006a0005188d02d1f00f7fb', '20', 'fullstack', 'IMG-8-2024-01-28-05-53-40-PM.jpg', 'instructor'),
(9, 'Ana Bien', 'Salazar', 'female', NULL, 'anabien0314@gmail.com', '817b3ae38cbe924db0ba853912232d9b', '9df6863b779d51d666eaec40b4272437', '20', 'frontend', NULL, 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_tbl`
--

CREATE TABLE `student_course_tbl` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `course` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_course_tbl`
--

INSERT INTO `student_course_tbl` (`id`, `student_id`, `course_id`, `course`) VALUES
(1, 7, 66, 'Data Structure and Algorithms'),
(2, 8, 66, 'Data Structure and Algorithms'),
(3, 7, 67, 'Laravel Framework'),
(4, 7, 68, 'Code Igniter Framework'),
(6, 7, 69, 'Html and Css');

-- --------------------------------------------------------

--
-- Table structure for table `student_task_tbl`
--

CREATE TABLE `student_task_tbl` (
  `id` int(11) NOT NULL,
  `task_id` int(11) DEFAULT NULL,
  `student_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Incomplete',
  `submitted_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_tbl`
--

CREATE TABLE `task_tbl` (
  `id` int(11) NOT NULL,
  `instructor_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `file` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `deadline` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `biography` varchar(200) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `verify_token` varchar(255) NOT NULL,
  `profile` text DEFAULT NULL,
  `access` varchar(255) DEFAULT 'student'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`id`, `firstname`, `lastname`, `gender`, `biography`, `email`, `password`, `verify_token`, `profile`, `access`) VALUES
(7, 'John Jacob', 'Dimaya', 'male', NULL, 'johnjacobdimaya0@gmail.com', '817b3ae38cbe924db0ba853912232d9b', 'ab00ab307114001fc5e1e5e3710831f2', 'IMG-7-2024-01-29-07-47-38-AM.jpg', 'student'),
(8, 'Aaron Angelo', 'Eva', 'male', NULL, 'aaron.angelo565@gmail.com', '817b3ae38cbe924db0ba853912232d9b', '90c961b15df666be5319edac1791d81c', NULL, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `video_tbl`
--

CREATE TABLE `video_tbl` (
  `id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `video_title` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `thumbnail` text DEFAULT NULL,
  `video` text DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `video_tbl`
--

INSERT INTO `video_tbl` (`id`, `course_id`, `instructor_id`, `video_title`, `description`, `thumbnail`, `video`, `created_at`) VALUES
(41, 66, 8, 'Introduction to Data Structures and Algorithm', 'Lorem ipsumS', 'IMG-41-65b628a6c2ab3.png', 'VIDEO-41-65b628a6c384b.mp4', '2024-01-28 09:08:13'),
(42, 66, 8, 'Linear vs Non Linear', 'Let\'s talk about the difference of Linear and Non Linear Data Structures, we will see how they compare with each other and how some is more advantageous than the other. We will try to explain it as much as possible in layman\'s term.', 'IMG-8-65b5c26fe23b5.png', 'VIDEO-8-65b5c26fe23b5.mp4', '2024-01-28 10:56:47');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application-form_tbl`
--
ALTER TABLE `application-form_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_tbl_ibfk_1` (`instructor_id`);

--
-- Indexes for table `instructor_tbl`
--
ALTER TABLE `instructor_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_course_tbl`
--
ALTER TABLE `student_course_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_task_tbl`
--
ALTER TABLE `student_task_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_tbl`
--
ALTER TABLE `task_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `course_id` (`course_id`),
  ADD KEY `instructor_id` (`instructor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `application-form_tbl`
--
ALTER TABLE `application-form_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `instructor_tbl`
--
ALTER TABLE `instructor_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `student_course_tbl`
--
ALTER TABLE `student_course_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_task_tbl`
--
ALTER TABLE `student_task_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `task_tbl`
--
ALTER TABLE `task_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `video_tbl`
--
ALTER TABLE `video_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD CONSTRAINT `course_tbl_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD CONSTRAINT `video_tbl_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
