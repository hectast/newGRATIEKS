</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= $url; ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= $url; ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= $url; ?>assets/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= $url; ?>assets/dist/js/demo.js"></script>
<!-- DataTables -->
<script src="<?= $url; ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= $url; ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= $url; ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $url; ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- Select2 -->
<script src="<?= $url; ?>assets/plugins/select2/js/select2.full.min.js"></script>
<!-- ChartJS -->
<script src="<?= $url; ?>assets/plugins/chart.js/Chart.min.js"></script>

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });

        //Initialize Select2 Elements
        $('.select2').select2({
            theme: 'bootstrap4',
        });
        $('.select2-cetak').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih Komoditas-'
        });
        $('.select3-cetak').select2({
            theme: 'bootstrap4',
            placeholder: '-Pilih Desa/Kecamatan/Kabupaten-'
        });
        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        });


        $(document).ready(function() {
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
                $(this).remove();
            });
        }, 3000);
        });   

        //-------------
        //- DONUT CHART -
        //-------------
        <?php   
            $query_donut_hortikultura1 = $mysqli->query("SELECT SUM(desa) as jumlah_desa FROM tbl_gratieks WHERE subsektor='Hortikultura'");
            $rows_hortikultura1 = $query_donut_hortikultura1->fetch_assoc();

            $query_donut_tanaman_pangan1 = $mysqli->query("SELECT SUM(desa) as jumlah_desa FROM tbl_gratieks WHERE subsektor='Tanaman Pangan'");
            $rows_tanaman_pangan1 = $query_donut_tanaman_pangan1->fetch_assoc();

            $query_donut_perkebunan1 = $mysqli->query("SELECT SUM(desa) as jumlah_desa FROM tbl_gratieks WHERE subsektor='Perkebunan'");
            $rows_perkebunan1 = $query_donut_perkebunan1->fetch_assoc();

            $query_donut_peternakan1 = $mysqli->query("SELECT SUM(desa) as jumlah_desa FROM tbl_gratieks WHERE subsektor='Peternakan'");
            $rows_peternakan1 = $query_donut_peternakan1->fetch_assoc();
        ?>
        // Get context with jQuery - using jQuery's .get() method.
        
        var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
        var donutData = {
            labels: [
                'Hortikultura',
                'Tanaman Pangan',
                'Perkebunan',
                'Peternakan',
            ],
            datasets: [{
                data: [<?= $rows_hortikultura1['jumlah_desa'] ?>, <?= $rows_tanaman_pangan1['jumlah_desa'] ?>, <?= $rows_perkebunan1['jumlah_desa'] ?>, <?= $rows_peternakan1['jumlah_desa'] ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var donutOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var donutChart = new Chart(donutChartCanvas, {
            type: 'doughnut',
            data: donutData,
            options: donutOptions
        })

        //-------------
        //- PIE CHART -
        //-------------
        <?php   
            $query_donut_hortikultura = $mysqli->query("SELECT * FROM tbl_gratieks WHERE subsektor='Hortikultura'");
            $rows_hortikultura = mysqli_num_rows($query_donut_hortikultura);

            $query_donut_tanaman_pangan = $mysqli->query("SELECT * FROM tbl_gratieks WHERE subsektor='Tanaman Pangan'");
            $rows_tanaman_pangan = mysqli_num_rows($query_donut_tanaman_pangan);

            $query_donut_perkebunan = $mysqli->query("SELECT * FROM tbl_gratieks WHERE subsektor='Perkebunan'");
            $rows_perkebunan = mysqli_num_rows($query_donut_perkebunan);

            $query_donut_peternakan = $mysqli->query("SELECT * FROM tbl_gratieks WHERE subsektor='Peternakan'");
            $rows_peternakan = mysqli_num_rows($query_donut_peternakan);
        ?>
        // Get context with jQuery - using jQuery's .get() method.
        var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
        var pieData = {
            labels: [
                'Hortikultura',
                'Tanaman Pangan',
                'Perkebunan',
                'Peternakan',
            ],
            datasets: [{
                data: [<?= $rows_hortikultura; ?>, <?= $rows_tanaman_pangan; ?>, <?= $rows_perkebunan; ?>, <?= $rows_peternakan; ?>],
                backgroundColor: ['#f56954', '#00a65a', '#f39c12', '#00c0ef', '#3c8dbc', '#d2d6de'],
            }]
        }
        var pieOptions = {
            maintainAspectRatio: false,
            responsive: true,
        }
        //Create pie or douhnut chart
        // You can switch between pie and douhnut using the method below.
        var pieChart = new Chart(pieChartCanvas, {
            type: 'pie',
            data: pieData,
            options: pieOptions
        })

    });
</script>

</body>

</html>