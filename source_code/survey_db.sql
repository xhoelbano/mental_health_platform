-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2022 at 11:17 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(30) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `survey_id`, `user_id`, `answer`, `question_id`, `date_created`) VALUES
(13, 6, 5, 'helloooo', 8, '2022-06-24 18:07:45'),
(14, 8, 5, '[XUSCe]', 7, '2022-06-24 18:12:46'),
(15, 1, 5, 'Test HEllo World', 4, '2022-06-24 18:28:36'),
(16, 1, 5, '[qCMGO],[zZpTE]', 2, '2022-06-24 18:28:36'),
(17, 1, 5, 'dAWTD', 1, '2022-06-24 18:28:36'),
(18, 1, 8, 'test 1', 4, '2022-06-27 14:35:21'),
(19, 1, 8, '[zZpTE],[dOeJi]', 2, '2022-06-27 14:35:21'),
(20, 1, 8, 'dAWTD', 1, '2022-06-27 14:35:21'),
(21, 10, 4, '[SeFVt]', 12, '2022-06-28 13:14:42'),
(22, 10, 4, 'vBrPX', 13, '2022-06-28 13:14:42'),
(23, 10, 4, '', 14, '2022-06-28 13:14:42'),
(24, 9, 14, '[BmQoJ]', 9, '2022-07-04 00:10:28'),
(25, 9, 14, 'Test Test', 10, '2022-07-04 00:10:28'),
(26, 9, 14, 'PjxUa', 11, '2022-07-04 00:10:28'),
(27, 11, 27, 'test test helloo', 15, '2022-07-06 02:46:02'),
(28, 11, 27, '[UlmuY]', 16, '2022-07-06 02:46:02'),
(29, 11, 27, 'nHleX', 17, '2022-07-06 02:46:02'),
(30, 11, 36, 'opaaa', 15, '2022-07-06 03:00:17'),
(31, 11, 36, '[UlmuY],[mDFhy]', 16, '2022-07-06 03:00:17'),
(32, 11, 36, 'PAzTL', 17, '2022-07-06 03:00:17'),
(33, 11, 37, 'yyyyyyyyy', 15, '2022-07-06 03:02:49'),
(34, 11, 37, '[mDFhy]', 16, '2022-07-06 03:02:49'),
(35, 11, 37, 'nHleX', 17, '2022-07-06 03:02:49'),
(36, 10, 14, '[rcMCx]', 12, '2022-07-06 16:58:17'),
(37, 10, 14, 'ehfZl', 13, '2022-07-06 16:58:17'),
(38, 10, 14, ' Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 14, '2022-07-06 16:58:17'),
(39, 10, 15, '[RzyVg]', 12, '2022-07-06 16:58:48'),
(40, 10, 15, 'AYLvP', 13, '2022-07-06 16:58:48'),
(41, 10, 15, 'Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. ', 14, '2022-07-06 16:58:48');

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_id` int(30) NOT NULL,
  `nipt` varchar(20) NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `verify_profile` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->pending;\r\n1->Approved;\r\n2->Rejected',
  `linked_psychologist_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`business_id`, `nipt`, `business_name`, `contact`, `address`, `website`, `verify_profile`, `linked_psychologist_id`) VALUES
(17, 'K3242332523K', 'Busname', '0666666666', 'RR Durresit', 'bus1.com', 2, 0),
(18, 'K3432423432U', 'BName2', '064444444', 'RR Kombit', '', 1, 0),
(40, 'K23432423532O', 'BusinessName', '0692222222', 'Autostrada Tirane - Durress', 'epoka.edu.al', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `contract`
--

CREATE TABLE `contract` (
  `contract_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `nr_accounts` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0(default)=pending; 1=active, 2=passive',
  `paid` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0(default)=not payed; 1=paid',
  `psychologist_id` int(30) NOT NULL,
  `business_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `general_users`
--

CREATE TABLE `general_users` (
  `general_user_id` int(30) NOT NULL,
  `nickname` varchar(200) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `business_env_check` int(11) NOT NULL COMMENT '0(default)=Pending; 1=Approved; 2=Rejected	'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `general_users`
--

INSERT INTO `general_users` (`general_user_id`, `nickname`, `firstname`, `lastname`, `contact`, `address`, `business_env_check`) VALUES
(4, 'test24', '', '', '', '', 0),
(5, 'test1', '', '', '', '', 0),
(7, 'admin', '', '', '', '', 0),
(8, 'nickname🎃', '', '', '', '', 0),
(14, 'user1', '', '', '', '', 0),
(15, 'user2', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `msg_id` int(11) NOT NULL,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 14, 16, 'hello'),
(2, 16, 14, 'hi'),
(3, 14, 16, 'hi'),
(4, 16, 14, 'fast'),
(5, 16, 14, 'goodbye'),
(6, 16, 14, 'bye'),
(7, 9, 14, 'hello psychologist!'),
(8, 14, 9, 'Hello User!'),
(9, 14, 9, 'How can I help you?');

-- --------------------------------------------------------

--
-- Table structure for table `psychologist`
--

CREATE TABLE `psychologist` (
  `psychologist_id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `contact` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `website` varchar(200) NOT NULL,
  `business_env_check` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->not active; 1->active	',
  `education_env_check` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0->not active;\r\n1->active',
  `verify_profile` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->pending;\r\n1->Approved;\r\n2->Rejected',
  `linked_business_id` int(30) NOT NULL,
  `linked_school_id` int(30) NOT NULL DEFAULT 0,
  `license_nr` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `psychologist`
--

INSERT INTO `psychologist` (`psychologist_id`, `firstname`, `lastname`, `contact`, `address`, `website`, `business_env_check`, `education_env_check`, `verify_profile`, `linked_business_id`, `linked_school_id`, `license_nr`) VALUES
(9, 'Pname', 'Plname', '0777777777', 'Rr elbasanit', 'google.com', 0, 1, 1, 0, 22, 'K12421412K'),
(11, 'Pname2', 'Plname2', '0777777777', 'BAggsd', 'google.com', 0, 0, 2, 0, 0, 'K3r32r4234G'),
(16, 'Pname3', 'Plname3', '0692222222', 'Rr elbasanit', '', 0, 1, 1, 0, 21, 'Ki9328482TE');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(30) NOT NULL,
  `question` text NOT NULL,
  `frm_option` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `order_by` int(11) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `frm_option`, `type`, `order_by`, `survey_id`, `date_created`) VALUES
(1, 'Sample Survey Question using Radio Button', '{\"oBUcl\":\"Option 1\",\"sOcRH\":\"Option 2\",\"PCtbJ\":\"Option 3\",\"jEmhX\":\"Option 4\"}', 'radio_opt', 3, 1, '2020-11-10 12:04:46'),
(2, 'Question for Checkboxes', '{\"qCMGO\":\"Checkbox label 1\",\"JNmhW\":\"Checkbox label 2\",\"zZpTE\":\"Checkbox label 3\",\"dOeJi\":\"Checkbox label 4\"}', 'check_opt', 2, 1, '2020-11-10 12:25:13'),
(4, 'Sample question for the text field', '', 'textfield_s', 1, 1, '2020-11-10 13:34:21'),
(7, 'Question 1 text test', '{\"YfeKq\":\"label 1\",\"TmYxh\":\"label 2\",\"XUSCe\":\"label 3\"}', 'check_opt', 0, 8, '2022-06-24 17:18:36'),
(8, 'Question Test 1', '', 'textfield_s', 0, 6, '2022-06-24 17:55:29'),
(9, 'Is this a multiple answer question?', '{\"jvihH\":\"Option 1\",\"TgQnx\":\"Option 2\",\"kwlfB\":\"Option 3\",\"BmQoJ\":\"Option 4\",\"FnclH\":\"Option 5\"}', 'check_opt', 0, 9, '2022-06-28 08:40:37'),
(10, 'Is this a text field question?', '', 'textfield_s', 0, 9, '2022-06-28 08:40:55'),
(11, 'Is this a radio button question?', '{\"daOsG\":\"Radio 1\",\"PjxUa\":\"Radio 2\",\"FTNKn\":\"Radio 3\",\"IFGTs\":\"Radio 4\"}', 'radio_opt', 0, 9, '2022-06-28 08:41:29'),
(12, 'Lorem ipsum risus viverra adipiscing at in tellus integer feugiat scelerisque?', '{\"WvKgf\":\"o1\",\"rcMCx\":\"o2\",\"RzyVg\":\"o3\"}', 'check_opt', 0, 10, '2022-06-28 13:12:44'),
(13, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua?', '{\"ehfZl\":\"option1\",\"GtZNS\":\"option2\",\"AYLvP\":\"option3\"}', 'radio_opt', 0, 10, '2022-06-28 13:13:18'),
(14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Cras ornare arcu dui vivamus arcu felis bibendum?', '', 'textfield_s', 0, 10, '2022-06-28 13:13:30'),
(15, 'Q1', '', 'textfield_s', 0, 11, '2022-07-06 01:44:02'),
(16, 'WHat is radio question?', '{\"OglRF\":\"radio1\",\"UlmuY\":\"radio2\",\"mDFhy\":\"radio3\"}', 'check_opt', 0, 11, '2022-07-06 01:44:27'),
(17, 'What is this?', '{\"PAzTL\":\"radio1\",\"TuXoF\":\"radio2\",\"nHleX\":\"radio3\"}', 'radio_opt', 0, 11, '2022-07-06 01:45:00'),
(18, 'Lorem ipsum question 1 ?', '', 'textfield_s', 0, 13, '2022-07-06 17:32:31'),
(19, 'Lorem ipsum iskander askerf question 2 ?', '{\"vDetr\":\"option 1\",\"dFpRQ\":\"option 2\",\"bETHY\":\"option 3\",\"vyEdt\":\"option 4\"}', 'check_opt', 0, 13, '2022-07-06 17:33:13'),
(20, 'Lorem ipsum kafender turzam direkt upstem question 3?', '{\"jeaqM\":\"YES\",\"kMjms\":\"NO\"}', 'radio_opt', 0, 13, '2022-07-06 17:33:53');

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `id` int(30) NOT NULL,
  `name` varchar(255) NOT NULL,
  `activation_code` varchar(255) NOT NULL,
  `admin_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`id`, `name`, `activation_code`, `admin_id`) VALUES
(21, 'Qemal Stafa', 'Q123G', 7),
(22, 'Ismail Qemali', 'K123O', 7);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `parent_1_email` varchar(200) NOT NULL,
  `parent_2_email` varchar(200) NOT NULL,
  `school_id` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `parent_1_email`, `parent_2_email`, `school_id`) VALUES
(27, 'stfname', 'stlname', 'user@gmail.com', 'user2@gmail.com', 22),
(36, 'test', 'test', 'user3@gmail.com', 'user2@gmail.com', 21),
(37, 'st6name', 'st6lname', 'p1@gmail.com', 'p2@gmail.com', 21),
(39, 'st2fname', 'st2lname', 'user2@gmail.com', 'user3@gmail.com', 22);

-- --------------------------------------------------------

--
-- Table structure for table `survey_set`
--

CREATE TABLE `survey_set` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `type` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0->general user;\r\n1->education'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `survey_set`
--

INSERT INTO `survey_set` (`id`, `title`, `description`, `user_id`, `start_date`, `end_date`, `date_created`, `type`) VALUES
(1, 'Sample Survey', 'Sample Only', 3, '2020-11-06', '2022-09-21', '2020-11-10 09:57:47', 0),
(2, 'Survey 1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in tempus turpis, sed fermentum risus. Praesent vitae velit rutrum, dictum massa nec, pharetra felis. Phasellus enim augue, laoreet in accumsan dictum, mollis nec lectus. ', 3, '2020-10-15', '2020-12-30', '2020-11-10 14:12:09', 0),
(3, 'Survey 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in tempus turpis, sed fermentum risus. Praesent vitae velit rutrum, dictum massa nec, pharetra felis. ', 3, '2020-09-01', '2023-12-27', '2020-11-10 14:12:33', 0),
(4, 'Survey 23', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in tempus turpis, sed fermentum risus. Praesent vitae velit rutrum, dictum massa nec, pharetra felis. ', 4, '2020-09-10', '2020-11-27', '2020-11-10 14:14:03', 0),
(6, 'Survey Test 1', 'Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 Survey Test 1 ', 3, '2022-06-24', '2022-06-29', '2022-06-24 17:03:15', 0),
(8, 'test sample 2', 'test sample 2 test sample 2 test sample 2 test sample 2 test sample 2 test sample 2 test sample 2 test sample 2 test sample 2 ', 3, '2022-06-24', '2022-06-30', '2022-06-24 17:16:18', 0),
(9, 'Survey Test 1', 'This is the survey test number 1. Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc Desc ', 16, '2022-06-29', '2022-07-07', '2022-06-28 08:39:35', 0),
(10, 'Survey Test', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 9, '2022-06-29', '2022-07-08', '2022-06-28 13:12:11', 0),
(11, 'test surveyyyyyyy', 'test surveyyyyyyytest surveyyyyyyy', 16, '2022-07-05', '2022-07-15', '2022-07-05 23:06:47', 1),
(12, 'testtttttt', 'testtttttt', 16, '2022-07-13', '2022-07-01', '2022-07-05 23:07:48', 0),
(13, 'Educational Survey', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 9, '2022-07-05', '2022-07-16', '2022-07-06 15:45:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(4) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `type`, `date_created`, `status`) VALUES
(4, 'testuser@gmail.com', '$2y$10$ItTw/PxLRRYMY.U74EIsfua0mQO5Y7FDJELb/3u07C4hD9/cYozGS', 3, '2022-06-15 01:48:21', 'Offline now'),
(5, 'test1@gmail.com', '$2y$10$CHQKY1AdyAb2F.h/EVFdzu6tF5TsnMR8hWtPn7t.TiPbzdo9GTl/O', 3, '2022-06-24 13:04:59', 'Offline now'),
(7, 'admin@gmail.com', '$2y$10$ItTw/PxLRRYMY.U74EIsfua0mQO5Y7FDJELb/3u07C4hD9/cYozGS', 0, '2022-06-24 18:47:44', 'Offline now'),
(8, 'nick@gmail.com', '$2y$10$rnKYSEErrDauXC1smCarN.QElOb4m0NotAMFR0Xu52MMgMoUVBtsm', 3, '2022-06-27 14:25:27', 'Offline now'),
(9, 'psychologist@gmail.com', '$2y$10$ItTw/PxLRRYMY.U74EIsfua0mQO5Y7FDJELb/3u07C4hD9/cYozGS', 1, '2022-06-27 15:19:29', 'Active now'),
(11, 'psych3@gmail.com', '$2y$10$ItTw/PxLRRYMY.U74EIsfua0mQO5Y7FDJELb/3u07C4hD9/cYozGS', 1, '2022-06-27 15:28:50', 'Offline now'),
(14, 'user@gmail.com', '$2y$10$FSXXxFgjpi3vynuvXntkz.cMva7Y4mUjDOyDLhZ3O0lqulXf4xqm6', 3, '2022-06-28 08:34:29', 'Offline now'),
(15, 'user2@gmail.com', '$2y$10$FSXXxFgjpi3vynuvXntkz.cMva7Y4mUjDOyDLhZ3O0lqulXf4xqm6', 3, '2022-06-28 08:34:54', 'Offline now'),
(16, 'psych2@gmail.com', '$2y$10$6puHSSAVA9YITYO0BO8I9uwrdhfE1O9r0ddbo3vIn3FnS3dyMRGQa', 1, '2022-06-28 08:38:26', 'Offline now'),
(17, 'bus1@gmail.com', '$2y$10$SeW/B0QQohLQREPRz8bO..UScIgLKuVZvwSdauG3H8kbMd.qx7e/y', 2, '2022-06-28 08:45:05', 'Offline now'),
(18, 'bus2@gmail.com', '$2y$10$rdSEUGfkUSdN9IRsQ3f5.ehyWCyz0uGmruMn13ZvlcojVTO27Y5iy', 2, '2022-06-28 08:51:05', 'Active now'),
(19, 'user24@gmail.com', '$2y$10$C2pD5gNjAvrxJF18UlgqRejlazwowMMdjUrNOprRDNdB98jLVk9fq', 3, '2022-07-03 21:59:57', 'Offline now'),
(20, 'admin2@gmail.com', '$2y$10$6puHSSAVA9YITYO0BO8I9uwrdhfE1O9r0ddbo3vIn3FnS3dyMRGQa', 0, '2022-07-03 22:01:15', 'Offline now'),
(27, 'student@gmail.com', '$2y$10$bEryDZY/o/DqqVQVvcTaSeq6GzNhNQdTEGMwNveGiU9Y3oxeWXCgi', 4, '2022-07-06 00:45:11', 'Offline now'),
(36, 'student3@gmail.com', '$2y$10$nUBoDZ8WD5lgsJJpkBiXp.2RP6Tcjf6FpFb1tTdiG9rLkODUF.Owe', 4, '2022-07-06 01:34:29', 'Offline now'),
(37, 'student6@gmail.com', '$2y$10$c2nPBDvgrB2p9DxRd0da4eVltlq4BIUNFSEfZqW2pbwaqGfQEtBZi', 4, '2022-07-06 03:02:21', 'Offline now'),
(39, 'student2@gmail.com', '$2y$10$mj19VD4aof70GQg.oVdFhuAi9j3wvZP2aU1C8wNbQx7RrL1SbNIzK', 4, '2022-07-06 16:03:20', ''),
(40, 'business@gmail.com', '$2y$10$He8fRq5RXxbH726Z.Pusruyb..Knqj/V/2D9W7tYkZW7M.6J8NYwK', 2, '2022-07-06 16:33:41', 'Offline now');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_id_fk` (`survey_id`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `question_id_fk` (`question_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`);

--
-- Indexes for table `contract`
--
ALTER TABLE `contract`
  ADD PRIMARY KEY (`contract_id`),
  ADD KEY `psychologist_id` (`psychologist_id`),
  ADD KEY `business_id` (`business_id`);

--
-- Indexes for table `general_users`
--
ALTER TABLE `general_users`
  ADD PRIMARY KEY (`general_user_id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `psychologist`
--
ALTER TABLE `psychologist`
  ADD PRIMARY KEY (`psychologist_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `survey_id_fk` (`survey_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `survey_set`
--
ALTER TABLE `survey_set`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id_fk` (`user_id`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `contract`
--
ALTER TABLE `contract`
  MODIFY `contract_id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `survey_set`
--
ALTER TABLE `survey_set`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_3` FOREIGN KEY (`survey_id`) REFERENCES `survey_set` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `answers_ibfk_4` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business`
--
ALTER TABLE `business`
  ADD CONSTRAINT `business_ibfk_1` FOREIGN KEY (`business_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `contract`
--
ALTER TABLE `contract`
  ADD CONSTRAINT `contract_ibfk_1` FOREIGN KEY (`psychologist_id`) REFERENCES `psychologist` (`psychologist_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `contract_ibfk_2` FOREIGN KEY (`business_id`) REFERENCES `business` (`business_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `general_users`
--
ALTER TABLE `general_users`
  ADD CONSTRAINT `general_users_ibfk_1` FOREIGN KEY (`general_user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `psychologist`
--
ALTER TABLE `psychologist`
  ADD CONSTRAINT `psychologist_ibfk_1` FOREIGN KEY (`psychologist_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`survey_id`) REFERENCES `survey_set` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schools`
--
ALTER TABLE `schools`
  ADD CONSTRAINT `schools_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `schools` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `students_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
