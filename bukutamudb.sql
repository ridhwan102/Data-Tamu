-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2020 at 09:24 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bukutamudb`
--

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `user` varchar(45) NOT NULL,
  `salt` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`user`, `salt`, `password`) VALUES
('user1', 'usersalt', '0c1bfa386ab89a4036e1e707f8ad2244');

-- --------------------------------------------------------

--
-- Table structure for table `datatamu`
--

CREATE TABLE `datatamu` (
  `idtamu` int(11) NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `pekerjaan` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `keperluan` varchar(60) NOT NULL,
  `extfoto` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `datatamu`
--

INSERT INTO `datatamu` (`idtamu`, `nik`, `nama`, `pekerjaan`, `alamat`, `nohp`, `keperluan`, `extfoto`) VALUES
(1, '1', 'Ridhwan Shalahuddin', 'Belum Ada', 'Sidoarjo', '081235863396', 'Testing dengan Pegawai 1', 'png'),
(2, '2', 'Andina', 'Freelancer', 'Surabaya', '081234567890', 'Memeriksa sistem dengan Pegawai 4', 'png'),
(3, '6450011212980001', 'Hasin ', 'Game Dev', 'Surabaya', '08153456789', 'Memeriksa sistem dengan Pegawai 2', 'png');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `idpegawai` int(11) NOT NULL,
  `nip` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`idpegawai`, `nip`, `nama`, `jabatan`) VALUES
(1, 1, 'Pegawai 1', 'Jabatan 1'),
(2, 2, 'Pegawai 2', 'Jabatan 2'),
(3, 3, 'Pegawai 3', 'Jabatan 3'),
(4, 4, 'Pegawai 4', 'Jabatan 4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `datatamu`
--
ALTER TABLE `datatamu`
  ADD PRIMARY KEY (`idtamu`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`idpegawai`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `datatamu`
--
ALTER TABLE `datatamu`
  MODIFY `idtamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `idpegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
