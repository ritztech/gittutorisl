<?php
include('config.php');


$result1 = mysql_query("SELECT max( `foodid` ) sell_id  FROM `m_auto_id`");
$row1 = mysql_fetch_array($result1);

$sellid = $row1[0];

$sqlupd124=" UPDATE m_auto_id SET foodid=($sellid + 1)  WHERE foodid=$sellid";
mysql_query($sqlupd124,$dbConn);


$foodid =  $sellid;



$j = $_POST['totalcnt'];




  $itemname = trim(strip_tags(addslashes(strtoupper($_POST['foodmname'])))); 
    $mrpr = trim(strip_tags(addslashes(strtoupper($_POST['mrpr'])))); 

$sql="INSERT INTO `m_master_store`(id,`desc`, `s_price`) 
  VALUES ($foodid,'$itemname','$mrpr')";
 

  

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }


for($i=1; $i <= $j; $i++) {

$itemid = trim(strip_tags(addslashes(strtoupper($_POST['itemid'.$i]))));
$itemname1 = trim(strip_tags(addslashes(strtoupper($_POST['nitemname'.$i]))));
$qty = trim(strip_tags(addslashes(strtoupper($_POST['nqty'.$i]))));
$iunit = trim(strip_tags(addslashes(strtoupper($_POST['itemunit'.$i]))));


	



$sqlins1="INSERT INTO `food_child`(`food_id`, `c_id`, `f_name`, `c_name`, `qty`, `unit`) VALUES
('$foodid','$itemid','$itemname','$itemname1','$qty','$iunit')";
 
 mysql_query($sqlins1,$dbConn);
  
}



echo "<script>alert('Food  added   Successfully');location.href='edit_master_rec.php?id=$foodid'</script>";

?>















