

<?php
include 'config.php';


$tableName  = 'm_vendor';
$backupFile = 'C:/xampp/htdocs/xampp/test/login/Medical/report/mypet.sql';
$query      = "LOAD DATA INFILE '$backupFile' INTO TABLE $tableName";
$result = mysql_query($query);
echo "re-loaded ";

?>