<?php
try
{
	$path = (getenv('MPDF_ROOT')) ? getenv('MPDF_ROOT') : __DIR__;
	require_once $path . '/vendor/autoload.php';

	$mpdf = new \Mpdf\Mpdf([
		'margin_left' => 20,
		'margin_right' => 15,
		'margin_top' => 60,
		'margin_bottom' => 25,
		'margin_header' => 10,
		'margin_footer' => 10
	]);

	//Database connection
	$conn = mysqli_connect("localhost","root","","pinjaman_asset") or die("Database Not Connected");

	$html .= "<style>
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
			</style>"; 

	$html .= "<htmlpageheader name='myheader'>
				<table width='100%'>
					<tr>
						<td width='70%' style='color:#0000BB;'>
							<span style='font-weight: bold; font-size: 14pt;'>Pusat Zakat Melaka</span>
							<br />
							No 1,3 &5, Jalan PNBB 1,
							<br />
							Kompleks Niaga Bukit Baru,<br />Jalan Bukit Baru, 75150 Melaka.
							<br />
							<span style='font-family:dejavusanscondensed;'>&#9742;</span> 1-300-88-0233
						</td>						
					</tr>
					<tr>
						<td style='text-align: center;'><br /><br /><span style='font-weight: bold; font-size: 14pt;'>Laporan Harian Aset Pusat Zakat Melaka</span></td>
					</tr>
				</table>
			</htmlpageheader>

			<htmlpagefooter name='myfooter'>
				<div style='border-top: 1px solid #000000; font-size: 9pt; text-align: center; padding-top: 3mm;'>
					Page {PAGENO} of {nb}
				</div>
			</htmlpagefooter>
			<sethtmlpageheader name='myheader' value='on' show-this-page='1' />
			<sethtmlpagefooter name='myfooter' value='on' />";

	//select data from database
	$sql = "SELECT * 
			FROM `km_asset` km, `mohon_pinjaman` mp, `profil_staff` p
			WHERE km.assetID = mp.assetID
			AND p.staffID = mp.staffID";
			
	$result = $conn->query($sql);
		$html .= "<table class='items' width='100%' style='font-size: 11pt; border-collapse: collapse;' cellpadding='10'>";
			$html .= '<thead>';
				$html .= '<tr>';
					$html .= '<td width="15%">Kod Asset</td>';
					$html .= '<td width="10%">Permohonan ID</td>';
					$html .= '<td width="45%">Nama Asset</td>';
					$html .= '<td width="15%">Tarikh Mohon</td>';
					$html .= '<td width="15%">Tarikh Lulus<td>';
				$html .= '</tr>';
			$html .= '<thead>';
			$html .= '<tbody>';
		
				if($result->num_rows> 0)
				{
					while($row = $result->fetch_assoc())
					{
						$astNm = $row["assetName"];
						$mID = $row["mohonID"];
						$astCode = $row["assetCode"];
						$tMohon = $row["tarikh_mohon"];
						$tLulus = $row["tarikh_lulus"];
						
						$html .= "<tr>";
							$html .= "<td align='center'>$astCode</td>";
							$html .= "<td>$mID</td>";
							$html .= "<td>$astNm</td>";
							$html .= "<td>$tMohon</td>";
							$html .= "<td>$tLulus</td>";
						$html .= "<tr>";
					}
				}
			$html .= '</tbody>';
		
		$html .= "</table>";
	$html .= '<div style="text-align: center; font-style: italic;">Laporan Harian Aset Pusat Zakat Melaka</div>
	</body>
	</html>';

	$mpdf->SetProtection(array('print'));
	$mpdf->SetTitle("Laporan Harian Aset PZM");
	$mpdf->SetAuthor("Pusat Zakat Melaka");
	$mpdf->SetWatermarkText("Paid");
	$mpdf->showWatermarkText = false;
	$mpdf->watermark_font = 'DejaVuSansCondensed';
	$mpdf->watermarkTextAlpha = 0.1;
	$mpdf->SetDisplayMode('fullpage');

	$mpdf->WriteHTML($html);

	$mpdf->Output('Laporan Harian Aset PZM.pdf', 'I');
} 
catch(\Mpdf\MpdfException $e) 
{
	echo $e->getMessage();
}
?>