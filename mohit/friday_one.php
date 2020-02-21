<?php
include('config.php');

$result12 = mysql_query("SELECT id   from `m_master_store` WHERE id = 2");

$row12 = mysql_fetch_array($result12);

if ($row12['id'] == 0)
{
echo " no rec foun";
}

else

{
echo " rec found ";
}

mysql_close($dbConn);
?>
