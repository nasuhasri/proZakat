<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <!-- Form untuk tambah aset baru -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Daftar Aset Baharu</h2>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                            <div class="card-header">
                                <p>Sila Isi Maklumat Di Bawah: </p>
                            </div>
                            <div class="card-body">
                                <form action="reg_aset_action.php" id="form" method="POST">
                                <table class="table table-borderless">
                                    <tr>
                                        <td>Kod Aset</td>
                                        <td><input type="text" name="astCode" maxlength="50" placeholder="HP101" required></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Aset</td>
                                        <td><input type="text" name="astNm" maxlength="200" placeholder="Laptop HP 15-da0xx" required></td>
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
