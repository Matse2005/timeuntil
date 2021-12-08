-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 08, 2021 at 03:03 PM
-- Server version: 10.5.13-MariaDB
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matvh_stats`
--

-- --------------------------------------------------------

--
-- Table structure for table `tu_countdowns`
--

CREATE TABLE `tu_countdowns` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `slug` varchar(256) NOT NULL,
  `day` int(11) NOT NULL,
  `month` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tu_countdowns`
--

INSERT INTO `tu_countdowns` (`id`, `name`, `slug`, `day`, `month`) VALUES
(1, 'Chistmas', 'chistmas', 25, 12),
(2, 'My birthday', 'birthday', 4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tu_countdowns`
--
ALTER TABLE `tu_countdowns`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tu_countdowns`
--
ALTER TABLE `tu_countdowns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
