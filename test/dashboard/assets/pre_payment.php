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
    
    $str="DELETE FROM pre_payment WHERE leader_id=:id";
    $q=$pdo->prepare($str);
    $q->execute(array(':id'=>$_SESSION['login_email']));
    
    if(!isset($_POST['un_1']))
    {
        header("Location: ../");
        exit(0);
    }
    
    $str="SELECT name,phone FROM users WHERE leader_id=:id";

    $q=$pdo->prepare($str);
    if($q->execute(array(':id'=>$_SESSION['login_email'])))
    {
        if( !( $row=$q->fetch(PDO::FETCH_ASSOC) ) )
            die("email not registered");
        
        $str="INSERT INTO pre_payment (date,time,game,name,leader_id,phone,un_1,un_2,un_3,un_4) VALUES (:d,:t,:g,:n,:e,:p,:u1,:u2,:u3,:u4)";
        $q=$pdo->prepare($str);
        if( $q->execute( array( ':d'=>date('Y-m-d', time()),':t'=>date('h:i:s A', time()),':g'=>$_POST['game'],':n'=>$row['name'],':e'=>$_SESSION['login_email'],':p'=>$row['phone'],':u1'=>$_POST['un_1'],':u2'=>isset($_POST['un_2'])?$_POST['un_2']:"",':u3'=>isset($_POST['un_3'])?$_POST['un_3']:"",':u4'=>isset($_POST['un_4'])?$_POST['un_4']:"" ) ) )
            echo "1";
        else
            die("Some Error Occured. Try again");     
    }
    else
        die("Error occured. Try Logging In again");  
    
?>