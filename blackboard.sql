-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2017 at 01:29 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blackboard`
--

-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE `answer` (
  `AID` int(50) NOT NULL,
  `Answer_Title` varchar(50) NOT NULL,
  `QID` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `CID` int(10) NOT NULL,
  `College` varchar(40) NOT NULL,
  `Subject` varchar(30) NOT NULL,
  `CourseN` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CID`, `College`, `Subject`, `CourseN`) VALUES
(1, 'pace', 'algo', 'cs610'),
(2, 'pace', 'parallel', 'cs612'),
(3, 'pace', 'internet', 'cs616'),
(4, 'nyu', 'AI', 'CS633');

-- --------------------------------------------------------

--
-- Table structure for table `que`
--

CREATE TABLE `que` (
  `QID` int(50) NOT NULL,
  `Q_type` varchar(20) NOT NULL,
  `CID` int(20) NOT NULL,
  `CourseN` varchar(10) NOT NULL,
  `Q_title` varchar(50) NOT NULL,
  `QP_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_paper`
--

CREATE TABLE `question_paper` (
  `QP_ID` int(20) NOT NULL,
  `CID` int(10) NOT NULL,
  `UID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_paper`
--

INSERT INTO `question_paper` (`QP_ID`, `CID`, `UID`) VALUES
(1, 1, 2),
(2, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_acc`
--

CREATE TABLE `user_acc` (
  `UID` int(20) NOT NULL,
  `Acc_type` varchar(10) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(128) NOT NULL,
  `Email` varchar(254) NOT NULL,
  `First_Name` varchar(20) NOT NULL,
  `Last_Name` varchar(20) NOT NULL,
  `address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_acc`
--

INSERT INTO `user_acc` (`UID`, `Acc_type`, `Username`, `Password`, `Email`, `First_Name`, `Last_Name`, `address`) VALUES
(1, 'admin', 'admin', '123', 'a@pace.edu', 'A', 'P', ''),
(2, 'Faculty', 'ameya', '123', 'ap@pace.edu', 'Ameya', 'Pingulkar', '80, Liberty Avenue,Jersey City,NJ 07306');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answer`
--
ALTER TABLE `answer`
  ADD PRIMARY KEY (`AID`),
  ADD KEY `QID` (`QID`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`CID`);

--
-- Indexes for table `que`
--
ALTER TABLE `que`
  ADD PRIMARY KEY (`QID`),
  ADD KEY `CID` (`CID`),
  ADD KEY `QP_ID` (`QP_ID`);

--
-- Indexes for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD PRIMARY KEY (`QP_ID`),
  ADD KEY `CID` (`CID`),
  ADD KEY `UID` (`UID`);

--
-- Indexes for table `user_acc`
--
ALTER TABLE `user_acc`
  ADD PRIMARY KEY (`UID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answer`
--
ALTER TABLE `answer`
  MODIFY `AID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `CID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `que`
--
ALTER TABLE `que`
  MODIFY `QID` int(50) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question_paper`
--
ALTER TABLE `question_paper`
  MODIFY `QP_ID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_acc`
--
ALTER TABLE `user_acc`
  MODIFY `UID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `answer_ibfk_1` FOREIGN KEY (`QID`) REFERENCES `que` (`QID`);

--
-- Constraints for table `que`
--
ALTER TABLE `que`
  ADD CONSTRAINT `que_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`),
  ADD CONSTRAINT `que_ibfk_2` FOREIGN KEY (`QP_ID`) REFERENCES `question_paper` (`QP_ID`);

--
-- Constraints for table `question_paper`
--
ALTER TABLE `question_paper`
  ADD CONSTRAINT `question_paper_ibfk_1` FOREIGN KEY (`CID`) REFERENCES `course` (`CID`),
  ADD CONSTRAINT `question_paper_ibfk_2` FOREIGN KEY (`UID`) REFERENCES `user_acc` (`UID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
