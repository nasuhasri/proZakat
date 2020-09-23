<!DOCTYPE html>
<html lang="en">

    <head>
        <?php include 'header.php'; ?>
    </head>
<?php include 'isi_atas.php'; ?>
                        <!-------------------------------------------------------- Start Coding ------------------------------------------->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Overview</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row m-t-25">
                            <!-- Permintaann Tertangguh -->
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c1">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-time-restore"></i>
                                            </div>
                                            <div class="text">    
                                                <?php
                                                    $conn = OpenCon();
                                                    
                                                    $sql = "SELECT COUNT(mp.kelulusan) AS totalPending
                                                            FROM `mohon_pinjaman` mp
                                                            WHERE mp.kelulusan = 'PENDING'";
                                                    $result = $conn->query($sql);

                                                    if($result-> num_rows > 0) {
                                                        //output data of each row
                                                        while($row = $result->fetch_assoc()){                                        
                                                            //echo "<br>" .$row["totalreject"] . "</br>";
                                                            $pending = $row["totalPending"];
                                                        }
                                                    }                                        
                                                    CloseCon($conn);
                                                ?>                                            
                                                <h2><b><?php echo $pending; ?></b></h2>
                                                <?php echo "<a href=pending_details.php><span><b>Permohonan Tertangguh</b></span></a>" ?>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart1"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Permintaan Selesai -->
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c2">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-check-square"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                    $conn = OpenCon();
                                                    $sql = "SELECT COUNT(mp.kelulusan) AS totalComplete
                                                            FROM `mohon_pinjaman` mp
                                                            WHERE mp.kelulusan = 'DILULUSKAN'";
                                                    $result = $conn->query($sql);

                                                    if($result-> num_rows > 0) {
                                                        //output data of each row
                                                        while($row = $result->fetch_assoc()){                                        
                                                            //echo "<br>" .$row["totalreject"] . "</br>";
                                                            $complete = $row["totalComplete"];
                                                        }
                                                    }                                        
                                                    CloseCon($conn);
                                                ?>                                            
                                                <h2><b><?php echo $complete; ?></b></h2>
                                                <?php echo "<a href=completed_details.php><span><b>Permohonan Selesai</b></span></a>" ?>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart2"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Permintaan Ditolak -->
                            <div class="col-sm-6 col-lg-6">
                              <div class="overview-item overview-item--c3">
                                <div class="overview__inner">
                                  <div class="overview-box clearfix">
                                    <div class="icon">
                                        <i class="zmdi zmdi-minus-circle"></i>
                                    </div>
                                    <div class="text">
                                      <?php
                                          $conn = OpenCon();
                                          $sql = "SELECT COUNT(mp.kelulusan) AS totalReject
                                                  FROM `mohon_pinjaman` mp
                                                  WHERE mp.kelulusan = 'DIBATALKAN'
                                                  OR mp.kelulusan = 'DIBATALKAN USER'";
                                          $result = $conn->query($sql);

                                          if($result-> num_rows > 0) {
                                              //output data of each row
                                              while($row = $result->fetch_assoc()){  
                                                  $reject = $row["totalReject"];
                                              }
                                          }                                        
                                          CloseCon($conn);
                                      ?>                                  
                                      <h2><b><?php echo $reject; ?></b></h2>
                                      <?php echo "<a href=rejected_details.php><span><b>Permohonan Ditolak</b></span></a>" ?>
                                    </div>
                                  </div>
                                  <div class="overview-chart">
                                      <canvas id="widgetChart3"></canvas>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- Aset Diselenggara -->
                            <div class="col-sm-6 col-lg-6">
                                <div class="overview-item overview-item--c4">
                                    <div class="overview__inner">
                                        <div class="overview-box clearfix">
                                            <div class="icon">
                                                <i class="zmdi zmdi-info"></i>
                                            </div>
                                            <div class="text">
                                                <?php
                                                    $conn = OpenCon();
                                                    $sql = "SELECT COUNT(km.penyelenggaraan) AS maintenance
                                                            FROM `km_asset` km
                                                            WHERE km.penyelenggaraan = 'SEDANG DISELENGGARA'";
                                                    $result = $conn->query($sql);

                                                    if($result-> num_rows > 0) {
                                                        //output data of each row
                                                        while($row = $result->fetch_assoc()){  
                                                            $maintenance = $row["maintenance"];
                                                        }
                                                    }                                        
                                                    CloseCon($conn);
                                                ?>                                  
                                                <h2><b><?php echo $maintenance; ?></b></h2>
                                                <?php echo "<a href=aset_selenggara.php><span><b>Aset Diselenggara</b></span></a>" ?>
                                            </div>
                                        </div>
                                        <div class="overview-chart">
                                            <canvas id="widgetChart4"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!------------------------------------------------------- End of coding -------------------------------------------->
<?php include 'isi_bawah.php'; ?>                    

</html>
<!-- end document-->
