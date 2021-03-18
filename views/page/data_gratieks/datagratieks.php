<?php
session_start();
error_reporting(0);

include '../../../koneksi.php';
include 'app/login_cek_token.php';
include '../../../app/flash_message.php';
// mengecek admin login atau tidak
if (!isset($_SESSION['username'])) {
?>
    <script>
        alert('Anda harus login untuk mengakses halaman ini!');
        window.location.href = '../../../index.php';
    </script>
<?php
    return false;
}
$jdl = "Data Gratieks";
$ttl = $jdl . " | GRATIEKS";
?>

<?php include "../../layout/header.php" ?>

<?php include "../../layout/navbar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
             <?php
            if (isset($_SESSION['msg_sukses_data'])) {
            ?>
                <div class="mt-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_sukses_data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['msg_ubah_data'])) {
            ?>
                <div class="mt-2">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_ubah_data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php
            }
            ?>


            <?php
            if (isset($_SESSION['msg_hapus_data'])) {
            ?>
                <div class="mt-2">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <span class="fe fe-check fe-16 mr-2"></span> <?= flash('msg_hapus_data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="row mt-2">
                
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">
                            <h4><?= $ttl; ?></h4>
                            <a href="tambahdatagratieks.php" class="btn btn-primary"><i class="fa fa-plus"></i> Data Gratieks </a><br><br>
                            <table id="example1" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Komoditas</th>
                                        <th>Sub Sektor</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    $query = "SELECT * FROM tbl_gratieks";
                                    $result = $mysqli->query($query);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row['komodi'] ?></td>
                                            <td><?= $row['subsektor'] ?></td>
                                            <td><a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-xs btn-success"><i class="fa fa-search"></i></a> <a href="editdata.php?id=<?= $row['id'] ?>" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a> <a href="hapusdata.php?id=<?= $row['id'] ?>" onclick="return confirm('Anda Yakin?')" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include '../../layout/footer.php'; ?>

<?php include '../..//layout/js.php'; ?>