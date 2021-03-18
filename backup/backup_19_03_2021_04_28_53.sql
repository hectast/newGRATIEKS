DROP TABLE lokasi;

CREATE TABLE `lokasi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lokasi` varchar(100) NOT NULL,
  `latlong` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

INSERT INTO lokasi VALUES("22","Quos suscipit conseq","asdasd");
INSERT INTO lokasi VALUES("23","Nihil recusandae Oc","asdsadd");
INSERT INTO lokasi VALUES("24","Non dolor eius iure ","sadasd");



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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO tbl_gratieks VALUES("9","Enim soluta dignissi","Peternakan","Assumenda consequat","-Olahan Primer-","At ipsa nostrum ius","Illum in consequatu","-Penerapan Gap","Ada","Commodi unde quam do","Esse itaque ullamco ","54","Quos suscipit conseq","Dolor deleniti unde ","Et ea assumenda tene","35","Keberadaan Penyuluh","Qui modi sunt quia m","Quas possimus labor","Tidak Ada","Enim quia non at eli","-Binaan Pemda / Ditj","Aute enim aliquid ut","Non ut doloremque la","Sunt praesentium nih","Sementara","19 Maret 2021","02:52:54");
INSERT INTO tbl_gratieks VALUES("10","Accusantium sed ut d","Peternakan","Exercitationem volup","Ada","Accusamus quos minim","Tempore nihil labor","-Penerapan Gap","Ada","Sed nihil culpa cons","Veniam quo asperior","76","Nihil recusandae Oc","Nihil voluptatem off","Amet voluptas quibu","51","Tidak Ada","Lorem labore volupta","Sunt voluptates ulla","-Koperasi-","Odio aliqua Vel sol","Sudah","Irure do in dolor qu","Quisquam aliqua Fug","Explicabo Cupidatat","Sementara","19 Maret 2021","02:53:16");
INSERT INTO tbl_gratieks VALUES("11","Dolore dolore sequi ","Hortikultura","Consequatur Quia en","-Olahan Primer-","Vel earum placeat i","Blanditiis voluptati","Belum","Tidak Ada","Suscipit alias ea la","Ratione ut Nam nihil","33","Non dolor eius iure ","Numquam iste itaque ","Lorem velit qui iust","84","Ada","Ratione eiusmod hic ","Dolorem maiores elig","Tidak Ada","Nam hic voluptate ei","Sudah","Nemo omnis quis hic ","Similique atque prae","Nostrud magni dolor ","Sementara","19 Maret 2021","02:53:31");



DROP TABLE tbl_token;

CREATE TABLE `tbl_token` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(60) NOT NULL,
  `username` varchar(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tbl_token VALUES("2","Tbn1yEdiFM","icak27");



DROP TABLE user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `nip` varchar(50) NOT NULL,
  `username` varchar(16) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("17","admin","-","admin","12345");
INSERT INTO user VALUES("23","hectast","9183928131","hectast","12345");
INSERT INTO user VALUES("26","irzees","21133233","icak27","$2y$10$liUYPxisH4KTOZ.i0Ov73.6P6wGQ7/FR5ULKHdmIazvtI3NC94ZhC");



