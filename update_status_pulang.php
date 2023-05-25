<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- *********************************************** Start Coding **********************************************-->
                        <?php
                            $conn = OpenCon();

                            /** Get bookingID from rekod_pemulangan.php **/
                            $bookingID = $_GET['bookingID'];
                            $assetID   = $_GET['assetID'];

                            /* Change the line below to our timezone! */
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            $tPulang = date("yy/m/d h:i:s");

                            /** Get username current session **/
                            $uname = $_SESSION['login_user'];

                            $sql = "SELECT * FROM `profil_staff` p
                                    WHERE p.username = '$uname'";
                            $result = $conn->query($sql);

                            $sqlGetQtyAsset = "SELECT a.quantity
                                                FROM `km_asset` a
                                                WHERE a.assetID = $assetID";
                            $resultGetQtyAsset = $conn->query($sqlGetQtyAsset);

                            // update quantity asset
                            if ($resultGetQtyAsset->num_rows > 0) {
                                while($row = $resultGetQtyAsset->fetch_assoc()) {
                                    $sqlGetQtyAsset = $row['quantity'] + 1;

                                    $sqlUpdateQtyAsset = "UPDATE `km_asset` a
                                                          SET a.quantity = $sqlGetQtyAsset
                                                          WHERE a.assetID = $assetID";
                                    $resultUpdateQtyAsset = $conn->query($sqlUpdateQtyAsset);
                                }
                            } else {
                                echo "Error: " . $sqlGetQtyAsset . "<br>" . mysqli_error($conn);

                            }

                            // update rekod pinjaman
                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $stfID = $row['staffID'];
                                    $sqlUpdate = "UPDATE `mohon_pinjaman` mp
                                                SET mp.penerima = $stfID,
                                                    mp.tarikh_pulang = '$tPulang',
                                                    mp.pemulangan = 'SUDAH DIPULANGKAN'
                                                WHERE mp.mohonID = $bookingID
                                                AND mp.assetID";
                                    $resultUpdate = $conn->query($sqlUpdate);

                                    if($resultUpdate == true){
                                        echo "<script type='text/javascript'>
                                                alert('Tarikh Pemulangan Berjaya Dikemaskini! ')
                                                window.location.href='rekod_pemulangan.php';
                                            </script>";
                                    }
                                    else {
                                        echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
                                    }
                                }
                            }
                            else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        ?>
                        <!-- *********************************************** End of coding *********************************************-->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
