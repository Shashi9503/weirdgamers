<?php
    session_start();
    if(!isset($_POST['code']))
    {
        header("Location: index.php");
        exit(0);
    }    
    if(isset($_SESSION['fpwd_attempt']) && $_SESSION['fpwd_attempt']==3)
    {
        echo "-2";
        exit(0);
    }
    if( isset($_SESSION['start_time']) )
    {
        if( $_SESSION['start_time']+300 >= time() )
        {
            if($_SESSION['code']==$_POST['code'])
            {
                $_SESSION['pwd_verified']=true;
                echo "1";
            }
            else
            {
                isset($_SESSION['fpwd_attempt'])?$_SESSION['fpwd_attempt']++:$_SESSION['fpwd_attempt']=1;
                echo "0";
            }
        }
        else
            echo "-1";
    }
    else
        echo "-1";
?>