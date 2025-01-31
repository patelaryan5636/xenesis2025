-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2025 at 07:40 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

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
  `event_leader_no` bigint(11) NOT NULL,
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
  `round2_title` varchar(200) DEFAULT NULL,
  `round2_description` text DEFAULT NULL,
  `round3_title` varchar(200) DEFAULT NULL,
  `round3_description` text DEFAULT NULL,
  `round4_title` varchar(200) DEFAULT NULL,
  `round4_description` text DEFAULT NULL,
  `round5_title` varchar(200) DEFAULT NULL,
  `round5_description` text DEFAULT NULL,
  `images` varchar(254) NOT NULL,
  `image_path` text NOT NULL,
  `max_tickets` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `is_status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`event_id`, `event_name`, `tagline`, `department_id`, `team_name`, `event_leader_no`, `participation_price`, `participation_price_team`, `team_member_count`, `winner_price1`, `winner_price2`, `winner_price3`, `location`, `date`, `event_description`, `rules`, `round1_title`, `round1_description`, `round2_title`, `round2_description`, `round3_title`, `round3_description`, `round4_title`, `round4_description`, `round5_title`, `round5_description`, `images`, `image_path`, `max_tickets`, `category_id`, `is_status`) VALUES
(1, 'Test', 'Test_Event', 1, 'RGT', 1234567890, 20, 4, 6, 50, 80, 50, 'GIDC Ground Ahmedabad', '0000-00-00', 'none', 'none', 'Ndnnsnsn', 'Znznxjcjxjxjxj', 'Xnxndndj', 'Dnxndnfjddjdj', 'Nasndncn', 'Snnnfnfnffn', 'Dbddhdbb', 'Nabdbdbdb', 'Sjshxjchj', 'Snnxndfnn', 'http://drive.google.com/file/d/1A85_XHzhOtikBHuT2sFIwer40kpoqKAK/view?usp=sharing', 'uploads/1A85_XHzhOtikBHuT2sFIwer40kpoqKAK.jpg', 100, 0, 1),
(2, 'X-avishkar', 'show yourprojects ', 2, 'GODLIKE CODERS', 6353054338, 50, 0, 1, 1500, 1200, 1000, '2nd shift 3rd flor AT 3 lab', '0000-00-00', 'hello coders how are you ', 'not applicable ', 'quize', 'nothing ', '', '', '', '', '', '', '', '', 'http://drive.google.com/file/d/1A85_XHzhOtikBHuT2sFIwer40kpoqKAK/view?usp=sharing', 'uploads/1A85_XHzhOtikBHuT2sFIwer40kpoqKAK.jpg', 200, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forget_password_master`
--

CREATE TABLE `forget_password_master` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `reset_token` varchar(255) NOT NULL,
  `token_expiry` timestamp NOT NULL DEFAULT current_timestamp(),
  `used` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `forget_password_master`
--

INSERT INTO `forget_password_master` (`id`, `email`, `reset_token`, `token_expiry`, `used`) VALUES
(1, 'sachaniaryan675@gmail.com', '367a8d9dfb53d5b5472360d70b7bc6acd5921e3b3a97edd0667a41169a33bfabde50db53c4cc7aad92d31eca98fb477bf2fd', '2025-01-30 05:03:35', 0),
(2, 'sachaniaryan675@gmail.com', 'e27f41a6cb4ecb24106214f9f1a1575627d56726599b1b3ac3c96217fe76ed56a08fe7a87d5872871e36ea929bfdcb183aaf', '2025-01-30 05:05:10', 0),
(3, 'sachaniaryan675@gmail.com', '42abd2c1543b6a83bec3b42cb4abb83d0cb0f6fd4f44080bbd1fe66a3aa8e5d435b7973ac39c92e54004818b8c57372a24fe', '2025-01-30 05:20:16', 0),
(4, 'sachaniaryan675@gmail.com', 'dc3a838406db8b21e90d07ef6c59b5068fd8842a39a29686e17109e3bef728e9c59909d8735acb9fa033be2cd350ec693ee2', '2025-01-30 05:25:18', 1),
(5, 'sachaniaryan675@gmail.com', '4b355a1bf872f672415fa2be99a78a7540ea498584e85c25f0bf185ed975b2e447cdf27e1ec196d377fdcca299e490d00b7d', '2025-01-30 05:32:38', 1),
(6, 'sachaniaryan675@gmail.com', '048af45496fb4c91c5182f5e07f76ffd712bde15e7d8418505da9157456fc4492c2f26670bbf2bc245b92287f053d584fb00', '2025-01-30 05:36:26', 1),
(7, 'sachaniaryan675@gmail.com', '8ad61ea132f951d09c0a2d6787d8f5d765394b626826fb8a15f69fd97349387c6cb7d18e44230243b9c4c4189fe9c11f1576', '2025-01-30 05:39:16', 1),
(8, 'sachaniaryan675@gmail.com', '73f179836673fbb0b268c4cc02b40b33154cad4c83cfcf926c1dd0faf862fb10374012b2b67c412daf9adb1da7525f7b2e04', '2025-01-30 05:45:06', 1),
(9, 'sachaniaryan675@gmail.com', '935818a0652b21aa03ae0be53312ad8a77dcbf0a1cdda3288a1db5015ae80a18b8c04fbbc36b355b009143a1b891bffc90a3', '2025-01-30 05:54:34', 0),
(10, 'sachaniaryan675@gmail.com', '523d296ca16688323642ab8e5b2091d7d12545ade3eeba5b8638cf35b3c2350865da2dd0c701406d0439e0a16479cc18c105', '2025-01-30 06:07:51', 1),
(11, 'sachaniaryan675@gmail.com', '98aa91a6a224a6c91b2be217592cc9dc882732176bb117113cfea8f305cfb4586b2ead7cb5ec9213ebdf5e555c74cddc9e96', '2025-01-30 08:58:13', 1),
(12, 'sachaniaryan675@gmail.com', '777f143c0be1e07050c15e98f9a8b0c13de237d5168c9608e68ae41157ed3e1a4bc10f74f0c5e05d6d5740b1371ae9f9f7a5', '2025-01-30 09:06:26', 1),
(13, 'sachaniaryan675@gmail.com', 'a425aaeaac0efaf09a0fb239fd9cc7a77059ba4eec1f7a60ecf51357c37e001ab471c30eee1f1c54dfd2793189c505a1cc8a', '2025-01-30 09:43:51', 1),
(14, 'sachaniaryan675@gmail.com', 'd308123c9bb4293fcfd76507605664167d108dc66ca8c54340c5a35e9bd49b37714203be8f89b2cc0e9ce2a4f59897c50307', '2025-01-30 10:59:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `group_master`
--

CREATE TABLE `group_master` (
  `group_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `leader_id` varchar(14) NOT NULL,
  `member_1` varchar(14) NOT NULL,
  `member_2` varchar(14) NOT NULL,
  `member_3` varchar(14) NOT NULL,
  `member_4` varchar(14) NOT NULL,
  `member_5` varchar(14) NOT NULL,
  `member_6` varchar(14) NOT NULL,
  `member_7` varchar(14) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `confirmBy` varchar(14) NOT NULL,
  `receipt_no` varchar(10) NOT NULL
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
  `Leader_mobile` bigint(11) NOT NULL,
  `Member1_name` varchar(100) NOT NULL,
  `Member1_email` varchar(250) NOT NULL,
  `Member1_mobile` bigint(11) NOT NULL,
  `Member2_name` varchar(100) NOT NULL,
  `Member2_email` varchar(250) NOT NULL,
  `Member2_mobile` bigint(11) NOT NULL,
  `Member3_name` varchar(100) NOT NULL,
  `Member3_email` varchar(250) NOT NULL,
  `Member3_mobile` bigint(11) NOT NULL,
  `Member4_name` varchar(100) NOT NULL,
  `Member4_email` varchar(250) NOT NULL,
  `Member4_mobile` bigint(11) NOT NULL,
  `Member5_name` varchar(100) NOT NULL,
  `Member5_email` varchar(250) NOT NULL,
  `Member5_mobile` bigint(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organizer_master`
--

INSERT INTO `organizer_master` (`organizer_id`, `Leader_Name`, `event_id`, `Leader_email`, `Leader_mobile`, `Member1_name`, `Member1_email`, `Member1_mobile`, `Member2_name`, `Member2_email`, `Member2_mobile`, `Member3_name`, `Member3_email`, `Member3_mobile`, `Member4_name`, `Member4_email`, `Member4_mobile`, `Member5_name`, `Member5_email`, `Member5_mobile`) VALUES
(1, 'RGT', 1, 'dsjdj@hdhs.com', 1234567890, 'Zhsdjsjsjwj', 'dsjdj@hdhs.com', 1234567890, 'Ssjdjdj', 'dsjdj@hdhs.com', 373372828, 'Fjdjsjsi', 'dsjdj@hdhs.com', 373625168, 'Dhdhwj', 'srdtjk@efe.com', 1234567890, 'aeterkyrhzr', 'rdhurydj@sf.com', 15684512),
(2, 'Krish Prajapati', 2, 'prajapatikrish132005@gmail.com', 6353054338, '', '', 2147483647, '', '', 0, '', '', 0, '', '', 0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `participant_master`
--

CREATE TABLE `participant_master` (
  `p_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `is_confirmed` int(11) NOT NULL,
  `confirmBy` varchar(20) NOT NULL,
  `receipt_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `phone` bigint(11) NOT NULL,
  `isVerified` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `user_name`, `email`, `password`, `user_role`, `joined_date`, `full_name`, `phone`, `isVerified`) VALUES
(1, '224SBECE30032', 'sachaniaryan675@gmail.com', '$2y$10$zPK4BnWnY/8UXJ1QMWdQQOa/2OtdQgIq7z7wREBAi9WLZySeGfq3G', 1, '2025-01-30 14:44:25', 'aryan', 6353054338, 1),
(2, '224SBECE30033', 'sachaniaryan676@gmail.com', '$2y$10$l9t9soInnkt9d9ISPoTL2uqt.SnamB.OMpERZJ74nxVdIIbYUbU/G', 3, '2025-01-30 19:07:12', 'aryan', 6353054338, 0);

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_master`
--

CREATE TABLE `volunteer_master` (
  `volunteer_id` varchar(14) NOT NULL,
  `wallet` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`category_id`);

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
-- Indexes for table `forget_password_master`
--
ALTER TABLE `forget_password_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `group_master`
--
ALTER TABLE `group_master`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `organizer_master`
--
ALTER TABLE `organizer_master`
  ADD PRIMARY KEY (`organizer_id`);

--
-- Indexes for table `participant_master`
--
ALTER TABLE `participant_master`
  ADD PRIMARY KEY (`p_id`);

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
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `department_master`
--
ALTER TABLE `department_master`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `forget_password_master`
--
ALTER TABLE `forget_password_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `group_master`
--
ALTER TABLE `group_master`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `organizer_master`
--
ALTER TABLE `organizer_master`
  MODIFY `organizer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `participant_master`
--
ALTER TABLE `participant_master`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
