<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['cari3']) && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: cetak.php'));
}
$cari = $_GET['cari3'];
    ?>

        <div class="col-12 mt-4">
            <a href="cetakp03.php?cari3=<?= $cari ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a><br><br>
            <center>
                <h3>Laporan Komoditas</h3>
                <h6>Tahun / Bulan :<?= $cari ?></h6>
            </center>
            <table class="table table-bordered table-hover table-responsive">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Komoditas</th>
                        <th>Sub Sektor </th>
                        <th>Kapasitas Produksi/Panen (Ton/Ha) </th>
                        <th>Olahan Primer </th>
                        <th>Bentuk Olahan </th>
                        <th>Harga/Kg (Rp.) </th>
                        <th>Penerapan GAP </th>
                        <th>Gudang Penyimpanan </th>
                        <th>Pemasaran Saat ini</th>
                        <th>Pelabuhan Ekspor </th>
                        <th>Jumlah Desa </th>
                        <th>Nama Kecamatan/ Kabupaten </th>
                        <th>Luas Lahan (Ha)</th>
                        <th>Status Lahan </th>
                        <th>Jumlah Poktan </th>
                        <th>Kebaradaan Penyuluh </th>
                        <th>Infrastruktur Penunjang </th>
                        <th>Permodalan</th>
                        <th>Koperasi</th>
                        <th>Kemitraan</th>
                        <th>Binaan Pemda/ Ditjen Teknis </th>
                        <th>Jenis Bantuan </th>
                        <th>Rencana Pengembangan </th>
                        <th>Peran UPT Karantina Pertanian </th>
                        <th>TIM </th>
                        <th>Tanggal/ Waktu Input</th>
                    </tr>
                </thead>
                <tbody>




                    <?php
                    $i = 0;
                    $totalkapasitas = 0;
                    $totalharga = 0;
                    $totaldesa = 0;
                    $totallahan = 0;
                    $totalpoktan = 0;
                    $nomor = 1;
                    $qcari1 = "SELECT * FROM tbl_gratieks WHERE tgl LIKE '%$cari%'";
                    $rcari1 = $mysqli->query($qcari1);
                    while ($rwcari1 = mysqli_fetch_assoc($rcari1)) {
                        $totalkapasitas += $rwcari1['kapasitas'];
                        $totalharga += $rwcari1['harga'];
                        $totaldesa += $rwcari1['desa'];
                        $totallahan += $rwcari1['lahan'];
                        $totalpoktan += $rwcari1['poktan'];

                        $totalkapasitas1 += pow($rwcari1['kapasitas'], 2);
                        $totalharga1 += pow($rwcari1['harga'], 2);
                        $totaldesa1 += pow($rwcari1['desa'], 2);
                        $totallahan1 += pow($rwcari1['lahan'], 2);
                        $totalpoktan1 += pow($rwcari1['poktan'], 2);
                    ?>

                        <tr>
                            <td><?= $i = $i + 1 ?></td>
                            <td><?= $rwcari1['komodi'] ?></td>
                            <td><?= $rwcari1['subsektor'] ?> </td>
                            <td><?php echo number_format($rwcari1['kapasitas'], 2, ",", "."); ?> </td>
                            <td>
                                <?php
                                if ($rwcari1['olahan'] == 'Ada') {
                                ?>
                                    <div class="badge badge-success"><?= $rwcari1['olahan'] ?></div>
                                <?php
                                } else {
                                ?>
                                    <div class="badge badge-danger"><?= $rwcari1['olahan'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $rwcari1['bentuk']; ?> </td>
                            <td><?php echo "Rp." . number_format($rwcari1['harga'], 0, ",", "."); ?></td>
                            <td>
                                <?php
                                if ($rwcari1['gap'] == 'Sudah') {
                                ?>
                                    <div class="badge badge-success"><?= $rwcari1['gap'] ?></div>
                                <?php
                                } else {
                                ?>
                                    <div class="badge badge-danger"><?= $rwcari1['gap'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($rwcari1['gudang'] == 'Ada') {
                                ?>
                                    <div class="badge badge-success"><?= $rwcari1['gudang'] ?></div>
                                <?php
                                } else {
                                ?>
                                    <div class="badge badge-danger"><?= $rwcari1['gudang'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $rwcari1['pasar'] ?></td>
                            <td><?= $rwcari1['labuh'] ?></td>
                            <td><?php echo number_format($rwcari1['desa'], 0, ",", "."); ?> </td>
                            <td><?= $rwcari1['kec'] ?></td>
                            <td><?php echo number_format($rwcari1['lahan'], 2, ",", "."); ?></td>
                            <td><?php echo $rwcari1['statuslah']; ?></td>
                            <td><?php echo number_format($rwcari1['poktan'], 0, ",", "."); ?> </td>
                            <td>
                                <?php
                                if ($rwcari1['penyuluh'] == 'Ada') {
                                ?>
                                    <div class="badge badge-success"><?= $rwcari1['penyuluh'] ?></div>
                                <?php
                                } else {
                                ?>
                                    <div class="badge badge-danger"><?= $rwcari1['penyuluh'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $rwcari1['infra'] ?></td>
                            <td><?= $rwcari1['modal'] ?></td>
                            <td>
                                <?php
                                if ($rwcari1['koperasi'] == 'Ada') {
                                ?>
                                    <div class="badge badge-success"><?= $rwcari1['koperasi'] ?></div>
                                <?php
                                } else {
                                ?>
                                    <div class="badge badge-danger"><?= $rwcari1['koperasi'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $rwcari1['mitra'] ?></td>
                            <td>
                                <?php
                                if ($rwcari1['bina'] == 'Sudah') {
                                ?>
                                    <div class="badge badge-success"><?= $rwcari1['bina'] ?></div>
                                <?php
                                } else {
                                ?>
                                    <div class="badge badge-danger"><?= $rwcari1['bina'] ?></div>
                                <?php
                                }
                                ?>
                            </td>
                            <td><?= $rwcari1['bantuan'] ?> </td>
                            <td><?= $rwcari1['rencana'] ?></td>
                            <td><?= $rwcari1['peran'] ?></td>
                            <td><?= $rwcari1['tim'] ?></td>
                            <td><?= $rwcari1['tgl']; ?> : <?= $rwcari1['waktu'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                    <tr>
                        <td colspan="3"><B>Total Y1<B></td>
                        <td><B><?php echo number_format($totalkapasitas, 2, ",", "."); ?> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B><?php echo "Rp." . number_format($totalharga, 0, ",", "."); ?> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B><?php echo number_format($totaldesa, 0, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php echo  number_format($totallahan, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php echo  number_format($totalpoktan, 0, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                    </tr>
                    <?php
                    $ratakapasitas = $totalkapasitas / $i;
                    $rataharga = $totalharga / $i;
                    $ratadesa = $totaldesa / $i;
                    $ratalahan = $totallahan / $i;
                    $ratapoktan = $totalpoktan / $i;
                    ?>
                    <tr>
                        <td colspan="3"><B>Rata-Rata<B></td>

                        <td><B><?php echo number_format($ratakapasitas, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B><?php echo "Rp." . number_format($rataharga, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B><?php echo number_format($ratadesa, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php echo  number_format($ratalahan, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php echo  number_format($ratapoktan, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                    </tr>
                </tbody>
            </table>
        </div>

