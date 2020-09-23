<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <script type="text/javascript">
        function confirmCancel(mohonID)
        {
            if(confirm('Adakah Anda Ingin Membatalkan Permohonan Ini?')){
                window.location.href= 'reject_booking.php?bookingID=' + mohonID;
            }
        }
    </script>
</head>
<?php include 'isi_atas.php'; ?>
                        <!---------------------------------------------------- Start Coding -------------------------------------------------->
                        <!-- Display booking information -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Senarai Permohonan</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <strong class="card-title">
                                            <li>Nota Penting: </li>
                                            <li>Default value tarikh lulus adalah tarikh permohonan dilakukan</li>
                                        </strong>
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
                                                <th>Kod Aset</th>
                                                <th>Kuantiti Aset</th>
                                                <th>Tujuan</th>
                                                <th>Tarikh Dari</th>
                                                <th>Tarikh Hingga</th>
                                                <th>Tarikh Mohon</th>
                                                <th>Status Permohonan</th>
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
                                                        $tDari = $row["tarikh_dari"];
                                                        $tHingga = $row["tarikh_hingga"];
                                                        $tMohon =$row["tarikh_mohon"];
                                                        $tujuan = $row["tujuan"];
                                                        $status = $row["kelulusan"];
                                                        $astNm = $row["assetName"];
                                                        $astCode = $row["assetCode"];
                                                        $qtyNeeded = $row["qtyUser"];  
                                                        $availableQty = $row["quantity"]; 

                                                        ?>
                                                            <tr>
                                                                <td> <?php echo $no++; ?> </td>
                                                                <td> <?php echo $astNm; ?> </td>
                                                                <td> <?php echo $astCode; ?> </td>
                                                                <td> <?php echo $qtyNeeded; ?> </td>
                                                                <td> <?php echo $tujuan; ?> </td>
                                                                <td> <?php echo $tDari; ?> </td>
                                                                <td> <?php echo $tHingga; ?> </td>
                                                                <td> <?php echo $tMohon; ?> </td>
                                                                
                                                                <!-- Status Permohonanan -->
                                                                <?php 
                                                                  if($status=="DILULUSKAN"){
                                                                      ?><td> <span class="badge badge-success"><?php echo $status; ?></span></td><?php
                                                                  }
                                                                  else if($status=="PENDING"){
                                                                      ?><td> <span class="badge badge-warning"><?php echo $status; ?></span></td><?php
                                                                  }
                                                                  else if($status=="DIBATALKAN" || $status=="DIBATALKAN USER"){
                                                                      ?><td> <span class="badge badge-danger"><?php echo $status; ?></span></td><?php
                                                                  }
                                                                ?>
                                                                
                                                                <!-- Button Tindakan -->
                                                                <?php
                                                                if($status == "PENDING"){
                                                                    if($qtyNeeded <= $availableQty){
                                                                        ?>
                                                                        <td>
                                                                            <button type="button" class="btn btn-success" onclick="window.location.href= 'approve_booking.php?bookingID=<?php echo $mohonID ?>' ">
                                                                                <i class="fa fa-edit"></i>&nbsp; Luluskan
                                                                            </button>
                                                                            
                                                                            <button type="button" class="btn btn-danger" onclick="window.location.href= 'reject_booking.php?bookingID=<?php echo $mohonID ?>'">
                                                                                <i class="fa fa-trash"></i>&nbsp; Batalkan
                                                                            </button>
                                                                        </td>
                                                                        <?php
                                                                    }
                                                                    else{
                                                                        ?>
                                                                        <td><button type="button" class="btn btn-success" data-toggle="modal" data-target="#booking_overload">
                                                                            <i class="fa fa-edit"></i>&nbsp; Luluskan
                                                                            </button>
                                                                            <button type="button" class="btn btn-danger" onclick="confirmCancel('<?php echo $mohonID ?>')">
                                                                                <i class="fa fa-trash"></i>&nbsp; Batalkan
                                                                            </button>
                                                                        </td>
                                                                        <?php
                                                                    }
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
                                                    echo "Error in fetching data";
                                                }

                                                CloseCon($conn);
                                            ?>

                                        </tbody>      
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
