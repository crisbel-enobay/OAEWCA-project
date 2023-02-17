-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
<<<<<<< HEAD
-- Generation Time: Feb 17, 2023 at 11:31 PM
=======
-- Generation Time: Feb 17, 2023 at 09:41 PM
>>>>>>> 50e16f8b973676df3bc3efc94ad1ba31bf9827de
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
  `exam_time` time NOT NULL,
  `exam_time_end` time NOT NULL,
  `exam_date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_schedule`
--

INSERT INTO `admin_schedule` (`id`, `exam_date`, `exam_time`, `exam_time_end`, `exam_date_created`) VALUES
(56, '2023-02-16', '21:00:00', '23:00:00', '2023-02-16 20:39:55'),
(58, '2023-02-18', '15:00:00', '16:00:00', '2023-02-16 20:39:55');

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
  `secondary_hobbies` varchar(255) NOT NULL,
  `related_interest` varchar(255) NOT NULL,
  `secondary_interest` varchar(255) NOT NULL,
  `strand` varchar(255) NOT NULL,
  `average_score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`crs_id`, `course`, `related_hobbies`, `secondary_hobbies`, `related_interest`, `secondary_interest`, `strand`, `average_score`) VALUES
(1, 'Bachelor of Science in Mathematics (BSMath)', 'Mathematics', '0', '0', '0', '0', 0),
(2, 'Bachelor of Science in Psychology (BSPsych)', 'Communicating', '0', '0', '0', '0', 0),
(3, 'Bachelor of Science in Criminology (BSCrim)', 'Volunteering', '0', '0', '0', '0', 0),
(4, 'Bachelor of Science in Computer Science (BSCS/BSComSci)', 'Programming/Coding', '0', '0', '0', '0', 0),
(5, 'Bachelor of Science in Information System (BSIS)', 'Programming/Coding', '0', '0', '0', '0', 0),
(6, 'Bachelor of Science in Information Technology (BSIT)', 'Programming/Coding', '0', '0', '0', '0', 0),
(7, 'Bachelor of Science in Entertainment and Multimedia Computing (BSEMC)', 'Programming/Coding', '0', '0', '0', '0', 0),
(8, 'Bachelor of Arts in Political Science (ABPS/ABPolSci)', 'Volunteering', '0', '0', '0', '0', 0),
(9, 'Bachelor of Arts in Communication (BAComm)', 'Communicating', '0', '0', '0', '0', 0),
(10, 'Bachelor of Arts in Behavioral Science: Organizational and Social Systems Development (ABBS-OSSD)', 'Communicating', '0', '0', '0', '0', 0),
(11, 'Bachelor in Public Administration (BPA)', 'Communicating', '0', '0', '0', '0', 0),
(12, 'Bachelor of Science in Business Administration: Human Resource Development Management (BSBA-HRDM)', 'Researching', '0', '0', '0', '0', 0),
(13, 'Bachelor of Science in Business Administration: Financial Management (BSBA-FMGT)', 'Researching', '0', '0', '0', '0', 0),
(14, 'Bachelor of Science in Business Administration: Marketing Management (BSBA-MKMGT)', 'Researching', '0', '0', '0', '0', 0),
(15, 'Bachelor of Science in Entrepreneurial Management (BSEM)', 'Researching', '0', '0', '0', '0', 0),
(16, 'Bachelor of Science in Accountancy (BSA)', 'Researching', '0', '0', '0', '0', 0),
(17, 'Bachelor of Science in Accounting Information System (BSAIS)', 'Researching', '0', '0', '0', '0', 0),
(18, 'Bachelor of Science in Office Administration (BSOAd)', 'Researching', '0', '0', '0', '0', 0),
(19, 'Bachelor of Science in Tourism Management (BSTM)', 'Travelling', '0', '0', '0', '0', 0),
(20, 'Bachelor of Science in Hotel and Restaurant Management (BSHRM)', 'House Keeping', '0', '0', '0', '0', 0),
(21, 'Bachelor in Elementary Education: Early Childhood (BEEd-ECEd)', 'House Keeping', '0', '0', '0', '0', 0),
(22, 'Bachelor in Elementary Education: Special Education (BEEd-SpEd)', '', '0', '0', '0', '0', 0),
(23, 'Bachelor in Secondary Education: Science (BSEd-Sci)', 'Researching', '0', '0', '0', '0', 0),
(24, 'Bachelor in Secondary Education: English (BSEd-Eng)', 'Writing', '0', '0', '0', '0', 0),
(25, 'Bachelor in Secondary Education: English-Chinese (BSEd-EngChi)', 'Writing', '0', '0', '0', '0', 0),
(26, 'Bachelor in Secondary Education: BTLE-HE ( Bachelor of Technology and Livelihood Education major in Home Economics)', 'Assembling/Disassembling', '0', '0', '0', '0', 0);

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
  `exam_time` time NOT NULL,
  `exam_time_end` time NOT NULL,
  `status` varchar(255) NOT NULL,
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

INSERT INTO `generated_codes` (`id`, `email`, `exam_key`, `exam_date`, `exam_time`, `exam_time_end`, `status`, `strand`, `pref_course`, `pref_secondary_course`, `pref_tertiary_course`, `interest`, `secondary_interest`, `tertiary_interest`, `hobby`, `secondary_hobby`, `tertiary_hobby`, `exam_key_created_at`) VALUES
(45, 'user@gmail.com', 'walx2386', '2023-02-18', '04:00:00', '06:33:00', 'active', 'STEM', 'Bachelor of Science in Psychology (BSPsych)', 'Bachelor of Science in Criminology (BSCrim)', 'Bachelor of Science in Computer Science (BSCS/BSComSci)', 'analyzing', 'information gathering', 'problem solving', 'Self Studying', 'Videography', 'Writing', '2023-02-18 02:10:54'),
(46, 'lebbraumjayce@gmail.com', 'pgxc1279', '2023-02-16', '21:00:00', '23:00:00', 'pending', 'STEM', 'Bachelor of Science in Psychology (BSPsych)', 'Bachelor of Science in Mathematics (BSMath)', 'Bachelor of Science in Computer Science (BSCS/BSComSci)', 'numbers', 'analyzing', 'problem solving', 'Self Studying', 'Videography', 'Travelling', '2023-02-18 04:32:30');

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
(2, 'Science', 'This includes general knowledge in science', 1, '2023-02-17 22:16:36'),
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
<<<<<<< HEAD
(1, 'Vocabulary', 'one of the four words or phrases given a choices means almost SAME as the capitalized word in the preceding sentence. Choose the letter that corresponds to your answer.', 30, 1, '2023-02-17 21:44:02', 1),
(2, 'Basic Math Problems', 'This is a test of your ability to think out solution to quantitative problems in Basic Mathematics. Analyze and solve each problem carefully. Choose the letter that corresponds to your answer.\r\n', 45, 1, '2023-02-17 21:56:12', 3),
(3, 'General Science', 'This is a test of your proficiency in General Science. Choose the letter that corresponds to your answer.', 30, 1, '2023-02-17 22:17:18', 2);
=======
(1, 'Verbal Test', 'This includes sentence and grammar construction', 60, 1, '2023-02-11 14:59:31', 1),
(2, 'fafea', 'faefwaf', 0, 1, '2023-02-14 05:37:30', 1),
(3, 'afa', 'fawfaw', 0, 1, '2023-02-14 06:25:22', 3);
>>>>>>> 50e16f8b973676df3bc3efc94ad1ba31bf9827de

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
<<<<<<< HEAD
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
=======
(1, 1, 'verb', 1),
(2, 1, 'noun', 0),
(3, 1, 'pronoun', 0),
(4, 1, 'adjective', 0),
(5, 2, '%% 6minutes', 0),
(6, 2, '%% 6minutes', 0),
(7, 2, '%% 6minutes', 1),
(8, 2, '%% 6minutes', 0),
(9, 3, '%', 1),
(10, 3, '$%', 0),
(11, 3, '%', 0),
(12, 3, '%', 0),
(13, 4, '2 minutes', 1),
(14, 4, '2 minutes', 0),
(15, 4, '2 minutes', 0),
(16, 4, '2 minutes', 0),
(17, 5, 'eaf', 0),
(18, 5, '2 !@', 1),
(19, 5, '2 !@', 0),
(20, 5, '2 !@', 0);
>>>>>>> 50e16f8b973676df3bc3efc94ad1ba31bf9827de

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
<<<<<<< HEAD
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
=======
(1, 'A word used to describe an action, state, or occurrence, and forming the main part of the predicate of a sentence', 1),
(2, ' fafeafaefaenfafae %%6 kim', 2),
(3, ' %', 2),
(4, ' 2 minutes', 2),
(5, ' afeafa 2 !@', 2);
>>>>>>> 50e16f8b973676df3bc3efc94ad1ba31bf9827de

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
  MODIFY `topic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_que_answers`
--
ALTER TABLE `tbl_que_answers`
<<<<<<< HEAD
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
=======
  MODIFY `ans_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
>>>>>>> 50e16f8b973676df3bc3efc94ad1ba31bf9827de

--
-- AUTO_INCREMENT for table `tbl_topic_questions`
--
ALTER TABLE `tbl_topic_questions`
<<<<<<< HEAD
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
=======
  MODIFY `que_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
>>>>>>> 50e16f8b973676df3bc3efc94ad1ba31bf9827de

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
