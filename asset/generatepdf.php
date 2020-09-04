<?php
try
{
	require __DIR__ . '/vendor/autoload.php';
	$mpdf = new \Mpdf\Mpdf();

	$html .= "<style>
				table {
				  border-collapse: collapse;
				}

				table, td, th {
				  border: 1px solid black;
				}
			</style>"; 

	//Database connection
	$conn = mysqli_connect("localhost","root","","pinjaman_asset") or die("Database Not Connected");

	//select data from database
	$sql = "SELECT * 
			FROM `km_asset` km, `mohon_pinjaman` mp, `profil_staff` p
			WHERE km.assetID = mp.assetID
			AND p.staffID = mp.staffID";
			
	$result = $conn->query($sql);
		
		//Output at pdf
		$html .= "<table>";
			$html .= "<tr>";
				$html .= "<th>Nama Peserta</th>";
				$html .= "<th>MyKad</th>";
				$html .= "<th>Nama Kursus</th>";
				$html .= "<th>Tempat</th>";
				$html .= "<th>Jenis Sijil<th>";
			$html .= "</tr>";
		
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
					$html .= "<td>$astNm</td>";
					$html .= "<td>$mID</td>";
					$html .= "<td>$astCode</td>";
					$html .= "<td>$tMohon</td>";
					$html .= "<td>$tLulus</td>";
				$html .= "<tr>";
			}
		}
		
		$html .= "</table>";
		
	$mpdf->WriteHTML($html);
	$mpdf->Output('asset.pdf', 'I');
} 
catch(\Mpdf\MpdfException $e) 
{
	echo $e->getMessage();
}
?>