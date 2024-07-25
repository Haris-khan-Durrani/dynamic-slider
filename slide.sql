-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 25, 2024 at 07:21 PM
-- Server version: 5.7.42-log
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `slide`
--

-- --------------------------------------------------------

--
-- Table structure for table `allslides`
--

CREATE TABLE `allslides` (
  `sid` int(11) NOT NULL,
  `sidname` varchar(500) NOT NULL,
  `sidurl` longtext NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `sort_order` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `allslides`
--

INSERT INTO `allslides` (`sid`, `sidname`, `sidurl`, `date`, `sort_order`) VALUES
(1, 'fff1', 'https://storage.googleapis.com/msgsndr/1kLtYcfWs3DfqJOVM9Qm/media/64557c86d5b893ddd4a5e589.png', '2024-07-25 12:38:58', 0),
(2, 'aaabc', 'https://storage.googleapis.com/msgsndr/1kLtYcfWs3DfqJOVM9Qm/media/645361bcdeb3efa523f06638.png', '2024-07-25 12:39:09', 2),
(3, 'sdfa', 'https://storage.googleapis.com/msgsndr/1kLtYcfWs3DfqJOVM9Qm/media/644841a7b4a4080cb1794f38.png', '2024-07-25 12:40:36', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allslides`
--
ALTER TABLE `allslides`
  ADD PRIMARY KEY (`sid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allslides`
--
ALTER TABLE `allslides`
  MODIFY `sid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
