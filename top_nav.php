<!-- HEADER DESKTOP-->
<header class="header-desktop">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <!-- Search button -->
                <form class="form-header" action="search_action.php" method="GET">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Carian data &amp; maklumat..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                </form>
                <div class="header-button">
                    <div class="account-wrap">
                        <div class="account-item clearfix js-item-menu">
                            <?php
                                $conn = OpenCon();
                                /**Value login_user coming from login_action.php**/
                                $uname = $_SESSION['login_user'];
                                
                                $sql = "SELECT * FROM `profil_staff` p 
                                        WHERE p.username = '$uname'";
                                $result = $conn->query($sql);

                                if($result->num_rows > 0){
                                    while($row = $result->fetch_assoc()){
                                        $name = $row["staffName"];
                                        $email = $row["staffEmail"];
                                        $level = $row["level"];
                                    }
                                }

                                if($level == 'ADMIN'){
                                    ?><div class="image">
                                        <img src="images/admin.jpg" alt="Admin" />
                                    </div><?php
                                }
                                else{
                                    ?> <div class="image">
                                        <img src="images/user.jpg" alt="User" />
                                    </div><?php
                                }
                            ?>
                            <div class="content">
                                <a class="js-acc-btn" href="#"><?php echo $name ?></a>
                            </div>
                            <div class="account-dropdown js-dropdown">
                                <div class="info clearfix">
                                    <div class="image">
                                        <a href="#">
                                            <?php
                                                if($level == 'ADMIN'){
                                                    ?><img src="images/admin.jpg" alt="Admin" /><?php
                                                }
                                                else{
                                                    ?><img src="images/user.jpg" alt="User" /><?php
                                                }
                                            ?>
                                        </a>
                                    </div>
                                    <div class="content">
                                        <h5 class="name">
                                            <a href="#"><?php echo $name ?></a>
                                        </h5>
                                        <span class="email"><?php echo $email ?></span>
                                    </div>
                                </div>
                                <div class="account-dropdown__body">
                                    <div class="account-dropdown__item">
                                        <a href="chgpwd.php">
                                            <i class="zmdi zmdi-settings"></i>Change Password</a>
                                    </div>
                                </div>
                                <div class="account-dropdown__footer">
                                    <a href="logout.php">
                                        <i class="zmdi zmdi-power"></i>Logout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- HEADER DESKTOP-->