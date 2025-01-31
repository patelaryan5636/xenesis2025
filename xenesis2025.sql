-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 31, 2025 at 07:19 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


DROP DATABASE IF EXISTS `xenesis2025`;
CREATE DATABASE `xenesis2025`;
USE `xenesis2025`;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xenesis2025`
--

-- --------------------------------------------------------

--
-- Table structure for table `department_master`
--

CREATE TABLE `department_master` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(50) NOT NULL,
  `poster_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `department_master`
--

INSERT INTO `department_master` (`department_id`, `department_name`, `poster_image`) VALUES
(1, 'Computer Engineering', ''),
(2, 'Information Technology', ''),
(3, 'Mechanical Engineering', ''),
(4, 'Electrical Engineering', ''),
(5, 'EC Engineering', ''),
(6, 'Civil Engineering', ''),
(7, 'Automobile Engineering', ''),
(8, 'MBA Department', ''),
(9, 'MCA Department', ''),
(10, 'Science and Humanities', '');

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE `event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `tagline` text NOT NULL,
  `department_id` int(11) NOT NULL,
  `team_name` varchar(100) NOT NULL,
  `event_leader_no` bigint(20) NOT NULL,
  `participation_price` int(11) NOT NULL,
  `participation_price_team` int(11) NOT NULL,
  `team_member_count` int(11) NOT NULL,
  `winner_price1` int(11) NOT NULL,
  `winner_price2` int(11) NOT NULL,
  `winner_price3` int(11) NOT NULL,
  `location` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `event_description` text NOT NULL,
  `rules` text NOT NULL,
  `round1_title` varchar(200) NOT NULL,
  `round1_description` text DEFAULT NULL,
  `round2_title` varchar(200) NOT NULL DEFAULT 'N/A',
  `round2_description` text DEFAULT 'N/A',
  `round3_title` varchar(200) NOT NULL DEFAULT 'N/A',
  `round3_description` text DEFAULT 'N/A',
  `round4_title` varchar(200) DEFAULT 'N/A',
  `round4_description` text DEFAULT 'N/A',
  `round5_title` varchar(200) DEFAULT 'N/A',
  `round5_description` text DEFAULT 'N/A',
  `images` varchar(254) NOT NULL,
  `image_path` text NOT NULL,
  `max_tickets` int(11) DEFAULT NULL,
  `event_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `organizer_master`
--

CREATE TABLE `organizer_master` (
  `organizer_id` int(11) NOT NULL,
  `Leader_Name` varchar(100) NOT NULL,
  `event_id` int(11) NOT NULL,
  `Leader_email` varchar(250) NOT NULL,
  `Leader_mobile` int(10) NOT NULL,
  `Member1_name` varchar(100) NOT NULL,
  `Member1_email` varchar(250) NOT NULL,
  `Member1_mobile` int(10) NOT NULL,
  `Member2_name` varchar(100) NOT NULL,
  `Member2_email` varchar(250) NOT NULL,
  `Member2_mobile` int(10) NOT NULL,
  `Member3_name` varchar(100) NOT NULL,
  `Member3_email` varchar(250) NOT NULL,
  `Member3_mobile` int(10) NOT NULL,
  `Member4_name` varchar(100) NOT NULL,
  `Member4_email` varchar(250) NOT NULL,
  `Member4_mobile` int(10) NOT NULL,
  `Member5_name` varchar(100) NOT NULL,
  `Member5_email` varchar(250) NOT NULL,
  `Member5_mobile` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizer_master`
--

INSERT INTO `organizer_master` (`organizer_id`, `Leader_Name`, `event_id`, `Leader_email`, `Leader_mobile`, `Member1_name`, `Member1_email`, `Member1_mobile`, `Member2_name`, `Member2_email`, `Member2_mobile`, `Member3_name`, `Member3_email`, `Member3_mobile`, `Member4_name`, `Member4_email`, `Member4_mobile`, `Member5_name`, `Member5_email`, `Member5_mobile`) VALUES
(2, 'RGT', 2, 'rgt@fsnf.com', 2147483647, 'sjfkfdbj', 'bdj@fdsf.com', 2147483647, 'sjfkfdbj', 'rgt@fsnf.com', 2147483647, 'sjfkfdbj', 'rgt@fsnf.com', 2147483647, 'sjfkfdbj', 'rgt@fsnf.com', 2147483647, 'sjfkfdbj', 'rgt@fsnf.com', 2147483647);

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `user_role` int(11) NOT NULL DEFAULT 3,
  `joined_date` datetime NOT NULL DEFAULT current_timestamp(),
  `full_name` varchar(100) NOT NULL,
  `phone` bigint(10) NOT NULL,
  `isVerified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `image_path` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`category_id`, `category_name`, `image_path`) VALUES
(1, 'X-GAME', ''),
(2, 'X-AI', ''),
(3, 'X-TECH', ''),
(4, 'X-CODE', ''),
(5, 'X-DARE', ''),
(6, 'X-THINK', '');

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

--
-- Indexes for table `department_master`
--
ALTER TABLE `department_master`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `event_master`
--
ALTER TABLE `event_master`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `organizer_master`
--
ALTER TABLE `organizer_master`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `department_master`
--
ALTER TABLE `department_master`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `organizer_master`
--
ALTER TABLE `organizer_master`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
