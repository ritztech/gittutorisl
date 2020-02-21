
<?php

include('config.php');

$id = $_GET['id'];


$sql="DELETE FROM `m_master_store` WHERE `id` = $id";

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
  
// echo "<script>alert('GR deleted successfully .... ');location.href='cust_ledger_rep.php?id=$cust_id'</script>";

?>


