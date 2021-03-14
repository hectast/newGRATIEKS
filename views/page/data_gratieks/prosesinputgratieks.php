<?php 
include "../../../koneksi.php"; 


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
$tgl       = $_POST['tgl'];
$waktu     = $_POST['waktu'];

$query = "INSERT INTO tbl_gratieks VALUES  ('','$komodi', '$subsektor','$kapasitas','$olahan','$bentuk','$harga', '$gap','$gudang',
'$pasar','$labuh','$desa','$kec','$lahan','$statuslah', '$poktan',
'$penyuluh','$infra','$modal','$koperasi', '$mitra','$bina',
'$bantuan','$rencana','$peran','Sementara','$tgl','$waktu')";

$simpan = $mysqli->query($query);
if($simpan){
    echo "
    <script>
    alert('Data Berhasil Ditambah');
    window.location.href='datagratieks.php';
    </script>
    ";
}else{
    echo "
    <script>
    alert('Terjadi Kesalahan');
    window.location.href='datagratieks.php';
    </script>
    ";
}


