<?php

include('config.php');

$t_date = date("d/m/Y");



$vname = trim(strip_tags(addslashes(strtoupper($_POST['vname']))));

$cnt = trim(strip_tags(addslashes(strtoupper($_POST['cnt']))));




$opd = trim(strip_tags(addslashes(strtoupper($_POST['opd']))));


		$sqlinv="INSERT INTO `customers`(`name`, `contact`, `city`, `address`, `op_dues`, `net_due`, `o_date`, `acctype`, `drcr`) VALUES 
			('$vname','$cnt','not sure','not sure','$opd','0',STR_TO_DATE('$t_date','%d/%m/%Y'),1,'DR')";
	
 
// echo $sqlinv;
 
mysql_query($sqlinv,$dbConn);


mysql_close($dbConn);

header('Location: add_customer_front.php');



?>

