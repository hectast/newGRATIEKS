<?php
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['cari']) && empty($_GET['cari2']) && empty($_GET['cari3']) && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: cetak.php'));
}

include "../../../koneksi.php";
$cari3 = $_GET['cari3'];
$cari = $_GET['cari'];
$cari2 = $_GET['cari2'];

require_once __DIR__ . '../../../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
'mode' => 'utf-8',
'format' => [300, 400],
'orientation' => 'L'
]);


if(empty($cari)){
echo $a1 = " -";
}else{ 
echo $a1 = $cari;} 
if(empty($cari2)){
echo $a2 = " -";
}else{ 
echo $a2 = $cari2;
} 
if(empty($cari3)){
echo $a3 = " -";
}else{ echo 
$a3 = $cari3;
}

$html = '
<body style="font-size:12px">
<div style="text-align:center;">
<h1>Laporan Komoditas</h1>
<h3>Komoditas : '.$a1.' | Desa : '.$a2.' | Tahun/Bulan : '.$a3.'</h3>
</div>
<table border="1" style="border-collapse:collapse" cellpadding="5">
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

';

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

$html .= '
<tr>
<td>' . $i = $i + 1 . '</td>
<td>' . $rwcari1['komodi'] . '</td>
<td>' . $rwcari1['subsektor'] . '</td>
<td>' . number_format($rwcari1['kapasitas'], 2, ",", ".") . '</td>
<td>' . $rwcari1['olahan'] . '</td>
<td>' . $rwcari1['bentuk'] . '</td>
<td>Rp. ' . number_format($rwcari1['harga'], 0, ",", ".") . '</td>
<td>' . $rwcari1['gap'] . '</td>
<td>' . $rwcari1['gudang'] . '</td>
<td>' . $rwcari1['pasar'] . '</td>
<td>' . $rwcari1['labuh'] . '</td>
<td>' . $rwcari1['desa'] . '</td>
<td>' . $rwcari1['kec'] . '</td>
<td>' . number_format($rwcari1['lahan'], 2, ",", ".") . '</td>
<td>' . $rwcari1['statuslah'] . '</td>
<td>' . number_format($rwcari1['poktan'], 0, ",", ".") . '</td>
<td>' . $rwcari1['penyuluh'] . '</td>
<td>' . $rwcari1['infra'] . '</td>
<td>' . $rwcari1['modal'] . '</td>
<td>' . $rwcari1['koperasi'] . '</td>
<td>' . $rwcari1['mitra'] . '</td>
<td>' . $rwcari1['bina'] . '</td>
<td>' . $rwcari1['bantuan'] . '</td>
<td>' . $rwcari1['rencana'] . '</td>
<td>' . $rwcari1['peran'] . '</td>
<td>' . $rwcari1['tim'] . '</td>
<td>' . $rwcari1['tgl'] . '</td>
</tr>
';
}

$html .= '
<tr>
<td colspan="3"><B>Total Y1<B></td>
<td><B> ' . number_format($totalkapasitas, 2, ",", ".") . ' </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B>Rp. ' . number_format($totalharga, 0, ",", ".") . ' </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> ' . number_format($totaldesa, 0, ",", ".") . '</B></td>
<td><B> </B></td>
<td><B>  ' . number_format($totallahan, 2, ",", ".") . '</B></td>
<td><B> </B></td>
<td><B>  ' . number_format($totalpoktan, 0, ",", ".") . '</B></td>
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
';

$ratakapasitas = $totalkapasitas / $i;
$rataharga = $totalharga / $i;
$ratadesa = $totaldesa / $i;
$ratalahan = $totallahan / $i;
$ratapoktan = $totalpoktan / $i;

$html .= '
<tr>
<td colspan="3"><B>Rata-Rata<B></td>

<td><B>' . number_format($ratakapasitas, 2, ",", ".") . ' </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B>Rp. ' .  number_format($rataharga, 2, ",", ".") . ' </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B>' . number_format($ratadesa, 2, ",", ".") . ' </B></td>
<td><B> </B></td>
<td><B>' .  number_format($ratalahan, 2, ",", ".") . ' </B></td>
<td><B> </B></td>
<td><B>' .  number_format($ratapoktan, 2, ",", ".") . ' </B></td>
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

';
if ($cari != "") {


$html .= '

<tr>
<td colspan="3"><B>Total Y2 <B></td>

<td><B>' . number_format($totalkapasitas1, 2, ",", ".") . '</B></td>
<td><B>
</B></td>
<td><B> </B></td>
<td><B>Rp.' . number_format($totalharga1, 2, ",", ".") . '</B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B>' . number_format($totaldesa1, 2, ",", ".") . '</B></td>
<td><B> </B></td>
<td><B>' . number_format($totallahan1, 2, ",", ".") . '</B></td>
<td><B> </B></td>
<td><B>' . number_format($totalpoktan1, 2, ",", ".") . '</B></td>
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
';
$devkapasitas = sqrt(($totalkapasitas1 - pow($totalkapasitas, 2) / $i) / ($i - 1));
$devharga = sqrt(($totalharga1 - pow($totalharga, 2) / $i) / ($i - 1));
$devdesa = sqrt(($totaldesa1 - pow($totaldesa, 2) / $i) / ($i - 1));
$devlahan = sqrt(($totallahan1 - pow($totallahan, 2) / $i) / ($i - 1));
$devpoktan = sqrt(($totalpoktan1 - pow($totalpoktan, 2) / $i) / ($i - 1));

if ($i == 1) {
    echo $devkapasitas = 0;
    $data1 = $devkapasitas;
} else {
    $data1 =  number_format($devkapasitas, 2, ",", ".");
}
if ($i == 1) {
    $devharga = 0;
    $data2 = $devharga;
} else {
    $data2 = number_format($devharga, 2, ",", ".");
}
if ($i == 1) {
    $devdesa = 0;
    $data3 = $devdesa;
} else {
    $data3 = number_format($devdesa, 2, ",", ".");
}
if ($i == 1) {
    $devlahan = 0;
    $data4 = $devlahan;
} else {
    $data4 = number_format($devlahan, 2, ",", ".");
}
if ($i == 1) {
    $devpoktan = 0;
    $data5 = $devpoktan;
} else {
    $data5 = number_format($devpoktan, 2, ",", ".");
}
$html.='
<tr>
<td colspan="3"><B>StDev<B></td>

<td><B>' . $data1 . '</B></td>
<td><B></B></td>
<td><B></B></td>

<td><B>Rp.  ' . $data2 . '</B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>
<td><B> </B></td>

<td><B>' . $data3 . '</B></td>
<td><B> </B></td>

<td><B>' . $data4 . '</B></td>
<td><B> </B></td>

<td><B>' . $data5 . '</B></td>
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
';



$html .='
</table>

<table>
<tr>
Dari hasil pengolahan data tersebut diatas, maka dapat disimpulkan untuk sementara sebagai berikut :</p>


<td valign ="top">1.</td>
<td>
Rata-rata Kapasitas produksi komoditas 
<font color="red">' . $cari . '</font> berkisar antara <font color="red">' . number_format($ratakapasitas - $devkapasitas, 2, ",", ".") . '</font>
sampai dengan <font color="red">' . number_format($ratakapasitas + $devkapasitas, 2, ",", ".") . '</font> Ton/Ha setiap kali panen;
</td>
</tr>
<tr>
<td valign ="top">2.</td>
<td> 
Rata-rata Harga komoditas 
<font color="red">' . $cari . '</font> berkisar antara <font color="red"> Rp. ' . number_format($rataharga - $devharga, 0, ",", ".") . '</font>
sampai dengan <font color="red"> Rp. ' . number_format($rataharga + $devharga, 0, ",", ".") . '</font>;
</td>
</tr>
<tr>
<td valign ="top">3.</td>
<td>
Rata-rata Desa yang mengelola pertanaman 
<font color="red">' . $cari . '</font> berkisar antara <font color="red">' . number_format($ratadesa - $devdesa, 0, ",", ".") . '</font>
sampai dengan <font color="red">' . number_format($ratadesa + $devdesa, 0, ",", ".") . '</font> Desa dari Total <font color="red">' . number_format($totaldesa, 0, ",", ".") . '</font> Desa pertanaman <font color="red">' . $cari . '</font>;
</td>
</tr>
<tr>
<td valign ="top">4.</td>
<td>
Rata-rata Luas lahan pertanaman 
<font color="red">' . $cari . '</font> berkisar antara <font color="red">' . number_format($ratalahan - $devlahan, 2, ",", ".") . '</font>
sampai dengan <font color="red">' . number_format($ratalahan + $devlahan, 2, ",", ".") . '</font> Ha dari Total <font color="red">' . number_format($totallahan, 0, ",", ".") . '</font> Ha Luas Lahan pertanaman <font color="red">' . $cari . '</font>;
</td>
</tr>
<tr>
<td valign="top">5.</td>
<td>
Rata-rata kelompok tani yang mengusahakan pertanaman/komoditas 
<font color="red">' . $cari . '</font> berkisar antara <font color="red">' . number_format($ratapoktan - $devpoktan, 0, ",", ".") . '</font>
sampai dengan <font color="red">' . number_format($ratapoktan + $devpoktan, 0, ",", ".") . '</font> Kelompok Tani dari Total <font color="red">' . number_format($totalpoktan, 0, ",", ".") . '  </font> Kelompok Tani yang menanam <font color="red"> ' . $cari . '</font>;
</td>
</tr>
</table>

';
function penyebut($nilai)
{
    $nilai = abs($nilai);
    $huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " " . $huruf[$nilai];
    } else if ($nilai < 20) {
        $temp = penyebut($nilai - 10) . " Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai / 10) . " Puluh" . penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai / 100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai / 1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai / 1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai / 1000000000) . " Milyar" . penyebut(fmod($nilai, 1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai / 1000000000000) . " Trilyun" . penyebut(fmod($nilai, 1000000000000));
    }
    return $temp;
}
function terbilang($nilai)
{
    if ($nilai < 0) {
        $hasil = "minus " . trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}
$angka = $rataharga;

$html .= '<font color="red">Rata-rata Harga : </font><font color="green"><b><i>' . terbilang($angka) . ' Rupiah</i></b></font>  
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
<h4>Grafik - Komoditas : <font color="red">' . $cari . '</font></h4>
';

$chart = '{
"type": "doughnut",
"data": {
"labels": [
"Rata-rata Kap. Prod.  ' . $cari . ' (Ton/Ha)",  
"Jumlah Desa Yang Menanam ' . $cari . '","Total Luas Lahan Tanaman ' . $cari . ' (Ha)", "Jumlah Klpk Tani Yang Menanam ' . $cari . '"
],
datasets: [{
label: "My First dataset",
backgroundColor:["green" ,"yellow","aqua","red","orange"],
borderColor: ["green" ,"yellow","aqua","red","orange"],
data: [

' . number_format($ratakapasitas, 0, ",", ".") . ',  
' . number_format($totaldesa, 0, ",", ".") . ',' . number_format($totallahan, 0, ",", ".") . ',
' . number_format($totalpoktan, 0, ",", ".") . '

]
}]
},
}';
$encoded = urlencode($chart);
$imageUrl = "https://quickchart.io/chart?c=" . $encoded;

$html .= '

<img width="600" src="'.$imageUrl.'">
';
}else{
    $html.= '</table>';     
}
$html.='
</body>
';




?>

<?php
$mpdf->WriteHTML($html);

$mpdf->Output();
?>
