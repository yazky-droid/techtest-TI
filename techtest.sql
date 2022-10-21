-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2022 at 04:33 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `techtest`
--

-- --------------------------------------------------------

--
-- Table structure for table `datateman`
--

CREATE TABLE `datateman` (
  `id` int(10) NOT NULL,
  `userId` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenisKelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `usia` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `datateman`
--

INSERT INTO `datateman` (`id`, `userId`, `nama`, `jenisKelamin`, `usia`) VALUES
(4, 2, 'Elang', 'Laki-laki', 20),
(5, 2, 'Rizky', 'Laki-laki', 19),
(8, 2, 'Fathir', 'Laki-laki', 2),
(11, 8, 'Yazky Maulana', 'Laki-laki', 19),
(12, 8, 'Elangga', 'Laki-laki', 20),
(14, 8, 'Minnie Moys', 'Perempuan', 22),
(15, 8, 'Nadin', 'Perempuan', 23),
(17, 8, 'Buzz', 'Laki-laki', 24),
(18, 8, 'Riza', 'Laki-laki', 19),
(19, 10, 'Anakmagang', 'Laki-laki', 23),
(20, 10, 'Temankuliah', 'Perempuan', 21),
(21, 10, 'Potocopyboy', 'Laki-laki', 24),
(22, 10, 'Bestie', 'Perempuan', 20),
(24, 8, 'Anisa', 'Perempuan', 22),
(27, 8, 'Ridwan', 'Laki-laki', 19),
(28, 8, 'Vina', 'Perempuan', 19),
(29, 8, 'Sinta', 'Perempuan', 23);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `password` varchar(20) NOT NULL DEFAULT '123456'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`) VALUES
(2, 'yazky', '123456'),
(8, 'Tester', 'tester'),
(10, 'Anakbaru', 'password');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datateman`
--
ALTER TABLE `datateman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datateman`
--
ALTER TABLE `datateman`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `datateman`
--
ALTER TABLE `datateman`
  ADD CONSTRAINT `datateman_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
