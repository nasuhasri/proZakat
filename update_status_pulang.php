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
                            echo $bookingID;

                            /* Change the line below to our timezone! */
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            $tPulang = date("yy/m/d h:i:s");

                            /** Get username current session **/
                            $uname = $_SESSION['login_user'];

                            $sql = "SELECT * FROM `profil_staff` p
                                    WHERE p.username = '$uname'";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $stfID = $row['staffID'];
                                    echo $stfID;
                                    $sqlUpdate = "UPDATE `mohon_pinjaman` mp
                                                SET mp.penerima = $stfID,
                                                    mp.tarikh_pulang = '$tPulang',
                                                    mp.pemulangan = 'SUDAH DIPULANGKAN'
                                                WHERE mp.mohonID = $bookingID";
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
