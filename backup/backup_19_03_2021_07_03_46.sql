DROP TABLE lokasi;

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(100) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

INSERT INTO lokasi VALUES("25","Repudiandae excepteu","www");



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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

INSERT INTO tbl_gratieks VALUES("13","Sunt fugit aute qu","Hortikultura","21","-Olahan Primer-","Voluptatum laborum n","52","-Penerapan Gap","Ada","Ea velit asperiores","Sed doloribus incidi","20","Repudiandae excepteu","36","Nihil sed nihil duci","31","Tidak Ada","Rerum laboriosam et","Lorem nulla ut aut m","Ada","Sapiente quia eligen","Sudah","Quasi dolor voluptas","Consectetur magnam q","Voluptatibus delectu","irzees","19 Maret 2021","06:57:55");
INSERT INTO tbl_gratieks VALUES("14","Atque dolor omnis vo","Peternakan","8","Ada","Molestiae et in nisi","6","-Penerapan Gap","Ada","Officia qui in non s","Dolor proident maio","38","Et impedit sed tene","90","Ad quia eu qui non r","3","Keberadaan Penyuluh","Cum fugit ad eu cul","Ipsa veritatis simi","Tidak Ada","Accusamus nemo commo","Belum","Voluptatem labore c","Corporis voluptatem","Nisi quia commodo om","irzees","19 Maret 2021","06:58:22");
INSERT INTO tbl_gratieks VALUES("15","Nihil non provident","Tanaman Pangan","40","-Olahan Primer-","Expedita atque solut","67","Belum","Ada","Dolor tempor aut qua","Alias facere dolor l","39","Veniam sit magni od","62","Dolore consequat In","29","Tidak Ada","Quia dolor consectet","In quia perspiciatis","Tidak Ada","Id quo voluptate am","Belum","Quos aut in obcaecat","Molestias in corrupt","Ratione velit ut so","irzees","19 Maret 2021","06:58:37");
INSERT INTO tbl_gratieks VALUES("16","Amet asperiores con","Perkebunan","76","Tidak Ada","Itaque magnam except","10","-Penerapan Gap","Tidak Ada","Dolore cupiditate do","Facilis enim ipsum ","87","Voluptas esse dolor ","76","Dolore voluptas comm","41","Keberadaan Penyuluh","Unde consequatur El","Ratione est expedit","-Koperasi-","Soluta et irure repe","Sudah","Culpa dolorem eius n","Aliqua Vero itaque ","Quod et labore amet","irzees","19 Maret 2021","06:58:47");



DROP TABLE tbl_token;

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `username` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_token VALUES("2","pbPRmV9jyu","icak27");



DROP TABLE user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("27","Administrator","872348191238","admin","$2y$10$P9EyrTe.tTcZA4jmhZasB.zVCPeAXDYrlruy3n84dbdyDrpOABkx2");



