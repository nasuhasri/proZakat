<?php
	include("connPZM.php");   
	$conn1 = OpenCon();
	session_start();

	// Buat status untuk user
	//$_SESSION["level"] = $_GET["level"];
	
	 /**Value login_user coming from login_action.php**/
	$user_check = $_SESSION['login_user'];
	
	$sql = "SELECT * FROM `profil_staff` p 
			WHERE p.username = '$user_check'";
	
	$result = $conn1->query($sql);
	
	//output data
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$login_uname = $row['username'];
			$login_pwd = $row['password'];

			$level = $row["level"];
		}
	}
	else{
		header("location:wlcmPg.php");
		die();
	}
	
	CloseCon($conn1);
?>