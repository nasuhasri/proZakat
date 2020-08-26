<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Nama Aset</th>
                                    <th>Permohonan ID</th>
                                    <th>Kelulusan</th>
                                    <th>Tarikh Mohon</th>
                                </tr>
                            </thead>			
                        <?php
                            $searching = $_GET["search"];

                            $conn = OpenCon();

                            //get page number
                            $page = 0;
                            
                            //set variable
                            if(isset($_GET["page"])==true){
                                $page = $_GET["page"];
                            }
                            else{
                                $page = 0;
                            }
                            
                            //algo for pagination in sql
                            if ($page=="" || $page=="1"){
                                $page1 = 0;
                            }
                            else{
                                $page1 = ($page*7)-7;
                            }
                            
                            $sql = "SELECT * FROM `km_asset` k, `mohon_pinjaman` mp
                                    WHERE mp.assetID = k.assetID
                                    AND (mp.mohonID LIKE '%$searching%'
                                    OR k.assetName  LIKE '%$searching%'
                                    OR mp.kelulusan LIKE '%$searching%')
                                    LIMIT $page1,7";
                                
                            $result=$conn->query($sql);
                        
                            if($result->num_rows > 0){
                                while($row=$result->fetch_assoc()){
                                    $astNm =$row["assetName"];
                                    $mohonID = $row["mohonID"];
                                    $kelulusan = $row["kelulusan"];
                                    $tMohon = $row["tarikh_mohon"];								

                                    echo "<tr>";
                                        echo "<td>$astNm</td>";
                                        echo "<td>$mohonID</td>";
                                        echo "<td>$kelulusan</td>";		
                                        echo "<td>$tMohon</td>";				 
                                    echo "</tr>";
                                }																						
                            }
                            else{
                                echo "<td>Sorry! The product that you are searching for is not in our system </td>";
                            }

                            echo "</table>";

                                                       
            
                            CloseCon($conn);
                        ?>
                        <!-- //////////////////////////////////////////End of coding -->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
