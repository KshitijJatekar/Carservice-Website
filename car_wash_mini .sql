-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 12:15 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car_wash_mini`
--

-- --------------------------------------------------------

--
-- Table structure for table `scheduledata`
--

CREATE TABLE `scheduledata` (
  `Id` int(100) NOT NULL,
  `Customer_Name` varchar(30) NOT NULL,
  `Service_Name` varchar(30) NOT NULL,
  `Price` varchar(10) NOT NULL,
  `Timing` varchar(15) NOT NULL,
  `Email` varchar(40) NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `scheduledata`
--

INSERT INTO `scheduledata` (`Id`, `Customer_Name`, `Service_Name`, `Price`, `Timing`, `Email`, `Date`) VALUES
(4, 'Aniket kankute', 'Full Car Repairing', '3000', '9am - 11am', 'aniketkankute2@gmail.com', '2020-11-01'),
(11, 'shukla khan', 'Full Car Repairing', '3000', '3pm - 5pm', 'shukla@gmail.com', '2020-11-01'),
(84, 'virat kohli', 'Full Car Repairing', '3000', '1pm - 3pm', 'dream@gmail.com', '2020-11-20'),
(86, 'ms dhoni', 'Full Car Repairing', '3000', '11am - 1pm', 'dhoni@gmail.com', '2020-11-18'),
(88, 'ms dhoni', 'Full Car Repairing', '3000', '9am - 11am', 'msdhoni@gmail.com', '2020-11-25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `scheduledata`
--
ALTER TABLE `scheduledata`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `scheduledata`
--
ALTER TABLE `scheduledata`
  MODIFY `Id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
