-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 25, 2020 at 07:20 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `StudentManagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `Assignments`
--

CREATE TABLE `Assignments` (
  `AssignmentID` int(11) NOT NULL,
  `Description` text COLLATE utf8_swedish_ci NOT NULL,
  `FilePath` text COLLATE utf8_swedish_ci NOT NULL,
  `DueTo` datetime NOT NULL,
  `FileName` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `Assignments`
--

INSERT INTO `Assignments` (`AssignmentID`, `Description`, `FilePath`, `DueTo`, `FileName`) VALUES
(15, 'asdasdasda', '/StudentManagement/admin/assignments/5f6dcdab2aac7_baocaothuchanh1.docx', '2020-09-11 20:00:00', 'baocaothuchanh1.docx');

-- --------------------------------------------------------

--
-- Table structure for table `Challenges`
--

CREATE TABLE `Challenges` (
  `ChallengeID` int(11) NOT NULL,
  `ChallengeName` text COLLATE utf8_swedish_ci NOT NULL,
  `Hint` text COLLATE utf8_swedish_ci NOT NULL,
  `Folder` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Histories`
--

CREATE TABLE `Histories` (
  `HistoryID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Result` tinyint(1) NOT NULL,
  `SubmitDate` datetime NOT NULL,
  `ChallengeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Messages`
--

CREATE TABLE `Messages` (
  `MessageID` int(11) NOT NULL,
  `Content` text COLLATE utf8_swedish_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `SendID` int(11) NOT NULL,
  `ReceiveID` int(11) NOT NULL,
  `Seen` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `Messages`
--

INSERT INTO `Messages` (`MessageID`, `Content`, `CreateDate`, `SendID`, `ReceiveID`, `Seen`) VALUES
(19, 'asasdasd', '2020-09-24 04:19:23', 12, 12, 0),
(20, 'zxczxc', '2020-09-24 04:19:28', 12, 12, 0),
(23, 'asdasdasd', '2020-09-25 12:57:59', 14, 14, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Reports`
--

CREATE TABLE `Reports` (
  `ReportID` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `FilePath` text COLLATE utf8_swedish_ci NOT NULL,
  `CreateDate` datetime NOT NULL,
  `AssignmentID` int(11) NOT NULL,
  `FileName` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Roles`
--

CREATE TABLE `Roles` (
  `RoleID` int(11) NOT NULL,
  `Description` text COLLATE utf8_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `Roles`
--

INSERT INTO `Roles` (`RoleID`, `Description`) VALUES
(1, 'Student'),
(2, 'Teacher');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `UserID` int(11) NOT NULL,
  `UserName` text COLLATE utf8_swedish_ci NOT NULL,
  `Password` text COLLATE utf8_swedish_ci NOT NULL,
  `FullName` text COLLATE utf8_swedish_ci NOT NULL,
  `PhoneNumber` text COLLATE utf8_swedish_ci NOT NULL,
  `Email` text COLLATE utf8_swedish_ci NOT NULL,
  `Role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_swedish_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`UserID`, `UserName`, `Password`, `FullName`, `PhoneNumber`, `Email`, `Role`) VALUES
(12, 'hoangnd', '$2y$10$0tOMb/ODC6t/uqRRVTnuZO6AUh0wrsj9ShEBwoMO6Bs4I8GkNn9S2', 'Hoang Nguyen', '0946164298', 'hoangt2k24@gmail.com', 1),
(14, 'hale123', '$2y$10$KTTPox5EDj/ZtaAXN3lHsubsC02rsjTeHTWKjMGdyHp5mGhIyCuM2', 'Ha Le', '0392348520911111', 'hale123123123@123', 2),
(18, 'quangle', '$2y$10$pfjkVfQVuvmU2rek/eOqm.zaY/B/SGfO1e5GqUeZJ1Jklz56u1lqW', 'Quang Lê', '0891231242', 'quangle@facebook.com', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Assignments`
--
ALTER TABLE `Assignments`
  ADD PRIMARY KEY (`AssignmentID`);

--
-- Indexes for table `Challenges`
--
ALTER TABLE `Challenges`
  ADD PRIMARY KEY (`ChallengeID`);

--
-- Indexes for table `Histories`
--
ALTER TABLE `Histories`
  ADD PRIMARY KEY (`HistoryID`),
  ADD KEY `STUDENT_FK` (`StudentID`),
  ADD KEY `CHAL_FK` (`ChallengeID`);

--
-- Indexes for table `Messages`
--
ALTER TABLE `Messages`
  ADD PRIMARY KEY (`MessageID`),
  ADD KEY `SendID` (`SendID`),
  ADD KEY `ReceiveID` (`ReceiveID`);

--
-- Indexes for table `Reports`
--
ALTER TABLE `Reports`
  ADD PRIMARY KEY (`ReportID`),
  ADD KEY `ASSIGNMENTID_FK` (`AssignmentID`),
  ADD KEY `STUDENTID_FK` (`StudentID`);

--
-- Indexes for table `Roles`
--
ALTER TABLE `Roles`
  ADD PRIMARY KEY (`RoleID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `Role` (`Role`),
  ADD KEY `Role_2` (`Role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Assignments`
--
ALTER TABLE `Assignments`
  MODIFY `AssignmentID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Challenges`
--
ALTER TABLE `Challenges`
  MODIFY `ChallengeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Histories`
--
ALTER TABLE `Histories`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `Messages`
--
ALTER TABLE `Messages`
  MODIFY `MessageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Reports`
--
ALTER TABLE `Reports`
  MODIFY `ReportID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Roles`
--
ALTER TABLE `Roles`
  MODIFY `RoleID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Histories`
--
ALTER TABLE `Histories`
  ADD CONSTRAINT `CHAL_FK` FOREIGN KEY (`ChallengeID`) REFERENCES `Challenges` (`ChallengeID`) ON DELETE CASCADE,
  ADD CONSTRAINT `STUDENT_FK` FOREIGN KEY (`StudentID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `Messages`
--
ALTER TABLE `Messages`
  ADD CONSTRAINT `RECEIVEID_FK` FOREIGN KEY (`ReceiveID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE,
  ADD CONSTRAINT `SENDID_FK` FOREIGN KEY (`SendID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `Reports`
--
ALTER TABLE `Reports`
  ADD CONSTRAINT `ASSIGNMENTID_FK` FOREIGN KEY (`AssignmentID`) REFERENCES `Assignments` (`AssignmentID`) ON DELETE CASCADE,
  ADD CONSTRAINT `STUDENTID_FK` FOREIGN KEY (`StudentID`) REFERENCES `Users` (`UserID`) ON DELETE CASCADE;

--
-- Constraints for table `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `ROLE_FK` FOREIGN KEY (`Role`) REFERENCES `Roles` (`RoleID`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
