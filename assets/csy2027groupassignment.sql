-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2020 at 12:28 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(16) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `deadline` datetime NOT NULL,
  `grade` char(2) DEFAULT NULL,
  `module_code` int(8) NOT NULL,
  `course_id` int(8) NOT NULL,
  `staff_id` int(10) NOT NULL,
  `student_id` int(12) NOT NULL,
  `assignment_file` varchar(255) NOT NULL,
  `submission_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` int(8) NOT NULL,
  `course_name` varchar(64) NOT NULL,
  `course_duration` tinyint(1) NOT NULL,
  `department_id` int(8) NOT NULL,
  `course_leader` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `department_id` int(4) NOT NULL,
  `name` varchar(64) NOT NULL,
  `department_head` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `diaries`
--

CREATE TABLE `diaries` (
  `diary_id` int(20) NOT NULL,
  `description` text NOT NULL,
  `staff_id` int(10) NOT NULL,
  `student_id` int(12) NOT NULL,
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
  `module_leader` int(10) NOT NULL,
  `course_code` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `module_files`
--

CREATE TABLE `module_files` (
  `file_id` int(6) NOT NULL,
  `module_id` int(4) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pat`
--

CREATE TABLE `pat` (
  `pad_id` int(12) NOT NULL,
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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student_modules`
--

CREATE TABLE `student_modules` (
  `student_id` int(12) NOT NULL,
  `module_code` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  ADD KEY `fk_asn_staff` (`staff_id`),
  ADD KEY `fk_asn_modules` (`module_code`),
  ADD KEY `fk_asn_students` (`student_id`);

--
-- Indexes for table `attendence`
--
ALTER TABLE `attendence`
  ADD PRIMARY KEY (`attendance_id`),
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
  ADD PRIMARY KEY (`pad_id`),
  ADD KEY `fk_pat_staffs` (`staff_id`),
  ADD KEY `fk_pat_students` (`student_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`);

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
  ADD PRIMARY KEY (`student_id`);

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
  MODIFY `admission_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(16) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `attendance_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `diaries`
--
ALTER TABLE `diaries`
  MODIFY `diary_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `module_files`
--
ALTER TABLE `module_files`
  MODIFY `file_id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pat`
--
ALTER TABLE `pat`
  MODIFY `pad_id` int(12) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `fk_asn_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION,
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
