<?php
$url = "http://localhost/newGRATIEKS/";
$ttl = "404 | SPPD";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= isset($ttl) ? $ttl : 'GRATIEKS'; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="<?= $url; ?>assets/dist/img/LOGO1.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= $url; ?>assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= $url; ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
</head>
<style>
    .btn-primary {
        color: #fff !important;
        background-color: #e89007 !important;
        border-color: #e89007 !important;
    }
</style>
<body class="hold-transition login-page">
  <div class="text-center">
    <div class="login-box mb-5">

      <h1 class="display-1 txc-yellow">404</h1>
      <div class="error-content">
        <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Page not found.</h3>

        <p>
          Kami tidak dapat menemukan halaman yang Anda cari.
        </p>

        <form class="search-form">
          <a href="<?= $url; ?>index.php" class="btn btn-primary">Kembali</a>
          <!-- /.input-group -->
        </form>
      </div>
      <!-- /.error-content -->
    </div>
  </div>
  <!-- jQuery -->
  <script src="<?= $url; ?>assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= $url; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= $url; ?>assets/dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?= $url; ?>assets/dist/js/demo.js"></script>
  <!-- Select2 -->
  <script src="<?= $url; ?>assets/plugins/select2/js/select2.full.min.js"></script>

</body>

</html>