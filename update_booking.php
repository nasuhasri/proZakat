<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Staff can update booking details here -->
                        <form action = "update_booking_action.php" id="updateBooking" method="POST">
                        <?php
                            $bookingID = $_GET["bookingID"];
                            
                            $sql = "SELECT * FROM `mohon_pinjaman` mp, `km_asset` km
                                    WHERE mp.assetID = km.assetID
                                    AND mp.mohonID = $bookingID";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $astNm = $row["assetName"];
                                    $tDari = $row["tarikh_dari"];
                                    $tHingga = $row["tarikh_hingga"];
                                    $tMohon = $row["tarikh_mohon"];
                                    $tujuan = $row["tujuan"];
                                    $batal = $row["batal"];

                                    ?>
                                        <div class="user-data m-b-30">
                                            <h3 class="title-3 m-b-30">
                                                <i class="zmdi zmdi-account-calendar"></i>Kemaskini Profil Saya</h3>
                                            <div class="table table-borderless table-striped table-earning" id="tablestf">
                                                <table class="table">
                                                    <tr>
                                                        <td>Permohonan ID</td>
                                                        <td><input type="text" name="mohonID" value="<?php echo $bookingID; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tarikh Mohon</td>
                                                        <td><?php echo $tMohon; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Asset</td>
                                                        <td>
                                                            <select id="astNm" name="astNm">
                                                                <option value="0">Pilih Aset</option>
                                                                <?php
                                                                    $conn = OpenCon();
                                                                    $sql = "SELECT * FROM `km_asset` k
                                                                            WHERE k.penyelenggaraan = 'AVAILABLE'";
                                                                    $result = $conn->query($sql);
                                    
                                                                    while($row = $result->fetch_assoc()) {
                                                                        echo "<option value= '". $row['assetName'] ."'>" .$row['assetName']. "</option>";													}
                                                                ?>
                                                            </select>	
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tarikh Dari</td>
                                                        <td><input type="date" name="tDari" value="<?php echo $tDari;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tarikh Hingga</td>
                                                        <td><input type="date" name="tHingga" value="<?php echo $tHingga;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Tujuan</td>
                                                        <td><textarea name="tujuan" id="tujuan" rows="9" class="form-control" value="<?php echo $tujuan; ?>"></textarea></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <button type="button" class="btn btn-danger" value="Back" onclick="history.back()">
                                                                <i class="fa fa-undo"></i>&nbsp; Kembali</button>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-edit"></i>&nbsp; Kemaskini Maklumat</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            else{
                                echo "Error";
                            }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
