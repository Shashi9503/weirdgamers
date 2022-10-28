<?php
    session_start();
    if(!isset($_POST['code']))
    {
        header("Location: ../index.html");
        exit(0);
    }    
    if( isset($_SESSION['start_time']) )
    {
        if( $_SESSION['start_time']+300 >= time() )
        {
            if($_SESSION['code']==$_POST['code'])
            {
                $_SESSION['verified']=true;
                echo "1";
            }
            else
                echo "0";
        }
        else
            echo "-1";
    }
    else
        echo "-1";
?>