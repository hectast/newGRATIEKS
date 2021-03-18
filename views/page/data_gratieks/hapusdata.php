<?php 
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
$id = $_GET['id'];

$query = "DELETE FROM tbl_gratieks WHERE id ='$id'";
$hapus = $mysqli->query($query);
if($hapus){
    echo"
    <script>
    alert('Data Berhasil Dihapus');
    window.location.href='datagratieks.php';
    </script>
    ";
}

?>