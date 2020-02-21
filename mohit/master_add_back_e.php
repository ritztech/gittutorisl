<?php
include('config.php');

$descrip = trim(strip_tags(addslashes(strtoupper($_POST['desc']))));


$weight = trim(strip_tags(addslashes(strtoupper($_POST['weight']))));


$batchno = trim(strip_tags(addslashes(strtoupper($_POST['batchno']))));


$prodid = $_POST['prodid'];

$gstper = trim(strip_tags(addslashes(strtoupper($_POST['gstper']))));





$sql="UPDATE `m_master_store` SET `desc`='$descrip',`s_price`='$_POST[sprice]',`trg`='$_POST[trigger]',`mrp`='$_POST[mrp]',`barcode`='$_POST[barcode]',
`dop`=STR_TO_DATE('{$_POST['dop']}','%d/%m/%Y'),
`expdate`=STR_TO_DATE('{$_POST['expdate']}','%d/%m/%Y'),tax_type='$gstper',
`batchno`='$batchno',`catid`='$_POST[sales_id]' ,weight = '$weight' WHERE id = $prodid";
  

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
$j = $_POST['totalcnt'];



		$sql="DELETE FROM `food_child` WHERE `food_id` = $prodid";
  

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
  


if($j > 0)
	
	{
		
	

for($i=1; $i <= $j; $i++) {

$itemid = trim(strip_tags(addslashes(strtoupper($_POST['itemid'.$i]))));
$itemname1 = trim(strip_tags(addslashes(strtoupper($_POST['nitemname'.$i]))));
$iunit = trim(strip_tags(addslashes(strtoupper($_POST['itemunit'.$i]))));
$i_qty = trim(strip_tags(addslashes(strtoupper($_POST['nqty'.$i]))));


$sqlins1="INSERT INTO `food_child`(`food_id`, `c_id`, `f_name`, `c_name`, `qty`, `unit`) VALUES
('$prodid','$itemid','$descrip','$itemname1','$i_qty','$iunit')";
 
 mysql_query($sqlins1,$dbConn);
  
}

	}
  
  
  mysql_close($dbConn);
  
 // echo "<script>alert('Item added Successfully');location.href='master_add_front.php'</script>";
  
  header('Location: master_add_front_e.php?id='.$prodid);
  

?>



