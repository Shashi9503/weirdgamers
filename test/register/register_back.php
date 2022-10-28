<?php
  session_start();
  if(!isset($_POST['email']))
  {
    header("Location: ../index.html");
    exit(0);
  }
  if($_POST['email']=="")
    die("Email cannot be empty");
  
  try
  {
    $pdo=new PDO("mysql:dbname=weir_weird;host=localhost","weir_shashi","Shashi@123");
  }
  catch (PDOException $e)
  {
    echo "ERROR: Could not connect";
  }
  $str="SELECT name FROM users WHERE leader_id=:id";
  try
  {
    $q=$pdo->prepare($str);
    $q->execute(array(':id'=>$_POST['email']));
  }
  catch(PDOException $exc)
  {
    die("Some Error occured. Try Later".$exc->getMessage());
  }
  if($q->fetch())
  {  
    $_SESSION['email']=$_POST['email'];
    echo "Email already registered";
  }
  else
  {
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
      $mail->Password   = 'Weird@123';                              
      $mail->SMTPSecure = PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_STARTTLS;         
      //Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
      $mail->Port       = 465;                                    
      //TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

      $mail->setFrom('weirdgamersverify@gmail.com', 'Weird Gamers');
      $mail->addAddress($_POST['email']);
      $mail->isHTML(false);
      $mail->Subject = 'Eamil verification';
      $mail->Body= $code;

      if($mail->send())
        echo "Verification code sent";

      session_start();
      $_SESSION['code']=$code;
      $_SESSION['email']=$_POST['email'];
      $_SESSION['start_time']=time();
      $_SESSION['verified']=false;
    }
    catch (Exception $e)
    {
      session_destroy();
      die("Error while sending verification code");
    }
  }
?>