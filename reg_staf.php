<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Form untuk tambah staf baru -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Daftar Staf Baharu</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <p>Sila Isi Maklumat Di Bawah: </p>
                            </div>
                            <div class="card-body">
                                <form action="reg_staf_action.php" id="form" method="POST">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Nama Staf</td>
                                        <td><input type="text" name="stfNm" maxlength="250" placeholder="Nasuha Asri"></td>
                                    </tr>
                                    <tr>
                                        <td>Nombor Telefon</td>
                                        <td><input type="text" name="stfHP" maxlength="150" placeholder="01156966484"></td>
                                    </tr>
                                    <tr>
                                        <td>Email</td>
                                        <td><input type="email" name="email" maxlength="150" placeholder="nasuhasri00@gmail.com"></td>
                                    </tr>
                                    <tr>
                                        <td>Username</td>
                                        <td><input type="text" name="uname" maxlength="150" placeholder="nasuhasri"></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="card-footer">                                        
                                <button type="reset" class="btn btn-danger btn-md">
                                    <i class="fa fa-ban"></i> Reset
                                </button>
                                <button type="submit" class="btn btn-success btn-md">
                                    <i class="fa fa-send"></i> Hantar
                                </button>
                            </div>
                        </div>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
