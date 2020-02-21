<?php

include('config.php');

  
 $v_name = $_POST['name'];
 $v_cont = $_POST['cnt'];
 $v_id = $_POST['vid'];
  

$sql="UPDATE customers SET name = '$v_name',contact = '$v_cont'  WHERE cid  = $v_id ";



if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }


echo "</br>";
mysql_close($dbConn);

  header('Location: add_customer_front.php');
?>


