<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $conn = OpenCon();

                            /*Change the line below to our timezone!*/
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            
                            /* Get date using date method */
                            $regDate = date("yy/m/d");
                            //$orderTime = date("H:i:s");

                            /* Get data from reg_aset.php using method POST */
							$astCode = $_POST["astCode"];
                            $astNm = $_POST["astNm"];

                            $sql = "INSERT INTO km_asset (assetCode, assetName, dateMod)
                                    VALUES ('$astCode', '$astNm', '$regDate')";
                            $result = $conn->query($sql);

                            if($result == true){
                                ?>
                                <div class="row">
                                    <!-- Booking Details Card -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Maklumat Pendaftaran Aset
                                                    <mediu >
                                                        <span class="badge badge-success float-right mt-1">Berjaya</span>
                                                    </medium>
                                                </strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"> Maklumat Pendaftaran Aset </p>
                                                <br>
                                                <!-- </?php
                                                    $sql1 = "SELECT * FROM `km_asset` km
                                                            WHERE km.assetCode = $astCode";
                                                    $result1 = $conn->query($sql1);

                                                    if($result1->num_rows > 0){
                                                        while($row = $result1->fetch_assoc()){
                                                            $astID = $row["assetID"];
                                                            $status = $row["penyelenggaraan"];

                                                            echo $astID, $status;
                                                        }
                                                    }
                                                ?> -->
                                                <table class="table">
                                                    <!-- <tr>
                                                        <td> Aset ID </td>
                                                        <td></td>
                                                        <td> </?php echo $astID; ?> </td>
                                                    <tr> -->
                                                    <tr>
                                                        <td> Kod Aset </td>
                                                        <td></td>
                                                        <td> <?php echo $astCode; ?> </td>
                                                    <tr>
                                                    <tr>
                                                        <td> Nama Aset </td>
                                                        <td></td>
                                                        <td> <?php echo $astNm; ?> </td>
                                                    <tr>
                                                    <tr>
                                                        <td> Tarikh Pendaftaran </td>
                                                        <td></td>
                                                        <td> <?php echo $regDate; ?> </td>
                                                    <tr>
                                                    <!-- <tr>
                                                        <td> Status Aset </td>
                                                        <td></td>
                                                        <td> </?php echo $status; ?> </td>
                                                    <tr> -->
                                                </table>
                                            </div>
                                        </div>
                                    </div> 
                                    
                                    <!-- Information Details Card -->
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Informasi Penting!
                                                <medium>
                                                    <span class="badge badge-success float-right mt-1">Alert</span>
                                                </medium>
                                                </strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">
                                                    Pendaftaran Aset Telah Berjaya Dilakukan. Anda Boleh Melihat Senarai Penuh Aset Di Menu-Aset
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <!-- Nak mencantikkan user view -->
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <td colspan="2" align="center">
                                                    <button type="button" class="btn btn-primary" onclick="window.location.href= 'index.php' ">
                                                        <i class="fa fa-home"></i>&nbsp; Go To Dashboard</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                
                                <?php
                            }
                            else {						
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
