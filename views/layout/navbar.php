  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand-md bgc-yellow navbar-dark">
      <div class="container">
          <a href="#" class="navbar-brand">
              <img src="assets/dist/img/LOGO1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
              <span class="brand-text font-weight-light">GRATIEKS</span>
          </a>

          <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse order-3" id="navbarCollapse">
              <!-- Left navbar links -->
              <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a href="index3.html" class="nav-link nvlnk">Dashboard</a>
                  </li>
                  <li class="nav-item">
                      <a href="index3.html" class="nav-link nvlnk">Data Gratieks</a>
                  </li>
                  <li class="nav-item dropdown">
                    <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link nvlnk dropdown-toggle">Monitoring</a>
                    <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
                        <li><a href="#" class="dropdown-item">Some action </a></li>
                        <li><a href="#" class="dropdown-item">Some other action</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link nvlnk" href="<?= $url; ?>app/logout.php" onclick="confirm('Yakin ingin keluar dari halaman ini?')">
                          <i class="fas fa-sign-out-alt"></i>
                          Logout
                      </a>
                  </li>
              </ul>
          </div>
      </div>
  </nav>
  <!-- /.navbar -->