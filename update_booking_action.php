<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $mohonID = $_POST["mohonID"];
                            $astNm = $_POST["astNm"];
                            $dari = $_POST["tDari"];
                            $hingga = $_POST["tHingga"];
                            $tujuan = $_POST["tujuan"];

                            $conn = OpenCon();

                            $sql = "SELECT * FROM `km_asset` km
                                    WHERE km.assetName = '$astNm'";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $astID = $row["assetID"];

                                    $sqlUpdate = "UPDATE `mohon_pinjaman` mp
                                                SET mp.assetID='$astID',
                                                    mp.tarikh_dari='$dari',
                                                    mp.tarikh_hingga='$hingga',
                                                    mp.tujuan ='$tujuan'
                                                WHERE mp.mohonID ='$mohonID'";
                                    $resultU = $conn->query($sqlUpdate);

                                    if($resultU == true){
                                        echo "<script type='text/javascript'>
                                                alert('Permohonan Berjaya Dikemaskini!')
                                                window.location.href='booking_list.php';
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
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
