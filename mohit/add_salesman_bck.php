<?php

include('config.php');


$vname = strtoupper($_POST['vname']);


$sql="INSERT INTO `m_salesman`(`name`, `contact`, `address`) VALUES ('$vname','$_POST[cnt]','$_POST[addr]')";



mysql_query($sql,$dbConn);
echo "</br>";
mysql_close($dbConn);

header('Location: add_salesman_front.php');



?>

