<?php include("kepala.php"); ?>
<?php include("menu.php"); ?>                     
<?php include("isi_atas.php"); ?>    
 <div class="row">
<div class="col-lg-12">         
<!-- ////////////////////////////////////////////////mula coding//////////////////////////////////////////////  -->                   

<div class="container-fluid">

<!-- <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead>
                <tr>
                    <th>date</th>
                    <th>type</th>
                    <th>description</th>
                    <th>status</th>
                    <th>price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2018-09-22 00:43</td>
                    <td>Computer</td>
                    <td>Macbook Pro Retina 2017</td>
                    <td class="process">Processed</td>
                    <td>$10.00</td>
                </tr>
            </tbody>
        </table>
    </div> -->

    <div class="table-responsive m-b-40">
        <table class="table table-borderless table-data3">
            <thead class="thead-dark">
                <tr>
                    <th>Asset ID</th>
                    <th>Asset Code</th>
                    <th>Asset Name</th>
                    <th>Penyelenggaraan</th>
                </tr>
            </thead>
        <tbody>
            <?php
                $conn = OpenCon();

                $sql = "SELECT * FROM `km_asset`";
                $result = $conn ->query($sql);

                if($result-> num_rows > 0) {
                    //output data of each row
                    while($row = $result->fetch_assoc()){

                        $assetID = $row["assetID"];
                        $assetCode = $row["assetCode"];
                        $assetName = $row["assetName"];
                        $penyelenggaraan =$row["penyelenggaraan"];

                        echo "<tr>";
                            echo "<td>$assetID</td>";
                            echo "<td>$assetCode</td>";
                            echo "<td>$assetName</td>";
                            echo "<td>$penyelenggaraan</td>";
                        echo "</tr>";
                    }
                }
                else {
                    echo "Error in fetching data";
                }

                CloseCon($conn);
            ?>
        </tbody>
        </table>
    </div>
</div>                              

<!-- //////////////////////////////////////////////////tamat coding//////////////////////////////////////////////////  -->   
</div>                                                         
</div>                                         
<?php include("isi_bawah.php"); ?>               
<?php include("ekor.php"); ?>    
