<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <script type="text/javascript">
        function confirmDelete(mohonID)
        {
            if(confirm('Adakah Anda Ingin Menghapuskan Permohonan Ini?'))
            {
                window.location.href= 'delete_pending_mohon.php?mohonID=' + mohonID;
            }
        }
    </script>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>Permohonan Tertangguh</h3>
                            <div class="table-responsive" id="tableAset">
                                <table class="table">
                                    <?php
                                        $conn = OpenCon();
                                        $uname = $_SESSION['login_user'];

                                        $sqlLevel = "SELECT p.level FROM `profil_staff` p
                                                    WHERE p.username = '$uname'";
                                        $resultLevel = $conn->query($sqlLevel);

                                        if($resultLevel -> num_rows > 0){
                                            while($row = $resultLevel->fetch_assoc()){
                                                $level = $row['level'];
                                            }
                                        }

                                        if($level == 'ADMIN'){
                                            $sql = "SELECT * FROM `mohon_pinjaman` mp, `km_asset` k, `profil_staff` p
                                                    WHERE mp.assetID = k.assetId
                                                    AND mp.staffID = p.staffID
                                                    AND mp.kelulusan = 'PENDING'
                                                    ORDER BY mp.tarikh_mohon DESC";
                                        }
                                        else{
                                            $sql = "SELECT * FROM `mohon_pinjaman` mp, `km_asset` k, `profil_staff` p
                                                    WHERE mp.assetID = k.assetId
                                                    AND mp.staffID = p.staffID
                                                    AND p.username = '$uname'
                                                    AND mp.kelulusan = 'PENDING'
                                                    ORDER BY mp.tarikh_mohon DESC";
                                        }
                                    ?>
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Kod Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Tujuan</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Status Permohonan</th>
                                            <?php if($level == 'ADMIN'){
                                                ?><th>Tindakan</th><?php
                                            }?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php                                            
                                            $result = $conn ->query($sql);

                                            if($result-> num_rows > 0) {
                                                //output data of each row
                                                $no = 1;
                                                while($row = $result->fetch_assoc()){

                                                    $mohonID = $row["mohonID"];
                                                    $astNm = $row["assetName"];
                                                    $astCode = $row["assetCode"]; 
                                                    $tujuan = $row["tujuan"];
                                                    $tDari = $row["tarikh_dari"];
                                                    $tHingga = $row["tarikh_hingga"];
                                                    $tMohon =$row["tarikh_mohon"];
                                                    $status = $row["kelulusan"];        
                                                    $batal = $row["batal"]; 

                                                    ?>
                                                        <tr>
                                                            <td> <?php echo $no++; ?> </td>
                                                            <td> <?php echo $astCode; ?> </td>
                                                            <td> <?php echo $astNm; ?> </td>
                                                            <td> <?php echo $tujuan; ?> </td>
                                                            <td> <?php echo $tMohon; ?> </td>
                                                            <?php 
                                                                if(strcasecmp($status,"DILULUSKAN") == 0){
                                                                    ?><td> <span class="badge badge-success"><?php echo $status; ?></span></td><?php
                                                                }
                                                                else if(strcasecmp($status,"PENDING") == 0){
                                                                    ?><td> <span class="badge badge-warning"><?php echo $status; ?></span></td><?php
                                                                }
                                                                else if(strcasecmp($status,"DIBATALKAN") == 0){
                                                                    ?><td> <span class="badge badge-danger"><?php echo $status; ?></span></td><?php
                                                                }
                                                                else if(strcasecmp($status,"DIBATALKAN USER") == 0){
                                                                    ?><td> <span class="badge badge-danger"><?php echo $status; ?></span></td><?php
                                                                }
                                                            ?>
                                                            <?php if($level == 'ADMIN'){
                                                                ?><td><button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo $mohonID ?>')"> 
                                                                    <i class="fa fa-trash"></i>&nbsp; Hapus
                                                                </button></td><?php
                                                            } ?>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else {
                                                echo "<td><p>Tiada Rekod Yang Dijumpai.</p></td>";
                                            }

                                            CloseCon($conn);
                                        ?>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                        <div class="row">
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td colspan="2" align="center">
                                            <button type="button" class="btn btn-primary" onclick="history.back()">
                                                <i class="fa fa-history"></i>&nbsp; Kembali </button>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
