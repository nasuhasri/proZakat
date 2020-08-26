<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'header.php'; ?>
    </head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Display asset information -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Senarai Aset</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="table-responsive table--no-card m-b-30">
                            <table class="table table-borderless table-striped table-earning">
                                <thead>
                                    <tr>
                                        <th>Kod Aset</th>
                                        <th>Nama Aset</th>
                                        <th>Status Aset</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        $conn=OpenCon();

                                        $sql = "SELECT * FROM `km_asset` k";
                                        $result = $conn->query($sql);

                                        if($result->num_rows > 0){
                                            while($row=$result->fetch_assoc()){
                                                $astCode = $row["assetCode"];
                                                $astNm = $row["assetName"];
                                                $maintenance = $row["penyelenggaraan"];

                                                ?>
                                                    <tr>
                                                        <td><?php echo $astCode ?> </td>
                                                        <td><?php echo $astNm ?> </td>
                                                        <?php 
                                                            if($maintenance=="MASIH ADA"){
                                                                ?><td> <medium><span class="badge badge-success"><?php echo $maintenance; ?></span></medium></td><?php
                                                            }
                                                            else if($maintenance=="SEDANG DISELENGGARA"){
                                                                ?><td> <medium><span class="badge badge-warning"><?php echo $maintenance; ?></span></medium></td><?php
                                                            }
                                                            else if($maintenance=="TIADA"){
                                                                ?><td> <medium><span class="badge badge-danger"><?php echo $maintenance; ?></span></medium></td><?php
                                                            }
                                                        ?>
                                                    </tr>
                                                <?php
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    

</html>
<!-- end document-->
