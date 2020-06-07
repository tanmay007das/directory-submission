-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2020 at 07:25 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `directorydata`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `username` varchar(9) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('user', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `permatable`
--

CREATE TABLE `permatable` (
  `id` varchar(4) NOT NULL,
  `busname` varchar(1000) NOT NULL,
  `about` varchar(2000) NOT NULL,
  `category` varchar(30) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `Addr` varchar(50) NOT NULL,
  `url` varchar(50) NOT NULL,
  `country` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permatable`
--

INSERT INTO `permatable` (`id`, `busname`, `about`, `category`, `phone`, `Addr`, `url`, `country`) VALUES
('11', 'Tanmay Das', 'Tanmay Das', 'Dating', '8272534261', 'Bandipur Upanibesh PO-Rahara', 'www.idevelopersindia.com', 'India'),
('25', 'Tanmay Das', 'Tanmay Das', 'Internet & Web Servi', '0877771061', 'Bandipur Upanibesh PO-Rahara', 'https://glasswaterjet.com', 'India'),
('33', 'Tanmay Directory', 'Tanmay Das', 'Game', '8777710611', 'Bandipur Upanibesh PO-Rahara', 'https://glasswaterjet.com', 'India'),
('34', 'Sam', 'Tanmay Das', 'Sports', '0877771061', 'Bandipur Upanibesh PO-Rahara', 'https://bulletproofglass.biz', 'India'),
('38', 'Digi Ron', 'We\'re a professional digital marketing comapny in California', 'Business Services', '1228734094', 'California RD. Cali USA', 'www.digiron42.us', 'USA');

-- --------------------------------------------------------

--
-- Table structure for table `temptable`
--

CREATE TABLE `temptable` (
  `id` int(4) NOT NULL,
  `busname` varchar(50) NOT NULL,
  `about` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `Addr` varchar(100) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `temptable`
--
ALTER TABLE `temptable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `temptable`
--
ALTER TABLE `temptable`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
