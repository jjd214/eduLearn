-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2023 at 03:19 PM
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
  `students_enrolled` varchar(1000) DEFAULT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'private',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `course_tbl`
--

INSERT INTO `course_tbl` (`id`, `instructor_id`, `title`, `roadmap`, `difficulty`, `thumbnail`, `description`, `students_enrolled`, `status`, `created_at`) VALUES
(5, 8, 'DFA', 'fullstack', 'Intermediate', NULL, NULL, NULL, 'private', '2023-12-27 22:18:07');

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
(8, 'John Jacob', 'Dimaya', 'male', 'zxcxzcqweqeq', 'johnjacobdimaya2021@gmail.com', '065307ce8014f2f29c4e2ee84f2bb819', '9a8f24bfe9bdf3ce950455f39ec71848e69b76c9b006a0005188d02d1f00f7fb', '20', 'fullstack', 'IMG-8-2023-12-27-11-56-33-AM.jpg', 'instructor');

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
(6, 'John Jacob', 'Ruizz', 'male', 'qwertys', 'johnjacobdimaya0@gmail.com', '817b3ae38cbe924db0ba853912232d9b', 'b7bff1d8891886ee403d18fce1896db74002d6af8d819411c8f63dffb0a46723', 'IMG-6-2023-12-27-08-39-23-PM.png', 'student');

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
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `course_tbl`
--
ALTER TABLE `course_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `instructor_tbl`
--
ALTER TABLE `instructor_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course_tbl`
--
ALTER TABLE `course_tbl`
  ADD CONSTRAINT `course_tbl_ibfk_1` FOREIGN KEY (`instructor_id`) REFERENCES `instructor_tbl` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
