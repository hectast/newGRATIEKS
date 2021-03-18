<?php 

session_start();
/* at the top of page */
if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['id']) && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
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
$id = $_GET['id'];


    $result = $mysqli->query("SELECT kec FROM tbl_gratieks WHERE id ='$id'");
    $row = $result->fetch_object();


    $hapus1 = $mysqli->query("DELETE FROM lokasi WHERE nama_lokasi='{$row->kec}'");
    $hapus2 = $mysqli->query("DELETE FROM tbl_gratieks WHERE id='{$id}'");

if($hapus1){
    echo"
    <script>
    window.location.href='datagratieks.php';
    </script>
    ";
    flash("msg_hapus_data", "Data berhasil di hapus");
}

?>