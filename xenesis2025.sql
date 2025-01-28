-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2025 at 05:25 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE `event_master` (
  `event_id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `tagline` text NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `team_name` varchar(100) NOT NULL,
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
  `round2_title` varchar(200) NOT NULL,
  `round2_description` text DEFAULT NULL,
  `round3_title` varchar(200) NOT NULL,
  `round3_description` text DEFAULT NULL,
  `round4_title` varchar(200) DEFAULT NULL,
  `round4_description` text DEFAULT NULL,
  `round5_title` varchar(200) DEFAULT NULL,
  `round5_description` text DEFAULT NULL,
  `images` varchar(254) NOT NULL,
  `image_path` text NOT NULL,
  `max_tickets` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`event_id`, `event_name`, `tagline`, `department_name`, `team_name`, `participation_price`, `participation_price_team`, `team_member_count`, `winner_price1`, `winner_price2`, `winner_price3`, `location`, `date`, `event_description`, `rules`, `round1_title`, `round1_description`, `round2_title`, `round2_description`, `round3_title`, `round3_description`, `round4_title`, `round4_description`, `round5_title`, `round5_description`, `images`, `image_path`, `max_tickets`) VALUES
(3, 'asdf', 'asdfasd', 'asdf', 'aryan', 12, 11, 3, 12, 12, 12, 'adsf', '0000-00-00', 'asdfasdfsadfs', 'asdfasddfasdf', 'asdfasdfdsa', 'asdfasdf', 'asdfasdf', 'asdfasdf', 'asdfasf', 'asdfasfds', 'asdfasdf', 'asdfasdfsadf', 'adsfasdf', 'asdfasdf', 'http://drive.google.com/file/d/1A85_XHzhOtikBHuT2sFIwer40kpoqKAK/view?usp=sharing', 'uploads/1A85_XHzhOtikBHuT2sFIwer40kpoqKAK.jpg', 500);

-- --------------------------------------------------------

--
-- Table structure for table `organizer_master`
--

CREATE TABLE `organizer_master` (
  `Leader_Name` varchar(100) NOT NULL,
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
-- Indexes for dumped tables
--

--
-- Indexes for table `event_master`
--
ALTER TABLE `event_master`
  ADD PRIMARY KEY (`event_id`);

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
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
