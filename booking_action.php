<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'header.php'; ?>
    </head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Insert booking details into database -->
                        <?php
                            $conn=OpenCon();

                            /*Change the line below to our timezone!*/
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            $tarikhPulang = date("yy/m/d");
									
                            /* Get mohonID using rand method */                            
                            $mohonID = date("Y") .rand(100,999);

							/* Get tarikhLulus using date method */
                            $tarikhLulus = date("yy/m/d");
                            
                            /* Get data from booking_form.php using method POST */
							$tarikhDari = $_POST["tarikh-dari"];
                            $tarikhHingga = $_POST["tarikh-hingga"];
                            $tujuan = $_POST["tujuan"];
                            $astID = $_POST["assetID"];
                            $qtyAset = $_POST["qty_aset"];
                            $status = "Pending";

                            $uname = $_SESSION['login_user'];
                            $sqlStf = "SELECT * FROM `profil_staff` p
                                        WHERE p.username = '$uname'";
                            $resultStf = $conn->query($sqlStf);

                            if($resultStf == true){
                                while($row = $resultStf->fetch_assoc()){
                                    $stfID = $row["staffID"];
                                }
                            }

                            // REMINDER: PLS PUT '' FOR CHARACTER
                            $sql = "INSERT INTO mohon_pinjaman (mohonID, tarikh_dari,tarikh_hingga, qtyUser, tujuan, kelulusan, tarikh_lulus, tarikh_pulang, assetID, staffID)
                                    VALUES ($mohonID, '$tarikhDari','$tarikhHingga', $qtyAset, '$tujuan', '$status', '$tarikhLulus','$tarikhPulang', $astID, $stfID)";
                            $result = $conn->query($sql);

                            if($result == true){
                                ?>
                                <div class="row">
                                    <!-- Booking Details Card -->
                                    <div class="col-md-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <strong class="card-title">Booking Details
                                                    <mediu >
                                                        <span class="badge badge-success float-right mt-1">Success</span>
                                                    </medium>
                                                </strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text"> Maklumat Tempahan Aset </p>
                                                <br>
                                                <?php
                                                    $sql1 = "SELECT * FROM `mohon_pinjaman` mp
                                                            WHERE mp.mohonID = $mohonID";
                                                    $result1 = $conn->query($sql1);

                                                    if($result1->num_rows > 0){
                                                        while($row = $result1->fetch_assoc()){
                                                            $tarikhMohon = $row["tarikh_mohon"];
                                                            $status = $row["kelulusan"];
                                                        }
                                                    }
                                                ?>
                                                <table class="table">
                                                    <tr>
                                                        <td> Permohonan ID </td>
                                                        <td></td>
                                                        <td> <?php echo $mohonID; ?> </td>
                                                    <tr>

                                                    <tr>
                                                        <td> Tarikh Dari </td>
                                                        <td></td>
                                                        <td> <?php echo $tarikhDari; ?> </td>
                                                    <tr>

                                                    <tr>
                                                        <td> Tarikh Hingga </td>
                                                        <td></td>
                                                        <td> <?php echo $tarikhHingga; ?> </td>
                                                    <tr>

                                                    <tr>
                                                        <td> Tarikh Mohon </td>
                                                        <td></td>
                                                        <td> <?php echo $tarikhMohon; ?> </td>
                                                    <tr>

                                                    <tr>
                                                        <td> Kuantiti Aset </td>
                                                        <td></td>
                                                        <td> <?php echo $qtyAset; ?> </td>
                                                    <tr>

                                                    <tr>
                                                        <td> Tujuan </td>
                                                        <td></td>
                                                        <td> <?php echo $tujuan; ?> </td>
                                                    <tr>

                                                    <tr>
                                                        <td> Status Permohonan </td>
                                                        <td></td>
                                                        <td> <?php echo $status; ?> </td>
                                                    <tr>
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
                                                    <span class="badge badge-danger float-right mt-1">Alert</span>
                                                </medium>
                                                </strong>
                                            </div>
                                            <div class="card-body">
                                                <p class="card-text">Permintaan anda sedang diproses. Keputusan akan keluar dalam masa 2 hari. Terima kasih
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
                                                    <button type="button" class="btn btn-primary" onclick="window.location.href= 'index_staf.php' ">
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
