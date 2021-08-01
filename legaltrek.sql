-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 01, 2021 at 10:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `legaltrek`
--

-- --------------------------------------------------------

--
-- Table structure for table `lt_invoice`
--

CREATE TABLE `lt_invoice` (
  `id` int(11) NOT NULL,
  `client` varchar(100) NOT NULL,
  `matter` varchar(100) NOT NULL,
  `issuer` varchar(100) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `amount` int(1) NOT NULL DEFAULT 1,
  `price` int(7) NOT NULL,
  `discount` int(3) NOT NULL,
  `vat` int(3) NOT NULL,
  `total` int(7) NOT NULL,
  `description` varchar(200) NOT NULL,
  `file_location` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lt_invoice`
--
ALTER TABLE `lt_invoice`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lt_invoice`
--
ALTER TABLE `lt_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
