<?php
$jdl = "Detail Data Gratieks";
$ttl = $jdl . " | GRATIEKS";
?>
<?php include "../../../koneksi.php" ?>

<?php include "../../layout/header.php" ?>

<?php include "../../layout/navbar.php"; ?>

<?php
$id = $_GET['id'];
$result = $mysqli->query("SELECT * FROM tbl_gratieks WHERE id='$id'");
$row = mysqli_fetch_assoc($result);
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4><?= $ttl; ?></h4><br>
                            <table class="table table-striped">
                                <tr>
                                    <td>Komoditas</td>
                                    <td>:</td>
                                    <td><?= $row['komodi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Sub Sektor</td>
                                    <td>:</td>
                                    <td><?= $row['subsektor'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kapasitas Produksi Perkali Panen (Ton / Ha)</td>
                                    <td>:</td>
                                    <td><?= $row['kapasitas'] ?></td>
                                </tr>
                                <tr>
                                    <td>Olahan Primer</td>
                                    <td>:</td>
                                    <td><?= $row['olahan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Bentuk Olahan</td>
                                    <td>:</td>
                                    <td><?= $row['bentuk'] ?></td>
                                </tr>
                                <tr>
                                    <td>Harga (Rp / Kg)</td>
                                    <td>:</td>
                                    <td>Rp. <?= number_format($row['harga']) ?></td>
                                </tr>
                                <tr>
                                    <td>Penerapan GAP</td>
                                    <td>:</td>
                                    <td><?= $row['gap'] ?></td>
                                </tr>
                                <tr>
                                    <td>Gudang Penyimpanan</td>
                                    <td>:</td>
                                    <td><?= $row['gudang'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pemasaran Saat Ini</td>
                                    <td>:</td>
                                    <td><?= $row['pasar'] ?></td>
                                </tr>
                                <tr>
                                    <td>Pelabuhan Ekspor</td>
                                    <td>:</td>
                                    <td><?= $row['labuh'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Desa</td>
                                    <td>:</td>
                                    <td><?= $row['desa'] ?></td>
                                </tr>
                                <tr>
                                    <td>Nama Kecamatan / Kabupaten</td>
                                    <td>:</td>
                                    <td><?= $row['kec'] ?></td>
                                </tr>
                                <tr>
                                    <td>Luas Lahan (Ha)</td>
                                    <td>:</td>
                                    <td><?= $row['lahan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Status Lahan</td>
                                    <td>:</td>
                                    <td><?= $row['statuslah'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jumlah Poktan</td>
                                    <td>:</td>
                                    <td><?= $row['komodi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Keberadaan Penyuluh</td>
                                    <td>:</td>
                                    <td><?= $row['penyuluh'] ?></td>
                                </tr>
                                <tr>
                                    <td>Infrastruktur Penunjang</td>
                                    <td>:</td>
                                    <td><?= $row['infra'] ?></td>
                                </tr>
                                <tr>
                                    <td>Permodalan</td>
                                    <td>:</td>
                                    <td><?= $row['modal'] ?></td>
                                </tr>
                                <tr>
                                    <td>Koperasi</td>
                                    <td>:</td>
                                    <td><?= $row['koperasi'] ?></td>
                                </tr>
                                <tr>
                                    <td>Kemitraan</td>
                                    <td>:</td>
                                    <td><?= $row['mitra'] ?></td>
                                </tr>
                                <tr>
                                    <td>Binaan Pemda / Ditjen Teknis</td>
                                    <td>:</td>
                                    <td><?= $row['bina'] ?></td>
                                </tr>
                                <tr>
                                    <td>Jenis Bantuan</td>
                                    <td>:</td>
                                    <td><?= $row['bantuan'] ?></td>
                                </tr>
                                <tr>
                                    <td>Rencana Pengembangan</td>
                                    <td>:</td>
                                    <td><?= $row['rencana'] ?></td>
                                </tr>
                                <tr>
                                    <td>Peran UPT Karantina Pertanian</td>
                                    <td>:</td>
                                    <td><?= $row['peran'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tim</td>
                                    <td>:</td>
                                    <td><?= $row['tim'] ?></td>
                                </tr>
                                <tr>
                                    <td>Tanggal / Waktu Input</td>
                                    <td>:</td>
                                    <td><?= $row['tgl'];?> : <?= $row['waktu'] ?></td>
                                </tr>
                            </table>
                            <div class="mt-2"> 
                            <a href="datagratieks.php" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Kembali</a>
                            </div>
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