<?php
include('config.php');

$descrip = strtoupper($_POST['desc']);
$dop = $_POST['dop'];


$sql="UPDATE `m_master_store` SET `desc`='$descrip',`s_price`='$_POST[sprice]',
     `qty`='$_POST[qty]',`trg`='$_POST[trigger]',`mrp`='$_POST[mrp]',`barcode`='$_POST[barcode]' ,dop = STR_TO_DATE('$dop','%d/%m/%Y') ,
	 `batchno`='$_POST[batchno]'
	 where `id` = $_POST[itemid]";


if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  

  
  mysql_close($dbConn);

echo "<script>alert('Data Successfully saved');location.href='ed_master_add_front.php'</script>";
  
  ?>


  

