-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2023 at 08:13 AM
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
-- Database: `wpoats`
--

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `id` int(11) NOT NULL,
  `sub_name` varchar(100) NOT NULL,
  `tagline` varchar(100) NOT NULL,
  `descrption` text NOT NULL,
  `icon` text NOT NULL,
  `image` text NOT NULL,
  `status` int(2) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`id`, `sub_name`, `tagline`, `descrption`, `icon`, `image`, `status`, `created_date`) VALUES
(1, 'Communication', ' The transmission of information', 'The meaning of COMMUNICATION is a process by which information is exchanged between individuals through a common system of symbols, signs, or behavior.', 'DL-communication.svg', 'DL-Communication.jpg', 1, '2023-10-28 09:28:48'),
(2, 'Technology', 'echnology is the application of knowledge', 'Technological advancements have led to significant changes in society. The earliest known technology is the stone tool, used during prehistoric times.', 'DL-technology.svg', 'DL-Technology.jpg', 1, '2023-10-28 09:30:48'),
(3, 'Learning', 'Digital Learning Infrastructure', 'Usability enhancement and Training for Transaction Portal for Customers.', 'DL-learning.svg', 'DL-Learning-1.jpg', 1, '2023-10-28 09:32:59'),
(4, 'k123', 'k123', 'k123', 'DL-communication.svg', 'DL-Communication.jpg', 0, '2023-10-30 07:29:29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
