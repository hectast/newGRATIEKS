<?php 
include 'lokasi_function.php';
	
if ( isset($_POST['simpan_data'])) {
	$nama_lokasi = $_POST['nama_lokasi'];
	$link_lokasi = $_POST['share_lokasi'];

	simpan_data($nama_lokasi,$link_lokasi,$mysqli);
}

if ( isset($_POST['hapus_data']) ) {
	$id_lokasi = $_POST['id_lokasi'];

	hapus_data($id_lokasi,$mysqli);
}

if ( isset($_POST['ubah_data'])) {
	$id_lokasi = $_POST['id_lokasi'];
	$nama_lokasi = $_POST['nama_lokasi'];
	$link_lokasi = $_POST['link_lokasi'];

	ubah_data($id_lokasi,$nama_lokasi,$link_lokasi,$mysqli);
}



 ?>