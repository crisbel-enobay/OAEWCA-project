-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2023 at 02:50 PM
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
  `related_hobbies` varchar(255) NOT NULL,
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
(1, 'Bachelor of Science in Mathematics (BSMath)', 'Mathematics', 3, 4, 3, 3, 4),
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
-- Table structure for table `english_questionnaire`
--

CREATE TABLE `english_questionnaire` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `correctAnswer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `english_questionnaire`
--

INSERT INTO `english_questionnaire` (`id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correctAnswer`) VALUES
(2, ' Question 1', 'A', 'B', 'C', 'D', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `filipino_questionnaire`
--

CREATE TABLE `filipino_questionnaire` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `correctAnswer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `filipino_questionnaire`
--

INSERT INTO `filipino_questionnaire` (`id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correctAnswer`) VALUES
(1, ' Filipino 1', 'A', 'B', 'C', 'D', 'D');

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
(1, 'Research'),
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
-- Table structure for table `logic_questionnaire`
--

CREATE TABLE `logic_questionnaire` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `correctAnswer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logic_questionnaire`
--

INSERT INTO `logic_questionnaire` (`id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correctAnswer`) VALUES
(1, '', 'A', 'B', 'C', 'D', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `math_questionnaire`
--

CREATE TABLE `math_questionnaire` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `correctAnswer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `science_questionnaire`
--

CREATE TABLE `science_questionnaire` (
  `id` int(11) NOT NULL,
  `question` varchar(255) NOT NULL,
  `optionA` varchar(255) NOT NULL,
  `optionB` varchar(255) NOT NULL,
  `optionC` varchar(255) NOT NULL,
  `optionD` varchar(255) NOT NULL,
  `correctAnswer` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `verified_date` datetime DEFAULT NULL,
  `reset_link_token` varchar(255) NOT NULL,
  `expiry_reset_link_token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fullname`, `email`, `password`, `type`, `verification_code`, `verified_date`, `reset_link_token`, `expiry_reset_link_token`) VALUES
('marvin caharop', 'lebbraumjayce@gmail.com', '$2y$10$LLqTF71mFh0BDayI8yCWk.dwLcnnlZoIZSc7SAmjPD4Qr1OFwI59m', 0, '113398', '2023-01-04 21:29:46', 'd41d8cd98f00b204e9800998ecf8427e7892', '2023-01-05 14:31:25'),
('password \"admin\"', 'admin@gmail.com', '$2y$10$qVBICpn0Vk8QSa4A/LVDE.xwpqJvxTug.TF2u3utOXNgHMRavcowq', 1, '174093', '2023-01-04 21:23:08', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crs_id`);

--
-- Indexes for table `english_questionnaire`
--
ALTER TABLE `english_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `filipino_questionnaire`
--
ALTER TABLE `filipino_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hob_id`);

--
-- Indexes for table `logic_questionnaire`
--
ALTER TABLE `logic_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `math_questionnaire`
--
ALTER TABLE `math_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `science_questionnaire`
--
ALTER TABLE `science_questionnaire`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `english_questionnaire`
--
ALTER TABLE `english_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `filipino_questionnaire`
--
ALTER TABLE `filipino_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `hob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `logic_questionnaire`
--
ALTER TABLE `logic_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `math_questionnaire`
--
ALTER TABLE `math_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `science_questionnaire`
--
ALTER TABLE `science_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
