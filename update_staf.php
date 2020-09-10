<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Admin can update staff details here -->
                        <form action = "update_staf_action.php" id="updateStaf" method="POST">
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
                                    $level = $row["level"];
                                    $status = $row["aktif"];
                                    
                                    ?>
                                        <div class="user-data m-b-30">
                                            <h3 class="title-3 m-b-30">
                                                <i class="zmdi zmdi-account-calendar"></i>Kemaskini Maklumat Staf</h3>
                                            <div class="table table-borderless table-striped table-earning" id="tablestf">
                                                <table class="table">
                                                    <tr>
                                                        <td>ID Staf</td>
                                                        <td><input type="text" name="stfID" value="<?php echo $stfID; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Staf</td>
                                                        <td><input type="text" name="stfNm" value="<?php echo $stfNm;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nombor Telefon</td>
                                                        <td><input type="text" name="stfHP" value="<?php echo $stfHP;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Emel</td>
                                                        <td><input type="text" name="email" value="<?php echo $email;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Staf</td>
                                                        <td>
                                                            <select id="status" name="status">
                                                                <option value="0">Pilih Status Staf</option>
                                                                <option value="AKTIF" <?php if($status == "AKTIF") echo "SELECTED";?>>AKTIF</option>
                                                                <option value="TIDAK AKTIF" <?php if($status == "TIDAK AKTIF") echo "SELECTED";?>>TIDAK AKTIF</option>
                                                            </select>	
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Level</td>
                                                        <td>
                                                            <select id="level" name="level">
                                                                <option value="0">Pilih Level</option>
                                                                <option value="STAF" <?php if($level == "STAF") echo "SELECTED";?>>STAF</option>
                                                                <option value="ADMIN" <?php if($level == "ADMIN") echo "SELECTED";?>>ADMIN</option>
                                                            </select>	
                                                        </td>
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
