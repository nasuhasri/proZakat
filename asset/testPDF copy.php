<?php

include("connPZM.php");
$conn = OpenCon();

$sql = "SELECT * FROM `km_asset` km";
// $result = $conn->query($sql);
// $val = array();

// if($result->num_rows > 0){
//     while($row = mysqli_fetch_array($result)){
//         echo $row['assetName'];
//     }
// }

$rec_ast = mysqli_query($conn, $sql);
$total_rec = mysqli_num_rows($rec_ast);
$asset = array();
$i = 1;
while ($row = mysqli_fetch_array($rec_ast)) {
    $asset[$i] = $row['assetName'];
    $i++;

}

$html = '';

$html .= "
<html>
<head>
<style>
body {font-family: sans-serif;
	font-size: 10pt;
}
p {	margin: 0pt; }
table.items {
	border: 0.1mm solid #000000;
}
td { vertical-align: top; }
.items td {
	border-left: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
table thead td { background-color: #EEEEEE;
	text-align: center;
	border: 0.1mm solid #000000;
	font-variant: small-caps;
}
.items td.blanktotal {
	background-color: #EEEEEE;
	border: 0.1mm solid #000000;
	background-color: #FFFFFF;
	border: 0mm none #000000;
	border-top: 0.1mm solid #000000;
	border-right: 0.1mm solid #000000;
}
.items td.totals {
	text-align: right;
	border: 0.1mm solid #000000;
}
.items td.cost {
	text-align: "." center;
}
</style>
</head>

<body>
    <!--mpdf
    <htmlpageheader name='myheader'>
        <table width='100%'><tr>
            <td width='50%' style='color:#0000BB; '><span style='font-weight: bold; font-size: 14pt;'>Pusat Zakat Melaka</span><br />No 1,3 &5, Jalan PNBB 1,<br />Kompleks Niaga Bukit Baru,<br />Jalan Bukit Baru, 75150 Melaka.<br /><span style='font-family:dejavusanscondensed;'>&#9742;</span> 1-300-88-0233</td>
        </table>
    </htmlpageheader>

    <htmlpagefooter name='myfooter'>
        <div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm; '>
            Page {PAGENO} of {nb}
        </div>
    </htmlpagefooter>
    <sethtmlpageheader name='myheader' value='on' show-this-page='1' />
    <sethtmlpagefooter name='myfooter' value='on' />
    mpdf-->
    <br />

    <table class='items' width='100%' style='font-size: 11pt; border-collapse: collapse;' cellpadding='8'>
        <thead>
            <tr>
                <td width='15%'>Bil</td>
                <td width='10%'>Nama Aset</td>
                <td width='45%'>Tarikh Pinjam</td>
                <td width='15%'>Tarikh Pulang</td>
                <td width='15%'>Nama Peminjam</td>
                <td width='15%'>Bahagian</td>
            </tr>
        </thead>
        <tbody>
            <!-- ITEMS HERE -->
            <tr>
                <td align='center'>MX37801982</td>
                <td align='center'>$name</td>
                <td>Womans waterproof jacket<br />Options - Red and charcoal.</td>
                <td class='cost'>&pound;102.11</td>
                <td class='cost'>&pound;102.11</td>
            </tr>
            <tr>
                <td align='center'>MR7009298</td>
                <td align='center'>25</td>
                <td>Steel nails; oval head; 30mm x 3mm. Packs of 1000.</td>
                <td class='cost'>&pound;12.26</td>
                <td class='cost'>&pound;325.60</td>
            </tr>
            <!-- END ITEMS HERE -->
            $values
        </tbody>
    </table>
    <div style='text-align: center; font-style: italic;'>Payment terms: payment due in 30 days</div>
</body>
</html>
";



$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
require_once $path . '/vendor/autoload.php';

$mpdf = new \Mpdf\Mpdf([
	'margin_left' => 20,
	'margin_right' => 15,
	'margin_top' => 48,
	'margin_bottom' => 25,
	'margin_header' => 10,
	'margin_footer' => 10
]);

$mpdf->SetProtection(array('print'));
$mpdf->SetTitle("Laporan Harian Aset PZM");
$mpdf->SetAuthor("Pusat Zakat Melaka");
$mpdf->SetWatermarkText("Paid");
$mpdf->showWatermarkText = false;
$mpdf->watermark_font = 'DejaVuSansCondensed';
$mpdf->watermarkTextAlpha = 0.1;
$mpdf->SetDisplayMode('fullpage');

$mpdf->WriteHTML($html);

$mpdf->Output();