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
    $str="SELECT leader_id,name,phone,un_1,un_2,un_3,un_4 FROM users WHERE leader_id=:id";
    try
    {
        $q=$pdo->prepare($str);
        $q->execute(array(':id'=>$_SESSION['login_email']));
        if($row=$q->fetch(PDO::FETCH_ASSOC))
        {
            echo "<form name='profile' method='POST' action='assets/profile2.php'>
            <div class='row gutters'>
            <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                <h3 class='mb-3'>Personal Details</h3>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>
                <div class='form-group'>
                    <label for='fullName'>Full Name</label>
                    <input disabled type='text' name='fullName' class='form-control' id='fullName' value='$row[name]' placeholder='Enter full name'>
                </div>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>
                <div class='form-group'>
                    <label for='eMail'>Email</label>
                    <input disabled type='email' name='l_email' class='form-control' value='$row[leader_id]' id='eMail' placeholder='Enter email ID'>
                </div>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>
                <div class='form-group'>
                    <label for='phone'>Phone</label>
                    <input disabled type='text' name='phone' class='form-control' value='$row[phone]' id='phone' placeholder='Enter phone number'>
                </div>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>
                <div class='form-group'>
                    <label for='un-1'>Username (same as game username)</label>
                    <input disabled type='text' name='un_1' class='form-control'  value='$row[un_1]' id='un-1' placeholder='Username as in game'>
                </div>
            </div>
        </div>
        <div class='row gutters justify-content-center'>
            <div class='col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12'>
                <h3 class='mb-3'>Teammate Details</h3>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>
                <div class='form-group'>
                    <label for='un-2'>Username</label>
                    <input disabled type='text' name='un_2' class='form-control' value='$row[un_2]' id='un-2' placeholder='1st Teammate Username as in game'>
                </div>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>
                <div class='form-group'>
                    <label for='un-2'>Username</label>
                    <input disabled type='text' name='un_3' class='form-control'  value='$row[un_3]' id='un-3' placeholder='2nd Teammate Username as in game'>
                </div>
            </div>
            <div class='col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12'>
                <div class='form-group'>
                    <label for='un-3'>Username</label>
                    <input disabled type='text' name='un_4' class='form-control' value='$row[un_4]' id='un-4' placeholder='3rd Teammate Username as in game'>
                </div>
            </div>
        </div>
        </form>";
        }

    }
    catch(PDOException $exc)
    {
        die("Some Error occured. Try Later".$exc->getMessage());
    }
?>