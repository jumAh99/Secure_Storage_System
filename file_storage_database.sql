-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2023 at 03:57 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `file_storage_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `friendship_status`
--

CREATE TABLE `friendship_status` (
  `id` int(11) NOT NULL,
  `senderUID` varchar(128) NOT NULL,
  `receiverUID` varchar(128) NOT NULL,
  `isFriend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `friendship_status`
--

INSERT INTO `friendship_status` (`id`, `senderUID`, `receiverUID`, `isFriend`) VALUES
(211, 'jumma', 'bob', 1),
(212, 'jumma', 'sara', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_file_details`
--

CREATE TABLE `tb_file_details` (
  `fileID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fileName` varchar(500) NOT NULL,
  `uploadDate` varchar(500) NOT NULL,
  `fileSize` varchar(128) NOT NULL,
  `uploadTime` varchar(8) NOT NULL,
  `Owner` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_file_details`
--

INSERT INTO `tb_file_details` (`fileID`, `userID`, `fileName`, `uploadDate`, `fileSize`, `uploadTime`, `Owner`) VALUES
(1315, 76, 'test.txt', '2023-04-21', '0', '08:23:54', 'jumma'),
(1319, 77, 'jumma-test.txt', '2023-04-21', '0', '08:23:54', 'jumma');

-- --------------------------------------------------------

--
-- Table structure for table `tb_file_share_info`
--

CREATE TABLE `tb_file_share_info` (
  `shareID` int(11) NOT NULL,
  `fileName` varchar(128) NOT NULL,
  `senderUID` varchar(128) NOT NULL,
  `receiverUID` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_file_share_info`
--

INSERT INTO `tb_file_share_info` (`shareID`, `fileName`, `senderUID`, `receiverUID`) VALUES
(395, 'jumma-test.txt', 'jumma', 'bob');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user_login_info`
--

CREATE TABLE `tb_user_login_info` (
  `userID` int(11) NOT NULL,
  `userUID` varchar(128) NOT NULL,
  `userEmail` varchar(128) NOT NULL,
  `userPassword` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user_login_info`
--

INSERT INTO `tb_user_login_info` (`userID`, `userUID`, `userEmail`, `userPassword`) VALUES
(76, 'jumma', 'jumma@gmail.com', '$2y$10$qCH/XXmooAJeJ8Qq4jzlQ.0noHWISdzP1PT1nr8Jo708dPHcF.7IO'),
(77, 'bob', 'bob@gmail.com', '$2y$10$adQjAQI3xjjypLxBe4qP3e552wrolh8Fzy111KJAQe5pfCUomGDYm'),
(78, 'sara', 'sara@gmail.com', '$2y$10$ZmraPBadJtJibFZqbvBs7e7Sfcclb.RT746cOhsNlKnbuiC4aoKV6');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friendship_status`
--
ALTER TABLE `friendship_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_file_details`
--
ALTER TABLE `tb_file_details`
  ADD PRIMARY KEY (`fileID`);

--
-- Indexes for table `tb_file_share_info`
--
ALTER TABLE `tb_file_share_info`
  ADD PRIMARY KEY (`shareID`);

--
-- Indexes for table `tb_user_login_info`
--
ALTER TABLE `tb_user_login_info`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friendship_status`
--
ALTER TABLE `friendship_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;

--
-- AUTO_INCREMENT for table `tb_file_details`
--
ALTER TABLE `tb_file_details`
  MODIFY `fileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1320;

--
-- AUTO_INCREMENT for table `tb_file_share_info`
--
ALTER TABLE `tb_file_share_info`
  MODIFY `shareID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=396;

--
-- AUTO_INCREMENT for table `tb_user_login_info`
--
ALTER TABLE `tb_user_login_info`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
