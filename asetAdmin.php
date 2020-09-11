<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#dataTables').dataTable( {
                "pagingType": "simple"
            } );
        } );

        function confirmDelete(assetID)
        {
            if(confirm('Adakah Anda Ingin Menghapuskan Rekod Ini?'))
            {
                window.location.href= 'delAset.php?assetID=' + assetID;
            }
        }

        $('#stafModal').on('show.bs.modal', function (event) {
            var myVal = $(event.relatedTarget).data('val');
            $(this).find('.modal-body').text(myVal);
            //$(event.currentTarget).find().val(bookId);
        });
    </script>
    <style>
        .table-responsive{
            color: black;
        }
    </style>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- *********************************************** Start Coding **********************************************-->
                        <!-- Display asset information for admin view -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Senarai Aset</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <strong class="card-title">
                                            <li>Nota: 100 adalah default value</li>
                                            <li>Default value untuk tarikh diselenggara adalah mengikut tarikh aset didaftarkan</li>
                                        </strong>
                                    </div>
                                    <div class="col-md-3 float-right">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='reg_aset.php'">
                                            <i class="fa fa-edit"></i>&nbsp; Tambah Aset Baru
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table--no-card m-b-30">
                                <!-- class="table table-borderless table-data3" -->
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th>ID Aset</th>
                                                <th>Kod Aset</th>
                                                <th>Nama Aset</th>
                                                <th>Status Aset</th>
                                                <th>Kuantiti Aset</th>
                                                <th>Admin Modifikasi</th>
                                                <th>Tarikh Akhir Diselenggara</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conn=OpenCon();

                                                $sql = "SELECT * FROM `km_asset` k
                                                        ORDER BY k.penyelenggaraan";
                                                $result = $conn->query($sql);

                                                if($result->num_rows > 0){
                                                    while($row=$result->fetch_assoc()){
                                                        $astID = $row["assetID"];
                                                        $astCode = $row["assetCode"];
                                                        $astNm = $row["assetName"];
                                                        $status = $row["penyelenggaraan"];
                                                        $uID = $row["userModID"];
                                                        $dateMod = $row["dateMod"];
                                                        $qtyAset = $row["quantity"];

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $astID ?> </td>
                                                                <td><?php echo $astCode ?> </td>
                                                                <td><?php echo $astNm ?> </td>

                                                                <?php 
                                                                    if($status=="MASIH ADA"){
                                                                        ?><td> <span class="badge badge-success"><?php echo $status; ?></span></td><?php
                                                                    }
                                                                    else if($status=="SEDANG DISELENGGARA"){
                                                                        ?><td> <span class="badge badge-warning"><?php echo $status; ?></span></td><?php
                                                                    }
                                                                    else if($status=="TIADA"){
                                                                        ?><td> <span class="badge badge-danger"><?php echo $status; ?></span></td><?php
                                                                    }
                                                                ?>

                                                                <td><?php echo $qtyAset ?></td>
                                                                <!-- <td><a href="staff_details.php?userModID=</?php echo $uID ?>"></?php echo $uID ?></a></td> -->
                                                                <?php
                                                                    if($uID == 100){
                                                                        ?><td><a href="#" class="my_link" data-toggle="modal" data-target="#stafModal" data-val="100">
                                                                          100
                                                                        </a></td><?php
                                                                    }
                                                                    else{
                                                                        ?><td><a href="staff_details.php?userModID=<?php echo $uID ?>"><?php echo $uID ?></a></td><?php
                                                                    }
                                                                ?>
                                                                <td><?php echo $dateMod ?> </td>

                                                                <td>
                                                                    <button type="button" class="btn btn-primary" onclick="window.location.href= 'update_aset.php?assetID=<?php echo $astID ?>' ">
                                                                        <i class="fa fa-edit"></i>&nbsp; Kemaskini
                                                                    </button>
                                                                    
                                                                    <button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo $astID ?>')">
                                                                        <i class="fa fa-trash"></i>&nbsp; Hapus
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- *********************************************** End of coding *********************************************-->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
