<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Admin can update asset details here -->
                        <form action = "update_aset_action.php" id="updateAset" method="POST">
                        <?php
                            $conn = openCon();

                            $astID = $_GET['assetID'];

                            $sql = "SELECT * FROM `km_asset` k
                                    WHERE k.assetID = $astID";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row=$result->fetch_assoc()){
                                    $astID = $row["assetID"];
                                    $astCode = $row["assetCode"];
                                    $astNm = $row["assetName"];
                                    $status = $row["penyelenggaraan"];
                                    $uID = $row["userModID"];
                                    $dateMod = $row["dateMod"];
                                    
                                    ?>
                                        <div class="user-data m-b-30">
                                            <h3 class="title-3 m-b-30">
                                                <i class="zmdi zmdi-account-calendar"></i>Kemaskini Aset</h3>
                                            <div class="table table-borderless table-striped table-earning" id="tablestf">
                                                <table class="table">
                                                    <tr>
                                                        <td>ID Aset</td>
                                                        <td><input type="text" name="astID" value="<?php echo $astID; ?>" readonly></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kod Aset</td>
                                                        <td><input type="text" name="astCode" value="<?php echo $astCode;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Nama Aset</td>
                                                        <td><input type="text" name="astNm" value="<?php echo $astNm;?>"></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Aset</td>
                                                        <td>
                                                            <select id="status" name="status">
                                                                <option value="0">Pilih Status Aset</option>
                                                                <option value="MASIH ADA" <?php if($status == "MASIH ADA") echo "SELECTED";?>>MASIH ADA</option>
                                                                <option value="SEDANG DISELENGGARA" <?php if($status == "SEDANG DISELENGGARA") echo "SELECTED";?>>SEDANG DISELENGGARA</option>
                                                                <option value="TIADA" <?php if($status == "TIADA") echo "SELECTED";?>>TIADA</option>
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
