-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 12:34 PM
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
-- Table structure for table `add_listing`
--

CREATE TABLE `add_listing` (
  `comp_name` varchar(255) NOT NULL,
  `Region` text NOT NULL,
  `Country` text NOT NULL,
  `City` text NOT NULL,
  `Contact_Number` text NOT NULL,
  `Company_Overview` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Categories` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Supplier_type` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PV_capacity` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Year_Founded` year NOT NULL,
  `Company_Size` text NOT NULL,
  `Company_Certificates` text NOT NULL,
  `Website` text NOT NULL,
  `image_url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `add_listing`
--


--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_listing`
--
ALTER TABLE `add_listing`
  ADD PRIMARY KEY (`comp_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
