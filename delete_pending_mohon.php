<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!------------------------------------------- Start Coding -------------------------------------->
                        <?php
                            $conn = openCon();

                            $mohonID = $_GET['mohonID'];

                            $sql = "DELETE FROM mohon_pinjaman where mohonID = $mohonID";
                            $result = $conn->query($sql);
                            
                            if(! $result){
                                die('Could not delete data: '. mysqli_error($conn));
                            }
                            else {
                                echo "<script type='text/javascript'>
                                        alert('Permohonan Berjaya Dihapuskan!');
                                        window.location.href='pending_details.php';
                                    </script>";
                            }                   
                        ?>
                        <!------------------------------------------- End of coding ------------------------------------->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
