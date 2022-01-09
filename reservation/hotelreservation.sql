-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 29, 2018 at 01:40 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotelreservation`
--
CREATE DATABASE IF NOT EXISTS `hotelreservation` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `hotelreservation`;

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `id_category` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `describe` text NOT NULL,
  `price` int(25) NOT NULL,
  `pic` text NOT NULL,
  `capacity` int(5) NOT NULL,
  `slug` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`id_category`, `name`, `describe`, `price`, `pic`, `capacity`, `slug`) VALUES
(1, 'Prince', 'Rooms measuring 15 m² equipped with all the details expected of a superior 4 star hotel. Services: Wake up call service, Customer service, Laundry service and express laundry, Concierge service, Pillow menu.', 450000, 'cat_1.jpg', 1, 'prince'),
(2, 'Princess', 'Modern and functional rooms measuring approximately 20-25 m² equipped with all the details expected of the hotel. The rooms have a king or queen size bed or two single beds, in addition to beds measuring 1 by 2.2 metres ideal for sports teams.', 500000, 'cat_2.jpg', 1, 'princess'),
(3, 'Queen', 'Spacious rooms with exquisite decor, measuring approximately 25-30 m² and equipped with all the details expected of the hotel hotel. The rooms have a king or queen size bed or two single beds, in addition to beds measuring 1 by 2.2 metres.', 800000, 'cat_3.jpg', 2, 'queen'),
(4, 'King', 'Spacious rooms with exquisite decor measuring approximately 25-30 m² and equipped with all the details expected of a superior 4 star Hotel. The rooms have a king or queen size bed or two single beds, and views of the streets.', 1200000, 'cat_4.jpg', 4, 'king'),
(5, 'Royal', 'Spacious rooms with exquisite decor measuring approximately 25-30 m² and equipped with all the details expected of a superior 4 star Hotel. The rooms have a king or queen size bed or two single beds, and views of the streets.', 1800000, 'cat_5.jpg', 4, 'royal');

-- --------------------------------------------------------

--
-- Table structure for table `tb_dtl_user`
--

CREATE TABLE `tb_dtl_user` (
  `id_dtl_user` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `e-mail` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_dtl_user`
--

INSERT INTO `tb_dtl_user` (`id_dtl_user`, `id_user`, `name`, `location`, `phone`, `e-mail`) VALUES
(1, 1, 'Yoga Tirta Pratama', 'Jl. Cenigan Sari Gang. IIIB No.11', '082247804993', 'yogatirta@gmail.com'),
(2, 2, 'Adrian Pratama', 'Anonymous', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tb_reservasi`
--

CREATE TABLE `tb_reservasi` (
  `id_reservasi` int(10) NOT NULL,
  `id_room` int(10) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `person` int(2) NOT NULL,
  `id_dtl_user` int(10) NOT NULL,
  `total_price` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_reservasi`
--

INSERT INTO `tb_reservasi` (`id_reservasi`, `id_room`, `check_in`, `check_out`, `person`, `id_dtl_user`, `total_price`) VALUES
(5, 1, '2018-07-26', '2018-07-27', 1, 1, 454500);

-- --------------------------------------------------------

--
-- Table structure for table `tb_room`
--

CREATE TABLE `tb_room` (
  `id_room` int(10) NOT NULL,
  `id_category` int(10) NOT NULL,
  `availability` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_room`
--

INSERT INTO `tb_room` (`id_room`, `id_category`, `availability`) VALUES
(1, 1, 1),
(2, 1, 0),
(3, 3, 0),
(4, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(75) NOT NULL,
  `level` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'yoga', '807659cd883fc0a63f6ce615893b3558', 1),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`id_category`);

--
-- Indexes for table `tb_dtl_user`
--
ALTER TABLE `tb_dtl_user`
  ADD PRIMARY KEY (`id_dtl_user`);

--
-- Indexes for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  ADD PRIMARY KEY (`id_reservasi`);

--
-- Indexes for table `tb_room`
--
ALTER TABLE `tb_room`
  ADD PRIMARY KEY (`id_room`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_reservasi`
--
ALTER TABLE `tb_reservasi`
  MODIFY `id_reservasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
