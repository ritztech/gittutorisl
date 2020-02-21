<?php

include('config.php');

  
 $v_name = $_POST['name'];
 $v_cont = $_POST['cnt'];
 $v_addre = $_POST['addr'];
 $v_id = $_POST['vid'];
  

$sql="UPDATE m_vendor SET name = '$v_name',contact = '$v_cont',address = '$v_addre' WHERE id  = $v_id ";



if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }


echo "</br>";
mysql_close($dbConn);

  header('Location: add_vendor_front.php');
?>


