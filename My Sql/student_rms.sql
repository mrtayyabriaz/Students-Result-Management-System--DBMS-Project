-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 07, 2023 at 08:50 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `ClassID` int(11) NOT NULL,
  `Classname` varchar(30) NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`ClassID`, `Classname`, `TeacherID`) VALUES
(71, 'BSSE (Semester 1)', 1212),
(72, 'BSSE (Semester 2)', 1212),
(73, 'BSSE (Semester 3)', 1212),
(74, 'BSSE (Semester 4)', 1212),
(75, 'BSSE (Semester 5)', 1212);

-- --------------------------------------------------------

--
-- Table structure for table `studentcombination`
--

CREATE TABLE `studentcombination` (
  `No` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentcombination`
--

INSERT INTO `studentcombination` (`No`, `StudentID`, `ClassID`, `TeacherID`) VALUES
(1, 1111, 71, 1212),
(2, 1111, 73, 1212),
(3, 1111, 74, 1212);

-- --------------------------------------------------------

--
-- Table structure for table `studentresult`
--

CREATE TABLE `studentresult` (
  `No` int(11) NOT NULL,
  `TotalMarks` int(11) NOT NULL,
  `Obtained` int(11) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL,
  `DateInsert` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentresult`
--

INSERT INTO `studentresult` (`No`, `TotalMarks`, `Obtained`, `StudentID`, `SubjectID`, `ClassID`, `DateInsert`) VALUES
(1, 100, 98, 1111, 1, 71, '2023-10-07 05:16:41'),
(2, 100, 0, 1111, 2, 71, '2023-10-07 05:16:53'),
(3, 100, 0, 1111, 3, 71, '2023-10-07 05:17:02'),
(4, 100, 99, 1111, 4, 71, '2023-10-07 05:17:09'),
(5, 100, 0, 1111, 6, 71, '2023-10-07 05:17:29'),
(6, 100, 0, 1111, 7, 71, '2023-10-07 05:17:38'),
(7, 100, 0, 1111, 8, 73, '2023-10-07 05:25:45'),
(8, 100, 0, 1111, 9, 73, '2023-10-07 05:25:52'),
(9, 100, 0, 1111, 10, 73, '2023-10-07 05:25:59'),
(10, 100, 0, 1111, 11, 73, '2023-10-07 05:26:05'),
(11, 100, 0, 1111, 12, 73, '2023-10-07 05:26:14'),
(12, 100, 0, 1111, 13, 74, '2023-10-07 05:30:06'),
(13, 100, 0, 1111, 14, 74, '2023-10-07 05:30:17'),
(14, 100, 0, 1111, 15, 74, '2023-10-07 05:31:40'),
(15, 100, 0, 1111, 16, 74, '2023-10-07 05:31:51'),
(16, 100, 0, 1111, 17, 74, '2023-10-07 05:32:04');

-- --------------------------------------------------------

--
-- Table structure for table `student_login`
--

CREATE TABLE `student_login` (
  `Name` varchar(50) NOT NULL,
  `StudentID` int(11) NOT NULL,
  `Contact` varchar(50) NOT NULL,
  `Password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_login`
--

INSERT INTO `student_login` (`Name`, `StudentID`, `Contact`, `Password`) VALUES
('saad', 1101, '', 'mystudent12'),
('Mr Tayyab Riaz', 1111, '03451234567', 'thepassword'),
('Waheed', 1112, '03451234567', 'thepassword'),
('tayyab', 11111, '0823408', '1111');

-- --------------------------------------------------------

--
-- Table structure for table `subjectcombination`
--

CREATE TABLE `subjectcombination` (
  `No` int(11) NOT NULL,
  `SubjectID` int(11) NOT NULL,
  `ClassID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjectcombination`
--

INSERT INTO `subjectcombination` (`No`, `SubjectID`, `ClassID`) VALUES
(1, 1, 71),
(2, 2, 71),
(3, 3, 71),
(4, 4, 71),
(5, 6, 71),
(6, 7, 71),
(7, 8, 73),
(8, 9, 73),
(9, 10, 73),
(10, 11, 73),
(11, 12, 73),
(12, 13, 74),
(13, 14, 74),
(14, 15, 74),
(15, 16, 74),
(16, 17, 74);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `SubjectID` int(11) NOT NULL,
  `SubjectName` varchar(60) NOT NULL,
  `TeacherID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`SubjectID`, `SubjectName`, `TeacherID`) VALUES
(1, 'Eenglish(ECC)', 1212),
(2, 'Information Com Tech(ICT)', 1212),
(3, 'Peogramming Fundamental (PF)', 1212),
(4, 'Physics', 1212),
(5, 'Object Oriented Programming (OOP)', 1212),
(6, 'Calculas And Analytical Geometry', 1212),
(7, 'Software Engineering (SE)', 1212),
(8, 'Discrete Structure &amp; Algorithm (DSA)', 1212),
(9, 'Financial Accounting (FA)', 1212),
(10, 'Human Computer Interaction (HCI)', 1212),
(11, 'Linear Algebra (LA)', 1212),
(12, 'Software Requirements Engineering (SRE)', 1212),
(13, 'Data Base (DBS)', 1212),
(14, 'Entrepreneurship ITE', 1212),
(15, 'Operating System (OS)', 1212),
(16, 'Probability (PB)', 1212),
(17, 'Software Development Architecture (SDA)', 1212);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login`
--

CREATE TABLE `teacher_login` (
  `Name` varchar(50) NOT NULL,
  `TeacherID` int(11) NOT NULL,
  `Contact` varchar(60) NOT NULL,
  `Password` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teacher_login`
--

INSERT INTO `teacher_login` (`Name`, `TeacherID`, `Contact`, `Password`) VALUES
('Sir Tayyab Riaz', 1212, '0928498239', '1212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`ClassID`),
  ADD KEY `Teachers in class` (`TeacherID`),
  ADD KEY `ClassID` (`ClassID`),
  ADD KEY `ClassID_2` (`ClassID`);

--
-- Indexes for table `studentcombination`
--
ALTER TABLE `studentcombination`
  ADD PRIMARY KEY (`No`),
  ADD KEY `Students in class` (`ClassID`);

--
-- Indexes for table `studentresult`
--
ALTER TABLE `studentresult`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `StudentID` (`StudentID`,`SubjectID`,`ClassID`),
  ADD KEY `subjects result` (`SubjectID`);

--
-- Indexes for table `student_login`
--
ALTER TABLE `student_login`
  ADD PRIMARY KEY (`StudentID`);

--
-- Indexes for table `subjectcombination`
--
ALTER TABLE `subjectcombination`
  ADD PRIMARY KEY (`No`),
  ADD UNIQUE KEY `SubjectID` (`SubjectID`,`ClassID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`SubjectID`);

--
-- Indexes for table `teacher_login`
--
ALTER TABLE `teacher_login`
  ADD PRIMARY KEY (`TeacherID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `ClassID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `studentcombination`
--
ALTER TABLE `studentcombination`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `studentresult`
--
ALTER TABLE `studentresult`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subjectcombination`
--
ALTER TABLE `subjectcombination`
  MODIFY `No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `SubjectID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `class`
--
ALTER TABLE `class`
  ADD CONSTRAINT `Teachers in class` FOREIGN KEY (`TeacherID`) REFERENCES `teacher_login` (`TeacherID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `studentcombination`
--
ALTER TABLE `studentcombination`
  ADD CONSTRAINT `Students in class` FOREIGN KEY (`ClassID`) REFERENCES `class` (`ClassID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
