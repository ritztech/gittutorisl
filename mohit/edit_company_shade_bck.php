<?php
include('config.php');


$e_sno = $_POST['e_sno'];

$clname = strtoupper($_POST['clname']);


$sql="UPDATE `p_category` SET `name`='$clname'  WHERE id = $e_sno";

 
 
   
if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Updated Successfully');location.href='add_color.php'</script>";
	  
	  
  }
  
  
  
  
?>



