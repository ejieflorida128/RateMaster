-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 04, 2024 at 04:13 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12
=======
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 03:24 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ratings`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_rating` int(11) NOT NULL,
  `file_comment` text DEFAULT NULL,
  `submission_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `file_name`, `file_rating`, `file_comment`, `submission_time`) VALUES
(157, 'sdrgerg', 5, 'sdgsdfgs', '2024-02-14 16:54:10'),
(158, 'asdfasd', 4, 'dfgdfg', '2024-02-14 17:11:17'),
(159, 'Dsd', 4, 'asfsdg', '2024-02-14 17:46:00'),
(160, 'argdhtf', 5, 'adgdfhfh', '2024-02-14 17:46:11'),
(161, 'fhfhb', 5, 'dgdfgfg', '2024-02-14 17:46:27'),
(162, 'dsfhfh', 4, 'dfsdfhfds', '2024-02-14 17:46:39'),
(163, 'dfa', 4, 'dgsag', '2024-02-14 18:10:58'),
(164, 'dfa', 4, 'dgsag', '2024-02-14 18:10:58'),
(165, 'dfasdf', 5, 'sgsadg', '2024-02-14 18:13:03'),
(166, 'dfasdf', 5, 'sgsadg', '2024-02-14 18:13:03'),
(167, 'dfasdf', 5, 'sgsadg', '2024-02-14 18:13:03'),
(168, 'zxdv', 3, 'dgsdghh', '2024-02-14 18:15:00'),
(169, 'zxdv', 3, 'dgsdghh', '2024-02-14 18:15:00'),
(170, 'sds', 3, 'asdgas', '2024-02-14 18:15:45'),
(171, 'sds', 3, 'asdgas', '2024-02-14 18:15:45'),
(172, 'sds', 3, 'asdgas', '2024-02-14 18:15:45');

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE `buildings` (
  `building_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `rating` int(11) DEFAULT 0,
  `upload_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`building_id`, `title`, `description`, `thumbnail_url`, `rating`, `upload_date`) VALUES
(11, '406268224_348696434525610_3181568452186515548_n.jpg', '', '../buildrate/buildings406268224_348696434525610_3181568452186515548_n.jpg', 4, '2024-02-16 18:17:42'),
(12, '498860.jpg', '', '../buildrate/buildings/498860.jpg', 4, '2024-02-16 18:19:11'),
(13, '406268224_348696434525610_3181568452186515548_n.jpg', '', '../buildrate/buildings/406268224_348696434525610_3181568452186515548_n.jpg', 0, '2024-02-24 05:53:33');

-- --------------------------------------------------------

--
-- Table structure for table `building_comments`
--

CREATE TABLE `building_comments` (
  `comment_id` int(11) NOT NULL,
  `building_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment_date` datetime DEFAULT current_timestamp(),
  `rating_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building_comments`
--

INSERT INTO `building_comments` (`comment_id`, `building_id`, `user_id`, `comment_text`, `rating`, `comment_date`, `rating_date`) VALUES
(1, 11, 1, NULL, 4, '2024-02-17 00:31:22', '2024-02-24 00:33:33'),
(2, 11, 1, 'asdgas', NULL, '2024-02-17 00:31:22', '2024-02-24 00:33:33'),
(3, 11, 1, NULL, 4, '2024-02-17 00:31:39', '2024-02-24 00:33:33'),
(4, 11, 1, 'sdfawe', NULL, '2024-02-17 00:31:39', '2024-02-24 00:33:33'),
(5, 12, 1, NULL, 4, '2024-02-23 21:20:10', '2024-02-24 00:33:33'),
(6, 12, 1, 'sdfasd', NULL, '2024-02-23 21:20:10', '2024-02-24 00:33:33'),
(7, 12, 1, '', NULL, '2024-02-24 00:19:11', '2024-02-24 00:33:33'),
(8, 12, 1, '', NULL, '2024-02-24 00:19:14', '2024-02-24 00:33:33'),
(9, 12, 1, '', NULL, '2024-02-24 00:21:12', '2024-02-24 00:33:33'),
(10, 12, 1, NULL, 4, '2024-02-24 00:25:58', '2024-02-24 00:33:33'),
(11, 12, 1, 'fasfsad', NULL, '2024-02-24 00:25:58', '2024-02-24 00:33:33'),
(12, 12, 1, 'sdfsd', NULL, '2024-02-24 00:31:23', '2024-02-24 00:33:33'),
(13, 12, 1, 'sdfsdf', NULL, '2024-02-24 00:31:31', '2024-02-24 00:33:33'),
(14, 12, 1, 'asdff', 4, '2024-02-24 00:34:38', '2024-02-24 00:34:38'),
(15, 12, 1, '', 0, '2024-02-24 11:50:24', '2024-02-24 11:50:24');

-- --------------------------------------------------------

--
-- Table structure for table `building_ratings`
--

CREATE TABLE `building_ratings` (
  `rating_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rating_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `building_ratings`
--

INSERT INTO `building_ratings` (`rating_id`, `building_id`, `user_id`, `rating`, `rating_date`) VALUES
(1, 12, 1, 4, '2024-02-23 17:31:23'),
(2, 12, 1, 4, '2024-02-23 17:31:31'),
(3, 12, 1, 4, '2024-02-23 17:34:11'),
(4, 12, 1, 4, '2024-02-23 17:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `commento`
--

CREATE TABLE `commento` (
  `comment_id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `comment_date` datetime DEFAULT current_timestamp(),
  `rating_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `commento`
--

INSERT INTO `commento` (`comment_id`, `document_id`, `user_id`, `comment_text`, `rating`, `comment_date`, `rating_date`) VALUES
(13, 1, 1, 'asdfawf', 4, '2024-02-15 21:25:37', '0000-00-00 00:00:00'),
(14, 1, 1, 'sdvsdv', 3, '2024-02-15 21:26:31', '0000-00-00 00:00:00'),
(24, 3, 1, 'dxvccv', 3, '2024-02-16 20:49:38', '0000-00-00 00:00:00'),
(25, 3, 1, 'sfdasdf', 4, '2024-02-16 20:51:42', '0000-00-00 00:00:00'),
(26, 3, 1, 'sadgasdg', 4, '2024-02-16 20:54:39', '0000-00-00 00:00:00'),
(27, 5, 1, 'asdasdf', 4, '2024-02-16 20:56:58', '0000-00-00 00:00:00'),
(28, 5, 1, 'sdfasd', 4, '2024-02-16 20:58:49', '0000-00-00 00:00:00'),
(29, 5, 1, 'sdgasdg', 4, '2024-02-16 21:01:38', '0000-00-00 00:00:00'),
(30, 5, 1, 'asfasf', 4, '2024-02-16 21:02:52', '2024-02-16 21:02:52'),
(31, 2, 1, 'dgsdg', 4, '2024-02-16 21:50:48', '2024-02-16 21:50:48'),
(32, 1, 1, 'sadfsadg', 5, '2024-02-16 21:51:02', '2024-02-16 21:51:02'),
(33, 6, 1, 'dfdsgr', 5, '2024-02-16 21:56:05', '2024-02-16 21:56:05'),
(34, 16, 1, 'sdfsDE', 4, '2024-02-16 23:22:34', '2024-02-16 23:22:34'),
(35, 21, 1, 'sdfaf', 4, '2024-02-16 23:33:01', '2024-02-16 23:33:01'),
(36, 21, 1, 'sdfasdf', 4, '2024-02-16 23:33:04', '2024-02-16 23:33:04'),
(37, 21, 1, 'ddgsd', 4, '2024-02-16 23:33:08', '2024-02-16 23:33:08'),
(38, 16, 1, 'sdsd', 4, '2024-02-17 00:36:01', '2024-02-17 00:36:01'),
(39, 16, 1, 'xdvzsdv', 4, '2024-02-17 00:36:08', '2024-02-17 00:36:08'),
(40, 18, 1, 'sjdfhaslkdhflawd', 4, '2024-02-19 20:55:23', '2024-02-19 20:55:23'),
(41, 18, 1, 'wejlfiqweua', 4, '2024-02-19 20:55:53', '2024-02-19 20:55:53'),
(42, 22, 1, 'soieorf', 4, '2024-02-19 21:01:22', '2024-02-19 21:01:22'),
(43, 22, 1, 'eoirgweorg', 5, '2024-02-19 21:01:29', '2024-02-19 21:01:29'),
(44, 19, 1, 'wekfawei', 5, '2024-02-19 21:04:33', '2024-02-19 21:04:33'),
(45, 8, 1, 'sdvsdv', 4, '2024-02-23 23:27:48', '2024-02-23 23:27:48'),
(46, 19, 1, 'dfsdf', 4, '2024-02-24 00:05:01', '2024-02-24 00:05:01'),
(47, 19, 1, 'ddfdd', 4, '2024-02-24 00:05:10', '2024-02-24 00:05:10'),
(48, 19, 1, '', NULL, '2024-02-24 11:38:53', '2024-02-24 11:38:53'),
(49, 24, 1, 'sdsd', NULL, '2024-02-24 13:38:08', '2024-02-24 13:38:08'),
(50, 24, 1, 'dvsdv', NULL, '2024-02-24 13:38:15', '2024-02-24 13:38:15'),
(51, 24, 1, 'xzzdv', 3, '2024-02-24 13:42:12', '2024-02-24 13:42:12'),
(52, 24, 1, 'SDGSDG', 4, '2024-02-24 13:42:23', '2024-02-24 13:42:23'),
(53, 29, 1, 'wetwet', 4, '2024-02-26 15:04:39', '2024-02-26 15:04:39'),
(54, 33, 1, 'sdfsd', 1, '2024-02-27 00:05:43', '2024-02-27 00:05:43'),
<<<<<<< HEAD
(55, 25, 1, 'ISFOWID', 5, '2024-02-27 15:07:11', '2024-02-27 15:07:11'),
(56, 24, 1, 'asfasdf', 4, '2024-02-28 01:55:12', '2024-02-28 01:55:12'),
(57, 24, 1, 'sadfd', 4, '2024-02-28 01:55:29', '2024-02-28 01:55:29'),
(58, 32, 1, 'lsakdfal;sd', 4, '2024-03-01 23:10:26', '2024-03-01 23:10:26');
=======
(55, 25, 1, 'ISFOWID', 5, '2024-02-27 15:07:11', '2024-02-27 15:07:11');
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea

-- --------------------------------------------------------

--
-- Table structure for table `document`
--

CREATE TABLE `document` (
  `document_id` int(11) NOT NULL,
  `file_type` varchar(50) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `thumbnail_url` varchar(255) DEFAULT NULL,
  `rating` float DEFAULT NULL,
  `upload_date` datetime DEFAULT current_timestamp(),
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `document`
--

INSERT INTO `document` (`document_id`, `file_type`, `title`, `description`, `thumbnail_url`, `rating`, `upload_date`, `category`) VALUES
(24, '', 'KELESTE.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 4, '2024-02-24 07:10:13', 'word'),
(25, '', 'Doc1.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 5, '2024-02-24 08:02:46', ''),
(26, '', 'SUGANOB, EDROSE A.-Activity-4.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:07:55', 'word'),
(27, '', 'CAFA_Agreements.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:08:24', 'powerpoint'),
(28, '', 'PERMIT-TO-CONDUCT.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:12:27', 'word'),
(29, '', 'XYZ-Restaurant-Risk-Management-Plan.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 4, '2024-02-24 08:25:32', 'powerpoint'),
(30, '', 'SUGANOB, EDROSE A.-Activity-5.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:28:03', ''),
(31, '', 'TABULATED DATA.xlsx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:30:23', ''),
<<<<<<< HEAD
(32, '', 'APPROVAL-SHEET.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 4, '2024-02-24 08:35:50', ''),
=======
(32, '', 'APPROVAL-SHEET.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:35:50', ''),
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea
(33, '', 'EDROSE.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 1, '2024-02-24 08:38:11', ''),
(34, '', 'Excuse Letter.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:44:00', ''),
(35, '', 'Theoretical-Framework.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:46:25', ''),
(36, '', 'Munites SK 2023-2024.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:47:48', ''),
(37, '', 'COVER-PAGE.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:48:55', ''),
(38, '', 'CHARITOO CUISINE RESTAURANT.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:56:05', ''),
(39, '', 'SUGANOB, EDROSE A.-Activity-6.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:56:48', ''),
(40, '', 'SUGANOB, EDROSE, A-Activity 3.docx', 'Description of the uploaded file goes here.', 'thumbnails/default_thumbnail.jpg', 0, '2024-02-24 08:57:02', '');

-- --------------------------------------------------------

--
-- Table structure for table `e_hypebeast`
--

CREATE TABLE `e_hypebeast` (
  `E_hype_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `rating` float DEFAULT 0,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_hypebeast`
--

INSERT INTO `e_hypebeast` (`E_hype_id`, `title`, `description`, `thumbnail_url`, `rating`, `upload_date`) VALUES
(1, '406268224_348696434525610_3181568452186515548_n.jpg', '', '../E-hype/E_products/406268224_348696434525610_3181568452186515548_n.jpg', 4, '2024-02-16 19:41:38'),
(2, '498860.jpg', '', '../E-hype/E_products/498860.jpg', 0, '2024-02-23 16:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `e_hype_comments`
--

CREATE TABLE `e_hype_comments` (
  `comment_id` int(11) NOT NULL,
  `E_hype_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_date` datetime DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_hype_comments`
--

INSERT INTO `e_hype_comments` (`comment_id`, `E_hype_id`, `user_id`, `comment_text`, `comment_date`, `rating`, `rating_date`) VALUES
(1, 1, 1, 'asffw', '2024-02-23 23:14:36', 0, '2024-02-23 23:14:36'),
(2, 1, 1, 'sdvsdv', '2024-02-23 23:14:48', 4, '2024-02-23 23:14:48'),
(3, 1, 1, 'dvsdv', '2024-02-23 23:19:26', 4, '2024-02-23 23:19:26'),
(4, 1, 1, 'vxcvxcv', '2024-02-23 23:21:07', 3, '2024-02-23 23:21:07'),
(5, 1, 1, 'xvzdv', '2024-02-23 23:23:24', 4, '2024-02-23 23:23:24'),
(6, 1, 1, '', '2024-02-24 11:39:50', 0, '2024-02-24 11:39:50'),
(7, 1, 1, '', '2024-02-24 11:47:35', 0, '2024-02-24 11:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `e_hype_ratings`
--

CREATE TABLE `e_hype_ratings` (
  `rating_id` int(11) NOT NULL,
  `E_hype_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `e_hype_ratings`
--

INSERT INTO `e_hype_ratings` (`rating_id`, `E_hype_id`, `user_id`, `rating`, `rating_date`) VALUES
(1, 1, 1, 4, '2024-02-23 23:23:24');

-- --------------------------------------------------------

--
-- Table structure for table `file_ratings`
--

CREATE TABLE `file_ratings` (
  `id` int(11) NOT NULL,
  `document_name` varchar(255) DEFAULT NULL,
  `document_type` varchar(50) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `irate`
--

CREATE TABLE `irate` (
  `Irate_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `thumbnail_url` varchar(255) NOT NULL,
  `rating` float DEFAULT 0,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `irate`
--

INSERT INTO `irate` (`Irate_id`, `title`, `description`, `thumbnail_url`, `rating`, `upload_date`) VALUES
(1, 'sk-logo.png', '', '../IRate/Irate_images/sk-logo.png', 5, '2024-02-21 12:08:05');

-- --------------------------------------------------------

--
-- Table structure for table `irate_comments`
--

CREATE TABLE `irate_comments` (
  `comment_id` int(11) NOT NULL,
  `Irate_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `rating` float DEFAULT NULL,
  `comment_text` text DEFAULT NULL,
  `comment_date` datetime DEFAULT current_timestamp(),
  `rating_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `irate_comments`
--

INSERT INTO `irate_comments` (`comment_id`, `Irate_id`, `user_id`, `rating`, `comment_text`, `comment_date`, `rating_date`) VALUES
(6, 1, 1, 4, 'aefasg', '2024-02-22 01:50:28', '2024-02-22 01:50:28'),
(7, 1, 1, 4, 'asdfasdf', '2024-02-23 21:21:06', '2024-02-23 21:21:06'),
(8, 1, 1, 4, 'sdcsd', '2024-02-23 21:22:19', '2024-02-23 21:22:19'),
(9, 1, 1, 3, 'asdfsf', '2024-02-24 00:37:26', '2024-02-24 00:37:26'),
(10, 1, 1, 0, '', '2024-02-24 12:13:50', '2024-02-24 12:13:50'),
(11, 1, 1, 4, 'sODfsI', '2024-02-26 14:55:48', '2024-02-26 14:55:48'),
(12, 1, 1, 5, 'jllkjlk', '2024-02-26 15:02:55', '2024-02-26 15:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `irate_ratings`
--

CREATE TABLE `irate_ratings` (
  `rating_id` int(11) NOT NULL,
  `Irate_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `irate_ratings`
--

INSERT INTO `irate_ratings` (`rating_id`, `Irate_id`, `user_id`, `rating`, `rating_date`) VALUES
(1, 1, 1, 4, '2024-02-21 18:36:07'),
(2, 1, 1, 4, '2024-02-21 18:47:24'),
(3, 1, 1, 4, '2024-02-21 18:49:36'),
(4, 1, 1, 4, '2024-02-21 18:50:28'),
(5, 1, 1, 4, '2024-02-23 14:21:06'),
(6, 1, 1, 4, '2024-02-23 14:22:19'),
(7, 1, 1, 3, '2024-02-23 17:37:26'),
(8, 1, 1, 4, '2024-02-26 07:55:48'),
(9, 1, 1, 5, '2024-02-26 08:02:55');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `rating_id` int(11) NOT NULL,
  `document_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `rating_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`rating_id`, `document_id`, `user_id`, `rating`, `rating_date`) VALUES
(1, 3, 1, 4, '2024-02-16 20:54:39'),
(2, 5, 1, 4, '2024-02-16 20:56:58'),
(3, 5, 1, 4, '2024-02-16 20:58:49'),
(4, 5, 1, 4, '2024-02-16 21:01:38'),
(5, 5, 1, 4, '2024-02-16 21:02:52'),
(6, 2, 1, 4, '2024-02-16 21:50:48'),
(7, 1, 1, 5, '2024-02-16 21:51:02'),
(8, 6, 1, 5, '2024-02-16 21:56:05'),
(9, 16, 1, 4, '2024-02-16 23:22:34'),
(10, 21, 1, 4, '2024-02-16 23:33:01'),
(11, 21, 1, 4, '2024-02-16 23:33:04'),
(12, 21, 1, 4, '2024-02-16 23:33:08'),
(13, 16, 1, 4, '2024-02-17 00:36:01'),
(14, 16, 1, 4, '2024-02-17 00:36:08'),
(15, 18, 1, 4, '2024-02-19 20:55:05'),
(16, 18, 1, 4, '2024-02-19 20:55:23'),
(17, 18, 1, 4, '2024-02-19 20:55:41'),
(18, 18, 1, 4, '2024-02-19 20:55:53'),
(19, 22, 1, 4, '2024-02-19 21:01:22'),
(20, 22, 1, 5, '2024-02-19 21:01:29'),
(21, 19, 1, 5, '2024-02-19 21:04:33'),
(22, 8, 1, 4, '2024-02-23 23:27:48'),
(23, 19, 1, 4, '2024-02-24 00:05:01'),
(24, 19, 1, 4, '2024-02-24 00:05:10'),
(25, 24, 1, 4, '2024-02-24 13:38:08'),
(26, 24, 1, 4, '2024-02-24 13:38:15'),
(27, 24, 1, 3, '2024-02-24 13:41:01'),
(28, 24, 1, 3, '2024-02-24 13:42:12'),
(29, 24, 1, 4, '2024-02-24 13:42:23'),
(30, 29, 1, 4, '2024-02-26 15:04:39'),
(31, 33, 1, 1, '2024-02-27 00:05:43'),
<<<<<<< HEAD
(32, 25, 1, 5, '2024-02-27 15:07:11'),
(33, 24, 1, 4, '2024-02-28 01:55:12'),
(34, 24, 1, 4, '2024-02-28 01:55:29'),
(35, 32, 1, 4, '2024-03-01 23:10:26');
=======
(32, 25, 1, 5, '2024-02-27 15:07:11');
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea

-- --------------------------------------------------------

--
-- Table structure for table `uploaded_files`
--

CREATE TABLE `uploaded_files` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `file_size` int(11) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `uploaded_files`
--

INSERT INTO `uploaded_files` (`id`, `file_name`, `file_type`, `file_size`, `upload_date`) VALUES
(1, '406268224_348696434525610_3181568452186515548_n.jpg', 'image/jpeg', 98171, '2024-02-15 09:19:23');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(255) NOT NULL,
<<<<<<< HEAD
  `option` varchar(50) NOT NULL,
  `is_admin` tinyint(1) DEFAULT 0
=======
  `option` varchar(50) NOT NULL
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

<<<<<<< HEAD
INSERT INTO `users` (`user_id`, `username`, `password_hash`, `option`, `is_admin`) VALUES
(1, 'laboy', '$2y$10$BNk3Zlxw6PqZQY636CkKYOrbSXybTiJdhwLwiMztuP1YyEfk.AOta', 'filerate', 0),
(15, 'build_admin', '$2y$10$0yroAwFgdGTM0hGN8Zqw3.CMzbIbC951QKqJfln/SHK7R/6HQZNne', 'selectoptions', 1),
(16, 'file_admin', '$2y$10$ixisIpqM5ym/V6wa2zUtOOLcJe24lJKjXUrbCVVT7bGfHDEXlaZ4q', 'selectoptions', 1),
(17, 'Irate_admin', '$2y$10$6yxMmbR4i58WmxZtpRgTKOaJnSQOJLRT2b3zsYcB74sPzq.wtyeca', 'selectoptions', 1),
(18, 'hype_admin', '$2y$10$DCNY2yKK53mp6p3ChftQyOe2CGHSHEpAFVARvHDeASU6hsI2sEN/m', 'selectoptions', 1),
(19, 'jonna', '$2y$10$zMAsyG1NGKoDLbfXWQ6IqeXn/rc4XR.7DqZQKs34qR6ie8XMaRgh2', 'irate', 0),
(20, 'jonna1', '$2y$10$ivWo/5p8WUS2Lb0Yqe.iEup1.qqyIR515cTDocdKiP9WLe6vxtxPm', 'irate', 0),
(21, 'jonna2', '$2y$10$HzYUlksVvkGxhTQ0prFdbemo/Y9zDg0rwPbyYuhbxJDbLdLdc9E1i', 'irate', 0),
(23, 'joy1', '$2y$10$PxKv.H2W3CnKeBCc22SI8.DuiJD4TfiwgqfdY1OeVTze50khqTIn.', 'buildrate', 0),
(24, 'joy2', '$2y$10$n6VaT1EAUgE3YYGqzsH9y.vn.1pLOrInlO5T74B/8qlIQAdwkTOEG', 'buildrate', 0),
(25, 'jemma', '$2y$10$o2xhQa32NCb/wMFN5Ptah.bIWLnILdCN9HVkVia1bjAFOGqml/XCq', 'hypebeast', 0),
(26, 'jemma1', '$2y$10$iokQU6rP/DdmQXt/a50Y2ukuF.fS/k30D3nmHgVA00qsQLenbRDYa', 'hypebeast', 0),
(27, 'jemma2', '$2y$10$b09mCW0rRDB1HzWmSi5xZOn2Tkmz5Vr9YjJJyb7.g5YV1DpeG4oz6', 'hypebeast', 0);
=======
INSERT INTO `users` (`user_id`, `username`, `password_hash`, `option`) VALUES
(1, 'laboy', '$2y$10$BNk3Zlxw6PqZQY636CkKYOrbSXybTiJdhwLwiMztuP1YyEfk.AOta', 'filerate'),
(2, 'jonna', '$2y$10$OxvOkY4nwYUWxq8PApUfieY1sQ0RqyfLIj90shKasgrnRjcDfqPvq', 'irate'),
(3, 'jemma', '$2y$10$g3cVv6bLsbQSaWNgda2Pmep9ISxacvZV.VCvsthrcpvFLENEDUksK', 'hypebeast'),
(4, 'joy', '$2y$10$MhchphoqgG2dUXld.XQ2Z.Uwctwu0GGOFsWy8tCuKnZRd0600M5Fe', 'buildrate');
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`building_id`);

--
-- Indexes for table `building_comments`
--
ALTER TABLE `building_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `building_id` (`building_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `building_ratings`
--
ALTER TABLE `building_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `building_id` (`building_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `commento`
--
ALTER TABLE `commento`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `document_id` (`document_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`document_id`);

--
-- Indexes for table `e_hypebeast`
--
ALTER TABLE `e_hypebeast`
  ADD PRIMARY KEY (`E_hype_id`);

--
-- Indexes for table `e_hype_comments`
--
ALTER TABLE `e_hype_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `E_hype_id` (`E_hype_id`);

--
-- Indexes for table `e_hype_ratings`
--
ALTER TABLE `e_hype_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `E_hype_id` (`E_hype_id`);

--
-- Indexes for table `file_ratings`
--
ALTER TABLE `file_ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `irate`
--
ALTER TABLE `irate`
  ADD PRIMARY KEY (`Irate_id`);

--
-- Indexes for table `irate_comments`
--
ALTER TABLE `irate_comments`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `Irate_id` (`Irate_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `irate_ratings`
--
ALTER TABLE `irate_ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `Irate_id` (`Irate_id`),
  ADD KEY `user_id` (`user_id`);

--
<<<<<<< HEAD
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
=======
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `document_id` (`document_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=173;

--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `building_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `building_comments`
--
ALTER TABLE `building_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `building_ratings`
--
ALTER TABLE `building_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `commento`
--
ALTER TABLE `commento`
<<<<<<< HEAD
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
=======
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea

--
-- AUTO_INCREMENT for table `document`
--
ALTER TABLE `document`
  MODIFY `document_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `e_hypebeast`
--
ALTER TABLE `e_hypebeast`
  MODIFY `E_hype_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `e_hype_comments`
--
ALTER TABLE `e_hype_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `e_hype_ratings`
--
ALTER TABLE `e_hype_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `file_ratings`
--
ALTER TABLE `file_ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `irate`
--
ALTER TABLE `irate`
  MODIFY `Irate_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `irate_comments`
--
ALTER TABLE `irate_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `irate_ratings`
--
ALTER TABLE `irate_ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
<<<<<<< HEAD
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
=======
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea

--
-- AUTO_INCREMENT for table `uploaded_files`
--
ALTER TABLE `uploaded_files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
<<<<<<< HEAD
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
=======
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea

--
-- Constraints for dumped tables
--

--
-- Constraints for table `building_comments`
--
ALTER TABLE `building_comments`
  ADD CONSTRAINT `building_comments_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`),
  ADD CONSTRAINT `building_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `building_ratings`
--
ALTER TABLE `building_ratings`
  ADD CONSTRAINT `building_ratings_ibfk_1` FOREIGN KEY (`building_id`) REFERENCES `buildings` (`building_id`),
  ADD CONSTRAINT `building_ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
<<<<<<< HEAD
=======
-- Constraints for table `commento`
--
ALTER TABLE `commento`
  ADD CONSTRAINT `commento_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `document` (`document_id`),
  ADD CONSTRAINT `commento_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea
-- Constraints for table `e_hype_comments`
--
ALTER TABLE `e_hype_comments`
  ADD CONSTRAINT `e_hype_comments_ibfk_1` FOREIGN KEY (`E_hype_id`) REFERENCES `e_hypebeast` (`E_hype_id`);
<<<<<<< HEAD
=======

--
-- Constraints for table `e_hype_ratings`
--
ALTER TABLE `e_hype_ratings`
  ADD CONSTRAINT `e_hype_ratings_ibfk_1` FOREIGN KEY (`E_hype_id`) REFERENCES `e_hypebeast` (`E_hype_id`);

--
-- Constraints for table `irate_comments`
--
ALTER TABLE `irate_comments`
  ADD CONSTRAINT `irate_comments_ibfk_1` FOREIGN KEY (`Irate_id`) REFERENCES `irate` (`Irate_id`),
  ADD CONSTRAINT `irate_comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `irate_ratings`
--
ALTER TABLE `irate_ratings`
  ADD CONSTRAINT `irate_ratings_ibfk_1` FOREIGN KEY (`Irate_id`) REFERENCES `irate` (`Irate_id`),
  ADD CONSTRAINT `irate_ratings_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`document_id`) REFERENCES `document` (`document_id`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
>>>>>>> 6a2e4cc0f45f6e9db69bb50624eb6a0fa6013cea
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
