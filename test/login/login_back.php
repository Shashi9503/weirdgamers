<?php
  try
  {
    $pdo=new PDO("mysql:dbname=weir_weird;host=localhost","weir_shashi","Shashi@123");
  }
  catch(PDOException $e)
  {
    die("ERROR: Could Not Connect");
  }
  $str="SELECT * FROM users WHERE leader_id=:id";
  try
  {
    $query=$pdo->prepare($str);
    $query->execute(array(':id'=>$_POST['email'])); 
  }
  catch(PDOException $exc)
  {
    die("Some Error occured while Logging In. Try Later".$exc->getMessage());
  }
  if($row=$query->fetch(PDO::FETCH_ASSOC))
  {
    if($row['pwd']==$_POST['pwd'])
    {
      session_start();
      $_SESSION['login_email']=$row['leader_id'];
      echo "Hello";
    }
    else
      echo "Incorrect password";
  }
  else
    echo "Email not registered";
?>