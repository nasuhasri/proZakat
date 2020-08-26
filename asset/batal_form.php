<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <div class="row">
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Borang Batal Permohonan</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form name='batalForm' action="batal_action.php" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <!-- Permohonan ID -->
                                        <?php $mohonID = $_GET["bookingID"]; ?>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Permohonan ID</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" name="mohonID" value="<?php echo $mohonID; ?>" readonly></td>
                                            </div>
                                        </div>

                                        <!-- Tulis sebab pembatalan -->
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="textarea-input" class=" form-control-label">Tujuan</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <textarea name="sebab" id="sebab" rows="9" placeholder="Sila tulis sebab pembatalan..." class="form-control" required></textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="card-footer">                                        
                                        <button type="reset" class="btn btn-danger btn-md" onclick="history.back()">
                                            <i class="fa fa-history"></i> Kembali
                                        </button>
                                        <button type="submit" class="btn btn-success btn-md">
                                            <i class="fa fa-send"></i> Hantar
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
