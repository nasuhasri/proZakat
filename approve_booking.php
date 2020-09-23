<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!------------------------------------------------------- Start Coding -------------------------------------------->
                        <?php
                            $conn = OpenCon();

                            /*Change the line below to our timezone!*/
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            
                            /* Get date using date method */
                            $tLulus = date("yy/m/d");

                            /* Get data from bookingAdmin.php */
                            $bookingID = $_GET["bookingID"];

                            $sqlS = "SELECT * FROM `km_asset` k
                                    WHERE k.penyelenggaraan = 'AVAILABLE'";
                            $resultS = $conn->query($sqlS);

                            if($resultS == true){
                                /** Sql to update booking status becomes 'DILULUSKAN' **/
                                $sql = "UPDATE `mohon_pinjaman` mp
                                        SET mp.kelulusan='DILULUSKAN',
                                            mp.tarikh_lulus = '$tLulus'
                                        WHERE mp.mohonID=$bookingID";
                                $result = $conn->query($sql);
                                
                                if(! $result){
                                    die('Could not update data: '. mysqli_error($conn));
                                }
                            }

                            $sql = "SELECT * FROM `mohon_pinjaman` mp, `km_asset` km
                                    WHERE mp.assetID = km.assetID
                                    AND mp.mohonID = $bookingID";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $availableQty = $row["quantity"];
                                    $qtyNeeded = $row["qtyUser"];
                                    $astID = $row["assetID"];

                                    if($qtyNeeded <= $availableQty){
                                        $qtyLeft = $availableQty - $qtyNeeded;

                                        $sqlUpdate = "UPDATE `km_asset` k
                                                    SET k.quantity = $qtyLeft
                                                    WHERE k.assetID = $astID";
                                        $resultUpdate = $conn->query($sqlUpdate);

                                        if(! $resultUpdate){
                                            die('Could not update data: '. mysqli_error($conn));
                                        }
                                        else {
                                            echo "<script type='text/javascript'>
                                                    alert('Permohonon Berjaya Diluluskan');
                                                    window.location.href='bookingAdmin.php';
                                                </script>";
                                        }	
                                    }
                                }
                            }
                        ?>
                        <!-------------------------------------------------- End of coding -------------------------------------------------->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
