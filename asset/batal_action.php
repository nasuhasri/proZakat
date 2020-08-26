<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $sebab = $_POST["sebab"];
                            $mohonID = $_POST["mohonID"];

                            $conn = OpenCon();

                            $uname = $_SESSION['login_user'];
                            $sqlStf = "SELECT * FROM `profil_staff` p
                                        WHERE p.username = '$uname'";
                            $resultStf = $conn->query($sqlStf);

                            if($resultStf == true){
                                while($row = $resultStf->fetch_assoc()){
                                    $stfID = $row["staffID"];
                                }
                            }

                            $sql = "UPDATE `mohon_pinjaman` mp
                                    SET mp.batal = 'YA', 
                                        mp.sbb_batal = '$sebab', 
                                        mp.pembatalID = '$stfID',
                                        mp.kelulusan = 'DIBATALKAN USER' 
                                    WHERE mp.mohonID = '$mohonID'";
                            $result = $conn->query($sql);

                            // UPDATE `mohon_pinjaman` mp SET mp.batal = 'YA', mp.sbb_batal = 'test1222', mp.pembatalID = '104' WHERE mp.mohonID = '2020206'

                            if($result == true){
                                echo "<script type='text/javascript'>
                                        alert('Pembatalan Berjaya Dilakukan. Terima kasih kerana menggunakan perkhidmatan kami!');
                                        window.location.href='booking_details.php';
                                    </script>";
                            }
                            else{
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }

                            // $sql = "INSERT INTO `mohon_pinjaman`(batal, sbb_batal, pembatalID)
                            //         VALUES ('YA', '$sebab', $stfID)";
                            // $result = $conn->query($sql);

                            // if($result->num_rows > 0){
                            //     while($row = $result->fetch_assoc()){
                            //         echo "<script type='text/javascript'>
                            //                 alert('Pembatalan Berjaya Dilakukan. Terima kasih kerana menggunakan perkhidmatan kami!');
                            //                 window.location.href='index_staf.php';
                            //             </script>";
                            //     }
                            // }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
