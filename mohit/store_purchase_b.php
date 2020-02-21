<?php

include('config.php');


$j = $_POST['totalcnt'];

$custcon =  $_POST['custcon'];


$custname = trim(strip_tags(addslashes(strtoupper($_POST['cst_name']))));
$custid = $_POST['custid'];


$tot_amt = $_POST['ptotal'];




$pnotes = trim(strip_tags(addslashes(strtoupper($_POST['pnotes']))));

$voucher = trim(strip_tags(addslashes(strtoupper($_POST['pct']))));


$euser = trim(strip_tags(addslashes(strtoupper($_POST['euser']))));




if($custid == "1")
{
if($custname == "")	
{
	$custname  = "None";
}

else
{

	$result31 = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$sDbName' AND TABLE_NAME = 'customers' ");
            $row31 = mysql_fetch_array($result31);
			
			$custid =  $row31['0'];
			
			
	

			$sqlinv="INSERT INTO `customers`(`name`, `contact`, `city`, `address`, `op_dues`, `net_due`, `o_date`, `acctype`, `drcr`) VALUES 
			('$custname','$custcon','not sure','not sure','0','0',STR_TO_DATE('{$_POST['pdate']}','%d/%m/%Y'),2,'DR')";
	
 
 //echo $sqlinv;
 
mysql_query($sqlinv,$dbConn);
		
}
	
	

}

  
$result31_s = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$sDbName' AND TABLE_NAME = 'stock_p_invoice' ");
            $row31_s = mysql_fetch_array($result31_s);
			
			$billno =  $row31_s['0'];
			
  
  

$sqlinv = "INSERT INTO `stock_p_invoice`(`p_date`, `vendor_id`, `p_receipt`, `total`, `p_notes`, `user_ent`, `vendname`) VALUES
(STR_TO_DATE('{$_POST['pdate']}','%d/%m/%Y'),'$custid','$voucher','$tot_amt','$pnotes','$euser','$custname')";

//echo "</br>";
//echo $sqlinv;

mysql_query($sqlinv,$dbConn);


$sqlinv_due = "update customers  set net_due = (net_due + $tot_amt) where cid = $custid";
 //echo $sqlinv_due;
 mysql_query($sqlinv_due,$dbConn);
 
   
  


for($i=1; $i <= $j; $i++) {
	
	
	$it_id = $_POST['itemid'.$i];
	$it_qty = $_POST['qty'.$i];
	$it_price = $_POST['price'.$i];
	$it_total = $_POST['total'.$i];
	
$itemname = trim(strip_tags(addslashes(strtoupper($_POST['itemname'.$i]))));
$itemunit = trim(strip_tags(addslashes(strtoupper($_POST['itemunit'.$i]))));
		

$sqlins1="INSERT INTO `stock_p_items`(`purchaseid`, `ited_id`, `quantity`, `purchase_price`, `indiv_tot`, `itemname`, `itemunit`) VALUES
('$billno','$it_id','$it_qty','$it_price','$it_total','$itemname','$itemunit')"; 

// echo $sqlins1;
    
 mysql_query($sqlins1,$dbConn);
  
}




mysql_close($dbConn);


header('Location: add_store_f.php');



?>

