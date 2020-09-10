<!DOCTYPE html>
<html lang="en">

<head>  
    <?php include("header.php"); ?>
    <style>
        body {
            background-image: url('images/bg-title-04.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
        }

        .container {
            top: 60%;
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
                    <form action="login_action.php" method="post">
                        <div class="form-group">
                            <label>Username</label>
                            <input class="au-input au-input--full" type="text" name="username" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                        </div>
                        <!-- <div class="login-checkbox">
                            <label>
                                <input type="checkbox" name="remember">Remember Me
                            </label>
                            <label>
                                <a href="#">Forgotten Password?</a>
                            </label>
                        </div> -->
                        <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <?php include("lib_script.php"); ?>

</body>

</html>
<!-- end document-->