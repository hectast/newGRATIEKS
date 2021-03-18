<?php
error_reporting(0);

if ($_SERVER['REQUEST_METHOD'] == 'GET' && empty($_GET['cari2']) && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    /* 
           Up to you which header to send, some prefer 404 even if 
           the files does exist for security
        */
    header('HTTP/1.0 403 Forbidden', TRUE, 403);

    /* choose the appropriate page to redirect users */
    die(header('location: cetak.php'));
}


include "../../../koneksi.php";
$cari = $_GET['cari2'];

require_once __DIR__ . '../../../../vendor/autoload.php';
$mpdf = new \Mpdf\Mpdf([
    'mode' => 'utf-8',
    'format' => [300, 400],
    'orientation' => 'L'
]);




$html = '
<body style="font-size:12px">
<div style="text-align:center;">
<h1>Laporan Komoditas</h1>
<h3>' . $cari . '</h3>
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
$qcari1 = "SELECT * FROM tbl_gratieks WHERE kec = '$cari'";
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



$html .= '
</table>
</body>
';

?>

<?php
$mpdf->WriteHTML($html);

$mpdf->Output();
?>
