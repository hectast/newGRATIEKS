<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md bgc-yellow navbar-dark">
    <div class="container">
        <a href="#" class="navbar-brand">
            <img src="<?= $url ?>assets/dist/img/LOGO1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light">GRATIEKS</span> | <small><i class="fas fa-user"></i> <?= $_SESSION['nama']; ?></small>
        </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a href="<?= $url ?>main.php" class="nav-link nvlnk">Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= $url ?>views/page/data_gratieks/datagratieks.php" class="nav-link nvlnk">Data Gratieks</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= $url ?>views/page/lokasi/lokasi.php" class="nav-link nvlnk">Share Lokasi</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= $url ?>views/page/cetak/cetak.php" class="nav-link nvlnk">Laporan</a>
                  </li>
                  <li class="nav-item">
                      <a href="<?= $url ?>views/page/setting_data/setting_data.php" class="nav-link nvlnk">Setting Data</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nvlnk" href="<?= $url; ?>app/logout.php" onclick="return confirm('Yakin ingin keluar dari halaman ini?')">
                          <i class="fas fa-sign-out-alt"></i>
                          Logout
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <!-- /.navbar -->
