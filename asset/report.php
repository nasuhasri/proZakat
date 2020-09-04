<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- *********************************************** Start Coding **********************************************-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Ringkasan Laporan</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <a href="testPDF.php">Cetak</a>
                        </div>

                        <?php
                            $sql = "SELECT * FROM `km_asset` km";
                            $result = $conn->query($sql);
                            
                            if($result->num_rows > 0){
                                while($row = mysqli_fetch_array($result)){
                                    echo $row['assetName'];
                                }
                            }
                        ?>
                        <!-- *********************************************** End of coding *********************************************-->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
