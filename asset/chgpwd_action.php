<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $uname = $_SESSION["login_user"];
                            $conn = OpenCon();
                            //$conn = mysqli_connect("localhost", "root", "", "pinjaman_asset") or die("Connection Error: " . mysqli_error($conn));

                            $curpwd = $_POST["curpwd"];
                            $newpwd = $_POST["newpwd"];

                            /* Secure password hash. */
                            $hashnewpwd = password_hash($newpwd, PASSWORD_DEFAULT);

                            //echo $curpwd, $newpwd, $hashnewpwd;

                            $sql = "SELECT * FROM `profil_staff` p
                                    WHERE p.username = '$uname'";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $pwdDB = $row["password"];
                                    $stfID = $row["staffID"];

                                    if(password_verify($curpwd, $pwdDB)){
                                        $sqlUpdate = "UPDATE `profil_staff` p 
                                                    SET p.password = '$hashnewpwd'
                                                    WHERE p.staffID = $stfID";
                                        $resultU = $conn->query($sqlUpdate);

                                        if($resultU == true){
                                            echo "<script type='text/javascript'>
                                                    alert('Kata Laluan Berjaya Dikemaskini! ')
                                                    window.location.href='index_staf.php';
                                                </script>";
                                        }
                                        else {
                                            echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
                                        }
                                    }

                                    // if($curpwd == $pwdDB){
                                    //     $sqlUpdate = "UPDATE `profil_staff` p 
                                    //                     SET p.password = '$hashnewpwd'
                                    //                     WHERE p.staffID = $stfID";
                                    //     $resultU = $conn->query($sqlUpdate);
    
                                    //     if($resultU == true){
                                    //         echo "<script type='text/javascript'>
                                    //                 alert('Kata Laluan Berjaya Dikemaskini! ')
                                    //                 window.location.href='index_staf.php';
                                    //             </script>";
                                    //     }
                                    //     else {
                                    //         echo "Error: " . $sqlUpdate . "<br>" . mysqli_error($conn);
                                    //     }
                                    // }
                                }
                            }

                            // if (count($_POST) > 0) {
                            //     $result = mysqli_query($conn, "SELECT * FROM `profil_staff` p  WHERE p.username = $uname");
                            //     $row = mysqli_fetch_array($result);
                            //     if ($_POST["curpwd"] == $row["password"]) {
                            //         mysqli_query($conn, "UPDATE `profil_staff` p SET p.password='" . $_POST["newpwd"] . "' WHERE p.username = '$uname'");
                            //         $message = "Password Changed";
                            //     } else
                            //         $message = "Current Password is not correct";
                            // }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
