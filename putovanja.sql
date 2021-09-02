-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2021 at 02:50 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `putovanjaa`
--

-- --------------------------------------------------------

--
-- Table structure for table `putovanje`
--

CREATE TABLE `putovanje` (
  `id_putovanja` int(11) NOT NULL,
  `id_host` int(11) NOT NULL,
  `broj_dana_boravka` int(11) NOT NULL DEFAULT 0,
  `id_posetilac` int(11) NOT NULL,
  `datum` date NOT NULL DEFAULT current_timestamp(),
  `naziv_dogadjaja` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `putovanje`
--

INSERT INTO `putovanje` (`id_putovanja`, `id_host`, `broj_dana_boravka`, `id_posetilac`, `datum`, `naziv_dogadjaja`) VALUES
(2, 1, 7, 2, '2021-07-16', 'Europe 3D'),
(3, 2, 5, 1, '2021-08-04', 'Brain Trainer'),
(4, 1, 7, 3, '2021-07-16', 'Europe 3D');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id_student` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(20) NOT NULL,
  `lokalna_grupa` varchar(30) NOT NULL,
  `godina_studija` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id_student`, `ime`, `prezime`, `lokalna_grupa`, `godina_studija`) VALUES
(1, 'Mario', 'Rigon', 'LG Rome', 3),
(2, 'Vasilije', 'Aleksic', 'LG Belgrade', 4),
(3, 'Viktor', 'Medvedev', 'LG Moscow', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `putovanje`
--
ALTER TABLE `putovanje`
  ADD PRIMARY KEY (`id_putovanja`),
  ADD KEY `id_domacin` (`id_host`),
  ADD KEY `id_gost` (`id_posetilac`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD UNIQUE KEY `naziv_ekipa` (`ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `putovanje`
--
ALTER TABLE `putovanje`
  MODIFY `id_putovanja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id_student` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `putovanje`
--
ALTER TABLE `putovanje`
  ADD CONSTRAINT `putovanje_ibfk_1` FOREIGN KEY (`id_host`) REFERENCES `student` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `putovanje_ibfk_2` FOREIGN KEY (`id_posetilac`) REFERENCES `student` (`id_student`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
