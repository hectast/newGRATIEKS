<?php

session_start();
error_reporting(0);

include '../../../koneksi.php';
include '../../../app/login_cek_token.php';

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

include 'backup_data.php';
include 'restore_data.php';

$jdl = "Setting Data";
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
                        <span class="fas fa-check fa-16 mr-2"></span> <?= flash('msg_sukses_data'); ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            <?php
            }
            ?>
            <div class="row mt-2 text-center">

                <div class="col-md-4">
                    <div class="info-box justify-content-center">
                        <div class="info-box-icon bg-success">
                            <i class="fas fa-download"></i>
                        </div>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h4>Download Data Gratieks</h4>
                            </span>
                            <?php
                            if (isset($_GET['download'])) {
                            ?>
                                <a href="<?= $url; ?>/views/page/setting_data/setting_data.php" class="btn btn-link btn-block btn-sm">Tutup List Data</a>
                            <?php
                            } else {
                            ?>
                                <form action="" method="get">
                                    <button type="submit" name="download" class="btn btn-link btn-block btn-sm">Download Sekarang</button>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['download'])) {
                    ?>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='text-center'>
                                    <h4>List Data</h4>
                                    <hr>
                                </div>
                                <ol>
                                    <?php
                                    $files = scandir("../../../backup");
                                    for ($a = 2; $a < count($files); $a++) {
                                    ?>
                                        <li><a download='<?php echo $files[$a] ?>'' href=' <?= $url; ?>backup/<?= $files[$a] ?>'><?= $files[$a]; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <ol>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="col-md-4">
                    <div class="info-box justify-content-center">
                        <div class="info-box-icon bg-info">
                            <i class="fas fa-file-download"></i>
                        </div>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h4>Backup Data Gratieks</h4>
                            </span>
                            <form action="" method="post">
                                <button type="submit" name="backup" class="btn btn-link btn-block btn-sm">Backup Sekarang</button>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="info-box justify-content-center">
                        <div class="info-box-icon bg-danger">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <div class="info-box-content">
                            <span class="info-box-text">
                                <h4>Restore Data Gratieks</h4>
                            </span>
                            <?php
                            if (isset($_GET['restore'])) {
                            ?>
                                <a href="<?= $url; ?>/views/page/setting_data/setting_data.php" class="btn btn-link btn-block btn-sm">Tutup List Data</a>
                            <?php
                            } else {
                            ?>
                                <form action="" method="get">
                                    <button type="submit" name="restore" class="btn btn-link btn-block btn-sm">Restore Sekarang</button>
                                </form>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                    <?php
                    if (isset($_GET['restore'])) {
                    ?>
                        <div class='card'>
                            <div class='card-body'>
                                <div class='text-center'>
                                    <h5>Pilih data yang ingin di restore</h5>
                                    <hr>
                                </div>
                                <?php
                                if (!empty($response)) {
                                ?>
                                    <div class="text-danger text mb-2 <?= $response["type"]; ?>">
                                        <i class="fas fa-exclamation"></i> <?php echo nl2br($response["message"]); ?>
                                    </div>
                                <?php
                                }
                                ?>
                                <form method="post" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="file" name="file_sql">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" name="submit_restore" class="btn btn-outline-danger btn-sm btn-block">Restore</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include '../../layout/footer.php'; ?>

<?php include '../../layout/js.php'; ?>