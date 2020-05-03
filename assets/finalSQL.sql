-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 03, 2020 at 10:23 PM
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
(1, 1002, 1, 'Ram', 'Kumar', 'Chandra', '1234', 'Address1', 12345, 2009, 'bhusal.001aditya@gmail.com', 'BSc. Data Science'),
(2, 1012, 1, 'Shyam', 'Hari', 'Raj', '5431', 'Address2', 12345, 2009, 'shyam@woodland.com', 'BSc. Computing'),
(3, 1013, 1, 'Hari', 'Kumar', 'Prashad', '3224', 'Address3', 12345, 2009, 'hari@woodland.com', 'BSc. Computing'),
(4, 1014, 3, 'Krishna', 'Prashad', 'Lal', '23422', 'Address4', 12345, 2009, 'krishna@woodland.com', 'BSc. Computing'),
(5, 0, 0, 'Shiva', 'Kumar', 'Sharma', '4535345', 'Address5', 12345, 281, 'shiva@woodland.com', 'BSc. Data Science'),
(6, 1016, 1, 'Ganesh', 'Raj', 'Test', '1324', 'Address7', 12345, 2009, 'ganesh@woodland.com', 'BSc. Computing'),
(7, 1017, 1, 'Rajesh', 'Sharma', 'Hari', 'aaa', 'aaa', 123, 23, 'rajesh@woodland.com', 'BSc. Networking'),
(8, 14987684, 1, 'ashish', '', 'adhikari', 'Bhaktapur', 'bhaktapur', 2147483647, 23, 'ashishadhikari@gmail.com', 'BSc. Computing');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` varchar(4096) NOT NULL,
  `announced_from` tinyint(1) NOT NULL,
  `module_code` int(8) DEFAULT NULL,
  `staff` int(8) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `announced_from`, `module_code`, `staff`, `created_at`) VALUES
(14, 'Announcement from Administrator 1', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Facere necessitatibus sit rem nostrum asperiores laboriosam repudiandae aperiam mollitia sunt nam, voluptate, fuga repellendus rerum alias velit. Repellendus delectus ratione eaque?\r\n', 1, NULL, NULL, '2020-05-03 06:27:57'),
(15, 'Announcement from Administrator 2', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi laboriosam temporibus pariatur, esse ad nisi dolore, voluptate blanditiis tenetur, cum inventore itaque corrupti culpa! Earum fugit minus laboriosam repellendus necessitatibus.', 1, NULL, NULL, '2020-05-03 06:28:09'),
(16, 'This is an announcement for Software engineering 2 module', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Laudantium accusamus officiis quo optio? Consequatur, natus? Quas expedita, omnis, optio dolorum asperiores tempora magni fugit doloribus corporis alias veritatis facere nobis?', 3, 1001, 5, '2020-05-03 16:18:26'),
(17, 'This is second announcement for Software engineering 2 module', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Debitis dolorum qui mollitia, quam dolor a quibusdam cupiditate, dolores consequatur nemo cum enim beatae quisquam ipsam sapiente nam alias fugit? Blanditiis.', 3, 1001, 5, '2020-05-03 16:19:02');

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

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `grade`, `module_code`, `student_id`, `assignment_file`, `created_date`) VALUES
(1, 'B+', 1001, 1002, 'Example_cause-for_concern_letter.doc', '2020-05-03 18:16:02');

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
(2101232020, 2, 1012, 3, '2020-04-10', 0),
(2147483647, 1001, 1002, 5, '2020-05-03', 2),
(2147483647, 1001, 1014, 5, '2020-05-03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `course_code` int(8) NOT NULL,
  `course_name` varchar(64) NOT NULL,
  `course_duration` varchar(100) NOT NULL,
  `department_id` int(8) NOT NULL,
  `course_leader` int(10) DEFAULT NULL,
  `archive` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `course_duration`, `department_id`, `course_leader`, `archive`) VALUES
(23, 'Network Engineering', '160 Hrs', 1, 1, 0),
(281, 'Data Analytics', '120 Hrs', 1, 1, 0),
(1001, 'Management', '100 Hrs', 1, NULL, 0),
(1234, 'Environment Science', '120 Hrs', 1, NULL, 0),
(2009, 'Software Engineering', '160 Hrs', 1, 1, 0);

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
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `staff_id` int(10) DEFAULT NULL,
  `student_id` int(12) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diaries`
--

INSERT INTO `diaries` (`diary_id`, `title`, `description`, `staff_id`, `student_id`, `date`) VALUES
(1, 'title', 'asfasfsa', 3, NULL, '2020-05-01 04:36:39'),
(2, 'dvxcvasdfghjhgfdsa', 'vxcxcvsdfghjgfds', NULL, NULL, '2020-05-03 18:51:38'),
(3, 'This is another Diary Title', 'Lorem, ipsum dolor sit', 5, NULL, '2020-05-03 18:50:04');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `module_code` int(8) NOT NULL,
  `module_name` varchar(64) NOT NULL,
  `module_duration` varchar(100) NOT NULL,
  `module_leader` int(10) DEFAULT NULL,
  `course_code` int(8) NOT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_code`, `module_name`, `module_duration`, `module_leader`, `course_code`, `archive`) VALUES
(1, 'Software engineering', '44 Hrs', NULL, 23, 0),
(2, 'Database', '25 Hrs', 3, 2009, 0),
(3, 'Computer System', '30 Hrs', NULL, 23, 0),
(4, 'Web Development', '25 Hrs', NULL, 2009, 0),
(1001, 'Software engineering 2', '30Hrs', 5, 2009, 0),
(2012, 'Database 2', '25Hrs', NULL, 2009, 0);

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
  `deadline` datetime DEFAULT NULL,
  `archive` int(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `module_files`
--

INSERT INTO `module_files` (`file_id`, `module_id`, `filename`, `description`, `file`, `type`, `deadline`, `archive`, `created_at`) VALUES
(1, 2012, 'Chapter 1', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae commodi animi quos quae odit labore explicabo iusto, in sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'dbchapter1.pdf', 0, '0000-00-00 00:00:00', 0, '2020-04-08 05:28:40'),
(2, 2012, 'Chapter 2', 'Recusandae commodi animi quos quae odit labore explicabo iusto, in sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'dbchapter2.pdf', 0, '0000-00-00 00:00:00', 0, '2020-04-08 05:28:40'),
(3, 1001, 'Chapter 1', 'In sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'secapter3.pdf', 0, '0000-00-00 00:00:00', 0, '2020-04-08 05:28:40'),
(4, 1001, 'Chapter 2', 'Consectetur adipisicing elit. Recusandae commodi animi quos quae odit labore explicabo iusto, in sint voluptatem officia voluptas ipsum et deleniti ab consequuntur nihil ex quaerat?', 'sechapter4.pdf', 0, '0000-00-00 00:00:00', 0, '2020-04-08 05:28:40'),
(5, 2012, 'asdas', 'sadasd', 'dbchapter11.pdf', 0, '0000-00-00 00:00:00', 0, '2020-04-08 16:37:38'),
(7, 1001, 'dsfdfd', 'dfsfdsdfsfdsfds', '', 0, NULL, 0, '2020-04-29 07:43:34'),
(8, 1001, 'zxcvbnbx', 'vcbzxcv', '', 0, NULL, 0, '2020-04-29 07:45:42'),
(9, 1001, 'poiikjhbv', 'polkjmnb', '13 Comedy Structures.pdf', 0, NULL, 0, '2020-04-29 07:46:41'),
(10, 2012, 'Tim Lee', '2020-01-01T01:00', '13 Comedy Structures.pdf', 1, NULL, 0, '2020-04-29 07:50:47'),
(11, 1001, 'Seventh week Material', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Animi, consequatur dolore. Nemo quaerat minima consequuntur sequi iste. Consequatur quod odit eius necessitatibus vitae sint natus quidem distinctio, officia enim cupiditate.', 'Example_Course_Timetable.doc', 0, NULL, 0, '2020-05-03 16:21:03'),
(12, 1001, 'Assignment for Software engineering 2 ', 'THis iss the description for the assignment', 'Weekly_Register_Return_Example.doc', 1, '2020-05-08 23:59:00', 0, '2020-05-03 16:22:13');

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

--
-- Dumping data for table `pat`
--

INSERT INTO `pat` (`pat_id`, `pat_information`, `staff_id`, `student_id`, `date`) VALUES
(1, 'dsffdfsdfgfd', 5, 1002, '2020-05-03 18:55:55'),
(2, 'dasszxczxczcxzxc', 5, 1002, '2020-05-03 19:05:21'),
(3, 'dfbgffdfsdfgffd', 5, 1002, '2020-05-03 19:07:41'),
(4, 'xvbzxcvbcxzcvcx', 5, 1002, '2020-05-03 19:08:00'),
(5, 'ghhgfnbv', 5, 1002, '2020-05-03 19:08:17'),
(6, 'vzzvxczxc', 5, 1002, '2020-05-03 19:08:51'),
(7, 'sdsdfsf', 5, 1002, '2020-05-03 19:09:21'),
(8, 'ghjgcfhbn ', 5, 1002, '2020-05-03 19:09:31'),
(9, 'zsszdxbcczdxv ', 5, 1002, '2020-05-03 19:11:52'),
(10, 'dzdffgdssf', 5, 1002, '2020-05-03 19:13:10'),
(11, 'zcxvcbnbvcbc', 5, 1002, '2020-05-03 19:16:46');

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
  `changes` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `archive` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `status`, `firstname`, `middlename`, `surname`, `password`, `address`, `contact`, `email`, `subject`, `role`, `approval`, `changes`, `archive`, `created_at`, `updated_at`) VALUES
(1, 1, 'Adam', '', 'Blake', '$2y$10$OofGClxzUxj7uslY4lRxN.C6jd2JTXM.muFCq2XoIyiNCqi/RdKLS', 'Woodland University', 123, 'adam.blake@woodland.com', 0, 1, 0, NULL, 0, '2020-03-29 13:33:03', '2020-04-29 16:25:00'),
(2, 1, 'Simon', '', 'White', '$2y$10$Tqq37sma0WRF9XmjtBrkSePFh44HuiDwLkT.wSL/42.seULjRbmbO', 'Woodland University', 123, 'simon.white@woodland.com', 0, 2, 0, NULL, 0, '2020-03-29 13:33:03', '2020-04-29 16:25:20'),
(3, 1, 'Raj', '', 'Singh', '$2y$10$qoKzdKBdtsH5UkOxrydoaOltfSEAXi8rx0EmvqX4mtELbzggdx.Cy', 'Woodland University', 123, 'raj.singh@woodland.com', 2009, 3, 1, 'Firstname : Tutoradads<br>Subject : 11<br>', 0, '2020-03-29 13:34:22', '2020-04-30 07:35:29'),
(4, 1, 'Ashish', '', 'Adhikari', '$2y$10$T8aSKnfKZnK2R6SH6lBRV.VtHy/.zTriEtmc9Myes8OT1yfPL3pgW', 'Bhaktapur', 334412, 'ashish.adhikari@woodland.com', 0, 3, 0, NULL, 0, '2020-04-04 05:01:37', '2020-04-29 16:31:35'),
(5, 1, 'Aditya ', '', 'Bhusal', '$2y$10$uLklSrkqhYzjTM4lYgIFX.GZTnMEjTmYGXrRa9vaNVd7Su3Uia2.G', 'Liverpool', 122, 'aditya.bhusal@woodland.com', 2009, 3, 0, NULL, 0, '2020-04-29 16:33:22', '2020-05-03 14:58:38'),
(6, 1, 'Bibek', '', 'Subedi', '$2y$10$jJ5/SwntI1qD52.0UQI1iO6Xenw5qug9QZ2URKYK0F/TLmWDZaGuG', 'North London', 12, 'bibek.subedi@woodland.com', 2009, 3, 0, NULL, 0, '2020-04-29 16:33:55', '2020-05-03 16:27:01'),
(7, 1, 'Sudeshna', '', 'Pandey', '$2y$10$28gVpK8WUOQxD8ERrWiSJOh1wM6xeirzOM09QHRJJcZZc5bynkhdG', 'London', 122, 'sudeshna.pandey@woodland.com', 0, 3, 0, NULL, 0, '2020-04-29 16:34:29', '2020-04-29 16:34:29'),
(8, 1, 'Abhinaya', '', 'Malla', '$2y$10$XVeLodTzfU/7vQzagaWXeOR5.12GTjjBv3bzcb6pbR2IDWSABOs2m', 'Norwich', 123, 'abhinaya.malla@woodland.com', 0, 3, 0, NULL, 0, '2020-04-29 16:35:45', '2020-04-29 16:35:45'),
(9, 1, 'Rima', '', 'Dahal', '$2y$10$/rq7gEOBhchJqSA9a0QwCudDLUVDx95H73DKiOKbErWMw2cbPWTBK', 'Northampton', 212, 'rima.dahal@woodland.com', 0, 3, 0, NULL, 0, '2020-04-29 16:36:32', '2020-04-29 16:36:32'),
(10, 1, 'Dipesh', '', 'Gurung', '$2y$10$HLwoIy8YUuK82FlqFWg7KOEx1NbQ0ogGQqqATPY3u9zx1QNdW7brm', 'London', 222, 'dipesh.gurung@woodland.com', 0, 3, 0, NULL, 0, '2020-04-29 16:37:15', '2020-04-29 16:37:15'),
(11, 1, 'John', '', 'Doe', '$2y$10$YV..LXWaQPVoKto3gUiTVuw8QD/m842tiy72vqj4.bbeyWcQmzKne', 'South London', 12, 'john.doe@woodland.com', 0, 3, 0, NULL, 0, '2020-04-29 16:38:00', '2020-04-29 16:38:00');

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
  `archive` tinyint(1) NOT NULL,
  `approval` tinyint(1) NOT NULL,
  `changes` varchar(4096) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pat_request` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `assigned_id`, `email`, `password`, `pat_tutor`, `archive`, `approval`, `changes`, `pat_request`, `created_at`, `updated_at`) VALUES
(1002, 1002, 'bhusal.001aditya@gmail.com', '$2y$10$um0qSWExh11ZzIzOQpoO..HFJdpPGa2Fm/M7vK9x0cC8V7OR1jT2m', 5, 0, 0, NULL, 0, '2020-04-07 09:48:54', '2020-05-03 20:12:11'),
(1012, 1012, 'shyam@woodland.com', '$2y$10$TUIFmSfnJuemtiMekAbE6.1cLrONl5diZqXDso.oPNdH/LmnIdkIC', 3, 0, 0, NULL, 0, '2020-04-10 03:21:04', '2020-04-28 20:42:54'),
(1014, 1014, 'krishna@woodland.com', '$2y$10$/cjg27bQcBEq0tbJbdjvAe0zsd/nSdE.kip4FwmT6mUuxHWp8tFVy', 0, 0, 0, NULL, 0, '2020-05-03 17:22:28', '2020-05-03 17:22:28'),
(1016, 1016, 'ganesh@woodland.com', '$2y$10$ymQKHCKDn0skytiLANpcdeR6ZocbneROvFAjQtPB/.ZRQ0QgdwIgO', 7, 0, 0, NULL, 0, '2020-04-10 03:28:29', '2020-04-30 06:56:20'),
(14987684, 14987684, 'ashish@gmail.com', '$2y$10$mSXEo/1vuhSzKQVt7wxrkusrI75JtJ9T5TLzJCKFTRo.KD3F7Ltvu', 0, 0, 0, NULL, 0, '2020-04-29 19:14:48', '2020-04-29 19:14:48');

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
(1014, 2),
(1014, 4),
(1014, 1001),
(1014, 2012),
(1002, 2),
(1002, 4),
(1002, 1001),
(1002, 2012);

-- --------------------------------------------------------

--
-- Table structure for table `timetables`
--

CREATE TABLE `timetables` (
  `routine_id` int(12) NOT NULL,
  `year` varchar(100) NOT NULL,
  `course_name` varchar(255) NOT NULL,
  `timetable` text NOT NULL,
  `archive` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timetables`
--

INSERT INTO `timetables` (`routine_id`, `year`, `course_name`, `timetable`, `archive`) VALUES
(1, 'L4', '2009', 'a:7:{i:0;a:8:{i:0;s:8:\"Day/Time\";i:1;s:3:\"8-9\";i:2;s:4:\"9-10\";i:3;s:5:\"10-11\";i:4;s:0:\"\";i:5;s:5:\"11-12\";i:6;s:3:\"1-2\";i:7;s:3:\"2-3\";}i:1;a:8:{i:0;s:6:\"Sunday\";i:1;a:4:{i:0;s:1:\"4\";i:1;s:7:\"Lecture\";i:2;s:9:\"All Group\";i:3;s:8:\"Room 101\";}i:2;a:4:{i:0;s:4:\"1001\";i:1;s:7:\"Lecture\";i:2;s:9:\"All Group\";i:3;s:8:\"Room 102\";}i:3;a:4:{i:0;s:1:\"2\";i:1;s:7:\"Lecture\";i:2;s:9:\"All Group\";i:3;s:8:\"Room 103\";}i:4;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:5;a:4:{i:0;s:1:\"4\";i:1;s:7:\"Lecture\";i:2;s:9:\"All Group\";i:3;s:8:\"Room 105\";}i:6;a:4:{i:0;s:1:\"2\";i:1;s:7:\"Lecture\";i:2;s:9:\"All Group\";i:3;s:8:\"Room 104\";}i:7;a:4:{i:0;s:1:\"2\";i:1;s:7:\"Lecture\";i:2;s:9:\"All Group\";i:3;s:8:\"Room 101\";}}i:2;a:8:{i:0;s:6:\"Monday\";i:1;a:4:{i:0;s:1:\"4\";i:1;s:8:\"Tutorial\";i:2;s:7:\"Group A\";i:3;s:8:\"Room 102\";}i:2;a:4:{i:0;s:1:\"2\";i:1;s:8:\"Tutorial\";i:2;s:7:\"Group B\";i:3;s:8:\"Room 102\";}i:3;a:4:{i:0;s:1:\"2\";i:1;s:8:\"Tutorial\";i:2;s:7:\"Group D\";i:3;s:8:\"Room 107\";}i:4;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:5;a:4:{i:0;s:1:\"2\";i:1;s:8:\"Tutorial\";i:2;s:7:\"Group D\";i:3;s:8:\"Room 107\";}i:6;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:7;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}}i:3;a:8:{i:0;s:7:\"Tuesday\";i:1;a:4:{i:0;s:1:\"4\";i:1;s:8:\"Tutorial\";i:2;s:7:\"Group C\";i:3;s:8:\"Room 101\";}i:2;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:3;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:4;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:5;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:6;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:7;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}}i:4;a:8:{i:0;s:9:\"Wednesday\";i:1;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:2;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:3;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:4;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:5;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:6;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:7;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}}i:5;a:8:{i:0;s:8:\"Thursday\";i:1;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:2;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:3;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:4;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:5;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:6;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:7;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}}i:6;a:8:{i:0;s:6:\"Friday\";i:1;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:2;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:3;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:4;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:5;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:6;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}i:7;a:4:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";i:3;s:0:\"\";}}}', 0),
(2, 'L5', '2009', '', 0);

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
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`routine_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `admission_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `diaries`
--
ALTER TABLE `diaries`
  MODIFY `diary_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `module_files`
--
ALTER TABLE `module_files`
  MODIFY `file_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pat`
--
ALTER TABLE `pat`
  MODIFY `pat_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `timetables`
--
ALTER TABLE `timetables`
  MODIFY `routine_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  ADD CONSTRAINT `fk_c_staff` FOREIGN KEY (`course_leader`) REFERENCES `staff` (`staff_id`) ON UPDATE NO ACTION;

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
-- Constraints for table `student_modules`
--
ALTER TABLE `student_modules`
  ADD CONSTRAINT `fk_stumod_modules` FOREIGN KEY (`module_code`) REFERENCES `modules` (`module_code`) ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_stumod_students` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
