<!DOCTYPE html>
<html lang="en">
<head> 
    <style>
        body {
            background-image: url('images/bg-title-04.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }
    </style>
</head>

<body class="animsition">
    <div class="container">
        <div class="login-wrap">
            <div class="login-content">
                <div class="login-logo">
                    <a href="#">
                        <img src="images/icon/logo.png" alt="Pusat Zakat Melaka">
                    </a>
                </div>
                <div class="login-form">
                    <?php
                        include ('connPZM.php');
                        $conn=OpenCon();
                        session_start();

                        // Data from login.php
                        $username = $_POST["username"];
                        $password = $_POST["password"];

                        /********************************** Login without hash password *****************************************/
                        /* $sql="SELECT * FROM `profil_staff` p WHERE p.username = '$username' AND p.password = '$password'";
                        
                        $result=$conn->query($sql);

                        if($result->num_rows > 0){													  
                            while($row=$result->fetch_assoc()){
                                $_SESSION['login_user'] = $username;
                                $level = $row["level"];

                                if($level == 'ADMIN'){
                                    header("location:index.php");    
                                }
                                else{
                                    header("location:index_staf.php");    
                                }
                            }
                        }
                        else{
                            header("location: login.php");
                        } */
                         /****************************** End of Login Without Hash Password *******************************************/

                        //connect to database
                        $mysqli = new mysqli("localhost", "root", "", "pinjaman_asset");

                        //check for errors
                        if ($mysqli->connect_errno) {
                            echo "Failed to connect to MySQL: " . $mysqli->connect_error;
                        }

                        //write query
                        $res = $mysqli->query("SELECT * FROM `profil_staff` p WHERE p.username = '$username'");

                        //fetch query
                        $row = $res->fetch_assoc();

                        //display results
                        if (password_verify($password, $row["password"])){
                            $_SESSION['login_user'] = $username;
                            $level = $row["level"];

                            if($level == 'ADMIN'){
                                header("location:index.php");    
                            }
                            else{
                                header("location:index_staf.php");    
                            }
                        }
                        else{
                            echo "<script type='text/javascript'>
                                    alert('Username/Kata Laluan Anda Salah! Sila Cuba Lagi');
                                    window.location.href='loginV16.php';
                                </script>";
                            //header("location:loginV16.php");    
                        }

                        CloseCon($conn);
                    ?>
                </div>
            </div>
            
        </div>
    </div>

    <?php include("lib_script.php"); ?>

</body>

</html>
<!-- end document-->