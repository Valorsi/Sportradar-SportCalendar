-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 06:07 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sportscalendar`
--
CREATE DATABASE IF NOT EXISTS `sportscalendar` DEFAULT CHARACTER SET utf8 COLLATE utf8_german2_ci;
USE `sportscalendar`;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `event_id` int(10) NOT NULL,
  `start_date` datetime(6) NOT NULL,
  `end_date` datetime(6) NOT NULL,
  `name` varchar(64) COLLATE utf8_german2_ci NOT NULL,
  `description` text COLLATE utf8_german2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`event_id`, `start_date`, `end_date`, `name`, `description`) VALUES
(1, '2021-01-01 10:00:00.000000', '2021-01-30 18:00:00.000000', 'UEFA Champion\'s League', 'Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet Lorem Ipsum dolor sit amet '),
(2, '0000-00-00 00:00:00.000000', '0000-00-00 00:00:00.000000', '-', '-'),
(3, '2021-01-14 00:00:00.000000', '2021-01-21 00:00:00.000000', 'Golf Tournament', 'Here\'s some text');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `game_id` int(10) NOT NULL,
  `date` datetime(6) NOT NULL,
  `sport` varchar(24) COLLATE utf8_german2_ci NOT NULL,
  `teams` varchar(64) COLLATE utf8_german2_ci NOT NULL,
  `location` varchar(64) COLLATE utf8_german2_ci NOT NULL,
  `_event` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_german2_ci;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`game_id`, `date`, `sport`, `teams`, `location`, `_event`) VALUES
(1, '2020-12-02 18:00:00.000000', 'Football', 'Spain - Germany', 'Stadion Bremen', 1),
(8, '2021-01-02 18:00:00.000000', 'Football', 'United Kingdom - France', 'London Stadium', 1),
(9, '2021-01-03 18:00:00.000000', 'Football', 'Italy - Croatia', 'Zagreb Stadium', 1),
(13, '2021-01-13 00:00:00.000000', 'Basketball', 'Russia - Serbia', 'Syberian Tundra', 2),
(14, '2020-12-01 12:00:00.000000', 'Golf', '-', 'Sahara Desert', 2),
(15, '2021-01-21 11:00:00.000000', 'Hockey', 'Canada - Serbia', 'Canada National Stadium Ey', 2),
(16, '2021-04-01 00:00:00.000000', 'Tennis', 'Djokovic - Jankovic', 'Serbia', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`game_id`),
  ADD KEY `_event` (`_event`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `event_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `game_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game`
--
ALTER TABLE `game`
  ADD CONSTRAINT `game_ibfk_1` FOREIGN KEY (`_event`) REFERENCES `event` (`event_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
