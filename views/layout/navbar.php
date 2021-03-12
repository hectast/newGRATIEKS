  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand bgc-yellow navbar-dark">
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
              <ul class="navbar-nav">
                  <li class="nav-item">
                      <a href="index3.html" class="nav-link nvlnk">Dashboard</a>
                  </li>
              </ul>
          </div>

          <!-- Right navbar links -->
          <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
              <!-- Messages Dropdown Menu -->
              <!-- <li class="nav-item">
                  <div class="nav-link d-none d-sm-inline-block">
                      <span class="mailbox-read-time text-light"><i id="date"></i><i id="clock"></i></span>
                  </div>
              </li> -->
              <li class="nav-item">
                  <a class="nav-link nvlnk" href="<?= $url; ?>app/logout.php" onclick="confirm('Yakin ingin keluar dari halaman ini?')">
                      <i class="fas fa-sign-out-alt"></i>
                      Logout
                  </a>
              </li>
          </ul>
      </div>
  </nav>
  <!-- /.navbar -->