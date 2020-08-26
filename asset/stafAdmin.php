<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <script type="text/javascript">
        function confirmDelete(staffID)
        {
            if(confirm('Are You Sure You Want To Delete This Record?'))
            {
                window.location.href= 'delStaf.php?staffID=' + staffID;
            }
        }
    </script>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Display staff information -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Senarai Staf</h2>
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
                                    <div class="col-md-3 float-right">
                                        <button type="button" class="btn btn-primary" onclick="window.location.href='reg_staf.php'">
                                            <i class="fa fa-edit"></i>&nbsp; Tambah Staf Baru
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
                                                <th>ID Staf</th>
                                                <th>Nama Staf</th>
                                                <th>Nombor Telefon</th>
                                                <th>Emel</th>
                                                <th>Status Staf</th>
                                                <th>Level</th>
                                                <th>Tindakan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                                $conn=OpenCon();

                                                $sql = "SELECT * FROM `profil_staff` p";
                                                $result = $conn->query($sql);

                                                if($result->num_rows > 0){
                                                    while($row=$result->fetch_assoc()){
                                                        $stfID = $row["staffID"];
                                                        $stfNm = $row["staffName"];
                                                        $stfHP = $row["staffHP"];
                                                        $stfEmail = $row["staffEmail"];
                                                        // $uname = $row["username"];
                                                        // $pwd = $row["password"];
                                                        $status = $row["aktif"];
                                                        $level = $row["level"];

                                                        ?>
                                                            <tr>
                                                                <td><?php echo $stfID ?> </td>
                                                                <td><?php echo $stfNm ?> </td>
                                                                <td><?php echo $stfHP ?> </td>
                                                                <td><?php echo $stfEmail ?> </td>
                                                                <td><?php echo $status ?> </td>
                                                                <td><?php echo $level ?> </td>
                                                                <td>
                                                                    <button type="button" class="btn btn-primary" onclick="window.location.href= 'update_staf.php?staffID=<?php echo $stfID ?>' ">
                                                                        <i class="fa fa-edit"></i>&nbsp; Kemaskini
                                                                    </button>
                                                                    
                                                                    <button type="button" class="btn btn-danger" onclick="confirmDelete('<?php echo $stfID ?>')">
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
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
