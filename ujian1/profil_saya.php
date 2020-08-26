<?php include("kepala.php"); ?>
<?php include("menu.php"); ?>                     
<?php include("isi_atas.php"); ?>    
<div class="row">
<div class="col-lg-12">         
<!-- ////////////////////////////////////////////////mula coding//////////////////////////////////////////////  -->
<div class="container-fluid">                   
    <!-- <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Profil Saya</h2>
            </div>
        </div>
    </div> -->
    <?php
        $conn = OpenCon();

        $sql = "SELECT * FROM `profil_staff`";
        $result = $conn ->query($sql);

        if($result-> num_rows > 0) {
            //output data of each row
            while($row = $result->fetch_assoc()){

                $staffID = $row["staffID"];
                $staffName = $row["staffName"];
                $staffHP = $row["staffHP"];
                $staffEmail =$row["staffEmail"];
                $username = $row["username"];
                $password = $row["password"];
                $aktif = $row["aktif"];

                ?>
                    <div class="user-data m-b-30">
                        <h3 class="title-3 m-b-30">
                            <i class="zmdi zmdi-account-calendar"></i>Profil Saya</h3>
                        <div class="table-responsive table-data">
                            <table class="table">
                                <!-- <thead>
                                    <tr>
                                        <td>name</td>
                                        <td>role</td>
                                        <td>type</td>
                                        <td></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                </tbody> -->
                                <tr>
                                    <td>Staff ID</td>
                                    <td><?php echo $staffID; ?></td>
                                </tr>
                                <tr>
                                    <td>Staff Name</td>
                                    <td><?php echo $staffName; ?></td>
                                </tr>
                                <tr>
                                    <td>Mobile Number</td>
                                    <td><?php echo $staffHP; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td><?php echo $staffEmail; ?></td>
                                </tr>
                                <tr>
                                    <td>Username</td>
                                    <td><?php echo $username; ?></td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td><?php echo $password; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                <?php
            }
        }
        else {
            echo "Error in fetching data";
        }

        CloseCon($conn);
    ?>   
    <br>
    <table>
        <tr>
            <td colspan="2" align="center">
                <button type="button" class="btn btn-danger">
                    <i class="fa fa-undo"></i>&nbsp; Kembali</button>
                <button type="button" class="btn btn-primary">
                    <i class="fa fa-edit"></i>&nbsp; Kemaskini</button>
            </td>
        </tr>
    </table>
</div>

<!-- //////////////////////////////////////////////////tamat coding//////////////////////////////////////////////////  -->   
</div>                                                         
</div>                                         
<?php include("isi_bawah.php"); ?>               
<?php include("ekor.php"); ?>    
