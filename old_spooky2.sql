-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 01, 2019 at 08:56 PM
-- Server version: 10.0.38-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: ``
--

-- --------------------------------------------------------
--
-- Table structure for table `spooky2_diary`
--

CREATE TABLE `spooky2_diary` (
  `id` int(11) NOT NULL,
  `date` datetime(6) NOT NULL COMMENT 'dd.mm.yyyy hr:min:ss',
  `recipient` varchar(4) NOT NULL COMMENT 'User recieving treatment',
  `preset` varchar(4) NOT NULL COMMENT 'Spooky2 Preset(s)',
  `program` varchar(50) NOT NULL COMMENT 'Spooky2 Programs',
  `settings` varchar(2) NOT NULL COMMENT 'Treatment notes',
  `method` varchar(2) NOT NULL COMMENT 'Spooky Central, Phanotron tube, Straight tube, Coil, TENs pads, Ultra Sound, etc',
  `notes` varchar(2) NOT NULL COMMENT 'wobble, feathering'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `spooky2_diary`
--

INSERT INTO `spooky2_diary` (`id`, `date`, `recipient`, `preset`, `program`, `settings`, `method`, `notes`) VALUES
(1, '2019-04-16 00:00:00.000000', 'Jass', 'Spooky Entrainment and Healing (P) - JW', 'Polymyositis', '0.02 feathering', 'Spooky2 Central, Phanotron tube, COIL, Ultra Sound, TENs pads', 'feel headache straight away');

-- --------------------------------------------------------

--
-- Table structure for table `preset`
--

CREATE TABLE `recipient` (
  `id` int(11) NOT NULL,
  `recipients` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
-- --------------------------------------------------------

--
-- Table structure for table `preset`
--

CREATE TABLE `preset` (
  `id` int(11) NOT NULL,
  `presetslist` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `preset`
--

INSERT INTO `preset` (`id`, `presetslist`) VALUES
(1, 'Spooky Entrainment and Healing (P) - JW'),
(2, 'Spooky Plasma Advanced (P) - JW '),
(3, 'PX Herxheimer DB 2020'),
(4, 'Detox from BFB');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `programlist` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `programlist`) VALUES
(1, 'Polymyositis'),
(2, 'Connective Tissue Disease'),
(3, 'Inflammatory Myopathy'),
(4, 'Cerebellar Ataxia'),
(5, 'Adiadochokinesis'),
(6, 'Mucor Mucdeo (all)'),
(7, 'Mucor Racemosus (all)'),
(8, 'Borrelia Lyme 1'),
(9, 'Borrelia Lyme 2'),
(10, 'Borrelia Lyme 3'),
(11, 'Borrelia Lyme 4'),
(12, 'Bells Palsy 1'),
(13, 'Bells Palsy 2'),
(14, 'Bells Palsy 3'),
(15, 'Bells Palsy 4');

-- --------------------------------------------------------
--
-- Indexes for dumped tables
--

--
-- Indexes for table `spooky2_diary`
--
ALTER TABLE `spooky2_diary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `preset`
--
ALTER TABLE `preset`
  ADD PRIMARY KEY (`id`);
  
--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `spooky2_diary`
--
ALTER TABLE `spooky2_diary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- AUTO_INCREMENT for table `preset`
--
ALTER TABLE `preset`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
