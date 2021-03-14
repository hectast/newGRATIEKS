<?php 
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