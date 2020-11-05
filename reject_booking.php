<!DOCTYPE html>
<html lang="en">
<head>
<?php include 'header.php'; ?>
</head>
<?php include 'isi_atas.php'; ?>
                        <!-- //////////////////////////////////////////////////////// Start Coding -->
                        <?php
                            $conn = OpenCon();

                            /* Get data from bookingAdmin.php */
                            $bookingID = $_GET["bookingID"];

                            $sqlS = "SELECT * FROM `km_asset` km, `mohon_pinjaman` mp
                                    WHERE km.assetID = mp.assetID
                                    AND mp.mohonID = $bookingID";
                            $resultS = $conn->query($sqlS);

                            if($resultS == true){
                                /** Sql to update booking status becomes 'DIBATALKAN' **/
                                $sql = "UPDATE `mohon_pinjaman` mp
                                        SET mp.kelulusan='DIBATALKAN',
                                            mp.pemulangan = 'PERMOHONAN BATAL',
                                            mp.batal = 'YA'
                                        WHERE mp.mohonID=$bookingID";
                                $result = $conn->query($sql);
                                
                                if(! $result){
                                    die('Could not update data: '. mysqli_error($conn));
                                }
                                else {
                                    echo "<script type='text/javascript'>
                                            alert('Permohonon Berjaya DIBATALKAN');
                                            window.location.href='bookingAdmin.php';
                                        </script>";
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
                                $mail->Subject = 'Booking Application Rejected!';
                                $mail->Body    = file_get_contents('email_reject.html');
                                //$mail->Body    = include('email.html');
                                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                                $mail->send();
                                echo "<script type='text/javascript'>
                                        alert('Permohonon Berjaya Dibatalkan dan Emel Berjaya Dihantar');
                                        window.location.href='bookingAdmin.php';
                                    </script>";
                            
                            }
                            catch (Exception $e) {
                                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                            }
                        ?>
                        <!----------------------------------------------- End of coding ------------------------------------------>
<?php include 'isi_bawah.php'; ?>                    
</html>
<!-- end document-->
