-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2022 at 03:04 AM
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
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `crs_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `related_hobbies` enum('House Keeping','Baking','Programming/Coding','Web Development','Designing','Researching','Mathematics','Assembling/Disassembling','Digital Art','Drawing','Painting','Dancing/Singing','Communicating','Gaming','Cooking','Broadcasting','Writing','Reading','Watching','Travelling','Photography','Blogging','Videography','Self Studying','Exercise','Volunteering') NOT NULL,
  `English` int(11) NOT NULL,
  `Math` int(11) NOT NULL,
  `Filipino` int(11) NOT NULL,
  `Science` int(11) NOT NULL,
  `Logic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crs_id`, `course`, `related_hobbies`, `English`, `Math`, `Filipino`, `Science`, `Logic`) VALUES
(1, 'Bachelor of Science in Mathematics (BSMath)', 'Mathematics', 2, 4, 2, 2, 3),
(2, 'Bachelor of Science in Psychology (BSPsych)', 'Communicating', 3, 2, 2, 4, 3),
(3, 'Bachelor of Science in Criminology (BSCrim)', 'Volunteering', 3, 3, 2, 3, 3),
(4, 'Bachelor of Science in Computer Science (BSCS/BSComSci)', 'Programming/Coding', 2, 3, 3, 2, 4),
(5, 'Bachelor of Science in Information System (BSIS)', 'Programming/Coding', 2, 3, 3, 2, 3),
(6, 'Bachelor of Science in Information Technology (BSIT)', 'Programming/Coding', 2, 3, 3, 2, 3),
(7, 'Bachelor of Science in Entertainment and Multimedia Computing (BSEMC)', 'Programming/Coding', 2, 3, 3, 2, 3),
(8, 'Bachelor of Arts in Political Science (ABPS/ABPolSci)', 'Volunteering', 3, 2, 2, 2, 3),
(9, 'Bachelor of Arts in Communication (BAComm)', 'Communicating', 4, 2, 3, 2, 2),
(10, 'Bachelor of Arts in Behavioral Science: Organizational and Social Systems Development (ABBS-OSSD)', 'Communicating', 3, 2, 3, 2, 3),
(11, 'Bachelor in Public Administration (BPA)', 'Communicating', 3, 2, 3, 2, 2),
(12, 'Bachelor of Science in Business Administration: Human Resource Development Management (BSBA-HRDM)', 'Researching', 3, 4, 2, 2, 3),
(13, 'Bachelor of Science in Business Administration: Financial Management (BSBA-FMGT)', 'Researching', 3, 4, 2, 2, 3),
(14, 'Bachelor of Science in Business Administration: Marketing Management (BSBA-MKMGT)', 'Researching', 3, 4, 2, 2, 3),
(15, 'Bachelor of Science in Entrepreneurial Management (BSEM)', 'Researching', 3, 4, 2, 2, 3),
(16, 'Bachelor of Science in Accountancy (BSA)', 'Researching', 3, 4, 2, 2, 3),
(17, 'Bachelor of Science in Accounting Information System (BSAIS)', 'Researching', 3, 4, 2, 2, 3),
(18, 'Bachelor of Science in Office Administration (BSOAd)', 'Researching', 3, 4, 2, 2, 3),
(19, 'Bachelor of Science in Tourism Management (BSTM)', 'Travelling', 4, 2, 2, 2, 2),
(20, 'Bachelor of Science in Hotel and Restaurant Management (BSHRM)', 'House Keeping', 2, 2, 2, 2, 2),
(21, 'Bachelor in Elementary Education: Early Childhood (BEEd-ECEd)', 'House Keeping', 2, 2, 2, 2, 2),
(22, 'Bachelor in Elementary Education: Special Education (BEEd-SpEd)', '', 3, 3, 3, 3, 3),
(23, 'Bachelor in Secondary Education: Science (BSEd-Sci)', 'Researching', 3, 3, 2, 4, 3),
(24, 'Bachelor in Secondary Education: English (BSEd-Eng)', 'Writing', 4, 2, 2, 2, 2),
(25, 'Bachelor in Secondary Education: English-Chinese (BSEd-EngChi)', 'Writing', 4, 2, 2, 2, 2),
(26, 'Bachelor in Secondary Education: BTLE-HE ( Bachelor of Technology and Livelihood Education major in Home Economics)', 'Assembling/Disassembling', 2, 2, 2, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `hobbies`
--

CREATE TABLE `hobbies` (
  `hob_id` int(11) NOT NULL,
  `hobby` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hobbies`
--

INSERT INTO `hobbies` (`hob_id`, `hobby`) VALUES
(1, 'Researching'),
(2, 'Mathematics'),
(3, 'Assembling/Disassembling'),
(4, 'Digital Art'),
(5, 'Drawing'),
(6, 'Painting'),
(7, 'Dancing/Singing'),
(8, 'Communicating'),
(9, 'Gaming'),
(10, 'Cooking'),
(11, 'Broadcasting'),
(12, 'Writing'),
(13, 'Reading'),
(14, 'Watching'),
(15, 'Travelling'),
(16, 'Photography'),
(17, 'Blogging'),
(18, 'Videography'),
(19, 'Self Studying'),
(20, 'Exercise'),
(21, 'Volunteering'),
(22, 'House Keeping'),
(23, 'Baking'),
(24, 'Programming/Coding'),
(25, 'Web Development'),
(26, 'Designing');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fullname` varchar(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` int(11) NOT NULL,
  `verification_code` text NOT NULL,
  `verified_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fullname`, `email`, `password`, `type`, `verification_code`, `verified_date`) VALUES
('admin', 'admin@gmail.com', '$2y$10$3nMPCFG14Lz9ayUOH80mc.vf1G2Wse0ZQr7/OZE3lRM8mNw2dkZee', 1, '170813', '2022-12-29 03:32:28'),
('lebb@gmail.com', 'lebb@gmail.com', '$2y$10$vd8ZIKw5Q7YBRZ7DYKPlaeV/5BKhxAaMkUGMOTh8M.YuG2/vidMJC', 0, '', NULL),
('Marvin Caharop', 'lebbraumjayce@gmail.com', '$2y$10$G9eKIOcc6BW4p0O8EJ9wde9XUQaiRSrThuGlwtqObfCdpX8Hs796m', 0, '224050', '2022-12-29 03:04:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crs_id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hob_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`fullname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `hob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
