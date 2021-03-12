<?php
$url = "http://localhost/newGRATIEKS/";
$ttl = "Login | GRATIEKS";
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
    .btn-yellow {
        color: #fff;
        background-color: #e89007;
        border-color: #e89007;
    }

    .btn-primary {
        color: #fff !important;
        background-color: #e89007 !important;
        border-color: #e89007 !important;
    }

    .btn-primary:hover,
    .btn-primary:focus,
    .btn-primary.focus {
        background-color: #ff9b00 !important;
        border-color: #ff9b00 !important;
        color: #FFFFFF !important;
    }

    .bgc-yellow {
        background-color: #e89007;
    }

    .txc-yellow {
        color: #e89007;
    }

    .txc-white {
        color: #fff !important;
    }

    .bg-login {
        background-image: url('<?= $url; ?>assets/dist/img/bg1.png');
        background-attachment: fixed;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        padding-bottom: 0px;
    }
</style>

<body class="hold-transition login-page bg-login">
    <div class="login-box mb-5 text-center text-light">
        <div class="login-logo">
            <img src="<?= $url ?>assets/dist/img/LOGO1.png" alt="logo" width="30%">
        </div>
        <h3>Aplikasi Gerakan Tiga Kali Ekspor</h3>
        <p>Balai Karantina Pertanian Kelas II Gorontalo</p>
        <div class="card">
            <div class="card-body login-card-body">

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Username">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" name="login" class="btn btn-primary btn-block">Login</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
        <div class="lockscreen-footer text-center">
            <small>Copyright &copy; 2021 Balai Karantina Kelas II Gorontalo</small>
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