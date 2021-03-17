-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2021 at 06:53 PM
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
(18, 'Desa Kirigakure', 'asdads'),
(20, 'Non eum non quos nis', 'https://github.com/Azbot001'),
(21, 'Qui non consectetur ', 'https://www.google.co.id/maps/place/UNIVERSITAS+NEGERI+GORONTALO/@0.5533211,123.0632342,19.11z/data=');

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
(2, 'Bom', 'Hortikultura', '10', 'Ada', 'bulat', '10000', 'Sudah', 'Tidak Ada', 'dimana ee', 'balada', '9', 'Desa Kirigakure', '10', 'Orang punya', '10', 'Ada', 'Hotel bintang 5', '100000', 'Ada', 'tes dulu', 'Sudah', 'Bantuan Sosial', 'bulum ada', 'tida ada kontribusi', 'Sementara', '14 Maret 2021', '21:17:48'),
(3, 'Bom', 'Tanaman Pangan', '12', 'Tidak Ada', 'Illum cupiditate om', '20000', 'Sudah', 'Tidak Ada', 'Nihil nisi et volupt', 'Adipisci veniam inv', '78', 'Non eum non quos nis', 'Quam magna dolor asp', 'Tempore sint lorem', '6', 'Tidak Ada', 'Esse odit et dolor ', 'Ullam tempora velit', 'Ada', 'Irure dicta autem do', 'Sudah', 'Laborum Voluptatem ', 'Consequat Dolor in ', 'Labore atque excepte', 'Sementara', '15 Maret 2021', '00:09:30'),
(4, 'Corporis quod tempor', 'Peternakan', '14', '-Olahan Primer-', 'Do aute delectus eo', '30000', '-Penerapan Gap', '-Gudang Penyimpanan', 'Omnis fuga Pariatur', 'Quos consequuntur ma', '62', 'Qui non consectetur ', 'Illo doloremque volu', 'Ex voluptas consequa', '62', 'Keberadaan Penyuluh', 'Tempora voluptatem d', 'In quo dolores anim ', 'Tidak Ada', 'Esse odio eos volu', '-Binaan Pemda / Ditj', 'Voluptas sunt accusa', 'Deserunt voluptas qu', 'Reiciendis aliquam e', 'Sementara', '15 Maret 2021', '01:23:36'),
(5, 'Aut qui culpa sapien', 'Perkebunan', '15', 'Ada', 'Quidem perspiciatis', '40000', '-Penerapan Gap', '-Gudang Penyimpanan', 'Delectus aut saepe ', 'Beatae consequatur v', '33', 'Vero praesentium duc', 'Sit aliqua Praesen', 'Magni occaecat qui u', '100', 'Ada', 'Cupidatat earum offi', 'Iste nesciunt qui m', 'Ada', 'Et distinctio A occ', 'Sudah', 'Sed mollit asperiore', 'Id fugiat pariatur', 'Saepe consequuntur i', 'Sementara', '15 Maret 2021', '01:23:49'),
(6, 'Repellendus Quidem ', 'Hortikultura', '16', 'Tidak Ada', 'Beatae ex quasi mole', '50000', '-Penerapan Gap', 'Tidak Ada', 'Aut laudantium aute', 'Error veniam ut har', '49', 'Fugiat sint blanditi', 'Numquam reprehenderi', 'Ducimus quia perspi', '20', 'Tidak Ada', 'Dolor magni ea volup', 'Commodi odio tempori', 'Ada', 'Quis adipisci et ips', 'Sudah', 'Laboris qui cupidata', 'Voluptates est ea et', 'Eum incididunt dolor', 'Sementara', '15 Maret 2021', '01:24:04');

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
(2, 'Cj8hJ1RfsD', 'icak27');

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
(17, 'admin', '-', 'admin', '12345'),
(23, 'hectast', '9183928131', 'hectast', '12345'),
(26, 'irzees', '21133233', 'icak27', '$2y$10$liUYPxisH4KTOZ.i0Ov73.6P6wGQ7/FR5ULKHdmIazvtI3NC94ZhC');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tbl_gratieks`
--
ALTER TABLE `tbl_gratieks`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_token`
--
ALTER TABLE `tbl_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
