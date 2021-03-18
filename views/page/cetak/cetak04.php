<?php
if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['cari1']) && empty($_GET['cari2']) && empty($_GET['cari3']) && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: cetak.php'));
}
$cari = $_GET['cari1'];
$cari2 = $_GET['cari2'];
$cari3 = $_GET['cari3']; 
$gabung = "";
    ?>

        <div class="col-12 mt-4">
            <a href="cetakp04.php?cari=<?= $cari ?>&cari2=<?= $cari2 ?>&cari3=<?= $cari3 ?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Cetak</a><br><br>
            <center>
                <h3>Laporan Komoditas</h3>
                <h6>Komoditas : <?php if(empty($cari)){echo" -";}else{ echo $cari;} ?>| Desa: <?php if(empty($cari2)){echo" -";}else{ echo $cari2;} ?>| Tahun / Bulan :<?php if(empty($cari3)){echo" -";}else{ echo $cari3;} ?></h6>
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

                    if ($cari != "") {
                        $gabung .= "AND komodi like '%".$cari."%'";
                        }
                        if ($cari2 != "") {
                        $gabung .= "AND kec like '%".$cari2."%'";
                        } 
                        if ($cari3 != "") {
                        $gabung .= "AND tgl like '%".$cari3."%'";
                        } 
                        $gabung = "WHERE " .ltrim($gabung, "AND ");
                        $rcari1 = mysqli_query($mysqli,"SELECT * FROM tbl_gratieks  $gabung");

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
                    <?php
				     
					 
						if ($cari != "") { 
						
					  ?>
                       <tr>
                        <td colspan="3"><B>Total Y2 <B></td>

                        <td><B><?php echo number_format($totalkapasitas1, 2, ",", "."); ?></B></td>
                        <td><B>
                            </B></td>
                        <td><B> </B></td>
                        <td><B><?php echo "Rp." . number_format($totalharga1, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B><?php echo number_format($totaldesa1, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php echo  number_format($totallahan1, 2, ",", "."); ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php echo  number_format($totalpoktan1, 2, ",", "."); ?></B></td>
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
                    $devkapasitas = sqrt(($totalkapasitas1 - pow($totalkapasitas, 2) / $i) / ($i - 1));
                    $devharga = sqrt(($totalharga1 - pow($totalharga, 2) / $i) / ($i - 1));
                    $devdesa = sqrt(($totaldesa1 - pow($totaldesa, 2) / $i) / ($i - 1));
                    $devlahan = sqrt(($totallahan1 - pow($totallahan, 2) / $i) / ($i - 1));
                    $devpoktan = sqrt(($totalpoktan1 - pow($totalpoktan, 2) / $i) / ($i - 1));
                    ?>
                     <tr>
                        <td colspan="3"><B>StDev<B></td>

                        <td><B><?php if ($i == 1) {
                                                    echo $devkapasitas = 0;
                                                } else {
                                                    echo number_format($devkapasitas, 2, ",", ".");
                                                } ?></B></td>
                        <td><B>

                            </B></td>
                        <td><B> </B></td>

                        <td><B><?php if ($i == 1) {
                                                    echo $devharga = 0;
                                                } else {
                                                    echo "Rp." . number_format($devharga, 2, ",", ".");
                                                } ?></B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B> </B></td>
                        <td><B><?php if ($i == 1) {
                                                    echo $devdesa = 0;
                                                } else {
                                                    echo number_format($devdesa, 2, ",", ".");
                                                } ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php if ($i == 1) {
                                                    echo $devlahan = 0;
                                                } else {
                                                    echo number_format($devlahan, 2, ",", ".");
                                                } ?></B></td>
                        <td><B> </B></td>
                        <td><B><?php if ($i == 1) {
                                                    echo $devpoktan = 0;
                                                } else {
                                                    echo number_format($devpoktan, 2, ",", ".");
                                                } ?></B></td>
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

            <table>
				  <br>
				 <?php if ($totalkapasitas>0) {?>
				 
					<tr>
					Dari hasil pengolahan data tersebut diatas, maka dapat disimpulkan untuk sementara sebagai berikut :</p>
					 
					 
					<td>1.</td>
					<td>
						Rata-rata Kapasitas produksi komoditas 
					    <font color="red"><?php echo $cari;?></font> berkisar antara <font color="red"><?php echo number_format ($ratakapasitas-$devkapasitas,2,",",".");?></font>
						sampai dengan <font color="red"><?php echo number_format ($ratakapasitas+$devkapasitas,2,",",".");?></font> Ton/Ha setiap kali panen;
					</td>
					</tr>
					<tr>
					<td>2.</td>
					<td> 
						Rata-rata Harga komoditas 
					    <font color="red"><?php echo $cari;?></font> berkisar antara <font color="red"> Rp.<?php echo number_format ($rataharga-$devharga,0,",",".");?></font>
						sampai dengan <font color="red"> Rp.<?php echo number_format ($rataharga+$devharga,0,",",".");?></font>;
					</td>
					</tr>
					<tr>
					<td>3.</td>
					<td>
						Rata-rata Desa yang mengelola pertanaman 
					    <font color="red"><?php echo $cari;?></font> berkisar antara <font color="red"><?php echo number_format ($ratadesa-$devdesa,0,",",".");?></font>
						sampai dengan <font color="red"><?php echo number_format ($ratadesa+$devdesa,0,",",".");?></font> Desa dari Total <font color="red"><?php echo number_format($totaldesa,0,",",".");?></font> Desa pertanaman <font color="red"><?php echo $cari;?></font>;
					</td>
					</tr>
					<tr>
					<td>4.</td>
					<td>
						Rata-rata Luas lahan pertanaman 
					    <font color="red"><?php echo $cari;?></font> berkisar antara <font color="red"><?php echo number_format ($ratalahan-$devlahan,2,",",".");?></font>
						sampai dengan <font color="red"><?php echo number_format ($ratalahan+$devlahan,2,",",".");?></font> Ha dari Total <font color="red"><?php echo number_format($totallahan,0,",",".");?></font> Ha Luas Lahan pertanaman <font color="red"><?php echo $cari;?></font>;
					</td>
					</tr>
					<tr>
					<td valign="top">5.</td>
					<td>
						Rata-rata kelompok tani yang mengusahakan pertanaman/komoditas 
					    <font color="red"><?php echo $cari;?></font> berkisar antara <font color="red"><?php echo number_format ($ratapoktan-$devpoktan,0,",",".");?></font>
						sampai dengan <font color="red"><?php echo number_format ($ratapoktan+$devpoktan,0,",",".");?></font> Kelompok Tani dari Total <font color="red"><?php echo number_format($totalpoktan,0,",",".");?></font> Kelompok Tani yang menanam <font color="red"><?php echo $cari;?></font>;
					</td>
					</tr>
				 </table>
                 <?php 
										function penyebut($nilai) {
											$nilai = abs($nilai);
											$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
											$temp = "";
											if ($nilai < 12) {
												$temp = " ". $huruf[$nilai];
											} else if ($nilai <20) {
												$temp = penyebut($nilai - 10). " Belas";
											} else if ($nilai < 100) {
												$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
											} else if ($nilai < 200) {
												$temp = " Seratus" . penyebut($nilai - 100);
											} else if ($nilai < 1000) {
												$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
											} else if ($nilai < 2000) {
												$temp = " Seribu" . penyebut($nilai - 1000);
											} else if ($nilai < 1000000) {
												$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
											} else if ($nilai < 1000000000) {
												$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
											} else if ($nilai < 1000000000000) {
												$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
											} else if ($nilai < 1000000000000000) {
												$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
											}     
											return $temp;
										}
										function terbilang($nilai) {
											if($nilai<0) {
												$hasil = "minus ". trim(penyebut($nilai));
											} else {
												$hasil = trim(penyebut($nilai));
											}     		
											return $hasil;
										}
										$angka =$rataharga; 
										?>
                 <font color="red">Rata-rata Harga : </font><font color="green"><b><i><?php echo terbilang ($angka);?> Rupiah</i></b></font>  

                    <div class="row mt-3">
                     
                               
                                
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
                                    
           
                        </div>
                        <div class="col-12">
                        <div class="card">
                                
                                <div class="card-body">
                                <h4 class="card-title">Grafik - Komoditas : <?= "<font color='red'>$cari</font>" ?></h4>
                                <div id="canvas-holder" style="width:100%">
										<canvas id="mydonut"></canvas>
									</div>
                                    <script>
												 var ctx = document.getElementById('mydonut').getContext('2d');
												 var chart = new Chart(ctx, {
													// The type of chart we want to create
                                                   
                                                    type: 'doughnut',

													// The data for our dataset
													data: {
														labels: [
														'Rata-rata Kap. Prod.  <?php echo $cari;?> (Ton/Ha)',  
													 'Jumlah Desa Yang Menanam <?php echo $cari;?>','Total Luas Lahan Tanaman <?php echo $cari;?> (Ha)', 'Jumlah Klpk Tani Yang Menanam <?php echo $cari;?>'
														],
														datasets: [{
															label: 'My First dataset',
															backgroundColor:['green' ,'yellow','aqua','red','orange'],
															borderColor: ['green' ,'yellow','aqua','red','orange'],
															data: [
															
															<?php echo number_format($ratakapasitas,0,",",".");?>,  
														<?php echo number_format($totaldesa,0,",",".");?>,<?php echo number_format($totallahan,0,",",".");?>,
														<?php echo number_format($totalpoktan,0,",",".");?>
									 		
															]
														}]

													},
                                                        
													
											
												});
                                                
											   
											</script>
                                </div>
                            </div>
                        </div>
                    </div>
                 
                 <?php
                 }
                 ?>
                      <?php
                        }
                        ?>
                </tbody>
            </table>
        </div>

