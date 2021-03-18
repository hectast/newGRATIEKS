-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 12:06 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.14

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
(25, 'Repudiandae excepteu', 'www');

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

--
-- Dumping data for table `tbl_gratieks`
--

INSERT INTO `tbl_gratieks` (`id`, `komodi`, `subsektor`, `kapasitas`, `olahan`, `bentuk`, `harga`, `gap`, `gudang`, `pasar`, `labuh`, `desa`, `kec`, `lahan`, `statuslah`, `poktan`, `penyuluh`, `infra`, `modal`, `koperasi`, `mitra`, `bina`, `bantuan`, `rencana`, `peran`, `tim`, `tgl`, `waktu`) VALUES
(13, 'Sunt fugit aute qu', 'Hortikultura', '21', '-Olahan Primer-', 'Voluptatum laborum n', '52', '-Penerapan Gap', 'Ada', 'Ea velit asperiores', 'Sed doloribus incidi', '20', 'Repudiandae excepteu', '36', 'Nihil sed nihil duci', '31', 'Tidak Ada', 'Rerum laboriosam et', 'Lorem nulla ut aut m', 'Ada', 'Sapiente quia eligen', 'Sudah', 'Quasi dolor voluptas', 'Consectetur magnam q', 'Voluptatibus delectu', 'irzees', '19 Maret 2021', '06:57:55'),
(14, 'Atque dolor omnis vo', 'Peternakan', '8', 'Ada', 'Molestiae et in nisi', '6', '-Penerapan Gap', 'Ada', 'Officia qui in non s', 'Dolor proident maio', '38', 'Et impedit sed tene', '90', 'Ad quia eu qui non r', '3', 'Keberadaan Penyuluh', 'Cum fugit ad eu cul', 'Ipsa veritatis simi', 'Tidak Ada', 'Accusamus nemo commo', 'Belum', 'Voluptatem labore c', 'Corporis voluptatem', 'Nisi quia commodo om', 'irzees', '19 Maret 2021', '06:58:22'),
(15, 'Nihil non provident', 'Tanaman Pangan', '40', '-Olahan Primer-', 'Expedita atque solut', '67', 'Belum', 'Ada', 'Dolor tempor aut qua', 'Alias facere dolor l', '39', 'Veniam sit magni od', '62', 'Dolore consequat In', '29', 'Tidak Ada', 'Quia dolor consectet', 'In quia perspiciatis', 'Tidak Ada', 'Id quo voluptate am', 'Belum', 'Quos aut in obcaecat', 'Molestias in corrupt', 'Ratione velit ut so', 'irzees', '19 Maret 2021', '06:58:37'),
(16, 'Amet asperiores con', 'Perkebunan', '76', 'Tidak Ada', 'Itaque magnam except', '10', '-Penerapan Gap', 'Tidak Ada', 'Dolore cupiditate do', 'Facilis enim ipsum ', '87', 'Voluptas esse dolor ', '76', 'Dolore voluptas comm', '41', 'Keberadaan Penyuluh', 'Unde consequatur El', 'Ratione est expedit', '-Koperasi-', 'Soluta et irure repe', 'Sudah', 'Culpa dolorem eius n', 'Aliqua Vero itaque ', 'Quod et labore amet', 'irzees', '19 Maret 2021', '06:58:47');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_token`
--

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL,
  `token` varchar(60) NOT NULL,
  `username` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_token`
--

INSERT INTO `tbl_token` (`id`, `token`, `username`) VALUES
(2, 'pbPRmV9jyu', 'icak27');

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
(27, 'Administrator', '872348191238', 'admin', '$2y$10$P9EyrTe.tTcZA4jmhZasB.zVCPeAXDYrlruy3n84dbdyDrpOABkx2');

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
-- Indexes for table `tbl_token`
--
ALTER TABLE `tbl_token`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_gratieks`
--
ALTER TABLE `tbl_gratieks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
