<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $conn = OpenCon();

                            /* Get data from bookingAdmin.php */
                            $bookingID = $_GET["bookingID"];

                            // $sqlS = "SELECT penyelenggaraan FROM `km_asset` k
                            //         WHERE k.penyelenggaraan = 'SEDANG DISELENGGARA'";
                            // $resultS = $conn->query($sqlS);

                            $sqlS = "SELECT * FROM `km_asset` km, `mohon_pinjaman` mp
                                    WHERE km.assetID = mp.assetID
                                    AND mp.mohonID = $bookingID";
                            $resultS = $conn->query($sqlS);

                            if($resultS == true){
                                /** Sql to update booking status becomes 'DIBATALKAN' **/
                                $sql = "UPDATE `mohon_pinjaman` mp
                                        SET mp.kelulusan='DIBATALKAN'
                                        WHERE mp.mohonID=$bookingID";
                                $result = $conn->query($sql);
                                
                                if(! $result){
                                    die('Could not update data: '. mysqli_error($conn));
                                }
                                else {
                                    echo "<script type='text/javascript'>
                                            alert('Permohonon Berjaya DIBATALKAN');
                                            window.location.href='bookingAdmin.php';
                                        </script>";
                                }
                            }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
