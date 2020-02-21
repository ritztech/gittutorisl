<?php
include 'config.php';

$tableName  = 'm_vendor';
$backupFile = 'C:/xampp/htdocs/xampp/test/login/Medical/report/mypet.sql';
$query      = "SELECT * INTO OUTFILE '$backupFile' FROM $tableName";

$result = mysql_query($query);


?> 

