<?php
    session_start();
    if(!isset($_SESSION['fpwd_email']) or !isset($_POST['new_pwd']))
    {
        header("Location: index.php");
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
    $str="UPDATE users SET pwd=:pd WHERE leader_id=:id";
    try
    {
        $q=$pdo->prepare($str);
        $q->execute(array(':pd'=>$_POST['new_pwd'],':id'=>$_SESSION['fpwd_email']));
    }
    catch(PDOException $exc)
    {
        die("Some Error occured. Try Later".$exc->getMessage());
    }
    session_destroy();
    echo "Password successfully changed";
?>