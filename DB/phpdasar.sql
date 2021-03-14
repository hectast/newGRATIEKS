-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 03, 2021 at 07:23 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL,
  `nama_lokasi` varchar(100) NOT NULL,
  `latlong` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id`, `nama_lokasi`, `latlong`) VALUES
(11, 'Balai Karantina Pertanian Gorontalo', 'https://www.google.com/maps/search/Balai+Karantina+Pertanian+Gorontalo/@0.5949722,122.8558315,11.73z');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gratieks`
--

CREATE TABLE `tbl_gratieks` (
  `id` int(5) NOT NULL,
  `komodi` varchar(50) NOT NULL,
  `subsektor` varchar(50) NOT NULL,
  `kapasitas` varchar(50) NOT NULL,
  `olahan` varchar(20) NOT NULL,
  `bentuk` varchar(100) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `gap` varchar(20) NOT NULL,
  `gudang` varchar(20) NOT NULL,
  `pasar` varchar(100) NOT NULL,
  `labuh` varchar(100) NOT NULL,
  `desa` varchar(100) NOT NULL,
  `kec` varchar(100) NOT NULL,
  `lahan` varchar(50) NOT NULL,
  `statuslah` varchar(100) NOT NULL,
  `poktan` varchar(30) NOT NULL,
  `penyuluh` varchar(30) NOT NULL,
  `infra` varchar(100) NOT NULL,
  `modal` varchar(100) NOT NULL,
  `koperasi` varchar(50) NOT NULL,
  `mitra` varchar(150) NOT NULL,
  `bina` varchar(20) NOT NULL,
  `bantuan` varchar(200) NOT NULL,
  `rencana` varchar(300) NOT NULL,
  `peran` varchar(500) NOT NULL,
  `tim` varchar(50) NOT NULL,
  `tgl` varchar(20) NOT NULL,
  `waktu` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `nip`, `username`, `password`) VALUES
(17, 'admin', '-', 'admin', '12345');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gratieks`
--
ALTER TABLE `tbl_gratieks`
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
-- AUTO_INCREMENT for table `lokasi`
--
ALTER TABLE `lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_gratieks`
--
ALTER TABLE `tbl_gratieks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
