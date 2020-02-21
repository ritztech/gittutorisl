<?php
include('config.php');

$id = $_GET['id'];


	$sqlupd124="delete from  `sell_invoice`  where  billno = $id";
    mysql_query($sqlupd124,$dbConn);
	
    $sqlupd124="delete from  `sell_items`  where  billno = $id";
    mysql_query($sqlupd124,$dbConn);
	
	  

?> 