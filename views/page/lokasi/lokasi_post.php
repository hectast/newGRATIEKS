<?php 

/* at the top of page */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: lokasi.php'));
}

include 'lokasi_function.php';
include '../../../app/flash_message.php';
include "../../../koneksi.php";
	
if ( isset($_POST['simpan_data'])) {
	$nama_lokasi = $_POST['nama_lokasi'];
	$link_lokasi = $_POST['share_lokasi'];

	$query = "SELECT* FROM lokasi WHERE nama_lokasi='{$nama_lokasi}'";
	$to_query = $mysqli->prepare($query);
	$to_query->execute();
	$result_query = $to_query->get_result();
	
	if (mysqli_num_rows($result_query) > 0) {
		flash("msg_gagal_data", "Nama lokasi yang anda masukkan sudah ada!");
		return false;
	}

	simpan_data($nama_lokasi,$link_lokasi,$mysqli);
	flash("msg_sukses_data", "Data berhasil di simpan");
}

if ( isset($_POST['hapus_data']) ) {
	$id_lokasi = $_POST['id_lokasi'];

	hapus_data($id_lokasi,$mysqli);
    flash("msg_hapus_data", "Data berhasil di hapus");
}

if ( isset($_POST['ubah_data'])) {
	$id_lokasi = $_POST['id_lokasi'];
	$nama_lokasi = $_POST['nama_lokasi'];
	$link_lokasi = $_POST['link_lokasi'];

	ubah_data($id_lokasi,$nama_lokasi,$link_lokasi,$mysqli);
	flash("msg_ubah_data", "Data berhasil di ubah");
}



 ?>