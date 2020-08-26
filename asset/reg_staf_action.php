<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $conn = OpenCon();

                            /* Get data from reg_staf.php using method POST */
							$stfNm = $_POST["stfNm"];
                            $stfHP = $_POST["stfHP"];
                            $email = $_POST["email"];
                            $uname = $_POST["uname"];

                            /* User's password. */
                            $pwd = $uname;

                            /* Secure password hash. */
                            $hash = password_hash($pwd, PASSWORD_DEFAULT);

                            /* Query if want to save password as plain text */
                            /* $sql = "INSERT INTO `profil_staff`(staffName, staffHP, staffEmail, username, password)
                                        VALUES ('$stfNm', '$stfHP', '$email', '$uname', '$pwd')"; */
                            $sql = "INSERT INTO `profil_staff`(staffName, staffHP, staffEmail, username, password)
                                    VALUES ('$stfNm', '$stfHP', '$email', '$uname', '$hash')";
                            $result = $conn->query($sql);

                            if($result == true){
                                echo "<script type='text/javascript'>
                                        alert('Pendaftaran Staf Berjaya Dilakukan! ')
                                        window.location.href='stafAdmin.php';
                                    </script>";
                            }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
