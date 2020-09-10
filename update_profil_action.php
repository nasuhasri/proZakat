<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'header.php'; ?>
    </head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Update action here and if successful, page will go to profil_saya.php -->
                        <?php
                            // Get data from name in the input tag
                            $stfID = $_POST["stfID"];
                            $stfNm = $_POST["stfNm"];
                            $stfHP = $_POST["stfHP"];
                            $email = $_POST["email"];
                            $uname = $_POST["uname"];
                            $pwd = $_POST["pwd"];

                            $conn = OpenCon();

                            $sql = "UPDATE `profil_staff` p
                                    SET p.staffHP='$stfHP',
                                        p.staffEmail='$email',
                                        p.username='$uname',
                                        p.password='$pwd'
                                    WHERE p.staffID='$stfID'";
                            
                            $result = $conn->query($sql);

                            if($result == true){
                                echo "<script type='text/javascript'>
                                        alert('Successfully Updated!')
                                        window.location.href='profil_saya.php';
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
