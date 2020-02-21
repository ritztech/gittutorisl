
<?php

include('config.php');


$j = $_POST['totalcnt'];


for($i=1; $i <= $j; $i++) {

$sqlupd1="UPDATE `m_master_store` SET `desc`='{$_POST['itemname'.$i]}',`barcode`='{$_POST['barcode'.$i]}' WHERE id = {$_POST['itemid'.$i]}";

mysql_query($sqlupd1,$dbConn);
   
  
}

mysql_close($dbConn);

  echo "<script>alert('Item updated Successfully');location.href='fix_barcode_duplicate.php'</script>";

?>

