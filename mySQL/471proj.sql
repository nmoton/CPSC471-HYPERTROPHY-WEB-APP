-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2019 at 07:57 PM
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
  `UserID` int(11) NOT NULL,
  `AuthenticityLevel` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `community`
--

CREATE TABLE `community` (
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exercise`
--

CREATE TABLE `exercise` (
  `exerciseID` int(11) NOT NULL,
  `name` text NOT NULL,
  `sets` int(11) NOT NULL,
  `reps` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `RPE` int(11) NOT NULL,
  `workoutID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personal_record`
--

CREATE TABLE `personal_record` (
  `personalRecordID` int(11) NOT NULL,
  `exerciseID` int(11) NOT NULL,
  `workoutID` int(11) NOT NULL,
  `prListID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `postID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `prID` int(11) NOT NULL,
  `workoutID` int(11) NOT NULL,
  `personalWallID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `standard_user`
--

CREATE TABLE `standard_user` (
  `userID` int(11) NOT NULL,
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
  `email` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `fname` int(11) NOT NULL,
  `lname` int(11) NOT NULL,
  `bMonth` int(11) NOT NULL,
  `bDay` int(11) NOT NULL,
  `bYear` int(11) NOT NULL,
  `bAge` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `workout`
--

CREATE TABLE `workout` (
  `workoutID` int(11) NOT NULL,
  `wMonth` int(11) NOT NULL,
  `wDay` int(11) NOT NULL,
  `wYear` int(11) NOT NULL,
  `wTime` int(11) NOT NULL,
  `privacy` text NOT NULL,
  `workoutlistID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`exerciseID`);

--
-- Indexes for table `personal_record`
--
ALTER TABLE `personal_record`
  ADD PRIMARY KEY (`personalRecordID`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`postID`);

--
-- Indexes for table `standard_user`
--
ALTER TABLE `standard_user`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `UNIQUE1` (`personalWallID`),
  ADD UNIQUE KEY `UNIQUE2` (`workoutListID`),
  ADD UNIQUE KEY `UNIQUE3` (`prListID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `workout`
--
ALTER TABLE `workout`
  ADD PRIMARY KEY (`workoutID`);

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
-- AUTO_INCREMENT for table `standard_user`
--
ALTER TABLE `standard_user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `workout`
--
ALTER TABLE `workout`
  MODIFY `workoutID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
