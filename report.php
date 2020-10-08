<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- *********************************************** Start Coding **********************************************-->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="overview-wrap">
                                    <h2 class="title-1">Ringkasan Laporan</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
								<div class="card mt-4">
									<div class="card-header">
										<h4>Laporan Harian Aset PZM</h4>
									</div>
									<div class="card-body">
										<p class="text-muted m-b-15">
                                            Laporan Harian Aset adalah laporan di mana admin boleh mengetahui jumlah permohonan
                                            yang dibuat oleh staf Zakat Melaka mengikut tarikh yang dipilih.
                                        </p>

                                        <form action="report_aset.php" rel="nofollow" target="_blank" method="post" enctype="multipart/form-data" class="form-horizontal">
                                        <br>
                                        <!-- Pilih Tarikh Dari -->
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class="form-control-label">Tarikh Dari</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="date" id="tarikh-dari" name="tarikh-dari" class="form-control" required>
                                                <small class="form-text text-muted">Pilih tarikh dari bila</small>
                                            </div>
                                        </div>

                                        <!-- Pilih Tarikh Hingga -->
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="text-input" class="form-control-label">Tarikh Hingga</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="date" id="tarikh-hingga" name="tarikh-hingga" class="form-control" required>
                                                <small class="form-text text-muted">Pilih tarikh sampai bila</small>
                                            </div>
                                        </div>

                                        <br>
                                        <div class="row form-group">
                                            <div class="col col-md-9">
                                                <button type="submit" class="btn btn-success btn-md">Papar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">                                
                                <div class="card mt-4">
                                    <div class="card-header">
                                        <h4>Laporan Ringkas Permohonan Aset PZM</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="text-muted m-b-15">
                                            Laporan Ringkas Permohonan Aset PZM adalah laporan di mana admin boleh mengetahui jumlah permohonan
                                            yang dibuat oleh staf Zakat Melaka mengikut bulan dan tahun serta kekerapan aset dipinjam.
                                        </p>
										<ul class="list-unstyled">
											<li><a href="report_jumlah_permohonan.php" rel="nofollow" target="_blank">Cetak Laporan Ringkas Permohonan Aset PZM</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- *********************************************** End of coding *********************************************-->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
