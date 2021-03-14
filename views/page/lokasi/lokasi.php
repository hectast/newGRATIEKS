<?php
    $jdl = "Share Lokasi";
    $ttl = $jdl . " | GRATIEKS";
?>


<?php include "../../../koneksi.php" ?>

<?php include 'lokasi_post.php'; ?>

<?php include "../../layout/header.php" ?>

<?php include "../../layout/navbar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row mt-2">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body">
                        <h4><?= $ttl; ?></h4>
                        <form action="" method="post">
                            <div class="form-group mb-3">
                                <label>ID Lokasi</label>
                                <input type="text" class="form-control" placeholder="Otomatis" disabled>
                            </div>
                            <div class="form-group mb-3">
                                <label for="lokasi">Lokasi (Desa/Kec/Kab)</label>

                                <select class="form-control select2bs4" id="Lokasi" name="nama_lokasi">
                                    <option>--Pilih Nama Lokasi--</option>
                                    <?php
                                        $query = "SELECT * FROM tbl_gratieks"; 
                                        $to = $mysqli->prepare($query);
                                        $to->execute();
                                        $result_lokasi = $to->get_result();
                                        while ($row_lokasi = $result_lokasi->fetch_object()) {
                                            echo"";
                                    ?>
                                            <option value="<?= $row_lokasi->kec; ?>"><?= $row_lokasi->kec; ?></option>
                                    <?php
                                            echo"";
                                        }

                                    ?>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="share_lokasi">Share Lokasi</label>
                                <input type="text" id="share_lokasi" name="share_lokasi" class="form-control">
                            </div>

                            <button type="submit" name="simpan_data" class="btn btn-primary float-right">Simpan</button>
                        </form>
                    </div>  
                </div>
            </div>
            <div class="col-md-7">
                <div class="card">
                    <div class="card-body">
                    <table id="example1" class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lokasi (Desa/Kec/Kab)</th>
                            <th>Share Lokasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php tampil_data($mysqli); ?>
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