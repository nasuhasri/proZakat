<?php
if(!isset($_POST)) {
	$name = $_POST['name'];
	$icnumber = $_POST['icnum'];
	$kodprogram = $_POST['kodprog'];
	$nameprogram = $_POST['nameprog'];
	$venueprog = $_POST['venue'];
	
	header('location:index.php');
	exit();
}
?>

<?php
	$name = $_POST['name'];
	$icnumber = $_POST['icnum'];
	$kodprogram = $_POST['kodprog'];
	$nameprogram = $_POST['nameprog'];
	$venueprog = $_POST['venue'];
?>

<?php

$html = '
<style>
    @page {
      size: auto;
      sheet-size: A4;
      header: myHTMLHeader1;
      footer: myHTMLFooter1;
    }
</style>

<htmlpageheader name="myHTMLHeader1">
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 15pt; color: #000088;">
	<tr>
		<td></td>
	</tr>
</table>
<table width="100%" style="font-family: serif; font-size: 11pt;">
	<tr>
		<th align="left"><img src="img/kpt.jpg" style="width: 230px; height: 200px align=right;"></th>
		<th align="right"><img src="img/pagohlogo.png" style="width: 230px; height: 200px align=right;"></th>
	</tr>
</table>
</htmlpageheader>

<htmlpagefooter name="myHTMLFooter1">
    <table width="100%" style="border-top: 1px solid #000000;font-size:11px;">
        <tr>
            <th align="left">Kolej Komuniti Pagoh</th>
            <td align="right">Printed on : {DATE d-m-Y} </td>
        </tr>
    </table>
</htmlpagefooter>

<article>
		<table width="100%" style="vertical-align: bottom; font-family: serif; font-size: 16pt;">
		<tr>
			<th><br><br><br><br><br><br></th>
		</tr>
		<tr>
			<th><h1 style="font-size: 50pt; font-family: serif;">SIJIL PENYERTAAN<br></h1></th>
		</tr>
		<tr>
			<th style="font-size: 20pt; font-family: sanserif;"><br>Dengan ini disahkan bahawa<br></th>
		</tr>
		<tr>
			<th><br>'.$name.'</th>
		</tr>
		<tr>
			<th>'.$icnumber.'</th>
		</tr>
		<tr>
			<th style="font-size: 20pt; font-family: sanserif;"><br>Telah berjaya menyertai program<br></th>
		</tr>
		<tr>
			<th>'.$nameprogram.'</th>
		</tr>
		<tr>
			<th style="font-size: 20pt; font-family: sanserif;"><br>Anjuran<br></th>
		</tr>
		<tr>
			<th>'.$venueprog.'</th>
		</tr>
		<tr>
			<th><br><br><br></th>
		</tr>
		<tr>
			<th align="left"><img src="img/logom.jpg" style="width: 230px; height: 200px align=right;"><br></th>
		</tr>
		</table>
</article>';

//echo on the pdf
//ob_start();
//echo '<h1 style="text-align: center;" >SIJIL PENYERTAAN</h1>';
//$html = ob_get_contents();
//ob_end_clean();


$filename = "certificate.pdf";
try {
  require_once("vendor/autoload.php");
	
	//Database Connection
	include 'conn.php';
	$conn = OpenCon();
	//Check for connection error
	if($conn->connect_error)
	{
		die("Connect failed: %s\n". $conn -> error);
	}
	
	$sql = "INSERT INTO user(username, useric, progid, progname, venue)
			VALUES('$name', '$icnumber', '$kodprogram', '$nameprogram', '$venueprog')";
	
	if(mysqli_query($conn, $sql))
	{
		$sql2 = "select * from user where useric = $icnumber";
		$result = $conn->query($sql);
	}
	else
	{
		echo "Error : " . $sql. "<br>" . mysqli_error($conn);
	}
	CloseCon($conn);

	
  $mpdf = new \Mpdf\Mpdf([
  	'mode' => 'c',
  	'margin_top' => 35,
  	'margin_bottom' => 17,
  	'margin_header' => 10,
  	'margin_footer' => 10,
  ]);

  $mpdf->showImageErrors = true;
  $mpdf->mirrorMargins = 1;
  $mpdf->SetTitle('eSijil Kolej Komuniti Pagoh');
  $mpdf->WriteHTML($html);
  $mpdf->Output('certificate.pdf', 'I');
} catch(\Mpdf\MpdfException $e) {
  echo $e->getMessage();
}
?>

<?php