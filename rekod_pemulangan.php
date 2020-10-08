<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!--------------------------------------------- Start Coding ------------------------------------------------->
                        <!-- Display booking information -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Rekod Pemulangan</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <strong class="card-title"></strong>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table--no-card m-b-30">
                                <!-- class="table table-borderless table-data3" -->
                                    <table class="table table-bordered" id="bookingTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Aset</th>
                                                <th>Kuantiti Aset</th>
                                                <th>Tujuan</th>
                                                <th>Tarikh Dari</th>
                                                <th>Status Pemulangan</th>
                                                <th>Tarikh Pemulangan</th>
                                                <th>Pegawai Penerima</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conn = OpenCon();

                                                $sql = "SELECT * FROM `mohon_pinjaman` mp, `km_asset` k
                                                        WHERE mp.assetID = k.assetId
                                                        ORDER BY mp.tarikh_mohon DESC";
                                                $result = $conn ->query($sql);

                                                $no = 1;

                                                if($result-> num_rows > 0) {
                                                    //output data of each row

                                                    while($row = $result->fetch_assoc()){
                                                        
                                                        $mohonID = $row["mohonID"];
                                                        $tDari =$row["tarikh_dari"];
                                                        $tujuan = $row["tujuan"];
                                                        $pulang = $row["pemulangan"];
                                                        $astNm = $row["assetName"];
                                                        $qtyNeeded = $row["qtyUser"];    
                                                        $tPulang = $row["tarikh_pulang"]; 
                                                        $stfID = $row["penerima"];
                                                        $status = $row["kelulusan"];

                                                        ?>
                                                            <tr>
                                                                <td> <?php echo $no++; ?> </td>
                                                                <td> <?php echo $astNm; ?> </td>
                                                                <td> <?php echo $qtyNeeded; ?> </td>
                                                                <td> <?php echo $tujuan; ?> </td>
                                                                <td> <?php echo $tDari; ?> </td>
                                                                
                                                                <!-- Status Pemulangan -->
                                                                <?php 
                                                                    if($pulang=="SUDAH DIPULANGKAN"){
                                                                        ?><td> <span class="badge badge-success"><?php echo $pulang; ?></span></td><?php
                                                                    }
                                                                    else if($pulang=="BELUM DIPULANGKAN"){
                                                                        ?><td> <span class="badge badge-warning"><?php echo $pulang; ?></span></td><?php
                                                                    }
                                                                    else if($pulang=="PERMOHONAN BATAL"){
                                                                        ?><td> <span class="badge badge-danger"><?php echo $pulang; ?></span></td><?php
                                                                    }
                                                                ?>
                                                                
                                                                <!-- Tarikh Pulang -->
                                                                <td> <?php echo $tPulang; ?> </td>

                                                                <!-- Pegawai Yang Menerima -->
                                                                <?php
                                                                    if($stfID == 100){
                                                                        ?><td><a href="#" class="my_link" data-toggle="modal" data-target="#stafModal" data-val="100">
                                                                          100
                                                                        </a></td><?php
                                                                    }
                                                                    else{
                                                                        ?><td><a href="staff_details.php?userModID=<?php echo $stfID ?>"><?php echo $stfID ?></a></td><?php
                                                                    }
                                                                ?>

                                                                <!-- Button Tindakan -->
                                                                <?php
                                                                if($status == "DILULUSKAN") {
                                                                    if($pulang == "BELUM DIPULANGKAN") {
                                                                    ?>
                                                                    <td>
                                                                        <button type="button" class="btn btn-success" onclick="window.location.href= 'update_status_pulang.php?bookingID=<?php echo $mohonID ?>' ">
                                                                            <i class="fa fa-edit"></i>&nbsp; SUDAH DIPULANGKAN
                                                                        </button>
                                                                    </td>
                                                                    <?php  
                                                                    } else {
                                                                        ?><td> -- </td><?php
                                                                    } 
                                                                } else{
                                                                    ?><td> -- </td><?php
                                                                }
                                                                ?>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                                else {
                                                    echo "Error in fetching data";
                                                }

                                                CloseCon($conn);
                                            ?>

                                        </tbody>      
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!------------------------------------------------------ End of coding --------------------------------------->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
