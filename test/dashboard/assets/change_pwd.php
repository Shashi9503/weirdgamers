<?php
    session_start();
    if(!isset($_SESSION['login_email']))
    {
        header("Location: ../../login/");
        exit(0);
    }

    try
    {
        $pdo=new PDO("mysql:dbname=weir_weird;host=localhost","weir_shashi","Shashi@123");
    }
    catch (PDOException $e)
    {
        die("ERROR: Could not connect");
    }

    $str="SELECT pwd FROM users WHERE leader_id='$_SESSION[login_email]'";

    try
    {
        $q=$pdo->prepare($str);
        $q->execute();
        if($row=$q->fetch())
        {
            if($_POST['current_pwd']!=$row[0])
                die("Incorrect Password");
        }
        else
            die("Email not found");
    }
    catch(PDOException $e)
    {
        die("Some Error occured");
    }

    $str="UPDATE users SET pwd=:n_pd WHERE leader_id='$_SESSION[login_email]' AND pwd=:c_pd";
    try
    {
        $q=$pdo->prepare($str);
        $q->execute(array(':c_pd'=>$_POST['current_pwd'],':n_pd'=>$_POST['new_pwd']));
    }
    catch(PDOException $exc)
    {
        die("Some Error occured while changing password. Try Later".$exc->getMessage());
    }
    echo "Password successfully changed";
?>