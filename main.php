<?php
    include "koneksi.php";
?>
<?php include 'views/layout/header.php'; ?>

<?php include "views/layout/navbar.php"; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="content">
        <div class="container">
            <div class="card">
                <div class="card-body">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" height="100%" src="assets/dist/img/banner2.jpg" alt="First slide">
                            </div>
                            <!-- <div class="carousel-item">
                    <img class="d-block w-100" height="100%" src="assets/dist/img/c.banner.jpg" alt="Second slide">
                  </div> -->
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
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