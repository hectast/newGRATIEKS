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
$jdl = "Tambah Data Gratieks";
$ttl = $jdl . " | GRATIEKS";
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
                            <form action="prosesinputgratieks.php" method="POST">
                                <div class="row mt-2">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis Komoditas</label>
                                            <input type="text" name="komodi" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Sub Sektor</label>
                                            <select class="custom-select" name="subsektor">
                                                <option value="" hidden>-Sub Sektor-</option>
                                                <option value="Hortikultura">Hortikultura</option>
                                                <option value="Tanaman Pangan">Tanaman Pangan</option>
                                                <option value="Perkebunan">Perkebunan</option>
                                                <option value="Peternakan">Peternakan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kapasitas Produksi / Sekali Panen (Ton / Ha)</label>
                                            <input type="number" name="kapasitas" class="form-control" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Olahan Primer</label>
                                            <select class="custom-select" name="olahan">
                                                <option hidden>-Olahan Primer-</option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Bentuk Olahan</label>
                                            <input type="text" name="bentuk" class="form-control" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label>Harga / Kg (Rp. / Kg)</label>
                                            <input type="number" name="harga" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Penerapan Gap</label>
                                            <select name="gap" class="custom-select">
                                                <option hidden>-Penerapan Gap</option>
                                                <option value="Sudah">Sudah</option>
                                                <option value="Belum">Belum</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Gudang Penyimpanan</label>
                                            <select class="custom-select" name="gudang">
                                                <option hidden>-Gudang Penyimpanan</option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Pemasaran Saat Ini</label>
                                            <input type="text" name="pasar" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Pelabuhan Ekspor</label>
                                            <input type="text" name="labuh" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Desa</label>
                                            <input name="desa" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Desa/Kecamatan/Kabupaten</label>
                                              <input name="kec" type="text" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Luas Lahan (Ha)</label>
                                            <input name="lahan" type="number" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Lahan</label>
                                            <input type="text" name="statuslah" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Poktan</label>
                                            <input type="number" name="poktan" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Keberadaan Penyuluh</label>
                                            <Select class="custom-select" name="penyuluh">
                                                <option hidden>Keberadaan Penyuluh</option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </Select>
                                        </div>
                                        <div class="form-group">
                                            <label>Infrastruktur Penunjang</label>
                                            <input type="text" class="form-control" name="infra">
                                        </div>
                                        <div class="form-group">
                                            <label>Permodalan</label>
                                            <input type="text" class="form-control" name="modal">
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Koperasi</label>
                                            <select class="custom-select" name="koperasi">
                                                <option hidden>-Koperasi-</option>
                                                <option value="Ada">Ada</option>
                                                <option value="Tidak Ada">Tidak Ada</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kemitraan</label>
                                            <input name="mitra" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label>Jenis Bantuan</label>
                                            <input name="bantuan" type="text" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>Binaan Pemda / Ditjen Teknis</label>
                                            <select class="custom-select" name="bina">
                                                <option hidden>-Binaan Pemda / Ditjen Teknis-</option>
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
                                            <textarea name="rencana" class="form-control"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Peran UPT Karantina Pertanian</label>
                                            <textarea name="peran" class="form-control"></textarea>
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