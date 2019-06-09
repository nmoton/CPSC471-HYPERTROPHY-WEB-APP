-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 07, 2019 at 07:46 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hypertrophy`
--

-- --------------------------------------------------------

--
-- Table structure for table `ADMIN`
--

CREATE TABLE `ADMIN` (
  `UserID` int(11) NOT NULL,
  `AuthenticityLevel` int(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `COMMUNITY_WALL`
--

CREATE TABLE `COMMUNITY_WALL` (
  `UserID` int(11) NOT NULL,
  `PostID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `EXERCISE`
--

CREATE TABLE `EXERCISE` (
  `ExerciseID` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Sets` int(2) DEFAULT NULL,
  `Reps` int(2) DEFAULT NULL,
  `Weight` int(6) DEFAULT NULL,
  `RPE` int(1) DEFAULT NULL,
  `WorkoutID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `PERSONAL_RECORD`
--

CREATE TABLE `PERSONAL_RECORD` (
  `PersonalRecordID` int(11) NOT NULL,
  `ExerciseID` int(11) NOT NULL,
  `WorkoutID` int(11) NOT NULL,
  `PRListID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `POST`
--

CREATE TABLE `POST` (
  `PostID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `PRID` int(11) NOT NULL,
  `WorkoutListID` int(11) NOT NULL,
  `PersonalWallID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `STANDARD_USER`
--

CREATE TABLE `STANDARD_USER` (
  `UserID` int(11) NOT NULL,
  `PersonalWallID` int(11) NOT NULL,
  `WorkoutListID` int(11) NOT NULL,
  `PRListID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `USER`
--

CREATE TABLE `USER` (
  `UserID` int(11) NOT NULL,
  `Email` varchar(320) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `FName` varchar(255) NOT NULL,
  `LName` varchar(255) NOT NULL,
  `BMonth` int(2) NOT NULL,
  `BDay` int(2) NOT NULL,
  `BYear` int(4) NOT NULL,
  `Age` int(3) NOT NULL,
  `Gender` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `WORKOUT`
--

CREATE TABLE `WORKOUT` (
  `WorkoutID` int(11) NOT NULL,
  `WMonth` int(2) NOT NULL,
  `WDay` int(2) NOT NULL,
  `WYear` year(4) NOT NULL,
  `WTime` time NOT NULL,
  `Privacy` int(1) NOT NULL DEFAULT 0 COMMENT '0 = Private (by default), 1 = Public',
  `WorkoutListID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ADMIN`
--
ALTER TABLE `ADMIN`
  ADD PRIMARY KEY (`UserID`);

--
-- Indexes for table `COMMUNITY_WALL`
--
ALTER TABLE `COMMUNITY_WALL`
  ADD PRIMARY KEY (`UserID`,`PostID`);

--
-- Indexes for table `EXERCISE`
--
ALTER TABLE `EXERCISE`
  ADD PRIMARY KEY (`ExerciseID`);

--
-- Indexes for table `PERSONAL_RECORD`
--
ALTER TABLE `PERSONAL_RECORD`
  ADD PRIMARY KEY (`PersonalRecordID`);

--
-- Indexes for table `POST`
--
ALTER TABLE `POST`
  ADD PRIMARY KEY (`PostID`);

--
-- Indexes for table `STANDARD_USER`
--
ALTER TABLE `STANDARD_USER`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `PersonalWallID` (`PersonalWallID`),
  ADD UNIQUE KEY `WorkoutListID` (`WorkoutListID`),
  ADD UNIQUE KEY `PRListID` (`PRListID`);

--
-- Indexes for table `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `WORKOUT`
--
ALTER TABLE `WORKOUT`
  ADD PRIMARY KEY (`WorkoutID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
