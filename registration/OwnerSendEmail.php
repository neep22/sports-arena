<?php

use PHPMailer\PHPMailer\PHPMailer; 

use PHPMailer\PHPMailer\Exception;

    class sendEmail

    {

        function send($code,$OwnerEmail)
       
        {
 
            
        
 

        require 'PHPMailer/src/Exception.php';

        require 'PHPMailer/src/PHPMailer.php';

        require 'PHPMailer/src/SMTP.php';

        // create object of PHPMailer class with boolean parameter which sets/unsets exception.

        $mail = new PHPMailer(true);                              

        try {

            $mail->isSMTP(); // using SMTP protocol                                     

            $mail->Host = 'smtp.googlemail.com'; // SMTP host as gmail 

            $mail->SMTPAuth = true;  // enable smtp authentication                             

            $mail->Username = 'naderneep252000@gmail.com';  // sender gmail host              

            $mail->Password = 'xvhgsywzfvvpmlbk'; // sender gmail host password                          

            $mail->SMTPSecure = 'tls';  // for encrypted connection                           

            $mail->Port = 587;   // port for SMTP     

            $mail->isHTML(true); 

            $mail->setFrom('sender@gmail.com', "Indoor Sports"); // sender's email and name

            $mail->addAddress($OwnerEmail, "Receiver");  // receiver's email and name

           // $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 

            $mail->Subject = 'Email Verification';

            $mail->Body    = 'Please Click This Button To Verify Your User Account: <a href=http://localhost/Sports-Arena/registration/OwnerVerify.php?code='.$code.'>Verify</a>' ;
           
 

            $mail->send();

            echo "<script>alert('Message Has Been Send')</script>";

        } catch (Exception $e) { // handle error.

            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;

        }

        }

    }

$sendMl = new sendEmail();

?>