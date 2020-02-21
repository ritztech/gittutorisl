<?php
include("config.php");
$id = $_GET['id'];

$qry1="DELETE FROM `doc_master` WHERE `did` ='$id'"; 

if (!mysql_query($qry1,$dbConn))
  {
  die('Error: ' . mysql_error());
  }
   

?>



