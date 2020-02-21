<?php

include('config.php');

$ret_bill = $_POST['billno'];

$result1 = mysql_query("SELECT `billno`, `sell_date`, `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name` FROM `sell_invoice`  WHERE billno = $ret_bill");
$row1 = mysql_fetch_array($result1);


$ret_rem = $_POST['inputtext'];
$ret_date = $_POST['edate'];

$sql="INSERT INTO `bill_return`(`billno`, `sell_date`, `total`, `discount`, `netpay`, `cust_name`, `cust_addr`, `cust_contact`, `dr_name`, `remarks`, `return_date`) VALUES ($row1[0],'$row1[1]',$row1[2],$row1[3],$row1[4],'$row1[5]','$row1[6]','$row1[7]','$row1[8]','$ret_rem',STR_TO_DATE('$ret_date','%d/%m/%Y'))";
				
								
if (!mysql_query($sql,$dbConn))
 {
  die('Error: ' . mysql_error());
  }

$sql12="DELETE FROM `sell_invoice`  WHERE billno = $ret_bill ";
				
								
if (!mysql_query($sql12,$dbConn))
 {
  die('Error: ' . mysql_error());
  }  
  

$result13 = mysql_query("SELECT  `itemid`, `qty`FROM `sell_items` WHERE `billno` = $ret_bill");

while($row13 = mysql_fetch_array($result13))
  {
  
 $sqlupd1="UPDATE `m_master_store` SET `qty`=(`qty`+ $row13[1])  WHERE `id`=$row13[0]";

if (!mysql_query($sqlupd1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  }
  
  
  
  $sql18="DELETE FROM  `sell_items`  WHERE billno = $ret_bill ";
				
								
if (!mysql_query($sql18,$dbConn))
 {
  die('Error: ' . mysql_error());
  } 
  
  
 
 mysql_close($dbConn);
 
// Below will be last line  


echo '<script type="text/javascript">alert("BILL RETURNED SCUCCESFULLY "); </script>'; 
header('Location: welcome.php');  
  

  
 


?> 





