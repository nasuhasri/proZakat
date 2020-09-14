<?php include 'session.php'; ?>
<body class="animsition">
    <div class="page-wrapper">
        <?php
            $conn = OpenCon();
            /**Value login_user coming from login_action.php**/
            $user_check = $_SESSION['login_user'];
            
            $sql = "SELECT * FROM `profil_staff` p 
                    WHERE p.username = '$user_check'";
            $result = $conn->query($sql);
	
            //output data
            if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    $login_uname = $row['username'];
                    $login_pwd = $row['password'];
        
                    $level = $row["level"];
        
                    if($level == 'ADMIN'){
                    	include ('sbMenu.php'); 
                    }
                    else{
                    	include ('sbMenu_staf.php');
                    }
                }
            }
            else{
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        ?>
        <!-- </?php include 'sbMenu.php'; ?> -->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <?php include ('top_nav.php'); ?>

            <!-- MAIN CONTENT-->
            <div class="main-content">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">