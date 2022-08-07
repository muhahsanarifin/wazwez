-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2022 at 09:37 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wazwezdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `subtasks`
--

CREATE TABLE `subtasks` (
  `SubtaskId` int(6) NOT NULL,
  `TaskId` int(6) DEFAULT NULL,
  `Title` varchar(255) DEFAULT NULL,
  `Statuses` enum('ONGOING','DONE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subtasks`
--

INSERT INTO `subtasks` (`SubtaskId`, `TaskId`, `Title`, `Statuses`) VALUES
(1, 1, 'Low-Fidelity design', 'ONGOING'),
(2, 1, 'High-Fidelity design', 'ONGOING'),
(3, 1, 'Design Guidelines', 'ONGOING'),
(4, 1, 'Design review', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `TaskId` int(6) NOT NULL,
  `UserId` int(6) DEFAULT NULL,
  `Title` varchar(255) NOT NULL,
  `Date` date NOT NULL,
  `Description` varchar(255) DEFAULT NULL,
  `Statuses` enum('ONGOING','DONE') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`TaskId`, `UserId`, `Title`, `Date`, `Description`, `Statuses`) VALUES
(1, 2, 'Product Design', '2022-06-10', 'Tugas untuk design team', 'ONGOING'),
(2, 1, 'Devlopment', '2022-06-15', '', 'ONGOING'),
(3, 2, 'Launching Wazwez Website', '2022-06-20', '', 'ONGOING'),
(4, 2, 'Requirements Detail', '2022-07-23', '', 'DONE'),
(5, 2, 'Backlog Teams', '2022-07-23', '', 'DONE'),
(6, 2, 'Meeting With Teams', '2022-07-23', '', 'DONE');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserId` int(6) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Passwords` varchar(255) NOT NULL,
  `FirstName` varchar(255) DEFAULT NULL,
  `LastName` varchar(255) NOT NULL,
  `Avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserId`, `Username`, `Passwords`, `FirstName`, `LastName`, `Avatar`) VALUES
(1, 'muhahsan', '123456789', 'MUH', 'AHSAN', 'https://static.vecteezy.com/system/resources/previews/000/425/333/original/avatar-icon-vector-illustration.jpg'),
(2, 'accanfazztrack', 'faztrack01', 'Accan', 'Faztrack', 'https://static.vecteezy.com/system/resources/previews/000/420/553/original/avatar-icon-vector-illustration.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD PRIMARY KEY (`SubtaskId`),
  ADD KEY `TaskId` (`TaskId`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`TaskId`),
  ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserId`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `subtasks`
--
ALTER TABLE `subtasks`
  ADD CONSTRAINT `subtasks_ibfk_1` FOREIGN KEY (`TaskId`) REFERENCES `tasks` (`TaskId`);

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `users` (`UserId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
