-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2023 at 08:41 PM
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
-- Table structure for table `admin_schedule`
--

CREATE TABLE `admin_schedule` (
  `id` int(11) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `exam_date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_schedule`
--

INSERT INTO `admin_schedule` (`id`, `exam_date`, `exam_date_created`) VALUES
(37, '2023-02-10', '2023-01-25 08:50:19'),
(38, '2023-02-14', '2023-02-12 19:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `archived_courses`
--

CREATE TABLE `archived_courses` (
  `crs_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `related_hobbies` varchar(255) NOT NULL,
  `English` int(11) NOT NULL,
  `Math` int(11) NOT NULL,
  `Filipino` int(11) NOT NULL,
  `Science` int(11) NOT NULL,
  `Logic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(7, 'The police officer ___________ the crowd to step back from the fire so that no one would get hurt.', 'undulated', 'enjoined', 'stagnated', 'permeated', 'B'),
(8, 'Bea was known for her loud and domineering personality and was considered a __________ by many who knew her.\r\n', 'banality', 'debutante', 'virago', 'trifle', 'C'),
(9, 'Nothing will ___________ my memory of the night we first met; the images are forever burned in my mind.', 'appease', 'undulate', 'inculcate', 'efface', 'D'),
(10, 'Sheila’s grueling hike included passing through numerous _____________.\r\n', 'terrariums', 'neoprene', 'jurisdictions', 'ravines', 'D'),
(11, 'The artist attempted to __________the painting by adding people dressed in bright colors in the foreground.', 'excoriate', 'amplify', 'eradicate', 'vivify', 'D'),
(12, 'The __________ deer stuck close to its mother when venturing out into the open field.\r\n', 'starling', 'foundling', 'yearling', 'begrudging', 'C'),
(13, 'David’s _________ entrance on stage disrupted the scene and caused the actors to flub their lines.\r\n', 'untimely', 'precise', 'lithe', 'fortuitous', 'A'),
(14, 'Calvin reached the __________ of his career in his early thirties when he became president and CEO of a software company.\r\n', 'zephyr', 'zenith', 'vale', 'nocturne', 'B'),
(15, 'Genevieve’s stunning debut performance at the city opera has earned her  __________ from some of the city’s toughest critics.\r\n', 'antipathy', 'accolades', 'destitutions', 'lamentations', 'B'),
(16, 'Prince Phillip had to choose: marry the woman he loved and ________ his right to the throne, or marry Fiona and inherit the crown.\r\n', 'reprimand', 'upbraid', 'abdicate', 'winnow', 'C');

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
(2, 'Natatakpan ng kadiliman ang iba’t-ibang makukulay na larawan. Walang mali.', 'Natatakpan', 'iba’t-ibang', 'makulay', 'Walang mali', 'B'),
(3, 'Napag-alaman na nakipagsabwatan siya sa kanyang tauhan upang maikubli ang katiwaliang kanyang ginawa. Walang mali.\r\n', 'Napag-alaman', 'nakipagsabwatan', 'upang', 'Walang mali', 'A'),
(4, 'Hindi bumoboto doon si manong Jose dahil mahaba ang pila. Walang mali.', 'bumoboto', 'doon', 'mahaba ang pila', 'Walang mali', 'B'),
(5, 'Kundi man ngayon makaluwas si Jorge sa Maynila, ay sa Agosto pa siya luluwas. Walang mali.\r\n', 'Kundi man', 'makaluwas', 'luluwas', 'Walang mali', 'A'),
(6, 'Si Bonifacio, Rizal at Mabini ay mga ulirang bayani ng ating lahi. Walang mali.', 'Si Bonifacio', 'at Mabini', 'ating lahi', 'Walang mali', 'D');

-- --------------------------------------------------------

--
-- Table structure for table `generated_codes`
--

CREATE TABLE `generated_codes` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `exam_key` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `pref_course` varchar(255) NOT NULL,
  `pref_secondary_course` varchar(255) NOT NULL,
  `pref_tertiary_course` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `secondary_interest` varchar(255) NOT NULL,
  `tertiary_interest` varchar(255) NOT NULL,
  `hobby` varchar(255) NOT NULL,
  `secondary_hobby` varchar(255) NOT NULL,
  `tertiary_hobby` varchar(255) NOT NULL,
  `exam_key_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generated_codes`
--

INSERT INTO `generated_codes` (`id`, `email`, `exam_key`, `exam_date`, `strand`, `pref_course`, `pref_secondary_course`, `pref_tertiary_course`, `interest`, `secondary_interest`, `tertiary_interest`, `hobby`, `secondary_hobby`, `tertiary_hobby`, `exam_key_created_at`) VALUES
(16, 'lebbraumjayce@gmail.com', 'qjpo3975', '2023-02-14', 'ABM', 'Bachelor of Science in Mathematics (BSMath)', 'Bachelor of Science in Psychology (BSPsych)', 'Bachelor of Science in Computer Science (BSCS/BSComSci)', 'Mathematics', 'Travelling', 'Videography', 'Communicating', 'Writing', 'Gaming', '2023-02-13 15:04:29'),
(18, 'user@gmail.com', 'nkvo5168', '2023-02-14', 'STEM', 'Bachelor of Science in Psychology (BSPsych)', 'Bachelor of Science in Entrepreneurial Management (BSEM)', 'Bachelor in Public Administration (BPA)', 'problem solving', 'analyzing', 'numbers', 'Broadcasting', 'Watching', 'Photography', '2023-02-13 21:14:47');

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
-- Table structure for table `interests`
--

CREATE TABLE `interests` (
  `id` int(11) NOT NULL,
  `interest` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `interests`
--

INSERT INTO `interests` (`id`, `interest`) VALUES
(1, 'problem solving'),
(2, 'analyzing'),
(3, 'numbers'),
(4, 'accounting'),
(5, 'education'),
(6, 'mathematics'),
(7, 'information gathering'),
(8, 'computation'),
(9, 'law'),
(10, 'english'),
(11, 'technology'),
(12, 'systematic'),
(13, 'government'),
(14, 'management'),
(15, 'collaboration'),
(16, 'politics');

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

--
-- Dumping data for table `math_questionnaire`
--

INSERT INTO `math_questionnaire` (`id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correctAnswer`) VALUES
(2, 'Jeb is 14 years younger than Ed. In 6 years, Ed will be thrice as old as Jeb. How old is Jeb 4 years from now?', '15', '19', '5', '9', 'C'),
(3, 'Thrice the larger of two numbers is five more than five times the smaller, and the sum of six times the larger and five times the smaller is 265. What is the larger number?', '44', '40', '30', '27', 'C'),
(4, 'If the lengths of the sides of a square are tripled, what is the effect on its area?', 'The area will increase thrice.', 'The area will increase 19 times.', 'The area will increase 9 times.', 'The area will remain the same.', 'C'),
(5, 'What is the first term of an arithmetic sequence whose 19th and 12th terms are 417 and 319 respectively?', '165', '242', '98', '7', 'A'),
(6, ' \r\nIf Rose saves P15.00 on the first week and adds P6.00 each week, how much will she save on the last week of the fourth month?\r\n', 'P98.00', 'P100.00', 'P105.00', 'P102.00', 'C'),
(7, 'Paulo earned 83 in his first two quizzes, 79 for the third, and 85 for the fourth. What should he earn for the fifth quiz to earn an average for 85 for his five quizzes?', '88', '90', '95', '100', 'C'),
(8, 'A student rides away from his home going to school in an automobile at a rate of 36 miles an hour and walks back fast at a rate of 7.2 miles an hour. The round trip took 2 hours. How far does he ride?', '18 miles', '9 miles', '15 miles', '12 miles', 'D'),
(9, 'Roy is 13 years older than Sam. In 5 years, the sum of Roy’s age and twice that of Sam’s age is 79. What is Sam’s age now?', '30', '17', '32', '22', 'B'),
(10, 'The sum of four consecutive multiples of 7 is 1582. What is the smallest among those integers?', '385', '420', '364', '399', 'A'),
(11, 'Kevin can finish cleaning their room for about 36 minutes. When his brother Ben helps him, it takes them 9 minutes to complete cleaning. How many minutes would it take Ben to clean their room alone?', '715', '15', '18', '12', 'D');

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

--
-- Dumping data for table `science_questionnaire`
--

INSERT INTO `science_questionnaire` (`id`, `question`, `optionA`, `optionB`, `optionC`, `optionD`, `correctAnswer`) VALUES
(1, '“For every action, there is an equal and opposite reaction.” If a baseball player hits a ball with a bat – and the “action” is said to be the impact of the bat against the ball – what is its “opposite reaction?', 'The grip of the player’s hand on the bat', 'The air resistance on the ball', 'The force of the ball against the bat', 'Muscular effort in the player’s arm', 'C'),
(2, 'Gravitational potential energy is energy an object possesses because of its position in a gravitational field. Which of the following has the most gravitational potential energy?', 'A truck at the top of the hill', 'A truck speeding down the hill', 'A pendulum at the center of trajectory', 'A man on his mountain bike speeding down the hill', 'A'),
(3, ' 178.	Atoms of an element differ from those of all elements in ___________.', 'atomic number and electronic configuration', 'number of neutrons and number of valence electrons', 'atomic number and number of valence electrons', 'number of neutrons and electronic configuration', 'A'),
(4, 'Which of the following is true about sub atomic particles, mass number and atomic number?', 'mass number is equal to the number of neutrons', 'proton plus electron is equal to the mass number', 'atomic number is equal to the number of protons', 'neutron number can be calculated given only the mass number', 'C'),
(5, 'Why is a virus not a living organism?', 'It can never reproduce', 'It is simpler than bacteria', 'It is not a complete cell', 'All of the above', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_subjects`
--

CREATE TABLE `tbl_exam_subjects` (
  `subj_id` int(11) NOT NULL,
  `subj_name` varchar(255) NOT NULL,
  `subj_desc` varchar(255) NOT NULL,
  `subj_status` int(11) NOT NULL,
  `subj_timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_exam_subjects`
--

INSERT INTO `tbl_exam_subjects` (`subj_id`, `subj_name`, `subj_desc`, `subj_status`, `subj_timestamp`) VALUES
(1, 'English', 'This includes vocabulary, reading comprehension, and verbal test', 1, '2023-02-10 05:21:08'),
(2, 'Filipino', 'This includes vocabulary, reading comprehension, and verbal test', 1, '2023-02-10 05:34:17'),
(3, 'Mathematics', 'This includes algebra, geometry and calculus.', 1, '2023-02-10 05:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_topics`
--

CREATE TABLE `tbl_exam_topics` (
  `topic_id` int(11) NOT NULL,
  `topic_name` varchar(255) NOT NULL,
  `topic_desc` varchar(255) NOT NULL,
  `topic_duration` int(11) NOT NULL,
  `topic_stat` int(11) NOT NULL,
  `topic_stamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `topic_subj` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_exam_topics`
--

INSERT INTO `tbl_exam_topics` (`topic_id`, `topic_name`, `topic_desc`, `topic_duration`, `topic_stat`, `topic_stamp`, `topic_subj`) VALUES
(1, 'Verbal Test', 'This includes sentence and grammar construction', 60, 1, '2023-02-11 14:59:31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_que_answers`
--

CREATE TABLE `tbl_que_answers` (
  `ans_id` int(11) NOT NULL,
  `que_id` int(11) NOT NULL,
  `ans_desc` varchar(255) NOT NULL,
  `correct` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_que_answers`
--

INSERT INTO `tbl_que_answers` (`ans_id`, `que_id`, `ans_desc`, `correct`) VALUES
(1, 1, 'verb', 1),
(2, 1, 'noun', 0),
(3, 1, 'pronoun', 0),
(4, 1, 'adjective', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_topic_questions`
--

CREATE TABLE `tbl_topic_questions` (
  `que_id` int(11) NOT NULL,
  `que_desc` varchar(255) NOT NULL,
  `que_topic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_topic_questions`
--

INSERT INTO `tbl_topic_questions` (`que_id`, `que_desc`, `que_topic`) VALUES
(1, 'A word used to describe an action, state, or occurrence, and forming the main part of the predicate of a sentence', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
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

INSERT INTO `users` (`id`, `Fullname`, `email`, `password`, `type`, `verification_code`, `verified_date`, `reset_link_token`, `expiry_reset_link_token`) VALUES
(1, 'admin name sample', 'admin@gmail.com', '$2y$10$qVBICpn0Vk8QSa4A/LVDE.xwpqJvxTug.TF2u3utOXNgHMRavcowq', 1, '174093', '2023-01-04 21:23:08', '', ''),
(2, 'marvs', 'lebbraumjayce@gmail.com', '$2y$10$YeI9rdAyfqt/bic10Mli2uUsWvHU7ZlQJsnuuvQ6URVlxGnziaGYi', 0, '253435', '2023-02-11 17:24:39', '', ''),
(3, 'student name sample', 'user@gmail.com', '$2y$10$dOFXxqdDGFW.V3YDp/KPUuFPtOTV0m7Kpl1x2AkjA6Mf/YnbNbvMi', 0, '334467', '2023-01-05 23:40:50', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_schedule`
--
ALTER TABLE `admin_schedule`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `archived_courses`
--
ALTER TABLE `archived_courses`
  ADD PRIMARY KEY (`crs_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`crs_id`),
  ADD UNIQUE KEY `crs_id` (`crs_id`);

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
-- Indexes for table `generated_codes`
--
ALTER TABLE `generated_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hobbies`
--
ALTER TABLE `hobbies`
  ADD PRIMARY KEY (`hob_id`);

--
-- Indexes for table `interests`
--
ALTER TABLE `interests`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `tbl_exam_subjects`
--
ALTER TABLE `tbl_exam_subjects`
  ADD PRIMARY KEY (`subj_id`);

--
-- Indexes for table `tbl_exam_topics`
--
ALTER TABLE `tbl_exam_topics`
  ADD PRIMARY KEY (`topic_id`);

--
-- Indexes for table `tbl_que_answers`
--
ALTER TABLE `tbl_que_answers`
  ADD PRIMARY KEY (`ans_id`);

--
-- Indexes for table `tbl_topic_questions`
--
ALTER TABLE `tbl_topic_questions`
  ADD PRIMARY KEY (`que_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_schedule`
--
ALTER TABLE `admin_schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `archived_courses`
--
ALTER TABLE `archived_courses`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `english_questionnaire`
--
ALTER TABLE `english_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `filipino_questionnaire`
--
ALTER TABLE `filipino_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `generated_codes`
--
ALTER TABLE `generated_codes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hobbies`
--
ALTER TABLE `hobbies`
  MODIFY `hob_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `logic_questionnaire`
--
ALTER TABLE `logic_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `math_questionnaire`
--
ALTER TABLE `math_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `science_questionnaire`
--
ALTER TABLE `science_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_exam_subjects`
--
ALTER TABLE `tbl_exam_subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_exam_topics`
--
ALTER TABLE `tbl_exam_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_que_answers`
--
ALTER TABLE `tbl_que_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_topic_questions`
--
ALTER TABLE `tbl_topic_questions`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
