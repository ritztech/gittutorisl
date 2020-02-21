<?php
include("config.php");

$id = $_GET['id'];

$sqlupd123="DELETE FROM muser where id  = '$id'"; 
 
mysql_query($sqlupd123,$dbConn);

mysql_close($dbConn);

header('Location: add_user_front.php');


?>
