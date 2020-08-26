<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $conn = openCon();

                            $astID = $_GET['assetID'];

                            $sql = "DELETE FROM km_asset where assetID = $astID";
                            $result = $conn->query($sql);
                            
                            if(! $result){
                                die('Could not delete data: '. mysqli_error($conn));
                            }
                            else {
                                echo "<script type='text/javascript'>
                                        alert('Aset Berjaya Dihapuskan!');
                                        window.location.href='asetAdmin.php';
                                    </script>";
                            }                   
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
