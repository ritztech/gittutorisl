<?php
$mysql_hostname = "localhost";
$mysql_user = "root";
$mysql_password = "sudhir";
$mysql_database = "mandi";
$connection = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die ('MySQL connect failed. ' . mysql_error());
mysql_select_db($mysql_database, $connection) or die('Cannot select database. ' . mysql_error());
?>