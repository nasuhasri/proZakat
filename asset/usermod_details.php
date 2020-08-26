<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <style>
        .table-responsive{
            text-align: center;
            font-size: large;
            color: black;
        }
    </style>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- *********************************************** Start Coding **********************************************-->
                        <?php
                            $conn = OpenCon();

                            /**Value login_user coming from login_action.php**/
                            $username = $_SESSION['login_user'];
                            
                            $umodID = $_GET["userModID"];

                            $sql = "SELECT * FROM `profil_staff` p
                                    WHERE p.staffID = '$umodID'";
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
                                            <div class="table-responsive" id="tableAset">
                                                <table class="table">
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
                                                        <td colspan="2" align="center">
                                                            <button type="button" class="btn btn-danger" value="Back" onclick="history.back()">
                                                                <i class="fa fa-undo"></i>&nbsp; Kembali</button>
                                                        </td>
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
                        <!-- *********************************************** End of coding *********************************************-->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
