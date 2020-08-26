<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'header.php'; ?>
    </head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Staff can update information details here -->
                        <form action = "update_profil_action.php" id="updateStaf" method="POST">
                        <?php
                            $conn = openCon();

                            $stfID = $_GET['staffID'];

                            $sql = "SELECT * FROM `profil_staff` p
                                    WHERE p.staffID = $stfID";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row=$result->fetch_assoc()){
                                    $stfID = $row["staffID"];
                                    $stfNm = $row["staffName"];
                                    $stfHP = $row["staffHP"];
                                    $email = $row["staffEmail"];
                                    $uname = $row["username"];
                                    $pwd = $row["password"];
                                    
                                    ?>
                                        <div class="user-data m-b-30">
                                            <h3 class="title-3 m-b-30">
                                                <i class="zmdi zmdi-account-calendar"></i>Kemaskini Profil Saya</h3>
                                            <div class="table table-borderless table-striped table-earning" id="tablestf">
                                                <table class="table">
                                                    <tr>
                                                        <td>Staff ID</td>
                                                        <td><input type="text" name="stfID" value="<?php echo $stfID; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Staff Name</td>
                                                        <td><input type="text" name="stfNm" value="<?php echo $stfNm;?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Mobile Number</td>
                                                        <td><input type="text" name="stfHP" value="<?php echo $stfHP; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Email</td>
                                                        <td><input type="email" name="email" value="<?php echo $email; ?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Username</td>
                                                        <td><input type="text" name="uname" value="<?php echo $uname; ?>" ></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2" align="center">
                                                            <button type="button" class="btn btn-danger" value="Back" onclick="history.back()">
                                                                <i class="fa fa-undo"></i>&nbsp; Kembali</button>
                                                            <button type="submit" class="btn btn-success">
                                                                <i class="fa fa-edit"></i>&nbsp; Kemaskini Maklumat</button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    <?php
                                }
                            }
                            else {
                                echo "Data cannot be diplayed.";
                            }
                            
                            CloseCon($conn);
                        ?>
                        
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    

</html>
<!-- end document-->
