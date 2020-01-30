-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 08, 2020 at 03:16 PM
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
-- Database: `quiz2`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `ID` int(50) NOT NULL,
  `team_no` int(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `score` int(50) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `team_no`, `email`, `score`) VALUES
(1, 1, 'tarunkumarnahak89@gmail.com', 5),
(2, 2, 'tarun2@gmail.com', 5),
(3, 3, 'tarun3@gmail.com', 5);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(255) NOT NULL,
  `que` text NOT NULL,
  `option 1` varchar(222) NOT NULL,
  `option 2` varchar(222) NOT NULL,
  `option 3` varchar(222) NOT NULL,
  `option 4` varchar(222) NOT NULL,
  `ans` varchar(222) NOT NULL,
  `userans` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `que`, `option 1`, `option 2`, `option 3`, `option 4`, `ans`, `userans`) VALUES
(1, 'What does PHP stand for?', 'Preprocessed Hypertext Page', 'Hypertext Markup Language', 'Hypertext Preprocessor', 'Hypertext Transfer Protocol', 'Hypertext Preprocessor', 'Hypertext Preprocessor'),
(2, 'What will be the value of $var? ', '0', '1', '2', 'NULL', '0', '0'),
(3, ' ____________ function in PHP Returns a list of response headers sent (or ready to send)', 'header', 'headers_list', 'header_sent', 'header_send', 'headers_list', 'headers_list'),
(4, 'Which of the following is the Server Side Scripting Language?', 'HTML', 'CSS', 'JS', 'PHP', 'PHP', 'PHP'),
(5, 'From which website you download this source code?', 'Softglobe.net', 'w3school.com', 'technopoints.co.in', 'php.net', 'technopoints.co.in', 'technopoints.co.in');

-- --------------------------------------------------------

--
-- Table structure for table `report`
--

CREATE TABLE `report` (
  `team_no` int(50) NOT NULL,
  `score` int(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `score` int(50) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`, `score`) VALUES
(1, 'tarunkumar', '$2y$10$795lKMcEykKYNNE6HcBr3eMgg3rK.mBPbWxCEgPSRo5hgAOQAv2.i', '2020-01-06 17:39:56', 5),
(2, 'im', '$2y$10$0Og5YFIFl6CwlMlZnXCTUuF0H49MV/Mp5rNQThdcwIElcEGdIcwva', '2020-01-06 18:41:45', 5),
(3, '123', '$2y$10$cerdy0f2DxbGBWCu/avHneTANsTRst3XgFIFX.BGCMlIETXvk5rk.', '2020-01-07 10:22:02', 5),
(4, '1234', '$2y$10$PvJK/B0NjGLjVsuXNIN0V.XtNloReKz7GgMV.NZqNj0SZxdDNYckq', '2020-01-07 11:53:54', 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`team_no`),
  ADD UNIQUE KEY `team_no` (`team_no`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`team_no`),
  ADD UNIQUE KEY `team_no` (`team_no`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `ID` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
