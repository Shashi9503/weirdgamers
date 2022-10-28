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
    try
    {
        $str="UPDATE users SET name=:un,phone=:ph,un_1=:u1,un_2=:u2,un_3=:u3,un_4=:u4 WHERE leader_id=:l_id";
        $q=$pdo->prepare($str);
        $q->execute(array(':l_id'=>$_SESSION['login_email'],':un'=>$_POST['fullName'],':ph'=>$_POST['phone'],':u1'=>$_POST['un_1'],':u2'=>$_POST['un_2'],':u3'=>$_POST['un_3'],':u4'=>$_POST['un_4']));
        header("Location: ../");
    }
    catch(PDOException $exc)
    {
        die("Some Error occured. Try Later".$exc->getMessage());
    }
?>