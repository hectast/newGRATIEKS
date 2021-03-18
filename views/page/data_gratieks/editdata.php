<?php
session_start();
error_reporting(0);

include '../../../koneksi.php';
include 'app/login_cek_token.php';

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
$jdl = "Edit Data Gratieks";
$ttl = $jdl . " | GRATIEKS";
$id = $_GET['id'];
?>

<?php include "../../../date.php" ?>

<?php include "../../layout/header.php" ?>

<?php include "../../layout/navbar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="row mt-2">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4><?= $ttl; ?></h4><br>
                            <form action="proseseditgratieks.php" method="POST">
                                <?php

                                $query = "SELECT * FROM tbl_gratieks WHERE id = '$id'";
                                $result = $mysqli->query($query);
                                $d = mysqli_fetch_assoc($result);

                                ?>
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis Komoditas</label>
                                            <input type="hidden" name="id" value="<?= $id ?>">
                                            <input type="text" value="<?= $d['komodi'] ?>" name="komodi" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Sub Sektor</label>
                                            <select class="custom-select" name="subsektor">
                                                <option value="<?= $d['subsektor'] ?>" hidden><?= $d['subsektor'] ?></option>
                                                <option value="Hortikultura">Hortikultura</option>
                                                <option value="Tanaman Pangan">Tanaman Pangan</option>
                                                <option value="Perkebunan">Perkebunan</option>
                                                <option value="Peternakan">Peternakan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Produksi / Sekali Panen (Ton / Ha)</label>
                                            <input type="number" value="<?= $d['kapasitas'] ?>" name="kapasitas" class="form-control" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Olahan Primer</label>
                                            <select class="custom-select" name="olahan">
                                                <option hidden value="<?= $d['olahan'] ?>"><?= $d['olahan'] ?></option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bentuk Olahan</label>
                                            <input type="text" value="<?= $d['bentuk'] ?>" name="bentuk" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga / Kg (Rp. / Kg)</label>
                                            <input type="number" value="<?= $d['harga'] ?>" name="harga" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Penerapan Gap</label>
                                            <select name="gap" class="custom-select">
                                                <option hidden value="<?= $d['gap'] ?>"><?= $d['gap'] ?></option>
                                                <option value="Sudah">Sudah</option>
                                                <option value="Belum">Belum</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Gudang Penyimpanan</label>
                                            <select class="custom-select" name="gudang">
                                                <option hidden value="<?= $d['gudang'] ?>"><?= $d['gudang'] ?></option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pemasaran Saat Ini</label>
                                            <input type="text" value="<?= $d['pasar'] ?>" name="pasar" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Pelabuhan Ekspor</label>
                                            <input type="text" value="<?= $d['labuh'] ?>" name="labuh" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Desa</label>
                                            <input name="desa" value="<?= $d['desa'] ?>" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Desa/Kecamatan/Kabupaten</label>
                                            <input name="kec" value="<?= $d['kec'] ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Luas Lahan (Ha)</label>
                                            <input value="<?= $d['lahan'] ?>" name="lahan" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Lahan</label>
                                            <input value="<?= $d['statuslah'] ?>" type="text" name="statuslah" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Poktan</label>
                                            <input value="<?= $d['poktan'] ?>" type="number" name="poktan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Keberadaan Penyuluh</label>
                                            <Select class="custom-select" name="penyuluh">
                                                <option hidden value="<?= $d['penyuluh'] ?>"><?= $d['penyuluh'] ?></option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </Select>
                                        </div>
                                        <div class="form-group">
                                            <label>Infrastruktur Penunjang</label>
                                            <input type="text" value="<?= $d['infra'] ?>" class="form-control" name="infra">
                                        </div>
                                        <div class="form-group">
                                            <label>Permodalan</label>
                                            <input type="text" value="<?= $d['modal'] ?>" class="form-control" name="modal">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Koperasi</label>
                                            <select class="custom-select" name="koperasi">
                                                <option hidden value="<?= $d['koperasi'] ?>"><?= $d['koperasi'] ?></option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kemitraan</label>
                                            <input name="mitra" value="<?= $d['mitra'] ?>" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis Bantuan</label>
                                            <input name="bantuan" value="<?= $d['bantuan'] ?>" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Binaan Pemda / Ditjen Teknis</label>
                                            <select class="custom-select" name="bina">
                                                <option hidden value="<?= $d['bina'] ?>"><?= $d['bina'] ?></option>
                                                <option value="Sudah">Sudah</option>
                                                <option value="Belum">Belum</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Rencana Pengembangan</label>
                                            <textarea name="rencana" class="form-control"><?= $d['rencana'] ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Peran UPT Karantina Pertanian</label>
                                            <textarea name="peran" class="form-control"><?= $d['peran'] ?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input type="hidden" class="form-control" value="<?= TanggalIndonesia(date('Y-m-d')) ?>" name="tgl">
                                            <input type="hidden" name="waktu" value="<?= $waktu ?>">
                                            <button class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                                            <a href="datagratieks.php" class="btn btn-success"><i class="fa fa-arrow-left"></i> Kembali</a>
                                        </div>
                                    </div>
                                </div>
                                Catatan:
                                <small class="text-danger"><i>Angka Decimal Pakai Titik(.)</i></small>
                            </form>

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