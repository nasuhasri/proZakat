<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Admin update staff details -->
                        <?php 
                            $conn = OpenCon();

                            $stfID = $_POST["stfID"];
                            $stfNm = $_POST["stfNm"];
                            $stfHP = $_POST["stfHP"];	
                            $email = $_POST["email"];					
                            $status = $_POST["status"];
                            $level = $_POST["level"];

                            if($level == "ADMIN"){
                                $sqlAdmin = "SELECT * FROM `profil_staff` p
                                            WHERE p.staffID = $stfID";
                                $resultAdmin = $conn->query($sqlAdmin);

                                if($resultAdmin->num_rows > 0){
                                    while($row = $resultAdmin->fetch_assoc()){
                                        $name = $row["staffName"];
                                        $HP = $row["staffHP"];
                                        $uname = $row["username"];
                                        $pwd = $row["password"];

                                        $sqlA = "INSERT INTO `admin`(stfName, stfHP, uname_admin, adminPwd)
                                                VALUES ('$name', '$HP','$uname', '$pwd')";
                                        $resultA = $conn->query($sqlA);

                                        if($resultA == true){
                                            echo "Berjaya";
                                        }
                                        else {
                                            echo "Error: " . $sqlA . "<br>" . mysqli_error($conn);
                                        }
                                    }
                                }
                                else {
                                    echo "Error: " . $sqlAdmin . "<br>" . mysqli_error($conn);
                                }
                            }


                            $sql = "UPDATE `profil_staff` p
                                    SET p.staffName = '$stfNm',
                                        p.staffHP = '$stfHP',
                                        p.staffEmail = '$email',
                                        p.aktif = '$status',
                                        p.level = '$level'
                                    WHERE p.staffID = $stfID";
                            $result = $conn->query($sql);

                            if($result == true){
                                echo "<script type='text/javascript'>
                                        alert('Staf Berjaya Dikemaskini! ')
                                        window.location.href='stafAdmin.php';
                                    </script>";
                            }
                            else {
                                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                            }
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
