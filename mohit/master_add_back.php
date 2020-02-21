<?php
include('config.php');

$descrip = trim(strip_tags(addslashes(strtoupper($_POST['desc']))));

$wght = trim(strip_tags(addslashes(strtoupper($_POST['wght']))));

$batchno = trim(strip_tags(addslashes(strtoupper($_POST['batchno']))));

$gstper = trim(strip_tags(addslashes(strtoupper($_POST['gstper']))));


$result31 = mysql_query("SELECT `AUTO_INCREMENT` FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = '$sDbName' AND TABLE_NAME = 'm_master_store' ");
            $row31 = mysql_fetch_array($result31);
			
$m_entry_in = $row31['0'];



$sql="INSERT INTO `m_master_store`(`desc`, `s_price`, `qty`, `trg`, `mrp`, `barcode`,dop,expdate,batchno,grp_id,catid,weight,tax_type) 
VALUES ('$descrip','$_POST[sprice]','0','$_POST[trigger]','$_POST[mrp]','$_POST[barcode]',STR_TO_DATE('{$_POST['dop']}','%d/%m/%Y'),STR_TO_DATE('{$_POST['expdate']}','%d/%m/%Y'),'$batchno','$m_entry_in','$_POST[sales_id]','$wght','$gstper' )";
  


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
$j = $_POST['totalcnt'];

for($i=1; $i <= $j; $i++) {

$itemid = trim(strip_tags(addslashes(strtoupper($_POST['itemid'.$i]))));
$itemname1 = trim(strip_tags(addslashes(strtoupper($_POST['nitemname'.$i]))));
$iunit = trim(strip_tags(addslashes(strtoupper($_POST['itemunit'.$i]))));
$i_qty = trim(strip_tags(addslashes(strtoupper($_POST['nqty'.$i]))));


	



$sqlins1="INSERT INTO `food_child`(`food_id`, `c_id`, `f_name`, `c_name`, `qty`, `unit`) VALUES
('$m_entry_in','$itemid','$descrip','$itemname1','$i_qty','$iunit')";
 
 mysql_query($sqlins1,$dbConn);
  
}


  
  
  mysql_close($dbConn);
  
  echo "<script>alert('Item added Successfully');location.href='master_add_front.php'</script>";
  

?>



