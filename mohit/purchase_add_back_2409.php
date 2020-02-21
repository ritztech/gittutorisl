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

  
$result31_s = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$sDbName' AND TABLE_NAME = 'purchase_invoice' ");
            $row31_s = mysql_fetch_array($result31_s);
			
			$billno =  $row31_s['0'];
			

			
			


$sqlinv = "INSERT INTO `purchase_invoice`(`p_date`, `vendor_id`, `p_receipt`, `total`, `p_notes`, `user_ent`,vend_name) VALUES 
(STR_TO_DATE('{$_POST['pdate']}','%d/%m/%Y'),'$custid','$voucher','$tot_amt','$pnotes','$euser','$custname')";
 

if (!mysql_query($sqlinv,$dbConn))
  {
  die('Error: ' . mysql_error());
  }

  
  $sqlinv_due = "update customers  set net_due = (net_due + $tot_amt) where cid = $custid";
 //echo $sqlinv_due;
 mysql_query($sqlinv_due,$dbConn);
 


for($i=1; $i <= $j; $i++) {

$mastdesc = trim(strip_tags(addslashes(strtoupper($_POST['mastdesc'.$i]))));
$batchno = trim(strip_tags(addslashes(strtoupper($_POST['batchno'.$i]))));
$batchno_existing = trim(strip_tags(addslashes(strtoupper($_POST['trg'.$i]))));

$sqlins1="INSERT INTO `purchase_item`(`purchaseid`, `ited_id`, `itemname`, `mrp`, `sell_price`, `buy_price`, `buy_qty`, `expiry_date`, `batchno`, `total`, `barcode`,
 `gruop_id`) VALUES  
 ($billno,{$_POST['mastitem'.$i]},'$mastdesc',{$_POST['mrp'.$i]},'{$_POST['sprice'.$i]}',{$_POST['price'.$i]},
 '{$_POST['qty'.$i]}',STR_TO_DATE('{$_POST['expdate'.$i]}','%d/%m/%Y'),'$batchno',
  '{$_POST['total'.$i]}','{$_POST['barcode'.$i]}','{$_POST['groupid'.$i]}')";

  // trg==existing batchno
  //freeqty= barcode
  
 // echo $sqlins1;
  //echo "</br>";
  
  
  
 if (!mysql_query($sqlins1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  if($batchno!=$batchno_existing)
  {
	  
	  
  
  $sqlins1="INSERT INTO `m_master_store`(`desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `dop`, `free_item`, `free_qty`,
  `expdate`, `batchno`, `purchase_id`, `grp_id`) VALUES
('$mastdesc','{$_POST['sprice'.$i]}','{$_POST['qty'.$i]}',20,'{$_POST['mrp'.$i]}','{$_POST['barcode'.$i]}',
STR_TO_DATE('{$_POST['pdate']}','%d/%m/%Y'),'none',0,STR_TO_DATE('{$_POST['expdate'.$i]}','%d/%m/%Y'),
'$batchno',$billno,'{$_POST['groupid'.$i]}')";

// echo $sqlins1;
  //echo "</br>";
  
  
 if (!mysql_query($sqlins1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  }
  
  
  else
  {
	  if($batchno_existing == "")
	  {		  
	  
	 $sqlupd1241="UPDATE `m_master_store` SET `qty`=( qty + {$_POST['qty'.$i]}) ,mrp =  '{$_POST['mrp'.$i]}' , s_price = '{$_POST['sprice'.$i]}',purchase_id = '$billno'
	 WHERE id={$_POST['mastitem'.$i]}";
	 
	  }
	  
	  else
		  
		  {
			  $sqlupd1241="UPDATE `m_master_store` SET `qty`=( qty + {$_POST['qty'.$i]}) ,mrp =  '{$_POST['mrp'.$i]}' , s_price = '{$_POST['sprice'.$i]}',
			  purchase_id = '$billno',batchno = '$batchno'
	 WHERE id={$_POST['mastitem'.$i]}"; 
			  
		  }
	  
	  
  
  
 if (!mysql_query($sqlupd1241,$dbConn))
  {
  die('Error: ' . mysql_error());
  } 
	  
  }
  
  
}

  
mysql_close($dbConn);

  echo "<script>alert('Purchase added Successfully');location.href='Report_purchase_show_rec.php?id=$billno'</script>";

?>


