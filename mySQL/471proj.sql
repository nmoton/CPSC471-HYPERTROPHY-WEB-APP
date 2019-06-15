-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2019 at 09:10 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `471proj`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `userID_fk` int(11) NOT NULL,
  `AuthenticityLevel` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `userID_fk` int(11) NOT NULL,
  `postID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `exerciseID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `sets` int(4) NOT NULL,
  `reps` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `workoutID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_record`
--

CREATE TABLE `personal_record` (
  `personalRecordID` int(11) NOT NULL,
  `exerciseID_fk` int(11) NOT NULL,
  `workoutID_fk` int(11) NOT NULL,
  `prList_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `userID_fk` int(11) NOT NULL,
  `prID_fk` int(11) NOT NULL,
  `workoutID_fk` int(11) NOT NULL,
  `personalWallID_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `standard_user`
--

CREATE TABLE `standard_user` (
  `userID_fk` int(11) NOT NULL,
  `personalWallID` int(11) NOT NULL,
  `workoutListID` int(11) NOT NULL,
  `prListID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `bMonth` int(2) NOT NULL,
  `bDay` int(2) NOT NULL,
  `bYear` int(4) NOT NULL,
  `bAge` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `email`, `password`, `fname`, `lname`, `bMonth`, `bDay`, `bYear`, `bAge`) VALUES
(1, 'marela.carlos@ucalgary.ca', '1234', 'Marela', 'Carlos', 4, 17, 1998, 21),
(2, 'nathan.moton@ucalgary.ca', '1234', 'Nathan', 'Moton', 5, 15, 1998, 21);

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `workoutID` int(11) NOT NULL,
  `wMonth` int(2) NOT NULL,
  `wDay` int(2) NOT NULL,
  `wYear` int(4) NOT NULL,
  `wTime` time(6) NOT NULL,
  `privacy` varchar(7) NOT NULL,
  `workoutListID_fk` int(11) NOT NULL,
  `wDesc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD KEY `userID_fk` (`userID_fk`);

--
-- Indexes for table `community`
--
ALTER TABLE `community`
  ADD KEY `userID_fk` (`userID_fk`),
  ADD KEY `postID_fk` (`postID_fk`);

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`exerciseID`),
  ADD KEY `workoutID_fk` (`workoutID_fk`);

--
-- Indexes for table `personal_record`
--
ALTER TABLE `personal_record`
  ADD PRIMARY KEY (`personalRecordID`),
  ADD KEY `exerciseID_fk` (`exerciseID_fk`),
  ADD KEY `workoutID_fk` (`workoutID_fk`),
  ADD KEY `prList_fk` (`prList_fk`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`),
  ADD KEY `userID_fk` (`userID_fk`),
  ADD KEY `prID_fk` (`prID_fk`),
  ADD KEY `workoutID_fk` (`workoutID_fk`),
  ADD KEY `personalWallID_fk` (`personalWallID_fk`);

--
-- Indexes for table `standard_user`
--
ALTER TABLE `standard_user`
  ADD UNIQUE KEY `UNIQUE1` (`personalWallID`),
  ADD UNIQUE KEY `UNIQUE2` (`workoutListID`),
  ADD UNIQUE KEY `UNIQUE3` (`prListID`),
  ADD KEY `userID_fk` (`userID_fk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`workoutID`),
  ADD KEY `workoutListID` (`workoutListID_fk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exercise`
--
ALTER TABLE `exercise`
  MODIFY `exerciseID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_record`
--
ALTER TABLE `personal_record`
  MODIFY `personalRecordID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `postID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `workoutID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin_ibfk_1` FOREIGN KEY (`userID_fk`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `community`
--
ALTER TABLE `community`
  ADD CONSTRAINT `community_ibfk_1` FOREIGN KEY (`userID_fk`) REFERENCES `user` (`userID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `community_ibfk_2` FOREIGN KEY (`postID_fk`) REFERENCES `post` (`postID`) ON UPDATE CASCADE;

--
-- Constraints for table `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `exercise_ibfk_1` FOREIGN KEY (`workoutID_fk`) REFERENCES `workout` (`workoutID`) ON UPDATE CASCADE;

--
-- Constraints for table `personal_record`
--
ALTER TABLE `personal_record`
  ADD CONSTRAINT `personal_record_ibfk_1` FOREIGN KEY (`exerciseID_fk`) REFERENCES `exercise` (`exerciseID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_record_ibfk_2` FOREIGN KEY (`workoutID_fk`) REFERENCES `workout` (`workoutID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_record_ibfk_3` FOREIGN KEY (`prList_fk`) REFERENCES `standard_user` (`prListID`) ON UPDATE CASCADE;

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`userID_fk`) REFERENCES `user` (`userID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`prID_fk`) REFERENCES `personal_record` (`personalRecordID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_3` FOREIGN KEY (`workoutID_fk`) REFERENCES `workout` (`workoutID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `post_ibfk_4` FOREIGN KEY (`personalWallID_fk`) REFERENCES `standard_user` (`personalWallID`) ON UPDATE CASCADE;

--
-- Constraints for table `standard_user`
--
ALTER TABLE `standard_user`
  ADD CONSTRAINT `standard_user_ibfk_1` FOREIGN KEY (`userID_fk`) REFERENCES `user` (`userID`) ON UPDATE CASCADE;

--
-- Constraints for table `workout`
--
ALTER TABLE `workout`
  ADD CONSTRAINT `workout_ibfk_1` FOREIGN KEY (`workoutListID_fk`) REFERENCES `standard_user` (`workoutListID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
