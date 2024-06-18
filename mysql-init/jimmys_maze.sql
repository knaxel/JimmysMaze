-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2023 at 03:22 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jimmys_maze`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uuid` varchar(36) NOT NULL,
  `username` varchar(64) NOT NULL,
  `time_registered` datetime NOT NULL DEFAULT current_timestamp(),
  `current_level` int(11) NOT NULL DEFAULT 1,
  `password` varchar(512) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uuid`, `username`, `time_registered`, `current_level`, `password`) VALUES
('ecf092b2-f2b7-11ed-8deb-a8a1590842c6', 'test', '2023-05-14 18:32:08', 3, '$2y$10$AQRS32pD0/bOUpTthyNTlOhpAGesUWtm9Mba6dy1tJWUapVubBU4C');

-- --------------------------------------------------------

--
-- Table structure for table `user_scores`
--

CREATE TABLE `user_scores` (
  `user_uuid` varchar(36) NOT NULL,
  `username` varchar(64) NOT NULL,
  `time_taken` int(11) NOT NULL,
  `level_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_scores`
--

INSERT INTO `user_scores` (`user_uuid`, `username`, `time_taken`, `level_number`) VALUES
('ecf092b2-f2b7-11ed-8deb-a8a1590842c6', 'test', 10120, 1),
('ecf092b2-f2b7-11ed-8deb-a8a1590842c6', 'test', 11468, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uuid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
