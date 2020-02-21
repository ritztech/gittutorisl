<?php
include('config.php');

$id=$_GET["q"];

//echo $id;


$result12 = mysql_query("SELECT `desc`, `s_price`, `trg`, `mrp`,`barcode` , DATE_FORMAT(expdate,'%d/%m/%Y') as expdate , `batchno`,`id`, `grp_id`, `catid`,weight  FROM `m_master_store` where id = $id");

$row12 = mysql_fetch_array($result12);

$cat_id = $row12['catid'];


//echo $cat_id;




$result12_1 = mysql_query("SELECT `name` FROM `p_category` WHERE id = $cat_id");

$row12_1 = mysql_fetch_array($result12_1);








$v1= $row12['0'];
$v2= $row12['1'];
$v3= $row12['2'];
$v4= $row12['3'];
$v5= $row12['4'];
$v6= $row12['5'];
$v7= $row12['6'];
$v8= $row12['7'];
$v9= $row12['8'];
$v10= $row12['9'];
$v11= $row12_1['0'];
$v12= $row12['weight'];

echo $v1.",". $v2.",". $v3.",". $v4.",". $v5.",". $v6.",". $v7.",". $v8.",". $v9.",". $v10.",". $v11.",". $v12;


mysql_close($dbConn);
?> 