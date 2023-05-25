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
                            $dateMod = date("yy/m/d");

                            $astID = $_POST["astID"];
                            $astCode = $_POST["astCode"];
                            $astNm = $_POST["astNm"];					
                            $status = $_POST["status"];
                            $qtyAset = $_POST["astNum"];

                            $uname = $_SESSION['login_user'];

                            $sqlStaf = "SELECT * FROM `profil_staff` p
                                        WHERE p.username = '$uname'";
                            $resultStaf = $conn->query($sqlStaf);

                            if($resultStaf->num_rows > 0){
                                while($row = $resultStaf->fetch_assoc()){
                                    $stfID = $row["staffID"];

                                    $sql = "UPDATE `km_asset` km
                                            SET km.assetCode = '$astCode',
                                                km.assetName = '$astNm',
                                                km.penyelenggaraan = '$status',
                                                km.userModID = $stfID,
                                                km.dateMod = '$dateMod',
                                                km.quantity = $qtyAset
                                            WHERE assetID = '$astID'";
                                    $result = $conn->query($sql);

                                    if($result == true){
                                        echo "<script type='text/javascript'>
                                                alert('Aset Berjaya Dikemaskini! ')
                                                window.location.href='asetAdmin.php';
                                            </script>";
                                    }
                                    else {
                                        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                                    }
                                }
                            }
                            else {
                                echo "Error: " . $sqlStaf . "<br>" . mysqli_error($conn);
                            }

                            // $sql = "UPDATE `km_asset` km
                            //         SET km.assetCode = '$astCode',
                            //             km.assetName = '$astNm',
                            //             km.penyelenggaraan = '$status',
                            //             km.userModID = $user,
                            //             km.dateMod = '$dateMod'
                            //         WHERE assetID = '$astID'";
                            // $result = $conn->query($sql);

                            // if($result == true){
                            //     echo "<script type='text/javascript'>
                            //             alert('Aset Berjaya Dikemaskini! ')
                            //             window.location.href='asetAdmin.php';
                            //         </script>";
                            // }
                            // else {
                            //     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            // }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
