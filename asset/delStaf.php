<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $conn = openCon();

                            $stfID = $_GET['staffID'];

                            $sql = "DELETE FROM `profil_staff`  
                                    WHERE staffID = $stfID";
                            $result = $conn->query($sql);
                            
                            if(! $result){
                                die('Could not delete data: '. mysqli_error($conn));
                            }
                            else {
                                echo "<script type='text/javascript'>
                                        alert('Staf Berjaya Dihapuskan!');
                                        window.location.href='stafAdmin.php';
                                    </script>";
                            }                   
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
