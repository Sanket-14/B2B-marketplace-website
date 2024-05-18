-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 12:35 PM
-- Server version: 8.0.35
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `voltbridge`
--

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE `userdata` (
  `user_id` int NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `business_title` varchar(100) NOT NULL,
  `comp_name` varchar(100) NOT NULL,
  `supplier_phone_number` text NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`user_id`, `first_name`, `last_name`, `email`, `password`, `business_title`, `comp_name`, `supplier_phone_number`, `country`) VALUES
(89, 'Sanket', 'Lipne', 'sanketlipne@gmail.com', 'Sanket@123', 'HR', 'Alma Automotive', '+918412895984', 'India'),
(90, 'Sanket', 'Lipne', 'sanketlipne11@gmail.com', 'Sanket@123', 'AISSMS College Of Engineering (AISSMS COE) Pune', 'AISSMS College Of Engineering (AISSMS COE) Pune', '+1+918412895984', 'Italy'),
(91, 'Sanket', 'Lipne', 'sanketlwwipne@gmail.com', 'Sanket@123', 'AISSMS College Of Engineering (AISSMS COE) Pune', 'AISSMSmbdw College Of Engineering (AISSMS COE) Pune', '+918412895984', 'Andorra');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `userdata`
--
ALTER TABLE `userdata`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `userdata`
--
ALTER TABLE `userdata`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
