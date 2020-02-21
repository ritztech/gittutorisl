	
<?php

include('config.php');

$t_date = date("d/m/Y");




$old_acc_id = $_POST['old_acc_id'];
$old_acc_bal = $_POST['old_acc_bal'];

$old_acc_paid = $_POST['old_acc_paid'];

$oldcustid = $_POST['oldcustid'];

$new_paid = $_POST['paid'];







if($old_acc_bal > 0)
	
	{
$qry2="UPDATE `customers` SET net_due = (net_due - $old_acc_bal)  WHERE cid = $oldcustid"; 

if (!mysql_query($qry2,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
		
	}





	 $qry2="UPDATE `customers` SET net_due = (net_due - $old_acc_paid)  WHERE cid = $old_acc_id"; 

if (!mysql_query($qry2,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  


//$billstatus = $_POST['billstatus'];

$billstatus = 1;

if($billstatus == "2" )
	
	{
		$sell_inv_2 = "sell_invoice_2";
		$sell_item_2 = "sell_items_2";
		
	}
	
	else
		
		{
			
			$sell_inv_2 = "sell_invoice";
		$sell_item_2 = "sell_items";
		
			
		}


		$billno = $_POST['bill_id'];
		
		
		
		
$sql1 = mysql_query("SELECT `itemid`, qty FROM `sell_items` 
WHERE billno = $billno ");

	  while($row = mysql_fetch_array($sql1))
		{  
	
	$i_itemid = $row['0'];
	$i_ipieces =  $row['1']; 
		 
	 $qry2="UPDATE `m_master_store` SET `qty` = (qty - $i_ipieces ) where `id`  = $i_itemid"; 

if (!mysql_query($qry2,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  		}
		

$result31333 = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$sDbName' AND TABLE_NAME = 'sell_invoice_bck' ");
            $result31333_r = mysql_fetch_array($result31333);
			
			$inv_bck_id =  $result31333_r['0'];
			
		
$sqlinv = "INSERT INTO `sell_invoice_bck`(`sell_date`, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, `salesman_name`, `paid`, `balance`, `dis_pr`, `accid`, `billno`) select * from sell_invoice where `billno` = $billno";
 // echo $sqlinv;
mysql_query($sqlinv,$dbConn);



			
			


$sqlinv = "INSERT INTO `sell_items_bck`(`billno`, `itemid`, `qty`, `total`, `mrp`, `sprice`, `itemname`, `grpid`, `weight`,bill_id) 
SELECT `billno`, `itemid`, `qty`, `total`, `mrp`, `sprice`, `itemname`, `grpid`, `weight`,$inv_bck_id FROM `sell_items` WHERE `billno`  = $billno";
 // echo $sqlinv;
mysql_query($sqlinv,$dbConn);
		
	

$sqlinv = "delete from sell_items   where billno = $billno";
 
// echo $sqlinv;
 
mysql_query($sqlinv,$dbConn);
		



$j = $_POST['totalcnt'];






$custcon =  $_POST['custcon'];
$cashcard =  $_POST['paytype'];

$paid1 =  $_POST['paid'];
$custname = trim(strip_tags(addslashes(strtoupper($_POST['cst_name']))));
$balance =  $_POST['balance'];

$custid = $_POST['custid'];



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
			('$custname','$custcon','not sure','not sure','0','0',STR_TO_DATE('{$_POST['sdate']}','%d/%m/%Y'),1,'DR')";
	
 
// echo $sqlinv;
 
mysql_query($sqlinv,$dbConn);
		
}
	
	

}

 

 
 

$sqlinv = "UPDATE `sell_invoice` SET `sell_date`=STR_TO_DATE('{$_POST['sdate']}','%d/%m/%Y'),`total`='{$_POST['stotal']}',`netpay`='{$_POST['netpay']}',
`dis_rs`='{$_POST['rsdis']}',`cust_id`='$custid',
`cust_name`='$custname',`salesman_id`='{$_POST['sales_id']}',`salesman_name`='{$_POST['sales_name']}',`paid`='{$_POST['paid']}',
`balance`='{$_POST['balance']}',`dis_pr`='{$_POST['sdis']}',`accid`='$cashcard' WHERE billno = $billno";

mysql_query($sqlinv,$dbConn);


if($new_paid!=$old_acc_paid)
{
	$new_amt_paid = $new_paid - $old_acc_paid; 
	
	
	
	$qry2="INSERT INTO `bill_dues_his`(`bill_id`, `netamt`, `paid`, `due`, `t_date`,net_paid,cust_id) VALUES 
('$billno','{$_POST['netpay']}','$new_amt_paid','{$_POST['balance']}',STR_TO_DATE('$t_date','%d/%m/%Y'),'{$_POST['paid']}','$custid')"; 

if (!mysql_query($qry2,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  	
}






for($i=1; $i <= $j; $i++) {
	
	
	$it_id = $_POST['mastitem'.$i];
	$it_qty = $_POST['qty'.$i];
	$tatypeee = $_POST['tatypeee'.$i];
	
	
	$mastdesc = trim(strip_tags(addslashes(strtoupper($_POST['mastdesc'.$i]))));
	
	

$sqlupd1="UPDATE `m_master_store` SET `qty`=(`qty` - {$_POST['qty'.$i]})   WHERE `id`={$_POST['mastitem'.$i]}";

mysql_query($sqlupd1,$dbConn);







$sqlins1="INSERT INTO $sell_item_2(`billno`, `itemid`, `qty`, `total`, `mrp`, `sprice`, `itemname`, `grpid`,weight,tax_type) VALUES
 ($billno,'{$_POST['mastitem'.$i]}','{$_POST['qty'.$i]}','{$_POST['ttotal'.$i]}','{$_POST['mrp'.$i]}','{$_POST['sprice'.$i]}','$mastdesc','{$_POST['grpid'.$i]}','{$_POST['weight1'.$i]}','$tatypeee')"; 
  
  
    
 mysql_query($sqlins1,$dbConn);
 
   
}


$qry2="UPDATE `customers` SET net_due = (net_due + '{$_POST['paid']}')  WHERE cid = '$cashcard'"; 

if (!mysql_query($qry2,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
 if($balance>0)
{
	
	$qry2="UPDATE `customers` SET net_due = (net_due + $balance)  WHERE cid = '$custid'"; 

if (!mysql_query($qry2,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
}



mysql_close($dbConn);

if($billstatus == "1")
	
	{

header('Location: show_rec_bill.php?id='.$billno);

	}
	
	
	else
		
		{
			
			header('Location: show_rec_bill1.php?id='.$billno);
		}


?>

