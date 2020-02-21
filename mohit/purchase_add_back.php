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
 

 //  stock item entry  start
 
 
 
 
 
 
 for($i=1; $i <= $j; $i++) {

$mastdesc = trim(strip_tags(addslashes(strtoupper($_POST['mastdesc'.$i]))));
$itemid = trim(strip_tags(addslashes(strtoupper($_POST['mastitem'.$i]))));
$new_batchno = trim(strip_tags(addslashes(strtoupper($_POST['batchno'.$i]))));
$exist_batch = trim(strip_tags(addslashes(strtoupper($_POST['batchno_o'.$i]))));
$mrp = trim(strip_tags(addslashes($_POST['mrp'.$i])));
$sprice = trim(strip_tags(addslashes($_POST['sprice'.$i])));
$expdate = trim(strip_tags(addslashes($_POST['expdate'.$i])));
$trg = trim(strip_tags(addslashes($_POST['trg'.$i])));
$barcode = trim(strip_tags(addslashes($_POST['barcode'.$i])));
$qty = trim(strip_tags(addslashes($_POST['qty'.$i])));
$price = trim(strip_tags(addslashes($_POST['price'.$i])));
$total = trim(strip_tags(addslashes($_POST['total'.$i])));
$group_id = trim(strip_tags(addslashes($_POST['group_id'.$i])));
$catid = trim(strip_tags(addslashes($_POST['catid'.$i])));


$weight = trim(strip_tags(addslashes(strtoupper($_POST['weight'.$i]))));



if($itemid == 0)
	
	{
		//echo "</br>";
		//echo "Insert as new product for $mastdesc";
		//echo "</br>";
		
		$result31_item = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$sDbName' AND TABLE_NAME = 'm_master_store' ");
            $result31_item_id = mysql_fetch_array($result31_item);
			
			$itemid =  $result31_item_id['0'];
			$group_id = $itemid;
			
		

	

	  $sqlins1="INSERT INTO `m_master_store`(`desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `dop`, `free_item`, `free_qty`, `expdate`, `batchno`, `purchase_id`, `id`, `grp_id`, `catid`,weight) VALUES
('$mastdesc','$sprice','$qty','$trg','$mrp','$barcode',STR_TO_DATE('{$_POST['pdate']}','%d/%m/%Y'),'no item','0',STR_TO_DATE('$expdate','%d/%m/%Y'),'$new_batchno','$billno','$itemid','$group_id','$catid','$weight')";

 //echo $sqlins1;
  //echo "</br>";
    
 if (!mysql_query($sqlins1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
  

	
	}

	else
	{
		
		if( $new_batchno == $exist_batch )
		{
			//echo "</br>";
			//echo "update existing quantity  for $mastdesc ";
			//echo "</br>";
			
	  $sqlins1="UPDATE `m_master_store` SET  `s_price`='$sprice',qty=(qty + $qty),`trg`='$trg',`mrp`='$mrp' WHERE id = $itemid";

 //echo $sqlins1;
  //echo "</br>";
    
 if (!mysql_query($sqlins1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
			
			
		}
	
	else
	{
	//	echo "</br>";
		//echo "insert this recorsd for same group id   for $mastdesc ";
		//echo "</br>";
		
		
				$result31_item = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$sDbName' AND TABLE_NAME = 'm_master_store' ");
            $result31_item_id = mysql_fetch_array($result31_item);
			
			$itemid =  $result31_item_id['0'];
					
					
	  $sqlins1="INSERT INTO `m_master_store`(`desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`, `dop`, `free_item`, `free_qty`, `expdate`, `batchno`, `purchase_id`, `id`, `grp_id`, `catid`,weight) VALUES
('$mastdesc','$sprice','$qty','$trg','$mrp','$barcode',STR_TO_DATE('{$_POST['pdate']}','%d/%m/%Y'),'no item','0',STR_TO_DATE('$expdate','%d/%m/%Y'),'$new_batchno','$billno','$itemid','$group_id','$catid','$weight')";

 //echo $sqlins1;
  //echo "</br>";
    
 if (!mysql_query($sqlins1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }

		
	}
		
		
	}
	
	
	$sqlins1="INSERT INTO `purchase_item`(`purchaseid`, `ited_id`, `itemname`, `mrp`, `sell_price`, `buy_price`, `buy_qty`, `expiry_date`, `batchno`, `total`, `barcode`, `gruop_id`,weight)
	VALUES ($billno,$itemid,'$mastdesc','$mrp','$sprice','$price','$qty',STR_TO_DATE('$expdate','%d/%m/%Y'),'$new_batchno','$total','$barcode','$group_id','$weight')";

// echo $sqlins1;
  //echo "</br>";
  
  
 if (!mysql_query($sqlins1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  
  
	  
}



 
 //  stock item entry  end
 
 
  
 
 
  
mysql_close($dbConn);

header('Location: purchase_add_front.php');

//  echo "<script>alert('Purchase added Successfully');location.href='Report_purchase_show_rec.php?id=$billno'</script>";

?>


