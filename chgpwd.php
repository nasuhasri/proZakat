<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
    <script>
        function validatePassword() {
            var curpwd, newpwd, confirmpwd, output = true;

            curpwd = document.frmChange.curpwd;
            newpwd = document.frmChange.newpwd;
            confirmpwd = document.frmChange.confirmpwd;

            if(!curpwd.value) {
                document.getElementById("curpwd").focus();
                output = false;
            }
            else if(!newpwd.value) {
                document.getElementById("newpwd").focus();
                output = false;
            }
            else if(!confirmpwd.value) {
                document.getElementById("confirmpwd").focus();
                output = false;
            }

            if(newpwd.value != confirmpwd.value) {
                newpwd.value="";
                confirmpwd.value="";
                document.getElementById("newpwd").focus();                        
                alert("Kata Laluan Yang Anda Masukkan Tidak Sama!"); 
                output = false;
            } 	
            return output;
        }
    </script>
    <style>
        .card-body{
            color: black;
        }
    </style>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- /***************************************** Start Coding *************************************************\ -->
                        <!-- User can change password here -->
                        <div class="col-md-12">
                            <div class="overview-wrap">
                                <h2 class="title-1">Ubah Kata Laluan</h2>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Borang Ubah Kata Laluan</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form name="frmChange" method="POST" action="chgpwd_action.php" onsubmit="return (validatePassword())">
                                            <div class="form-group">
                                                <label for="nf-password" class=" form-control-label">Kata Laluan Asal</label>
                                                <input type="password" id="curpwd" name="curpwd" placeholder="Masukkan kata laluan asal.." class="form-control" required>
                                                <!-- <span class="help-block">Please enter your email</span> -->
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-password" class=" form-control-label">Kata Laluan Baharu</label>
                                                <input type="password" id="newpwd" name="newpwd" placeholder="Masukkan kata laluan baharu.." class="form-control" required>
                                            </div>
                                            <div class="form-group">
                                                <label for="nf-password" class=" form-control-label">Sahkan Kata Laluan</label>
                                                <input type="password" id="confirmpwd" name="confirmpwd" placeholder="Masukkan kata laluan sekali lagi.." class="form-control" required>
                                            </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="reset" class="btn btn-danger btn-md">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                        <button type="submit" class="btn btn-success btn-md">
                                            <i class="fa fa-send"></i> Submit
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
