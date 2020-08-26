<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'header.php'; ?>
        <script type="text/javascript">
            /* Function to validate the form */
            function validateForm(){
                var assetID =  document.forms["bookingForm"]["assetID"];

                if (assetID.selectedIndex < 1)                  
                { 
                    alert("Sila Pilih Aset"); 
                    assetID.focus(); 
                    return false;
                }

                return true;
            }
            /* End function to validate the form */
        </script>
        <style>
            .card-footer{
                text-align: center;
            }
        </style>
    </head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Permohonan Baru</h2>
                                </div>
                            </div>
                            <br><br>
                            <div class="col-lg-10">
                                <div class="card">
                                    <div class="card-header">
                                        <strong>Borang Pinjam Aset</strong>
                                    </div>
                                    <div class="card-body card-block">
                                        <form name='bookingForm' action="booking_action.php" method="post" enctype="multipart/form-data" class="form-horizontal" onsubmit="return (validateForm())">
                                            <!-- Select Aset -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Pilih Aset</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <!-- Value is assetID -->
                                                    <select name="assetID" id="assetID" class="form-control">
                                                        <option value="0">-- Sila Pilih Aset --</option>
                                                        <?php
                                                            $conn = OpenCon();
                                                            $sql = "SELECT * FROM `km_asset` k
                                                                    WHERE k.penyelenggaraan = 'MASIH ADA'";
                                                            $result = $conn->query($sql);
                            
                                                            while($row = $result->fetch_assoc()) {
                                                                echo "<option value= '". $row['assetID'] ."'>" .$row['assetName']. "</option>";													}
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <!-- Pilih Tarikh -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tarikh Dari</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="tarikh-dari" name="tarikh-dari" class="form-control" required>
                                                    <small class="form-text text-muted">Pilih tarikh dari bila</small>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="text-input" class=" form-control-label">Tarikh Hingga</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="date" id="tarikh-hingga" name="tarikh-hingga" class="form-control" required>
                                                    <small class="form-text text-muted">Pilih tarikh sampai bila</small>
                                                </div>
                                            </div>
                                            
                                            <!-- Tulis tujuan -->
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Tujuan</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="tujuan" id="tujuan" rows="9" placeholder="Sila tulis tujuan pinjaman..." class="form-control" required></textarea>
                                                    <!-- <input type="text" name="fullname" maxlength="50" placeholder="Nasuha Asri" required><br> -->
                                                </div>
                                            </div>
                                        
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
                            </div>
                        </div>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    

</html>
<!-- end document-->
