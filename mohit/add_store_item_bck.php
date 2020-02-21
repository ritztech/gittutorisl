<?php

include('config.php');


$itemname = strtoupper($_POST['itemname']);
$iunit = strtoupper($_POST['iunit']);
$qty = strtoupper($_POST['qty']);


$sql="INSERT INTO `m_item_store`(`itemname`, `qty`, `itemunit`) VALUES 
('$itemname','$qty','$iunit')";




if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  else
  {

	  header('Location: add_store_item.php');
	  
	  
  }
  


?>





