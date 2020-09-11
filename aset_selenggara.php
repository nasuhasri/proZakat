<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- *********************************************** Start Coding **********************************************-->
                        <div class="user-data m-b-30">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>Aset Diselenggara</h3>
                            <div class="table-responsive" id="tableAset">
                                <table class="table">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Kod Aset</th>
                                            <th>Nama Aset</th>
                                            <th>Status Aset</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $conn = OpenCon();

                                            $sql = "SELECT * FROM `km_asset` k
                                                    WHERE k.penyelenggaraan = 'SEDANG DISELENGGARA'";

                                            $result = $conn ->query($sql);

                                            if($result-> num_rows > 0) {
                                                //output data of each row
                                                $no = 1;
                                                while($row = $result->fetch_assoc()){

                                                    $astNm = $row["assetName"];
                                                    $astCode = $row["assetCode"];
                                                    $status = $row["penyelenggaraan"];

                                                    ?>
                                                        <tr>
                                                            <td> <?php echo $no++; ?> </td>
                                                            <td> <?php echo $astCode; ?> </td>
                                                            <td> <?php echo $astNm; ?> </td>
                                                            <td> <span class="badge badge-warning"><?php echo $status; ?></span></td>
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
                        <!-- *********************************************** End of coding *********************************************-->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
