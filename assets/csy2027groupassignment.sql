-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2020 at 06:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csy2027groupassignment`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `admission_id` int(12) NOT NULL,
  `assigned_id` int(8) DEFAULT NULL,
  `status` tinyint(1) NOT NULL,
  `firstname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temporary_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(15) NOT NULL,
  `course_code` int(8) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`admission_id`, `assigned_id`, `status`, `firstname`, `middlename`, `surname`, `temporary_address`, `permanent_address`, `contact`, `course_code`, `email`, `qualification`) VALUES
(1, 1002, 1, 'Ram', 'Kumar', 'Chandra', '1234', 'Address1', 12345, 281, 'ram@woodland.com', 'BSc. Data Science'),
(2, 1012, 1, 'Shyam', 'Hari', 'Raj', '5431', 'Address2', 12345, 2009, 'shyam@woodland.com', 'BSc. Computing'),
(3, 1013, 0, 'Hari', 'Kumar', 'Prashad', '3224', 'Address3', 12345, 2009, 'hari@woodland.com', 'BSc. Computing'),
(4, 1014, 0, 'Krishna', 'Prashad', 'Lal', '23422', 'Address4', 12345, 2009, 'krishna@woodland.com', 'BSc. Computing'),
(5, 0, 0, 'Shiva', 'Kumar', 'Sharma', '4535345', 'Address5', 12345, 281, 'shiva@woodland.com', 'BSc. Data Science'),
(6, 1016, 1, 'Ganesh', 'Raj', 'Test', '1324', 'Address7', 12345, 2009, 'ganesh@woodland.com', 'BSc. Computing'),
(7, 1017, 0, 'Rajesh', 'Sharma', 'Hari', 'aaa', 'aaa', 123, 23, 'rajesh@woodland.com', 'BSc. Networking');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(16) NOT NULL,
  `grade` char(2) DEFAULT NULL,
  `module_code` int(8) NOT NULL,
  `student_id` int(12) NOT NULL,
  `assignment_file` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `attendence`
--

CREATE TABLE `attendence` (
  `attendance_id` int(10) NOT NULL,
  `module_code` int(4) NOT NULL,
  `student_id` int(8) NOT NULL,
  `staff_id` int(6) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `attendence`
--

INSERT INTO `attendence` (`attendance_id`, `module_code`, `student_id`, `staff_id`, `date`, `status`) VALUES
(2100232020, 2, 1002, 3, '2020-04-10', 1),
(2101232020, 2, 1012, 3, '2020-04-10', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` int(8) NOT NULL,
  `course_name` varchar(64) NOT NULL,
  `course_duration` tinyint(1) NOT NULL,
  `department_id` int(8) NOT NULL,
  `course_leader` int(10) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `course_duration`, `department_id`, `course_leader`, `archive`) VALUES
(11, 'Management', 33, 1, NULL, 0),
(23, 'Network Engineering', 1, 1, 1, 0),
(281, 'Data Analytics', 2, 1, 1, 0),
(1234, 'CourseTest', 12, 1, NULL, 1),
(2009, 'Software Engineering', 1, 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(4) NOT NULL,
  `name` varchar(64) NOT NULL,
  `department_head` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`department_id`, `name`, `department_head`) VALUES
(1, 'Engineering', 12),
(2, 'Management', 10);

-- --------------------------------------------------------

--
-- Table structure for table `diaries`
--

CREATE TABLE `diaries` (
  `diary_id` int(20) NOT NULL,
  `description` text NOT NULL,
  `staff_id` int(10) DEFAULT NULL,
  `student_id` int(12) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_code` int(8) NOT NULL,
  `module_name` varchar(64) NOT NULL,
  `module_duration` tinyint(1) NOT NULL,
  `module_leader` int(10) DEFAULT NULL,
  `course_code` int(8) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_code`, `module_name`, `module_duration`, `module_leader`, `course_code`, `archive`) VALUES
(1, 'Software engineering', 44, 3, 2009, 0),
(2, 'Database', 11, 3, 2009, 0),
(3, 'Computer System', 44, NULL, 23, 0),
(4, 'Web Development', 15, NULL, 2009, 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_files`
--

CREATE TABLE `module_files` (
  `file_id` int(6) NOT NULL,
  `module_id` int(4) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `description` varchar(2048) NOT NULL,
  `file` varchar(255) NOT NULL,
  `type` int(4) NOT NULL,
  `archive` int(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_files`
--

INSERT INTO `module_files` (`file_id`, `module_id`, `filename`, `description`, `file`, `created_at`) VALUES
(1, 2, 'Chapter 1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae commodi animi quos quae odit labore explicabo iusto, in sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'dbchapter1.pdf', '2020-04-08 05:28:40'),
(2, 2, 'Chapter 2', 'Recusandae commodi animi quos quae odit labore explicabo iusto, in sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'dbchapter2.pdf', '2020-04-08 05:28:40'),
(3, 1, 'Chapter 1', 'In sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'secapter3.pdf', '2020-04-08 05:28:40'),
(4, 1, 'Chapter 2', 'Consectetur adipisicing elit. Recusandae commodi animi quos quae odit labore explicabo iusto, in sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'sechapter4.pdf', '2020-04-08 05:28:40'),
(5, 2, 'asdas', 'sadasd', 'dbchapter11.pdf', '2020-04-08 16:37:38');

-- --------------------------------------------------------

--
-- Table structure for table `pat`
--

CREATE TABLE `pat` (
  `pat_id` int(12) NOT NULL,
  `pat_information` text NOT NULL,
  `staff_id` int(6) NOT NULL,
  `student_id` int(8) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `firstname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(15) NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` int(8) NOT NULL,
  `role` tinyint(1) NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `status`, `firstname`, `middlename`, `surname`, `password`, `address`, `contact`, `email`, `subject`, `role`, `approval`, `archive`, `created_at`, `updated_at`) VALUES
(1, 1, 'admin', '', 'admin', '$2y$10$5J1F1t1bPapP.Ye43tx5luar/EL69S6P0ATm7wSNlPRyxo.KmJrSa', 'Woodland University', 123, 'admin@woodland.com', 0, 1, 1, 0, '2020-03-29 13:33:03', '2020-04-04 05:42:05'),
(2, 1, 'Leader', '', 'Leader', '$2y$10$8PyfsUXQiJX4ez4IQj1PFOBEoBsjpOw1ya2ueSy45m6ue/fvsWiTy', 'Woodland University', 123, 'leader@woodland.com', 0, 2, 1, 0, '2020-03-29 13:33:03', '2020-04-10 02:03:10'),
(3, 1, 'Tutor', '', 'Tutor', '$2y$10$bZ8zqaUGp93h/cvbtdhylOrrKAGMB3sRycZFOkO2REdpiZkBnpC9S', 'Woodland University', 123, 'tutor@woodland.com', 0, 3, 1, 0, '2020-03-29 13:34:22', '2020-04-04 08:21:58'),
(4, 1, 'ashish', '', 'Adhikari', '$2y$10$y35jDj58EHZvr0LSfZ.lS.26fZA3pIUofM57nSpDQ4IAvHmLafMeW', 'Bhaktapur', 334412, 'ashish@woodland.com', 12, 2, 0, 0, '2020-04-04 05:01:37', '2020-04-04 14:49:12');

-- --------------------------------------------------------

--
-- Table structure for table `staff_modules`
--

CREATE TABLE `staff_modules` (
  `staff_id` int(10) NOT NULL,
  `module_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(12) NOT NULL,
  `assigned_id` int(8) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pat_tutor` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `assigned_id`, `email`, `password`, `pat_tutor`, `created_at`, `updated_at`) VALUES
(1002, 1002, 'ram@woodland.com', '$2y$10$um0qSWExh11ZzIzOQpoO..HFJdpPGa2Fm/M7vK9x0cC8V7OR1jT2m', 3, '2020-04-07 09:48:54', '2020-04-28 20:42:56'),
(1012, 1012, 'shyam@woodland.com', '$2y$10$TUIFmSfnJuemtiMekAbE6.1cLrONl5diZqXDso.oPNdH/LmnIdkIC', 3, '2020-04-10 03:21:04', '2020-04-28 20:42:54'),
(1016, 1016, 'ganesh@woodland.com', '$2y$10$ymQKHCKDn0skytiLANpcdeR6ZocbneROvFAjQtPB/.ZRQ0QgdwIgO', 3, '2020-04-10 03:28:29', '2020-04-28 20:42:49');

-- --------------------------------------------------------

--
-- Table structure for table `student_modules`
--

CREATE TABLE `student_modules` (
  `student_id` int(12) NOT NULL,
  `module_code` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_modules`
--

INSERT INTO `student_modules` (`student_id`, `module_code`) VALUES
(1002, 2),
(1002, 1),
(1012, 2),
(1012, 1),
(1016, 2),
(1016, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `routine_id` int(12) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `module_code` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`admission_id`),
  ADD KEY `course_code` (`course_code`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `fk_asn_modules` (`module_code`),
  ADD KEY `fk_asn_students` (`student_id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`module_code`,`student_id`,`staff_id`,`date`) USING BTREE,
  ADD KEY `fk_att_staff` (`staff_id`),
  ADD KEY `fk_att_modules` (`module_code`),
  ADD KEY `fk_att_students` (`student_id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`course_code`),
  ADD KEY `fk_c_dep` (`department_id`),
  ADD KEY `course_leader` (`course_leader`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `diaries`
--
ALTER TABLE `diaries`
  ADD PRIMARY KEY (`diary_id`),
  ADD KEY `fk_dia_staffs` (`staff_id`),
  ADD KEY `fk_dia_students` (`student_id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`module_code`),
  ADD KEY `fk_mod_course` (`course_code`),
  ADD KEY `module_leader` (`module_leader`);

--
-- Indexes for table `module_files`
--
ALTER TABLE `module_files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `pat`
--
ALTER TABLE `pat`
  ADD PRIMARY KEY (`pat_id`),
  ADD KEY `fk_pat_staffs` (`staff_id`),
  ADD KEY `fk_pat_students` (`student_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `subject` (`subject`);

--
-- Indexes for table `staff_modules`
--
ALTER TABLE `staff_modules`
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `module_id` (`module_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_s_staff` (`pat_tutor`);

--
-- Indexes for table `student_modules`
--
ALTER TABLE `student_modules`
  ADD KEY `fk_stumod_modules` (`module_code`),
  ADD KEY `fk_stumod_students` (`student_id`);

--
-- Indexes for table `timetables`
--
ALTER TABLE `timetables`
  ADD PRIMARY KEY (`routine_id`),
  ADD KEY `fk_tt_staffs` (`staff_id`),
  ADD KEY `fk_tt_modules` (`module_code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `admission_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diaries`
--
ALTER TABLE `diaries`
  MODIFY `diary_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_files`
--
ALTER TABLE `module_files`
  MODIFY `file_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pat`
--
ALTER TABLE `pat`
  MODIFY `pat_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `routine_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admissions`
--
ALTER TABLE `admissions`
  ADD CONSTRAINT `fk_adm_courses` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`);

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `fk_asn_modules` FOREIGN KEY (`module_code`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_asn_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `attendence`
--
ALTER TABLE `attendence`
  ADD CONSTRAINT `fk_att_modules` FOREIGN KEY (`module_code`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_att_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_att_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `courses`
--
ALTER TABLE `courses`
  ADD CONSTRAINT `fk_c_dep` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_c_staff` FOREIGN KEY (`course_leader`) REFERENCES `departments` (`department_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `diaries`
--
ALTER TABLE `diaries`
  ADD CONSTRAINT `fk_dia_staffs` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_dia_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `fk_mod_course` FOREIGN KEY (`course_code`) REFERENCES `courses` (`course_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mod_staff` FOREIGN KEY (`module_leader`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `module_files`
--
ALTER TABLE `module_files`
  ADD CONSTRAINT `fk_modfiles_modules` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_code`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pat`
--
ALTER TABLE `pat`
  ADD CONSTRAINT `fk_pat_staffs` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pat_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `staff_modules`
--
ALTER TABLE `staff_modules`
  ADD CONSTRAINT `fk_stfmod_modules` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stfmod_staffs` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `student_modules`
--
ALTER TABLE `student_modules`
  ADD CONSTRAINT `fk_stumod_modules` FOREIGN KEY (`module_code`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stumod_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `timetables`
--
ALTER TABLE `timetables`
  ADD CONSTRAINT `fk_tt_modules` FOREIGN KEY (`module_code`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tt_staffs` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
