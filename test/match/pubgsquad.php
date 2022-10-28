<?php
    try
    {
        $pdo= new PDO("mysql:dbname=weir_weird;host=localhost","weir_shashi","Shashi@123");
    }
    catch(PDOException $e)
    {
        die("ERROR: Could not connect");
    }
    
    $str="INSERT INTO pubgsquad_registered (name,leader_id,phone,un_1,un_2,un_3,un_4) SELECT name,leader_id,phone,un_1,un_2,un_3,un_4 FROM pubgsquad WHERE same_match=1 LIMIT 25";
    $q=$pdo->prepare($str);
    if($q->execute())
        echo "Match Fixed";
    else
        die("Some error occured");
?>