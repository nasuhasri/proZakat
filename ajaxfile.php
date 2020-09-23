<?php
include "connPZM.php";
$conn = OpenCon();

$response = '';

if(isset($_POST["userid"])) {
    $userid = $_POST["userid"];
    $conn = OpenCon();
    $sql = "SELECT * FROM `profil_staff` p
            WHERE p.staffID = $userid";
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $staffName = $row['staffName'];
            $dept = $row['dept'];
            $staffHP = $row['staffHP'];
            
            $response .= "<tr>";
            $response .= "<td>Name : </td><td>".$staffName."</td>";
            $response .= "</tr>";

            $response .= "<tr>";
            $response .= "<td>Salary : </td><td>".$dept."</td>";
            $response .= "</tr>";

            $response .= "<tr>";
            $response .= "<td>Gender : </td><td>".$staffHP."</td>";
            $response .= "</tr>";
        }
    }
    
}

$response .= "</table>";
echo $response;
exit;