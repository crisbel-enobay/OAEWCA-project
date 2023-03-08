-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2023 at 02:29 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

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
  `exam_time` time NOT NULL,
  `exam_time_end` time NOT NULL,
  `exam_date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_schedule`
--

INSERT INTO `admin_schedule` (`id`, `exam_date`, `exam_time`, `exam_time_end`, `exam_date_created`) VALUES
(56, '2023-02-16', '21:00:00', '23:00:00', '2023-02-16 20:39:55'),
(58, '2023-02-18', '15:00:00', '16:00:00', '2023-02-16 20:39:55'),
(59, '2023-02-20', '14:00:00', '16:00:00', '2023-02-20 13:56:14');

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
-- Table structure for table `career_goals`
--

CREATE TABLE `career_goals` (
  `id` int(11) NOT NULL,
  `career_goal` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `career_goals`
--

INSERT INTO `career_goals` (`id`, `career_goal`) VALUES
(1, 'Actuary'),
(2, 'Data analyst'),
(3, 'Mathematician'),
(4, 'Clinical psychologist'),
(5, 'School psychologist'),
(6, 'Social worker'),
(7, 'FBI agent'),
(8, 'Police officer'),
(9, 'Criminologist'),
(10, 'Software developer'),
(11, 'Data scientist'),
(12, 'Artificial intelligence specialist'),
(13, 'Computer systems analyst\r\n'),
(14, 'IT consultant'),
(15, 'Business analyst'),
(16, 'Database administrator'),
(17, 'Network administrator '),
(18, 'Cybersecurity specialist'),
(20, 'Game designer'),
(21, 'Animator'),
(22, 'Video editor'),
(23, 'Politician'),
(24, 'Diplomat'),
(26, 'Journalist'),
(27, 'Public relations specialist'),
(28, 'Advertising executive'),
(30, 'Organizational development specialist '),
(31, 'Human resources manager'),
(32, 'Community development specialist'),
(33, 'Government administrator'),
(34, 'Nonprofit manager'),
(35, 'Policy analyst'),
(37, 'Training and development specialist'),
(38, 'Organizational development consultant'),
(39, 'Financial analyst'),
(40, 'Investment banker'),
(41, 'Risk manager'),
(42, 'Marketing manager'),
(43, 'Brand manager'),
(45, 'Entrepreneur'),
(46, 'Business owner'),
(47, 'Business development manager'),
(48, 'Certified Public Accountant'),
(49, 'Tax accountant'),
(50, 'Auditor'),
(51, 'Accountant'),
(54, 'Administrative assistant'),
(55, 'Office manager'),
(56, 'Customer service representative'),
(57, 'Tourism manager'),
(58, 'Travel agent'),
(59, 'Event coordinator'),
(60, 'Hotel manager'),
(61, 'Restaurant manager'),
(63, 'Early childhood educator'),
(64, 'Preschool teacher'),
(65, 'Daycare center director'),
(66, 'Special education teacher'),
(67, 'Disability advocate'),
(68, 'Education consultant'),
(69, 'Science teacher'),
(70, 'Science curriculum developer'),
(71, 'Science education researcher'),
(72, 'English teacher'),
(73, 'Curriculum developer'),
(75, 'Bilingual teacher'),
(76, 'Language teacher');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `crs_id` int(11) NOT NULL,
  `course` varchar(255) NOT NULL,
  `personality_traits` varchar(255) NOT NULL,
  `interests` varchar(255) NOT NULL,
  `skills` varchar(255) NOT NULL,
  `career_goals` varchar(255) NOT NULL,
  `English` int(11) NOT NULL,
  `Math` int(11) NOT NULL,
  `Filipino` int(11) NOT NULL,
  `Science` int(11) NOT NULL,
  `Logic` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crs_id`, `course`, `personality_traits`, `interests`, `skills`, `career_goals`, `English`, `Math`, `Filipino`, `Science`, `Logic`) VALUES
(1, 'Bachelor of Science in Mathematics (BSMath)', 'Analytical,Logical,Detail-oriented', 'Problem-solving, Research, Data analysis', 'Mathematical reasoning, Statistical analysis', 'Actuary, Data analyst, Mathematician', 3, 4, 3, 3, 4),
(2, 'Bachelor of Science in Psychology (BSPsych)', 'Empathetic,Observant,Good listener', 'Counseling, Research, Mental health advocacy', 'Communication, Empathy, Research', 'Clinical psychologist, School psychologist, Social worker', 3, 2, 2, 4, 3),
(3, 'Bachelor of Science in Criminology (BSCrim)', 'Detail-oriented,	\nObservant,Analytical', 'Forensic science, Law enforcement, Criminal justice research', 'Critical thinking, Investigation, Report writing', 'FBI agent, Police officer, Criminologist', 3, 3, 2, 3, 3),
(4, 'Bachelor of Science in Computer Science (BSCS/BSComSci)', 'Logical,Analytical,Detail-oriented', 'Programming, Software development, Artificial intelligence', 'Problem-solving, Programming languages, Data structures and algorithms', 'Software developer, Data scientist, Artificial intelligence specialist, Computer systems analyst\n', 2, 3, 3, 2, 4),
(5, 'Bachelor of Science in Information System (BSIS)', 'Strategic,Technically adept,Detail-oriented', 'Technology, Business, Problem-solving', 'Project management, Systems analysis, Database management', 'IT consultant, Business analyst, Database administrator', 2, 3, 3, 2, 3),
(6, 'Bachelor of Science in Information Technology (BSIT)', 'Innovativeo,Analytical,Detail-oriented', 'Technology, Programming, Cybersecurity', 'Programming languages, Network administration, Cybersecurity skills', 'Network administrator, Cybersecurity specialist, IT consultant', 2, 3, 3, 2, 3),
(7, 'Bachelor of Science in Entertainment and Multimedia Computing (BSEMC)', 'Creative,Collaborative,Technically adept', 'Video production, Animation, Game development', 'Creative writing, Graphic design, Video editing', 'Game designer, Animator, Video editor', 2, 3, 3, 2, 3),
(8, 'Bachelor of Arts in Political Science (ABPS/ABPolSci)', 'Analytical,Inquisitive,Persuasive', 'Politics, Public policy, Diplomacy', 'Research, Writing, Public speaking', 'Politician, Diplomat, Public policy analyst', 3, 2, 2, 2, 3),
(9, 'Bachelor of Arts in Communication (BAComm)', 'Empathetic,Creative,Persuasive', 'Journalism, Public relations, Advertising', 'Writing, Public speaking, Graphic design', 'Journalist, Public relations specialist, Advertising executive', 4, 2, 3, 2, 2),
(10, 'Bachelor of Arts in Behavioral Science: Organizational and Social Systems Development (ABBS-OSSD)', 'Analytical,Collaborative,Problem-solving', 'Organizational development, Human resources, Community development', 'Communication, Leadership, Conflict resolution', 'Organizational development specialist, Human resources manager, Community development specialist', 3, 2, 3, 2, 3),
(11, 'Bachelor in Public Administration (BPA)', 'Strategic,Collaborative,Ethical', 'Public service, Public policy, Management', 'Leadership, Decision-making, Conflict resolution', 'Government administrator, Nonprofit manager, Policy analyst', 3, 2, 3, 2, 2),
(12, 'Bachelor of Science in Business Administration: Human Resource Development Management (BSBA-HRDM)', 'Collaborative,Empathetic,Strategic', 'Human resources, Employee training and development, Organizational behavior', 'Training and development, Performance evaluation, Conflict resolution', 'Human resources manager, Training and development specialist, Organizational development consultant', 3, 4, 2, 2, 3),
(13, 'Bachelor of Science in Business Administration: Financial Management (BSBA-FMGT)', 'Detail-oriented,Analytical,Strategic', 'Finance, Investment, Risk management', 'Financial analysis, Investment analysis, Risk assessment', 'Financial analyst, Investment banker, Risk manager', 3, 4, 2, 2, 3),
(14, 'Bachelor of Science in Business Administration: Marketing Management (BSBA-MKMGT)', 'Creative,Collaborative,Persuasive', 'Detail-oriented, Analytical, Strategic', 'Market research, Branding, Campaign management', 'Marketing manager, Brand manager, Advertising executive', 3, 4, 2, 2, 3),
(15, 'Bachelor of Science in Entrepreneurial Management (BSEM)', 'Innovative,Risk-taking,Strategic', 'Entrepreneurship, Innovation, Business development', 'Market research, Business planning, Financial management', 'Entrepreneur, Business owner, Business development manager', 3, 4, 2, 2, 3),
(16, 'Bachelor of Science in Accountancy (BSA)', 'Detail-oriented,Analytical,Ethical', 'Accounting, Taxation, Auditing', 'Accounting, Financial analysis, Attention to detail', 'Certified Public Accountant, Tax accountant, Auditor', 3, 4, 2, 2, 3),
(17, 'Bachelor of Science in Accounting Information System (BSAIS)', 'Detail-oriented,Analytical,Technically adept', 'Accounting, Information systems, Data analysis', 'Accounting principles, Database management, Information security', 'Accountant, Auditor, Financial analyst', 3, 4, 2, 2, 3),
(18, 'Bachelor of Science in Office Administration (BSOAd)', 'Organized,Detail-oriented,Good communicator', 'Office management, Administrative support, Customer service', 'Time management, Record keeping, Customer service', 'Administrative assistant, Office manager, Customer service representative', 3, 4, 2, 2, 3),
(19, 'Bachelor of Science in Tourism Management (BSTM)', 'Hospitable,Creative,Culturally sensitive', 'Travel, Hospitality, Event planning', 'Customer service, Marketing, Event planning', 'Tourism manager, Travel agent, Event coordinator', 4, 2, 2, 2, 2),
(20, 'Bachelor of Science in Hotel and Restaurant Management (BSHRM)', 'Hospitable,Detail-oriented,Good communicator', 'Hospitality, Culinary arts, Hotel and restaurant operations', 'Customer service, Budget management, Event planning', 'Hotel manager, Restaurant manager, Event coordinator', 2, 2, 2, 2, 2),
(21, 'Bachelor in Elementary Education: Early Childhood (BEEd-ECEd)', 'Patient,Creative,Energetic', 'Child development, Teaching, Curriculum design', 'Classroom management, Lesson planning, Child assessment', 'Early childhood educator, Preschool teacher, Daycare center director', 2, 2, 2, 2, 2),
(22, 'Bachelor in Elementary Education: Special Education (BEEd-SpEd)', 'Patient,Empathetic,Resourceful', 'Special education, Disability advocacy, Teaching', 'Adaptability, Multitasking, Problem-solving', 'Special education teacher, Disability advocate, Education consultant', 3, 3, 3, 3, 3),
(23, 'Bachelor in Secondary Education: Science (BSEd-Sci)', 'Inquisitive,Resourceful,Adaptable', 'Science, Education, Research', 'Lesson planning, Classroom management, Scientific research', 'Science teacher, Science curriculum developer, Science education researcher', 3, 3, 2, 4, 3),
(24, 'Bachelor in Secondary Education: English (BSEd-Eng)', 'Creative,Articulate,Patient', 'English language, Literature, Education', 'Lesson planning, Classroom management, Communication', 'English teacher, Curriculum developer, Education consultant', 4, 2, 2, 2, 2),
(25, 'Bachelor in Secondary Education: English-Chinese (BSEd-EngChi)', 'Bilingual,Cross-culturally competent,Adaptable', 'English language, Chinese language, Education', 'Lesson planning, Classroom management, Translation', 'Bilingual teacher, Language teacher, Education consultant', 4, 2, 2, 2, 2),
(26, 'Bachelor in Secondary Education: BTLE-HE ( Bachelor of Technology and Livelihood Education major in Home Economics)', 'Creative, Resourceful, Patient', 'Home economics, Education, Culinary arts', 'Lesson planning, Classroom management, Culinary skills', 'Home economics teacher, Culinary instructor, Education consultant', 2, 2, 2, 2, 2);

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
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `exam_key` varchar(255) NOT NULL,
  `exam_date` varchar(255) NOT NULL,
  `exam_time` time NOT NULL,
  `exam_time_end` time NOT NULL,
  `status` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `pref_course` varchar(255) NOT NULL,
  `traits` varchar(255) NOT NULL,
  `interest` varchar(255) NOT NULL,
  `skill` varchar(255) NOT NULL,
  `career_goal` varchar(255) NOT NULL,
  `f_course` varchar(255) NOT NULL,
  `s_course` varchar(255) NOT NULL,
  `t_course` varchar(255) NOT NULL,
  `exam_key_created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generated_codes`
--

INSERT INTO `generated_codes` (`id`, `fullname`, `email`, `exam_key`, `exam_date`, `exam_time`, `exam_time_end`, `status`, `strand`, `pref_course`, `traits`, `interest`, `skill`, `career_goal`, `f_course`, `s_course`, `t_course`, `exam_key_created_at`) VALUES
(46, '', 'lebbraumjayce@gmail.com', 'pgxc1279', '2023-02-16', '21:00:00', '23:00:00', 'active', 'STEM', 'Bachelor of Science in Psychology (BSPsych)', '', '', '', '', '', '', '', '2023-02-18 04:32:30'),
(74, 'student name sample', 'user@gmail.com', 'ucna9076', '2023-02-18', '15:00:00', '16:00:00', 'pending', 'STEM', 'Bachelor of Science in Psychology (BSPsych)', 'Analytical,Logical,Observant', 'Artificial intelligence,Counseling', 'Data structures and algorithms,Empathy', 'Clinical psychologist,Computer systems analyst\r\n', 'Bachelor of Science in Psychology (BSPsych)', 'Bachelor of Science in Computer Science (BSCS/BSComSci)', 'Bachelor of Science in Information System (BSIS)', '2023-03-08 21:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `hobbies_interests`
--

CREATE TABLE `hobbies_interests` (
  `id` int(11) NOT NULL,
  `hobbies_interests` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hobbies_interests`
--

INSERT INTO `hobbies_interests` (`id`, `hobbies_interests`) VALUES
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
(26, 'Teaching'),
(27, 'Information Gathering'),
(28, 'Computation'),
(29, 'Law'),
(30, 'English'),
(31, 'Technology'),
(32, 'Systematizing'),
(33, 'Governing'),
(34, 'Managing'),
(35, 'Collaborating'),
(36, 'Politics'),
(37, 'Problem Solving'),
(38, 'Analyzing'),
(39, 'Accounting');

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
(1, 'Problem-solving'),
(2, 'Research'),
(3, 'Data analysis'),
(4, 'Counseling'),
(5, 'Public relations'),
(6, 'Mental health advocacy'),
(7, 'Forensic science'),
(8, 'Law enforcement'),
(9, 'Criminal justice research'),
(10, 'Programming'),
(11, 'Software development'),
(12, 'Artificial intelligence'),
(13, 'Technology'),
(14, 'Business'),
(15, 'Cybersecurity'),
(16, 'Journalism'),
(17, 'Video production'),
(18, 'Animation'),
(19, 'Game development'),
(20, 'Politics'),
(21, 'Public policy'),
(22, 'Diplomacy'),
(26, 'Organizational development'),
(27, 'Human resources'),
(28, 'Community development'),
(29, 'Public service'),
(31, 'Management'),
(32, 'Employee training and development'),
(33, 'Organizational behavior'),
(34, 'Finance'),
(35, 'Investment'),
(36, 'Risk management'),
(37, 'Advertising'),
(38, 'Marketing'),
(39, 'Consumer behavior'),
(40, 'Entrepreneurship'),
(41, 'Innovation'),
(42, 'Business development'),
(43, 'Accounting'),
(44, 'Taxation'),
(45, 'Auditing'),
(46, 'Office management'),
(47, 'Administrative support'),
(48, 'Customer service'),
(49, 'Travel'),
(50, 'Hospitality'),
(51, 'Event planning'),
(52, 'Culinary arts'),
(53, 'Hotel and restaurant operations'),
(54, 'Child development'),
(56, 'Curriculum design'),
(57, 'Special education'),
(58, 'Disability advocacy'),
(59, 'Teaching'),
(60, 'Science'),
(61, 'Education'),
(63, 'English language'),
(64, 'Literature'),
(65, 'Chinese language');

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
-- Table structure for table `personality_traits`
--

CREATE TABLE `personality_traits` (
  `id` int(11) NOT NULL,
  `personality_trait` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `personality_traits`
--

INSERT INTO `personality_traits` (`id`, `personality_trait`) VALUES
(1, 'Analytical'),
(2, 'Logical'),
(3, 'Detail-oriented'),
(4, 'Empathetic'),
(5, 'Observant'),
(6, 'Good listener'),
(7, 'Strategic'),
(8, 'Technically adept'),
(9, 'Innovative'),
(10, 'Creative'),
(11, 'Collaborative'),
(12, 'Inquisitive'),
(13, 'Persuasive'),
(14, 'Problem-solving'),
(15, 'Ethical'),
(16, 'Risk-taking'),
(17, 'Organized'),
(18, 'Good communicator'),
(19, 'Hospitable'),
(20, 'Culturally sensitive'),
(21, 'Patient'),
(22, 'Energetic'),
(23, 'Resourceful'),
(24, 'Adaptable'),
(25, 'Articulate'),
(26, 'Bilingual'),
(27, 'Cross-culturally competent');

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
-- Table structure for table `skills`
--

CREATE TABLE `skills` (
  `id` int(11) NOT NULL,
  `skill` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`id`, `skill`) VALUES
(1, 'Mathematical reasoning'),
(2, 'Statistical analysis'),
(3, 'Communication'),
(4, 'Empathy'),
(5, 'Research'),
(6, 'Critical thinking'),
(7, 'Investigation'),
(8, 'Report writing'),
(9, 'Problem-solving'),
(10, 'Programming languages'),
(11, 'Data structures and algorithms'),
(12, 'Project management'),
(13, 'Systems analysis'),
(14, 'Database management'),
(15, 'Public speaking'),
(16, 'Network administration'),
(17, 'Cybersecurity skills'),
(18, 'Creative writing'),
(19, 'Graphic design'),
(20, 'Video editing'),
(21, 'Writing'),
(26, 'Leadership'),
(27, 'Conflict resolution'),
(29, 'Decision-making'),
(31, 'Training and development'),
(32, 'Performance evaluation'),
(34, 'Financial analysis'),
(35, 'Investment analysis'),
(36, 'Risk assessment'),
(37, 'Market research'),
(38, 'Branding'),
(39, 'Campaign management'),
(41, 'Business planning'),
(42, 'Financial management'),
(44, 'Attention to detail'),
(45, 'Accounting principles'),
(47, 'Information security'),
(48, 'Time management'),
(49, 'Record keeping'),
(50, 'Customer service'),
(52, 'Marketing'),
(53, 'Event planning'),
(54, 'Budget management'),
(55, 'Classroom management'),
(56, 'Lesson planning'),
(57, 'Child assessment'),
(58, 'Adaptability'),
(59, 'Multitasking'),
(61, 'Scientific research'),
(63, 'Translation');

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
(1, 'Vocabulary', 'one of the four words or phrases given a choices means almost SAME as the capitalized word in the preceding sentence. Choose the letter that corresponds to your answer.', 30, 1, '2023-02-17 21:44:02', 1),
(2, 'Basic Math Problems', 'This is a test of your ability to think out solution to quantitative problems in Basic Mathematics. Analyze and solve each problem carefully. Choose the letter that corresponds to your answer.\r\n', 45, 1, '2023-02-17 21:56:12', 3),
(3, 'General Science', 'This is a test of your proficiency in General Science. Choose the letter that corresponds to your answer.', 30, 1, '2023-02-17 22:17:18', 2);

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
(13, 4, 'winding', 1),
(14, 4, 'straight', 0),
(15, 4, 'climbing', 0),
(16, 4, 'rocky', 0),
(17, 5, 'beach', 0),
(18, 5, 'lakeside', 0),
(19, 5, 'quench', 1),
(20, 5, 'dessert', 0),
(21, 6, 'operation', 0),
(22, 6, 'alleviate', 1),
(23, 6, 'gesture', 0),
(24, 6, 'aggravate', 0),
(25, 7, 'heavy', 0),
(26, 7, 'menial', 1),
(27, 7, 'challenging', 0),
(28, 7, 'meticulous', 0),
(29, 8, 'nourish', 1),
(30, 8, 'keep', 0),
(31, 8, 'race', 0),
(32, 8, 'jeopardize', 0),
(33, 9, '2 minutes', 0),
(34, 9, '45 minutes', 0),
(35, 9, '2 hours', 1),
(36, 9, '6 hours', 0),
(37, 10, '₱ 500 000', 1),
(38, 10, '₱ 250 000', 0),
(39, 10, '₱ 1 250 000', 0),
(40, 10, '₱ 1 500 000', 0),
(41, 12, '3 days', 0),
(42, 12, '4 days', 0),
(43, 12, '5 days', 1),
(44, 12, '6 days', 0),
(45, 13, 'a² + c', 1),
(46, 13, 'a² - c²', 0),
(47, 13, 'c² - a²', 0),
(48, 13, '(c - a)²', 0),
(49, 14, '90 kph', 1),
(50, 14, '120 kph', 0),
(51, 14, '130 kph', 0),
(52, 14, '150 kph', 0),
(53, 15, 'Mammal', 0),
(54, 15, 'Amphibian', 1),
(55, 15, 'Reptile', 0),
(56, 15, 'Avian', 0),
(57, 16, 'hydrogen', 1),
(58, 16, 'oxygen', 0),
(59, 16, 'nitrogen', 0),
(60, 16, 'helium', 0),
(61, 17, 'milimeter', 0),
(62, 17, 'centimeter', 0),
(63, 17, 'nanometer', 1),
(64, 17, 'micrometer', 0),
(65, 18, 'Coriolis Effect', 0),
(66, 18, 'Carbon Cycle', 0),
(67, 18, 'Greenhouse Effect', 1),
(68, 18, 'Global Warming', 0),
(69, 19, 'Mitochondria', 1),
(70, 19, 'Nucleus', 0),
(71, 19, 'Cytoplasm', 0),
(72, 19, 'Cell Membrane', 0);

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
(4, ' The SINUOUS road curve narrowly up the mountain.', 1),
(5, ' When we reached the oasis, we were able to SLAKE our thirst.', 1),
(6, 'The knowledge that Harold\'s surgery ha been successful MITIGATED his family\'s fear.', 1),
(7, 'The easiest time to let imagination roam is when you\'re doing MUNDANE jobs.', 1),
(8, ' When Jessie brings us a young rabbit, we NURTURE it carefully.', 1),
(9, 'A man rowed 16km upstream in 4 hours. If the river flowed with a current of 2 kph, how long did the man\'s return trip take?', 2),
(10, 'Mr. Guevarra had ₱ 2 000 000.00 to invest. He invested part of it at 5% per year and the remainder at 4% per year. After one year, his investment grew to ₱ 2 095 000.00. How much of the original investment was invested at 5%?\r\n', 2),
(12, 'If 6 workers can complete 9 identical jobs in 3 days, how long will it take 4 workers to complete 10 such jobs? ', 2),
(13, 'In a right triangle, sides a, b, c have values such that a > b > c. Which of the following expresses the value of b²? ', 2),
(14, 'A train went 300 km from Province A to Province B at an average rate of 180 kph. At what speed did it travel on the way back if its average speed for the whole trip was 120 kph?', 2),
(15, 'Animals which live on land but return to the water to breed.', 3),
(16, 'The sun is mostly made of which gas?', 3),
(17, 'Of the following metric units which one is the smallest?', 3),
(18, 'A rise in atmosphere temperature due to an increase in carbon dioxide, methane and other gases that trap heat in the atmosphere is called _____.', 3),
(19, 'The powerhouse of the cell.', 3);

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
(3, 'student name sample', 'user@gmail.com', '$2y$10$dOFXxqdDGFW.V3YDp/KPUuFPtOTV0m7Kpl1x2AkjA6Mf/YnbNbvMi', 0, '334467', '2023-01-05 23:40:50', '', ''),
(7, 'student name sample', 'user2@gmail.com', '$2y$10$dOFXxqdDGFW.V3YDp/KPUuFPtOTV0m7Kpl1x2AkjA6Mf/YnbNbvMi', 0, '334467', '2023-01-05 23:40:50', '', '');

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
-- Indexes for table `career_goals`
--
ALTER TABLE `career_goals`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `hobbies_interests`
--
ALTER TABLE `hobbies_interests`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `personality_traits`
--
ALTER TABLE `personality_traits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `science_questionnaire`
--
ALTER TABLE `science_questionnaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `archived_courses`
--
ALTER TABLE `archived_courses`
  MODIFY `crs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `career_goals`
--
ALTER TABLE `career_goals`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `hobbies_interests`
--
ALTER TABLE `hobbies_interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `interests`
--
ALTER TABLE `interests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

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
-- AUTO_INCREMENT for table `personality_traits`
--
ALTER TABLE `personality_traits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `science_questionnaire`
--
ALTER TABLE `science_questionnaire`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tbl_exam_subjects`
--
ALTER TABLE `tbl_exam_subjects`
  MODIFY `subj_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_exam_topics`
--
ALTER TABLE `tbl_exam_topics`
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_que_answers`
--
ALTER TABLE `tbl_que_answers`
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_topic_questions`
--
ALTER TABLE `tbl_topic_questions`
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
