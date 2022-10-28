<?php
  session_start();
  if($_SESSION['verified']!=true)
  {
    header("Location: ../index.html");
    exit(0);
  }
  if($_POST['name']=="" or $_POST['pwd']=="")
    die("Some fields are empty");
  
  if(!isset($_SESSION['email']))
    die("Session Expired. Register Again<br><a href='index.php'></a>");

  try
  {
    $pdo=new PDO("mysql:dbname=weir_weird;host=localhost","weir_shashi","Shashi@123");
  }
  catch (PDOException $e)
  {
    echo "ERROR: Could not connect";
  }
  $str="INSERT INTO users (leader_id,name,pwd,phone) VALUES (:id,:un,:pd,:ph)";
  try
  {
    $q=$pdo->prepare($str);
    $q->execute(array(':id'=>$_SESSION['email'],':un'=>$_POST['name'],':pd'=>$_POST['pwd'],':ph'=>$_POST['phone']));
  }
  catch(PDOException $exc)
  {
    die("Some Error occured. Try Later".$exc->getMessage());
  }
  session_destroy();
  echo "Successfully registered";
?>