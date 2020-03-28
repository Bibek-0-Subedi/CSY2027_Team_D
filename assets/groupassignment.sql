-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2020 at 06:45 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

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
  `admission_id` int(8) NOT NULL,
  `assigned_id` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temporary_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `permanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `course_code` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int(5) NOT NULL,
  `assignment_name` varchar(255) NOT NULL,
  `deadline` datetime NOT NULL,
  `grade` varchar(255) NOT NULL DEFAULT 'Not Graded',
  `module_code` int(4) NOT NULL,
  `course_id` int(4) NOT NULL,
  `staff_id` int(6) DEFAULT NULL,
  `student_id` int(8) DEFAULT NULL,
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
  `staff_id` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` int(4) NOT NULL,
  `course_name` varchar(64) NOT NULL,
  `course_duration` tinyint(1) NOT NULL,
  `department_id` int(4) NOT NULL,
  `course_leader` int(6) NOT NULL
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
  `diary_id` int(14) NOT NULL,
  `description` text NOT NULL,
  `staff_id` int(6) NOT NULL,
  `student_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_code` int(4) NOT NULL,
  `module_name` varchar(64) NOT NULL,
  `module_duration` tinyint(1) NOT NULL,
  `module_leader` int(6) NOT NULL,
  `module_file` varchar(255) NOT NULL,
  `course_code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;



--
-- Table structure for table `pat`
--

CREATE TABLE `pat` (
  `pad_id` int(12) NOT NULL,
  `pat_information` text NOT NULL,
  `staff_id` int(6) NOT NULL,
  `student_id` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `middlename` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `approve` int(11) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;



--
-- Table structure for table `staff_modules`
--

CREATE TABLE `staff_modules` (
  `staff_id` int(8) NOT NULL,
  `module_code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `admission_id` int(11) NOT NULL,
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
  `student_id` int(8) NOT NULL,
  `module_code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `routine_id` int(7) NOT NULL,
  `staff_id` int(6) NOT NULL,
  `module_code` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`admission_id`);

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
  ADD KEY `fk_c_dep` (`department_id`);

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
  ADD KEY `fk_stfmod_modules` (`module_code`),
  ADD KEY `fk_stfmod_students` (`staff_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `fk_stu_admissions` (`admission_id`);

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
  ADD PRIMARY KEY (`routine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `admission_id` int(8) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `attendence`
--
ALTER TABLE `attendence`
  MODIFY `attendance_id` int(10) NOT NULL AUTO_INCREMENT;


--
-- AUTO_INCREMENT for table `diaries`
--
ALTER TABLE `diaries`
  MODIFY `diary_id` int(14) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pat`
--
ALTER TABLE `pat`
  MODIFY `pad_id` int(12) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `routine_id` int(7) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

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
  ADD CONSTRAINT `fk_c_dep` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON UPDATE NO ACTION;

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
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`module_leader`) REFERENCES `staff` (`staff_id`);

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
  ADD CONSTRAINT `fk_stfmod_modules` FOREIGN KEY (`module_code`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stfmod_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `fk_stu_admissions` FOREIGN KEY (`admission_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;

--
-- Constraints for table `student_modules`
--
ALTER TABLE `student_modules`
  ADD CONSTRAINT `fk_stumod_modules` FOREIGN KEY (`module_code`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stumod_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;