-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 28, 2021 at 01:58 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `car`
--

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(225) NOT NULL,
  `vehicle_mdl` varchar(255) NOT NULL,
  `vehicle_nmbr` varchar(255) NOT NULL,
  `vehicle_image` varchar(255) NOT NULL,
  `seat_capacity` varchar(50) NOT NULL,
  `rentpday` float NOT NULL,
  `status` text NOT NULL DEFAULT 'available',
  `car_desc` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `vehicle_agency` varchar(200) NOT NULL,
  `nodays` varchar(200) NOT NULL,
  `from_date` varchar(50) NOT NULL,
  `to_date` varchar(50) NOT NULL,
  `user` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `vehicle_mdl`, `vehicle_nmbr`, `vehicle_image`, `seat_capacity`, `rentpday`, `status`, `car_desc`, `date`, `vehicle_agency`, `nodays`, `from_date`, `to_date`, `user`) VALUES
(1, '012344', 'OD29A8271', '', '4', 200, 'available', 'fully a/c complex with digital seat', '2021-08-20 05:21:31', 'rahulsia', '', '', '01/01/1970', 'rohitsia'),
(9, '01234', 'ODASR23', 'car3.png', '4', 150, 'AVILABLE', '', '2021-08-21 22:36:28', 'rahulsia', '', '', '01/01/1970', 'rohitsia');

-- --------------------------------------------------------

--
-- Table structure for table `car_agency`
--

CREATE TABLE `car_agency` (
  `id` int(200) NOT NULL,
  `agent_name` varchar(50) NOT NULL,
  `agent_email` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `agent_pass` varchar(200) NOT NULL,
  `agent_phone` varchar(50) NOT NULL,
  `agent_address` text NOT NULL,
  `agent_photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car_agency`
--

INSERT INTO `car_agency` (`id`, `agent_name`, `agent_email`, `username`, `agent_pass`, `agent_phone`, `agent_address`, `agent_photo`) VALUES
(1, 'rahul sia', '', 'rahulsia', '1234', '7978438558', 'tangantailaNSAHDAHDAKJHDADHAKDHAD', '');

-- --------------------------------------------------------

--
-- Table structure for table `secret`
--

CREATE TABLE `secret` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `address` text NOT NULL,
  `photo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `phone`, `email`, `username`, `pass`, `address`, `photo`) VALUES
(1, '7894592658', 'rohitsia2000@gmail.com', 'rohitsia', '1234', 'ewrwrrrwrwr', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `car_agency`
--
ALTER TABLE `car_agency`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `secret`
--
ALTER TABLE `secret`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `car_agency`
--
ALTER TABLE `car_agency`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `secret`
--
ALTER TABLE `secret`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
