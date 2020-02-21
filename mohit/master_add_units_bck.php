<?php
include('config.php');


$descrip = strtoupper($_POST['desc']);

$sql="INSERT INTO `store_units`(`name`) VALUES ('$descrip')";
 

  

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  mysql_close($dbConn);
  
   echo "<script>alert('Unit added  Successfully');location.href='add_store_item.php'</script>";

?>


