<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'header.php'; ?>
        <script type="text/javascript">
            function confirmBatal(mohonID){
                if(confirm('Adakah Anda Ingin Membatalkan Permohonan?'))
                {
                    window.location.href= 'batal_form.php?bookingID=' + mohonID;
                }
            }
        </script>
        <style>
            .table-responsive{
                color: black;
            }
        </style>
    </head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Display booking information in a table -->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>Senarai Permohonan</h3>
                            <div class="table-responsive" id="tableAset">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Kod Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Tujuan</th>
                                            <th>Tarikh Mohon</th>
                                            <th>Tarikh Dari</th>
                                            <th>Tarikh Hingga</th>
                                            <th>Status Permohonan</th>
                                            <th>Status Pembatalan</th>
                                            <th>Tindakan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conn = OpenCon();
                                            $uname = $_SESSION['login_user'];

                                            $sql = "SELECT * FROM `mohon_pinjaman` mp, `km_asset` k, `profil_staff` p
                                                    WHERE mp.assetID = k.assetId
                                                    AND mp.staffID = p.staffID
                                                    AND p.username = '$uname'
                                                    ORDER BY mp.tarikh_mohon DESC";
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
                                                            <td> <?php echo $tDari; ?> </td>
                                                            <td> <?php echo $tHingga; ?> </td>
                                                            <?php 
                                                                if($status=="DILULUSKAN"){
                                                                    ?><td> <span class="badge badge-success"><?php echo $status; ?></span></td><?php
                                                                }
                                                                else if($status=="PENDING"){
                                                                    ?><td> <span class="badge badge-warning"><?php echo $status; ?></span></td><?php
                                                                }
                                                                else if($status=="DIBATALKAN"){
                                                                    ?><td> <span class="badge badge-danger"><?php echo $status; ?></span></td><?php
                                                                }
                                                                else if($status=="DIBATALKAN USER"){
                                                                    ?><td> <span class="badge badge-danger"><?php echo $status; ?></span></td><?php
                                                                }
                                                            ?>
                                                            <?php 
                                                                if($batal=="YA"){
                                                                    ?><td> <span class="badge badge-danger"><?php echo $batal; ?></span></td><?php
                                                                }
                                                                else if($batal=="TIDAK"){
                                                                    ?><td> <span class="badge badge-success"><?php echo $batal; ?></span></td><?php
                                                                }
                                                            ?>
                                                            <?php
                                                                if($status == "PENDING"){
                                                                    ?>
                                                                    <td>
                                                                        <button type="button" class="btn btn-primary" onclick="window.location.href= 'update_booking.php?bookingID=<?php echo $mohonID ?>'">
                                                                            <i class="fa fa-trash"></i>&nbsp; Kemaskini
                                                                        </button>
                                                                        <button type="button" class="btn btn-danger" onclick="confirmBatal('<?php echo $mohonID ?>')">
                                                                            <i class="fa fa-trash"></i>&nbsp; Batalkan
                                                                        </button>
                                                                    </td>
                                                                    <?php
                                                                }
                                                                else{
                                                                    ?><td> - - </td><?php
                                                                }
                                                            ?>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else {
                                                echo "<p>Permohonan Belum Dilakukan.</p>";
                                            }

                                            CloseCon($conn);
                                        ?>

                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                        
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    

</html>
<!-- end document-->
