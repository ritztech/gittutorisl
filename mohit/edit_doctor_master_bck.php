<?php
include('config.php');


$e_sno = $_POST['e_sno'];


$sql="UPDATE `doc_master` SET `dname`='$_POST[dname]',
`dcontact`='$_POST[dcontact]',
`daddress`='$_POST[daddress]',
`cityname`='$_POST[drcity]'
 WHERE did = $e_sno";

   
if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {
	  echo "<script>alert('Data Updated Successfully');location.href='add_doc_master_front.php'</script>";
	  
	  
  }
  
  
  
  
?>



