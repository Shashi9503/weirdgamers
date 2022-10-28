<?php

    require "PHPMailer/src/PHPMailer.php";
    require "PHPMailer/src/Exception.php";
    require "PHPMailer/src/SMTP.php";

    //Load Composer's autoloader
    // require 'vendor/autoload.php';

    //Instantiation and passing `true` enables exceptions
    
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.hostinger.com';
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    $mail->Username = 'weird@weirdgamers.com';
    $mail->Password = 'Sandeep@1234';
    $mail->setFrom('weird@weirdgamers.com', 'Weird Gamers');
    $mail->addAddress('smartshashi191991@gmail.com', 'Shashi');
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
Email: {$_POST['email']}
Name: {$_POST['name']}
Message: {$_POST['message']}
EOT;
        if (!$mail->send()) {
            $msg = 'Sorry, something went wrong. Please try again later.';
        } else {
            $msg = 'Message sent! Thanks for contacting us.';
        }
    } else {
        $msg = 'Share it with us!';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact form</title>
</head>
<body>
<h1>Do You Have Anything in Mind?</h1>
<?php if (!empty($msg)) {
    echo "<h2>$msg</h2>";
} ?>
<form method="POST">
    <label for="name">Name: <input type="text" name="name" id="name"></label><br><br>
    <label for="email">Email: <input type="email" name="email" id="email"></label><br><br>   
    <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br><br>
    <input type="submit" value="Send">
</form>
</body>
</html>