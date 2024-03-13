-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2024 at 04:41 PM
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
-- Database: `education`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE `assignment` (
  `assignment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `assignment_title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `file_attachment` varchar(255) NOT NULL,
  `start_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `due_date` datetime NOT NULL,
  `total_score` int(10) NOT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `course_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `material_id` int(6) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `assignment`
--

INSERT INTO `assignment` (`assignment_id`, `assignment_title`, `description`, `file_attachment`, `start_date`, `due_date`, `total_score`, `user_id`, `course_id`, `material_id`) VALUES
(0000000002, 'TEST', 'asdasda', 'lesson_65eeb82c05adf.jpg', '2024-03-19 17:00:00', '2024-03-20 00:00:00', 10, 000038, 000027, 10),
(0000000003, 'Assignment', '456546546554654665465', 'lesson_65eebcc0c1588.sql', '2024-03-10 17:00:00', '2024-03-11 00:00:00', 10, 000038, 000027, 10),
(0000000004, 'test2', 'asdada6546556465', 'assignment_65eebf1968c94.sql', '2024-03-12 20:19:00', '2024-03-13 00:00:00', 10, 000038, 000027, 10),
(0000000005, 'Assignment', '124545545454', 'assignment_65eebf916baba.sql', '2024-03-20 08:23:00', '2024-03-20 00:00:00', 10, 000038, 000027, 10),
(0000000006, 'KUY', '54564564654654', 'assignment_65eec027636aa.pdf', '2024-03-11 08:26:15', '2024-03-20 03:25:00', 10, 000038, 000027, 10),
(0000000007, 'DATE', 'asdas', 'assignment_65eec28f957f0.jpg', '2024-03-11 08:36:31', '2024-04-01 18:36:00', 10, 000038, 000027, 10),
(0000000008, '555555555555555', '77777777777777777', 'assignment_65ef3929be753.pdf', '2024-03-11 17:02:33', '2024-03-21 00:04:00', 5, 000038, 000027, 10),
(0000000009, 'test', 'asdasda', 'assignment_65f04c0e91177.jpeg', '2024-03-12 12:35:26', '2024-03-15 22:35:00', 10, 000024, 000022, NULL),
(0000000010, 'test4444444444', 'asdasdasdasda', 'assignment_65f04cc14aefc.jpeg', '2024-03-12 12:38:25', '2024-03-28 21:40:00', 10, 000024, 000022, NULL),
(0000000012, 'ฟหกฟหกหฟกฟกฟหกฟห', 'ฟกฟหก', 'assignment_65f05395b022a.jpeg', '2024-03-12 13:07:33', '2024-03-14 22:08:00', 10, 000024, 000028, 15);

-- --------------------------------------------------------

--
-- Table structure for table `attempts`
--

CREATE TABLE `attempts` (
  `attempts_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `total_score` int(10) NOT NULL,
  `starttime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `endtime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `quiz_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `student_id` int(11) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attempts`
--

INSERT INTO `attempts` (`attempts_id`, `total_score`, `starttime`, `endtime`, `quiz_id`, `student_id`) VALUES
(00001, 2, '2024-03-12 05:02:33', '2024-03-12 05:02:33', 00000000001, 00000000024),
(00002, 2, '2024-03-12 05:07:34', '2024-03-12 05:07:34', 00000000001, 00000000024),
(00003, 1, '2024-03-12 05:07:42', '2024-03-12 05:07:42', 00000000001, 00000000024);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `course_name` varchar(200) NOT NULL,
  `course_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `sec_id` int(1) NOT NULL,
  `credits` int(1) NOT NULL,
  `semester` int(1) NOT NULL,
  `year` int(4) NOT NULL,
  `course_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_name`, `course_description`, `sec_id`, `credits`, `semester`, `year`, `course_image`) VALUES
(0000000022, 'Science', 'วิทยาศาสตร์ (Science) เป็นการศึกษาและทำค้นคว้าทางวิทยาศาสตร์ที่เน้นการเรียนรู้และเข้าใจเกี่ยวกับโลกและสิ่งต่าง ๆ ในทางทั่วไป โดยการใช้วิธีการทางวิทยาศาสตร์ เป็นกลุ่มวิชาที่แตกต่างกันออกไปอย่างมากและมีหลายสาขาที่ศึกษาเนื้อหาที่แตกต่างกันไป', 1, 1, 1, 1, 'course_65e6be86e1dc8.jpg'),
(0000000024, 'Math', 'คณิตศาสตร์ (Mathematics) เป็นวิชาที่ศึกษาเกี่ยวกับจำนวน, โครงสร้าง, และการเปลี่ยนแปลงของสิ่งต่าง ๆ ภายใต้หลาย ๆ แขนงที่ทำให้คณิตศาสตร์กว้างไปทั่ว ภายในคณิตศาสตร์, ความรู้นี้ถูกแบ่งออกเป็นหลายสาขา, ได้แก่:', 2, 3, 1, 2567, 'course_65e6bf46c7df0.jpg'),
(0000000025, 'Thai', 'ภาษาไทยซึ่งใช้เพื่ออธิบายเนื้อหาหรือรายละเอียดของวิชานั้น ๆ ซึ่งส่วนมากจะปรากฏในเอกสารหรือเว็บไซต์ที่มีการเสนอวิชานั้น ๆ เพื่อให้ผู้เรียนหรือบุคคลทั่วไปทราบถึงรายละเอียดเกี่ยวกับวัตถุประสงค์ของวิชานั้น ๆ และเนื้อหาที่จะถูกเรียนรู้ในระหว่างการเรียนวิชานั้น', 2, 3, 1, 2567, 'course_65e6dc8b74f1d.jpg'),
(0000000026, 'ENGLISH', 'ENGLISH', 1, 1, 1, 1, 'course_65edcb7feb1bc.jpg'),
(0000000027, 'Physics', 'ASDASDADADASDASDASSDAS', 1, 1, 1, 1, 'course_65eeb537da54f.jpg'),
(0000000028, 'TFT', 'TFTFTTFTFTFTTFTFTFTF', 1, 1, 1, 1, 'course_65f04e3488ace.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `faculty_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`) VALUES
('china', 'ศิลป์-จีน\r\n'),
('com', 'การงานคอม'),
('gifted', 'กิฟเต็ด'),
('japan', 'ศิลป์-ญี่ปุ่น'),
('math', 'ศิลป์-คำนวน'),
('sma', 'วิทย์-คณิต');

-- --------------------------------------------------------

--
-- Table structure for table `material`
--

CREATE TABLE `material` (
  `material_id` int(5) NOT NULL,
  `material_name` varchar(255) NOT NULL,
  `course_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `material`
--

INSERT INTO `material` (`material_id`, `material_name`, `course_id`) VALUES
(1, 'Material', 000026),
(2, 'Lesson', 000026),
(4, '1', 000026),
(5, 'For TA', 000026),
(8, 'Lesson', 000027),
(9, 'Material', 000027),
(10, 'Assignment', 000027),
(11, 'Quiz', 000027),
(12, 'Anouncement', 000027),
(13, 'Lesson', 000028),
(14, 'Material', 000028),
(15, 'Assignment', 000028),
(16, 'Quiz', 000028),
(17, 'Anouncement', 000028);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `question_title` varchar(255) NOT NULL,
  `choice` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `score` int(10) NOT NULL,
  `quiz_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `question_a` varchar(255) DEFAULT NULL,
  `question_b` varchar(255) DEFAULT NULL,
  `question_c` varchar(255) DEFAULT NULL,
  `question_d` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question_title`, `choice`, `answer`, `score`, `quiz_id`, `question_a`, `question_b`, `question_c`, `question_d`) VALUES
(00001, '1+1', '', 'A', 0, 00000000001, '2', '4', '5', '6'),
(00002, '5+5', '', 'C', 0, 00000000001, '2', '5', '10', '6');

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `quiz_id` int(5) UNSIGNED ZEROFILL NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `file_attachment` int(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `total_score` int(10) NOT NULL,
  `teacher_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `course_id` int(11) UNSIGNED ZEROFILL NOT NULL,
  `material_id` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`quiz_id`, `title`, `description`, `file_attachment`, `start_date`, `due_date`, `total_score`, `teacher_id`, `course_id`, `material_id`) VALUES
(00001, 'test', 'test', 0, '2024-03-12 18:01:00', '2024-03-12 18:01:00', 5, 00000000007, 00000000027, 11);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` varchar(255) NOT NULL,
  `role_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
('academic', 'academic'),
('student', 'student\r\n'),
('teacher', 'teacher'),
('user', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `faculty` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_thai_520_w2 NOT NULL,
  `year` int(5) NOT NULL,
  `gpa` float NOT NULL,
  `total_credit` int(10) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `user_id`, `faculty`, `year`, `gpa`, `total_credit`, `role`) VALUES
(000018, 000033, 'sma', 0, 0, 0, 'student'),
(000019, 000034, 'sma', 0, 0, 0, 'student'),
(000020, 000035, 'gifted', 0, 0, 0, 'student'),
(000021, 000036, 'math', 0, 0, 0, 'student'),
(000022, 000039, 'math', 0, 0, 0, 'student');

-- --------------------------------------------------------

--
-- Table structure for table `student_subject`
--

CREATE TABLE `student_subject` (
  `attend_id` int(6) NOT NULL,
  `student_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `course_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `sec` int(6) NOT NULL,
  `semester` int(6) NOT NULL,
  `year` int(6) NOT NULL,
  `grade` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_subject`
--

INSERT INTO `student_subject` (`attend_id`, `student_id`, `course_id`, `sec`, `semester`, `year`, `grade`) VALUES
(9, 000018, 000022, 0, 1, 0, 0),
(10, 000019, 000022, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE `submission` (
  `submission_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `assignment_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `student_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `submit_file` varchar(255) NOT NULL,
  `send_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `score` int(10) NOT NULL,
  `status` enum('submited','unsubmited') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `faculty` varchar(200) NOT NULL,
  `role` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `user_id`, `faculty`, `role`) VALUES
(000002, 000011, '', 'teacher'),
(000003, 000012, '', 'teacher'),
(000004, 000019, '', 'teacher'),
(000005, 000021, '', 'teacher'),
(000006, 000022, '', 'teacher'),
(000007, 000024, '', 'teacher'),
(000008, 000038, '', 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_subject`
--

CREATE TABLE `teacher_subject` (
  `teaches_id` int(6) NOT NULL,
  `teacher_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `course_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `sec` int(2) NOT NULL,
  `year` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_subject`
--

INSERT INTO `teacher_subject` (`teaches_id`, `teacher_id`, `course_id`, `sec`, `year`) VALUES
(56, 000006, 0000000024, 0, 0),
(57, 000005, 0000000024, 1, 1),
(58, 000004, 0000000024, 1, 1),
(59, 000004, 0000000024, 1, 1),
(60, 000002, 0000000024, 1, 1),
(61, 000003, 0000000024, 1, 1),
(62, 000005, 0000000024, 1, 1),
(63, 000006, 0000000022, 1, 1),
(64, 000007, 0000000022, 1, 1),
(65, 000006, 0000000022, 1, 1),
(67, 000007, 0000000027, 4, 2),
(68, 000007, 0000000028, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topic`
--

CREATE TABLE `topic` (
  `topic_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `topic_title` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `topic_description` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `material_id` int(5) NOT NULL,
  `date_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `topic_file` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `topic`
--

INSERT INTO `topic` (`topic_id`, `topic_title`, `topic_description`, `material_id`, `date_upload`, `topic_file`, `user_id`) VALUES
(0000000077, 'kut', 'asd', 13, '2024-03-12 12:58:45', '', 000024),
(0000000079, 'asdasd', 'asdasd', 13, '2024-03-12 13:03:58', 'lesson_65f052beb7d7d.jpeg', 000024),
(0000000080, 'kut2245', 'gsxrgfzz', 14, '2024-03-12 13:05:02', '', 000024),
(0000000081, 'aadsadasdas', 'asdasd', 14, '2024-03-12 13:05:39', '', 000024);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(6) UNSIGNED ZEROFILL NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `phonenum` varchar(10) NOT NULL,
  `profile_picture` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `firstname`, `lastname`, `email`, `password`, `dob`, `gender`, `phonenum`, `profile_picture`, `role`) VALUES
(000009, '111', '11', '111', '111', '2024-03-11', '111', '111', '111', 'student'),
(000010, 'eee', 'eee', 'eee', 'eee', '2024-02-01', 'eee', 'eee', 'eee', 'student'),
(000011, 'teacher', 'teacher', 'teacher', 'teacher', '2024-02-01', 'teacher', 'teacher', '', 'teacher'),
(000012, 'phu', 'phu', '123', '213', '2024-03-06', 'male', '084', '', 'teacher'),
(000013, 'wachi', 'wachi', 'acsa', 'bd6hLVYvau', '2024-03-11', 'male', '0830942407', 'profile_65e8a043185be.jpg', 'teacher'),
(000014, 'rain', 'asd', 'asd', 'o83tSUcvN8', '2024-03-12', 'male', '0830942407', 'profile_65e8a0c0bf17c.jpg', 'teacher'),
(000015, 'rain', 'asd', 'asd', '7vZUuA9E4h', '2024-03-12', 'male', '0830942407', 'profile_65e8a0d5d31a0.jpg', 'teacher'),
(000016, 'rain', 'asd', 'asd', 'OU58N5EGFB', '2024-03-12', 'male', '0830942407', 'profile_65e8a0f285cea.jpg', 'teacher'),
(000017, 'rain', 'asd', 'asd', 'eGqL49SILz', '2024-03-12', 'male', '0830942407', 'profile_65e8a0fb9f593.jpg', 'teacher'),
(000018, 'rain', 'asd', 'asd', 'HbCjgA4apn', '2024-03-12', 'male', '0830942407', 'profile_65e8a1108cdb6.jpg', 'teacher'),
(000019, 'aaaaa', 'aaaaa', 'aaaaa', 'aaaaa', '2024-03-05', 'male', 'aaa', '', 'teacher'),
(000020, 'rain', 'rain', 'rain', 'yedhZpZUYu', '2024-03-15', 'male', '0830942407', 'profile_65e8a3b24b647.jpg', 'student'),
(000021, 'kuy', 'kuy', '123', 'fntGlKBkXl', '2024-03-08', 'male', '0830942407', 'profile_65e8a409d1309.jpg', 'teacher'),
(000022, 'Rain Gamer', 'TH', 'rainandrain3@gmail.com', '3pL4lyVZQz', '2024-03-04', 'female', '0830942407', 'profile_65e8a4d153ffe.jpg', 'teacher'),
(000023, 'rain', 'rain', 'rain', 'creRMOFs8Y', '1222-12-12', 'male', '0830942407', '', 'student'),
(000024, '2', '2', '2', 'aaaa', '0002-02-02', 'male', '0830942407', '', 'teacher'),
(000025, 'rain', 'rqin', '123', '12SD9bNpNg', '0001-01-01', 'male', '0830942407', '', 'student'),
(000026, 'rain', 'rqin', '123', '7go4eZtcMo', '0001-01-01', 'male', '0830942407', '', 'student'),
(000027, '111', '111', '111', 'K59rQUJig0', '0011-01-01', 'female', '0830942407', '', 'student'),
(000028, '111', '111', '111', 'dFtAcAgQRr', '0011-01-01', 'female', '0830942407', '', 'student'),
(000029, '111', '111', '111', 'pgjJBQutEg', '0011-01-01', 'female', '0830942407', '', 'student'),
(000030, 'rain', 'rain', 'rain', 'a8j14vjUbi', '0001-01-11', 'male', '0830942407', '', 'student'),
(000031, 'rain', 'rain', 'rain', 'wjN5k2Opbw', '0001-01-11', 'male', '0830942407', '', 'student'),
(000032, 'rain', 'rain', 'rain', 'TlTLJyD13M', '0001-01-11', 'male', '0830942407', '', 'student'),
(000033, 'rain', 'rain', 'rain', 'kJ1HmbQDU2', '0001-01-11', 'male', '0830942407', '', 'student'),
(000034, 'Rain Gamer', 'TH', 'rainandrain3@gmail.com', 'WygJIx55gx', '0001-11-11', 'male', '0830942407', '', 'student'),
(000035, 'wa', 'wea', 'was', 'G7q1p7zErz', '2024-03-05', 'male', '0830942407', '', 'student'),
(000036, 'ka', 'ka', 'ka', '7wQcRizJPc', '0004-04-04', 'male', '0830942407', '', 'student'),
(000038, 'admin', 'admin', '123456', 'aaa', '0001-01-01', 'male', '0830942407', 'profile_65eb236bd4f18.sPkGlUjpXsL_JcRPxYdm', 'academic'),
(000039, 'rain', 'rain', 'rain', 'aaa', '0001-01-01', 'male', '0830942407', 'profile_65ec74e16be3b.avif', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignment`
--
ALTER TABLE `assignment`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `acourse_id` (`course_id`),
  ADD KEY `auser_id` (`user_id`),
  ADD KEY `amaterial_id` (`material_id`);

--
-- Indexes for table `attempts`
--
ALTER TABLE `attempts`
  ADD PRIMARY KEY (`attempts_id`),
  ADD KEY `aquiz_id` (`quiz_id`),
  ADD KEY `astudent_id` (`student_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`material_id`),
  ADD KEY `mcourse_id` (`course_id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `qquiz` (`quiz_id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`quiz_id`),
  ADD KEY `qteacher_id` (`teacher_id`),
  ADD KEY `qcourse_id` (`course_id`),
  ADD KEY `qmaterial_id` (`material_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `suser_id` (`user_id`),
  ADD KEY `srole` (`role`),
  ADD KEY `sfaculty` (`faculty`);

--
-- Indexes for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD PRIMARY KEY (`attend_id`),
  ADD KEY `aastudent` (`student_id`),
  ADD KEY `aacourse_id` (`course_id`);

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
  ADD PRIMARY KEY (`submission_id`),
  ADD KEY `sassignment_id` (`assignment_id`),
  ADD KEY `sstudent_id` (`student_id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `tuser_id` (`user_id`),
  ADD KEY `trole` (`role`);

--
-- Indexes for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD PRIMARY KEY (`teaches_id`),
  ADD KEY `tteacher_id` (`teacher_id`),
  ADD KEY `tcourse_id` (`course_id`);

--
-- Indexes for table `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `tmaterial_id` (`material_id`),
  ADD KEY `ttuser_id` (`user_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role` (`role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignment`
--
ALTER TABLE `assignment`
  MODIFY `assignment_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `attempts`
--
ALTER TABLE `attempts`
  MODIFY `attempts_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `material`
--
ALTER TABLE `material`
  MODIFY `material_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `quiz_id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student_subject`
--
ALTER TABLE `student_subject`
  MODIFY `attend_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
  MODIFY `submission_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  MODIFY `teaches_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `topic`
--
ALTER TABLE `topic`
  MODIFY `topic_id` int(10) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `acourse_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `amaterial_id` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`),
  ADD CONSTRAINT `auser_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `attempts`
--
ALTER TABLE `attempts`
  ADD CONSTRAINT `aquiz_id` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`),
  ADD CONSTRAINT `astudent_id` FOREIGN KEY (`student_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `mcourse_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `qquiz` FOREIGN KEY (`quiz_id`) REFERENCES `quiz` (`quiz_id`);

--
-- Constraints for table `quiz`
--
ALTER TABLE `quiz`
  ADD CONSTRAINT `qcourse_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `qmaterial_id` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`),
  ADD CONSTRAINT `qteacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `sfaculty` FOREIGN KEY (`faculty`) REFERENCES `faculty` (`faculty_id`),
  ADD CONSTRAINT `srole` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `suser_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student_subject`
--
ALTER TABLE `student_subject`
  ADD CONSTRAINT `aacourse_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `aastudent` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `submission`
--
ALTER TABLE `submission`
  ADD CONSTRAINT `sassignment_id` FOREIGN KEY (`assignment_id`) REFERENCES `assignment` (`assignment_id`),
  ADD CONSTRAINT `sstudent_id` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`);

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `trole` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`),
  ADD CONSTRAINT `tuser_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher_subject`
--
ALTER TABLE `teacher_subject`
  ADD CONSTRAINT `tcourse_id` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `tteacher_id` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`);

--
-- Constraints for table `topic`
--
ALTER TABLE `topic`
  ADD CONSTRAINT `tmaterial_id` FOREIGN KEY (`material_id`) REFERENCES `material` (`material_id`),
  ADD CONSTRAINT `ttuser_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `role` FOREIGN KEY (`role`) REFERENCES `role` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
