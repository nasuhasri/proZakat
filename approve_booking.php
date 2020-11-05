<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!------------------------------------------------------- Start Coding -------------------------------------------->
                        <?php
                            $conn = OpenCon();

                            /*Change the line below to our timezone!*/
                            date_default_timezone_set('Asia/Kuala_Lumpur');
                            
                            /* Get date using date method */
                            $tLulus = date("yy/m/d");

                            /* Get data from bookingAdmin.php */
                            $bookingID = $_GET["bookingID"];

                            $sqlS = "SELECT * FROM `km_asset` k
                                    WHERE k.penyelenggaraan = 'AVAILABLE'";
                            $resultS = $conn->query($sqlS);

                            if($resultS == true){
                                /** Sql to update booking status becomes 'DILULUSKAN' **/
                                $sql = "UPDATE `mohon_pinjaman` mp
                                        SET mp.kelulusan='DILULUSKAN',
                                            mp.tarikh_lulus = '$tLulus'
                                        WHERE mp.mohonID=$bookingID";
                                $result = $conn->query($sql);
                                
                                if(! $result){
                                    die('Could not update data: '. mysqli_error($conn));
                                }
                            }
                            
                            /** Sql to select booking application that is same as $bookingID **/
                            $sql = "SELECT * FROM `mohon_pinjaman` mp, `km_asset` km
                                    WHERE mp.assetID = km.assetID
                                    AND mp.mohonID = $bookingID";
                            $result = $conn->query($sql);

                            if($result->num_rows > 0){
                                while($row = $result->fetch_assoc()){
                                    $availableQty = $row["quantity"];
                                    $qtyNeeded = $row["qtyUser"];
                                    $astID = $row["assetID"];

                                    if($qtyNeeded <= $availableQty){
                                        $qtyLeft = $availableQty - $qtyNeeded;

                                        /** Sql to update qty of asset **/
                                        $sqlUpdate = "UPDATE `km_asset` k
                                                    SET k.quantity = $qtyLeft
                                                    WHERE k.assetID = $astID";
                                        $resultUpdate = $conn->query($sqlUpdate);

                                        if(! $resultUpdate){
                                            die('Could not update data: '. mysqli_error($conn));
                                        }
                                        else {
                                            // echo "<script type='text/javascript'>
                                            //         alert('Permohonon Berjaya Diluluskan');
                                            //         window.location.href='bookingAdmin.php';
                                            //     </script>";
                                        }	
                                    }
                                }
                            }

                            use PHPMailer\PHPMailer\PHPMailer;
                            use PHPMailer\PHPMailer\Exception;
                            
                            /* Exception class. */
                            require 'vendor\phpmailer\src\Exception.php';
                            
                            /* The main PHPMailer class. */
                            require 'vendor\phpmailer\src\PHPMailer.php';
                            
                            /* SMTP class, needed if you want to use SMTP. */
                            require 'vendor\phpmailer\src\SMTP.php';

                            require 'vendor/autoload.php';
                            
                            /* Create a new PHPMailer object. Passing TRUE to the constructor enables exceptions. */
                            $mail = new PHPMailer(TRUE);

                            /**Value stfuname coming from session.php**/
                            $stfuname = $_SESSION['login_user'];					

                            $sqlStaff = "SELECT * FROM `profil_staff` p, `mohon_pinjaman` mp
                                        WHERE p.staffID = mp.staffID
                                        AND mp.mohonID = $bookingID";
                            
                            $resultStaff = $conn->query($sqlStaff);

                            $val = array();

                            /* Retrieve data from db. Cannot use fetch_assoc() */
                            if($resultStaff->num_rows > 0){
                                while($row = mysqli_fetch_array($resultStaff)){
                                    $val[] = $row;
                                }						
                            }
                            else {
                                $val = [];
                            }

                            /* Get staffEmail and staffName from $val */
                            foreach($val as $row){
                                $email = $row["staffEmail"];
                                $name = $row["staffName"];
                            }

                            try {
                                //Server settings
                                $mail->SMTPDebug = 2;                              // Enable verbose debug output
                                $mail->isSMTP();                                     // Set mailer to use SMTP
                                $mail->Host       = 'smtp.gmail.com';                // Specify main and backup SMTP servers
                                $mail->SMTPAuth   = true;                            // Enable SMTP authentication
                                $mail->Username   = 'example@email.com';         // SMTP username
                                $mail->Password   = 'email-password';                     // SMTP password
                                $mail->SMTPSecure = 'tls';                           // Enable TLS encryption, [ICODE]ssl[/ICODE] also accepted
                                $mail->Port       = 587;                             // TCP port to connect to
                            
                                //Recipients
                                $mail->setFrom('admin@example.com', $stfuname);
                                $mail->addAddress($email, $name); 
                            
                                // Attachments
                                //$mail->addAttachment('/home/cpanelusername/attachment.txt');          // Add attachments
                                //$mail->addAttachment('/home/cpanelusername/image.jpg', 'new.jpg');    // Optional name
                                //$mail->addAttachment('email.html');  
                
                                // Content
                                $mail->isHTML(true);                                  // Set email format to HTML
                                $mail->Subject = 'Booking Application Approved!';
                                $mail->Body    = file_get_contents('email2.html');
                                //$mail->Body    = include('email.html');
                                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                $mail->send();
                                echo "<script type='text/javascript'>
                                        alert('Permohonon Berjaya Diluluskan dan Emel Berjaya Dihantar');
                                        window.location.href='bookingAdmin.php';
                                    </script>";
                            
                            }
                            catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                            echo "try"
                        ?>
                        <!-------------------------------------------------- End of coding -------------------------------------------------->
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
