<?php
include('config.php');


$e_sno = $_POST['e_sno'];

$clname = strtoupper($_POST['clname']);
$iunit = strtoupper($_POST['iunit']);


$sql="UPDATE `m_item_store` SET `itemname`= '$clname' ,itemunit = '$iunit'  WHERE itemid = $e_sno";

 
 
   
if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Updated Successfully');location.href='add_store_item.php'</script>";
	  
	  
  }
  
  
  
  
?>



