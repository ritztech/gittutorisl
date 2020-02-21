<?php
include('config.php');

$id = $_GET['id'];


	$sqlupd124="delete from  `sell_invoice`  where  billno = $id";
    mysql_query($sqlupd124,$dbConn);
	
    $sqlupd124="delete from  `sell_items`  where  billno = $id";
    mysql_query($sqlupd124,$dbConn);
	
	

$result1 = mysql_query("SELECT  (sell_id - 1) as maxid  FROM `m_auto_id` ");
$row1 = mysql_fetch_array($result1);

$maxid = $row1[0];



for($i=$id; $i <= $maxid; $i++) {
	
	$n_id = $i-1;
	//echo "update $i to $n_id ";
	
	
	//echo "</br>";
	
	
	$sqlupd124="UPDATE `sell_invoice` SET `billno`  =  $n_id where  billno = $i";
    mysql_query($sqlupd124,$dbConn);
	
    $sqlupd124="UPDATE `sell_items` SET `billno`  =   $n_id where  billno =  $i";
    mysql_query($sqlupd124,$dbConn);
	
		
}


    $sqlupd124="UPDATE `m_auto_id` SET   sell_id  = ($i-1)";
//	echo $sqlupd124;
    mysql_query($sqlupd124,$dbConn);
	
	
	
  $result13 = mysql_query("SELECT `billno`, `s_date`, `c_id`, `c_name`, `unit`, `qty` FROM `store_usage` WHERE billno = $id");

while($row13 = mysql_fetch_array($result13))
  {
	  	$s_uage  = $row13['qty'];
		$s_c_id  = $row13['c_id'];
		
		
		 $sqlins3="UPDATE `m_item_store` SET `qty`=  (qty + $s_uage ) WHERE itemid = $s_c_id"; 
  
         mysql_query($sqlins3,$dbConn);
	
	  

  }	  
  

  
$sqlins3="DELETE FROM `store_usage` WHERE `billno` = $id"; 
  
         mysql_query($sqlins3,$dbConn);
		
		
		


header('Location: Report_today_sell.php');
  
  

?> 