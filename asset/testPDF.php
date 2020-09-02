<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- *********************************************** Start Coding **********************************************-->
                        <?php
                            require_once __DIR__ . '/vendor/autoload.php';
                            $mpdf = new \Mpdf\Mpdf();

                            // Database Connection
                            $conn = OpenCon();

                            $pdfcontent = "<h1>Zakat Melaka</h1>";

                            $mpdf->WriteHTML($pdfcontent);
                            $mpdf->SetDisplayMode('fullpage');
                            $mpdf->SetWatermarkText('etutorialspoint');
                            $mpdf->showWatermarkText = true;
                            $mpdf->watermarkTextAlpha = 0.1;

                            //output in browser
                            $mpdf->Output();	
                        ?>
                        <!-- *********************************************** End of coding *********************************************-->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
