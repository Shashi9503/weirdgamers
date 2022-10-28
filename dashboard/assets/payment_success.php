<?php
    session_start();
    
    try
    {
        $pdo=new PDO("mysql:dbname=weir_weird;host=localhost","weir_shashi","Shashi@123"); 
    }
    catch (PDOException $e)
    {
        die("ERROR: Could not connect");
    }

    if($_GET['status']!="success")
    {
        echo "</h3>payment failed</h3>";
        exit(0);
    }

    $email=str_replace("%40","@",$_GET['email']);
    
    $str="SELECT * FROM pre_payment WHERE leader_id=:id";

    $q=$pdo->prepare($str);
    if( !$q->execute( array(':id'=>$email) ) )
        die("Error Occured. Try again");
    
    if($row=$q->fetch(PDO::FETCH_ASSOC))
    {
        switch($row['game'])
        {
            case "pubgsolo":    $l=100;
            $s="INSERT INTO $row[game] (date_time,same_match,name,leader_id,phone,un_1,payu_trans_id,bank_ref_no,trans_id,amount,mode,cust_email,cust_phone) VALUES (:d,:c,:n,:e,:p,:u1,:pt,:b,:t,:a,:m,:ce,:cp)";
            $a=array( ':d'=>date('Y-m-d H:i:s', time()),':c'=>1,':n'=>$row['name'],':e'=>$row['leader_id'],':p'=>$row['phone'],':u1'=>$row['un_1'],':pt'=>$_GET['txnid'],':b'=>$_GET['bank_ref_num'],':t'=>$_GET['mihpayid'],':a'=>$_GET['net_amount_debit'],':m'=>$_GET['mode'],':ce'=>$email,':cp'=>$_GET['phone'] );
            break;

            case "pubgduo":    $l=50;
            $s="INSERT INTO $row[game] (payu_trans_id,date_time,same_match,name,leader_id,phone,un_1,un_2,bank_ref_no,trans_id,amount,mode,cust_email,cust_phone) VALUES (:pt,:d,:c,:n,:e,:p,:u1,:u2,:b,:t,:a,:m,:ce,:cp)";
            $a=array( ':d'=>date('Y-m-d H:i:s', time()),':c'=>1,':n'=>$row['name'],':e'=>$row['leader_id'],':p'=>$row['phone'],':u1'=>$row['un_1'],':u2'=>isset($row['un_2'])?$row['un_2']:"",':pt'=>$_GET['txnid'],':b'=>$_GET['bank_ref_num'],':t'=>$_GET['mihpayid'],':a'=>$_GET['net_amount_debit'],':m'=>$_GET['mode'],':ce'=>$email,':cp'=>$_GET['phone'] );
            break;

            case "pubgsquad":    $l=25;
            $s="INSERT INTO $row[game] (date_time,same_match,name,leader_id,phone,un_1,un_2,un_3,un_4,payu_trans_id,bank_ref_no,trans_id,amount,mode,cust_email,cust_phone) VALUES (:d,:c,:n,:e,:p,:u1,:u2,:u3,:u4,:pt,:b,:t,:a,:m,:ce,:cp)";
            $a=array( ':d'=>date('Y-m-d H:i:s', time()),':c'=>1,':n'=>$row['name'],':e'=>$row['leader_id'],':p'=>$row['phone'],':u1'=>$row['un_1'],':u2'=>isset($row['un_2'])?$row['un_2']:"",':u3'=>isset($row['un_3'])?$row['un_3']:"",':u4'=>isset($row['un_4'])?$row['un_4']:"",':pt'=>$_GET['txnid'],':b'=>$_GET['bank_ref_num'],':t'=>$_GET['mihpayid'],':a'=>$_GET['net_amount_debit'],':m'=>$_GET['mode'],':ce'=>$email,':cp'=>$_GET['phone'] );
            break;

            case "freefiresolo":    $l=50;
            $s="INSERT INTO $row[game] (date_time,same_match,name,leader_id,phone,un_1,payu_trans_id,bank_ref_no,trans_id,amount,mode,cust_email,cust_phone) VALUES (:d,:c,:n,:e,:p,:u1,:pt,:b,:t,:a,:m,:ce,:cp)";
            $a=array( ':d'=>date('Y-m-d H:i:s', time()),':c'=>1,':n'=>$row['name'],':e'=>$row['leader_id'],':p'=>$row['phone'],':u1'=>$row['un_1'],':pt'=>$_GET['txnid'],':b'=>$_GET['bank_ref_num'],':t'=>$_GET['mihpayid'],':a'=>$_GET['net_amount_debit'],':m'=>$_GET['mode'],':ce'=>$email,':cp'=>$_GET['phone'] );
            break;

            case "freefireduo":    $l=25;
            $s="INSERT INTO $row[game] (date_time,same_match,name,leader_id,phone,un_1,un_2,payu_trans_id,bank_ref_no,trans_id,amount,mode,cust_email,cust_phone) VALUES (:d,:c,:n,:e,:p,:u1,:u2,:pt,:b,:t,:a,:m,:ce,:cp)";
            $a=array( ':d'=>date('Y-m-d H:i:s', time()),':c'=>1,':n'=>$row['name'],':e'=>$row['leader_id'],':p'=>$row['phone'],':u1'=>$row['un_1'],':u2'=>isset($row['un_2'])?$row['un_2']:"",':pt'=>$_GET['txnid'],':b'=>$_GET['bank_ref_num'],':t'=>$_GET['mihpayid'],':a'=>$_GET['net_amount_debit'],':m'=>$_GET['mode'],':ce'=>$email,':cp'=>$_GET['phone'] );
            break;

            case "freefiresquad":    $l=12;
            $s="INSERT INTO $row[game] (date_time,same_match,name,leader_id,phone,un_1,un_2,un_3,un_4,payu_trans_id,bank_ref_no,trans_id,amount,mode,cust_email,cust_phone) VALUES (:d,:c,:n,:e,:p,:u1,:u2,:u3,:u4,:pt,:b,:t,:a,:m,:ce,:cp)";
            $a=array( ':d'=>date('Y-m-d H:i:s', time()),':c'=>1,':n'=>$row['name'],':e'=>$row['leader_id'],':p'=>$row['phone'],':u1'=>$row['un_1'],':u2'=>isset($row['un_2'])?$row['un_2']:"",':u3'=>isset($row['un_3'])?$row['un_3']:"",':u4'=>isset($row['un_4'])?$row['un_4']:"",':pt'=>$_GET['txnid'],':b'=>$_GET['bank_ref_num'],':t'=>$_GET['mihpayid'],':a'=>$_GET['net_amount_debit'],':m'=>$_GET['mode'],':ce'=>$email,':cp'=>$_GET['phone'] );
            break;

            default: die("Error");
        }
        
        $_SESSION['login_email']=$row['leader_id'];
        $str="SELECT payu_trans_id FROM $row[game] WHERE leader_id='$row[leader_id]' AND same_match=1 LIMIT $l";
        $q=$pdo->prepare($str);
        if(!$q->execute())
            die("Error occured. Try again");
        if($r=$q->fetch())
        {
            $_SESSION['status']=$_GET['status'];
            $_SESSION['name']=$row['name'];
            $_SESSION['phone']=$row['phone'];
            $_SESSION['un_1']=$row['un_1'];
            if($row['un_2']!="")
                $_SESSION['un_2']=$row['un_2'];
            if($row['un_3']!="")
                $_SESSION['un_3']=$row['un_3'];
            if($row['un_4']!="")
                $_SESSION['un_4']=$row['un_4'];
            $_SESSION['txnid']=$_GET['txnid'];
            $_SESSION['bank_ref_num']=$_GET['bank_ref_num'];
            $_SESSION['mihpayid']=$_GET['mihpayid'];
            $_SESSION['amount']=$_GET['net_amount_debit'];
            $_SESSION['mode']=$_GET['mode'];
            $_SESSION['cust_phone']=$_GET['phone'];
            $_SESSION['query']=$s;
            $_SESSION['array']=$a;
            
            $str="DELETE FROM pre_payment WHERE leader_id=:id ";
            $q=$pdo->prepare($str);
            if($q->execute(array(':id'=>$email)))
                echo "Deleted";
            
            header("Location: payment_success1.php");
            exit(0);   
        }

        $q=$pdo->prepare($s);
        if($q->execute($a))
            echo "<h2>Payment Done Successfully.</h2><a href='../'><h3>Go to Login Page</h3></a>";
        else
            echo "Details not saved please contact us";
    }
    else
        echo "<h3>Email not matched. Please Contact Us.</h3><a href='../../login/'>Login Again</a>";
        
    $str="DELETE FROM pre_payment WHERE leader_id=:id ";
    $q=$pdo->prepare($str);
    $q->execute(array(':id'=>$email));
?>