<?php
$jdl = "Laporan";
$ttl = $jdl . " | GRATIEKS";
error_reporting(0);
?>
<?php include "../../../koneksi.php" ?>

<?php include "../../layout/header.php" ?>

<?php include "../../layout/navbar.php"; ?>

<?php include "function_cetak.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body" style="min-height: 650px;">
                            <h4><?= $ttl; ?></h4>
                            <div class="mt-4">Cetak Berdsarkan :
                            </div>
                            <small class="text-danger">Bisa memilih salah satu, dua, atau ketiganya</small>
                            
                            <form action="" method="get">
                            <div class="row mt-3">
                                <div class="col-4">
                                   <select name="cari1" id="" class="custom-select select2-cetak">
                                    <option value="" hidden>-Pilih Komoditas-</option>
                                    <?php
                                        tampil_data_komoditas($mysqli);
                                    ?>
                                   </select>
                                </div>
                                <div class="col-4">
                                <select name="cari2" id="" class="custom-select select3-cetak">
                                    <option value="" hidden>-Pilih Desa-</option>
                                    <?php
                                        tampil_data_desa($mysqli);
                                    ?>
                                   </select>
                                </div>
                                <div class="col-4">
                                    <input type="text" name="cari3" placeholder="Bulan/Tahun" class="form-control">
                                </div>
                            </div>
                           
                            <div class="row mt-2">
                                <div class="col-12">
                                   <button class="btn btn-primary col-12"><i class="fa fa-search"></i> Tampilkan Data</button>
                                </div>
                            </div>
                            </form>
                            <hr>
                            <?php
                            	percabanganatas($mysqli);
                            ?>
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