
<?php

include('config.php');

$id = $_GET['id'];

$pieces = explode(",",$id);


$refid = $pieces[0];
$mrpvalue = $pieces[1];
$sprice = $pieces[2];
$taxtype = $pieces[3];


$sql="UPDATE `m_master_store` SET `mrp`='$mrpvalue' ,s_price = '$sprice',tax_type='$taxtype' WHERE id = $refid";
  

if (!mysql_query($sql,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
  
?>


