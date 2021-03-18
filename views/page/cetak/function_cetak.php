<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: cetak.php'));
}

function tampil_data_komoditas($mysqli)
{

    $query = "SELECT *, GROUP_CONCAT(komodi) FROM tbl_gratieks GROUP BY komodi DESC";
    $result = $mysqli->query($query);
    while ($r = mysqli_fetch_assoc($result)) {
?>
        <option value="<?= $r['komodi']; ?>"><?= $r['komodi']; ?></option>
    <?php
    }
}
function tampil_data_desa($mysqli)
{
    $query = "SELECT *, GROUP_CONCAT(kec) FROM tbl_gratieks GROUP BY kec DESC";
    $result = $mysqli->query($query);
    while ($r = mysqli_fetch_assoc($result)) {
    ?>
        <option value="<?= $r['kec'] ?>"><?= $r['kec'] ?></option>
    <?php
    }
}

function percabanganatas($mysqli)
{

    if ($_GET['cari1'] != "" and empty($_GET['cari2']) and empty($_GET['cari3'])) {
    
        include "cetak01.php";

    } else if ($_GET['cari2'] != "" and empty($_GET['cari1']) and empty($_GET['cari3'])) {
      
        include "cetak02.php";

    } else if ($_GET['cari3'] != "" and empty($_GET['cari2']) and empty($_GET['cari1'])) {
        
        include "cetak03.php";

    }else{
        include "cetak04.php";
    }
    ?>
    
<?php
    
}
?>