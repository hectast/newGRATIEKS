<?php
session_start();

include 'koneksi.php';
include 'app/login_cek_token.php';

// mengecek admin login atau tidak
if (!isset($_SESSION['username'])) {
  ?>
    <script>
      alert('Anda harus login untuk mengakses halaman ini!');
      window.location.href = 'index.php';
    </script>
  <?php
  return false;
}

$jdl = "Dashboard";
$ttl = $jdl . " | GRATIEKS";
?>
<?php include 'views/layout/header.php'; ?>

<?php include "views/layout/navbar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <img class="d-block w-100" height="100%" src="assets/dist/img/banner2.JPG" alt="First slide">
                </div>
            </div>

            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Total Desa Di Setiap Sub Sektor</h3>
                            <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Total Komoditas Di Setiap Sub Sektor</h3>
                            <canvas id="pieChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.content-wrapper -->

<?php include 'views/layout/footer.php'; ?>

<?php include 'views/layout/js.php'; ?>