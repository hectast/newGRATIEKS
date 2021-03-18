<?php 
session_start();
/* at the top of page */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: datagratieks.php'));
}

include "../../../koneksi.php"; 
include '../../../app/flash_message.php';


$komodi    = $_POST['komodi'];
$subsektor = $_POST['subsektor'];
$kapasitas = $_POST['kapasitas'];
$olahan    = $_POST['olahan'];
$bentuk    = $_POST['bentuk'];
$harga     = $_POST['harga'];
$gap       = $_POST['gap'];
$gudang    = $_POST['gudang'];
$pasar     = $_POST['pasar'];
$labuh     = $_POST['labuh'];
$desa      = $_POST['desa'];
$kec       = $_POST['kec'];
$lahan     = $_POST['lahan'];
$statuslah = $_POST['statuslah'];
$poktan    = $_POST['poktan'];
$penyuluh  = $_POST['penyuluh'];
$infra     = $_POST['infra'];
$modal     = $_POST['modal'];
$koperasi  = $_POST['koperasi'];
$mitra     = $_POST['mitra'];
$bina      = $_POST['bina'];
$bantuan   = $_POST['bantuan'];
$rencana   = $_POST['rencana'];
$peran     = $_POST['peran'];
$tim       = $_POST['tim'];
$tgl       = $_POST['tgl'];
$waktu     = $_POST['waktu'];

$query = "INSERT INTO tbl_gratieks VALUES  ('','$komodi', '$subsektor','$kapasitas','$olahan','$bentuk','$harga', '$gap','$gudang',
'$pasar','$labuh','$desa','$kec','$lahan','$statuslah', '$poktan',
'$penyuluh','$infra','$modal','$koperasi', '$mitra','$bina',
'$bantuan','$rencana','$peran','$tim','$tgl','$waktu')";

$simpan = $mysqli->query($query);
if($simpan){
    echo "
    <script>
    window.location.href='datagratieks.php';
    </script>
    ";
    flash("msg_sukses_data", "Data berhasil di simpan");
}else{
    echo "
    <script>
    alert('Terjadi Kesalahan');
    window.location.href='datagratieks.php';
    </script>
    ";
}


