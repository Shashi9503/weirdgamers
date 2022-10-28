<?php
    session_start();

    if(!isset($_SESSION['txnid']))
    {
        header("Location: ../");
        exit(0);
    }
    if(!isset($_POST['choice']))
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
</head>
<body>
    <h3>You have already registered for a match.</h3>
    <h4>Click "YES" if you want to register for same match.</h4>
    <h4>Click "NO" if you want to register for next match?</h4>
    <form method="POST" action="payment_success1.php">
        <input type="hidden" name="choice" value="1"/>
        <button type="submit">YES</button>
    </form>
    <form method="POST" action="payment_success1.php">
        <input type="hidden" name="choice" value="0"/>
        <button type="submit">NO</button>
    </form>
</body>
</html>
<?php
        exit(0);
    }
    try
    {
        $pdo=new PDO("mysql:dbname=weir_weird;host=localhost","weir_shashi","Shashi@123"); 
    }
    catch(PDOException $e)
    {
        die("ERROR: Could not connect");
    }

    $_SESSION['array'][':c']=$_POST['choice'];
    $q=$pdo->prepare($_SESSION['query']);
    if($q->execute($_SESSION['array']))
        echo "<h2>Payment Done Successfully.</h2><a href='../'><h3>Go to Login Page</h3></a>";
    else
        echo "Error while saving details. Please contact us";

    $e=$_SESSION['login_email'];
    session_destroy();
    session_start();
    $_SESSION['login_email']=$e;
?>