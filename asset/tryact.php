<?php

include 'conn.php';
$conn = OpenCon();

echo '<script>console.log('. json_encode($_POST) .')</script>';
if(isset($_POST['submit']))
{
	if(isset($_POST["progn"]))
	{
		$regcert = $_POST["progn"];
	}

	echo $regcert;

	if($regcert == "Sijil Penyertaan")
	{
		$regid = "KKP/" .date("yy") ."/SP/" ;	
		//echo '<script>console.log('. json_encode("dah masuk") .')</script>';
		//insert data into table course		
									
		$sql = "INSERT INTO myitems (prefix)
				VALUES ('$regid')";
		echo '<script>console.log('. json_encode($sql) .')</script>';
		if(mysqli_query($conn, $sql))
		{
			//echo "Successfull";
			$sql2 = "SELECT CONCAT(m.prefix,m.id) AS try FROM myitems m";
			$resultS = $conn->query($sql2);
			if($resultS->num_rows>0)
			{
				//echo "Successfull";
				while($row = $resultS ->fetch_assoc())
				{
					$id = $row['try'];
					echo $id;
					echo '<br>';
				}
			}
			else 
			{
				echo "Error : " . $sql. "<br>" . mysqli_error($conn);
			}
		}
		// $sql2 = "SELECT * FROM `myitems` m";
		// $resultS = $conn->query($sql2);
		// if($resultS -> num_rows > 0)
		// {
		// 	//echo "Successfull";
		// 	while($row = $resultS ->fetch_assoc())
		// 	{
		// 		//$id = $row['try'];
		// 		//echo "Successfull";
		// 		$prefix = $row["prefix"];
		// 		$id = $row["id"];

		// 		echo $prefix, $id;
		// 		echo "Berjaya";
		// 	}
		// }
		// else 
		// {
		// 	echo "Error : " . $sql. "<br>" . mysqli_error($conn);
		// }
	}
	if($regcert == "Sijil Penghargaan")
	{
		$regid = "KKP/" .date("yy") ."/SE/" ;	
		//echo '<script>console.log('. json_encode("dah masuk") .')</script>';
		//insert data into table course		
									
		$sqlS = "INSERT INTO myitems (prefix)
				VALUES ('$regid')";
		if(mysqli_query($conn, $sqlS))
		{
			$sql3 = "SELECT * FROM myitems";
			$resultD = $conn->query($sql3);
			if($resultD->num_rows>0)
			{
				while($row = $resultD ->fetch_assoc())
				{
					echo "Successfull";
				}
			}
			else 
			{
				echo "Error : " . $sql. "<br>" . mysqli_error($conn);
			}
		}
	}
	if($regcert == "Lain-lain")
	{
		$regid = "KKP/" .date("yy") ."/LL/" ;	
		//echo '<script>console.log('. json_encode("dah masuk") .')</script>';
		//insert data into table course		
									
		$sqlL = "INSERT INTO myitems (prefix)
				VALUES ('$regid')";
		if(mysqli_query($conn, $sqlL))
		{
			$sql4 = "SELECT * FROM myitems";
			$resultR = $conn->query($sql4);
			if($resultR->num_rows>0)
			{
				while($row = $resultR ->fetch_assoc())
				{
					echo "Successfull";
				}
			}
			else 
			{
				echo "Error : " . $sql. "<br>" . mysqli_error($conn);
			}
		}
	}
}
else
{
	echo '<script>console.log('. json_encode("Successfull") .')</script>';
}
?>