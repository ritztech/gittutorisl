	
<?php

include('config.php');
 date_default_timezone_set("Asia/Kolkata");




$t_date = date("d/m/Y");


//$billstatus = $_POST['billstatus'];

$billstatus = 1;

if($billstatus == "2" )
	
	{
		$sell_inv_2 = "sell_invoice_2";
		$sell_item_2 = "sell_items_2";
		
		$result1 = mysql_query("SELECT `sell_id_1`  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);

$sellid = $row1[0];

$sqlupd124="UPDATE m_auto_id SET sell_id_1=($sellid + 1)  ";
mysql_query($sqlupd124,$dbConn);

		
	}
	
	else
		
		{
			
			$sell_inv_2 = "sell_invoice";
		$sell_item_2 = "sell_items";
		
		$result1 = mysql_query("SELECT `sell_id`  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);

$sellid = $row1[0];

$sqlupd124="UPDATE m_auto_id SET sell_id=($sellid + 1)  ";
mysql_query($sqlupd124,$dbConn);


		
			
		}




		
			$billno =  $sellid;
			


$j = $_POST['totalcnt'];






$custcon =  $_POST['custcon'];
$cashcard =  $_POST['paytype'];

$paid1 =  $_POST['paid'];
$custname = trim(strip_tags(addslashes(strtoupper($_POST['cst_name']))));
$balance =  $_POST['balance'];

$custid = $_POST['custid'];

$bill_time=date("h:i:sa");





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

  

$sqlinv = "INSERT INTO $sell_inv_2(billno,`sell_date`, `total`, `netpay`, `dis_rs`, `cust_id`, `cust_name`, `salesman_id`, `salesman_name`, `paid`, `balance`, `dis_pr`, `accid`,bill_time) VALUES
($billno,STR_TO_DATE('{$_POST['sdate']}','%d/%m/%Y'),'{$_POST['stotal']}','{$_POST['netpay']}','{$_POST['rsdis']}',
'$custid','$custname','{$_POST['sales_id']}','{$_POST['sales_name']}','{$_POST['paid']}','{$_POST['balance']}','{$_POST['sdis']}','$cashcard','$bill_time')";

mysql_query($sqlinv,$dbConn);


	  	  if($paid1 > "0")
	  {
		  
 
 		 $sqlinv_due = "update customers  set net_due = (net_due + $paid1) where cid = $cashcard";
  //echo $sqlinv_due;
 mysql_query($sqlinv_due,$dbConn);
 
 
	  }
	  
	  
	  	  if($balance > "0")
	  {
		  

		 $sqlinv_due = "update customers  set net_due = (net_due + $balance) where cid = $custid";
  //echo $sqlinv_due;
 mysql_query($sqlinv_due,$dbConn);
 
 
 		 $sqlinv_due = "INSERT INTO `cust_pay`(`cust_id`, `cust_name`, `amount`, `remark`, `p_date`, `debitid`) VALUES
('$custid','$custname','$paid1','$billno',STR_TO_DATE('{$_POST['sdate']}','%d/%m/%Y'),'$cashcard'	
)";
 // echo $sqlinv_due;
 mysql_query($sqlinv_due,$dbConn);
 
 
 	$qry2="INSERT INTO `bill_dues_his`(`bill_id`, `netamt`, `paid`, `due`, `t_date`,net_paid,cust_id) VALUES 
('$billno','{$_POST['netpay']}','$paid1','$balance',STR_TO_DATE('{$_POST['sdate']}','%d/%m/%Y'),'$paid1','$custid')"; 

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
	
	

$sqlupd1="UPDATE `m_master_store` SET `qty`=(`qty` - {$_POST['qty'.$i]}),tax_type='$tatypeee'   WHERE `id`={$_POST['mastitem'.$i]}";

mysql_query($sqlupd1,$dbConn);





$sqlins1="INSERT INTO $sell_item_2(`billno`, `itemid`, `qty`, `total`, `mrp`, `sprice`, `itemname`, `grpid`,weight,tax_type) VALUES
 ($billno,'{$_POST['mastitem'.$i]}','{$_POST['qty'.$i]}','{$_POST['ttotal'.$i]}','{$_POST['mrp'.$i]}','{$_POST['sprice'.$i]}','$mastdesc','{$_POST['grpid'.$i]}','{$_POST['weight1'.$i]}','$tatypeee')"; 
  
  
    
 mysql_query($sqlins1,$dbConn);
 
 
 
   $result13 = mysql_query("SELECT `c_id`, `c_name`, `qty`,`unit` FROM `food_child` WHERE  food_id  = $it_id ");

while($row13 = mysql_fetch_array($result13))
  {
	  	$s_uage  = $it_qty*$row13['qty'];
		
		//echo $s_uage;
		
		if($s_uage == "0")
		{
			$s_uage = $it_qty;
		}
		
		
		$s_c_id  = $row13['c_id'];
		$s_c_name  = $row13['c_name'];
		$s_unit  = $row13['unit'];
		
		$sqlins2="INSERT INTO `store_usage`(`billno`, `s_date`, `c_id`, `c_name`, `unit`, `qty`) VALUES 
		('$billno',STR_TO_DATE('$t_date','%d/%m/%Y'),'$s_c_id','$s_c_name','$s_unit','$s_uage')"; 
  
         mysql_query($sqlins2,$dbConn);
		 
		 $sqlins3="UPDATE `m_item_store` SET `qty`=  (qty - $s_uage ) WHERE itemid = $s_c_id"; 
  
         mysql_query($sqlins3,$dbConn);
		 
		 
		 

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

