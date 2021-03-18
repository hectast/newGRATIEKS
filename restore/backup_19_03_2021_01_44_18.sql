DROP TABLE lokasi;

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(100) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

INSERT INTO lokasi VALUES("","","");



DROP TABLE tbl_gratieks;

CREATE TABLE `tbl_gratieks` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
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
  `waktu` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

INSERT INTO tbl_gratieks VALUES("","","","","","","","","","","","","","","","","","","","","","","","","","","","");
INSERT INTO tbl_gratieks VALUES("","","","","","","","","","","","","","","","","","","","","","","","","","","","");



DROP TABLE tbl_token;

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `username` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_token VALUES("","","");



DROP TABLE user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("","","","","");
INSERT INTO user VALUES("","","","","");
INSERT INTO user VALUES("","","","","");
INSERT INTO user VALUES("","","","","");
INSERT INTO user VALUES("","","","","");



