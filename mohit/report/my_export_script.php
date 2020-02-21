<?php
include 'config.php';

$result1 = mysql_query("SELECT * FROM `med_tab_name`");
$backpath = "C:/xampp/htdocs/xampp/test/login/Medical/report/table_backup";


while($row1 = mysql_fetch_array($result1))
  { 
$tableName  = $row1[0];
unlink("$backpath/$tableName.sql");
$backupFile = "$backpath/$tableName.sql";
 
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";

$result = mysql_query($query);

header("Location: ../login.php"); 
  }
  
?> 

