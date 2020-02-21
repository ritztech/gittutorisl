<?php

include('config.php');


$cityname = strtoupper($_POST['cityname']);
$dname = strtoupper($_POST['dname']);


$sql="INSERT INTO `doc_master`(`dname`, `dcontact`, `daddress`,cityname) 
VALUES ('$dname','$_POST[dcontact]','$_POST[daddress]','$cityname')";



if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	 echo "<script>alert('Data Updated Successfully');location.href='add_doc_master_front.php'</script>";
	  
	  
  }
  
  

?>


