?>
<table class="table table-borderless table-striped table-earning">
    <tr>
        <td> Permohonan ID </td>
        <td></td>
        <td> <?php echo $mohonID; ?> </td>
    <tr>

    <tr>
        <td> Tarikh Dari </td>
        <td></td>
        <td> <?php $tarikh_dari ?> </td>
    <tr>

    <tr>
        <td> Tarikh Hingga </td>
        <td></td>
        <td> <?php $tarikh_hingga ?> </td>
    <tr>

    <tr>
        <td> Tarikh Mohon </td>
        <td></td>
        <td> <?php $tarikh_mohon ?> </td>
    <tr>

    <tr>
        <td> Tujuan </td>
        <td></td>
        <td> <?php $tujuan ?> </td>
    <tr>

    <tr>
        <td> Status Permohonan </td>
        <td></td>
        <td> <?php $kelulusan ?> </td>
    <tr>
</table>
<?php



?>
<div class="col-md-4">
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Booking Details
                <medium>
                    <span class="badge badge-success float-right mt-1">Success</span>
                </medium>
            </strong>
        </div>
        <div class="card-body">
            <p class="card-text">
                Here is your booking details: 
            </p>
            <?php
                $conn = OpenCon();
                $sql1 = "SELECT * FROM `mohon_pinjaman` mp
                        WHERE mp.mohonID = $mohonID";
                
                $result1 = $conn->query($sql1);
                
                if ($result1->num_rows > 0) {
                    //output data of each row
                                        
                    while($row = $result->fetch_assoc()){
                                                
                        $mohonID = $row["mohonID"];
                        $tarikh_dari = $row["tarikh_dari"];
                        $tarikh_hingga = $row["tarikh_hingga"];
                        $tarikh_mohon = $row["tarikh_mohon"];
                        $tujuan = $row["tujuan"];
                        $kelulusan = $row["kelulusan"];

                        echo "<table>";
                            echo "<tr>";
                                echo "<td> Permohonan ID </td>";
                                echo "<td></td>";
                                echo "<td> $mohonID </td>";
                            echo "<tr>";

                            echo "<tr>";
                                echo "<td> Tarikh Dari </td>";
                                echo "<td></td>";
                                echo "<td> $tarikh_dari </td>";
                            echo "<tr>";

                            echo "<tr>";
                                echo "<td> Tarikh Hingga </td>";
                                echo "<td></td>";
                                echo "<td> $tarikh_hingga </td>";
                            echo "<tr>";

                            echo "<tr>";
                                echo "<td> Tarikh Mohon </td>";
                                echo "<td></td>";
                                echo "<td> $tarikh_mohon </td>";
                            echo "<tr>";

                            echo "<tr>";
                                echo "<td> Tujuan </td>";
                                echo "<td></td>";
                                echo "<td> $tujuan </td>";
                            echo "<tr>";

                            echo "<tr>";
                                echo "<td> Status Permohonan </td>";
                                echo "<td></td>";
                                echo "<td> $kelulusan </td>";
                            echo "<tr>";

                        echo "</table>";
                    }
                }
                else {
                    echo "Order cannot been displayed!";
                }
            ?>
        </div>
    </div>
    

			<htmlpageheader name='MyCustomHeader'>
				<table style='border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;' width='100%'>
					<tbody>
						<tr>
							<td width='50%'>Title</td>
							<td style='text-align: right; font-weight: bold;' width='50%'>Logo</td>
						</tr>
					</tbody>
				</table>
			</htmlpageheader>
</div>
<?php


?>
    <div class="user-data m-b-30">
        <h3 class="title-3 m-b-30">
            <i class="zmdi zmdi-account-calendar"></i>Profil Staf</h3>
        <div class="table-responsive" id="tableAset">
            <table class="table">
                <tr>
                    <td>Nama Staf</td>
                    <td><?php echo $stfNm; ?></td>
                </tr>
                <tr>
                    <td>Nombor Telefon</td>
                    <td><?php echo $stfHP; ?></td>
                </tr>
                <tr>
                    <td>Emel</td>
                    <td><?php echo $email; ?></td>
                </tr>
                <tr>
                    <td>Username</td>
                    <td><?php echo $uname; ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php