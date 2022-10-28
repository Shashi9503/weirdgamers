<?php
    session_start();
    if(!isset($_SESSION['fpwd_email']))
    {
        header("Location: ../");
        exit(0);
    }
    $code=(string)mt_rand(100000,999999);
    require "../PHPMailer/src/PHPMailer.php";
    require "../PHPMailer/src/Exception.php";
    require "../PHPMailer/src/SMTP.php";

    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    //Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);

    try
    {
        $mail->SMTPDebug = PHPMailer\PHPMailer\SMTP::DEBUG_SERVER;  
        $mail->isSMTP();                                            
        $mail->Host       = 'ssl://smtp.gmail.com';                 
        $mail->SMTPAuth   = true;                                   
        $mail->Username   = 'weirdgamersverify@gmail.com';          
        $mail->Password   = 'dvtecwuvuefqfsfo';                              
        $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         
        //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 465;                                    
        //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        $mail->setFrom('weirdgamersverify@gmail.com', 'Weird Gamers');
        $mail->addAddress($_SESSION['fpwd_email']);
        $mail->isHTML(false);
        $mail->Subject = 'Eamil verification for changing password';
        $mail->Body= $code;

        $mail->send();
        $_SESSION['code']=$code;
        $_SESSION['start_time']=time();
        echo "Verification code sent";
    }
    catch (Exception $e)
    {
        die("Error while sending verification code".$e->getMessage());
    }
?>