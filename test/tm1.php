<?php
  
    $code=(string)mt_rand(100000,999999);
    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/SMTP.php";

    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try
    {
      $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;  
      $mail->isSMTP();                   
      $mail->Host       = 'ssl://smtp.hostinger.com';                 
      $mail->SMTPAuth   = true;                  
      $mail->SMTPDebug = 2;
      $mail->Username   = 'weird@weirdgamers.com';          
      $mail->Password   = 'Sandeep@1234';                              
      $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         
      //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 465;                                    
      //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      $mail->setFrom('weird@weirdgamers.com', 'Weird Gamers');
      $mail->addAddress('sumit9128kumar@gmail.com');
      $mail->isHTML(false);
      $mail->Subject = 'Eamil verification';
      $mail->Body= $code;

      if($mail->send())
        echo "Verification code sent";

    }
    catch (Exception $e)
    {
      session_destroy();
      die("Error while sending verification code");
    }
?>